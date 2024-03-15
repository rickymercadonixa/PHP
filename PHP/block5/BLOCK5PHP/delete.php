<?php include 'connection.php' ;?>

<?php
    $stud_id = isset($_GET['student_ID']) ? $_GET['student'] : null;
    $conn->query($sql);

    header("Location: dashboard.php");
    exit();
?>