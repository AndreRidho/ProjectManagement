<?php

session_start();
if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

require_once 'pdo.php';
$stm = $pdo->prepare("select * from question where section_num = 7");
$stm->execute();
array_push($_SESSION["totalWeight"], 0);
$_SESSION["totalWeight"][6] = 0;

if(isset($_POST["submit"])){

  for($i=50 ; $i<=64 ; $i++){

    if(!isset($_POST["question_".$i]) || $_POST["question_".$i] == ""){
      $_SESSION["message"] = "Please do not leave any fields empty";
      header("Location: ProjectRequirementsRisks.php");
      exit();
    }

    $_SESSION["totalWeight"][6] = $_SESSION["totalWeight"][6] + $_POST["question_".$i];

  }

  $_SESSION["message"] = "";

  $total = 0;
  for($i=0 ; $i<count($_SESSION["totalWeight"]) ; $i++){
    $total = $total + $_SESSION["totalWeight"][$i];
  }

  $rating = ($total/320)*100;
  $complexity = "";

  if($rating<45){
    $complexity = "Sustaining";
  }else if($rating>=45 || $rating<=63){
    $complexity = "Tactical";
  }else if($rating>=64 || $rating<=82){
    $complexity = "Evolutionary";
  }else if($rating>82){
    $complexity = "Transformational";
  }

  array_push($_SESSION["newProj"], $complexity);
  array_push($_SESSION["newProj"], $rating);

  $autoInfo = 'INSERT INTO project
  (name, owner, financial, duration, mode, complexity, rating) VALUES (:n, :ow, :fn, :dr, :md, :com, :rat)';
  $stmt = $pdo->prepare($autoInfo);
  $stmt->execute(array(
    ':n' => $_SESSION["newProj"][0],
    ':ow' => $_SESSION["newProj"][1],
    ':fn' => $_SESSION["newProj"][2],
    ':dr' => $_SESSION["newProj"][3],
    ':md' => $_SESSION["newProj"][4],
    ':com' => $_SESSION["newProj"][5],
    ':rat' => $_SESSION["newProj"][6])
  );

  header("Location: registrationDisplay.php");
  exit();

}

?>
<html>
<head>
  <title>Project Complexity and Risk Assessment</title>
</head>
<body>
<h1>Section 7: Project Requirements Risks (15 Questions)</h1>
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
  <input type ="submit" value="Submit and Finish" name="submit">
</form>
<form action="ProjectManagementIntegrationRisks.php">
  <input type="submit" value="Previous Section">
</form>
</body>
</html>
