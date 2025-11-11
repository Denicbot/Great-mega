<?php
session_start();
require '../includes/config.php';
if (!isset($_SESSION['admin_id'])) { header('Location: login.php'); exit; }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current = $_POST['current_password'] ?? '';
    $new = $_POST['new_password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';
    if ($new !== $confirm) { die('New passwords do not match'); }
    $stmt = $pdo->prepare('SELECT * FROM admins WHERE id = ? LIMIT 1');
    $stmt->execute([$_SESSION['admin_id']]);
    $admin = $stmt->fetch();
    if (!$admin || !password_verify($current, $admin['password'])) { die('Current password incorrect'); }
    $hash = password_hash($new, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('UPDATE admins SET password = ? WHERE id = ?');
    $stmt->execute([$hash, $_SESSION['admin_id']]);
    header('Location: dashboard.php'); exit;
}
?>