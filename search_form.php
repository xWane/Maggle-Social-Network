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
        <?php $id = $row->user_id;
        header("location: /reseaux_php/html_partial/profil/profil.php?reg_err=$id");

        ?>
        <?php
    }
    else{
        header('Location: /reseaux_php/html_partial/accueil/accueil.php');
    }


?> 

