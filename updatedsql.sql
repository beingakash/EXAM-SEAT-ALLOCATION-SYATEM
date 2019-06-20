-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 12:38 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'user', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id` int(11) NOT NULL,
  `DOE` date NOT NULL,
  `Session` varchar(20) COLLATE utf8_bin NOT NULL,
  `HallId` varchar(20) COLLATE utf8_bin NOT NULL,
  `Deptname` varchar(20) COLLATE utf8_bin NOT NULL,
  `Sem` varchar(20) COLLATE utf8_bin NOT NULL,
  `cid` varchar(200) COLLATE utf8_bin NOT NULL,
  `Sroll` varchar(20) COLLATE utf8_bin NOT NULL,
  `Eroll` varchar(20) COLLATE utf8_bin NOT NULL,
  `count` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`id`, `DOE`, `Session`, `HallId`, `Deptname`, `Sem`, `cid`, `Sroll`, `Eroll`, `count`) VALUES
(14, '2019-05-16', 'morning', 'H101', 'IT', '6', 'HU101', '12000215001', '12000215020', 20),
(15, '2019-05-16', 'Morning', 'H102', 'COMPUTER SCIENCE', '6', 'CH107', '12000215021', '12000215040', 19),
(16, '2019-05-09', 'Afternoon', 'H501', 'COMPUTER SCIENCE', '6', 'CH107', '123', '456', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `cid` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `cid`, `Name`) VALUES
(4, 'INFT445', 'programming'),
(12, 'HU101', 'IT Dept'),
(13, 'CH107', 'chemistry');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `id` int(11) NOT NULL,
  `deptid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`id`, `deptid`, `name`) VALUES
(2, 'CSE', 'COMPUTER SCIENCE'),
(6, 'IT', 'INFORMATION TECHNOLOGY'),
(14, 'CIVIL', 'CIVIL ENGINEERING'),
(15, 'ME', 'MECHANICAL');

-- --------------------------------------------------------

--
-- Table structure for table `facallocator`
--

CREATE TABLE `facallocator` (
  `id` int(11) NOT NULL,
  `datee` varchar(100) NOT NULL,
  `session` varchar(255) NOT NULL,
  `hallid` varchar(100) NOT NULL,
  `faculty1` varchar(255) NOT NULL,
  `faculty2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facallocator`
--

INSERT INTO `facallocator` (`id`, `datee`, `session`, `hallid`, `faculty1`, `faculty2`) VALUES
(14, '2019-05-09', 'Afternoon', 'H501', '215TID3', '215TID1'),
(15, '2019-05-08', 'Afternoon', 'H501', '215TID', '215TID1');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `tid` varchar(50) COLLATE utf8_bin NOT NULL,
  `fname` varchar(50) COLLATE utf8_bin NOT NULL,
  `lname` varchar(50) COLLATE utf8_bin NOT NULL,
  `department` varchar(50) COLLATE utf8_bin NOT NULL,
  `gender` varchar(50) COLLATE utf8_bin NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `tid`, `fname`, `lname`, `department`, `gender`, `dob`, `doj`, `email`, `password`) VALUES
(1, '215TID', 'prabal', 'sahuu', 'information technology', 'male', '2018-01-14', '2019-05-16', 'aksh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, '215TID1', 'Akash', 'Kumar', 'IT', 'Male', '2019-05-17', '2019-05-21', 'kr.akash2019@gmail.com', '95835d8ea4c0d2a5da9a4eba83763d8a'),
(5, '215TID3', 'KERMOTT', 'HUSSAIN', 'INFORMATION TECHNOLOGY', 'Male', '2019-05-22', '2019-05-23', 'kem.hossain@gmail.com', 'c56d0e9a7ccec67b4ea131655038d604');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `id` int(11) NOT NULL,
  `hallId` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `capacity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `hallId`, `name`, `capacity`) VALUES
(4, 'H102', 'J.J Nortey', 77),
(16, 'H501', 'kk bose', 89);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `sid` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `sid`, `fname`, `lname`, `department`, `gender`, `dob`, `email`, `password`) VALUES
(1, '215IT01002802', 'Abiodun', 'Junior', 'Information Technology', 'Male', '2017-03-04', 'osigbelu.abiodun@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(17, '12000215005', 'Akash', 'Kumar', 'IT', 'Male', '2019-05-16', 'kr.akash2019@gmail.com', '30d5ac34f45e9a52c608df46ca9d3e9e'),
(20, '12002150043', 'Samrat', 'Nishant', 'INFORMATION TECHNOLOGY', 'Male', '2019-05-17', 'bcrecsam@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `cid` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `hall` varchar(50) NOT NULL,
  `sid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `cid`, `name`, `hall`, `sid`) VALUES
(2, 'INFT445', 'programming', 'E.G White', '215NS01002950'),
(3, 'INFT234', 'information system', 'E.G White', '215NS01002950'),
(7, 'INFT200', 'software engineering', 'J.J Nortey', '215CS01002856'),
(8, 'INFT234', 'information system', 'E.G White', '215CS01002856'),
(9, 'INFT212', 'computer vision', 'J.J Nortey', '215CS01002856'),
(11, 'INFT445', 'programming', 'E.G White', '215CS01002856'),
(20, 'INFT219', 'computer vision', 'Caf ', '215IT01002894'),
(21, 'INFT200', 'software engineering', 'J.J Nortey', '215IT01002894'),
(22, 'BMET303', 'MEDICAL INSTRUMENTAA', 'Caf ', '216be02004096'),
(23, 'BMET 111', 'TECHNICAL MATHEMATIC', 'American High', '216be02004096'),
(24, 'BMET406', 'MEDICAL IMAGING', 'Caf ', '216be02004096'),
(26, 'INFT200', 'software engineering', 'J.J Nortey', '215it01003240'),
(27, 'INFT234', 'information system', 'E.G White', '215it01003240'),
(28, 'INFT219', 'computer vision', 'Caf ', '215it01003240'),
(30, 'BMET314', 'CALCULUS', '', '215IT01002802'),
(31, 'INFT219', 'computer vision', '', '215IT01002802');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facallocator`
--
ALTER TABLE `facallocator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `facallocator`
--
ALTER TABLE `facallocator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
