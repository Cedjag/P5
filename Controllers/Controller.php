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
  private $Client;

  public function __construct() {
    $token  = new \Tmdb\ApiToken(TMDB_API_KEY);
    $client = new \Tmdb\Client($token, ['secure' => false]);
    $plugin = new \Tmdb\HttpClient\Plugin\LanguageFilterPlugin('fr');
    $client->getHttpClient()->addSubscriber($plugin);

    $this->Movie = new Movies();
    $this->Cast = new Casts();
    $this->MovieCast = new MoviesCasts();
    $this->Log_in = new Login();
    $this->Client = $client;
  }

  public function home() {
    $movie = $this->Movie;
    $films = $this->Movie->lastMovies();
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
    $movie = $this->Movie;
    $comment = $this->Comment->findCritics();
    $this->Comment->appCritic();
    $delete = $this->Comment->deleteCritic();
    require 'views/admin/dashboard.php';
  }

  // Ajout films
  public function create() {
    $msg = array();
    $this->Log_in->notLogin();

    if (isset($_POST['create'])) {
      $ids = trim($_POST['ids']);
      $ids = explode(',', $ids);

      $links = trim($_POST['links']);
      $links = explode(',', $links);

      if (sizeof($ids) > 0) {
        foreach ($ids as $key => $id) {
          if (!$this->Movie->isMovieExists($id)) {
            try {
              $movie = $this->Client->getMoviesApi()->getMovie($id);
              $credits = $this->Client->getMoviesApi()->getCredits($id);
              $movie['video'] = array_key_exists($key, $links) ? $links[$key] : null;
              
              $this->Movie->addMovie($movie, function($movie_id) use($credits) {
                foreach ($credits['cast'] as $cast) {
                  if (!$this->Cast->isCastExists($cast['id'])) {
                    $this->Cast->addCast($cast, function($cast_id) use($movie_id){
                      $this->MovieCast->addMovieCast($movie_id, $cast_id);
                    });
                  }
                }
              });
            } catch (Exception $e) {
              $msg[] = '<li style="color: red;">An excepetion adding movie with '.$id.' ID</li>';
            }
            $msg[] = '<li style="color: green;">The movie '.$id.' ID added successfully.</li>';
          } else {
            $msg[] = '<li style="color: red;">The movie with '.$id.' ID already exists.</li>';
          }
        }
      }
    }
    require 'views/admin/create.php';
  }

  // Mise à jour films
  public function update() {
    $msg = array();
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $movie = $this->Movie->getMovie($id);
      if (isset($_POST['update'])) {
        $video = $_POST['video'];
        $this->Movie->updateMovie([$video, $id]);
        $msg[] = '<li style="color: green;">Movie '.$movie['id'].' ID updated successfully.</li>';
      }
      require 'views/admin/update.php';
    } else {
      header('Location: index.php?p=dashboard');
    }
  }

    // Suppression films

  public function delete() {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $movie = $this->Movie->getMovie($id);
      $this->Movie->deleteMovie($id);
      $this->MovieCast->deleteMovieCast($movie['movie_id']);
      header('Location: index.php?p=dashboard');
    } else {
      header('Location: index.php?p=dashboard');
    }
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
