-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 26 juin 2021 à 14:38
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_pfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `absences`
--

CREATE TABLE `absences` (
  `absence_id` int(11) NOT NULL,
  `date_absence` datetime NOT NULL,
  `nombre_heures` int(11) NOT NULL,
  `justifiee` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `matiere_id` varchar(10) NOT NULL,
  `justification` int(11) DEFAULT NULL,
  `annee_scolaire` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `absences`
--

INSERT INTO `absences` (`absence_id`, `date_absence`, `nombre_heures`, `justifiee`, `etudiant_id`, `prof_id`, `matiere_id`, `justification`, `annee_scolaire`) VALUES
(1, '2021-06-15 11:32:31', 2, 1, 5, 11, 'test', 1, '2021/2022');

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `annonce_id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `annonce_fond` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date_annonce` datetime NOT NULL DEFAULT current_timestamp(),
  `imageAnnone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`annonce_id`, `titre`, `annonce_fond`, `admin_id`, `date_annonce`, `imageAnnone`) VALUES
(3, 'Abdelmalek Ennani', 'this is what I want', 11, '2021-06-22 19:25:19', NULL),
(4, 'abdelmalek again', 'Hello how are u', 11, '2021-06-22 19:25:38', NULL),
(6, 'this is a test again', 'loram 10', 11, '2021-06-22 19:29:02', NULL),
(7, 'jhj', 'ihjsd', 11, '2021-06-22 19:33:11', 'classic-car-5_1920.jpg'),
(8, 'exam english', 'I would Like To informe You That The English Exam at 10-05-2021', 11, '2021-06-25 00:50:46', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id_employee` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `date_inscription` date NOT NULL DEFAULT current_timestamp(),
  `filiere_id` int(11) DEFAULT NULL,
  `matiere_id` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `cne` varchar(8) NOT NULL,
  `avater` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`id_employee`, `nom`, `prenom`, `email`, `tel`, `date_inscription`, `filiere_id`, `matiere_id`, `password`, `cne`, `avater`, `role`) VALUES
