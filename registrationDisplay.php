<?php

session_start();

if(!$_SESSION["loggedin"]){
  $_SESSION["message"] = "Please login first";
  header("Location: login.php");
  exit();
}

if(isset($_POST["back"])){
  header("Location: mainMenu.php");
  exit();
}

?>
<html>
<head>
  <title>Project Submitted</title>
</head>
<div>
  <h1><?php echo $_SESSION["newProj"][0];?></h1>
  <h2>Project Submitted</h2>
</div>
<form method="post">
  <div>
    <table>

      <tr>
        <td>Project Name: </td>
        <td><?php echo $_SESSION["newProj"][0]; ?></td>
      </tr>
      <tr>
        <td>Owner: </td>
        <td><?php echo $_SESSION["newProj"][1]; ?></td>
      </tr>
      <tr>
        <td>Financial/Funds: </td>
        <td><?php echo $_SESSION["newProj"][2]; ?></td>
      </tr>
      <tr>
        <td>Project/Duration: </td>
        <td>
            <?php

            $duration = $_SESSION["newProj"][3];

            echo substr($_SESSION["newProj"][3], 0,2) . " years, " . substr($_SESSION["newProj"][3], 2,2) . " months, " . substr($_SESSION["newProj"][3], 4) . " days";

            ?>
        </td>
      </tr>
      <tr>
        <td>Mode: </td>
        <td><?php echo$_SESSION["newProj"][4]; ?></td>
      </tr>
      <tr>
        <td>Complexity and Risk Level: </td>
        <td><?php echo $_SESSION["newProj"][5]; ?></td>
      </tr>
    </table>
  </div>

  <div>

    <?php

    if($_SESSION["newProj"][5] == "Sustaining"){

      echo '<p>Project has low risk and complexity. The project outcome affects only a specific service or at most a specific
            program, and risk mitigations for general project risks are in place. The project does not consume a significant
            percentage of departmental or agency resources.</p>';

    }else if($_SESSION["newProj"][5] == "Tactical"){

      echo '<p>A project rated at this level affects multiple services within a program and may involve more significant
            procurement activities. It may involve some information management or information technology (IM/IT) or engineering
            activities. The project risk profile may indicate that some risks could have serious impacts, requiring carefully
            planned responses. The scope of a tactical project is operational in nature and delivers new capabilities within
            limits.</p>';

    }else if($_SESSION["newProj"][5] == "Evolutionary"){

      echo '<p>As indicated by the name, projects within this level of complexity and risk introduce change, new capabilities
            and may have a fairly extensive scope. Disciplined skills are required to successfully manage evolutionary projects.
            Scope frequently spans programs and may affect one or two other departments or agencies. There may be substantial
            change to business process, internal staff, external clients, and technology infrastructure. IM/IT components may
            represent a significant proportion of total project activity.</p>';

    }else if($_SESSION["newProj"][5] == "Transformational"){

      echo '<p>At this level, projects require extensive capabilities and may have a dramatic impact on the organization and
            potentially other organizations. Horizontal (i.e. multi-departmental, multi-agency, or multi-jurisdictional)
            projects are transformational in nature. Risks associated with these projects often have serious consequences, such
            as restructuring the organization, change in senior management, and/or loss of public reputation.</p>';

    }

    ?>

  </div>

  <div>

    <p>Rating: <?php echo $_SESSION["newProj"][6] ?></p>

  </div>

  <div>
    <input type="submit" name="back" value="Back To Main Menu">
  </div>
</form>
</html>
