-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 12:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progefs`
--

-- --------------------------------------------------------

--
-- Table structure for table `baze`
--

CREATE TABLE `baze` (
  `id` int(255) NOT NULL,
  `baza` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baze`
--

INSERT INTO `baze` (`id`, `baza`) VALUES
(2, 'Baza 1'),
(3, 'Baza 2');

-- --------------------------------------------------------

--
-- Table structure for table `inscrisi_std`
--

CREATE TABLE `inscrisi_std` (
  `id` int(255) NOT NULL,
  `nume` varchar(25) NOT NULL,
  `prenume` varchar(25) NOT NULL,
  `ziua` varchar(25) NOT NULL,
  `ora` time NOT NULL,
  `locatie` varchar(25) NOT NULL,
  `sport` varchar(25) NOT NULL,
  `prof` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inscrisi_std`
--

INSERT INTO `inscrisi_std` (`id`, `nume`, `prenume`, `ziua`, `ora`, `locatie`, `sport`, `prof`) VALUES
(1, 'Serban', 'Bogdan', 'Joi', '16:00:00', 'Baza 2', 'Baschet', 'GUI BACHNER,G.'),
(4, 'Bono ', 'Student', 'Luni', '10:00:00', 'Baza 2', 'Jogging', 'Bono Profesor');

-- --------------------------------------------------------

--
-- Table structure for table `orar`
--

CREATE TABLE `orar` (
  `id` int(255) NOT NULL,
  `ziua` varchar(25) NOT NULL,
  `ora` time NOT NULL,
  `locatie` varchar(25) NOT NULL,
  `sport` varchar(25) NOT NULL,
  `prof` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orar`
--

INSERT INTO `orar` (`id`, `ziua`, `ora`, `locatie`, `sport`, `prof`) VALUES
(4, 'Joi', '16:00:00', 'Baza 2', 'Baschet', 'GUI BACHNER,G.'),
(6, ' Miercuri', '14:00:00', 'Baza 1', 'Fotbal', 'MOLCUŢ ,A.'),
(7, ' Luni', '08:00:00', 'Baza 2', 'Inot', 'CIORSAC ,A.');

-- --------------------------------------------------------

--
-- Table structure for table `profesori`
--

CREATE TABLE `profesori` (
  `id` int(255) NOT NULL,
  `nume_prof` varchar(255) NOT NULL,
  `prenume_prof` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `sporturi_predate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profesori`
--

INSERT INTO `profesori` (`id`, `nume_prof`, `prenume_prof`, `mail`, `sporturi_predate`) VALUES
(1, 'ALEXANDRU ', 'M.', 'm.alexandru@email.com', 'Jogging ,Fotbal'),
(2, 'CHIRILA ', 'D.', 'd.chirila@email.com', 'Jogging'),
(3, 'CHIRILA ', 'M.', 'd.chirila@email.com', 'Jogging'),
(4, 'CIORSAC ', 'A.', 'a.ciorsac@email.com', 'Jogging'),
(5, 'GUI BACHNER', 'G.', 'g.guibachner@email.com', 'Fitness'),
(6, 'IONESCU ', 'D.', 'd.ionescu@email.com', 'Baschet 3x3,Jogging'),
(7, 'MOLCUŢ ', 'A.', 'a.molcut@email.com', 'Fotbal'),
(8, 'SĂRĂNDAN ', 'S.', 's.sarandan@email.com', 'culturism'),
(9, 'SZABO', 'A.', 'a.szabo@email.com', 'fotbal'),
(10, 'VARGA ', 'M.', 'm.varga@email.com', 'Pilates,Step Aerobic'),
(21, 'Bono ', 'Profesor', 'bonoprofesor@email.com', 'Jogging');

-- --------------------------------------------------------

--
-- Table structure for table `sporturi`
--

CREATE TABLE `sporturi` (
  `id` int(255) NOT NULL,
  `nume_sport` varchar(255) NOT NULL,
  `locatie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sporturi`
--

INSERT INTO `sporturi` (`id`, `nume_sport`, `locatie`) VALUES
(1, 'Baschet', 'Baza 2,in sala'),
(3, 'Fotbal', 'Baza 1,sintetic'),
(4, 'Inot', 'Baza 2'),
(5, 'Jogging', 'Baza 1'),
(6, 'Polo', 'Baza 2,bazin');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(5, 'bogdanstudent', 'bogdan@studentupt.ro', '315eb115d98fcbad39ffc5edebd669c9', 'user'),
(7, 'admin', 'admin@email.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(8, 'bonostudent', 'bonostudent@email.com', '58ba4644cab3e242b26a59b4185eaaf9', 'user'),
(10, 'Bono Profesor', 'bonoprofesor@email.com', '46d955392a3f4b37d586aeed9b5dcbe5', 'prof'),
(11, 'Student 01', 'student01@email.com', 'b0f272966386057c96b4e0bc3b2ebc0d', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baze`
--
ALTER TABLE `baze`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inscrisi_std`
--
ALTER TABLE `inscrisi_std`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orar`
--
ALTER TABLE `orar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profesori`
--
ALTER TABLE `profesori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sporturi`
--
ALTER TABLE `sporturi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baze`
--
ALTER TABLE `baze`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inscrisi_std`
--
ALTER TABLE `inscrisi_std`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orar`
--
ALTER TABLE `orar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profesori`
--
ALTER TABLE `profesori`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sporturi`
--
ALTER TABLE `sporturi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
