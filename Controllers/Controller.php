<?php
require 'Autoload.php';
Autoload::register();

class Controller {

  public $Movie;
  public $Cast;
  public $MovieCast;
  private $Comment;
  private $Log_in;
  private $About_;

  public function __construct() {
    $token  = new \Tmdb\ApiToken(TMDB_API_KEY);
    $client = new \Tmdb\Client($token, ['secure' => false]);
    $plugin = new \Tmdb\HttpClient\Plugin\LanguageFilterPlugin('fr');
    $client->getHttpClient()->addSubscriber($plugin);

    $this->Movie = new Movies();
    $this->Cast = new Casts();
    $this->MovieCast = new MoviesCasts();
    $this->Log_in = new Login();
  }

  public function home() {
    $movie = $this->Movie;
    $view = require 'views/home.php';
  }

  public function single() {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $movie = $this->Movie->getMovie($id);
      $poster = $this->Movie->getPosterPath($movie['poster_path'], false, 300, 450);
      $cast = $this->Cast;
      $rating = $this->Rating->avg($movie['id']);
      $view = require 'views/single.php';
    } else {
      header('Location:index.php?p=404');
    }
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
