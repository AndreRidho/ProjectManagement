<?php

session_start();

if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

if(isset($_POST["back"]) || !isset($_GET["id"])){
  header("Location: projInfo.php");
  exit();
}

require_once 'pdo.php';

$id = $_GET["id"];
$stmt = $pdo->query("SELECT * FROM project where id = '".$id."';");
$project = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Choose</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css">
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
    margin-bottom: 5%;
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

    footer {
      padding: 15px;
      position: fixed;
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
        </form>
        </ul>
      </div>
    </div>
  </nav>



  <div class="container ">

<div class="row">

<div class="col-sm-20 text-center">
        <h1>Project List</h1>
        <hr>

        <table class="table table">
    <thead>
      <tr>
        <th scope="col">Project ID</th>
        <th scope="col">Porject Name</th>
        <th scope="col">Owner</th>
        <th scope="col">Financial/Funds</th>
        <th scope="col">Project/Duration</th>
        <th scope="col">Mode</th>
        <th scope="col">Complexity and Risk Level</th>
        <th scope="col">Rating</th>
      </tr>
    </thead>
    <tbody>

            <tr>
              <td>
            <?php echo $project["id"]; ?>
            </td>
            <td>
              <?php echo $project["name"]; ?>
            </td>
            <td>
              <?php echo $project["owner"]; ?>
          </td>
          <td>
            <?php echo $project["financial"]; ?>
        </td>
        <td>
          <?php

          $duration = $project["duration"];

          echo substr($duration, 0,2) . " years, " . substr($duration, 2,2) . " months, " . substr($duration, 4) . " days";

          ?>
      </td>
      <td>
<?php echo $project["mode"]; ?>
    </td>
    <td>
      <?php echo $project["complexity"]; ?>
      </td>
      <td>
        <?php echo $project["rating"]; ?>
        </td>


        </tr>

    </tbody>
  </table>

  <table class="table table">
<thead>
<tr>
  <th scope="col">Remark</th>
</tr>
</thead>
<tbody>

      <tr>
        <td>
              <?php

              if($project["complexity"] == "Sustaining"){

                echo '<p>Project has low risk and complexity. The project outcome affects only a specific service or at most a specific
                      program, and risk mitigations for general project risks are in place. The project does not consume a significant
                      percentage of departmental or agency resources.</p>';

              }else if($project["complexity"] == "Tactical"){

                echo '<p>A project rated at this level affects multiple services within a program and may involve more significant
                      procurement activities. It may involve some information management or information technology (IM/IT) or engineering
                      activities. The project risk profile may indicate that some risks could have serious impacts, requiring carefully
                      planned responses. The scope of a tactical project is operational in nature and delivers new capabilities within
                      limits.</p>';

              }else if($project["complexity"] == "Evolutionary"){

                echo '<p>As indicated by the name, projects within this level of complexity and risk introduce change, new capabilities
                      and may have a fairly extensive scope. Disciplined skills are required to successfully manage evolutionary projects.
                      Scope frequently spans programs and may affect one or two other departments or agencies. There may be substantial
                      change to business process, internal staff, external clients, and technology infrastructure. IM/IT components may
                      represent a significant proportion of total project activity.</p>';

              }else if($project["complexity"] == "Transformational"){

                echo '<p>At this level, projects require extensive capabilities and may have a dramatic impact on the organization and
                      potentially other organizations. Horizontal (i.e. multi-departmental, multi-agency, or multi-jurisdictional)
                      projects are transformational in nature. Risks associated with these projects often have serious consequences, such
                      as restructuring the organization, change in senior management, and/or loss of public reputation.</p>';

              }

              ?>
</td>

  </tr>

</tbody>
</table>



      </div>
    </div>
  </div>

      <footer class="container-fluid text-left">
        <button onclick="goBack()" class="btn btn-primary btn-lg">Back</button>
        <script>
          function goBack() {
            window.location.replace("projInfo.php");
          }
        </script>
      </footer>

</body>

</html>
