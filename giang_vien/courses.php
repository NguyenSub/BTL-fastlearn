<?php
require '../php/db.php';
session_start();
$stmt = $pdo->prepare("SELECT * FROM courses ORDER BY course_name");
$stmt->execute();
$courses = $stmt->fetchAll();
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
    <link rel="stylesheet" href="../assets/css/giang_vien_courses.css">

</head>
<body>
    <div class="black-screen">
    </div>
    <nav>
        <ul class="row">
            <li class="first-span active"><a href="courses.php"><span class=" material-symbols-outlined">folder_special</span></a></li>
            <li ><a href="account.php"><span class="material-symbols-outlined">person</span></a></li>
            <li ><a href="home.php"><span class="material-symbols-outlined">home</span></a></li>
            <li><a href="support.php"><span class="material-symbols-outlined">call_quality</span></a></li>
            <li><a href="setting.php"><span class="material-symbols-outlined">settings</span></a></li>
        </ul>
    </nav>

    <main class="row">
    <div class="container-add-course box-show">
        <div class="mg-10">
            <div class="author space-between">
                <div class="row center-x">
                    <img src="../assets/img/anh-co-dinh.jpg" alt="">
                    <b class="mg-l-10">Giảng viên</b>
                </div>
                <div class="close center-x">
                    <span class="closeButton-ctn-add-course-js material-symbols-outlined">close</span>
                </div>
            </div>
            <div class="decriptions">
                <form action="../php/add_course.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="course_name" placeholder="Tên khóa học" required>
                    <textarea name="description" rows="7" placeholder="Mô tả về khóa học..."></textarea>
                    <div class="space-between row-wrap">
                        <div class="label-input">
                            <input type="file" name="image" id="image-course">
                            <label for="image-course" class="center-x"><span class="material-symbols-outlined">upload</span>UPLOAD ảnh của khóa học</label>
                        </div>
                        <div class="label-input">
                            <input type="file" name="document" id="doc-course">
                            <label for="doc-course" class="center-x"><span class="material-symbols-outlined">upload</span>UPLOAD tài liệu của khóa học</label>
                        </div>
                    </div>
                    <input type="text" name="price" id="price-course" placeholder="Giá tiền">
                    <button type="submit">Tạo Ngay</button>
                </form>
            </div>
        </div>
    </div>
        <!-- show -->
