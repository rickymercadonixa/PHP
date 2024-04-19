<?php
include 'connection.php';

session_unset();
session_destroy();
echo '<script>alert ("Are you sure you want to logout?") ; window.location.href = "index.php"; </script>';
header("Location: index.php");  

?>