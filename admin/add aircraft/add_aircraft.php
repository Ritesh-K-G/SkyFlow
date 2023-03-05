<?php
    session_start();
    include "../../db_connect.php";
    
    $aircraft_id = $_GET['aircraft_id'];
    $aircraft_name = $_GET['aircraft_name'];
    $capacity = $_GET['capacity'];
    
    if(empty($aircraft_id)){
        // echo "Enter aircraft ID";
        echo '<script> alert(" Enter aircraft ID");setTimeout(()=>{window.location.replace("index.html");},500); </script>';
        exit();
    }
    else if(empty($aircraft_name)){
        // echo "Enter Aircraft name";
        echo '<script> alert(" Enter Aircraft name");setTimeout(()=>{window.location.replace("index.html");},500); </script>';
        exit();
    }
    else if(empty($capacity)){
        // echo "Add capacity";
        echo '<script> alert(" Add capacity");setTimeout(()=>{window.location.replace("index.html");},500); </script>';
        exit();
    }
    else{
        $sql = "INSERT INTO aircraft values ('$aircraft_id','$aircraft_name', '$capacity');";
        if($conn->query($sql)== true){
            // echo "Succesfully inserted";
            echo '<script> alert(" Succesfully inserted");setTimeout(()=>{window.location.replace("../admin-homepage.php");},100); </script>';
        }
        else{
            echo "ERROR: $sql <br> $conn->error";
        }
        // header("Location: ../admin-homepage.php");
    }
    $conn->close();
?>