<?php ob_start(); ?>
<div class="container" style="height:800px; padding:35px;">
    <a href="index.php">Retour à l'accueil</a>
  <h1><b>Erreur 404 ! Cette page n'existe pas</b></h1>
</div>
<?php $contenu = ob_get_clean(); ?>
<?php require 'admin/gabarit.php'; ?>