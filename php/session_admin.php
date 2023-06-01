<?php 
include '../database/config.php';

session_start();

if(!isset($_SESSION['admin_name']) && isset($_SESSION['admin_id'])){
    header('location:../login-signup/login_form.php');
}
?>