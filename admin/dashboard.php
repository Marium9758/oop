<?php 
    session_start();
   
    if (isset($_GET['status'])and $_GET['status']=='logout') {
      unset($_SESSION['email']);
      unset($_SESSION['name']);
      header('Location:index.php');
    }

    if (!isset($_SESSION['email'])) {
      header('Location:index.php');
    }
    include '../classes/Config.php';
    include '../classes/User.php';
    include '../classes/Post.php';
    $user = new User;
    $post = new Post;

  // Navbar
  include 'inc/header.php';
  
  //Main Sidebar Container
  include 'inc/sidebar.php';

  // Content Wrapper. Contains page content -->
  if(isset($pages)) :
      include 'pages/'.$pages.'.php';
    else:
      include 'pages/home.php';
  endif;
   //.content-wrapper
  include 'inc/footer.php'; 



?>
