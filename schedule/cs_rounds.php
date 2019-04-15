<?php 
    include '../config/db.php'; 
    include '../public/includes/functions.php'; 
    session_start();
?>
<?php 
    $showMaterialize = true;
    $innerPage = true;
    $specialId = "i-p";
    include '../public/views/layout/header.php'; 
?>
<?php 
    include 'views/view.cs_rounds.php'; 
?>
<?php include '../public/views/layout/footer.php'; ?>