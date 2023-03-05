<?php
    session_start();
    include "../../db_connect.php";
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
            <table>
                <thead>
                    <tr>
                        <th>Ticket Code</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Aircraft ID</th>
                        <th>Class</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <?php
                    $sql="Select * from ticket natural join schedule;";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>" .
                            "<td>" . $row["ticket_code"]. "</td>".
                            "<td>" . $row["date"]. "</td>".
                            "<td>" . $row["time"]. "</td>".
                            "<td>" . $row["source"]. "</td>".
                            "<td>" . $row["destination"]. "</td>".
                            "<td>" . $row["aircraft_id"]. "</td>".
                            "<td>" . $row["class"]. "</td>".
                            "<td>" . $row["price"]. "</td>".
                            "</tr>";
                        }
                    }
                ?>
            </table>
        </div>
        <div class="login-form">
        <form action="book.php">
            <div class="input-field">
              <input type="text" id="ticket_code" name="ticket_code" placeholder="Enter ticket code to book the journey:" autocomplete="nope">
            </div>
          <div class="action">
            <button><b>Book</b></button>
          </div>
        </form>
      </div>
    </body>
</html>