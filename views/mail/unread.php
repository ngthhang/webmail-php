<?php
    $id_mail = $_GET['id_mail'];
    $user_id = $current_user_id;
    $prev_controller = $_GET['prev_c'];
    $prev_action = $_GET['prev_a'];
    $result = Mail::updateUnseenMail($id_mail,$current_user_id);
    redirect('index.php?controller=' . $prev_controller . '&action=' . $prev_action);
?>