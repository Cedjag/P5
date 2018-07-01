    <div class="container container-single">

      <div class="single">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe width="1200" height="600" src="<?= $req->video ?>" frameborder="0" allowfullscreen></iframe>
        </div>

      <div class="movie_title">
        <h2><?= $req->title ?></h2>
      </div>

      <div id="movie_info">
        <div>
          <img src="<?= $req->image ?>" alt="image illustration film" class="thumbnailPost">
        </div><br>
        <ul>
          <li>Version : <?= $req->version ?></li>
          <li id="director">Metteur en scène : </li>
          <li id="cast">Casting : </li>
          <li id="year">Année de sortie : </li>
          <li id="story">Synopsis : </li>
        </ul>

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
