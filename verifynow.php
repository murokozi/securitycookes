<?php
session_start();

require_once('database.php');

if (isset($_POST['verify'])) {
 
 
  $email = $conn->real_escape_string($_POST['Email']);
   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid Email format";
    }
  
    $result ="SELECT count(*) FROM users_tbl WHERE Email=?";
$stmt = $conn->prepare($result);
$stmt->bind_param('s',$email);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
  if ($count==0) {
   
     echo "No account with the Email provided";
    }

 else {
    
$otp= mt_rand(100000, 999999);

    $query = "UPDATE users_tbl SET code=? WHERE Email=? ";
  $stmti = $conn->prepare($query);
$stmti->bind_param('is',$otp,$email);
$stmti->execute();
$stmti->close();
    
    $_SESSION['em'] = $email;
    $_SESSION['code'] = $otp;
    //$_SESSION['stat'] = $status;
    $to=$email;
    $from="From: murokozi123@gmail.com";
    $subject="Verification Code for Viateur Website";
    $message =$otp;
  
    $mailing = mail($to,$subject,$message,$from);

    header("location:code.php");
    
  }
}


?>