-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 06 oct. 2022 à 11:08
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eneampgp`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `id_agent` int(5) NOT NULL AUTO_INCREMENT,
  `numero_matricule` varchar(10) NOT NULL,
  `motdepasse` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `dateprise_service` date NOT NULL,
  `en_service` tinyint(1) NOT NULL,
  `cote` varchar(5) NOT NULL,
  `id_statut` int(5) NOT NULL,
  `id_poste` int(5) NOT NULL,
  PRIMARY KEY (`id_agent`),
  KEY `id_poste` (`id_poste`),
  KEY `id_statut` (`id_statut`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`id_agent`, `numero_matricule`, `motdepasse`, `nom`, `prenom`, `dateprise_service`, `en_service`, `cote`, `id_statut`, `id_poste`) VALUES
(1, '123456', 'souza', 'de-SOUZA', 'Gwladys', '2012-03-05', 1, 'M3', 1, 3),
(2, '234567', 'thibaut', 'HOUNKPE', 'Constantin Thibaut', '2020-10-19', 1, 'E4', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

DROP TABLE IF EXISTS `dossier`;
CREATE TABLE IF NOT EXISTS `dossier` (
  `id_dossier` int(5) NOT NULL AUTO_INCREMENT,
  `id_agent` int(5) NOT NULL,
  PRIMARY KEY (`id_dossier`),
  KEY `id_agent` (`id_agent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `info parcours`
--

DROP TABLE IF EXISTS `info parcours`;
CREATE TABLE IF NOT EXISTS `info parcours` (
  `id_infoparcours` int(5) NOT NULL AUTO_INCREMENT,
  `reference_act` varchar(150) NOT NULL,
  `id_agent` int(5) NOT NULL,
  PRIMARY KEY (`id_infoparcours`),
  KEY `id_agent` (`id_agent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

DROP TABLE IF EXISTS `poste`;
CREATE TABLE IF NOT EXISTS `poste` (
  `id_poste` int(5) NOT NULL AUTO_INCREMENT,
  `categorie_poste` tinyint(1) NOT NULL,
  `designation_poste` varchar(100) NOT NULL,
  PRIMARY KEY (`id_poste`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`id_poste`, `categorie_poste`, `designation_poste`) VALUES
(1, 0, 'Chef service matériel'),
(2, 1, 'Professeur de droit'),
(3, 1, 'Professeur de comptabilité général'),
(4, 0, 'Chef service du personnel');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `id_statut` int(5) NOT NULL AUTO_INCREMENT,
  `type_statut` varchar(15) NOT NULL,
  PRIMARY KEY (`id_statut`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `type_statut`) VALUES
(1, 'Contractuel'),
(2, 'Conventionné'),
(3, 'Permanent'),
(4, 'Vacataire');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(5) NOT NULL AUTO_INCREMENT,
  `nom_ut` varchar(50) NOT NULL,
  `prenom_ut` varchar(50) NOT NULL,
  `login_ut` varchar(50) NOT NULL,
  `pass_ut` varchar(15) NOT NULL,
  `type_ut` varchar(30) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`id_poste`) REFERENCES `poste` (`id_poste`),
  ADD CONSTRAINT `agent_ibfk_2` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id_statut`);

--
-- Contraintes pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD CONSTRAINT `dossier_ibfk_1` FOREIGN KEY (`id_agent`) REFERENCES `agent` (`id_agent`);

--
-- Contraintes pour la table `info parcours`
--
ALTER TABLE `info parcours`
  ADD CONSTRAINT `info parcours_ibfk_1` FOREIGN KEY (`id_agent`) REFERENCES `agent` (`id_agent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
