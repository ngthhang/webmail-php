<?php
if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $header = "User Profile";
    $this_user = User::getUserById($id);
    if($this_user->block == 1){
        $block_text = 'Unblock';
    } else{
        $block_text = 'Block';
    }
    if (is_null($this_user->avatar) || $this_user->avatar === '') {
        $user_avatar = 'asset/images/avatar/1.png';
    } else {
        $user_avatar = $this_user->avatar;
    }
}

if (isset($_POST['save_user'])) {
    header('Content-Type: text/html; charset=UTF-8');

    // get data for changing user profile
    $user_id = $_GET['user_id'];
    $temp_user = User::getUserById($user_id);
    $username = addslashes($_POST['username']);
    $phone = addslashes($_POST['userphone']);
    $email = addslashes($_POST['useremail']);
    $password = addslashes($_POST['userpassword']);

    //hash password 
    if ($password != $temp_user->pass) {
        $password = md5($password);
    }

    if ($email !== $temp_user->mail) {
        //check if user have account in db
        $check_exist = User::checkUserExist($email);
        if ($check_exist) {
            echo "<script>alert('This email have already registered, cant change information!')</script>";
            redirect("index.php?controller=admin&action=view_user&user_id={$user_id}");
        }
    }

    $result = User::changeUserInformation(intval($user_id), $username, $phone, $email, $password);
    if ($result) {
        echo "<script>alert('Update successfully')</script>";
    } else {
        echo "<script>alert('There is some error in updating your profile')</script>";
    }
    redirect("index.php?controller=admin&action=view_user&user_id={$user_id}");
}

if(isset($_POST['change_block'])){
    $block = $_POST['block'];
    if($block == '0'){
        User::updateBlockUser(intval($id),1);
    } else{
        User::updateBlockUser(intval($id), 0);
    }
    redirect("index.php?controller=admin&action=view_user&user_id={$id}");
}
?>