-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2017 at 01:45 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CityId` int(11) NOT NULL,
  `StateId` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityId`, `StateId`, `Name`) VALUES
(2, 1, 'abc'),
(3, 1, 'rajkot'),
(4, 1, 'vadodara'),
(5, 1, 'gandhinagar'),
(6, 1, 'junagadh'),
(7, 1, 'surat'),
(8, 3, 'banglor'),
(9, 1, 'ahmedabad'),
(10, 2, 'mumbai'),
(11, 8, 'punjab'),
(12, 4, 'udaypur'),
(13, 6, 'panji'),
(14, 9, 'amrutsar'),
(15, 5, 'delhi'),
(16, 10, 'abu dhabi'),
(17, 3, 'towar'),
(18, 12, 'can'),
(19, 11, 'white house - trump'),
(20, 1, 'kutch');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `CountryId` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryId`, `Name`) VALUES
(1, 'india'),
(2, 'america'),
(3, 'france'),
(6, 'pakistan'),
(7, 'UAE'),
(8, 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `dailyworkload`
--

CREATE TABLE `dailyworkload` (
  `DailyWorkLoadId` bigint(20) NOT NULL,
  `EmpId` varchar(50) NOT NULL,
  `LoginDate` datetime DEFAULT NULL,
  `LogoutDate` datetime DEFAULT NULL,
  `DailyWorkingminutes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyworkload`
--

INSERT INTO `dailyworkload` (`DailyWorkLoadId`, `EmpId`, `LoginDate`, `LogoutDate`, `DailyWorkingminutes`) VALUES
(2, '2', '2017-02-01 01:27:41', '2017-02-01 17:40:48', 973),
(3, 'abc1234', '2017-01-02 10:34:49', '2017-01-02 12:00:00', 85),
(4, '2', '2017-02-03 09:55:34', '2017-02-03 17:41:18', 466),
(5, 'abc1234', '2017-01-06 09:46:18', '2017-01-06 09:40:35', 55),
(6, '2', '2017-02-07 09:39:18', '2017-02-07 14:59:12', 320),
(7, '2', '2017-02-08 09:51:30', '2017-02-08 18:30:56', 519),
(8, '2', '2017-02-09 09:39:26', '2017-02-09 18:17:02', 518),
(9, 'abc1234', '2017-02-09 15:41:37', '2017-02-09 17:50:00', 128),
(10, '2', '2017-02-10 09:47:24', '2017-02-10 18:26:07', 519),
(11, '2', '2017-02-11 10:49:25', NULL, NULL),
(12, 'emp001', '2017-02-11 10:50:23', '2017-02-11 18:27:00', 457),
(13, '2', '2017-02-13 11:19:31', '2017-02-13 11:21:12', 2),
(14, '2', '2017-02-14 09:46:26', '2017-02-14 11:05:48', 79),
(15, '2', '2017-02-20 10:14:21', '2017-02-20 11:01:51', 48),
(16, 'jup0001', '2017-02-20 10:47:23', '2017-02-20 18:24:25', 457),
(17, 'emp001', '2017-02-20 11:02:23', '2017-02-20 18:39:16', 457),
(18, '2', '2017-02-21 12:43:36', '2017-02-21 15:57:51', 194),
(19, 'emp001', '2017-02-21 15:35:08', '2017-02-21 17:44:33', 129),
(20, 'jup0001', '2017-02-21 17:39:30', '2017-02-21 18:31:19', 52),
(21, 'emp001', '2017-02-22 11:11:23', '2017-02-22 13:30:00', 139),
(22, 'emp001', '2017-02-23 09:49:02', '2017-02-23 14:50:00', 301),
(23, 'jup0001', '2017-02-24 09:52:17', '2017-02-24 11:30:38', 98),
(24, 'emp001', '2017-02-24 11:30:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmpId` bigint(20) NOT NULL,
  `EmployeeId` varchar(11) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `MiddleName` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL,
  `Birthdate` date NOT NULL,
  `Gender` int(10) NOT NULL,
  `Address1` varchar(500) NOT NULL,
  `Address2` varchar(500) NOT NULL,
  `Address3` varchar(500) NOT NULL,
  `CityId` int(11) NOT NULL,
  `Mobile` decimal(10,0) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `AadharNumber` varchar(25) NOT NULL,
  `MaritalStatus` int(11) NOT NULL,
  `PositionId` int(11) NOT NULL,
  `CreatedBy` bigint(20) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` bigint(20) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `JoinDate` date NOT NULL,
  `LeaveDate` date DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `LastLogout` datetime DEFAULT NULL,
  `StatusId` int(11) NOT NULL,
  `RoleId` int(11) NOT NULL,
  `ImageName` varchar(1000) DEFAULT NULL,
  `MacAddress` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmpId`, `EmployeeId`, `FirstName`, `MiddleName`, `LastName`, `Birthdate`, `Gender`, `Address1`, `Address2`, `Address3`, `CityId`, `Mobile`, `Email`, `Password`, `AadharNumber`, `MaritalStatus`, `PositionId`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `JoinDate`, `LeaveDate`, `LastLogin`, `LastLogout`, `StatusId`, `RoleId`, `ImageName`, `MacAddress`) VALUES
