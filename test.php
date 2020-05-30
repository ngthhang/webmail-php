<?php
    require_once('config/config.php');
    require_once('models/Mail.php');
    require_once('models/Spam.php');
    require_once('models/Star.php');
    require_once('models/Conversation.php');
    require_once('models/BlockUser.php');

    $user = BlockUser::getAll(21);

    if(is_null($user)){
        echo 'hiii';
    }
    print_r($user);

?>
