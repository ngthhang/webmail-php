<?php
    require_once('config/config.php');
    class Admin{
        public $id;
        public $name;
        public $avatar;
        public $position;
        public $sysadmin;
        public $phone;
        public $mail;
        public $pass;

        public function __construct($id, $name, $avatar,$position,$sysadmin, $phone, $mail, $pass){
            $this->id = $id;
            $this->name = $name;
            $this->avatar = $avatar;
            $this->phone = $phone;
            $this->mail = $mail;
            $this->pass = $pass;
            $this->sysadmin = $sysadmin;
            $this->position = $position;
        }

        public static function checkAdminExist($mail)
        {
            $check_user = 'SELECT * FROM ADMIN WHERE USER_MAIL_ADDRESS = ?';
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

        public static function checkLogin($mail, $pass)
        {
            $check_user = 'SELECT * FROM ADMIN WHERE USER_MAIL_ADDRESS = ? AND PASSWORD = ?';
            $db = DB::getDB();
            $stm = $db->prepare($check_user);
            $stm->bind_param('ss', $mail, $pass);
            $status = $stm->execute();

            if ($status) {
                $data = $stm->get_result();
                return $data->num_rows;
            }
            $stm->close();
            return null;
        }

        public static function getAdminById($id)
        {
            $sql = 'SELECT * FROM ADMIN WHERE ID = ?';
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i', $id);
            $status = $stm->execute();

            if ($status) {
                $data = $stm->get_result();
                while ($i = $data->fetch_array()) {
                    return new Admin($i['ID'], $i['NAME'], $i['AVATAR'], $i['POSITION'], $i['SYSADMIN'] ,$i['PHONENUMBER'], $i['USER_MAIL_ADDRESS'], $i['PASSWORD']);
                }
            }
            $stm->close();
            return null;
        }

        public static function getCurrentAdmin($mail){
            $check_user = 'SELECT * FROM ADMIN WHERE USER_MAIL_ADDRESS = ?';
            $db = DB::getDB();
            $stm = $db->prepare($check_user);
            $stm->bind_param('s', $mail);
            $status = $stm->execute();

            if ($status) {
                $data = $stm->get_result();
                while ($i = $data->fetch_array()) {
                    return new Admin($i['ID'], $i['NAME'], $i['AVATAR'], $i['POSITION'], $i['SYSADMIN'], $i['PHONENUMBER'], $i['USER_MAIL_ADDRESS'], $i['PASSWORD']);
                }
            }
            $stm->close();
            return null;
        }

        public static function getAll()
        {
            $sql = 'SELECT * FROM ADMIN';
            $db = DB::getDB();
            $stm = $db->query($sql);
            $data = array();
            while ($i = $stm->fetch_array()) {
                $data[] = new Admin($i['ID'], $i['NAME'], $i['AVATAR'], $i['POSITION'], $i['SYSADMIN'], $i['PHONENUMBER'], $i['USER_MAIL_ADDRESS'], $i['PASSWORD']);
            }
            return $data;
        }

        public static function changeAdminInformation($id, $name, $phone, $mail,$position, $pass)
        {
            $sql = "UPDATE ADMIN SET NAME = ?, PHONENUMBER = ?,USER_MAIL_ADDRESS = ?,PASSWORD = ?, POSITION = ? WHERE ID = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('sssssi', $name, $phone, $mail, $pass,$position, $id);
            $result = $stm->execute();
            $stm->close();
            return $result;
        }

        public static function updateSysAdmin($id,$sysadmin){
            $sql = "UPDATE ADMIN SET SYSADMIN = ? WHERE ID = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('ii', $sysadmin, $id);
            $result = $stm->execute();
            $stm->close();
            return $result;
        }
    }
?>