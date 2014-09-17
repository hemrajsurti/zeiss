-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 166.62.8.46
-- Generation Time: Apr 26, 2014 at 09:58 PM
-- Server version: 5.5.33
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `eventId` bigint(30) NOT NULL AUTO_INCREMENT,
  `eventName` varchar(100) NOT NULL,
  `eventDescription` text NOT NULL,
  `eventDate` date NOT NULL,
  `eventVenue` text NOT NULL,
  `eventImageURL` text NOT NULL,
  PRIMARY KEY (`eventId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` VALUES(1, 'Test1', 'Test1', '2014-04-24', 'Ahmedabad', '21-04-2014 09-39-20-AM.png');
INSERT INTO `tbl_events` VALUES(2, 'Test2', 'test2', '2014-04-24', 'Ahmedabad', 'line animation2.png');
INSERT INTO `tbl_events` VALUES(3, 'Test111', 'vdsgfssd', '2014-04-24', 'fadfadsadas', 'line animation.png');
INSERT INTO `tbl_events` VALUES(4, 'Test111wqww', 'scasdasdas', '2014-04-24', 'dasdasdasdsa', 'line animation.png');
INSERT INTO `tbl_events` VALUES(5, 'Keyur', 'jbnkdsjfbdsk', '2014-04-24', 'ldsbhfhkfd', '21-04-2014 09-39-20-AM.png');
INSERT INTO `tbl_events` VALUES(6, 'KeyurTest', 'KeyurTest', '2014-04-24', 'Ahmedabad', 'line animation2.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participant`
--

CREATE TABLE `tbl_participant` (
  `participantId` bigint(30) NOT NULL AUTO_INCREMENT,
  `eventId` bigint(30) NOT NULL,
  `participantName` text NOT NULL,
  `participantEmail` text NOT NULL,
  `participantPhone` text NOT NULL,
  PRIMARY KEY (`participantId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_participant`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` bigint(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` VALUES(1, 'admin', 'admin');
