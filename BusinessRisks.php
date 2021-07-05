<?php

session_start();
if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

require_once 'pdo.php';
$stm = $pdo->prepare("select * from question where section_num = 5");
$stm->execute();
array_push($_SESSION["totalWeight"], 0);
$_SESSION["totalWeight"][4] = 0;

if(isset($_POST["submit"])){

  for($i=39 ; $i<=43 ; $i++){

    if(!isset($_POST["question_".$i]) || $_POST["question_".$i] == ""){
      $_SESSION["message"] = "Please do not leave any fields empty";
      header("Location: BusinessRisks.php");
      exit();
    }

    $_SESSION["totalWeight"][4] = $_SESSION["totalWeight"][4] + $_POST["question_".$i];

  }

  $_SESSION["message"] = "";
  header("Location: ProjectManagementIntegrationRisks.php");
  exit();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Business Risks</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="qStyles.css">
  <style>

  body{
    background-color: #ebfeff;
  }
  .navbar {
    padding-top: 5px;
    margin-bottom: 0%;
    border-radius: 0;
    background-color: #1B1B1B;
  }

  .container:hover .overlay {
    opacity: 1;
  }

  .text {
    color: white;
    font-size: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
  }

  .sidenav {
    width: 300px;
      height: 100%;
    }
    .intopositionBoyz{
      padding-right: 25px;
    }
    footer {
      padding: 15px;
      position: relative;
      left: 0;
      bottom: 0;
      width: 100%;
      text-align: center;
      background-color: #343a42;
    }
  </style>

</head>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="mainMenu.php" style="color:#FFFFFF;">Project Management System</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">

<form method="post">
          <li><button type="submit" class="btn btn-primary" name="logout" value="Logout">Logout</button>
          </li>
        </form>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container text-center downBro">
<h1>Section 5: Business Risks (5 Questions)</h1>
  </div>

<p><?php echo $_SESSION["message"] ?></p>
<form method="post">
<ul style="list-style-type:none;">
  <?php while ($question = $stm->fetch(PDO::FETCH_OBJ)){?>
      <li>
        <?php echo $question->question_content; ?>
        <input type="hidden" name="questionId" value="<?php echo $question->id; ?>"
        <ol type="a">
          <?php
          $stm2 = $pdo->prepare("select * from choice where question_id = :question_id");
          $stm2->bindValue("question_id", $question->id);
          $stm2->execute();
           ?>
           <?php while ($choice = $stm2->fetch(PDO::FETCH_OBJ)){?>
             <ul>
               <input type="radio" name="question_<?php echo $question->id; ?>"
               value="<?php echo $choice->weight; ?>">
               <?php echo $choice->choice_content; ?>
             </ul>
           <?php } ?>
         </ol>
      </li>
  <?php } ?>
  </ul>
  <br>
  <div class="container intopositionBoyz">
  <input type ="submit" value="Submit" class="btn btn-primary btn-lg " name="submit">
  <input type ="reset" value="Reset" class="btn btn-secondary btn-lg ">
  </div>


</form>

<footer class="container-fluid text-left">
  <button onclick="goBack()" class="btn btn-primary btn-lg">Back</button>
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</footer>

</body>
</html>
