<?php
require '../left.php';

$posee = $url;
$posee = explode("err=",$posee);

$posee = $posee[1];
$posee = explode("_",$posee);



$insert = $pdo->prepare("DELETE FROM group_user WHERE user_id = :idf AND group_id = :idg");
    $insert->execute(array(
        ':idf' => $posee[1],
        ':idg' => $posee[0]
    ));

    header("location: groupe.php?reg_err=$posee[0]");

?>