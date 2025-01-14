// Import module http
const http = require('http');

// Cấu hình server
const hostname = '127.0.0.1'; // Địa chỉ localhost
const port = 3000;           // Port để server lắng nghe

// Tạo server
const server = http.createServer((req, res) => {
  // Thiết lập header cho response
  res.statusCode = 200; // Mã trạng thái OK
  res.setHeader('Content-Type', 'text/plain'); // Dạng text

  // Gửi response
  res.end('Hello, this is a basic Node.js server!\n');
});

// Khởi động server
server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});
