<?php
include '../database/config.php';

session_start();

if(isset($_POST['submit'])){

   //$name = mysqli_real_escape_string($conn, $_POST['name']); Burda gerek yok
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   //$cpass = md5($_POST['cpassword']); Burda gerek yok
   //$user_type = $_POST['user_type']; Burda gerek yok

   $select = " SELECT * FROM user_admin WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:../producer/admin_page.php');

      }elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         header('location:../consumer/user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>