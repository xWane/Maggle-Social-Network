<?php

require '../left.php';

$pose = $url;
$pose = explode("err=",$pose);

            $add = $pdo->prepare("DELETE FROM group_user WHERE user_id = :id AND group_id = :idi");
            $add->execute(array(':id' => $userId,
                                ':idi' => $pose[1]));

            header("location: groupe.php?reg_err=$pose[1]");

?>