<?php

class errorView {

  private $smarty_for_auto;

    public function __construct() {

		  $this->smarty_for_auto = new Smarty();

    }

  function reportErrors($error) {
    // pasa el auto a smarty
    $this->smarty_for_auto->assign('error', $error);
    // renderizo el template
    $this->smarty_for_auto->display('./templates/error.tpl');
  }
}

?>

  