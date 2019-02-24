<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_admin.php';
?>

<?php 
  $page_title = "Dashboard";
  include 'views/admin/layout/header.php'; 
?>
<?php 
  
  include 'views/admin/home.php'; 
?>
<?php include 'views/admin/layout/footer.php'; ?>