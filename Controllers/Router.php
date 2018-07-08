<?php
require_once 'Controller.php';


class Router {

  private $controller;

  public function __construct(){
    $this->controller = new Controller();
  }

  public function RouterRequest() {

    require 'views/header.php';

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
    elseif ($p === 'login') {
      $this->controller->login();
    }
    elseif ($p === 'dashboard') {
      $this->controller->dashboard();
    }
    elseif ($p === 'logout') {
      $this->controller->logout();
    }
    elseif ($p === 'create') {
      $this->controller->create();
    }
    elseif ($p === 'update') {
      $this->controller->update();
    }
    elseif ($p === 'delete') {
      $this->controller->delete();
    }
    elseif ($p === 'rating') {
      $this->controller->rating();
    }
    elseif ($p === '404') {
      $this->controller->error();
    }
    elseif ($p === 'account') {
      $this->controller->account();
    }
    elseif ($p === 'contact') {
      $this->controller->contact();
    }
    elseif ($p === 'list') {
      $this->controller->list();
    }
    
    require 'views/footer.php';  
  }
}
