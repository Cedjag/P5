<div class="single mb-5 mt-5" data-id="<?php echo $movie['id']; ?>">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-4">
        <img src="<?php echo $poster; ?>" alt="<?php echo $movie['title']; ?>">
      </div>
      <div class="col-md-8">
        <h2><?php echo $movie['title'] ?></h2>
        <div class="rating mb-5">
          <?php 
            $j = 0;
            for ($i = 0; $i < 5; $i++) {
              if ((int) $rating['avg'] >= $i + 1) {  
                $j++;
              } else {
          ?>
            <i class="fas fa-star"></i>
          <?php } }?> 
          <?php for ($i = 0; $i < $j; $i++) { ?>
            <i class="fas fa-star checked"></i>
          <?php } ?>
        </div>
        <h4>Synopsis</h4>
        <p class="lead"><?php echo $movie['overview']; ?></p>
        <h5>Date de sortie</h5>
        <p><?php echo $movie['release_date']; ?></p>
        <h5>Genres</h5>
        <p><?php echo $movie['genres']; ?></p>
      </div>
    </div>
    <h4 class="mb-3">Tête d'affiche</h4>
    <div class="row mb-5">
      <?php foreach ($cast->getCasts($movie['movie_id'], 5) as $c) { ?>
        <div class="col-md-2">
          <div class="card">
            <img class="card-img-top" src="<?php echo $cast->getProfilePath($c['profile_path']); ?>" alt="<?php echo $c['name']; ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $c['name']; ?></h5>
              <p class="card-text"><?php echo $c['character']; ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <h4 class="mb-3">Video</h4>
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="video-wrapper">
          <iframe src="<?php echo $movie['video']; ?>" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
        <hr>

        <!-- SECTION Critiques -->

      <div class="Sectioncommentaires" id="commentaires">
        <?php foreach($critics as $critic): ?>
            <?php require('comments.php'); ?>
        <?php endforeach; ?>
      </div>
      <hr>
      <div class="row">
        <div class="col-lg-12">
          <div id="form-comment" class=" panel panel-default formComment">
            <div class="panel panel-heading">
              <h4>Poster une critique : </h4>
              <a href="#"><span class="return"></span></a>
            </div>
            <div class="panel panel-body">
              <form method="post"  class="form-group form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="nom">Nom: </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nom" placeholder="Votre nom..." name="nom">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="content">Commentaire :</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" id="content" placeholder="Votre commentaire" name="content"></textarea>
                  </div>
                </div>
                <p class="text-right"><button type="submit" class="btn btn-success">Commentez</button></p>
                <input type="hidden" name="parent_id" id="parent_id" value="0" >
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
