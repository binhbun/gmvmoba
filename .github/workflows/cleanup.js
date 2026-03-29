const admin = require('firebase-admin');

const serviceAccount = JSON.parse(process.env.FIREBASE_SERVICE_ACCOUNT);

if (!admin.apps.length) {
  admin.initializeApp({
    credential: admin.credential.cert(serviceAccount)
  });
}

const db = admin.firestore();

async function cleanExpiredLogs() {
  console.log(`🧹 Bắt đầu dọn dẹp: ${new Date().toLocaleString('vi-VN')}`);
  
  // Ngưỡng thời gian: 5 phút trước (Dùng đối tượng Timestamp của Firestore)
  const fiveMinutesAgo = admin.firestore.Timestamp.fromMillis(Date.now() - (5 * 60 * 1000));

  try {
    // TỐI ƯU: Chỉ lấy những bản ghi cũ hơn 5 phút (Tiết kiệm Read Quota)
    // Lưu ý: Bạn cần đảm bảo trường 'last_update' luôn tồn tại
    const snapshot = await db.collection('user_logs')
      .where('last_update', '<', fiveMinutesAgo)
      .limit(400) // Giới hạn để không vượt quá 500 của Batch
      .get();

    if (snapshot.empty) {
      console.log('🙌 Không có bản ghi nào hết hạn.');
      return;
    }

    const batch = db.batch();
    snapshot.docs.forEach((doc) => {
      batch.delete(doc.ref);
    });

    await batch.commit();
    console.log(`✅ Đã xóa thành công ${snapshot.size} bản ghi cũ.`);

  } catch (error) {
    console.error('❌ Lỗi khi dọn dẹp:', error);
  }
}

cleanExpiredLogs();
