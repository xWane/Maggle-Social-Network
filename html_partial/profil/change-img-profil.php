<?php

session_start() ;

require '../../database/create_db.php';

if(!isset($_SESSION['user'])){
    header('Location:../../index.php');
    die();
}

// On récupere les données de l'utilisateur
$req = $pdo->prepare('SELECT * FROM user WHERE user_id = :id');
$req->execute(array(':id' => $_SESSION['user']));
$data = $req->fetch();

$userId = $data['user_id'];

require '../../database/create_db.php';

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
            $add = $pdo->prepare('UPDATE user SET profil_pic = :imgProfil WHERE user_id = :id');
            $add->execute(array(
            ':imgProfil' => $profilImg,
            ':id' => $userId
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
            $add = $pdo->prepare('UPDATE user SET profil_banner = :bannerProfil WHERE user_id = :id');
            $add->execute(array(
            ':bannerProfil' => $backImg,
            ':id' => $userId
            ));

            }
    }

    if(!empty($_POST['name'])) {

        $name_mod = htmlspecialchars($_POST['name']);
        $name_mod = strtolower($name_mod);

        $add = $pdo->prepare('UPDATE user SET userName = :name WHERE user_id = :id');
            $add->execute(array(
            ':name' => $name_mod,
            ':id' => $userId
            ));
    }

    if(!empty($_POST['surname'])) {

        $surname_mod = htmlspecialchars($_POST['surname']);
        $surname_mod = strtolower($surname_mod);

        $add = $pdo->prepare('UPDATE user SET userSurname = :surname WHERE user_id = :id');
            $add->execute(array(
            ':surname' => $surname_mod,
            ':id' => $userId
            ));
    }

    if(!empty($_POST['bio'])) {

        $bio_mod = htmlspecialchars($_POST['bio']);
        $bio_mod = strtolower($bio_mod);

        $add = $pdo->prepare('UPDATE user SET biograph = :biog WHERE user_id = :id');
            $add->execute(array(
            ':biog' => $bio_mod,
            ':id' => $userId
            ));
    }

    if(!empty($_POST['mail'])) {

        $mail_mod = htmlspecialchars($_POST['mail']);
        $mail_mod = strtolower($mail_mod);

        // On vérifie si l'utilisateur existe
        $check = $pdo->prepare('SELECT userMail FROM user WHERE userMail = :email');
        $check->execute(array(':email' => $mail_mod));
        $row = $check->rowCount();

        if($row == 0){
            if(filter_var($mail_mod, FILTER_VALIDATE_EMAIL)){
                $add = $pdo->prepare('UPDATE user SET userMail = :mailm WHERE user_id = :id');
                $add->execute(array(
                ':mailm' => $mail_mod,
                ':id' => $userId
                ));
            }else{ header('Location: profil-modif.php?reg_err=email_pas_de_bonne_forme'); die();}
        }else{ header('Location: profil-modif.php?reg_err=utilisateur_existe_deja'); die();}
    }

    if(!empty($_POST['oldpwd'])) {
        if(!empty($_POST['newpwd'])) {
            if(!empty($_POST['rptpwd'])) {

                $old_pass = htmlspecialchars($_POST['oldpwd']);
                $old_pass = strtolower($old_pass);

                $new_pass = htmlspecialchars($_POST['newpwd']);
                $new_pass = strtolower($new_pass);

                $rpt_pass = htmlspecialchars($_POST['rptpwd']);
                $rpt_pass = strtolower($rpt_pass);

                if(password_verify($old_pass, $data['userPwd']))
                {
                    if($new_pass === $rpt_pass){

                        $cost = ['cost' => 12];
                        $new_pass = password_hash($new_pass, PASSWORD_BCRYPT, $cost);

                        $add = $pdo->prepare('UPDATE user SET userPwd = :pass WHERE user_id = :id');
                        $add->execute(array(
                        ':pass' => $new_pass,
                        ':id' => $userId
                        ));
                    }else{ header("Location: profil-modif.php?login_err=password_et_password_repeat_different"); die(); }


                    
                }else{ header("Location: profil-modif.php?login_err=ancient_password_incorect"); die(); }
                    }else{ header('Location: profil-modif.php?reg_err=manque_mdp_repeat'); die();}
        }else{ header('Location: profil-modif.php?reg_err=manque_nouveau_mdp'); die();}
    }




                

    header('location: profil.php');
?>