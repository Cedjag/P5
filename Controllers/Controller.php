<?php
require 'Autoload.php';
Autoload::register();

class Controller {

  public $Movie;

  public function __construct() {

    $this->Movie = new Movies();
  }

  public function home() {
    $films = $this->Movie->lastMovies();
    $view = require 'views/home.php';
  }

  public function single() {
    $req = $this->Movie->getSingle($_GET['id']); 
    $view = require 'views/single.php';
  }

  public function error() {
    require 'views/404.php';
  }

}
