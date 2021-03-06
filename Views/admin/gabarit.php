<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=yes">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/fontawesome.css">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="public/assets/css/jquery.cookiebar.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_style.min.css' rel='stylesheet' type='text/css' />
    <link rel="icon" href="public/assets/img/favicon.ico" />

    <title>Le coin du cinéphile</title>
  </head>
  <body>
    <!-- Header -->
    <header>
      <nav class="navbar navbar-expand-lg">
        <div class="container" id="navig">
          <img div="logoimg" src="public/assets/img/film1280.png" alt="logo site">
          <div id="logo">
            <a class="navbar-brand" id="title" href="index.php">Le coin du cinéphile</a>
            <p>Site de streaming légal et gratuit</p>
          </div>
          <div class="navbar navbar-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-5">              
              <li class="nav-item active">
                <a class="nav-link" id="admin" href="index.php?p=about_">Quésaco? <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="index.php?p=page&num=1">Tous les films<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="index.php?p=contact">Contact<span class="sr-only">(current)</span></a>
              </li>              
              <li class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Liens</button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="https://www.ebooksgratuits.com/" target="_blank">Ebooks gratuits</a>
                    <a href="www.inlibroveritas.net/" target="_blank">In Libro Veritas</a>
                    <a href="https://archive.org/" target="_blank">Les archives du net</a>
                    <a href="https://www.dogmazic.net/" target="_blank">Dogmazic</a>
                    <a href="http://www.openculture.com/" target="_blank">Open Culture (en anglais)</a>
                    <a href="https://www.rijksmuseum.nl/en/search?f=1&p=1&ps=12&imgonly=True&ii=0" target="_blank">Rijks Museum (Amsterdam)</a>
                    <a href="https://www.metmuseum.org/art/collection" target="_blank">Metropolitan Museum (New-York)</a>
                    <a href="http://search.getty.edu/gateway/landing" target="_blank">Getty (New-York)</a>
                    <a href="https://www.moma.org/" target="_blank">MOMA (New-York)</a>
                  </div>
              </li> 
              <li id="twitter">
                <a href="https://twitter.com/" target="_blank" ><img src="public/assets/img/twitter_small.png" alt="twitter"></a>
              </li> 
              <li id="fb">
               <a href="https://www.facebook.com/" target="_blank"><img src="public/assets/img/facebook_small.png" alt="facebook"></a></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
<div class="page-footer font-small blue pt-4">
  <p id="legal">© 2018 Cédric JAGER - Le coin du cinéphile - Projet personnel - formation Développeur web junior - OpenClassRooms</p>
	<div class="adminpanel">
		<a href="index.php?p=login">Espace d'administration</a>
	</div>
</div>

	<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
	<script src="public/assets/js/popper.min.js"></script>
	<script src="public/assets/js/bootstrap.min.js"></script>
	<script src="public/assets/js/js.cookie.js"></script>
	<script src="public/assets/js/notify.min.js"></script>
	<script src="public/assets/js/main.js"></script>
	<script src="public/assets/js/stupidtable.min.js"></script>
	<script src="public/assets/js/list.js"></script>
	<script src="public/assets/js/app.js"></script>
	<script src="public/assets/js/dropdownmenu.js"></script>
  <script src="public/assets/js/jquery.cookiebar.js"></script>
  <script type="text/javascript">$( document ).ready(function() {
    $.cookieBar();
});</script>
	<script src="public/assets/js/ckeditor5-build-classic/ckeditor.js"></script>
	<script>
    ClassicEditor
        .create(document.querySelector('#about'))
        .catch(error => {
            console.error(error);
        });
	</script>
</body>
</html>
        </div> <!-- #global -->
    </body>
</html>