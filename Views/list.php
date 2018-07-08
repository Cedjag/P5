<div class="single mb-5 mt-5">
  <div class="container">
  <table id="movie_list">

    <thead>
    <tr>
      <th data-sort="string">Titre <i class="fa fa-sort"></i></th>
      <th data-sort="string">Genre <i class="fa fa-sort"></i></th>
      <th data-sort="string">Date de sortie <i class="fa fa-sort"></i></th>
      <th data-sort="string">Poster <i class="fa fa-sort"></i></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($movie->getMovies() as $m) { ?>
    
      <tr>
      <td id="a"><a href="?p=single&id=<?php echo $m['id']; ?>" class="card-link"><?php echo $m['title']; ?></a></td>
      <td id="b"><?php echo $m['genres']; ?></td>
      <td id="a"><?php echo $m['release_date']; ?></td>
      <td id="b"><img class="img-thumbnail img-fluid" src="<?php echo $movie->getPosterPath($m['poster_path'], false, 92, 138); ?>" alt="<?php echo $m['title']; ?>"></td>
      </tr>

    <?php } ?>
    </tbody>
  </table>
    <script>
      $(document).ready(function($) { 
      $("#movie_list").stupidtable();
      }); 
    </script>
  </div>
</div>