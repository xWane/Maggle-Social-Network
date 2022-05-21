<?php

require '../left.php';

$pose = $url;
$pose = explode("err=",$pose);

            $add = $pdo->prepare("DELETE FROM page_member WHERE user_id = :id AND page_id = :idi");
            $add->execute(array(':id' => $userId,
                                ':idi' => $pose[1]));

            header("location: page.php?reg_err=$pose[1]");

?>