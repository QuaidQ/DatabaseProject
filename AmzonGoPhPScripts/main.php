<?php
	if(isset($_POST['employee'])){
		header("location: Elogin.php");
	}
	if(isset($_POST['customer'])){
		header("location: Clogin.php");
	}
?>
<!DOCTYPE HTML>
<html>
<body>
	<h1>WELCOME</h1>
	<h3>Select User Type</h3>
<form method="POST" action="main.php">
<tr> <td><input id="button" type="submit" name="employee" value="Employee Login"></td><br />
<tr> <td><input id="button" type="submit" name="customer" value="Customer Login"></td><br />
<tr>
</tr>
</body>