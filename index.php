<?php
session_start();
if(!isset($_SESSION['k1'])){
	header('location:loginform.php');
}?><!DOCTYPE html>
<html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width , initial-scale=1.0">
<title>Welcome</title>
<p><a href="logout.php">Logout</a> </p>
</head>
<body>
	
	<p>welcome to our website</p>

</body>
</html>