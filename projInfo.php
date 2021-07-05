<?php

session_start();

if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

require_once 'pdo.php';

if(isset($_POST["back"])){
  header("Location: mainMenu.php");
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
  table{
    background-color: #343a42;
    color: white;
    border-collapse: collapse;
  }


  th, td {
    width:1000px;
    text-align:center;
    border:5px solid #ebfeff;
    padding:10px;
  }

  body{
    background-color: #ebfeff;
  }
  .navbar {
    padding-top: 5px;
    margin-bottom: 5%;
    border-radius: 0;
    background-color: #1B1B1B;
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

  .downBro{
    padding-top: 30px;
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
        <a class="navbar-brand" href="mainMenu.php" style="color:#FFFFFF;">Project Management System</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">

          <form method="post">

          </form>
        </ul>
      </div>
    </div>
  </nav>




  <div class="container "  style="margin-bottom: 100px;">

    <div class="row">

      <div class="col-sm-20 text-center downBro">
        <h1>Project List</h1>
        <hr>

        <table class="table table">
          <thead>
            <tr>
              <th scope="col">Project ID</th>
              <th scope="col">Name</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $stmt = $pdo->query("SELECT id, name FROM project");
            while ( ($row = $stmt->fetch(PDO::FETCH_ASSOC)) ) {
              echo "<tr><td>";
              echo($row['id']);
              echo("</td><td>");
              echo($row['name']);
              echo("</td><td>");
              echo('<a href="projInfoDetails.php?id='. $row['id'].'">Information</a>');
              echo("</td></tr>\n");
            }
            ?>
          </tbody>
        </table>

      </div>
    </div>

    <footer class="container-fluid text-left">
      <button onclick="goBack()" class="btn btn-primary btn-lg">Back</button>
      <script>
      function goBack() {
        window.location.replace("mainMenu.php");
      }
      </script>
    </footer>

  </body>

  </html>
