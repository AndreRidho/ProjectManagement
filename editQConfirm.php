<?php

session_start();

if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

require_once 'pdo.php';

$id = $_GET["id"];
$stmt = $pdo->query("SELECT section_num, question_num FROM question where id = '".$id."';");
$question = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<html>
<head>
  <title>Confirmed</title>
</head>
<body>
  <div>
    <h1><?php echo "Section ".$question["section_num"]." Question ".$question["question_num"]?> has been updated.</h1>
  </div>
  <div>
    <form action="maintenance.php">
      <input type="submit" value="Back" />
    </form>
  </div>
</body>
</html>
