<?php

require_once('models/User.php');
require_once('models/Mail.php');
require_once('models/Conversation.php');
class BaseController
{
    protected $name;

    public function render($view, $data = array())
    {
        ob_start();
        extract($data);
        if ($this->name == 'login') {
            require_once('views/' . $this->name . '/' . $view . '.php');
        } else {
            require_once('views/' . $this->name . '/' . $view . '.php');
            $content = ob_get_clean();

            // get info current user 
            $current_user = $_SESSION['email'];
            $user = User::getCurrentUser($current_user);
            if(is_null($user->avatar) || $user->avatar === ''){
                $avatar = 'asset/images/avatar/1.png';
            } else{
                $avatar = $user->avatar;
            }
            require_once('views/layout/index.php');
        }
    }
}
