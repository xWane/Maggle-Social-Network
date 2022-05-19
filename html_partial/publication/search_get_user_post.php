<?php 
  require_once '../../database/pdo.php';
  require '../../search_form.php';


  $publications = $pdo->prepare("SELECT * FROM publication WHERE userId = :id ORDER BY creation_date DESC");
  $publications->execute(array(
    ":id" => $id ,
    ));
?>