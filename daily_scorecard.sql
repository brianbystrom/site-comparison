-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2014 at 01:45 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sykes_wah_att_android`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_scorecard`
--

CREATE TABLE IF NOT EXISTS `daily_scorecard` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `cid` varchar(6) NOT NULL,
  `date` date NOT NULL,
  `m1_survey` int(4) DEFAULT NULL,
  `m1_score` decimal(10,0) DEFAULT NULL,
  `m2_survey` int(4) DEFAULT NULL,
  `m2_score` decimal(10,0) DEFAULT NULL,
  `m3_survey` int(4) DEFAULT NULL,
  `m3_score` float DEFAULT NULL,
  `m4_survey` int(4) DEFAULT NULL,
  `m4_score` float DEFAULT NULL,
  `m5_survey` int(4) DEFAULT NULL,
  `m5_score` float DEFAULT NULL,
  `m6_survey` int(4) DEFAULT NULL,
  `m6_score` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