<?php 
    // Fetch data from database
    $sql = "SELECT * FROM courses";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $courses = $stmt->fetchAll();
    foreach ($courses as $course) { ?> 
        <div class="detail-course box-show" id="course-<?php echo $course['id']; ?>">
            <div class="mg-10">
                <div class="author space-between">
                    <div class="row">
                        <img src="../assets/img/anh-co-dinh.jpg" alt="">
                        <div class="mg-l-10">
                            <b>Giảng viên</b>
                            <p>1 giờ</p>
                        </div>
                    </div>
                    <div class="close center-x">
                        <span class="closeButton-detailCourse-js material-symbols-outlined">close</span>
                    </div>
                </div>
                <div class="decriptions">
                    <p><?php echo $course['description']; ?></p>
                </div>
                <div class="course-thumnail">
                <div class="card card-course-js" data-id="<?php echo $course['id']; ?>">
                        <div class="sub-detail row space-between">
                            <p class="price"><?php echo number_format($course['price'], 0, ',', '.') . " VND"; ?></p>
                            <div class="rating">
                                <span class="star gold" data-value="1">&#9733;</span>
                                <span class="star gold" data-value="2">&#9733;</span>
                                <span class="star gold" data-value="3">&#9733;</span>
                                <span class="star gold" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                            </div>
                        </div>
                        <div class="ctn-img">
                            <img src="<?php echo "../php/image/course/".$course['image_path']; ?>" alt="">
                        </div>
                        <div class="card-content">
                            <h4><?php echo $course['course_name']; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="show-imotion">
                    <div class="heart row">
                        <svg fill='none' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'>
                            <g clip-path='url(#clip0_15251_63610)'>
                                <path
                                    d='M15.9963 8c0 4.4179-3.5811 7.9993-7.9986 7.9993-4.4176 0-7.9987-3.5814-7.9987-7.9992 0-4.4179 3.5811-7.9992 7.9987-7.9992 4.4175 0 7.9986 3.5813 7.9986 7.9992Z'
                                    fill='url(#paint0_linear_15251_63610)' />
                                <path
                                    d='M15.9973 7.9992c0 4.4178-3.5811 7.9992-7.9987 7.9992C3.5811 15.9984 0 12.417 0 7.9992S3.5811 0 7.9986 0c4.4176 0 7.9987 3.5814 7.9987 7.9992Z'
                                    fill='url(#paint1_radial_15251_63610)' />
                                <path
                                    d='M7.9996 5.9081c-.3528-.8845-1.1936-1.507-2.1748-1.507-1.4323 0-2.4254 1.328-2.4254 2.6797 0 2.2718 2.3938 4.0094 4.0816 5.1589.3168.2157.7205.2157 1.0373 0 1.6878-1.1495 4.0815-2.8871 4.0815-5.159 0-1.3517-.993-2.6796-2.4254-2.6796-.9811 0-1.822.6225-2.1748 1.507Z'
                                    fill='#fff' />
                            </g>
                            <defs>
                                <radialGradient id='paint1_radial_15251_63610' cx='0' cy='0' r='1'
                                    gradientUnits='userSpaceOnUse'
                                    gradientTransform='matrix(0 7.9992 -7.99863 0 7.9986 7.9992)'>
                                    <stop offset='.5637' stop-color='#E11731' stop-opacity='0' />
                                    <stop offset='1' stop-color='#E11731' stop-opacity='.1' />
                                </radialGradient>
                                <linearGradient id='paint0_linear_15251_63610' x1='2.3986' y1='2.4007' x2='13.5975'
                                    y2='13.5993' gradientUnits='userSpaceOnUse'>
                                    <stop stop-color='#FF74AE' />
                                    <stop offset='.5001' stop-color='#FA2E3E' />
                                    <stop offset='1' stop-color='#FF5758' />
                                </linearGradient>
                                <clipPath id='clip0_15251_63610'>
                                    <path fill='#fff' d='M-.001.0009h15.9992v15.9984H-.001z' />
                                </clipPath>
                            </defs>
                        </svg>
                        <p>120</p>
                    </div>
                    <div class="cmt-share row">
                        <p>12 bình luận</p>
                        <p>3 lượt chia sẻ</p>
                    </div>
                </div>
                <div class="ctn-action">
                    <div class="item heart row center-x">
                        <svg fill='none' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'>
                            <g clip-path='url(#clip0_15251_63610)'>
                                <path
                                    d='M15.9963 8c0 4.4179-3.5811 7.9993-7.9986 7.9993-4.4176 0-7.9987-3.5814-7.9987-7.9992 0-4.4179 3.5811-7.9992 7.9987-7.9992 4.4175 0 7.9986 3.5813 7.9986 7.9992Z'
                                    fill='url(#paint0_linear_15251_63610)' />
                                <path
                                    d='M15.9973 7.9992c0 4.4178-3.5811 7.9992-7.9987 7.9992C3.5811 15.9984 0 12.417 0 7.9992S3.5811 0 7.9986 0c4.4176 0 7.9987 3.5814 7.9987 7.9992Z'
                                    fill='url(#paint1_radial_15251_63610)' />
                                <path
                                    d='M7.9996 5.9081c-.3528-.8845-1.1936-1.507-2.1748-1.507-1.4323 0-2.4254 1.328-2.4254 2.6797 0 2.2718 2.3938 4.0094 4.0816 5.1589.3168.2157.7205.2157 1.0373 0 1.6878-1.1495 4.0815-2.8871 4.0815-5.159 0-1.3517-.993-2.6796-2.4254-2.6796-.9811 0-1.822.6225-2.1748 1.507Z'
                                    fill='#fff' />
                            </g>
                            <defs>
                                <radialGradient id='paint1_radial_15251_63610' cx='0' cy='0' r='1'
                                    gradientUnits='userSpaceOnUse'
                                    gradientTransform='matrix(0 7.9992 -7.99863 0 7.9986 7.9992)'>
                                    <stop offset='.5637' stop-color='#E11731' stop-opacity='0' />
                                    <stop offset='1' stop-color='#E11731' stop-opacity='.1' />
                                </radialGradient>
                                <linearGradient id='paint0_linear_15251_63610' x1='2.3986' y1='2.4007' x2='13.5975'
                                    y2='13.5993' gradientUnits='userSpaceOnUse'>
                                    <stop stop-color='#FF74AE' />
                                    <stop offset='.5001' stop-color='#FA2E3E' />
                                    <stop offset='1' stop-color='#FF5758' />
                                </linearGradient>
                                <clipPath id='clip0_15251_63610'>
                                    <path fill='#fff' d='M-.001.0009h15.9992v15.9984H-.001z' />
                                </clipPath>
                            </defs>
                        </svg>
                        <p>Yêu thích</p>
                    </div>
                    <label for="check-action-cmt" class="item comment row center-x">
                        <span class="material-symbols-outlined">
                            mode_comment
                        </span>
                        <p>Bình luận</p>
                    </label>
                    <div class="item share row center-x">
                        <span class="material-symbols-outlined">
                            share
                        </span>
                        <p>Chia sẻ</p>
                    </div>
                </div>
                <input type="checkbox" hidden name="" id="check-action-cmt">
                <div class="ctn-action-cmt">
                    <form action="" class="row">
                        <img src="../assets/img/anh-co-dinh.jpg" alt="" srcset="">

                        <div class="row w-100pc center-x relative">
                            <textarea name="" id="" rows="3"
                                placeholder="Lời bình luận..."></textarea>
                            <button type="submit"><span class="material-symbols-outlined">
                                    send
                                </span></button>
                        </div>

                    </form>
                </div>
                <div class="container-user-comments">
                    <div class="comment row line">
                        <img src="../assets/img/SV.jpeg" alt="" srcset="">
                        <div class="main-content col">
                            <div class="info">
                                <b class="name">Trần Minh Tuệ</b>
                                <p class="message">5 sao cho khóa học cô ơi, làm thêm đi ạ </p>
                            </div>
                            <div class="sub-detail row">
                                <p>16 giờ</p>
                                <a href="">Thích</a>
                                <a onclick="replyCmt(this)">Phản hồi</a>
                            </div>
                        </div>
                    </div>

                    <div class="comment row">
                        <img src="../assets/img/GV2.jpg" alt="" srcset="">
                        <div class="main-content col">
                            <div class="info">
                                <b class="name">Trần Quốc Huy</b>
                                <p class="message">Bài thứ 2 làm như nào ạ</p>
                            </div>
                            <div class="sub-detail row">
                                <p>1 phút</p>
                                <a href="">Thích</a>
                                <a onclick="replyCmt(this)">Phản hổi</a>
                            </div>
                        </div>
                    </div>

                    <div class="comment row">
                        <img src="../assets/img/home.png" alt="" srcset="">
                        <div class="main-content col">
                            <div class="info">
                                <b class="name">Phùng Thành Đạt</b>
                                <p class="message">Rất tốt</p>
                            </div>
                            <div class="sub-detail row">
                                <p>23 giờ</p>
                                <a href="">Thích</a>
                                <a onclick="replyCmt(this)">Phản hồi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    <?php } ?>

    <div class="box w-100pc">
        <div class="top row space-between box-sticky">
            <div class="box box-sticky flex100-1">
                <div class="container-search center-x">
                    <span class="material-symbols-outlined">search</span>
                    <input type="text" id="searchCourse-js" placeholder="Tìm kiếm khóa học...">
                </div>
            </div>
            <div class="box box-sticky flex1-1 cursor-pointer add-course-js">
                <div class="container-add">
                    <span style="color: var(--cl-dark-2);" class="material-symbols-outlined">add</span>
                </div>
            </div>
        </div>
        <div class="container-courses row">
            <div class="w-100pc center-x-y not-found">
                <p class="center-x mg-10 "><span class="material-symbols-outlined">sentiment_dissatisfied</span>Không tìm thấy kết quả</p>
            </div>
            <?php
            foreach ($courses as $course) { ?> 
                <div class="card card-course-js" data-id="<?php echo $course['id']; ?>">
                    <div class="sub-detail row space-between">
                        <p class="price"><?php echo number_format($course['price'], 0, ',', '.') . " VND"; ?></p>
                        <div class="rating">
                            <span class="star gold" data-value="1">&#9733;</span>
                            <span class="star gold" data-value="2">&#9733;</span>
                            <span class="star gold" data-value="3">&#9733;</span>
                            <span class="star gold" data-value="4">&#9733;</span>
                            <span class="star" data-value="5">&#9733;</span>
                        </div>
                    </div>
                    <div class="ctn-img">
                        <img src="<?php echo "../php/image/course/".$course['image_path']; ?>" alt="">
                    </div>
                    <div class="card-content">
                        <h4><?php echo $course['course_name']; ?></h4>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>

    <script src="../assets/js/scrollNav.js"></script>
    <script src="../assets/js/darkMode.js"></script>
    <script src="../assets/js/showDetailCourse.js"></script>
    <script src="../assets/js/addCourse.js"></script>
    <script src="../assets/js/replyCmt.js"></script>

    <script>
        const priceInput = document.getElementById('price-course')
        // priceInput.addEventListener('input', () => {
        //     let priceInit = priceInput.value.replace(/đ|,/g, '');
        //     priceInput.value = `${parseInt(priceInit, 10).toLocaleString()}`
        // })
    </script>

    <script>
        const imageCouseInput = document.getElementById('image-course')
        const docCourseInput = document.getElementById('doc-course')
        function changeColorWhenHasData(E) {
            if (!E.files.length > 0) {
                return
            }
            console.log('changed')
            const fatherTag = E.closest('div')
            const label = fatherTag.querySelector('label')
            label.style.backgroundColor = 'green'
        }
        imageCouseInput.addEventListener('input', function () {
            changeColorWhenHasData(this)
        })
        docCourseInput.addEventListener('input', function () {
            changeColorWhenHasData(this)
        })
    </script>

    <script class="searchFeature">
        const searchInput = document.getElementById('searchCourse-js');
        const notFound = document.querySelector('.not-found');

        searchInput.addEventListener('input', () => {
            const valueSearch = searchInput.value.toLowerCase();
            console.log(valueSearch);
            const cards = document.querySelectorAll('.card.card-course-js');
            let found = false; // Biến để theo dõi xem có thẻ nào khớp hay không

            if (valueSearch === "") {
                cards.forEach(card => {
                    card.style.display = "";
                });
                notFound.style.display = "none"; // Ẩn thông báo không tìm thấy
            } else {
                cards.forEach(card => {
                    const name = card.querySelector('h4').textContent.toLowerCase();
                    if (name.includes(valueSearch)) {
                        card.style.display = "";
                        found = true; // Có ít nhất một thẻ khớp
                    } else {
                        card.style.display = "none";
                    }
                });
                // Hiện thông báo không tìm thấy nếu không có thẻ nào khớp
                notFound.style.display = found ? "none" : "flex";
            }
        });
    </script>
    <script>
    document.querySelectorAll('.card.card-course-js').forEach(courseCard => {
    courseCard.addEventListener('click', function() {
        const courseId = this.getAttribute('data-id'); // lấy ID của khóa học
        document.querySelectorAll('.detail-course').forEach(detail => {
            detail.style.display = 'none'; // Ẩn tất cả chi tiết khóa học
        });
        document.getElementById('course-' + courseId).style.display = 'block'; // Hiển thị chi tiết khóa học được chọn
    });
});
</script>
</body>
</html>




