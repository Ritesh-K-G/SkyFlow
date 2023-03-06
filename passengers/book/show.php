<?php
    session_start();
    include "../../db_connect.php";
    if(isset($_GET['code'])) {
        $code=$_GET['code'];
        $word = $_SESSION['ps_id'];
        $sql = "INSERT into books values ('$word', '$code');";
        if($conn->query($sql)== true){
            echo '<script> alert("Ticket successfully booked");setTimeout(()=>{window.location.replace("../show_bookings");},500); </script>';
            exit;
        }
        else{
            echo "ERROR: $sql <br> $conn->error";
        }
        header("Location:../show_bookings");
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="../../myscript.js"></script>
        <title>
            AMS
        </title>
    </head>
    <link rel="stylesheet" href="index.css">
    <body>
        <div class="data">
            <h1 class="welcome">Welcome to Airline Management System </h1>
            <h2>Book tickets</h2>
            <h3>
                <?php
                    $src = $_SESSION['src_nam'];
                    $dest = $_SESSION['dest_nam'];
                    echo $src ." to " . $dest;
                ?>
            </h3>
            <table border="1" cellpadding="0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Aircraft ID</th>
                        <th>Class</th>
                        <th>Price</th>
                        <th>Book ticket</th>
                    </tr>
                </thead>
                <?php
                    $src = $_SESSION['src_prt'];
                    $dest = $_SESSION['dest_prt'];
                    $date = $_SESSION['date'];
                    $sql="Select * from schedule natural join ticket where source = '$src' and destination = '$dest' and date = '$date';";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>" .
                            "<td>" . $row["date"]. "</td>".
                            "<td>" . $row["time"]. "</td>".
                            "<td>" . $row["aircraft_id"]. "</td>".
                            "<td>" . $row["class"]. "</td>".
                            "<td>" . $row["price"]. "</td>".
                            "<td> <a href='show.php?code=".$row['ticket_code']."'
                                    class='dltscd'>Book</a>        
                            </td>".
                            "</tr>";
                        }
                    }
                    mysqli_close($conn);
                ?>
            </table>
        </div>
    </body>
</html>