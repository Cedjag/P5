<div id="comment-<?= $critic->id ?>">
  <p>
    <b><?= $critic->author ?></b>
    <span class="text-muted">le <?= $critic->date ?></span>
  </p>
  <div class="blockquote">
    <blockquote>
      <?= htmlentities($critic->content) ?>
    </blockquote>
  </div>
  <div class="formulaire">
    <form class="form-group"  method="post">
      <p class="text-left">
        <input type="hidden" name="valeur" value="<?= $critic->id_movie ?>">
        <input type="hidden" name="idval" value="<?= $critic->id ?>">
        <?php if($critic->depth <= 1): ?>
          <button  type="button" class="reply btn btn-default" data-id="<?= $critic->id ?>"><span class="glyphicon glyphicon-share-alt"></span></button>
        <?php endif; ?>
        <button type="submit" name="signal" class="btn btn-default"><span class="glyphicon glyphicon-warning-sign"></span></button>
      </p>
    </form>
  </div>
</div>

<div style="margin-left: 50px;">
    <?php if(isset($critic->children)): ?>
        <?php foreach($critic->children as $critic): ?>
            <?php require('comments.php'); ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>