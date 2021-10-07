<?php
session_start();
session_destroy();
header("location:loginform.php");
//echo"<script>Location.href='loginform.php'</script>";
?>