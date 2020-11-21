-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 21 nov. 2020 à 23:58
-- Version du serveur :  10.4.16-MariaDB
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 1, 2, 'ffffff', '2020-11-21 13:23:45', 0),
(2, 2, 1, 'salut', '2020-11-21 13:24:11', 2),
(3, 2, 1, 'ccccccc', '2020-11-21 13:27:28', 2),
(4, 2, 1, '😙hi', '2020-11-21 13:50:05', 0),
(5, 2, 1, 'salut', '2020-11-21 16:03:07', 0),
(6, 1, 2, '😄', '2020-11-21 16:03:20', 0),
(7, 1, 2, 'cool', '2020-11-21 22:57:32', 1);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`user_id`, `username`, `fullname`, `password`) VALUES
(1, 'assane', 'Assane Dione', '$2y$10$yphylsxyup0TqFx9ykmFTuZJazGTAlW.IvwMlAyQEEhmzuUP.F/la'),
(2, 'fatou', 'Fatou Sene', '$2y$10$49mD0MKC9jopvMfNxXJLDu94UfY2P//lFV2H32Amclj8QrHR4agf6'),
(3, 'ousmane', 'Ousmane Sane', '$2y$10$4zo.GZYuX0o1FHYCoMqmDemtjJ31UyV1gLEenlzTjSedO8AuOM1dO'),
(4, 'mmmm', 'pppppppp', '$2y$10$Na6Pga1HOrlPl7ErUL8SoefQbwMhVyJ.K/k/6SH2FG1Qb.58jASFa'),
(5, 'moussa', 'Assane', '$2y$10$8WQp/vUB6hopBfBJlV5dn.WGn1TLM35VD61/zb.3y7d75eqYCgA0O'),
(6, 'ooooo', 'mmmmp', '$2y$10$bJd.XgDoL4LiA5ViV1QHBeI8Se0jBJNKkdUXvhTL64ItQLCs/Gk8.');

-- --------------------------------------------------------

--
-- Structure de la table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 2, '2020-11-21 11:50:02', 'no'),
(2, 1, '2020-11-21 12:55:26', 'no'),
(3, 2, '2020-11-21 22:58:46', 'no'),
(4, 1, '2020-11-21 13:51:36', 'no'),
(5, 1, '2020-11-21 19:28:47', 'no'),
(6, 1, '2020-11-21 19:37:35', 'no'),
(7, 1, '2020-11-21 19:38:38', 'no'),
(8, 1, '2020-11-21 21:12:51', 'no'),
(9, 1, '2020-11-21 21:38:14', 'no'),
(10, 1, '2020-11-21 21:40:17', 'no'),
(11, 1, '2020-11-21 21:40:37', 'no'),
(12, 1, '2020-11-21 21:41:30', 'no'),
(13, 1, '2020-11-21 21:42:38', 'no'),
(14, 1, '2020-11-21 21:44:28', 'no'),
(15, 1, '2020-11-21 22:58:44', 'no');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
