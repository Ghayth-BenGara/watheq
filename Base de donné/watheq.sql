-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 14 déc. 2020 à 02:10
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `watheq`
--

-- --------------------------------------------------------

--
-- Structure de la table `article_immobiliers`
--

CREATE TABLE `article_immobiliers` (
  `id` int(11) NOT NULL,
  `titre` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `negociable` varchar(500) NOT NULL,
  `etat` varchar(500) NOT NULL DEFAULT 'Aucun',
  `email` varchar(500) NOT NULL,
  `nbr_vue` int(11) NOT NULL DEFAULT 0,
  `date_publication` date NOT NULL,
  `time_publication` time NOT NULL,
  `image1` longblob NOT NULL,
  `image2` longblob NOT NULL,
  `image3` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article_materiaux`
--

CREATE TABLE `article_materiaux` (
  `id` int(11) NOT NULL,
  `titre` varchar(500) NOT NULL,
  `marque` varchar(500) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `negociable` varchar(500) NOT NULL,
  `etat` varchar(500) NOT NULL DEFAULT 'Aucun',
  `email` varchar(500) NOT NULL,
  `nbr_vue` int(11) NOT NULL DEFAULT 0,
  `date_publication` date NOT NULL,
  `time_publication` time NOT NULL,
  `image1` longblob NOT NULL,
  `image2` longblob NOT NULL,
  `image3` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article_plus`
--

CREATE TABLE `article_plus` (
  `id` int(11) NOT NULL,
  `titre` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `negociable` varchar(500) NOT NULL DEFAULT 'Aucun',
  `etat` varchar(500) NOT NULL DEFAULT 'Aucun',
  `email` varchar(500) NOT NULL,
  `nbr_vue` int(11) NOT NULL DEFAULT 0,
  `date_publication` date NOT NULL,
  `time_publication` time NOT NULL,
  `image1` longblob NOT NULL,
  `image2` longblob NOT NULL,
  `image3` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article_voitures`
--

CREATE TABLE `article_voitures` (
  `id` int(11) NOT NULL,
  `titre` varchar(500) NOT NULL,
  `marque` varchar(500) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `negociable` varchar(500) NOT NULL,
  `etat` varchar(500) NOT NULL DEFAULT 'Aucun',
  `email` varchar(500) NOT NULL,
  `nbr_vue` int(11) NOT NULL DEFAULT 0,
  `date_publication` date NOT NULL,
  `time_publication` time NOT NULL,
  `image1` longblob NOT NULL,
  `image2` longblob NOT NULL,
  `image3` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `avis_articles_plus`
--

CREATE TABLE `avis_articles_plus` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `nbr_avis` int(11) NOT NULL DEFAULT 0,
  `nom` varchar(500) NOT NULL,
  `avis` varchar(800) NOT NULL,
  `date_avis` date NOT NULL,
  `time_avis` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `avis_immobiliers`
--

CREATE TABLE `avis_immobiliers` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `nbr_avis` int(11) NOT NULL DEFAULT 0,
  `nom` varchar(500) NOT NULL,
  `avis` varchar(800) NOT NULL,
  `date_avis` date NOT NULL,
  `time_avis` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `avis_materiaux`
--

CREATE TABLE `avis_materiaux` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `nbr_avis` int(11) NOT NULL DEFAULT 0,
  `nom` varchar(500) NOT NULL,
  `avis` varchar(900) NOT NULL,
  `date_avis` date NOT NULL,
  `time_avis` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `avis_voitures`
--

CREATE TABLE `avis_voitures` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `nbr_avis` int(11) NOT NULL DEFAULT 0,
  `nom` varchar(500) NOT NULL,
  `avis` varchar(900) NOT NULL,
  `date_avis` date NOT NULL,
  `time_avis` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `discussion`
--

CREATE TABLE `discussion` (
  `id` int(11) NOT NULL,
  `from_user` varchar(500) NOT NULL,
  `to_user` varchar(500) NOT NULL,
  `message` varchar(900) NOT NULL,
  `date_message` date NOT NULL,
  `time_message` time NOT NULL,
  `etat` varchar(500) NOT NULL DEFAULT 'pas vue'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `favoris_article`
--

CREATE TABLE `favoris_article` (
  `email_notif` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `choix1` varchar(500) NOT NULL,
  `choix2` varchar(500) NOT NULL,
  `choix3` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `region` varchar(500) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `date_login` date NOT NULL,
  `time_login` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `vendeur` varchar(500) NOT NULL,
  `article` varchar(500) NOT NULL,
  `marque` varchar(500) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date_publication` datetime NOT NULL,
  `statut` varchar(500) NOT NULL DEFAULT 'pas vue'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reaction_immobiliers`
--

CREATE TABLE `reaction_immobiliers` (
  `id` int(11) NOT NULL,
  `action` int(11) NOT NULL DEFAULT 0,
  `id_article` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `nom` varchar(500) NOT NULL,
  `curent_date` date NOT NULL,
  `curent_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reaction_materiaux`
--

CREATE TABLE `reaction_materiaux` (
  `id` int(11) NOT NULL,
  `action` int(11) NOT NULL DEFAULT 0,
  `id_article` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `nom` varchar(500) NOT NULL,
  `curent_date` date NOT NULL,
  `curent_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reaction_plus`
--

CREATE TABLE `reaction_plus` (
  `id` int(11) NOT NULL,
  `action` int(11) NOT NULL DEFAULT 0,
  `id_article` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `nom` varchar(500) NOT NULL,
  `curent_date` date NOT NULL,
  `curent_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reaction_voitures`
--

CREATE TABLE `reaction_voitures` (
  `id` int(11) NOT NULL,
  `action` int(11) NOT NULL DEFAULT 0,
  `id_article` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `nom` varchar(500) NOT NULL,
  `curent_date` date NOT NULL,
  `curent_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE `vendeur` (
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL DEFAULT 'Aucun',
  `nom` varchar(500) NOT NULL DEFAULT 'Aucun',
  `genre` varchar(500) NOT NULL DEFAULT 'Aucun',
  `numero` int(11) NOT NULL DEFAULT 0,
  `pays` varchar(500) NOT NULL DEFAULT 'Aucun',
  `gouvernorat` varchar(500) NOT NULL DEFAULT 'Aucun',
  `ville` varchar(500) NOT NULL DEFAULT 'Aucun',
  `date_creation` date NOT NULL,
  `heure_creation` time NOT NULL,
  `photo_profil` longblob NOT NULL,
  `facebook` varchar(500) NOT NULL DEFAULT 'Aucun',
  `instagram` varchar(500) NOT NULL DEFAULT 'Aucun',
  `twitter` varchar(500) NOT NULL DEFAULT 'Aucun',
  `google` varchar(500) NOT NULL DEFAULT 'Aucun',
  `last_login` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article_immobiliers`
--
ALTER TABLE `article_immobiliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Index pour la table `article_materiaux`
--
ALTER TABLE `article_materiaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Index pour la table `article_plus`
--
ALTER TABLE `article_plus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Index pour la table `article_voitures`
--
ALTER TABLE `article_voitures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Index pour la table `avis_articles_plus`
--
ALTER TABLE `avis_articles_plus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avis_article_plus_ibfk_1` (`id_article`),
  ADD KEY `avis_article_plus_ibfk_2` (`email`);

--
-- Index pour la table `avis_immobiliers`
--
ALTER TABLE `avis_immobiliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `email` (`email`);

--
-- Index pour la table `avis_materiaux`
--
ALTER TABLE `avis_materiaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `avis_voitures`
--
ALTER TABLE `avis_voitures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user` (`from_user`),
  ADD KEY `to_user` (`to_user`);

--
-- Index pour la table `favoris_article`
--
ALTER TABLE `favoris_article`
  ADD PRIMARY KEY (`email_notif`),
  ADD KEY `email` (`email`);

--
-- Index pour la table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `vendeur` (`vendeur`);

--
-- Index pour la table `reaction_immobiliers`
--
ALTER TABLE `reaction_immobiliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `reaction_materiaux`
--
ALTER TABLE `reaction_materiaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `reaction_plus`
--
ALTER TABLE `reaction_plus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `reaction_voitures`
--
ALTER TABLE `reaction_voitures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article_immobiliers`
--
ALTER TABLE `article_immobiliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `article_materiaux`
--
ALTER TABLE `article_materiaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `article_plus`
--
ALTER TABLE `article_plus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `article_voitures`
--
ALTER TABLE `article_voitures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `avis_articles_plus`
--
ALTER TABLE `avis_articles_plus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `avis_immobiliers`
--
ALTER TABLE `avis_immobiliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `avis_materiaux`
--
ALTER TABLE `avis_materiaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `avis_voitures`
--
ALTER TABLE `avis_voitures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reaction_immobiliers`
--
ALTER TABLE `reaction_immobiliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reaction_materiaux`
--
ALTER TABLE `reaction_materiaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reaction_plus`
--
ALTER TABLE `reaction_plus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `reaction_voitures`
--
ALTER TABLE `reaction_voitures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article_immobiliers`
--
ALTER TABLE `article_immobiliers`
  ADD CONSTRAINT `article_immobiliers_ibfk_1` FOREIGN KEY (`email`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `article_materiaux`
--
ALTER TABLE `article_materiaux`
  ADD CONSTRAINT `article_materiaux_ibfk_1` FOREIGN KEY (`email`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `article_plus`
--
ALTER TABLE `article_plus`
  ADD CONSTRAINT `article_plus_ibfk_1` FOREIGN KEY (`email`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `article_voitures`
--
ALTER TABLE `article_voitures`
  ADD CONSTRAINT `article_voitures_ibfk_1` FOREIGN KEY (`email`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `avis_articles_plus`
--
ALTER TABLE `avis_articles_plus`
  ADD CONSTRAINT `avis_articles_plus_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article_plus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avis_articles_plus_ibfk_2` FOREIGN KEY (`email`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `avis_immobiliers`
--
ALTER TABLE `avis_immobiliers`
  ADD CONSTRAINT `avis_immobiliers_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article_immobiliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avis_immobiliers_ibfk_2` FOREIGN KEY (`email`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `avis_materiaux`
--
ALTER TABLE `avis_materiaux`
  ADD CONSTRAINT `avis_materiaux_ibfk_1` FOREIGN KEY (`email`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avis_materiaux_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `article_materiaux` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `discussion_ibfk_1` FOREIGN KEY (`from_user`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discussion_ibfk_2` FOREIGN KEY (`to_user`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `favoris_article`
--
ALTER TABLE `favoris_article`
  ADD CONSTRAINT `favoris_article_ibfk_1` FOREIGN KEY (`email`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `journal`
--
ALTER TABLE `journal`
  ADD CONSTRAINT `journal_ibfk_1` FOREIGN KEY (`email`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`email`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`vendeur`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reaction_immobiliers`
--
ALTER TABLE `reaction_immobiliers`
  ADD CONSTRAINT `reaction_immobiliers_ibfk_1` FOREIGN KEY (`email`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reaction_immobiliers_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `article_immobiliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reaction_materiaux`
--
ALTER TABLE `reaction_materiaux`
  ADD CONSTRAINT `reaction_materiaux_ibfk_1` FOREIGN KEY (`email`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reaction_materiaux_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `article_materiaux` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reaction_plus`
--
ALTER TABLE `reaction_plus`
  ADD CONSTRAINT `reaction_plus_ibfk_1` FOREIGN KEY (`email`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reaction_plus_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `article_plus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reaction_voitures`
--
ALTER TABLE `reaction_voitures`
  ADD CONSTRAINT `reaction_voitures_ibfk_1` FOREIGN KEY (`email`) REFERENCES `vendeur` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reaction_voitures_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `article_voitures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
