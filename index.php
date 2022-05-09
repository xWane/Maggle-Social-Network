<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css"/>
    <title>Maggle  😃</title>
</head>
<body>
    <header>
        <h1 class="title">Hi and welcome on Maggle</h1>
    </header>
    <?php
    include 'php/initDB.php';
    echo reinit();
    require 'php/auth.php';
    if(isConnected()){
        header('location: php/app.php');
        exit();
        if( $reinit = true ){
            reinit();
        }
    }
    ?>
        <div class="login">
            <h2>Sign up</h2>
            <!-- <form action="php/initDB.php" method="post">
            <input type="submit" name="ins" value="Réinitialiser la base de données" >
        </form> -->
        <form action="sign_up_bd.php" method="post">
            <input type="text" name="username" placeholder="Pseudo">
            <input type="password" name="mdp" placeholder="Mot de passe" >
            <input type="submit" name="insc" value="Sign Up">
        </form>
        <br/>
                <h2>Already with us? Sign in!</h2>
                <form action="sign_in_bd.php" method="post">
                <input type="submit" name="insc" value="Sign in">
                </form>
            </div>
        </div>
        <div class="article">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem autem architecto, ullam maxime ab laborum tempore ut porro fuga, suscipit sapiente natus non repellat itaque, nulla recusandae voluptate nisi? Eaque.</p>
        </div>

        
</body>
</html>