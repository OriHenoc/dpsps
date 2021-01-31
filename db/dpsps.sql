-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  Dim 31 jan. 2021 à 14:41
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
-- Structure de la table `activites`
--

DROP TABLE IF EXISTS `activites`;
CREATE TABLE IF NOT EXISTS `activites` (
  `id_activite` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_activite` text NOT NULL,
  `dossier_activite` int(11) NOT NULL,
  `date_debut_activite` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_fin_activite` timestamp NULL DEFAULT NULL,
  `statut_activite_ce` int(11) DEFAULT '1',
  `statut_activite_cs` int(11) DEFAULT '1',
  `statut_activite_sd` int(11) DEFAULT '1',
  PRIMARY KEY (`id_activite`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `activites`
--

INSERT INTO `activites` (`id_activite`, `libelle_activite`, `dossier_activite`, `date_debut_activite`, `date_fin_activite`, `statut_activite_ce`, `statut_activite_cs`, `statut_activite_sd`) VALUES
(1, 'Réunion pour planification', 1, '2021-01-30 11:51:07', NULL, 1, 1, 1),
(2, 'Mise en place des outils', 1, '2021-01-30 19:36:11', NULL, 1, 1, 1),
(3, 'Lancement de la campagne', 1, '2021-01-31 04:25:08', NULL, 1, 1, 1);

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
-- Structure de la table `chefs_de_services`
--

DROP TABLE IF EXISTS `chefs_de_services`;
CREATE TABLE IF NOT EXISTS `chefs_de_services` (
  `id_cds` int(11) NOT NULL AUTO_INCREMENT,
  `chef_cds` int(11) NOT NULL,
  `service_cds` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cds`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chefs_de_services`
--

INSERT INTO `chefs_de_services` (`id_cds`, `chef_cds`, `service_cds`) VALUES
(1, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `dossiers`
--

DROP TABLE IF EXISTS `dossiers`;
CREATE TABLE IF NOT EXISTS `dossiers` (
  `id_dos` int(11) NOT NULL AUTO_INCREMENT,
  `instructDGPE_dos` text,
  `expediteur_dos` varchar(100) DEFAULT NULL,
  `ref_dos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `objet_dos` varchar(100) NOT NULL,
  `date_dos` datetime DEFAULT NULL,
  `date_recep_dos` datetime DEFAULT NULL,
  `imputation_sd_dos` int(11) NOT NULL,
  `imputation_service_dos` int(11) DEFAULT NULL,
  `imputation_agent_dos` int(11) DEFAULT NULL,
  `imputation_autres` text,
  `instructions_dos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `date_debut_dos` datetime DEFAULT NULL,
  `date_fin_prevue_dos` datetime DEFAULT NULL,
  `date_fin_reelle_dos` datetime DEFAULT NULL,
  `observations_dos` text,
  `statut_dos` int(11) NOT NULL DEFAULT '1',
  `made_by` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_dos`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `dossiers`
--

INSERT INTO `dossiers` (`id_dos`, `instructDGPE_dos`, `expediteur_dos`, `ref_dos`, `objet_dos`, `date_dos`, `date_recep_dos`, `imputation_sd_dos`, `imputation_service_dos`, `imputation_agent_dos`, `imputation_autres`, `instructions_dos`, `date_debut_dos`, `date_fin_prevue_dos`, `date_fin_reelle_dos`, `observations_dos`, `statut_dos`, `made_by`, `deleted`) VALUES
(1, 'Ceci est un courrier prioritaire que nous vous confions avec soin !', 'Ministère de l\'environnement', 'DOS-0505-14-2020', 'Projet d\'assainissement national 2021', '2021-01-02 00:00:00', '2021-01-25 00:00:00', 1, 2, 1, 'Chef du département QoS', NULL, '2021-01-29 00:00:00', '2021-02-15 00:00:00', NULL, 'Je souhaiterais que vous procédiez comme suit : <br>\r\n<ol>\r\n<li>Réunion pour planification</li>\r\n<li>Mise en place des outils</li>\r\n<li>Lancement de la campagne</li>\r\n<li>Réunion pour bilan</li>\r\n</ol>', 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id_notif` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_notif` varchar(50) NOT NULL,
  `description_notif` text NOT NULL,
  `dossier_notif` int(11) DEFAULT NULL,
  `cible_notif` int(11) NOT NULL,
  `statut_notif` char(1) NOT NULL DEFAULT '0',
  `date_notif` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_notif`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id_notif`, `libelle_notif`, `description_notif`, `dossier_notif`, `cible_notif`, `statut_notif`, `date_notif`) VALUES
(1, 'Nouveau Dossier', 'Le nouveau dossier <a href=\"dossiers.php\">DOS55555555</a> créé par sdHC vous concerne.', 20, 6, '0', '2021-01-31 12:51:37'),
(2, 'Nouveau Dossier', 'Le nouveau dossier <a href=\"dossiers.php\">DOS55555555</a> créé par sdHC vous concerne.', 20, 5, '0', '2021-01-31 12:51:37'),
(3, 'Nouveau Dossier', 'Le nouveau dossier <a href=\"dossiers.php\">DOS55555555</a> créé par sdHC vous concerne.', 20, 4, '0', '2021-01-31 12:51:38');

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
(2, 'Directeur', 'DR', '1'),
(3, 'Sous-Directeur', 'SD', '1'),
(4, 'Chef de Service', 'CS', '1'),
(5, 'Chargé d\'Etude', 'CE', '1');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_service` varchar(100) NOT NULL,
  `description_service` text,
  `sd_id` int(11) NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id_service`, `libelle_service`, `description_service`, `sd_id`) VALUES
(1, 'SERVICE ELECTRICITE, HYDROCARBURES', NULL, 1),
(2, 'SERVICE EAU ET ASSAINISSEMENT', NULL, 1),
(3, 'SERVICE MINES', NULL, 2),
(4, 'SERVICE AGRICULTURE', NULL, 2),
(5, 'DIRECTION', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sousdirections`
--

DROP TABLE IF EXISTS `sousdirections`;
CREATE TABLE IF NOT EXISTS `sousdirections` (
  `id_sd` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_sd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description_sd` text,
  PRIMARY KEY (`id_sd`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sousdirections`
--

INSERT INTO `sousdirections` (`id_sd`, `libelle_sd`, `description_sd`) VALUES
(1, 'S/D ELECTRICITE, HYDROCARBURE, EAU, AISSAINISSEMENT', NULL),
(2, 'S/D AGRICULTURES ET MINES', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sous_directeurs`
--

DROP TABLE IF EXISTS `sous_directeurs`;
CREATE TABLE IF NOT EXISTS `sous_directeurs` (
  `id_sous_dir` int(11) NOT NULL AUTO_INCREMENT,
  `sous_directeur` int(11) NOT NULL,
  `sous_direction` int(11) NOT NULL,
  PRIMARY KEY (`id_sous_dir`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sous_directeurs`
--

INSERT INTO `sous_directeurs` (`id_sous_dir`, `sous_directeur`, `sous_direction`) VALUES
(1, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `statut_activite_ce`
--

DROP TABLE IF EXISTS `statut_activite_ce`;
CREATE TABLE IF NOT EXISTS `statut_activite_ce` (
  `id_statut_activite_ce` int(11) NOT NULL AUTO_INCREMENT,
  `lib_statut_activite_ce` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_statut_activite_ce`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `statut_activite_ce`
--

INSERT INTO `statut_activite_ce` (`id_statut_activite_ce`, `lib_statut_activite_ce`) VALUES
(1, 'en cours de traitement par le CE'),
(2, 'transmis au CS'),
(3, 'Retransmis au CE'),
(4, 'Retransmis au CS'),
(5, 'transmis au DR');

-- --------------------------------------------------------

--
-- Structure de la table `statut_activite_cs`
--

DROP TABLE IF EXISTS `statut_activite_cs`;
CREATE TABLE IF NOT EXISTS `statut_activite_cs` (
  `id_statut_activite_cs` int(11) NOT NULL AUTO_INCREMENT,
  `lib_statut_activite_cs` varchar(50) NOT NULL,
  PRIMARY KEY (`id_statut_activite_cs`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `statut_activite_cs`
--

INSERT INTO `statut_activite_cs` (`id_statut_activite_cs`, `lib_statut_activite_cs`) VALUES
(1, 'en cours de traitement par le CS'),
(2, 'transmis au SD'),
(3, 'Retransmis au CS'),
(4, 'Retransmis au SD'),
(5, 'transmis au DR');

-- --------------------------------------------------------

--
-- Structure de la table `statut_activite_sd`
--

DROP TABLE IF EXISTS `statut_activite_sd`;
CREATE TABLE IF NOT EXISTS `statut_activite_sd` (
  `id_statut_activite_sd` int(11) NOT NULL AUTO_INCREMENT,
  `lib_statut_activite_sd` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_statut_activite_sd`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `statut_activite_sd`
--

INSERT INTO `statut_activite_sd` (`id_statut_activite_sd`, `lib_statut_activite_sd`) VALUES
(1, 'en cours de traitement par le SD'),
(2, 'transmis au DR'),
(3, 'Retransmis au SD'),
(4, 'Retransmis au DR'),
(5, 'Finalisé');

-- --------------------------------------------------------

--
-- Structure de la table `statut_dossier`
--

DROP TABLE IF EXISTS `statut_dossier`;
CREATE TABLE IF NOT EXISTS `statut_dossier` (
  `id_statut_dos` int(11) NOT NULL AUTO_INCREMENT,
  `lib_statut_dos` varchar(30) NOT NULL,
  PRIMARY KEY (`id_statut_dos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `statut_dossier`
--

INSERT INTO `statut_dossier` (`id_statut_dos`, `lib_statut_dos`) VALUES
(1, 'Débuté'),
(2, 'En cours'),
(3, 'Terminé');

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
  `service_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `username_user`, `mdp_user`, `fullname_user`, `email_user`, `telephone_user`, `date_creation_user`, `statut_user`, `online`, `service_id`) VALUES
(1, 'Hello', '9b71d224bd62f3785d96d46ad3ea3d73319bfbc2890caadae2dff72519673ca72323c3d99ba5c11d7c7acc6e14b8c5da0c4663475c2e5c3adef46f73bcdec043', 'Hello World', 'helloworld@gmail.com', '+225 07 08 09 47 48', '2021-01-27 00:37:21', '1', 1, NULL),
(3, 'king', '9b71d224bd62f3785d96d46ad3ea3d73319bfbc2890caadae2dff72519673ca72323c3d99ba5c11d7c7acc6e14b8c5da0c4663475c2e5c3adef46f73bcdec043', 'King Boss', 'kb@gmail.com', '+225 02 05 04 06 08', '2021-01-31 02:47:46', '1', 0, 0),
(4, 'sdHC', '9b71d224bd62f3785d96d46ad3ea3d73319bfbc2890caadae2dff72519673ca72323c3d99ba5c11d7c7acc6e14b8c5da0c4663475c2e5c3adef46f73bcdec043', 'sdHC', 'kb5@gmail.com', '+225 02 05 04 06 08', '2021-01-31 11:52:40', '1', 1, 1),
(5, 'csHC', '9b71d224bd62f3785d96d46ad3ea3d73319bfbc2890caadae2dff72519673ca72323c3d99ba5c11d7c7acc6e14b8c5da0c4663475c2e5c3adef46f73bcdec043', 'csHC', 'kb8@gmail.com', '+225 02 05 04 06 08', '2021-01-31 11:54:33', '1', 0, 1),
(6, 'ceHC', '9b71d224bd62f3785d96d46ad3ea3d73319bfbc2890caadae2dff72519673ca72323c3d99ba5c11d7c7acc6e14b8c5da0c4663475c2e5c3adef46f73bcdec043', 'ceHC', 'kb88@gmail.com', '+225 02 05 04 06 08', '2021-01-31 11:55:43', '1', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
CREATE TABLE IF NOT EXISTS `users_roles` (
  `id_users_roles` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_user_role` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_users_roles`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users_roles`
--

INSERT INTO `users_roles` (`id_users_roles`, `user_id`, `role_id`, `date_user_role`) VALUES
(1, 1, 2, '2021-01-27 01:19:42'),
(2, 3, 1, '2021-01-31 02:47:46'),
(3, 4, 3, '2021-01-31 11:52:41'),
(4, 5, 4, '2021-01-31 11:54:33'),
(5, 6, 5, '2021-01-31 11:55:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
