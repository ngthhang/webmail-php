<?php
require_once('config/config.php');
    class User{
        public $id;
        public $name;
        public $avatar;
        public $phone;
        public $mail;
        public $pass;
        public $block;

        public function __construct($id, $name, $avatar, $phone, $mail, $pass, $block){
            $this->id = $id;
            $this->name = $name;
            $this->avatar = $avatar;
            $this->phone = $phone;
            $this->mail = $mail;
            $this->pass = $pass;
            $this->block = $block; 
        }

        public static function getAll(){
            $sql = 'SELECT * FROM USER';
            $db = DB::getDB();
            $stm = $db->query($sql);
            $data = array();
            while ($i = $stm->fetch_array()) {
                $data[] = new User($i['ID'], $i['NAME'], $i['AVATAR'], $i['PHONENUMBER'], $i['USER_MAIL_ADDRESS'], $i['PASSWORD'], $i['BLOCK']);
            }
            return $data;
        }

        public static function getSize(){
            $sql = 'SELECT MAX(ID) AS TOTALUSER FROM USER';
            $db = DB::getDB();
            $stm = $db->query($sql);
            return $stm->fetch_array();
        }

        public static function checkUserExist($mail){
            $check_user = 'SELECT * FROM USER WHERE USER_MAIL_ADDRESS = ?';
            $db = DB::getDB();
            $stm = $db->prepare($check_user);
            $stm->bind_param('s', $mail);
            $status = $stm->execute();
            
            if ($status) {
                $data = $stm->get_result();
                return $data->num_rows;
            }
            $stm->close();
            return null;
        }

        public static function checkLogin($mail,$pass){
            $check_user = 'SELECT * FROM USER WHERE USER_MAIL_ADDRESS = ? AND PASSWORD = ?';
            $db = DB::getDB();
            $stm = $db->prepare($check_user);
            $stm->bind_param('ss',$mail,$pass);
            $status = $stm->execute();

            if ($status) {
                $data = $stm->get_result();
                return $data->num_rows;
            }
            $stm->close();
            return null;
        }

        public static function addUser($name,$avatar,$phone,$mail,$pass){
            $sql = 'INSERT INTO USER VALUES(?,?,?,?,?,?)';
            $db = DB::getDB();
            $total_user = User::getSize();
            $id = $total_user['TOTALUSER'] + 1;
            $stm = $db->prepare($sql);
            $stm->bind_param('isssss',$id,$name,$avatar,$phone,$mail,$pass);
            $result = $stm->execute();
            $stm->close();
            return $result;
        }

        public static function getCurrentUser($mail){
            $check_user = 'SELECT * FROM USER WHERE USER_MAIL_ADDRESS = ?';
            $db = DB::getDB();
            $stm = $db->prepare($check_user);
            $stm->bind_param('s', $mail);
            $status = $stm->execute();

            if ($status) {
                $data = $stm->get_result();
                while( $i = $data->fetch_array())
                {
                    return new User($i['ID'], $i['NAME'], $i['AVATAR'], $i['PHONENUMBER'], $i['USER_MAIL_ADDRESS'], $i['PASSWORD'], $i['BLOCK']);
                }
            }
            $stm->close();
            return null;
        }

        public static function getUserById($id){
            $sql = 'SELECT * FROM USER WHERE ID = ?';
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i', $id);
            $status = $stm->execute();

            if ($status) {
                $data = $stm->get_result();
                while ($i = $data->fetch_array()) {
                    return new User($i['ID'], $i['NAME'], $i['AVATAR'], $i['PHONENUMBER'], $i['USER_MAIL_ADDRESS'], $i['PASSWORD'], $i['BLOCK']);
                }
            }
            $stm->close();
            return null;
        }

        public static function changeUserInformation($id,$name,$phone,$mail,$pass){
            $sql = "UPDATE USER SET NAME = ?, PHONENUMBER = ?,USER_MAIL_ADDRESS = ?,PASSWORD = ? WHERE ID = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('ssssi',$name, $phone, $mail, $pass, $id);
            $result = $stm->execute();
            $stm->close();
            return $result;
        }

        public static function updateBlockUser($id,$block){
            $sql = "UPDATE USER SET BLOCK = ? WHERE ID = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('ii', $block,$id);
            $result = $stm->execute();
            $stm->close();
            return $result;
        }
    }
?>