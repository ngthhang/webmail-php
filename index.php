<?php

    require_once('config/config.php');
    if (!isset($_SESSION)) {
        session_start();
    }
    $support_controller = array(
        'home' => array('index' ,'error','draft','star','spam', 'trash', 'sent','profile'),
        'mail'=>array('view','compose','reply','forward', 'starred','delete','add_spam','unread'),
        'login' => array('index','logup', 'logout','login_admin')
    );

    $support_controller_admin = array(
        'admin' => array('index', 'profile', 'error','admin','view_user', 'view_admin','blocked','change_sysadmin'),
        'login' => array('index', 'logup', 'logout', 'login_admin')
    );

    if (isset($_SESSION['email']) || isset($_SESSION['email_admin'])) {
        if (isset($_SESSION['email_admin'])){
            if (isset($_GET['controller'])) {
                $controller = $_GET['controller'];
                if (isset($_GET['action'])) {
                    $action = $_GET['action'];
                } else {
                    $action = 'index';
                }
            } else {
                $controller = 'admin';
                $action = 'index';
            }

            if (!array_key_exists($controller, $support_controller_admin) ||
            !in_array($action, $support_controller_admin[$controller])) {
                $controller = 'admin';
                $action = 'error';
            }
        } 
        else {
            if (isset($_GET['controller'])) {
                $controller = $_GET['controller'];
                if (isset($_GET['action'])) {
                    $action = $_GET['action'];
                } else {
                    $action = 'index';
                }
            } else {
                $controller = 'home';
                $action = 'index';
            }

            if(!array_key_exists($controller,$support_controller) ||
            !in_array($action,$support_controller[$controller])){
                $controller = 'home';
                $action = 'error';
            }
        }
    }
    else {
        $controller = 'login';
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            if (!in_array($action, $support_controller[$controller])) {
                $action = 'index';
            }
        } else {
            $action = 'index';
        }
    }
    include_once('controllers/' . $controller . '_controller.php');
    $className = ucfirst($controller) . "Controller";

    $obj = new $className();
    $obj->$action();
?>