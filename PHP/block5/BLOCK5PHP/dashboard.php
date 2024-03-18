<!DOCTYPE html>
<html>
<head>
	<title>Students Records</title>
	<link rel="stylesheet" href="bootstrap.css">
	<style>
		th, td{
			border: solid 1px;
			text-align: center;
		}
	</style>
</head>
<body class="bg-dark">
	<h1 style="text-align: center; color: white;">Students Records</h1>

	<form method="GET" style="text-align: right;">
	<input type="text" name="search" placeholder="Search by name..." >
	<button type="submit" class="btn btn-info">Search</button>
</form>

<a href="create.php" class="btn btn-outline-info">Add New Student</a><br><br>

<table border="1" class="table table-dark">
	<b>
		<th>ID No.</th>
		<th>First Name</th>
		<th>Middle Name</th>
		<th>Last Name</th>
		<th>Address</th>
		<th>Contact Number</th>
		<th>Photo</th>
		<th>Action</th>

<?php include 'connection.php';?>

<?php
	if(isset($_GET['search'])){
		$search_query = $_GET['search'];
		$sql = "SELECT * FROM tbl_students WHERE first_name LIKE '%$search_query%' OR last_name LIKE '%$search_query%'";
		$result = $conn->query($sql);
	}else{
		$sql = "SELECT * FROM tbl_students";
		$result = $conn->query($sql);
	}
?>

<?php
	if($result->num_rows > 0){
		while($row = $result -> fetch_assoc()){
			echo "<tr>";
			echo "<td>".$row["student_ID"]."</td>";
			echo "<td>".$row["first_name"]."</td>";
			echo "<td>".$row["middle_name"]."</td>";
			echo "<td>".$row["last_name"]."</td>";
			echo "<td>".$row["address"]."</td>";
			echo "<td>".$row["contact_number"]."</td>";
			echo "<td><img src='".$row["photo_path"]."' width='100' height='100'></td>";
			echo "<td><a href='update.php?student_ID=".$row["student_ID"]."'  class='btn btn-info'>Edit</a> || <a href='delete.php?student_ID=".$row["student_ID"]."'  class='btn btn-danger'>Delete</a></td>";
			echo "</tr>";
		}
	} else{
		echo "<tr><td colspan = '7'> No records found</td></tr>";
	}
?>
	</b>
</table>

<form action="logout.php" method="post"><br>
	<button type="submit"  class="btn btn-danger">Logout</button>
</form>
</body>
</html>