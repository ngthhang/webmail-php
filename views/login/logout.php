<?php 
    if(isset($_SESSION['email'])){
        unset($_SESSION['email']);
        redirect('index.php');
    }
    if (isset($_SESSION['email_admin'])) {
        unset($_SESSION['email_admin']);
        redirect('index.php?controller=login&action=login_admin');
    }
?>