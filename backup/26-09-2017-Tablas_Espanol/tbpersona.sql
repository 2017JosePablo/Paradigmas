-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2017 at 12:49 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbasoturga`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbpersona`
--

CREATE TABLE `tbpersona` (
  `personaid` int(30) NOT NULL,
  `personaidentificacion` varchar(30) DEFAULT NULL,
  `personanombre` varchar(30) DEFAULT NULL,
  `personaprimerapellido` varchar(30) DEFAULT NULL,
  `personasegundoapellido` varchar(20) NOT NULL,
  `personatelefonofjo` varchar(20) NOT NULL,
  `personacelular` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpersona`
--

INSERT INTO `tbpersona` (`personaid`, `personaidentificacion`, `personanombre`, `personaprimerapellido`, `personasegundoapellido`, `personatelefonofjo`, `personacelular`) VALUES
(2, '503960363', 'Adan Francisco', 'Carranza', 'Alfaro', '50088487', '85666738'),
(4, '101230456', 'ADriana', 'Carbajal', 'Madrigal', '24788965', '87878985'),
(5, '104560256', 'Pablo', 'carranza', 'alfaro', '24650889', '50088487'),
(6, '104560256', 'ASAS', 'carranza', 'alfaro', '24650889', '50088487'),
(7, '100000000000', 'ASAS', 'carranza', 'alfaro', '24650889', '50088487'),
(8, '504130763', 'Jose Pablo', 'Carranza', 'Alfaro', '2476789', '85599663'),
(9, '503930363', 'Adan ', 'Carranza', 'Alfaro', '201414', '56005555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbpersona`
--
ALTER TABLE `tbpersona`
  ADD PRIMARY KEY (`personaid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbpersona`
--
ALTER TABLE `tbpersona`
  MODIFY `personaid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
