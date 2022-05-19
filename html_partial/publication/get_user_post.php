<?php 
  require_once '../../database/pdo.php';

  $pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);

  $publications = $pdo->prepare("SELECT * FROM publication WHERE userId = :id ORDER BY creation_date DESC");
  $publications->execute(array(
    ":id" => $userId ,
    ));
?>
