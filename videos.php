<?php

$site_title = 'Videos - Great MegaTrades';

include 'includes/header.php';

require 'includes/config.php';

// fetch videos

$stmt = $pdo->query('SELECT * FROM videos ORDER BY uploaded_at DESC');

$videos = $stmt->fetchAll();

?>

<section class="py-5">

  <div class="container">

    <h1 class="mb-4">Videos</h1>

    <?php if (!$videos): ?>

      <div class="alert alert-info">No videos available yet.</div>

    <?php else: ?>

      <div class="row g-4">

        <?php foreach ($videos as $v): 

          $title = htmlspecialchars($v['title']);

          $desc  = nl2br(htmlspecialchars($v['description']));

          $file  = trim($v['filename']);

        ?>

          <div class="col-12 col-md-6">

            <div class="card">

              <div class="card-body">

                <h5 class="card-title"><?php echo $title; ?></h5>

                <?php if ($file === ''): ?>

                  <div class="alert alert-warning">No file for this video.</div>

                <?php elseif (preg_match('#^https?://#i', $file)): ?>

                  <!-- External URL: embed in iframe (YouTube or other) -->

                  <div class="ratio ratio-16x9 mb-3">

                    <iframe src="<?php echo htmlspecialchars($file); ?>" frameborder="0" allowfullscreen></iframe>

                  </div>

                <?php else: ?>

                  <!-- Local uploaded file: use video tag -->

                  <video controls class="w-100 mb-3" style="max-height:360px;object-fit:cover;">

                    <source src="/uploads/<?php echo htmlspecialchars($file); ?>" type="video/mp4">

                    Your browser does not support the video tag.

                  </video>

                <?php endif; ?>

                <p class="card-text small text-muted"><?php echo $desc; ?></p>

              </div>

            </div>

          </div>

        <?php endforeach; ?>

      </div>

    <?php endif; ?>

  </div>

</section>

<?php include 'includes/footer.php'; ?>