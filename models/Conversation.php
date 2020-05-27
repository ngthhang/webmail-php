<?php
    require_once('config/config.php');
    class Conversation{
        public $id;
        public $subject;

        public function __construct($id, $subject){
            $this->id = $id;
            $this->subject = $subject;
        }
     
        public static function getConversation($id){
            $sql = 'SELECT * FROM CONVERSATION WHERE ID = ?';
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i', $id);
            $status = $stm->execute();
            if($status){
                $data = $stm->get_result();
                while ($i = $data->fetch_array()) {
                    return new Conversation($i['ID'],$i['SUBJECT']);
                }
            }
        }
    }
?>
