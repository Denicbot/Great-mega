<?php
session_start();
require '../includes/config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: ../admin/dashboard.php');
    exit;
}

$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');
$cover = '';

if ($title && $content) {
    if (!empty($_FILES['cover']['name']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
        $filename = uniqid() . '_' . basename($_FILES['cover']['name']);
        $target = '../uploads/' . $filename;
        if (move_uploaded_file($_FILES['cover']['tmp_name'], $target)) {
            $cover = $filename;
        }
    }

    $stmt = $pdo->prepare("INSERT INTO blogs (title, content, cover, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->execute([$title, $content, $cover]);

    $_SESSION['flash_success'] = "Blog uploaded successfully!";
} else {
    $_SESSION['flash_error'] = "Please fill in all required fields.";
}

header('Location: dashboard.php');
exit;
?>