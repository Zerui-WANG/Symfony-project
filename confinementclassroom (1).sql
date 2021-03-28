-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 28 mars 2021 à 21:58
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `confinementclassroom`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

DROP TABLE IF EXISTS `action`;
CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `action_period` int(11) NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `app` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `action`
--

INSERT INTO `action` (`id`, `duration`, `action_period`, `is_available`, `app`) VALUES
(48, 2, 0, 1, 'boom'),
(49, 3, 1, 1, 'boom'),
(50, 4, 2, 1, 'boom'),
(51, 5, 0, 1, 'netflip'),
(52, 6, 0, 1, 'what\'s up'),
(53, 2, 0, 1, 'boom'),
(54, 3, 1, 1, 'boom'),
(55, 4, 2, 1, 'boom'),
(56, 5, 0, 1, 'netflip'),
(57, 6, 0, 1, 'what\'s up'),
(61, 2, 0, 1, 'boom'),
(62, 3, 1, 1, 'boom'),
(63, 4, 2, 1, 'boom'),
(64, 5, 0, 1, 'netflip'),
(65, 6, 0, 1, 'what\'s up'),
(69, 2, 0, 1, 'boom'),
(70, 3, 1, 1, 'boom'),
(71, 4, 2, 1, 'boom'),
(72, 5, 0, 1, 'netflip'),
(73, 6, 0, 1, 'what\'s up'),
(77, 2, 0, 1, 'boom'),
(78, 3, 1, 1, 'boom'),
(79, 4, 2, 1, 'boom'),
(80, 5, 0, 1, 'netflip'),
(81, 6, 0, 1, 'what\'s up'),
(85, 2, 0, 1, 'boom'),
(86, 3, 1, 1, 'boom'),
(87, 4, 2, 1, 'boom'),
(88, 5, 0, 1, 'netflip'),
(89, 6, 0, 1, 'what\'s up'),
(93, 2, 0, 1, 'boom'),
(94, 3, 1, 1, 'boom'),
(95, 4, 2, 1, 'boom'),
(96, 5, 0, 1, 'netflip'),
(97, 6, 0, 1, 'what\'s up'),
(101, 2, 0, 1, 'boom'),
(102, 3, 1, 1, 'boom'),
(103, 4, 2, 1, 'boom'),
(104, 5, 0, 1, 'netflip'),
(105, 6, 0, 1, 'what\'s up');

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description_answer` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `answer`
--

INSERT INTO `answer` (`id`, `description_answer`) VALUES
(19, 'Description answer n°0'),
(20, 'Description answer n°1'),
(21, 'Description answer n°2'),
(22, 'Description answer n°3'),
(23, 'Description answer n°4'),
(24, 'Description answer n°5'),
(25, 'Description answer n°6'),
(26, 'Description answer n°7'),
(27, 'Description answer n°8'),
(28, 'Description answer n°9'),
(29, 'Description answer n°10'),
(30, 'Description answer n°11'),
(31, 'Description answer n°12'),
(32, 'Description answer n°13'),
(33, 'Description answer n°14'),
(34, 'Description answer n°15');

-- --------------------------------------------------------

--
-- Structure de la table `answer_effect_player`
--

DROP TABLE IF EXISTS `answer_effect_player`;
CREATE TABLE IF NOT EXISTS `answer_effect_player` (
  `answer_id` int(11) NOT NULL,
  `effect_player_id` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`,`effect_player_id`),
  KEY `IDX_AB7C30D0AA334807` (`answer_id`),
  KEY `IDX_AB7C30D08E63843A` (`effect_player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `answer_effect_player`
--

INSERT INTO `answer_effect_player` (`answer_id`, `effect_player_id`) VALUES
(27, 8),
(27, 9),
(28, 8),
(28, 9),
(29, 8),
(29, 9),
(30, 8),
(30, 9),
(31, 10),
(31, 11),
(32, 10),
(32, 11),
(33, 10),
(33, 11),
(34, 10),
(34, 11);

-- --------------------------------------------------------

--
-- Structure de la table `answer_effect_student`
--

DROP TABLE IF EXISTS `answer_effect_student`;
CREATE TABLE IF NOT EXISTS `answer_effect_student` (
  `answer_id` int(11) NOT NULL,
  `effect_student_id` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`,`effect_student_id`),
  KEY `IDX_C1B8D7AAA334807` (`answer_id`),
  KEY `IDX_C1B8D7A1BE3DC9C` (`effect_student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `answer_effect_student`
--

INSERT INTO `answer_effect_student` (`answer_id`, `effect_student_id`) VALUES
(19, 7),
(19, 8),
(20, 7),
(20, 8),
(21, 7),
(21, 8),
(22, 7),
(22, 8),
(23, 9),
(23, 10),
(24, 9),
(24, 10),
(25, 9),
(25, 10),
(26, 9),
(26, 10);

-- --------------------------------------------------------

--
-- Structure de la table `answer_question`
--

DROP TABLE IF EXISTS `answer_question`;
CREATE TABLE IF NOT EXISTS `answer_question` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`,`question_id`),
  KEY `IDX_91BD482BAA334807` (`answer_id`),
  KEY `IDX_91BD482B1E27F6BF` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `answer_question`
