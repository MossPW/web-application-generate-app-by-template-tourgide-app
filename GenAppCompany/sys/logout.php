<?php
session_start();
$_SESSION['user_id'] ="";
$_SESSION['user_level'] ="";
session_destroy();
header('location:login.php');
?>
