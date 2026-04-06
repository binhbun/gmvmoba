const admin = require('firebase-admin');

const serviceAccount = JSON.parse(process.env.FIREBASE_SERVICE_ACCOUNT);

if (!admin.apps.length) {
  admin.initializeApp({
    credential: admin.credential.cert(serviceAccount)
  });
}

const db = admin.firestore();

const sleep = (ms) => new Promise(resolve => setTimeout(resolve, ms));

async function cleanEverything() {
  console.log(`🚀 Bắt đầu dọn dẹp sạch toàn bộ collection: ${new Date().toLocaleString('vi-VN')}`);
  
  const collectionName = 'user_logs';
  let totalDeleted = 0;

  try {
    while (true) {
      const snapshot = await db.collection(collectionName).limit(200).get();

      if (snapshot.empty) {
        console.log(`🎉 HOÀN TẤT: Đã xóa sạch bóng ${totalDeleted} bản ghi.`);
        break;
      }

      const batch = db.batch();
      snapshot.docs.forEach((doc) => {
        batch.delete(doc.ref);
      });

      await batch.commit();
      totalDeleted += snapshot.size;
      console.log(`✅ Đã xóa tổng cộng ${totalDeleted} bản ghi...`);

      await sleep(5000); 
    }
  } catch (error) {
    console.error('❌ Lỗi:', error.message);
    if (error.message.includes('RESOURCE_EXHAUSTED')) {
      console.log('⚠️ Hạn mức tức thời bị vượt quá. Hãy thử lại sau 30 phút.');
    }
    process.exit(1);
  }
}

cleanEverything();
