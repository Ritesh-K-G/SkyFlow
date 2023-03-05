<?php
    session_start();
    include "../db_connect.php";
    $emp_id = $_GET['emp_id'];
    $emp_password = $_GET['emp_password'];
    if(empty($emp_id)){
        // echo "Enter employee ID";
        echo '<script>alert(" Enter employee ID");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else if(empty($emp_password)){
        // echo "Enter employee Password";
        echo '<script>alert(" Enter employee Password");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else{
        $sql= "SELECT * FROM employee WHERE emp_id='$emp_id' AND emp_password='$emp_password'"; 
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) ===1){
            
            $row = mysqli_fetch_assoc($result);
            if($row['emp_id'] === $emp_id && $row['emp_password'] === $emp_password){
                // echo "logged in successfully";
                $_SESSION['emp_id']= $row['emp_id'];
                $_SESSION['emp_name'] = $row['emp_name'];
                $_SESSION['emp_age']= $row['emp_age'];
                $_SESSION['emp_email']= $row['emp_email'];
                $_SESSION['salary']= $row['salary'];
                $_SESSION['emp_password']= $row['emp_password'];
                header("Location: emp-homepage.php");
                exit();
            }
            else{
                // echo "Incorrect UserName or Password";
                echo '<script>alert(" Incorrect UserName or Password");setTimeout(()=>{window.location.replace("../index.html");},500);</script>';
            }
        }
        else {
            // echo "Incorrect UserName or Password";
            echo '<script>alert(" Incorrect UserName or Password");setTimeout(()=>{window.location.replace("../index.html");},500);</script>';
            exit();
        }
    }
    $conn->close();
?>