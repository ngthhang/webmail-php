<?php
    require_once('config/config.php');
    require_once('models/Mail.php');
    require_once('models/Spam.php');
    require_once('models/Star.php');
    require_once('models/Conversation.php');
    require_once('models/User.php');
//compose new mail

//  echo Conversation::getSize() + 1;
$usermail = 'ngthhang9102000@gmail.com';
if (User::checkBlockUser($usermail)) {
    echo 'hi';
}
?>