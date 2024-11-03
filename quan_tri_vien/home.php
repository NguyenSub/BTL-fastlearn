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
    <link rel="stylesheet" href="../assets/css/quan_tri_vien_home.css">

</head>
<body>
    <div class="black-screen"></div>
    <nav>
        <ul class="row">
            <li class="first-span"><a href="courses.php"><span class=" material-symbols-outlined">folder_special</span></a></li>
            <li><a href="account.php"><span class="material-symbols-outlined">person</span></a></li>
            <li class="active"><a href="home.php"><span class="material-symbols-outlined">home</span></a></li>
            <li><a href="support.php"><span class="material-symbols-outlined">call_quality</span></a></li>
            <li><a href="setting.php"><span class="material-symbols-outlined">settings</span></a></li>
        </ul>
    </nav>

    <main>
        <div class="box-show container-add-noti">
            <div class="mg-10">
                <h3>Thêm thông báo</h3>
                <form action="">
                    <input type="text" class="default-input" placeholder="Tiêu đề">
                    <textarea style="resize: none;" name="" id="" class="default-input" rows="6" placeholder="Nội dung"></textarea>
                    <button style="float: right;" type="submit">Thêm ngay</button>
                </form>
            </div>
        </div>
        <div class="introduction row-wrap center-x">
            <div class="left-side">
                <h1>Fast Learn <sup><span class="material-symbols-outlined">
                    copyright
                    </span></sup></h1>
                <i>Nơi Kết Nối Sinh Viên Với Khóa Học Chất Lượng, Tăng Tốc Tri Thức Để Đạt Đỉnh Cao!</i>
                <ul>
                    <li><span class="material-symbols-outlined">
                        check_circle
                        </span>
                        Khóa Học Đa Dạng
                    </li>
                    <li><span class="material-symbols-outlined">
                        check_circle
                        </span>
                        Giảng Viên Chất Lượng
                    </li>
                    <li><span class="material-symbols-outlined">
                        check_circle
                        </span>
                        Học Mọi Lúc Mọi Nơi
                    </li>
                    <li><span class="material-symbols-outlined">
                        check_circle
                        </span>
                        Tài Nguyên Học Tập Miễn Phí
                    </li>
                    <li><span class="material-symbols-outlined">
                        check_circle
                        </span>
                        Hỗ Trợ 24/7
                    </li>
                </ul>
            </div>
            <div class="right-side">
                <img src="../assets/img/home.png" alt="">
            </div>
        </div>
    
        <div class="content row-wrap">
            <div class="infomations">
                <div class="row space-between center-x">
                    <h2 class="center-x"><span class="material-symbols-outlined">
                        notifications
                        </span>Thông Báo</h2>
                    <span class="material-symbols-outlined add add-noti-js">
                        add_circle
                        </span>
                </div>

                <div class="card">
                    <div class="header">
                        <h3>Hệ thống khởi chạy</h3>
                        <i class="time">1 phút trước</i>
                    </div>
                    <p>Hệ thống bắt đầu khởi chạy, các sinh viên và giảng viên có thể tạo và đăng kí khóa học ngay trên hệ thống.</p>
                </div>
            </div>
    
            <div class="fast-access">
                <h2 class="center-x"><span class="material-symbols-outlined">
                    link
                    </span>Liên Kết Nhanh</h2>
                <div class="card">
                    <h3><a href="#">Các Khóa Học</a></h3>
                    <p>Đăng ký khóa học và bắt đầu học ngay hôm nay!</p>
                </div>
                <div class="card">
                    <h3><a href="#">Tài Nguyên</a></h3>
                    <p>Truy cập thêm tài liệu để nâng cao việc học của bạn.</p>
                </div>
                <div class="card">
                    <h3><a href="#">Liên Hệ Hỗ Trợ</a></h3>
                    <p>Cần giúp đỡ? Liên hệ với đội ngũ hỗ trợ của chúng tôi.</p>
                </div>
            </div>
        </div>
    </main>

    <script src="../assets/js/scrollNav.js"></script>  
    <script src="../assets/js/darkMode.js"></script>
    <script src="../assets/js/addNoti.js"></script>
</body>
</html>
