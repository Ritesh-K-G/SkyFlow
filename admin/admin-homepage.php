<?php
  session_start();
  if(!isset($_SESSION['admin_name'])) {
    header('location: admin-login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple HTML HomePage</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Sriracha&display=swap');

    body {
      margin: 0;
      box-sizing: border-box;
    }

    /* CSS for header */
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #f5f5f5;
    }

    .header .logo {
      font-size: 25px;
      font-family: 'Sriracha', cursive;
      color: #000;
      text-decoration: none;
      margin-left: 30px;
    }

    .nav-items {
      display: flex;
      justify-content: space-around;
      align-items: center;
      background-color: #f5f5f5;
      margin-right: 20px;
    }

    .nav-items a {
      text-decoration: none;
      color: #000;
      padding: 35px 20px;
    }

    /* CSS for main element */
    .intro {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 520px;
      background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%), url("../src/admin-home.jpg");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .intro h1 {
      font-family: sans-serif;
      font-size: 60px;
      color: #fff;
      font-weight: bold;
      text-transform: uppercase;
      margin: 0;
    }

    .intro p {
      font-size: 20px;
      color: #d1d1d1;
      text-transform: uppercase;
      margin: 20px 0;
    }

    .intro button {
      background-color: #5edaf0;
      color: #000;
      padding: 10px 25px;
      border: none;
      border-radius: 5px;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.4)
    }

    .content {
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 40px 80px;
    }

    .content .work {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 0 40px;
    }

    .content img {
      width: 20%;
      height: 20%;
      color: #333333;
      padding: 12px;
      padding-left: 35%;
    }

    .content .work i {
      width: fit-content;
      font-size: 50px;
      color: #333333;
      border-radius: 50%;
      border: 2px solid #333333;
      padding: 12px;
    }

    .content .work .work-heading {
      font-size: 20px;
      color: #333333;
      text-transform: uppercase;
      margin: 10px 0;
    }

    .content .work .work-text {
      font-size: 15px;
      color: #585858;
      margin: 10px 0;
    }

    .about-me {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 80px;
      border-top: 2px solid #eeeeee;
    }

    .about-me img {
      width: 500px;
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }

    .about-me-text h2 {
      font-size: 30px;
      color: #333333;
      text-transform: uppercase;
      margin: 0;
    }

    .about-me-text p {
      font-size: 15px;
      color: #585858;
      margin: 10px 0;
    }

    /* CSS for footer */
    .footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #302f49;
      padding: 40px 80px;
    }

    .footer .copy {
      color: #fff;
    }

    .bottom-links {
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 40px 0;
    }

    .bottom-links .links {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 0 40px;
    }

    .bottom-links .links span {
      font-size: 20px;
      color: #fff;
      text-transform: uppercase;
      margin: 10px 0;
    }

    .bottom-links .links a {
      text-decoration: none;
      color: #a1a1a1;
      padding: 10px 20px;
    }
    #admin_name{
      color: white;
    }
  </style>
</head>

<body>
  <header class="header">
    <a href="#" class="logo">Admin</a>
    <nav class="nav-items">
      <a href="#">Home</a>
      <a href="#">About</a>
      <a href="#">Contact</a>
      <a href="logout.php">Logout</a>
    </nav>
  </header>
  <main>
    <div class="intro">
      <h1>Admin</h1>
      <h2 id="admin_name">
        <?php
          if(isset($_SESSION['admin_name'])) {
            $word = $_SESSION['admin_name'];
            echo $word;
          }
          else
          echo "nhi chla";
        ?>
      </h2>
    </div>
    <div class="content">
      <div class="work">
        <a href="add employee">
          <img src="../src/add-emp.svg">
        </a>
        <p class="work-heading">Add an Employee</p>
      </div>
      <div class="work">
        <a href="del employee">
          <img src="../src/del-emp.svg">
        </a>
        <p class="work-heading">Remove an Employee</p>
      </div>
    </div>
    <div class="content">
      <div class="work">
        <a href="add aircraft">
          <img src="../src/add-arcft.svg">
        </a>
        <p class="work-heading">Add an Aircraft</p>
      </div>
      <div class="work">
        <a href="del aircraft">
          <img src="../src/del-arcft.svg">
        </a>
        <p class="work-heading">Remove an Aircraft</p>
      </div>
    </div>
    <div class="content">
      <div class="work">
        <a href="add airport">
          <img src="../src/add-arpt.svg">
        </a>
        <p class="work-heading">Add an Airport</p>
      </div>
      <div class="work">
        <a href="del airport">
          <img src="../src/del-arpt.svg">
        </a>
        <p class="work-heading">Remove an Airport</p>
      </div>
    </div>
    <div class="content">
      <div class="work">
        <a href="add schedule">
          <img src="../src/add-scd.svg">
        </a>
        <p class="work-heading">Add to Schedule</p>
      </div>
      <div class="work">
        <a href="del_schedule">
          <img src="../src/update-scd.svg">
        </a>
        <p class="work-heading">Delete a Schedule</p>
      </div>
    </div>
    <div class="about-me">
      <div class="about-me-text">
        <h2>Admin</h2>
        <p>I am the admin. I am the god. I can do anything.<br>
          I can add you to employee database and can even delete you from my databse.<br>
          I can build airport at any place or even demolish any crores of airport.<br>
          I can buy any aircraft or can destroy any flying aircraft killing hundreds of pathetic humans.<br>
          I can change the entire schedule of airline management system.<br>
          I am the devil, i am the god and i am you lord<br>
          You all should bow down in front of me.<br>
        </p>
      </div>
      <img src="../src/admin-down.jpg" alt="me">
    </div>
  </main>
  <footer class="footer">
    <div class="copy">&copy; 2022 Developer</div>
    <div class="bottom-links">
      <div class="links">
        <span>More Info</span>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
      </div>
      <div class="links">
        <span>Social Links</span>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-github"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>
</body>

</html>