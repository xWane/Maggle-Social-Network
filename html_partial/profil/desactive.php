<?php
require "../../database/pdo.php";
// require "../data.php";
echo"Hello world";

if(isset($_POST["hideAccount"]));
    $ask = $_POST["hideAccount"];
    $userId = "userID";
    $reply = $pdo->prepare("UPDATE 'user' WHERE 'user_id' = :userID;
    SET 'visibilty' = NOT visibility ");

    