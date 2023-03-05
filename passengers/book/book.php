<?php
    session_start();
    include "../../db_connect.php";
    
    $ticket_code = $_GET['ticket_code'];
    
    if(empty($ticket_code)){
        echo "Enter ticket code";
        exit();
    }
    else{
        $sql1 = "SELECT * from ticket where ticket_code = '$ticket_code';";
        $result = mysqli_query($conn,$sql1 );
        if(mysqli_num_rows($result) === 0)
        {
            echo '<script> alert("Ticket not available");setTimeout(()=>{window.location.replace("index.php");},0); </script>';
            exit();
        }

        $word = $_SESSION['ps_id'];
        $sql = "INSERT into books values ('$word', '$ticket_code');";
        if($conn->query($sql)== true){
            echo '<script> alert("Ticket successfully booked");setTimeout(()=>{window.location.replace("../show_bookings/index.php");},500); </script>';
        }
        else{
            // echo "ERROR: $sql <br> $conn->error";
        }
        header("Location: ../show_bookings/index.php");
    }
    $conn->close();
?>