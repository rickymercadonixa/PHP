<?php include 'connection.php' ;?>

<?php

if(!isset($_SESSION["Status"])){
    echo '<script>alert ("Please login first") ; window.location.href = "index.php"; </script>';
    exit();
}


    $stud_id = isset($_GET['student_ID']) ? $_GET['student_ID'] : null;
    if(!$stud_id){
        die('Invalid ID');
    }

    $sql = "DELETE FROM tbl_students WHERE student_ID=$stud_id";
    $conn->query($sql);

    header("Location: dashboard.php");
    exit();
?>