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
            echo '<script> alert("Ticket does not exist");setTimeout(()=>{window.location.replace("index.php");},0); </script>';
            exit();
        }


        $word = $_SESSION['ps_id'];
        $sql = "DELETE from books where ticket_code = '$ticket_code' and ps_id = '$word';";
        if($conn->query($sql)== true){
            echo '<script> alert("Ticket successfully cancelled");setTimeout(()=>{window.location.replace("../passenger-homepage.html");},500); </script>';
        }
        else{
            echo "ERROR: $sql <br> $conn->error";
        }
        header("Location: ../passenger-homepage.html");
    }
    $conn->close();
?>