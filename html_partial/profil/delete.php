<?php
require '/database/pdo.php';
require '/html_partial/data.php';
if(isset($_POST["action"]));
$userId = "UserID";
$action = $pdo->prepare("DELETE 'user' WHERE 'user_id' = :UserID ");

 header("location:/reseaux_php/index.php");

?>