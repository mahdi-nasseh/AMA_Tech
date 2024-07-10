<?php
session_start();
spl_autoload_register( function($class){
    $className = "../control/$class.php";
    if(file_exists($className)){
        include_once $className;
    } else {
        die('Class '.$class.' not found');
    }
});
//if (!isset($db)){
//$database = new db();
//$database->conn('ama_tech', 'root','');
//}
//function db(){
//    return new DB('ama_tech', 'root', '');
//}
?>

