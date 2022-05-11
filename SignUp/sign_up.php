<!DOCTYPE html>

<html>

<head>
  <title>Maggle</title>
  <meta charset="utf-8">
  <link rel="stylesheet" media="screen" type="text/css" href="../style.css">
</head>

<body>
  <div>

    <header>
      <h1>Maggle</h1>
    </header>

    <div>
      <button onclick="location.href='../index.php'">Accueil</button>
    </div>

    <div id="Sign_Up">
      <form action="./sign_up_bd.php" method="post">
        <input type="text" name="mail" placeholder="Email">
        <input type="text" name="mdp" placeholder="Mot de passe">
        <input type="submit" name="insc" value="Sign Up">
      </form>

      <p>
        <?php
        if (isset($_GET['erreur']))
          echo $_GET['erreur'];
        ?>
      </p>

    </div>
</body>

</html>