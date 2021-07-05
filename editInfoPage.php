
<?php

session_start();

if(!$_SESSION["loggedin"]){
$_SESSION["message"] = "Please login first";
header("Location: login.php");
exit();
}

require_once 'pdo.php';

$id = $_GET["id"];
$stmt = $pdo->query("SELECT * FROM project where id = '".$id."';");
$projName = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST["back"])){
$_SESSION["message"] = "";
header("Location: editInfo.php");
exit();
}else if(isset($_POST["submit"])){

if( !isset($_POST['name']) || $_POST['name'] == "" ||
    !isset($_POST['owner']) || $_POST['owner'] == "" ||
    !isset($_POST['financial']) || $_POST['financial'] == "" ||
    !isset($_POST['years']) || $_POST['years'] == "" ||
    !isset($_POST['months']) || $_POST['months'] == "" ||
    !isset($_POST['days']) || $_POST['days'] == "" ||
    !isset($_POST['mode']) || $_POST['mode'] == "" ||
    !isset($_POST['complexity']) || $_POST['complexity'] == "" ||
    !isset($_POST['rating']) || $_POST['rating'] == ""){

  $_SESSION["message"] = "Please do not leave any fields empty";
  header("Location: editInfoPage.php?id=$id");
  exit();

}else if( !is_numeric($_POST['financial']) || !is_numeric($_POST['years']) || !is_numeric($_POST['months']) ||
          !is_numeric($_POST['days']) || !is_numeric($_POST['rating'])){

  $_SESSION["message"] = "Invalid input";
  header("Location: editInfoPage.php?id=$id");
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

  $stmt = $pdo->prepare(" UPDATE project SET name=:n, owner=:o, financial=:f, duration=:du, mode=:mo, complexity=:co, rating=:ra
                          WHERE id='".$id."';");

  $stmt->execute(array( ':n' => $_POST['name'],
                        ':o' => $_POST['owner'],
                        ':f' => $_POST['financial'],
                        ':du' => $years.$months.$days,
                        ':mo' => $_POST['mode'],
                        ':ra' => $_POST['rating'],
                        ':co' => $_POST['complexity'])
                        );
  $_SESSION["message"] = "";
  header("Location:editConfirm.php?id=$id");
  exit();

}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Project Information</title>
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
          <li><button type="submit" class="btn btn-primary" name="logout" value="Logout">Logout</button>
          </li>
        </form>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container text-center">
    <?php
      echo "<h1>".$projName["name"]."</h1>";
    ?>

  </div>

  <div class="container text-center intopositionBoyz">
    <div class="row">
        <div class="col-sm-20">
        <div class="col-lg-8 personal-info">


        <form method="post">

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Edit Project Name</label>
                    <div class="col-lg-9">
                        <input type="text" name="name" value="<?php echo $projName["name"]?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Edit Project Owner</label>
                    <div class="col-lg-9">
                        <input type="text" name="owner" value="<?php echo $projName["owner"]?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Edit Project Funds</label>
                    <div class="col-lg-9">
                        <input type="text" name="financial" value="<?php echo $projName["financial"]?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Edit year</label>
                    <div class="col-lg-9">
                        <input type="text" name="years" maxlength="4" value="<?php echo substr($projName["duration"], 0, 2)?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Edit Month</label>
                    <div class="col-lg-9">
                        <input type="text" name="months" maxlength="2" value="<?php echo substr($projName["duration"], 2, 2)?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Edit Day</label>
                    <div class="col-lg-9">
                        <input type="text" name="days" maxlength="2" value="<?php echo substr($projName["duration"], 4, 2)?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Edit Project Mode</label>
                    <div class="col-lg-9">
                      <input type="text" name="mode" value="<?php echo $projName["mode"]?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Edit Project Complexity</label>
                    <div class="col-lg-9">
                        <input type="text" name="complexity" value="<?php echo $projName["complexity"]?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Edit Project Rating</label>
                    <div class="col-lg-9">
                      <input type="text" name="rating" value="<?php echo $projName["rating"]?>">
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-3">
                      <input type="reset" class="btn btn-secondary" value="Reset">
                    </div>
                      <div class="col-md-3">
                      <input type="submit" class="btn btn-primary" name="submit" value="Save Changes">
                  </div>
<div class="col-md-3">
                  <?php
                    echo "<p>".$_SESSION["message"]."</p>";
                  ?>
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
            window.history.back();
          }
        </script>
      </footer>

</body>

</html>
