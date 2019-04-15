<?php
    include '../config/db.php';
    include 'includes/functions.php';
    include '../config/auth_admin.php';
?>
<?php 
  $page_title = "Slots list";
  include 'views/admin/layout/header.php'; 
?>
<?php
    // slots
    $slots = getSlotsDetails();

    include 'views/admin/slots.php'; 
?>
<?php include 'views/admin/layout/footer.php'; ?>