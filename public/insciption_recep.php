<?php 
    require '../database/create_db.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['pass_repeat']))
    {
        // Patch XSS
        $name = htmlspecialchars($_POST['name']);
        $surname = htmlspecialchars($_POST['surname']);
        $email = htmlspecialchars($_POST['email']);
        $pass = htmlspecialchars($_POST['pass']);
        $pass_repeat = htmlspecialchars($_POST['pass_repeat']);

        // On vérifie si l'utilisateur existe
        $check = $pdo->prepare('SELECT userMail, userPwd, user_id  FROM user WHERE userMail = :email');
        $check->execute(array(':email' => $email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $name = strtolower($name); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        $surname = strtolower($surname);
        $email = strtolower($email);
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0){ 
            if(strlen($name) <= 100){ // On verifie que la longueur du pseudo <= 100
                if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        if($pass === $pass_repeat){ // si les deux mdp saisis sont bon

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $pass = password_hash($pass, PASSWORD_BCRYPT, $cost);
                           

                            // On insère dans la base de données
                            $insert = $pdo->prepare("INSERT INTO user (userMail, userPwd, userName, userSurname, visibility) VALUES (:email, :pass, :name, :surname, 1)");
                            $insert->execute(array(
                                ':email' => $email,
                                ':pass' => $pass,
                                ':name' => $name,
                                ':surname' => $surname
                            ));
                            
                            // On redirige avec le message de succès
                            header('location: ../html_partial/accueil/accueil.php');
                            die();
                        }else{ header('Location: index.php?reg_err=mdp_different'); die();}
                    }else{ header('Location: index.php?reg_err=email_pas_de_bonne_forme'); die();}
                }else{ header('Location: index.php?reg_err=email_trop_long'); die();}
            }else{ header('Location: index.php?reg_err=pseudo_trop_long'); die();}
        }else{ header('Location: index.php?reg_err=utilisateur_existe_deja'); die();}
    }