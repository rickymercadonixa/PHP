<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="bootstrap.css">
</head>
<body class="bg-dark">
<div class="container">

<div  class="text-info">
<div class="login-form">
		<form method="post" class="form-group">
		<h2>SIGN IN</h2><br>
		
<?php require 'connection.php';?>
<?php

	if(isset($_SESSION["Status"])){
		echo '<script>alert ("You already logged in. Please proceed.") ; window.location.href = "dashboard.php"; </script>';
		exit();
	}

	if(isset($_POST['submit'])){
		$users = $_POST['user'];
		$passs = $_POST['pass'];

	if(empty($users) || empty($passs)){
		echo '<p class="text-danger" >Please enter username and password.</p>';
	}else{
	$sql = "SELECT * FROM `users` WHERE `Username` = ? AND `Password` = ?";
	$stmt = $conn->prepare($sql);
	$stmt -> bind_param("ss",$users,$passs);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

}

	if ($passs != @$row['Password'] && $users != @$row['Username']) {
		
	  echo '<p class="text-danger" >Incorrect Credentials, Please try again!</p>';
	}else{
		

		if($row['Status'] == 0){
			$query = "UPDATE `users` SET `Status` = '1' WHERE `Username` = '$users'";
			$stmts=$conn->prepare($query);
			$stmts->execute();
			$_SESSION['username'] = @$row['Username'];
			$_SESSION["Status"] = @$row["Status"];
			header ("Location: Dashboard.php");
		}else{

			$username = $_SESSION['username'];
			$sql = "SELECT * FROM `users` WHERE `Username` = '$username'";
			$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
				if($row['Status'] == 1){
			echo '<script>alert ("This account is already logged in. Please create or log in another account.") ; window.location.href = "index.php"; </script>';
				exit();
	}
}
		}
	header("Location:Dashboard.php");
	exit();
	}
  }

?>
			<div class="for-group">
				<input type="text" name="user" class="form-control" placeholder="Username"><br>

				<input type="password" name="pass" class="form-control" placeholder="Password" id="Input"><br>
				<input type="checkbox" onclick="myFunction()">Show Password<br><br>

				<button type="submit" name="submit" class="btn btn-success">LOGIN</button><br><br>
			</div>
		</form>
		<br><br><br><br>
		<div class="text-center"><br>
			<span class="small"></span><p>Not have an account? <a href="register.php" class="btn btn-outline-info">REGISTER</a></p><br>
		</div>
	</div>
</div>
</div>
</div>
</div>

<script>
function myFunction() {
  var x = document.getElementById("Input");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

window.history.forward();
</script>

</body>
</html>

<style>
	*{
		margin: 0;
		padding: 0;
		font-family: arial;
	}

	.login-form{
		text-align: center;
		width: auto;
		height: auto;
		padding: 50px;
		transition: 0.7s;
		box-shadow: 5px 5px 15px 1px;
	}
	
	.for-group{
		height: 20svh;
	}

	input{
		font-size: 18px;
		border: none;
		border-radius: 3px;
		padding: 3px 5px 3px 5px;
		transition: 1s;
	}

	input:hover{
		box-shadow: 3px 3px 5px 3px black;
	}

	.container{
		height: 100svh;
		display: flex;
		align-items: center;
		justify-content: center;
	}
</style>