<?php
    session_start();
    include "../../db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../myscript.js"></script>
    <title>Search the Schedule</title>
</head>
<body>
    <h1 class="h1">Search the Schedule</h1>
    <div class="login-form">
        <form action="search_scd.php" name="frm" onsubmit=func()>
          <div class="input-field">
            <select name= "src_prt">
              <option >Source</option>
              <?php
                    $sql = "select * from airport";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)) {
                      echo '<option>'.$row['airport_city'].'</option>';
                    }
                  ?>
              </select>
              <select name= "dest_prt">
                <option >Destination</option>
                <?php
                  $sql = "select * from airport";
                    $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_array($result)) {
                    echo '<option>'.$row['airport_city'].'</option>';
                  }
                ?>
              </select>
              <input type="date" name="date" autocomplete="date">
          </div>
          <div class="action">
              <button><b>Search</b></button>
          </div>
        </form>
    </div>
</body>
</html>