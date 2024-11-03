<?php 
$host = "localhost";  // Máy chủ cơ sở dữ liệu
$user = "root";       // Tên đăng nhập MySQL (mặc định trên XAMPP)
$pass = "";           // Mật khẩu MySQL (mặc định là rỗng trên XAMPP)
$db = "learn_db"; // Tên cơ sở dữ liệu
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options); // Tạo kết nối đến cơ sở dữ liệu
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode()); // Xử lý lỗi kết nối
}
?>
