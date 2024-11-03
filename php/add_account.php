<?php
session_start();
require 'db.php'; // Kết nối đến cơ sở dữ liệu

// Lấy thông tin hiện tại của người dùng
// $user_id = $_SESSION['user_id'];
// $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
// $stmt->execute(['id' => $user_id]);
// $user = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $msv = $_POST['msv'] ?? null;
    $classSV = $_POST['classSV'] ?? null;
    $khoaSV = $_POST['khoaSV'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $classGV = $_POST['classGV'] ?? null;
    if ($phone && !preg_match('/^\d{10}$/', $phone)) {
        die("Số điện thoại không hợp lệ. Vui lòng nhập đúng 10 chữ số.");
    }

    if (!in_array($role, ['student', 'teacher', 'admin'])) {
        die("Vai trò không hợp lệ. Vui lòng chọn lại vai trò.");
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (role, email, password, fullname, msv, classSV, khoaSV, phone, classGV) 
    VALUES (:role, :email, :password, :fullname, :msv, :classSV, :khoaSV, :phone, :classGV)");
    $stmt->execute([
    'role' => $role,
    'email' => $email,
    'password' => $hashedPassword,
    'fullname' => $fullname,
    'msv' => $msv,
    'classSV' => $classSV,
    'khoaSV' => $khoaSV,
    'phone' => $phone,
    'classGV' => $classGV
]);

echo "<h3>Tạo tài khoản thành công!</h3>";
header('Location: ../quan_tri_vien/account.php');
exit;
} else {
    echo "<h3>Không thể tạo tài khoản. Vui lòng thử lại.</h3>";
}
?>
