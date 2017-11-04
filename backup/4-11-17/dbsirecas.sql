-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2017 at 03:22 PM
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
-- Database: `dbsirecas`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarNotificacion` (IN `idpersona` INT(10), IN `vistonotificacion` TINYINT(1), IN `confirmanotificacion` TINYINT(1), IN `asistionotificacion` TINYINT(1), IN `idevento` INT(11))  begin
update tbnotificaciones set idpersonanotificacion = idpersona,
vistonotificacion = vistonotificacion,confirmadonotificacion= confirmanotificacion,
asistidonotificacion=asistionotificacion,ideventonotificacion=idevento where  idpersonanotificacion =  idpersona && ideventonotificacion=idevento;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarEvento` (IN `tituloevento` TEXT, IN `descripcionevento` TEXT, IN `fechaevento` DATE, IN `horarioinicioevento` TIME, IN `horariofinalevento` TIME, IN `lugarevento` TEXT)  BEGIN
    INSERT INTO tbeventos(tituloevento,descripcionevento,fechaevento,horainicioevento,horafinalevento,estadoevento,lugarevento) VALUES(tituloevento,descripcionevento,fechaevento,horarioinicioevento,horariofinalevento,true,lugarevento);
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarNotificacion` (IN `idpersona` INT(10), IN `vistonotificacion` TINYINT(1), IN `confirmanotificacion` TINYINT(1), IN `asistionotificacion` TINYINT(1), IN `idevento` INT(11))  begin
insert into tbnotificaciones(idpersonanotificacion,vistonotificacion,confirmadonotificacion,
asistidonotificacion,ideventonotificacion)values(idpersona,vistonotificacion,confirmanotificacion, asistionotificacion,idevento);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarPersonas` ()  begin
	select * from tbpersona;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerEventosNoVistos` (IN `idpersona` VARCHAR(30))  begin
		SELECT tbeventos.idevento, tbeventos.tituloevento, tbeventos.descripcionevento, 
        tbeventos.lugarevento, tbeventos. fechaevento, tbeventos.horainicioevento, tbeventos.horafinalevento
        
        FROM 
		tbeventos 
		 INNER JOIN tbpersona ON tbpersona.idpersona = idpersona 
		 INNER JOIN tbnotificaciones  
		ON tbnotificaciones.vistonotificacion= '0' 
		AND tbpersona.idpersona = tbnotificaciones.idpersonanotificacion 
		AND tbeventos.idevento = tbnotificaciones.ideventonotificacion;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `seleccionarTodosLosEventos` ()  BEGIN
    
	SELECT * FROM tbeventos;
END$$

DELIMITER ;

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
-- Table structure for table `tbatestado`
--

CREATE TABLE `tbatestado` (
  `idatestado` int(11) NOT NULL,
  `idpersonaatestado` int(11) NOT NULL,
  `nombretituloatestado` text COLLATE utf8_spanish_ci,
  `imagenatestado` blob,
  `fechagraduadoatestado` date DEFAULT NULL,
  `egresadoatestado` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbcomitepersona`
--

