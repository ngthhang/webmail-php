<!-- START COMPOSE -->
<?php
$from = $_SESSION['email'];
$conversation_id = null;
$subject = null;
$content = null;
$user_receive_mail = null;
$forward = null;

//check if composing draft mail
if (isset($_GET['conv_id'])) {
    $conversation_id = $_GET['conv_id'];
    $user_receive_mail = null;
    $subject = null;
    $content = null;
    $get_content = 0;
    $get_conversation = 0;
    $all_mail = Mail::getAllMailByConversationId($conversation_id);
    foreach($all_mail as $mail){
        $id_mail = $mail->id;
        Mail::updateSeenMail($id_mail);
        if ($get_conversation != 1) {
            $conversation = Conversation::getConversation($conversation_id);
            if(!is_null($conversation)){
                $subject = $conversation->subject;
            }
            $get_conversation = 1;
        }
        if ($get_content != 1) {
            $content = $mail->content;
            $get_content = 1;
        }
        if (!is_null($mail->user_receive)) {
            $user_receive = User::getUserById($mail->user_receive);
            if(is_null($user_receive_mail)){
                $user_receive_mail = $user_receive->mail;
            } else{
                $user_receive_mail = $user_receive_mail . ',' .$user_receive->mail;
            }
        }
    }
} 

//compose new mail
if (isset($_POST['to']) && $_POST['check_save_draft'] !== 'true'){
    $conversation_id = $_POST['conversation_id'];
    $subject = $_POST['subject'];
    $content = $_POST['content_mail'];
    $enclosed = null;
    $to = $_POST['to'];
    $all_to = explode(',', $to);
    $total_receive = count($all_to);

    if(is_null($conversation_id) || $conversation_id === '') {
        $new_conversation_id = Conversation::getSize() + 1;
        Conversation::addConversation($new_conversation_id, $subject);
    } 
    if(!isset($_GET['reply']) && !isset($_GET['forward'])){
        Mail::deleteAllMailByConversationId($conversation_id);
        Conversation::changeSubject($conversation_id, $subject);
    }

    for ($i = 0; $i < $total_receive; $i++) {
        if ($all_to[$i] === '') {
            continue;
        }
        else if (User::checkUserExist($all_to[$i]) != 1) {
            echo "<script>alert('Email " . $all_to[$i] . " does not exist in database, please try again')</script>";
            continue;
        } else {
            $user_receive = User::getCurrentUser($all_to[$i]);
            $user_receive_id = $user_receive->id;
            if (is_null($conversation_id) || $conversation_id === '') {
                Mail::addMail($new_conversation_id,$current_user_id, $user_receive_id, $subject, $content, $enclosed); 
            } 
            if(!isset($_GET['reply']) && !isset($_GET['forward'])){
                Mail::sendDraftMail($conversation_id,$current_user_id,$user_receive_id,$subject,$enclosed);
                $id = Mail::getSize();
                Draft::deleteDraftMail($id);
            }
            else{
                Mail::addMail($conversation_id, $current_user_id, $user_receive_id, $subject, $content, $enclosed); 
            }

            $id = Mail::getSize();
            if (BlockUser::isBlockUser($user_receive_id, $current_user_id) === 1) {
                Spam::addSpamMail($id,$user_receive_id);
            }
        }
    }
    $subject = null;
    $content = null;
    $user_receive_mail = null;
    if (isset($_GET['forward']) || isset($_GET['reply'])) {
        redirect('index.php?controller=home&action=sent');
    }
}

//save draft mail
if (isset($_POST['check_save_draft'])) {
    $is_save_draft = $_POST['check_save_draft'];
    if ($is_save_draft === 'true') {
        $conversation_id = $_POST['conversation_id'];
        $to = $_POST['to'] === '' ? null : $_POST['to'];
        $subject = $_POST['subject'] === '' ? null : $_POST['subject'];
        $content = $_POST['content_mail'] === '' ? null : $_POST['content_mail'];
        $enclosed = null;

        if(is_null($conversation_id) || $conversation_id == ''){
            $conversation_id = Conversation::getSize() + 1;
            Conversation::addConversation($conversation_id, $subject);
        }
        if (!isset($_GET['reply']) && !isset($_GET['forward'])) {
            Mail::deleteAllMailByConversationId($conversation_id);
            Conversation::changeSubject($conversation_id, $subject);
        }

        if (!is_null($to)) {
            $all_to = explode(',', $to);
            $total_receive = count($all_to);
            for ($i = 0; $i < $total_receive; $i++) {
                if ($all_to[$i] === '') {
                    continue;
                } else if (strpos($all_to[$i], '@gmail.com') === false) {
                    continue;
                } else if (User::checkUserExist($all_to[$i]) != 1) {
                    continue;
                } else {
                    $user_receive = User::getCurrentUser($all_to[$i]);
                    $user_receive_id = $user_receive->id;
                    Mail::addMail($conversation_id, $current_user_id, $user_receive_id, $subject, $content, $enclosed);
                    $id = Mail::getSize();
                    Draft::addMailDraft($id, $current_user_id);
                }
            }
        } else {
            Mail::addMail(intval($conversation_id), $current_user_id, null, $subject, $content, $enclosed);    
            $id = Mail::getSize();
            Draft::addMailDraft($id,$current_user_id);
        }
        $subject = null;
        $content = null;
        $user_receive_mail = null;
    }

    if(isset($_GET['forward']) || isset($_GET['reply'])){
        redirect('index.php?controller=home&action=sent');
    }
}

//check if forward mail
if(isset($_GET['reply']) || isset($_GET['forward'])){
    $id_mail = $_GET['id_mail'];
    $mail = Mail::getMailById($id_mail);
    $user_sent = User::getUserById($mail->user_sent);
    $user_receive = User::getUserById($mail->user_receive);
    $conversation = Conversation::getConversation($mail->conversation_id);
    $conversation_id = $mail->conversation_id;
    $type_subject = isset($_GET['forward']) ? 'FW: ' : 'Re: ';
    $subject = $type_subject . $conversation->subject;
    $content = $mail->content;
    $enclosed = $mail->enclosed;
}
?>