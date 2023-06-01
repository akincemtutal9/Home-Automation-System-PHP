<?php 
session_start();
if(!isset($_SESSION['user_id'])){
    include '../database/config.php';
    header('location:../login-signup/login_form.php');
}
?>