<div class="container">
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
    <div class="sidebar col-md-3 offset-md-1">
      <div class="">
        <h4 class="mb-3">Les films les plus populaires</h4>
        <hr>
        <div class="row">
          <?php foreach($movie->getPopularMovies(4) as $m) { ?>
            <div class="col-lg-6 col-md-12">
              <div class="mx-auto mb-3">
                <a href="?p=single&id=<?php echo $m['id']; ?>" class="card-link">
                  <img class="img-thumbnail img-fluid" src="<?php echo $movie->getPosterPath($m['poster_path'], false, 92, 138); ?>" alt="<?php echo $m['title']; ?>">
                </a>
              </div>
            </div>
          <?php } ?>
        </div>
        <h4 class="mb-3">Les derniers films ajoutés</h4>
        <hr>
        <div class="row">
          <?php foreach($movie->lastMovies(4) as $l) { ?>
            <div class="col-lg-6 col-md-12">
              <div class="mx-auto mb-3">
                <a href="?p=single&id=<?php echo $l['id']; ?>" class="card-link">
                  <img class="img-thumbnail img-fluid" src="<?php echo $movie->getPosterPath($l['poster_path'], false, 92, 138); ?>" alt="<?php echo $l['title']; ?>">
                </a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>