<?php
require_once '../../database/create_db.php';
$message = $pdo->prepare("SELECT * FROM `message`"); 
$message->execute();
$ressult = $message->fetchAll(PDO::FETCH_ASSOC);
echo json_encode([
    "ressult" => $ressult // ['text'],
    // "user" => $result['userId'],
    // "conv" => $result['userIdAmi']
]);