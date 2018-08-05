<?php ob_start(); ?>
<div class="update mt-5 mb-5">
  <div class="container">
    <h2>Modifier <?php echo $movie['title']; ?></h2>
    <hr>
    <div class="mt-5">
      <?php if (sizeof($msg) > 0) { ?>
        <div class="alert alert-info">
          <ul style="list-style: none; margin: 0; padding: 0;">
            <?php foreach($msg as $m): ?>
              <li class="movie_updated"><?php echo $m; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php } ?>
      <form method="post">
        <div class="form-group">
          <label>Titre</label>
          <input type="text" name="video" value="<?php echo $movie['title']; ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label>Synopsis</label>
          <textarea class="form-control" name="overview" readonly><?php echo $movie['overview']; ?></textarea>
        </div>
        <div class="form-group">
          <label>Genre</label>
          <input type="text" name="genre" value="<?php echo $movie['genres']; ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label>Video</label>
          <input type="text" name="video" value="<?php echo $movie['video']; ?>" class="form-control" placeholder="Video Link">
        </div>
        <div class="form-group">
          <label>Date de sortie</label>
          <input type="date" name="release" value="<?php echo $movie['release_date']; ?>" class="form-control" placeholder="Video Link">
        </div>
        <div class="form-group">
          <button type="submit" name="update" class="btn btn-success" value="">Mettre à jour</button>
          <a href="index.php?p=dashboard" class="btn btn-primary">Retour</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>