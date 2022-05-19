<?php

require_once 'database/pdo.php';

if(isset($_POST["submit"]));
    $ask = $_POST["search"];
    $asl = htmlspecialchars($ask);
    $ask = strtolower($ask);
    
    $reply = $pdo->prepare("SELECT * FROM `user` WHERE userName = :ask OR userSurname = :ask");

    $reply -> setFetchMode(PDO:: FETCH_OBJ);
    $reply -> execute([
        ":ask" => $ask
    ]);

    if($row = $reply->fetch())
    {
        ?>
        <?php echo $row ->user_id; ?>
        <?php echo $row ->userName; ?>
        <?php echo $row ->userSurname; ?>

        <?php
    }
        else{
            echo "Name does not exist";
    }
    ?> 