<?php

session_start();

require '../includes/config.php';

if (!isset($_SESSION['admin_id'])) {

    header('Location: ../admin/dashboard.php');

    exit;

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

    $id = intval($_POST['id']);

    // Fetch filename first

    $stmt = $pdo->prepare("SELECT filename FROM videos WHERE id = ?");

    $stmt->execute([$id]);

    $video = $stmt->fetch();

    if ($video) {

        $filePath = '../uploads/' . $video['filename'];

        if (file_exists($filePath)) {

            unlink($filePath);

        }

        // Delete from database

        $stmt = $pdo->prepare("DELETE FROM videos WHERE id = ?");

        $stmt->execute([$id]);

        $_SESSION['flash_success'] = "Video deleted successfully!";

    } else {

        $_SESSION['flash_error'] = "Video not found.";

    }

    header('Location: dashboard.php');

    exit;

}