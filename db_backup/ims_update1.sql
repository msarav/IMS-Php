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


-- Dumping structure for table ims.available_interndetails
CREATE TABLE IF NOT EXISTS `available_interndetails` (
  `id_availableinterndetails` int(11) NOT NULL AUTO_INCREMENT,
  `intern_type` int(11) DEFAULT NULL,
  `intern_payment` varchar(50) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `company_addr_doorno` varchar(50) DEFAULT NULL,
  `company_addr_city` varchar(50) DEFAULT NULL,
  `company_addr_postalcode` varchar(50) DEFAULT NULL,
  `org_phonenum` varchar(50) DEFAULT NULL,
  `org_website` varchar(50) DEFAULT NULL,
  `poc_fname` varchar(50) DEFAULT NULL,
  `poc_lname` varchar(50) DEFAULT NULL,
  `poc_email` varchar(50) DEFAULT NULL,
  `poc_position` varchar(50) DEFAULT NULL,
  `intern_position` varchar(50) DEFAULT NULL,
  `intern_jobgroup` int(11) DEFAULT NULL,
  `job_desc` varchar(500) DEFAULT NULL,
  `job_responsibility` varchar(500) DEFAULT NULL,
  `intern_reqmnts` varchar(500) DEFAULT NULL,
  `intern_notes` varchar(500) DEFAULT NULL,
  `intern_updated_date` date DEFAULT NULL,
  PRIMARY KEY (`id_availableinterndetails`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.available_interndetails: ~2 rows (approximately)
DELETE FROM `available_interndetails`;
/*!40000 ALTER TABLE `available_interndetails` DISABLE KEYS */;
INSERT INTO `available_interndetails` (`id_availableinterndetails`, `intern_type`, `intern_payment`, `company_name`, `company_addr_doorno`, `company_addr_city`, `company_addr_postalcode`, `org_phonenum`, `org_website`, `poc_fname`, `poc_lname`, `poc_email`, `poc_position`, `intern_position`, `intern_jobgroup`, `job_desc`, `job_responsibility`, `intern_reqmnts`, `intern_notes`, `intern_updated_date`) VALUES
	(11, 1, 'Paid', 'IBM', '920 California', 'Windsor', 'N9B2Z6', '2262468779', 'www.IBM.com', 'satz', 'm', 'satz@gmail.com', 'Consultant', 'Web Dev', 2, '', '', '', '', '2016-04-08'),
	(12, 1, 'Paid', 'Test Solutions', '1920 Toronto', 'Toronto', 'N9B27F', '', '', '', '', '', '', 'Tester', 6, '', '', '', '', '2016-04-08');
/*!40000 ALTER TABLE `available_interndetails` ENABLE KEYS */;


-- Dumping structure for table ims.country_lookup
CREATE TABLE IF NOT EXISTS `country_lookup` (
  `idCountry` int(11) NOT NULL AUTO_INCREMENT,
  `Country_val` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCountry`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.country_lookup: ~3 rows (approximately)
DELETE FROM `country_lookup`;
/*!40000 ALTER TABLE `country_lookup` DISABLE KEYS */;
INSERT INTO `country_lookup` (`idCountry`, `Country_val`) VALUES
	(1, 'India'),
	(2, 'Canada'),
	(3, 'China'),
	(4, 'Namibia');
/*!40000 ALTER TABLE `country_lookup` ENABLE KEYS */;


-- Dumping structure for table ims.internjobgroup_lookup
CREATE TABLE IF NOT EXISTS `internjobgroup_lookup` (
  `idInternPositions_Lookup` int(11) NOT NULL AUTO_INCREMENT,
  `JobGroup_Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idInternPositions_Lookup`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.internjobgroup_lookup: ~10 rows (approximately)
DELETE FROM `internjobgroup_lookup`;
/*!40000 ALTER TABLE `internjobgroup_lookup` DISABLE KEYS */;
INSERT INTO `internjobgroup_lookup` (`idInternPositions_Lookup`, `JobGroup_Name`) VALUES
	(1, 'Web Development'),
	(2, 'Mobile Development'),
	(3, 'System Development'),
	(4, 'Technical Support'),
	(5, 'Networking'),
	(6, 'Analysis'),
	(7, 'Testing'),
	(8, 'Security'),
	(9, 'Data Management'),
	(10, 'Other');
/*!40000 ALTER TABLE `internjobgroup_lookup` ENABLE KEYS */;


-- Dumping structure for table ims.interntype_lookup
CREATE TABLE IF NOT EXISTS `interntype_lookup` (
  `id_interntype` int(11) NOT NULL AUTO_INCREMENT,
  `Intern_Type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_interntype`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.interntype_lookup: ~5 rows (approximately)
DELETE FROM `interntype_lookup`;
/*!40000 ALTER TABLE `interntype_lookup` DISABLE KEYS */;
INSERT INTO `interntype_lookup` (`id_interntype`, `Intern_Type`) VALUES
	(1, 'Company'),
	(2, 'Startup Company'),
	(3, 'Research Project'),
	(4, 'MAC Project'),
	(5, 'Other');
/*!40000 ALTER TABLE `interntype_lookup` ENABLE KEYS */;


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


-- Dumping structure for table ims.intern_interested_students
CREATE TABLE IF NOT EXISTS `intern_interested_students` (
  `id_intern_interested_students` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(50) DEFAULT NULL,
  `id_available_interndetails` int(11) DEFAULT NULL,
  `availability_tag` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_intern_interested_students`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.intern_interested_students: 2 rows
DELETE FROM `intern_interested_students`;
/*!40000 ALTER TABLE `intern_interested_students` DISABLE KEYS */;
/*!40000 ALTER TABLE `intern_interested_students` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.preinternship_wrkexperience: ~2 rows (approximately)
DELETE FROM `preinternship_wrkexperience`;
/*!40000 ALTER TABLE `preinternship_wrkexperience` DISABLE KEYS */;
INSERT INTO `preinternship_wrkexperience` (`idStudent_WrkExperience`, `idStudent`, `WrkExp1_Company`, `WrkExp1_FromDate`, `WrkExp1_TillDate`, `WrkExp1_Title`, `WrkExp1_Duties`, `WrkExp1_Duration`, `WrkExp2_Company`, `WrkExp2_FromDate`, `WrkExp2_TillDate`, `WrkExp2_Title`, `WrkExp2_Duties`, `WrkExp2_Duration`, `WrkExp3_Company`, `WrkExp3_FromDate`, `WrkExp3_TillDate`, `WrkExp3_Title`, `WrkExp3_Duties`, `WrkExp3_Duration`, `WrkExp4_Company`, `WrkExp4_FromDate`, `WrkExp4_TillDate`, `WrkExp4_Title`, `WrkExp4_Duties`, `WrkExp4_Duration`) VALUES
	(3, '104409884', 'ACN', '2013-02-01', '2015-08-01', 'SW Engineer', 'Web Developmenent', 30, '', NULL, NULL, '', '', 0, '', NULL, NULL, '', '', 0, '', NULL, NULL, '', '', 0),
	(4, '104409885', '', NULL, NULL, '', '', 0, '', NULL, NULL, '', '', 0, '', NULL, NULL, '', '', 0, '', NULL, NULL, '', '', 0);
/*!40000 ALTER TABLE `preinternship_wrkexperience` ENABLE KEYS */;


-- Dumping structure for table ims.skillset_lookup
CREATE TABLE IF NOT EXISTS `skillset_lookup` (
  `id_skill` int(11) NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(50) DEFAULT NULL,
  `skill_category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_skill`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.skillset_lookup: ~45 rows (approximately)
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
	(37, 'Data', 'Technical'),
	(38, 'Science', 'Technical'),
	(39, 'as', 'Technical'),
	(40, 'asd', 'CMS'),
	(41, 'qwe', 'Technical'),
	(42, 'q', 'CMS'),
	(43, 'wert', 'OS'),
	(44, 'AJAX', 'Technical'),
	(45, 'Joom', 'CMS'),
	(46, 'Ubuntu', 'OS'),
	(47, 'Data Analysis', 'Technical'),
	(48, 'HTML', 'Technical'),
	(49, 'Win', 'OS');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table ims.student_certdetails: ~1 rows (approximately)
DELETE FROM `student_certdetails`;
/*!40000 ALTER TABLE `student_certdetails` DISABLE KEYS */;
INSERT INTO `student_certdetails` (`idStudent_CertificationEntry`, `idStudent`, `EduDetails_Cert1Title`, `EduDetails_Cert1Body`, `EduDetails_Cert1IssuedDate`, `EduDetails_Cert1ValidityDate`, `EduDetails_Cert2Title`, `EduDetails_Cert2Body`, `EduDetails_Cert2IssuedDate`, `EduDetails_Cert2ValidityDate`, `EduDetails_Cert3Title`, `EduDetails_Cert3Body`, `EduDetails_Cert3IssuedDate`, `EduDetails_Cert3ValidityDate`) VALUES
	(5, '104409884', 'DBA', 'Oracle', '2013', '2015', '', '', NULL, NULL, '', '', NULL, NULL),
	(6, '104409885', 'Java Developer', 'Oracle', '2015', '2016', '', '', NULL, NULL, '', '', NULL, NULL);
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
  `Student_Country` varchar(50) DEFAULT NULL,
  `Student_Degree` varchar(45) DEFAULT NULL,
  `Student_Phonenum` varchar(45) DEFAULT NULL,
  `Student_Gender` varchar(45) DEFAULT NULL,
  `Student_Status` varchar(45) DEFAULT NULL,
  `idStudent_EducationEntry` int(11) NOT NULL,
  `idStudent_CertificationEntry` int(11) NOT NULL,
  `idStudent_WrkExperience` int(11) NOT NULL,
  `idStudent_Skillset` int(11) NOT NULL,
  `Intern_position_id` int(11) DEFAULT NULL,
  `Updated_date` date DEFAULT NULL,
  PRIMARY KEY (`idStudent`),
  KEY `FK_student_details_student_edudetails` (`idStudent_EducationEntry`),
  KEY `FK_student_details_student_certdetails` (`idStudent_CertificationEntry`),
  KEY `FK_student_details_student_skillsetdetails` (`idStudent_Skillset`),
  KEY `FK_student_details_student_wrkexpdetails` (`idStudent_WrkExperience`),
  CONSTRAINT `FK_student_details_student_certdetails` FOREIGN KEY (`idStudent_CertificationEntry`) REFERENCES `student_certdetails` (`idStudent_CertificationEntry`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_student_details_student_edudetails` FOREIGN KEY (`idStudent_EducationEntry`) REFERENCES `student_edudetails` (`idStudent_EducationEntry`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_student_details_student_wrkexpdetails` FOREIGN KEY (`idStudent_WrkExperience`) REFERENCES `preinternship_wrkexperience` (`idStudent_WrkExperience`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ims.student_details: ~2 rows (approximately)
DELETE FROM `student_details`;
/*!40000 ALTER TABLE `student_details` DISABLE KEYS */;
INSERT INTO `student_details` (`idStudent`, `Student_FName`, `Student_MName`, `Student_LName`, `Student_Email`, `Student_RegisteredSemester`, `Student_RegisteredYear`, `Student_Country`, `Student_Degree`, `Student_Phonenum`, `Student_Gender`, `Student_Status`, `idStudent_EducationEntry`, `idStudent_CertificationEntry`, `idStudent_WrkExperience`, `idStudent_Skillset`, `Intern_position_id`, `Updated_date`) VALUES
	('104409884', 'Satish', NULL, 'Mani', 'satish_9104@yahoo.com', 'Fall', '2016', 'India', 'MAC', '2262468944', 'Male', 'International_student', 5, 5, 3, 4, NULL, '2016-04-10'),
	('104409885', 'Vishwas', NULL, 'Gautam', 'vish123@uwindsor.ca', 'Fall', '2016', 'Canada', 'MAC', '2262468955', 'Male', 'International_student', 6, 6, 4, 5, NULL, '2016-04-10');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.student_edudetails: ~0 rows (approximately)
DELETE FROM `student_edudetails`;
/*!40000 ALTER TABLE `student_edudetails` DISABLE KEYS */;
INSERT INTO `student_edudetails` (`idStudent_EducationEntry`, `idStudent`, `EduDetails_UnderGradMajor`, `EduDetails_UnderGradDegree`, `EduDetails_UnderGradGPA`, `EduDetails_UnderGradUniversity`, `EduDetails_UnderGradCountry`, `EduDetails_UnderGradDate`, `EduDetails_GradMajor`, `EduDetails_GradDegree`, `EduDetails_GradGPA`, `EduDetails_GradUniversity`, `EduDetails_GradCountry`, `EduDetails_GradDate`, `EduDetails_Other1Name`, `EduDetails_Other1Major`, `EduDetails_Other1Degree`, `EduDetails_Other1GPA`, `EduDetails_Other1University`, `EduDetails_Other1Country`, `EduDetails_Other1Date`, `EduDetails_Other2Name`, `EduDetails_Other2Major`, `EduDetails_Other2Degree`, `EduDetails_Other2GPA`, `EduDetails_Other2University`, `EduDetails_Other2Country`, `EduDetails_Other2Date`) VALUES
	(5, '104409884', 'CSci', 'UnderGraduate', 8, 'Anna Univ', 'India', '2012-05-01', 'MAC', 'Graduate', 8, 'Univ of Windsor', 'Canada', '2012-05-01', '', '', NULL, 0, '', '', NULL, '', '', NULL, 0, '', '', NULL),
	(6, '104409885', 'CSci', 'UnderGraduate', 9, 'Punjab Univ', 'India', '2015-05-01', 'MAC', 'Graduate', 8, 'Univ of Windsor', 'Canada', '2015-05-01', '', '', NULL, 0, '', '', NULL, '', '', NULL, 0, '', '', NULL);
/*!40000 ALTER TABLE `student_edudetails` ENABLE KEYS */;


-- Dumping structure for table ims.student_skillset
CREATE TABLE IF NOT EXISTS `student_skillset` (
  `idStudent_Skillset` int(11) NOT NULL AUTO_INCREMENT,
  `idStudent` varchar(50) DEFAULT NULL,
  `skillset_linked` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idStudent_Skillset`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.student_skillset: ~2 rows (approximately)
DELETE FROM `student_skillset`;
/*!40000 ALTER TABLE `student_skillset` DISABLE KEYS */;
INSERT INTO `student_skillset` (`idStudent_Skillset`, `idStudent`, `skillset_linked`) VALUES
	(4, '104409884', '10,14,27,45,48'),
	(5, '104409885', '1,14,25,28');
/*!40000 ALTER TABLE `student_skillset` ENABLE KEYS */;


-- Dumping structure for table ims.user_details
CREATE TABLE IF NOT EXISTS `user_details` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `User_StudentId` varchar(50) DEFAULT NULL,
  `User_FName` varchar(45) DEFAULT NULL,
  `User_LName` varchar(45) DEFAULT NULL,
  `User_Name` varchar(45) DEFAULT NULL,
  `User_Level` enum('Admin','Student') DEFAULT NULL,
  `User_Email` varchar(45) DEFAULT NULL,
  `User_Phonenum` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.user_details: ~5 rows (approximately)
DELETE FROM `user_details`;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` (`idUser`, `User_StudentId`, `User_FName`, `User_LName`, `User_Name`, `User_Level`, `User_Email`, `User_Phonenum`, `Password`) VALUES
	(1, 'satish_9104@yahoo.com', 'Satish', 'Mani', 'satz91', 'Admin', 'satish_9104@yahoo.com', '2262468944', '3e17d95fe3bfcb0ebc4ac45b72385ccd'),
	(2, 'gouwshik@yahoo.co.in', 'Gouwshik', 'Natarajan', 'gouwshik123', 'Admin', 'gouwshik@yahoo.co.in', NULL, NULL),
	(3, '104409885', 'Vishwas', 'Gautam', 'vish11', 'Student', 'vish@uwindsor.ca', NULL, '628f73113fed40f40f030ed4cda3052b'),
	(4, '104409886', 'Gouwshik', 'Natarajan', 'gouwshik123', 'Student', 'gouwshik@yahoo.co.in', NULL, NULL),
	(5, '104409884', 'Satish', 'Mani', 'satz91', 'Student', 'satish_9104@yahoo.com', '2262468944', '3e17d95fe3bfcb0ebc4ac45b72385ccd');
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;


-- Dumping structure for table ims.year_lookup
CREATE TABLE IF NOT EXISTS `year_lookup` (
  `idYear` int(11) NOT NULL AUTO_INCREMENT,
  `Year_val` year(4) DEFAULT NULL,
  PRIMARY KEY (`idYear`),
  UNIQUE KEY `Year_val` (`Year_val`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ims.year_lookup: ~4 rows (approximately)
DELETE FROM `year_lookup`;
/*!40000 ALTER TABLE `year_lookup` DISABLE KEYS */;
INSERT INTO `year_lookup` (`idYear`, `Year_val`) VALUES
	(4, '2013'),
	(3, '2014'),
	(2, '2015'),
	(1, '2016');
/*!40000 ALTER TABLE `year_lookup` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
