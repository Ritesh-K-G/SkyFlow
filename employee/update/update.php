<?php
    session_start();
    include "../../db_connect.php";
    $emp_old = $_GET['emp_ps'];
    $emp_new = $_GET['emp_password'];
    if(empty($emp_old)){
        echo '<script> alert("Enter old Password!!");setTimeout(()=>{window.location.replace("index.html");},500); </script>';
        exit();
    }
    else if(empty($emp_new)){
        echo '<script> alert("Enter new Password!!");setTimeout(()=>{window.location.replace("index.html");},500); </script>';
        exit();
    }
    else{
        if($_SESSION['emp_password'] != $emp_old) {
            echo '<script> alert("Wrong old Password!!");setTimeout(()=>{window.location.replace("index.html");},500); </script>';
            exit();
        }
        else {
            $word=$_SESSION['emp_id'];
            $_SESSION['emp_password']=$emp_new;
            $sql="UPDATE employee SET emp_password = '$emp_new' WHERE emp_id = '$word';";
            $result = mysqli_query($conn, $sql);
            echo '<script> alert("Password updated successfully!!");setTimeout(()=>{window.location.replace("../emp-homepage.php");},500); </script>';
            exit();
        }
    }
?>