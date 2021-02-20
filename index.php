<?php 
	include 'classes/Config.php';
	include 'classes/Post.php';
	$post = new Post;
 ?>

<?php include('inc/header.php'); ?>
    
    <?php if (isset($pages)) :?>
      <?php include 'pages/'.$pages.'.php'; ?>
    <?php else: ?>
      <?php include 'pages/home.php'; ?>
  <?php endif; ?>
    
    <!-- Page Footer-->
 <?php include('inc/footer.php'); ?>  