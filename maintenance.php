<?php

session_start();

if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

if(isset($_POST["editInfo"])){
  header("Location: editInfo.php");
  exit();
}else if(isset($_POST["editQ"])){
  header("Location: editQ.php");
  exit();
}
else if(isset($_POST["back"])){
  header("Location: mainMenu.php");
  exit();
}

?>
<html>
  <head>
    <title>Maintenance</title>
  </head>
  <body>
    <div>
      <h1>Maintenance</h1>
    </div>
    <div>
      <form method="post">
        <table>
          <tr><td>
            <input type="submit" name="editInfo" value="Edit Project Information">
          </td></tr>
          <tr><td>
            <input type="submit" name="editQ" value="Edit Questions">
          </td></tr>
          <tr><td>
            <input type="submit" name="back" value="Back To Main Menu">
          </td></tr>
        </table>
      </form>
    </div>

  </body>
</html>
