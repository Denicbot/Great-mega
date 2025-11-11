<?php

// header.php - include this at the top of pages

if (!isset($site_title)) $site_title = 'MegaTrades';

?>

<!doctype html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo htmlspecialchars($site_title); ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="/assets/css/style.css">
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>

    .navbar-custom {

      background-color: #1a73e8; /* Crystal blue */

    }

    .navbar-custom .nav-link {

      color: white !important;

      font-weight: 500;

      padding: 10px 15px;

      border-bottom: 3px solid transparent;

    }

    .navbar-custom .nav-link:hover {

      border-bottom: 3px solid #ffc107; /* Yellow accent on hover */

    }

    .navbar-brand span {

      color: #0d6efd;

    }

  </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-custom shadow-sm">

  <div class="container">

    <a class="navbar-brand d-flex align-items-center text-white" href="/">

      <img src="https://i.ibb.co/KpkwTMZ5/image-1762122409962-2-removebg-preview.png" alt="Logo" style="height:30px;width:auto;margin-right:10px;">

      <div>

        <div style="font-weight:700;">MegaTrades</div>

        <small style="font-size:11px;">Trading & Investments</small>

      </div>

    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">

      <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="navmenu">

      <ul class="navbar-nav ms-auto text-center">

        <li class="nav-item"><a class="nav-link" href="/about.php">About</a></li>

        <li class="nav-item"><a class="nav-link" href="/services.php">Services</a></li>

        <li class="nav-item"><a class="nav-link" href="/blog.php">Blogs</a></li>

        <li class="nav-item"><a class="nav-link" href="/contact.php">Contact</a></li>

        <li class="nav-item"><a class="nav-link" href="/masterclass.php">Trading Ebook</a></li>

        <li class="nav-item"><a class="nav-link" href="/videos.php">Videos</a></li>


      </ul>

    </div>

  </div>

</nav>

<main class="container mt-5 mb-5">