<?php
require '../php/db.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$courseId = $data['id'] ?? null;

if ($courseId) {
    $stmt = $pdo->prepare("SELECT * FROM courses WHERE id = :id");
    $stmt->bindParam(':id', $courseId, PDO::PARAM_INT);
    $stmt->execute();
    $course = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($course) {
        echo json_encode($course);
    } else {
        echo json_encode(['error' => 'Không tìm thấy khóa học']);
    }
} else {
    echo json_encode(['error' => 'ID khóa học không hợp lệ']);
}
?>
