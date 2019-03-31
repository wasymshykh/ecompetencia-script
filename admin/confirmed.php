<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_admin.php';
?>
<?php 
  $page_title = "Confirmed Participants";
  include 'views/admin/layout/header.php'; 
?>
<?php 
    $participants = getConfirmedParticipantsDetailsPage();
    include 'views/admin/confirmed.php'; 
?>
<?php include 'views/admin/layout/footer.php'; ?>