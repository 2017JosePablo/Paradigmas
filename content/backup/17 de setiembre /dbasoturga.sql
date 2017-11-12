-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2017 at 01:20 AM
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
(2, 1, '2018-02-12', 2);

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
(2, 1, '2018-02-12', 1);

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
(1, 1, '2017-02-12', 2);

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
  `fincacantidadbobinos` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbfinca`
--

INSERT INTO `tbfinca` (`fincaid`, `socioid`, `fincaarea`, `fincacantidadbobinos`) VALUES
(1, 1, 0, ''),
(2, 2, 1234, '4321'),
(3, 3, 7865, '11223121');

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
(1, 0, 0, 0, '', ''),
(2, 3, 1, 11, 'la chingada', 'chispero las dos'),
(3, 1, 14, 2, '34235', '435');

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
  `soioid` int(11) NOT NULL,
  `hatoraza` varchar(400) NOT NULL,
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

INSERT INTO `tbhato` (`hatoid`, `soioid`, `hatoraza`, `hatoterneros`, `hatoterneras`, `hatonovillos`, `hatonovillas`, `hatonovillasprenadas`, `hatotoros`, `hatovacas`) VALUES
(1, 1, '', 0, 0, 0, 0, 0, 0, 0),
(2, 2, '', 0, 0, 0, 0, 0, 0, 0),
(3, 3, '', 0, 0, 0, 0, 0, 0, 0);

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
(3, 3, '1');

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
(2, '5393363', 'AdÃ¡n', 'Carranza', 'Alfaro', '34343434', 'acd@gmail.com', 2, 2, '2000-07-07', 2),
(3, '117010943', 'Kimberly', 'Rivera', 'Ulloa', '2233-1213', 'kim@gmial.com', 2, 2, '0000-00-00', 1);

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
(3, 2, 6, 5, 'La punalada');

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
-- AUTO_INCREMENT for table `tbcvo`
--
ALTER TABLE `tbcvo`
  MODIFY `cvoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbexamenbrusela`
--
ALTER TABLE `tbexamenbrusela`
  MODIFY `examenbruselaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbexamentuberculosis`
--
ALTER TABLE `tbexamentuberculosis`
  MODIFY `examentuberculosisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbfierro`
--
ALTER TABLE `tbfierro`
  MODIFY `fierroid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbfinca`
--
ALTER TABLE `tbfinca`
  MODIFY `fincaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbfincacerca`
--
ALTER TABLE `tbfincacerca`
  MODIFY `fincacercaid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbfincadireccion`
--
ALTER TABLE `tbfincadireccion`
  MODIFY `fincaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbfincatipo`
--
ALTER TABLE `tbfincatipo`
  MODIFY `fincatipoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbhato`
--
ALTER TABLE `tbhato`
  MODIFY `hatoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbhatoactividad`
--
ALTER TABLE `tbhatoactividad`
  MODIFY `hatoactividadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbraza`
--
ALTER TABLE `tbraza`
  MODIFY `idraza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbsocio`
--
ALTER TABLE `tbsocio`
  MODIFY `socioid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbsociodireccion`
--
ALTER TABLE `tbsociodireccion`
  MODIFY `socioid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
