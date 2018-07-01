<?php
require 'Autoload.php';
Autoload::register();

class Controller {

  public $Movie;
  private $Comment;
  private $Log_in;
  private $About_;

  public function __construct() {

    $this->Movie = new Movies();
    $this->Comment = new Critics();
    $this->Log_in = new Login();
    $this->About_ = new About();
  }

  public function home() {
    $films = $this->Movie->lastMovies();
    $horror = $this->Movie->horrorMovies();
    $drama = $this->Movie->dramas();
    $romcom = $this->Movie->romance();
    $dramatic = $this->Movie->dramaticcom();
    $mystery = $this->Movie->film_noir();
    $indiana = $this->Movie->adventure();
    $cop = $this->Movie->polar();
    $thrill = $this->Movie->thriller();
    $comedies = $this->Movie->comedy();
    $documentary = $this->Movie->docu();
    $strange = $this->Movie->fantastic();
    $sf = $this->Movie->scifi();
    $farwest = $this->Movie->western();
    $hist = $this->Movie->historic();

    $view = require 'views/home.php';
  }

  public function single() {
    $req = $this->Movie->getSingle($_GET['id']); 
    $msg = $this->Comment->reportCritic();
    $this->Comment->insertCritic();
    $critics = $this->Comment->findAllWithChildren($_GET['id']);
    $view = require 'views/single.php';
  }

  public function login(){
    $error = $this->Log_in->Log();
    $this->Log_in->alreadyConnect();
    $view = require 'views/admin/login.php';
  }

  public function dashboard(){
    $this->Log_in->notLogin();
    $update = $this->Movie->updateMovie();
    $comment = $this->Comment->findCritics();
    $this->Comment->appCritic();
    $delete = $this->Comment->deleteCritic();
    $req = $this->Movie->getMovie();
    $this->Movie->deleteMovie();
    require 'views/admin/dashboard.php';
  }

  public function create() {
    $this->Log_in->notLogin();
    $this->Movie->addMovie();
    require 'views/admin/create.php';
  }

  public function update() {
    $this->Log_in->notLogin();
    $this->Movie->updateMovie();
    $post = $this->Movie->getSingle($_GET['id']);
    require 'views/admin/update.php';
  }

  public function account() {
    $this->About_->setAbout();
    $this->Log_in->notLogin();
    $msg = $this->Log_in->newPass();
    $about = $this->About_->getAbout();
    require 'views/admin/account.php';
  }

  public function error() {
    require 'views/404.php';
  }
}
