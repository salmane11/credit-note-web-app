-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 02 juil. 2021 à 18:32
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `credit`
--

-- --------------------------------------------------------

--
-- Structure de la table `caisse`
--

CREATE TABLE `caisse` (
  `id` int(11) NOT NULL,
  `numero cheque` int(11) NOT NULL,
  `somme cheque` double NOT NULL,
  `lcn` varchar(20) NOT NULL,
  `somme lcn` double NOT NULL,
  `vignette` varchar(20) NOT NULL,
  `somme vignette` double NOT NULL,
  `cash` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `caisse`
--

INSERT INTO `caisse` (`id`, `numero cheque`, `somme cheque`, `lcn`, `somme lcn`, `vignette`, `somme vignette`, `cash`) VALUES
(0, 0, 0, '0', 0, '0', 0, 250),
(1, 1, 100, '0', 0, '0', 0, NULL),
(3, 0, 0, '0', 0, '11', 1000, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `credit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `credit`) VALUES
(2, 'laamim', 'imad', 2250),
(3, 'kh', 's', 1001500),
(4, 'sal', 'sal', 5),
(5, 'salim', 'jj', 1000),
(9, 'chafik', 'salmane', 655),
(54, '5', 'salmane', 100);

-- --------------------------------------------------------

--
-- Structure de la table `essence`
--

CREATE TABLE `essence` (
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL,
  `gaingasoil` double NOT NULL,
  `ce1` int(11) NOT NULL,
  `ce2` int(11) NOT NULL,
  `gainessence` double NOT NULL,
  `prix` int(11) NOT NULL,
  `dat` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `essence`
--

INSERT INTO `essence` (`c1`, `c2`, `c3`, `c4`, `c5`, `gaingasoil`, `ce1`, `ce2`, `gainessence`, `prix`, `dat`) VALUES
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-02-08'),
(6, 61, 6, 6, 6, 0, 0, 0, 0, 800, '2021-02-09'),
(100, 150, 120, 150, 100, 0, 0, 0, 0, 5680, '2021-02-09'),
(500, 400, 300, 520, 600, 0, 0, 0, 0, 15800, '2021-02-09'),
(600, 500, 400, 620, 700, 0, 0, 0, 0, 4600, '2021-02-09'),
(100, 100, 100, 100, 100, 0, 0, 0, 0, 4600, '2021-02-09'),
(100, 100, 100, 100, 100, 0, 0, 0, 0, 4600, '2021-02-09'),
(16, 71, 16, 16, 16, 0, 0, 0, 0, 460, '2021-02-10'),
(11, 17, 13, 18, 18, 0, 0, 0, 0, 57, '2021-03-02'),
(12, 18, 20, 19, 17, 0, 0, 0, 0, 122, '2021-03-02'),
(19, 16, 19, 20, 11, 0, 0, 0, 0, 136, '2021-03-02'),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-03-10'),
(10, 10, 10, 10, 10, 0, 10, 10, 0, 650, '2021-03-10'),
(20, 20, 20, 20, 20, 450, 20, 20, 200, 650, '2021-04-05'),
(20, 20, 20, 20, 20, 450, 20, 20, 200, 650, '2021-04-05');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `numerofacture` int(11) NOT NULL,
  `somme de la facture` double NOT NULL,
  `date d'arrivée` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `numero de cheque` int(20) NOT NULL,
  `somme cheque` int(11) NOT NULL,
  `date de creation de cheque` varchar(20) NOT NULL,
  `lcn` int(30) NOT NULL,
  `date de création lcn` varchar(20) NOT NULL,
  `vignette` int(11) NOT NULL,
  `gasoil` int(11) NOT NULL,
  `essence` int(11) NOT NULL,
  `payé` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`numerofacture`, `somme de la facture`, `date d'arrivée`, `numero de cheque`, `somme cheque`, `date de creation de cheque`, `lcn`, `date de création lcn`, `vignette`, `gasoil`, `essence`, `payé`) VALUES
(0, 0, '0000-00-00', 0, 0, '0000-00-00', 0, '0000-00-00', 0, 0, 0, '2021-02-25'),
(1, 260000, '0000-00-00', 2, 100000, '0000-00-00', 60000, '0000-00-00', 100000, 10000, 10000, '5 octobre'),
(2, 121, '0000-00-00', 1, 1, '0000-00-00', 1, '0000-00-00', 1, 1, 1, '2021-02-25'),
(3, 3, '0000-00-00', 3, 4, '0000-00-00', 0, '0000-00-00', 5, 15, 15, '2021-02-25');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `montant` int(11) NOT NULL,
  `operation` varchar(20) NOT NULL,
  `marchandise` varchar(20) NOT NULL,
  `mode` varchar(20) NOT NULL,
  `dat` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`nom`, `prenom`, `montant`, `operation`, `marchandise`, `mode`, `dat`) VALUES
