const admin = require('firebase-admin');

// Kiểm tra biến môi trường
if (!process.env.FIREBASE_SERVICE_ACCOUNT) {
  console.error('❌ Thiếu biến môi trường FIREBASE_SERVICE_ACCOUNT');
  process.exit(1);
}

const serviceAccount = JSON.parse(process.env.FIREBASE_SERVICE_ACCOUNT);

if (!admin.apps.length) {
  admin.initializeApp({
    credential: admin.credential.cert(serviceAccount)
  });
}

const db = admin.firestore();

async function deleteAllLogs() {
  console.log(`⚠️ Bắt đầu XÓA TẤT CẢ bản ghi: ${new Date().toLocaleString('vi-VN')}`);

  try {
    // Lấy tất cả bản ghi (không dùng .where)
    // Lưu ý: Nếu dữ liệu cực lớn (hàng chục nghìn), nên dùng giải pháp đệ quy hoặc limit theo batch
    const snapshot = await db.collection('user_logs').get();

    if (snapshot.empty) {
      console.log('🙌 Collection trống, không có gì để xóa.');
      return;
    }

    const batch = db.batch();
    snapshot.docs.forEach((doc) => {
      batch.delete(doc.ref);
    });

    await batch.commit();
    console.log(`✅ Đã xóa sạch toàn bộ ${snapshot.size} bản ghi trong user_logs.`);

  } catch (error) {
    console.error('❌ Lỗi khi xóa dữ liệu:', error);
  }
}

deleteAllLogs();
