<?php

session_start();

require '../includes/config.php';

if (!isset($_SESSION['admin_id'])) {

    header('Location: ../admin/dashboard.php');

    exit;

}

$id = $_POST['id'] ?? 0;

$stmt = $pdo->prepare("DELETE FROM blogs WHERE id = ?");

$stmt->execute([$id]);

$_SESSION['flash_success'] = "Blog post deleted successfully.";

header('Location: dashboard.php');

exit;

?>