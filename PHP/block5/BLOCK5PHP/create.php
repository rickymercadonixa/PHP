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
            $photo_path = 'uploads/'. $photo_name;

            if(move_uploaded_file($photo_tmp, $photo_path)){
                $sql = "INSERT INTO students (first_name, middle_name, last_name, address, contact_number, photo_path)
                 VALUES ('$first_name', '$middle_name', '$last_name', '$address', '$contact_number', '$photo_path')";
    
                if($conn->query($sql)){
                    header("Location; dashboard.php");
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