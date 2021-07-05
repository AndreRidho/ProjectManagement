<?php

session_start();

$_SESSION["message"] = "";
$_SESSION["type"] = "";
$_SESSION["loggedin"] = false;
$_SESSION["nameOfUser"] = "";
$_SESSION["accessed"] = true;

if(isset($_POST["projMgr"])){

  $_SESSION["type"] = "projMgr";
  header("Location: login.php");
  exit();

}else if(isset($_POST["sysAdmin"])){

  $_SESSION["type"] = "sysAdmin";
  header("Location: login.php");
  exit();

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Choose</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <style>
  .container {
    position: relative;
    width: 50%;
  }

  .image {
    display: block;
    width: 70%;
    height: 70%;
  }

   .navbar {
      margin-bottom: 0;
      border-radius: 0;
      background-color: #343a42;
    }
    h2{
      color: black;
    }

  .overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    width: 70%;
    height: 100%;
    opacity: 0;
    transition: .5s ease;
    background-color: #008CBA;
  }

  .container:hover .overlay {
    opacity: 1;
  }

  .text {
    color: white;
    font-size: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
  }

  .sidenav {
    width: 300px;
      height: 100%;
    }

    footer {
      padding: 15px;
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      text-align: center;
      background-color: #343a42;
    }
  </style>

</head>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" style="color:#FFFFFF;">Project Management System</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">

        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" style="color:#FFFFFF;"><span class="glyphicon glyphicon-user" style="color:#FFFFFF;"></span> Contact Us</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container text-center">
    <h1>Welcome to Project Management
      <br> System</h1>
      <h3>Please choose your user-type</h3>
    <p>
      <br>
    </p>
      <br>
      <br>
  </div>

  <div class="container-fluid text-center">
    <div class="row content">
      <div class="col-xs-2 sidenav">
      </div>


    <div class="col-md-4 mx-auto">
      <div class="container">
          <form method="post">
      <img src="System admin.png" alt="Avatar" class="image">
      <div class="overlay">

          <div class="text"><input type="submit"class="navbar-brand" style="color:#FFFFFF;" name="sysAdmin">System Adminstrator</div>
      </div>
     </div>
           </form>
    </div>

    <div class="col-md-4 mx-auto">
      <div class="container">
  <form method="post">
<img src="Project manager.png" class="image">
        <div class="overlay">

          <div class="text"> <input type="submit" class="navbar-brand" style="color:#FFFFFF;" name="projMgr">Project Manager</div>
        </div>
        </div>
      </form>
    </div>

    <footer class="container-fluid text-left">

    </footer>

</body>
</html>
