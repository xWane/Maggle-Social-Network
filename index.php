<?php
$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbname = "projet";
$username = "root";
$password = "root";
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réseaux</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<form method="get">
    Nom :     <input type="text" name="nom" />
    Age :     <input type="text" name="age" />
    Adresse : <input type="text" name="adresse" />
    <input type="submit" name="submit" /> 
</form>

<?php
   // Vérifier si le formulaire est soumis 
   if ( isset( $_GET['submit'] ) ) {
     /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
     $nom = $_GET['nom']; 
     $age = $_GET['age']; 
     $adresse = $_GET['adresse'];
     // afficher le résultat
     echo '<h3>Informations récupérées en utilisant GET</h3>'; 
     echo 'Nom : ' . $nom . ' Age : ' . $age . ' Adresse : ' . $adresse; 
     exit;
  }
?>
    
</body>
</html>