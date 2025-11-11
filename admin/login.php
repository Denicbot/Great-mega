<?php
// admin/login.php
session_start();
require '../includes/config.php';

$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $err = 'Enter username and password.';
    } else {
        // Fetch admin row (support both legacy plain password column and password_hash)
        $stmt = $pdo->prepare('SELECT id, username, password_hash, password FROM admins WHERE username = :u LIMIT 1');
        $stmt->execute([':u' => $username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin) {
            $valid = false;

            // Prefer secure hash check if available
            if (!empty($admin['password_hash'])) {
                if (password_verify($password, $admin['password_hash'])) {
                    $valid = true;
                }
            }

            // Fallback to legacy plain-text password column (only if needed)
            if (!$valid && isset($admin['password']) && $admin['password'] !== '') {
                if (hash_equals($admin['password'], $password)) {
                    $valid = true;
                    // Optional: upgrade to password_hash automatically
                    $newHash = password_hash($password, PASSWORD_DEFAULT);
                    $u = $pdo->prepare('UPDATE admins SET password_hash = :h WHERE id = :id');
                    $u->execute([':h' => $newHash, ':id' => $admin['id']]);
                }
            }

            if ($valid) {
                // Login success
                session_regenerate_id(true);
                $_SESSION['admin_id'] = (int)$admin['id'];
                $_SESSION['admin_user'] = $admin['username'];
                header('Location: dashboard.php');
                exit;
            } else {
                $err = 'Invalid credentials.';
            }
        } else {
            $err = 'Invalid credentials.';
        }
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card p-4 shadow-sm">
          <h4 class="mb-3">Admin Login</h4>
          <?php if ($err): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($err); ?></div>
          <?php endif; ?>
          <form method="post" action="">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input name="username" class="form-control" required value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input name="password" type="password" class="form-control" required>
            </div>
            <div class="d-flex gap-2">
              <button class="btn btn-primary">Login</button>
              <a href="/setup.php" class="btn btn-link">Setup (only if first time)</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
