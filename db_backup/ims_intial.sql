-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.9 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for ims
CREATE DATABASE IF NOT EXISTS `ims` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ims`;


-- Dumping structure for table ims.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `Sno` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table ims.admin: 0 rows
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`Sno`) VALUES
	(1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


-- Dumping structure for table ims.intern_classification
CREATE TABLE IF NOT EXISTS `intern_classification` (
  `classification_no` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table ims.intern_classification: 0 rows
DELETE FROM `intern_classification`;
/*!40000 ALTER TABLE `intern_classification` DISABLE KEYS */;
/*!40000 ALTER TABLE `intern_classification` ENABLE KEYS */;


-- Dumping structure for table ims.intern_information
CREATE TABLE IF NOT EXISTS `intern_information` (
  `sno` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table ims.intern_information: 0 rows
DELETE FROM `intern_information`;
/*!40000 ALTER TABLE `intern_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `intern_information` ENABLE KEYS */;


-- Dumping structure for table ims.student_details
CREATE TABLE IF NOT EXISTS `student_details` (
  `sno` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table ims.student_details: 0 rows
DELETE FROM `student_details`;
/*!40000 ALTER TABLE `student_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_details` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
