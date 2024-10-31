-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 31 oct. 2024 à 11:48
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `concous`
--

-- --------------------------------------------------------

--
-- Structure de la table `condidats`
--

CREATE TABLE `condidats` (
  `id` int(5) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pere` varchar(50) NOT NULL,
  `mere` varchar(50) NOT NULL,
  `date_nais` date NOT NULL,
  `prisime` varchar(10) NOT NULL,
  `lieu_nais` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `sit_fam` varchar(30) NOT NULL,
  `nb_enf` int(5) NOT NULL,
  `endicape` varchar(50) NOT NULL,
  `g_endicap` varchar(30) DEFAULT NULL,
  `adresse` varchar(200) NOT NULL,
  `commune` varchar(50) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `service_n` varchar(50) NOT NULL,
  `date_service` date DEFAULT NULL,
  `diplome` varchar(150) NOT NULL,
  `date_diplo` date NOT NULL,
  `num_diplo` varchar(10) NOT NULL,
  `etab_diplo` varchar(200) NOT NULL,
  `g_formation` varchar(40) DEFAULT NULL,
  `nb_mois` int(5) NOT NULL,
  `du` date NOT NULL,
  `au` date NOT NULL,
  `type_exam` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `condidats`
--

INSERT INTO `condidats` (`id`, `nom`, `prenom`, `pere`, `mere`, `date_nais`, `prisime`, `lieu_nais`, `sex`, `sit_fam`, `nb_enf`, `endicape`, `g_endicap`, `adresse`, `commune`, `tel`, `email`, `service_n`, `date_service`, `diplome`, `date_diplo`, `num_diplo`, `etab_diplo`, `g_formation`, `nb_mois`, `du`, `au`, `type_exam`) VALUES
(1, 'djelleb', 'reda', 'madjid', 'rebiha', '1969-09-27', '1970', 'annaba', 'm', 'mariee', 2, 'non', 'toto', '2000', 'annaba', '0663402232', 'reda@hotmail.fr', 'oui', '2024-10-21', 'bac', '2017-06-30', '7777', 'lycee saint augustin', '36', 36, '2018-06-21', '2024-10-24', NULL),
(2, 'جلاب', 'رضا', 'عبد المجيد', 'زراري ربيحة', '1969-09-27', '1970', 'عنابة', 'M', 'M', 2, 'N', '2007', 'شارع صولي عبد القادر عنابة', 'عنابة', '0663402232', 'reda@toto.fr', 'oui', '2017-03-12', 'شهادة التخرج من المعهد', '2008-05-30', '255', 'مركز التكوين المهني', '36 شهرا', 36, '2024-01-30', '2024-10-21', NULL),
(3, 'عويوش ', 'صباح', 'رشيد', 'عيسوب سكينة', '1966-03-12', 'لا', 'سكيكدة', 'F', 'M', 2, 'N', 'لالالا', 'الشط ولاية الطارف', 'وادي العنب', '038340550', 'sabah@gmail.com', 'مؤجل', '2024-10-22', 'ليسانس', '2017-06-30', '2027/2017', 'جامعة عنابة', '36', 36, '2024-10-06', '2024-10-24', NULL),
(4, 'نهى', 'جلاب', 'رضا', 'عويوش صباح', '2006-10-26', '', 'عنابة', 'F', 'C', 0, 'N', 'لا', 'الجزائر العاصمة', 'عنابة', '0664003035', 'nouha@toto.fr', 'غير معني', '2024-10-22', 'الباكالوريا', '2024-10-23', '2024/018', 'ثانوية القديس أوغستان عنابة', 'التوقيت الكامل', 36, '2024-10-21', '2024-11-09', NULL),
(123, 'بن عياش', 'رانية', 'رشيد ', 'أسيا', '2024-10-31', '', 'سكيكدة', 'M', 'M', 0, 'N', '', 'سكيكدة', 'عنابة', '038340550', 'skikda@to.it', 'غير معني', NULL, 'ماستير علوم و إتصال', '2024-10-11', '2552/2024', 'جامعة سكيكدة', 'التوقيت الكامل', 36, '2024-12-07', '2024-09-29', ' عامل مهني من المستوى الأول (بالتوقيت الكامل)'),
(120, 'yoyo', 'yoyo', 'toto', 'rororo', '2024-10-28', '', 'annba', 'M', 'M', 2, 'N', '', 'annaba', 'عنابة', '8888888', 'roror@riro.ri', 'غير معني', NULL, 'fofofofo', '2024-10-28', '25', 'popop', 'التوقيت الكامل', 2, '2024-10-29', '2024-11-09', '  عون أمن ووقاية مستوى أول توقيت كامل'),
(122, 'بن عياش', 'رانية', 'رشيد ', 'أسيا', '2024-10-31', '', 'سكيكدة', 'M', 'M', 0, 'N', '', 'سكيكدة', 'عنابة', '038340550', 'skikda@to.it', 'غير معني', NULL, 'ماستير علوم و إتصال', '2024-10-11', '2552/2024', 'جامعة سكيكدة', 'التوقيت الكامل', 36, '2024-12-07', '2024-09-29', ' عامل مهني من المستوى الأول (بالتوقيت الكامل)');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'reda', 'reda23@gmail.com', '$2y$10$u1qZnNC3hNlhlARq2SCUzuFUhndjG1vtRBJjZ.5e/lDGIpNGSkAMW'),
(2, 'kounouz', 'kounouz@gmail.com', '$2y$10$Q/NiNzCNhACPgXY4YcjZjO4uGwnDKvit2J5sIfcnFdk.IICXFK4eS'),
(3, 'nouha', 'nouha@gmail.com', '$2y$10$U8q/pG2j6N2cKWdEJWJhHuzqZlYnceov9GtgGUAnVPjrBPR7fxrW6'),
(4, 'sabah', 'sabah@gmail.com', '$2y$10$RqI3jbuHylBC0HBrA4NKxupZqH6Dzn11fRBS5q29hfGpoEtnedZo2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `condidats`
--
ALTER TABLE `condidats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `condidats`
--
ALTER TABLE `condidats`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
