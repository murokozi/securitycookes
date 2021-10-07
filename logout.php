<?php
session_start();
session_destroy();
echo"<script>Location.href='login1.php'</script>";
?>