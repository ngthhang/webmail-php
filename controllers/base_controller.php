<?php
    class BaseController{
        protected $name;

        public function render($view, $data = array()){
            ob_start();
            extract($data);
            require_once('views/' . $this->name . '/' . $view . '.php');
            $content = ob_get_clean();
            require_once('views/layout/index.php');
        }
    }

?>