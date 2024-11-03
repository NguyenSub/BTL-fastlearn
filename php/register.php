<?php
require 'php/db.php'; // Kết nối đến cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Nhận dữ liệu từ form đăng ký
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $repassword = isset($_POST['repassword']) ? $_POST['repassword'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : 'student';
    $secretCode = isset($_POST['secret_code']) ? $_POST['secret_code'] : '';

    // Kiểm tra xem các trường có rỗng không
    if (empty($email) || empty($password) || empty($repassword)) {
        echo '<div class="noti bg-fail"><p>Vui lòng nhập đủ thông tin</p></div>';
    } elseif ($password !== $repassword) {
        echo '<div class="noti bg-fail"><p>Mật khẩu không khớp</p></div>';
    } else {
        // Nếu người dùng là admin hoặc teacher, yêu cầu mã bí mật
        if ($role === 'admin' || $role === 'teacher') {
            if (empty($secretCode)) {
                echo '<div class="noti bg-fail"><p>Vui lòng nhập mã bí mật</p></div>';
                exit;
            }
        }

        // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay chưa
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user) {
            echo '<div class="noti bg-fail"><p>Email đã được sử dụng</p></div>';
        } else {
            // Mã hóa mật khẩu trước khi lưu
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Thêm người dùng mới vào cơ sở dữ liệu
            $stmt = $pdo->prepare('INSERT INTO users (email, password, role, secret_code) VALUES (:email, :password, :role, :secret_code)');
            $stmt->execute([
                'email' => $email,
                'password' => $hashedPassword,
                'role' => $role,
                'secret_code' => $secretCode
            ]);

            echo '<div class="noti bg-success"><p>Đăng ký thành công</p></div>';
            header('Location: login.php');
            exit;
        }
    }
}
?>
