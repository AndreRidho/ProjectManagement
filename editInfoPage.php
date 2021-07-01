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
<html>
<head>
  <title>Edit Project Information</title>
</head>
<div>
  <?php
    echo "<h1>".$projName["name"]."</h1>";
  ?>
</div>
<div>
  <?php
    echo "<p>".$_SESSION["message"]."</p>";
  ?>
</div>
<form method="post">
  <div>
    <table>
      <tr>
        <td>Edit Project Name: </td>
        <td><input type="text" name="name" value="<?php echo $projName["name"]?>"></td>
      </tr>
      <tr>
        <td>Edit Project Owner: </td>
        <td><input type="text" name="owner" value="<?php echo $projName["owner"]?>"></td>
      </tr>
      <tr>
        <td>Edit Project Funds: </td>
        <td><input type="text" name="financial" value="<?php echo $projName["financial"]?>"></td>
      </tr>
      <tr>
        <td>Edit Project Duration</td>
        <td>
          Years: <input type="text" name="years" maxlength="2" value="<?php echo substr($projName["duration"], 0, 2)?>">
          Months: <input type="text" name="months" maxlength="2" value="<?php echo substr($projName["duration"], 2, 2)?>">
          Days: <input type="text" name="days" maxlength="2" value="<?php echo substr($projName["duration"], 4, 2)?>">
        </td>
      </tr>
      <tr>
        <td>Edit Project Mode: </td>
        <td><input type="text" name="mode" value="<?php echo $projName["mode"]?>"></td>
      </tr>
      <tr>
        <td>Edit Project Complexity: </td>
        <td><input type="text" name="complexity" value="<?php echo $projName["complexity"]?>"></td>
      </tr>
      <tr>
        <td>Edit Project Rating: </td>
        <td><input type="text" name="rating" value="<?php echo $projName["rating"]?>"></td>
      </tr>

    </table>
  </div>
  <div>
    <table>
      <tr>
        <td><input type="submit" name="back" value="Cancel"></td>
        <td><input type="submit" name="submit" value="Submit"></td>
      </tr>
    </table>
  </div>
</form>
</html>
