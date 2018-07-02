<?php
require_once 'Connection.php';

class MoviesCasts extends Connection {

  // Add movie_cast
  public function addMovieCast($movie_id, $cast_id) {
    $sql = 'INSERT INTO `movies_casts` (`movie_id`, `cast_id`) VALUES (?, ?)';
    $params = [$movie_id, $cast_id];
    $req = $this->query($sql, $params);
  }

  // Delete movie_cast
  public function deleteMovieCast($id) {
    $sql = 'DELETE FROM movies_casts WHERE movie_id = ?';
    $params = [$id];
    $req = $this->query($sql, $params);
  }
}