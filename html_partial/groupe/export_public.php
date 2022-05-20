<?php

session_start() ;

require '../../database/create_db.php';

if(!empty($_POST['name_groupe'])) {

    $name_g = htmlspecialchars($_POST['name_groupe']);
    $name_g = strtolower($name_g);
    $name = $name_g;
    // On insère dans la base de données
    $inserte = $pdo->prepare("INSERT INTO `group` (group_name, group_pic, group_banner, private) VALUES (:name, :pic, :banne, 1)");
    $inserte->execute(array(
        ':name' => $name,
        ':pic' => "pp.png",
        ':banne' => "banner.jpg"
    ));
    header('location: groupe.php');
}
?>