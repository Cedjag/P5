
  <div class="container update">
    <h2><i class="fa fa-pencil"></i> Modifier le chapitre :  <b><?=$post->title ?></b></h2>
    <form method="post" enctype="multipart/form-data">
      <div class="form-group admin-titre">
        <input type="text" name="titre" value="<?= $post->titre ?>" class="form-control">
      </div>
      <div class="form-group">
        <b style="color:green">Image d'illustration du chapitre :</b> <input type="file" name="illustration">
        <i>L'image d'illustration n'est pas obligatoire.</i>
      </div>
      <div class="form-group">
        <input type="text" name="titre" value="<?= $post->video ?>" class="form-control">
      </div>
      <div class="form-group">
      <div class="form-group">
        <input type="text" name="titre" value="<?= $post->genre ?>" class="form-control">
      </div>
      <div class="form-group">
        <button type="submit" name="update" class="btn btn-success" value="<?= $post->id ?>">Mettre à jour</button><br>
      </div>
    </form>
  </div>
