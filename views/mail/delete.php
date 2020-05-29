<?php
    if (!isset($_GET['id_mail'])) {
        echo "<script>alert('Mail id is not exist!')</script>";
    } else {
        $id_mail = $_GET['id_mail'];
        $user_id = $current_user_id;
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

    redirect('index.php');
?>