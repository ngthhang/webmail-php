<?php
    require_once('base_controller.php');
    class HomeController extends BaseController{
        function __construct(){
            $this->name = 'home';
        }
        function index(){
            $this->render('index',array());
            
        }
        function error(){
            $this->render('error',array());
        }

        function view(){
            echo 'View home';
        }

        function star(){
            echo 'Star home';
        }

        function spam(){
            echo 'Spam home';
        }
    }
?>