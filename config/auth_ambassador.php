<?php
    session_start();
    
    if(!isset($_SESSION['ambassador_logged']) || empty($_SESSION['ambassador_logged']) || !$_SESSION['ambassador_logged']){
       header('location: '.URL.'/ambassador/login.php');
    }
    
    if(!isset($_SESSION['ambassador']['ambassador_ID']) || !isAmbassador($_SESSION['ambassador']['ambassador_ID'])){
        header('location: '.URL.'/ambassador/login.php');
    }

    // joins applied
    $ambassador = $_SESSION['ambassador'];
?>