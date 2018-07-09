  <div class="container" id="login_page">
    <div class="admin">

      <form method="post" class="form-group">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
          <input type="text" name="identifiant" placeholder="Identifiant" class="form-control" aria-describedby="basic-addon1">
        </div><br>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
          <input type="password" name="password" placeholder="Mot de passe" class="form-control" aria-describedby="basic-addon1">
        </div><br>
        <input class="btn btn-success" type="submit" name="submit"></input>
      </form>
      <p><?php echo $error ?></p>
    </div>
  </div>
