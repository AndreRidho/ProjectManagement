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

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Question Information</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
  table{
    background-color: #343a42;
    color: white;
    border-collapse: collapse;
  }


        th, td {
            width:1000px;
            text-align:center;
            border:5px solid #ebfeff;
            padding:10px;
        }

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
      padding-left: 25%;
    }
    footer {
      padding: 15px;
      margin-top: 20px;
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

  <div class="container text-center">
<h1>  <?php echo "Section ".$question["section_num"]." Question ".$question["question_num"]?> </h1>
    <h2><?php echo $_SESSION["message"] ?></h2>
  </div>

  <div class="container text-center intopositionBoyz">
    <div class="row">
        <div class="col-sm-20">
        <div class="col-lg-8 personal-info">


        <form method="post">

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Edit Question Section</label>
                    <div class="col-lg-9">
                      <input type="text" name="section_num" value="<?php echo $question["section_num"] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Edit Question Number</label>
                    <div class="col-lg-9">
                    <input type="text" name="question_num" value="<?php echo $question["question_num"] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Edit Question Content</label>
                    <div class="col-lg-9">
                        <textarea name="question_content" form="inputForm"><?php echo $question["question_content"] ?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Edit Choices</label>
                    <div class="col-lg-9">
                    </div>

<div class="form-group row">
                <?php
                  for ($i=0 ; $i<$_SESSION["count"] ; $i++) {
                      if($i < count($choices)){
                        $choice = $choices[$i];
                echo '
                        Choice '.($i+1).' : <textarea name="choice_content'.($i+1).'" form="inputForm">'.$choice["choice_content"].'</textarea>';
                        ?>
                        <div class="col-lg-9">
                            <?php
                    echo '
                          Choice '.($i+1).' weight: <input type="text" name="weight'.($i+1).'" value="'.$choice["weight"].'">';  ?>
                    </div>
                  </div>
 <div class="form-group row">
                  <?php
                }  else{
                      echo '
                    Choice '.($i+1).' : <textarea name="choice_content'.($i+1).'" form="inputForm"></textarea>';
                        echo '    <div class="col-lg-9">
                      Choice '.($i+1).' weight: <input type="text" name="weight'.($i+1).'" value="0"></td></tr>';


                    }
                  }
                ?>
 </div></div>

 <div class="form-group row">
   <div class="col-md-3">
           <input type="reset" class="btn btn-secondary" value="Cancel">
         </div>
           <div class="col-md-3">
           <input type="submit" class="btn btn-primary" name="submit" value="Save Changes">
       </div>
<div class="col-md-3">
       <?php
         echo "<p>".$_SESSION["message"]."</p>";
       ?>
       </div>

</div>
</form>
            </div>

            </div>
            </div>
            </div>
    </div>

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
