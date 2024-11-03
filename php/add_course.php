<?php
session_start();
require 'db.php'; // Kết nối đến cơ sở dữ liệu

// Lấy thông tin hiện tại của người dùng
// $user_id = $_SESSION['user_id'];
// $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
// $stmt->execute(['id' => $user_id]);
// $user = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_name = $_POST['course_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
   
    $tempImage = $image = $_FILES['image']['tmp_name'];
    $filenameImg = $image = $_FILES['image']['name'];
    $folderImage = "./image/course/" . $filenameImg;

    $filenameDocs = $_FILES['document']['name'];
    $tempDoc = $_FILES['document']['tmp_name'];
    $folderDocs =$filenameDocs ? "./image/course/docs" . $filenameDocs: null;

    if (move_uploaded_file($tempImage, $folderImage) || move_uploaded_file($tempDoc, $folderDocs)) {
    // // Them thông tin
    $stmt = $pdo->prepare('INSERT INTO courses (course_name,price ,description,image_path, document_path) VALUES (:course_name,:price, :description, :image_path, :document_path)');
    $stmt->execute(['course_name' => $course_name,'price' => $price, 'description' => $description, 'image_path' => $filenameImg, 'document_path' => $filenameDocs]);
        echo "<h3>&nbsp; Image uploaded successfully!</h3>";
        header('Location: ../quan_tri_vien/courses.php');
        exit;
    } else {
        echo "<h3>&nbsp; Failed to upload image!</h3>";
    }
    // // Them thông tin
    // $stmt = $pdo->prepare('INSERT INTO users (course_name, description,image_path, document_path) VALUES (:course_name, :description, :image, :document)');
    // $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone, 'id' => $user_id]);

   
    // echo "Them thành công!";
}
?>
