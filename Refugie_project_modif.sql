-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 23 nov. 2017 à 12:20
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

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

CREATE TABLE `camp` (
  `IdCamp` int(11) NOT NULL,
  `NbPlacesMax` int(11) NOT NULL,
  `NbPlacesDispo` double NOT NULL,
  `Ville` varchar(45) DEFAULT NULL,
  `idCentrale` int(11) DEFAULT NULL,
  `Alerte_Stock` tinyint(4) DEFAULT NULL,
  `Alerte_Surpop` tinyint(4) DEFAULT NULL,
  `IdNationalite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `camp`
--

INSERT INTO `camp` (`IdCamp`, `NbPlacesMax`, `NbPlacesDispo`, `Ville`, `idCentrale`, `Alerte_Stock`, `Alerte_Surpop`, `IdNationalite`) VALUES
(1, 1500, 1500, 'Calais ', 1, 0, 0, 209),
(2, 500, 500, 'M Bour', NULL, NULL, NULL, NULL),
(3, 400, 400, 'Bangalore', NULL, NULL, NULL, NULL),
(4, 800, 800, 'Douala', NULL, NULL, NULL, NULL),
(5, 700, 700, 'Chittagong', NULL, NULL, NULL, NULL),
(6, 800, 800, 'Cluj', NULL, NULL, NULL, NULL),
(7, 120, 120, 'Lampedusa ', NULL, NULL, NULL, NULL),
(8, 950, 950, 'Rancagua ', NULL, NULL, NULL, NULL),
(9, 980, 980, 'Keren', NULL, NULL, NULL, NULL),
(10, 140, 140, 'Santiago de Cuba ', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `centrale`
--

CREATE TABLE `centrale` (
  `IdCentrale` int(11) NOT NULL,
  `NomCentrale` varchar(45) NOT NULL,
  `IdNationalite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `centrale`
--

INSERT INTO `centrale` (`IdCentrale`, `NomCentrale`, `IdNationalite`) VALUES
(1, 'Centrale HT', 209);

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `IdMateriel` int(11) NOT NULL,
  `NomMateriel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `nationalite` (
  `IdNationalite` int(11) NOT NULL,
  `NomPays` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(49, 'Cote d Ivoire '),
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
(208, 'Zimbabwe '),
(209, 'France');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `IdPersonnel` int(11) NOT NULL,
  `Login` varchar(45) COLLATE utf8_bin NOT NULL,
  `Mdp` varchar(45) COLLATE utf8_bin NOT NULL,
  `Role` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`IdPersonnel`, `Login`, `Mdp`, `Role`) VALUES
(1, 'Benevole', '*******', 'Personnel administratif '),
(2, 'Centrale ', '*******', 'Gestionnaire centrale '),
(3, 'Stockingman', '*******', 'Gestionnaire stock'),
(4, 'Root', '*******', 'Administrateur ');

-- --------------------------------------------------------

--
-- Structure de la table `quantitecamp`
--

CREATE TABLE `quantitecamp` (
  `IdCamp` int(11) NOT NULL,
  `IdMateriel` int(11) NOT NULL,
  `AlerteQtCamp` tinyint(4) DEFAULT NULL,
  `QtCamp` int(11) DEFAULT NULL,
  `QuantiteMax` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `quantitecamp`
--

INSERT INTO `quantitecamp` (`IdCamp`, `IdMateriel`, `AlerteQtCamp`, `QtCamp`, `QuantiteMax`) VALUES
(1, 2, NULL, NULL, NULL),
(1, 3, NULL, NULL, NULL),
(1, 4, NULL, NULL, NULL),
(1, 5, NULL, NULL, NULL),
(1, 6, NULL, NULL, NULL),
(1, 7, NULL, NULL, NULL),
(1, 8, NULL, NULL, NULL),
(2, 1, NULL, NULL, NULL),
(2, 2, NULL, NULL, NULL),
(2, 3, NULL, NULL, NULL),
(2, 4, NULL, NULL, NULL),
(2, 5, NULL, NULL, NULL),
(2, 6, NULL, NULL, NULL),
(2, 7, NULL, NULL, NULL),
(2, 8, NULL, NULL, NULL),
(3, 1, NULL, NULL, NULL),
(3, 2, NULL, NULL, NULL),
(3, 3, NULL, NULL, NULL),
(3, 4, NULL, NULL, NULL),
(3, 5, NULL, NULL, NULL),
(3, 6, NULL, NULL, NULL),
(3, 7, NULL, NULL, NULL),
(3, 8, NULL, NULL, NULL),
(4, 1, NULL, NULL, NULL),
(4, 2, NULL, NULL, NULL),
(4, 3, NULL, NULL, NULL),
(4, 4, NULL, NULL, NULL),
(4, 5, NULL, NULL, NULL),
(4, 6, NULL, NULL, NULL),
(4, 7, NULL, NULL, NULL),
(4, 8, NULL, NULL, NULL),
(5, 1, NULL, NULL, NULL),
(5, 2, NULL, NULL, NULL),
(5, 3, NULL, NULL, NULL),
(5, 4, NULL, NULL, NULL),
(5, 5, NULL, NULL, NULL),
(5, 6, NULL, NULL, NULL),
(5, 7, NULL, NULL, NULL),
(5, 8, NULL, NULL, NULL),
(6, 1, NULL, NULL, NULL),
(6, 2, NULL, NULL, NULL),
(6, 3, NULL, NULL, NULL),
(6, 4, NULL, NULL, NULL),
(6, 5, NULL, NULL, NULL),
(6, 6, NULL, NULL, NULL),
(6, 7, NULL, NULL, NULL),
(6, 8, NULL, NULL, NULL),
(7, 1, NULL, NULL, NULL),
(7, 2, NULL, NULL, NULL),
(7, 3, NULL, NULL, NULL),
(7, 4, NULL, NULL, NULL),
(7, 5, NULL, NULL, NULL),
(7, 6, NULL, NULL, NULL),
(7, 7, NULL, NULL, NULL),
(7, 8, NULL, NULL, NULL),
(8, 1, NULL, NULL, NULL),
(8, 2, NULL, NULL, NULL),
(8, 3, NULL, NULL, NULL),
(8, 4, NULL, NULL, NULL),
(8, 5, NULL, NULL, NULL),
(8, 6, NULL, NULL, NULL),
(8, 7, NULL, NULL, NULL),
(8, 8, NULL, NULL, NULL),
(9, 1, NULL, NULL, NULL),
(9, 2, NULL, NULL, NULL),
(9, 3, NULL, NULL, NULL),
(9, 4, NULL, NULL, NULL),
(9, 5, NULL, NULL, NULL),
(9, 6, NULL, NULL, NULL),
(9, 7, NULL, NULL, NULL),
(9, 8, NULL, NULL, NULL),
(10, 1, NULL, NULL, NULL),
(10, 2, NULL, NULL, NULL),
(10, 3, NULL, NULL, NULL),
(10, 4, NULL, NULL, NULL),
(10, 5, NULL, NULL, NULL),
(10, 6, NULL, NULL, NULL),
(10, 7, NULL, NULL, NULL),
(10, 8, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `quantitecentrale`
--

CREATE TABLE `quantitecentrale` (
  `IdCentrale` int(11) NOT NULL,
  `IdMateriel` int(11) NOT NULL,
  `QtCentrale` int(11) DEFAULT NULL,
  `AlerteQtCentrale` tinyint(4) DEFAULT NULL,
  `QuantiteMax` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `refugies`
--

CREATE TABLE `refugies` (
  `IdRefugies` int(11) NOT NULL,
  `Nom` varchar(60) DEFAULT NULL,
  `Prenom` varchar(60) DEFAULT NULL,
  `DateNaiss` date DEFAULT NULL,
  `Illetre` tinyint(4) NOT NULL,
  `Blesse` tinyint(4) NOT NULL,
  `Conscient` tinyint(4) DEFAULT NULL,
  `idNationalite` int(11) NOT NULL,
  `idCamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `refugies`
--

INSERT INTO `refugies` (`IdRefugies`, `Nom`, `Prenom`, `DateNaiss`, `Illetre`, `Blesse`, `Conscient`, `idNationalite`, `idCamp`) VALUES
(31, 'Rayez', 'FranÃ§ois', '1996-06-22', 0, 0, 1, 110, 7),
(35, 'Pluyette', 'Ã‰lisa', '1996-02-13', 0, 1, 0, 112, 8),
(36, 'Babior', 'JÃ©rÃ©my', '1996-05-21', 1, 1, 0, 23, 6),
(37, 'Crampon', 'Louise', '1996-05-04', 1, 0, 1, 26, 9);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `camp`
--
ALTER TABLE `camp`
  ADD PRIMARY KEY (`IdCamp`),
  ADD KEY `fk_camp_centrale` (`idCentrale`),
  ADD KEY `IdNationalite` (`IdNationalite`) USING BTREE;

--
-- Index pour la table `centrale`
--
ALTER TABLE `centrale`
  ADD PRIMARY KEY (`IdCentrale`),
  ADD KEY `Pays` (`IdNationalite`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`IdMateriel`);

--
-- Index pour la table `nationalite`
--
ALTER TABLE `nationalite`
  ADD PRIMARY KEY (`IdNationalite`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`IdPersonnel`);

--
-- Index pour la table `quantitecamp`
--
ALTER TABLE `quantitecamp`
  ADD PRIMARY KEY (`IdCamp`,`IdMateriel`),
  ADD KEY `fk_quantite_materiel` (`IdMateriel`),
  ADD KEY `IdCamp` (`IdCamp`);

--
-- Index pour la table `quantitecentrale`
--
ALTER TABLE `quantitecentrale`
  ADD PRIMARY KEY (`IdCentrale`,`IdMateriel`),
  ADD KEY `IdMateriel` (`IdMateriel`),
  ADD KEY `IdCentrale` (`IdCentrale`);

--
-- Index pour la table `refugies`
--
ALTER TABLE `refugies`
  ADD PRIMARY KEY (`IdRefugies`),
  ADD KEY `fk_refugies_natio` (`idNationalite`),
  ADD KEY `fk_refugies_camp` (`idCamp`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `camp`
--
ALTER TABLE `camp`
  MODIFY `IdCamp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `centrale`
--
ALTER TABLE `centrale`
  MODIFY `IdCentrale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `IdMateriel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `nationalite`
--
ALTER TABLE `nationalite`
  MODIFY `IdNationalite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;
--
-- AUTO_INCREMENT pour la table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `IdPersonnel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `refugies`
--
ALTER TABLE `refugies`
  MODIFY `IdRefugies` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `camp`
--
ALTER TABLE `camp`
  ADD CONSTRAINT `fk_camp_centrale` FOREIGN KEY (`idCentrale`) REFERENCES `centrale` (`IdCentrale`);

--
-- Contraintes pour la table `centrale`
--
ALTER TABLE `centrale`
  ADD CONSTRAINT `Pays` FOREIGN KEY (`IdNationalite`) REFERENCES `nationalite` (`idnationalite`);

--
-- Contraintes pour la table `quantitecamp`
--
ALTER TABLE `quantitecamp`
  ADD CONSTRAINT `fk_quantite_camp` FOREIGN KEY (`IdCamp`) REFERENCES `camp` (`IdCamp`),
  ADD CONSTRAINT `fk_quantite_materiel` FOREIGN KEY (`IdMateriel`) REFERENCES `materiel` (`IdMateriel`);

--
-- Contraintes pour la table `refugies`
--
ALTER TABLE `refugies`
  ADD CONSTRAINT `fk_refugies_camp` FOREIGN KEY (`idCamp`) REFERENCES `camp` (`IdCamp`),
  ADD CONSTRAINT `fk_refugies_natio` FOREIGN KEY (`idNationalite`) REFERENCES `nationalite` (`IdNationalite`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
