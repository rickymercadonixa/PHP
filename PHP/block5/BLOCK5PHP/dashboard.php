<?php include 'connection.php';?>

<?php
	if(isset($_GET['search'])){
		$search_query = $_GET['search'];
		$sql = "SELECT * FROM students WHERE first_name LIKE '%$search_query%'
		last_name LIKE '%$search_query%'";
		$result = $conn->query($sql);
	}
?>

<?php
	if($result -> num_rows > 0){
		while($row = $result -> fetch_assoc()){
			echo "<tr>";
			echo "<td?".$row["students_ID"]."</td>";
			echo "<td>".$row["first_name"]."</td>";
			echo "<td>".$row["middle_name"]."</td>";
			echo "<td>".$row["last_name"]."</td>";
			echo "<td>".$row["address"]."</td>";
			echo "<td>".$row["contact_number"]."</td>";
			echo "<td><img src='".$row["photo_path"]."' width='100' height='100'></td>";
			echo "<td><a href='update.php?student_ID=".$row["student_ID"]."'>Edit</a> | <a href='delete.php?student_ID=".$row["students_ID"]."'>Delete</a></td>";
			echo "</tr>";
		}
	} else{
		echo "<tr><td colspan = '7'> No records found</td></tr>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>DASHBOARD</title>
	<link rel="stylesheet" href="bootstrap.css">
</head>
<body class="bg-dark">
<div  class="text-info">
	<div class="container-fluid">
	<div class="container text-center">
  <div class="row">
    <div class="col">
	<div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
	<h2>WELCOME TO DASHBOARD</h2>
		<p>This is your Dashboard, I hope you enjoy this even though it's not yet completed.</p>
	</div>
    </div>
    <div class="col">
	<div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
	<p>Logout if you want to end your session.</p>
	<a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
  </div>
	</div>
</div>
</body>
</html>