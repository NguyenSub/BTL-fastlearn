z<?php
require '../php/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    logout(); // Gọi hàm đăng xuất trong session.php
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
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/sinh_vien_setting.css">

</head>
<body>
    
    <nav>
        <ul class="row">
            <li class="first-span"><a href="courses.php"><span class=" material-symbols-outlined">folder_special</span></a></li>
            <li ><a href="account.php"><span class="material-symbols-outlined">person</span></a></li>
            <li ><a href="home.php"><span class="material-symbols-outlined">home</span></a></li>
            <li><a href="support.php"><span class="material-symbols-outlined">call_quality</span></a></li>
            <li class="active"><a href="setting.php"><span class="material-symbols-outlined">settings</span></a></li>
        </ul>
    </nav>

    <main class="row">
        <div class="box">
            <div class="container">
             
                <div class="card">
                    <div class="feature row center-x">
                        <p>Chế độ tối</p>
                        <label class="switch">
                            <input id="check_dark-mode"  type="checkbox">
                            <div class="slider">
                                <div class="circle">
                                    <svg class="cross" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 365.696 365.696" y="0" x="0" height="6" width="6" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path data-original="#000000" fill="currentColor" d="M243.188 182.86 356.32 69.726c12.5-12.5 12.5-32.766 0-45.247L341.238 9.398c-12.504-12.503-32.77-12.503-45.25 0L182.86 122.528 69.727 9.374c-12.5-12.5-32.766-12.5-45.247 0L9.375 24.457c-12.5 12.504-12.5 32.77 0 45.25l113.152 113.152L9.398 295.99c-12.503 12.503-12.503 32.769 0 45.25L24.48 356.32c12.5 12.5 32.766 12.5 45.247 0l113.132-113.132L295.99 356.32c12.503 12.5 32.769 12.5 45.25 0l15.081-15.082c12.5-12.504 12.5-32.77 0-45.25zm0 0"></path>
                                        </g>
                                    </svg>
                                    <svg class="checkmark" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 24 24" y="0" x="0" height="10" width="10" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path class="" data-original="#000000" fill="currentColor" d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="card">
                    <div class="feature row center-x">
                        <p>Nhận thông báo về Email</p>
                        <label class="switch">
                            <input  type="checkbox">
                            <div class="slider">
                                <div class="circle">
                                    <svg class="cross" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 365.696 365.696" y="0" x="0" height="6" width="6" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path data-original="#000000" fill="currentColor" d="M243.188 182.86 356.32 69.726c12.5-12.5 12.5-32.766 0-45.247L341.238 9.398c-12.504-12.503-32.77-12.503-45.25 0L182.86 122.528 69.727 9.374c-12.5-12.5-32.766-12.5-45.247 0L9.375 24.457c-12.5 12.504-12.5 32.77 0 45.25l113.152 113.152L9.398 295.99c-12.503 12.503-12.503 32.769 0 45.25L24.48 356.32c12.5 12.5 32.766 12.5 45.247 0l113.132-113.132L295.99 356.32c12.503 12.5 32.769 12.5 45.25 0l15.081-15.082c12.5-12.504 12.5-32.77 0-45.25zm0 0"></path>
                                        </g>
                                    </svg>
                                    <svg class="checkmark" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 24 24" y="0" x="0" height="10" width="10" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path class="" data-original="#000000" fill="currentColor" d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="card">
                    <form method="POST" action="">
                        <button type="submit" name="logout">Đăng xuất</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="../assets/js/scrollNav.js"></script>    
    <script async>
        const checkbox = document.getElementById('check_dark-mode');

        // Lấy màu từ CSS
        const darkColor1 = getComputedStyle(document.documentElement).getPropertyValue('--cl-dark-1');
        const darkColor2 = getComputedStyle(document.documentElement).getPropertyValue('--cl-dark-2');
        const lightColor1 = getComputedStyle(document.documentElement).getPropertyValue('--cl-light-1');
        const lightColor2 = getComputedStyle(document.documentElement).getPropertyValue('--cl-light-2');
        const darkBoxShadow1 = getComputedStyle(document.documentElement).getPropertyValue('--cl-dark-box-shadow');
        const darkBoxShadow2 = getComputedStyle(document.documentElement).getPropertyValue('--cl-dark-box-shadow-2');

        // Kiểm tra trạng thái darkMode từ localStorage khi tải trang
        const isDarkMode = JSON.parse(localStorage.getItem('darkMode'));
        if (isDarkMode) {
            checkbox.checked = true; // Đánh dấu checkbox
            document.documentElement.style.setProperty('--cl-light-1', 'rgb(49 49 49)');
    document.documentElement.style.setProperty('--cl-light-bg', '#222');
    document.documentElement.style.setProperty('--cl-light-2', 'rgb(49 49 49)');
    document.documentElement.style.setProperty('--cl-light-3', '#454545');
    document.documentElement.style.setProperty('--cl-light-4', 'rgb(80 80 80)');
    document.documentElement.style.setProperty('--cl-light-box-shadow', 'rgb(90 90 90 / 50%)');
    document.documentElement.style.setProperty('--cl-dark-1', lightColor1);
    document.documentElement.style.setProperty('--cl-dark-2', lightColor2);
        }

        // Thêm sự kiện thay đổi cho checkbox
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                // Bật chế độ tối
                localStorage.setItem('darkMode', JSON.stringify(true));
                document.documentElement.style.setProperty('--cl-light-1', darkColor1);
                document.documentElement.style.setProperty('--cl-light-box-shadow', 'rgb(255 255 255 / 10%)');
                document.documentElement.style.setProperty('--cl-dark-2', lightColor1);
            } else {
                // Tắt chế độ tối
                localStorage.setItem('darkMode', JSON.stringify(false));
                document.documentElement.style.setProperty('--cl-light-1', lightColor1);
                document.documentElement.style.setProperty('--cl-light-box-shadow', 'rgb(255 255 255 / 10%)');
                document.documentElement.style.setProperty('--cl-dark-2', darkColor2);
            }
        });


    </script>

</body>
</html>
