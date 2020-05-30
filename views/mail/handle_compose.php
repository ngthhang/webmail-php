<!-- START COMPOSE -->
<?php
$from = $_SESSION['email'];

//check if composing draft mail
if (isset($_GET['id_mail'])) {
    $id_mail = $_GET['id_mail'];
    $mail = Mail::getMailById($id_mail);
    Mail::updateSeenMail($id_mail);
    if (!is_null($mail->conversation_id)) {
        $conversation_id = $mail->conversation_id;
        $conversation = Conversation::getConversation($conversation_id);
        $subject = $conversation->subject;
    } else {
        $conversation_id = '';
        $subject = null;
    }
    if (!is_null($mail->content)) {
        $content = $mail->content;
    } else {
        $content = null;
    }
    if (!is_null($mail->user_receive)) {
        $user_receive = User::getUserById($mail->user_receive);
        $user_receive_mail = $user_receive->mail;
    } else {
        $user_receive_mail = null;
    }
} else {
    $conversation_id = '';
    $id_mail = '';
    $subject = null;
    $content = null;
    $user_receive_mail = null;
}

//compose new mail
if (isset($_POST['to']) && $_POST['check_save_draft'] === '') {
    $to = $_POST['to'];
    $all_to = explode(',', $to);
    $total_receive = count($all_to);
    for ($i = 0; $i < $total_receive; $i++) {
        if ($all_to[$i] === '') {
            continue;
        }
        if (User::checkUserExist($all_to[$i]) != 1) {
            echo "<script>alert('Email " . $all_to[$i] . " does not exist in database, please try again')</script>";
            continue;
        } else {
            $user_receive = User::getCurrentUser($all_to[$i]);
            $user_receive_id = $user_receive->id;
            $subject = $_POST['subject'];
            $content = $_POST['content_mail'];
            $enclosed = null;
            Mail::addMail($current_user_id, $user_receive_id, $subject, $content, $enclosed);
        }
    }
    $subject = null;
    $content = null;
    $user_receive_mail = null;
}

//save draft mail
if (isset($_POST['check_save_draft'])) {
    $is_save_draft = $_POST['check_save_draft'];
    if (!is_null($is_save_draft)) {
        $id_mail = $_POST['mail_compose_id'];
        $to = $_POST['to'] === '' ? null : $_POST['to'];
        $subject = $_POST['subject'] === '' ? null : $_POST['subject'];
        $content = $_POST['content_mail'] === '' ? null : $_POST['content_mail'];
        $enclosed = null;

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
                    if ($id_mail === '') {
                        Mail::addMail($current_user_id, $user_receive_id, $subject, $content, $enclosed);
                        $id = Mail::getSize();
                        Draft::addMailDraft($id, $current_user_id);
                    } else {
                        if ($_POST['change_subject'] === 'true') {
                            Mail::updateDraftMailDifferentSubject($id_mail, $conversation_id, $current_user_id, $user_receive_id, $subject, $content, $enclosed);
                        } else {
                            Mail::updateDraftSameSubject($id_mail, $current_user_id, $user_receive_id, $content, $enclosed);
                        }
                    }
                }
            }
        } else {
            if ($id_mail === '') {
                Mail::addMail($current_user_id, null, $subject, $content, $enclosed);
                $id = Mail::getSize();
                Draft::addMailDraft($id, $current_user_id);
            } else {
                if ($_POST['change_subject'] === 'true') {
                    Mail::updateDraftMailDifferentSubject($id_mail, $conversation_id, $current_user_id, null, $subject, $content, $enclosed);
                } else {
                    Mail::updateDraftSameSubject($id_mail, $current_user_id, null, $content, $enclosed);
                }
            }
        }
        $subject = null;
        $content = null;
        $user_receive_mail = null;
    }
}
?>