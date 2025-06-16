<?php session_start(); include("config.php"); include("functions.php"); 
    $dbconnect = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if(mysqli_connect_errno()) {
        echo "Connection Failed:".mysqli_connect_error();
        exit;
    }

?>
