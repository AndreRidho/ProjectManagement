<?php

session_start();

if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

require_once 'pdo.php';
$stm = $pdo->prepare("select * from question where section_num = 1");
$stm->execute();
array_push($_SESSION["totalWeight"], 0);
$_SESSION["totalWeight"][0] = 0;

if(isset($_POST["submit"])){



  if($_POST["question_1"] == "5" && $_POST["question_3"] == "5" && $_POST["question_11"] == "5"){
    $_SESSION["message"] = "";
    $_SESSION["totalWeight"][0] = 90;
    header("Location: StrategicManagementRisks.php");
    exit();
  }else {

    for($i=1 ; $i<=18 ; $i++){

      if(!isset($_POST["question_".$i]) || $_POST["question_".$i] == ""){
        $_SESSION["message"] = "Please do not leave any fields empty";
        header("Location: ProjectCharacteristics.php");
        exit();
      }

      $_SESSION["totalWeight"][0] = $_SESSION["totalWeight"][0] + $_POST["question_".$i];

    }

    if($_POST["question_2"] == 1){
      $_SESSION["procurement"] = false;
    }else{
      $_SESSION["procurement"] = true;
    }

    $_SESSION["message"] = "";
    header("Location: StrategicManagementRisks.php");
    exit();

  }

}

?>

<html>
<head>
  <title>Project Complexity and Risk Assessment</title>
</head>
<body>

<h1>Section 1: Project Characteristics (18 Questions)</h1>
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
  <input type ="submit" value="Submit" name="submit">
</form>
</body>
</html>
