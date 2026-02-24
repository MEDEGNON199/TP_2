-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 23 fév. 2026 à 13:51
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `marchesbenin`
--

-- --------------------------------------------------------

--
-- Structure de la table `emplacement`
--

DROP TABLE IF EXISTS `emplacement`;
CREATE TABLE IF NOT EXISTS `emplacement` (
  `Id_emplacement` int NOT NULL AUTO_INCREMENT,
  `numero` int NOT NULL,
  `id_marche` int NOT NULL,
  `id_type` int NOT NULL,
  PRIMARY KEY (`Id_emplacement`),
  KEY `fk1` (`id_marche`),
  KEY `fk2` (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marche`
--

DROP TABLE IF EXISTS `marche`;
CREATE TABLE IF NOT EXISTS `marche` (
  `id_Marche` int NOT NULL AUTO_INCREMENT,
  `nom_Marche` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `capacite` int NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_Ville` int DEFAULT NULL,
  PRIMARY KEY (`id_Marche`),
  KEY `fk3` (`id_Ville`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `marche`
--

INSERT INTO `marche` (`id_Marche`, `nom_Marche`, `description`, `capacite`, `adresse`, `telephone`, `image`, `id_Ville`) VALUES
(6, 'gbegamey', 'marcher gbegamey', 400, 'Agblangandan', '69007300', 'image/2026-02-2313-28-40.png', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_emplacement`
--

DROP TABLE IF EXISTS `type_emplacement`;
CREATE TABLE IF NOT EXISTS `type_emplacement` (
  `id_Type` int NOT NULL AUTO_INCREMENT,
  `libelle` int NOT NULL,
  PRIMARY KEY (`id_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id_Ville` int NOT NULL AUTO_INCREMENT,
  `nom_Ville` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_Ville`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id_Ville`, `nom_Ville`) VALUES
(1, 'Porto_novo'),
(2, 'Porto-Novo'),
(4, 'Avotrou');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emplacement`
--
ALTER TABLE `emplacement`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_marche`) REFERENCES `marche` (`id_Marche`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_type`) REFERENCES `type_emplacement` (`id_Type`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `marche`
--
ALTER TABLE `marche`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`id_Ville`) REFERENCES `ville` (`id_Ville`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
