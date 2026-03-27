const admin = require('firebase-admin');

const serviceAccount = JSON.parse(process.env.FIREBASE_SERVICE_ACCOUNT);

admin.initializeApp({
  credential: admin.credential.cert(serviceAccount)
});

const db = admin.firestore();

async function cleanExpiredLogs() {
  console.log(`🧹 Bắt đầu kiểm tra lúc: ${new Date().toLocaleString('vi-VN')}`);
  
  const collectionRef = db.collection('user_logs');
  const snapshot = await collectionRef.get();

  if (snapshot.empty) {
    console.log('✨ Không có dữ liệu trong user_logs.');
    return;
  }

  const batch = db.batch();
  let count = 0;
  
  const fiveMinutesAgo = Date.now() - (5 * 60 * 1000);

  snapshot.forEach(doc => {
    const data = doc.data();

    const hasRequiredFields = 
      data.hasOwnProperty('current_active_domain') &&
      data.hasOwnProperty('last_start_time') &&
      data.hasOwnProperty('last_update');

    if (hasRequiredFields) {
      // Firestore Timestamp được chuyển về JS Date bằng .toDate()
      const lastUpdateTime = data.last_update.toDate().getTime();

      if (lastUpdateTime < fiveMinutesAgo) {
        console.log(`🗑️ Đang xóa IP: ${doc.id} (Cũ hơn 5 phút)`);
        batch.delete(doc.ref);
        count++;
      }
    }
  });

  if (count > 0) {
    await batch.commit();
    console.log(`✅ Đã dọn dẹp xong ${count} bản ghi.`);
  } else {
    console.log('🙌 Không tìm thấy bản ghi nào thỏa mãn điều kiện để xóa.');
  }
}

cleanExpiredLogs().catch(console.error);