(1, '1', 'admin', 'admin', 'admin', '1994-10-09', 1, 'address1', 'address2', 'address3', 2, '9999999999', 'admin@gmail.com', 'admin', '12354658496', 2, 1, 1, '2017-01-01 00:00:00', 1, '2017-01-31 10:33:33', '2017-01-11', '2017-01-18', '2017-02-20 16:45:36', '2017-02-09 15:12:09', 1, 1, 'images (2).jpg', ''),
(2, '2', 'NAMAN', 'haman', 'manman', '2017-01-01', 2, 'SADFDSA', 'SADFSADFADSF', 'AREWTWTGSREWG', 4, '3212565897', 'MM@GMAIL.COM', '123', 'ZXDF9879SDFG', 1, 3, 1, '2017-01-17 11:03:40', 3, '2017-02-07 12:34:57', '2017-01-17', '0000-00-00', '2017-02-21 15:50:05', '2017-02-21 15:57:51', 1, 3, 'images (1).jpg', '40-8D-5C-B1-B7-7D'),
(5, 'abc1234', 'nitin', 'h', 'patel', '2017-02-17', 1, 'nr, new laxminarayan temple ,virani moti', 'nakhatrana', '', 8, '9408020069', 'nitinchhabhaiya@gmail.com', '123.', 'sdfds5644dsf', 2, 2, 3, '2017-02-08 10:42:08', 3, '2017-02-08 11:43:07', '2017-02-09', '2017-02-08', '2017-02-09 15:41:37', '2017-02-09 15:57:23', 1, 3, '311497journal.pone.0020409.g003.png', '40-8D-5C-B1-B7-7D'),
(6, 'lksadf', 'asdf', 'adfs', 'asdf', '2017-02-08', 1, 'dsfa', 'adfs', 'asdf', 7, '3451243543', 'ankit@gmail.com', 'asdf', 'afasdfasdf', 1, 7, 3, '2017-02-08 04:18:31', 3, '2017-02-08 04:42:30', '2017-02-10', '2017-02-18', NULL, NULL, 1, 2, '151244images (3).jpg', '40-8D-5C-B1-B7-7D'),
(7, 'emp001', 'sagar', 'tulsidas', 'somjiyani', '2016-07-01', 1, 'fggfrgrfg', 'rgrfgrfg', 'rgegfrgvdfre', 9, '4523543234', 'nitin@gmail.com', 'bbbbb', 'zcxfcewr42353', 2, 2, 1, '2017-02-11 10:18:40', 1, '2017-02-11 10:19:09', '2017-02-21', '0000-00-00', '2017-02-24 11:30:44', '2017-02-23 18:28:04', 1, 3, '63666images.jpg', '40-8D-5C-B1-B7-7D'),
(8, 'jup0001', 'nitin', 'Tulsidas', 'chhabhaiya', '1994-10-09', 1, 'MOTI VIRANI', 'NAKHATRANA', 'KUTCH (BHUJ)', 20, '9408020069', 'nitin09@gmail.com', '321', 'nitin123456', 2, 2, 3, '2017-02-20 10:19:28', 3, '2017-02-20 10:46:56', '2016-12-06', '2017-01-20', '2017-02-24 11:27:02', '2017-02-24 11:30:38', 1, 3, '219924Tulips.jpg', '40-8D-5C-B1-B7-7D');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `GenderId` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`GenderId`, `Name`) VALUES
(1, 'male'),
(2, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `leavedays`
--

CREATE TABLE `leavedays` (
  `LeaveDayId` bigint(20) NOT NULL,
  `LeaveDay` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavedays`
--

INSERT INTO `leavedays` (`LeaveDayId`, `LeaveDay`) VALUES
(1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `leavedetails`
--

CREATE TABLE `leavedetails` (
  `Detail_Id` bigint(20) NOT NULL,
  `EmpId` bigint(20) NOT NULL,
  `TypesLeaveId` int(10) NOT NULL,
  `Reason` varchar(500) NOT NULL,
  `StateDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `LeaveStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavedetails`
--

INSERT INTO `leavedetails` (`Detail_Id`, `EmpId`, `TypesLeaveId`, `Reason`, `StateDate`, `EndDate`, `LeaveStatus`) VALUES
(4, 2, 1, 'holiday', '2017-01-31', '2017-02-02', 'Accept'),
(5, 2, 3, 'holiday', '2017-01-31', '2017-02-02', 'Denied'),
(6, 2, 1, 'holiday', '2017-01-31', '2017-02-02', 'Pending'),
(7, 2, 4, 'holiday', '2017-01-31', '2017-02-02', 'Accept'),
(8, 2, 5, 'holiday', '2017-01-31', '2017-02-02', 'Denied'),
(9, 1, 1, 'Sick', '2017-02-12', '2017-03-15', 'Accept');

-- --------------------------------------------------------

--
-- Table structure for table `maritalstatus`
--

CREATE TABLE `maritalstatus` (
  `MaritalId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maritalstatus`
--

INSERT INTO `maritalstatus` (`MaritalId`, `Name`) VALUES
(1, 'Married'),
(2, 'Unmarried');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `PositinId` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`PositinId`, `Name`) VALUES
(1, 'HR'),
(2, 'PHP-Developer'),
(3, '.NET-Developer'),
(6, 'java'),
(7, 'android'),
(8, 'c##'),
(9, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleId` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleId`, `Name`) VALUES
(1, 'admin'),
(2, 'admin-hr'),
(3, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `StateId` int(11) NOT NULL,
  `CountryId` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`StateId`, `CountryId`, `Name`) VALUES
(1, 1, 'gujarat'),
(2, 1, 'maharastra'),
(3, 3, 'afil towar'),
(4, 1, 'rajastan'),
(5, 1, 'uttar pradesh'),
(6, 1, 'goa'),
(8, 6, 'karachi'),
(9, 1, 'panjab'),
(10, 7, 'dubai'),
(11, 2, 'wosingttan'),
(12, 8, 'kendra');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `StatusId` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`StatusId`, `Name`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `type_of_leave`
--

CREATE TABLE `type_of_leave` (
  `LeaveId` bigint(20) NOT NULL,
  `Type_of_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_of_leave`
--

INSERT INTO `type_of_leave` (`LeaveId`, `Type_of_Name`) VALUES
(1, 'sick leave'),
(3, 'casual leave'),
(4, 'privilege leave'),
(5, 'half day leave');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CityId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`CountryId`);

--
-- Indexes for table `dailyworkload`
--
ALTER TABLE `dailyworkload`
  ADD PRIMARY KEY (`DailyWorkLoadId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmpId`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `EmployeeId` (`EmployeeId`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`GenderId`);

--
-- Indexes for table `leavedays`
--
ALTER TABLE `leavedays`
  ADD PRIMARY KEY (`LeaveDayId`);

--
-- Indexes for table `leavedetails`
--
ALTER TABLE `leavedetails`
  ADD PRIMARY KEY (`Detail_Id`);

--
-- Indexes for table `maritalstatus`
--
ALTER TABLE `maritalstatus`
  ADD PRIMARY KEY (`MaritalId`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`PositinId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`StateId`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `type_of_leave`
--
ALTER TABLE `type_of_leave`
  ADD PRIMARY KEY (`LeaveId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `CityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `CountryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dailyworkload`
--
ALTER TABLE `dailyworkload`
  MODIFY `DailyWorkLoadId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmpId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `GenderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `leavedays`
--
ALTER TABLE `leavedays`
  MODIFY `LeaveDayId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `leavedetails`
--
ALTER TABLE `leavedetails`
  MODIFY `Detail_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `PositinId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `StateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `type_of_leave`
--
ALTER TABLE `type_of_leave`
  MODIFY `LeaveId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
