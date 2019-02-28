<?php
    include '../config/db.php';

    session_start();
    if(isset($_SESSION)){
        session_destroy();
        header('location: '.URL.'/login.php');
    }

?>