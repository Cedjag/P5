<?php ob_start(); ?>
<div class="single mb-5 mt-5" data-id="<?php echo $movie['id']; ?>">
  <?= $msg ?>
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-4">
        <img src="<?php echo $poster; ?>" alt="<?php echo $movie['title']; ?>">
      </div>
      <div class="col-md-8" id="filmreel">
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
        <ul>
          <li><a href="#watchvideo">Regarder le film</a></li>
          <li><a href="#comments">Ecrire une critique</a></li>
        </ul>
        <h4>Synopsis</h4>
        <hr>
        <p class="lead"><?php echo $movie['overview']; ?></p>
        <hr>
        <div id="date_genre">
          <p><span>Date de sortie : </span><?php echo $movie['release_date']; ?></p>
          <p><span>Genre(s) : </span><?php echo $movie['genres']; ?></p>
        </div>
      </div>
    </div>
    <h4 class="mb-3">Casting</h4>
    <hr>
    <div class="row mb-5">
      <?php foreach ($cast->getCasts($movie['movie_id'], 6) as $c) { ?>
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
    <h4 class="mb-3" id="watchmovie"><img class="img-fluid" title="camera" src="public/assets/img/camera.png" alt="old camera"></h4>
    <hr>
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="video-wrapper" id="watchvideo">
          <iframe src="<?php echo $movie['video']; ?>" frameborder="0" allowfullscreen></iframe>
        </div>
          <div id="share-buttons">
            <?php $currentPage=$_SERVER['PHP_SELF']; ?>
        <!-- Facebook -->
            <a href="http://www.facebook.com/sharer.php?u=<?php $currentPage ?>" target="_blank">
                <img src="public/assets/img/facebook.png" alt="Facebook">
            </a>            
            <!-- Pinterest -->
            <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
                <img src="public/assets/img/pinterest.png" alt="Pinterest">
            </a>

             <!-- Twitter -->
            <a href="https://twitter.com/share?url=<?php $currentPage ?>" target="_blank">
                <img src="public/assets/img/twitter.png" alt="Twitter">
            </a>   
        </div>
      </div>
    </div>


        <hr>

        <!-- SECTION Critiques -->

      <div class="sectioncomments" id="comments">
        <?php foreach($critics as $critic): ?>
            <?php require('comments.php'); ?>
        <?php endforeach; ?>
      </div>
      <hr>
      <div class="row">
        <div class="col-lg-12">
          <div id="form-comment" class=" panel panel-default formComment">
            <div class="panel panel-heading">
              <h4>Poster une critique</h4>
              <br>
              <a href="#"><span class="return"></span></a>
            </div>
            <div class="panel panel-body">
              <form method="post"  class="form-group form-horizontal">
                <div class="form-group">
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nom" placeholder="Votre nom..." name="nom">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-9">
                    <textarea class="form-control" id="content" placeholder="Votre critique..." name="content"></textarea>
                  </div>
                </div>
                <p class="text-right"><button type="submit" class="btn btn-success">Publier</button></p>
                <input type="hidden" name="parent_id" id="parent_id" value="0" >
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
<?php $contenu = ob_get_clean(); ?>
<?php require 'admin/gabarit.php'; ?>