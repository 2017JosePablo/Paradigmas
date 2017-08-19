-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 19, 2017 at 11:15 PM
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
-- Table structure for table `tbherd`
--

CREATE TABLE `tbherd` (
  `herdid` int(11) NOT NULL,
  `herdpersonid` varchar(30) NOT NULL,
  `herdcalfs` int(11) NOT NULL,
  `calfveals` int(11) NOT NULL,
  `herdsteers` int(11) NOT NULL,
  `herdheifers` int(11) NOT NULL,
  `herdpregnantheifers` int(11) NOT NULL,
  `herdbulls` int(11) NOT NULL,
  `herdcows` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbherd`
--

INSERT INTO `tbherd` (`herdid`, `herdpersonid`, `herdcalfs`, `calfveals`, `herdsteers`, `herdheifers`, `herdpregnantheifers`, `herdbulls`, `herdcows`) VALUES
(1, '503930363', 0, 0, 1, 0, 0, 0, 10),
(2, '504130763', 0, 0, 5, 4, 0, 5, 10),
(3, '504130763', 0, 0, 5, 4, 87, 5, 10),
(4, '504130763', 0, 0, 5, 4, 87, 5, 10),
(5, '434', 0, 0, 5, 4, 87, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbjunta`
--

CREATE TABLE `tbjunta` (
  `idjunta` varchar(50) NOT NULL,
  `juntapresidente` varchar(100) NOT NULL,
  `juntavicepresidente` varchar(100) NOT NULL,
  `juntatesorero` varchar(100) NOT NULL,
  `juntasecretario` varchar(100) NOT NULL,
  `juntavocal1` varchar(100) NOT NULL,
  `juntavocal2` varchar(100) NOT NULL,
  `juntavocal3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbjunta`
--

INSERT INTO `tbjunta` (`idjunta`, `juntapresidente`, `juntavicepresidente`, `juntatesorero`, `juntasecretario`, `juntavocal1`, `juntavocal2`, `juntavocal3`) VALUES
('122', 'ADAN', 'JUANANANA', 'Juja', 'adam', 'v1', 'v2', 'DSDSD'),
('as', 'ADAN', 'JUANANANA', 'Juja', 'adam', 'v1', 'v2', 'DSDSD'),
('dd', 'Jose', 'JUANANANA', 'Juja', 'adam', 'v1', 'v2', 'DSDSD');

-- --------------------------------------------------------

--
-- Table structure for table `tbpersona`
--

CREATE TABLE `tbpersona` (
  `personaid` int(30) NOT NULL,
  `personacedula` varchar(30) DEFAULT NULL,
  `personanombre` varchar(30) DEFAULT NULL,
  `personaapellido1` varchar(30) DEFAULT NULL,
  `personaapeliido2` varchar(20) NOT NULL,
  `personatelfijo` varchar(20) NOT NULL,
  `personatelemovil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpersona`
--

INSERT INTO `tbpersona` (`personaid`, `personacedula`, `personanombre`, `personaapellido1`, `personaapeliido2`, `personatelfijo`, `personatelemovil`) VALUES
(1, '504130763', 'Jose Pablo', 'Carranza', 'Alfaro', '50060720', '50088487'),
(2, '503960363', 'Adan Francisco', 'Carranza', 'Alfaro', '50088487', '85666738');

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
-- Indexes for table `tbherd`
--
ALTER TABLE `tbherd`
  ADD PRIMARY KEY (`herdid`);

--
-- Indexes for table `tbjunta`
--
ALTER TABLE `tbjunta`
  ADD PRIMARY KEY (`idjunta`);

--
-- Indexes for table `tbpersona`
--
ALTER TABLE `tbpersona`
  ADD PRIMARY KEY (`personaid`);

--
-- Indexes for table `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  ADD PRIMARY KEY (`tipoactividadid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbherd`
--
ALTER TABLE `tbherd`
  MODIFY `herdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbpersona`
--
ALTER TABLE `tbpersona`
  MODIFY `personaid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  MODIFY `tipoactividadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