('$nom', '$prenom', 50, 'ajout', '', '', '2021-02-08'),
('laamim', 'imad', 150, 'ajout', '', '', '2021-02-08'),
('laamim', 'imad', 150, 'ajout', '', '', '2021-02-08'),
('laamim', 'imad', 150, 'ajout', '', '', '2021-02-08'),
('laamim', 'imad', 100, 'retranche', '', '', '2021-02-08'),
('laamim', 'imad', 100, 'retranche', '', '', '2021-02-08'),
('chafik', 'salmane', 1000, 'debut credit', '', '', '2021-02-08'),
('chafik', 'salmane', 1000, 'debut credit', '', '', '2021-02-08'),
('chafik', 'salmane', 150, 'ajout', '', '', '2021-02-08'),
('laamim', 'imad', 150, 'retranche', '', '', '2021-02-08'),
('laamim', 'imad', 100, 'ajout', '', '', '2021-02-10'),
('chafik', 'salmane', 200, 'retranche', '', '', '2021-02-10'),
('fhtfth', 'fh', 100, 'debut credit', '', '', '2021-02-10'),
('lmrini', 'ahmed', 1000, 'debut credit', '', '', '2021-02-10'),
('chafik', 'salmane', 100, 'ajout', 'gasoil', '', '2021-03-02'),
('', '', 0, 'ajout', '', '', '2021-03-03'),
('chafik', 'salmane', 100, 'retranche', '', 'cheque', '2021-03-06'),
('chafik', 'salmane', 5, 'ajout', 'l7em', '', '2021-03-06'),
('laamim', 'imad', 150, 'retranche', '', 'cash', '2021-03-06'),
('chafik', 'salmane', 100, 'retranche', '', 'cheque', '2021-03-06'),
('chafik', 'salmane', 100, 'ajout', 'gasoil', '', '2021-03-10'),
('chafik', 'salmane', 100, 'ajout', 'gasoil', '', '2021-03-10'),
('chafik', 'salmane', 150, 'ajout', 'l7em', '', '2021-03-10'),
('', '', 100, 'ajout', 'gasoil', '', '2021-03-10'),
('', '', 100, 'ajout', 'gasoil', '', '2021-03-10'),
('chafik', 'salmane', 100, 'ajout', 'gasoil', '', '2021-03-10'),
('chafik', 'salmane', 150, 'ajout', 'gasoil', '', '2021-03-10'),
('chafik', 'salmane', 200, 'ajout', 'gasoil', '', '2021-03-13'),
('chafik', 'salmane', 100, 'retranche', '', 'cash', '2021-03-13'),
('chafik', 'salmane', 100, 'retranche', '', 'cash', '2021-04-05'),
('chafik', 'salmane', 150, 'retranche', '', 'cash', '2021-04-05'),
('chafik', 'salmane', 100, 'retranche', '', 'cheque', '2021-04-05'),
('chafik', 'salmane', 200, 'ajout', 'gasoil', '', '2021-04-05');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `citerne1` int(11) NOT NULL,
  `citerne2` int(11) NOT NULL,
  `citerne3` int(11) NOT NULL,
  `citerne4` int(11) NOT NULL,
  `citernee1` int(11) NOT NULL,
  `dat` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`citerne1`, `citerne2`, `citerne3`, `citerne4`, `citernee1`, `dat`) VALUES
(19490, 19528, 9739, 60, 20, '2021-02-09');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `caisse`
--
ALTER TABLE `caisse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`numerofacture`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
