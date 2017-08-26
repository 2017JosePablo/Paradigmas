-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2017 at 12:49 AM
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
(8, '503930363', 1, 1, 1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbhato`
--
ALTER TABLE `tbhato`
  ADD PRIMARY KEY (`hatoid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbhato`
--
ALTER TABLE `tbhato`
  MODIFY `hatoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
