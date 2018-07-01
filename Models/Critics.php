<?php
require_once 'Connection.php';

class Critics extends Connection{


  //Récupère les critiques selon l'id de l'article.

  public function findAllById($post_id) {
      $sql = "SELECT *, DATE_FORMAT(date, '%d/%m/%Y à %H:%i') AS date
              FROM critics
              WHERE id_movie = ?";
      $params = [$post_id];
      $critics = $this->prepare($sql,$params,'all');
      $critics_by_id = [];
      foreach ($critics as $critic) {
          $critics_by_id[$critic->id] = $critic;
      }
      return $critics_by_id;
  }


  //Récupèrer les critiques qui ont des enfants.

  public function findAllWithChildren($post_id, $unset_children = true) {

    $critics = $critics_by_id = $this->findAllById($post_id);
    foreach ($critics as $id => $critic) {
        if ($critic->parent_id != 0) {
            $critics_by_id[$critic->parent_id]->children[] = $critic;
            if ($unset_children) {
                unset($critics[$id]);
            }
        }
    }
    return $critics;
  }


  //récupèrer une critique signalée.

  public function findCritics() {

    $sql = "SELECT *,DATE_FORMAT(date, '%d/%m/%Y à %H:%i') AS date FROM critics WHERE report=1";
    $req = $this->prepare($sql);
    return $req;
   }

   public function noCritic() {
     if ($this->findCritics() == false) {
        $msg = '<div class="alert alert-warning">Il n\'y a pas de critiques signalées.</div>';
        return $msg;
     }
   }


   //insérer une critique.
   public function insertCritic(){

      if(isset($_POST['content']) && !empty($_POST['content'])){

        $parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : 0;
        $depth = 0;

        if ($parent_id != 0){

          $sql = 'SELECT id, depth  FROM critics WHERE  id = ?';
          $params = [$parent_id];
          $critic = $this->prepare($sql,$params, 'one');
          if ($critic == false) {
            throw new Exception("Ce parent n'existe pas");
          }
          $depth = $critic->depth + 1;
        }
         if ($depth >= 3) {
           echo "Impossible de rajouter un commentaires";
         }
         else {
           $sql = 'INSERT INTO critics SET content = ?, author = ?, id_movie = ?, parent_id = ?, date = NOW(), depth = ?';
           $params = array($_POST['content'], $_POST['nom'], $_GET['id'], $parent_id, $depth);
           $req = $this->prepare($sql,$params);
         }
       }
   }



   //signaler une critique

   public function reportCritic() {
     if (isset($_POST['report'])) {
       $value = $_POST['valeur'];
       $id = $_POST['idval'];
       $sql = 'UPDATE critics SET report = 1 WHERE id_movie =? AND id=?';
       $params = [$value, $id];
       $this->prepare($sql, $params);
       $msg = '<div class="alert alert-warning alert-signal">La critique a été signalée.</div>';
       return $msg;
     }
   }


   //fonction qui permet d'approuver une critique signalée.

   public function appCritic() {
     if (isset($_POST['ok'])) {
       $idFilm = $_POST['ok'];
       $idCritic = $_POST['idOK'];
       $sql = 'UPDATE critics SET report = 0 WHERE id_movie=? AND id=?';
       $params = [$idFilm, $idCritic];
       $this->prepare($sql, $params);
       header('Location:index.php?p=dashboard');
     }
   }

   //Fonction qui permet de supprimer une critique signalée.

   public function deleteCritic() {
     if (isset($_POST['trash'])) {
       $idFilm = $_POST['trash'];
       $idCritic = $_POST['idDEL'];
      $sql ='DELETE FROM critics WHERE id=? AND id_movie=?';
      $params = [$idCritic,$idFilm];
      $this->prepare($sql, $params);
      header('Location:index.php?p=dashboard');
     }
   }

}