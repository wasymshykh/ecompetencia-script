<?php
    session_start();
    
    if(!isset($_SESSION['logged']) || empty($_SESSION['logged']) || !$_SESSION['logged']){
       header('location: '.URL.'/login.php');
    }
    
    if(!isUserIdExists($_SESSION['user_id'])){
        header('location: '.URL.'/login.php');
    }

    if(isUserIdDisabled($_SESSION['user_id'])){
        header('location: '.URL.'/login.php');
    }

    // joins applied
    $user = getUserDetailsById($_SESSION['user_id']);
?>