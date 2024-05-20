-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 03:55 AM
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
-- Database: `db_29_04_2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `liga` varchar(10) NOT NULL,
  `eliminado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `pais`, `liga`, `eliminado`) VALUES
(1, 'Chivas', 'Mexico', 'Liga MX', 0),
(2, 'America', 'Mexico', 'Liga MX', 1),
(3, 'Real Madrid', 'Spain', 'LaLiga', 0),
(4, 'Fenarbahce', 'Turkey', 'SuperLig', 0),
(5, 'Necaxa', 'Mexico', 'Liga MX', 0),
(6, 'Besiktas', 'Turkey', 'SuperLig', 0),
(7, 'Paulo FC', 'Mexico', 'Liga MX Fe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jugadores`
--

CREATE TABLE `jugadores` (
  `id` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `eliminado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jugadores`
--

INSERT INTO `jugadores` (`id`, `id_equipo`, `numero`, `nombre`, `eliminado`) VALUES
(1, 1, 14, 'Chicharito', 0),
(2, 2, 33, 'Quinones', 0),
(3, 3, 5, 'Bellingham', 0),
(4, 4, 35, 'Fred', 0),
(5, 5, 27, 'Cambindo', 0),
(8, 7, 73, 'Johnny', 1),
(9, 1, 8, 'Lebron James', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partidos`
--

CREATE TABLE `partidos` (
  `id` int(11) NOT NULL,
  `id_local` int(11) NOT NULL,
  `id_visitante` int(11) NOT NULL,
  `goles_local` int(11) NOT NULL,
  `goles_visitante` int(11) NOT NULL,
  `penales` tinyint(1) NOT NULL,
  `penales_local` int(11) NOT NULL,
  `penales_visitante` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT '1000-01-01',
  `eliminado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partidos`
--

INSERT INTO `partidos` (`id`, `id_local`, `id_visitante`, `goles_local`, `goles_visitante`, `penales`, `penales_local`, `penales_visitante`, `fecha`, `eliminado`) VALUES
(1, 1, 3, 0, 0, 0, 0, 0, '1000-01-01', 0),
(2, 2, 1, 0, 0, 0, 0, 0, '1000-01-01', 0),
(3, 4, 5, 0, 0, 0, 0, 0, '1000-01-01', 0),
(4, 3, 4, 0, 0, 0, 0, 0, '1000-01-01', 0),
(5, 1, 5, 0, 0, 0, 0, 0, '1000-01-01', 0),
(8, 4894, 94894, 894, 0, 127, 4894, 5444, '0489-08-09', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
