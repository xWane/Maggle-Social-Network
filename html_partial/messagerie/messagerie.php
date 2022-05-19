<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<style>
<?php include '../../public/css/style.css' ?>
</style>

<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $text = $_POST["text"];

    $query = $pdo->prepare("INSERT INTO `message` (text) VALUES (:text)");
    $query->execute([
        ":text" => $text
    ]);
}
?>

<!-- SECTION : Center Container -->
<main class="container-center">
    <div class="user-messages">

    <?php

    $reqe = $pdo->prepare('SELECT * FROM user');
    $reqe->execute();
    $datas = $reqe->fetchAll(PDO::FETCH_ASSOC);

    foreach($datas as $datas) {
        $user_ids = $datas['user_id'];
        $user_pics = $datas['profil_pic'];
        $user_names = $datas['userName'];
        $user_surnames = $datas['userSurname'];
        $user_visibilis = $datas['visibility'];
        if ($user_visibilis == 1) {
        echo    "<div class='favoris mess'>
                <a href='messagerie.php?reg_err=$user_ids$userId$user_ids$userId' class=' align'> <img src='../../public/img/$user_pics' alt='Profile' class='icon profile-picture img-vide'>$user_names $user_surnames<span class='text-fovoris'></span> </a>
                </div>";
        }
    }
    ?>

    <div class="messages-messages">

    </div>
<!-- <section id="theSection" class="modif-profil g4"></section>


<form id="new_message_form"  method="POST">
    <textarea name="text" id="textArea" cols="30" rows="10" required style=" padding: 5px;"></textarea>
    <button>Envoyer</button>
</form > -->
</main>

<?php require '../right-fovoris.php'; ?>
<script src="get_message.js"></script>
<?php require '../footer.php'; ?>