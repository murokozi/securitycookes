<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	<title>My_exercises</title></head>
<?php
include 'database.php';
$d=$_POST["UserName"];
$e=sha1($_POST["Password"]);
$er=$_POST["Password"];
   $sql = "select *from users_tbl where UserName = '$d' and Password = '$e'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
         
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
            if (!empty($_POST['name'])) {
                $name=$_POST['name'];
          setcookie("username",$d,time()+3600*24*7);
          setcookie("password",$er,time()+3600*24*7);
          setcookie("remember",$name,time()+3600*24*7);
            }
            else
            {
                setcookie("username",$d,2);
                setcookie("password",$er,2);
            }
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>".$e;  
        }
?>
</html>