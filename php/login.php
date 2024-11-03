<?php
session_start();
require 'php/db.php'; // Kết nối cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Kiểm tra nếu các trường không trống
    if (empty($email) || empty($password)) {
        echo '<div class="noti bg-fail"><p>Vui lòng nhập đủ thông tin</p></div>';
    } else {
        // Tìm người dùng trong cơ sở dữ liệu
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        // Kiểm tra xem mật khẩu có đúng không
        if ($user && password_verify($password, $user['password'])) {
            // Đăng nhập thành công, lưu thông tin vào session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role']; // Lưu vai trò vào session

            // Chuyển hướng người dùng dựa trên vai trò
            switch ($user['role']) {
                case 'admin':
                    header('Location: quan_tri_vien/home.php');
                    break;
                case 'teacher':
                    header('Location: giang_vien/home.php');
                    break;
                case 'student':
                    header('Location: sinh_vien/home.php');
                    break;
                default:
                    echo '<div class="noti bg-fail"><p>Vai trò không hợp lệ.</p></div>';
                    session_unset();
                    session_destroy();
                    break;
            }
            exit();
        } else {
            echo '<div class="noti bg-fail"><p>Email hoặc mật khẩu không đúng!</p></div>';
        }
    }
}
?>