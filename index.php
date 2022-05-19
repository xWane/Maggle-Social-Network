<style>
    <?php 
        include 'public/global.css';
        include 'public/css/index.css';
    ?>
</style>

<?php
    require 'html_partial/head.php';

    require 'database/create_db.php';

    if (isset($_POST['submit'])) {
        include 'php_partial/sign_up_bd.php';
        echo addDB();
    }
?>
<body>
    <section class="landing-title">
        <h1>maggle</h1>
        <div class="landing-sub-title">
            <p>Partagez et restez en contact avec les étudiants et les alumnis d’Hetic.</p>
        </div>
    </section>

    <section class="sign-up">
        <form method="post" action="./public/insciption_recep.php">
            <input class="name" type="text" name="name" placeholder="Prénom">
            <input class="surname" type="text" name="surname" placeholder="Nom">
            <input class="mail" type="text" name="email" placeholder="Mail étudiant">
            <input class="password" type="password" name="pass" placeholder="Mot de passe">
            <input class="password-confirm" type="password" name="pass_repeat" placeholder="Confirmation du mot de passe">
            <input class="create-account" type="submit" name="submit" value="Créer un compte">
        </form>
        <div class="sign-button">
            <p>Déjà inscrit ? <span class="underline">Connectez-vous</span></p>
        </div>
    </section>

    <section class="sign-in">
        <form action="./public/connexion.php" method="post">
            <input class="mail" type="mail" name="email" placeholder="Mail étudiant">
            <input class="password" type="password" name="mdp" placeholder="Mot de passe">
            <input class="log-account" type="submit" name="insc" value="S'identifier">
        </form>
        <div class="sign-button">
            <p>Première visite ? <span class="underline">Inscrivez-vous</span></p>
        </div>
    </section>

    <script type="text/javascript" src="public/js/index_swap.js"></script>
</body>

<?php require 'html_partial/footer.php'; ?>