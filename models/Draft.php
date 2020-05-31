<?php
    class Draft{
        public $id;
        public $user_id;

        public function __construct($id,$user_id)
        {
            $this->id = $id;
            $this->user_id = $user_id;
        }

        public static function getAllDraftByUserId($user_id){
            $sql = 'SELECT * FROM DRAFT WHERE USER_ID = ?';
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i', $user_id);
            $status = $stm->execute();
            $data = array();

            if ($status) {
                $result = $stm->get_result();
                while ($i = $result->fetch_array()) {
                    $data[] = new Draft($i['ID'], $user_id);
                }
                return $data;
            }
            $stm->close();
            return null;
        }

        public static function isMailDraft($id){
            $sql = "SELECT * FROM DRAFT WHERE ID = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i',$id);
            $status = $stm->execute();
            if ($status) {
                $data = $stm->get_result();
                return $data->num_rows;
            }
            $stm->close();
            return null;
        }

        public static function addMailDraft($id,$user_id){
            $sql = "INSERT INTO DRAFT VALUES(?,?)";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('ii',$id,$user_id);
            $status = $stm->execute();
            $stm->close();
            return $status;
        }

        public static function deleteDraftMail($id){
            $sql = "DELETE FROM DRAFT WHERE ID =  ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i', $id);
            $status = $stm->execute();
            $stm->close();
            return $status;
        }
    }

?>