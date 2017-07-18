-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 18 Juillet 2017 à 19:02
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd1`
--

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

CREATE TABLE `diplome` (
  `iddiplome` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `faculte` varchar(50) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `anneeobtention` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `diplome`
--

INSERT INTO `diplome` (`iddiplome`, `type`, `faculte`, `departement`, `anneeobtention`) VALUES
(1, 'zpiefh', 'earge', 'aergre', 0),
(2, 'zpiefh', 'earge', 'aergre', 0),
(3, 'zpiefh', 'earge', 'aergre', 0),
(4, 'oahef', 'earge', 'aergre', 0),
(5, 'zpiefh', 'earge', 'aergre', 0),
(6, 'fzafaerg', 'earge', 'aergre', 1997),
(7, 'oahef', 'earge', 'aergre', 1997),
(8, 'fraz', 'earge', 'aergre', 1997),
(9, 'oahef', 'earge', 'aergre', 1997),
(10, 'lghqlhg', 'PZUGA', 'PIERGAIE', 9279),
(11, 'LZRHOGF', 'DVRRGA', 'EROGJPETJ', 4436),
(12, 'Master', 'FST', 'GI', 2015),
(13, 'Doctorat', 'FSSM', 'GIL', 2017);

-- --------------------------------------------------------

--
-- Structure de la table `diplomee`
--

CREATE TABLE `diplomee` (
  `iddiplomee` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `Datedenaissance` varchar(50) NOT NULL,
  `adressedomicile` varchar(50) NOT NULL,
  `adressetravail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `diplomee`
--

INSERT INTO `diplomee` (`iddiplomee`, `nom`, `prenom`, `Datedenaissance`, `adressedomicile`, `adressetravail`) VALUES
(1, 'mastane', 'jihane', '2016-12-30', 'AAAA', 'AAAA'),
(2, 'Mirrane', 'Adam', '2017-12-31', 'aaaa', 'bbbb'),
(3, 'frfaer', 'jihane', '2017-12-31', 'aaaa', 'ragetg'),
(4, 'zfzrf', 'jihane', '2016-11-30', 'csfvfv', 'ragetg');

-- --------------------------------------------------------

--
-- Structure de la table `fiche`
--

