const admin = require('firebase-admin');

const serviceAccount = JSON.parse(process.env.FIREBASE_SERVICE_ACCOUNT);

if (!admin.apps.length) {
  admin.initializeApp({
    credential: admin.credential.cert(serviceAccount)
  });
}

const db = admin.firestore();

// Tăng thời gian nghỉ lên 3 giây để đảm bảo Firebase Reset lại Burst Limit
const sleep = (ms) => new Promise(resolve => setTimeout(resolve, ms));

async function startCleanup() {
  console.log(`🚀 Bắt đầu dọn dẹp (Chế độ an toàn): ${new Date().toLocaleString('vi-VN')}`);
  
  try {
    const collectionName = 'user_logs';
    let totalDeleted = 0;

    while (true) {
      const snapshot = await db.collection(collectionName).limit(100).get();

      if (snapshot.empty) {
        console.log('🎉 Đã xóa sạch toàn bộ dữ liệu.');
        break;
      }

      const batch = db.batch();
      snapshot.docs.forEach((doc) => {
        batch.delete(doc.ref);
      });

      await batch.commit();
      totalDeleted += snapshot.size;
      console.log(`✅ Đã xóa ${totalDeleted} bản ghi...`);

      // Nghỉ lâu hơn một chút giữa mỗi batch nhỏ
      await sleep(5000); 
    }
  } catch (error) {
    // Nếu vẫn lỗi Resource Exhausted, nghĩa là Firebase đang khóa IP/Token của bạn tạm thời
    console.error('❌ Lỗi hệ thống:', error.message);
    if (error.message.includes('RESOURCE_EXHAUSTED')) {
      console.log('⚠️ Firebase đang giới hạn tốc độ. Vui lòng đợi 30-60 phút rồi thử lại.');
    }
    process.exit(1);
  }
}

startCleanup();
