<?php
    session_start();
    include "../../db_connect.php";
    
    $dest_prt = $_GET['dest_prt'];
    $src_prt = $_GET['src_prt'];
    $date = $_GET['date'];
    
    if(empty($dest_prt) || empty($src_prt) || empty($date)){
        echo '<script> alert(" Enter airport city and date");setTimeout(()=>{window.location.replace("index.php");},100); </script>';
        exit();
    }
    else{
        
        $sql="Select airport_id from airport where airport_city = '$dest_prt';";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        $_SESSION['dest_prt']=$row['airport_id'];
        
        $sql="Select airport_id from airport where airport_city = '$src_prt';";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        $_SESSION['src_prt']=$row['airport_id'];
        
        $_SESSION['dest_nam']=$dest_prt;
        $_SESSION['src_nam']=$src_prt;
        $_SESSION['date']=$date;
        header("Location: show.php");
    }
    $conn->close();
?>