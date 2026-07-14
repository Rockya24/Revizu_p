-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 14, 2026 at 11:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revizup_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `resultats_quiz`
--

CREATE TABLE `resultats_quiz` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `matiere` varchar(50) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `total_questions` int(11) NOT NULL DEFAULT 5,
  `reussi` tinyint(1) NOT NULL DEFAULT 0,
  `date_resultat` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resultats_quiz`
--

INSERT INTO `resultats_quiz` (`id`, `utilisateur_id`, `matiere`, `score`, `total_questions`, `reussi`, `date_resultat`) VALUES
(1, 1, 'math', 1, 6, 0, '2026-07-14 10:05:23'),
(3, 4, 'francais', 5, 6, 1, '2026-07-14 10:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `email`, `mot_de_passe`) VALUES
(1, 'kimbembe', 'yackro2468@icloud.com', 'lomatela'),
(4, 'polila', 'lili2468@icloud.com', '1230'),
(12, 'kimbembe', 'umax22521@gmail.com', 'lomatela'),
(16, 'rockya', 'yackro2469@icloud.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resultats_quiz`
--
ALTER TABLE `resultats_quiz`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utilisateur_matiere` (`utilisateur_id`,`matiere`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resultats_quiz`
--
ALTER TABLE `resultats_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resultats_quiz`
--
ALTER TABLE `resultats_quiz`
  ADD CONSTRAINT `fk_resultat_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
