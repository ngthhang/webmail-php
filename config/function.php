<?php 
    class DB {
        //get database
        public static function getDB()
        {
            //create a connection
            $conn = new mysqli(SERVER, USER, PASS, DB);
            if ($conn->connect_error) {
                die('Connection failed') . $conn->connect_error;
            }
            return $conn;
        }
    }

    function redirect($link){
        header('Location: ' . HOST . '/webmail-php' .'/' . $link);
    }
    
?>
