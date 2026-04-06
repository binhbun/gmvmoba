const admin = require('firebase-admin');

const serviceAccount = JSON.parse(process.env.FIREBASE_SERVICE_ACCOUNT);

if (!admin.apps.length) {
  admin.initializeApp({
    credential: admin.credential.cert(serviceAccount)
  });
}

const db = admin.firestore();

const sleep = (ms) => new Promise(resolve => setTimeout(resolve, ms));

async function cleanExpiredLogs() {
  const now = admin.firestore.Timestamp.now();
  console.log(`🧹 Bắt đầu dọn dẹp theo điều kiện thời gian: ${new Date().toLocaleString('vi-VN')}`);
  
  let totalDeleted = 0;
  const collectionRef = db.collection('user_logs');

  try {
    while (true) {
      const snapshot = await collectionRef
        .where('last_update', '<=', now)
        .limit(100)
        .get();

      if (snapshot.empty) {
        console.log(`🙌 Hoàn tất! Đã xóa sạch ${totalDeleted} bản ghi thỏa điều kiện.`);
        break;
      }

      const batch = db.batch();
      snapshot.docs.forEach((doc) => {
        batch.delete(doc.ref);
      });

      await batch.commit();
      totalDeleted += snapshot.size;
      
      console.log(`✅ Đã xóa thành công đợt ${totalDeleted}...`);

      await sleep(5000);

      if (totalDeleted >= 18000) {
        console.log('⚠️ Đã đạt giới hạn an toàn 18,000. Dừng tiến trình để bảo vệ Quota ngày.');
        break;
      }
    }
  } catch (error) {
    console.error('❌ Lỗi khi dọn dẹp:', error.message);
    process.exit(1);
  }
}

cleanExpiredLogs();