--

INSERT INTO `answer_question` (`answer_id`, `question_id`) VALUES
(19, 45),
(19, 58),
(19, 66),
(19, 74),
(19, 82),
(19, 90),
(19, 98),
(19, 106),
(20, 45),
(20, 58),
(20, 66),
(20, 74),
(20, 82),
(20, 90),
(20, 98),
(20, 106),
(21, 45),
(21, 59),
(21, 67),
(21, 75),
(21, 83),
(21, 91),
(21, 99),
(21, 107),
(22, 59),
(22, 67),
(22, 75),
(22, 83),
(22, 91),
(22, 99),
(22, 107),
(23, 46),
(23, 60),
(23, 68),
(23, 76),
(23, 84),
(23, 92),
(23, 100),
(23, 108),
(24, 46),
(24, 60),
(24, 68),
(24, 76),
(24, 84),
(24, 92),
(24, 100),
(24, 108),
(25, 46),
(25, 53),
(25, 61),
(25, 69),
(25, 77),
(25, 85),
(25, 93),
(25, 101),
(26, 53),
(26, 61),
(26, 69),
(26, 77),
(26, 85),
(26, 93),
(26, 101),
(27, 47),
(27, 54),
(27, 62),
(27, 70),
(27, 78),
(27, 86),
(27, 94),
(27, 102),
(28, 47),
(28, 54),
(28, 62),
(28, 70),
(28, 78),
(28, 86),
(28, 94),
(28, 102),
(29, 47),
(29, 55),
(29, 63),
(29, 71),
(29, 79),
(29, 87),
(29, 95),
(29, 103),
(30, 55),
(30, 63),
(30, 71),
(30, 79),
(30, 87),
(30, 95),
(30, 103),
(31, 48),
(31, 56),
(31, 64),
(31, 72),
(31, 80),
(31, 88),
(31, 96),
(31, 104),
(32, 48),
(32, 56),
(32, 64),
(32, 72),
(32, 80),
(32, 88),
(32, 96),
(32, 104),
(33, 48),
(33, 57),
(33, 65),
(33, 73),
(33, 81),
(33, 89),
(33, 97),
(33, 105),
(34, 57),
(34, 65),
(34, 73),
(34, 81),
(34, 89),
(34, 97),
(34, 105);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210323174936', '2021-03-23 17:50:14', 1348),
('DoctrineMigrations\\Version20210326125142', '2021-03-26 12:52:54', 66);

-- --------------------------------------------------------

--
-- Structure de la table `effect_player`
--

DROP TABLE IF EXISTS `effect_player`;
CREATE TABLE IF NOT EXISTS `effect_player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value_effect_player` int(11) NOT NULL,
  `characteristic_player` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `effect_player`
--

INSERT INTO `effect_player` (`id`, `value_effect_player`, `characteristic_player`) VALUES
(8, 10, 'mood'),
(9, -10, 'sleep'),
(10, 1, 'charisma'),
(11, 2, 'pedagogy');

-- --------------------------------------------------------

--
-- Structure de la table `effect_student`
--

DROP TABLE IF EXISTS `effect_student`;
CREATE TABLE IF NOT EXISTS `effect_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value_effect_student` int(11) NOT NULL,
  `characteristic_student` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `effect_student`
--

INSERT INTO `effect_student` (`id`, `value_effect_student`, `characteristic_student`) VALUES
(7, 1, 'isPresent'),
(8, 2, 'grade'),
(9, 2, 'attendance'),
(10, 3, 'attendance');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL,
  `cooldown` int(11) NOT NULL,
  `frequency` int(11) NOT NULL,
  `cooldown_min` int(11) NOT NULL,
  `cooldown_max` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `cooldown`, `frequency`, `cooldown_min`, `cooldown_max`) VALUES
