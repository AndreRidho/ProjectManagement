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

?>
<html>
<head>
  <title>Confirmed</title>
</head>
<body>
  <div>
    <h1><?php echo $projName["name"]?> has been updated.</h1>
  </div>
  <div>
    <form action="maintenance.php">
      <input type="submit" value="Back" />
    </form>
  </div>
</body>
</html>
