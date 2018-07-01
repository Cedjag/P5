<?php
require_once 'Connection.php';

class About extends Connection{


  //Permet de récupèrer le contenu à propos

  public function getAbout() {
    $sql = 'SELECT about FROM admin';
    return $this->query($sql, true);
  }


  //permet d'insérer le contenu de la section à propos.

  public function setAbout() {
    if (isset($_POST['setAbout']) && !empty($_POST['aboutContent'])) {
      $about = $_POST['aboutContent'];
      $sql = 'UPDATE admin SET about = ? WHERE id=1';
      $params = [$about];
      return $this->prepare($sql,$params);
    }
  }
}
