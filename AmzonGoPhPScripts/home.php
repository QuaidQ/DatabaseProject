<?php
   include('session.php');
   $space = " ";
?>
<html>

   <head>
      <title>Welcome </title>
   </head>

   <body>
      <h1>Welcome <?php echo $Fname_session,$space,$Minit_session,$space,$Lname_session; ?></h1>
      <li><a href="<?php echo "shop.php";?>"> Shop </a></li>
      <li><a href="<?php echo "refund.php";?>"> Customer Service </a></li>
      <li><a href="<?php echo "logout.php";?>"> Logout </a></li>
   </body>

</html>
