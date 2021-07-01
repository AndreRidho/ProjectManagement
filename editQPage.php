<?php

session_start();

if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

require_once 'pdo.php';

$id = $_GET["id"];
$stmt = $pdo->query("SELECT id, section_num, question_num, question_content FROM question where id = '".$id."';");
$question = $stmt->fetch(PDO::FETCH_ASSOC);

$choices = [];

$stmt = $pdo->query("SELECT id, choice_content, weight FROM choice where question_id = '".$id."';");
while ( ($row = $stmt->fetch(PDO::FETCH_ASSOC)) ) {
  array_push($choices, $row);
}

if($_SESSION["first"]) {
  $_SESSION["count"] = count($choices);
  $_SESSION["first"] = false;
}

if(isset($_POST["back"])){
  header("Location: editQ.php");
}else if(isset($_POST["add"])){
  $_SESSION["message"] = "";
  $_SESSION["count"]++;
}else if(isset($_POST["submit"])){

  if(!isset($_POST["section_num"]) || $_POST["section_num"]=="" || !is_numeric($_POST["section_num"]) ||
    !isset($_POST["question_num"]) || $_POST["question_num"]=="" || !is_numeric($_POST["question_num"]) ||
    !isset($_POST["question_content"]) || $_POST["question_content"]==""){
      $_SESSION["message"] = 'Invalid Question Information';
      header("Location:editQPage.php?id=$id");
  }else{

    for ($i=0 ; $i<$_SESSION["count"] ; $i++){

      if(!isset($_POST["choice_content".($i+1)]) || $_POST["choice_content".($i+1)]=="" ||
        !isset($_POST["weight".($i+1)]) || $_POST["weight".($i+1)]=="" || !is_numeric($_POST["weight".($i+1)])){

          $_SESSION["message"] = 'Invalid Choice Information';
          header("Location:editQPage.php?id=$id");

      }

    }

    $stmt = $pdo->prepare("UPDATE question SET section_num=:sn, question_num=:qn, question_content=:qc WHERE id=".$id.";");
    $stmt->execute(array(':sn' => $_POST["section_num"],
                         ':qn' => $_POST["question_num"],
                         ':qc' => $_POST["question_content"]
                       ));

     for ($i=0 ; $i<$_SESSION["count"] ; $i++){

       if($i < count($choices)){

         $choice = $choices[$i];

         $stmt = $pdo->prepare("UPDATE choice SET choice_content=:cc, weight=:wt WHERE id=".$choice["id"].";");
         $stmt->execute(array(':cc' => $_POST["choice_content".($i+1)],
                              ':wt' => $_POST["weight".($i+1)]
                            ));
       }else{

         $stmt = $pdo->prepare("INSERT INTO choice (question_id, choice_content, weight) VALUES (:q_id, :cc, :wt);");
         $stmt->execute(array(':q_id' => $id,
                              ':cc' => $_POST["choice_content".($i+1)],
                              ':wt' => $_POST["weight".($i+1)]
                            ));

       }

     }

    $_SESSION["message"] = "";
    header("Location:editQConfirm.php?id=$id");

  }


}

?>
<html>
<head>
  <title>Edit Question Information</title>
</head>
<div>
  <h1><?php echo "Section ".$question["section_num"]." Question ".$question["question_num"]?></h1>
  <h2><?php echo $_SESSION["message"] ?></h2>
</div>
<form method="post" id="inputForm">
  <div>
    <table>
      <tr><td>Edit Question Section</td></tr>
      <tr><td><input type="text" name="section_num" value="<?php echo $question["section_num"] ?>"></td></tr>
      <tr><td>Edit Question Number</td></tr>
      <tr><td><input type="text" name="question_num" value="<?php echo $question["question_num"] ?>"></td></tr>
      <tr><td>Edit Question Content</td></tr>
      <tr><td><textarea name="question_content" form="inputForm"><?php echo $question["question_content"] ?></textarea></td></tr>
      <tr><td>Edit Choices</td></tr>

        <?php
          for ($i=0 ; $i<$_SESSION["count"] ; $i++) {

            if($i < count($choices)){
              $choice = $choices[$i];
              echo '<tr><td>Choice '.($i+1).' : <textarea name="choice_content'.($i+1).'" form="inputForm">'.$choice["choice_content"].'</textarea></td></tr>';
              echo '<tr><td>Choice '.($i+1).' weight: <input type="text" name="weight'.($i+1).'" value="'.$choice["weight"].'"></td></tr>';
            }else{
              echo '<tr><td>Choice '.($i+1).' : <textarea name="choice_content'.($i+1).'" form="inputForm"></textarea></td></tr>';
              echo '<tr><td>Choice '.($i+1).' weight: <input type="text" name="weight'.($i+1).'" value="0"></td></tr>';
            }

          }
        ?>

        <tr><td><input type="submit" name="add" value="Add choice"></td></tr>

    </table>
  </div>
  <div>
    <table>
      <tr>
        <td><input type="submit" name="back" value="Cancel"></td>
        <td><input type="submit" name="submit" value="Submit"></td>
      </tr>
    </table>
  </div>
</form>
</html>
