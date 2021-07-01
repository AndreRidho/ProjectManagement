<?php

session_start();

$_SESSION["message"] = "";
$_SESSION["type"] = "";
$_SESSION["loggedin"] = false;
$_SESSION["nameOfUser"] = "";
$_SESSION["accessed"] = true;

if(isset($_POST["projMgr"])){

  $_SESSION["type"] = "projMgr";
  header("Location: login.php");
  exit();

}else if(isset($_POST["sysAdmin"])){

  $_SESSION["type"] = "sysAdmin";
  header("Location: login.php");
  exit();

}

?>
<html>
  <head>
    <title>Project Management System</title>
  </head>
  <body>
    <div>
      <h1>Welcome to Project Management System</h1>
      <h2>Choose your user-type</h2>
    </div>
    <div>
      <form method="post">
        <table>
          <tr><td>
            <input type="submit" name="projMgr" value="Project Manager">
          </td></tr>
          <tr><td>
            <input type="submit" name="sysAdmin" value="System Administrator">
          </td></tr>
        </table>
      </form>
    </div>

  </body>
</html>
