<?php ob_start(); ?>
<div id="comment-<?= $critic['id'] ?>">
  <p>
    <b><?= htmlentities($critic['author']) ?></b>
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
        <input type="hidden" name="valeur" value="<?= $critic['id_movie'] ?>">
        <input type="hidden" name="idval" value="<?= $critic['id'] ?>">
        <button type="submit" name="signal" class="btn btn-default"><i class="fas fa-bolt"></i></span></button>
      </p>
    </form>
  </div>
</div>
<?php $contenu = ob_get_clean(); ?>
<?php require 'admin/gabarit.php'; ?>