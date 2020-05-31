    <?php
    class Enclosed{
        public $id;
        public $id_mail;
        public $link;

        public function __construct($id,$id_mail,$link)
        {
            $this->id = $id;
            $this->id_mail = $id_mail;
            $this->link = $link;
        }
        
    }
?>