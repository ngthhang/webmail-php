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
                    if(is_null($i['USER_ID_RECEIVE']) || $i['USER_ID_RECEIVE'] === ''){
                        continue;
                    } 
                    $data[] = new Mail($i['ID'], $i['CONVERSATION_ID'], $user_sent, $i['USER_ID_RECEIVE'], $i['SENT_TIME'], $i['CONTENT'], $i['ENCLOSED_FILE'], $i['SEEN']);
                }
                return $data;
            }
            $stm->close();
            return null;
        }

        public static function getTotalUnreadMail($user_receive){
            $sql = 'SELECT COUNT(ID) AS TOTAL_UNREAD_MAIL FROM MAIL WHERE USER_ID_RECEIVE = ? AND SEEN = 0';
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i', $user_receive);
            $status = $stm->execute();
            if($status){
                $result = $stm->get_result();
                $data =  $result->fetch_array();
                return $data['TOTAL_UNREAD_MAIL'];
            }
            $stm->close();
            return null;
        }

        public static function getMailById($id){
            $sql = "SELECT ID, CONVERSATION_ID, USER_ID_SEND, USER_ID_RECEIVE, 
                date_format(SENT_TIME, '%d/%m/%Y %h:%i:%s') AS SENT_TIME, CONTENT, ENCLOSED_FILE, SEEN
                FROM MAIL WHERE ID = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i', $id);
            $status = $stm->execute();

            if ($status) {
                $result = $stm->get_result();
                while ($i = $result->fetch_array()) {
                    return new Mail($id, $i['CONVERSATION_ID'], $i['USER_ID_SEND'], $i['USER_ID_RECEIVE'], $i['SENT_TIME'], $i['CONTENT'], $i['ENCLOSED_FILE'], $i['SEEN']);
                }
            }
            $stm->close();
            return null;
        }

        public static function getSize(){
            $sql = "SELECT MAX(ID) AS TOTALMAIL FROM MAIL";
            $db = DB::getDB();
            $stm = $db->query($sql);
            $result = $stm->fetch_array();
            return $result['TOTALMAIL'];
        }

        public static function getAllMailByConversationId($conversation_id){
            $sql = "SELECT ID, CONVERSATION_ID, USER_ID_SEND, USER_ID_RECEIVE, 
                date_format(SENT_TIME, '%d/%m/%Y %h:%i:%s') AS SENT_TIME, CONTENT, ENCLOSED_FILE, SEEN
                FROM MAIL WHERE CONVERSATION_ID = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i',$conversation_id);
            $status = $stm->execute();
            $data = array();
            if ($status) {
                $result = $stm->get_result();
                while ($i = $result->fetch_array()) {
                    $data[] = new Mail($i['ID'], $conversation_id,$i['USER_ID_SEND'], $i['USER_ID_RECEIVE'], $i['SENT_TIME'], $i['CONTENT'], $i['ENCLOSED_FILE'], $i['SEEN']);
                }
                return $data;
            }
            $stm->close();
            return null;
        }

        public static function getSentMaiByConversationIdAndUserSent($user_sent,$conversation_id){
            $sql = "SELECT ID, CONVERSATION_ID, USER_ID_SEND, USER_ID_RECEIVE, 
                    date_format(SENT_TIME, '%d/%m/%Y %h:%i:%s') AS SENT_TIME, CONTENT, ENCLOSED_FILE, SEEN
                    FROM MAIL WHERE CONVERSATION_ID = ? AND USER_ID_SEND = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('ii', $conversation_id,$user_sent);
            $status = $stm->execute();
            $data = array();
            if ($status) {
                $result = $stm->get_result();
                while ($i = $result->fetch_array()) {
                    $data[] = new Mail($i['ID'], $conversation_id, $i['USER_ID_SEND'], $i['USER_ID_RECEIVE'], $i['SENT_TIME'], $i['CONTENT'], $i['ENCLOSED_FILE'], $i['SEEN']);
                }
                return $data;
            }
            $stm->close();
            return null;
            }

        public static function updateSeenMail($id){
            $sql = "UPDATE MAIL SET SEEN = ? WHERE ID = ?";
            $db = DB::getDB();
            $seen = 1;
            $stm = $db->prepare($sql);
            $stm->bind_param('ii',$seen,$id);
            $status = $stm->execute();
            $stm->close();
            return $status;
        }

        public static function updateUnseenMail($id){
            $sql = "UPDATE MAIL SET SEEN = ? WHERE ID = ?";
            $db = DB::getDB();
            $seen = 0;
            $stm = $db->prepare($sql);
            $stm->bind_param('ii', $seen, $id);
            $status = $stm->execute();
            $stm->close();
            return $status;
        }

        public static function addMail($conversation_id,$user_sent,$user_receive,$subject,$content,$enclosed){
            $sql = "INSERT INTO MAIL VALUES(?,?,?,?,?,?,?,?)";
            $db = DB::getDB();
            $id = Mail::getSize() + 1;
            date_default_timezone_set('Etc/GMT-7');
            $sent_time = date('Y-m-d h:i:s', time());
            $seen = 0;
            $stm = $db->prepare($sql);
            $stm->bind_param('iiiisssi',$id, $conversation_id, $user_sent, $user_receive, $sent_time, $content, $enclosed, $seen);
            $result = $stm->execute();
            $stm->close();
            return $result;
        }

        public static function sendDraftMail($conversation_id, $user_sent, $user_receive, $content, $enclosed){
            $sql = "INSERT INTO MAIL VALUES(?,?,?,?,?,?,?,?)";
            $db = DB::getDB();
            $id = Mail::getSize() + 1;
            date_default_timezone_set('Etc/GMT-7');
            $sent_time = date('Y-m-d h:i:s', time());
            $seen = 0;
            $stm = $db->prepare($sql);
            $stm->bind_param('iiiisssi', $id, $conversation_id, $user_sent, $user_receive, $sent_time, $content, $enclosed, $seen);
            $result = $stm->execute();
            $stm->close();
            return $result;
        }   

        public static function updateDraftMail($id,$conversation_id,$user_sent,$user_receive,$subject,$content,$enclosed){
            $sql = "UPDATE MAIL SET 
                USER_ID_SEND = ?,
                USER_ID_RECEIVE = ?,
                CONTENT = ?,
                ENCLOSED_FILE = ?,
                SEEN = ?
                WHERE ID = ?
            ";
            $db = DB::getDB();
            Conversation::changeSubject($conversation_id,$subject);
            $seen = 0;
            $stm = $db->prepare($sql);
            $stm->bind_param('iissii', $user_sent, $user_receive, $content, $enclosed, $seen, $id);
            $result = $stm->execute();
            $stm->close();
            return $result;
        }

        public static function deleteAllMailByConversationId($conversation_id){
            $sql = "DELETE FROM MAIL WHERE CONVERSATION_ID = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i',$conversation_id);
            $status = $stm->execute();
            $stm->close();
            return $status;
        }

        public static function deleteMailById($id){
            $sql = "DELETE FROM MAIL WHERE ID = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i', $id);
            $status = $stm->execute();
            $stm->close();
            return $status;
        }

}
?>
