<?php
require '../left.php';

$posee = $url;
$posee = explode(".php",$posee);

if($posee[1] !== "") {
    $posee = $url;
    $posee = explode("err=",$posee);
}

$insert = $pdo->prepare("INSERT INTO page_member (user_id, page_id, admin) VALUES (:id, :idf, 0)");
    $insert->execute(array(
        ':id' => $userId,
        ':idf' => $posee[1]
    ));

    header("location: page.php?reg_err=$posee[1]");

?>