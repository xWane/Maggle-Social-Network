<?php

require '../left.php';

$pose = $url;
$pose = explode("err=",$pose);

            $add = $pdo->prepare('DELETE FROM friends WHERE id = :id');
            $add->execute(array(
            ':id' => $pose[1]
            ));

            header('location: demande.php');

?>