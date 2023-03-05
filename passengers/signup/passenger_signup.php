<?php
    session_start();
    include "../../db_connect.php";

    $ps_name= $_GET['ps_name'];
    $ps_age = $_GET['ps_age'];
    $ps_city = $_GET['ps_city'];
    $ps_contact = $_GET['ps_contact'];
    $ps_password = $_GET['ps_password'];

    if(empty($ps_name)){
        // echo "Enter Passenger Name";
        echo '<script>alert(" Enter Passenger Name");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else if(empty($ps_password)){
        // echo "Enter Passenger Password";
        echo '<script>alert(" Enter Passenger Password");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else if(empty($ps_age)){
        // echo "Enter Passenger Password";
        echo '<script>alert(" Enter Passenger age");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else if(empty($ps_city)){
        // echo "Enter Passenger Password";
        echo '<script>alert(" Enter Passenger city");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else if(empty($ps_contact)){
        // echo "Enter Passenger Password";
        echo '<script>alert(" Enter Passenger contact");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else{
        $sql = "INSERT INTO passengers (ps_password,ps_name,ps_age,ps_city,ps_contact) Values('$ps_password','$ps_name','$ps_age','$ps_city','$ps_contact');";

        if($conn->query($sql) == true){
            // echo "Succesfully inserted";
            echo '<script>alert(" Succesfully inserted");setTimeout(()=>{window.location.replace("../index.html");},500);</script>';
            // header("Location: ../index.html");
        }
        else{
            // echo "ERROR: $sql <br> $conn->error";
            echo '<script>alert(" Some error occured");setTimeout(()=>{window.location.replace("../index.html");},500);</script>';
        }
    }
    $conn->close();
?>