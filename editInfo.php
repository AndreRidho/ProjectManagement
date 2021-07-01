<?php

session_start();

if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

require_once 'pdo.php';

if(isset($_POST["back"])){
  header("Location: maintenance.php");
}

?>
<html>
<head>
  <title>Edit Project Information</title>
</head>
<div>
  <h1>Project List</h1>
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
        $stmt = $pdo->query("SELECT id, name FROM project");
        while ( ($row = $stmt->fetch(PDO::FETCH_ASSOC)) ) {
            echo "<tr><td>";
            echo($row['id']);
            echo("</td><td>");
            echo($row['name']);
            echo("</td><td>");
            echo('<a href="editInfoPage.php?id='. $row['id'].'">Edit</a>');
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
