    <?php
    require 'database/create_db.php';
    if (isset($_POST['signUP'])) {
        include 'php_partial/sign_up_bd.php';
        echo addDB();
    }
    require 'html_partial/head.php';
    ?>
    <style>
    <?php include 'css/index.css';?>
    </style>
    <div class="landing-title">
        <h1>Maggle</h1>
        <div class="landing-sub-title">
            <p>Partagez et restez en contact avec étudiants et alumnis!</p>
        </div>
    </div>
    <div class="sign-up">
        <div class="mail">
            <form method="post" action="./profil/profil.php">
                    <input type="text" name="username" placeholder="Mail Hetic">
                </div>
                <div class="mdp">
                    <input type="password" name="mdp" placeholder="Mot de passe">
                </div>
                <div class="mdp-comfirm">
                    <input type="password_comfirm" name="mdp_comfirm" placeholder="confirmation">
                </div> 
            </form>
            <div class="create-account">
                <input type="submit" name="signUP" value="Créer un compte">
            </div>
            <div class="sign-in">
                <button type="button">Vous êtes déjà inscrit? Connectez-vous!</button>
                <div class="sign-in hidden">
                    <form action="SignUp/sign_in_bd.php" method="post">
                        <input type="submit" name="insc" value="Sign in">
                    </form>
                </div>
            </div>
        </div>
</body>
</html>

