<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<style>
<?php include '../../public/css/style.css' ?>
</style>

<?php
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $message = $pdo->prepare("SELECT * FROM `message`"); 
    $message->execute();
    $ressult = $message->fetchAll(PDO::FETCH_ASSOC);
    var_dump($ressult);
    json_encode([
        "ressult" => $ressult
    ]);
}

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
<section id="theSection" class="modif-profil g4">
    
</section>

<form id="new_message_form"  method="POST">
    <textarea name="text" id="textArea" cols="30" rows="10" required></textarea>
    <button>Envoyer</button>
</form >
</main>

<?php require '../right-fovoris.php'; ?>
<script src="get_message.js"></script>
<?php require '../footer.php'; ?>