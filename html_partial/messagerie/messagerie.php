<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<style>
<?php include '../../public/css/style.css' ?>
</style>

<?php
$message = $pdo->prepare("SELECT * FROM message ORDER BY creation_date DESC"); 
$message->execute(array(
    ':email' => $email,
    ':pass' => $pass,
    ':name' => $name,
    ':surname' => $surname,
    ':imgProfil' => "pp.png",
    ':bannerProfil' => "banner.jpg"
));?>

<!-- SECTION : Center Container -->
<main class="container-center">

<form class="modif-profil g4" method="POST" action="post_message.js">
</form>

</main>

<?php require '../right-fovoris.php'; ?>
<script src="get_message.js"></script>
<?php require '../footer.php'; ?>