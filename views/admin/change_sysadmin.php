<?php
if (!isset($_GET['user_id'])) {
    echo "<script>alert('User id is not exist!')</script>";
} else {
    $user_id = $_GET['user_id'];
    $prev_controller = $_GET['prev_c'];
    $prev_action = $_GET['prev_a'];
    $user = Admin::getAdminById($user_id);
    if($user->sysadmin == 1){
        $result = Admin::updateSysAdmin(intval($user_id),0);
    } else{
        $result = Admin::updateSysAdmin(intval($user_id), 1);
    }
    if ($result) {
        echo "<script>alert('Update Successfully!')</script>";
    } else {
        echo "<script>alert('There is some error in updating,please try again!')</script>";
    }
}
redirect('index.php?controller=' . $prev_controller . '&action=' . $prev_action);
