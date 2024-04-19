<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Attendance Summary</title>
</head>
<body class="bg-dark">
<h1 style="text-align: center; color: white;">ITELEC1-OOP ATTENDANCE</h1>

<a href="dashboard.php" class="btn btn-outline-info">Dashboard</a>
<a href="" onclick="window.print()" class="btn btn-outline-info">Print Summary</a><br><br>

        <?php require 'connection.php';
        if(!isset($_SESSION["Status"])){
            echo '<script>alert ("Please login first") ; window.location.href = "index.php"; </script>';
            exit();
        }
        
                    $totalAbsent = 0;
                    $totalPresent = 0;
                    ?>
        <?php
          $sql = "SELECT * FROM tbl_students";
          $result = $conn->query($sql);
        ?>
<table border="1" class="table table-dark">
    <tr>
        <th>Student Name</th>
        <th>Attendance Status</th>
    </tr>
        <?php
       if ($result->data_seek(0)){
        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row["first_name"]." ".$row["middle_name"]." ".$row["last_name"]."</td>";
            echo "<td>".$row["attendance"]."</td>";
            echo "</tr>";

            if($row["attendance"] == "Present"){
                $totalPresent++;
            }
            elseif($row["attendance"] == "Absent"){
                    $totalAbsent++;
                }
        }
    }
        else{
            echo "<tr><td> colspan='2'>No attendance data found</td></tr>";
        }
        ?>
</table>
<br><br>
<p style="color: white;">Total Present: <?php echo $totalPresent;?></p>
<p style="color: white;">Total Absent: <?php echo $totalAbsent;?></p>
</body>
</html>

<style>
    td, th{
        border: solid 1px;
        text-align: center;
    }

    @media print {

            table, th, td {
                border: none !important;
            }

            .btn {
                display: none;
            }
        }
</style>
