<?php 
    include 'config/db.php';
    include 'public/includes/functions.php'; 
    
    $error = "";
    

?>
<?php 
    $innerPage = true;
    $specialId = "i-p";
include 'public/views/layout/header.php'; ?>
<?php 
    include 'public/views/view.login.php'; 
?>
<?php include 'public/views/layout/footer.php'; ?>