-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2016 at 05:24 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

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

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `upMail` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `upMail`, `firstName`, `middleName`, `lastName`) VALUES
(1, 'admin1@up.edu.ph', 'Ruby', 'Von', 'Rails'),
(2, 'admin2@up.edu.ph', 'Sa', 'Shi', 'Mi');

-- --------------------------------------------------------
--
-- Table structure for table `student`
--

CREATE TABLE `student` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT;
-- --------------------------------------------------------
--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `applicationID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `scholarshipID` int(11) NOT NULL,
  `appDate` date NOT NULL,
  `verifiedByAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `applicationform`
--

CREATE TABLE `applicationform` (
  `formID` int(11) NOT NULL,
  `scholarshipID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `fieldname` varchar(255) NOT NULL,
  `formID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

CREATE TABLE `scholarship` (
  `scholarshipID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `benefactor` varchar(255) NOT NULL,
  `appDeadline` date NOT NULL,
  `numofGrantees` int(11) NOT NULL,
  `signatoryOrder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `scholarshipsig` (
  `sigID` int(11) NOT NULL,
  `scholarshipID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `signatory`
--

CREATE TABLE `signatory` (
  `sigID` int(11) NOT NULL,
  `upMail` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `sigstatus` (
  `sigID` int(11) NOT NULL,
  `applicationID` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sigstatus`
--

INSERT INTO `sigstatus` (`sigID`, `applicationID`, `status`) VALUES
(1, 1, 1),
(1, 1, 0),
(1, 1, 1),
(1, 1, 1),
(1, 1, 0),
(1, 1, 1),
(1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `place` varchar(255) NOT NULL,
  `present` varchar(255) NOT NULL,
  `permanent` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `sn` int(11) NOT NULL,
  `college` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `nationality`, `gender`, `birth`, `place`, `present`, `permanent`, `contact`, `email`, `degree`, `sn`, `college`, `dept`, `userID`) VALUES
('Marbille Juntado', 'Filipino', 'Male', '1997-03-23', 'Naga City', '10 Panganiban St., Krus na Ligas, Diliman, Q.C., Philippines', '81 Belen St., Goa, Camarines Sur, Philippines', '9301693256', 'mjuntado@up.edu.ph', 'BS Computer Science', 201350378, 'College of Engineering', 'Department of Computer Science', 2),
('Kim Chiu', 'Chinese', 'Female', '1990-04-21', 'Cebu', 'Bahay ni Kuya, Quezon City, Philippines', 'Cebu City, Cebu', '9301693257', 'kimchiu@up.edu.ph', 'BS Commerce', 201350379, 'College of Commerce', 'Department of Commerce', 3),
('Chang Sul Kim', 'Korean', 'Male', '1994-01-01', 'Incheon, South Korea', 'International Center, UP Diliman', 'Seoul, South Korea', '93012345678', 'csk@up.edu.ph', 'BS Electrical Engineering', 201350380, 'College of Engineering', 'IEEE', 4),
('Patricia Ann Regarde', 'Filipino', 'Female', '1996-01-01', 'Quezon cogjdo', '1jdgjgj', 'dfjxghdi', '92334', 'shdhiud', 'dfjkgjdk', 21919, 'shtkhdek', 'detjdkhg', 5),
('Ann Li', 'Chinese', 'Female', '2000-01-01', 'Hong Kong', 'Quezon City', 'jssfjisfjs', '930152083', 'al@up.edu.ph', 'BS Computer Science', 201311111, 'Engineering', 'sdfsidhgdihidhi', 6);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--
ALTER TABLE `application`
  MODIFY `applicationID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `application`
--
--
-- AUTO_INCREMENT for table `applicationform`
--
ALTER TABLE `applicationform`
  MODIFY `formID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scholarship`
--
ALTER TABLE `scholarship`
  MODIFY `scholarshipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `signatory`
--
ALTER TABLE `signatory`
  MODIFY `sigID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
