<?php
    require_once('config/config.php');

    $support_controller = array(
        'home' => array('index' , 'error','view','star','spam'),
        'mail'=>array('view','compose','reply','forward')
    );

    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
        if (isset($_GET['action'])){
            $action = $_GET['action'];
        }
        else {
            $action = 'index';
        }
    }
    else {
        $controller = 'home';
        $action = 'index';
    }

    if(!array_key_exists($controller,$support_controller) ||
    !in_array($action,$support_controller[$controller])){
        $controller = 'home';
        $action = 'error';
    }

    include_once('controllers/' . $controller . '_controller.php');
    $className = ucfirst($controller) . "Controller";

    $obj = new $className();
    $obj->$action();

?>