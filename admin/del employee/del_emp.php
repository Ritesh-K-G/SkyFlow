<?php
session_start();
include "../../db_connect.php";

$emp_id = $_GET['emp_id'];


if (empty($emp_id)) {
    // echo "Enter employee id";
    echo '<script> alert(" Enter employee id");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
    exit();
} else {
    $sql = "DELETE FROM employee WHERE emp_id = '$emp_id';";

    if ($conn->query($sql) == true) {
        // echo " Successfully deleted";
        echo '<script> alert(" Successfully Removed Employee");setTimeout(()=>{window.location.replace("../admin-homepage.php");},100); </script>';
        // header("Location: ../admin-homepage.php");
    } else {
        // echo "ERROR: $sql <br> $conn->error";
        echo '<script> alert(" Some error occured");setTimeout(()=>{window.location.replace("../admin-homepage.php");},100); </script>';
    }
}


?>
