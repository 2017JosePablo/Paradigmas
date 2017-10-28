-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-10-2017 a las 06:07:10
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbasoturga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbactaaprobacion`
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
-- Volcado de datos para la tabla `tbactaaprobacion`
--

INSERT INTO `tbactaaprobacion` (`actaaprobacionid`, `socioid`, `actaaprobacionsecion`, `actaaprobacionfecha`, `actaaprobacioncondicion`, `actaaprobacionmotivo`) VALUES
(1, 2, 0, '0000-00-00', 'Aceptado', 'Solicitud Aceptada.'),
(2, 1, 0, '0000-00-00', 'Aceptado', 'Solicitud Aceptada.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbanualidad`
--

CREATE TABLE `tbanualidad` (
  `anualidadid` int(11) NOT NULL,
  `responsableid` varchar(11) NOT NULL,
  `anualidadmonto` int(11) NOT NULL,
  `anualidadfechaactualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbanualidad`
--

INSERT INTO `tbanualidad` (`anualidadid`, `responsableid`, `anualidadmonto`, `anualidadfechaactualizacion`) VALUES
(1, '1', 2000, '2017-01-01'),
(2, '1', 5000, '2016-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbaviso`
--

CREATE TABLE `tbaviso` (
  `idaviso` int(11) NOT NULL,
  `socioid` int(11) NOT NULL,
  `temaaviso` text NOT NULL,
  `detalleaviso` text NOT NULL,
  `rutafotoaviso` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbaviso`
--

INSERT INTO `tbaviso` (`idaviso`, `socioid`, `temaaviso`, `detalleaviso`, `rutafotoaviso`) VALUES
(1, 1, 'Mi PrimerAviso', 'Este aviso es de Prueba Para los Socios', '../uploads/images.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcolaborador`
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
-- Volcado de datos para la tabla `tbcolaborador`
--

INSERT INTO `tbcolaborador` (`colaboradorid`, `colaboradorcedula`, `colaboradornombre`, `colaboradorprimerapellido`, `colaboradorsegundoapellido`, `colaboradorcorreo`, `colaboradortelefono`) VALUES
(1, '402502504', 'Cristian', 'Herrera', 'Rodriguez', 'fK:Sfjdjkl', '2420459240');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcvo`
--

CREATE TABLE `tbcvo` (
  `cvoid` int(11) NOT NULL,
  `cvotiene` int(11) NOT NULL,
  `cvofechavigencia` date NOT NULL,
  `idsocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcvo`
--

INSERT INTO `tbcvo` (`cvoid`, `cvotiene`, `cvofechavigencia`, `idsocio`) VALUES
(1, 1, '2017-10-11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbexamenbrusela`
--

CREATE TABLE `tbexamenbrusela` (
  `examenbruselaid` int(11) NOT NULL,
  `examenbruselavigente` int(11) NOT NULL,
  `examenbruselafechavencimiento` date NOT NULL,
  `idsocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbexamenbrusela`
--

INSERT INTO `tbexamenbrusela` (`examenbruselaid`, `examenbruselavigente`, `examenbruselafechavencimiento`, `idsocio`) VALUES
(1, 1, '2017-10-18', 1),
(2, 2, '2017-10-23', 1),
(3, 2, '2017-10-23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbexamentuberculosis`
--

CREATE TABLE `tbexamentuberculosis` (
  `examentuberculosisid` int(11) NOT NULL,
  `examentuberculosisvigente` int(11) NOT NULL,
  `examentuberculosisfechavencimiento` date NOT NULL,
  `idsocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbexamentuberculosis`
--

INSERT INTO `tbexamentuberculosis` (`examentuberculosisid`, `examentuberculosisvigente`, `examentuberculosisfechavencimiento`, `idsocio`) VALUES
(1, 2, '2017-10-11', 1),
(2, 2, '2017-10-23', 1),
(3, 2, '2017-10-23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfierro`
--

CREATE TABLE `tbfierro` (
  `fierroid` int(11) NOT NULL,
  `fierrotiene` int(2) NOT NULL,
  `fierroruta` varchar(400) NOT NULL,
  `idsocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfinca`
--

CREATE TABLE `tbfinca` (
  `fincaid` int(11) NOT NULL,
  `socioid` int(11) DEFAULT NULL,
  `fincaarea` int(11) DEFAULT NULL,
  `fincacantidadbobinos` varchar(45) DEFAULT NULL,
  `fincacerca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbfinca`
--

INSERT INTO `tbfinca` (`fincaid`, `socioid`, `fincaarea`, `fincacantidadbobinos`, `fincacerca`) VALUES
(1, 1, 0, '', ''),
(2, 2, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfincacerca`
--

CREATE TABLE `tbfincacerca` (
  `fincacercaid` int(40) NOT NULL,
  `fincacercatipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbfincacerca`
--

INSERT INTO `tbfincacerca` (`fincacercaid`, `fincacercatipo`) VALUES
(1, 'Puas'),
(2, 'Electrica'),
(3, 'Mixta'),
(5, 'Concreto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfincadireccion`
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
-- Volcado de datos para la tabla `tbfincadireccion`
--

INSERT INTO `tbfincadireccion` (`fincaid`, `fincaprovincia`, `fincacanton`, `fincadistrito`, `fincapueblo`, `fincaexacta`) VALUES
(1, 0, 0, 0, '', ''),
(2, 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfincatipo`
--

CREATE TABLE `tbfincatipo` (
  `fincatipoid` int(11) NOT NULL,
  `fincatiponombre` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbfincatipo`
--

INSERT INTO `tbfincatipo` (`fincatipoid`, `fincatiponombre`) VALUES
(1, 'REPASTO'),
(2, 'ESTAULADO\r\n'),
(3, 'SEMIESTAULADO'),
(4, 'SEMIESTAULADO CERCA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhato`
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
-- Volcado de datos para la tabla `tbhato`
--

INSERT INTO `tbhato` (`hatoid`, `socioid`, `hatoraza`, `hatoternero`, `hatoternera`, `hatonovillo`, `hatonovilla`, `hatonovillaprenada`, `hatotoroservicio`, `hatotoroengorde`, `hatovacacria`, `hatovacaengorde`) VALUES
(1, 1, '7,', 112131432, 0, 13131, 0, 0, 0, 0, 0, 0),
(2, 4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 9, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 1, '7,', 112131432, 0, 13131, 0, 0, 0, 0, 0, 0),
(9, 3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 1, '7,', 112131432, 0, 13131, 0, 0, 0, 0, 0, 0),
(12, 2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 3, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 4, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 5, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 6, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 7, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 8, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 9, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 10, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 11, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 12, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 13, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 14, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 15, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 16, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 17, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 18, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 19, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 20, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 21, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 22, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 23, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 24, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 25, '', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 1, '7,', 112131432, 0, 13131, 0, 0, 0, 0, 0, 0),
(37, 2, '', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhatoactividad`
--

CREATE TABLE `tbhatoactividad` (
  `hatoactividadid` int(11) NOT NULL,
  `hatoactividadpersonaid` int(11) NOT NULL,
  `hatoactividadtipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbhatoactividad`
--

INSERT INTO `tbhatoactividad` (`hatoactividadid`, `hatoactividadpersonaid`, `hatoactividadtipo`) VALUES
(1, 1, '1'),
(2, 4, '1'),
(3, 5, '1'),
(4, 6, '1'),
(5, 7, '1'),
(6, 8, '1'),
(7, 9, '1'),
(8, 1, '1'),
(9, 3, '1'),
(10, 4, '1'),
(11, 1, '1'),
(12, 2, '1'),
(13, 3, '1'),
(14, 4, '1'),
(15, 5, '1'),
(16, 6, '1'),
(17, 7, '1'),
(18, 8, '1'),
(19, 9, '1'),
(20, 10, '1'),
(21, 11, '1'),
(22, 12, '1'),
(23, 13, '1'),
(24, 14, '1'),
(25, 15, '1'),
(26, 16, '1'),
(27, 17, '1'),
(28, 18, '1'),
(29, 19, '1'),
(30, 20, '1'),
(31, 21, '1'),
(32, 22, '1'),
(33, 23, '1'),
(34, 24, '1'),
(35, 25, '1'),
(36, 1, '1'),
(37, 2, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbjunta`
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
-- Estructura de tabla para la tabla `tblogin`
--

CREATE TABLE `tblogin` (
  `idlogin` int(11) NOT NULL,
  `socioid` int(11) NOT NULL,
  `userlogin` varchar(100) NOT NULL,
  `passwordlogin` varchar(100) NOT NULL,
  `rollogin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblogin`
--

INSERT INTO `tblogin` (`idlogin`, `socioid`, `userlogin`, `passwordlogin`, `rollogin`) VALUES
(1, 1, 'adanca16@gmail.com', '1234', 'usuario'),
(2, 2, 'juan@gmail.com', 'juanca', 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpagoanualidad`
--

CREATE TABLE `tbpagoanualidad` (
  `pagoanualidadid` int(11) NOT NULL,
  `socioid` int(11) NOT NULL,
  `pagoanualidadanterior` date NOT NULL,
  `pagoanualidadactual` date NOT NULL,
  `pagoanualidadproximo` date NOT NULL,
  `pagoanualidadidestado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbpagoanualidad`
--

INSERT INTO `tbpagoanualidad` (`pagoanualidadid`, `socioid`, `pagoanualidadanterior`, `pagoanualidadactual`, `pagoanualidadproximo`, `pagoanualidadidestado`) VALUES
(1, 1, '2016-10-23', '2017-10-23', '2017-10-23', 'debe'),
(2, 1, '2015-10-23', '2017-10-02', '2016-10-23', 'debe'),
(3, 1, '2017-10-22', '2017-10-22', '2018-10-22', 'pago'),
(4, 1, '2017-10-22', '2017-10-11', '2018-10-22', 'pago'),
(5, 1, '2017-10-02', '2017-10-02', '2018-10-02', 'pago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbraza`
--

CREATE TABLE `tbraza` (
  `idraza` int(11) NOT NULL,
  `razanombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbraza`
--

INSERT INTO `tbraza` (`idraza`, `razanombre`) VALUES
(1, 'Jersey'),
(2, 'Holstein'),
(3, 'Brahaman'),
(4, 'Charolais'),
(5, 'Angus'),
(6, 'Otros'),
(7, 'PALARGA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsocio`
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
  `sociorecomendaciondos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbsocio`
--

INSERT INTO `tbsocio` (`socioid`, `sociocedula`, `socionombre`, `socioprimerapellido`, `sociosegundoapellido`, `sociotelefono`, `sociocorreo`, `tipoactividadid`, `fincatipoid`, `sociofechaingreso`, `estadosociodetalle`, `sociorecomendacionuno`, `sociorecomendaciondos`) VALUES
(1, '5-3930363', 'Adan Francisco', 'Carranza', 'Alfaro', '8566 67 38', 'adanca16@gmail.com', 1, 1, '2017-11-10', 2, 'Adan Carranza Alfaro', 'Adan Carranza Alfaro'),
(2, '3-5424345', 'Juan', 'Porras', 'Salazar', '3412 13 34', 'juan@gmail.com', 2, 2, '2017-10-04', 2, 'Adan Francisco Carranza Alfaro', 'Adan Francisco Carranza Alfaro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsociodireccion`
--

CREATE TABLE `tbsociodireccion` (
  `socioid` int(11) NOT NULL,
  `socioprovincia` int(11) DEFAULT NULL,
  `sociocanton` int(11) DEFAULT NULL,
  `sociodistrito` int(11) DEFAULT NULL,
  `sociopueblo` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbsociodireccion`
--

INSERT INTO `tbsociodireccion` (`socioid`, `socioprovincia`, `sociocanton`, `sociodistrito`, `sociopueblo`) VALUES
(1, 0, 0, 0, 'ADAn'),
(2, 3, 2, 2, 'JUNA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsocioestado`
--

CREATE TABLE `tbsocioestado` (
  `socioestadoid` int(11) NOT NULL,
  `socioestadodetalle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbsocioestado`
--

INSERT INTO `tbsocioestado` (`socioestadoid`, `socioestadodetalle`) VALUES
(1, 'moroso'),
(2, 'Activo'),
(3, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipoactividad`
--

CREATE TABLE `tbtipoactividad` (
  `tipoactividadid` int(11) NOT NULL,
  `tipoactividadnombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtipoactividad`
--

INSERT INTO `tbtipoactividad` (`tipoactividadid`, `tipoactividadnombre`) VALUES
(1, 'Carne'),
(2, 'Leche'),
(3, 'Desarrollo'),
(5, 'FIORINA'),
(6, 'CANINA'),
(7, 'POLLINA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbactaaprobacion`
--
ALTER TABLE `tbactaaprobacion`
  ADD PRIMARY KEY (`actaaprobacionid`);

--
-- Indices de la tabla `tbanualidad`
--
ALTER TABLE `tbanualidad`
  ADD PRIMARY KEY (`anualidadid`);

--
-- Indices de la tabla `tbaviso`
--
ALTER TABLE `tbaviso`
  ADD PRIMARY KEY (`idaviso`);

--
-- Indices de la tabla `tbcolaborador`
--
ALTER TABLE `tbcolaborador`
  ADD PRIMARY KEY (`colaboradorid`);

--
-- Indices de la tabla `tbcvo`
--
ALTER TABLE `tbcvo`
  ADD PRIMARY KEY (`cvoid`);

--
-- Indices de la tabla `tbexamenbrusela`
--
ALTER TABLE `tbexamenbrusela`
  ADD PRIMARY KEY (`examenbruselaid`);

--
-- Indices de la tabla `tbexamentuberculosis`
--
ALTER TABLE `tbexamentuberculosis`
  ADD PRIMARY KEY (`examentuberculosisid`);

--
-- Indices de la tabla `tbfierro`
--
ALTER TABLE `tbfierro`
  ADD PRIMARY KEY (`fierroid`);

--
-- Indices de la tabla `tbfinca`
--
ALTER TABLE `tbfinca`
  ADD PRIMARY KEY (`fincaid`),
  ADD KEY `socioid` (`socioid`);

--
-- Indices de la tabla `tbfincacerca`
--
ALTER TABLE `tbfincacerca`
  ADD PRIMARY KEY (`fincacercaid`);

--
-- Indices de la tabla `tbfincadireccion`
--
ALTER TABLE `tbfincadireccion`
  ADD PRIMARY KEY (`fincaid`);

--
-- Indices de la tabla `tbfincatipo`
--
ALTER TABLE `tbfincatipo`
  ADD PRIMARY KEY (`fincatipoid`);

--
-- Indices de la tabla `tbhato`
--
ALTER TABLE `tbhato`
  ADD PRIMARY KEY (`hatoid`);

--
-- Indices de la tabla `tbhatoactividad`
--
ALTER TABLE `tbhatoactividad`
  ADD PRIMARY KEY (`hatoactividadid`);

--
-- Indices de la tabla `tbjunta`
--
ALTER TABLE `tbjunta`
  ADD PRIMARY KEY (`idjunta`);

--
-- Indices de la tabla `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`idlogin`);

--
-- Indices de la tabla `tbpagoanualidad`
--
ALTER TABLE `tbpagoanualidad`
  ADD PRIMARY KEY (`pagoanualidadid`);

--
-- Indices de la tabla `tbraza`
--
ALTER TABLE `tbraza`
  ADD PRIMARY KEY (`idraza`);

--
-- Indices de la tabla `tbsocio`
--
ALTER TABLE `tbsocio`
  ADD PRIMARY KEY (`socioid`),
  ADD KEY `tipoactividadid` (`tipoactividadid`),
  ADD KEY `fincatipoid` (`fincatipoid`),
  ADD KEY `estadosociodetalle` (`estadosociodetalle`);

--
-- Indices de la tabla `tbsociodireccion`
--
ALTER TABLE `tbsociodireccion`
  ADD PRIMARY KEY (`socioid`);

--
-- Indices de la tabla `tbsocioestado`
--
ALTER TABLE `tbsocioestado`
  ADD PRIMARY KEY (`socioestadoid`);

--
-- Indices de la tabla `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  ADD PRIMARY KEY (`tipoactividadid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbactaaprobacion`
--
ALTER TABLE `tbactaaprobacion`
  MODIFY `actaaprobacionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbanualidad`
--
ALTER TABLE `tbanualidad`
  MODIFY `anualidadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tbaviso`
--
ALTER TABLE `tbaviso`
  MODIFY `idaviso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbcolaborador`
--
ALTER TABLE `tbcolaborador`
  MODIFY `colaboradorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbcvo`
--
ALTER TABLE `tbcvo`
  MODIFY `cvoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbexamenbrusela`
--
ALTER TABLE `tbexamenbrusela`
  MODIFY `examenbruselaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbexamentuberculosis`
--
ALTER TABLE `tbexamentuberculosis`
  MODIFY `examentuberculosisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbfierro`
--
ALTER TABLE `tbfierro`
  MODIFY `fierroid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbfinca`
--
ALTER TABLE `tbfinca`
  MODIFY `fincaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbfincacerca`
--
ALTER TABLE `tbfincacerca`
  MODIFY `fincacercaid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbfincadireccion`
--
ALTER TABLE `tbfincadireccion`
  MODIFY `fincaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbfincatipo`
--
ALTER TABLE `tbfincatipo`
  MODIFY `fincatipoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbhato`
--
ALTER TABLE `tbhato`
  MODIFY `hatoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `tbhatoactividad`
--
ALTER TABLE `tbhatoactividad`
  MODIFY `hatoactividadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `tblogin`
--
ALTER TABLE `tblogin`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbpagoanualidad`
--
ALTER TABLE `tbpagoanualidad`
  MODIFY `pagoanualidadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbraza`
--
ALTER TABLE `tbraza`
  MODIFY `idraza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tbsocio`
--
ALTER TABLE `tbsocio`
  MODIFY `socioid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbsociodireccion`
--
ALTER TABLE `tbsociodireccion`
  MODIFY `socioid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbsocioestado`
--
ALTER TABLE `tbsocioestado`
  MODIFY `socioestadoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  MODIFY `tipoactividadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
