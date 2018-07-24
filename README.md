Ce projet met en place un framework MVC pour un site de streaming de films tombés dans le domaine public mais qui peut aussi être utilisé comme site de critique et de notation en français de films grâce à l’utilisation de l’API Themoviedb.
Architecture
Controllers - Classes des contrôleurs
Models - Classes des modèles
Views - Fichiers de l’interface graphique
Public – F ichiers CSS, web fonts, JavaScript et images
composer.json
composer.lock
apikey.php
db_stream.sql

Installation
•	Cloner ou télécharger le projet.
$ git clone https://github.com/Cedjag/P5.git
•	Aller dans le répertoire de l'application
$ cd projet

Le script db_stream.sql permet de créér la base de données et les tables nécessaires.
$ mysql -uuser -p projet < db_stream.sql
•	Par défaut un administrateur est créé avec comme login admin et comme mot de passe admin
Configuration
Dans le répertoire Models/ConfigDB.php, mettre les données de connexion à la base de données SQL : 	'username' => 'yourusername'
			'password' => 'yourpwd'
			'host' => 'yourhost'
			'db_name' => 'yourdb_name'
            
Créer un répertoire Vendor\php-tmdb\api à la racine puis y copier le contenu Github suivant : https://github.com/php-tmdb/api
Obtenir une clé pour l’API ThemovieDB sur le site suivant : https://developers.themoviedb.org/3/getting-started/introduction puis la copier dans le fichier apikey.php à la ligne 4 : 
define('TMDB_API_KEY', 'your_api_key'); // Your API Key

Utilisation du site : Pour ajouter des films dans la base de données, il faut récupérer l’ID du film sur le site http://www.themoviedb.org : il faut aller sur la page du film que vous souhaitez ajouter. Son ID est dans l’adresse URL (suite de chiffres en gras) : https://www.themoviedb.org/movie/<strong>363088</strong>-ant-man-and-the-wasp.

Une fois, l’ID récupéré et tapé sur la page ajouter un film de l’interface d’administration, cliquez sur ajouter et les informations concernant le film (titre, genres, casting, popularité) seront automatiquement insérées dans la base de données et seront affichés sur le site.
