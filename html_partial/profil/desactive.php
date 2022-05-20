<?php
require "../../database/pdo.php";

session_start();

$req = $pdo->prepare('SELECT * FROM user WHERE user_id = :id');
$req->execute(array(':id' => $_SESSION['user']));
$data = $req->fetch();

$userId = $data['user_id'];


$userID = $userId;

$reply = $pdo->prepare("UPDATE user SET `visibility` = NOT visibility WHERE user_id = :userID;");
$reply->execute(array(
    ":userID" => $userID
));

header('Location: /reseaux_php/');



?>


