<?php
   include('config.php');
   session_start();

   $user_check = $_SESSION['login_emp'];

   $ses_sql = mysqli_query($db,"select * from employee where Title = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['empID'];
   $Fname_session = $row['Fname'];
   $Minit_session = $row['Minit'];
   $Lname_session = $row['Lname'];
   $StoreNo_session = $row['storeNo'];
   $title_session = $row['Title'];

   if(!isset($_SESSION['login_emp'])){
      header("location:Elogin.php");
   }
?>
