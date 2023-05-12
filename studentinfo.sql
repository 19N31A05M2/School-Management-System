-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 11:21 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `coactivities`
--

CREATE TABLE `coactivities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class` varchar(10) NOT NULL,
  `vvls1` float NOT NULL,
  `ace1` float NOT NULL,
  `hpe1` float NOT NULL,
  `wce1` float NOT NULL,
  `vvls2` float NOT NULL,
  `ace2` float NOT NULL,
  `hpe2` float NOT NULL,
  `wce2` float NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dropout`
--

CREATE TABLE `dropout` (
  `image` varchar(200) NOT NULL,
  `id` int(50) NOT NULL,
  `admnclass` varchar(10) NOT NULL,
  `admndate` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `mothertongue` varchar(10) NOT NULL,
  `dateofbirth` date NOT NULL,
  `caste` varchar(10) NOT NULL,
  `subcastename` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `adharno` varchar(12) NOT NULL,
  `fathername` varchar(50) NOT NULL,
  `mothername` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `religion` varchar(10) NOT NULL,
  `phd` varchar(100) NOT NULL,
  `mole1` varchar(100) NOT NULL,
  `mole2` varchar(100) NOT NULL,
  `leavingclass` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `dateofleaving` date NOT NULL,
  `feedue` float NOT NULL,
  `tcissued` varchar(3) NOT NULL DEFAULT 'NO',
  `studyingclass` varchar(10) NOT NULL,
  `dateactuallyleft` date DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feestructure`
--

CREATE TABLE `feestructure` (
  `class` varchar(11) NOT NULL,
  `fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feestructure`
--

INSERT INTO `feestructure` (`class`, `fee`) VALUES
('1', 550),
('10', 1400),
('2', 550),
('3', 600),
('4', 650),
('5', 650),
('6', 700),
('7', 750),
('8', 850),
('9', 1000),
('LKG', 500),
('NURSERY', 500),
('UKG', 500);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `mobile` bigint(11) NOT NULL,
  `classteacherof` varchar(10) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`username`, `password`, `name`, `subject`, `mobile`, `classteacherof`, `id`) VALUES
