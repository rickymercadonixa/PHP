<?php include 'connection.php';?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $stud_id = $_POST['student_ID'];
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];

        if($_FILES['photo']['size'] > 0){
            $old_photo_path = $row['photo_path'];
            unlink($solid_photo_path);

            $photo_path = 'upload/' . $_FILES['photo']['name'];
            move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path);

            $sql = "UPDATE Students SET first_name ='$first_name', middle_name='$middle_name', last_name='$last_name', address='$address',
            contact_number='$contact_number', photo_path='$photo_path' WHERE student-ID='$stud_id'";
        }

        $conn->query($sql);
        header("Location: dashboard.php");
        exit();
    }

    $stud_id = isset($_GET['student_ID']) ? $_GET['student_ID'] : null;
    if(!$stud_id){
        die('Invalid ID');
    }

    $sql = "SELECT * FROM Students WHERE student_ID=$stud_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>