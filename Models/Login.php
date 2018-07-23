<?php
require_once 'Connection.php';

class Login extends Connection{

  public $p;

  //valide ou non la connexion à l'espace admin.

  public function Log()
  {

    if (isset($_POST['submit'])) {

      $userid = htmlspecialchars(trim($_POST['identifiant']));
      $password = htmlspecialchars(sha1($_POST['password']));
      $errors = [];

      if (empty($userid) || empty($password)) {
        $errors['empty'] = "Tout les champs doivent être remplis !";
      }
      elseif ($this->is_admin($userid, $password) == 0) {
        $errors['exist'] = "Cet administrateur n'existe pas.";
      }
      if (!empty($errors)) {

        foreach ($errors as $error) {
          $error = '<div class="alert alert-danger" role="alert">'. $error . '</div>';
        }
        return $error;
      }
      else {
        $_SESSION['admin'] = $userid;
        header('Location:index.php?p=dashboard');
      }
    }

  }

  //Exécute une requête qui vérifie si les données passées en paramètre existent dans la bdd

    public function is_admin($userid, $password){

        $sql = 'SELECT * from admin WHERE username = ? AND password = ?';
        $params = [$userid, $password];
        $req = $this->query($sql, $params,'one');
        return $req;
    }

    public function alreadyConnect(){

      if (isset($_SESSION['admin'])) {
        header('Location:index.php?p=dashboard');
      }
    }

    public function notLogin() {
      if ($this->p != 'login' && !isset($_SESSION['admin'])) {
        header('Location:index.php?p=login');
      }
    }

    public function newPass() {

      if (isset($_POST['new']) && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['identifiant'])) {
        $pwd1 = sha1($_POST['password']);
        $pwd2 = sha1($_POST['password2']);
        $userid = $_POST['identifiant'];
        if ($pwd1 == $pwd2) {
          $sql = "UPDATE admin SET username = '$userid', password = '$pwd2' WHERE id=1";
          $req = $this->query($sql);
          $msg = '<div class="alert alert-success" role="alert">L\'identifiant et le mot de passe ont bien été changés.</div>';
          return $msg;
        }
        else {
          $msg = '<div class="alert alert-danger" role="alert"> Les mots de passe doivent être identiques !</div>';
          return $msg;
        }
      }
      elseif(isset($_POST['new']) && empty($_POST['password']) && empty($_POST['password2']) && empty($_POST['identifiant'])) {
        $msg = '<div class="alert alert-danger" role="alert">Veuillez remplir tout les champs.</div>';
        return $msg;
      }
    }
}
