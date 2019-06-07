-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 07 juin 2019 à 11:59
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Ciserai`
--

-- --------------------------------------------------------

--
-- Structure de la table `Emplacement`
--

CREATE TABLE `Emplacement` (
  `id_emplacement` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `disponible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Emplacement`
--

INSERT INTO `Emplacement` (`id_emplacement`, `type`, `prix`, `disponible`) VALUES
(1, 'Caravane', 13.5, 1),
(2, 'Tente', 11, 1),
(3, 'Camping-car', 14, 1),
(4, 'Bungalow', 17.5, 1),
(8, 'Caravane', 13.5, 1),
(9, 'Tente', 11, 1),
(10, 'Camping-car', 14, 1),
(11, 'Bungalow', 17.5, 1),
(12, 'Caravane', 13.5, 1),
(13, 'Tente', 11, 1),
(14, 'Camping-car', 14, 1),
(15, 'Bungalow', 17.5, 1),
(16, 'Caravane', 13.5, 1),
(17, 'Tente', 11, 1),
(18, 'Camping-car', 14, 1),
(19, 'Bungalow', 17.5, 1),
(20, 'Caravane', 13.5, 1),
(21, 'Tente', 11, 1),
(22, 'Camping-car', 14, 1),
(23, 'Bungalow', 17.5, 1),
(24, 'Caravane', 13.5, 1),
(25, 'Tente', 11, 1),
(26, 'Camping-car', 14, 1),
(27, 'Bungalow', 17.5, 1),
(28, 'Caravane', 13.5, 1),
(29, 'Tente', 11, 1),
(30, 'Camping-car', 14, 1),
(31, 'Bungalow', 17.5, 1),
(32, 'Caravane', 13.5, 1),
(33, 'Tente', 11, 1),
(34, 'Camping-car', 14, 1),
(35, 'Bungalow', 17.5, 1),
(36, 'Tente', 11, 1),
(37, 'Tente', 11, 1),
(38, 'Tente', 11, 1),
(39, 'Tente', 11, 1),
(40, 'Caravane', 13.5, 1),
(41, 'Tente', 11, 1),
(42, 'Camping-car', 14, 1),
(43, 'Bungalow', 17.5, 1),
(44, 'Caravane', 13.5, 1),
(45, 'Tente', 11, 1),
(46, 'Camping-car', 14, 1),
(47, 'Bungalow', 17.5, 1),
(48, 'Caravane', 13.5, 1),
(49, 'Tente', 11, 1),
(50, 'Camping-car', 14, 1),
(51, 'Bungalow', 17.5, 1),
(52, 'Caravane', 13.5, 1),
(53, 'Tente', 11, 1),
(54, 'Camping-car', 14, 1),
(55, 'Bungalow', 17.5, 1),
(56, 'Caravane', 13.5, 1),
(57, 'Tente', 11, 1),
(58, 'Camping-car', 14, 1),
(59, 'Bungalow', 17.5, 1),
(60, 'Caravane', 13.5, 1),
(61, 'Tente', 11, 1),
(62, 'Camping-car', 14, 1),
(63, 'Bungalow', 17.5, 1),
(64, 'Caravane', 13.5, 1),
(65, 'Caravane', 13.5, 1),
(66, 'Tente', 11, 1),
(67, 'Tente', 11, 1),
(68, 'Tente', 11, 1),
(69, 'Tente', 11, 1),
(70, 'Tente', 11, 1),
(71, 'Tente', 11, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Facture`
--

CREATE TABLE `Facture` (
  `id_facture` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Facture`
--

INSERT INTO `Facture` (`id_facture`, `id_reservation`) VALUES
(1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `Prestation`
--

CREATE TABLE `Prestation` (
  `id_prestation` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Prestation`
--

INSERT INTO `Prestation` (`id_prestation`, `nom`, `prix`) VALUES
(1, 'tennis', 10),
(2, 'VTT', 12),
(3, 'Planche a voile', 16),
(4, 'Pedalos', 7),
(5, 'Canoes', 12);

-- --------------------------------------------------------

--
-- Structure de la table `Reservation`
--

CREATE TABLE `Reservation` (
  `id_reservation` int(11) NOT NULL,
  `date_arrivee` date NOT NULL,
  `date_fin` date NOT NULL,
  `nb_personne` int(11) NOT NULL,
  `id_emplacement` int(11) NOT NULL,
  `id_prestation` int(11) NOT NULL,
  `nom_personne` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Reservation`
--

INSERT INTO `Reservation` (`id_reservation`, `date_arrivee`, `date_fin`, `nb_personne`, `id_emplacement`, `id_prestation`, `nom_personne`) VALUES
(8, '2019-06-07', '2019-06-12', 3, 32, 2, 'Alexandre Desvallées');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Emplacement`
--
ALTER TABLE `Emplacement`
  ADD PRIMARY KEY (`id_emplacement`);

--
-- Index pour la table `Facture`
--
ALTER TABLE `Facture`
  ADD PRIMARY KEY (`id_facture`),
  ADD KEY `id_reservation` (`id_reservation`);

--
-- Index pour la table `Prestation`
--
ALTER TABLE `Prestation`
  ADD PRIMARY KEY (`id_prestation`);

--
-- Index pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_emplacement` (`id_emplacement`),
  ADD KEY `id_prestation` (`id_prestation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Emplacement`
--
ALTER TABLE `Emplacement`
  MODIFY `id_emplacement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `Facture`
--
ALTER TABLE `Facture`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Prestation`
--
ALTER TABLE `Prestation`
  MODIFY `id_prestation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Facture`
--
ALTER TABLE `Facture`
  ADD CONSTRAINT `Facture_ibfk_3` FOREIGN KEY (`id_reservation`) REFERENCES `Reservation` (`id_reservation`);

--
-- Contraintes pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Reservation_ibfk_1` FOREIGN KEY (`id_emplacement`) REFERENCES `Emplacement` (`id_emplacement`),
  ADD CONSTRAINT `Reservation_ibfk_2` FOREIGN KEY (`id_prestation`) REFERENCES `Prestation` (`id_prestation`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
