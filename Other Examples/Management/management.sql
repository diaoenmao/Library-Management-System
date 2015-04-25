-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-04-19 12:14:10
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `corporate`
--

-- --------------------------------------------------------

--
-- 表的结构 `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dname` varchar(10) NOT NULL,
  `dnumber` int(11) NOT NULL,
  `mgrssn` int(3) NOT NULL,
  `mgrstartdate` date NOT NULL,
  PRIMARY KEY (`dnumber`),
  UNIQUE KEY `mgrssn` (`mgrssn`),
  UNIQUE KEY `dnumber` (`dnumber`),
  FULLTEXT KEY `dname` (`dname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `department`
--

INSERT INTO `department` (`dname`, `dnumber`, `mgrssn`, `mgrstartdate`) VALUES
('abc', 123, 123, '2015-04-01');

-- --------------------------------------------------------

--
-- 表的结构 `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `ssn` int(9) NOT NULL,
  PRIMARY KEY (`ssn`),
  UNIQUE KEY `ssn` (`ssn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `employee`
--

INSERT INTO `employee` (`fname`, `lname`, `ssn`) VALUES
('Enmao', 'Diao', 123);

-- --------------------------------------------------------

--
-- 表的结构 `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `dnum` int(11) NOT NULL,
  `mgrssn` int(9) NOT NULL,
  `plocation` varchar(10) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `pid` (`pid`),
  UNIQUE KEY `mgrssn` (`mgrssn`),
  UNIQUE KEY `dnum` (`dnum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `project`
--

INSERT INTO `project` (`dnum`, `mgrssn`, `plocation`, `pid`) VALUES
(123, 123, 'Gatech', 1);
--
-- Database: `recipes`
--

-- --------------------------------------------------------

--
-- 表的结构 `recipe`
--

CREATE TABLE IF NOT EXISTS `recipe` (
  `RecipeID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Rating` int(11) NOT NULL,
  PRIMARY KEY (`RecipeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `recipe`
--

INSERT INTO `recipe` (`RecipeID`, `Name`, `Rating`) VALUES
(1, 'Sweet Potato Souffle', 4),
(2, 'Cheesy Grits', 3),
(3, 'Belgian Waffles', 3),
(4, 'abx', 4);
--
-- Database: `test`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
