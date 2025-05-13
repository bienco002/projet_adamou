-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 mai 2024 à 19:07
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `matricule` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `tel` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `motpass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`matricule`, `nom`, `prenom`, `tel`, `email`, `motpass`) VALUES
('22B', 'DJOUBA', 'BLAISE', 674163161, 'djouba@gmail.com', '2002B');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `adresse` varchar(25) DEFAULT NULL,
  `motpass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `tel`, `email`, `adresse`, `motpass`) VALUES
(17, 'ISSA', 'DODO', 2344567, 'djouba@gmail.com', 'adresse', 'AZER'),
(18, 'der', 'madeuh', 5566, 'oisi@gmail.com', 'adresse', '44ee'),
(19, 'der', 'madeuh', 8877, 'oisi@gmail.com', 'ertyth6uj7', 'ccnhhjn'),
(20, 'bb', 'mm', 323466767, 'oisi@gmail.com', 'vghnn', 'qwertr'),
(21, 'BAIMA', 'GABRIEL', 694109821, 'Baima8080@gmail.com', 'ngaoudere', 'baia'),
(22, 'BAIMA', 'GABRIEL', 694109821, 'Baima8080@gmail.com', 'ngaoudere', 'sdd');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_co` int(11) NOT NULL,
  `libelle` varchar(25) NOT NULL,
  `heure_co` varchar(25) NOT NULL,
  `status_co` varchar(25) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `prix` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `nom`, `description`, `image`, `prix`) VALUES
(1, '', 'jhfnfhgfd', 'Capture1.PNG', 0);

-- --------------------------------------------------------

--
-- Structure de la table `employer`
--

CREATE TABLE `employer` (
  `id_emp` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `telephone` int(11) NOT NULL,
  `genre` varchar(10) NOT NULL,
  `poste` varchar(25) NOT NULL,
  `jour` date NOT NULL,
  `debut` varchar(25) NOT NULL,
  `fin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employer`
--

INSERT INTO `employer` (`id_emp`, `nom`, `prenom`, `telephone`, `genre`, `poste`, `jour`, `debut`, `fin`) VALUES
(2, 'alin', 'bla', 3426, 'hgmn', 'hbjdchchj', '2024-05-10', 'ygihguy', 'ghijoppi'),
(4, 'RR', 'EE', 2, 'M', 'G', '2024-05-20', 'F', 'YTV'),
(5, 'vhvhg', 'madeuh', 3426, 'hgmn', 'G', '2024-05-25', 'HJBBGB', 'sfsgfgd');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id_facture` int(11) NOT NULL,
  `date` date NOT NULL,
  `montant` double NOT NULL,
  `quantité` varchar(25) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `figurer`
--

CREATE TABLE `figurer` (
  `id_co` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_four` int(11) NOT NULL,
  `nom_four` varchar(25) NOT NULL,
  `prenom_four` varchar(25) NOT NULL,
  `tel_four` int(11) NOT NULL,
  `email_four` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `titre` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `prix` double NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `titre`, `description`, `prix`, `image`) VALUES
(1, 'ddegvf', 'WDHFVKJKJJ', 56755667, '');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int(11) NOT NULL,
  `nom_plats` varchar(25) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_p` int(11) NOT NULL,
  `nom_p` varchar(25) NOT NULL,
  `quantite` varchar(50) NOT NULL,
  `prix` double NOT NULL,
  `matricule` varchar(25) NOT NULL,
  `id_four` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `table`
--

CREATE TABLE `table` (
  `numero` int(11) NOT NULL,
  `capacite` varchar(25) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_co`),
  ADD KEY `Id_emp` (`id_emp`),
  ADD KEY `Id_facture` (`id_facture`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id_emp`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_facture`),
  ADD KEY `Id_client` (`id_client`);

--
-- Index pour la table `figurer`
--
ALTER TABLE `figurer`
  ADD KEY `Id_co` (`id_co`),
  ADD KEY `Id_menu` (`id_menu`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_four`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `Matricule` (`matricule`),
  ADD KEY `Id_four` (`id_four`);

--
-- Index pour la table `table`
--
ALTER TABLE `table`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `employer`
--
ALTER TABLE `employer`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_four` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `table`
--
ALTER TABLE `table`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `employer` (`id_emp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_facture`) REFERENCES `facture` (`id_facture`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `figurer`
--
ALTER TABLE `figurer`
  ADD CONSTRAINT `figurer_ibfk_1` FOREIGN KEY (`id_co`) REFERENCES `commande` (`id_co`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `figurer_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `administrateur` (`matricule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_four`) REFERENCES `fournisseur` (`id_four`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `table`
--
ALTER TABLE `table`
  ADD CONSTRAINT `table_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
