<?php

class errorHelper {

    public $message;

    public function __construct() {
        $message = null;
    }

    function getError($res) {
        $explode = explode("/", $res);
        
        switch($explode[1]) {
            case '666':
                $this->message = "el elemento ya existe";
                break;
            case '23000':
                $this->message = "No se puede borrar el elemento ya que contiene una o mas referencias en otros objetos afectados";
                break;
            default:
                $this->message = "success";
                break;
        }
    }
}

?>
