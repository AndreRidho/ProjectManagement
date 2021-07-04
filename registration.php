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
$failure="";

if(isset($_POST['submit'])){
  if (isset($_POST['name']) && isset($_POST['owner']) && isset($_POST['financial']) && isset($_POST['years']) &&
      isset($_POST['months']) && isset($_POST['days']) && isset($_POST['mode']) &&
      $_POST['name'] != "" && $_POST['owner'] != "" && $_POST['financial'] != "" && $_POST['years'] != "" &&
      $_POST['months'] != "" && $_POST['days'] != "" && $_POST['mode'] != ""){

    if( !is_numeric($_POST['financial']) || !is_numeric($_POST['years']) || !is_numeric($_POST['months']) ||
    !is_numeric($_POST['days'])){
      $failure = "Both funds and project duration (years, months, days) must be numeric";
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

      $failure = "";

      array_push($_SESSION["newProj"], $_POST['name']);
      array_push($_SESSION["newProj"], $_POST['owner']);
      array_push($_SESSION["newProj"], $_POST['financial']);
      array_push($_SESSION["newProj"], $years.$months.$days);
      array_push($_SESSION["newProj"], $_POST['mode']);

      header("Location: ProjectCharacteristics.php");
      exit();

    }

    // $autoInfo = 'INSERT INTO project
    // (name, owner, financial, duration, mode) VALUES (:n, :ow, :fn, :dr, :md)';
    // $stmt = $pdo->prepare($autoInfo);
    // $stmt->execute(array(
    //   ':n' => $_POST['name'],
    //   ':ow' => $_POST['owner'],
    //   ':fn' => $_POST['financial'],
    //   ':dr' => $_POST['duration'],
    //   ':md' => $_POST['mode'])
    // );
  }else{
    $failure = "Please do not leave any fields empty!";
  }

}



?>
<html>
<head>
  <title>Project Registration</title>
</head>
<body>

  <h1 style="font-size:50px;">Project Registration</h1>

  <?php
    echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
  ?>

  <form method="POST">
    <input type="text" name="name" placeholder="Project Name">
    <br>
    <br>
    <input type="text" name="owner" placeholder="Owner">
    <br>
    <br>
    <input type="text" name="financial" placeholder="Financial/Funds">
    <br>
    <br>
    Project Duration
    <br>
    <input type="text" name="years" maxlength="2" placeholder="years"><br>
    <input type="text" name="months" maxlength="2" placeholder="months"><br>
    <input type="text" name="days" maxlength="2" placeholder="days">
    <br>
    <br>
    <label for="mode">Mode:</label>
    <br>
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
    <br>
    <br>
    <input name="submit" type="submit" value="Submit">

  </form>
</body>
</html>
