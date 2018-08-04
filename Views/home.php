<?php ob_start(); ?>
<div class="container">
  <div class="row mt-5 mb-5">
    <div class="row justify-content-start">
      <div class="">
        <h4 class="mb-3"><img title="5 stars" src="public/assets/img/stars.png" alt="stars">Les films les mieux notés<img src="public/assets/img/stars.png" alt="stars"></h4>

        <hr>
        <div class="row">
          <?php foreach($movie->getBestMovies(7) as $b) { ?>
              <div class="mx-auto mb-3">
                <div>
                  <a href="?p=single&id=<?php echo $b['id']; ?>" class="card-link">
                  <img class="img-thumbnail img-fluid" title="<?php echo $b['title']; ?>" src="<?php echo $movie->getPosterPath($b['poster_path'], false, 92, 138); ?>" alt="<?php echo $b['title']; ?>">
                </a>
                </div>
              </div>
          <?php } ?>
      </div>
    </div>
  </div>  
  <div class="col-md-3">
      <img id="charlot" src="public/assets/img/charlot.png" alt="Charlot silhouette">
  </div>

    <div class="col-md-7">
      <h4 class="mb-3"><img title="filmstripfilmstrip" src="public/assets/img/filmstrip.png" alt="filmstrip">Les derniers films ajoutés<img src="public/assets/img/filmstrip.png" alt="filmstrip"></h4>
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
    <div class="sidebar col-md-3">
      <div class="">
        <h4 class="mb-3"><img title="red button" src="public/assets/img/popular.png" alt="hal">Les films les plus populaires<img src="public/assets/img/popular.png" alt="hal"></h4>
        <hr>
        <div class="row">
          <?php foreach($movie->getPopularMovies(12) as $m) { ?>
            <div class="col-lg-6 col-md-12">
              <div class="mx-auto mb-3">
                <a href="?p=single&id=<?php echo $m['id']; ?>" class="card-link">
                  <img class="img-thumbnail img-fluid" title="<?php echo $m['title']; ?>" src="<?php echo $movie->getPosterPath($m['poster_path'], false, 92, 138); ?>" alt="<?php echo $m['title']; ?>">
                </a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
        <hr>
    </div>
  </div>
</div>
<?php $contenu = ob_get_clean(); ?>
<?php require 'admin/gabarit.php'; ?>