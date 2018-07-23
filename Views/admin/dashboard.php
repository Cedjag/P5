   <div class="dashboard">
    <div class="container">
      <h1><i class="fa fa-tachometer"></i> Tableau de bord
        <a href="index.php?p=logout"><button type="button" class="btn btn-danger">Déconnexion</button></a>
      </h1><hr>
      <div class="row">
        <div class="col-md-2">
          <p><a href="index.php?p=create"><button type="button" class="btn btn-primary">Ajouter un film</button></a></p>
          <p><a href="index.php?p=account"><button type="button" class="btn btn-default">Mon compte</button></a></p>
        </div>
        <div class="col-md-10">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active showPost" id="nav-item"><a class="nav-link" href="#">Films</a></li>
            <li role="presentation" class="showComments" id="nav-itemt"><a a class="nav-link" href="#">Critiques</a></li>
          </ul>
          <div class="gestionPanel">
            <div class="row">
              <div class="col-lg-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="panel-title" id="film_management">
                      <p>Gestion des films</p>
                    </div>
                    </div>
                    <div class="panel panel-body">
                    <div class="scroll">
                      <form method="post">
                          <table class="table">
                            <tr>
                              <th>Poster</th>
                              <th>Titre</th>
                              <th>Genres</th>
                              <th>Modifier</th>
                              <th>Supprimer</th>
                              </tr>
                              <?php foreach($movie->getMovies() as $m) { ?>
                              <tr class="table table-hover">
                                  <td><img src="<?php echo $movie->getPosterPath($m['poster_path'], false, 92, 138); ?>" alt="<?php echo $m['title']; ?>" /></td>
                                  <td><?php echo $m['title']; ?></td>
                                  <td><?php echo $m['genres']; ?></td>
                                  <td><a href="index.php?p=update&id=<?php echo $m['id']; ?>"><button type="button" class="btn btn-warning">Modifier</button></a></td>
                                  <td><a href="index.php?p=delete&id=<?php echo $m['id']; ?>"><button onclick="return confirmDelete()" type="button" class="btn btn-danger">Supprimer</button></a></td>
                              </tr>
                          <?php } ?>
                          </table>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

  <script>
    // Handle delete button
    function confirmDelete() {
      var confirm = window.confirm('Are you sure?');
      if (confirm) {
        return true;
      } else {
        return false;
      }
    }
  </script>

            <div id="badComments" class="noDisplay">
              <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-default">
                    <div class="panel panel-heading" id="reportcritic">                      
                      <div class="panel-title">
                        <p>Gestion des critiques signalées</p>
                      </div>
                    </div>
                    <div class="panel panel-body">
                      <table class="table">
                        <tr>
                          <th>Auteur</th>
                          <th>Date</th>
                          <th>Contenu</th>
                          <th>Action</th>
                        </tr>
                          <?php foreach ($comment as $comm) : ?>
                            <tr>
                              <td><?= $comm['author'] ?></td>
                              <td><?= $comm['date'] ?></td>
                              <td><?= $comm['content'] ?></td>
                              <td>
                                <form method="post">
                                  <button type="submit" name="trash" class="btn btn-danger" value="<?= $comm['id_movie'] ?>"><i class="fas fa-times"></i></button>
                                  <input type="hidden" name="idDEL" value="<?= $comm['id'] ?>">
                                  <button type="submit" name="ok" class="btn btn-primary" value="<?= $comm['id_movie'] ?>"><i class="fas fa-check"></i></button>
                                  <input type="hidden" name="idOK" value="<?= $comm['id'] ?>">
                                </form>
                              </td>
                              <td></td>
                            </tr>
                          <?php endforeach; ?>
                      </table>
                      <?= $msg ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>