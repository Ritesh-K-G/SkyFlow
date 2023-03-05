<?php
    session_start();
    include "../../db_connect.php";
    
    $aircraft_id = $_GET['aircraft_id'];
    
    if(empty($aircraft_id)){
        // echo "Enter aircraft ID";
        echo '<script> alert(" Enter aircraft ID");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
        exit();
    }
    else{
        $sql = "DELETE FROM aircraft WHERE aircraft_id= '$aircraft_id';";
        if($conn->query($sql)== true){
            // echo "Succesfully Deleted";
            echo '<script> alert(" Succesfully Deleted");setTimeout(()=>{window.location.replace("../admin-homepage.php");},100); </script>';
        }
        else{
            // echo "ERROR: $sql <br> $conn->error";
            echo '<script> alert(" Some error occured");setTimeout(()=>{window.location.replace("../admin-homepage.php");},100); </script>';
        }
        // header("Location: ../admin-homepage.php");
    }
    $conn->close();
?>