(11, 'Abdelmalek', 'Ennani', 'ahmam3600@gmail.com', '+212 7642319725', '2021-06-10', 1, 1, 'IoHacHlG', 'P12312', 'hero2.jpg', 'prof'),
(12, 'khalid', 'Doe', 'Kinghakimo123@gmail.com', '+212 7642319725', '2021-06-25', 4, 7, 'ZERgqUUL', 'PT654', 'cristiano.jpg', 'prof'),
(13, 'khalid', 'khalifa', 'khalid@gmail.com', '0643217623', '2021-06-17', 1, 3, 'khalidTest123', 'P3333', 'cristiano.jpg\r\n', 'prof'),
(14, 'admin', 'admin_test', 'admin123@gmail.com', '0643217623', '2021-06-14', NULL, NULL, 'admin123', 'P4356', 'cristiano.jpg', 'admin'),
(16, 'Samghoni', 'Mustapha', 'mustapha@gmail.com', '0658300034', '2008-06-08', 1, 12, 'mustapha', 'UB008877', '020-man-4.png', 'prof'),
(18, 'Faraji', 'abdelah', 'faraji@gmail.com', '0658311134', '2006-12-08', 2, 19, 'faraji', 'UB118877', '027-man-4.png', 'prof'),
(19, 'Samghoni', 'Mustapha', 'mustapha@gmail.com', '0658300034', '2008-06-08', 2, 18, 'mustapha', 'UB008877', '020-man-4.png', 'prof'),
(20, 'Lghdaych', 'Fatima', 'fatima@gmail.com', '0766000649', '2009-06-16', 1, 17, 'fatima', 'UB008811', '024-woman-6.png', 'prof'),
(21, 'Lghdaych', 'Fatima', 'fatima@gmail.com', '0766000649', '2009-06-16', 2, 20, 'fatima', 'UB008811', '024-woman-6.png', 'prof'),
(22, 'Hamidi', 'Hamid', 'hamid@gmail.com', '0766000000', '2009-06-16', 1, 1, 'hamid', 'UB000000', '029-man-4.png', 'prof'),
(23, 'Hamidi', 'Hamid', 'hamid@gmail.com', '0766000000', '2009-06-16', 2, 21, 'hamid', 'UB000000', '029-man-4.png', 'prof'),
(24, 'Zinbi', 'Zineb', 'zineb@gmail.com', '0766000011', '2010-06-18', 1, 2, 'Zineb', 'UB000000', '021-girl-3.png', 'prof'),
(25, 'Zinbi', 'Zineb', 'zineb@gmail.com', '0766000011', '2010-06-18', 2, 23, 'Zineb', 'UB000000', '021-girl-3.png', 'prof'),
(26, 'Hamdaoui ', 'Ahmed', 'ahmed@gmail.com', '0766000055', '2008-06-18', 2, 22, 'ahmed', 'UB009900', '023-man-6.png', 'prof'),
(27, 'Hamdaoui ', 'Ahmed', 'ahmed@gmail.com', '0766000055', '2008-06-18', 1, 3, 'ahmed', 'UB009922', '023-man-6.png', 'prof'),
(28, 'Lghdaych', 'Fatima', 'fatima@gmail.com', '0766000649', '2009-06-16', 1, 14, 'fatima', 'UB008811', '024-woman-6.png', 'prof'),
(29, 'Hamma', 'Mohamed', 'mohamed@gmail.com', '0766008888', '2007-12-28', 1, 5, 'ahmed', 'UB119922', '047-man-13.png', 'prof'),
(30, 'Hamma', 'Mohamed', 'mohamed@gmail.com', '0766008888', '2007-12-28', 2, 24, 'mohamed', 'UB119922', '047-man-13.png', 'prof'),
(31, 'Kachaa', 'Salma', 'salma@gmail.com', '0711000611', '2010-06-16', 1, 16, 'salma', 'UB008811', '052-witch.png', 'prof'),
(32, 'Kachaa', 'Salma', 'salma@gmail.com', '0711000611', '2010-06-16', 2, 18, 'salma', 'UB008811', '052-witch.png', 'prof'),
(33, 'BenHadou', 'Ali', 'ali@gmail.com', '0733000033', '2007-02-18', 1, 13, 'ali', 'UB339933', '023-man-6.png', 'prof'),
(34, 'BenHadou', 'Ali', 'ali@gmail.com', '0733000033', '2007-02-18', 1, 15, 'ali', 'UB339933', '023-man-6.png', 'prof'),
(35, 'Hamdaoui ', 'Ahmed', 'ahmed@gmail.com', '0766000055', '2008-06-18', 3, 49, 'ahmed', 'UB009900', '023-man-6.png', 'prof'),
(36, 'Hamdaoui ', 'Ahmed', 'ahmed@gmail.com', '0766000055', '2008-06-18', 4, 59, 'ahmed', 'UB009900', '023-man-6.png', 'prof'),
(37, 'Zinbi', 'Zineb', 'zineb@gmail.com', '0766000011', '2010-06-18', 3, 50, 'Zineb', 'UB000000', '021-girl-3.png', 'prof'),
(38, 'Zinbi', 'Zineb', 'zineb@gmail.com', '0766000011', '2010-06-18', 4, 60, 'Zineb', 'UB000000', '021-girl-3.png', 'prof'),
(39, 'Lghdaych', 'Fatima', 'fatima@gmail.com', '0766000649', '2009-06-16', 3, 54, 'fatima', 'UB008811', '024-woman-6.png', 'prof'),
(40, 'Lghdaych', 'Fatima', 'fatima@gmail.com', '0766000649', '2009-06-16', 4, 7, 'fatima', 'UB008811', '024-woman-6.png', 'prof'),
(41, 'Hamadi', 'Smail', 'smail@gmail.com', '0766031111', '2009-11-12', 3, 52, 'smail', 'UB119110', '029-man-8.png', 'prof'),
(42, 'Hamadi', 'Smail', 'smail@gmail.com', '0766031111', '2009-11-12', 4, 61, 'smail', 'UB119110', '029-man-8.png', 'prof'),
(43, 'Kachaa', 'Salma', 'salma@gmail.com', '0711000611', '2010-06-16', 4, 10, 'salma', 'UB008811', '052-witch.png', 'prof'),
(44, 'Samihi', 'Oumaima', 'oumaima@gmail.com', '0701000600', '2011-09-23', 3, 53, 'oumaima', 'UB888811', '032-girl-5.png', 'prof'),
(45, 'Samihi', 'Oumaima', 'oumaima@gmail.com', '0701000600', '2011-09-23', 3, 55, 'oumaima', 'UB888811', '032-girl-5.png', 'prof'),
(46, 'Samihi', 'Oumaima', 'oumaima@gmail.com', '0701000600', '2011-09-23', 3, 56, 'oumaima', 'UB888811', '032-girl-5.png', 'prof'),
(47, 'Samihi', 'Oumaima', 'oumaima@gmail.com', '0701000600', '2011-09-23', 4, 6, 'oumaima', 'UB888811', '032-girl-5.png', 'prof'),
(48, 'Samihi', 'Oumaima', 'oumaima@gmail.com', '0701000600', '2011-09-23', 4, 8, 'oumaima', 'UB888811', '032-girl-5.png', 'prof'),
(49, 'Samihi', 'Oumaima', 'oumaima@gmail.com', '0701000600', '2011-09-23', 4, 9, 'oumaima', 'UB888811', '032-girl-5.png', 'prof'),
(50, 'Hamidi', 'Hamid', 'hamid@gmail.com', '0766000000', '2009-06-16', 4, 62, 'hamid', 'UB000000', '029-man-4.png', 'prof'),
(51, 'Hamidi', 'Hamid', 'hamid@gmail.com', '0766000000', '2009-06-16', 3, 51, 'hamid', 'UB000000', '029-man-4.png', 'prof'),
(52, 'Talhaoui', 'Soufiane', 'soufiane@gmail.com', '0766111111', '2013-06-16', 3, 58, 'soufiane', 'UB991111', '029-man-4.png', 'prof'),
(53, 'Talhaoui', 'Soufiane', 'soufiane@gmail.com', '0766111111', '2013-06-16', 4, 11, 'soufiane', 'UB991111', '029-man-4.png', 'prof'),
(54, 'Kachaa', 'Salma', 'salma@gmail.com', '0711000611', '2010-06-16', 3, 57, 'salma', 'UB008811', '052-witch.png', 'prof'),
(55, 'Hamma', 'Mohamed', 'mohamed@gmail.com', '0766008888', '2007-12-28', 5, 25, 'ahmed', 'UB119922', '047-man-13.png', 'prof'),
(56, 'Hamma', 'Mohamed', 'mohamed@gmail.com', '0766008888', '2007-12-28', 6, 38, 'ahmed', 'UB119922', '047-man-13.png', 'prof'),
(57, 'Hamdaoui ', 'Ahmed', 'ahmed@gmail.com', '0766000055', '2008-06-18', 5, 33, 'ahmed', 'UB009900', '023-man-6.png', 'prof'),
(58, 'Hamdaoui ', 'Ahmed', 'ahmed@gmail.com', '0766000055', '2008-06-18', 6, 44, 'ahmed', 'UB009900', '023-man-6.png', 'prof'),
(59, 'Zinbi', 'Zineb', 'zineb@gmail.com', '0766000011', '2010-06-18', 5, 35, 'Zineb', 'UB000000', '021-girl-3.png', 'prof'),
(60, 'Zinbi', 'Zineb', 'zineb@gmail.com', '0766000011', '2010-06-18', 6, 45, 'Zineb', 'UB000000', '021-girl-3.png', 'prof'),
(61, 'Hamidi', 'Hamid', 'hamid@gmail.com', '0766000000', '2009-06-16', 5, 34, 'hamid', 'UB000000', '029-man-4.png', 'prof'),
(62, 'Hamidi', 'Hamid', 'hamid@gmail.com', '0766000000', '2009-06-16', 6, 46, 'hamid', 'UB000000', '029-man-4.png', 'prof'),
(63, 'Lghdaych', 'Fatima', 'fatima@gmail.com', '0766000649', '2009-06-16', 5, 36, 'fatima', 'UB008811', '024-woman-6.png', 'prof'),
(64, 'Lghdaych', 'Fatima', 'fatima@gmail.com', '0766000649', '2009-06-16', 5, 37, 'fatima', 'UB008811', '024-woman-6.png', 'prof'),
(65, 'Lghdaych', 'Fatima', 'fatima@gmail.com', '0766000649', '2009-06-16', 6, 47, 'fatima', 'UB008811', '024-woman-6.png', 'prof'),
(66, 'Lghdaych', 'Fatima', 'fatima@gmail.com', '0766000649', '2009-06-16', 6, 48, 'fatima', 'UB008811', '024-woman-6.png', 'prof'),
(67, 'Rabuoni', 'Oussama', 'oussama@gmail.com', '07660111111', '2012-09-16', 5, 27, 'oussama', 'UB111', '066-boy-6.png', 'prof'),
(68, 'Rabuoni', 'Oussama', 'oussama@gmail.com', '07660111111', '2012-09-16', 5, 30, 'oussama', 'UB111', '066-boy-6.png', 'prof'),
(69, 'Rabuoni', 'Oussama', 'oussama@gmail.com', '07660111111', '2012-09-16', 5, 31, 'oussama', 'UB111', '066-boy-6.png', 'prof'),
(70, 'Rabuoni', 'Oussama', 'oussama@gmail.com', '07660111111', '2012-09-16', 6, 40, 'oussama', 'UB111', '066-boy-6.png', 'prof'),
(71, 'Rabuoni', 'Oussama', 'oussama@gmail.com', '07660111111', '2012-09-16', 6, 41, 'oussama', 'UB111', '066-boy-6.png', 'prof'),
(72, 'Rabuoni', 'Oussama', 'oussama@gmail.com', '07660111111', '2012-09-16', 6, 42, 'oussama', 'UB111', '066-boy-6.png', 'prof'),
(73, 'Soufiani', 'Zouhyr', 'zouhyr@gmail.com', '0766222222', '2012-09-20', 5, 26, 'zouhyr', 'UB111', 'pic3.png', 'prof'),
(74, 'Soufiani', 'Zouhyr', 'zouhyr@gmail.com', '0766222222', '2012-09-20', 6, 39, 'zouhyr', 'UB111', 'pic3.png', 'prof'),
(75, 'Marbouti', 'youssef', 'youssef@gmail.com', '0766222266', '2012-09-20', 5, 32, 'youssef', 'UB222', 'pic4.png', 'prof'),
(76, 'Marbouti', 'youssef', 'youssef@gmail.com', '0766222266', '2012-09-20', 6, 43, 'youssef', 'UB222', 'pic4.png', 'prof');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id_etudinant` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `filiere_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `date_naissance` date NOT NULL,
  `date_inscription` date DEFAULT current_timestamp(),
  `date_graduation` date DEFAULT NULL,
  `continuant` int(11) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id_etudinant`, `nom`, `prenom`, `email`, `Password`, `adress`, `tel`, `filiere_id`, `parent_id`, `date_naissance`, `date_inscription`, `date_graduation`, `continuant`, `avatar`, `sex`) VALUES
(2, 'Serhabi', 'Ismail', 'ismail@gmail.com', 'ismail', 'Er-Rich Rue 6', '0658008899', 2, 4, '2000-01-01', '2020-06-09', NULL, 1, 'cristiano.jpg', 'masculin'),
(3, 'Saadi', 'Zouhair', 'zouhair@gmail.com', 'zouhair', 'Rabat Rue 6', '0658352034', 2, 5, '2001-01-01', '2020-06-09', NULL, 1, '', 'feminin'),
(4, 'Alamii', 'Chafik', 'chafik@gmail.com', 'chafik', 'Kenitra', '0600300034', 2, 8, '1999-06-17', '2020-06-08', NULL, 1, '', 'masculin'),
(5, 'Rahimi', 'mohamed', 'mohamed@gmail.com', 'Abdelmalek', 'Fes Ain Says Rue Baraka', '0677889944', 1, 6, '2001-06-16', '2021-06-08', NULL, 1, '', 'masculin'),
(6, 'Sarij', 'hafid', 'hafid@gmail.com', 'Hafid', 'Klaat Makona Rue 45 quartier Dar Lkbira', '0766778899', 1, 9, '2001-06-17', '2021-06-17', NULL, 1, '', ''),
(7, 'Laokj', 'Samira', 'samira@gmail.com', 'Samira', 'Ourzazate Rue 99 quartier Dar Sghira', '0766000649', 1, 3, '2001-11-06', '2021-06-17', NULL, 1, '', ''),
(8, 'Chakib', 'Soufia', 'soufia@gmail.com', 'Soufia', 'Fes Rue 88 quartier Dar Dbagh', '0658300034', 2, 10, '2000-12-22', '2020-06-17', NULL, 1, '', ''),
(9, 'El moussaoui', 'Rabha', 'rabha@gmail.com', 'rabha', 'Tanger Rue 00 quartier Ben Kirane', '0658300034', 2, 1, '2000-12-22', '2020-06-17', NULL, 1, '', ''),
(10, 'abdel', 'test', 'abdelmalek@gmail.com', '', 'ahmam', '0643257165', 1, 12, '2021-06-16', '0000-00-00', NULL, 0, 'test.jpg', 'masculin'),
(11, 'kjhkjh', 'mojmo', 'abdelmalek@gmail.com', 'J8ekexDr', 'ahmam', '0615085386', 2, 13, '2021-06-09', '0000-00-00', NULL, 0, '', 'feminin'),
(12, 'test', 'test', 'test@test.com', 'E2DKUKKz', 'ahmam', '0613765423', 1, 14, '2021-06-09', '0000-00-00', NULL, 0, '', 'feminin'),
(13, 'HICHAM', 'NSHSG', 'abdelmalek@test.com', '7IR5vvY4', 'ahmam', '0645238753', 2, 15, '2021-06-17', '0000-00-00', NULL, 0, '', 'feminin'),
(14, 'abde', 'fcf', 'dsfd@gmail.com', 'STP6ome0', 'ahmam', '0743526718', 1, 16, '2021-06-10', '0000-00-00', NULL, 0, '', 'masculin');

-- --------------------------------------------------------

--
-- Structure de la table `filieres`
--

CREATE TABLE `filieres` (
  `filiere_id` int(11) NOT NULL,
  `filiere_nom` varchar(100) NOT NULL,
  `description` varchar(80) NOT NULL,
  `filiere_session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `filieres`
