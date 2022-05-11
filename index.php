<!-- Ajout head html -->
<?php require 'html_partial/head.php';?>

<header>
    <h1 class="title">Hi and welcome on Maggle</h1>
</header>

<form action="database/initDB.php" method="post">
        <input type="submit" name="ins" value="Créer la base de données" >
</form>

<?php
if (isset($_POST['signUP'])) {
    include 'php_partial/sign_up_bd.php';
    echo addDB();
}
?>

<div class="login">
    <h2>Sign up</h2>

    <form method="post">
        <input type="text" name="username" placeholder="Pseudo">
        <input type="password" name="mdp" placeholder="Mot de passe">
        <input type="submit" name="signUP" value="Sign Up">
    </form>

    <br />
    <h2>Already with us? Sign in!</h2>
    <form action="sign_in_bd.php" method="post">
        <input type="submit" name="insc" value="Sign in">
    </form>
</div>
</div>
<div class="article">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem autem architecto, ullam maxime ab laborum tempore ut porro fuga, suscipit sapiente natus non repellat itaque, nulla recusandae voluptate nisi? Eaque.</p>
</div>


<!-- Ajout foot html -->
<?php require 'html_partial/footer.php';?>
