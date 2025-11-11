<?php  
$site_title = 'Blogs - MegaTrades';  
include 'includes/header.php';  
require 'includes/config.php';  

// Use the correct table name and columns
$stmt = $pdo->query('SELECT * FROM blogs ORDER BY created_at DESC');  
$items = $stmt->fetchAll();  
?>  

<h2>BLOGS</h2>  
<div class="row g-3">  
<?php if ($items): ?>  
  <?php foreach ($items as $it): ?>  
    <div class="col-md-4">  
      <div class="card">  
        <?php $img = 'uploads/' . htmlspecialchars($it['cover']); ?>  
        <?php if (!empty($it['cover'])): ?>  
          <img src="<?php echo $img; ?>" alt="<?php echo htmlspecialchars($it['title']); ?>" class="card-img-top" style="height:220px;object-fit:cover;">  
        <?php endif; ?>  
        <div class="card-body">  
          <h6 class="fw-bold"><?php echo htmlspecialchars($it['title']); ?></h6>  
          <p class="card-text"><?php echo nl2br(htmlspecialchars(substr($it['content'], 0, 150))); ?>...</p>  
          <small class="text-muted"><?php echo htmlspecialchars($it['created_at']); ?></small>  
        </div>  
      </div>  
    </div>  
  <?php endforeach; ?>  
<?php else: ?>  
  <div class="col-12">  
    <div class="alert alert-info">No blogs uploaded yet.</div>  
  </div>  
<?php endif; ?>  
</div>  

<?php include 'includes/footer.php'; ?>