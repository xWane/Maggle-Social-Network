<?php

session_start() ;

require '../../database/create_db.php';
require '../data.php';

if(!empty($_POST['name_groupe'])) {

    $name_g = htmlspecialchars($_POST['name_groupe']);
    $name_g = strtolower($name_g);
    $name = $name_g;
    var_dump($name);
    $inserte = $pdo->prepare('SELECT * FROM `page` WHERE group_name = :test');
    $inserte->execute(array(':test' => $name));
    $row = $inserte->rowCount();

    if($row == 0) {
        $inserte = $pdo->prepare("INSERT INTO `page` (page_name, page_pic, pager_banner) VALUES (:name, :pic, :banne)");
        $inserte->execute(array(
        ':name' => $name,
        ':pic' => "pp.png",
        ':banne' => "banner.jpg"
        ));

        $inserte = $pdo->prepare('SELECT page_id FROM `page` WHERE page_name = :gname');
        $inserte->execute(array(':gname' => $name));
        $grp = $inserte->fetch();

        $inserte = $pdo->prepare("INSERT INTO `page_member` (page_id, user_id, admin) VALUES (:gr, :usr, 1)");
        $inserte->execute(array(
        ':gr' => $grp[0],
        ':usr' => $userId,
        ));

        header("location: page.php?reg_err=$grp[0]");

    } else {
        header('location: ../list/list-p.php?reg_err=groupe_existant');
    }
    // On insère dans la base de données

}
?>