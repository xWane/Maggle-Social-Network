<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Acme&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<?php

    // if ($profil_pic === 0) {

    //     $profil_pic = "pp.jpg";
    // } else {
    //     $profil_pic = $uid . "." . strtolower(end($extension));
    // } 
    
?>

    <div class="container-top">
        <div class="container-search">
            <button type="submit" class="res"><img src="search.svg" alt="rechercher" class="search"></button>
            <input type="search" name="search-recipe" id="search-item" placeholder="Enter your search request...">
        </div>
        <span>MAGGLE</span>
    </div>

    <div class="img-back">
        <img src="back.jpg" class="image" alt="">
    </div>

    <div class="container-profil">

        <div class="container-left">
            <div class="img-pp">
                <img src="pp.jpg" class="image pp" alt="">
            </div>
            <div class="info">
                <span>Anne Hus</span>
                <p>I am a student in web development and open to work</p>
                <form class="form-group" method="POST" action="index.php" enctype="multipart/form-data">
                    <input type="file" name="" id="file">
                    <input type="file" name="" id="file">
                </form>
            </div>
        </div>
    </div>
    
<?php

    $uid = uniqid();

    if(!empty($_FILES['avatar']))
    {
        
        $nameFile = $_FILES['avatar']['name'];
        $typeFile = $_FILES['avatar']['type'];
        $sizeFile = $_FILES['avatar']['size'];
        $tmpFile = $_FILES['avatar']['tmp_name'];
        $errFile = $_FILES['avatar']['error'];
        
        // Extensions
        $extensions = ['png', 'jpg', 'jpeg', 'gif'];
        // Type d'image
        $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
        // On récupère
        $extension = explode('.', $nameFile);
        // Max size
        $max_size = 100000;


        // On vérifie que le type est autorisés
        if(in_array($typeFile, $type))
        {
            // On vérifie que il n'y a que deux extensions
            if(count($extension) <= 2 && in_array(strtolower(end($extension)), $extensions))
            {
                // On vérifie le poids de l'image
                if($sizeFile < $max_size && $errFile == 0)
                {
                    // On bouge l'image uploadé dans le dossier upload
                    if(move_uploaded_file($tmpFile, './upload/'.$uid . '.' . strtolower(end($extension) ) ) )
                    {
                        echo "This is uploaded!";
                    }
                    else
                    {
                        echo "failed";
                    }
                }
                else 
                {
                    echo "Fichier trop lourd ou format incorrect";
                }
            }
            else 
            {
                echo "Extension failed";
            }
        }   
        else 
        {
            echo "Type non autorisé";
        }


    }
    else 
    {
        header('Location: index.php');
        die();
    }
?>
    
</body>
</html>
















<!-- <div class="container-left">
    <form class="form-group" method="POST" action="index.php" enctype="multipart/form-data">
        <div class=" block image">
            <img src="pp.jpg" alt="" class="pp">
            <input type="file" name="" id="">
        </div>
        <div class="block texte">
            <input type="text" placeholder="Prénom">
            <input type="text" placeholder="Nom">
            <input type="email" name="" id="" placeholder="email@hetic.eu">
            <input type="password" name="" id="" placeholder="password">
            <div class="visibility">
                <input type="radio" name="" id="">
                <input type="radio" name="" id="">
            </div>
            <input type="submit" value="" placeholder="envoyer">
        </div>
    </form>
</div>
<div class="container-right">

</div> -->