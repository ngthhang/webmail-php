<?php
    require_once('config/config.php');
    class Mail{
        public $id;
        public $conversation_id;
        public $user_sent;
        public $user_receive;
        public $sent_time;
        public $content;
        public $enclosed;
        public $seen;

        public function __construct($id,$conversation_id,$user_sent,$user_receive,$sent_time,$content,$enclosed,$seen){
            $this->id = $id;
            $this->conversation_id = $conversation_id;
            $this->user_sent = $user_sent;
            $this->user_receive = $user_receive;
            $this->sent_time = $sent_time;
            $this->content = $content;
            $this->enclosed = $enclosed;
            $this->seen = $seen;
        }

        public static function getInboxMail($user_receive){
            $sql = "SELECT ID, CONVERSATION_ID, USER_ID_SEND, USER_ID_RECEIVE, 
            date_format(SENT_TIME, '%d/%m/%Y %h:%i:%s') AS SENT_TIME, CONTENT, ENCLOSED_FILE, SEEN
            FROM MAIL WHERE USER_ID_RECEIVE = ?  ORDER BY UNIX_TIMESTAMP(SENT_TIME) DESC";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i',$user_receive);
            $status = $stm->execute();
            $data = array();
            if($status){
                $result = $stm->get_result();
                while ($i = $result->fetch_array()) {
                    $data[] = new Mail($i['ID'], $i['CONVERSATION_ID'],$i['USER_ID_SEND'],$user_receive, $i['SENT_TIME'], $i['CONTENT'], $i['ENCLOSED_FILE'], $i['SEEN']);
                }
                return $data;
            }
            $stm->close();
            return null;
        }

        public static function getSentMail($user_sent){
            $sql = "SELECT ID, CONVERSATION_ID, USER_ID_SEND, USER_ID_RECEIVE, 
            date_format(SENT_TIME, '%d/%m/%Y %h:%i:%s') AS SENT_TIME, CONTENT, ENCLOSED_FILE, SEEN
            FROM MAIL WHERE USER_ID_SEND = ?  ORDER BY UNIX_TIMESTAMP(SENT_TIME) DESC";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i', $user_sent);
            $status = $stm->execute();
            $data = array();
            if ($status) {
                $result = $stm->get_result();
                while ($i = $result->fetch_array()) {
                    $data[] = new Mail($i['ID'], $i['CONVERSATION_ID'], $user_sent, $i['USER_ID_RECEIVE'], $i['SENT_TIME'], $i['CONTENT'], $i['ENCLOSED_FILE'], $i['SEEN']);
                }
                return $data;
            }
            $stm->close();
            return null;
        }
    }
