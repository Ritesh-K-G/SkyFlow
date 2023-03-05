<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../myscript.js"></script>
    <title>Delete Aircraft</title>
</head>
<body>
    <h1 class="h1">Delete an Aircraft</h1>
    <div class="login-form">
        <form action="del_aircraft.php" name="frm" onsubmit=func()>
            <div class="input-field">
              <select name= "aircraft_id">
                <option >select</option>
                  <?php
                    $sql = "select * from aircraft";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)){
                      echo '<option>'.$row['aircraft_id'].'</option>';
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