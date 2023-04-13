<?php 
include '../database/config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:../login-signup/login_form.php');
}
?>