CREATE TABLE `fiche` (
  `idfiche` int(11) NOT NULL,
  `compagne` year(4) NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `idsoli` int(11) NOT NULL,
  `idsoliciteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fiche`
--

INSERT INTO `fiche` (`idfiche`, `compagne`, `datedebut`, `datefin`, `idsoli`, `idsoliciteur`) VALUES
(1, 2047, '1992-10-28', '1987-11-03', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `obtention`
--

CREATE TABLE `obtention` (
  `iddiplomee` int(11) NOT NULL,
  `iddiplome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `obtention`
--

INSERT INTO `obtention` (`iddiplomee`, `iddiplome`) VALUES
(1, 8),
(1, 12),
(2, 13);

-- --------------------------------------------------------

--
-- Structure de la table `organisme`
--

CREATE TABLE `organisme` (
  `idorga` int(11) NOT NULL,
  `nomorga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `organisme`
--

INSERT INTO `organisme` (`idorga`, `nomorga`) VALUES
(1, 'lzhf');

-- --------------------------------------------------------

--
-- Structure de la table `solicitation`
--

CREATE TABLE `solicitation` (
  `idsoli` int(11) NOT NULL,
  `datesoli` date NOT NULL,
  `idorga` int(11) DEFAULT NULL,
  `idsoliciteur` int(11) NOT NULL,
  `idsolicite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `solicitation`
--

INSERT INTO `solicitation` (`idsoli`, `datesoli`, `idorga`, `idsoliciteur`, `idsolicite`) VALUES
(1, '0000-00-00', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `telephone`
--

CREATE TABLE `telephone` (
  `idtel` int(11) NOT NULL,
  `iddiplomee` int(11) DEFAULT NULL,
  `idorga` int(11) DEFAULT NULL,
  `numero` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `telephone`
--

INSERT INTO `telephone` (`idtel`, `iddiplomee`, `idorga`, `numero`) VALUES
(3, 1, NULL, 654447799);

-- --------------------------------------------------------

--
-- Structure de la table `versement`
--

CREATE TABLE `versement` (
  `idvers` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `datevers` date NOT NULL,
  `cotisation` tinyint(1) NOT NULL,
  `idsolicite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `versement`
--

INSERT INTO `versement` (`idvers`, `montant`, `datevers`, `cotisation`, `idsolicite`) VALUES
(23, 4444, '2017-06-16', 1, 4),
(24, 444, '2017-06-14', 0, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD PRIMARY KEY (`iddiplome`);

--
-- Index pour la table `diplomee`
--
ALTER TABLE `diplomee`
  ADD PRIMARY KEY (`iddiplomee`);

--
-- Index pour la table `fiche`
--
ALTER TABLE `fiche`
  ADD PRIMARY KEY (`idfiche`),
  ADD KEY `idsoli` (`idsoli`),
  ADD KEY `idsoliciteur` (`idsoliciteur`);

--
-- Index pour la table `obtention`
--
ALTER TABLE `obtention`
  ADD KEY `iddiplomee` (`iddiplomee`),
  ADD KEY `iddiplome` (`iddiplome`);

--
-- Index pour la table `organisme`
--
ALTER TABLE `organisme`
  ADD PRIMARY KEY (`idorga`);

--
-- Index pour la table `solicitation`
--
ALTER TABLE `solicitation`
  ADD PRIMARY KEY (`idsoli`),
  ADD KEY `idsoliciteur` (`idsoliciteur`),
  ADD KEY `idsolicite` (`idsolicite`),
  ADD KEY `idorga` (`idorga`);

--
-- Index pour la table `telephone`
--
ALTER TABLE `telephone`
  ADD PRIMARY KEY (`idtel`),
  ADD KEY `iddiplomee` (`iddiplomee`),
  ADD KEY `idorga` (`idorga`);

--
-- Index pour la table `versement`
--
ALTER TABLE `versement`
  ADD PRIMARY KEY (`idvers`),
  ADD KEY `idsolicite` (`idsolicite`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `iddiplome` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `diplomee`
--
ALTER TABLE `diplomee`
  MODIFY `iddiplomee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `fiche`
--
ALTER TABLE `fiche`
  MODIFY `idfiche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `organisme`
--
ALTER TABLE `organisme`
  MODIFY `idorga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `solicitation`
--
ALTER TABLE `solicitation`
  MODIFY `idsoli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `telephone`
--
ALTER TABLE `telephone`
  MODIFY `idtel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `versement`
--
ALTER TABLE `versement`
  MODIFY `idvers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `fiche`
--
ALTER TABLE `fiche`
  ADD CONSTRAINT `fiche_ibfk_1` FOREIGN KEY (`idsoli`) REFERENCES `solicitation` (`idsoli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fiche_ibfk_2` FOREIGN KEY (`idsoliciteur`) REFERENCES `diplomee` (`iddiplomee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `obtention`
--
ALTER TABLE `obtention`
  ADD CONSTRAINT `obtention_ibfk_1` FOREIGN KEY (`iddiplomee`) REFERENCES `diplomee` (`iddiplomee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `obtention_ibfk_2` FOREIGN KEY (`iddiplome`) REFERENCES `diplome` (`iddiplome`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `solicitation`
--
ALTER TABLE `solicitation`
  ADD CONSTRAINT `solicitation_ibfk_1` FOREIGN KEY (`idsoliciteur`) REFERENCES `diplomee` (`iddiplomee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitation_ibfk_2` FOREIGN KEY (`idsolicite`) REFERENCES `diplomee` (`iddiplomee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitation_ibfk_3` FOREIGN KEY (`idorga`) REFERENCES `organisme` (`idorga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `telephone`
--
ALTER TABLE `telephone`
  ADD CONSTRAINT `telephone_ibfk_1` FOREIGN KEY (`iddiplomee`) REFERENCES `diplomee` (`iddiplomee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `telephone_ibfk_2` FOREIGN KEY (`idorga`) REFERENCES `organisme` (`idorga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `versement`
--
ALTER TABLE `versement`
  ADD CONSTRAINT `versement_ibfk_1` FOREIGN KEY (`idsolicite`) REFERENCES `diplomee` (`iddiplomee`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

