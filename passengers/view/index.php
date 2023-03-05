<?php
    session_start();
    include "../../db_connect.php";
?>
<!DOCTYPE html>
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
            <h2>Aircraft Schedule</h2>
            <table>
                <thead>
                    <tr>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Aircraft ID</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <?php
                    $sql="Select * from schedule order by date";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>" .
                            "<td>" . $row["source"]. "</td>".
                            "<td>" . $row["destination"]. "</td>".
                            "<td>" . $row["aircraft_id"]. "</td>".
                            "<td>" . $row["date"]. "</td>".
                            "<td>" . $row["time"]. "</td>".
                            "</tr>";
                        }
                    }
                    else
                    {
                        echo "No Results";
                    }
                    mysqli_close($conn);
                ?>
            </table>
        </div>
    </body>
</html>