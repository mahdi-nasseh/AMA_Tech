<?php
spl_autoload_register( function($class){
    $className = "../control/$class.php";
    if(file_exists($className)){
        include_once $className;
    } else {
        die('Class '.$class.' not found');
    }
});
?>