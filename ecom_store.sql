-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 29 mai 2019 à 14:11
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecom_store`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `pass_admin` varchar(255) NOT NULL,
  `image_admin` text NOT NULL,
  `pays_admin` text NOT NULL,
  `about_admin` text NOT NULL,
  `contact_admin` varchar(255) NOT NULL,
  `job_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom_admin`, `email_admin`, `pass_admin`, `image_admin`, `pays_admin`, `about_admin`, `contact_admin`, `job_admin`) VALUES
(1, 'Vans', 'vans@gmail.com', '2668a8fdd4558137b459e7482aca53a8616c0216', '557042574.jpg', 'BENIN', '<p>D&eacute;veloppeur Web en formation</p>', '+229 99 67 56 45 ', 'Webmaster'),
(2, 'Steven', 'steven@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', '468704574.jpg', 'BENIN', '<p>Webmaster en formation</p>', '+229 99 67 67 89', 'Webmaster'),
(3, 'Marc', 'marc@yahoo.fr', '2668a8fdd4558137b459e7482aca53a8616c0216', '393787066.jpg', 'BENIN', '<p>Admistrateur de base de donn&eacute;es</p>', '+229 97 97 76 65', 'Admistrateur de base de données'),
(4, 'Emeric', 'emeric@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', '1828656370.jpg', 'BENIN', '<p>Dev Python</p>', '+229 99 67 67 89', 'Dev Python'),
(7, 'Gilles', 'gilles@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', '745679919.jpg', 'BENIN', '<p>WebDesigner</p>', '+229 90 78 56 65', 'WebDesigner'),
(8, 'Romeo', 'romeo@yahoo.fr', '2668a8fdd4558137b459e7482aca53a8616c0216', '199284362.jpg', 'BENIN', '<p>Admistrateur de base de donn&eacute;es</p>', '+229 97 70 67 32', 'Admistrateur de base de données'),
(9, 'Germain', 'ossito@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', '320575945.jpg', 'BENIN', '<p>Dev Python</p>', '+229 97 70 67 32', 'Dev Python');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `titre_cat` text NOT NULL,
  `desc_cat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_cat`, `titre_cat`, `desc_cat`) VALUES
(1, 'Homme', 'Les hommes c\'est notre spécialité'),
(2, 'Enfants garçons', 'C\'est aussi le cas avec les enfants '),
(3, 'Autres', 'Les personnes âgés (grand-père)');

-- --------------------------------------------------------

--
-- Structure de la table `categories_produits`
--

CREATE TABLE `categories_produits` (
  `id_cat_p` int(11) NOT NULL,
  `titre_cat_p` text NOT NULL,
  `desc_cat_p` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories_produits`
--

INSERT INTO `categories_produits` (`id_cat_p`, `titre_cat_p`, `desc_cat_p`) VALUES
(1, 'Jackets', 'Jackets propres ....'),
(2, 'Accessoires', 'Les parfums , les peignes  , ceintures , bracelets et chaines'),
(3, 'Chaussures', 'Baskets , Cuir , Sneakers '),
(5, 'T-Shirts', 'Tenue de manche courte top'),
(6, 'Chemises', 'Des chemises\r\n ');

-- --------------------------------------------------------

--
-- Structure de la table `cde_attente`
--

