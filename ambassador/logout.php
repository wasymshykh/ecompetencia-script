<?php 

    session_start();

    if(isset($_SESSION['ambassador_logged']) && isset($_SESSION['ambassador'])){
        if(session_destroy()){
            header('location: login.php');
        }
    }
    else {
        header('location: login.php');
    }


?>