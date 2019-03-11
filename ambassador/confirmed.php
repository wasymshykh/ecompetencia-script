<?php 
  include '../config/db.php';
  include 'includes/functions.php';
  include '../config/auth_ambassador.php';

  $user_success = false;
  $user_error = false;

?>
<?php 
  $page_title = "Manage Participants";
  include 'views/layout/header.php'; 
?>
<?php 
    $participants = getConfirmedParticipants($ambassador['ambassador_ID']);
    include 'views/confirmed.php';
?>
<?php include 'views/layout/footer.php'; ?>