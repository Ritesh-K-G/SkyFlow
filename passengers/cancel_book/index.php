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
            <h2>My Bookings</h2>
            <table>
                <thead>
                    <tr>
                        <th>Ticket Code</th>
                        <th>Class</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Aircraft ID</th>
                    </tr>
                </thead>
                <?php
                    $word = $_SESSION['ps_id'];
                    $sql="SELECT * from schedule natural join ticket natural join books where ps_id = '$word';";
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
                            "<td>" . $row["aircraft_id"]. "</td>".
                            "</tr>";
                        }
                    }
                    mysqli_close($conn);
                ?>
            </table>
        </div>
        <div class="login-form">
        <form action="unbook.php">
            <div class="input-field">
              <input type="number" id="ticket_code" name="ticket_code" placeholder="Enter ticket code to cancel the journey:" autocomplete="nope">
            </div>
          <div class="action">
            <button><b>Cancel</b></button>
          </div>
        </form>
      </div>
    </body>
</html>