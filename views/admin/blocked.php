<?php
if (!isset($_GET['user_id'])) {
    echo "<script>alert('User id is not exist!')</script>";
} else {
    $user_id = $_GET['user_id'];
    $prev_controller = $_GET['prev_c'];
    $prev_action = $_GET['prev_a'];
    $user = User::getUserById($user_id);
    if($user->block == 1){
        $result = User::updateBlockUser(intval($user_id),0);
    } else{
        $result = User::updateBlockUser(intval($user_id), 1);
    }
    
    if ($result) {
        echo "<script>alert('Update Successfully!')</script>";
    } else {
        echo "<script>alert('There is some error in updating,please try again!')</script>";
    }
}
redirect('index.php?controller=' . $prev_controller . '&action=' . $prev_action);
?>