<?php include 'connection.php';?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];

        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
            $photo_name = $_FILES['photo']['name'];
            $photo_tmp = $_FILES['photo']['tmp_name'];
            $photo_path = 'uploads/' . $photo_name;

            if(move_uploaded_file($photo_tmp, $photo_path)){
                $sql = "INSERT INTO tbl_students (first_name, middle_name, last_name, address, contact_number, photo_path)
                 VALUES ('$first_name', '$middle_name', '$last_name', '$address', '$contact_number', '$photo_path')";
    
                if($conn->query($sql)){
                    header("Location: dashboard.php");
                    exit();
                }else{
                    echo "Error: ". $sql. "<br>" .$conn->error;
                }
            }else{
                echo "Error uploading file";
            }
        } else{
            echo "No files uploaded or an error occured.";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <h1>Add Student</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">First Name: </label>
        <input type="text" name="first_name" required><br><br>
        <label for="">Middle name: </label>
        <input type="text" name="middle_name" required><br><br>
        <label for="">Last Name: </label>
        <input type="text" name="last_name" required><br><br>
        <label for="">Address: </label>
        <input type="text" name="address" required><br><br>
        <label for="">Contact Number: </label>
        <input type="text" name="contact_number" required><br><br>
        <label for="">Photo: </label>
        <input type="file" name="photo" required><br><br>
        <input type="submit" value="Add Student">
    </form>
</body>
</html>