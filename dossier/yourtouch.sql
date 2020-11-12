-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 03 fév. 2020 à 12:20
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `yourtouch`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenuArticle` varchar(255) NOT NULL,
  `cheminImage` varchar(255) NOT NULL,
  `dateArticle` date NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idArticle`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idArticle`, `titre`, `contenuArticle`, `cheminImage`, `dateArticle`, `idUser`) VALUES
(1, 'titre pour tester', 'azertyuiopqsdfghjklwxcvbn,dfghjertyuisdfghjdfghjk', '', '2020-02-03', 1),
(2, 'juste un titre', 'dkdjfhdhjkhffndfkhfiekufheurikfherkuiffbkfeznfkfnurfkrfikusdjfnsdkfusdndflqsunfsqf', '', '2019-12-12', 2),
(3, 'title', 'sjsdkhbnfckjsdhfskfishuflfsijfc,scflkjcfskfjsh,fshfslkknlqsjdsjdh', '', '2019-10-10', 4);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `idCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `contenuCommentaire` varchar(255) NOT NULL,
  `dateCommentaire` date NOT NULL,
  `idUser` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  PRIMARY KEY (`idCommentaire`),
  KEY `idUser` (`idUser`),
  KEY `idArticle` (`idArticle`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`idCommentaire`, `contenuCommentaire`, `dateCommentaire`, `idUser`, `idArticle`) VALUES
(1, 'j\'aime bien cette photo !', '2020-02-02', 1, 2),
(2, 'c\'est ou ça ??', '2020-02-01', 2, 1),
(3, 't\'es très fort mec !!', '2020-01-08', 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `intituleRole` varchar(255) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`idRole`, `intituleRole`) VALUES
(1, 'admin'),
(2, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `photoProfil` varchar(255) NOT NULL,
  `dateNaissance` date NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `idRole` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idRole` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `nom`, `prenom`, `pseudo`, `photoProfil`, `dateNaissance`, `sexe`, `mail`, `adresse`, `codePostal`, `ville`, `login`, `pass`, `idRole`) VALUES
(1, 'Assemmar', 'Yassine', 'Yassine_Assemar', '', '1993-04-11', 'homme', 'mr.yacin@hotmail.com', '11 rue de metzeral', 67100, 'Strasbourg', 'yassine', 'yassine', 2),
(2, 'Tarrieu', 'Ivan', 'Ivan_Tarrieu', '', '1990-01-01', 'homme', 'ivantarrieu@orangr.fr', '25 rue des juifs ', 67000, 'Strasbourg', 'ivan', 'ivan', 2),
(3, 'admin', 'admin', 'admin_admin', '', '1990-12-12', 'homme', 'admin@live.fr', '10 grand rue ', 75000, 'Paris', 'admin', 'admin', 1),
(4, 'Duran', 'Halis', 'Halis_Duran', '', '1997-05-05', 'homme', 'halis.duran@gmail.com', '80 rue je sais pas', 67000, 'Hagueneau', 'halis', 'halis', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`idArticle`) REFERENCES `articles` (`idArticle`),
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `roles` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
