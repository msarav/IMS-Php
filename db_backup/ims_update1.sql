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
CREATE DATABASE IF NOT EXISTS `ims` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ims`;


-- Dumping structure for table ims.internpositions_lookup
CREATE TABLE IF NOT EXISTS `internpositions_lookup` (
  `idInternPositions_Lookup` int(11) NOT NULL AUTO_INCREMENT,
  `InternPositions_Name` varchar(45) DEFAULT NULL,
  `InternPositions_Description` varchar(45) DEFAULT NULL,
  `InternPositions_AddtnlDesc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idInternPositions_Lookup`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.internpositions_lookup: ~8 rows (approximately)
DELETE FROM `internpositions_lookup`;
/*!40000 ALTER TABLE `internpositions_lookup` DISABLE KEYS */;
INSERT INTO `internpositions_lookup` (`idInternPositions_Lookup`, `InternPositions_Name`, `InternPositions_Description`, `InternPositions_AddtnlDesc`) VALUES
	(1, 'Web Development', NULL, NULL),
	(2, 'Mobile Development', NULL, NULL),
	(3, 'System Development', NULL, NULL),
	(4, 'Technical Support', NULL, NULL),
	(5, 'Networking', NULL, NULL),
	(6, 'Analysis', NULL, NULL),
	(7, 'Testing', NULL, NULL),
	(8, 'Security', NULL, NULL),
	(9, 'Data Management', NULL, NULL),
	(10, 'Other', NULL, NULL);
/*!40000 ALTER TABLE `internpositions_lookup` ENABLE KEYS */;


-- Dumping structure for table ims.internship_details
CREATE TABLE IF NOT EXISTS `internship_details` (
  `idInternship_Details` int(11) NOT NULL,
  `InternDetails_CompanyName` varchar(45) DEFAULT NULL,
  `InternDetails_Position` varchar(45) DEFAULT NULL,
  `Internship_Notes` varchar(45) DEFAULT NULL,
  `InternDetails_PostalCode` varchar(45) DEFAULT NULL,
  `InternDetails_City` varchar(45) DEFAULT NULL,
  `InternDetails_Address` varchar(45) DEFAULT NULL,
  `InternDetails_POC_FName` varchar(45) DEFAULT NULL,
  `InternDetails_POC_LName` varchar(45) DEFAULT NULL,
  `InternDetails__POC_Position` varchar(45) DEFAULT NULL,
  `InternDetails_POC_Phonenum` varchar(45) DEFAULT NULL,
  `InternDetails_POC_Email` varchar(45) DEFAULT NULL,
  `InternDetails_CompanySiteLink` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idInternship_Details`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ims.internship_details: ~0 rows (approximately)
DELETE FROM `internship_details`;
/*!40000 ALTER TABLE `internship_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `internship_details` ENABLE KEYS */;


