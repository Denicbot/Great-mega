<?php
session_start();
require '../includes/config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: ../admin/dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    // Check for empty fields
    if (empty($title) || empty($description)) {
        $_SESSION['flash_error'] = "Please fill in all fields.";
        header('Location: video.php');
        exit;
    }

    // Check if a file was uploaded
    if (!isset($_FILES['video']) || $_FILES['video']['error'] != UPLOAD_ERR_OK) {
        $_SESSION['flash_error'] = "Please upload a valid video file.";
        header('Location: video.php');
        exit;
    }

    $uploadDir = '../uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileTmp = $_FILES['video']['tmp_name'];
    $fileName = uniqid('video_', true) . '.' . pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
    $filePath = $uploadDir . $fileName;

    // Validate file type (only mp4, webm, mov)
    $allowedTypes = ['video/mp4', 'video/webm', 'video/quicktime'];
    if (!in_array($_FILES['video']['type'], $allowedTypes)) {
        $_SESSION['flash_error'] = "Only MP4, WEBM, or MOV videos are allowed.";
        header('Location: video.php');
        exit;
    }

    // Move file
    if (move_uploaded_file($fileTmp, $filePath)) {
        // Insert into database
        $stmt = $pdo->prepare("INSERT INTO videos (title, description, filename) VALUES (?, ?, ?)");
        $stmt->execute([$title, $description, $fileName]);

        $_SESSION['flash_success'] = "Video uploaded successfully!";
    } else {
        $_SESSION['flash_error'] = "Failed to upload video.";
    }

    header('Location: dashboard.php');
    exit;
}