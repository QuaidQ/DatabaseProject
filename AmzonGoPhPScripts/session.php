<?php
   include('config.php');
   session_start();

   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($db,"select * from customer where Uname = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['Uname'];
   $Fname_session = $row['Fname'];
   $Minit_session = $row['Minit'];
   $Lname_session = $row['Lname'];
   $Address_session = $row['Address'];
   $CardNo_session = $row['CardNo'];
   $StoreNo_session = $row['Store'];

   if(!isset($_SESSION['login_user'])){
      header("location:Clogin.php");
   }
?>
