-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Dim 26 Avril 2015 à 14:43
-- Version du serveur :  5.5.33-MariaDB
-- Version de PHP :  5.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `rpg`
--
CREATE DATABASE IF NOT EXISTS `rpg` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rpg`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL DEFAULT '1',
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'tzrgus', '4c6f113e271404405a8e613be6404d1227f7f762 ');

-- --------------------------------------------------------

--
-- Structure de la table `CV`
--

CREATE TABLE IF NOT EXISTS `CV` (
`id` int(255) NOT NULL,
  `CV_TITRE` varchar(255) NOT NULL,
  `CV_content_etude` text,
  `CV_content_formation` varchar(255) DEFAULT NULL,
  `CV_content_travail` varchar(255) DEFAULT NULL,
  `activate` int(10) NOT NULL DEFAULT '1',
  `date_debut` varchar(255) DEFAULT NULL,
  `date_fin` varchar(255) DEFAULT NULL,
  `diplome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `CV`
--

INSERT INTO `CV` (`id`, `CV_TITRE`, `CV_content_etude`, `CV_content_formation`, `CV_content_travail`, `activate`, `date_debut`, `date_fin`, `diplome`) VALUES
(32, 'Formation(s) et stage(s)', NULL, 'ecuzishv', NULL, 1, 'cdikc', 'zeijnuref', NULL),
(33, 'experience professionnel', NULL, NULL, 'eyzdzisc : yescgefzh', 1, 'frygzedhg', 'uddzdhbsvhu', NULL),
(45, 'Etude', 'bep kikou lol', NULL, NULL, 0, '05/07/2010', '07/07/2011', NULL),
(48, 'diplome', NULL, NULL, NULL, 0, 'bac pro', NULL, '01/01/2000');

-- --------------------------------------------------------

--
-- Structure de la table `Projet`
--

CREATE TABLE IF NOT EXISTS `Projet` (
`id` int(11) NOT NULL,
  `projet` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `CV`
--
ALTER TABLE `CV`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Projet`
--
ALTER TABLE `Projet`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `CV`
--
ALTER TABLE `CV`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT pour la table `Projet`
--
ALTER TABLE `Projet`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
