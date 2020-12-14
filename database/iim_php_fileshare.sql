-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 13 déc. 2020 à 18:54
-- Version du serveur :  5.7.21
-- Version de PHP :  7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `iim_php_fileshare`
--

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `filename` varchar(1024) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `size` bigint(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `userId` bigint(20) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `filename`, `title`, `description`, `size`, `type`, `userId`) VALUES
(17, 'uploads\\files\\hero.svg', 'Banner top', 'BanniÃ¨re utilisÃ©e en haut du site', 19211, 'image/svg+xml', 1),
(16, 'uploads\\files\\dummy.txt', 'Dummy text', 'Fichier de dÃ©monstration au format txt', 3520, 'text/plain', 1),
(9, 'uploads\\files\\card.svg', 'Card image', 'Image pour une carte', 6101, 'image/svg+xml', 2),
(10, 'uploads\\files\\avatar-male.svg', 'Avatar Homme', 'Avatar pour un homme', 27840, 'image/svg+xml', 8),
(13, 'uploads\\files\\avatar.svg', 'Avatar Default', 'Avatar par defaut', 57861, 'image/svg+xml', 4),
(14, 'uploads\\files\\avatar-female.svg', 'Avatar Femme', 'Avatar pour une femme', 61675, 'image/svg+xml', 9),
(18, 'uploads\\files\\hero-bottom.svg', 'Banner bottom', 'BanniÃ¨re utilisÃ©e en bas du site', 7505, 'image/svg+xml', 1),
(19, 'uploads\\files\\Banner top.pdf', 'Banner top', 'BanniÃ¨re utilisÃ©e en haut du site', 61299, 'application/pdf', 5),
(20, 'uploads\\files\\FileShare-Logo.png', 'FileShare Logo', 'Logo du site FileShare transparent', 18484, 'image/png', 5),
(21, 'uploads\\files\\FileShare-Logo.jpg', 'FileShare Logo', 'Logo du site FileShare', 111850, 'image/jpeg', 6);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(1024) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `avatar`) VALUES
(1, 'Quentin Bernigaud', 'azerty', 'uploads\\profile\\avatar-male.svg'),
(2, 'John Doe', '123456', 'uploads\\profile\\avatar-default.svg'),
(3, 'Alan Smithee', 'password', 'uploads\\profile\\avatar-default.svg'),
(4, 'Naomi Baker', 'ytreza', 'uploads\\profile\\avatar-female.svg'),
(5, 'Kian Stevenson', 'pwd', 'uploads\\profile\\avatar-default.svg'),
(6, 'Bernadette Gamache', 'mdp', 'uploads\\profile\\avatar-female.svg'),
(8, 'Daniel Corbeil', 'motdepasse', 'uploads\\profile\\avatar-male.svg'),
(9, 'Florence Pirouet', '123567890Â°+', 'uploads\\profile\\avatar-female.svg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
