-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2013 at 06:22 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs2610activity`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `first` varchar(24) NOT NULL,
  `last` varchar(24) NOT NULL,
  `dependents` tinyint(4) NOT NULL,
  `wageRate` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first`, `last`, `dependents`, `wageRate`) VALUES
(1, 'John', 'Williams', 6, '22.95'),
(2, 'Linda ', 'Jones', 4, '23.50'),
(3, 'Mary ', 'Walters', 7, '15.65'),
(4, 'Arnold', 'Baker', 4, '15.40'),
(5, 'Robyn', 'Scott', 0, '31.20'),
(6, 'Harold', 'Buttars', 3, '29.75'),
(9, 'John', 'Parker', 4, '7.75'),
(10, 'Laura', 'Prince', 0, '8.75'),
(11, 'Mark', 'Porter', 2, '17.85');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
