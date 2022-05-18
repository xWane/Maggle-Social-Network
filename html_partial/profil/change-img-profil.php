<?php
require '../../database/create_db.php';

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
        $extensione = explode('.', $nameFile);
        // Max size
        $max_size = 100000;


        // On vérifie que le type est autorisés
        if(in_array($typeFile, $type))
        {
            // On vérifie que il n'y a que deux extensions
            if(count($extensione) <= 2 && in_array(strtolower(end($extensione)), $extensions))
            {
                // On vérifie le poids de l'image
                if($sizeFile < $max_size && $errFile == 0)
                {
                    // On bouge l'image uploadé dans le dossier upload
                    if(move_uploaded_file($tmpFile, '../../public/img/'.$uid . '.' . strtolower(end($extensione) ) ) )
                    {
                    
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

$ubid = uniqid();
    if(!empty($_FILES['back']))
    {
        
        $nameFile = $_FILES['back']['name'];
        $typeFile = $_FILES['back']['type'];
        $sizeFile = $_FILES['back']['size'];
        $tmpFile = $_FILES['back']['tmp_name'];
        $errFile = $_FILES['back']['error'];
        
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
                    if(move_uploaded_file($tmpFile, '../../public/img/'.$ubid . '.' . strtolower(end($extension) ) ) )
                    {
                    
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

$backImg = $ubid . "." . strtolower(end($extension));
$profilImg = $uid . "." . strtolower(end($extensione));

if (empty($backImg)){
    $backImg = "pp.png";
}

if (empty($profilImg)){
    $profilImg = "banner.jpg";
}

    $add = $pdo->prepare('UPDATE user SET profil_pic = :imgProfil, profil_banner = :bannerProfil)');
    $add->execute(array(
        ':imgProfil' => $profilImg,
        ':bannerProfil' => $profilImg
    ));

    header('location: profil.php');
?>