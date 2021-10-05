<?php
include 'database.php';
$a=$_POST["FirstName"];
$b=$_POST["LastName"];
$c=$_POST["Email"];
$d=$_POST["UserName"];
$e=sha1($_POST["Password"]);
$sql = "INSERT INTO users_tbl(FirstName,LastName,Email,UserName,Password)
VALUES ('$a','$b','$c','$d','$e')";

if ($conn->query($sql) === TRUE) {
  echo "New record has created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>