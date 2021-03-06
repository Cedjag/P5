<?php
require 'Autoload.php';
Autoload::register();

class Controller {

  private $movie;
  private $cast;
  private $movieCast;
  private $comment;
  private $log_in;
  private $client;
  private $rating;
  private $faq;

  public function __construct() {
    //Constructing the client
    $token  = new \Tmdb\ApiToken(TMDB_API_KEY);
    $client = new \Tmdb\Client($token, ['secure' => false]);
    $plugin = new \Tmdb\HttpClient\Plugin\LanguageFilterPlugin('fr');
    $client->getHttpClient()->addSubscriber($plugin);

    $this->movie = new Movies();
    $this->comment = new Critics();
    $this->cast = new Casts();
    $this->movieCast = new MoviesCasts();
    $this->log_in = new Login();
    $this->rating = new Rating();
    $this->client = $client;
    $this->faq = new About();
  }

  public function home() {
    $movie = $this->movie;
    $view = require 'Views/home.php';
  }

  public function page(){
    $movie = $this->movie;
    $view = require 'Views/page.php';
  }

  public function single() {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $movie = $this->movie->getMovie($id);
      $poster = $this->movie->getPosterPath($movie['poster_path'], false, 300, 450);
      $cast = $this->cast;
      $msg = $this->comment->reportCritic();
      $this->comment->insertCritic();
      $critics = $this->comment->findAllById($_GET['id']);
      $rating = $this->rating->avg($movie['id']);
      $view = require 'Views/single.php';
    } else {
      header('Location:index.php?p=404');
    }
  }

  public function info() {
    $info_ = $this->faq->getAbout();
    $view = require 'Views/about_.php';
  }

  public function login(){
    $error = $this->log_in->Log();
    $this->log_in->alreadyConnect();
    $view = require 'Views/admin/login.php';
  }

  public function dashboard(){
    $this->log_in->notLogin();
    $movie = $this->movie;
    $comment = $this->comment->findCritics();
    $this->comment->appCritic();
    $msg = $this->comment->noCritic();
    $delete = $this->comment->deleteCritic();
    require 'Views/admin/dashboard.php';
  }

  // Ajout films
  public function create() {
    $msg = array();
    $this->log_in->notLogin();
    if (isset($_POST['create'])) {
      $ids = trim($_POST['ids']);
      $ids = explode(',', $ids);
      $links = trim($_POST['links']);
      $links = explode(',', $links);
      if (sizeof($ids) > 0) {
        foreach ($ids as $key => $id) {
          if (!$this->movie->isMovieExists($id)) {
            try {
              $movie = $this->client->getMoviesApi()->getMovie($id);
              $credits = $this->client->getMoviesApi()->getCredits($id);
              $movie['video'] = array_key_exists($key, $links) ? $links[$key] : null;
              
              $this->movie->addMovie($movie, function($movie_id) use($credits) {
                foreach ($credits['cast'] as $cast) {
                  if (!$this->cast->isCastExists($cast['id'])) {
                    $this->cast->addCast($cast, function($cast_id) use($movie_id){
                      $this->movieCast->addMovieCast($movie_id, $cast_id);
                    });
                  }
                }
              });
            } catch (Exception $e) {
              $msg[] = 'Une erreur avec le film à l\'id '.$id.' s\'est produite';
            }
            $msg[] = 'Le film avec l\'id '.$id.' a été ajouté.';
          } else {
            $msg[] = 'Le film avec l\'id '.$id.' existe déjà.';
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
      $movie = $this->movie->getMovie($id);
      if (isset($_POST['update'])) {
        $video = $_POST['video'];
        $this->movie->updateMovie([$video, $id]);
        $msg[] = 'Le film avec l\'id '.$movie['id'].' a été mis à jour.';
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
      $movie = $this->movie->getMovie($id);
      $this->movie->deleteMovie($id);
      $this->movieCast->deleteMovieCast($movie['movie_id']);
      header('Location: index.php?p=dashboard');
    } else {
      header('Location: index.php?p=dashboard');
    }
  }

  public function account() {
    $this->log_in->notLogin();
    $msg = $this->log_in->newPass();
    $info_ = $this->faq->getAbout();
    $setinfo = $this->faq->setAbout();
    require 'Views/admin/account.php';
  }

  // Rating
  public function rating() {
    if (isset($_GET['id']) && isset($_GET['value'])) {
      $id = $_GET['id'];
      $value = $_GET['value'];
      $this->rating->rate($id, $value);
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
}