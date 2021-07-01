<?php

session_start();

if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

if(isset($_POST["projRegist"])){

}else if(isset($_POST["projInfo"])){

  header("Location: projInfo.php");
  exit();

}else if(isset($_POST["maintenance"])){

  header("Location: maintenance.php");
  exit();

}else if(isset($_POST["logout"])){

  $_SESSION["loggedin"] = false;
  header("Location: login.php");
  exit();

}

?>
<html>
  <head>
    <title>Main Menu</title>
  </head>
  <body>
    <div>
      <h1>Welcome, <?php echo $_SESSION["nameOfUser"] ?></h1>
    </div>
    <div>
      <form method="post">
        <table>
          <tr><td>
            <input type="submit" name="projRegist" value="Project Registration">
          </td></tr>
          <tr><td>
            <input type="submit" name="projInfo" value="Project Information">
          </td></tr>
          <tr id="mtnce"><td>
            <input type="submit" name="maintenance" value="Maintenance">
          </td></tr>
          <tr><td>
            <input type="submit" name="logout" value="Logout">
          </td></tr>
        </table>
      </form>
    </div>

    <?php

    if($_SESSION["type"] == "projMgr"){
      echo '<script>
              document.getElementById("mtnce").style.display = "none";
            </script>';
    }

    ?>

  </body>
</html>
