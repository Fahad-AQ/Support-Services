-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2017 at 01:57 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `els`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DEPT_ID` int(11) NOT NULL,
  `DEPT_NAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DEPT_ID`, `DEPT_NAME`) VALUES
(2, 'I T'),
(1, 'WEB DEPARTMENT');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `DESG_ID` int(11) NOT NULL,
  `DESG_NAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`DESG_ID`, `DESG_NAME`) VALUES
(2, 'I T EXECUTIVE'),
(1, 'WEB DEVELOPER');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMP_ID` int(11) NOT NULL,
  `EMP_BADGE_ID` varchar(15) NOT NULL,
  `EMP_NAME` varchar(50) NOT NULL,
  `EMP_FNAME` varchar(50) DEFAULT NULL,
  `EMP_CNIC` varchar(13) NOT NULL,
  `EMP_CONTACT` varchar(11) NOT NULL,
  `EMP_EMAIL` varchar(254) NOT NULL,
  `EMP_PHOTO` longtext NOT NULL,
  `EMP_DOB` date NOT NULL,
  `EMP_DOJ` date NOT NULL,
  `EMP_ADD` text,
  `EMP_DEPT_ID` int(11) NOT NULL,
  `EMP_ROLE_ID` int(11) NOT NULL,
  `EMP_DESG_ID` int(11) NOT NULL,
  `EMP_STATUS` int(11) NOT NULL,
  `EMP_REMAINING_ANNUAL` varchar(50) DEFAULT NULL,
  `EMP_REMAINING_SICK` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMP_ID`, `EMP_BADGE_ID`, `EMP_NAME`, `EMP_FNAME`, `EMP_CNIC`, `EMP_CONTACT`, `EMP_EMAIL`, `EMP_PHOTO`, `EMP_DOB`, `EMP_DOJ`, `EMP_ADD`, `EMP_DEPT_ID`, `EMP_ROLE_ID`, `EMP_DESG_ID`, `EMP_STATUS`, `EMP_REMAINING_ANNUAL`, `EMP_REMAINING_SICK`) VALUES
(1, '10882', 'fahad ahmed qureshi', 'shahid ahmed qureshi', '4220152078555', '03433055666', 'fahad_ahmed@mobilelinkusa.com', 'https://lh5.googleusercontent.com/-DoF1qGQm2zs/AAAAAAAAAAI/AAAAAAAAAA4/inbonNTSlCA/s96-c/photo.jpg', '1993-05-05', '2015-05-05', 'Malir Karachi', 2, 3, 1, 1, '21', '3'),
(3, '10884', 'muhammad shabbir', 'muhammad shakeel', '4240144329577', '3162127426', 'muhammad_shabbir@mobilelinkusa.com', 'https://lh6.googleusercontent.com/-3IMdWSbjLh8/AAAAAAAAAAI/AAAAAAAAABQ/PCFQYcUg5RI/s96-c/photo.jpg', '1993-09-17', '2016-07-11', 'orangi town', 1, 1, 1, 1, '21', '6'),
(4, '10885', 'raja ahsan', 'ishfaque akhter', '4240144329578', '03162127422', 'raja_ahsan@mobilelinkusa.com', '', '1993-09-17', '2015-03-03', 'orangi town', 2, 1, 2, 1, '21', '2');

-- --------------------------------------------------------

--
-- Table structure for table `leave_request`
--

