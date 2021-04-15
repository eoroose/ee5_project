-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 06:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `de_spiegel`
--
CREATE DATABASE IF NOT EXISTS `de_spiegel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `de_spiegel`;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointmentID` int(11) NOT NULL,
  `inhabitantID` int(11) NOT NULL,
  `doctorID` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `reason` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `appointment` (`appointmentID`, `inhabitantID`, `doctorID`, `date`, `time`, `reason`, `isActive`) VALUES
(1, 2, 1, '2021-04-20', '00:00:00', 'standaard check', 1),
(2, 2, 1, '2021-05-04', '00:00:00', 'standaard check', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chore`
--

CREATE TABLE `chore` (
  `choreID` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `choreassignment`
--

CREATE TABLE `choreassignment` (
  `choreAssignmentID` int(11) NOT NULL,
  `inhabitantID` int(11) NOT NULL,
  `choreID` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dailyquote`
--

CREATE TABLE `dailyquote` (
  `dailyQuoteID` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorID` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `phoneNumber` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `doctor` (`doctorID`, `firstname`, `lastname`, `country`, `city`, `address`, `phoneNumber`, `gender`, `isActive`) VALUES
(1, 'doktor', 'Aaron', 'belgium', 'leuven', 'blijde inkomstraat', '0478915042', 'Male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employeeadmin`
--

CREATE TABLE `employeeadmin` (
  `employeeAdminID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `employeeadmin` (`employeeAdminID`, `userID`, `isAdmin`) VALUES
(1, 2, 0),
(2, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `duration` time NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inhabitant`
--

CREATE TABLE `inhabitant` (
  `inhabitantID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `godParentID` int(11) NOT NULL,
  `arrivalDate` datetime NOT NULL,
  `halfwayDate` datetime DEFAULT NULL,
  `departureDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inhabitant`
--

INSERT INTO `inhabitant` (`inhabitantID`, `userID`, `godParentID`, `arrivalDate`, `halfwayDate`, `departureDate`) VALUES
(1, 3, NULL, '2021-03-16 16:28:59', '2021-03-19 16:28:59', '2021-04-14 15:31:12'),
(2, 5, 1, '2021-04-12 00:00:00', '2021-05-03 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `journalentry`
--

CREATE TABLE `journalentry` (
  `journalEntryID` int(11) NOT NULL,
  `inhabitantID` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `entry` varchar(500) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `isActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `noteID` int(11) NOT NULL,
  `employeeAdminID` int(11) NOT NULL,
  `inhabitantID` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `isRead` tinyint(1) NOT NULL DEFAULT 0,
  `isActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `progressID` int(11) NOT NULL,
  `inhabitantID` int(11) NOT NULL,
  `taskID` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `isCompleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `taskID` int(11) NOT NULL,
  `phase` varchar(45) NOT NULL,
  `description` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `birthday` date NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp(),
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `gender` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`userID`, `username`, `password`, `firstname`, `lastname`, `avatar`, `birthday`, `dateAdded`, `isActive`, `gender`) VALUES
(1, 'test', 'testtest', 'test', 'test', NULL, '2021-04-06', '2021-04-12 15:17:17', 1, 'Male'),
(2, 'employee', '$2y$10$koZX.rjg4bJEiaxf0LQ6Su6A08tV7orfJFc1HKJe7HoVqrHNjASlG', 'employee', 'Marie', NULL, '2021-04-07', '2021-04-12 15:26:50', 1, 'female'),
(3, 'inhabitant', '$2y$10$xaGdKPWP90KpAdJd2T7Ytem8vlIqVpq7MFTiEWcD2tBzxVjBChvMy', 'inhabitant', 'Thibault', NULL, '2021-04-02', '2021-04-12 15:28:51', 1, 'male'),
(4, 'inhabitant2', '$2y$10$wFoiYglpdf7TlpphuMEH4eGLyv8is9/Twdy70PU5hQ2nNOV1zroT.', 'inhabitant', '222', NULL, '2021-04-01', '2021-04-12 15:30:56', 1, 'female'),
(5, 'inhabitant3', '$2y$10$BoBCtdwxPUm/4wQ5VQcHnuCnLdSy7uY.n3rRVtjwWnN6D0T472Q.q', 'inhabitant', '666', NULL, '2021-04-03', '2021-04-12 15:34:54', 1, 'female'),
(6, 'admin', '$2y$10$EXaEVl4ZxvOJFdKqCl3B5eYH68q06kv9JLBnltsyOhP3K5.bHbMk6', 'admin', 'Aaron', NULL, '2021-04-02', '2021-04-12 15:37:50', 1, 'female');



-- --------------------------------------------------------

--
-- Table structure for table `weeklyagenda`
--

CREATE TABLE `weeklyagenda` (
  `weeklyAgendaID` int(11) NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT 1,
  `importFromXML` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `yellowcard`
--

CREATE TABLE `yellowcard` (
  `yellowCardID` int(11) NOT NULL,
  `employeeAdminID` int(11) NOT NULL,
  `inhabitantID` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `isActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentID`),
  ADD UNIQUE KEY `appointmentID_UNIQUE` (`appointmentID`),
  ADD KEY `inhabitantToAppointment_idx` (`inhabitantID`),
  ADD KEY `doctorToAppointment_idx` (`doctorID`);

--
-- Indexes for table `chore`
--
ALTER TABLE `chore`
  ADD PRIMARY KEY (`choreID`),
  ADD UNIQUE KEY `choreID_UNIQUE` (`choreID`);

--
-- Indexes for table `choreassignment`
--
ALTER TABLE `choreassignment`
  ADD PRIMARY KEY (`choreAssignmentID`),
  ADD UNIQUE KEY `choreAssignmentID_UNIQUE` (`choreAssignmentID`),
  ADD KEY `imhabitantToChoreAssignment_idx` (`inhabitantID`),
  ADD KEY `choreToChoreAssignment_idx` (`choreID`);

--
-- Indexes for table `dailyquote`
--
ALTER TABLE `dailyquote`
  ADD PRIMARY KEY (`dailyQuoteID`),
  ADD UNIQUE KEY `quoteID_UNIQUE` (`dailyQuoteID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorID`),
  ADD UNIQUE KEY `doctorID_UNIQUE` (`doctorID`);

--
-- Indexes for table `employeeadmin`
--
ALTER TABLE `employeeadmin`
  ADD PRIMARY KEY (`employeeAdminID`),
  ADD UNIQUE KEY `employeeAdminID_UNIQUE` (`employeeAdminID`),
  ADD KEY `userToEmployeeAdmin_idx` (`userID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`),
  ADD UNIQUE KEY `eventID_UNIQUE` (`eventID`);

--
-- Indexes for table `inhabitant`
--
ALTER TABLE `inhabitant`
  ADD PRIMARY KEY (`inhabitantID`),
  ADD UNIQUE KEY `inhabitantID_UNIQUE` (`inhabitantID`),
  ADD KEY `userID_idx` (`userID`);

--
-- Indexes for table `journalentry`
--
ALTER TABLE `journalentry`
  ADD PRIMARY KEY (`journalEntryID`),
  ADD UNIQUE KEY `journalEntryID_UNIQUE` (`journalEntryID`),
  ADD KEY `inhabitantToJournalEntry_idx` (`inhabitantID`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`noteID`),
  ADD UNIQUE KEY `noteID_UNIQUE` (`noteID`),
  ADD KEY `employeeAdminToNote_idx` (`employeeAdminID`),
  ADD KEY `inhabitantToNote_idx` (`inhabitantID`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`progressID`),
  ADD UNIQUE KEY `progressID_UNIQUE` (`progressID`),
  ADD KEY `inhabitantToProgress_idx` (`inhabitantID`),
  ADD KEY `taskToProgress_idx` (`taskID`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`taskID`),
  ADD UNIQUE KEY `taskID_UNIQUE` (`taskID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userID_UNIQUE` (`userID`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `weeklyagenda`
--
ALTER TABLE `weeklyagenda`
  ADD PRIMARY KEY (`weeklyAgendaID`),
  ADD UNIQUE KEY `weeklyAgendaID_UNIQUE` (`weeklyAgendaID`);

--
-- Indexes for table `yellowcard`
--
ALTER TABLE `yellowcard`
  ADD PRIMARY KEY (`yellowCardID`),
  ADD UNIQUE KEY `yellowCardID_UNIQUE` (`yellowCardID`),
  ADD KEY `employeeAdminToYellowCard_idx` (`employeeAdminID`),
  ADD KEY `inhabitantToYellowCard_idx` (`inhabitantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chore`
--
ALTER TABLE `chore`
  MODIFY `choreID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `choreassignment`
--
ALTER TABLE `choreassignment`
  MODIFY `choreAssignmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dailyquote`
--
ALTER TABLE `dailyquote`
  MODIFY `dailyQuoteID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employeeadmin`
--
ALTER TABLE `employeeadmin`
  MODIFY `employeeAdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inhabitant`
--
ALTER TABLE `inhabitant`
  MODIFY `inhabitantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `journalentry`
--
ALTER TABLE `journalentry`
  MODIFY `journalEntryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `noteID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `progressID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `taskID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `weeklyagenda`
--
ALTER TABLE `weeklyagenda`
  MODIFY `weeklyAgendaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yellowcard`
--
ALTER TABLE `yellowcard`
  MODIFY `yellowCardID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `doctorToAppointment` FOREIGN KEY (`doctorID`) REFERENCES `doctor` (`doctorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inhabitantToAppointment` FOREIGN KEY (`inhabitantID`) REFERENCES `inhabitant` (`inhabitantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `choreassignment`
--
ALTER TABLE `choreassignment`
  ADD CONSTRAINT `choreToChoreAssignment` FOREIGN KEY (`choreID`) REFERENCES `chore` (`choreID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `imhabitantToChoreAssignment` FOREIGN KEY (`inhabitantID`) REFERENCES `inhabitant` (`inhabitantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeeadmin`
--
ALTER TABLE `employeeadmin`
  ADD CONSTRAINT `userToEmployeeAdmin` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inhabitant`
--
ALTER TABLE `inhabitant`
  ADD CONSTRAINT `godParentToInhabitant` FOREIGN KEY (`inhabitantID`) REFERENCES `inhabitant` (`inhabitantID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userToInhabitant` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `journalentry`
--
ALTER TABLE `journalentry`
  ADD CONSTRAINT `inhabitantToJournalEntry` FOREIGN KEY (`inhabitantID`) REFERENCES `inhabitant` (`inhabitantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `employeeAdminToNote` FOREIGN KEY (`employeeAdminID`) REFERENCES `employeeadmin` (`employeeAdminID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inhabitantToNote` FOREIGN KEY (`inhabitantID`) REFERENCES `inhabitant` (`inhabitantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `inhabitantToProgress` FOREIGN KEY (`inhabitantID`) REFERENCES `inhabitant` (`inhabitantID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `taskToProgress` FOREIGN KEY (`taskID`) REFERENCES `task` (`taskID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yellowcard`
--
ALTER TABLE `yellowcard`
  ADD CONSTRAINT `employeeAdminToYellowCard` FOREIGN KEY (`employeeAdminID`) REFERENCES `employeeadmin` (`employeeAdminID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inhabitantToYellowCard` FOREIGN KEY (`inhabitantID`) REFERENCES `inhabitant` (`inhabitantID`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
