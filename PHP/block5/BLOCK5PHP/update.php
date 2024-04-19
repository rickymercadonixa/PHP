<?php include 'connection.php';?>

<?php

if(!isset($_SESSION["Status"])){
    echo '<script>alert ("Please login first") ; window.location.href = "index.php"; </script>';
    exit();
}


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $stud_id = $_POST['student_ID'];
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];

        if($_FILES['photo']['size'] > 0){
            $old_photo_path = $row['photo_path'];
            unlink($old_photo_path);

            $photo_path = 'uploads/' . $_FILES['photo']['name'];
            move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path);

            $sql = "UPDATE tbl_students SET first_name ='$first_name', middle_name='$middle_name', last_name='$last_name', address='$address',
            contact_number='$contact_number', photo_path='$photo_path' WHERE student_ID='$stud_id'";
        } else{
            $sql = "UPDATE tbl_students SET first_name ='$first_name', middle_name='$middle_name', last_name='$last_name', address='$address',
            contact_number='$contact_number' WHERE student_ID='$stud_id'";
        }

        $conn->query($sql);

        header("Location: dashboard.php");
        exit();
    }

    $stud_id = isset($_GET['student_ID']) ? $_GET['student_ID'] : null;
    if(!$stud_id){
        die('Invalid ID');
    }

    $sql = "SELECT * FROM tbl_students WHERE student_ID=$stud_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Update Student</title>
</head>
<body class="bg-dark">
    <h1 style="text-align: center; color: white;">Update Student</h1><br><br>
    <div class="for-group" style="display: flex; justify-content: center; align-items: center;">
    <form action="" method="POST" enctype="multipart/form-data" style="color: white;">
        <input type="hidden" name="student_ID" value="<?php echo $row['student_ID'];?>">
        <label for="">First Name:</label>
        <input type="text" name="first_name" value="<?php echo $row['first_name'];?>" required><br><br>
        <label for="">Middle Name:</label>
        <input type="text" name="middle_name" value="<?php echo $row['middle_name'];?>"><br><br>
        <label for="">Last Name:</label>
        <input type="text" name="last_name" value="<?php echo $row['last_name'];?>"><br><br>
        <label for="">Address:</label>
        <input type="text" name="address" value="<?php echo $row['address'];?>"><br><br>
        <label for="">Contact Number:</label>
        <input type="text" name="contact_number" value="<?php echo $row['contact_number'];?>"><br><br>
        <label for="">Photo:</label>
        <input type="file" name="photo"><br><br>
        <input type="submit" value="Update Student">
    </form>
    </div>
    <br><br><br>
    <a href="dashboard.php" class="btn btn-outline-info">Back</a>
</body>
</html>