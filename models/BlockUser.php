<?php
    class BlockUser{
        public $user_id;
        public $block_id;

        public function __construct($user_id,$block_id)
        {
            $this->user_id = $user_id;
            $this->block_id = $block_id;
        }

        public static function getAll($user_id){
            $sql = "SELECT * FROM BLOCK_USER WHERE USER_ID = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i',$user_id);
            $status = $stm->execute();
            $data = array();

            if ($status) {
                $result = $stm->get_result();
                if($result->num_rows === 0){
                    return null;
                }
                while ($i = $result->fetch_array()) {
                    $data[] = new BlockUser($user_id, $i['BLOCK_ID'] );
                }
                return $data;
            }
            $stm->close();
            return null;
        }

        public static function isBlockUser($user_id,$block_id){
            $sql = "SELECT * FROM BLOCK_USER WHERE USER_ID = ? AND BLOCK_ID = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('ii', $user_id,$block_id);
            $status = $stm->execute();

            if ($status) {
                $data = $stm->get_result();
                return $data->num_rows;
            }
            $stm->close();
            return null;
        }
    }
?>