<?php
require_once "../auto_load.php";
if (isset($_POST['signup'])) {
    $name = checkInput($_POST['name']);
    $username = checkInput($_POST['username']);
    $password = checkInput($_POST['password']);
    $email = checkInput($_POST['email']);

    if (empty($name) || empty($username) || empty($password) || empty($email)) {
        header('location: ../view/auth.php?err=empty');
    }else{
        $user = new user();
        $user = $user->register($name, $username, $password,$email);
        if ((int) $user){
            $_SESSION['user_id'] = $user;
            header('location: ../view/index.php');
        }else {
            $_SESSION['err'] = $user;
            header('location: ../view/auth.php?err='.$user);
        }
    }
}
if (isset($_POST['signin'])) {
    $key = checkInput($_POST['key']);
    $password = checkInput($_POST['password']);
    if (empty($key) || empty($password)) {
        header('location: ../view/auth.php?err=empty');
    } else {
        $user = new user();
        $user = $user->login($key, $password);
        if ((int) $user){
            $_SESSION['user_id'] = $user;
            header('location: ../view/index.php');
        } else {
            $_SESSION['err'] = $user;
            header('location: ../view/auth.php?err=notFindUser');
        }
    }
}


function checkInput($value)
{
    return htmlspecialchars(trim($value));
}