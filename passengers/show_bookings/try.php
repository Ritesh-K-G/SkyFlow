<?php
    session_start();
    // include "../../db_connect.php";
?>
<!DOCTYPE>
<html>
    <head>
        <title>
            AMS
        </title>
    </head>
    <link rel="stylesheet" href="index.css">
    <body>
        <div class="data">
            <h1 class="welcome">Welcome to Airline Management System </h1>
            <h2>My Bookings</h2>
            <table>
                <thead>
                    <tr>
                        <th>Ticket Code</th>
                        <th>Class</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Airport ID</th>
                        <th>Aircraft ID</th>
                    </tr>
                </thead>
                <?php
                    $word = $_SESSION['ps_id'];
                    // $sql="Select * from schedule natural join (select * from ticket natural join books where ps_id = $word);";
                    $sql = "SELECT *
                    FROM schedule
                    NATURAL JOIN (SELECT *
                    FROM ticket
                    NATURAL JOIN books;
                    );";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>" .
                            "<td>" . $row["ticket_code"]. "</td>".
                            "<td>" . $row["class"]. "</td>".
                            "<td>" . $row["date"]. "</td>".
                            "<td>" . $row["time"]. "</td>".
                            "<td>" . $row["airport_id"]. "</td>".
                            "<td>" . $row["aircraft_id"]. "</td>".
                            "</tr>";
                        }
                    }
                    mysqli_close($conn);
                ?>
            </table>
        </div>
    </body>
</html>