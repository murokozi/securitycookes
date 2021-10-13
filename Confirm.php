<?php 
if (isset($_POST['Reset'])) {
  $MailSelect=$_POST['MailSelect'];
  $a=0;
  //$validator=$_POST['validator'];
  $password=$_POST['newpass'];
  $passwordrepeat=$_POST['repass'];
  
  
 if ($password!=$passwordrepeat) {
    echo '<script language="javascript">';
echo 'alert("password are not matching ...");';
echo "\n";
  //  echo ' window.location.href="https://www.sustainablewestonma.org/update.php"';
//echo 'window.location.href="createnewpass.php?selector="'.$selector;
header("location:resetpass.php?MailSelect=$MailSelect");
echo '</script>';

exit();
  // header("location:createnewpass.php?selector=".$selector);
  //  header("location:createnewpass.php?newpwd=pwdnotsame");
  }
  //$currentdate=date("U");
  require "database.php";
$sql="select* from resetmail where selector=?";
$cat= mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($cat,$sql)) {
 echo "statement failed";
}
else{
  mysqli_stmt_bind_param($cat,"s",$MailSelect);
  mysqli_stmt_execute($cat);
  $select=mysqli_stmt_get_result($cat);
  while($row=mysqli_fetch_assoc($select)) {
    if($row['selector']==$MailSelect)
    {
    $a=$a+1;
    $tokenemail=$row['Emails'];
}
  }
  if ($a<1) {
 echo "you need to re-submit your request".$MailSelect;
  }
  else
  {
$sql="select* from resetmail where Emails=?";
$cat= mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($cat,$sql)) {
 echo "statement failed";
}
else{
  mysqli_stmt_bind_param($cat,"s",$tokenemail);
  mysqli_stmt_execute($cat);
  $select=mysqli_stmt_get_result($cat);
  if (!$row=mysqli_fetch_assoc($select)) {
    echo "There is an error!";
  }
  else
  {
  $sql="UPDATE users_tbl set Password=? where Email=?";
  $cat= mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($cat,$sql)) {
 echo "statement failed";
}
else{
  $newpwdhash=sha1($passwordrepeat);
  mysqli_stmt_bind_param($cat,"ss",$newpwdhash,$tokenemail);
  mysqli_stmt_execute($cat);

  $sql="delete from resetmail where Emails=?";
     $cat= mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($cat,$sql)) {
 echo "statement failed";
}
else{
  mysqli_stmt_bind_param($cat,"s",$tokenemail);
  mysqli_stmt_execute($cat);
  header("location:loginform.php");
} 
  }

    }
}
}}}
else
{
  header("location:loginform.php");
}
?>