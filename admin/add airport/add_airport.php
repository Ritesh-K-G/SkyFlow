<?php
    session_start();
    include "../../db_connect.php";
    
    $airport_id = $_GET['airport_id'];
    $airport_name = $_GET['airport_name'];
    $airport_city = $_GET['airport_city'];
    
    if(empty($airport_id)){
        // echo "Enter airport ID";
        echo '<script> alert(" Enter airport ID");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
        exit();
    }
    else if(empty($airport_name)){
        // echo "Enter Airport name";
        echo '<script> alert(" Enter Airport name");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
        exit();
    }
    else if(empty($airport_city)){
        // echo "Add airport city";
        echo '<script> alert(" Add airport city");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
        exit();
    }
    else{
        $sql = "INSERT INTO airport values ('$airport_id','$airport_name', '$airport_city');";
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