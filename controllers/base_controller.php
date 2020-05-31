<?php

require_once('models/User.php');
require_once('models/Mail.php');
require_once('models/Conversation.php');
require_once('models/Spam.php');
require_once('models/Star.php');
require_once('models/Draft.php');
require_once('models/Trash.php');
require_once('models/BlockUser.php');
class BaseController
{
    protected $name;

    public function render($view, $data = array())
    {
        ob_start();
        extract($data);
        if ($this->name == 'login') {
            require_once('views/' . $this->name . '/' . $view . '.php');
        } 
        else if($this->name == 'admin'){
            // get info current user 
            $current_user = str_replace('@gmail.com', '', $_SESSION['email_admin']);
            $current_user = substr($current_user, 0, 13) . '...';
            $user = User::getCurrentUser($_SESSION['email_admin']);
            if (is_null($user->avatar) || $user->avatar === '') {
                $avatar = 'asset/images/avatar/1.png';
            } else {
                $avatar = $user->avatar;
            }
            $current_user_id = $user->id;
            $total_unread_mail = Mail::getTotalUnreadMail($current_user_id);

            require_once('views/' . $this->name . '/' . $view . '.php');
            $content = ob_get_clean();
            require_once('views/layout/admin_index.php');
        }
        else {
            // get info current user 
            $current_user = str_replace('@gmail.com','',$_SESSION['email']);
            $current_user = substr($current_user,0,13) . '...';
            $user = User::getCurrentUser($_SESSION['email']);
            if(is_null($user->avatar) || $user->avatar === ''){
                $avatar = 'asset/images/avatar/1.png';
            } else{
                $avatar = $user->avatar;
            }
            $current_user_id = $user->id;
            $total_unread_mail = Mail::getTotalUnreadMail($current_user_id);
            
            require_once('views/' . $this->name . '/' . $view . '.php');
            $content = ob_get_clean();
            require_once('views/layout/index.php');
        }
    }
}
