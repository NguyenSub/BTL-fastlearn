<?php
require 'php/db.php'; // Kết nối đến cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Nhận dữ liệu từ form đăng ký
    $fullname = isset($_POST['fullname']);
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
            $stmt = $pdo->prepare('INSERT INTO users (fullname,email, password, role, secret_code) VALUES (:fullname, :email, :password, :role, :secret_code)');
            $stmt->execute([
                'fullname'=>$fullname,
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
    <link rel="stylesheet" href="assets/css/register.css">
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
                <p>Vui lòng đăng ký để có thể sử dụng dịch vụ</p>
                <div class="noti bg-success" style="display: none;">
                    <p>Đăng nhập thành công</p>
                </div>
                <div class="container-form">
                    <div class="ctn-social-network">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
                            <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"></path><path fill="#fff" d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z"></path>
                            </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
                            <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                            </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
                            <path fill="#2962ff" d="M15,36V6.827l-1.211-0.811C8.64,8.083,5,13.112,5,19v10c0,7.732,6.268,14,14,14h10	c4.722,0,8.883-2.348,11.417-5.931V36H15z"></path><path fill="#eee" d="M29,5H19c-1.845,0-3.601,0.366-5.214,1.014C10.453,9.25,8,14.528,8,19	c0,6.771,0.936,10.735,3.712,14.607c0.216,0.301,0.357,0.653,0.376,1.022c0.043,0.835-0.129,2.365-1.634,3.742	c-0.162,0.148-0.059,0.419,0.16,0.428c0.942,0.041,2.843-0.014,4.797-0.877c0.557-0.246,1.191-0.203,1.729,0.083	C20.453,39.764,24.333,40,28,40c4.676,0,9.339-1.04,12.417-2.916C42.038,34.799,43,32.014,43,29V19C43,11.268,36.732,5,29,5z"></path><path fill="#2962ff" d="M36.75,27C34.683,27,33,25.317,33,23.25s1.683-3.75,3.75-3.75s3.75,1.683,3.75,3.75	S38.817,27,36.75,27z M36.75,21c-1.24,0-2.25,1.01-2.25,2.25s1.01,2.25,2.25,2.25S39,24.49,39,23.25S37.99,21,36.75,21z"></path><path fill="#2962ff" d="M31.5,27h-1c-0.276,0-0.5-0.224-0.5-0.5V18h1.5V27z"></path><path fill="#2962ff" d="M27,19.75v0.519c-0.629-0.476-1.403-0.769-2.25-0.769c-2.067,0-3.75,1.683-3.75,3.75	S22.683,27,24.75,27c0.847,0,1.621-0.293,2.25-0.769V26.5c0,0.276,0.224,0.5,0.5,0.5h1v-7.25H27z M24.75,25.5	c-1.24,0-2.25-1.01-2.25-2.25S23.51,21,24.75,21S27,22.01,27,23.25S25.99,25.5,24.75,25.5z"></path><path fill="#2962ff" d="M21.25,18h-8v1.5h5.321L13,26h0.026c-0.163,0.211-0.276,0.463-0.276,0.75V27h7.5	c0.276,0,0.5-0.224,0.5-0.5v-1h-5.321L21,19h-0.026c0.163-0.211,0.276-0.463,0.276-0.75V18z"></path>
                            </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 32 32">
                            <path fill-rule="evenodd" d="M 16 4 C 9.371094 4 4 9.371094 4 16 C 4 21.300781 7.4375 25.800781 12.207031 27.386719 C 12.808594 27.496094 13.027344 27.128906 13.027344 26.808594 C 13.027344 26.523438 13.015625 25.769531 13.011719 24.769531 C 9.671875 25.492188 8.96875 23.160156 8.96875 23.160156 C 8.421875 21.773438 7.636719 21.402344 7.636719 21.402344 C 6.546875 20.660156 7.71875 20.675781 7.71875 20.675781 C 8.921875 20.761719 9.554688 21.910156 9.554688 21.910156 C 10.625 23.746094 12.363281 23.214844 13.046875 22.910156 C 13.15625 22.132813 13.46875 21.605469 13.808594 21.304688 C 11.144531 21.003906 8.34375 19.972656 8.34375 15.375 C 8.34375 14.0625 8.8125 12.992188 9.578125 12.152344 C 9.457031 11.851563 9.042969 10.628906 9.695313 8.976563 C 9.695313 8.976563 10.703125 8.65625 12.996094 10.207031 C 13.953125 9.941406 14.980469 9.808594 16 9.804688 C 17.019531 9.808594 18.046875 9.941406 19.003906 10.207031 C 21.296875 8.65625 22.300781 8.976563 22.300781 8.976563 C 22.957031 10.628906 22.546875 11.851563 22.421875 12.152344 C 23.191406 12.992188 23.652344 14.0625 23.652344 15.375 C 23.652344 19.984375 20.847656 20.996094 18.175781 21.296875 C 18.605469 21.664063 18.988281 22.398438 18.988281 23.515625 C 18.988281 25.121094 18.976563 26.414063 18.976563 26.808594 C 18.976563 27.128906 19.191406 27.503906 19.800781 27.386719 C 24.566406 25.796875 28 21.300781 28 16 C 28 9.371094 22.628906 4 16 4 Z"></path>
                            </svg>
                    </div>
                    <div class="ctn-or">
                        <div class="line"></div>
                        <p>or</p>
                    </div>
                    <form action="register.php" method="POST">
                        <div>
                            <label for="login-email">Fullname</label>
                            <input id="login-email" type="text" name="fullname" class="default-input" required>
                        </div>
                        <div>
                            <label for="login-email">Email</label>
                            <input id="login-email" type="email" name="email" class="default-input" placeholder="example@gmail.com" required>
                        </div>
                        <div>
                            <label for="login-password">Mật khẩu</label>
                            <div class="row center-x password-input">
                                <input id="login-password" class="" type="password" name="password" placeholder="●●●●●●●●" required>
                                <span class="material-symbols-outlined password-icon">
                                    visibility_off
                                </span>
                            </div>
                            <label for="login-repassword">Nhập lại mật khẩu</label>
                            <div class="row center-x password-input">
                                <input id="login-repassword" class="" type="password" name="repassword" placeholder="●●●●●●●●" required>
                                <span class="material-symbols-outlined password-icon-repass">
                                    visibility_off
                                </span>
                            </div>
                        <div>
                            <label for="role">Vai trò</label>
                            <select name="role" id="role" required onchange="toggleSecretCode()">
                            <option value="admin"> Quản trị viên</option>
                            <option value="teacher">Giảng viên</option>
                            <option value="student">Sinh viên</option>
                            </select>
                        </div>
                            <div id="secret-code-div" style="display: none;">
                            <label for="secret-code">Mã bí mật:</label>
                            <input id="secret-code" type="password" name="secret_code" placeholder="Mã bí mật cho quản trị viên hoặc giáo viên">
                        </div>
                        <button type="submit">Đăng ký</button>
                    </form>
                    <a href="login.php" class="center-x" style="font-size: var(--px-13);">Đã có tài khoản? Đăng nhập ngay</a>
                </div>
            </div>
        </div>
    
        
    </main>

    <script src="../assets/js/scrollNav.js"></script>  
    <script src="../assets/js/darkMode.js"></script>
    <script class="showPasswordFeature">

        const passwordInput = document.querySelector('.password-input input');
        const eyeIcon = document.querySelector('.material-symbols-outlined.password-icon');
        eyeIcon.addEventListener('click', () => {
            passwordInput.type = passwordInput.type === 'password'? 'text' : 'password';
            eyeIcon.textContent = eyeIcon.textContent === 'visibility'? 'visibility_off' : 'visibility';
        })

        const repasswordInput = document.querySelector('.password-input input#login-repassword');
        const eyeIconRe = document.querySelector('.material-symbols-outlined.password-icon-repass');
        eyeIconRe.addEventListener('click', () => {
            repasswordInput.type = repasswordInput.type === 'password'? 'text' : 'password';
            eyeIconRe.textContent = eyeIconRe.textContent === 'visibility'? 'visibility_off' : 'visibility';
        })
        function toggleSecretCode() {
        const role = document.getElementById('role').value;
        const secretCodeDiv = document.getElementById('secret-code-div');
        
        // Hiện thị trường Mã bí mật nếu vai trò là admin hoặc teacher
        if (role === 'admin' || role === 'teacher') {
            secretCodeDiv.style.display = 'block';
        } else {
            secretCodeDiv.style.display = 'none';
        }
    }
    </script>
</body>
</html>
