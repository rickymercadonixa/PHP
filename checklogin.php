<?php
    require 'connection.php';

    $query = "SELECT user_id_session FROM users WHERE Username = '".$_SESSION['username']."'";

    $result  = $conn->query($query);

    foreach($result as $row){
        if($_SESSION['user_id_session'] != $row['user_id_session']){
            $data['output'] = 'logout';
        }else{
            $data['output'] = 'submit';
        }
    }
?>