('principal', 'Vvnhs', 'Principal', '', 2147483647, NULL, 1),
('teacher', 'Vvnhs', 'karunakar', 'english', 9876543210, '5', 3),
('teacher1', 'Vvnhs', 'M LAXMI DURGA', 'Telugu', 9876543210, 'UKG', 5);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `class` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `exam` varchar(20) NOT NULL,
  `telugu` float NOT NULL,
  `hindi` float NOT NULL,
  `english` float NOT NULL,
  `maths` float NOT NULL,
  `science` float NOT NULL,
  `social` float NOT NULL,
  `totalmarks` float NOT NULL,
  `cgpa` float NOT NULL,
  `attendance` float NOT NULL,
  `overallgrade` varchar(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `jan` int(11) NOT NULL,
  `feb` int(11) NOT NULL,
  `mar` int(11) NOT NULL,
  `apr` int(11) NOT NULL,
  `may` int(11) NOT NULL,
  `jun` int(11) NOT NULL,
  `jul` int(11) NOT NULL,
  `aug` int(11) NOT NULL,
  `sep` int(11) NOT NULL,
  `oct` int(11) NOT NULL,
  `nov` int(11) NOT NULL,
  `dece` int(11) NOT NULL,
  `totaldayspresent` int(11) NOT NULL,
  `no.of records` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ppstudentinformation`
--

CREATE TABLE `ppstudentinformation` (
  `image` varchar(200) NOT NULL,
  `id` int(50) NOT NULL,
  `admnclass` varchar(10) NOT NULL,
  `admndate` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `mothertongue` varchar(10) NOT NULL,
  `dateofbirth` date NOT NULL,
  `caste` varchar(10) NOT NULL,
  `subcastename` varchar(50) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `adharno` varchar(12) DEFAULT '000000000000',
  `fathername` varchar(50) NOT NULL,
  `mothername` varchar(50) NOT NULL,
  `fatherocp` varchar(100) NOT NULL,
  `motherocp` varchar(100) DEFAULT NULL,
  `address` varchar(250) NOT NULL,
  `wlparent` varchar(100) NOT NULL,
  `lastschool` varchar(100) DEFAULT NULL,
  `tcno` varchar(100) DEFAULT NULL,
  `religion` varchar(10) NOT NULL,
  `medium` varchar(100) NOT NULL,
  `firstlan` varchar(100) NOT NULL,
  `secondlan` varchar(100) NOT NULL,
  `phd` varchar(100) NOT NULL,
  `mole1` varchar(100) NOT NULL,
  `mole2` varchar(100) NOT NULL,
  `class` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentfees`
--

CREATE TABLE `studentfees` (
  `receipt_no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class` varchar(10) NOT NULL,
  `paiddate` date NOT NULL,
  `feepaid` float NOT NULL,
  `clearedmonth` varchar(50) NOT NULL,
  `monthdue` float NOT NULL,
  `totalfee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentfees`
--

INSERT INTO `studentfees` (`receipt_no`, `id`, `name`, `class`, `paiddate`, `feepaid`, `clearedmonth`, `monthdue`, `totalfee`) VALUES
(1, 926, 'PEDDI MOUNIKA', '10', '2021-10-13', 3000, 'July', 4000, 13800),
(2, 969, 'PEDHABUDI RAVI SAGAR', '10', '2021-11-06', 2000, 'June', 6400, 14800),
(3, 1737, 'VEMULA SAIKUMAR', '2', '2021-11-06', 3000, 'October', 300, 3600),
(4, 1246, 'THALAPALLI VIKRAM TEJA', '6', '2021-12-09', 2000, 'July', 2900, 6400),
(5, 1678, 'M SHIVA KUMAR', '2', '2021-12-28', 2000, 'August', 1850, 4600),
(6, 1234, 'A RITESH KUMAR', '7', '2022-02-19', 1000, 'June', 5750, 8000),
(7, 1738, 'SDFD', '7', '2022-04-22', 2000, 'July', 6250, 7000),
(8, 1234, 'A RITESH KUMAR', '7', '2022-05-06', 2000, 'September', 6000, 6000),
(9, 1234, 'A RITESH KUMAR', '7', '2022-06-04', 2000, 'November', 0, 4000),
(10, 1740, 'ASD', '2', '2022-09-08', 3000, 'October', -800, 3600),
(11, 1234, 'A RITESH KUMAR', '9', '2022-10-14', 3000, 'August', 2000, 9000),
(12, 1141, 'J SHIVANANDH', '10', '2022-12-15', 4000, 'July', 5800, 12800),
(13, 1141, 'J SHIVANANDH', '10', '2022-12-15', 3000, 'October', 2800, 9800),
(14, 1411, 'MD ASIF', '7', '2022-12-16', 3000, 'September', 2250, 6000),
(15, 1141, 'J SHIVANANDH', '10', '2022-12-24', 2000, 'November', 800, 7800),
(16, 1234, 'A RITESH KUMAR', '9', '2023-05-12', 3000, 'November', 6000, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `studentinformation`
--

CREATE TABLE `studentinformation` (
  `image` varchar(200) NOT NULL,
  `id` int(50) NOT NULL,
  `admnclass` varchar(10) NOT NULL,
  `admndate` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `mothertongue` varchar(10) NOT NULL,
  `dateofbirth` date NOT NULL,
  `caste` varchar(10) NOT NULL,
  `subcastename` varchar(50) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `adharno` varchar(12) DEFAULT '000000000000',
  `fathername` varchar(50) NOT NULL,
  `mothername` varchar(50) NOT NULL,
  `fatherocp` varchar(100) NOT NULL,
  `motherocp` varchar(100) DEFAULT NULL,
  `address` varchar(250) NOT NULL,
  `wlparent` varchar(100) NOT NULL,
  `lastschool` varchar(100) DEFAULT NULL,
  `tcno` varchar(100) DEFAULT NULL,
  `religion` varchar(10) NOT NULL,
  `medium` varchar(100) NOT NULL,
  `firstlan` varchar(100) NOT NULL,
  `secondlan` varchar(100) NOT NULL,
  `phd` varchar(100) NOT NULL,
  `mole1` varchar(100) NOT NULL,
  `mole2` varchar(100) NOT NULL,
  `class` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `workingdays`
--

CREATE TABLE `workingdays` (
  `year` varchar(10) NOT NULL,
  `jan` int(11) NOT NULL,
  `feb` int(11) NOT NULL,
  `mar` int(11) NOT NULL,
  `apr` int(11) NOT NULL,
  `may` int(11) NOT NULL,
  `jun` int(11) NOT NULL,
  `jul` int(11) NOT NULL,
  `aug` int(11) NOT NULL,
  `sep` int(11) NOT NULL,
  `oct` int(11) NOT NULL,
  `nov` int(11) NOT NULL,
  `dece` int(11) NOT NULL,
  `totaldays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workingdays`
--

INSERT INTO `workingdays` (`year`, `jan`, `feb`, `mar`, `apr`, `may`, `jun`, `jul`, `aug`, `sep`, `oct`, `nov`, `dece`, `totaldays`) VALUES
('2020-2021', 23, 24, 28, 28, 10, 28, 28, 28, 28, 28, 27, 28, 308),
('2021-2022', 23, 24, 28, 28, 10, 28, 28, 28, 25, 28, 27, 28, 305),
('2022-2023', 23, 24, 28, 28, 10, 28, 28, 28, 25, 28, 27, 28, 305);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coactivities`
--
ALTER TABLE `coactivities`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `dropout`
--
ALTER TABLE `dropout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feestructure`
--
ALTER TABLE `feestructure`
  ADD UNIQUE KEY `class` (`class`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`no.of records`);

--
-- Indexes for table `ppstudentinformation`
--
ALTER TABLE `ppstudentinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentfees`
--
ALTER TABLE `studentfees`
  ADD PRIMARY KEY (`receipt_no`);

--
-- Indexes for table `studentinformation`
--
ALTER TABLE `studentinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workingdays`
--
ALTER TABLE `workingdays`
  ADD PRIMARY KEY (`year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coactivities`
--
ALTER TABLE `coactivities`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `no.of records` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentfees`
--
ALTER TABLE `studentfees`
  MODIFY `receipt_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
