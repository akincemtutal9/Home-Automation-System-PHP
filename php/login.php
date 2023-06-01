<?php
include '../database/config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']); 
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']); 
   $user_type = $_POST['user_type']; 

   $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_id'] = $row['userID'];
         header('location:../producer/admin_page.php');

      }elseif($row['user_type'] == 'user'){
         $_SESSION['userID'] = $row['userID'];
         $_SESSION['user_name'] = $row['name'];
         header('location:../consumer/consumernew.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>