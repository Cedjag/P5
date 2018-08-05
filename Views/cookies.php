<?php ob_start(); ?>
<div class="container" style="height:600px; padding:35px";>
	<h1>Disclaimer cookies </h1>
	<p>En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de Cookies qui nous permettent uniquement d'assurer le fonctionnement de notation des films du site en enregistrant sur votre ordinateur les notes que vous attribuez aux films.</p>
</div>

<?php $contenu = ob_get_clean(); ?>
<?php require 'admin/gabarit.php'; ?>