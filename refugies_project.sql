-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 01 nov. 2017 à 14:04
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `refugies_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `camp`
--


CREATE TABLE IF NOT EXISTS `camp` (
  `IdCamp` int(11) NOT NULL AUTO_INCREMENT,
  `NbPlacesMax` int(11) NOT NULL,
  `NbPlacesDispo` double NOT NULL,
  `Pays` varchar(45) DEFAULT NULL,
  `Ville` varchar(45) DEFAULT NULL,
  `idCentrale` int(11) DEFAULT NULL,
  `Alerte_Stock` tinyint(4) DEFAULT NULL,
  `Alerte_Surpop` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`IdCamp`),
  KEY `fk_camp_centrale` (`idCentrale`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `camp`
--

INSERT INTO `camp` (`IdCamp`, `NbPlacesMax`, `NbPlacesDispo`, `Pays`, `Ville`, `idCentrale`, `Alerte_Stock`, `Alerte_Surpop`) VALUES
(1, 1500, 1500, 'France', 'Calais ', NULL, NULL, NULL),
(2, 500, 500, 'Senegal', 'M\'Bour', NULL, NULL, NULL),
(3, 400, 400, 'Inde', 'Bangalore', NULL, NULL, NULL),
(4, 800, 800, 'Cameroun ', 'Douala', NULL, NULL, NULL),
(5, 700, 700, 'Bangladesh', 'Chittagong', NULL, NULL, NULL),
(6, 800, 800, 'Roumanie ', 'Cluj', NULL, NULL, NULL),
(7, 120, 120, 'Italie ', 'Lampedusa ', NULL, NULL, NULL),
(8, 950, 950, 'Chili', 'Rancagua ', NULL, NULL, NULL),
(9, 980, 980, 'Erithrée', 'Keren', NULL, NULL, NULL),
(10, 140, 140, 'Cuba', 'Santiago de Cuba ', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `centrale`
--

DROP TABLE IF EXISTS `centrale`;
CREATE TABLE IF NOT EXISTS `centrale` (
  `IdCentrale` int(11) NOT NULL AUTO_INCREMENT,
  `NomCentrale` varchar(45) NOT NULL,
  `Continent` varchar(45) NOT NULL,
  `Pays` varchar(45) NOT NULL,
  PRIMARY KEY (`IdCentrale`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `centrale`
--

INSERT INTO `centrale` (`IdCentrale`, `NomCentrale`, `Continent`, `Pays`) VALUES
(1, 'FNFC', 'Europe', 'France '),
(2, 'AfricaSOS', 'Afrique', 'Benin '),
(3, 'LoveArmy ', 'Afrique', 'Sénegal '),
(4, 'AsiaForLove', 'Asie', 'Inde'),
(5, 'MexicoLoveArmy', 'Amérique', 'Mexique');

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `IdMateriel` int(11) NOT NULL AUTO_INCREMENT,
  `NomMateriel` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdMateriel`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`IdMateriel`, `NomMateriel`) VALUES
(1, 'Cuve eau'),
(2, 'Ration alimentaire'),
(3, 'Lit'),
(4, 'Couverture'),
(5, 'Vetement'),
(6, 'Tente'),
(7, 'Kit lavage'),
(8, 'Medicament');

-- --------------------------------------------------------

--
-- Structure de la table `nationalite`
--

