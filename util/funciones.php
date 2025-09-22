<?php 
function data_submitted() {
    $_AAux= array();
    if (!empty($_POST)) {
        $_AAux = $_POST;
    } elseif(!empty($_GET)) {
        $_AAux = $_GET;
    }

    if (count($_AAux)){
        foreach ($_AAux as $indice => $valor) {
            if ($valor=="") {
                $_AAux[$indice] = 'null' ;
            }
        }
    }
    return $_AAux;
}

function verEstructura($e){
    echo "<pre>";
    print_r($e);
    echo "</pre>"; 
}

spl_autoload_register(function($class_name) {
    $directorys = array(
        $_SESSION['ROOT'].'Modelo/',
        $_SESSION['ROOT'].'Modelo/conector/',
        $_SESSION['ROOT'].'Control/',
        $GLOBALS['ROOT'].'util/',
    );

    foreach($directorys as $directory){
        $file = $directory . $class_name . '.php';
        if(file_exists($file)){
            require_once($file);
            return;
        }
    }
});
