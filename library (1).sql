-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 02 Avril 2017 à 19:38
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `ISBN` bigint(20) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Autor` varchar(255) NOT NULL,
  `Field` varchar(30) NOT NULL,
  `Language` varchar(20) NOT NULL,
  `Resume` text NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Addingdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `book`
--

INSERT INTO `book` (`ISBN`, `Title`, `Autor`, `Field`, `Language`, `Resume`, `Image`, `Addingdate`) VALUES
(999999, 'Lorigine des especes', 'Charles darwin', 'Science', 'french', 'L origine des especes est un ouvrage scientifique de Charles Darwin, publie le 24 novembre 1859 pour sa premiere edition anglaise1. Cet ouvrage est considere comme le texte fondateur de la theorie de l\'evolution.', 'HeadsFaces.jpg', '2017-03-18'),
(1234567, 'history of pakistan', 'M Rziza', 'history', 'English', 'officially the Islamic Republic of Pakistan, is a federal..', 'pakistan.jpg', '2017-03-26'),
(4566777, 'death book', 'Randall munra', 'Science', 'English', 'Published in Iran in 2000, written and translated by a classically trained musician named Mahyar Dean who later formed the power..', 'LivreMorts.jpg', '2017-03-16'),
(670022152, 'What Technology Wants', 'Kevin Kelly', 'science', 'English', 'What Technology Wants is a book in which many issues are discussed..', 'WhatTechWants.jpg', '2017-03-02'),
(2212129874, 'CSS3 pour les Web Designers', 'Dan Cederholm', 'Computer engineering', 'French', 'Les feuilles de styles CSS sont devenues un outil ...', 'CSS3Web.jpg', '2017-03-01');

-- --------------------------------------------------------

--
-- Structure de la table `borrow`
--

CREATE TABLE `borrow` (
  `ID` int(11) NOT NULL,
  `ISBN` bigint(20) NOT NULL,
  `dateborrow` date NOT NULL,
  `dateback` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `borrow`
--

INSERT INTO `borrow` (`ID`, `ISBN`, `dateborrow`, `dateback`) VALUES
(3, 999999, '2017-04-01', '2017-04-08'),
(4, 1234567, '2017-03-13', '2017-03-23');

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `function` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `member`
--

INSERT INTO `member` (`ID`, `firstname`, `lastname`, `username`, `password`, `function`) VALUES
(1, 'hina', 'jamil', 'hina1', 'hina12', 1),
(2, 'sadia', 'elgati', 'sadia1', 'sadia12', 1),
(3, 'sara', 'khan', 'sara2', 'sara23', 0),
(4, 'ali', 'malik', 'ali2', 'ali23', 0),
(5, 'saba', 'saad', 'saba4', 'saba45', 0),
(7, 'maha', 'ali', 'maha6', 'maha5', 0),
(8, 'hunny', 'rao', 'hunny1', 'hunny', 0),
(9, 'zz', 'zzz', 'zad', 'zad1', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Index pour la table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`ISBN`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `ISBN` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
