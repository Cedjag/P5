  <div class="dashboard">
  <div class="container">
    <h1><i class="fa fa-tachometer"></i> Tableau de bord.
      <small>-</small> <a href="index.php?p=logout"><button type="button" class="btn btn-danger">Déconnexion</button></a>
    </h1><hr>
    <div class="row">
      <div class="col-md-2">
        <p><a href="index.php?p=create"><button type="button" class="btn btn-primary">Nouveau film</button></a></p>
        <p><a href="index.php?p=account"><button type="button" class="btn btn-default">Mon compte</button></a></p>
      </div>
      <div class="col-md-10">
        <form method="post">
          <table class="table">
            <tr>
              <th>Poster</th>
              <th>Titre</th>
              <th>Genres</th>
              <th>Editer</th>
              <th>Supprimer</th>
            </tr>
            <?php foreach($movie->getMovies() as $m) { ?>
            <tr class="table table-hover">
                <td><img src="<?php echo $movie->getPosterPath($m['poster_path'], false, 92, 138); ?>" alt="<?php echo $m['title']; ?>" /></td>
                <td><?php echo $m['title']; ?></td>
                <td><?php echo $m['genres']; ?></td>
                <td><a href="index.php?p=update&id=<?php echo $m['id']; ?>"><button type="button" class="btn btn-warning">Edit</button></a></td>
                <td><a href="index.php?p=delete&id=<?php echo $m['id']; ?>"><button onclick="return confirmDelete()" type="button" class="btn btn-danger">Delete</button></a></td>
            </tr>
            <?php } ?>
          </table>
        </form>
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
                    <div class="panel panel-heading">
                      <div class="panel-title">
                        Gestion des critiques signalées
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
                        <?php foreach ($comment as $comment) : ?>
                          <tr>
                            <td><?= $comment->auteur ?></td>
                            <td><?= $comment->date ?></td>
                            <td><?= $comment->contenu ?></td>
                            <td>
                              <form method="post">
                                <button type="submit" name="trash" class="btn btn-danger" value="<?= $comment->id_article ?>"><span class="glyphicon glyphicon-trash"></span></button>
                                <input type="hidden" name="idDEL" value="<?= $comment->id ?>">
                                <button type="submit" name="ok" class="btn btn-primary" value="<?= $comment->id_article ?>"><span class="glyphicon glyphicon-ok"></span></button>
                                <input type="hidden" name="idOK" value="<?= $comment->id ?>">
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
