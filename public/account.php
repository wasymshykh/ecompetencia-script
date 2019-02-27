<?php 
    include '../config/db.php'; 
    include 'includes/functions.php'; 
    include '../config/auth_user.php';

    $participation = getUserParticipation($_SESSION['user_id']);

?>
<?php include 'views/layout/account_header.php'; ?>
<?php include 'views/view.account.php'; ?>
<?php include 'views/layout/account_footer.php'; ?>