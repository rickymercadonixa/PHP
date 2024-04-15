<?php
include 'connection.php';

if(!isset($_SESSION["Status"])){
    echo '<script>alert ("Please login first") ; window.location.href = "index.php"; </script>';
    exit();
}


session_unset();
session_destroy();
echo '<script>alert ("Are you sure you want to logout?") ; window.location.href = "index.php"; </script>';
header("Location: index.php");  

?>