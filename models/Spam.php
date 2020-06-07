<?php
    class Spam{
        public $id; 
        public $user_id;

        public function __construct($id,$user_id)
        {
            $this->id = $id;
            $this->user_id = $user_id;
        }

        public static function getAllSpamByUserId($user_id){
            $sql = 'SELECT * FROM SPAM WHERE USER_ID = ?';
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i',$user_id);
            $status = $stm->execute();
            $data = array();

            if($status){
                $result = $stm->get_result();
                while ($i = $result->fetch_array()){
                    $data[] = new Spam($i['ID'], $user_id);
                }
                return $data;
            }
            $stm->close();
            return null;
        }

        public static function addSpamMail($id,$user_id){
            $sql = "INSERT INTO SPAM VALUES(?,?)";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('ii',$id,$user_id);
            $result = $stm->execute();
            $stm->execute();
            return $result;
        }

        public static function isSpamMail($id,$user_id){
            $sql = "SELECT * FROM SPAM WHERE ID = ? AND USER_ID = ?";
            $db = DB::getDB();
            $stm= $db->prepare($sql);
            $stm->bind_param('ii',$id,$user_id);
            $status = $stm->execute();
            if ($status) {
                $data = $stm->get_result();
                return $data->num_rows;
            }
            $stm->close();
            return null;
        }

        public static function deleteSpamMail($id,$user_id){
            $sql = "DELETE FROM SPAM WHERE ID = ? AND USER_ID = ?";
            $db = DB::getDB();
            $stm= $db->prepare($sql);
            $stm->bind_param('ii',$id,$user_id);
            $status = $stm->execute();
            $stm->close();
            return $status;
        }
    }
?>