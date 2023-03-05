<?php
    session_start();
    include "../db_connect.php";
    
    $ps_id = $_GET['ps_id'];
    $ps_password = $_GET['ps_password'];

    if(empty($ps_id)){
        // echo "Enter Passenger ID";
        echo '<script>alert(" Enter Passenger ID");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else if(empty($ps_password)){
        // echo "Enter Passenger Password";
        echo '<script>alert(" Enter Passenger Password");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else{
        $sql= "SELECT * FROM passengers WHERE ps_id='$ps_id' AND ps_password='$ps_password'"; 
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            
            $row = mysqli_fetch_assoc($result);
            if($row['ps_id'] === $ps_id && $row['ps_password'] === $ps_password){
                // echo "Passenger logged in successfully";
                $_SESSION['ps_id']= $row['ps_id'];
                $_SESSION['ps_name'] = $row['ps_name'];
                $_SESSION['ps_age']= $row['ps_age'];
                $_SESSION['ps_city']= $row['ps_city'];
                $_SESSION['ps_contact']= $row['ps_contact'];
                header("Location: passenger-homepage.php"); 
                exit();
            }
            else{
                // echo "Incorrect UserName or Password";
                echo '<script>alert(" Incorrect UserName or Password");setTimeout(()=>{window.location.replace("../index.html");},500);</script>';
            }
        }
        else{
            // echo "Incorrect UserName or Password";
            echo '<script>alert(" Incorrect UserName or Password");setTimeout(()=>{window.location.replace("../index.html");},500);</script>';
            exit();
        }
    }
    $conn->close();
?>