DROP TABLE IF EXISTS `nationalite`;
CREATE TABLE IF NOT EXISTS `nationalite` (
  `IdNationalite` int(11) NOT NULL AUTO_INCREMENT,
  `NomPays` varchar(45) NOT NULL,
  PRIMARY KEY (`IdNationalite`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nationalite`
--

INSERT INTO `nationalite` (`IdNationalite`, `NomPays`) VALUES
(1, 'Afghanistan'),
(2, 'Afrique du Sud '),
(3, 'Albanie '),
(4, 'Algerie '),
(5, 'Allemagne '),
(6, 'Andorre'),
(7, 'Angola'),
(8, 'Antigua et Barbuda'),
(9, 'Arabie Saoudite'),
(10, 'Argentine'),
(11, 'Arménie'),
(12, 'Australie'),
(13, 'Autriche'),
(14, 'Azerbaidjan'),
(15, 'Bahamas'),
(16, 'Bahrein'),
(17, 'Bangladesh'),
(18, 'Barbade'),
(19, 'Belgique'),
(20, 'Belize'),
(21, 'Bénin'),
(22, 'Bermudes'),
(23, 'Boutan'),
(24, 'Bielorussie'),
(25, 'Birmanie'),
(26, 'Bolivie'),
(27, 'Bosnie-Herzégovine'),
(28, 'Bostwana'),
(29, 'Brésil'),
(30, 'Brunei'),
(31, 'Bulgarie'),
(32, 'Burkina Faso'),
(33, 'Burundi'),
(34, 'Cambodge '),
(35, 'Cameroun'),
(36, 'Canada '),
(37, 'Cap Vert '),
(38, 'Iles Cayman'),
(39, 'Centre Afrique'),
(40, 'Chili '),
(41, 'Chine '),
(42, 'Chypre '),
(43, 'Colombie'),
(44, 'Comores '),
(45, 'Congo '),
(46, 'Coréé du nord '),
(47, 'Coréé du sud '),
(48, 'Costa Rica '),
(49, 'Cote d\'Ivoire '),
(50, 'Croatie '),
(51, 'Cuba '),
(52, 'Danemark '),
(53, 'Djibouti '),
(54, 'Dominique '),
(55, 'République domicaine'),
(56, 'Egypte'),
(57, 'Emirats Arabes Unis'),
(58, 'Equateur'),
(59, 'Erythrée'),
(60, 'Espagne'),
(61, 'Estonie'),
(62, 'Etats-Unis'),
(63, 'Ethiopie'),
(64, 'Iles Féroé'),
(65, 'Fidji'),
(66, 'Finlande'),
(67, 'Gabon'),
(68, 'Gambie'),
(69, 'Georgie '),
(70, 'Ghana'),
(71, 'Grece '),
(72, 'Grenade '),
(73, 'Groenland'),
(74, 'Guatemala'),
(75, 'Guinée '),
(76, 'Guinée bissau'),
(77, 'Guinée equatoriale '),
(78, 'Guyana '),
(79, 'Haïti '),
(80, 'Honduras '),
(81, 'Hong kong '),
(82, 'Hongrie  '),
(83, 'Iles Anglo Normandes'),
(84, 'Inde'),
(85, 'Indonésie'),
(86, 'Irak'),
(87, 'Iran'),
(88, 'Irlande'),
(89, 'Irlande du Nord'),
(90, 'Islande'),
(91, 'Israël'),
(92, 'Italie'),
(93, 'Jamaïque'),
(94, 'Japon'),
(95, 'Jordanie'),
(96, 'Kazakhstan'),
(97, 'Kenya '),
(98, 'Kirghizstan'),
(99, 'Kiribati'),
(100, 'Kosovo'),
(101, 'Koweït'),
(102, 'Laos '),
(103, 'Lesotho'),
(104, 'Lettonie '),
(105, 'Liban'),
(106, 'Liberia '),
(107, 'Libye '),
(108, 'Liechtenstein'),
(109, 'Lituanie '),
(110, 'Luxembourg'),
(111, 'Macau'),
(112, 'Macedoine'),
(113, 'Madagascar'),
(114, 'Malaisie'),
(115, 'Malawi'),
(116, 'Maldives'),
(117, 'Mali'),
(118, 'Malouines'),
(119, 'Malte'),
(120, 'Maroc'),
(121, 'Marshall'),
(122, 'Maurice'),
(123, 'Mauritanie'),
(124, 'Mexique'),
(125, 'Micronésie'),
(126, 'Moldavie'),
(127, 'Monaco'),
(128, 'Mongolie'),
(129, 'Montenegro'),
(130, 'Mozambique'),
(131, 'Namibie'),
(132, 'Nauru'),
(133, 'Népal'),
(134, 'Nicaragua'),
(135, 'Niger'),
(136, 'Nigeria'),
(137, 'Norvège'),
(138, 'Nouvelle-Calédonie'),
(139, 'Nouvelle-Zélande'),
(140, 'Oman '),
(141, 'Ouganda '),
(142, 'Ouzbekistan'),
(143, 'Pakistan'),
(144, 'Palau'),
(145, 'Palestine '),
(146, 'Panama'),
(147, 'Papouasie '),
(148, 'Paraguay '),
(149, 'Pays-Bas '),
(150, 'Pérou '),
(151, 'Phillipines '),
(152, 'Pologne '),
(153, 'Porto-Rico'),
(154, 'Portugal'),
(155, 'Qatar'),
(156, 'Republique Dominicaine'),
(157, 'Republique Tchèque'),
(158, 'Roumanie'),
(159, 'Royaume-Uni'),
(160, 'Russie'),
(161, 'Rwanda'),
(162, 'Saint Christophe et Nevis'),
(163, 'Saint Marin'),
(164, 'Saint Vincent et les Grenadines'),
(165, 'Sainte Helene'),
(166, 'Sainte Lucie'),
(167, 'Salomon'),
(168, 'Salvador'),
(169, 'Samoa'),
(170, 'Saotomé et Principe'),
(171, 'Senegal'),
(172, 'Serbie'),
(173, 'Seychelles'),
(174, 'Sierra Leone'),
(175, 'Singapour'),
(176, 'Slovaquie'),
(177, 'Slovénie'),
(178, 'Somalie'),
(179, 'Soudan'),
(180, 'Sri Lanka'),
(181, 'Suede'),
(182, 'Surinam'),
(183, 'Syrie'),
(184, 'Swaziland'),
(185, 'Tadjikistan'),
(186, 'Taiwan'),
(187, 'Tanzanie '),
(188, 'Tchad '),
(189, 'Thaïlande '),
(190, 'Tibet '),
(191, 'Timore oriental'),
(192, 'Togo '),
(193, 'Tonga '),
(194, 'Trinité et tobago '),
(195, 'Tunisie '),
(196, 'Turkménistan'),
(197, 'Turquie '),
(198, 'Tuvalu'),
(199, 'Ukraine '),
(200, 'Uruguay'),
(201, 'Vanuatu '),
(202, 'Vatican '),
(203, 'Venezuela '),
(204, 'Vietnam '),
(205, 'Vierges Americaines '),
(206, 'Yemen '),
(207, 'Zambie '),
(208, 'Zimbabwe ');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `IdPersonnel` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(45) NOT NULL,
  `Mdp` varchar(45) NOT NULL,
  `Role` varchar(45) NOT NULL,
  `idcamp` int(11) NOT NULL,
  PRIMARY KEY (`IdPersonnel`),
  KEY `fk_personnel_camp` (`idcamp`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`IdPersonnel`, `Login`, `Mdp`, `Role`, `idcamp`) VALUES
(1, 'Benevole', '*******', 'Personnel administratif ', 1),
(2, 'Centrale ', '*******', 'Gestionnaire centrale ', 2),
(3, 'Stockingman', '*******', 'Gestionnaire stock', 3),
(4, 'Root', '*******', 'Administrateur ', 4);

-- --------------------------------------------------------

--
-- Structure de la table `quantite`
--

DROP TABLE IF EXISTS `quantite`;
CREATE TABLE IF NOT EXISTS `quantite` (
  `IdCamp` int(11) NOT NULL,
  `IdMateriel` int(11) NOT NULL,
  PRIMARY KEY (`IdCamp`,`IdMateriel`),
  KEY `fk_quantite_materiel` (`IdMateriel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `quantite`
--

INSERT INTO `quantite` (`IdCamp`, `IdMateriel`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(1, 6),
(2, 6),
(3, 6),
(4, 6),
(5, 6),
(6, 6),
(7, 6),
(8, 6),
(9, 6),
(10, 6),
(1, 7),
(2, 7),
(3, 7),
(4, 7),
(5, 7),
(6, 7),
(7, 7),
(8, 7),
(9, 7),
(10, 7),
(1, 8),
(2, 8),
(3, 8),
(4, 8),
(5, 8),
(6, 8),
(7, 8),
(8, 8),
(9, 8),
(10, 8);

-- --------------------------------------------------------

--
-- Structure de la table `refugies`
--

DROP TABLE IF EXISTS `refugies`;
CREATE TABLE IF NOT EXISTS `refugies` (
  `IdRefugies` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(60) DEFAULT NULL,
  `Prenom` varchar(60) DEFAULT NULL,
  `DateNaiss` date DEFAULT NULL,
  `Illetre` tinyint(4) NOT NULL,
  `Blesse` tinyint(4) NOT NULL,
  `Identifie` tinyint(4) DEFAULT NULL,
  `idNationalite` int(11) NOT NULL,
  `idCamp` int(11) NOT NULL,
  PRIMARY KEY (`IdRefugies`),
  KEY `fk_refugies_natio` (`idNationalite`),
  KEY `fk_refugies_camp` (`idCamp`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `refugies`
--

INSERT INTO `refugies` (`IdRefugies`, `Nom`, `Prenom`, `DateNaiss`, `Illetre`, `Blesse`, `Identifie`, `idNationalite`, `idCamp`) VALUES
(1, 'Mapou', 'Yanga ', '1992-10-12', 1, 1, 0, 1, 1),
(2, 'Sczyglowski', 'Miroslav', '1984-03-04', 0, 0, 0, 1, 1),
(3, 'Bastardo', 'Antonio', '1997-11-24', 1, 0, 0, 1, 1),
(4, 'Low', 'Joaquim', '1978-06-14', 0, 0, 0, 2, 2),
(5, 'Vauchiasse ', 'Thomas', '1998-01-01', 1, 1, 0, 3, 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `camp`
--
ALTER TABLE `camp`
  ADD CONSTRAINT `fk_camp_centrale` FOREIGN KEY (`idCentrale`) REFERENCES `centrale` (`IdCentrale`);

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `fk_personnel_camp` FOREIGN KEY (`idcamp`) REFERENCES `camp` (`IdCamp`),
  ADD CONSTRAINT `personnel_ibfk_1` FOREIGN KEY (`idcamp`) REFERENCES `camp` (`IdCamp`);

--
-- Contraintes pour la table `quantite`
--
ALTER TABLE `quantite`
  ADD CONSTRAINT `fk_quantite_camp` FOREIGN KEY (`IdCamp`) REFERENCES `camp` (`IdCamp`),
  ADD CONSTRAINT `fk_quantite_materiel` FOREIGN KEY (`IdMateriel`) REFERENCES `materiel` (`IdMateriel`);

--
-- Contraintes pour la table `refugies`
--
ALTER TABLE `refugies`
  ADD CONSTRAINT `fk_refugies_camp` FOREIGN KEY (`idCamp`) REFERENCES `camp` (`IdCamp`),
  ADD CONSTRAINT `fk_refugies_natio` FOREIGN KEY (`idNationalite`) REFERENCES `nationalite` (`IdNationalite`),
  CHANGE Identifie Conscient TINYINT(4);

ALTER TABLE `refugies` RENAME COLUMN "Identifie" TO "Conscient";
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
