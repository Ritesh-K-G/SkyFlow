<?php
    session_start();
    include "../../db_connect.php";
    
    $airport_id = $_GET['airport_id'];
    
    if(empty($airport_id)){
        // echo "Enter airport ID";
        echo '<script> alert(" Enter airport ID");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
        exit();
    }
    else{
        $sql = "DELETE FROM airport WHERE airport_id= '$airport_id';";
        if($conn->query($sql)== true){
            // echo "Succesfully Deleted";
            echo '<script> alert(" Succesfully Deleted");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
        }
        else{
            // echo "ERROR: $sql <br> $conn->error";
            echo '<script> alert(" Some error occured");setTimeout(()=>{window.location.replace("../admin-homepage.php");},100); </script>';
        }
        // header("Location: ../admin-homepage.php");
    }
    $conn->close();
?>