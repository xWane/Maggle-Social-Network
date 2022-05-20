<?php

session_start() ;

require '../../database/create_db.php';

if(!empty($_POST['name_groupe'])) {

    $name_g = htmlspecialchars($_POST['name_groupe']);
    $name_g = strtolower($name_g);
    // On insère dans la base de données
    $inserte = $pdo->prepare("INSERT INTO group (group_name, group_pic, group_banner, private) VALUES (:name, :pic, :banne, 1)");
    $inserte->execute(array(
        ':name' => $name_g,
        ':pic' => "pp.png",
        ':banne' => "banner.jpg"
    ));
    header('location: groupe.php');
}


// $insert = $pdo->prepare("INSERT INTO user (userMail, userPwd, userName, userSurname, profil_pic, profil_banner, visibility) VALUES (:email, :pass, :name, :surname, :imgProfil, :bannerProfil, 1)");
// $insert->execute(array(
//     ':email' => $email,
//     ':pass' => $pass,
//     ':name' => $name,
//     ':surname' => $surname,
//     ':imgProfil' => "pp.png",
//     ':bannerProfil' => "banner.jpg"
// ));
?>