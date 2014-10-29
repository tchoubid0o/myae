-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 26 Octobre 2014 à 14:22
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `makebooks`
--
CREATE DATABASE IF NOT EXISTS `makebooks` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `makebooks`;

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(55) NOT NULL,
  `category` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `date` date NOT NULL,
  `story` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `books`
--

INSERT INTO `books` (`id`, `title`, `category`, `author`, `date`, `story`) VALUES
(1, 'Germain le BG', 1, 1, '2014-10-25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque euismod mi in diam posuere, vel bibendum felis viverra. Nunc id aliquam ipsum. Ut luctus rutrum dui non hendrerit. Sed non ligula nunc. Suspendisse potenti. Fusce fringilla consectetur molestie. Praesent nisi neque, semper et lectus nec, feugiat faucibus tortor. Sed et sapien eget mi ultrices rutrum. Nullam dictum, urna at bibendum consequat, risus est sollicitudin risus, non finibus sapien justo at odio. Sed cursus nibh sit amet leo congue, vitae egestas libero blandit. Curabitur vitae dictum nibh, vel malesuada enim. Nullam imperdiet ut nulla a dignissim. Vestibulum vitae ornare felis, vel mattis purus. Sed rutrum sed diam vitae scelerisque. Cras at risus lacus.\r\n\r\nNunc at ex a velit interdum vulputate. Vivamus at consequat leo, eget viverra turpis. Proin faucibus hendrerit urna dignissim tincidunt. Aliquam metus neque, cursus tincidunt dictum eget, elementum in purus. Nunc ut convallis velit. Pellentesque nec pulvinar nulla. Suspendisse ut auctor dui, vitae maximus est. Suspendisse interdum felis in turpis tempus tempor. Duis interdum congue neque ut pellentesque. Sed blandit urna nunc, nec scelerisque turpis pretium ac. Vestibulum egestas, ante nec feugiat condimentum, nisl dolor gravida magna, scelerisque interdum velit ante eu nibh. Aliquam imperdiet ante vel turpis lacinia porttitor. Praesent eget nisi sed odio vestibulum fermentum lacinia sit amet diam.'),
(2, 'SAY TROP DUR A CODAY', 1, 1, '2014-10-25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque euismod mi in diam posuere, vel bibendum felis viverra. Nunc id aliquam ipsum. Ut luctus rutrum dui non hendrerit. Sed non ligula nunc. Suspendisse potenti. Fusce fringilla consectetur molestie. Praesent nisi neque, semper et lectus nec, feugiat faucibus tortor. Sed et sapien eget mi ultrices rutrum. Nullam dictum, urna at bibendum consequat, risus est sollicitudin risus, non finibus sapien justo at odio. Sed cursus nibh sit amet leo congue, vitae egestas libero blandit. Curabitur vitae dictum nibh, vel malesuada enim. Nullam imperdiet ut nulla a dignissim. Vestibulum vitae ornare felis, vel mattis purus. Sed rutrum sed diam vitae scelerisque. Cras at risus lacus.'),
(3, 'ALLO', 1, 1, '2014-10-25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque euismod mi in diam posuere, vel bibendum felis viverra. Nunc id aliquam ipsum. Ut luctus rutrum dui non hendrerit. Sed non ligula nunc. Suspendisse potenti. Fusce fringilla consectetur molestie. Praesent nisi neque, semper et lectus nec, feugiat faucibus tortor. Sed et sapien eget mi ultrices rutrum. Nullam dictum, urna at bibendum consequat, risus est sollicitudin risus, non finibus sapien justo at odio. Sed cursus nibh sit amet leo congue, vitae egestas libero blandit. Curabitur vitae dictum nibh, vel malesuada enim. Nullam imperdiet ut nulla a dignissim. Vestibulum vitae ornare felis, vel mattis purus. Sed rutrum sed diam vitae scelerisque. Cras at risus lacus.\r\n\r\nNunc at ex a velit interdum vulputate. Vivamus at consequat leo, eget viverra turpis. Proin faucibus hendrerit urna dignissim tincidunt. Aliquam metus neque, cursus tincidunt dictum eget, elementum in purus. Nunc ut convallis velit. Pellentesque nec pulvinar nulla. Suspendisse ut auctor dui, vitae maximus est. Suspendisse interdum felis in turpis tempus tempor. Duis interdum congue neque ut pellentesque. Sed blandit urna nunc, nec scelerisque turpis pretium ac. Vestibulum egestas, ante nec feugiat condimentum, nisl dolor gravida magna, scelerisque interdum velit ante eu nibh. Aliquam imperdiet ante vel turpis lacinia porttitor. Praesent eget nisi sed odio vestibulum fermentum lacinia sit amet diam.'),
(4, 'Lorem Ipsum', 1, 1, '2014-10-25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque euismod mi in diam posuere, vel bibendum felis viverra. Nunc id aliquam ipsum. Ut luctus rutrum dui non hendrerit. Sed non ligula nunc. Suspendisse potenti. Fusce fringilla consectetur molestie. Praesent nisi neque, semper et lectus nec, feugiat faucibus tortor. Sed et sapien eget mi ultrices rutrum. Nullam dictum, urna at bibendum consequat, risus est sollicitudin risus, non finibus sapien justo at odio. Sed cursus nibh sit amet leo congue, vitae egestas libero blandit. Curabitur vitae dictum nibh, vel malesuada enim. Nullam imperdiet ut nulla a dignissim. Vestibulum vitae ornare felis, vel mattis purus. Sed rutrum sed diam vitae scelerisque. Cras at risus lacus.'),
(5, 'Dolor Sit', 1, 1, '2014-10-25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque euismod mi in diam posuere, vel bibendum felis viverra. Nunc id aliquam ipsum. Ut luctus rutrum dui non hendrerit. Sed non ligula nunc. Suspendisse potenti. Fusce fringilla consectetur molestie. Praesent nisi neque, semper et lectus nec, feugiat faucibus tortor. Sed et sapien eget mi ultrices rutrum. Nullam dictum, urna at bibendum consequat, risus est sollicitudin risus, non finibus sapien justo at odio. Sed cursus nibh sit amet leo congue, vitae egestas libero blandit. Curabitur vitae dictum nibh, vel malesuada enim. Nullam imperdiet ut nulla a dignissim. Vestibulum vitae ornare felis, vel mattis purus. Sed rutrum sed diam vitae scelerisque. Cras at risus lacus.'),
(6, 'Lorem Ipsum', 2, 1, '2014-10-25', 'Nunc rutrum tortor dui, id scelerisque est suscipit fermentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras imperdiet sapien ut ex volutpat gravida tincidunt non nibh. Nulla tempor velit nec ante tempor iaculis. In turpis nisl, bibendum eget egestas quis, fringilla non nisl. Curabitur tincidunt tincidunt turpis quis bibendum. Mauris id porta mauris.\r\n\r\nDonec porttitor eu quam sed imperdiet. Etiam eleifend et neque eget luctus. Proin lacus neque, malesuada vitae elit at, maximus vehicula enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc facilisis tortor nisi, nec tempor turpis commodo nec. Quisque et faucibus magna. Donec pharetra volutpat sollicitudin. Curabitur quis magna mattis, viverra mauris et, blandit arcu. Nam congue tortor ut nibh semper, in egestas felis imperdiet. Nulla scelerisque euismod dui sit amet pellentesque.'),
(7, 'Dolor Sit', 2, 1, '2014-10-25', 'Nunc rutrum tortor dui, id scelerisque est suscipit fermentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras imperdiet sapien ut ex volutpat gravida tincidunt non nibh. Nulla tempor velit nec ante tempor iaculis. In turpis nisl, bibendum eget egestas quis, fringilla non nisl. Curabitur tincidunt tincidunt turpis quis bibendum. Mauris id porta mauris.');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `libelle`) VALUES
(1, 'Livre'),
(2, 'Bande dessinée');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(55) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `adm` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `prenom`, `nom`, `mail`, `password`, `ip`, `adm`) VALUES
(1, 'Michaël', 'RUPP', 'michaelrupp@free.fr', '1ba31aff2877ab2255ebe6c4b89a10ac', '127.0.0.1', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
