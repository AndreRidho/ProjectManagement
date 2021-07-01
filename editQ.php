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
</head>
<div>
  <h1>Question List</h1>
</div>
<form method="post">
  <div>

    <table>
      <tr>
        <td>Project ID</td>
        <td>Name</td>
        <td></td>
      </tr>
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
    </table>

  </div>
  <div>
    <input type="submit" name="back" value="Back">
  </div>
</form>
</html>
