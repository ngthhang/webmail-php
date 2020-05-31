<?php
    class Trash{
        public $id;
        public $user_id;

        public function __construct($id,$expired,$user_id,$deleted)
        {
            $this->id = $id;
            $this->expired = $expired;
            $this->user_id = $user_id;
            $this->deleted = $deleted;
        }

        public static function getAllTrashByUserId($user_id){
            $sql = 'SELECT * FROM RECYCLEBIN WHERE USER_ID = ? AND DELETED = ?';
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $user_deleted = 0;
            $stm->bind_param('ii', $user_id,$user_deleted);
            $status = $stm->execute();
            $data = array();

            if ($status) {
                $result = $stm->get_result();
                while ($i = $result->fetch_array()) {
                    $data[] = new Trash($i['ID'],$i['DATE_EXPIRED'],$user_id,$i['DELETED']);
                }
                return $data;
            }
            $stm->close();
            return null;
        }

        public static function addTrashMail($id,$date_expired,$user_id){
            $sql = "INSERT INTO RECYCLEBIN VALUES(?,?,?,?)";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $user_deleted = 0;
            $stm->bind_param('isii',$id,$date_expired,$user_id, $user_deleted);
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

        public static function deletedMail($id,$user_id){
            $sql = "UPDATE RECYCLEBIN SET DELETED = ? WHERE ID = ? AND USER_ID = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $user_deleted = 1;
            $stm->bind_param('iii',$user_deleted,$id,$user_id);
            $status = $stm->execute();
            $stm->close();
            return $status;
        }
    }
