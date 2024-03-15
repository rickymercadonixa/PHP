<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap.css">
</head>
<body class="bg-dark">

<div class="container">
<div  class="text-info">
  <div class="login-form">
  <form action="" method="post" class="form-group">
    
<?php include 'connection.php' ?>
<?php 

  if(isset($_POST['submit'])){
    $users = $_POST['user'];
    $passs = $_POST['pass'];
    $fnames = $_POST['fname'];
    $mnames = $_POST['mname'];
    $lnames = $_POST['lname'];
    $pos = 'Employee';

    $query = "SELECT * FROM `users` WHERE `Username` = '$users'";
    $stmts = $conn->prepare($query);
    $stmts->execute();
    $result = $stmts->get_result();
    $row = $result->fetch_assoc();

    if($users == @$row['Username']){

      echo '<p class="text-danger">User already exist! Please try another username!</p>';


    }else{

    $sql = "INSERT INTO `users`( `Username`, `Password`, `Fname`, `Mname`, `Lname`, `Position`) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt -> bind_param("ssssss",$users,$passs,$fnames,$mnames,$lnames,$pos);
    $stmt->execute();
      echo 'Registered Successfully.';

  }
}
?>
  <h2>SIGN UP!</h2>
      <label for="user">Username: <span class="required-indicator">
      <input type="text" name="user" id="user" placeholder="Username" required><br><br>

      <label for="pass">Password: <span class="required-indicator">
      <input type="password" name="pass" id="pass" placeholder="Password" required><br><br>

      <label for="fname">Firstname: <span class="required-indicator">
      <input type="text" name="fname" id="fname" placeholder="Firstname" required><br><br>

      <label for="mname">Midname: <span class="required-indicator">
      <input type="text" name="mname" id="mname" placeholder="Midname" required><br><br>

      <label for="lname">Lastname: <span class="required-indicator">
      <input type="text" name="lname" id="lname" placeholder="Lastname" required><br><br>
      <input type="checkbox" onclick="myFunction()">Show Password<br><br>

        <button type="submit" name="submit" class="btn btn-success">REGISTER</button><br><br>
        <p>Already have an account? <a href="index.php" class="btn btn-outline-info">Login Here</a></p>
        </div>
</div>
    </form>
</div>
</div>

<script>
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</body>
</html>

<style>
  *{
    margin: 0;
    padding: 0;
    font-family: arial;
  }

  .container{
    height: 100vh;
		display: flex;
		align-items: center;
		justify-content: center;
  }

  form{
    text-align: center;
    box-shadow: 5px 5px 15px 1px;
		padding: 20px 30px 30px 30px;
  }

  input{
		font-size: 18px;
		border: none;
		border-radius: 3px;
		padding: 3px 5px 3px 5px;
		transition: 1s;
    color: black;
	}



  </style>