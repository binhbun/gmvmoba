const admin = require('firebase-admin');

const serviceAccount = JSON.parse(process.env.FIREBASE_SERVICE_ACCOUNT);

if (!admin.apps.length) {
  admin.initializeApp({
    credential: admin.credential.cert(serviceAccount)
  });
}

const db = admin.firestore();

async function deleteCollection(collectionPath, batchSize) {
  const collectionRef = db.collection(collectionPath);
  const query = collectionRef.limit(batchSize);

  return new Promise((resolve, reject) => {
    deleteQueryBatch(query, resolve).catch(reject);
  });
}

async function deleteQueryBatch(query, resolve) {
  const snapshot = await query.get();

  // Nếu không còn dữ liệu thì dừng
  if (snapshot.size === 0) {
    resolve();
    return;
  }

  const batch = db.batch();
  snapshot.docs.forEach((doc) => {
    batch.delete(doc.ref);
  });

  await batch.commit();
  console.log(`- Đã xóa ${snapshot.size} bản ghi...`);

  process.nextTick(() => {
    deleteQueryBatch(query, resolve);
  });
}

async function cleanAllLogs() {
  console.log(`🧹 Bắt đầu dọn dẹp toàn bộ dữ liệu: ${new Date().toLocaleString('vi-VN', { timeZone: 'Asia/Ho_Chi_Minh' })}`);
  
  try {
    await deleteCollection('user_logs', 400);
    console.log('✅ Đã xóa sạch toàn bộ IP trong collection user_logs.');
  } catch (error) {
    console.error('❌ Lỗi khi dọn dẹp:', error);
    process.exit(1);
  }
}

cleanAllLogs();
