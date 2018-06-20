    <div class="container container-single">

      <div class="numeroEpisode">
        <h1><?= $req->title ?></h1>
      </div>

      <div class="single">
        <div class="singleContent">
          <iframe  width="1200" height="600" src="<?= $req->video ?>" frameborder="0" allowfullscreen></iframe>
        </div>

<!--Counter-->

      <div id="counter">
        <p>Cette page a été vue fois.</p>
      </div><br>

      <div id="movie_info">
        <div>
          <img src="<?= $req->image ?>" alt="image illustration film" class="thumbnailPost">
        </div><br>
        <ul>
          <li>Casting : </li>
          <li>Année de sortie : </li>
          <li>Synopsis : </li>
        </ul>

      </div>

        <hr>

        <!-- SECTION Critiques -->
        <h3>Critiques :</h3><br>

      </div>
    </div>
