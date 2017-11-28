<?php
   include('eSession.php');
   $space = " ";
?>
<html>

   <head>
      <title>Welcome </title>
   </head>

   <body>
      <h1>Welcome <?php echo $Fname_session,$space,$Minit_session,$space,$Lname_session, $title_session; ?></h1>
      <li><a href="<?php echo "stock.php";?>"> View Store </a></li>
   
      <li><a href="<?php echo "logout.php";?>"> Logout </a></li>
   </body>

</html>
