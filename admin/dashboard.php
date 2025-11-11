<?php
session_start();
require '../includes/config.php';

// Security check
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Fetch all blogs
$blogs = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC")->fetchAll();

// Fetch all videos
$videos = $pdo->query("SELECT * FROM videos ORDER BY uploaded_at DESC")->fetchAll();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Dashboard - Blog & Video Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
  <h2 class="mb-4">Welcome back, <?php echo htmlspecialchars($_SESSION['admin_user']); ?></h2>

  <!-- Flash Messages -->
  <?php if (!empty($_SESSION['flash_error'])): ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($_SESSION['flash_error']); ?></div>
    <?php unset($_SESSION['flash_error']); ?>
  <?php endif; ?>
  <?php if (!empty($_SESSION['flash_success'])): ?>
    <div class="alert alert-success"><?php echo htmlspecialchars($_SESSION['flash_success']); ?></div>
    <?php unset($_SESSION['flash_success']); ?>
  <?php endif; ?>

  <!-- BLOG SECTION -->
  <section class="mb-5" id="blog">
    <h4>Upload Blog Post</h4>
    <form method="post" action="upload_blog.php" enctype="multipart/form-data" class="row g-3">
      <div class="col-md-6">
        <label>Title</label>
        <input name="title" class="form-control" placeholder="Blog title" required>
      </div>
      <div class="col-md-6">
        <label>Cover Image</label>
        <input type="file" name="cover" accept="image/*" class="form-control">
      </div>
      <div class="col-12">
        <label>Content</label>
        <textarea name="content" class="form-control" rows="5" placeholder="Write your blog content here..." required></textarea>
      </div>
      <div class="col-md-12 d-flex align-items-end justify-content-end">
        <button class="btn btn-primary">Upload Blog</button>
      </div>
    </form>

    <hr>

    <h5 class="mt-4">Blog Posts</h5>
    <div class="row g-3">
      <?php if (count($blogs) > 0): ?>
        <?php foreach ($blogs as $b): ?>
          <div class="col-md-6">
            <div class="card h-100 shadow-sm">
              <?php if (!empty($b['cover'])): ?>
                <img src="/uploads/<?php echo htmlspecialchars($b['cover']); ?>" class="card-img-top" style="height:200px;object-fit:cover;">
              <?php endif; ?>
              <div class="card-body">
                <h6 class="fw-bold"><?php echo htmlspecialchars($b['title']); ?></h6>
                <p class="small text-muted"><?php echo nl2br(htmlspecialchars(substr($b['content'], 0, 150))); ?>...</p>
                <form method="post" action="delete_blog.php" onsubmit="return confirm('Delete this blog post?');">
                  <input type="hidden" name="id" value="<?php echo $b['id']; ?>">
                  <button class="btn btn-sm btn-danger mt-2">Delete</button>
                </form>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-muted">No blog posts yet.</p>
      <?php endif; ?>
    </div>
  </section>

  <!-- VIDEO SECTION -->
  <section class="mb-5" id="videos">
    <h4>Upload Video</h4>
    <form method="post" action="upload_video.php" enctype="multipart/form-data" class="row g-3">
      <div class="col-md-6">
        <label>Title</label>
        <input name="title" class="form-control" placeholder="Video title" required>
      </div>
      <div class="col-md-6">
        <label>Description</label>
        <input name="description" class="form-control" placeholder="Short description" required>
      </div>
      <div class="col-md-6">
        <label>Video File</label>
        <input type="file" name="video" accept="video/*" class="form-control" required>
      </div>
      <div class="col-md-6 d-flex align-items-end">
        <button class="btn btn-primary">Upload Video</button>
      </div>
    </form>

    <hr>

    <h5 class="mt-4">Uploaded Videos</h5>
    <div class="row g-3">
      <?php if (count($videos) > 0): ?>
        <?php foreach ($videos as $v): ?>
          <div class="col-md-6">
            <div class="card shadow-sm">
              <video controls class="w-100" style="max-height:300px;">
                <source src="/uploads/<?php echo htmlspecialchars($v['filename']); ?>" type="video/mp4">
                Your browser does not support the video tag.
              </video>
              <div class="card-body">
                <h6><?php echo htmlspecialchars($v['title']); ?></h6>
                <p class="small text-muted"><?php echo htmlspecialchars($v['description']); ?></p>
                <form method="post" action="delete_video.php" onsubmit="return confirm('Delete this video?');">
                  <input type="hidden" name="id" value="<?php echo $v['id']; ?>">
                  <button class="btn btn-sm btn-danger mt-2">Delete</button>
                </form>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-muted">No videos uploaded yet.</p>
      <?php endif; ?>
    </div>
  </section>
</div>
</body>
</html>