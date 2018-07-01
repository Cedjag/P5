<div class="col-md-8 maincontent">
  <div class="row mt-5 mb-5">
    <div class="col-md-8">
      <div class="row">
        <?php foreach($movie->getMovies() as $m) { ?>
          <div class="col-lg-4 col-md-6">
            <div class="card mb-3">
              <div class="card-body mx-auto">
                <a href="?p=single&id=<?php echo $m['id']; ?>" class="card-link">
                  <img class="img-fluid" src="<?php echo $movie->getPosterPath($m['poster_path'], false, 185, 278); ?>" alt="<?php echo $m['title']; ?>">
                  <h5 class="card-title text-center mt-3 text-dark"><?php echo $m['title']; ?></h5>
                </a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
</div>

    <aside class="col-md-4 sidebar sidebar-right">
      <h2 id="lastmovies">Les derniers films ajoutés</h2><br>
        <div id="slider">
          <?php foreach ($films as $slide) : ?>
            <div class="slides">
              <a id="slide" href="index.php?p=single&id=<?= $slide->id ?>"><img src="<?= $slide->image ?>" class="thumbnailPost"><p><?= $slide->title ?></p></a>
            </div>      
          <?php endforeach; ?>
        </div>
    </aside>