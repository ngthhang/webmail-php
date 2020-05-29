<?php
    if(!isset($_GET['id_mail'])){
        echo "<script>alert('Mail id is not exist!')</script>";
    } else {
        $id_mail = $_GET['id_mail'];
        $user_id = $current_user_id;
        if(Star::isMailStar($id_mail,$user_id)){
            $result = Star::deleteStarMail($id_mail, $user_id);
        } else{
            $result = Star::addStarMail($id_mail, $user_id);
        }
        if ($result) {
            echo "<script>alert('Update Successfully!')</script>";
        } else {
            echo "<script>alert('There is some error in updating,please try again!')</script>";
        }
    }

    redirect('index.php');
?>