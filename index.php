<?php 
    include 'config/db.php'; 
    include 'public/includes/functions.php'; 
    session_start();
?>
<?php 
    $showMaterialize = true;
    include 'public/views/layout/header.php'; 
?>
<?php include 'public/views/home.php'; ?>
<?php include 'public/views/layout/footer.php'; ?>