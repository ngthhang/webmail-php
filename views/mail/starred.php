<?php
    $id_mail = $_GET['id_mail'];
    $user_id = $current_user_id;
    if (Star::isMailStar($id_mail, $user_id)) {
        $result = Star::deleteStarMail($id_mail, $user_id);
    } else {
        $result = Star::addStarMail($id_mail, $user_id);
    }
    if (isset($_GET['curr_c'])){
        $current_controller = $_GET['curr_c'];
        $current_action = $_GET['curr_a'];
        $prev_action = $_GET['prev_a'];
        redirect('index.php?controller=' . $current_controller . '&action=' . 
        $current_action .'&id_mail='. $id_mail . '&previous_route=' . $prev_action);
    }
    else {
        $prev_controller = $_GET['prev_c'];
        $prev_action = $_GET['prev_a'];
        redirect('index.php?controller=' . $prev_controller . '&action=' . $prev_action);
    }
?>