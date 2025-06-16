<?php

include('../session_start.php');
if (isset($_REQUEST['username'])) {
    $username = clean_input($_REQUEST["username"]);
    $options = ['cost' => 9,];

    $login_sql = "SELECT * FROM users WHERE username = '$username'";
    $login_query=mysqli_query($dbconnect, $login_sql);
    $login_rs = mysqli_fetch_assoc($login_query);
    if (password_verify($_REQUEST["password"], $login_rs["password"])) {
        $_SESSION['admin'] = $login_rs['username'];
        header('Location: ../index.php?page=../admin/add_fish');
    } 
    else {
        unset($_SESSION);
        $login_error = "Inncorrect username / password";
        header("Location: index.php?page=../admin/login&error=$login_error");
    }
}
?>