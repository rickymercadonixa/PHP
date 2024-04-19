<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Take Attendance</title>
</head>
<body class="bg-dark">
    <?php require 'connection.php'; ?>

    <?php

if(!isset($_SESSION["Status"])){
    echo '<script>alert ("Please login first") ; window.location.href = "index.php"; </script>';
    exit();
}

        if(isset($_POST['submit'])){
            echo '<script>alert ("Done updating attendance. Please proceed to dashboard to see the changes.") ; window.location.href = "dashboard.php"; </script>';
        }

        $sql = "SELECT * FROM tbl_students";
        $result = $conn->query($sql);

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            foreach($_POST['attendance'] as $stud_id => $status){
                $sql = "UPDATE tbl_students SET attendance = '$status' WHERE student_ID = $stud_id";
                $conn -> query($sql);
            }
        }
    ?>

    <h1 style="text-align: center; color: white;">ITELEC1-OOP ATTENDANCE</h1>

    <a href="attendance_summary.php" class="btn btn-outline-info">Attendance Summary</a>
    <a href="dashboard.php" class="btn btn-outline-info">Dashboard</a><br><br>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table border="1" class="table table-dark">
            <tr>
                <th>ID No.</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th class="attendance-column">Attendance</th>
            </tr>

            <?php
                if($result->num_rows > 0){
                    while ($row = $result -> fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row["student_ID"]."</td>";
                        echo "<td>".$row["first_name"]. "</td>";
                        echo "<td>".$row["last_name"]. "</td>";
                        echo "<td class='attendance-column'>";
                        echo "<select name='attendance[".$row["student_ID"]."]'>";
                        echo "<option value = 'Present'>Present</option>";
                        echo "<option value = 'Absent'>Absent</option>";
                        echo "</select>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else{
                    echo "<tr><td colspan='4'> No records found </td></tr>";
                }
            ?>
        </table>
            <button type="submit" name="submit" class="btn btn-success">Submit Attendance</button>
    </form>
</body>
</html>

<style>
    th, td{
        border: solid 1px;
        text-align: center;
    }
</style>