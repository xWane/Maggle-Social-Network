<style>
    <?php 
        include 'public/css/global.css';
        include 'public/css/post.css';
    ?>
</style>

<?php
  require '../html_partial/head.php'; 
  require_once '../database/pdo.php';

  $pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);


  if(isset($_POST['article-content'], $_POST['image-content'])) {

    if(!empty($_POST['article-content']) || !empty($_POST['image-content'])) {
      
      if(!empty($_POST['article-content']))
      {
        $article_content = htmlspecialchars($_POST['article-content']);
      }
      else
      {
        $article_content = "1";
      }

      if(!empty($_POST['image-content']))
      {
        $image_content = htmlspecialchars($_POST['image-content']);
      }
      else
      {
        $image_content = "1";
      }

      $ins = $pdo->prepare('INSERT INTO publication (content, publi_pic, creation_date)
        VALUES ( ?, ?, NOW())');
      $ins->execute(array($article_content, $image_content));

      $message = 'Votre article a bien été posté';
    }
    else {
      $message = 'Veuillez remplir tous les champs';
    }
  }

?>





<form method="POST"> 
  <input name="image-content" type="text" placeholder="A supp"/>
  <textarea name="article-content" placeholder="Quoi de neuf ?"></textarea>
  <input type="submit" value="Publier"/>
</form>

<?php if(isset($message)) { echo $message; } ?>





<?php require '../html_partial/footer.php'; ?>

<?php error_reporting(E_ALL); ?>
