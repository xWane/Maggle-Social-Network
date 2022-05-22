<?php
require '../left.php';

$posee = $url;
$posee = explode("err=",$posee);

$posee = $posee[1];
$posee = explode("_",$posee);


$insert = $pdo->prepare("DELETE FROM group_user WHERE id = :idg AND idu = :idf");
    $insert->execute(array(
        ':id' => $posee[0],
        ':idf' => $posee[1]
    ));

    header("location: groupe.php?reg_err=$posee[0]");

?>