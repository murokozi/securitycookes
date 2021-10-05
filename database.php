<?php
    $server= "localhost";
    $username="root";
    $password="";
    $database="users_db";
    $conn=mysqli_connect($server,$username,$password,$database);
    if(!$conn){
        die("Connection fail:" .mysql_error());
    }
?>