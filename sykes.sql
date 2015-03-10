-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2014 at 07:34 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sykes`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `cid` varchar(10) NOT NULL,
  `status` enum('a','d','p') NOT NULL,
  `pass` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `auth` int(32) DEFAULT NULL,
  `last_login` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `cid`, `status`, `pass`, `name`, `email`, `auth`, `last_login`) VALUES
(2, 'bb900g', 'a', '50df2bdff9f379333f4068a3f648edb2', 'Bystrom, Brian', 'brian.bystrom@sykes.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `metrics`
--

CREATE TABLE IF NOT EXISTS `metrics` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `metric_name` varchar(5) NOT NULL,
  `mode` enum('NPS','PER') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roster`
--

CREATE TABLE IF NOT EXISTS `roster` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `cid` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `manager` varchar(10) NOT NULL,
  `rank` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `survey_data`
--

CREATE TABLE IF NOT EXISTS `survey_data` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `rep_id` varchar(10) NOT NULL,
  `completion_date` date NOT NULL,
  `survey_id` varchar(50) NOT NULL,
  `ctn` int(12) NOT NULL,
  `level_1` varchar(100) NOT NULL,
  `level_3` varchar(100) NOT NULL,
  `metric_1` int(3) DEFAULT NULL,
  `metric_2` int(3) DEFAULT NULL,
  `metric_3` int(3) DEFAULT NULL,
  `metric_4` int(3) DEFAULT NULL,
  `metric_5` int(3) DEFAULT NULL,
  `metric_6` int(3) DEFAULT NULL,
  `verbatim` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
