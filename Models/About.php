<?php
require_once 'Connection.php';

class About extends Connection{

  //Permet de récupèrer le contenu à propos

  public function getAbout($offset = null) {
    $sql = 'SELECT about FROM admin';
    if ($offset) $sql .= ' LIMIT '.$offset;
    return $this->query($sql, null, 'one');
  }


  //permet d'insérer le contenu de la section à propos.

  public function setAbout() {
    if (isset($_POST['setAbout']) && !empty($_POST['aboutContent'])) {
      $about = $_POST['aboutContent'];
      $sql = 'UPDATE admin SET about = ? WHERE id=1';
      $params = [$about];
      return $this->query($sql,$params);
    }
  }
}
