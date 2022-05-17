<?php

function emptyInputSignUp($name,$surname,$email,$password,$password_repeat){
$result;
if (empty($name) || empty($surname) ||  empty($email) || empty($password) || empty($password_repeat)){
    $result = true;
}
else {
    $result = false;
}
return $result;
};

function invalidUid($name,$surname){
    $result;
    if (!preg_match(`/^[a-zA-Z0-9]*$/`, $name, $surname)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
};

function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
};

function pwdMatch($password_repeat,$password){
    $result;
    if ($password === $password_repeat){
        $result = false;
    }
    else{
        $result = true;
    }
    return $result;
};

function uidExists($pdo,$email){
    $sql = "SELECT * FROM users WHERE mail = ?;";
    $stmt = mysqli_stmt_init($pdo);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s",$email );
    mysqli_stmt_execute($stmt);

    $resultData = $mysqli_stlt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
};

function CreatUser($pdo,$name,$surname,$email,$password){
    $sql = "INSERT INTO users (userName,userSurname,userMail,userPwd,) VALUES (?, ?, ?,     ?);";
    $stmt = mysqli_stmt_init($pdo);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password);

    mysqli_stmt_bind_param($stmt, "ssss",$name,$surname,$email,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:html_partial/accueil/accueil.php");
};



