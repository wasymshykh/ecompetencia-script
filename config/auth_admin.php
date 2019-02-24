<?php
    session_start();
    
    if(!isset($_SESSION['admin']) && empty($_SESSION['admin'])){
        header('location: login.php');
    }

    if(!isAdmin($_SESSION['admin_id'])){
        header('location: login.php');
    }

    $admin = adminDetails($_SESSION['admin_id']);
?>