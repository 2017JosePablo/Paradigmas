-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2017 at 12:45 AM
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
-- Table structure for table `tbtipoactividad`
--

CREATE TABLE `tbtipoactividad` (
  `tipoactividadid` int(11) NOT NULL,
  `tipoactividadpersonacedula` varchar(30) NOT NULL,
  `tipoactividadleche` tinyint(1) NOT NULL,
  `tipoactividadcarnecria` tinyint(1) NOT NULL,
  `tipoactividaddobleproposito` int(11) NOT NULL,
  `tipoactividadcarneengorde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtipoactividad`
--

INSERT INTO `tbtipoactividad` (`tipoactividadid`, `tipoactividadpersonacedula`, `tipoactividadleche`, `tipoactividadcarnecria`, `tipoactividaddobleproposito`, `tipoactividadcarneengorde`) VALUES
(1, '503930363', 0, 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  ADD PRIMARY KEY (`tipoactividadid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  MODIFY `tipoactividadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
