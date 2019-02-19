<?php

ini_set('display_errors',1);
error_reporting(E_ALL);



    // DB Configuration
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'ecompete_ecom');

    // url without '/' in the end
    define('URL', 'http://localhost/ecom_new');
    // admin directory url
    define('ADMIN_URL', URL.'/admin');


    try {
        $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
    } catch(PDOException $e) {
        die("Error: " . $e->getMessage());
    }

?>