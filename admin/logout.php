<?php 
include('session_start.php');
unset($_SESSION['admin']);
unset($_SESSION);
header("Location: ../index.php?page=../admin/login");

?>