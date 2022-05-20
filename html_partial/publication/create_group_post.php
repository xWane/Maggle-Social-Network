<?php
  require_once '../../database/pdo.php';
  require '../left.php';


  $req = $pdo->prepare('SELECT * FROM user WHERE user_id = :id');
  $req->execute(array(':id' => $_SESSION['user']));
  $data = $req->fetch();


  if(isset($_POST['publi-content'])) {

    if(!empty($_POST['publi-content'])){
      $userId;
      $publi_content = $_POST['publi-content'];
      $reaction_nb = 0;
  
      $query = $pdo->prepare("INSERT INTO `publication` (userId, content, creation_date, reaction_nb)
      VALUES (:userId, :publi_content, CURRENT_TIMESTAMP, :reaction_nb)");
      $query->execute([
        ":userId" => $userId,
        ":publi_content" => $publi_content,
        ":reaction_nb" => $reaction_nb
      ]);
    }
  } 
?>