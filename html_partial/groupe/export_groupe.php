<?php

session_start() ;

require '../../database/pdo.php';

if(!empty($_POST['name_groupe'])) {

$name_g = htmlspecialchars($_POST['name_groupe']);
$name_g = strtolower($name_g);

$add = $pdo->prepare('UPDATE user SET userName = :name WHERE user_id = :id');
    $add->execute(array(
    ':name' => $name_mod,
    ':id' => $userId
    ));
}
?>