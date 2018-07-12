<div class="container">
  <div class="row mt-5 mb-5">
    <div class="col-md-8">
      <h4 class="mb-3">Les derniers films ajoutés</h4>
      <hr>
      <div class="row">
          <?php foreach($movie->lastMovies(12) as $l) { ?>
          <div class="col-lg-4 col-md-6">
            <div class="card mb-3">
              <figure>
                <a href="?p=single&id=<?php echo $l['id']; ?>" class="card-link">
                  <img class="img-thumbnail img-fluid" src="<?php echo $movie->getPosterPath($l['poster_path'], false, 185, 278); ?>" alt="<?php echo $l['title']; ?>">
                </a>
                  <figcaption>
                      <p><?php echo $l['title'] ?></p>
                      <p><?php echo $l['genres'] ?></p>
                      <div></div>
                  </figcaption>
              </figure>
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
          <?php foreach($movie->getPopularMovies(10) as $m) { ?>
            <div class="col-lg-6 col-md-12">
              <div class="mx-auto mb-3">
                <a href="?p=single&id=<?php echo $m['id']; ?>" class="card-link">
                  <img class="img-thumbnail img-fluid" src="<?php echo $movie->getPosterPath($m['poster_path'], false, 92, 138); ?>" alt="<?php echo $m['title']; ?>">
                </a>
              </div>
            </div>
          <?php } ?>
        </div>
        <hr>
      </div>
    </div>
  </div>
</div>