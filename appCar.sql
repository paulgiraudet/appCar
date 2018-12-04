-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 04 Décembre 2018 à 10:56
-- Version du serveur :  5.7.24-0ubuntu0.16.04.1
-- Version de PHP :  7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `appCar`
--

-- --------------------------------------------------------

--
-- Structure de la table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `color` varchar(15) NOT NULL,
  `wheelNumber` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `doorNumber` int(11) DEFAULT NULL,
  `maxSpeed` int(11) DEFAULT NULL,
  `maxHeight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `brand`, `color`, `wheelNumber`, `type`, `doorNumber`, `maxSpeed`, `maxHeight`) VALUES
(1, 'Coccinelle', 'Volkswagen', 'JAUNE', 4, 'car', 3, 0, 0),
(5, 'Combi', 'Volkswagen', 'Jaune', 4, 'car', 5, NULL, NULL),
(6, 'Totomobile', 'Smart', 'Rouge', 4, 'car', 3, NULL, NULL),
(18, 'tgbnhjk', 'tghjk', 'ghj', 3, 'motorbike', NULL, 123, NULL),
(19, 'hjkl', 'hjkl', 'tgvbn', 2, 'car', 3, NULL, NULL),
(20, 'rfdcfghj', 'rdfgbv', 'lokjhg', 4, 'truck', 3, NULL, 400),
(21, 'tutu', 'tuti', 'rouge', 2, 'motorbike', NULL, 230, NULL),
(24, 'Touctouc', 'Uber', 'Noir', 3, 'motorbike', NULL, 32, NULL),
(26, 'Lala', 'lala', 'vert', 5, 'car', 5, NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
