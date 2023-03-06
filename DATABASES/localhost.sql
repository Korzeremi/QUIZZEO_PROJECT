-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2023 at 10:22 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzeo`
--
DROP DATABASE IF EXISTS `quizzeo`;
CREATE DATABASE IF NOT EXISTS `quizzeo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `quizzeo`;

-- --------------------------------------------------------

--
-- Table structure for table `choix`
--

CREATE TABLE `choix` (
  `id` int(11) NOT NULL,
  `reponse` varchar(50) DEFAULT NULL,
  `bonneReponse` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jouer`
--

CREATE TABLE `jouer` (
  `id` int(11) NOT NULL,
  `id_1` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `score` varchar(50) DEFAULT NULL,
  `id_quizz` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` varchar(50) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `intituleQuestion` varchar(50) DEFAULT NULL,
  `difficulte` int(11) DEFAULT NULL,
  `quiz_id` int(11) NOT NULL,
  `reponse` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quizz`
--

CREATE TABLE `quizz` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `difficulte` int(11) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quizz`
--

INSERT INTO `quizz` (`id`, `titre`, `difficulte`, `date_creation`, `description`, `categorie`) VALUES
(55, 'IPSSI', 7, '2023-03-06 07:06:00', 'C de la merde', 'IPSSI');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `email`, `password`, `role`) VALUES
(33, 'korzeremi', 'korzeniowski.remi@gmail.com', 'Lassy201578!', 'administrator'),
(41, 'kyoann75', 'kyoann75@gmail.com', 'lassy', 'administrator'),
(43, 'theotheo', 'theo@gmail.com', 'test', 'administrator'),
(45, 'quizzer', 'quizzer', 'quizzer', 'quizzer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choix`
--
ALTER TABLE `choix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jouer`
--
ALTER TABLE `jouer`
  ADD PRIMARY KEY (`id`,`id_1`),
  ADD KEY `id_1` (`id_1`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizz`
--
ALTER TABLE `quizz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quizz`
--
ALTER TABLE `quizz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
