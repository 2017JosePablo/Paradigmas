-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2017 at 10:21 PM
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
(1, '702440808', 'LuisC', 'Parra', 'Cambronero', 'l@g.com', '61913452');

-- --------------------------------------------------------

--
-- Table structure for table `tbcvo`
--

CREATE TABLE `tbcvo` (
  `cvoid` int(11) NOT NULL,
  `cvotiene` int(11) NOT NULL,
  `cvofechavigencia` date NOT NULL,
  `idsocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcvo`
--

INSERT INTO `tbcvo` (`cvoid`, `cvotiene`, `cvofechavigencia`, `idsocio`) VALUES
(1, 1, '2017-02-12', 1),
(2, 1, '2018-02-12', 2),
(3, 1, '0000-00-00', 4),
(4, 1, '0000-00-00', 5),
(5, 1, '2017-10-23', 6),
(6, 1, '2017-10-17', 7),
(7, 1, '2017-10-02', 8),
(8, 1, '2017-10-23', 9),
(9, 1, '2017-10-02', 10),
(10, 1, '2017-10-09', 11),
(11, 1, '2017-10-23', 12),
(12, 1, '2017-10-15', 13),
(13, 1, '2017-10-02', 14),
(14, 1, '2017-10-03', 15),
(15, 1, '2017-10-03', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbexamenbrusela`
--

CREATE TABLE `tbexamenbrusela` (
  `examenbruselaid` int(11) NOT NULL,
  `examenbruselavigente` int(11) NOT NULL,
  `examenbruselafechavencimiento` date NOT NULL,
  `idsocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbexamenbrusela`
--

INSERT INTO `tbexamenbrusela` (`examenbruselaid`, `examenbruselavigente`, `examenbruselafechavencimiento`, `idsocio`) VALUES
(1, 1, '2017-02-12', 2),
(2, 1, '2018-02-12', 1),
(3, 1, '0000-00-00', 4),
(4, 1, '0000-00-00', 5),
(5, 1, '2017-10-01', 6),
(6, 1, '2017-10-30', 7),
(7, 1, '2017-10-03', 8),
(8, 1, '2017-10-18', 9),
(9, 1, '2017-10-23', 10),
(10, 1, '2017-10-17', 11),
(11, 1, '2017-10-10', 12),
(12, 1, '2017-10-30', 13),
(13, 1, '2017-10-16', 14),
(14, 1, '2017-10-24', 15),
(15, 1, '2017-10-17', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbexamentuberculosis`
--

CREATE TABLE `tbexamentuberculosis` (
  `examentuberculosisid` int(11) NOT NULL,
  `examentuberculosisvigente` int(11) NOT NULL,
  `examentuberculosisfechavencimiento` date NOT NULL,
  `idsocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbexamentuberculosis`
--

INSERT INTO `tbexamentuberculosis` (`examentuberculosisid`, `examentuberculosisvigente`, `examentuberculosisfechavencimiento`, `idsocio`) VALUES
(1, 1, '2017-02-12', 2),
(2, 1, '0000-00-00', 4),
(3, 1, '0000-00-00', 5),
(4, 1, '2017-10-02', 6),
(5, 1, '2017-10-02', 7),
(6, 1, '2017-10-02', 8),
(7, 1, '2017-10-02', 9),
(8, 1, '2017-10-23', 10),
(9, 1, '2017-10-03', 11),
(10, 1, '2017-10-17', 12),
(11, 1, '2017-10-15', 13),
(12, 1, '2017-10-09', 14),
(13, 1, '2017-10-16', 15),
(14, 1, '2017-10-23', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbfierro`
--

CREATE TABLE `tbfierro` (
  `fierroid` int(11) NOT NULL,
  `fierrotiene` int(2) NOT NULL,
  `fierroruta` varchar(400) NOT NULL,
  `idsocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbfierro`
--

INSERT INTO `tbfierro` (`fierroid`, `fierrotiene`, `fierroruta`, `idsocio`) VALUES
(1, 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbfinca`
--

CREATE TABLE `tbfinca` (
  `fincaid` int(11) NOT NULL,
  `socioid` int(11) DEFAULT NULL,
  `fincaarea` int(11) DEFAULT NULL,
  `fincacantidadbobinos` varchar(45) DEFAULT NULL,
  `fincacerca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbfinca`
--

INSERT INTO `tbfinca` (`fincaid`, `socioid`, `fincaarea`, `fincacantidadbobinos`, `fincacerca`) VALUES
(1, 1, 122452, '385738', 'Concreto-'),
(2, 2, 123422, '432123455', 'Puas-'),
(3, 3, 786522332, '11223121', 'Puas-'),
(4, 4, 0, '', ''),
(5, 5, 0, '', ''),
(6, 6, 0, '', ''),
(7, 7, 0, '', ''),
(8, 8, 0, '', ''),
(9, 9, 0, '', ''),
(10, 10, 0, '', ''),
(11, 11, 0, '', ''),
(12, 12, 0, '', ''),
(13, 13, 0, '', ''),
(14, 14, 0, '', ''),
(15, 15, 0, '', ''),
(16, 16, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbfincacerca`
--

CREATE TABLE `tbfincacerca` (
  `fincacercaid` int(40) NOT NULL,
  `fincacercatipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbfincacerca`
--

INSERT INTO `tbfincacerca` (`fincacercaid`, `fincacercatipo`) VALUES
(1, 'Puas'),
(2, 'Electrica'),
(3, 'Mixta'),
(5, 'Concreto');

-- --------------------------------------------------------

--
-- Table structure for table `tbfincadireccion`
--

CREATE TABLE `tbfincadireccion` (
  `fincaid` int(11) NOT NULL,
  `fincaprovincia` int(11) NOT NULL,
  `fincacanton` int(11) DEFAULT NULL,
  `fincadistrito` int(11) DEFAULT NULL,
  `fincapueblo` varchar(300) DEFAULT NULL,
  `fincaexacta` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbfincadireccion`
--

INSERT INTO `tbfincadireccion` (`fincaid`, `fincaprovincia`, `fincacanton`, `fincadistrito`, `fincapueblo`, `fincaexacta`) VALUES
(1, 7, 6, 5, 'XMANKJ', 'AKJDAK'),
(2, 1, 1, 1, 'Cara', 'CAll'),
(3, 5, 11, 4, 'AD>M', '<ADJ'),
(4, 0, 0, 0, '', ''),
(5, 0, 0, 0, '', ''),
(6, 0, 0, 0, '', ''),
(7, 0, 0, 0, '', ''),
(8, 0, 0, 0, '', ''),
(9, 0, 0, 0, '', ''),
(10, 0, 0, 0, '', ''),
(11, 0, 0, 0, '', ''),
(12, 0, 0, 0, '', ''),
(13, 0, 0, 0, '', ''),
(14, 0, 0, 0, '', ''),
(15, 0, 0, 0, '', ''),
(16, 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbfincatipo`
--

CREATE TABLE `tbfincatipo` (
  `fincatipoid` int(11) NOT NULL,
  `fincatiponombre` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbfincatipo`
--

INSERT INTO `tbfincatipo` (`fincatipoid`, `fincatiponombre`) VALUES
(1, 'REPASTO'),
(2, 'ESTAULADO\r\n'),
(3, 'SEMIESTAULADO');

-- --------------------------------------------------------

--
-- Table structure for table `tbhato`
--

CREATE TABLE `tbhato` (
  `hatoid` int(11) NOT NULL,
  `socioid` int(11) NOT NULL,
  `hatoraza` varchar(400) NOT NULL,
  `hatoternero` int(11) NOT NULL,
  `hatoternera` int(11) NOT NULL,
  `hatonovillo` int(11) NOT NULL,
  `hatonovilla` int(11) NOT NULL,
  `hatonovillaprenada` int(11) NOT NULL,
  `hatotoroservicio` int(11) NOT NULL,
  `hatotoroengorde` int(11) NOT NULL,
  `hatovacacria` int(11) NOT NULL,
  `hatovacaengorde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbhato`
--

INSERT INTO `tbhato` (`hatoid`, `socioid`, `hatoraza`, `hatoternero`, `hatoternera`, `hatonovillo`, `hatonovilla`, `hatonovillaprenada`, `hatotoroservicio`, `hatotoroengorde`, `hatovacacria`, `hatovacaengorde`) VALUES
(1, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 13, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 16, '', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbhatoactividad`
--

CREATE TABLE `tbhatoactividad` (
  `hatoactividadid` int(11) NOT NULL,
  `hatoactividadpersonaid` int(11) NOT NULL,
  `hatoactividadtipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbhatoactividad`
--

INSERT INTO `tbhatoactividad` (`hatoactividadid`, `hatoactividadpersonaid`, `hatoactividadtipo`) VALUES
(1, 1, '1'),
(2, 2, '2'),
(3, 3, '1'),
(4, 16, '1');

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
('909090', 'u', 'u', 'u', 'u', 'u', 'u', 'u'),
('dd', 'Jose', 'JUANANANA', 'Juja', 'adam', 'v1', 'v2', 'DSDSD'),
('JTR-234', 'LuisC', 'Carlos', 'Carlos', 'Carlos', 'Carlos', 'Carlos', 'Carlos');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbraza`
--

CREATE TABLE `tbraza` (
  `idraza` int(11) NOT NULL,
  `razanombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbraza`
--

INSERT INTO `tbraza` (`idraza`, `razanombre`) VALUES
(1, 'Jersey'),
(2, 'Holstein'),
(3, 'Brahaman'),
(4, 'Charolais'),
(5, 'Angus'),
(6, 'Otros');

-- --------------------------------------------------------

--
-- Table structure for table `tbsocio`
--

CREATE TABLE `tbsocio` (
  `socioid` int(11) NOT NULL,
  `sociocedula` varchar(45) DEFAULT NULL,
  `socionombre` varchar(45) DEFAULT NULL,
  `socioprimerapellido` varchar(45) DEFAULT NULL,
  `sociosegundoapellido` varchar(45) DEFAULT NULL,
  `sociotelefono` varchar(45) DEFAULT NULL,
  `sociocorreo` varchar(45) DEFAULT NULL,
  `tipoactividadid` int(11) DEFAULT NULL,
  `fincatipoid` int(11) DEFAULT NULL,
  `sociofechaingreso` date DEFAULT NULL,
  `estadosociodetalle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsocio`
--

INSERT INTO `tbsocio` (`socioid`, `sociocedula`, `socionombre`, `socioprimerapellido`, `sociosegundoapellido`, `sociotelefono`, `sociocorreo`, `tipoactividadid`, `fincatipoid`, `sociofechaingreso`, `estadosociodetalle`) VALUES
(1, '7024408', 'Carlos', 'Romero', 'Chavarria', '43235687', 'cr@xn--gmai-jqa.com', 1, 1, '0230-06-06', 3),
(2, '5393363', 'AdÃ¡n', 'Carranza', 'Alfaro', '34343434', 'acd@gmail.com', 2, 2, '2000-07-07', 3),
(3, '117010943', 'Kimberly', 'Rivera', 'Ulloa', '2233-1213', 'kim@gmial.com', 1, 1, '0000-00-00', 1),
(4, '503930363', 'AD', 'A', 'AAD', '23323-3233', 'aaa@aaa.com', 1, 1, '0000-00-00', 1),
(5, '1201313012', 'DARIo', 'CAMPOS', 'BRENES', '1332-3341', 'adanca16@gmail.com', 1, 1, '0000-00-00', 1),
(6, '301230345', 'Fabian', 'Duran', 'Cambronero', '8767-2345', 'adanca16@gmail.com', 1, 1, '0000-00-00', 1),
(7, '90909', 'Prueba1A', 'Adan', 'Ada', '24233-342', 'adadn@fnan.com', 1, 1, '0000-00-00', 1),
(8, '12323', 'EL CAM', 'AMDA', 'ADLK', '242324-243', 'adakl@fma.com', 1, 1, '0000-00-00', 1),
(9, '429842', 'ADL', 'FOLA', 'ADLAK', '120303-232', 'aaa@aaa.com', 1, 1, '0000-00-00', 1),
(10, '9313819', '<ADH', 'ejldlkj', 'slkjfskj1', '2442-2422', 'sksjks@ga.com', 1, 1, '0000-00-00', 1),
(11, '2323', 'ADAKJ', 'ADJKA', 'AKdjAK', '2332-3223', 'aaa@aaa.com', 1, 1, '0000-00-00', 1),
(12, '39929232', 'Sandra', 'Rivera', 'Espinoza', '2302-2324', 'c@fa.com', 1, 1, '0000-00-00', 1),
(13, '35983', 'AAJK', 'AKdj', 'AFKj', '24224-233', 'adanca16@gmail.com', 1, 1, '0000-00-00', 1),
(14, '122139129', 'Diego', 'Duran', 'Rodriguez', '3232-2323', 'aaa@aaa.com', 1, 1, '0000-00-00', 1),
(15, '12948948', 'ADIO', 'ADIo', 'AOi', '48294821132', 'aaa@aaa.com', 1, 1, '0000-00-00', 1),
(16, '203942049', 'AKDJAK', 'KDAJ', 'AKFj', '1234-2422', 'aaa@aaa.com', 1, 1, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbsociodireccion`
--

CREATE TABLE `tbsociodireccion` (
  `socioid` int(11) NOT NULL,
  `socioprovincia` int(11) DEFAULT NULL,
  `sociocanton` int(11) DEFAULT NULL,
  `sociodistrito` int(11) DEFAULT NULL,
  `sociopueblo` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsociodireccion`
--

INSERT INTO `tbsociodireccion` (`socioid`, `socioprovincia`, `sociocanton`, `sociodistrito`, `sociopueblo`) VALUES
(1, 6, 5, 1, 'xxxx'),
(2, 2, 3, 6, 'xxxxx'),
(3, 2, 6, 5, 'La punalada'),
(4, 3, 8, 3, 'ADK'),
(5, 6, 11, 1, 'DKAKJA'),
(6, 2, 3, 4, 'ADA'),
(7, 2, 3, 4, '22322'),
(8, 2, 1, 1, 'KFJSK'),
(9, 1, 3, 1, 'KSJFm'),
(10, 4, 4, 1, 'skjf'),
(11, 2, 3, 3, '242eqw'),
(12, 2, 9, 4, 'AJDk'),
(13, 1, 4, 1, 'AKJD'),
(14, 2, 4, 1, 'ADKJ'),
(15, 5, 3, 1, 'ALDK'),
(16, 5, 5, 1, 'AKJA');

-- --------------------------------------------------------

--
-- Table structure for table `tbsocioestado`
--

CREATE TABLE `tbsocioestado` (
  `socioestadoid` int(11) NOT NULL,
  `socioestadodetalle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsocioestado`
--

INSERT INTO `tbsocioestado` (`socioestadoid`, `socioestadodetalle`) VALUES
(1, 'moroso'),
(2, 'Activo'),
(3, 'inactivo');

-- --------------------------------------------------------

--
-- Table structure for table `tbtipoactividad`
--

CREATE TABLE `tbtipoactividad` (
  `tipoactividadid` int(11) NOT NULL,
  `tipoactividadnombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtipoactividad`
--

INSERT INTO `tbtipoactividad` (`tipoactividadid`, `tipoactividadnombre`) VALUES
(1, 'Carne'),
(2, 'Leche'),
(3, 'Desarrollo'),
(5, 'SEXIIII');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcolaborador`
--
ALTER TABLE `tbcolaborador`
  ADD PRIMARY KEY (`colaboradorid`);

--
-- Indexes for table `tbcvo`
--
ALTER TABLE `tbcvo`
  ADD PRIMARY KEY (`cvoid`);

--
-- Indexes for table `tbexamenbrusela`
--
ALTER TABLE `tbexamenbrusela`
  ADD PRIMARY KEY (`examenbruselaid`);

--
-- Indexes for table `tbexamentuberculosis`
--
ALTER TABLE `tbexamentuberculosis`
  ADD PRIMARY KEY (`examentuberculosisid`);

--
-- Indexes for table `tbfierro`
--
ALTER TABLE `tbfierro`
  ADD PRIMARY KEY (`fierroid`);

--
-- Indexes for table `tbfinca`
--
ALTER TABLE `tbfinca`
  ADD PRIMARY KEY (`fincaid`),
  ADD KEY `socioid` (`socioid`);

--
-- Indexes for table `tbfincacerca`
--
ALTER TABLE `tbfincacerca`
  ADD PRIMARY KEY (`fincacercaid`);

--
-- Indexes for table `tbfincadireccion`
--
ALTER TABLE `tbfincadireccion`
  ADD PRIMARY KEY (`fincaid`);

--
-- Indexes for table `tbfincatipo`
--
ALTER TABLE `tbfincatipo`
  ADD PRIMARY KEY (`fincatipoid`);

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
-- Indexes for table `tbraza`
--
ALTER TABLE `tbraza`
  ADD PRIMARY KEY (`idraza`);

--
-- Indexes for table `tbsocio`
--
ALTER TABLE `tbsocio`
  ADD PRIMARY KEY (`socioid`),
  ADD KEY `tipoactividadid` (`tipoactividadid`),
  ADD KEY `fincatipoid` (`fincatipoid`),
  ADD KEY `estadosociodetalle` (`estadosociodetalle`);

--
-- Indexes for table `tbsociodireccion`
--
ALTER TABLE `tbsociodireccion`
  ADD PRIMARY KEY (`socioid`);

--
-- Indexes for table `tbsocioestado`
--
ALTER TABLE `tbsocioestado`
  ADD PRIMARY KEY (`socioestadoid`);

--
-- Indexes for table `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  ADD PRIMARY KEY (`tipoactividadid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcolaborador`
--
ALTER TABLE `tbcolaborador`
  MODIFY `colaboradorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbcvo`
--
ALTER TABLE `tbcvo`
  MODIFY `cvoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbexamenbrusela`
--
ALTER TABLE `tbexamenbrusela`
  MODIFY `examenbruselaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbexamentuberculosis`
--
ALTER TABLE `tbexamentuberculosis`
  MODIFY `examentuberculosisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbfierro`
--
ALTER TABLE `tbfierro`
  MODIFY `fierroid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbfinca`
--
ALTER TABLE `tbfinca`
  MODIFY `fincaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbfincacerca`
--
ALTER TABLE `tbfincacerca`
  MODIFY `fincacercaid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbfincadireccion`
--
ALTER TABLE `tbfincadireccion`
  MODIFY `fincaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbfincatipo`
--
ALTER TABLE `tbfincatipo`
  MODIFY `fincatipoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbhato`
--
ALTER TABLE `tbhato`
  MODIFY `hatoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbhatoactividad`
--
ALTER TABLE `tbhatoactividad`
  MODIFY `hatoactividadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbraza`
--
ALTER TABLE `tbraza`
  MODIFY `idraza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbsocio`
--
ALTER TABLE `tbsocio`
  MODIFY `socioid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbsociodireccion`
--
ALTER TABLE `tbsociodireccion`
  MODIFY `socioid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbsocioestado`
--
ALTER TABLE `tbsocioestado`
  MODIFY `socioestadoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  MODIFY `tipoactividadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
