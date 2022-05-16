<?php
// function addDB()
// {
//     // PDO
//     require "database\pdo.php";

//     // Vérifie si le mail a le bon format
//     $mail = $_POST['username'];
//     $mailVerified =  str_ends_with($mail, '@hetic.eu');

//     // Encrypte le mot de passe et le vérifie lors de la confirmation
//     $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
//     $mdpVerified = password_verify($_POST['mdp_confirm'], $mdp);

//     // Connection à la database pour effectuer les reqûetes
//     $link = new PDO("$engine:host=$host;dbname=$dbname", $username, $password);

//     // Vérifie si le mail donné existe déjà dans la database ou non
//     $mailListRequest = $link->prepare("SELECT mail FROM user WHERE mail=? ");
//     $mailListRequest->execute(
//         [$mail]
//     );

//     $mailExist = $mailListRequest->fetch();

//     // Insertion dans la base de données si les conditions sont respectés
//     if ($link and $mailVerified and $mdpVerified and $mailExist === false) {
//         $ins = $link->prepare("INSERT INTO user (mail, password) VALUES (:mail,:password)");
//         $ins->execute(array(
//             ":mail" => $mail,
//             ":password" => $mdp
//         ));
//     }
// }
if (isset($_POST["submit"])){
    echo 'welcome ' . $_POST['name'] . 'Your email is ' . $_POST['email'];

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_repeat = $_POST["password_repeat"];

    require_once 'create_db.php';
    require_once 'functions.php';
    
    if (emptyInputSignUp($name,$surname,$email,$password,$password_repeat) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    if (invalidUid($name,$surname) !== false){
        header("location: ../index.php?error=invalidUid");
        exit();
    }
    if (invalidEmail($email) !== false){
        header("location: ../index.php?error=invalidEmail");
        exit();
    }
    if (pwdMatch($password_repeat,$password) !== false){
        header("location: ../index.php?error=passwordsNotMatch");
        exit();
    }
    if (uidExists($pdo,$email) !== false){
        header("location: ../index.php?error=emailTaken");
        exit();
    }
}
else{
     header("location: ../index.php");
}