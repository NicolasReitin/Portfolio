-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Hôte : nicolfuslimpeas.mysql.db
-- Généré le : sam. 15 avr. 2023 à 00:22
-- Version du serveur : 5.7.41-log
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nicolfuslimpeas`
--

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_de_sortie` int(11) NOT NULL,
  `groupe_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cover` text COLLATE utf8_unicode_ci,
  `upload` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `appartient_albums`
--

CREATE TABLE `appartient_albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero_piste` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `album_id` bigint(20) UNSIGNED DEFAULT NULL,
  `version_morceau_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `appartient_albums`
--

INSERT INTO `appartient_albums` (`id`, `numero_piste`, `album_id`, `version_morceau_id`) VALUES
(3, NULL, NULL, 3),
(4, NULL, NULL, 4),
(5, NULL, NULL, 5),
(6, NULL, NULL, 6),
(7, NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Structure de la table `artistes`
--

CREATE TABLE `artistes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `date_deces` date DEFAULT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `upload` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `artistes`
--

INSERT INTO `artistes` (`id`, `pseudo`, `name`, `first_name`, `date_naissance`, `date_deces`, `photo`, `upload`) VALUES
(2, 'Jimmysquare', NULL, NULL, NULL, NULL, 'https://i1.sndcdn.com/avatars-000129788389-x82xum-t500x500.jpg', 'photo/1667942924.jpg'),
(3, 'Ehrling', NULL, NULL, NULL, NULL, 'https://i1.sndcdn.com/avatars-L3lbrdvZbM7Cr3Sc-c2xqpw-t500x500.jpg', NULL),
(4, 'Fredji', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contient_morceaus`
--

CREATE TABLE `contient_morceaus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `playlist_id` bigint(20) UNSIGNED NOT NULL,
  `version_morceau_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `est_membres`
--

CREATE TABLE `est_membres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artiste_id` bigint(20) UNSIGNED NOT NULL,
  `groupe_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `est_membres`
--

INSERT INTO `est_membres` (`id`, `artiste_id`, `groupe_id`) VALUES
(1, 3, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation_add_categorie`
--

CREATE TABLE `formation_add_categorie` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation_add_categorie`
--

INSERT INTO `formation_add_categorie` (`id`, `categorie`, `date`) VALUES
(2, 'DÃ©veloppement Web', '2023-03-21 22:05:17'),
(3, 'Bureautique', '2023-03-21 22:05:25'),
(4, 'UX/UI Design', '2023-03-21 22:07:29');

--
-- Déclencheurs `formation_add_categorie`
--
DELIMITER $$
CREATE TRIGGER `cat_delete` BEFORE DELETE ON `formation_add_categorie` FOR EACH ROW update formation_stats
set cat_delete = cat_delete +1
WHERE 1
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cat_insert` BEFORE INSERT ON `formation_add_categorie` FOR EACH ROW update formation_stats
set cat_insert = cat_insert +1
WHERE 1
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cat_update` BEFORE UPDATE ON `formation_add_categorie` FOR EACH ROW update formation_stats
set cat_update = cat_update +1
WHERE 1
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `nbr_cat_add` AFTER INSERT ON `formation_add_categorie` FOR EACH ROW update formation_stats
set nbr_cat = nbr_cat +1
WHERE 1
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `nbr_cat_delete` AFTER DELETE ON `formation_add_categorie` FOR EACH ROW update formation_stats
set nbr_cat = nbr_cat -1
WHERE 1
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `formation_add_comment`
--

CREATE TABLE `formation_add_comment` (
  `id_com` int(11) NOT NULL,
  `id_support` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation_add_comment`
--

INSERT INTO `formation_add_comment` (`id_com`, `id_support`, `pseudo`, `commentaire`, `date`) VALUES
(1, 7, 'slimpeas', 'Nickel Ã§a marche', '2022-06-30 21:08:19');

--
-- Déclencheurs `formation_add_comment`
--
DELIMITER $$
CREATE TRIGGER `nbr_comment_add` AFTER INSERT ON `formation_add_comment` FOR EACH ROW update formation_stats
set nbr_comment = nbr_comment +1
WHERE 1
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `nbr_comment_delete` AFTER DELETE ON `formation_add_comment` FOR EACH ROW update formation_stats
set nbr_comment = nbr_comment -1
WHERE 1
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `formation_add_video`
--

CREATE TABLE `formation_add_video` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(400) NOT NULL,
  `poster` text NOT NULL,
  `file` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation_add_video`
--

INSERT INTO `formation_add_video` (`id`, `categorie`, `titre`, `description`, `poster`, `file`, `date`) VALUES
(1, '2', 'HTML et CSS', 'HTML, CSS et JavaScript sont les noms de diffÃ©rents types de code frÃ©quemment rencontrÃ©s dans le dÃ©veloppement web. L\'HTML permet l\'affichage des informations de la page sur le navigateur, le CSS met en page son contenu.', '1679432985_html_css.png', '', '2023-03-21 22:09:45'),
(2, '2', 'Javascript', 'JavaScript est un langage de programmation de scripts principalement employÃ© dans les pages web interactives et Ã  ce titre est une partie essentielle des applications web. ', '1679433014_javascript.jpg', '', '2023-03-21 22:10:14'),
(3, 'DÃ©veloppement Web', 'PhP', 'PHP : Hypertext Preprocessor, plus connu sous son sigle PHP, est un langage de programmation libre, principalement utilisÃ© pour produire des pages Web dynamiques via un serveur HTTP, mais pouvant Ã©galement fonctionner comme n\'importe quel langage interprÃ©tÃ© de faÃ§on locale. PHP est un langage impÃ©ratif orientÃ© objet.', '1679433066_php.jpeg', '', '2023-03-21 22:19:01'),
(4, '2', 'SASS', 'Sass est un langage de script prÃ©processeur qui est compilÃ© ou interprÃ©tÃ© en CSS. SassScript est le langage de script en lui-mÃªme.', '1679433094_SASS.png', '', '2023-03-21 22:11:34'),
(5, '2', 'Laravel', 'Laravel est un framework web open-source Ã©crit en PHP respectant le principe modÃ¨le-vue-contrÃ´leur et entiÃ¨rement dÃ©veloppÃ© en programmation orientÃ©e objet. Laravel est distribuÃ© sous licence MIT, avec ses sources hÃ©bergÃ©es sur GitHub.', '1679433165_Laravel.png', '', '2023-03-21 22:12:45'),
(6, '2', 'MySQL', 'MySQL est un systÃ¨me de gestion de bases de donnÃ©es relationnelles. Il est distribuÃ© sous une double licence GPL et propriÃ©taire.', '1679433204_mysql.jpg', '', '2023-03-21 22:13:24'),
(7, 'Choisir une catÃ©gorie', 'Angular', 'Angular est un framework pour clients, open source, basÃ© sur TypeScript et codirigÃ© par l\'Ã©quipe du projet Â« Angular Â» chez Google ainsi que par une communautÃ© de particuliers et de sociÃ©tÃ©s. Angular est une rÃ©Ã©criture complÃ¨te d\'AngularJS, cadriciel construit par la mÃªme Ã©quipe.', '1679433260_Angular.png', '', '2023-03-21 22:14:20'),
(8, '2', 'Git', 'Git est de loin le systÃ¨me de contrÃ´le de version le plus largement utilisÃ© aujourd\'hui. Git est un projet open source avancÃ©, qui est activement maintenu. Ã€ l\'origine, il a Ã©tÃ© dÃ©veloppÃ© en 2005 par Linus Torvalds, le crÃ©ateur bien connu du noyau du systÃ¨me d\'exploitation Linux.', '1679433316_Git.jpg', '', '2023-03-21 22:15:16'),
(9, '2', 'Bootstrap', 'Bootstrap est une collection d\'outils utiles Ã  la crÃ©ation du design de sites et d\'applications web. C\'est un ensemble qui contient des codes HTML et CSS, des formulaires, boutons, outils de navigation et autres Ã©lÃ©ments interactifs, ainsi que des extensions JavaScript en option.', '1679433358_bootstrap.jpg', '', '2023-03-21 22:15:58'),
(10, '2', 'Wordpress', 'WordPress est un systÃ¨me de gestion de contenu gratuit, libre et open-source. Ce logiciel Ã©crit en PHP repose sur une base de donnÃ©es MySQL et est distribuÃ© par la fondation WordPress.org.', '1679433397_Wordpress.png', '', '2023-03-21 22:16:37'),
(11, '2', 'React', 'React est une bibliothÃ¨que JavaScript libre dÃ©veloppÃ©e par Facebook depuis 2013. Le but principal de cette bibliothÃ¨que est de faciliter la crÃ©ation d\'application web monopage, via la crÃ©ation de composants dÃ©pendant d\'un Ã©tat et gÃ©nÃ©rant une page HTML Ã  chaque changement d\'Ã©tat.', '1679433490_reactJS.png', '', '2023-03-21 22:18:10'),
(12, '2', 'Vue.js', 'Vue.js, est un framework JavaScript open-source utilisÃ© pour construire des interfaces utilisateur et des applications web monopages. Vue a Ã©tÃ© crÃ©Ã© par Evan You et est maintenu par lui et le reste des membres actifs de l\'Ã©quipe principale travaillant sur le projet et son Ã©cosystÃ¨me.', '1679433520_vue_js.png', '', '2023-03-21 22:18:40');

--
-- Déclencheurs `formation_add_video`
--
DELIMITER $$
CREATE TRIGGER `nbr_video_add` AFTER INSERT ON `formation_add_video` FOR EACH ROW update formation_stats
set nbr_video = nbr_video +1
WHERE 1
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `nbr_video_delete` AFTER DELETE ON `formation_add_video` FOR EACH ROW update formation_stats
set nbr_video = nbr_video -1
WHERE 1
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `video_delete` BEFORE DELETE ON `formation_add_video` FOR EACH ROW update formation_stats
set video_delete= video_delete +1
WHERE 1
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `video_insert` BEFORE INSERT ON `formation_add_video` FOR EACH ROW update formation_stats
set video_insert = video_insert +1
WHERE 1
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `video_update` AFTER UPDATE ON `formation_add_video` FOR EACH ROW update formation_stats
set video_update = video_update +1
WHERE 1
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `formation_stats`
--

CREATE TABLE `formation_stats` (
  `nbr_video` int(11) NOT NULL DEFAULT '7',
  `nbr_cat` int(11) NOT NULL DEFAULT '3',
  `nbr_comment` int(11) NOT NULL DEFAULT '1',
  `video_insert` int(11) NOT NULL DEFAULT '7',
  `video_update` int(11) NOT NULL DEFAULT '0',
  `video_delete` int(11) NOT NULL DEFAULT '0',
  `cat_insert` int(11) NOT NULL DEFAULT '3',
  `cat_update` int(11) NOT NULL DEFAULT '0',
  `cat_delete` int(11) NOT NULL DEFAULT '0',
  `comment_add` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation_stats`
--

INSERT INTO `formation_stats` (`nbr_video`, `nbr_cat`, `nbr_comment`, `video_insert`, `video_update`, `video_delete`, `cat_insert`, `cat_update`, `cat_delete`, `comment_add`) VALUES
(12, 3, 1, 22, 1, 10, 9, 3, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `formation_users`
--

CREATE TABLE `formation_users` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation_users`
--

INSERT INTO `formation_users` (`id_user`, `pseudo`, `nom`, `prenom`, `date_de_naissance`, `mail`, `mdp`) VALUES
(1, 'slimpeas', 'Reitin', 'Nicolas', '1988-01-05', 'reitin.pro@gmail.com', 'ca85e96e3f3d6b3083c524c0a9f4fc935b950476'),
(2, 'test', 'test', 'test', '2022-08-16', 'test@test.fr', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(6, 'azaz', 'azaz', 'azaz', '2022-08-17', 'azaz@azaz.fr', '7e730cfc1a8500a8d3eaf2c8de073ed1c1bebec5');

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(7, 'Classique'),
(2, 'Electro'),
(6, 'Jazz'),
(8, 'Jungle'),
(5, 'Métal'),
(4, 'Pop'),
(1, 'Rap'),
(3, 'Rock');

-- --------------------------------------------------------

--
-- Structure de la table `genre_albums`
--

CREATE TABLE `genre_albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `genre_artistes`
--

CREATE TABLE `genre_artistes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `artiste_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `genre_groupes`
--

CREATE TABLE `genre_groupes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `groupe_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `genre_version_morceaus`
--

CREATE TABLE `genre_version_morceaus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `version_morceau_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nationalite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_creation` int(11) DEFAULT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `upload` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`id`, `name`, `nationalite`, `date_creation`, `photo`, `upload`) VALUES
(1, 'Ehrling', NULL, NULL, 'https://i1.sndcdn.com/avatars-L3lbrdvZbM7Cr3Sc-c2xqpw-t500x500.jpg', NULL),
(2, 'Jimmysquare', NULL, NULL, 'https://i1.sndcdn.com/avatars-000129788389-x82xum-t500x500.jpg', 'photo/1667943850.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `intervient_version_morceaus`
--

CREATE TABLE `intervient_version_morceaus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `artiste_id` bigint(20) UNSIGNED NOT NULL,
  `version_morceau_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `intervient_version_morceaus`
--

INSERT INTO `intervient_version_morceaus` (`id`, `role`, `artiste_id`, `version_morceau_id`) VALUES
(1, NULL, 3, 5),
(2, NULL, 2, 3),
(3, NULL, 2, 4),
(4, NULL, 3, 7),
(5, NULL, 4, 6);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `morceaus`
--

CREATE TABLE `morceaus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre_original` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `playlists`
--

CREATE TABLE `playlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`pseudo`, `id`, `email`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
('slimpeas', 5, 'admin@admin.com', '$2y$10$zA4ISMLa0Zn6AyM3TIUARuOIGf/G97TbJlQYQ/UoSBmSW0VUmu9Ba', 'TB0Q3FLYmtGRbvJD8OGR9f6fpSxkie2gPdzftbq93E6Msp4LzAoQ4xMYZn1c', 'admin', NULL, NULL),
('User1', 6, 'user1@user.com', '$2y$10$Z90iDyLM0KQyjUdwsGdbm.Qq0Tz7H.uszvas2/9olA5PSEXlCNk4a', NULL, NULL, NULL, NULL),
('slimpeas', 7, 'slimpeastv@gmail.com', '$2y$10$6RASfC/U1M8PSPcH0Z.Up.2KYlBV/xbRyYo6ogBq99iz9/mOX6n1.', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `version_morceaus`
--

CREATE TABLE `version_morceaus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duree_secondes` int(11) DEFAULT NULL,
  `filepath` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `morceau_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `version_morceaus`
--

INSERT INTO `version_morceaus` (`id`, `titre`, `duree_secondes`, `filepath`, `extension`, `morceau_id`) VALUES
(3, 'Like Apollo', 133, 'musics/1667942998.Like Apollo.mp3', 'mp3', NULL),
(4, 'Mean Machine', 86, 'musics/1667943025.Mean Machine.mp3', 'mp3', NULL),
(5, 'Tease', 143, 'musics/1667943133.Tease.bin', 'bin', NULL),
(6, 'Happy life', 231, 'musics/1667943655.Happy life.bin', 'bin', NULL),
(7, 'Adventure', 138, 'musics/1667943679.Adventure.mp3', 'mp3', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `albums_groupe_id_foreign` (`groupe_id`),
  ADD KEY `albums_titre_index` (`titre`);

--
-- Index pour la table `appartient_albums`
--
ALTER TABLE `appartient_albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appartient_albums_album_id_foreign` (`album_id`),
  ADD KEY `appartient_albums_version_morceau_id_foreign` (`version_morceau_id`);

--
-- Index pour la table `artistes`
--
ALTER TABLE `artistes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artistes_pseudo_index` (`pseudo`),
  ADD KEY `artistes_name_index` (`name`);

--
-- Index pour la table `contient_morceaus`
--
ALTER TABLE `contient_morceaus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contient_morceaus_playlist_id_foreign` (`playlist_id`),
  ADD KEY `contient_morceaus_version_morceau_id_foreign` (`version_morceau_id`);

--
-- Index pour la table `est_membres`
--
ALTER TABLE `est_membres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `est_membres_artiste_id_foreign` (`artiste_id`),
  ADD KEY `est_membres_groupe_id_foreign` (`groupe_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `formation_add_categorie`
--
ALTER TABLE `formation_add_categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formation_add_comment`
--
ALTER TABLE `formation_add_comment`
  ADD PRIMARY KEY (`id_com`);

--
-- Index pour la table `formation_add_video`
--
ALTER TABLE `formation_add_video`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formation_users`
--
ALTER TABLE `formation_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genres_genre_index` (`genre`);

--
-- Index pour la table `genre_albums`
--
ALTER TABLE `genre_albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_albums_genre_id_foreign` (`genre_id`),
  ADD KEY `genre_albums_album_id_foreign` (`album_id`);

--
-- Index pour la table `genre_artistes`
--
ALTER TABLE `genre_artistes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_artistes_genre_id_foreign` (`genre_id`),
  ADD KEY `genre_artistes_artiste_id_foreign` (`artiste_id`);

--
-- Index pour la table `genre_groupes`
--
ALTER TABLE `genre_groupes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_groupes_genre_id_foreign` (`genre_id`),
  ADD KEY `genre_groupes_groupe_id_foreign` (`groupe_id`);

--
-- Index pour la table `genre_version_morceaus`
--
ALTER TABLE `genre_version_morceaus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_version_morceaus_genre_id_foreign` (`genre_id`),
  ADD KEY `genre_version_morceaus_version_morceau_id_foreign` (`version_morceau_id`);

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupes_name_index` (`name`),
  ADD KEY `groupes_nationalite_index` (`nationalite`);

--
-- Index pour la table `intervient_version_morceaus`
--
ALTER TABLE `intervient_version_morceaus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `intervient_version_morceaus_artiste_id_foreign` (`artiste_id`),
  ADD KEY `intervient_version_morceaus_version_morceau_id_foreign` (`version_morceau_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `morceaus`
--
ALTER TABLE `morceaus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `morceaus_titre_original_index` (`titre_original`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlists_user_id_foreign` (`user_id`),
  ADD KEY `playlists_name_index` (`name`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_nom_index` (`name`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `version_morceaus`
--
ALTER TABLE `version_morceaus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `version_morceaus_morceau_id_foreign` (`morceau_id`),
  ADD KEY `version_morceaus_titre_index` (`titre`),
  ADD KEY `version_morceaus_duree_secondes_index` (`duree_secondes`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `appartient_albums`
--
ALTER TABLE `appartient_albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `artistes`
--
ALTER TABLE `artistes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `contient_morceaus`
--
ALTER TABLE `contient_morceaus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `est_membres`
--
ALTER TABLE `est_membres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation_add_categorie`
--
ALTER TABLE `formation_add_categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `formation_add_comment`
--
ALTER TABLE `formation_add_comment`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `formation_add_video`
--
ALTER TABLE `formation_add_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `formation_users`
--
ALTER TABLE `formation_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `genre_albums`
--
ALTER TABLE `genre_albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `genre_artistes`
--
ALTER TABLE `genre_artistes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `genre_groupes`
--
ALTER TABLE `genre_groupes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `genre_version_morceaus`
--
ALTER TABLE `genre_version_morceaus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `intervient_version_morceaus`
--
ALTER TABLE `intervient_version_morceaus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `morceaus`
--
ALTER TABLE `morceaus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `version_morceaus`
--
ALTER TABLE `version_morceaus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_groupe_id_foreign` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `appartient_albums`
--
ALTER TABLE `appartient_albums`
  ADD CONSTRAINT `appartient_albums_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appartient_albums_version_morceau_id_foreign` FOREIGN KEY (`version_morceau_id`) REFERENCES `version_morceaus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contient_morceaus`
--
ALTER TABLE `contient_morceaus`
  ADD CONSTRAINT `contient_morceaus_playlist_id_foreign` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contient_morceaus_version_morceau_id_foreign` FOREIGN KEY (`version_morceau_id`) REFERENCES `version_morceaus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `est_membres`
--
ALTER TABLE `est_membres`
  ADD CONSTRAINT `est_membres_artiste_id_foreign` FOREIGN KEY (`artiste_id`) REFERENCES `artistes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `est_membres_groupe_id_foreign` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `genre_albums`
--
ALTER TABLE `genre_albums`
  ADD CONSTRAINT `genre_albums_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `genre_albums_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `genre_artistes`
--
ALTER TABLE `genre_artistes`
  ADD CONSTRAINT `genre_artistes_artiste_id_foreign` FOREIGN KEY (`artiste_id`) REFERENCES `artistes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `genre_artistes_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `genre_groupes`
--
ALTER TABLE `genre_groupes`
  ADD CONSTRAINT `genre_groupes_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `genre_groupes_groupe_id_foreign` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `genre_version_morceaus`
--
ALTER TABLE `genre_version_morceaus`
  ADD CONSTRAINT `genre_version_morceaus_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `genre_version_morceaus_version_morceau_id_foreign` FOREIGN KEY (`version_morceau_id`) REFERENCES `version_morceaus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `intervient_version_morceaus`
--
ALTER TABLE `intervient_version_morceaus`
  ADD CONSTRAINT `intervient_version_morceaus_artiste_id_foreign` FOREIGN KEY (`artiste_id`) REFERENCES `artistes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `intervient_version_morceaus_version_morceau_id_foreign` FOREIGN KEY (`version_morceau_id`) REFERENCES `version_morceaus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `version_morceaus`
--
ALTER TABLE `version_morceaus`
  ADD CONSTRAINT `version_morceaus_morceau_id_foreign` FOREIGN KEY (`morceau_id`) REFERENCES `morceaus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
