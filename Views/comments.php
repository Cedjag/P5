<div id="comment-<?= $critic['id'] ?>">
  <p>
    <b><?= $critic['author'] ?></b>
    <span class="text-muted">le <?= $critic['date'] ?></span>
  </p>
  <div class="blockquote">
    <blockquote>
      <?= htmlentities($critic['content']) ?>
    </blockquote>
  </div>
  <div class="formulaire">
    <form class="form-group"  method="post">
      <p class="text-left">
        <input type="hidden" name="value" value="<?= $critic['id_movie'] ?>">
        <input type="hidden" name="idval" value="<?= $critic['id'] ?>">
        <button type="submit" name="report" class="btn btn-default"><i class="fas fa-bolt"></i></span></button>
      </p>
    </form>
  </div>
</div>