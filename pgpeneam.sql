-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 14 fév. 2023 à 18:23
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
-- Base de données : `pgpeneam`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `matricule` int(11) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `ifu` int(11) DEFAULT NULL,
  `rib` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `en_service` tinyint(1) NOT NULL,
  `date_premier_service` date NOT NULL,
  `grade_id` varchar(255) NOT NULL,
  `statut_id` int(11) NOT NULL,
  `banque_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_agent_banque_id` (`banque_id`),
  KEY `fk_agent_statut_id` (`statut_id`),
  KEY `fk_agent_categorie_id` (`categorie_id`),
  KEY `fk_agent_role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`id`, `nom`, `prenom`, `matricule`, `passwd`, `nationalite`, `profession`, `ifu`, `rib`, `email`, `telephone`, `adresse`, `sexe`, `en_service`, `date_premier_service`, `grade_id`, `statut_id`, `banque_id`, `categorie_id`, `role_id`) VALUES
(1, 'SOSSA', 'Anne-Michèle', 1, 'admin', 'Beninoise', 'Experte comptable', 98, 65, 'admin@mail.com', 1, 'BP 2684', 'Femme', 0, '1975-06-24', '9', 1, 2, 2, 1),
(2, 'nuqy@mailinator.com', 'kyxipy@mailinator.com', 0, 'viqis@mailinator.comnuqy@mailinator.com', 'myhalezyvy@mailinator.com', 'xukifycij@mailinator.com', 25, 50, 'tapowux@mailinator.com', 1, 'bufux@mailinator.com', 'femme', 0, '2001-01-28', '1', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--

DROP TABLE IF EXISTS `annee`;
CREATE TABLE IF NOT EXISTS `annee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annee` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annee`
--

INSERT INTO `annee` (`id`, `annee`) VALUES
(1, '2020-2021'),
(2, '2021-2022'),
(3, '2022-2023');

-- --------------------------------------------------------

--
-- Structure de la table `banque`
--

DROP TABLE IF EXISTS `banque`;
CREATE TABLE IF NOT EXISTS `banque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `banque`
--

INSERT INTO `banque` (`id`, `nom`) VALUES
(1, 'BOA'),
(2, 'UBA');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Enseignant'),
(2, 'Administration');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `filiere_id` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_classe_filiere_id` (`filiere_id`),
  KEY `fk_classe_niveau` (`niveau`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `nom`, `filiere_id`, `niveau`) VALUES
