<?php 
session_start();
$_SESSION = array();

session_destroy();

header('location:../login-signup/login_form.php');
exit();
?>