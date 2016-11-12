-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2016 at 10:24 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ubicomp-restroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `restroom_q1` text NOT NULL,
  `restroom_q2` text NOT NULL,
  `restroom_q3` text NOT NULL,
  `restroom_q4` text NOT NULL,
  `add_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `janitor`
--

CREATE TABLE `janitor` (
  `id` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_loggedin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `janitor`
--

INSERT INTO `janitor` (`id`, `username`, `password`, `last_loggedin`) VALUES
(1, 'janitor1', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', '2016-11-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `restrooms`
--

CREATE TABLE `restrooms` (
  `id` int(11) NOT NULL,
  `restroom-name` varchar(255) NOT NULL,
  `toilet-paper` int(3) NOT NULL,
  `handwash` int(3) NOT NULL,
  `wet-floor` varchar(3) NOT NULL,
  `paper-towel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restrooms`
--

INSERT INTO `restrooms` (`id`, `restroom-name`, `toilet-paper`, `handwash`, `wet-floor`, `paper-towel`) VALUES
(1, 'Restroom North', 3, 3, '', '3'),
(2, 'Restroom West', 2, 2, 'no', ''),
(3, 'Restroom South', 6, 3, 'no', '');

-- --------------------------------------------------------

--
-- Table structure for table `restroomstatus`
--

CREATE TABLE `restroomstatus` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `restroom-name` varchar(255) NOT NULL,
  `toilet-paper` int(3) NOT NULL,
  `handwash` int(3) NOT NULL,
  `wet-floor` int(3) NOT NULL,
  `paper-towel` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restroomstatus`
--

INSERT INTO `restroomstatus` (`time`, `restroom-name`, `toilet-paper`, `handwash`, `wet-floor`, `paper-towel`) VALUES
('2016-11-10 21:07:59', 'north-ladies', 3, 2, 4, 4),
('2016-11-10 22:04:03', '1', 3, 3, 5, 3),
('2016-11-10 22:06:30', '3', 4, 2, 5, 4),
('2016-11-10 22:09:08', '', 4, 3, 5, 4),
('2016-11-10 22:11:18', '1', 5, 3, 5, 4),
('2016-11-12 19:57:36', '1', 4, 5, 5, 5),
('2016-11-12 20:10:16', '1', 1, 1, 5, 1),
('2016-11-12 20:10:30', '1', 1, 1, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `janitor`
--
ALTER TABLE `janitor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `restrooms`
--
ALTER TABLE `restrooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `janitor`
--
ALTER TABLE `janitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `restrooms`
--
ALTER TABLE `restrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
