<?php

require '../left.php';

$posez = $url;
$posez = explode("err=",$posez);


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
        $max_size = 10000000;

        // On vérifie que le type est autorisés
        if(in_array($typeFile, $type))
        {
            $uid = uniqid();
            $point = ".";
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

        
            $profilImg = $uid . $point . strtolower(end($extensione));
        
        if ($profilImg !== "") {
            $add = $pdo->prepare('UPDATE `page` SET page_pic = :imgProfil WHERE page_id = :id');
            $add->execute(array(
            ':imgProfil' => $profilImg,
            ':id' => $posez[1]
            ));
        }

    }


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
        $max_size = 10000000;


        // On vérifie que le type est autorisés
        if(in_array($typeFile, $type))
        {
            $ubid = uniqid();
            $pointe = ".";
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

        
            $backImg = $ubid . $pointe . strtolower(end($extension));

            if ($backImg !== "") {
            $add = $pdo->prepare('UPDATE `page` SET pager_banner = :bannerProfil WHERE page_id = :id');
            $add->execute(array(
            ':bannerProfil' => $backImg,
            ':id' => $posez[1]
            ));

            }
    }

    if(!empty($_POST['surname'])) {

        $name_mod = htmlspecialchars($_POST['surname']);
        $name_mod = strtolower($name_mod);
        
        $add = $pdo->prepare('UPDATE `page` SET page_name = :name WHERE page_id = :id');
            $add->execute(array(
            ':name' => $name_mod,
            ':id' => $posez[1]
            ));
    }


    // if(!empty($_POST['bio'])) {

    //     $bio_mod = htmlspecialchars($_POST['bio']);
    //     $bio_mod = strtolower($bio_mod);

    //     $add = $pdo->prepare('UPDATE user SET biograph = :biog WHERE page_id = :id');
    //         $add->execute(array(
    //         ':biog' => $bio_mod,
    //         ':id' => $userId
    //         ));
    // }


    

    header("location: page.php?reg_err=$posez[1]");
?>