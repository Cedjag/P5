-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 05 juil. 2018 à 14:53
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stream`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `about` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `about`) VALUES
(1, 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Structure de la table `cast`
--

DROP TABLE IF EXISTS `cast`;
CREATE TABLE IF NOT EXISTS `cast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cast_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `character` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `critics`
--

DROP TABLE IF EXISTS `critics`;
CREATE TABLE IF NOT EXISTS `critics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `id_movie` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `report` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `overview` text NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `genres` varchar(255) NOT NULL,
  `poster_path` varchar(255) DEFAULT NULL,
  `release_date` date NOT NULL,
  `popularity` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `movies_casts`
--

DROP TABLE IF EXISTS `movies_casts`;
CREATE TABLE IF NOT EXISTS `movies_casts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `cast_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `movies_ratings`
--

DROP TABLE IF EXISTS `movies_ratings`;
CREATE TABLE IF NOT EXISTS `movies_ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
