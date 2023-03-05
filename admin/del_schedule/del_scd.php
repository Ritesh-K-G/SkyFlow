<?php
    session_start();
    include "../../db_connect.php";
    
    $schedule_id = $_GET['schedule_id'];
    
    if(empty($schedule_id)){
        echo "Enter schedule ID";
        exit();
    }
    else{
        $sql = "DELETE FROM schedule WHERE schedule_id= '$schedule_id';";
        if($conn->query($sql)== true){
            echo "Succesfully Deleted";
        }
        else{
            echo "ERROR: $sql <br> $conn->error";
        }
        header("Location: ../admin-homepage.php");
    }
    $conn->close();
?>