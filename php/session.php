<?php
require 'db.php'; // Kết nối tới cơ sở dữ liệu

// Đăng ký người dùng mới
function register($user_id, $role) {
    $_SESSION['status'] = 'Đăng ký thành công!';
    $_SESSION['user_id'] = $user_id;
    $_SESSION['role'] = $role; // Lưu vai trò khi đăng ký
    header('Location: login.php');
    exit;
}

// Kiểm tra người dùng đã đăng nhập
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

// Đăng nhập người dùng
function login($user_id, $role) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['role'] = $role; // Lưu vai trò khi đăng nhập

    // Điều hướng đến trang phù hợp dựa trên vai trò
    if ($role === 'admin') {
        header('Location: quan_tri_vien/home.php');
    } elseif ($role === 'teacher') {
        header('Location: giang_vien/home.php');
    } elseif ($role === 'student') {
        header('Location: sinh_vien/home.php');
    } else {
        echo "Vai trò người dùng không hợp lệ.";
    }
    exit;
}

// Đăng xuất người dùng
function logout() {
    session_unset();
    session_destroy();
    header('Location: ../login.php'); // Chuyển hướng đến trang đăng nhập sau khi đăng xuất
    exit;
}

// Kiểm tra vai trò
function is_role($role) {
    return isset($_SESSION['role']) && $_SESSION['role'] === $role;
}
?>
