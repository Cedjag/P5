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

  public function getMovie($id) {
    $sql = "SELECT * FROM `movies` WHERE `id` = ?";
    $params = [$id];
    $result = $this->query($sql, $params, 'one');
    if ($result == false) header('Location:index.php?p=404');
    else { return $result; }
  }

  // Classement des films par popularité
  public function getPopularMovies($offset = null) {
    $sql = 'SELECT * FROM `movies` ORDER BY `popularity` DESC';
    if ($offset) $sql .= ' LIMIT '.$offset;
    return $this->query($sql, null, 'all');
  }

  //Fonction qui retourne les derniers films ajoutés

  public function lastMovies($offset = null) {
    $sql = "SELECT * FROM movies ORDER BY id DESC";
    if ($offset) $sql .= ' LIMIT '.$offset;
      return $this->query($sql, null, 'all');
    }

  public function bestRatedMovies($offset = null) {
    $sql = "SELECT AVG(`rating`) FROM movies_ratings WHERE movie_id={movie_id} ORDER BY AVG(`rating`) DESC";
    if ($offset) $sql .= ' LIMIT '.$offset;
      return $this->query($sql, null, 'all');
    }

    //ajouter un film

  public function addMovie($movie, $callback) {
    $genres = array();
    $sql = 'INSERT INTO `movies` (`movie_id`, `title`, `overview`, `video`, `genres`, `poster_path`, `release_date`, `popularity`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

    foreach ($movie['genres'] as $genre) {
      $genres[] = $genre['name'];
    }

    $genres = implode(", ", $genres);

    $params = [$movie['id'], $movie['title'], $movie['overview'], $movie['video'], $genres, $movie['poster_path'], $movie['release_date'], $movie['popularity']];
    $this->query($sql, $params);
    $callback($movie['id']);
  }

    //supprimer un film

  public function deleteMovie($id) {
    $sql = 'DELETE FROM movies WHERE id = ?';
    $params = [$id];
    $req = $this->query($sql, $params);
  }

  //mettre à jour un film

  public function updateMovie($params) {
    $sql = 'UPDATE `movies` SET `video` = ? WHERE id = ?';
    $this->query($sql, $params);
  }

  //vérifie si un film existe

  public function isMovieExists($id) {
    $sql = 'SELECT * FROM movies WHERE movie_id = ?';
    $params = [$id];
    $req = $this->query($sql, $params, 'one');

    if (!$req) return false;
    else return true;
  }

    // Récupérer poster film
  public function getPosterPath($path, $original = false, $width = 185, $height = 278) {
    if (!$original) {
      return 'https://image.tmdb.org/t/p/w'.$width.'_and_h'.$height.'_bestv2'.$path;
    } else {
      return 'https://image.tmdb.org/t/p/original'.$path;
    }
  }
}