(45, 0, 0, 1, 5),
(46, 1, 1, 2, 6),
(47, 2, 0, 3, 7),
(58, 0, 0, 1, 5),
(59, 1, 1, 2, 6),
(60, 2, 0, 3, 7),
(66, 0, 0, 1, 5),
(67, 1, 1, 2, 6),
(68, 2, 0, 3, 7),
(74, 0, 0, 1, 5),
(75, 1, 1, 2, 6),
(76, 2, 0, 3, 7),
(82, 0, 0, 1, 5),
(83, 1, 1, 2, 6),
(84, 2, 0, 3, 7),
(90, 0, 0, 1, 5),
(91, 1, 1, 2, 6),
(92, 2, 0, 3, 7),
(98, 0, 0, 1, 5),
(99, 1, 1, 2, 6),
(100, 2, 0, 3, 7),
(106, 0, 0, 1, 5),
(107, 1, 1, 2, 6),
(108, 2, 0, 3, 7);

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) NOT NULL,
  `turn` int(11) NOT NULL,
  `day_time` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_232B318C99E6F5DF` (`player_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `player_id`, `turn`, `day_time`, `created_at`) VALUES
(11, 17, 1, 0, '2021-03-26 12:53:19'),
(12, 18, 1, 0, '2021-03-26 12:53:19'),
(13, 19, 1, 0, '2021-03-26 12:53:19'),
(14, 20, 10, 0, '2021-03-26 13:05:19'),
(15, 21, 7, 2, '2021-03-26 13:38:12'),
(16, 22, 1, 1, '2021-03-26 14:57:00'),
(17, 23, -1, 2, '2021-03-28 16:45:18'),
(18, 24, 10, 0, '2021-03-28 21:22:21'),
(19, 25, -1, 0, '2021-03-28 21:26:11'),
(20, 26, 10, 0, '2021-03-28 21:29:49');

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mood` int(11) NOT NULL,
  `sleep` int(11) NOT NULL,
  `pedagogy` int(11) NOT NULL,
  `charisma` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `player`
--

INSERT INTO `player` (`id`, `mood`, `sleep`, `pedagogy`, `charisma`) VALUES
(17, 100, 100, 5, 5),
(18, 100, 100, 5, 5),
(19, 100, 100, 5, 5),
(20, 100, 100, 5, 5),
(21, 100, 80, 10, 8),
(22, 100, 80, 10, 10),
(23, 100, 80, 10, 10),
(24, 100, 100, 5, 5),
(25, 100, 80, 10, 10),
(26, 100, 100, 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `name_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_question` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B6F7494EE48FD905` (`game_id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id`, `game_id`, `name_question`, `description_question`, `type`) VALUES
(45, 13, 'Nom de question n°0', 'Description de question n°0', 'event'),
(46, 13, 'Nom de question n°1', 'Description de question n°1', 'event'),
(47, 13, 'Nom de question n°2', 'Description de question n°2', 'event'),
(48, 13, 'Nom de question n°3', 'Description de question n°3', 'action'),
(49, 13, 'Nom de question n°4', 'Description de question n°4', 'action'),
(50, 13, 'Nom de question n°5', 'Description de question n°5', 'action'),
(51, 13, 'Nom de question n°6', 'Description de question n°6', 'action'),
(52, 13, 'Nom de question n°7', 'Description de question n°7', 'action'),
(53, 14, 'Nom de question n°3', 'Description de question n°3', 'action'),
(54, 14, 'Nom de question n°4', 'Description de question n°4', 'action'),
(55, 14, 'Nom de question n°5', 'Description de question n°5', 'action'),
(56, 14, 'Nom de question n°6', 'Description de question n°6', 'action'),
(57, 14, 'Nom de question n°7', 'Description de question n°7', 'action'),
(58, 14, 'Nom de question n°0', 'Description de question n°0', 'event'),
(59, 14, 'Nom de question n°1', 'Description de question n°1', 'event'),
(60, 14, 'Nom de question n°2', 'Description de question n°2', 'event'),
(61, 15, 'Nom de question n°3', 'Description de question n°3', 'action'),
(62, 15, 'Nom de question n°4', 'Description de question n°4', 'action'),
(63, 15, 'Nom de question n°5', 'Description de question n°5', 'action'),
(64, 15, 'Nom de question n°6', 'Description de question n°6', 'action'),
(65, 15, 'Nom de question n°7', 'Description de question n°7', 'action'),
(66, 15, 'Nom de question n°0', 'Description de question n°0', 'event'),
(67, 15, 'Nom de question n°1', 'Description de question n°1', 'event'),
(68, 15, 'Nom de question n°2', 'Description de question n°2', 'event'),
(69, 16, 'Nom de question n°3', 'Description de question n°3', 'action'),
(70, 16, 'Nom de question n°4', 'Description de question n°4', 'action'),
(71, 16, 'Nom de question n°5', 'Description de question n°5', 'action'),
(72, 16, 'Nom de question n°6', 'Description de question n°6', 'action'),
(73, 16, 'Nom de question n°7', 'Description de question n°7', 'action'),
(74, 16, 'Nom de question n°0', 'Description de question n°0', 'event'),
(75, 16, 'Nom de question n°1', 'Description de question n°1', 'event'),
(76, 16, 'Nom de question n°2', 'Description de question n°2', 'event'),
(77, 17, 'Nom de question n°3', 'Description de question n°3', 'action'),
(78, 17, 'Nom de question n°4', 'Description de question n°4', 'action'),
(79, 17, 'Nom de question n°5', 'Description de question n°5', 'action'),
(80, 17, 'Nom de question n°6', 'Description de question n°6', 'action'),
(81, 17, 'Nom de question n°7', 'Description de question n°7', 'action'),
(82, 17, 'Nom de question n°0', 'Description de question n°0', 'event'),
(83, 17, 'Nom de question n°1', 'Description de question n°1', 'event'),
(84, 17, 'Nom de question n°2', 'Description de question n°2', 'event'),
(85, 18, 'Nom de question n°3', 'Description de question n°3', 'action'),
(86, 18, 'Nom de question n°4', 'Description de question n°4', 'action'),
(87, 18, 'Nom de question n°5', 'Description de question n°5', 'action'),
(88, 18, 'Nom de question n°6', 'Description de question n°6', 'action'),
(89, 18, 'Nom de question n°7', 'Description de question n°7', 'action'),
(90, 18, 'Nom de question n°0', 'Description de question n°0', 'event'),
(91, 18, 'Nom de question n°1', 'Description de question n°1', 'event'),
(92, 18, 'Nom de question n°2', 'Description de question n°2', 'event'),
(93, 19, 'Nom de question n°3', 'Description de question n°3', 'action'),
(94, 19, 'Nom de question n°4', 'Description de question n°4', 'action'),
(95, 19, 'Nom de question n°5', 'Description de question n°5', 'action'),
(96, 19, 'Nom de question n°6', 'Description de question n°6', 'action'),
(97, 19, 'Nom de question n°7', 'Description de question n°7', 'action'),
(98, 19, 'Nom de question n°0', 'Description de question n°0', 'event'),
(99, 19, 'Nom de question n°1', 'Description de question n°1', 'event'),
(100, 19, 'Nom de question n°2', 'Description de question n°2', 'event'),
(101, 20, 'Nom de question n°3', 'Description de question n°3', 'action'),
(102, 20, 'Nom de question n°4', 'Description de question n°4', 'action'),
(103, 20, 'Nom de question n°5', 'Description de question n°5', 'action'),
(104, 20, 'Nom de question n°6', 'Description de question n°6', 'action'),
(105, 20, 'Nom de question n°7', 'Description de question n°7', 'action'),
(106, 20, 'Nom de question n°0', 'Description de question n°0', 'event'),
(107, 20, 'Nom de question n°1', 'Description de question n°1', 'event'),
(108, 20, 'Nom de question n°2', 'Description de question n°2', 'event');

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `attendance` int(11) NOT NULL,
  `personality` int(11) NOT NULL,
  `grade` int(11) DEFAULT NULL,
  `is_failure` tinyint(1) NOT NULL,
  `is_present` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B723AF33E48FD905` (`game_id`)
) ENGINE=InnoDB AUTO_INCREMENT=396 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`id`, `game_id`, `attendance`, `personality`, `grade`, `is_failure`, `is_present`, `name`) VALUES
(171, 12, 9, 9, 8, 0, 1, 'Student n°0'),
(172, 12, 55, 4, 13, 0, 1, 'Student n°1'),
(173, 12, 90, 1, 6, 0, 1, 'Student n°2'),
(174, 12, 6, 2, 10, 0, 1, 'Student n°3'),
(175, 12, 99, 1, 9, 0, 1, 'Student n°4'),
(176, 12, 48, 6, 14, 0, 1, 'Student n°5'),
(177, 12, 12, 7, 5, 0, 1, 'Student n°6'),
(178, 12, 52, 7, 15, 0, 1, 'Student n°7'),
(179, 12, 47, 9, 15, 0, 1, 'Student n°8'),
(180, 12, 52, 1, 12, 0, 1, 'Student n°9'),
(181, 12, 20, 1, 6, 0, 1, 'Student n°10'),
(182, 12, 73, 2, 15, 0, 1, 'Student n°11'),
(183, 12, 87, 4, 6, 0, 1, 'Student n°12'),
(184, 12, 94, 8, 8, 0, 1, 'Student n°13'),
(185, 12, 8, 9, 7, 0, 1, 'Student n°14'),
(186, 12, 3, 3, 10, 0, 1, 'Student n°15'),
(187, 12, 90, 7, 15, 0, 1, 'Student n°16'),
(188, 12, 12, 9, 7, 0, 1, 'Student n°17'),
(189, 12, 11, 2, 5, 0, 1, 'Student n°18'),
(190, 12, 16, 2, 11, 0, 1, 'Student n°19'),
(191, 12, 65, 8, 8, 0, 1, 'Student n°20'),
(192, 12, 82, 8, 12, 0, 1, 'Student n°21'),
(193, 12, 30, 1, 8, 0, 1, 'Student n°22'),
(194, 12, 96, 2, 12, 0, 1, 'Student n°23'),
(195, 12, 65, 1, 9, 0, 1, 'Student n°24'),
(196, 13, 48, 5, 8, 0, 1, 'Philip Peterson'),
(197, 13, 1, 3, 13, 0, 1, 'Ignacia Ward'),
(198, 13, 39, 5, 8, 0, 1, 'Elmo Wright'),
(199, 13, 33, 3, 14, 0, 1, 'Bruno Hanson'),
(200, 13, 65, 10, 13, 0, 1, 'Cynthia Gordon'),
(201, 13, 68, 3, 7, 0, 1, 'Leslie Johns'),
(202, 13, 3, 4, 14, 0, 1, 'Daryl Reid'),
(203, 13, 49, 5, 15, 0, 1, 'Quin Blevins'),
(204, 13, 6, 8, 8, 0, 1, 'Barry Kirby'),
(205, 13, 15, 4, 10, 0, 1, 'TaShya Livingston'),
(206, 13, 96, 10, 6, 0, 1, 'Rae Holder'),
(207, 13, 1, 8, 15, 0, 1, 'MacKenzie Mcknight'),
(208, 13, 55, 2, 6, 0, 1, 'Jack Barrera'),
(209, 13, 4, 2, 9, 0, 1, 'Joseph Ford'),
(210, 13, 77, 6, 12, 0, 1, 'Nissim Dunn'),
(211, 13, 55, 1, 7, 0, 1, 'Alfreda Flynn'),
(212, 13, 27, 8, 9, 0, 1, 'Channing Cameron'),
(213, 13, 1, 5, 5, 0, 1, 'Alea Mcdonald'),
(214, 13, 51, 7, 15, 0, 1, 'Quin Blevins'),
(215, 13, 41, 3, 11, 0, 1, 'Daryl Reid'),
(216, 13, 32, 7, 14, 0, 1, 'Quin Blevins'),
(217, 13, 49, 4, 7, 0, 1, 'Barry Kirby'),
(218, 13, 50, 5, 6, 0, 1, 'Candice Holland'),
(219, 13, 13, 9, 8, 0, 1, 'Kelly Pierce'),
(220, 13, 87, 7, 8, 0, 1, 'Arthur Sutton'),
(221, 14, 29, 10, 12, 0, 1, 'Student n°25'),
(222, 14, 36, 3, 13, 0, 1, 'Student n°25'),
(223, 14, 1, 9, 6, 0, 1, 'Student n°25'),
(224, 14, 5, 1, 11, 0, 1, 'Student n°25'),
(225, 14, 4, 3, 5, 0, 1, 'Student n°25'),
(226, 14, 95, 3, 6, 0, 1, 'Student n°25'),
(227, 14, 36, 3, 15, 0, 1, 'Student n°25'),
(228, 14, 34, 1, 6, 0, 1, 'Student n°25'),
(229, 14, 32, 9, 5, 0, 1, 'Student n°25'),
(230, 14, 86, 10, 9, 0, 1, 'Student n°25'),
(231, 14, 14, 4, 11, 0, 1, 'Student n°25'),
(232, 14, 90, 2, 15, 0, 1, 'Student n°25'),
(233, 14, 79, 8, 6, 0, 1, 'Student n°25'),
(234, 14, 67, 8, 14, 0, 1, 'Student n°25'),
(235, 14, 13, 10, 15, 0, 1, 'Student n°25'),
(236, 14, 57, 7, 5, 0, 1, 'Student n°25'),
(237, 14, 17, 8, 12, 0, 1, 'Student n°25'),
(238, 14, 50, 10, 12, 0, 1, 'Student n°25'),
(239, 14, 88, 2, 11, 0, 1, 'Student n°25'),
(240, 14, 24, 6, 9, 0, 1, 'Student n°25'),
(241, 14, 76, 4, 9, 0, 1, 'Student n°25'),
(242, 14, 29, 5, 7, 0, 1, 'Student n°25'),
(243, 14, 7, 10, 9, 0, 1, 'Student n°25'),
(244, 14, 74, 10, 8, 0, 1, 'Student n°25'),
(245, 14, 71, 6, 12, 0, 1, 'Student n°25'),
(246, 15, 100, 1, 10, 0, 1, 'Philip Peterson'),
(247, 15, 100, 10, 13, 0, 1, 'Ignacia Ward'),
(248, 15, 100, 10, 10, 0, 1, 'Elmo Wright'),
(249, 15, 100, 1, 8, 0, 1, 'Bruno Hanson'),
(250, 15, 100, 8, 9, 0, 1, 'Cynthia Gordon'),
(251, 15, 100, 10, 8, 0, 1, 'Leslie Johns'),
(252, 15, 100, 4, 13, 0, 1, 'Daryl Reid'),
(253, 15, 100, 1, 15, 0, 1, 'Quin Blevins'),
(254, 15, 100, 6, 11, 0, 1, 'Barry Kirby'),
(255, 15, 100, 9, 14, 0, 1, 'TaShya Livingston'),
(256, 15, 100, 5, 8, 0, 1, 'Rae Holder'),
(257, 15, 100, 10, 9, 0, 1, 'MacKenzie Mcknight'),
(258, 15, 100, 7, 10, 0, 1, 'Jack Barrera'),
(259, 15, 100, 8, 8, 0, 1, 'Joseph Ford'),
(260, 15, 100, 3, 12, 0, 1, 'Nissim Dunn'),
(261, 15, 100, 9, 5, 0, 1, 'Alfreda Flynn'),
(262, 15, 100, 3, 5, 0, 1, 'Channing Cameron'),
(263, 15, 100, 1, 12, 0, 1, 'Alea Mcdonald'),
(264, 15, 100, 3, 13, 0, 1, 'Quin Blevins'),
(265, 15, 100, 5, 9, 0, 1, 'Daryl Reid'),
(266, 15, 100, 10, 8, 0, 1, 'Quin Blevins'),
(267, 15, 100, 9, 14, 0, 1, 'Barry Kirby'),
(268, 15, 100, 2, 10, 0, 1, 'Candice Holland'),
(269, 15, 100, 3, 8, 0, 1, 'Kelly Pierce'),
(270, 15, 100, 8, 13, 0, 1, 'Arthur Sutton'),
(271, 16, 100, 3, 9, 1, 1, 'Philip Peterson'),
(272, 16, 100, 1, 13, 0, 1, 'Ignacia Ward'),
(273, 16, 100, 5, 8, 1, 1, 'Elmo Wright'),
(274, 16, 100, 5, 7, 1, 1, 'Bruno Hanson'),
(275, 16, 100, 10, 13, 0, 1, 'Cynthia Gordon'),
(276, 16, 100, 3, 9, 1, 1, 'Leslie Johns'),
(277, 16, 100, 1, 8, 1, 1, 'Daryl Reid'),
(278, 16, 100, 10, 12, 0, 1, 'Quin Blevins'),
(279, 16, 100, 6, 6, 1, 1, 'Barry Kirby'),
(280, 16, 100, 8, 6, 1, 1, 'TaShya Livingston'),
(281, 16, 100, 6, 8, 1, 1, 'Rae Holder'),
(282, 16, 100, 10, 5, 1, 1, 'MacKenzie Mcknight'),
(283, 16, 100, 1, 6, 1, 1, 'Jack Barrera'),
(284, 16, 100, 10, 13, 0, 1, 'Joseph Ford'),
(285, 16, 100, 7, 8, 1, 1, 'Nissim Dunn'),
(286, 16, 100, 7, 14, 0, 1, 'Alfreda Flynn'),
(287, 16, 100, 8, 13, 0, 1, 'Channing Cameron'),
(288, 16, 100, 1, 5, 1, 1, 'Alea Mcdonald'),
(289, 16, 100, 9, 14, 0, 1, 'Quin Blevins'),
(290, 16, 100, 10, 11, 0, 1, 'Daryl Reid'),
(291, 16, 100, 1, 7, 1, 1, 'Quin Blevins'),
(292, 16, 100, 8, 11, 0, 1, 'Barry Kirby'),
(293, 16, 100, 6, 5, 1, 1, 'Candice Holland'),
(294, 16, 100, 4, 12, 0, 1, 'Kelly Pierce'),
(295, 16, 100, 10, 7, 1, 1, 'Arthur Sutton'),
(296, 17, 100, 8, 5, 1, 1, 'Philip Peterson'),
(297, 17, 100, 7, 7, 1, 1, 'Ignacia Ward'),
(298, 17, 100, 6, 15, 0, 1, 'Elmo Wright'),
(299, 17, 100, 8, 13, 0, 1, 'Bruno Hanson'),
(300, 17, 100, 10, 10, 0, 1, 'Cynthia Gordon'),
(301, 17, 100, 8, 14, 0, 1, 'Leslie Johns'),
(302, 17, 100, 10, 12, 0, 1, 'Daryl Reid'),
(303, 17, 100, 1, 9, 1, 1, 'Quin Blevins'),
(304, 17, 100, 10, 13, 0, 1, 'Barry Kirby'),
(305, 17, 100, 10, 12, 0, 1, 'TaShya Livingston'),
(306, 17, 100, 2, 9, 1, 1, 'Rae Holder'),
(307, 17, 100, 6, 6, 1, 1, 'MacKenzie Mcknight'),
(308, 17, 100, 5, 10, 0, 1, 'Jack Barrera'),
(309, 17, 100, 5, 12, 0, 1, 'Joseph Ford'),
(310, 17, 100, 7, 11, 0, 1, 'Nissim Dunn'),
(311, 17, 100, 2, 7, 1, 1, 'Alfreda Flynn'),
(312, 17, 100, 7, 15, 0, 1, 'Channing Cameron'),
(313, 17, 100, 4, 9, 1, 1, 'Alea Mcdonald'),
(314, 17, 100, 9, 14, 0, 1, 'Quin Blevins'),
(315, 17, 100, 8, 10, 0, 1, 'Daryl Reid'),
(316, 17, 100, 9, 15, 0, 1, 'Quin Blevins'),
(317, 17, 100, 4, 5, 1, 1, 'Barry Kirby'),
(318, 17, 100, 10, 11, 0, 1, 'Candice Holland'),
(319, 17, 100, 9, 9, 1, 1, 'Kelly Pierce'),
(320, 17, 100, 10, 12, 0, 1, 'Arthur Sutton'),
(321, 18, 13, 6, 15, 0, 1, 'Philip Peterson'),
(322, 18, 72, 4, 5, 1, 1, 'Ignacia Ward'),
(323, 18, 6, 2, 11, 0, 1, 'Elmo Wright'),
(324, 18, 35, 8, 8, 1, 1, 'Bruno Hanson'),
(325, 18, 91, 4, 15, 0, 1, 'Cynthia Gordon'),
(326, 18, 32, 4, 5, 1, 1, 'Leslie Johns'),
(327, 18, 15, 4, 15, 0, 1, 'Daryl Reid'),
(328, 18, 44, 8, 13, 0, 1, 'Quin Blevins'),
(329, 18, 56, 4, 15, 0, 1, 'Barry Kirby'),
(330, 18, 65, 9, 7, 1, 1, 'TaShya Livingston'),
(331, 18, 1, 2, 5, 1, 1, 'Rae Holder'),
(332, 18, 21, 1, 10, 0, 1, 'MacKenzie Mcknight'),
(333, 18, 1, 9, 11, 0, 1, 'Jack Barrera'),
(334, 18, 70, 2, 5, 1, 1, 'Joseph Ford'),
(335, 18, 39, 9, 11, 0, 1, 'Nissim Dunn'),
(336, 18, 92, 2, 12, 0, 1, 'Alfreda Flynn'),
(337, 18, 27, 2, 8, 1, 1, 'Channing Cameron'),
(338, 18, 2, 3, 9, 1, 1, 'Alea Mcdonald'),
(339, 18, 81, 2, 14, 0, 1, 'Quin Blevins'),
(340, 18, 6, 9, 15, 0, 1, 'Daryl Reid'),
(341, 18, 39, 10, 12, 0, 1, 'Quin Blevins'),
(342, 18, 89, 10, 5, 1, 1, 'Barry Kirby'),
(343, 18, 22, 3, 7, 1, 1, 'Candice Holland'),
(344, 18, 60, 3, 5, 1, 1, 'Kelly Pierce'),
(345, 18, 7, 9, 8, 1, 1, 'Arthur Sutton'),
(346, 19, 100, 9, 5, 1, 1, 'Philip Peterson'),
(347, 19, 100, 4, 5, 1, 1, 'Ignacia Ward'),
(348, 19, 100, 9, 15, 0, 1, 'Elmo Wright'),
(349, 19, 100, 10, 14, 0, 1, 'Bruno Hanson'),
(350, 19, 100, 1, 13, 0, 1, 'Cynthia Gordon'),
(351, 19, 86, 1, 6, 1, 1, 'Leslie Johns'),
(352, 19, 65, 4, 12, 0, 1, 'Daryl Reid'),
(353, 19, 100, 10, 12, 0, 1, 'Quin Blevins'),
(354, 19, 100, 9, 7, 1, 1, 'Barry Kirby'),
(355, 19, 89, 2, 15, 0, 1, 'TaShya Livingston'),
(356, 19, 100, 7, 15, 0, 1, 'Rae Holder'),
(357, 19, 67, 2, 15, 0, 1, 'MacKenzie Mcknight'),
(358, 19, 100, 5, 6, 1, 1, 'Jack Barrera'),
(359, 19, 91, 2, 12, 0, 1, 'Joseph Ford'),
(360, 19, 100, 1, 13, 0, 1, 'Nissim Dunn'),
(361, 19, 100, 1, 6, 1, 1, 'Alfreda Flynn'),
(362, 19, 100, 8, 15, 0, 1, 'Channing Cameron'),
(363, 19, 100, 9, 5, 1, 1, 'Alea Mcdonald'),
(364, 19, 75, 4, 13, 0, 1, 'Quin Blevins'),
(365, 19, 100, 4, 8, 1, 1, 'Daryl Reid'),
(366, 19, 100, 9, 14, 0, 1, 'Quin Blevins'),
(367, 19, 94, 4, 7, 1, 1, 'Barry Kirby'),
(368, 19, 64, 3, 10, 0, 1, 'Candice Holland'),
(369, 19, 93, 3, 8, 1, 1, 'Kelly Pierce'),
(370, 19, 100, 7, 15, 0, 1, 'Arthur Sutton'),
(371, 20, 2, 8, 9, 1, 1, 'Philip Peterson'),
(372, 20, 97, 10, 11, 0, 1, 'Ignacia Ward'),
(373, 20, 56, 9, 14, 0, 1, 'Elmo Wright'),
(374, 20, 68, 8, 9, 1, 1, 'Bruno Hanson'),
(375, 20, 10, 10, 14, 0, 1, 'Cynthia Gordon'),
(376, 20, 77, 3, 10, 0, 1, 'Leslie Johns'),
(377, 20, 48, 9, 14, 0, 1, 'Daryl Reid'),
(378, 20, 97, 9, 6, 1, 1, 'Quin Blevins'),
(379, 20, 45, 5, 5, 1, 1, 'Barry Kirby'),
(380, 20, 83, 8, 13, 0, 1, 'TaShya Livingston'),
(381, 20, 51, 2, 6, 1, 1, 'Rae Holder'),
(382, 20, 84, 6, 6, 1, 1, 'MacKenzie Mcknight'),
(383, 20, 37, 5, 5, 1, 1, 'Jack Barrera'),
(384, 20, 87, 2, 7, 1, 1, 'Joseph Ford'),
(385, 20, 94, 8, 15, 0, 1, 'Nissim Dunn'),
(386, 20, 96, 4, 6, 1, 1, 'Alfreda Flynn'),
(387, 20, 19, 4, 9, 1, 1, 'Channing Cameron'),
(388, 20, 47, 6, 12, 0, 1, 'Alea Mcdonald'),
(389, 20, 18, 2, 13, 0, 1, 'Quin Blevins'),
(390, 20, 45, 4, 15, 0, 1, 'Daryl Reid'),
(391, 20, 93, 10, 8, 1, 1, 'Quin Blevins'),
(392, 20, 14, 4, 10, 0, 1, 'Barry Kirby'),
(393, 20, 77, 10, 13, 0, 1, 'Candice Holland'),
(394, 20, 69, 5, 8, 1, 1, 'Kelly Pierce'),
(395, 20, 81, 9, 6, 1, 1, 'Arthur Sutton');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_validate` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D649E48FD905` (`game_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `game_id`, `email`, `roles`, `password`, `pseudo`, `is_validate`) VALUES
(4, 19, 'zerui_wang@yahoo.fr', '[\"ROLE_USER\",\"ROLE_ADMIN\"]', '$2y$13$xYKqqadTwqXuFWmKvtO.WulIiLEQ53e1NxpG3tchW9AMSjzhCQXiO', 'zerui', NULL),
(5, 20, 'admin@admin.ad', '[\"ROLE_ADMIN\"]', '$2y$13$9RpdL6p7GfIoV0cnvThEP.Ax.sgomX8EFPmsTy2OFpV2C3Ydu0AOm', 'wang@yahoo.fr', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `FK_47CC8C92BF396750` FOREIGN KEY (`id`) REFERENCES `question` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `answer_effect_player`
--
ALTER TABLE `answer_effect_player`
  ADD CONSTRAINT `FK_AB7C30D08E63843A` FOREIGN KEY (`effect_player_id`) REFERENCES `effect_player` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AB7C30D0AA334807` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `answer_effect_student`
--
ALTER TABLE `answer_effect_student`
  ADD CONSTRAINT `FK_C1B8D7A1BE3DC9C` FOREIGN KEY (`effect_student_id`) REFERENCES `effect_student` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C1B8D7AAA334807` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `answer_question`
--
ALTER TABLE `answer_question`
  ADD CONSTRAINT `FK_91BD482B1E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_91BD482BAA334807` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_3BAE0AA7BF396750` FOREIGN KEY (`id`) REFERENCES `question` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `FK_232B318C99E6F5DF` FOREIGN KEY (`player_id`) REFERENCES `player` (`id`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_B6F7494EE48FD905` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`);

--
-- Contraintes pour la table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK_B723AF33E48FD905` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649E48FD905` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