CREATE TABLE `leave_request` (
  `LREQ_ID` int(11) NOT NULL,
  `LREQ_EMP_ID` int(11) NOT NULL,
  `LREQ_LTYPE_ID` int(11) NOT NULL,
  `LREQ_START` date NOT NULL,
  `LREQ_END` date NOT NULL,
  `LREQ_REQ_COMMENTS` text,
  `LREQ_APP_ID` int(11) DEFAULT NULL,
  `LREQ_APP_COMMENTS` text,
  `LREQ_STATUS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_request`
--

INSERT INTO `leave_request` (`LREQ_ID`, `LREQ_EMP_ID`, `LREQ_LTYPE_ID`, `LREQ_START`, `LREQ_END`, `LREQ_REQ_COMMENTS`, `LREQ_APP_ID`, `LREQ_APP_COMMENTS`, `LREQ_STATUS_ID`) VALUES
(3, 1, 1, '2017-01-23', '2017-02-01', 'as', NULL, NULL, 1),
(8, 4, 2, '2017-07-11', '2017-07-11', 'qw', NULL, NULL, 1),
(36, 3, 3, '2017-07-17', '2017-07-17', 'cgf', NULL, NULL, 2),
(37, 3, 3, '2017-07-18', '2017-07-18', 'qw', NULL, NULL, 2),
(38, 3, 3, '2017-07-27', '2017-07-27', 'we', 1, 'Not Available', 2);

-- --------------------------------------------------------

--
-- Table structure for table `leave_status`
--

CREATE TABLE `leave_status` (
  `LS_ID` int(11) NOT NULL,
  `LS_STATUS` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_status`
--

INSERT INTO `leave_status` (`LS_ID`, `LS_STATUS`) VALUES
(1, 'Applied'),
(2, 'Approved'),
(3, 'Declined');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `LTYPE_ID` int(11) NOT NULL,
  `LTYPE_TYPE` varchar(30) NOT NULL,
  `LTYPE_TOTAL_YEAR` int(11) NOT NULL,
  `LTYPE_ELIG_DAYS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`LTYPE_ID`, `LTYPE_TYPE`, `LTYPE_TOTAL_YEAR`, `LTYPE_ELIG_DAYS`) VALUES
(1, 'Annual', 21, 365),
(2, 'Sick', 6, 90),
(3, 'Unpaid', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ROLE_ID` int(11) NOT NULL,
  `ROLE_NAME` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ROLE_ID`, `ROLE_NAME`) VALUES
(3, 'Approver'),
(1, 'Requester'),
(2, 'Reviewer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DEPT_ID`),
  ADD UNIQUE KEY `DEPARTMENT` (`DEPT_NAME`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`DESG_ID`),
  ADD UNIQUE KEY `DESIGNATION` (`DESG_NAME`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMP_ID`),
  ADD UNIQUE KEY `EMPLOYEE BADGE` (`EMP_BADGE_ID`),
  ADD UNIQUE KEY `EMP CNIC` (`EMP_CNIC`),
  ADD UNIQUE KEY `Employee Contact` (`EMP_CONTACT`),
  ADD UNIQUE KEY `EMAIL ADD` (`EMP_EMAIL`),
  ADD KEY `DEPT ID` (`EMP_DEPT_ID`),
  ADD KEY `ROLE ID` (`EMP_ROLE_ID`),
  ADD KEY `DESG ID` (`EMP_DESG_ID`);

--
-- Indexes for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD PRIMARY KEY (`LREQ_ID`),
  ADD KEY `EMPLOYEE ID` (`LREQ_EMP_ID`),
  ADD KEY `LEAVE TYPE` (`LREQ_LTYPE_ID`),
  ADD KEY `LEAVE STATUS` (`LREQ_STATUS_ID`),
  ADD KEY `Approver Employee ID` (`LREQ_APP_ID`);

--
-- Indexes for table `leave_status`
--
ALTER TABLE `leave_status`
  ADD PRIMARY KEY (`LS_ID`),
  ADD UNIQUE KEY `LEAVE STATUS` (`LS_STATUS`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`LTYPE_ID`),
  ADD UNIQUE KEY `LEAVE TYPE` (`LTYPE_TYPE`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ROLE_ID`),
  ADD UNIQUE KEY `ROLE` (`ROLE_NAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DEPT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `DESG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `leave_request`
--
ALTER TABLE `leave_request`
  MODIFY `LREQ_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `leave_status`
--
ALTER TABLE `leave_status`
  MODIFY `LS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `LTYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`EMP_ROLE_ID`) REFERENCES `role` (`ROLE_ID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`EMP_DEPT_ID`) REFERENCES `department` (`DEPT_ID`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`EMP_DESG_ID`) REFERENCES `designation` (`DESG_ID`);

--
-- Constraints for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD CONSTRAINT `leave_request_ibfk_1` FOREIGN KEY (`LREQ_LTYPE_ID`) REFERENCES `leave_type` (`LTYPE_ID`),
  ADD CONSTRAINT `leave_request_ibfk_2` FOREIGN KEY (`LREQ_EMP_ID`) REFERENCES `employee` (`EMP_ID`),
  ADD CONSTRAINT `leave_request_ibfk_3` FOREIGN KEY (`LREQ_STATUS_ID`) REFERENCES `leave_status` (`LS_ID`),
  ADD CONSTRAINT `leave_request_ibfk_4` FOREIGN KEY (`LREQ_APP_ID`) REFERENCES `employee` (`EMP_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
