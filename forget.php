<?php 
if(!empty($_GET['Rest'])){

}
 ?>

<!DOCTYPE html>
<html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width , initial-scale=1.0">
<title>Welcome</title>
</head>
<body>
	<form  action="mail.php" method="POST">
	<input type="email" placeholder ="enter email"name="email">
	<input type="submit" name="Rest">
	
</form>
</body>
</html>