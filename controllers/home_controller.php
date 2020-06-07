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

        function star(){
            $this->render('star', array());
        }

        function spam(){
            $this->render('spam', array());
        }

        function trash()
        {
            $this->render('trash', array());
        }

        function draft()
        {
            $this->render('draft', array());
        }

        function sent()
        {
            $this->render('sent', array());
        }

        function profile()
        {
            $this->render('profile', array());
        }
    }
