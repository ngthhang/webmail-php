<?php
    require_once('base_controller.php');
    class LoginController extends BaseController{
        function __construct(){
            $this->name = 'login';
        }
        function index(){
            $this->render('index',array());
            
        }
        function logup(){
            $this->render('logup',array());
        }
        function logout(){
            $this->render('logout',array());
        }

        function login_admin(){
            $this->render('login_admin',array());
        }
    }
