

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
   <?php
$MailSelect=$_GET['MailSelect'];
if(empty($MailSelect)){
   echo "can't change password";
} else{


   ?>
   <p><a href="loginform.php">Home</a> <a href="service.php">Services</a> <a href="logout.php">Logout</a></p>
   }
<form class="box" action="Confirm.php" method="POST">
   <h3>Please create new password</h3>
New password:<input type="password" name="newpass" width="300"height="300"required>
confirm:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<input type="password"name="repass" width="300"height="300"required><br><br>
<input type="hidden" name="MailSelect" value="<?php echo $MailSelect; ?>" width="300"height="300">

<button type="submit" name="Reset">Reset</button>
   <p> change password?</p>
</form>
<?php
}
?>
</body>
</html>

