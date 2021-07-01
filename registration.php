<html>
<head>
<title>Project Registration</title>
</head>
<body>

    <h1 style="font-size:50px;">Project Registration</h1>

    <?php
      require_once "pdo.php";
      $failure="";

      if (isset($_POST['proj_id']) && isset($_POST['proj_name']) && isset($_POST['owner']) && isset($_POST['finance']) && isset($_POST['duration']) && isset($_POST['mode'])){

        if (strlen($_POST['proj_id']) < 1 || !is_numeric($_POST['proj_id'])) {
            $failure = "Please enter a project ID in numeric";
        }else if(strlen($_POST['proj_name']) < 1){
            $failure = "Please enter the project's name";
        }else if(strlen($_POST['owner']) < 1){
            $failure = "Please enter the owner's name";
        }else if(!is_numeric($_POST['finance']) || !is_numeric($_POST['duration'])){
            $failure = "Both funds and duration must be numeric";
        }

          $autoInfo = 'INSERT INTO details
              (proj_id, proj_name, owner, finance, duration, mode) VALUES ( :pid, :pn, :ow, :fn, :dr, :md)';
          $stmt = $pdo->prepare($autoInfo);
          $stmt->execute(array(
              ':pid' => $_POST['proj_id'],
              ':pn' => $_POST['proj_name'],
              ':ow' => $_POST['owner'],
              ':fn' => $_POST['finance'],
              ':dr' => $_POST['duration'],
              ':md' => $_POST['mode'])
          );

          echo('<p style="color: green;">'.htmlentities("Project has been registered")."</p>\n");
        }

      if ( $failure !== false ) {
          echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
      }
      ?>

    <form method="POST">
      <input type="text" name="proj_id" placeholder="Project ID" size="20">
      <br>
      <br>
      <input type="text" name="proj_name" placeholder="Project Name">
      <br>
      <br>
      <input type="text" name="owner" placeholder="Owner">
      <br>
      <br>
      <input type="text" name="finance" placeholder="Financial/Funds">
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
      <?php
      if(isset($_POST['submit']) || empty($_POST['mode'])){
        $failure = "Please choose a mode";
      }
      ?>
      <form action="location.reload()" method="GET">
        <button>Reload</button>
    </form>
  </body>
</html>
