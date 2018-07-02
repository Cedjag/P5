<div class="add mt-5 mb-5">
  <div class="container">
    <h1>Ajouter un film</h1>
    <hr>
    <div class="mt-5">
      <?php if (sizeof($msg) > 0) { ?>
        <div class="alert alert-info">
          <ul style="list-style: none; margin: 0; padding: 0;">
            <?php foreach ($msg as $m) { echo $m; } ?>
          </ul>
        </div>
      <?php } ?>
      <form method="post">
        <div class="form-group">
          <label>API ID's</label>
          <input class="form-control" type="text" name="ids" placeholder="1, 2, 3..." required />
        </div>
        <div class="form-group">
          <label>Liens des videos</label>
          <input class="form-control" type="text" name="links" placeholder="http://..." />
        </div>
        <button type="submit" name="create" class="btn btn-success">Ajouter</button>
        <a href="index.php?p=dashboard" class="btn btn-primary">Retour</a>
      </form>
    </div>
  </div>
</div>