<?php
require 'db.php'; // Kết nối cơ sở dữ liệu

try {
    // 1. Bảng 'users' - Quản lý người dùng
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        password VARCHAR(255) NOT NULL,
        role ENUM('student', 'teacher', 'admin') NOT NULL,
        fullname VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL UNIQUE,
        msv VARCHAR(20) DEFAULT NULL,
        classSV VARCHAR(10) DEFAULT NULL,
        khoaSV VARCHAR(10) DEFAULT NULL,
        phone VARCHAR(15) DEFAULT NULL,
        classGV VARCHAR(50) DEFAULT NULL,
        secret_code VARCHAR(255) DEFAULT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
    echo "Bảng 'users' đã được tạo thành công!<br>";

    // 2. Bảng 'courses' - Quản lý khóa học
    $sql = "CREATE TABLE IF NOT EXISTS courses (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        course_name VARCHAR(50) NOT NULL,
        teacher_id INT(6) UNSIGNED NULL,
        description TEXT,
        start_date DATE,
        end_date DATE,
        price INT(10) DEFAULT 0,
        status ENUM('active', 'inactive') DEFAULT 'active',
        image_path VARCHAR(255) DEFAULT NULL,
        document_path VARCHAR(255) DEFAULT NULL,
        FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE CASCADE
    )";
    $pdo->exec($sql);
    echo "Bảng 'courses' đã được tạo thành công!<br>";

    // 3. Bảng 'queries' - Quản lý truy vấn của sinh viên
    $sql = "CREATE TABLE IF NOT EXISTS queries (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        student_id INT(6) UNSIGNED NOT NULL,
        course_id INT(6) UNSIGNED NOT NULL,
        query_text TEXT NOT NULL,
        answer TEXT DEFAULT NULL,
        query_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
    )";
    $pdo->exec($sql);
    echo "Bảng 'queries' đã được tạo thành công!<br>";

    // 4. Bảng 'enrollments' - Quản lý đăng ký khóa học
    $sql = "CREATE TABLE IF NOT EXISTS enrollments (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        student_id INT(6) UNSIGNED NOT NULL,
        course_id INT(6) UNSIGNED NOT NULL,
        enroll_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
    )";
    $pdo->exec($sql);
    echo "Bảng 'enrollments' đã được tạo thành công!<br>";

    // 5. Bảng 'materials' - Quản lý tài liệu khóa học
    $sql = "CREATE TABLE IF NOT EXISTS materials (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        course_id INT(6) UNSIGNED NOT NULL,
        file_name VARCHAR(100) NOT NULL,
        file_path VARCHAR(255) NOT NULL,
        upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
    )";
    $pdo->exec($sql);
    echo "Bảng 'materials' đã được tạo thành công!<br>";

    // 6. Bảng 'notifications' - Quản lý thông báo
    $sql = "CREATE TABLE IF NOT EXISTS notifications (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        course_id INT(6) UNSIGNED,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
    )";
    $pdo->exec($sql);
    echo "Bảng 'notifications' đã được tạo thành công!<br>";

    // 7. Bảng 'payments' - Quản lý thanh toán
    $sql = "CREATE TABLE IF NOT EXISTS payments (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        student_id INT(6) UNSIGNED NOT NULL,
        course_id INT(6) UNSIGNED NOT NULL,
        amount DECIMAL(10, 2) NOT NULL,
        payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        status VARCHAR(50) NOT NULL,
        FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
    )";
    $pdo->exec($sql);
    echo "Bảng 'payments' đã được tạo thành công!<br>";

    $sql = "CREATE TABLE IF NOT EXISTS secret_codes (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        role ENUM('admin', 'teacher') NOT NULL,
        secret_code VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
    echo "Bảng 'secret_codes' đã được tạo thành công!<br>";
} catch(PDOException $e) {
    echo "Lỗi khi tạo bảng: " . $e->getMessage();
}


// Đóng kết nối
$pdo = null;
?>
