<html>
<head>
<title>Project Registration</title>
</head>
<body>

    <h1 style="font-size:50px;">Project Registration</h1>

    <?php
      require_once "pdo.php";
      $failure="";
      if(isset($_POST['submit'])){
        if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['owner']) && isset($_POST['financial']) && isset($_POST['duration']) && isset($_POST['mode'])){

          if (strlen($_POST['id']) < 1 || !is_numeric($_POST['id'])) {
              $failure = "Please enter a project ID in numeric";
          }else if(strlen($_POST['name']) < 1){
              $failure = "Please enter the project's name";
          }else if(strlen($_POST['owner']) < 1){
              $failure = "Please enter the owner's name";
          }else if(!is_numeric($_POST['financial']) || !is_numeric($_POST['duration'])){
              $failure = "Both funds and duration must be numeric";
          }

            $autoInfo = 'INSERT INTO project
                (id, name, owner, financial, duration, mode) VALUES ( :id, :n, :ow, :fn, :dr, :md)';
            $stmt = $pdo->prepare($autoInfo);
            $stmt->execute(array(
                ':id' => $_POST['id'],
                ':n' => $_POST['name'],
                ':ow' => $_POST['owner'],
                ':fn' => $_POST['financial'],
                ':dr' => $_POST['duration'],
                ':md' => $_POST['mode'])
            );
          }
          header('Location" ProjectCharacteristics.php');
        }
          
      if ( $failure !== false ) {
          echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
      }
      ?>

    <form method="POST" action="ProjectCharacteristics.php">
      <input type="text" name="id" placeholder="Project ID" size="20">
      <br>
      <br>
      <input type="text" name="name" placeholder="Project Name">
      <br>
      <br>
      <input type="text" name="owner" placeholder="Owner">
      <br>
      <br>
      <input type="text" name="financial" placeholder="Financial/Funds">
      <br>
      <br>
      <input type="text" name="duration" placeholder="Project Duration">
      <br>
      <br>
      <label for="mode">Mode:</label>
      <br>
      <input type="radio" id="insource" name="mode" value="Insource">
      <label for="insource">Insource</label>
      <br>
      <input type="radio" id="outsource" name="mode" value="Outsource">
      <label for="outsource">Outsource</label>
      <br>
      <input type="radio" id="cosource" name="mode" value="Co-source">
      <label for="cosource">Co-source</label>
      <br>
      <input type="radio" id="unspecified" name="mode" value="Unspecified">
      <label for="unspecified">Unspecified</label>
      <br>
      <br>
      <input type="submit" value="Submit">

    </form>
  </body>
</html>
