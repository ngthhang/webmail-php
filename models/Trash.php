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
    }
