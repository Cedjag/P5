<?php
require_once 'Connection.php';

class Casts extends Connection {

  // Get Poster Path
  public function getProfilePath($path, $width = 138, $height = 175) {
    return 'https://image.tmdb.org/t/p/w'.$width.'_and_h'.$height.'_face'.$path;
  }

  //Get casts
  public function getCasts($id, $offset = null) {
    $sql = 'SELECT c.id, c.name, c.character, c.profile_path FROM cast AS c, movies AS m, movies_casts AS mc ';
    $sql .= 'WHERE c.cast_id = mc.cast_id AND m.movie_id = mc.movie_id AND m.movie_id ='.$id.' ORDER BY c.order ASC';
    if ($offset) $sql .= ' LIMIT '.$offset;
    return $req = $this->query($sql, null, 'all');
  }

  //Add cast
  public function addCast($cast, $callback) {
    $sql = 'INSERT INTO `cast` (`cast_id`, `order`, `name`, `character`, `profile_path`) VALUES (?, ?, ?, ?, ?)';
    $params = [$cast['id'], $cast['order'], $cast['name'], $cast['character'], $cast['profile_path']];
    $this->query($sql, $params);
    $callback($cast['id']);
  }

  //check if a cast exists
  public function isCastExists($id) {
    $sql = "SELECT * FROM `cast` WHERE `cast_id` = '$id'";
    $params = [$id];
    $req = $this->query($sql, $params, 'one');

    if (!$req) return false;
    else return true;
  }
}