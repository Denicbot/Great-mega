<?php

include '../config/db.php';

// Handle banner upload

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $type = $_POST['media_type'];

  $message = $_POST['message'];

  $btn_text = $_POST['button_text'];

  $btn_link = $_POST['button_link'];

  $active = isset($_POST['is_active']) ? 1 : 0;

  $filename = basename($_FILES['media_file']['name']);

  $target = "../assets/uploads/" . $filename;

  move_uploaded_file($_FILES['media_file']['tmp_name'], $target);

  mysqli_query($conn, "INSERT INTO banners (media_url, media_type, message, button_text, button_link, is_active) 

    VALUES ('$filename', '$type', '$message', '$btn_text', '$btn_link', '$active')");

  echo "<div class='alert alert-success'>Banner uploaded successfully!</div>";

}

?>

<h4 class="mb-3">📢 Upload Promo Banner</h4>

<form method="POST" enctype="multipart/form-data" class="p-4 bg-light rounded shadow-sm">

  <div class="mb-2">

    <label>Banner Type</label>

    <select name="media_type" class="form-select">

      <option value="image">Image</option>

      <option value="video">Video</option>

    </select>

  </div>

  <div class="mb-2">

    <label>Promo Message</label>

    <input type="text" name="message" class="form-control" placeholder="e.g. 50% Off This Week!" required>

  </div>

  <div class="mb-2">

    <label>Button Text</label>

    <input type="text" name="button_text" class="form-control" placeholder="e.g. Join Now" required>

  </div>

  <div class="mb-2">

    <label>Button Link</label>

    <input type="url" name="button_link" class="form-control" placeholder="e.g. https://megatradefirst.com/join" required>

  </div>

  <div class="mb-2">

    <label>Upload Banner</label>

    <input type="file" name="media_file" class="form-control" required>

  </div>

  <div class="form-check mb-3">

    <input class="form-check-input" type="checkbox" name="is_active" value="1" checked>

    <label class="form-check-label">Activate banner</label>

  </div>

  <button type="submit" class="btn btn-primary w-100">Upload Banner</button>

</form>