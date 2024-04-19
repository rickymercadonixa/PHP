<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 style="text-align: center; color: white;">ITELEC1-OOP ATTENDANCE</h1>

<a href="attendance_summary.php" class="btn btn-outline-info">Attendance Summary</a>
<a href="dashboard.php" class="btn btn-outline-info">Dashboard</a><br><br>

        <?php require 'connection.php'; 
                    $totalAbsent = 0;
                    $totalPresent = 0;
                    ?>
        <?php
          $sql = "SELECT * FROM tbl_students";
          $result = $conn->query($sql);
        ?>
    </table>
<table>
    <tr>
        <th>Student Name</th>
        <th>Attendance Remarks</th>
    </tr>
        <?php
       if ($result->data_seek(0)){
        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row["first_name"]."".$row["last_name"]."</td>";
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
<p>Total Present: <?php echo $totalPresent;?></p>
<p>Total Absent: <?php echo $totalAbsent;?></p>

<div class="container">
<a href="attendance_summary.php" class="btn btn-outline-info">Attendance Summary</a>
<a href="dashboard.php" class="btn btn-outline-info">Dashboard</a>
<a href="" onclick="window.print()">Print Summary</a>
</div>
</body>
</html>
