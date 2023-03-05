<?php
    session_start();
    include "../db_connect.php";
    
    $admin_id = $_GET['admin_id'];
    $admin_password = $_GET['admin_password'];

    if (empty($admin_id)) {
        // echo "hii";
        echo '<script>alert(" Enter admin id");setTimeout(()=>{window.location.replace("index.html");},500);</script>';
        exit();
    }
    else if(empty($admin_password)){
        // echo "Enter admin Password";
        echo '<script> alert(" Enter admin Password");setTimeout(()=>{window.location.replace("index.html");},100); </script>';
        exit();
    }
    else{
        $sql= "SELECT * FROM admin WHERE admin_id='$admin_id' AND admin_password='$admin_password'"; 
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) ===1){
            
            $row = mysqli_fetch_assoc($result);
            if($row['admin_id'] === $admin_id && $row['admin_password'] === $admin_password){
                // echo "logged in successfully";
                // echo '<script> alert(" echo "logged in successfully");setTimeout(()=>{window.location.replace("admin-login.php");},100); </script>';
                $_SESSION['admin_id']= $row['admin_id'];
                $_SESSION['admin_name'] = $row['admin_name'];
                // echo " " . $_SESSION['admin_name'];
                header("Location: admin-homepage.php"); 
                exit();
            }
            else{
                echo '<script> alert(" Incorrect UserName or Password");setTimeout(()=>{window.location.replace("admin-login.php");},100); </script>';
                // echo "Incorrect UserName or Password";
            }
        }
        else {
            // echo "Incorrect UserName or Password";
            echo '<script> alert(" Incorrect UserName or Password");setTimeout(()=>{window.location.replace("admin-login.php");},100); </script>';
            exit();
        }
    }

    $conn->close();
?>