--

INSERT INTO `filieres` (`filiere_id`, `filiere_nom`, `description`, `filiere_session`) VALUES
(1, 'MCW', 'Multimédias et Conception Web', 1),
(2, 'MCW', 'Multimédias et Conception Web', 2),
(3, 'PME', 'Gestion PME/PMI', 1),
(4, 'PME', 'Gestion PME/PMI', 2),
(5, 'ENG', 'Energétique', 1),
(6, 'ENG', 'Energétique', 2);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id_matiere` int(11) NOT NULL,
  `nom_matiere` varchar(100) NOT NULL,
  `matiere_coffecient` int(11) NOT NULL,
  `filiere_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id_matiere`, `nom_matiere`, `matiere_coffecient`, `filiere_id`) VALUES
(1, 'Anglais', 10, 1),
(2, 'Français', 10, 1),
(3, 'Arabe', 10, 1),
(5, 'Mathématique', 15, 1),
(6, 'Commerce', 28, 4),
(7, 'Communication', 16, 4),
(8, 'Gestion Administrative', 28, 4),
(9, 'Comptabilité', 28, 4),
(10, 'Informatique', 20, 4),
(11, 'Etude De Cas( Droit - Management - Economic )', 30, 4),
(12, 'Analyse Et Programmation', 35, 1),
(13, 'Développement Multimédia', 30, 1),
(14, 'Environnement économique Et juridique', 10, 1),
(15, 'Production Multimédia', 50, 1),
(16, 'Systèmes Et Réseaux Informatiques', 20, 1),
(17, 'Tichniques D\'expression Et De Communication', 10, 1),
(18, 'Application Des Techniques De Prodution Multimédia', 35, 2),
(19, 'Etude De Cas Informatique', 60, 2),
(20, 'Techniques D\'expression Et De Communication', 10, 2),
(21, 'Anglais', 10, 2),
(22, 'Arabe', 10, 2),
(23, 'Français', 10, 2),
(24, 'Mathématique', 15, 2),
(25, 'Mathématique', 15, 5),
(26, 'Techniques Graphiques', 50, 5),
(27, 'Science Physique', 20, 5),
(30, 'Génie électrique', 30, 5),
(31, 'Génie Thermique', 30, 5),
(32, 'Sysytèmes énergétiques', 30, 5),
(33, 'Arabe', 10, 5),
(34, 'Anglais', 10, 5),
(35, 'Français', 10, 5),
(36, 'Environnement économique et Juridique de L\'énetreprise', 10, 5),
(37, 'Technique D\'éxpression et de Communication', 10, 5),
(38, 'Mathématique', 15, 6),
(39, 'Techniques Graphiques', 50, 6),
(40, 'Science Physique', 20, 6),
(41, 'Génie électrique', 30, 6),
(42, 'Génie Thermique', 30, 6),
(43, 'Sysytèmes énergétiques', 30, 6),
(44, 'Arabe', 10, 6),
(45, 'Français', 10, 6),
(46, 'Anglais', 10, 6),
(47, 'Environnement économique et Juridique de L\'énetreprise', 10, 6),
(48, 'Technique D\'éxpression et de Communication', 10, 6),
(49, 'Arabe', 10, 3),
(50, 'Français', 10, 3),
(51, 'Anglais', 10, 3),
(52, 'Espagnol', 10, 3),
(53, 'Commerce', 28, 3),
(54, 'Communication', 16, 3),
(55, 'Gestion Administrative', 28, 3),
(56, 'Comptabilité', 28, 3),
(57, 'Informatique', 20, 3),
(58, 'Etude De Cas( Droit - Management - Economic )', 30, 3),
(59, 'Arabe', 10, 4),
(60, 'Français', 10, 4),
(61, 'Espagnol', 10, 4),
(62, 'Anglais', 10, 4);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `note_1` int(11) DEFAULT NULL,
  `note_2` int(11) DEFAULT NULL,
  `note_3` int(11) DEFAULT NULL,
  `note_4` int(11) DEFAULT NULL,
  `matiere_id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `annee_scolaire` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`note_id`, `note_1`, `note_2`, `note_3`, `note_4`, `matiere_id`, `prof_id`, `etudiant_id`, `annee_scolaire`) VALUES
