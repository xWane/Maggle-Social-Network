<!DOCTYPE html>

<html>

<head>
  <title>Maggle</title>
  <meta charset="utf-8">
  <link rel="stylesheet" media="screen" type="text/css" href="../style.css">
</head>

<body>
  <div>
    <button button class="btn effect01" onclick="location.href='../index.php'">Accueil</button>
  </div>

  <?php

  $mail = $_POST['mail'];
  $mdp = hash("sha256", $_POST['mdp']);

  $link = mysqli_connect('localhost', 'root', '', 'profil');

  if ($link) {
    echo '<p>Connection réussie!</p>';

    $resultat = mysqli_query($link, "INSERT INTO profil_info (mail, mdp) VALUES ('" . $mail . "', '" . $mdp . "')");

    if ($resultat) {
      print '<p>Compte ajouté à votre base!</p>';
    } else {
      print '<p>Compte pas inseré</p>';
    }

    mysqli_close($link);
  } else {
    print '<p>Connexion non réussie!</p>';
  }
  ?>

</body>

</html>