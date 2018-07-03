<?php
require_once 'Connection.php';

class Rating extends Connection {

  public function rate($id, $value) {
    $sql = 'INSERT INTO `movies_ratings` (`movie_id`, `rating`) VALUES(?, ?)';
    $params = [$id, $value];
    $req = $this->query($sql, $params);
  }

  public function avg($id) {
    $sql = 'SELECT AVG(`rating`) AS avg FROM `movies_ratings` WHERE `movie_id` ='.$id;
    $params = [$id];
    return $req = $this->query($sql, $params, 'one');
  }
}