<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=proj_mgmt',
    'fred', 'zap');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html>
<head>
  <title>Project Management System</title>
</head>
</html>
