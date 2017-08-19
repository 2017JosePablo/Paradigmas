-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 20, 2017 at 01:54 AM
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
-- Table structure for table `tbactivity`
--

CREATE TABLE `tbactivity` (
  `activityid` int(11) NOT NULL,
  `activitytype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbactivity`
--

INSERT INTO `tbactivity` (`activityid`, `activitytype`) VALUES
(1, 'Leche'),
(2, 'Carne Cria'),
(3, 'Doble proposito'),
(4, 'Carne engorde');

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
(5, '434', 100, 0, 5, 4, 80, 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbherdactivity`
--

CREATE TABLE `tbherdactivity` (
  `herdactivityid` int(11) NOT NULL,
  `herdactivitypersonid` varchar(30) NOT NULL,
  `herdactivitytype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbherdactivity`
--

INSERT INTO `tbherdactivity` (`herdactivityid`, `herdactivitypersonid`, `herdactivitytype`) VALUES
(1, '503960363', '1,2,3'),
(2, '503960368', '1,2,4');

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
-- Table structure for table `tbperson`
--

CREATE TABLE `tbperson` (
  `personid` int(30) NOT NULL,
  `personidentification` varchar(30) DEFAULT NULL,
  `personname` varchar(30) DEFAULT NULL,
  `personfirstname` varchar(30) DEFAULT NULL,
  `personlastname` varchar(20) NOT NULL,
  `personphonehome` varchar(20) NOT NULL,
  `personphone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbperson`
--

INSERT INTO `tbperson` (`personid`, `personidentification`, `personname`, `personfirstname`, `personlastname`, `personphonehome`, `personphone`) VALUES
(2, '503960363', 'Adan Francisco', 'Carranza', 'Alfaro', '50088487', '85666738'),
(4, '101230456', 'ADriana', 'Carbajal', 'Madrigal', '24788965', '87878985');

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
-- Indexes for table `tbactivity`
--
ALTER TABLE `tbactivity`
  ADD PRIMARY KEY (`activityid`);

--
-- Indexes for table `tbherd`
--
ALTER TABLE `tbherd`
  ADD PRIMARY KEY (`herdid`);

--
-- Indexes for table `tbherdactivity`
--
ALTER TABLE `tbherdactivity`
  ADD PRIMARY KEY (`herdactivityid`);

--
-- Indexes for table `tbjunta`
--
ALTER TABLE `tbjunta`
  ADD PRIMARY KEY (`idjunta`);

--
-- Indexes for table `tbperson`
--
ALTER TABLE `tbperson`
  ADD PRIMARY KEY (`personid`);

--
-- Indexes for table `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  ADD PRIMARY KEY (`tipoactividadid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbactivity`
--
ALTER TABLE `tbactivity`
  MODIFY `activityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbherd`
--
ALTER TABLE `tbherd`
  MODIFY `herdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbherdactivity`
--
ALTER TABLE `tbherdactivity`
  MODIFY `herdactivityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbperson`
--
ALTER TABLE `tbperson`
  MODIFY `personid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  MODIFY `tipoactividadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
