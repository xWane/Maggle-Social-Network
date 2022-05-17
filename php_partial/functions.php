<?php

// $mysqli = mysqli_connect(
//     $hostname = ini_get("localhost"),
//     $username = ini_get("root"),
//     $_password = ini_get("root"),
//     $database = "db_maggle",
//     $port = ini_get("3306"),
//     $socket = ini_get("mysql")
// );

$mysqli = new mysqli("localhost","root","root","db_maggle");

function emptyInputSignUp($name,$surname,$email,$password,$password_repeat){
$result = true;
if ($name == "" || $surname == "" || $email == "" || $password == "" || $password_repeat == ""){
    $result = true;
}
else {
    $result = false;
}
return $result;
};

function invalidUid($name){
    $result = true;
    if (!preg_match("/^[a-zA-Z0-9]+$/", $name)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
};

function invalidEmail($email){
    $result = true;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
};

function pwdMatch($password_repeat,$password){
    $result = true;
    if ($password === $password_repeat){
        $result = false;
    }
    else{
        $result = true;
    }
    return $result;
};

function uidExists($mysqli,$email){
    $sql = "SELECT * FROM user WHERE userMail = ?";
    $stmt = mysqli_stmt_init($mysqli);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?error=uidfaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s",$email );
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
};

function CreatUser($mysqli,$name,$surname,$email,$password){
    $sql = "INSERT INTO user (userName,userSurname,userMail,userPwd) VALUES (?, ?, ?,?);";
    $stmt = mysqli_stmt_init($mysqli);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT); 

    mysqli_stmt_bind_param($stmt,"ssss", $name,$surname,$email,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:../html_partial/accueil/accueil.php");
};



