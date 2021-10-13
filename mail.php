<?php 
if (isset($_POST['Rest'])) {
	$email=$_POST['email'];
	$a=0;
	include("database.php");
	$sql="select* from users_tbl where Email=?";
$cat= mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($cat,$sql)) {
 echo "statement failed";
}
else{
  mysqli_stmt_bind_param($cat,"s",$email);
  mysqli_stmt_execute($cat);
  $select=mysqli_stmt_get_result($cat);
  while($row=mysqli_fetch_assoc($select)) {
    if($row['Email']==$email)
    {
    $a=$a+1;
    $tokenemail=$row['Email'];
}
  }
}
  if($a>=1){
	$MailSelect=bin2hex(random_bytes(8));
	$token=random_bytes(32);
	$url="http://localhost/securitycookes/resetpass.php?MailSelect=".$MailSelect;
	
	
     $sql="delete from resetmail where Emails=?";
     $cat= mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($cat,$sql)) {
 echo "statement failed";
}
else{
  mysqli_stmt_bind_param($cat,"s",$email);
  mysqli_stmt_execute($cat);
}
$q="insert into resetmail(Emails,selector) values(?,?)";
$cat= mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($cat,$q)) {
 echo "statement failed";
}
else{
	//$hashedtoken=password_hash($token,PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($cat,"ss",$email,$MailSelect);
  mysqli_stmt_execute($cat);
}
//mysqli_stmt_close($cat);
$from = 'murokozi123@gmail.com';
$to = $email;
$subject = 'Reset password';
$message = '<p>Here is the link you need to follow';
$message .= '<a href="'.$url.'</a></p>';
$headers = 'From: ' . $from;
$headers .= 'Reply-To: ' . $from;
$headers .= 'Content-type:text/html';
mail($to, $subject, $message, $headers);
echo "email sent successfully";
}
else{
	echo "email not found";
}
}
?>