<?php

    include '../config/db.php';
    include 'includes/functions.php';
    include '../config/auth_admin.php';
  



?>
<?php 
  $page_title = "Enroll Participant";
  include 'views/admin/layout/header.php'; 
?>
<?php
    // slots
    $slots = getSlotsDetails();

    include 'views/admin/enroll.php'; 
?>
<?php include 'views/admin/layout/footer.php'; ?>