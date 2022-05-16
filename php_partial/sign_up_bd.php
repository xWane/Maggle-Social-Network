<?php
function addDB()
{
    // PDO
    require "database\pdo.php";

    // Vérifie si le mail a le bon format
    $mail = $_POST['username'];
    $mailVerified =  str_ends_with($mail, '@hetic.eu');

    // Encrypte le mot de passe et le vérifie lors de la confirmation
    $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
    $mdpVerified = password_verify($_POST['mdp_confirm'], $mdp);

    // Connection à la database pour effectuer les reqûetes
    $link = new PDO("$engine:host=$host;dbname=$dbname", $username, $password);

    // Vérifie si le mail donné existe déjà dans la database ou non
    $mailListRequest = $link->prepare("SELECT mail FROM user WHERE mail=? ");
    $mailListRequest->execute(
        [$mail]
    );

    $mailExist = $mailListRequest->fetch();

    // Insertion dans la base de données si les conditions sont respectés
    if ($link and $mailVerified and $mdpVerified and $mailExist === false) {
        $ins = $link->prepare("INSERT INTO user (mail, password) VALUES (:mail,:password)");
        $ins->execute(array(
            ":mail" => $mail,
            ":password" => $mdp
        ));
    }
}
?>