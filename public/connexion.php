<?php 
    session_start(); // Démarrage de la session
    require '../database/create_db.php'; // On inclut la connexion à la base de données

    if(!empty($_POST['email']) && !empty($_POST['mdp'])) // Si il existe les champs email, password et qu'il sont pas vident
    {
        // Patch XSS
        $email = htmlspecialchars($_POST['email']); 
        $mdp = htmlspecialchars($_POST['mdp']);
        
        $email = strtolower($email); // email transformé en minuscule
        
        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $check = $pdo->prepare('SELECT userMail, userPwd, userId  FROM user WHERE email = :email');
        $check->execute(array(':email' => $email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        var_dump($mdp);
        // Si > à 0 alors l'utilisateur existe
        if($row > 0)
        {
            // Si le mail est bon niveau format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Si le mot de passe est le bon
                if(password_verify($mdp, $data['userPwd']))
                {

                    // On créer la session et on redirige sur landing.php
                    $_SESSION['user'] = $data['userId'];
                    header('Location: ../html_partial/accueil/accueil.php');
                    die();
                }else{ header("Location: ../index.php?login_err=password_incorect"); die(); }
            }else{ header('Location: ../index.php?login_err=format_email_pas_bon'); die(); }
        }else{ header('Location: ../index.php?login_err=utilisateur_existe_pas'); die(); }
    }else{ header('Location: ../index.php'); die();} // si le formulaire est envoyé sans aucune données