(1, 'IG1', 1, 1),
(2, 'IG2', 1, 1),
(3, 'IG3', 1, 1),
(4, 'PLAN1', 4, 1),
(5, 'PLAN2', 4, 1),
(6, 'PLAN3', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

DROP TABLE IF EXISTS `contrat`;
CREATE TABLE IF NOT EXISTS `contrat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numcontrat` int(11) NOT NULL,
  `dates` varchar(255) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `entite_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_c_en_id` (`agent_id`),
  KEY `fk_e_en_id` (`entite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contrat`
--

INSERT INTO `contrat` (`id`, `numcontrat`, `dates`, `agent_id`, `entite_id`) VALUES
(1, 1000, '1670457600', 1, 1),
(2, 1001, '1670544000', 2, 1),
(3, 1002, '1670544000', 2, 1),
(4, 1003, '1676332800', 2, 1),
(5, 1003, '1676332800', 2, 1),
(6, 1003, '1676332800', 2, 1),
(7, 1003, '1676332800', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `entite_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_departement_entite_id` (`entite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id`, `nom`, `entite_id`) VALUES
(1, 'Statistique', 1),
(2, 'Planification', 1),
(3, 'Management des organisations', 1),
(4, 'Informatique de gestion', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ecue`
--

DROP TABLE IF EXISTS `ecue`;
CREATE TABLE IF NOT EXISTS `ecue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `ue_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ecue_ue_id` (`ue_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ecue`
--

INSERT INTO `ecue` (`id`, `nom`, `code`, `ue_id`) VALUES
(1, 'Analyse vectorielle', '1AL', 1),
(2, 'Cacul matriciel', '2AL', 1),
(3, '', '', 1),
(4, 'Analyse vectorielle', '1AL', 2),
(5, 'Analyse vectorielle', '2AL', 2);

-- --------------------------------------------------------

--
-- Structure de la table `entite`
--

DROP TABLE IF EXISTS `entite`;
CREATE TABLE IF NOT EXISTS `entite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `directeur` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `universite_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entite_universite_id` (`universite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entite`
--

INSERT INTO `entite` (`id`, `nom`, `code`, `directeur`, `adresse`, `email`, `telephone`, `universite_id`) VALUES
(1, 'Ecole Nationale d\'Economie Appliquee et de Management', 'ENEAM', 'Albert HONLONKOU', 'Gbemamey', 'eneam', 53536363, 1);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `departement_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_filiere_departement_id` (`departement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id`, `nom`, `code`, `departement_id`) VALUES
(1, 'Informatique de gestion', 'IG', 4),
(2, 'Statistique', 'STAT', 1),
(4, 'Planification', 'PLAN', 2),
(5, 'Gestion des transports et logistiques', 'GTL', 3),
(6, 'Gestion commerciale', 'GC', 3),
(7, 'Gestion des Banques et Assurance', 'GBA', 3),
(8, 'Gestion Financiere et comptable', 'GFC', 3),
(9, 'Gestion des ressources humaines', 'GRH', 3);

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `grade`
--

INSERT INTO `grade` (`id`, `nom`) VALUES
(1, 'E1'),
(2, 'E2'),
(3, 'E3'),
(4, 'E4'),
(5, 'M1'),
(6, 'M2'),
(7, 'M3'),
(8, 'M4'),
(9, 'C1'),
(10, 'C2'),
(11, 'C3'),
(12, 'C4');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id`, `libelle`, `prix`) VALUES
(1, 'Licence', 3500),
(2, 'Master', 5000);

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

DROP TABLE IF EXISTS `prestation`;
CREATE TABLE IF NOT EXISTS `prestation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contrat_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `ecue_id` int(11) NOT NULL,
  `massehoraire` int(11) NOT NULL,
  `date_debut` int(11) NOT NULL,
  `date_fin` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pre_clsse_id` (`classe_id`),
  KEY `fk_pre_ecue_id` (`ecue_id`),
  KEY `fk_pre_c_id` (`contrat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(1, 'Secretaire');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id`, `nom`) VALUES
(1, 'Permanent'),
(2, 'Vacataire'),
(3, 'conventionne'),
(4, 'contractuel');

-- --------------------------------------------------------

--
-- Structure de la table `ue`
--

DROP TABLE IF EXISTS `ue`;
CREATE TABLE IF NOT EXISTS `ue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `entite_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `annee_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ue_entite_id` (`entite_id`),
  KEY `fk_ue_classe_id` (`classe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ue`
--

INSERT INTO `ue` (`id`, `nom`, `code`, `entite_id`, `classe_id`, `annee_id`) VALUES
(1, 'Algebre', 'AL', 1, 2, 2),
(2, 'Algebre', 'AL', 1, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `universite`
--

DROP TABLE IF EXISTS `universite`;
CREATE TABLE IF NOT EXISTS `universite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `universite`
--

INSERT INTO `universite` (`id`, `nom`, `code`, `adresse`, `logo`) VALUES
(1, 'Calavi', 'UAC', 'Abomey Calavi', 'C:/xampp/htdocs/pgpeneam/images/logo_uac2');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `fk_agent_banque_id` FOREIGN KEY (`banque_id`) REFERENCES `banque` (`id`),
  ADD CONSTRAINT `fk_agent_categorie_id` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `fk_agent_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `fk_agent_statut_id` FOREIGN KEY (`statut_id`) REFERENCES `statut` (`id`);

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `fk_classe_filiere_id` FOREIGN KEY (`filiere_id`) REFERENCES `filiere` (`id`),
  ADD CONSTRAINT `fk_classe_niveau` FOREIGN KEY (`niveau`) REFERENCES `niveau` (`id`);

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `fk_c_en_id` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`id`),
  ADD CONSTRAINT `fk_e_en_id` FOREIGN KEY (`entite_id`) REFERENCES `agent` (`id`);

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `fk_departement_entite_id` FOREIGN KEY (`entite_id`) REFERENCES `entite` (`id`);

--
-- Contraintes pour la table `ecue`
--
ALTER TABLE `ecue`
  ADD CONSTRAINT `fk_ecue_ue_id` FOREIGN KEY (`ue_id`) REFERENCES `ue` (`id`);

--
-- Contraintes pour la table `entite`
--
ALTER TABLE `entite`
  ADD CONSTRAINT `fk_entite_universite_id` FOREIGN KEY (`universite_id`) REFERENCES `universite` (`id`);

--
-- Contraintes pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD CONSTRAINT `fk_filiere_departement_id` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`);

--
-- Contraintes pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD CONSTRAINT `fk_pre_c_id` FOREIGN KEY (`contrat_id`) REFERENCES `contrat` (`id`),
  ADD CONSTRAINT `fk_pre_clsse_id` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `fk_pre_ecue_id` FOREIGN KEY (`ecue_id`) REFERENCES `ecue` (`id`);

--
-- Contraintes pour la table `ue`
--
ALTER TABLE `ue`
  ADD CONSTRAINT `fk_ue_classe_id` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `fk_ue_entite_id` FOREIGN KEY (`entite_id`) REFERENCES `entite` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
