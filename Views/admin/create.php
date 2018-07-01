  <div class="container container-single">
    <div class="breadcrumb">
      <a href="index.php?p=dashboard"> << Retour au tableau de bord.</a>
    </div>
    <h1><span class="glyphicon glyphicon-pencil"></span> Ajouter un film  <hr></h1>
      <div class="row">
        <form method="post" enctype="multipart/form-data">
        <div class="col-md-10">
          <div class="form-group">
            <input type="text" name="title" placeholder="Saissisez le titre..." class="form-control">
          </div>
          <div class="form-group">
            <b style="color:blue">Image d'illustration du chapitre :</b> <input type="file" name="miniature">
          </div>
          <div class="form-group">
            <input type="text" name="video" placeholder="Saisissez le lien de la vidéo..." class="form-control">
          </div>
          <div class="form-group">
            <input type="text" name="genre" placeholder="Saisissez le genre du film..." class="form-control">
          </div>
          <div class="form-group">
            <input type="text" name="version" placeholder="Saisissez la version du film (vost, vf...)..." class="form-control">
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <input type="submit" name="submit" value="Publier" class="btn btn-success">
          </div>
        </div>
      </form>
      </div>

  </div>
