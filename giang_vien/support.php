<?php
session_start();
require '../php/db.php'; // Kết nối cơ sở dữ liệu
require '../php/session.php'; // Kiểm tra xem người dùng đã đăng nhập chưa

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $title = htmlspecialchars(trim($_POST['title']));
    $content = htmlspecialchars(trim($_POST['content']));

    // Kiểm tra nội dung form
    if (!empty($title) && !empty($content)) {
        // Lưu thông tin vào bảng feedback
        $stmt = $pdo->prepare("INSERT INTO feedback (user_id, title, content) VALUES (:user_id, :title, :content)");
        $stmt->execute([':user_id' => $user_id, ':title' => $title, ':content' => $content]);

        $_SESSION['message'] = "Cảm ơn bạn đã góp ý!";
    } else {
        $_SESSION['message'] = "Vui lòng điền đủ tiêu đề và nội dung.";
    }

    // Chuyển hướng lại trang hỗ trợ
    header('Location: support.php');
    exit();
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
    <link rel="stylesheet" href="../assets/css/giang_vien_support.css">

</head>
<body>
    
    <nav>
        <ul class="row">
            <li class="first-span"><a href="courses.php"><span class=" material-symbols-outlined">folder_special</span></a></li>
            <li><a href="account.php"><span class="material-symbols-outlined">person</span></a></li>
            <li ><a href="home.php"><span class="material-symbols-outlined">home</span></a></li>
            <li class="active"><a  href="support.php"><span class="material-symbols-outlined">call_quality</span></a></li>
            <li><a href="setting.php"><span class="material-symbols-outlined">settings</span></a></li>
        </ul>
    </nav>

    <main>
        <div class="left-side flex2-1 gap10px col">
            <div class="box ">
                <h3 style="margin-bottom: 10px;">Những Câu Hỏi Thường Gặp</h3>
                <div class="container-card">
                    <div class="card">
                        <p>Làm thế nào để đăng kí khóa học?</p>
                        <div class="answer">
                            <p>Vui lòng nhấn vào <a href="courses.php">ĐÂY</a>, sau đó SV có thể đăng kí khóa học phù hợp</p>
                        </div>
                    </div>
                    <div class="card">
                        <p>Làm thế nào để thay đổi mật khẩu?</p>
                        <div class="answer">
                            <p>Vui lòng nhấn vào <a href="account.php">ĐÂY</a>, sau đó làm theo các bước để đổi mật khẩu</p>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="box">
                <h3 style="margin-bottom: 10px;">Liên Hệ</h3>
                <div class="container gap10px row">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119229.63058603181!2d105.75093457618411!3d20.95548845975758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3f57fc23d1%3A0xf813dfd05dfa4078!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBUaOG7pyDEkcO0IEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1727167063628!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="box-green">
                        <p class="center-x"><span class="material-symbols-outlined">
                            location_on
                            </span> 98 phố Dương Quảng Hàm, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam</p>
                        <p class="center-x"><span class="material-symbols-outlined">
                            call
                            </span> 02438330708</p>
                        <p class="center-x"><span class="material-symbols-outlined">
                            mail
                            </span>banbientap@hnmu.edu.vn</p>
                    </div>
                </div>

            </div>
         
        </div>
        <div class="right-side flex1-1" >
            <div class="box ">
                <h3>Gớp Ý & Báo Lỗi</h3>
                <form action="support.php" method="POST">
                    <div class="label-input">
                        <input type="text" id="form-title" placeholder=" ">
                        <label for="form-title">Tiêu đề</label>
                    </div>
                    <div class="label-input">
                        <textarea name="" id="form-content" placeholder=" " rows="5" ></textarea>
                        <label for="form-content">Nội dung</label>
                    </div>
                    <button type="submit">Gửi đi</button>
                </form>
            </div>
        </div>
        
    </main>
    <script>
        const questions = document.querySelectorAll('.container-card .card');
    
        questions.forEach((question) => {
            question.addEventListener('click', (event) => {
                // Ngăn chặn sự kiện click từ việc truyền lên container
                event.stopPropagation();
                // Ẩn tất cả các câu trả lời
                questions.forEach((q) => {
                    const answer = q.querySelector('.answer');
                    if (answer) {
                        answer.style.display = 'none';
                    }
                });
                // Hiện câu trả lời cho card đã click
                const answer = question.querySelector('.answer');
                if (answer) {
                    answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
                }
            });
        });
    
        // Khi click ra bên ngoài card
        document.addEventListener('click', () => {
            questions.forEach((question) => {
                const answer = question.querySelector('.answer');
                if (answer) {
                    answer.style.display = 'none';
                }
            });
        });
    </script>
    <script src="../assets/js/scrollNav.js"></script>  
    <script src="../assets/js/darkMode.js"></script>
</body>
</html>
