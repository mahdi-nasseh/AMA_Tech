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
if (!isset($DB)){
    $DB = new db();
    $DB->conn('ama_tech', 'root', '');
}
?>

