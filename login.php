<?php

session_start();

require_once 'pdo.php';

$_SESSION["loggedin"] = false;

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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css">

</head>
<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">

      <div class="fadeIn first">
        <img src="clipart2389474.png" id="icon" alt="User Icon" />
      </div>
      <div>
        <p style="font-size:20px; color:red;"><?php echo $_SESSION["message"] ?></p>
      </div>
      <form method="post">
        <input type="text" class="fadeIn second" name="username" placeholder="login">
        <input type="text" class="fadeIn third" name="password" placeholder="password">
        <input type="submit" class="fadeIn fourth" value="Login" name= "login">

        <input type="submit" class="fadeIn fifth" name="switch" id="switch">

      </form>
    </div>
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
</div>
</div>

</body>
</html>
