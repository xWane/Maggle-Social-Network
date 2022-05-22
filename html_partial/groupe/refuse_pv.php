<?php
require '../left.php';

$posee = $url;
$posee = explode("err=",$posee);

$pose = $posee[1];
$pose = explode("_",$pose);

$insert = $pdo->prepare("DELETE FROM group_user WHERE group_id = :idg AND user_id = :idf");
    $insert->execute(array(
        ':idg' => $pose[0],
        ':idf' => $pose[1]
    ));

    header("location: groupe.php?reg_err=$pose[0]");

?>