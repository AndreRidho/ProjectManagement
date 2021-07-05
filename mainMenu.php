<?php

session_start();

if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

if(isset($_POST["projRegist"])){
  header("Location: registration.php");
  exit();

}else if(isset($_POST["projInfo"])){

  header("Location: projInfo.php");
  exit();

}else if(isset($_POST["maintenance"])){

  header("Location: maintenance.php");
  exit();

}else if(isset($_POST["logout"])){

  $_SESSION["loggedin"] = false;
  header("Location: login.php");
  exit();

}

?>
<html>
  <head>
    <title>Main Menu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
      /* Remove the navbar's default rounded borders and increase the bottom margin */
      .navbar {
        padding-top: 5px;
        margin-bottom: 5%;
        border-radius: 0;
        background-color: #1B1B1B;
      }

      /* Remove the jumbotron's default bottom margin */
       .jumbotron {
        margin-bottom: 0;
      }

      .btn-space {
    margin-right: 20px;
}

      /* Add a gray background color and some padding to the footer */
      footer {
      background-color: #1B1B1B;
     padding: 15px;
     position: fixed;
     left: 0;
     bottom: 0;
     width: 100%;
     text-align: center;
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
          <a class="navbar-brand" href="mainMenu.php" style="color:#FFFFFF;">Project Management System</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">

  <form method="post">
            <li><button type="submit" class="btn btn-primary" name="logout" value="Logout">Logout</button>
            </li>
          </form>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container text-center">
      <h1>Welcome <?php echo $_SESSION["nameOfUser"] ?> to Project Management
        <br>System</h1>
      <p>

        As administrator you can view & edit projects, as well as  <br>
      register new projects</p>
        <br>
        <br>
    </div>

    <div class="container">
      <form method="post">
      <div class="row">

        <div class="col-sm-20">
    <div class="md-form mt-0">

      <div class="col-md-12 text-center">


      <input type="submit" class="btn btn-primary btn-lg active btn btn-space" role="button" aria-pressed="true" name="projRegist" value="Project Registration" >

        <input type="submit" class="btn btn-primary btn-lg active btn btn-space" role="button" aria-pressed="true" name="projInfo" value="Project Information" >

        <input type="submit" class="btn btn-primary btn-lg active btn btn-space" name="maintenance" role="button" aria-pressed="true" value="Maintenance">

    </div>
    </div>
        </div>


      </div>
    </div>

    </form>

    <footer >

    </footer>

    <?php

    if($_SESSION["type"] == "projMgr"){
      echo '<script>
              document.getElementById("mtnce").style.display = "none";
            </script>';
    }

    ?>

  </body>
</html>
