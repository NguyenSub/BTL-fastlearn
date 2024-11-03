<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'teacher') {
    echo "Bạn cần đăng nhập với tài khoản giảng viên!";
    exit();
}

// Kết nối cơ sở dữ liệu
require 'db.php';
$user_id = $_SESSION['user_id'];

try {
    // Lấy thông tin giảng viên từ bảng 'users'
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Lấy danh sách các khóa học do giảng viên phụ trách
    $stmt_courses = $conn->prepare("SELECT * FROM courses WHERE teacher_id = :teacher_id");
    $stmt_courses->bindParam(':teacher_id', $user_id);
    $stmt_courses->execute();
    $courses = $stmt_courses->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Lỗi khi lấy dữ liệu: " . $e->getMessage();
}
