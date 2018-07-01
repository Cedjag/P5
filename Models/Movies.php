<?php
require_once 'Connection.php';

class Movies extends Connection{


  public function getMovie()
   {
      $sql = 'SELECT * FROM movies ORDER BY title';
      $req = $this->query($sql,true);
        return $req;
  }

  //Fonction qui retourne un film.

  public function getSingle($idMovie) {

    $sql = "SELECT * FROM movies WHERE id=?";
    $params = [$idMovie];
    $result = $this->prepare($sql, $params,'one');

    if ($result == false) {
      header('Location:index.php?p=404');
    }
    else {
      return $result;
    }
  }

  //Fonction qui retourne les derniers films mis en ligne

  public function lastMovies() {
    $sql = "SELECT * FROM movies ORDER BY id DESC LIMIT 0, 10";
    $req = $this->query($sql);
      return $req;
    }

  //Fonction qui retourne les films d'horreur
  public function horrorMovies() {
    $sql = "SELECT * FROM movies WHERE genre='horreur'";
    $req = $this->query($sql);
    return $req;
  }

    //Fonction qui retourne les drames
  public function dramas() {
    $sql = "SELECT * FROM movies WHERE genre='drame'";
    $req = $this->query($sql);
    return $req;
  }

      //Fonction qui retourne les comédies romantiques
  public function romance() {
    $sql = "SELECT * FROM movies WHERE genre='Comédie romantique'";
    $req = $this->query($sql);
    return $req;
  }

  public function dramaticcom() {
    $sql = "SELECT * FROM movies WHERE genre='Comédie dramatique'";
    $req = $this->query($sql);
    return $req;
  }

  public function comedy() {
    $sql = "SELECT * FROM movies WHERE genre='Comédie'";
    $req = $this->query($sql);
    return $req;
  }

  public function thriller() {
    $sql = "SELECT * FROM movies WHERE genre='thriller'";
    $req = $this->query($sql);
    return $req;
  }

  public function fantastic() {
    $sql = "SELECT * FROM movies WHERE genre='fantastique'";
    $req = $this->query($sql);
    return $req;
  }

    public function scifi() {
    $sql = "SELECT * FROM movies WHERE genre='science-fiction'";
    $req = $this->query($sql);
    return $req;
  }

  public function polar() {
    $sql = "SELECT * FROM movies WHERE genre='polar'";
    $req = $this->query($sql);
    return $req;
  }

  public function adventure() {
    $sql = "SELECT * FROM movies WHERE genre='aventure'";
    $req = $this->query($sql);
    return $req;
  }

  public function film_noir() {
    $sql = "SELECT * FROM movies WHERE genre='film noir'";
    $req = $this->query($sql);
    return $req;
  }

   public function western() {
    $sql = "SELECT * FROM movies WHERE genre='western'";
    $req = $this->query($sql);
    return $req;
  }

  public function historic() {
    $sql = "SELECT * FROM movies WHERE genre='historique'";
    $req = $this->query($sql);
    return $req;
  }

  public function docu() {
    $sql = "SELECT * FROM movies WHERE genre='documentaire'";
    $req = $this->query($sql);
    return $req;
  }

    //ajouter un film

  public function addMovie() {

    if (isset($_POST['submit']) AND isset($_POST['title']) AND isset($_POST['video']) AND isset($_POST['genre']) AND isset($_POST['version'])) {
      $title = $_POST['title'];
      $video = $_POST['video'];
      $genre = $_POST['genre'];
      $version = $_POST['version'];

      if (isset($_FILES['illustration'])) {
        if ($_FILES['illustration']['error'] == 4 ) {
          $path = 'public/img/default.png';
          $sql = 'INSERT INTO movies(title,video,genre,version,image) VALUES(?,?,?,?,?)';
          $params = [$title, $video, $genre, $version, $path];
          $req = $this->prepare($sql, $params);
          header('Location:index.php?p=dashboard');
        }

        else {
          $path = 'public/img/' . $titreIMG . '.jpg';
          move_uploaded_file ( $_FILES['illustration']['tmp_name'], $path);
          $sql = 'INSERT INTO movies(title,video,genre,version,image) VALUES(?,?,?,?,?)';
          $params = [$title, $video, $genre, $version, $path];
          $req = $this->prepare($sql, $params);
          header('Location:index.php?p=dashboard');
        }
      }

    }
  }

    //supprimer un film

  public function deleteMovie() {
    if (isset($_POST['delMovie'])) {
      $sql = 'DELETE FROM movies WHERE id=?';
      $params = [$_POST['delMovie']];
      $req = $this->prepare($sql, $params);
       header('Location:index.php?p=dashboard');
    }
  }

  //mettre à jour un film.

  public function updateMovie() {

    if (isset($_POST['update']) AND !empty($_POST['title']) AND !empty($_POST['video']) AND !empty($_POST['genre']) AND isset($_FILES['image'])) {
        $title = $_POST['title'];
        $video = $_POST['video'];
        $genre = $_POST['genre'];

        if ($_FILES['image']['error'] == 4 ) {
          $sql = "UPDATE movies SET title= ?, video= ?, genre= ? WHERE id=?";
          $params = [$$title, $video, $genre, $_GET['id']];
          $req = $this->prepare($sql, $params);
          header('Location:index.php?p=single&id='. $_POST['update']);
        }
        else {
          $path = 'public/img/' . $titleIMG . '.jpg';
          move_uploaded_file ( $_FILES['image']['tmp_name'], $path);
          $sql = "UPDATE movies SET title= ?, video= ?, genre= ?, image= ? WHERE id=?";
          $params = [$title, $video, $genre, $path, $_GET['id']];
          $req = $this->prepare($sql, $params);
          header('Location:index.php?p=single&id='. $_POST['update']);
        }
      }
  }
}