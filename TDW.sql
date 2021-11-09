-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 25 avr. 2021 à 22:31
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tdw`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomContact` varchar(255) NOT NULL,
  `emailContact` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nomContact`, `emailContact`, `sujet`, `message`) VALUES
(1, 'lilya', 'lilyabeddek@gmail.com', 'feedback', 'site tres utile'),
(2, 'lilya', 'lilyabeddek@gmail.com', 'feedback', 'site fonctionnel');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `idUser` int(11) NOT NULL,
  `idRecette` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idRecette`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fete`
--

DROP TABLE IF EXISTS `fete`;
CREATE TABLE IF NOT EXISTS `fete` (
  `idFete` int(11) NOT NULL AUTO_INCREMENT,
  `nomFete` varchar(255) NOT NULL,
  PRIMARY KEY (`idFete`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fete`
--

INSERT INTO `fete` (`idFete`, `nomFete`) VALUES
(1, 'Aid Fitr'),
(2, 'Aid Adha'),
(3, 'Mawlid nabawi charif'),
(4, 'Ramadan');

-- --------------------------------------------------------

--
-- Structure de la table `infonutritionnelle`
--

DROP TABLE IF EXISTS `infonutritionnelle`;
CREATE TABLE IF NOT EXISTS `infonutritionnelle` (
  `idInfo` int(11) NOT NULL AUTO_INCREMENT,
  `nomInfo` varchar(255) NOT NULL,
  PRIMARY KEY (`idInfo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `infonutritionnelle`
--

INSERT INTO `infonutritionnelle` (`idInfo`, `nomInfo`) VALUES
(1, 'Calories'),
(2, 'glucides'),
(3, 'lipides'),
(4, 'minéraux'),
(5, 'vitamines');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `idIngred` int(11) NOT NULL AUTO_INCREMENT,
  `nomIngred` varchar(255) NOT NULL,
  `saisonIngred` varchar(255) NOT NULL,
  `healthy` int(11) NOT NULL,
  `proportion` int(11) NOT NULL,
  PRIMARY KEY (`idIngred`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`idIngred`, `nomIngred`, `saisonIngred`, `healthy`, `proportion`) VALUES
(1, 'tomates', 'hiver', 1, 100),
(3, 'serises', 'ete', 1, 50),
(4, 'pommes', 'Automne', 1, 17),
(16, 'oranges', 'Hiver', 1, 23),
(6, 'bananes', 'Hiver', 0, 6),
(7, 'pommes de terre', 'Printemps', 0, 16),
(8, 'gourgettes', 'Printemps', 0, 13),
(9, 'olives', 'Hiver', 0, 4),
(10, 'sel', 'Hiver', 1, 4),
(11, 'kiwi', 'Hiver', 1, 4),
(12, 'avoca', 'Hiver', 1, 4),
(13, 'oignon', 'Hiver', 0, 25),
(17, 'persil', 'Hiver', 1, 23),
(15, 'coriendre', 'Hiver', 0, 25);

-- --------------------------------------------------------

--
-- Structure de la table `ingredientinfos`
--

DROP TABLE IF EXISTS `ingredientinfos`;
CREATE TABLE IF NOT EXISTS `ingredientinfos` (
  `idIngred` int(11) NOT NULL,
  `idInfo` int(11) NOT NULL,
  `quantite` float NOT NULL,
  `unite` varchar(255) NOT NULL,
  PRIMARY KEY (`idIngred`,`idInfo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ingredientinfos`
--

INSERT INTO `ingredientinfos` (`idIngred`, `idInfo`, `quantite`, `unite`) VALUES
(1, 1, 50, 'g'),
(1, 2, 50, 'g'),
(1, 3, 50, 'g'),
(17, 9, 12, 'g'),
(6, 1, 12, 'g'),
(3, 1, 50, 'g'),
(3, 2, 50, 'g'),
(3, 3, 50, 'g'),
(17, 5, 12, 'g');

-- --------------------------------------------------------

--
-- Structure de la table `new`
--

DROP TABLE IF EXISTS `new`;
CREATE TABLE IF NOT EXISTS `new` (
  `idNew` varchar(255) NOT NULL,
  `imageNew` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idNew`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `new`
--

INSERT INTO `new` (`idNew`, `imageNew`, `dateCreation`) VALUES
('Nouvelle Recette sur le site', 'images/temp.jpg', '2021-04-23 19:09:44'),
('10 Recettes tendance 2021', 'images/temp.jpg', '2021-04-25 00:00:00'),
('combo sal/sucre tendance 2021', 'images/temp.jpg', '2021-04-25 22:26:58');

-- --------------------------------------------------------

--
-- Structure de la table `notation`
--

DROP TABLE IF EXISTS `notation`;
CREATE TABLE IF NOT EXISTS `notation` (
  `idUser` int(11) NOT NULL,
  `idRecette` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idRecette`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notation`
--

INSERT INTO `notation` (`idUser`, `idRecette`, `note`) VALUES
(1, 105, 10),
(1, 106, 9),
(1, 107, 8),
(2, 105, 10),
(2, 106, 9),
(2, 107, 7);

-- --------------------------------------------------------

--
-- Structure de la table `paragraphe`
--

DROP TABLE IF EXISTS `paragraphe`;
CREATE TABLE IF NOT EXISTS `paragraphe` (
  `idParag` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `imageParag` varchar(255) NOT NULL,
  `idNew` varchar(255) NOT NULL,
  PRIMARY KEY (`idParag`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `paragraphe`
--

INSERT INTO `paragraphe` (`idParag`, `contenu`, `imageParag`, `idNew`) VALUES
(1, 'Ceci est un contenu', 'images/temp.jpg', 'Nouvelle Recette sur le site'),
(3, 'Ceci est un contenu', 'images/temp.jpg', 'Nouvelle Recette sur le site');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `idRecette` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `tempsPrep` int(11) NOT NULL,
  `tempsRepo` int(11) NOT NULL,
  `tempsCuisson` int(11) NOT NULL,
  `saison` varchar(255) NOT NULL,
  `nbCalories` float NOT NULL,
  `difficulte` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `etapes` text NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `validee` int(11) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idRecette`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`idRecette`, `titre`, `image`, `description`, `categorie`, `tempsPrep`, `tempsRepo`, `tempsCuisson`, `saison`, `nbCalories`, `difficulte`, `video`, `etapes`, `idUser`, `validee`, `dateCreation`) VALUES
(105, 'Tiramisu', 'images/temp.jpg', 'DESCRIPTION', 'Plat', 10, 10, 10, 'Printemps', 10, 28, 'images/video.mp4', 'ETAPES', -1, 1, '2021-04-21 18:53:31'),
(106, 'Mthewem', 'images/temp.jpg', 'DESCRIPTION', 'Plat', 10, 10, 10, 'Printemps', 10, 28, 'images/video.mp4', 'ETAPES', -1, 1, '2021-04-21 19:00:34'),
(108, 'Jus d\'orange', 'images/temp.jpg', 'DESCRIPTION', 'Plat', 10, 10, 10, 'Printemps', 10, 28, 'images/video.mp4', 'ETAPES', -1, 1, '2021-04-21 19:03:29');

-- --------------------------------------------------------

--
-- Structure de la table `recettefete`
--

DROP TABLE IF EXISTS `recettefete`;
CREATE TABLE IF NOT EXISTS `recettefete` (
  `idRecette` int(11) NOT NULL,
  `idFete` int(11) NOT NULL,
  PRIMARY KEY (`idRecette`,`idFete`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recettefete`
--

INSERT INTO `recettefete` (`idRecette`, `idFete`) VALUES
(7, 2),
(8, 3),
(105, 1),
(106, 1),
(107, 1),
(107, 2),
(107, 3),
(107, 4),
(108, 3),
(109, 4),
(110, 1);

-- --------------------------------------------------------

--
-- Structure de la table `recetteingredients`
--

DROP TABLE IF EXISTS `recetteingredients`;
CREATE TABLE IF NOT EXISTS `recetteingredients` (
  `idRecette` int(11) NOT NULL,
  `idIngred` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `unite` varchar(255) NOT NULL,
  PRIMARY KEY (`idRecette`,`idIngred`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recetteingredients`
--

INSERT INTO `recetteingredients` (`idRecette`, `idIngred`, `quantite`, `unite`) VALUES
(105, 1, 50, 'l'),
(105, 2, 50, 'l'),
(105, 3, 50, 'l'),
(106, 1, 50, 'l'),
(106, 2, 50, 'l'),
(106, 3, 50, '1');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `dateNaissance` date NOT NULL,
  `pswrd` varchar(255) NOT NULL,
  `loginUser` varchar(255) NOT NULL,
  `validee` int(11) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `sexe`, `dateNaissance`, `pswrd`, `loginUser`, `validee`) VALUES
(1, 'Beddek', 'Lamia', 'femme', '2021-04-01', '123', 'Lamia', 1),
(2, 'Beddek', 'Lilya', 'femme', '2021-04-01', '123', 'Lilya', 1),
(3, 'Beddek', 'Katia', 'homme', '2021-04-02', '123', 'Katia', 1),
(4, 'Beddek', 'Said', 'homme', '2021-04-02', '123', 'Said', 0),
(5, 'Beddek', 'Tarek', 'homme', '2021-04-02', '123', 'Tarek', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
