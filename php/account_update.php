<?php
session_start();
require 'db.php'; // Kết nối đến cơ sở dữ liệu

// Lấy thông tin hiện tại của người dùng
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $new_password = $_POST['new_password'];

    // Cập nhật thông tin
    $stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email, phone = :phone WHERE id = :id");
    $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone, 'id' => $user_id]);

    // Cập nhật mật khẩu nếu có
    if (!empty($new_password)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
        $stmt->execute(['password' => $hashed_password, 'id' => $user_id]);
    }
    echo "Cập nhật thành công!";
}
?>
