-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2022 at 03:02 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gip`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `product` int(11) DEFAULT NULL COMMENT 'tblproduct(id)',
  `dag` varchar(20) DEFAULT NULL COMMENT 'maandag/dinsdag etc.'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`product`, `dag`) VALUES
(2, 'Monday'),
(2, 'Thursday'),
(3, 'Thursday'),
(1, 'Monday'),
(4, 'Friday'),
(5, 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `tblgebruikers`
--

DROP TABLE IF EXISTS `tblgebruikers`;
CREATE TABLE IF NOT EXISTS `tblgebruikers` (
  `volgnummer` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(30) DEFAULT NULL,
  `voornaam` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `wachtwoord` varchar(70) DEFAULT NULL,
  `gsmnummer` int(11) DEFAULT '0',
  `admin` tinyint(1) DEFAULT '0',
  `subscribed` tinyint(1) DEFAULT '0',
  `profielFoto` text,
  PRIMARY KEY (`volgnummer`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgebruikers`
--

INSERT INTO `tblgebruikers` (`volgnummer`, `naam`, `voornaam`, `email`, `wachtwoord`, `gsmnummer`, `admin`, `subscribed`, `profielFoto`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'root', NULL, 1, NULL, NULL),
(2, 'moons', 'ruben', 'ruben@moons.com', 'abc', NULL, 0, NULL, NULL),
(3, 'admin', 'admin', 'admin@admin.com', 'admin', NULL, 1, NULL, NULL),
(20, 'Moons', 'Ruben', 'rubenmoons2004@gmail.com', 'abc', 475532744, 0, 1, 'Dabatby.jpg'),
(17, '\"#', 'Â§Ã¨\"Â§Ã¨', '!%@xn--qda.com', '&&&&', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naamproduct` varchar(80) DEFAULT NULL,
  `descriptie` varchar(200) DEFAULT NULL,
  `prijs` double DEFAULT NULL,
  `sectie` varchar(40) DEFAULT NULL COMMENT 'drinks/lunch/maaltijd/desert',
  `foto` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `naamproduct`, `descriptie`, `prijs`, `sectie`, `foto`) VALUES
(1, 'test', 'lekkere hamburger gij weet', 3.99, 'maaltijd', 'blog-img-05.jpg'),
(2, 'melk', 'Lekkere zuiver magere melk.', 1.99, 'drinks', 'foto.jpg'),
(3, 'pizza', 'Hawai pizza met ananas etc.', 9.99, 'maaltijd', 'fatty.jpg'),
(5, 'banaan', 'geel ding', 0.99, 'drinks', 'banaan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblwinkelwagen`
--

DROP TABLE IF EXISTS `tblwinkelwagen`;
CREATE TABLE IF NOT EXISTS `tblwinkelwagen` (
  `nr` int(11) DEFAULT NULL COMMENT 'tblgebruikers(volgnummer)',
  `productid` int(11) DEFAULT NULL COMMENT 'tblproduct(id)',
  `quantiteit` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblwinkelwagen`
--

INSERT INTO `tblwinkelwagen` (`nr`, `productid`, `quantiteit`) VALUES
(20, 1, 4),
(20, 2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
