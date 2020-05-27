<?php 
    if(isset($_SESSION['email'])){
        unset($_SESSION['email']);
        redirect('index.php');
    }
?>