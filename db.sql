-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2016 at 10:01 AM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ubicomp-restroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `restroom_q1` text NOT NULL,
  `restroom_q2` text NOT NULL,
  `restroom_q3` text NOT NULL,
  `restroom_q4` text NOT NULL,
  `add_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `janitor`
--

CREATE TABLE IF NOT EXISTS `janitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_loggedin` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `janitor`
--

INSERT INTO `janitor` (`id`, `username`, `password`, `last_loggedin`) VALUES
(1, 'janitor1', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', '2016-11-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `restrooms`
--

CREATE TABLE IF NOT EXISTS `restrooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restroom-name` varchar(255) NOT NULL,
  `toilet-paper` int(3) NOT NULL,
  `handwash` int(3) NOT NULL,
  `wet-floor` varchar(3) NOT NULL,
  `paper-towel` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `restrooms`
--

INSERT INTO `restrooms` (`id`, `restroom-name`, `toilet-paper`, `handwash`, `wet-floor`, `paper-towel`) VALUES
(1, 'Restroom North', 3, 4, '', '3'),
(2, 'Restroom West', 2, 2, 'no', ''),
(3, 'Restroom South', 6, 3, 'no', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
