<?php

session_start();

if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

$_SESSION["first"] = true;
$_SESSION["count"] = 0;
$_SESSION["message"] = "";

require_once 'pdo.php';

if(isset($_POST["back"])){
  header("Location: maintenance.php");
}

?>
<html>
<head>
  <title>Edit Questions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
  .center {
    margin: auto;
    width: 50%;
    padding: 10px;
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
            <li><button type="submit" class="btn btn-primary" name="logout" value="Logout">Logout</button>
            </li>
          </form>
        </ul>
      </div>
    </div>
  </nav>




  <div class="container">

    <div class="row" style="margin-bottom: 100px;">
      <div class="col-sm-20 text-center downBro">

        <h1>Question List</h1>
        <hr>

        <table class="table table">
          <thead>
            <tr>
              <th scope="col">Project ID</th>
              <th scope="col">Name</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $stmt = $pdo->query("SELECT id, section_num, question_num FROM question");
            while ( ($row = $stmt->fetch(PDO::FETCH_ASSOC)) ) {
              echo "<tr><td>";
              echo("Section ".$row['section_num']." Question ".$row['question_num']);
              echo("</td><td>");
              echo('<a href="editQPage.php?id='. $row['id'].'">Edit</a>');
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
        window.history.back();
      }
      </script>
    </footer>

  </body>

  </html>
