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

};
