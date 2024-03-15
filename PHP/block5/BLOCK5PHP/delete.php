<?php include 'connection.php' ;?>

<?php
    $stud_id = isset($_GET['student_ID']) ? $_GET['student_ID'] : null;
    if(!$stud_id){
        die('Invalid ID');
    }

    $sql = "DELETE FROM tbl_students WHERE student_ID=$stud_id";
    $conn->query($sql);

    header("Location: dashboard.php");
    exit();
?>