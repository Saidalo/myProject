-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2017 at 01:27 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `author` varchar(123) NOT NULL,
  `content` varchar(131) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `content`) VALUES
(1, 'rfsdfsd', 'fesgdfsbdsfbgdsfb'),
(2, 'dgfshdsgfh', 'sdghdfghdfgh');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Project name',
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `description`) VALUES
(1, 'PHP', 'asdlafjadsasdfasdf\r\nasdf\r\nads\r\nfasd\r\nfadsf'),
(2, 'PYTHON', 'dfagjsflg sdfg\r\nsdfgsdfg\r\nsdfg'),
(3, 'FrontEnd', 'sdfadsfa\r\nsdfasdfa\r\nsdf\r\nasdfadfs'),
(4, 'BackEnd', 'dfdasfasdfasdfadsfadsfadsfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(123) NOT NULL AUTO_INCREMENT COMMENT 'Unique ticket code, added automatically',
  `name` varchar(255) NOT NULL COMMENT 'Ticket name',
  `description` text NOT NULL COMMENT 'Full ticket description',
  `project` int(123) NOT NULL COMMENT 'Ticket is bound to this Project',
  `status` enum('open','closed') NOT NULL COMMENT 'Ticket status (Open, Closed)',
  `priority` enum('critical','bug','feature','minor') NOT NULL COMMENT '(Critical, Bug, ‘Feature’, Minor)',
  `assignee` int(11) NOT NULL COMMENT 'User, who is assigned to this ticket',
  `created_date` int(11) NOT NULL COMMENT 'Ticket creation date',
  `updated_date` int(11) NOT NULL COMMENT 'When ticket was updated',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `name`, `description`, `project`, `status`, `priority`, `assignee`, `created_date`, `updated_date`) VALUES
(1, 'blabla', 'asdhasdklja\'sdfkaf\\adsf\\adsf\\dasfad\r\nsf\r\nadsf\r\nadsf\r\nasd\r\nfad\r\nsf\r\nadsf\r\nasd\r\nfa\r\nsdf\r\nasdf', 1, 'open', 'bug', 1, 1507634559, 1507634580),
(2, 'asss', 'afasdfasdfasdfadsfasdf', 2, 'open', 'critical', 1, 1507639355, 1507639455),
(3, 'asss', 'afasdfasdfasdfadsfasdf', 2, 'open', 'critical', 1, 1507639356, 1507639455);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `Username` varchar(123) NOT NULL COMMENT 'Unique user name',
  `Name` varchar(255) NOT NULL COMMENT 'User real name',
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Username`, `Name`, `Password`) VALUES
(1, 'said', 'Saidalo', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