-- Dumping structure for table ims.intern_employers
CREATE TABLE IF NOT EXISTS `intern_employers` (
  `idIntern_Employers` int(11) NOT NULL AUTO_INCREMENT,
  `Intern_EmployerType` varchar(45) DEFAULT NULL,
  `Intern_EmployerDescription` varchar(45) DEFAULT NULL,
  `Intern_EmployerAddtnlDesc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idIntern_Employers`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.intern_employers: ~4 rows (approximately)
DELETE FROM `intern_employers`;
/*!40000 ALTER TABLE `intern_employers` DISABLE KEYS */;
INSERT INTO `intern_employers` (`idIntern_Employers`, `Intern_EmployerType`, `Intern_EmployerDescription`, `Intern_EmployerAddtnlDesc`) VALUES
	(1, 'Company', NULL, NULL),
	(2, 'Research Project', NULL, NULL),
	(3, 'MAC Compnay Group Project', NULL, NULL),
	(4, 'Start-up Company', NULL, NULL);
/*!40000 ALTER TABLE `intern_employers` ENABLE KEYS */;


-- Dumping structure for table ims.preinternship_wrkexperience
CREATE TABLE IF NOT EXISTS `preinternship_wrkexperience` (
  `idStudent_WrkExperience` int(11) NOT NULL,
  `WrkExp_Company` varchar(45) DEFAULT NULL,
  `WrkExp_Date` varchar(45) DEFAULT NULL,
  `WrkExp_Title` varchar(45) DEFAULT NULL,
  `WrkExp_Duties` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idStudent_WrkExperience`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ims.preinternship_wrkexperience: ~0 rows (approximately)
DELETE FROM `preinternship_wrkexperience`;
/*!40000 ALTER TABLE `preinternship_wrkexperience` DISABLE KEYS */;
/*!40000 ALTER TABLE `preinternship_wrkexperience` ENABLE KEYS */;


-- Dumping structure for table ims.student_details
CREATE TABLE IF NOT EXISTS `student_details` (
  `idStudent` int(11) NOT NULL,
  `Student_FName` varchar(45) DEFAULT NULL,
  `Student_MName` varchar(45) DEFAULT NULL,
  `Student_LName` varchar(45) DEFAULT NULL,
  `Student_Email` varchar(45) DEFAULT NULL,
  `Student_RegisteredSemester` varchar(50) DEFAULT NULL,
  `Student_Degree` varchar(45) DEFAULT NULL,
  `Student_Phonenum` varchar(45) DEFAULT NULL,
  `Student_Gender` varchar(45) DEFAULT NULL,
  `Student_Status` varchar(45) DEFAULT NULL,
  `Student_EduDetails_idStudent_EducationEntry` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ims.student_details: ~0 rows (approximately)
DELETE FROM `student_details`;
/*!40000 ALTER TABLE `student_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_details` ENABLE KEYS */;


-- Dumping structure for table ims.student_edudetails
CREATE TABLE IF NOT EXISTS `student_edudetails` (
  `idStudent_EducationEntry` int(11) NOT NULL AUTO_INCREMENT,
  `Student_ID` varchar(45) DEFAULT NULL,
  `EduDetails_Degree` varchar(50) DEFAULT NULL,
  `EduDetails_DegreeLevel` enum('UG','G') DEFAULT NULL,
  `EduDetails_GPA` varchar(45) DEFAULT NULL,
  `EduDetails_University` varchar(45) DEFAULT NULL,
  `EduDetails_Country` varchar(50) DEFAULT NULL,
  `EduDetails_Date` date DEFAULT NULL,
  PRIMARY KEY (`idStudent_EducationEntry`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.student_edudetails: ~1 rows (approximately)
DELETE FROM `student_edudetails`;
/*!40000 ALTER TABLE `student_edudetails` DISABLE KEYS */;
INSERT INTO `student_edudetails` (`idStudent_EducationEntry`, `Student_ID`, `EduDetails_Degree`, `EduDetails_DegreeLevel`, `EduDetails_GPA`, `EduDetails_University`, `EduDetails_Country`, `EduDetails_Date`) VALUES
	(1, '104409884', 'Graduate', 'G', '8', 'University of Windsor', 'Canada', '2016-01-30');
/*!40000 ALTER TABLE `student_edudetails` ENABLE KEYS */;


-- Dumping structure for table ims.user_details
CREATE TABLE IF NOT EXISTS `user_details` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `User_FName` varchar(45) DEFAULT NULL,
  `User_LName` varchar(45) DEFAULT NULL,
  `User_Name` varchar(45) DEFAULT NULL,
  `User_Level` enum('Admin','EndUser') DEFAULT NULL,
  `User_Email` varchar(45) DEFAULT NULL,
  `User_Phonenum` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.user_details: ~3 rows (approximately)
DELETE FROM `user_details`;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` (`idUser`, `User_FName`, `User_LName`, `User_Name`, `User_Level`, `User_Email`, `User_Phonenum`) VALUES
	(1, 'Satish', 'Mani', 'satz91', 'Admin', 'satish_9104@yahoo.com', '2262468944'),
	(2, 'Gouwshik', 'Natarajan', 'gouwshik123', 'Admin', 'gouwshik@yahoo.co.in', NULL),
	(3, 'Vishwas', 'Gautam', 'vish11', 'EndUser', 'vishwas@yahoo.com', NULL);
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
