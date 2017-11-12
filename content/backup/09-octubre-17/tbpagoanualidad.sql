-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-10-2017 a las 01:12:39
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
-- Estructura de tabla para la tabla `tbpagoanualidad`
--

CREATE TABLE `tbpagoanualidad` (
  `pagoanualidadid` int(11) NOT NULL,
  `socioid` int(11) NOT NULL,
  `pagoanualidadanterior` date NOT NULL,
  `pagoanualidadactual` date NOT NULL,
  `pagoanualidadproximo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbpagoanualidad`
--

INSERT INTO `tbpagoanualidad` (`pagoanualidadid`, `socioid`, `pagoanualidadanterior`, `pagoanualidadactual`, `pagoanualidadproximo`) VALUES
(1, 1, '2002-06-28', '2002-06-12', '2002-06-12'),
(2, 2, '2002-06-12', '2002-06-12', '2002-06-12'),
(3, 1, '2002-06-12', '2002-06-12', '2002-06-12'),
(4, 1, '2002-06-12', '2002-06-12', '2002-06-12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbpagoanualidad`
--
ALTER TABLE `tbpagoanualidad`
  ADD PRIMARY KEY (`pagoanualidadid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbpagoanualidad`
--
ALTER TABLE `tbpagoanualidad`
  MODIFY `pagoanualidadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