(13, 16, 10, 15, 0, 1, 11, 5, '2021/2022'),
(14, 16, 10, 15, 0, 1, 11, 6, '2021/2022'),
(15, 16, 10, 15, 0, 1, 11, 7, '2021/2022'),
(25, 12, 0, 0, 0, 1, 11, 2, '2021/2022'),
(26, 12, 0, 0, 0, 1, 11, 3, '2021/2022'),
(27, 13, 0, 0, 0, 1, 11, 4, '2021/2022'),
(28, 14, 0, 0, 0, 1, 11, 8, '2021/2022'),
(29, 12, 0, 0, 0, 1, 11, 9, '2021/2022'),
(30, 15, 0, 0, 0, 1, 11, 11, '2021/2022'),
(31, 17, 0, 0, 0, 1, 11, 13, '2021/2022');

-- --------------------------------------------------------

--
-- Structure de la table `parantes`
--

CREATE TABLE `parantes` (
  `parent_id` int(11) NOT NULL,
  `prere_nom` varchar(100) NOT NULL,
  `mere_nom` varchar(100) NOT NULL,
  `pere_tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `parantes`
--

INSERT INTO `parantes` (`parent_id`, `prere_nom`, `mere_nom`, `pere_tel`) VALUES
(1, 'EL moussaoui Hassan', 'Rahibi Aicha', '0666897876'),
(2, 'Sfraoui Hamid', 'Saadaoui Malika', '0678456789'),
(3, 'Laouni Mohamed', 'Sarifi Rachida', '0677543432'),
(4, 'Serhabi Amnay', 'rabhani Safia', '0777867567'),
(5, 'Saadi Zakaria', 'Lmhamdi Oumaima', '0666896548'),
(6, 'Rahimi Soufiane', 'Ben_Said Fatima', '0677884455'),
(7, 'Rahioui Walid', 'jalila Aya', '0677556699'),
(8, 'Alamii Ayoub', 'Saghri Hafida', '0600998811'),
(9, 'Sarij Morad', 'Rahimi Soukaina', '0745456756'),
(10, 'Chakib Redouane', 'Redouline Farida', '0678886799'),
(12, 'Hamid', 'test', '0675234517'),
(13, 'Ahmed', 'terisa', '0654136724'),
(14, 'ahmed', 'terisa', '061907074'),
(15, 'khalid', 'fariha', '087758767'),
(16, 'ahmed', 'maria', '0634251835');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`absence_id`),
  ADD KEY `abdelmalek` (`etudiant_id`),
  ADD KEY `abdelmalek_01` (`prof_id`);

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`annonce_id`),
  ADD KEY `kljlkjfd` (`admin_id`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`),
  ADD KEY `dsdsf` (`filiere_id`),
  ADD KEY `test_strinct` (`matiere_id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id_etudinant`),
  ADD KEY `sujets_ibfk_1` (`filiere_id`),
  ADD KEY `sujets_ibfk_2` (`parent_id`);

