-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 29 Octobre 2014 à 23:29
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `myae`
--
CREATE DATABASE IF NOT EXISTS `myae` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `myae`;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sexe` int(11) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `prenom` varchar(55) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `cp` int(5) NOT NULL,
  `ville` varchar(55) NOT NULL,
  `pays` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `sexe`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `pays`) VALUES
(1, 1, 'SULPICE', 'François-Eric', '13 Rue de Toul', 59800, 'Lille', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE IF NOT EXISTS `devis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_devis` int(11) NOT NULL,
  `date` date NOT NULL,
  `statut` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_devis` (`id_devis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `devis`
--

INSERT INTO `devis` (`id`, `id_devis`, `date`, `statut`, `client`, `total`) VALUES
(1, 2014100001, '2014-10-28', 1, 1, '350.00'),
(3, 2014100002, '2014-10-28', 1, 1, '255.00'),
(4, 2014100003, '2014-10-28', 1, 1, '200.00'),
(5, 2014100004, '2014-10-28', 1, 1, '150.00'),
(6, 2014100005, '2014-10-28', 1, 1, '100.00'),
(7, 2014100006, '2014-10-29', 1, 1, '500.00'),
(8, 2014100007, '2014-10-29', 1, 1, '450.00'),
(9, 2014100008, '2014-10-29', 1, 1, '550.00'),
(10, 2014100009, '2014-10-29', 1, 1, '150.00'),
(11, 2014100010, '2014-10-29', 1, 1, '200.00'),
(12, 2014100011, '2014-10-29', 1, 1, '210.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
