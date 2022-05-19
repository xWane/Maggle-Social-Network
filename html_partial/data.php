<?php
// On récupere les données de l'utilisateur
$req = $pdo->prepare('SELECT * FROM user WHERE user_id = :id');
$req->execute(array(':id' => $_SESSION['user']));
$data = $req->fetch();

$userId = $data['user_id'];
$profilPic = $data['profil_pic'];
$profilBanner = $data['profil_banner'];
$name = ucfirst($data['userName']);
$surname = ucfirst($data['userSurname']);
$bio = ucfirst($data['biograph'])
?>