--
-- Index pour la table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`filiere_id`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id_matiere`),
  ADD KEY `abdelmalek_032` (`filiere_id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `test_03` (`matiere_id`),
  ADD KEY `gfdgfd_UY` (`etudiant_id`),
  ADD KEY `tstttt_657` (`prof_id`);

--
-- Index pour la table `parantes`
--
ALTER TABLE `parantes`
  ADD PRIMARY KEY (`parent_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absences`
--
ALTER TABLE `absences`
  MODIFY `absence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `annonce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id_etudinant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `filieres`
--
ALTER TABLE `filieres`
  MODIFY `filiere_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id_matiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `parantes`
--
ALTER TABLE `parantes`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absences`
--
ALTER TABLE `absences`
  ADD CONSTRAINT `abdelmalek` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id_etudinant`),
  ADD CONSTRAINT `abdelmalek_01` FOREIGN KEY (`prof_id`) REFERENCES `employee` (`id_employee`);

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `kljlkjfd` FOREIGN KEY (`admin_id`) REFERENCES `employee` (`id_employee`);

--
-- Contraintes pour la table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `dsdsf` FOREIGN KEY (`filiere_id`) REFERENCES `filieres` (`filiere_id`),
  ADD CONSTRAINT `test_strinct` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id_matiere`);

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `sujets_ibfk_1` FOREIGN KEY (`filiere_id`) REFERENCES `filieres` (`filiere_id`),
  ADD CONSTRAINT `sujets_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `parantes` (`parent_id`);

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `abdelmalek_032` FOREIGN KEY (`filiere_id`) REFERENCES `filieres` (`filiere_id`);

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `gfdgfd_UY` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id_etudinant`),
  ADD CONSTRAINT `test_03` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id_matiere`),
  ADD CONSTRAINT `tstttt_657` FOREIGN KEY (`prof_id`) REFERENCES `employee` (`id_employee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
