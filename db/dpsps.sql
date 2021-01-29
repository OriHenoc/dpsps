-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 29 jan. 2021 à 02:54
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dpsps`
--

-- --------------------------------------------------------

--
-- Structure de la table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `nom_application` varchar(50) NOT NULL DEFAULT 'DPSPS',
  `favicon_application` varchar(255) NOT NULL,
  `logo_application` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `application`
--

INSERT INTO `application` (`nom_application`, `favicon_application`, `logo_application`) VALUES
('DPSPS', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `dossiers`
--

DROP TABLE IF EXISTS `dossiers`;
CREATE TABLE IF NOT EXISTS `dossiers` (
  `reference_dos` int(11) NOT NULL AUTO_INCREMENT,
  `intitule_dos` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_creat_dos` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `instructions_dos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `date_fin_prevue_dos` timestamp NULL DEFAULT NULL,
  `date_fin_effective_dos` timestamp NULL DEFAULT NULL,
  `statut_dos` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `observations_dos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`reference_dos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `dossiers`
--

INSERT INTO `dossiers` (`reference_dos`, `intitule_dos`, `date_creat_dos`, `instructions_dos`, `date_fin_prevue_dos`, `date_fin_effective_dos`, `statut_dos`, `observations_dos`) VALUES
(1, 'Dossier sur la mise en place de X', '2021-01-28 22:12:03', 'Vous devez travailler en groupe en faisant le plus rapidement possible la réunion et les démarches.', '2021-01-31 05:11:00', NULL, '0', '//');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id_notif` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_notif` varchar(50) NOT NULL,
  `description_notif` text NOT NULL,
  `cible_notif` int(11) NOT NULL,
  `statut_notif` char(1) NOT NULL DEFAULT '0',
  `date_notif` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_notif`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id_notif`, `libelle_notif`, `description_notif`, `cible_notif`, `statut_notif`, `date_notif`) VALUES
(1, 'Diligence créée !', 'Une nouvelle diligence a été créée par le Directeur. ', 1, '0', '2021-01-27 01:03:53');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_role` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `abr_role` varchar(5) DEFAULT NULL,
  `statut` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `libelle_role`, `abr_role`, `statut`) VALUES
(1, 'Super Admin', 'SA', '1'),
(2, 'Directeur', 'Dr', '1'),
(3, 'Sous-Directeur', 'SD', '1'),
(4, 'Chef de Service', 'CS', '1'),
(5, 'Chargé d\'Etude', 'CE', '1');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username_user` varchar(30) NOT NULL,
  `mdp_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fullname_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email_user` varchar(150) DEFAULT NULL,
  `telephone_user` varchar(20) DEFAULT NULL,
  `date_creation_user` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `statut_user` char(1) NOT NULL DEFAULT '1',
  `online` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `username_user`, `mdp_user`, `fullname_user`, `email_user`, `telephone_user`, `date_creation_user`, `statut_user`, `online`) VALUES
(1, 'Irie Bi', '9b71d224bd62f3785d96d46ad3ea3d73319bfbc2890caadae2dff72519673ca72323c3d99ba5c11d7c7acc6e14b8c5da0c4663475c2e5c3adef46f73bcdec043', 'Irié Bi Mathieu Kouai', 'bikmathieu@gmail.com', '+225 49 66 08 53', '2021-01-27 00:37:21', '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
CREATE TABLE IF NOT EXISTS `users_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_user_role` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`, `date_user_role`) VALUES
(1, 5, '2021-01-27 01:19:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
