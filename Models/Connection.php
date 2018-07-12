<?php require_once 'ConfigDB.php';

class Connection {

  // Connection
  private function getBdd() {
    try {
      $bdd = ConfigDB::database();
      $pdo = new PDO("mysql:host={$bdd['host']}; dbname={$bdd['db_name']}", "{$bdd['username']}", "{$bdd['password']}");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
    return $pdo;
  }

  // Query
  public function query($sql, $params = array(), $fetch = null) {
    try {
      $req = self::getBdd()->prepare($sql);
      $req->execute($params);
      
      if ($fetch == 'one') {
        return $req->fetch();
      } else if ($fetch == 'all') {
        return $req->fetchAll();
      } else {
        return $req;
      }
      
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }
}
