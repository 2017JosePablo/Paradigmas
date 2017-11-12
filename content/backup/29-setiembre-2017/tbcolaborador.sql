-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2017 at 06:49 AM
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
-- Table structure for table `tbcolaborador`
--

CREATE TABLE `tbcolaborador` (
  `colaboradorid` int(11) NOT NULL,
  `colaboradorcedula` varchar(10) NOT NULL,
  `colaboradornombre` varchar(30) NOT NULL,
  `colaboradorprimerapellido` varchar(30) NOT NULL,
  `colaboradorsegundoapellido` varchar(40) NOT NULL,
  `colaboradorcorreo` varchar(10) NOT NULL,
  `colaboradortelefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcolaborador`
--

INSERT INTO `tbcolaborador` (`colaboradorid`, `colaboradorcedula`, `colaboradornombre`, `colaboradorprimerapellido`, `colaboradorsegundoapellido`, `colaboradorcorreo`, `colaboradortelefono`) VALUES
(1, '204130743', 'Rita', 'Alfaro', 'Solano', 'rita@gmai.', '8503-2525'),
(3, '103450353', 'Adan', 'Rojas', 'Hernadez', 'rc@gmai.co', '7503-2525');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcolaborador`
--
ALTER TABLE `tbcolaborador`
  ADD PRIMARY KEY (`colaboradorid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcolaborador`
--
ALTER TABLE `tbcolaborador`
  MODIFY `colaboradorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
