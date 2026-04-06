const admin = require('firebase-admin');

const serviceAccount = JSON.parse(process.env.FIREBASE_SERVICE_ACCOUNT);

if (!admin.apps.length) {
  admin.initializeApp({
    credential: admin.credential.cert(serviceAccount)
  });
}

const db = admin.firestore();

const sleep = (ms) => new Promise(resolve => setTimeout(resolve, ms));


async function deleteCollection(collectionPath, batchSize) {
  const collectionRef = db.collection(collectionPath);
  const query = collectionRef.limit(batchSize);

  return new Promise((resolve, reject) => {
    deleteQueryBatch(query, resolve).catch(reject);
  });
}

async function deleteQueryBatch(query, resolve) {
  const snapshot = await query.get();

  // Nếu không còn dữ liệu thì dừng lại
  if (snapshot.size === 0) {
    resolve();
    return;
  }

  const batch = db.batch();
  snapshot.docs.forEach((doc) => {
    batch.delete(doc.ref);
  });

  await batch.commit();
  console.log(`✅ Đã xóa xong ${snapshot.size} bản ghi.`);

  console.log('⏳ Đang nghỉ 5 giây trước khi tiếp tục...');
  await sleep(5000);

  await deleteQueryBatch(query, resolve);
}

async function startCleanup() {
  const now = new Date().toLocaleString('vi-VN', { timeZone: 'Asia/Ho_Chi_Minh' });
  console.log(`🚀 Bắt đầu tiến trình dọn dẹp lúc: ${now}`);

  try {
    await deleteCollection('user_logs', 400); 
    console.log('🎉 HOÀN TẤT: Toàn bộ dữ liệu đã được làm sạch.');
  } catch (error) {
    console.error('❌ LỖI NGHIÊM TRỌNG:', error.message);
    process.exit(1);
  }
}

startCleanup();
