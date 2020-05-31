<?php
require_once('base_controller.php');
class AdminController extends BaseController
{
    function __construct()
    {
        $this->name = 'admin';
    }
    function index()
    {
        $this->render('index', array());
    }
    function profile()
    {
        $this->render('profile', array());
    }
    function error()
    {
        $this->render('error', array());
    }
}
