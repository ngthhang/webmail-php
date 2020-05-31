<?php
if (isset($_GET['admin_id'])) {
    $id = $_GET['admin_id'];
    $header = "Admin Profile";
    $this_user = Admin::getAdminById($id);
    if ($this_user->sysadmin == 1) {
        $sysadmin_text = 'SysAdmin';
    } else {
        $sysadmin_text = 'Admin';
    }
}
if ($sysadmin === 0) {
    echo "<script>alert('You dont have permission to access this object')</script>";
    redirect('index.php');
}

if (isset($_POST['save_admin'])) {
    header('Content-Type: text/html; charset=UTF-8');

    // get data for changing profile
    $id = $user->id;
    $username = addslashes($_POST['username']);
    $phone = addslashes($_POST['userphone']);
    $email = addslashes($_POST['useremail']);
    $position = addslashes($_POST['position']);
    $admin = Admin::getAdminById($id);
    $password = $admin->pass;

    if ($email != $user->mail) {
        //check if user have account in db
        $check_exist = Admin::checkAdminExist($email);
        if ($check_exist) {
            echo "<script>alert('This email have already registered, cant change information!')</script>";
            redirect("index.php?controller=admin&action=view_admin&admin_id={$id}");
        }
    }

    $result = Admin::changeAdminInformation(intval($id), $username, $phone, $email, $position, $password);
    if ($result) {
        echo "<script>alert('Update successfully')</script>";
    } else {
        echo "<script>alert('There is some error in updating your profile')</script>";
    }
    redirect("index.php?controller=admin&action=view_admin&admin_id={$id}");
}
