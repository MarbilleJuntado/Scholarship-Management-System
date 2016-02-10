-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2016 at 08:40 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs192upsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(11) NOT NULL,
  `upMail` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `upMail`, `firstName`, `middleName`, `lastName`) VALUES
(1, 'admin1@up.edu.ph', 'Ruby', 'Von', 'Rails'),
(2, 'admin2@up.edu.ph', 'Sa', 'Shi', 'Mi');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `applicationID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `scholarshipID` int(11) NOT NULL,
  `appDate` date NOT NULL,
  `verifiedByAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`applicationID`, `studentID`, `scholarshipID`, `appDate`, `verifiedByAdmin`) VALUES
(1, 1, 1, '2016-02-10', 0),
(2, 2, 1, '2016-02-10', 0),
(3, 3, 2, '2016-02-10', 0),
(4, 7, 4, '2016-02-08', 0),
(5, 9, 5, '2016-02-06', 0),
(6, 9, 4, '2016-02-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `applicationform`
--

CREATE TABLE IF NOT EXISTS `applicationform` (
  `formID` int(11) NOT NULL,
  `scholarshipID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE IF NOT EXISTS `fields` (
  `fieldname` varchar(255) NOT NULL,
  `formID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

CREATE TABLE IF NOT EXISTS `scholarship` (
  `scholarshipID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `benefactor` varchar(255) NOT NULL,
  `appDeadline` date NOT NULL,
  `numofGrantees` int(11) NOT NULL,
  `signatoryOrder` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`scholarshipID`, `name`, `benefactor`, `appDeadline`, `numofGrantees`, `signatoryOrder`) VALUES
(1, 'COOPERATE', 'OIL', '2016-02-05', 5, ''),
(2, 'MOVE UP', 'OIL', '2016-02-05', 10, ''),
(3, 'Research/Creative Work Presentation in International Conferences', 'OIL', '2016-02-05', 6, ''),
(4, 'Hosting of International Conferences, Meetings, Workshops', 'OIL', '2016-02-05', 3, ''),
(5, 'World Experts Lecture Series', 'OIL', '2016-02-05', 15, '');

-- --------------------------------------------------------

--
-- Table structure for table `scholarshipsig`
--

CREATE TABLE IF NOT EXISTS `scholarshipsig` (
  `sigID` int(11) NOT NULL,
  `scholarshipID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `signatory`
--

CREATE TABLE IF NOT EXISTS `signatory` (
  `sigID` int(11) NOT NULL,
  `upMail` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signatory`
--

INSERT INTO `signatory` (`sigID`, `upMail`, `firstName`, `middleName`, `lastName`, `position`) VALUES
(1, 'rvazanza@up.edu.ph', 'Rhodora', 'V', 'Azanza', 'Assistant Vice-President for Academic Affairs and Director, OIL'),
(2, 'gpconcepcion@up.edu.ph', 'Gisela', 'P', 'Concepcion', 'Vice-President for Academic Affairs'),
(3, 'aepascual@up.edu.ph', 'Alfredo', 'E', 'Pascual', 'President'),
(4, 'acmatias@up.edu.ph', 'Aura', 'C', 'Matias', 'Dean, College of Engineering'),
(5, 'dlconcepcion@up.edu.ph', 'Danilo', 'L', 'Concepcion', 'Dean, College of Law'),
(6, 'jsbuenconsejo@up.edu.ph', 'Jose', 'S', 'Buenconsejo', 'Dean, College of Music'),
(7, 'mvmendoza@up.edu.ph', 'Maria Fe', 'Villamejor', 'Mendoza', 'Dean, National College of Public Administration and Governance'),
(8, 'jpsale@up.edu.ph', 'Jonathan', 'P', 'Sale', 'Dean, School of Labor and Industrial Relations'),
(9, 'kbobile@up.edu.ph', 'Kathleen Lourdes', 'B', 'Obile', 'Dean, School of Library and Information Studies'),
(10, 'ocsolon@up.edu.ph', 'Orville', 'C', 'Solon', 'Dean, School of Economics');

-- --------------------------------------------------------

--
-- Table structure for table `sigstatus`
--

CREATE TABLE IF NOT EXISTS `sigstatus` (
  `sigID` int(11) NOT NULL,
  `applicationID` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sigstatus`
--

INSERT INTO `sigstatus` (`sigID`, `applicationID`, `status`) VALUES
(1, 1, 1),
(1, 1, 1),
(1, 1, 1),
(1, 1, 1),
(1, 1, 1),
(1, 1, 1),
(1, 1, 1),
(1, 1, 1),
(4, 5, 1),
(3, 8, 1),
(1, 1, 1),
(1, 1, 0),
(1, 1, 1),
(1, 1, 0),
(1, 1, 1),
(1, 1, 0),
(1, 1, 1),
(1, 1, 0),
(5, 5, 1),
(5, 5, 0),
(5, 5, 1),
(5, 5, 0),
(5, 5, 1),
(5, 5, 0),
(5, 5, 1),
(5, 5, 0),
(9, 9, 1),
(9, 9, 0),
(9, 9, 1),
(9, 9, 0),
(9, 9, 1),
(9, 9, 0),
(9, 9, 1),
(9, 9, 0),
(3, 3, 1),
(3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `studentID` int(11) NOT NULL,
  `upMail` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthDate` date NOT NULL,
  `birthPlace` varchar(255) NOT NULL,
  `presStreetAddr` varchar(255) NOT NULL,
  `presMunBrgy` varchar(255) NOT NULL,
  `presProvCity` varchar(255) NOT NULL,
  `presRegion` varchar(255) NOT NULL,
  `permStreetAddr` varchar(255) NOT NULL,
  `permMunBrgy` varchar(255) NOT NULL,
  `permProvCity` varchar(255) NOT NULL,
  `permRegion` varchar(255) NOT NULL,
  `contactNo` int(20) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `upMail`, `firstName`, `middleName`, `lastName`, `nationality`, `gender`, `birthDate`, `birthPlace`, `presStreetAddr`, `presMunBrgy`, `presProvCity`, `presRegion`, `permStreetAddr`, `permMunBrgy`, `permProvCity`, `permRegion`, `contactNo`, `dept`, `college`) VALUES
(1, 'gggryffindor', 'Godric', 'G', 'Gryffindor', 'Filipino', 'Male', '1986-01-14', 'Manila', '123 ABC Street', 'DEF ', 'GHI City', 'JKL', 'same', 'same', 'same', 'same', 123456, 'Department of Computer Science ', 'College of Engineering '),
(2, 'ptregarde@up.edu.ph', 'Patricia Ann', 'Torres', 'Regarde', 'Filipino', 'Female', '1997-06-05', 'Manila', '6132 Osias Street', 'Poblacion', 'Makati City', 'NCR', 'same', 'same', 'same', 'same', 123456, 'Department of Computer Science ', 'College of Engineering'),
(3, 'hhhufflepuff@up.edu.ph', 'Helga', 'H', 'Hufflepuff', 'Filipino', 'Female', '1992-09-02', 'Manila', '123 ABC Street', 'DEF', 'GHI City', 'JKL', 'same', 'same', 'same', 'same', 123456, 'Department of Computer Science', 'College of Engineering'),
(4, 'rrravenclaw@up.edu.ph', 'Rowena', 'R', 'Ravenclaw', 'Filipino', 'Female', '1995-07-19', 'Manila', '123 ABC Street', 'DEF', 'GHI City', 'JKL', '456 MNO Street ', 'PQR', 'STU City', 'VWX', 1234567, 'Institute of Civil Engineering', 'College of Engineering'),
(5, 'ssslytherin@up.edu.ph', 'Salazar', 'S', 'Slytherin', 'Filipino', 'Male', '1986-06-28', 'Manila', '123 ABC Street', 'DEF', 'GHI City', 'JKL', 'same ', 'same', 'same', 'same', 123456, 'Electrical and Electronics Engineering Institute', 'College of Engineering'),
(6, 'ssnape@up.edu.ph', 'Severus', '', 'Snape', 'Filipino', 'Male', '1992-10-02', 'Manila', '123 ABC Street', 'DEF ', 'GHI City', 'JKL', 'same', 'same', 'same', 'same', 123456, 'Department of Industrial Engineering and Operations Research', 'College of Engineering'),
(7, 'nscamander@up.edu.ph', 'Newt', '', 'Scamander', 'Filipino', 'Male', '1995-07-19', 'Manila', '123 ABC Street', 'DEF ', 'GHI City', 'JKL', 'same', 'same', 'same', 'same', 1234567, 'Department of Industrial Engineering and Operations Research', 'College of Engineering'),
(8, 'sblack@up.edu.ph', 'Sirius', '', 'Black', 'Filipino', 'Male', '1989-08-26', 'Manila', '123 ABC Street', 'DEF', 'GHI City', 'JKL', 'same', 'same', 'same', 'same', 1234567, 'Department of Mechanical Engineering', 'College of Engineering'),
(9, 'llovegood@up.edu.ph', 'Luna', '', 'Lovegood', 'Filipino', 'Female', '1994-01-05', 'Manila', '123 ABC Street', 'DEF', 'GHI City', 'JKL', 'same', 'same', 'same', 'same', 1234567, 'Department of Mechanical Engineering', 'College of Engineering'),
(10, 'mmcgonagall', 'Minerva', '', 'McGonagall', 'Filipino', 'Female', '1980-06-27', 'Manila', '123 ABC Street', 'DEF', 'GHI City', 'JKL', 'same', 'same', 'same', 'same', 1234567, 'Department of Mining, Metallurgical and Materials Engineering', 'College of Engineering');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`applicationID`);

--
-- Indexes for table `applicationform`
--
ALTER TABLE `applicationform`
  ADD PRIMARY KEY (`formID`);

--
-- Indexes for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD PRIMARY KEY (`scholarshipID`);

--
-- Indexes for table `signatory`
--
ALTER TABLE `signatory`
  ADD PRIMARY KEY (`sigID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `applicationID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `applicationform`
--
ALTER TABLE `applicationform`
  MODIFY `formID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scholarship`
--
ALTER TABLE `scholarship`
  MODIFY `scholarshipID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `signatory`
--
ALTER TABLE `signatory`
  MODIFY `sigID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
