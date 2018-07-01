<div class="col-md-8 maincontent">

<div class="dropdown_menu">
  <ul id="dropdown">
    <li><a href="#">Choisissez un genre</a>
      <ul>
        <li><a href="#drama">Drame</a></li>
        <li><a href="#romantic">Comédie romantique</a></li>
        <li><a href="#dramaticcomedy">Comédie dramatique</a></li>
        <li><a href="#comedy">Comédie</a></li>
        <li><a href="#thriller">Thriller</a></li>
        <li><a href="#noir">Film noir</a></li>
        <li><a href="#polar">Polar</a></li>
        <li><a href="#adventure">Aventure</a></li>
        <li><a href="#horror">Horreur</a></li>
        <li><a href="#western">Western</a></li>
        <li><a href="#fantastic">Fantastique</a></li>
        <li><a href="#scifi">Science-fiction</a></li>
        <li><a href="#historic">Historique</a></li>
        <li><a href="#document">Documentaire</a></li>
      </ul>
    </li>
  </ul>
</div>

<script>$(document).ready(function(){
  $('.menu li').hover(function(){
    $('ul').slideDown();
  }, function(){
    $('ul').slideUp();
  });
</script> 

      <div id="drama">
        <?php foreach ($drama as $sad) : ?>
            <a href="index.php?p=single&id=<?= $sad->id ?>"><img src="<?= $sad->image ?>" class="thumbnailPost"><p><?= $sad->title ?></p></a>    
        <?php endforeach; ?>
      </div><br>
      <hr>

      <div id="romantic">
        <?php foreach ($romcom as $tears) : ?>
            <a href="index.php?p=single&id=<?= $tears->id ?>"><img src="<?= $tears->image ?>" class="thumbnailPost"><p><?= $tears->title ?></p></a>    
        <?php endforeach; ?>
      </div><br>
      <hr>

      <div id="dramaticcomedy">
        <?php foreach ($dramatic as $sadlaughs) : ?>
            <a href="index.php?p=single&id=<?= $sadlaughs->id ?>"><img src="<?= $sadlaughs->image ?>" class="thumbnailPost"><p><?= $sadlaughs->title ?></p></a>    
        <?php endforeach; ?>
      </div><br>
      <hr>

      <div id="comedy">
        <?php foreach ($comedies as $laughs) : ?>
            <a href="index.php?p=single&id=<?= $laughs->id ?>"><img src="<?= $laughs->image ?>" class="thumbnailPost"><p><?= $laughs->title ?></p></a>    
        <?php endforeach; ?>
      </div><br>
      <hr>

      <div id="thriller">
        <?php foreach ($thrill as $excitement) : ?>
            <a href="index.php?p=single&id=<?= $excitement->id ?>"><img src="<?= $excitement->image ?>" class="thumbnailPost"><p><?= $excitement->title ?></p></a>    
        <?php endforeach; ?>
      </div><br>
      <hr>

      <div id="noir">
        <?php foreach ($mystery as $suspense) : ?>
            <a href="index.php?p=single&id=<?= $suspense->id ?>"><img src="<?= $suspense->image ?>" class="thumbnailPost"><p><?= $suspense->title ?></p></a>    
        <?php endforeach; ?>
      </div><br>
      <hr>

      <div id="polar">
        <?php foreach ($cop as $sherlock) : ?>
            <a href="index.php?p=single&id=<?= $sherlock->id ?>"><img src="<?= $sherlock->image ?>" class="thumbnailPost"><p><?= $sherlock->title ?></p></a>    
        <?php endforeach; ?>
      </div><br>
      <hr>

      <div id="adventure">
        <?php foreach ($indiana as $jones) : ?>
            <a href="index.php?p=single&id=<?= $jones->id ?>"><img src="<?= $jones->image ?>" class="thumbnailPost"><p><?= $jones->title ?></p></a>    
        <?php endforeach; ?>
      </div><br>
      <hr>

      <div id="horror">
        <?php foreach ($horror as $fear) : ?>
            <a href="index.php?p=single&id=<?= $fear->id ?>"><img src="<?= $fear->image ?>" class="thumbnailPost"><p><?= $fear->title ?></p></a>    
        <?php endforeach; ?>
      </div><br>
      <hr>

      <div id="western">
        <?php foreach ($farwest as $wayne) : ?>
            <a href="index.php?p=single&id=<?= $wayne->id ?>"><img src="<?= $wayne->image ?>" class="thumbnailPost"><p><?= $wayne->title ?></p></a>    
        <?php endforeach; ?>
      </div><br>
      <hr>

        <div id="fantastic">
        <?php foreach ($strange as $wells) : ?>
            <a href="index.php?p=single&id=<?= $wells->id ?>"><img src="<?= $wells->image ?>" class="thumbnailPost"><p><?= $wells->title ?></p></a>    
        <?php endforeach; ?>
      </div><br>
      <hr>

        <div id="scifi">
        <?php foreach ($sf as $sci_fi) : ?>
            <a href="index.php?p=single&id=<?= $sci_fi->id ?>"><img src="<?= $sci_fi->image ?>" class="thumbnailPost"><p><?= $sci_fi->title ?></p></a>    
        <?php endforeach; ?>
      </div><br>
      <hr>

        <div id="historic">
        <?php foreach ($hist as $history) : ?>
            <a href="index.php?p=single&id=<?= $history->id ?>"><img src="<?= $history->image ?>" class="thumbnailPost"><p><?= $history->title ?></p></a>    
        <?php endforeach; ?>
      </div><br>
      <hr>

      <div id="document">
        <?php foreach ($documentary as $inform) : ?>
            <a href="index.php?p=single&id=<?= $inform->id ?>"><img src="<?= $inform->image ?>" class="thumbnailPost"><p><?= $inform->title ?></p></a>    
        <?php endforeach; ?>
      </div><br>
      <hr>

</div>

    <aside class="col-md-4 sidebar sidebar-right">
      <h2 id="lastmovies">Les derniers films ajoutés</h2><br>
      <div id="slider">
        <?php foreach ($films as $slide) : ?>

        <div class="slides">
            <a id="slide" href="index.php?p=single&id=<?= $slide->id ?>"><img src="<?= $slide->image ?>" class="thumbnailPost"><p><?= $slide->title ?></p></a>
            <p><?= $slide->genre ?></p>
        </div>      
        <?php endforeach; ?>
      </div><br>
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


