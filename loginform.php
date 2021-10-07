<!DOCTYPE html>
<html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width , initial-scale=1.0">
<title>Loging in</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form class="box" action="Login.php" method="POST">
   <h3>Please Enter your username and password</h3>
UserName:<input type="text" name="UserName" width="300"height="300" value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username'];}     ?>">
Password:&nbsp;&nbsp<input type="password"name="Password" width="300"height="300" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];}     ?>"><br><br>
<input type="checkbox" name="name" <?php if(isset($_COOKIE['username'])){ echo 'checked';}     ?>>Remember me<br><br>
<button type="submit" name="login">Login</button>
   <p> create account? <a href="signupForm.php">Sign Up</a> </p>
</form>
</body>
</html>