CREATE TABLE `cde_attente` (
  `id_cde` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `no_facture` int(11) NOT NULL,
  `id_produit` text NOT NULL,
  `qte` int(11) NOT NULL,
  `taille` text NOT NULL,
  `etat_cde` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cde_attente`
--

INSERT INTO `cde_attente` (`id_cde`, `id_cli`, `no_facture`, `id_produit`, `qte`, `taille`, `etat_cde`) VALUES
(5, 1, 60202679, '3', 1, 'Petit', 'Complète'),
(6, 1, 778501651, '11', 1, 'Moyen', 'Complète'),
(7, 1, 1451954115, '18', 1, 'Petit', 'Complète'),
(8, 1, 1451954115, '15', 1, 'Petit', 'Complète'),
(9, 1, 1882548229, '5', 1, 'Moyen', 'En attente'),
(10, 1, 1882548229, '7', 1, 'Petit', 'En attente'),
(11, 1, 1882548229, '14', 1, 'Petit', 'En attente');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_cli` int(11) NOT NULL,
  `nom_cli` varchar(255) NOT NULL,
  `email_cli` varchar(255) NOT NULL,
  `pass_cli` varchar(255) NOT NULL,
  `pays_cli` text NOT NULL,
  `ville_cli` text NOT NULL,
  `contact_cli` varchar(255) NOT NULL,
  `adr_cli` text NOT NULL,
  `image_client` text NOT NULL,
  `ip_cli` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_cli`, `nom_cli`, `email_cli`, `pass_cli`, `pays_cli`, `ville_cli`, `contact_cli`, `adr_cli`, `image_client`, `ip_cli`) VALUES
(1, 'Marc', 'max@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'BENIN', 'Parakou', '+229 97 78 98 67', 'Zogbo', '1568640299.jpg', '127.0.0.1'),
(2, 'Bekker', 'bekker@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'BENIN', 'Parakou', '+229 97 78 98 67', 'Zogbo', 'all.jpeg', '127.0.0.1'),
(3, 'Jean', 'jean@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'BENIN', 'Calavi', '+229 68 89 56 98', 'Calavi', 'ch.jpeg', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `commandes_clients`
--

CREATE TABLE `commandes_clients` (
  `id_cde` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `somme_payable` int(100) NOT NULL,
  `no_facture` text NOT NULL,
  `qte` int(11) NOT NULL,
  `taille` text NOT NULL,
  `date_cde` date NOT NULL,
  `etat_cde` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes_clients`
--

INSERT INTO `commandes_clients` (`id_cde`, `id_cli`, `somme_payable`, `no_facture`, `qte`, `taille`, `date_cde`, `etat_cde`) VALUES
(5, 1, 5000, '60202679', 1, 'Petit', '2019-05-08', 'Complète'),
(6, 1, 12000, '778501651', 1, 'Moyen', '2019-05-08', 'Complète'),
(7, 1, 5000, '1451954115', 1, 'Petit', '2019-05-08', 'Complète'),
(8, 1, 30000, '1451954115', 1, 'Petit', '2019-05-08', 'Complète'),
(9, 1, 5000, '1882548229', 1, 'Moyen', '2019-05-08', 'En attente'),
(10, 1, 12000, '1882548229', 1, 'Petit', '2019-05-08', 'En attente'),
(11, 1, 10000, '1882548229', 1, 'Petit', '2019-05-08', 'En attente');

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `id_paiement` int(11) NOT NULL,
  `no_facture` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `mode_paiement` text NOT NULL,
  `ref_no` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `date_paiement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `paiements`
--

INSERT INTO `paiements` (`id_paiement`, `no_facture`, `montant`, `mode_paiement`, `ref_no`, `code`, `date_paiement`) VALUES
(3, 60202679, 5000, 'Western Union', 34354, 3412, '02/06/2018'),
(4, 778501651, 12000, 'Western Union', 34354, 3412, '02/06/2018'),
(5, 1451954115, 5000, 'Western Union', 1235, 68768, '02/06/2018'),
(6, 1451954115, 30000, 'Transaction Bancaire', 34354, 68768, '29-11-2019');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_p` int(11) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qte` int(11) NOT NULL,
  `taille` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `id_cat_p` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titre_produit` text NOT NULL,
  `img1_produit` text NOT NULL,
  `img2_produit` text NOT NULL,
  `img3_produit` text NOT NULL,
  `prix_produit` int(11) NOT NULL,
  `product_keywords` text NOT NULL,
  `desc_produit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `id_cat_p`, `id_cat`, `date`, `titre_produit`, `img1_produit`, `img2_produit`, `img3_produit`, `prix_produit`, `product_keywords`, `desc_produit`) VALUES
(1, 3, 1, '2019-04-28 20:53:27', 'Chaussures Adidas', 'Man-Adidas-Suarez-Slop-On-1.jpg', 'Man-Adidas-Suarez-Slop-On-2.jpg', 'Man-Adidas-Suarez-Slop-On-3.jpg', 8000, 'chaussures', '<p>La qualité y est !!!</p>'),
(2, 1, 1, '2019-04-22 14:37:00', 'Jacket Noir Zara', 'Man-Geox-Winter-jacket-1.jpg', 'Man-Geox-Winter-jacket-2.jpg', 'Man-Geox-Winter-jacket-3.jpg', 10000, 'Jacket', '<p>&nbsp;Jacket Zara Noir homme</p>'),
(3, 5, 1, '2019-04-28 20:46:17', 'T-shirt Gris M-Dev', 'grey-man-1.jpg', 'grey-man-2.jpg', 'grey-man-3.jpg', 5000, 't-shirt', '<p>T-shirt pour les D&eacute;veloppeurs</p>'),
(4, 5, 1, '2019-04-22 14:52:12', 'T-shirt Polo Blanc', 'Man-Polo-1.jpg', 'Man-Polo-2.jpg', 'Man-Polo-3.jpg', 5000, 't-shirt', '<p>T-shirt blanc pour Dev</p>'),
(5, 2, 1, '2019-04-28 20:54:34', 'Ceinture Mont Blanc', 'Mont-Blanc-Belt-man-3.jpg', 'Mont-Blanc-Belt-man-2.jpg', 'Mont-Blanc-Belt-man-1.jpg', 5000, 'accessoire', '<p>&nbsp;Un ceinture (accessoire)</p>'),
(6, 2, 0, '2019-05-04 07:11:57', 'Balenciaga T-shirt', 'balenciaga1.jpg', 'balenciaga2.jpg', 'balenciaga3.jpg', 6000, 't-shirt', '<p>Balenciaga t-shirt</p>'),
(7, 3, 1, '2019-04-28 20:46:52', 'Chaussures cuir bleu ', 'chussures-bateau-cuir-bleu-marine-1.jpg', 'chussures-bateau-cuir-bleu-marine-2.jpg', 'chussures-bateau-cuir-bleu-marine-3.jpg', 12000, 'chaussures', '<p>Chaussures</p>'),
(8, 2, 1, '2019-04-22 15:24:21', 'Montre Armani', 'montre1.jpg', 'montre2.jpg', 'montre3.jpg', 10000, 'montre', '<p>Montre propre</p>'),
(9, 3, 1, '2019-04-22 18:39:48', 'Nike 97 ', 'nike1.jpg', 'nike2.jpg', 'nike3.jpg', 15000, 'chaussures', 'Une nike aussi parfaite'),
(10, 6, 2, '2019-04-22 18:49:21', 'Chemise versace', 'chemisev3.jpg', 'chemisev2.jpg', 'chemisev1.jpg', 6000, 'chemises', '<p>Chemises pour tous (Versace)</p>'),
(11, 0, 0, '2019-05-05 07:54:14', 'Parfum Balman', 'parfum1.jpg', 'parfum2.jpg', 'parfum3.jpg', 12000, 'accessoire', '<p>Parfum Balman (Accessoires)</p>'),
(12, 2, 2, '2019-04-22 20:56:58', 'Ceinture Hermès cuir', 'hermes1.jpg', 'hermes2.jpg', 'hermes3.jpg', 6000, 'accessoire', '<p>Ceinture Herm&egrave;s</p>'),
(13, 0, 0, '2019-05-04 07:20:02', 'Pull Luis Vuitton', 'pull2.jpg', 'pull3.jpg', 'pull1.jpg', 10000, 'Jacket', '<p>Pull Luis vuitton propre</p>'),
(14, 0, 0, '2019-05-04 07:19:01', 'Montre Gucci', 'gucci3.jpg', 'gucci2.jpg', 'gucci1.jpg', 10000, 'accessoire', '<p><span class=\"irc_su\" dir=\"ltr\" style=\"text-align: left;\">Gucci - Montre de bracelet pour homme, acier inoxydable, couleur marron</span></p>'),
(15, 0, 0, '2019-05-04 07:37:34', 'Rolex Submariner', 'rolex1.jpg', 'rolex2.jpg', 'rolex3.jpg', 30000, 'accessoire', '<p>Rolex pour tous !!!!</p>'),
(16, 0, 0, '0000-00-00 00:00:00', 'Saccoche Gucci', 'saccoche1.jpg', 'saccoche2.jpg', 'saccoche3.jpg', 10000, 'accessoire', '<p>Saccoche Gucci pour tous !!!! La qualit&eacute;</p>'),
(17, 2, 1, '2019-04-22 21:19:34', 'Chaine Argent', 'chaine1.jpg', 'chaine2.jpg', 'chaine3.jpg', 6000, 'accessoire', '<p>Chaine Argent</p>'),
(18, 2, 0, '2019-05-03 22:56:12', 'Bracelet Tiger', 'bracelet1.jpg', 'bracelet2.jpg', 'bracelet3.jpg', 5000, 'accessoire', '<p>Bracelet</p>');

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE `slider` (
  `id_slide` int(11) NOT NULL,
  `nom_slide` varchar(255) DEFAULT NULL,
  `image_slide` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`id_slide`, `nom_slide`, `image_slide`) VALUES
(1, 'Slider n°1', 'all.jpeg'),
(2, 'Slider n°2', 'ch.jpeg'),
(3, 'Slider n°3', 'shoes.jpeg'),
(4, 'Slider n°4', 'clothe.jpeg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `categories_produits`
--
ALTER TABLE `categories_produits`
  ADD PRIMARY KEY (`id_cat_p`);

--
-- Index pour la table `cde_attente`
--
ALTER TABLE `cde_attente`
  ADD PRIMARY KEY (`id_cde`),
  ADD KEY `id_cli` (`id_cli`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_cli`);

--
-- Index pour la table `commandes_clients`
--
ALTER TABLE `commandes_clients`
  ADD PRIMARY KEY (`id_cde`),
  ADD KEY `id_cli` (`id_cli`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id_paiement`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slide`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categories_produits`
--
ALTER TABLE `categories_produits`
  MODIFY `id_cat_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `cde_attente`
--
ALTER TABLE `cde_attente`
  MODIFY `id_cde` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commandes_clients`
--
ALTER TABLE `commandes_clients`
  MODIFY `id_cde` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
