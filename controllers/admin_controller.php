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
    function admin()
    {
        $this->render('admin', array());
    }
    function view_user()
    {
        $this->render('view_user', array());
    }
    function view_admin()
    {
        $this->render('view_admin', array());
    }
    function blocked()
    {
        $this->render('blocked', array());
    }
    function change_sysadmin()
    {
        $this->render('change_sysadmin', array());
    }
    function error()
    {
        $this->render('error', array());
    }
}
