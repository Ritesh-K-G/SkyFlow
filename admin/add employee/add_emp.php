<?php
session_start();
include "../../db_connect.php";

$emp_id = $_GET['emp_id'];
$emp_name = $_GET['emp_name'];
$emp_age = $_GET['emp_age'];
$emp_email = $_GET['emp_email'];
$emp_salary = $_GET['emp_salary'];
$emp_password = $_GET['emp_password'];

if (empty($emp_name)) {
    // echo "Enter employee name";
    echo '<script> alert(" Enter employee name");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
    exit();
} else if (empty($emp_age)) {
    // echo "Enter employee age";
    echo '<script> alert(" Enter employee age");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
    exit();
} else if (empty($emp_email)) {
    // echo "Enter employee email ID";
    echo '<script> alert(" Enter employee email ID");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
    exit();
} else if (empty($emp_salary)) {
    // echo "Enter employee salary";
    echo '<script> alert(" Enter employee salary");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
    exit();
} else if (empty($emp_password)) {
    // echo "Enter employee password";
    echo '<script> alert(" Enter employee password");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
    exit();
} else {
    $sql = "INSERT INTO employee VALUES ('$emp_id','$emp_password', '$emp_name', '$emp_age', '$emp_email', '$emp_salary' );";
    if ($conn->query($sql) == true) {
        // echo " Successfully inserted";
        echo '<script> alert(" Succesfully inserted");setTimeout(()=>{window.location.replace("../admin-homepage.php");},100); </script>';
        // header("Location: ../admin-homepage.php");
    } else {
        echo "ERROR: $sql <br> $conn->error";
    }
}
?>
