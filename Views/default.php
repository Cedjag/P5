<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="public/img/favicon.ico" />
    <script src="public/js/tinymce/tinymce.min.js"></script>
    <title><?= 'Le coin du cinéphile'?></title>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top headroom" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse navbar-left" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                      <a href="index.php"><span class="glyphicon glyphicon-home"></span> Le coin du cinéphile</a>
                    </li>
                </ul>
            </div>

        </div>

    </nav>
    <div class="body">
      <?= $contenu ?>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 footer">
            <li><a href="index.php?p=login">Espace d'administration</a></li>
            <li>contacter le <a href="mailto:contact@cedricjager.com"> Coin du cinéphile</a></li></div>
          </div>
        </div>

      </div>
    </footer>
</div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script type="text/javascript" src="public/js/slider.js"></script>
      <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  </body>
  </html>
