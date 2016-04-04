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
  `Internship_Status` varchar(50) DEFAULT NULL,
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
  `idStudent_WrkExperience` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` varchar(50) NOT NULL,
  `WrkExp1_Company` varchar(45) DEFAULT NULL,
  `WrkExp1_FromDate` date DEFAULT NULL,
  `WrkExp1_TillDate` date DEFAULT NULL,
  `WrkExp1_Title` varchar(45) DEFAULT NULL,
  `WrkExp1_Duties` varchar(45) DEFAULT NULL,
  `WrkExp1_Duration` float DEFAULT NULL,
  `WrkExp2_Company` varchar(45) DEFAULT NULL,
  `WrkExp2_FromDate` date DEFAULT NULL,
  `WrkExp2_TillDate` date DEFAULT NULL,
  `WrkExp2_Title` varchar(45) DEFAULT NULL,
  `WrkExp2_Duties` varchar(45) DEFAULT NULL,
  `WrkExp2_Duration` float DEFAULT NULL,
  `WrkExp3_Company` varchar(45) DEFAULT NULL,
  `WrkExp3_FromDate` date DEFAULT NULL,
  `WrkExp3_TillDate` date DEFAULT NULL,
  `WrkExp3_Title` varchar(45) DEFAULT NULL,
  `WrkExp3_Duties` varchar(45) DEFAULT NULL,
  `WrkExp3_Duration` float DEFAULT NULL,
  `WrkExp4_Company` varchar(45) DEFAULT NULL,
  `WrkExp4_FromDate` date DEFAULT NULL,
  `WrkExp4_TillDate` date DEFAULT NULL,
  `WrkExp4_Title` varchar(45) DEFAULT NULL,
  `WrkExp4_Duties` varchar(45) DEFAULT NULL,
  `WrkExp4_Duration` float DEFAULT NULL,
  PRIMARY KEY (`idStudent_WrkExperience`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.preinternship_wrkexperience: ~1 rows (approximately)
DELETE FROM `preinternship_wrkexperience`;
/*!40000 ALTER TABLE `preinternship_wrkexperience` DISABLE KEYS */;
INSERT INTO `preinternship_wrkexperience` (`idStudent_WrkExperience`, `idStudent`, `WrkExp1_Company`, `WrkExp1_FromDate`, `WrkExp1_TillDate`, `WrkExp1_Title`, `WrkExp1_Duties`, `WrkExp1_Duration`, `WrkExp2_Company`, `WrkExp2_FromDate`, `WrkExp2_TillDate`, `WrkExp2_Title`, `WrkExp2_Duties`, `WrkExp2_Duration`, `WrkExp3_Company`, `WrkExp3_FromDate`, `WrkExp3_TillDate`, `WrkExp3_Title`, `WrkExp3_Duties`, `WrkExp3_Duration`, `WrkExp4_Company`, `WrkExp4_FromDate`, `WrkExp4_TillDate`, `WrkExp4_Title`, `WrkExp4_Duties`, `WrkExp4_Duration`) VALUES
	(1, '104409884', 'Accenture', '2013-02-01', '2015-08-01', 'SW Dev', 'Web Dev', 0, '', NULL, NULL, '', '', 0, '', NULL, NULL, '', '', 0, '', NULL, NULL, '', '', 0);
/*!40000 ALTER TABLE `preinternship_wrkexperience` ENABLE KEYS */;


-- Dumping structure for table ims.skillset_lookup
CREATE TABLE IF NOT EXISTS `skillset_lookup` (
  `id_skill` int(11) NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(50) DEFAULT NULL,
  `skill_category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_skill`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.skillset_lookup: 44 rows
DELETE FROM `skillset_lookup`;
/*!40000 ALTER TABLE `skillset_lookup` DISABLE KEYS */;
INSERT INTO `skillset_lookup` (`id_skill`, `skill_name`, `skill_category`) VALUES
	(1, 'ASP.NET', 'Technical'),
	(2, 'C', 'Technical'),
	(3, 'C++', 'Technical'),
	(4, 'C#', 'Technical'),
	(5, 'Flex', 'Technical'),
	(6, 'Java', 'Technical'),
	(7, 'JavaScript', 'Technical'),
	(8, 'LISP', 'Technical'),
	(9, 'Matlab', 'Technical'),
	(10, 'MySQL', 'Technical'),
	(11, 'Objective-C', 'Technical'),
	(12, 'Pascal', 'Technical'),
	(13, 'Perl', 'Technical'),
	(14, 'PHP', 'Technical'),
	(15, 'Prolog', 'Technical'),
	(16, 'Python', 'Technical'),
	(17, 'R', 'Technical'),
	(18, 'Ruby', 'Technical'),
	(19, 'SQL-Oracle', 'Technical'),
	(20, 'Tcl', 'Technical'),
	(21, 'T-SQL', 'Technical'),
	(22, 'VB.NET', 'Technical'),
	(23, 'Concrete5', 'CMS'),
	(24, 'DotNetNuke', 'CMS'),
	(25, 'Drupal', 'CMS'),
	(26, 'Joomla', 'CMS'),
	(27, 'Wordpress', 'CMS'),
	(28, 'Android', 'OS'),
	(29, 'Chrome OS', 'OS'),
	(30, 'iOS', 'OS'),
	(31, 'Linux', 'OS'),
	(32, 'MAC OS', 'OS'),
	(33, 'Unix', 'OS'),
	(34, 'Windows', 'OS'),
	(38, 'Science', 'Technical'),
	(37, 'Data', 'Technical'),
	(39, 'as', 'Technical'),
	(40, 'asd', 'CMS'),
	(41, 'qwe', 'Technical'),
	(42, 'q', 'CMS'),
	(43, 'wert', 'OS'),
	(44, 'AJAX', 'Technical'),
	(45, 'Joom', 'CMS'),
	(46, 'Ubuntu', 'OS');
/*!40000 ALTER TABLE `skillset_lookup` ENABLE KEYS */;


-- Dumping structure for table ims.student_certdetails
CREATE TABLE IF NOT EXISTS `student_certdetails` (
  `idStudent_CertificationEntry` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` varchar(50) NOT NULL DEFAULT '0',
  `EduDetails_Cert1Title` varchar(45) DEFAULT NULL,
  `EduDetails_Cert1Body` varchar(50) DEFAULT NULL,
  `EduDetails_Cert1IssuedDate` year(4) DEFAULT NULL,
  `EduDetails_Cert1ValidityDate` year(4) DEFAULT NULL,
  `EduDetails_Cert2Title` varchar(45) DEFAULT NULL,
  `EduDetails_Cert2Body` varchar(50) DEFAULT NULL,
  `EduDetails_Cert2IssuedDate` year(4) DEFAULT NULL,
  `EduDetails_Cert2ValidityDate` year(4) DEFAULT NULL,
  `EduDetails_Cert3Title` varchar(45) DEFAULT NULL,
  `EduDetails_Cert3Body` varchar(50) DEFAULT NULL,
  `EduDetails_Cert3IssuedDate` year(4) DEFAULT NULL,
  `EduDetails_Cert3ValidityDate` year(4) DEFAULT NULL,
  PRIMARY KEY (`idStudent_CertificationEntry`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ims.student_certdetails: ~1 rows (approximately)
DELETE FROM `student_certdetails`;
/*!40000 ALTER TABLE `student_certdetails` DISABLE KEYS */;
INSERT INTO `student_certdetails` (`idStudent_CertificationEntry`, `idStudent`, `EduDetails_Cert1Title`, `EduDetails_Cert1Body`, `EduDetails_Cert1IssuedDate`, `EduDetails_Cert1ValidityDate`, `EduDetails_Cert2Title`, `EduDetails_Cert2Body`, `EduDetails_Cert2IssuedDate`, `EduDetails_Cert2ValidityDate`, `EduDetails_Cert3Title`, `EduDetails_Cert3Body`, `EduDetails_Cert3IssuedDate`, `EduDetails_Cert3ValidityDate`) VALUES
	(3, '104409884', 'DBA', 'Oracle', '2015', '2017', '', '', NULL, NULL, '', '', NULL, NULL);
/*!40000 ALTER TABLE `student_certdetails` ENABLE KEYS */;


-- Dumping structure for table ims.student_details
CREATE TABLE IF NOT EXISTS `student_details` (
  `idStudent` varchar(50) NOT NULL,
  `Student_FName` varchar(45) DEFAULT NULL,
  `Student_MName` varchar(45) DEFAULT NULL,
  `Student_LName` varchar(45) DEFAULT NULL,
  `Student_Email` varchar(45) DEFAULT NULL,
  `Student_RegisteredSemester` varchar(50) DEFAULT NULL,
  `Student_RegisteredYear` varchar(50) DEFAULT NULL,
  `Student_Degree` varchar(45) DEFAULT NULL,
  `Student_Phonenum` varchar(45) DEFAULT NULL,
  `Student_Gender` varchar(45) DEFAULT NULL,
  `Student_Status` varchar(45) DEFAULT NULL,
  `idStudent_EducationEntry` int(11) NOT NULL,
  `idStudent_CertificationEntry` int(11) NOT NULL,
  `idStudent_WrkExperience` int(11) NOT NULL,
  `idStudent_Skillset` int(11) NOT NULL,
  PRIMARY KEY (`idStudent`),
  KEY `FK_student_details_student_edudetails` (`idStudent_EducationEntry`),
  KEY `FK_student_details_student_certdetails` (`idStudent_CertificationEntry`),
  KEY `FK_student_details_student_skillsetdetails` (`idStudent_Skillset`),
  KEY `FK_student_details_student_wrkexpdetails` (`idStudent_WrkExperience`),
  CONSTRAINT `FK_student_details_student_certdetails` FOREIGN KEY (`idStudent_CertificationEntry`) REFERENCES `student_certdetails` (`idStudent_CertificationEntry`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_student_details_student_edudetails` FOREIGN KEY (`idStudent_EducationEntry`) REFERENCES `student_edudetails` (`idStudent_EducationEntry`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_student_details_student_wrkexpdetails` FOREIGN KEY (`idStudent_WrkExperience`) REFERENCES `preinternship_wrkexperience` (`idStudent_WrkExperience`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ims.student_details: ~1 rows (approximately)
DELETE FROM `student_details`;
/*!40000 ALTER TABLE `student_details` DISABLE KEYS */;
INSERT INTO `student_details` (`idStudent`, `Student_FName`, `Student_MName`, `Student_LName`, `Student_Email`, `Student_RegisteredSemester`, `Student_RegisteredYear`, `Student_Degree`, `Student_Phonenum`, `Student_Gender`, `Student_Status`, `idStudent_EducationEntry`, `idStudent_CertificationEntry`, `idStudent_WrkExperience`, `idStudent_Skillset`) VALUES
	('104409884', 'Saravanan', NULL, 'Mani', 'manis@uwindsor.ca', 'fall', '2016', 'MAC', '2262468944', 'Male', 'international_student', 3, 3, 1, 2);
/*!40000 ALTER TABLE `student_details` ENABLE KEYS */;


-- Dumping structure for table ims.student_edudetails
CREATE TABLE IF NOT EXISTS `student_edudetails` (
  `idStudent_EducationEntry` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` varchar(50) NOT NULL DEFAULT '0',
  `EduDetails_UnderGradMajor` varchar(45) DEFAULT NULL,
  `EduDetails_UnderGradDegree` varchar(50) DEFAULT NULL,
  `EduDetails_UnderGradGPA` float DEFAULT NULL,
  `EduDetails_UnderGradUniversity` varchar(45) DEFAULT NULL,
  `EduDetails_UnderGradCountry` varchar(50) DEFAULT NULL,
  `EduDetails_UnderGradDate` date DEFAULT NULL,
  `EduDetails_GradMajor` varchar(45) DEFAULT NULL,
  `EduDetails_GradDegree` varchar(50) DEFAULT NULL,
  `EduDetails_GradGPA` float DEFAULT NULL,
  `EduDetails_GradUniversity` varchar(45) DEFAULT NULL,
  `EduDetails_GradCountry` varchar(50) DEFAULT NULL,
  `EduDetails_GradDate` date DEFAULT NULL,
  `EduDetails_Other1Name` varchar(45) DEFAULT NULL,
  `EduDetails_Other1Major` varchar(45) DEFAULT NULL,
  `EduDetails_Other1Degree` varchar(50) DEFAULT NULL,
  `EduDetails_Other1GPA` float DEFAULT NULL,
  `EduDetails_Other1University` varchar(45) DEFAULT NULL,
  `EduDetails_Other1Country` varchar(50) DEFAULT NULL,
  `EduDetails_Other1Date` date DEFAULT NULL,
  `EduDetails_Other2Name` varchar(45) DEFAULT NULL,
  `EduDetails_Other2Major` varchar(45) DEFAULT NULL,
  `EduDetails_Other2Degree` varchar(50) DEFAULT NULL,
  `EduDetails_Other2GPA` float DEFAULT NULL,
  `EduDetails_Other2University` varchar(45) DEFAULT NULL,
  `EduDetails_Other2Country` varchar(50) DEFAULT NULL,
  `EduDetails_Other2Date` date DEFAULT NULL,
  PRIMARY KEY (`idStudent_EducationEntry`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.student_edudetails: ~0 rows (approximately)
DELETE FROM `student_edudetails`;
/*!40000 ALTER TABLE `student_edudetails` DISABLE KEYS */;
INSERT INTO `student_edudetails` (`idStudent_EducationEntry`, `idStudent`, `EduDetails_UnderGradMajor`, `EduDetails_UnderGradDegree`, `EduDetails_UnderGradGPA`, `EduDetails_UnderGradUniversity`, `EduDetails_UnderGradCountry`, `EduDetails_UnderGradDate`, `EduDetails_GradMajor`, `EduDetails_GradDegree`, `EduDetails_GradGPA`, `EduDetails_GradUniversity`, `EduDetails_GradCountry`, `EduDetails_GradDate`, `EduDetails_Other1Name`, `EduDetails_Other1Major`, `EduDetails_Other1Degree`, `EduDetails_Other1GPA`, `EduDetails_Other1University`, `EduDetails_Other1Country`, `EduDetails_Other1Date`, `EduDetails_Other2Name`, `EduDetails_Other2Major`, `EduDetails_Other2Degree`, `EduDetails_Other2GPA`, `EduDetails_Other2University`, `EduDetails_Other2Country`, `EduDetails_Other2Date`) VALUES
	(3, '104409884', 'CSci', 'UnderGraduate', 8, 'Univ of Windsor', 'Canada', '2015-08-01', '', 'Graduate', 0, '', '', NULL, '', '', NULL, 0, '', '', NULL, '', '', NULL, 0, '', '', NULL);
/*!40000 ALTER TABLE `student_edudetails` ENABLE KEYS */;


-- Dumping structure for table ims.student_skillset
CREATE TABLE IF NOT EXISTS `student_skillset` (
  `idStudent_Skillset` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` varchar(50) DEFAULT NULL,
  `skillset_linked` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idStudent_Skillset`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.student_skillset: 1 rows
DELETE FROM `student_skillset`;
/*!40000 ALTER TABLE `student_skillset` DISABLE KEYS */;
INSERT INTO `student_skillset` (`idStudent_Skillset`, `idStudent`, `skillset_linked`) VALUES
	(2, '104409884', '1,3,10,14,27,34,44,45,46');
/*!40000 ALTER TABLE `student_skillset` ENABLE KEYS */;


-- Dumping structure for table ims.user_details
CREATE TABLE IF NOT EXISTS `user_details` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `User_FName` varchar(45) DEFAULT NULL,
  `User_LName` varchar(45) DEFAULT NULL,
  `User_Name` varchar(45) DEFAULT NULL,
  `User_Level` enum('Admin','Student') DEFAULT NULL,
  `User_Email` varchar(45) DEFAULT NULL,
  `User_Phonenum` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.user_details: ~3 rows (approximately)
DELETE FROM `user_details`;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` (`idUser`, `User_FName`, `User_LName`, `User_Name`, `User_Level`, `User_Email`, `User_Phonenum`, `Password`) VALUES
	(1, 'Satish', 'Mani', 'satz91', 'Admin', 'satish_9104@yahoo.com', '2262468944', '3e17d95fe3bfcb0ebc4ac45b72385ccd'),
	(2, 'Gouwshik', 'Natarajan', 'gouwshik123', 'Admin', 'gouwshik@yahoo.co.in', NULL, NULL),
	(3, 'Vishwas', 'Gautam', 'vish11', 'Student', 'vishwas@yahoo.com', NULL, '628f73113fed40f40f030ed4cda3052b');
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;


-- Dumping structure for table ims.year_lookup
CREATE TABLE IF NOT EXISTS `year_lookup` (
  `idYear` int(11) NOT NULL AUTO_INCREMENT,
  `Year_val` year(4) DEFAULT NULL,
  PRIMARY KEY (`idYear`),
  UNIQUE KEY `Year_val` (`Year_val`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.year_lookup: 4 rows
DELETE FROM `year_lookup`;
/*!40000 ALTER TABLE `year_lookup` DISABLE KEYS */;
INSERT INTO `year_lookup` (`idYear`, `Year_val`) VALUES
	(1, '2016'),
	(2, '2015'),
	(3, '2014'),
	(4, '2013');
/*!40000 ALTER TABLE `year_lookup` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
