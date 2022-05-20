<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<style>
<?php include '../../public/css/style.css' ?>
</style>

<?php


//  $idi = $url;
//  $idi = explode(".php",$idi);

//  if($idi[1] !== ""){
//     $idi = $url;
//     $idi = explode("err=",$idi);
//     $id2 = explode("_",$id[1]);
//     echo "<span class='$id2[0]' id='none'>y</span>";
//     echo "<span class='$id2[1]' id='none'>f</span>";
//  }

    $pose = $url;
    $pose = explode(".err=",$pose);


if($_SERVER["REQUEST_METHOD"] === "POST") {
    $text = $_POST["text"];

    $query = $pdo->prepare("INSERT INTO `message` (userId, userIdAmi, text) VALUES (:userid, :idconv, :text)");
    $query->execute([
        ":userid" => $userId,
        "idconv" => $pose[1],
        ":text" => $text
    ]);
}
?>

<!-- SECTION : Center Container -->
<main class="container-center dis">
    <div class="user-messages">

    <?php

$reqe = $pdo->prepare('SELECT user_id, friend_id FROM friends WHERE status = 2');
$reqe->execute();
$datass = $reqe->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($datass as $datass) {

        if($datass['user_id'] == $userId or $datass['friend_id'] == $userId) {

            if($datass['user_id'] !== $userId){

                $reqe = $pdo->prepare('SELECT user_id, profil_pic, userName, userSurname, visibility FROM user WHERE user_id = :id');
                $reqe->execute([':id' => $datass['user_id']]);
                $datas = $reqe->fetch();

                $user_ids = $datas['user_id'];
                $user_pics = $datas['profil_pic'];
                $user_names = $datas['userName'];
                $user_surnames = $datas['userSurname'];
                $user_visibilis = $datas['visibility'];
                if ($user_visibilis == 1) {
                echo    "<div class='favoris'>
                        <a href='profil.php?reg_err=$user_ids' class=' align'> <img src='../../public/img/$user_pics' alt='Profile' class='icon profile-picture img-vide'>$user_names $user_surnames<span class='text-fovoris'></span> </a>
                        </div>";
                }
            } else {
                $reqe = $pdo->prepare('SELECT user_id, profil_pic, userName, userSurname, visibility FROM user WHERE user_id = :id');
                $reqe->execute([':id' => $datass['friend_id']]);
                $datas = $reqe->fetch();

                $user_ids = $datas['user_id'];
                $user_pics = $datas['profil_pic'];
                $user_names = $datas['userName'];
                $user_surnames = $datas['userSurname'];
                $user_visibilis = $datas['visibility'];
                if ($user_visibilis == 1) {
                echo    "<div class='favoris'>
                        <a href='profil.php?reg_err=$user_ids' class=' align'> <img src='../../public/img/$user_pics' alt='Profile' class='icon profile-picture img-vide'>$user_names $user_surnames<span class='text-fovoris'></span> </a>
                        </div>";
                }
            }
        }
    }
    ?>
    </div>

    <div class="messages-messages">
        <div class="top-mess">
        <section id="theSection" class=""></section>
            <div class="container-message y">
                <div class="message you">
                    <div class="textes">frgthjngbfghtjgthrgfghgfrhtgfht</div>
                </div>
                <img src='../../public/img/pp.jpg' alt='Profile' class='img-mess profile-picture img-vide'>
            </div>
            <div class="container-message i">
                <div class="message id">
                <div class="textes">frgthjtrjythgftryrjtht</div>
                </div>
                <img src='../../public/img/pp.jpg' alt='Profile' class='img-mess profile-picture img-vide'>
            </div>
        </div>

        <div class="bot-mess align">
        <form id="new_message_form" class="align-end" method="POST">
        <textarea name="text" id="textArea" cols="30" rows="1" required></textarea>
        <button>Envoyer</button>
        </form >
        </div>

    </div>

<!-- 
<form id="new_message_form"  method="POST">
    <textarea name="text" id="textArea" cols="30" rows="10" required style=" padding: 5px;"></textarea>
    <button>Envoyer</button>
</form > -->
</main>

<?php require '../right-fovoris.php'; ?>
<script src="get_message.js"></script>
<?php require '../footer.php'; ?>