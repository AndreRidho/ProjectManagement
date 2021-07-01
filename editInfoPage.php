<?php

session_start();

if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

require_once 'pdo.php';

$id = $_GET["id"];
$stmt = $pdo->query("SELECT name FROM project where id = '".$id."';");
$projName = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST["back"])){
  header("Location: editInfo.php");
}else if(isset($_POST["submit"])){

  $stmt = $pdo->prepare("UPDATE project SET complexity=:co, rating=:ra WHERE id='".$id."';");
  $stmt->execute(array(':ra' => $_POST['rating'],
                       ':co' => $_POST['complexity'])
                       );

  header("Location:editConfirm.php?id=$id");
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
<form method="post">
  <div>
    <table>
      <tr><td>Edit Project Name</td></tr>
      <tr><td><input type="text" name="rating"></td></tr>
      <tr><td>Edit Project Owner</td></tr>
      <tr><td><input type="text" name="complexity"></td></tr>
      <tr><td>Edit Project Funds</td></tr>
      <tr><td><input type="text" name="rating"></td></tr>
      <tr><td>Edit Project Duration</td></tr>
      <tr><td><input type="text" name="complexity"></td></tr>
      <tr><td>Edit Project Rating</td></tr>
      <tr><td><input type="text" name="rating"></td></tr>
      <tr><td>Edit Project Complexity</td></tr>
      <tr><td><input type="text" name="complexity"></td></tr>

      <tr><td>Edit Project Rating</td></tr>
      <tr><td><input type="text" name="rating"></td></tr>
      <tr><td>Edit Project Complexity</td></tr>
      <tr><td><input type="text" name="complexity"></td></tr>
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
