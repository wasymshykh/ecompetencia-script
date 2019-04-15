<?php

    include '../config/db.php';
    include 'includes/functions.php';
    include '../config/auth_admin.php';

    if(isset($_GET['slot']) && is_numeric(normal($_GET['slot']))) {
      
      $slot_id = normal($_GET['slot']);
      $slot_details = getSlotDetails($slot_id);

      if(!empty($slot_details)) {

        

      } else {
        header('location: slots.php');
      }
    } else {
      header('location: slots.php');
    }

?>
<?php 
  $page_title = "Enroll Participant";
  include 'views/admin/layout/header.php'; 
?>
<?php
    include 'views/admin/enroll.php'; 
?>
<?php include 'views/admin/layout/footer.php'; ?>