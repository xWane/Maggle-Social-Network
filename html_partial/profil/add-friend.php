<?php
require '../left.php';

$posee = $url;
$posee = explode(".php",$posee);

if($posee[1] !== "") {
    $posee = $url;
    $posee = explode("err=",$posee);
}

$insert = $pdo->prepare("INSERT INTO friends (user_id, friend_id, status) VALUES (:id, :idf, 1)");
    $insert->execute(array(
        ':id' => $userId,
        ':idf' => $posee[1]
    ));

    header('location: profil.php');

?>