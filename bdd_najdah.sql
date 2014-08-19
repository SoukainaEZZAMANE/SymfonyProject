-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 30 Mai 2014 à 10:05
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `najdah`
--
CREATE DATABASE `najdah` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `najdah`;

-- --------------------------------------------------------

--
-- Structure de la table `attachement`
--

CREATE TABLE IF NOT EXISTS `attachement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `declaration_id` int(11) DEFAULT NULL,
  `lien` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_168096B6C06258A3` (`declaration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `citoyen`
--

CREATE TABLE IF NOT EXISTS `citoyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cin` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ville_id` int(11) DEFAULT NULL,
  `nationalite_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_41C3CF30A73F0036` (`ville_id`),
  KEY `IDX_41C3CF301B063272` (`nationalite_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `citoyen`
--

INSERT INTO `citoyen` (`id`, `nom`, `prenom`, `cin`, `tel`, `ville_id`, `nationalite_id`) VALUES
(1, 'Belghmi', 'Brahim', 'cd 342084', '0656689114', 4, 1),
(2, 'Touzani', 'Marouane', 'ca 529741', '0685921485', 6, 1),
(3, 'Felja', 'Marouane', 'cs 523641', '0652148790', 7, 1),
(4, 'Mosaif', 'Afaf', 'ak 326541', '0614523012', 8, 1),
(5, 'Erraji', 'Soukaina', 'lk 263201', '0623147896', 3, 1),
(6, 'Alami', 'Hind', 'lp 956320', '0650478520', 2, 1),
(7, 'Percez Garcia', 'Pilar', '23654187', '00259874580', 1, 3),
(8, '', '', '', '', NULL, NULL),
(9, '', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `declaration`
--

CREATE TABLE IF NOT EXISTS `declaration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `citoyen_id` int(11) DEFAULT NULL,
  `etat_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `x` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `y` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nbrBlesses` int(11) NOT NULL,
  `natureLanceur` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `ville_id` int(11) DEFAULT NULL,
  `lienRapport` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FC3F551543787BBA` (`citoyen_id`),
  KEY `IDX_FC3F5515D5E86FF` (`etat_id`),
  KEY `IDX_FC3F5515C54C8C93` (`type_id`),
  KEY `IDX_FC3F5515A73F0036` (`ville_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Contenu de la table `declaration`
--

INSERT INTO `declaration` (`id`, `citoyen_id`, `etat_id`, `type_id`, `date`, `x`, `y`, `adresse`, `nbrBlesses`, `natureLanceur`, `description`, `ville_id`, `lienRapport`) VALUES
(1, 5, 1, 1, '2010-08-11 00:00:00', '-31.02581452', '8.369852', 'Avenue Mohammed 6', 5, 'v', NULL, 1, NULL),
(2, 1, 1, 1, '2012-01-01 00:00:00', '31.62809838', '-7.998819351', 'Av Abd Lakrime Lkhetabi', 2, 't', NULL, 1, NULL),
(3, 2, 1, 6, '2012-05-02 00:00:00', '-31.0250652', '-7.23698523', '45 Gueliz', 1, 'v', NULL, 1, NULL),
(4, 3, 2, 3, '2012-03-05 00:00:00', '31.62809838', '-7.998819351', 'Menara', 5, 'v', NULL, 2, NULL),
(5, 2, 3, 2, '2012-08-13 00:00:00', '31.62809838', '-7.998819351', 'Adr', 3, 't', NULL, 3, NULL),
(6, 3, 1, 8, '2013-02-06 00:00:00', '31.62809838', '-7.998819351', 'Adr', 0, 't', NULL, 7, NULL),
(7, 4, 4, 4, '2013-06-05 00:00:00', '31.62809838', '-7.998819351', 'Adr', 0, 'v', NULL, 8, NULL),
(8, 5, 6, 2, '2013-09-07 00:00:00', '31.62809838', '-7.998819351', 'Menara', 1, 't', NULL, 1, NULL),
(9, 3, 6, 5, '2014-01-04 00:00:00', '31.62809838', '-7.998819351', 'Adr', 1, 'v', NULL, 4, NULL),
(10, 1, 4, 9, '2014-04-07 00:00:00', '31.62809838', '-7.998819351', 'Adr', 1, 'v', NULL, 2, NULL),
(11, 2, 2, 2, '2014-04-01 00:00:00', '31.62809838', '-7.998819351', 'Adr', 0, 'v', NULL, 4, NULL),
(12, 4, 1, 1, '2014-04-05 00:00:00', '31.62809838', '-7.998819351', 'Adr', 0, 'v', NULL, 6, NULL),
(13, 6, 1, 3, '2014-04-15 00:00:00', '31.62809838', '-7.998819351', 'Adr', 2, 't', NULL, 5, NULL),
(14, 3, 1, 2, '2014-05-01 00:00:00', '31.62809838', '-7.998819351', 'Adr', 0, 'v', NULL, 2, NULL),
(15, 7, 1, 1, '2014-05-01 00:00:00', '31.62809838', '-7.998819351', 'Adresse', 5, 't', NULL, 7, NULL),
(16, 2, 3, 4, '2014-05-05 00:00:00', '31.62809838', '-7.998819351', 'Adresse', 3, 't', NULL, 3, NULL),
(17, 3, 3, 3, '2014-05-04 00:00:00', '31.62809838', '-7.998819351', 'Adresse', 2, 't', NULL, 4, NULL),
(18, 4, 4, 3, '2014-05-05 00:00:00', '31.62809838', '-7.998819351', 'Av Abd Lakrime Lkhetabi', 0, 't', NULL, 1, NULL),
(19, 2, 4, 5, '2014-05-05 00:00:00', '31.62809838', '-7.998819351', 'Av Abd Lakrime Lkhetabi', 0, 'v', NULL, 1, NULL),
(20, 5, 2, 6, '2014-05-07 00:00:00', '31.62809838', '-7.998819351', 'Menara', 1, 'v', NULL, 1, NULL),
(21, 5, 3, 4, '2014-05-11 00:00:00', '31.62809838', '-7.998819351', 'Menara', 1, 'v', NULL, 3, NULL),
(22, 4, 4, 4, '2014-05-17 00:00:00', '31.62809838', '-7.998819351', 'Av Abd Lakrime Lkhetabi', 2, 't', NULL, 3, NULL),
(23, 4, 4, 4, '2014-05-17 00:00:00', '31.629506', '-8.077204', 'Adr', 0, 'v', NULL, 3, NULL),
(24, 3, 2, 2, '2014-05-23 00:00:00', '31.62809838', '-7.998819351', 'Av Abd Lakrime Lkhetabi', 2, 'v', NULL, 2, NULL),
(25, 1, 1, 1, '2014-05-23 00:00:00', '31.62809838', '-7.998819351', 'Adresse', 0, 't', NULL, 1, NULL),
(26, 1, 1, 1, '2014-05-23 00:00:00', '31.62809838', '-7.998819351', 'Adresse', 1, 'v', NULL, 1, NULL),
(27, 2, 2, 1, '2014-05-23 00:00:00', '31.62809838', '-7.998819351', 'Av Abd Lakrime Lkhetabi', 0, 'v', NULL, 3, NULL),
(28, 1, 2, 1, '2014-05-23 00:00:00', '31.62809838', '-7.998819351', 'Adresse', 0, 't', NULL, 3, NULL),
(29, 3, 1, 2, '2014-05-23 00:00:00', '31.62809838', '-7.998819351', 'Adresse', 0, 't', NULL, 1, NULL),
(30, 2, 2, 2, '2014-05-23 00:00:00', '31.62809838', '-7.998819351', 'Adresse', 0, 't', NULL, 2, NULL),
(31, 5, 3, 4, '2014-05-23 00:00:00', '31.62809838', '-7.998819351', 'Adresse', 2, 'v', NULL, 4, NULL),
(32, 6, 1, 3, '2014-05-25 00:00:00', '31.62809838', '-8.077204', 'Menara', 1, 'v', NULL, 1, NULL),
(33, NULL, 1, 1, '2014-05-30 09:36:19', '0.0', '0.0', 'Adresse', 0, 't', 'Cause : Aucune Information Degats : m', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `declaration_user`
--

CREATE TABLE IF NOT EXISTS `declaration_user` (
  `declaration_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`declaration_id`,`user_id`),
  KEY `IDX_4643651C06258A3` (`declaration_id`),
  KEY `IDX_4643651A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE IF NOT EXISTS `etablissement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL,
  `designation` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `x` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `y` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_938312D9C54C8C93` (`type_id`),
  KEY `IDX_938312D9A73F0036` (`ville_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `etablissement`
--

INSERT INTO `etablissement` (`id`, `type_id`, `designation`, `x`, `y`, `adresse`, `image`, `ville_id`) VALUES
(1, 2, 'Poste Nakhile', '31.2', '-8.0123', 'Avenue Abdelkarim El Khattabi Gueliz Marrakech', NULL, 1),
(2, 1, 'Ibn Tachefin 2', '31.253', '-8.01278', 'Avenue Abdelkarim El Khattabi 2 Gueliz Marrakech', 'jpeg', 1),
(3, 2, 'Fes agdal', '-31.258741', '9.201452', 'Fes Avenue agdal Hay salam', 'png', 4),
(4, 1, 'CHU', '-32.125048', '8.023647', 'Avenues les ambassadeurs', 'png', 6);

-- --------------------------------------------------------

--
-- Structure de la table `etatdeclaration`
--

CREATE TABLE IF NOT EXISTS `etatdeclaration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `etatdeclaration`
--

INSERT INTO `etatdeclaration` (`id`, `libelle`) VALUES
(1, 'Nouvelle'),
(2, 'En Attente'),
(3, 'En Cours'),
(4, 'Résolue'),
(5, 'Non Résolue'),
(6, 'Fausse Déclaration');

-- --------------------------------------------------------

--
-- Structure de la table `nationalite`
--

CREATE TABLE IF NOT EXISTS `nationalite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `nationalite`
--

INSERT INTO `nationalite` (`id`, `libelle`) VALUES
(1, 'Marocaine'),
(2, 'Francaise'),
(3, 'Espagnole'),
(4, 'Américaine'),
(5, 'Anglaise'),
(6, 'Italienne'),
(7, 'Algérienne'),
(8, 'Tunisienne'),
(9, 'Egyptienne'),
(10, 'Portugaise');

-- --------------------------------------------------------

--
-- Structure de la table `typedeclaration`
--

CREATE TABLE IF NOT EXISTS `typedeclaration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `typedeclaration`
--

INSERT INTO `typedeclaration` (`id`, `libelle`) VALUES
(1, 'Accident'),
(2, 'Incendie'),
(3, 'Vol Personne'),
(4, 'Vol Habitation'),
(5, 'Vol Vehicule'),
(6, 'Ambulance'),
(7, 'Innondation'),
(8, 'Infraction du code de la route'),
(9, 'Embouteillage');

-- --------------------------------------------------------

--
-- Structure de la table `typeetablissement`
--

CREATE TABLE IF NOT EXISTS `typeetablissement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `typeetablissement`
--

INSERT INTO `typeetablissement` (`id`, `libelle`) VALUES
(1, 'Hopital'),
(2, 'Commissariat');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matricule` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastX` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastY` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2DA1797792FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_2DA17977A0D96FBF` (`email_canonical`),
  KEY `IDX_2DA17977A73F0036` (`ville_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `adresse`, `tel`, `matricule`, `nom`, `type`, `lastX`, `lastY`, `image`, `ville_id`) VALUES
(1, 'superadmin', 'superadmin', 'superadmin@Najdah.com', 'superadmin@najdah.com', 1, 'a21f98kyibs4wgs8kc4k00k0kggckgo', 'WzQYvt4wjy9flTeT3MoPTzZzmCVbJnd94uwKI7rXdAtDkVELoodFt7kihj07H8u+DOvurWrbwdz3F1iOV5pZYA==', '2014-05-30 09:35:39', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL, 'Adresse', '0633676273', 'M458693', 'MOUNJI Said', 'l', NULL, NULL, NULL, 4),
(2, 'admin', 'admin', 'admin@Najdah.com', 'admin@najdah.com', 1, 'gpmjhfqkra0cgkgwg0cok888gw088gs', 'Luu11pG995xh4u8HoZ97Bei35fXcheaMc59RGO48uvDGDeRD0UWRBdIZWINHvTXYk4AAi5QuhM9jc/Mh+drLiw==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '62, HAY NAHDA, Fes', '0666666666', 'M75418', 'Brahim BELEGHMI', 'l', NULL, NULL, 'jpeg', 4),
(3, 'erraji', 'erraji', 'erraji@Najdah.com', 'erraji@najdah.com', 1, '7qmknl43xzwgggggwccc44w0084w4s4', 'glaCSGhX9Kn+ZA92LTV3TklABwUynAPGwFfn5CJ8aFq+YuBiIiSdSC+aswJBP7hmDgoeIOaG9/zeHrJoDn9QiA==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '45, Hay G, Marrakech', '0666666666', 'P78496', 'ERRAJI Soukaina', 'm', NULL, NULL, 'jpeg', 1),
(4, 'souad', 'souad', 'souad@Najdah.com', 'souad@najdah.com', 1, 'q0p7curev1cg448okk88800808kw8ss', 'dbqERmO+BCAIXYnfm9hOddRfBlEBdMwFHcdZ2FZRgW6iL3GLS81Od77RSZZhtyTOWnbdpr9Og84gex97uLho/w==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Adr', '0666666666', 'P784964', 'Saoud', 'm', NULL, NULL, 'jpeg', 6),
(5, 'hajar', 'hajar', 'hajar@Najdah.com', 'hajar@najdah.com', 1, '7ah81363fnk00kwowk0cks0g88w4808', '7nvjlj9KN+ZjHGBnrYdzImVgiZ1sU/J2hcbXKBgAe1XwCbOyPhBkYd5iYwavupVDUXTl2/Jfm9F2NGtJwfF5OA==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Adr', '0666666666', 'P75426', 'HAJAR', 'm', NULL, NULL, 'jpeg', 8),
(6, 'afaf', 'afaf', 'afaf@Najdah.com', 'afaf@najdah.com', 1, 'mehqcb0opfkw4gowss0w04gowoc8sws', 'R7SQg7R7ZPrAU0mGDGO3CZ5i+S2n9lZ2grmi6VSCZymOpY/RzDb48km+KCnI0WVhvvkB5Q3+HYaoG9ET+xi7vA==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Adr', '0666666666', 'P485', 'Afaf', 'm', NULL, NULL, 'jpeg', 6),
(7, 'adminpolicier', 'adminpolicier', 'adminpolicier@Najdah.com', 'adminpolicier@najdah.com', 1, '4q3k187bwa2o4kog0ssw0804s4kocow', 'XWXrfhhPtndRxUQAZoZlfrd7jU0rpPuBc2u6YMC3no4pFeZbR1t9xuLpoLlzjBubUvNvzAPYgnP8rPkI8pYPHA==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:13:"ROLE_POLICIER";}', 0, NULL, 'Adr', '0666666666', 'M74856', 'Roussi Abel', 'l', NULL, NULL, 'jpeg', 5),
(8, 'felja', 'felja', 'felja@Najdah.com', 'felja@najdah.com', 1, '8mxdqqxavpk4ko88cscsoso4c8ks8s0', 'UZ3EUWANGd7jKpuN2nLAmwE49E7kn/j/5vqOl5it7AFys9MZ8p2+e2Ye4r9SLu4Z1Rhj2ZX9iCsS4B9HHnb0lQ==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'adresse', '0666666666', 'P5846', 'Marouane FELJA', 'm', NULL, NULL, 'jpeg', 3),
(9, 'salwa', 'salwa', 'salwa@Najdah.com', 'salwa@najdah.com', 1, 'pfjac2yqvgg4gww0ggoskgo4k8owkso', 'hbiiPrDXDErInRPlVahLQ09mdC2fTZ6X7OsQLTSDcEkvWCioBGdKy2IfJHRa2kf0kcVV5x1HGwNTh+p5wY3FjQ==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'adresse', '0666666666', 'M84963', 'SALWA', 'l', NULL, NULL, 'jpeg', 7),
(10, 'policier', 'policier', 'policier@Najdah.com', 'policier@najdah.com', 1, 'o0ywsgl1mn4k8cco4gkcoo84wc4k8sg', 'jOtVNj80xAfozkFDwXkevwAlNU2w7Z3/BcZPOS0VmjdHJLVjxW8tow8q3X/z/mQCN1+oO7s6Bco/Ntkdm26gHA==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:13:"ROLE_POLICIER";}', 0, NULL, 'Adr', '0666666666', 'M8547', 'DANI Fouad', 'l', NULL, NULL, 'jpeg', 2),
(11, 'adminpompier', 'adminpompier', 'adminpompier@Najdah.com', 'adminpompier@najdah.com', 1, '4ebsinftz668go4o0o4ss84k800oksg', 't2gzergcKfiI2ZQ5f4APCn+zSFCKQDM3zajY+T+CKVoD1HgjyPYLRnzBEO7Ge3C5/TN7wflvonQpz8hhpJRppA==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:18:"ROLE_ADMIN_POMPIER";}', 0, NULL, 'adresse', '0666666666', 'P4587966', 'Achraf', 'm', NULL, NULL, 'jpeg', 5),
(12, 'pompier', 'pompier', 'pompier@Najdah.com', 'pompier@najdah.com', 1, 'e59b2ui2csg0cgksk0c800gwkg4oksw', 'do6agz1szGUVHT48La2cadRqft0gXg7EBi8i11PecJQXtO0xPhzO/+UtHi1VlUPo7l5ekmt3mRN9nEahmPvVNA==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:12:"ROLE_POMPIER";}', 0, NULL, 'Adr', '0666666666', 'P555555', 'Romani', 'm', NULL, NULL, 'jpeg', 6),
(13, 'walid', 'walid', 'walid@Najdah.com', 'walid@najdah.com', 1, 'chn136nofio800kk804kow8cwk4ss4g', 'tKeClXm4vrMJpF8ArFKzm/Gqgj6WvLPcTghpz+fq4w6u01uk7LdJctK10MIbuZT4x2tNwCINkpNn8kMLgNqXjA==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Adr', '0666666666', 'M78496', 'WALID', 'l', NULL, NULL, 'jpeg', 7);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`id`, `libelle`) VALUES
(1, 'Marrakech'),
(2, 'Agadir'),
(3, 'Rabat'),
(4, 'Fes'),
(5, 'Tanger'),
(6, 'Casablanca'),
(7, 'Meknes'),
(8, 'Dakhla');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `attachement`
--
ALTER TABLE `attachement`
  ADD CONSTRAINT `FK_168096B6C06258A3` FOREIGN KEY (`declaration_id`) REFERENCES `declaration` (`id`);

--
-- Contraintes pour la table `citoyen`
--
ALTER TABLE `citoyen`
  ADD CONSTRAINT `FK_41C3CF301B063272` FOREIGN KEY (`nationalite_id`) REFERENCES `nationalite` (`id`),
  ADD CONSTRAINT `FK_41C3CF30A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`);

--
-- Contraintes pour la table `declaration`
--
ALTER TABLE `declaration`
  ADD CONSTRAINT `FK_FC3F551543787BBA` FOREIGN KEY (`citoyen_id`) REFERENCES `citoyen` (`id`),
  ADD CONSTRAINT `FK_FC3F5515A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`),
  ADD CONSTRAINT `FK_FC3F5515C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `typedeclaration` (`id`),
  ADD CONSTRAINT `FK_FC3F5515D5E86FF` FOREIGN KEY (`etat_id`) REFERENCES `etatdeclaration` (`id`);

--
-- Contraintes pour la table `declaration_user`
--
ALTER TABLE `declaration_user`
  ADD CONSTRAINT `FK_4643651A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4643651C06258A3` FOREIGN KEY (`declaration_id`) REFERENCES `declaration` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD CONSTRAINT `FK_938312D9A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`),
  ADD CONSTRAINT `FK_938312D9C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `typeetablissement` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_2DA17977A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
