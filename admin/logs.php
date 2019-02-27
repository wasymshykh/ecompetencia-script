<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_admin.php';
?>
<?php 
  $page_title = "Website Logs";
  include 'views/admin/layout/header.php'; 
?>
<?php 
    $logs = getAllLogs();
    include 'views/admin/logs.php'; 
?>
<?php include 'views/admin/layout/footer.php'; ?>