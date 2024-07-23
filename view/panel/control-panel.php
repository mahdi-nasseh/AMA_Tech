<?php
require_once '../../auto_load.php';


    $user = new user();
    $user = $user->select_user('id = '.$_SESSION['user_id']);
    $role = $user->role;
    if($role == 'admin'){
        header('location: ./admin-panel.php');
    }else if($role == 'user'){
        header('location: ./user-panel.php');
    }else if($role == 'writer'){
        header('location: ./writer-panel.php');
    }