<?php
  require '../html_partial/head.php'; 
  require_once '../database/pdo.php';



  try{
    $pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);
  } catch(Exception $e) {
    echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
    die();
  }

  if(isset($_POST['publi-content'], $_POST['image-content'])) {

    $userId = 1;
    $publi_content = $_POST['publi-content'];
    $image_content = $_POST['image-content'];
    $reaction_nb = 3;
    var_dump($userId);
    var_dump($publi_content);
    var_dump($image_content);
    var_dump($reaction_nb);

    $query = $pdo->prepare("INSERT INTO `publication` (userId, content, publi_pic, creation_date, reaction_nb)
    VALUES (:userId, :publi_content, :image_content, CURRENT_TIMESTAMP, :reaction_nb)");
    // VALUES ( 1, 'qdq', 'dzed', CURRENT_TIMESTAMP, 2);
    $query->execute([
      ":userId" => $userId,
      ":publi_content" => $publi_content,
      ":image_content" => $image_content,
      ":reaction_nb" => $reaction_nb
    ]);

    $message = 'Votre article a bien été posté';

  } else {
    $message = 'Impossible';
  }
  

?>

<form method="POST"> 
  <input name="image-content" type="text" placeholder="A supp"/>
  <textarea name="publi-content" placeholder="Quoi de neuf ?"></textarea>
  <input type="submit" value="Publier"/>
</form>

<?php if(isset($message)) { echo $message; } ?>





<?php require '../html_partial/footer.php'; ?>
