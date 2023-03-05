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
    <title>Delete Airport</title>
</head>
<body>
    <h1 class="h1">Delete a Airport</h1>
    <div class="login-form">
        <form action="del_airport.php" name="frm" onsubmit=func3()>
            <!-- <div class="input-field">
              <input type="text" id="airport_id" name="airport_id" placeholder="Enter Airport ID" autocomplete="nope">
            </div> -->
            <div class= "input-field">
            <select name= "airport_id">
                <option>select</option>
                <?php
                  $sql= "SELECT * from airport";
                  $result= mysqli_query($conn,$sql);
                  while($row = mysqli_fetch_array($result)){
                    echo '<option>'.$row['airport_id'].'</option>';
                  }
                  ?>
            </select>
          </div>
          <div class="action">
            <button><b>Drop</b></button>
          </div>
        </form>
      </div>
      
</body>
</html>