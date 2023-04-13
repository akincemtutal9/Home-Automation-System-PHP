<?php 
include '../database/config.php';
session_start();
session_unset();
session_destroy();
header('location:../login-signup/login_form.php');
?>