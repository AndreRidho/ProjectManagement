<?php

session_start();
if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

require_once 'pdo.php';
$stm = $pdo->prepare("select * from question where section_num = 4");
$stm->execute();
array_push($_SESSION["totalWeight"], 0);
$_SESSION["totalWeight"][3] = 0;

if(isset($_POST["previous"])){

  $_SESSION["message"] = "";

  if($_SESSION["procurement"]){

    header("Location: ProcurementRisks.php");
    exit();

  }else{

    header("Location: StrategicManagementRisks.php");
    exit();

  }

}

if(isset($_POST["submit"])){

  for($i=34 ; $i<=38 ; $i++){

    if(!isset($_POST["question_".$i]) || $_POST["question_".$i] == ""){
      $_SESSION["message"] = "Please do not leave any fields empty";
      header("Location: HumanResourceRisks.php");
      exit();
    }

    $_SESSION["totalWeight"][3] = $_SESSION["totalWeight"][3] + $_POST["question_".$i];

  }

  $_SESSION["message"] = "";
  header("Location: BusinessRisks.php");
  exit();

}

?>
<html>
<head>
  <title>Project Complexity and Risk Assessment</title>
</head>
<body>
<h1>Section 4: Human Resource Risk</h1>
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
<form method="post">
  <input type="submit" value="Previous Section" name="previous">
</form>
</body>
</html>
