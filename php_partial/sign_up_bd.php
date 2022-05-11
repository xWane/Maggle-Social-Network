<?php
function addDB()
{
  require __DIR__ . "../database/pdo.php";

  $mail = $_POST['username'];
  $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);

  $link = new PDO("$engine:host=$host;dbname=$dbname", $username, $password);

  // Utiliser password_verify pour vérifier si le mot de passe est le bon
  if ($link and str_ends_with($mail, '@hetic.eu')) {
    $ins = $link->prepare("INSERT INTO user (mail, mdp) VALUES (:mail,:mdp)");
    $ins->execute(array(
      ":mail" => $mail,
      ":mdp" => $mdp
    ));
  }
}
?>