<?php

    require_once('config/config.php');
    if (!isset($_SESSION)) {
        session_start();
    }
    $support_controller = array(
        'home' => array('index' ,'error','draft','star','spam', 'trash', 'sent'),
        'mail'=>array('view','compose','reply','forward'),
        'login' => array('index','logup', 'logout')
    );

    if(!isset($_SESSION['email'])){
        $controller = 'login';
        if(isset($_GET['action'])){
            $action = $_GET['action']; 
            if(!in_array($action, $support_controller[$controller])){
                $action = 'index';
            }
        } else{
            $action = 'index';
        }
    }
    else{
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
    }
    include_once('controllers/' . $controller . '_controller.php');
    $className = ucfirst($controller) . "Controller";

    $obj = new $className();
    $obj->$action();
?>