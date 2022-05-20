<?php 
  require_once '../../database/pdo.php';

  $publications = $pdo->query("SELECT * FROM publication ORDER BY creation_date DESC");
?>




