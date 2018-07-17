<div class="account">
  <div class="container">
    <div class="row row-account"><a href="index.php?p=dashboard" class="btn btn-primary" id="backbutton">Retour</a>
      <h1>Modifier les informations d'identification</h1><br>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel panel-body">
            <form method="post" class="form-group">
              <div class="form-group">
                <input type="text" name="identifiant" placeholder="Nouvel identifiant..." class="form-control">
              </div>
              <div class="form-group">
                <input type="password" name="password" placeholder="Nouveau mot de passe..." class="form-control">
              </div>
              <div class="form-group">
                <input type="password" name="password2" placeholder="Retaper mot de passe..." class="form-control">
              </div>
              <div class="form-group">
                <button type="submit" name="new" class="btn btn-primary">Valider</button>
              </div>
            </form>
            <?= $msg ?>
          </div>
        </div>
      </div>
      <br>
      <br>
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel panel-heading">
            À propos du site
          </div><br>
          <div class="panel panel-body">
            <form method="post" class="form-group">
              <div class="form-group">
                <textarea id="about" name="aboutContent" class="form-control"><?php echo $info_['about'] ?></textarea>
                <br>
              </div>
              <div class="form-group">
                <button type="submit" name="setAbout" class="btn btn-primary">Valider</button>
              </div>
            </form>
          </div>
        </div>
      </div>

  </div>
</div>
