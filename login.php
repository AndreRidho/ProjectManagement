<?php

session_start();

require_once 'pdo.php';

if(!isset($_SESSION["accessed"]) || !$_SESSION["accessed"]){
  header("Location: index.php");
  exit();
}

if(isset($_POST["login"])){

  if(!isset($_POST["username"]) || $_POST["username"]=="" ||
    !isset($_POST["password"]) || $_POST["password"]==""){

    error_log("Login fail bruh".$_POST["username"]."bruh".$_POST["password"]);

    $_SESSION["message"] = "Please do not leave any fields empty!";
    header("Location: login.php");
    exit();

  }


  $stmt = $pdo->query('SELECT username, password from user where type = "'.$_SESSION["type"].'";');
  while ( ($row = $stmt->fetch(PDO::FETCH_ASSOC)) ){

    if( ( $_POST["username"] == $row["username"] ) && ( $_POST["password"] == $row["password"] ) ){
      $_SESSION["loggedin"] = true;
      $_SESSION["message"] = "";
      $_SESSION["nameOfUser"] = $row["username"];
      header("Location: mainMenu.php");
      exit();
    }

  }

  error_log("wow still going bruh");

  $_SESSION["message"] = "Invalid username and/or password!";
  header("Location: login.php");
  exit();

}else if(isset($_POST["switch"])){

  if($_SESSION["type"] == "projMgr"){
    $_SESSION["type"] = "sysAdmin";
  }else if($_SESSION["type"] == "sysAdmin"){
    $_SESSION["type"] = "projMgr";
  }

  $_SESSION["message"] = "";
  header("Location: login.php");
  exit();

}else if(isset($_POST["back"])){

  header("Location: index.php");
  exit();

}

?>
<html>
  <head>
    <title id="title"></title>

  </head>
  <body>
    <div>
      <h1 id="h1"></h1>
      <h2>Login</h2>
    </div>
    <div>
      <p><?php echo $_SESSION["message"] ?></p>
    </div>
    <div>
      <form method="post">
        <table>
          <tr><td>
            <input type="text" name="username">
          </td></tr>
          <tr><td>
            <input type="password" name="password">
          </td></tr>
          <tr><td>
            <input type="submit" name="login" value="Login">
          </td></tr>
          <tr><td>
            <input type="submit" name="switch" id="switch">
          </td></tr>
          <tr><td>
            <input type="submit" name="back" value="Back to Index">
          </td></tr>
        </table>
      </form>
    </div>

    <?php

    if($_SESSION["type"] == "projMgr"){
      echo '<script>
              document.getElementById("switch").value = "Switch to System Administrator";
              document.getElementById("h1").innerHTML = "Project Manager";
              document.getElementById("title").innerHTML = "Project Manager";
            </script>';
    }else if($_SESSION["type"] == "sysAdmin"){
      echo '<script>
              document.getElementById("switch").value = "Switch to Project Manager";
              document.getElementById("h1").innerHTML = "System Administrator";
              document.getElementById("title").innerHTML = "System Administrator";
            </script>';
    }

    ?>


  </body>
</html>
