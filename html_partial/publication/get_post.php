<?php 
  require_once '../../database/pdo.php';
  $pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);

  $publications = $pdo->query("SELECT * FROM publication ORDER BY creation_date DESC");
?>




