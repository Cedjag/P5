<?php
require_once 'Config/Config.php';
class Connection {

  //Permet de créer la connexion à la base de donnée MySQL.

  private function getBdd()
  {
    $bdd = ConfigDB::database();
    $pdo = new PDO("mysql:host={$bdd['host']};dbname={$bdd['db_name']};charset=utf8",
                  "{$bdd['username']}", "{$bdd['password']}", array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                  ));

    return $pdo;

  }

  //exécute une requête de type query

  public function query($sql, $only = false)
  {

    $req = self::getBdd()->query($sql);
    if ($only == true) {
      return $req->fetch();
    }
    elseif ($only != true && $req->rowCount() == null) {
      return $req;
    }
    else {
      return $req->fetchAll();
    }
  }

  //Requête de type prepare

  public function prepare($sql, $params = null, $fetch = null)
  {

    if ($params == null) {
      $req = self::getBdd()->prepare($sql);
      $req->execute();
      return $req->fetchAll();
    }

    $query = self::getBdd()->prepare($sql);
    $req = $query->execute($params);
    if ($fetch == 'all') {
       $req = $query->fetchAll();
    }
    elseif ($fetch == 'one') {
       $req = $query->fetch();
    }
    return $req;
  }


}
