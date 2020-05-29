<?php
    class Trash{
        public $id;
        public $user_id;

        public function __construct($id,$expired,$user_id)
        {
            $this->id = $id;
            $this->expired = $expired;
            $this->user_id = $user_id;
        }

        public static function getAllTrashByUserId($user_id){
            $sql = 'SELECT * FROM RECYCLEBIN WHERE USER_ID = ?';
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i', $user_id);
            $status = $stm->execute();
            $data = array();

            if ($status) {
                $result = $stm->get_result();
                while ($i = $result->fetch_array()) {
                    $data[] = new Trash($i['ID'],$i['DATE_EXPIRED'],$user_id);
                }
                return $data;
            }
            $stm->close();
            return null;
        }

        public static function addTrashMail($id,$date_expired,$user_id){
            $sql = "INSERT INTO RECYCLEBIN VALUES(?,?,?)";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('isi',$id,$date_expired,$user_id);
            $result = $stm->execute();
            $stm->close();
            return $result;
        }

        public static function isMailInTrash($id,$user_id){
            $sql = "SELECT * FROM RECYCLEBIN WHERE ID = ? AND USER_ID = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('ii',$id,$user_id);
            $status = $stm->execute();
            if ($status) {
                $data = $stm->get_result();
                return $data->num_rows;
            }
            $stm->close();
            return null;
        }
    }
