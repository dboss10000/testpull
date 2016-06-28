-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2015 at 09:15 PM
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
(2, 'Take the dog for a walk', 2),
(3, 'Go swimming', 4),
(4, 'Go to the Gym', 3),
(5, 'Pick up the wife from work', 5),
(6, 'Wash the car', 6),
(7, 'Take the kids to school', 7);

-- --------------------------------------------------------

--
-- Table structure for table `testdragdrop`
--

CREATE TABLE IF NOT EXISTS `testdragdrop` (
  `id` int(11) NOT NULL,
  `text` mediumtext NOT NULL,
  `listorder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dragdrop`
--
ALTER TABLE `dragdrop`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dragdrop`
--
ALTER TABLE `dragdrop`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
