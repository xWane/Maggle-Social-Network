<?php

session_start() ;

require '../../database/create_db.php';
require '../data.php';

if(!empty($_POST['name_groupe'])) {

    $name_g = htmlspecialchars($_POST['name_groupe']);
    $name_g = strtolower($name_g);
    $name = $name_g;
    var_dump($name);
    $inserte = $pdo->prepare('SELECT * FROM `group` WHERE group_name = :test');
    $inserte->execute(array(':test' => $name));
    $row = $inserte->rowCount();

    if($row == 0) {
        $inserte = $pdo->prepare("INSERT INTO `group` (group_name, group_pic, group_banner, private) VALUES (:name, :pic, :banne, 1)");
        $inserte->execute(array(
        ':name' => $name,
        ':pic' => "pp.png",
        ':banne' => "banner.jpg"
        ));

        $inserte = $pdo->prepare('SELECT group_id FROM `group` WHERE group_name = :gname');
        $inserte->execute(array(':gname' => $name));
        $grp = $inserte->fetch();

        $inserte = $pdo->prepare("INSERT INTO `group_user` (group_id, user_id, admin) VALUES (:gr, :usr, 1)");
        $inserte->execute(array(
        ':gr' => $grp[0],
        ':usr' => $userId,
        ));

        header("location: groupe.php?reg_err=$grp[0]");

    } else {
        header('location: ../list/list-g.php?reg_err=groupe_existant');
    }
    // On insère dans la base de données

}
?>