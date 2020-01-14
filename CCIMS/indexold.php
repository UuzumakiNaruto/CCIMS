<?php
session_start();
include './connection/connection.php';
?>
<html lang="en">
<head>
  <script src="https://kit.fontawesome.com/7250c3e8c5.js" crossorigin="anonymous"></script>
    <title>CCIMS</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <style>
* {box-sizing: border-box}
.mySlides1, .mySlides2 {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}
/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}
img.avatar{
  max-width: 100px;
}
/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}
/* On hover, add a grey background color */
.prev:hover, .next:hover {
  background-color: #f1f1f1;
  color: black;
}
h1 {
  text-align: centre;
}
</style>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- Custom Stylesheet   -->
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  
        <div class="header-wrapper">
      <div class="site-name">
        <table><tr><td><a href="index.html"><img src="150dpi.png" height=80px></a></td><td><h1>भारतीय सूचना प्रौद्योगिकी संस्थान भागलपुर<br>Indian Institute of Information Technology Bhagalpur</h1></td></tr></table>
      </div>
    </div>
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand head" href="#">Computer Centre Inventory Mannagement System  (CCIMS)</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-item nav-link" href="help.html">Help</a>
</li>

      </div>
    </div>
  </nav>
  <!-- navbar ends -->
  <h2 style="text-align:center"></h2>
<p></p>

  <div class="overlay">
<form class="login-one-form" method="POST">
  <div class="col">
      <div class="login-one-ico">
      </div>
      <div class="form-group">
          <div>
              <h3 id="heading">Admin Login</h3>
          </div>
          <div>
            <img src="avatar.jpg" alt="user" class ="avatar">

          <input class="form-control" type="text" placeholder="Username" name="username" id="input" autofocus required>
        </div>
        <div>

          <input class="form-control" type="password" placeholder="Password" name="password" id="input" required>
        </div>


      
          <button class="btn btn-primary" type="submit" name="login" id="button" style="background-color:#007BFF;">
          Log in 
          </button>
      </div>
      <?php
      if(isset($_POST['login']))
      {
          $uname = $_POST['username'];
          $pass = $_POST['password'];
          $login = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
          $result = mysqli_query($conn,$login);
          $resultFetch = mysqli_fetch_array($result);
          if($resultFetch)
              {
                  $_SESSION['name'] = $uname;
                  echo '<script>window.location.href ="home.html";</script> ';
              }
          else
              echo "<script>alert('Wrong Username Or Password')</script>";
      }
      ?>
  </div>
</form>
</div>

<nav class="navbar fixed-bottom navbar-dark bg-dark">
  <span class="navbar-text" style="text-align: right;">
  © 2019 Copyright: CC IIIT Bhagalpur
  </span>
</nav>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- end of javascript files -->
</body>
</html>
