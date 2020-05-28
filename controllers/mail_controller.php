<?php
    require_once('base_controller.php');
    class MailController extends BaseController{
        function __construct()
        {
            $this->name = 'mail';
        }

        function index(){
            // test git index
        }

        function view()
        {
            $this->render('view', array());
        }

        function compose(){
            $this->render('compose',array());
        }

        function reply()
        {

        }

        function forward()
        {

        }
    }
?>