<?php
require_once 'Connection.php';

class Movies extends Connection{


 //Fonction qui retourne les films

  public function getMovies($offset = null) {
    $sql = 'SELECT * FROM `movies` ORDER BY `id` DESC';
    if ($offset) $sql .= ' LIMIT '.$offset;
    return $this->query($sql, null, 'all');
  }

  //Fonction qui retourne un film.

  public function getSingle($id) {

    $sql = "SELECT * FROM movies WHERE id=?";
    $params = [$id];
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