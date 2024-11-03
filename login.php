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
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Học Nhanh</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400..900;1,400..900&display=swap');
        </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>


    <main>
        <div class="introduction row-wrap center-x">
            <div class="left-side flex1-1   ">
                <h1>Fast Learn <sup><span class="material-symbols-outlined">
                    copyright
                    </span></sup></h1>
                <i>Nơi Kết Nối Sinh Viên Với Khóa Học Chất Lượng, Tăng Tốc Tri Thức Để Đạt Đỉnh Cao!</i>
                
            </div>
            <div class="right-side flex1-1">
                <h3>Welcome to FastLearn👋</h3>
                <p>Vui lòng đăng nhập để có thể sử dụng dịch vụ</p>
                <div class="noti bg-success" style="display: none;">
                    <p>Đăng nhập thành công</p>
                </div>
                    <form action="login.php" method="POST">
                        <div>
                            <label for="login-email">Email</label>
                            <input id="login-email" type="text" name="email" class="default-input" placeholder="example@gmail.com">
                        </div>
                        <div>
                            <label for="login-password">Mật khẩu</label>
                            <div class="row center-x password-input">
                                <input id="login-password" class="" type="password" name="password" placeholder="●●●●●●●●" required>
                                <span class="material-symbols-outlined password-icon">
                                    visibility_off
                                </span>
                            </div>
                        </div>
                        <div>
                        <label for="role">Vai trò</label>
                            <div class="default">
                            <select name="role" id="role" required>
                            <option>---Chọn---</option>    
                            <option value="admin"> Quản trị viên</option>
                            <option value="teacher">Giảng viên</option>
                            <option value="student">Sinh viên</option>
                            </select>
                            </div>
                        </div>
                        <a href="" class="forgot">Quên mật khẩu?</a>
                        <button type="submit">Đăng nhập</button>
                    </form>
                    <a href="./register.php" class="center-x" style="font-size: var(--px-13);">Chưa có tài khoản? Đăng kí ngay</a>
                </div>
            </div>
        </div>
    
        
    </main>

    <script src="../assets/js/scrollNav.js"></script>  
    <script src="../assets/js/darkMode.js"></script>
    <script>
        var role = document.getElementById('role');
        role.addEventListener('change', () => {
            const roleValue = role.value;
            if (!roleValue) alert('Vui lòng chọn loại tài khoản.');
           
        })
    </script>
    <script class="showPasswordFeature">
        const passwordInput = document.querySelector('.password-input input');
        const eyeIcon = document.querySelector('.material-symbols-outlined.password-icon');
        eyeIcon.addEventListener('click', () => {
            passwordInput.type = passwordInput.type === 'password'? 'text' : 'password';
            eyeIcon.textContent = eyeIcon.textContent === 'visibility'? 'visibility_off' : 'visibility';
        })
    </script>
</body>
</html>
