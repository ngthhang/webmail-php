<?php
    require_once('config/config.php');
    require_once('models/Mail.php');
    require_once('models/Spam.php');
    require_once('models/User.php');
    require_once('models/Conversation.php');
    session_start();
    echo $_SESSION['email'];
    $user = User::getCurrentUser($_SESSION['email']);
    $id = $user->id;
    echo $id;
    $db = Spam::getAllSpamByUserId($id);
    print_r($db);
?>
