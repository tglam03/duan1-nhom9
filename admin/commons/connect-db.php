<?php

// kết nói csdl
$host = DB_HOST;
$port = DB_PORT;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$dbname = DB_NAME;

try {
  $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
  // Cài đặt chế đọo báo lỗi là xử lí ngoại lệ
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cài đặt chế độ trả dữ liệu
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  debug("Connection failed: " . $e->getMessage());
}
?>