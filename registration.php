
<?php

session_start();

if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();

}

$_SESSION["newProj"] = array();
$_SESSION["totalWeight"] = [];
$_SESSION["procurement"] = true;

if(isset($_POST['submit'])){
  if (isset($_POST['name']) && isset($_POST['owner']) && isset($_POST['financial']) && isset($_POST['years']) &&
  isset($_POST['months']) && isset($_POST['days']) && isset($_POST['mode']) &&
  $_POST['name'] != "" && $_POST['owner'] != "" && $_POST['financial'] != "" && $_POST['years'] != "" &&
  $_POST['months'] != "" && $_POST['days'] != "" && $_POST['mode'] != ""){

    if( !is_numeric($_POST['financial']) || !is_numeric($_POST['years']) || !is_numeric($_POST['months']) ||
    !is_numeric($_POST['days'])){
      $_SESSION["message"] = "Both funds and project duration (years, months, days) must be numeric";
      header("Location: registration.php");
      exit();
    }else{

      $years = ($_POST['years']);
      $months = ($_POST['months']);
      $days = ($_POST['days']);

      if(strlen($years) < 2){
        $years = "0" . $years;
      }

      if(strlen($months) < 2){
        $months = "0" . $months;
      }

      if(strlen($days) < 2){
        $days = "0" . $days;
      }

      $_SESSION["message"] = "";

      array_push($_SESSION["newProj"], $_POST['name']);
      array_push($_SESSION["newProj"], $_POST['owner']);
      array_push($_SESSION["newProj"], $_POST['financial']);
      array_push($_SESSION["newProj"], $years.$months.$days);
      array_push($_SESSION["newProj"], $_POST['mode']);

      header("Location: ProjectCharacteristics.php");
      exit();

    }

  }else{
    $_SESSION["message"] = "Please do not leave any fields empty!";
    header("Location: registration.php");
    exit();
  }

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Project Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    margin-bottom: 0%;
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
  .intopositionBoyz{
    padding-left: 25%;
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

  <div class="container text-center">
    <h1 style="font-size:50px;">Project Registration</h1>

  </div>

  <div class="container text-center intopositionBoyz">
    <div class="row">
      <div class="col-sm-20">
        <div class="col-lg-8 personal-info">


          <form method="post">
            <?php
            echo('<p style="color: red;">'.htmlentities($_SESSION["message"])."</p>\n");
            ?>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label form-control-label">Project Name</label>
              <div class="col-lg-9">
                <input type="text" name="name" placeholder="Project Name">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label form-control-label">Project Owner</label>
              <div class="col-lg-9">
                <input type="text" name="owner" placeholder="Owner">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label form-control-label">Project Funds</label>
              <div class="col-lg-9">
                <input type="text" name="financial" placeholder="Financial/Funds">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label form-control-label">Project Duration</label>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label form-control-label">Years</label>
              <div class="col-lg-9">
                <input type="text" name="years" maxlength="2" placeholder="years">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label form-control-label">Months</label>
              <div class="col-lg-9">
                <input type="text" name="months" maxlength="2" placeholder="months"><br>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label form-control-label">Days</label>
              <div class="col-lg-9">
                <input type="text" name="days" maxlength="2" placeholder="days">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label form-control-label">Project Mode</label>
              <div class="col-lg-9">
                <input type="radio" id="insource" name="mode" value="Insource">
                <label for="insource">Insource</label>
                <br>
                <input type="radio" id="outsource" name="mode" value="Outsource">
                <label for="outsource">Outsource</label>
                <br>
                <input type="radio" id="cosource" name="mode" value="Co-source">
                <label for="cosource">Co-source</label>
                <br>
                <input type="radio" id="unspecified" name="mode" value="Unspecified">
                <label for="unspecified">Unspecified</label>
              </div>
            </div>

            <div class="form-group row intopositionBoyz">
              <div class="col-md-3">
                <input type="reset" class="btn btn-secondary" value="Reset">
              </div>
              <div class="col-md-3">
                <input type="submit" class="btn btn-primary" name="submit" value="Save Changes">
              </div>
            </form>
          </div>

        </div>
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
