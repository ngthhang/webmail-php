<?php
    if (!isset($_GET['id_mail'])) {
        echo "<script>alert('Mail id is not exist!')</script>";
    } else {
        $id_mail = $_GET['id_mail'];
        $user_id = $current_user_id;
        $prev_controller = $_GET['prev_c'];
        $prev_action = $_GET['prev_a'];
        date_default_timezone_set('Etc/GMT-7');
        $current_time = date('Y-m-d h:i:s', time());
        $date_expired = date('Y-m-d h:i:s', strtotime($current_user_id . ' + 30 days'));
        $result = Trash::addTrashMail($id_mail,$date_expired, $user_id);
        if ($result) {
            echo "<script>alert('Update Successfully!')</script>";
        } else {
            echo "<script>alert('There is some error in updating,please try again!')</script>";
        }
    }

    if($prev_action === 'draft'){
        $mail = Mail::getMailById($id_mail);
        $conversation_id = $mail->conversation_id;
        Mail::deleteAllMailByConversationId($conversation_id);
        Conversation::deleteConversation($conversation_id);
    }

    if($prev_action === 'trash'){
        Trash::deletedMail($id_mail,$current_user_id);
    }

    redirect('index.php?controller=' . $prev_controller . '&action=' . $prev_action);
?>