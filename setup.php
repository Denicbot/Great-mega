<?php

// setup.php — run once to create all tables and first admin

require 'includes/config.php';

$pdo->exec("CREATE TABLE IF NOT EXISTS admins (

  id INT AUTO_INCREMENT PRIMARY KEY,

  username VARCHAR(100) UNIQUE NOT NULL,

  password_hash VARCHAR(255) DEFAULT NULL,

  password VARCHAR(255) DEFAULT NULL,

  created_at DATETIME DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$pdo->exec("CREATE TABLE IF NOT EXISTS gallery (

  id INT AUTO_INCREMENT PRIMARY KEY,

  filename VARCHAR(255) NOT NULL,

  title VARCHAR(255),

  description TEXT,

  uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$pdo->exec("CREATE TABLE IF NOT EXISTS users (

  id INT AUTO_INCREMENT PRIMARY KEY,

  full_name VARCHAR(255),

  email VARCHAR(255) UNIQUE,

  password VARCHAR(255),

  created_at DATETIME DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$pdo->exec("CREATE TABLE IF NOT EXISTS videos (

  id INT AUTO_INCREMENT PRIMARY KEY,

  filename VARCHAR(255) NOT NULL,

  title VARCHAR(255),

  description TEXT,

  uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$pdo->exec("CREATE TABLE IF NOT EXISTS reviews (

  id INT AUTO_INCREMENT PRIMARY KEY,

  author VARCHAR(100) NOT NULL,

  text TEXT NOT NULL,

  photo VARCHAR(255),

  created_at DATETIME DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'] ?? '';

    $password = $_POST['password'] ?? '';

    if ($username && $password) {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare('INSERT INTO admins (username, password_hash) VALUES (?, ?)');

        $stmt->execute([$username, $hash]);

        $msg = '✅ Admin created. DELETE setup.php from server for security.';

    } else {

        $msg = 'Enter username & password.';

    }

}

?>

<!doctype html>

<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">

<title>Setup - Great Mega</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head><body class="bg-light">

<div class="container py-5">

  <div class="row justify-content-center">

    <div class="col-md-6">

      <div class="card p-4">

        <h4>Initial Setup</h4>

        <?php if ($msg): ?><div class="alert alert-info"><?php echo htmlspecialchars($msg); ?></div><?php endif; ?>

        <form method="post">

          <div class="mb-3"><label>Admin username</label><input name="username" class="form-control" required></div>

          <div class="mb-3"><label>Admin password</label><input name="password" type="password" class="form-control" required></div>

          <button class="btn btn-primary">Create Admin</button>

        </form>

        <hr>

        <p class="small text-muted">After creating admin, DELETE this file from server for security.</p>

      </div>

    </div>

  </div>

</div>

</body></html>