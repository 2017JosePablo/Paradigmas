-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-10-2017 a las 01:12:23
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
-- Estructura de tabla para la tabla `tbanualidad`
--

CREATE TABLE `tbanualidad` (
  `anualidadid` int(11) NOT NULL,
  `responsableid` int(11) NOT NULL,
  `anualidadmonto` int(11) NOT NULL,
  `anualidadfechaactualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbanualidad`
--

INSERT INTO `tbanualidad` (`anualidadid`, `responsableid`, `anualidadmonto`, `anualidadfechaactualizacion`) VALUES
(1, 1, 2000, '2017-10-02'),
(2, 1, 5000, '2017-10-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbanualidad`
--
ALTER TABLE `tbanualidad`
  ADD PRIMARY KEY (`anualidadid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbanualidad`
--
ALTER TABLE `tbanualidad`
  MODIFY `anualidadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
