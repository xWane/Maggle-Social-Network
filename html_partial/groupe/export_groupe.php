<?php

session_start() ;

require '../../database/pdo.php';

if(!empty($_POST['name_groupe'])) {

$name_g = htmlspecialchars($_POST['name_groupe']);
$name_g = strtolower($name_g);
// On insère dans la base de données
$insert = $pdo->prepare("INSERT INTO group (group_name, group_pic, group_banner, private) VALUES (:name, :pic, :banner, 1)");
$insert->execute(array(
    ':name' => $name_g,
    ':pic' => "pp.png",
    ':banner' => "banner.jpg"
));
header('location: groupe.php');
}
?>