<?php

session_start();
include 'database.php';
$a=$_POST["FirstName"];
$b=$_POST["LastName"];
$c=$_POST["Email"];
$d=$_POST["UserName"];
$e=$_POST["Password"];
$f=mt_rand(10000,99999);
$gverify="not verified";
$_SESSION['email']=$c;
$_SESSION['key']=$f;


$to=$c;
    $from="From: murokozi123@gmail.com";
    $subject="Verification Code for Viateur Website";
    $message =$f;
  mail($to,$subject,$message,$from);
header('location:code.php');

 $salt="salting" .$sat;
  $e=hash('sha1',$salt);
$sql = "INSERT INTO users_tbl(FirstName,LastName,Email,UserName,Password,code,status)
VALUES ('$a','$b','$c','$d','$e','$f','$gverify')";

if ($conn->query($sql) === TRUE) {
  echo "New record has created successfully";
 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>