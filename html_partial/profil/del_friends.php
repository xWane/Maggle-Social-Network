<?php

require '../left.php';

$pose = $url;
$pose = explode("err=",$pose);

            $add = $pdo->prepare('DELETE FROM friends WHERE user_id = :id AND friend_id = :idi OR user_id = :idi AND friend_id = :id');
            $add->execute(array(':id' => $userId,
                                ':idi' => $pose[1]));

            header("location: profil.php?reg_err=$pose[1]");

?>