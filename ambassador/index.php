<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_ambassador.php';
?>

<?php 
  $page_title = "Dashboard";
  include 'views/layout/header.php'; 
?>
<?php 
  
  include 'views/home.php'; 
?>
<?php include 'views/layout/footer.php'; ?>