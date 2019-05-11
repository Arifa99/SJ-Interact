-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2019 at 08:01 PM
-- Server version: 5.5.18
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arilak`
--

-- --------------------------------------------------------

--
-- Table structure for table `ans`
--

CREATE TABLE IF NOT EXISTS `ans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `ans` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ans`
--

INSERT INTO `ans` (`id`, `qid`, `ans`) VALUES
(1, 2, 'Artificial Intelligence'),
(2, 2, 'machine learning'),
(3, 1, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chat` varchar(60) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `chat`, `date`, `uid`) VALUES
(13, 'hii', '2019-04-11 17:03:43', 'ari'),
(14, 'hello', '2019-04-11 17:03:53', 'admin'),
(15, 'hello', '2019-04-11 17:04:10', 'ari'),
(16, 'miss u', '2019-04-11 17:04:26', 'ari'),
(17, 'i also', '2019-04-11 17:04:34', 'admin'),
(18, 'how are u', '2019-04-11 17:04:49', 'ari'),
(19, 'i am fine', '2019-04-11 17:05:12', 'admin'),
(20, 'and u', '2019-04-11 17:06:49', 'admin'),
(21, 'bunny', '2019-04-11 17:11:18', 'ari'),
(22, 'and u', '2019-04-11 17:11:27', 'admin'),
(23, 'cat', '2019-04-11 17:11:48', 'admin'),
(24, 'hii', '2019-04-11 17:12:03', 'ari'),
(25, 'hello', '2019-04-11 17:12:25', 'admin'),
(26, 'hey', '2019-04-11 17:12:46', 'ari'),
(27, 'a/s', '2019-04-11 17:16:21', 'admin'),
(28, 'w/s', '2019-04-11 17:19:29', 'falak'),
(29, 'how are you', '2019-04-11 17:20:15', 'admin'),
(30, 'hey sifat', '2019-04-11 17:29:58', 'falak'),
(31, 'sifat is not here', '2019-04-11 17:30:43', 'admin'),
(32, 'hii', '2019-04-11 17:46:31', 'falak'),
(33, 'how are u', '2019-04-11 17:47:33', 'falak');

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE IF NOT EXISTS `online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `flag` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`id`, `name`, `flag`) VALUES
(1, 'admin', 'no'),
(3, 'ari', 'yes'),
(4, 'falak', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `ques`
--

CREATE TABLE IF NOT EXISTS `ques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ques` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ques`
--

INSERT INTO `ques` (`id`, `ques`) VALUES
(1, 'hiii'),
(2, 'what is A.I?');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'ari', 'admin'),
(3, 'falak', 'admin');
