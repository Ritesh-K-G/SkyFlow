<?php
session_start();
include "../../db_connect.php";

$source = $_GET['source'];
$scd = $_GET['schedule_id'];
$dest = $_GET['destination'];
$aircraft_id = $_GET['aircraft_id'];
$date = $_GET['date'];
$time = $_GET['time'];

if (empty($source)) {
    // echo "Enter source airport id";
    echo '<script> alert(" Enter source airport id");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
    exit();
} else if (empty($dest)) {
    // echo "Enter destination airport id";
    echo '<script> alert(" Enter destination airport id");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
    exit();
} else if (empty($aircraft_id)) {
    // echo "Enter aircraft ID of the aircraft";
    echo '<script> alert(" Enter aircraft ID of the aircraft");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
    exit();
} else if (empty($date)) {
    // echo "Enter date of flight";
    echo '<script> alert(" Enter date of flight");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
    exit();
} else if (empty($time)) {
    // echo "Enter time of flight";
    echo '<script> alert(" Enter time of flight");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
    exit();
} else {
    $sql1 = "SELECT aircraft_id from aircraft where aircraft_id='$aircraft_id';";
    $result = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result) === 0) {

        echo '<script> alert(" The Aircraft entered does not exist !!");setTimeout(()=>{window.location.replace("index.html");},500); </script>';
        exit();
    }

    $sql2 = "SELECT airport_id from airport where airport_id='$source';";
    $result2 = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result2) === 0) {

        echo '<script> alert(" The source Airport entered does not exist !!");setTimeout(()=>{window.location.replace("index.html");},500); </script>';
        exit();
    }

    $sql3 = "SELECT airport_id from airport where airport_id='$dest';";
    $result3 = mysqli_query($conn, $sql3);

    if (mysqli_num_rows($result3) === 0) {

        echo '<script> alert(" The destination Airport entered does not exist !!");setTimeout(()=>{window.location.replace("index.html");},500); </script>';
        exit();
    }

    $sql4 = "INSERT INTO schedule (schedule_id, source, destination, aircraft_id, date, time) VALUES ('$scd','$source','$dest', '$aircraft_id', '$date', '$time');";
    $sql5 = "INSERT INTO ticket (schedule_id, class, price, date, time) VALUES ('$scd','Economy', 25000, '$date', '$time');";
    $sql6 = "INSERT INTO ticket (schedule_id, class, price, date, time) VALUES ('$scd','Business', 45000, '$date', '$time');";


    if ($conn->query($sql4) == true) {
        // echo " Successfully inserted";
        if ($conn->query($sql5) == true) {
            if ($conn->query($sql6) == true) {
                echo '<script> alert(" Successfully inserted");setTimeout(()=>{window.location.replace("../admin-homepage.php");},100); </script>';
            }
        }
        // header("Location: ../admin-homepage.html");
        // $submit = true;
    } else {
        $error_msg = "ERROR: $sql4 <br> $conn->error";
        echo '<script> alert(" Some Error occured while inserting");setTimeout(()=>{window.location.replace("../admin-homepage.html");},100); </script>';
        // echo '<script> alert("Some Error occured while inserting") </script>';
    }
}
$conn->close();

?>