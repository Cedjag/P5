<?php
require_once 'Controller.php';


class Router {

  private $controller;

  public function __construct(){
    $this->controller = new Controller();
  }

  public function RouterRequest() {

    if (isset($_GET['p'])) {
      $p = $_GET['p'];
    }
    else {
      $p = 'home';
    }

    ob_start();
    if ($p === 'home') {
      $this->controller->home();
    }

    elseif ($p === 'single') {
      $this->controller->single();
    }
    
    $contenu = ob_get_clean();
    require 'views/default.php';
  }

}
