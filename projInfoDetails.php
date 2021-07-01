<?php

session_start();

if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

if(isset($_POST["back"])){
  header("Location: projInfo.php");
  exit();
}

require_once 'pdo.php';

$id = $_GET["id"];
$stmt = $pdo->query("SELECT * FROM project where id = '".$id."';");
$project = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<html>
<head>
  <title><?php echo $project["name"];?></title>
</head>
<div>
  <h1><?php echo $project["name"];?></h1>
  <h2>Project Information</h2>
</div>
<form method="post">
  <div>
    <table>

      <tr>
        <td>Project ID: </td>
        <td><?php echo $project["id"]; ?></td>
      </tr>
      <tr>
        <td>Project Name: </td>
        <td><?php echo $project["name"]; ?></td>
      </tr>
      <tr>
        <td>Owner: </td>
        <td><?php echo $project["owner"]; ?></td>
      </tr>
      <tr>
        <td>Financial/Funds: </td>
        <td><?php echo $project["financial"]; ?></td>
      </tr>
      <tr>
        <td>Project/Duration: </td>
        <td>
            <?php

            $duration = $project["duration"];

            echo substr($duration, 0,2) . " years, " . substr($duration, 2,2) . " months, " . substr($duration, 4) . " days";

            ?>
        </td>
      </tr>
      <tr>
        <td>Mode: </td>
        <td><?php echo $project["mode"]; ?></td>
      </tr>
      <tr>
        <td>Complexity and Risk Level: </td>
        <td><?php echo $project["complexity"]; ?></td>
      </tr>
    </table>
  </div>

  <div>

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

  </div>

  <div>

    <p>Rating: <?php echo $project["rating"] ?></p>

  </div>

  <div>
    <input type="submit" name="back" value="Back">
  </div>
</form>
</html>
