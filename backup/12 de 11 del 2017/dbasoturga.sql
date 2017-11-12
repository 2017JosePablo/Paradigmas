-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2017 at 11:12 PM
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
-- Table structure for table `tbactaaprobacion`
--

CREATE TABLE `tbactaaprobacion` (
  `actaaprobacionid` int(11) NOT NULL,
  `socioid` int(11) NOT NULL,
  `actaaprobacionsecion` int(11) NOT NULL,
  `actaaprobacionfecha` date NOT NULL,
  `actaaprobacioncondicion` varchar(100) NOT NULL,
  `actaaprobacionmotivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbactaaprobacion`
--

INSERT INTO `tbactaaprobacion` (`actaaprobacionid`, `socioid`, `actaaprobacionsecion`, `actaaprobacionfecha`, `actaaprobacioncondicion`, `actaaprobacionmotivo`) VALUES
(1, 1, 0, '2017-11-06', 'Aceptado', 'Solicitud Aceptada.');

-- --------------------------------------------------------

--
-- Table structure for table `tbanualidad`
--

CREATE TABLE `tbanualidad` (
  `anualidadid` int(11) NOT NULL,
  `responsableid` varchar(11) NOT NULL,
  `anualidadmonto` int(11) NOT NULL,
  `anualidadfechaactualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbaviso`
--

CREATE TABLE `tbaviso` (
  `idaviso` int(11) NOT NULL,
  `socioid` int(11) NOT NULL,
  `temaaviso` text NOT NULL,
  `detalleaviso` text NOT NULL,
  `rutafotoaviso` varchar(400) NOT NULL,
  `fechaaviso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbcomentarioaviso`
--

CREATE TABLE `tbcomentarioaviso` (
  `idcomentario` int(11) NOT NULL,
  `idaviso` int(11) NOT NULL,
  `idresponsable` int(11) NOT NULL,
  `comentariomensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 0, '', '');

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
(1, 'Alambre de púas'),
(2, 'Eléctrica'),
(3, 'Mixta');

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
(1, 3, 4, 1, '', '');

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
(1, 'Pastoreo\r\n'),
(2, 'Estabulado\r\n'),
(3, 'Semiestabulado\r\n'),
(4, 'Suplementación en potrero\r\n');

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
(1, 1, '', 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
(1, 1, '5');

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

-- --------------------------------------------------------

--
-- Table structure for table `tblogin`
--

CREATE TABLE `tblogin` (
  `idlogin` int(11) NOT NULL,
  `socioid` int(11) NOT NULL,
  `userlogin` varchar(100) NOT NULL,
  `passwordlogin` varchar(100) NOT NULL,
  `rollogin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblogin`
--

INSERT INTO `tblogin` (`idlogin`, `socioid`, `userlogin`, `passwordlogin`, `rollogin`) VALUES
(1, 1, 'asoturgaturri@gmail.com', 'asoturgaturri1', 'admi');

-- --------------------------------------------------------

--
-- Table structure for table `tbpagoanualidad`
--

CREATE TABLE `tbpagoanualidad` (
  `pagoanualidadid` int(11) NOT NULL,
  `socioid` int(11) NOT NULL,
  `pagoanualidadanterior` date NOT NULL,
  `pagoanualidadactual` date NOT NULL,
  `pagoanualidadproximo` date NOT NULL,
  `pagoanualidadidestado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpastocorte`
--

CREATE TABLE `tbpastocorte` (
  `idpastocorte` int(11) NOT NULL,
  `pastocortenombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpastocorte`
--

INSERT INTO `tbpastocorte` (`idpastocorte`, `pastocortenombre`) VALUES
(0, 'Elefante'),
(0, 'Sorgo'),
(0, 'King Grass'),
(0, 'Gramalote'),
(0, 'Maralfalfa'),
(0, 'Imperial'),
(0, 'Cuba 22'),
(0, 'Taiwan'),
(0, 'Lote 51');

-- --------------------------------------------------------

--
-- Table structure for table `tbpastoforraje`
--

CREATE TABLE `tbpastoforraje` (
  `idpastoforraje` int(11) NOT NULL,
  `pastoforrajenombre` varchar(50) NOT NULL
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
(1, 'Cebú con cruce europeo de carne'),
(2, 'Angus\r\n'),
(3, 'Hereford\r\n'),
(4, 'Shorthorn\r\n'),
(5, 'Red Poll\r\n'),
(6, 'Charoláis\r\n'),
(7, 'Gelbvieh\r\n'),
(8, 'Maine\r\n'),
(9, 'Simmental\r\n'),
(10, 'Romagnola\r\n'),
(11, 'Chianina\r\n'),
(12, 'Limousine\r\n'),
(13, 'Blonde d\'aquitaine\r\n'),
(14, 'Pardo suizo\r\n'),
(15, 'Inra 95\r\n'),
(16, 'Cebú con cruce lechero\r\n'),
(17, 'Guzerat\r\n'),
(18, 'Brahaman\r\n'),
(19, 'Gyr\r\n'),
(20, 'Nelore\r\n'),
(21, 'Sardo negro\r\n'),
(22, 'Sahiwal\r\n'),
(23, 'Girolando\r\n'),
(24, 'Indubrasil\r\n'),
(25, 'Cruces europeos lecheros\r\n'),
(26, 'Santa Gertrudis\r\n'),
(27, 'Simbrah\r\n'),
(28, 'Charbray\r\n'),
(29, 'Braford\r\n'),
(30, 'Brangus\r\n'),
(31, 'Beefmaster\r\n'),
(32, 'Belga azul\r\n'),
(33, 'Jersey\r\n'),
(34, 'Ayshire\r\n'),
(35, 'Holstein\r\n'),
(36, 'Guernsey\r\n'),
(37, 'Chumeca\r\n');

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
  `estadosociodetalle` int(11) DEFAULT NULL,
  `sociorecomendacionuno` varchar(100) NOT NULL,
  `sociorecomendaciondos` varchar(100) NOT NULL,
  `socioresponsable` varchar(100) NOT NULL,
  `sociobeneficiario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsocio`
--

INSERT INTO `tbsocio` (`socioid`, `sociocedula`, `socionombre`, `socioprimerapellido`, `sociosegundoapellido`, `sociotelefono`, `sociocorreo`, `tipoactividadid`, `fincatipoid`, `sociofechaingreso`, `estadosociodetalle`, `sociorecomendacionuno`, `sociorecomendaciondos`, `socioresponsable`, `sociobeneficiario`) VALUES
(1, '1-2345678', 'ASOTURGA', 'ASOTURGA', 'ASOTURGA', '8888 88 88', 'asoturgaturri@gmail.com', 5, 1, '2017-11-06', 2, 'Sin Recomendacion', 'Sin Recomendacion', '', '');

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
(1, 3, 5, 1, 'turri');

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
(1, 'En registro\r\n'),
(2, 'Activo\r\n'),
(3, 'Inactivo\r\n'),
(4, 'Moroso\r\n'),
(5, 'Rechazado');

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
(1, 'Lechería especializada'),
(2, 'Lechería doble propósito'),
(3, 'Cría'),
(4, 'Engorde'),
(5, 'Lechería especializada	dos ordeños');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbactaaprobacion`
--
ALTER TABLE `tbactaaprobacion`
  ADD PRIMARY KEY (`actaaprobacionid`);

--
-- Indexes for table `tbanualidad`
--
ALTER TABLE `tbanualidad`
  ADD PRIMARY KEY (`anualidadid`);

--
-- Indexes for table `tbaviso`
--
ALTER TABLE `tbaviso`
  ADD PRIMARY KEY (`idaviso`);

--
-- Indexes for table `tbcolaborador`
--
ALTER TABLE `tbcolaborador`
  ADD PRIMARY KEY (`colaboradorid`);

--
-- Indexes for table `tbcomentarioaviso`
--
ALTER TABLE `tbcomentarioaviso`
  ADD PRIMARY KEY (`idcomentario`);

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
-- Indexes for table `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`idlogin`);

--
-- Indexes for table `tbpagoanualidad`
--
ALTER TABLE `tbpagoanualidad`
  ADD PRIMARY KEY (`pagoanualidadid`);

--
-- Indexes for table `tbraza`
--
ALTER TABLE `tbraza`
  ADD PRIMARY KEY (`idraza`);

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
-- AUTO_INCREMENT for table `tbactaaprobacion`
--
ALTER TABLE `tbactaaprobacion`
  MODIFY `actaaprobacionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbanualidad`
--
ALTER TABLE `tbanualidad`
  MODIFY `anualidadid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbaviso`
--
ALTER TABLE `tbaviso`
  MODIFY `idaviso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbcolaborador`
--
ALTER TABLE `tbcolaborador`
  MODIFY `colaboradorid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbcomentarioaviso`
--
ALTER TABLE `tbcomentarioaviso`
  MODIFY `idcomentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbcvo`
--
ALTER TABLE `tbcvo`
  MODIFY `cvoid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbexamenbrusela`
--
ALTER TABLE `tbexamenbrusela`
  MODIFY `examenbruselaid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbexamentuberculosis`
--
ALTER TABLE `tbexamentuberculosis`
  MODIFY `examentuberculosisid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbfierro`
--
ALTER TABLE `tbfierro`
  MODIFY `fierroid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbfinca`
--
ALTER TABLE `tbfinca`
  MODIFY `fincaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbfincacerca`
--
ALTER TABLE `tbfincacerca`
  MODIFY `fincacercaid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbfincadireccion`
--
ALTER TABLE `tbfincadireccion`
  MODIFY `fincaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbfincatipo`
--
ALTER TABLE `tbfincatipo`
  MODIFY `fincatipoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbhato`
--
ALTER TABLE `tbhato`
  MODIFY `hatoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbhatoactividad`
--
ALTER TABLE `tbhatoactividad`
  MODIFY `hatoactividadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblogin`
--
ALTER TABLE `tblogin`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbpagoanualidad`
--
ALTER TABLE `tbpagoanualidad`
  MODIFY `pagoanualidadid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbraza`
--
ALTER TABLE `tbraza`
  MODIFY `idraza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tbsociodireccion`
--
ALTER TABLE `tbsociodireccion`
  MODIFY `socioid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbsocioestado`
--
ALTER TABLE `tbsocioestado`
  MODIFY `socioestadoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  MODIFY `tipoactividadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
