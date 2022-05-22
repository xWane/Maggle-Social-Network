<?php
require '../left.php';

$posee = $url;
$posee = explode("err=",$posee);

$posee = $posee[1];
$posee = explode("_",$posee);



$insert = $pdo->prepare("UPDATE group_user SET admin = 0 WHERE group_id = :idg AND user_id = :idf");
    $insert->execute(array(
        ':idg' => $posee[0],
        ':idf' => $posee[1]
    ));

    header("location: groupe.php?reg_err=$posee[0]");

?>