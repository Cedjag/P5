<?php
require 'Autoload.php';
Autoload::register();

class Controller {

  public $Movie;
  public $Cast;
  public $MovieCast;
  private $Comment;
  private $Log_in;
  private $Client;
  private $Rating;

  public function __construct() {
    $token  = new \Tmdb\ApiToken(TMDB_API_KEY);
    $client = new \Tmdb\Client($token, ['secure' => false]);
    $plugin = new \Tmdb\HttpClient\Plugin\LanguageFilterPlugin('fr');
    $client->getHttpClient()->addSubscriber($plugin);

    $this->Movie = new Movies();
    $this->Comment = new Critics();
    $this->Cast = new Casts();
    $this->MovieCast = new MoviesCasts();
    $this->Log_in = new Login();
    $this->Rating = new Rating();
    $this->Client = $client;
  }

  public function home() {
    $movie = $this->Movie;
    $view = require 'Views/home.php';
  }

  public function single() {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $movie = $this->Movie->getMovie($id);
      $poster = $this->Movie->getPosterPath($movie['poster_path'], false, 300, 450);
      $cast = $this->Cast;
      $msg = $this->Comment->reportCritic();
      $this->Comment->insertCritic();
      $critics = $this->Comment->findAllWithChildren($_GET['id']);
      $rating = $this->Rating->avg($movie['id']);
      $view = require 'Views/single.php';
    } else {
      header('Location:index.php?p=404');
    }
  }

  public function login(){
    $error = $this->Log_in->Log();
    $this->Log_in->alreadyConnect();
    $view = require 'Views/admin/login.php';
  }

  public function dashboard(){
    $this->Log_in->notLogin();
    $movie = $this->Movie;
    $comment = $this->Comment->findCritics();
    $this->Comment->appCritic();
    $msg = $this->Comment->noCritic();
    $delete = $this->Comment->deleteCritic();
    require 'Views/admin/dashboard.php';
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
              $msg[] = '<li id="exception">An exception adding movie with '.$id.' ID</li>';
            }
            $msg[] = '<li id="id_added">The movie '.$id.' ID added successfully.</li>';
          } else {
            $msg[] = '<li id="id_exists">The movie with '.$id.' ID already exists.</li>';
          }
        }
      }
    }
    require 'Views/admin/create.php';
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
        $msg[] = '<li id="movie_updated">Movie '.$movie['id'].' ID updated successfully.</li>';
      }
      require 'Views/admin/update.php';
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
    $this->Log_in->notLogin();
    $msg = $this->Log_in->newPass();
    require 'Views/admin/account.php';
  }

  // Rating
  public function rating() {
    if (isset($_GET['id']) && isset($_GET['value'])) {
      $id = $_GET['id'];
      $value = $_GET['value'];
      $this->Rating->rate($id, $value);
    }
  }

  public function contact() {
    if(!empty($_POST) && isset($_POST['btnContact'])){
        if(isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['message'])){
            if(!empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['message'])){
                $email = htmlspecialchars($_POST['email']);
                $firstname = htmlspecialchars($_POST['firstname']);
                $message = htmlspecialchars($_POST['message']);

                $message .= ' - email envoyé par: ' . $firstname . ' : ' . $email;

                // ENVOYER UN EMAIL
                mail('contact@cedricjager.com', 'Contact Le coin du cinéphile', $message);
            }else{
                $error = "Vous devez remplir tous les champs !";
            }
        }else{
            $error = "Une erreur s'est produite. Réessayez !";
        }
    }
  require 'Views/contact.php';
  }

  public function error() {
    require 'Views/404.php';
  }

  public function logout() {
    require 'Views/admin/logout.php';
  }

  public function list(){
    $movie = $this->Movie;
    $view = require 'Views/list.php';
  }
}