CREATE TABLE `tbcomitepersona` (
  `idcomite` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `fechainscripcioncomitepersona` date DEFAULT NULL,
  `estadocomitepersona` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbcomites`
--

CREATE TABLE `tbcomites` (
  `idcomite` int(11) NOT NULL,
  `nombrecomite` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcioncomite` text COLLATE utf8_spanish_ci NOT NULL,
  `estadocomite` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbeventos`
--

CREATE TABLE `tbeventos` (
  `idevento` int(11) NOT NULL,
  `tituloevento` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcionevento` text COLLATE utf8_spanish_ci NOT NULL,
  `lugarevento` text COLLATE utf8_spanish_ci NOT NULL,
  `fechaevento` date DEFAULT NULL,
  `horainicioevento` time DEFAULT NULL,
  `horafinalevento` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tbeventos`
--

INSERT INTO `tbeventos` (`idevento`, `tituloevento`, `descripcionevento`, `lugarevento`, `fechaevento`, `horainicioevento`, `horafinalevento`) VALUES
(1, 'una', 'prueba para validar persona', 'heredia', '2017-08-01', '09:00:00', '11:00:00'),
(2, 'notas', 'Entrega de notas', 'sarapiqui', '2017-08-16', '06:00:00', '23:00:00'),
(3, 'reunion', 'Entrega de notas', 'colegio rio frio', '2017-08-16', '06:00:00', '23:00:00'),
(4, 'gira', 'Entrega de notas', 'sarapiqui', '2017-08-16', '06:00:00', '23:00:00'),
(5, 'capacitacion', 'Entrega de notas', 'central', '2017-08-16', '06:00:00', '23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbexperiencia`
--

CREATE TABLE `tbexperiencia` (
  `idexperiencia` int(11) NOT NULL,
  `idpersonaexperiencia` int(11) NOT NULL,
  `lugarexperiencia` text COLLATE utf8_spanish_ci,
  `ocupacionexperiencia` text COLLATE utf8_spanish_ci,
  `fechainicioexperiencia` date DEFAULT NULL,
  `fechafinalexperiencia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
-- Table structure for table `tbhabilidades`
--

CREATE TABLE `tbhabilidades` (
  `idhabilidades` int(11) NOT NULL,
  `descripcionhabilidades` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbhabilidadespersonas`
--

CREATE TABLE `tbhabilidadespersonas` (
  `idhabilidades` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbhabilidadespersonasotros`
--

CREATE TABLE `tbhabilidadespersonasotros` (
  `idhabilidadesotros` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `descripcionotros` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
-- Table structure for table `tbnotificaciones`
--

CREATE TABLE `tbnotificaciones` (
  `idnotificacion` int(11) NOT NULL,
  `idpersonanotificacion` int(11) DEFAULT NULL,
  `vistonotificacion` tinyint(1) DEFAULT NULL,
  `confirmadonotificacion` tinyint(1) DEFAULT NULL,
  `asistidonotificacion` tinyint(1) DEFAULT NULL,
  `ideventonotificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbpersona`
--

CREATE TABLE `tbpersona` (
  `idpersona` int(11) NOT NULL,
  `cedulapersona` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombrepersona` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido1persona` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido2persona` text COLLATE utf8_spanish_ci NOT NULL,
  `correopersona` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono1persona` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telefono2persona` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tipopersona` int(11) NOT NULL,
  `rolpersona` int(11) NOT NULL,
  `ultimoaccesopersona` date DEFAULT NULL,
  `clavepersona` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `provinciapersona` int(11) DEFAULT NULL,
  `cantonpersona` int(11) DEFAULT NULL,
  `distritopersona` int(11) DEFAULT NULL,
  `direccionpersona` text COLLATE utf8_spanish_ci,
  `otropersona` tinyint(1) DEFAULT NULL,
  `fechanacimientopersona` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tbpersona`
--

INSERT INTO `tbpersona` (`idpersona`, `cedulapersona`, `nombrepersona`, `apellido1persona`, `apellido2persona`, `correopersona`, `telefono1persona`, `telefono2persona`, `tipopersona`, `rolpersona`, `ultimoaccesopersona`, `clavepersona`, `provinciapersona`, `cantonpersona`, `distritopersona`, `direccionpersona`, `otropersona`, `fechanacimientopersona`) VALUES
(1, '503930363', 'Adan', 'CARRANZA', 'ALFARO', 'adanca16@gmail.com', '123', '234', 1, 1, '2017-08-04', '123', 1, 1, 1, 'una', 0, '2017-08-02'),
(3, '701230123', 'Carloa', 'Escalante', 'Solano', 'cfwlipew', '124', '1234', 1, 1, '2017-08-09', '123', 1, 1, 1, 'una', 0, '2017-08-01');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbvalidarcorreo`
--

CREATE TABLE `tbvalidarcorreo` (
  `idvalidarcorreo` int(11) NOT NULL,
  `idpersonavalidarcorreo` int(11) DEFAULT NULL,
  `codigovalidarcorreo` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
-- Indexes for table `tbatestado`
--
ALTER TABLE `tbatestado`
  ADD PRIMARY KEY (`idatestado`,`idpersonaatestado`),
  ADD KEY `idpersonaatestado` (`idpersonaatestado`);

--
-- Indexes for table `tbcomitepersona`
--
ALTER TABLE `tbcomitepersona`
  ADD PRIMARY KEY (`idpersona`,`idcomite`),
  ADD KEY `idcomite` (`idcomite`);

--
-- Indexes for table `tbcomites`
--
ALTER TABLE `tbcomites`
  ADD PRIMARY KEY (`idcomite`);

--
-- Indexes for table `tbeventos`
--
ALTER TABLE `tbeventos`
  ADD PRIMARY KEY (`idevento`);

--
-- Indexes for table `tbexperiencia`
--
ALTER TABLE `tbexperiencia`
  ADD PRIMARY KEY (`idexperiencia`,`idpersonaexperiencia`),
  ADD KEY `idpersonaexperiencia` (`idpersonaexperiencia`);

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
-- Indexes for table `tbhabilidades`
--
ALTER TABLE `tbhabilidades`
  ADD PRIMARY KEY (`idhabilidades`);

--
-- Indexes for table `tbhabilidadespersonas`
--
ALTER TABLE `tbhabilidadespersonas`
  ADD PRIMARY KEY (`idhabilidades`,`idpersona`),
  ADD KEY `idpersona` (`idpersona`);

--
-- Indexes for table `tbhabilidadespersonasotros`
--
ALTER TABLE `tbhabilidadespersonasotros`
  ADD PRIMARY KEY (`idhabilidadesotros`,`idpersona`),
  ADD KEY `idpersona` (`idpersona`);

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
-- Indexes for table `tbnotificaciones`
--
ALTER TABLE `tbnotificaciones`
  ADD PRIMARY KEY (`idnotificacion`),
  ADD KEY `idpersonanotificacion` (`idpersonanotificacion`),
  ADD KEY `ideventonotificacion` (`ideventonotificacion`);

--
-- Indexes for table `tbpersona`
--
ALTER TABLE `tbpersona`
  ADD PRIMARY KEY (`idpersona`);

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
-- Indexes for table `tbvalidarcorreo`
--
ALTER TABLE `tbvalidarcorreo`
  ADD PRIMARY KEY (`idvalidarcorreo`),
  ADD KEY `idpersonavalidarcorreo` (`idpersonavalidarcorreo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbactividad`
--
ALTER TABLE `tbactividad`
  MODIFY `actividadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbatestado`
--
ALTER TABLE `tbatestado`
  MODIFY `idatestado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbcomites`
--
ALTER TABLE `tbcomites`
  MODIFY `idcomite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbeventos`
--
ALTER TABLE `tbeventos`
  MODIFY `idevento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbexperiencia`
--
ALTER TABLE `tbexperiencia`
  MODIFY `idexperiencia` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `tbhabilidades`
--
ALTER TABLE `tbhabilidades`
  MODIFY `idhabilidades` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbhabilidadespersonasotros`
--
ALTER TABLE `tbhabilidadespersonasotros`
  MODIFY `idhabilidadesotros` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `tbnotificaciones`
--
ALTER TABLE `tbnotificaciones`
  MODIFY `idnotificacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbpersona`
--
ALTER TABLE `tbpersona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT for table `tbvalidarcorreo`
--
ALTER TABLE `tbvalidarcorreo`
  MODIFY `idvalidarcorreo` int(11) NOT NULL AUTO_INCREMENT;
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
