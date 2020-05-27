<?php
    require_once('config/config.php');
    require_once('models/Mail.php');
    require_once('models/User.php');
    require_once('models/Conversation.php');
    session_start();
    // echo $_SESSION['email'];
    $user = User::getCurrentUser($_SESSION['email']);
    $id = $user->id;
    $db = Mail::getSentMail(1);
    $conver = Conversation::getConversation(1);
    echo $conver->subject;
    print_r($db);
?>
?>
