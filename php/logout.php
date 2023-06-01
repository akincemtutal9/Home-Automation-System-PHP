<?php 
include '../database/config.php';
session_start();
session_destroy();
unset($_SESSION['loggedin']);
unset($_SESSION['user_id']);
header('location:../index.html');
?>