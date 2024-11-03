
<?php
session_start();
require '../php/db.php';

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
    <link rel="stylesheet" href="../assets/css/quan_tri_vien_account.css">

</head>

<body>
    <div class="black-screen"></div>
    <nav>
        <ul class="row">
            <li class="first-span"><a href="courses.php"><span class=" material-symbols-outlined">folder_special</span></a></li>
            <li class="active"><a href="account.php"><span class="material-symbols-outlined">person</span></a></li>
            <li><a href="home.php"><span class="material-symbols-outlined">home</span></a></li>
            <li><a href="support.php"><span class="material-symbols-outlined">call_quality</span></a></li>
            <li><a href="setting.php"><span class="material-symbols-outlined">settings</span></a></li>
        </ul>
    </nav>

    <main class="row">

        <div class="container-add-user box-show">
            <div class="mg-10">
                <h3>Tạo tài khoản</h3>
                <form action="../php/add_account.php" method="POST" enctype="multipart/form-data" style="margin-top: 10px;" class="row">
                    <div class="col w-100pc">


                        <input class="default-input role-js" name="role" list="role" type="text" placeholder="Vai trò" required>
                        <datalist id="role">
                            <option value="teacher">Giảng viên</option>
                            <option value="student">Sinh viên</option>
                            <option value="admin">Quản trị viên</option>
                        </datalist>
                        <input class="default-input" type="email" name="email" placeholder="Email đăng nhập" required>
                        <div class="row center-x password-input">
                            <input class="" type="password" name="password" placeholder="Mật khẩu" required>
                            <span class="material-symbols-outlined password-icon">
                                visibility_off
                            </span>
                        </div>

                        <div class="form-SV" hidden>
                            <div class="row mg-t-10 gap-10">
                                <div class="row flex1-1">
                                    <input class="default-input" name="fullname" type="text" placeholder="Họ và tên">
                                </div>
                                <div class="col flex1-1">
                                    <input class="default-input" name="msv" type="text" placeholder="Mã sinh viên">
                                </div>
                                <div class="col flex1-1">
                                    <input class="default-input" name="classSV" list="classSV" type="text" placeholder="Lớp">
                                    <datalist id="classSV">
                                        <option value="CNTTA"></option>
                                        <option value="CNTTB"></option>
                                        <option value="CNTTC"></option>
                                        <option value="CNTTD"></option>
                                    </datalist>
                                </div>
                                <div class="col flex1-1">
                                    <input class="default-input" name="khoaSV" list="khoaSV" type="text" placeholder="Khóa">
                                    <datalist id="khoaSV">
                                        <option value="K69"></option>
                                        <option value="K68"></option>
                                        <option value="K67"></option>
                                        <option value="K66"></option>
                                    </datalist>
                                </div>
                            </div>
                            <input class="default-input" name="phone" type="text" placeholder="Số điện thoại">
                        </div>

                        <div class="form-GV" hidden>
                            <div class="row mg-t-10 gap-10">
                                <div class="col flex1-1">
                                    <input class="default-input" name="fullname" type="text" placeholder="Họ và tên" required>
                                </div>
                                <div class="col flex1-1">
                                    <input class="default-input" name="classGV" list="classGV" type="text" placeholder="Chuyên ngành" required>
                                    <datalist id="classGV">
                                        <option value="Công nghệ thông tin"></option>
                                        <option value="Thương mại điện tử"></option>
                                        <option value="Logistic"></option>
                                        <option value="Quản lí nhà đất"></option>
                                    </datalist>
                                </div>
                            </div>
                            <input class="default-input" name="phone" type="text" placeholder="Số điện thoại">
                        </div>

                        <div class="ctn-btn row-wrap gap-10 mg-t-10">
                            <button type="reset" class="delData"><span class="material-symbols-outlined">
                                    delete
                                </span>Xóa dữ liệu</button>
                            <button class="createAll"><span class="material-symbols-outlined">
                                    upload_file
                                </span>FILE Tạo hàng loạt</button>
                            <button type="submit"><span class="material-symbols-outlined">
                                    how_to_reg
                                </span>Tạo ngay</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container-info-user box-show">
            <div class="mg-10">
                <form action="">
                    <h3>Thông tin người dùng</h3>
                    <div class="info-user-GV info-user row-wrap">
                        <img src="../assets/img/GV-toan-cao-cap.jpg" alt="" srcset="">
                        <div class="mg-10 flex1-1" style="padding-top: 0;">
                            <div class="row-wrap flex1-1 gap-10">
                                <div class="col flex1-1">
                                    <label for="info-user-hvt">Họ và tên</label>
                                    <input class="default-input" type="text" value="Trần Đại Quốc">
                                </div>
                                <div class="col flex1-1">
                                    <label for="info-user-role">Vai trò</label>
                                    <input class="default-input" type="text" value="Giảng viên">
                                </div>
                            </div>
                            <div class="col flex1-1">
                                <label class="add-nganh center-x" for="info-user-nganh">Chuyên ngành<span class="material-symbols-outlined">
                                        add
                                    </span></label>
                                <input type="checkbox" hidden name="" id="info-user-nganh" class="">
                                <input type="text" class="default-input input-add-nganh" hidden list="nganh-GV">
                                <datalist id="nganh-GV">
                                    <option value="CNTT"></option>
                                    <option value="CNTP"></option>
                                    <option value="QLNĐ"></option>
                                </datalist>

                                <div class="box row-wrap gap-10" style="margin: 5px 0px 15px; background-color: var(--cl-light-4);">
                                    <p>CNTT<span class="material-symbols-outlined">
                                            close
                                        </span></p>
                                    <p>QLNĐ<span class="material-symbols-outlined">
                                            close
                                        </span></p>
                                    <p>QTKD<span class="material-symbols-outlined">
                                            close
                                        </span></p>
                                </div>
                            </div>
                            <div class="col flex1-1">
                                <label for="info-user-mail">Email</label>
                                <input class="default-input" id="info-user-mail" type="email" value="Nguyenquocdien99@gmail.com">
                            </div>
                            <div class="col flex1-1">
                                <label for="info-user-phone">Số điện thoại</label>
                                <input class="default-input" id="info-user-phone" type="text" value="0366820888">
                            </div>
                        </div>
                    </div>

                    <div class="ctn-btn row-wrap gap-10 mg-t-10">
                        <button class="ban-account"><span class="material-symbols-outlined">
                                do_not_disturb_on
                            </span>Khóa tài khoản</button>
                        <button type="submit"><span class="material-symbols-outlined">
                                save
                            </span>Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="box">
            <div class="top row space-between box-sticky">
                <div class="box box-sticky flex100-1 br-40">
                    <div class="container-search center-x row">
                        <span class="material-symbols-outlined">
                            search
                        </span>
                        <input type="text" id="searchInput-js" placeholder="Tìm kiếm giảng viên, sinh viên...">
                    </div>
                </div>
                <div class="box box-sticky flex1-1 cursor-pointer  br-40">
                    <span style="color: var(--cl-dark-2);" class="material-symbols-outlined">
                        filter_alt
                    </span>
                </div>
                <div class="box box-sticky flex1-1 cursor-pointer add-user-js br-40">
                    <span style="color: var(--cl-dark-2);" class="material-symbols-outlined">
                        add
                    </span>
                </div>
            </div>

            <div class="container-user row-wrap gap-45  ">
                <div class="container-GV flex1-1">
                    <h3>Giảng viên</h3>
                    <!--  -->
                    <?php
                    // fect data from database
                    $sql = "SELECT * FROM users WHERE role = 'teacher'";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $users = $stmt->fetchAll();
                    foreach ($users as $user) {
                    ?>
                        <div class="card user space-between">
                            <div class="row">
                                <img src="../assets/img/GV2.jpg" alt="" srcset="">
                                <div>
                                    <h4 class="center-x"><?php echo $user['fullname'] ?> <span class="material-symbols-outlined">
                                        verified
                                        </span></h4>
                                    <div class="row nganh">
                                        <p>CNTT</p>
                                        <p>TMĐT</p>
                                    </div>
                                </div>
                            </div>
                            <div class="rating">
                                <span class="star gold" data-value="1">&#9733;</span>
                                <span class="star gold" data-value="2">&#9733;</span>
                                <span class="star gold" data-value="3">&#9733;</span>
                                <span class="star gold" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                            </div>
                        </div>
                    <?php

                    }
                    ?>
                    <!-- <div class="card user space-between">
                        <div class="row">
                            <img src="../assets/img/GV2.jpg" alt="" srcset="">
                            <div>
                                <h4 class="center-x">Trần Quang Dũng <span class="material-symbols-outlined">
                                        verified
                                    </span></h4>
                                <div class="row nganh">
                                    <p>CNTT</p>
                                    <p>TMĐT</p>
                                </div>
                            </div>
                        </div>
                        <div class="rating">
                            <span class="star gold" data-value="1">&#9733;</span>
                            <span class="star gold" data-value="2">&#9733;</span>
                            <span class="star gold" data-value="3">&#9733;</span>
                            <span class="star gold" data-value="4">&#9733;</span>
                            <span class="star" data-value="5">&#9733;</span>
                        </div>
                    </div>

                    <div class="card user space-between">
                        <div class="row">
                            <img src="../assets/img/GV-toan-cao-cap.jpg" alt="" srcset="">
                            <div>
                                <h4 class="center-x">Nguyễn Thị Lan<span class="material-symbols-outlined">
                                        verified
                                    </span></h4>
                                <div class="row nganh">
                                    <p>QTKD</p>
                                    <p>VNH</p>
                                    <p>QLNĐ</p>
                                </div>
                            </div>
                        </div>
                        <div class="rating">
                            <span class="star gold" data-value="1">&#9733;</span>
                            <span class="star gold" data-value="2">&#9733;</span>
                            <span class="star gold" data-value="3">&#9733;</span>
                            <span class="star gold" data-value="4">&#9733;</span>
                            <span class="star" data-value="5">&#9733;</span>
                        </div>
                    </div>
                    <div class="card user space-between">
                        <div class="row">
                            <img src="../assets/img/GV2.jpg" alt="" srcset="">
                            <div>
                                <h4 class="center-x">Ngô Đức Thắng</h4>
                                <div class="row nganh">
                                    <p>CNTT</p>
                                </div>
                            </div>
                        </div>
                        <div class="rating">
                            <div>
                                <span class="star gold" data-value="1">&#9733;</span>
                                <span class="star gold" data-value="2">&#9733;</span>
                                <span class="star gold" data-value="3">&#9733;</span>
                                <span class="star gold" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                            </div>
                            <span class="lock-account material-symbols-outlined">
                                lock
                            </span>
                        </div>
                    </div> -->

                </div>
                <div class="container-SV flex1-1">
                    <h3>Sinh viên</h3>
                    <div class="card user row">
                        <img src="../assets/img/SV.jpeg" alt="" srcset="">
                        <div class="space-between flex1-1 center-x">
                            <div>
                                <h4>Trần Minh Tuệ</h4>
                                <p class="code">Mã SV: 698089</p>
                            </div>
                            <span class="lock-account material-symbols-outlined">
                                lock
                            </span>
                        </div>
                    </div>
                    <div class="card user row">
                        <img src="../assets/img/SV.jpeg" alt="" srcset="">
                        <div>
                            <h4>Trần Minh Tuệ</h4>
                            <p class="code">Mã SV: 698089</p>
                        </div>
                    </div>
                    <div class="card user row">
                        <img src="../assets/img/SV.jpeg" alt="" srcset="">
                        <div>
                            <h4>Trần Minh Tuệ</h4>
                            <p class="code">Mã SV: 698089</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../assets/js/scrollNav.js"></script>
    <script src="../assets/js/darkMode.js"></script>
    <script src="../assets/js/addUser.js"></script>
    <script src="../assets/js/showInfoUser.js"></script>
    <script>
        const roleInput = document.querySelector('.container-add-user .role-js')

        const formSV = document.querySelector('.form-SV')
        const formGV = document.querySelector('.form-GV')
        roleInput.addEventListener('input', () => {
            const role = roleInput.value
            formSV.style.display = 'none'
            formGV.style.display = 'none'
            if (role === 'Giảng viên') {
                formGV.style.display = 'block';
            } else if (role === 'Sinh viên') {
                formSV.style.display = 'block';
            } else if (role === 'Quản trị viên') {
                console.log('AD ')
            }
        })


        ///
        //  check 
        if (role === 'gv') {
            // cho phep hien thi field liên quan den giang vien

        } else if (role === 'sv') {
            // cho phep hien thi field lien quan den sinh vien
            // active 
        }
    </script>
    <script class="searchFeature">
        const searchInput = document.getElementById('searchInput-js');
        searchInput.addEventListener('input', () => {
            const valueSearch = searchInput.value.toLowerCase();
            console.log(valueSearch)
            // Lấy tất cả các thẻ card.user
            const cards = document.querySelectorAll('.container-user .card.user');
            if (valueSearch === "") {
                cards.forEach(card => {
                    card.style.display = "flex";
                });
            } else {
                cards.forEach(card => {
                    const name = card.querySelector('h4').textContent?.split('\n')[0].toLowerCase();
                    console.log(name)
                    if (name.includes(valueSearch)) {
                        card.style.display = "flex";
                    } else {
                        card.style.display = "none";
                    }
                });
            }
        })
    </script>

    <script class="showPasswordFeature">
        const passwordInput = document.querySelector('.password-input input');
        const eyeIcon = document.querySelector('.material-symbols-outlined.password-icon');
        eyeIcon.addEventListener('click', () => {
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
            eyeIcon.textContent = eyeIcon.textContent === 'visibility' ? 'visibility_off' : 'visibility';
        })
    </script>
</body>

</html>