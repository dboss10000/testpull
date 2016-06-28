-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2015 at 06:35 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dragdrop`
--

-- --------------------------------------------------------

--
-- Table structure for table `dragdrop`
--

CREATE TABLE IF NOT EXISTS `dragdrop` (
`id` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `listorder` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dragdrop`
--

INSERT INTO `dragdrop` (`id`, `text`, `listorder`) VALUES
(1, 'Go Shopping', 1),
(2, 'Take the dog for a walk', 3),
(3, 'Go swimming', 2),
(4, 'Go to the Gym', 4),
(5, 'Pick up the wife from work', 5),
(6, 'Wash the car', 6),
(7, 'Take the kids to school', 7);

-- --------------------------------------------------------

--
-- Table structure for table `testdragdrop`
--

CREATE TABLE IF NOT EXISTS `testdragdrop` (
`id` int(11) NOT NULL,
  `text` varchar(111) NOT NULL,
  `listorder` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testdragdrop`
--

INSERT INTO `testdragdrop` (`id`, `text`, `listorder`) VALUES
(1, 'This is content 7', 7),
(2, 'This is content 3', 3),
(3, 'This is content 9', 9),
(4, 'This is content 6', 6),
(5, 'This is content 4', 4),
(6, 'This is content 8', 8);

-- --------------------------------------------------------

--
-- Table structure for table `testdragdropfirst`
--

CREATE TABLE IF NOT EXISTS `testdragdropfirst` (
`id` int(11) NOT NULL,
  `text` varchar(111) NOT NULL,
  `listorder` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testdragdropfirst`
--

INSERT INTO `testdragdropfirst` (`id`, `text`, `listorder`) VALUES
(1, 'This is content 1', 1),
(2, 'This is content 2', 2),
(3, 'This is content 3', 3),
(4, 'This is content 4', 4),
(5, 'This is content 5', 5),
(6, 'This is content 6', 6),
(7, 'This is content 7', 7),
(8, 'This is content 8', 8),
(9, 'This is content 9', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dragdrop`
--
ALTER TABLE `dragdrop`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testdragdrop`
--
ALTER TABLE `testdragdrop`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testdragdropfirst`
--
ALTER TABLE `testdragdropfirst`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dragdrop`
--
ALTER TABLE `dragdrop`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `testdragdrop`
--
ALTER TABLE `testdragdrop`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `testdragdropfirst`
--
ALTER TABLE `testdragdropfirst`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
