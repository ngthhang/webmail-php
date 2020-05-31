<?php
    if(isset($_POST['save'])){
        header('Content-Type: text/html; charset=UTF-8');
        
        // get data for changing profile
        $id = $_POST['id'];
        $username = addslashes($_POST['username']);
        $phone = addslashes($_POST['userphone']);
        $email = addslashes($_POST['useremail']);
        $password = addslashes($_POST['userpassword']);

        //hash password 
        if($password != $user->pass){
            $password = md5($password);
        }
    
        if($email !== $user->mail){
            //check if user have account in db
            $check_exist = User::checkUserExist($email);
            if ($check_exist) {
                echo "<script>alert('This email have already registered, cant change information!')</script>";
                redirect('index.php?controller=home&action=profile');
            }
        }

        $result = User::changeUserInformation(intval($id),$username,$phone,$email,$password);
        if($result){
            echo "<script>alert('Update successfully')</script>";
        } else {
            echo "<script>alert('There is some error in updating your profile')</script>";
        }
        redirect('index.php?controller=home&action=profile'); 
    }
?>