<?php 

    session_start();

    if(isset($_SESSION['admin']) && isset($_SESSION['admin_id'])){
        if(session_destroy()){
            header('location: login.php');
        }
    }
    else {
        header('location: login.php');
    }


?>