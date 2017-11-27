<?php


  function NewUser()
  {
    include("config.php");

    $email = $_POST['email'];
    $Fname = $_POST['Fname'];
    $Minit = $_POST['Minit'];
    $Lname = $_POST['Lname'];
    $Address = $_POST['Address'];
    $CardNo = $_POST['CardNo'];
    $StoreNo = $_POST['StoreNo'];
    $password = $_POST['pass'];

    $query = "INSERT into customer values('$email', '$Fname','$Minit', '$Lname','$password', '$Address','$CardNo','$StoreNo' )";
    $result = mysqli_query($db,$query);
    if($result){
      header("location: Clogin.php");
    }
    else{
      echo "Your registration isnt complete";
    }
  }

  if(isset($_POST['submit'])){
    NewUser();
  }


?>

<!DOCTYPE HTML>
<html>
<head>
<title>Sign-Up</title>
</head>
<body id="body-color">
<div id="Sign-Up">
<fieldset style="width:30%"><legend>Registration Form</legend>
<table border="0">
<tr>
<form method="POST" action="register.php">
<td>Email</td><td> <input type="text" name="email"></td>
</tr>
<tr>
<td>First name</td><td> <input type="text" name="Fname"></td>
</tr>
<tr>
<td>Minit</td><td> <input type="text" name="Minit"></td>
</tr>
<tr>
<td>Last name</td><td> <input type="text" name="Lname"></td>
<tr>
<tr> <td>Address</td><td> <input type="text" name="Address"></td>
</tr>
<tr> <td>CardNo</td><td> <input type="text" name="CardNo"></td>
</tr>
<tr> <td>StoreNo (WA = 1, CA = 2, TX =3)</td><td> <input type="text" name="StoreNo"></td>
</tr>
<td>Password</td><td> <input type="password" name="pass"></td>
</tr>
<tr> <td>Confirm Password </td><td><input type="password" name="cpass"></td>
</tr>
<tr> <td><input id="button" type="submit" name="submit" value="Sign-Up"></td>
</tr>
</form>
</table>
</fieldset>
</div>
</body>
</html>
