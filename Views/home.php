<div class="col-md-8 maincontent">
  <h2 id="lastmovies">Les derniers films ajoutés</h2><br>
<div class="slider">
  <?php foreach ($films as $slide) : ?>

  <div class="slides">
      <a id="slide" href="index.php?p=single&id=<?= $slide->id ?>"><img src="<?= $slide->image ?>" class="thumbnailPost"><p><?= $slide->title ?></p></a>
  </div>      
  <?php endforeach; ?>
</div>
      <img class="prev" src="public/img/prev.png" alt="bouton prev">
      <img class="next" src="public/img/next.png" alt="bouton next">
</div>

    <aside class="col-md-4 sidebar sidebar-right">

      <div class="row widget">
        <div class="col-xs-12">
          <h4>Les films les mieux notés</h4>
          </div>
      </div>
      <div class="row widget">
        <div class="col-xs-12">
          <h4>Les films les plus populaires</h4>
        </div>
      </div>
    </aside>

    <div class="container">
      <div class="about">
        <div class="row">
          <div class="col-md-8">
            <h3>À propos du Coin du cinéphile</h3>


