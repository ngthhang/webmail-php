<?php
    require_once('config/config.php');
    class Admin{
        public $id;
        public $name;
        public $avatar;
        public $position;
        public $is_sysadmin;
        public $phone;
        public $mail;
        public $pass;

        public function __construct($id, $name, $avatar,$position,$is_sysadmin, $phone, $mail, $pass){
            $this->id = $id;
            $this->name = $name;
            $this->avatar = $avatar;
            $this->phone = $phone;
            $this->mail = $mail;
            $this->pass = $pass;
            $this->is_sysadmin = $is_sysadmin;
            $this->position = $position;
        }
    }
?>