-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2017 at 06:37 AM
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
-- Table structure for table `tbactividad`
--

CREATE TABLE `tbactividad` (
  `actividadid` int(11) NOT NULL,
  `actividadtipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbactividad`
--

INSERT INTO `tbactividad` (`actividadid`, `actividadtipo`) VALUES
(1, 'Leche'),
(2, 'Carne Cria'),
(3, 'Doble proposito'),
(4, 'Carne engorde');

-- --------------------------------------------------------

--
-- Table structure for table `tbfinca`
--

CREATE TABLE `tbfinca` (
  `fincaid` int(11) NOT NULL,
  `socioid` int(30) NOT NULL,
  `fincaarea` int(11) NOT NULL,
  `fincacantidadbobinos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbfincadireccion`
--

CREATE TABLE `tbfincadireccion` (
  `fincaid` int(11) NOT NULL,
  `fincaprovincia` int(11) NOT NULL,
  `fincacanton` int(11) NOT NULL,
  `fincadistrito` int(11) NOT NULL,
  `fincapueblo` text NOT NULL,
  `fincaexacta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbfincatipo`
--

CREATE TABLE `tbfincatipo` (
  `fincatipoid` int(11) NOT NULL,
  `fincatiponombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbhato`
--

CREATE TABLE `tbhato` (
  `hatoid` int(11) NOT NULL,
  `hatopersonaid` varchar(30) NOT NULL,
  `hatoterneros` int(11) NOT NULL,
  `hatoterneras` int(11) NOT NULL,
  `hatonovillos` int(11) NOT NULL,
  `hatonovillas` int(11) NOT NULL,
  `hatonovillasprenadas` int(11) NOT NULL,
  `hatotoros` int(11) NOT NULL,
  `hatovacas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbhato`
--

INSERT INTO `tbhato` (`hatoid`, `hatopersonaid`, `hatoterneros`, `hatoterneras`, `hatonovillos`, `hatonovillas`, `hatonovillasprenadas`, `hatotoros`, `hatovacas`) VALUES
(1, '503930363', 0, 0, 1, 0, 0, 0, 10),
(5, '434', 100, 0, 5, 4, 80, 50, 0),
(6, '122222', 100, 0, 5, 4, 80, 50, 0),
(7, '504130763', 12, 1, 100, 112, 54, 3, 789),
(8, '503930363', 1, 1, 1, 1, 1, 1, 1),
(9, '877', 0, 6, 0, 0, 0, 0, 0),
(10, '877', 0, 6, 0, 0, 0, 0, 0),
(11, '877', 0, 6, 0, 0, 0, 0, 0),
(12, 'ADan', 787, 0, 0, 0, 0, 0, 0),
(13, '7', 7, 0, 0, 0, 0, 0, 0),
(14, '7', 7, 0, 0, 0, 0, 0, 0),
(15, '7', 7, 0, 0, 0, 0, 0, 0),
(16, '7', 7, 0, 0, 0, 0, 0, 0),
(17, '7', 7, 0, 0, 0, 0, 0, 0),
(18, '3434', 0, 8, 0, 0, 0, 0, 0),
(19, '9009', 8, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbhatoactividad`
--

CREATE TABLE `tbhatoactividad` (
  `hatoactividadid` int(11) NOT NULL,
  `hatoactividadpersonaid` varchar(30) NOT NULL,
  `hatoactividadtipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbhatoactividad`
--

INSERT INTO `tbhatoactividad` (`hatoactividadid`, `hatoactividadpersonaid`, `hatoactividadtipo`) VALUES
(1, '503960363', '1,2,3'),
(2, '503960368', '1,2,4'),
(3, '909090', '1,'),
(4, '1-123-123', '1,4,'),
(5, '2894', '1,'),
(6, '122', '1,'),
(7, '34', '1,'),
(8, '1212', '1,'),
(9, '123', '1,3,'),
(10, '877', ''),
(11, 'ADan', ''),
(12, '7', ''),
(13, '7', ''),
(14, '7', ''),
(15, '7', ''),
(16, '7', ''),
(17, '3434', ''),
(18, '9009', '4');

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
('113', 'Da', 'dkAJ', 'dlakJ', 'dlkAJ', 'lkfjs', 'flksJ', 'JHK'),
('909090', 'u', 'u', 'u', 'u', 'u', 'u', 'u'),
('dd', 'Jose', 'JUANANANA', 'Juja', 'adam', 'v1', 'v2', 'DSDSD');

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
(9, '503930363', 'Adan ', 'Carranza', 'Alfaro', '201414', '56005555'),
(10, '877', '87', '87', '87', '87', ''),
(11, '877', '87', '87', '87', '87', ''),
(12, '877', '87', '87', '87', '87', ''),
(13, '877', '87', '87', '87', '87', ''),
(14, '877', '87', '87', '87', '87', ''),
(15, 'ADan', 'Adna', 'Adan', 'Adan', 'Adan', ''),
(16, '7', '7', '7', '7', '7', '7'),
(17, '7', '7', '7', '7', '7', '7'),
(18, '7', '7', '7', '7', '7', '7'),
(19, '7', '7', '7', '7', '7', '7'),
(20, '7', '7', '7', '7', '7', '7'),
(21, '3434', 'A', 'A', 'A', 'A', ''),
(22, '9009', 'j', 'j', 'j', 'j', 'j');

-- --------------------------------------------------------

--
-- Table structure for table `tbsocio`
--

CREATE TABLE `tbsocio` (
  `socioid` int(11) NOT NULL,
  `sociocedula` text NOT NULL,
  `socionombre` text NOT NULL,
  `socioprimerapellido` text NOT NULL,
  `sociosegundoapellido` text NOT NULL,
  `sociotelefono` text NOT NULL,
  `sociocorreo` text NOT NULL,
  `tipoactividadid` int(11) NOT NULL,
  `fincatipoid` int(11) NOT NULL,
  `sociofechaingreso` date NOT NULL,
  `estadosociodetalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsocio`
--

INSERT INTO `tbsocio` (`socioid`, `sociocedula`, `socionombre`, `socioprimerapellido`, `sociosegundoapellido`, `sociotelefono`, `sociocorreo`, `tipoactividadid`, `fincatipoid`, `sociofechaingreso`, `estadosociodetalle`) VALUES
(0, '503930363', 'Adan', 'Carranza', 'Alfaro', '85666738', 'aadan16@gmail.com', 1, 1, '2017-08-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbsociodireccion`
--

CREATE TABLE `tbsociodireccion` (
  `socioid` int(11) NOT NULL,
  `socioprovincia` int(11) NOT NULL,
  `sociocanton` int(11) NOT NULL,
  `sociodistrito` int(11) NOT NULL,
  `sociopueblo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbsocioestado`
--

CREATE TABLE `tbsocioestado` (
  `socioestadoid` int(11) NOT NULL,
  `socioestadodetalle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbtipoactividad`
--

CREATE TABLE `tbtipoactividad` (
  `tipoactividadid` int(11) NOT NULL,
  `tipoactividadnombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbactividad`
--
ALTER TABLE `tbactividad`
  ADD PRIMARY KEY (`actividadid`),
  ADD UNIQUE KEY `actividadid` (`actividadid`),
  ADD KEY `actividadid_2` (`actividadid`);

--
-- Indexes for table `tbfinca`
--
ALTER TABLE `tbfinca`
  ADD PRIMARY KEY (`fincaid`),
  ADD UNIQUE KEY `socioid` (`socioid`);

--
-- Indexes for table `tbfincadireccion`
--
ALTER TABLE `tbfincadireccion`
  ADD PRIMARY KEY (`fincaid`),
  ADD UNIQUE KEY `fincaid` (`fincaid`);

--
-- Indexes for table `tbfincatipo`
--
ALTER TABLE `tbfincatipo`
  ADD PRIMARY KEY (`fincatipoid`),
  ADD UNIQUE KEY `fincatipoid` (`fincatipoid`);

--
-- Indexes for table `tbhato`
--
ALTER TABLE `tbhato`
  ADD PRIMARY KEY (`hatoid`);

--
-- Indexes for table `tbhatoactividad`
--
ALTER TABLE `tbhatoactividad`
  ADD PRIMARY KEY (`hatoactividadid`);

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
-- Indexes for table `tbsocio`
--
ALTER TABLE `tbsocio`
  ADD PRIMARY KEY (`socioid`),
  ADD UNIQUE KEY `estadosociodetalle` (`estadosociodetalle`),
  ADD UNIQUE KEY `fincatipoid` (`fincatipoid`),
  ADD UNIQUE KEY `tipoactividadid` (`tipoactividadid`);

--
-- Indexes for table `tbsociodireccion`
--
ALTER TABLE `tbsociodireccion`
  ADD PRIMARY KEY (`socioid`),
  ADD UNIQUE KEY `socioid` (`socioid`);

--
-- Indexes for table `tbsocioestado`
--
ALTER TABLE `tbsocioestado`
  ADD PRIMARY KEY (`socioestadoid`),
  ADD UNIQUE KEY `socioestadoid` (`socioestadoid`);

--
-- Indexes for table `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  ADD PRIMARY KEY (`tipoactividadid`),
  ADD UNIQUE KEY `tipoactividadid` (`tipoactividadid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbactividad`
--
ALTER TABLE `tbactividad`
  MODIFY `actividadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbfinca`
--
ALTER TABLE `tbfinca`
  MODIFY `fincaid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbfincadireccion`
--
ALTER TABLE `tbfincadireccion`
  MODIFY `fincaid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbfincatipo`
--
ALTER TABLE `tbfincatipo`
  MODIFY `fincatipoid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbhato`
--
ALTER TABLE `tbhato`
  MODIFY `hatoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbhatoactividad`
--
ALTER TABLE `tbhatoactividad`
  MODIFY `hatoactividadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbpersona`
--
ALTER TABLE `tbpersona`
  MODIFY `personaid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbsociodireccion`
--
ALTER TABLE `tbsociodireccion`
  MODIFY `socioid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  MODIFY `tipoactividadid` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbfinca`
--
ALTER TABLE `tbfinca`
  ADD CONSTRAINT `tbfinca_ibfk_1` FOREIGN KEY (`socioid`) REFERENCES `tbsocio` (`socioid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbfincadireccion`
--
ALTER TABLE `tbfincadireccion`
  ADD CONSTRAINT `tbfincadireccion_ibfk_1` FOREIGN KEY (`fincaid`) REFERENCES `tbfinca` (`fincaid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbfincatipo`
--
ALTER TABLE `tbfincatipo`
  ADD CONSTRAINT `tbfincatipo_ibfk_1` FOREIGN KEY (`fincatipoid`) REFERENCES `tbsocio` (`fincatipoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbsociodireccion`
--
ALTER TABLE `tbsociodireccion`
  ADD CONSTRAINT `tbsociodireccion_ibfk_1` FOREIGN KEY (`socioid`) REFERENCES `tbsocio` (`socioid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbsocioestado`
--
ALTER TABLE `tbsocioestado`
  ADD CONSTRAINT `tbsocioestado_ibfk_1` FOREIGN KEY (`socioestadoid`) REFERENCES `tbsocio` (`estadosociodetalle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  ADD CONSTRAINT `tbtipoactividad_ibfk_1` FOREIGN KEY (`tipoactividadid`) REFERENCES `tbsocio` (`tipoactividadid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
