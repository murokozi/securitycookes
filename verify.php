<?php
session_start();
require_once('database.php');

// LOGIN USER
if (isset($_POST['Rest'])) {
  $c=$_SESSION['em'];
  $f=$_POST['code'];

    
   $query = "SELECT * FROM users_tbl WHERE code=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i',$f);
    if($stmt->execute()){
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;
  }
  if($num_rows > 0){
      $query = "UPDATE users_tbl SET status='Verified' WHERE Email=? ";
  $stmti = $conn->prepare($query);
$stmti->bind_param('s',$c);
$stmti->execute();
$stmti->close();
header("location:loginform.php");

    }
  else{
    echo "wrong activation code";
  }

  }

//..........................................
  //Verify after creating an account




?>