<?php
require_once 'Model.php';

class Movies extends Connection{


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
}
