-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 22 apr 2021 om 20:53
-- Serverversie: 10.4.17-MariaDB
-- PHP-versie: 7.4.15

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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `appointment`
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

--
-- Gegevens worden geëxporteerd voor tabel `appointment`
--

INSERT INTO `appointment` (`appointmentID`, `inhabitantID`, `doctorID`, `date`, `time`, `reason`, `isActive`) VALUES
(1, 2, 1, '2021-04-20', '00:00:00', 'standaard check', 1),
(2, 2, 1, '2021-05-04', '00:00:00', 'standaard check', 1),
(3, 3, 1, '2021-04-21', '15:00:00', 'standaard check', 1),
(4, 3, 1, '2021-05-05', '00:00:00', 'standaard check', 1),
(5, 4, 1, '2021-04-21', '00:00:00', 'standaard check', 1),
(6, 4, 1, '2021-05-05', '00:00:00', 'standaard check', 1),
(7, 5, 1, '2021-04-21', '00:00:00', 'standaard check', 1),
(8, 5, 1, '2021-05-05', '00:00:00', 'standaard check', 1),
(9, 6, 1, '2021-04-21', '00:00:00', 'standaard check', 1),
(10, 6, 1, '2021-05-05', '00:00:00', 'standaard check', 1),
(11, 7, 1, '2021-04-21', '00:00:00', 'standaard check', 1),
(12, 7, 1, '2021-05-05', '00:00:00', 'standaard check', 1),
(13, 8, 1, '2021-04-21', '00:00:00', 'standaard check', 1),
(14, 8, 1, '2021-05-05', '00:00:00', 'standaard check', 1),
(15, 9, 1, '2021-04-21', '00:00:00', 'standaard check', 1),
(16, 9, 1, '2021-05-05', '00:00:00', 'standaard check', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `chore`
--

CREATE TABLE `chore` (
  `choreID` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `choreassignment`
--

CREATE TABLE `choreassignment` (
  `choreAssignmentID` int(11) NOT NULL,
  `inhabitantID` int(11) NOT NULL,
  `choreID` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `dailyquote`
--

CREATE TABLE `dailyquote` (
  `dailyQuoteID` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `dailyquote`
--

INSERT INTO `dailyquote` (`dailyQuoteID`, `description`, `date`) VALUES
(5, 'lets have a nice day', '2021-04-21'),
(6, 'it is a good day', '2021-04-20'),
(8, 'test', '2021-04-08'),
(9, 'test', '2021-04-25'),
(10, 'test2', '2021-04-22');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `doctor`
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

--
-- Gegevens worden geëxporteerd voor tabel `doctor`
--

INSERT INTO `doctor` (`doctorID`, `firstname`, `lastname`, `country`, `city`, `address`, `phoneNumber`, `gender`, `isActive`) VALUES
(1, 'doktor', 'Aaron', 'belgium', 'leuven', 'blijde inkomstraat', '0478915042', 'Male', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `employeeadmin`
--

CREATE TABLE `employeeadmin` (
  `employeeAdminID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `employeeadmin`
--

INSERT INTO `employeeadmin` (`employeeAdminID`, `userID`, `isAdmin`) VALUES
(1, 2, 0),
(2, 6, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `duration` time NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `event`
--

INSERT INTO `event` (`eventID`, `date`, `startTime`, `duration`, `description`) VALUES
(1, '2021-04-22', '15:00:00', '01:00:00', 'fdjlmjqmlj'),
(2, '2021-04-22', '16:00:00', '01:00:00', 'dfqfdqfqdfq'),
(3, '2021-04-22', '15:00:00', '01:00:00', 'fqsdfqfq');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `inhabitant`
--

CREATE TABLE `inhabitant` (
  `inhabitantID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `godParentID` int(11) DEFAULT NULL,
  `arrivalDate` datetime NOT NULL,
  `halfwayDate` datetime DEFAULT NULL,
  `departureDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `inhabitant`
--

INSERT INTO `inhabitant` (`inhabitantID`, `userID`, `godParentID`, `arrivalDate`, `halfwayDate`, `departureDate`) VALUES
(1, 3, 2, '2021-03-16 16:28:59', '2021-03-19 16:28:59', NULL),
(2, 5, 3, '2021-03-16 16:28:59', '2021-03-27 16:28:59', NULL),
(3, 7, 1, '2021-04-13 00:00:00', '2021-05-04 00:00:00', NULL),
(4, 8, 3, '2021-04-13 00:00:00', '2021-05-04 00:00:00', NULL),
(5, 9, 3, '2021-04-13 00:00:00', '2021-05-04 00:00:00', NULL),
(6, 10, 3, '2021-04-13 00:00:00', '2021-05-04 00:00:00', NULL),
(7, 11, 1, '2021-04-13 00:00:00', '2021-05-04 00:00:00', NULL),
(8, 12, 1, '2021-04-13 00:00:00', '2021-05-04 00:00:00', NULL),
(9, 14, 1, '2021-04-13 00:00:00', '2021-05-04 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `journalentry`
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
-- Tabelstructuur voor tabel `note`
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
-- Tabelstructuur voor tabel `progress`
--

CREATE TABLE `progress` (
  `progressID` int(11) NOT NULL,
  `inhabitantID` int(11) NOT NULL,
  `taskID` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `isCompleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `progress`
--

INSERT INTO `progress` (`progressID`, `inhabitantID`, `taskID`, `status`, `isCompleted`) VALUES
(40, 1, 44, NULL, 1),
(41, 2, 44, NULL, 1),
(42, 3, 44, NULL, 1),
(43, 4, 44, NULL, 1),
(44, 5, 44, NULL, 1),
(45, 6, 44, NULL, 1),
(46, 7, 44, NULL, 0),
(47, 8, 44, NULL, 0),
(48, 9, 44, NULL, 0),
(49, 1, 45, NULL, 0),
(50, 2, 45, NULL, 1),
(51, 3, 45, NULL, 1),
(52, 4, 45, NULL, 1),
(53, 5, 45, NULL, 0),
(54, 6, 45, NULL, 0),
(55, 7, 45, NULL, 0),
(56, 8, 45, NULL, 0),
(57, 9, 45, NULL, 0),
(67, 1, 47, NULL, 1),
(68, 2, 47, NULL, 0),
(69, 3, 47, NULL, 0),
(70, 4, 47, NULL, 0),
(71, 5, 47, NULL, 0),
(72, 6, 47, NULL, 0),
(73, 7, 47, NULL, 0),
(74, 8, 47, NULL, 0),
(75, 9, 47, NULL, 0),
(85, 1, 49, NULL, 0),
(86, 2, 49, NULL, 1),
(87, 3, 49, NULL, 1),
(88, 4, 49, NULL, 1),
(89, 5, 49, NULL, 1),
(90, 6, 49, NULL, 0),
(91, 7, 49, NULL, 0),
(92, 8, 49, NULL, 0),
(93, 9, 49, NULL, 0),
(103, 1, 51, NULL, 1),
(104, 2, 51, NULL, 1),
(105, 3, 51, NULL, 1),
(106, 4, 51, NULL, 0),
(107, 5, 51, NULL, 0),
(108, 6, 51, NULL, 0),
(109, 7, 51, NULL, 0),
(110, 8, 51, NULL, 0),
(111, 9, 51, NULL, 0),
(112, 1, 52, NULL, 1),
(113, 2, 52, NULL, 0),
(114, 3, 52, NULL, 0),
(115, 4, 52, NULL, 0),
(116, 5, 52, NULL, 0),
(117, 6, 52, NULL, 0),
(118, 7, 52, NULL, 0),
(119, 8, 52, NULL, 0),
(120, 9, 52, NULL, 0),
(139, 1, 57, NULL, 0),
(140, 2, 57, NULL, 1),
(141, 3, 57, NULL, 0),
(142, 4, 57, NULL, 0),
(143, 5, 57, NULL, 0),
(144, 6, 57, NULL, 0),
(145, 7, 57, NULL, 0),
(146, 8, 57, NULL, 0),
(147, 9, 57, NULL, 0),
(148, 1, 58, NULL, 0),
(149, 2, 58, NULL, 0),
(150, 3, 58, NULL, 0),
(151, 4, 58, NULL, 0),
(152, 5, 58, NULL, 0),
(153, 6, 58, NULL, 0),
(154, 7, 58, NULL, 0),
(155, 8, 58, NULL, 0),
(156, 9, 58, NULL, 0),
(157, 1, 59, NULL, 0),
(158, 2, 59, NULL, 0),
(159, 3, 59, NULL, 0),
(160, 4, 59, NULL, 0),
(161, 5, 59, NULL, 0),
(162, 6, 59, NULL, 0),
(163, 7, 59, NULL, 0),
(164, 8, 59, NULL, 0),
(165, 9, 59, NULL, 0),
(166, 1, 60, NULL, 0),
(167, 2, 60, NULL, 0),
(168, 3, 60, NULL, 0),
(169, 4, 60, NULL, 0),
(170, 5, 60, NULL, 0),
(171, 6, 60, NULL, 0),
(172, 7, 60, NULL, 0),
(173, 8, 60, NULL, 0),
(174, 9, 60, NULL, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `task`
--

CREATE TABLE `task` (
  `taskID` int(11) NOT NULL,
  `phase` varchar(45) NOT NULL,
  `description` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `task`
--

INSERT INTO `task` (`taskID`, `phase`, `description`, `isActive`) VALUES
(38, '2', 'test of insert 3', 0),
(41, '3', 'test of insert 4', 0),
(42, '1', 'test of post4', 0),
(43, '1', 'test of insert 2', 0),
(44, '1', 'test jkmj', 1),
(45, '2', 'kleren aan doen ', 1),
(46, '1', 'kleren wassen 2', 0),
(47, '3', 'slapen', 1),
(48, '4', 'sporten', 0),
(49, '2', 'code schrijven', 1),
(50, '1', 'leren coderen', 0),
(51, '2', 'java leren', 1),
(52, '3', 'html leren', 1),
(53, '2', 'php leren', 0),
(54, '4', 'css leren ', 0),
(55, '1', 'test of post2', 0),
(56, '1', 'test of post23', 0),
(57, '2', 'test laatste post', 1),
(58, '2', 'test laatste post2', 1),
(59, '2', 'TEST TEST', 1),
(60, '2', 'new t', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
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

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `firstname`, `lastname`, `avatar`, `birthday`, `dateAdded`, `isActive`, `gender`) VALUES
(2, 'employee', '$2y$10$koZX.rjg4bJEiaxf0LQ6Su6A08tV7orfJFc1HKJe7HoVqrHNjASlG', 'employee', 'Marie', NULL, '2021-04-07', '2021-04-12 15:26:50', 1, 'female'),
(3, 'inhabitant', '$2y$10$xaGdKPWP90KpAdJd2T7Ytem8vlIqVpq7MFTiEWcD2tBzxVjBChvMy', 'inhabitant', 'Thibault', NULL, '2021-04-02', '2021-04-12 15:28:51', 1, 'male'),
(4, 'inhabitant2', '$2y$10$wFoiYglpdf7TlpphuMEH4eGLyv8is9/Twdy70PU5hQ2nNOV1zroT.', 'inhabitant', '222', NULL, '2021-04-01', '2021-04-12 15:30:56', 1, 'female'),
(5, 'inhabitant3', '$2y$10$BoBCtdwxPUm/4wQ5VQcHnuCnLdSy7uY.n3rRVtjwWnN6D0T472Q.q', 'inhabitant', '666', NULL, '2021-04-03', '2021-04-12 15:34:54', 1, 'female'),
(6, 'admin', '$2y$10$EXaEVl4ZxvOJFdKqCl3B5eYH68q06kv9JLBnltsyOhP3K5.bHbMk6', 'admin', 'Aaron', NULL, '2021-04-02', '2021-04-12 15:37:50', 1, 'female'),
(7, 'inhabitanttask', '$2y$10$OmYRo9AxeNtJnU5rbTdTqOXzaLIiMuKOtrka2jjkfgHMOJ/nQ7LYu', 'inhabitant', 'testtask', NULL, '2021-04-07', '2021-04-13 17:05:32', 1, 'female'),
(8, 'inhabitant44324', '$2y$10$rAVDmzeHBW8HT2CdOFSXc.hi0TF/vVmKHiruEJDXc/uy.0keG2GEK', 'inhabitant', 'test with more', NULL, '2021-04-14', '2021-04-13 18:41:07', 1, 'female'),
(9, 'inhabitant231231', '$2y$10$ui1zRRh6vucrrUFhUdb3MuFsgClkOPJuQunFXG21A4Dufk.mCUba2', 'inhabitant', 'don\'tremeber', NULL, '2021-04-02', '2021-04-13 18:41:32', 1, 'female'),
(10, 'inhabitantfdqfqqfdq', '$2y$10$rKE9x1k.T6hQkMlaj7Jw8eMXiW3Oc9DaU1VRq5xcA3msRRcCFY4k6', 'inhabitant', 'dqfqfqdfqfq', NULL, '2021-04-02', '2021-04-13 18:42:27', 1, 'female'),
(11, 'inhabitantjdkfljq', '$2y$10$I6FBuOCqOazFVrrt3ClaT.bRtnlj0ohdfDLUVKYwonGWFQ1.7CQGa', 'inhabitant', 'tjkldjqfmkljqmjfkmqlj', NULL, '2021-04-01', '2021-04-13 18:44:11', 1, 'female'),
(12, 'inhabitant34243', '$2y$10$gKog/PWPz8VCRroq.Yzscejdg22ApVw2zXCpMYAbGIoWggtZgmeG6', 'inhabitant', 'jdfmlkqjlfmqkfj', NULL, '2021-04-02', '2021-04-13 18:44:36', 1, 'female'),
(14, 'inhabitanttest4', '$2y$10$/hf0RQkO14546VvDo.lqJ.f6Lez6VzCP5XuZBitg9R25YjVqyx8kO', 'inhabitant', 'test3', NULL, '2021-04-02', '2021-04-13 18:45:52', 1, 'female');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `weeklyagenda`
--

CREATE TABLE `weeklyagenda` (
  `weeklyAgendaID` int(11) NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT 1,
  `importFromXML` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `yellowcard`
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
-- Gegevens worden geëxporteerd voor tabel `yellowcard`
--

INSERT INTO `yellowcard` (`yellowCardID`, `employeeAdminID`, `inhabitantID`, `reason`, `date`, `isActive`) VALUES
(1, 1, 3, 'jljmjkljlmjmljkjmj', '2021-04-20 17:54:13', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentID`),
  ADD UNIQUE KEY `appointmentID_UNIQUE` (`appointmentID`),
  ADD KEY `inhabitantToAppointment_idx` (`inhabitantID`),
  ADD KEY `doctorToAppointment_idx` (`doctorID`);

--
-- Indexen voor tabel `chore`
--
ALTER TABLE `chore`
  ADD PRIMARY KEY (`choreID`),
  ADD UNIQUE KEY `choreID_UNIQUE` (`choreID`);

--
-- Indexen voor tabel `choreassignment`
--
ALTER TABLE `choreassignment`
  ADD PRIMARY KEY (`choreAssignmentID`),
  ADD UNIQUE KEY `choreAssignmentID_UNIQUE` (`choreAssignmentID`),
  ADD KEY `imhabitantToChoreAssignment_idx` (`inhabitantID`),
  ADD KEY `choreToChoreAssignment_idx` (`choreID`);

--
-- Indexen voor tabel `dailyquote`
--
ALTER TABLE `dailyquote`
  ADD PRIMARY KEY (`dailyQuoteID`),
  ADD UNIQUE KEY `quoteID_UNIQUE` (`dailyQuoteID`);

--
-- Indexen voor tabel `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorID`),
  ADD UNIQUE KEY `doctorID_UNIQUE` (`doctorID`);

--
-- Indexen voor tabel `employeeadmin`
--
ALTER TABLE `employeeadmin`
  ADD PRIMARY KEY (`employeeAdminID`),
  ADD UNIQUE KEY `employeeAdminID_UNIQUE` (`employeeAdminID`),
  ADD KEY `userToEmployeeAdmin_idx` (`userID`);

--
-- Indexen voor tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`),
  ADD UNIQUE KEY `eventID_UNIQUE` (`eventID`);

--
-- Indexen voor tabel `inhabitant`
--
ALTER TABLE `inhabitant`
  ADD PRIMARY KEY (`inhabitantID`),
  ADD UNIQUE KEY `inhabitantID_UNIQUE` (`inhabitantID`),
  ADD KEY `userID_idx` (`userID`);

--
-- Indexen voor tabel `journalentry`
--
ALTER TABLE `journalentry`
  ADD PRIMARY KEY (`journalEntryID`),
  ADD UNIQUE KEY `journalEntryID_UNIQUE` (`journalEntryID`),
  ADD KEY `inhabitantToJournalEntry_idx` (`inhabitantID`);

--
-- Indexen voor tabel `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`noteID`),
  ADD UNIQUE KEY `noteID_UNIQUE` (`noteID`),
  ADD KEY `employeeAdminToNote_idx` (`employeeAdminID`),
  ADD KEY `inhabitantToNote_idx` (`inhabitantID`);

--
-- Indexen voor tabel `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`progressID`),
  ADD UNIQUE KEY `progressID_UNIQUE` (`progressID`),
  ADD KEY `inhabitantToProgress_idx` (`inhabitantID`),
  ADD KEY `taskToProgress_idx` (`taskID`);

--
-- Indexen voor tabel `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`taskID`),
  ADD UNIQUE KEY `taskID_UNIQUE` (`taskID`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userID_UNIQUE` (`userID`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexen voor tabel `weeklyagenda`
--
ALTER TABLE `weeklyagenda`
  ADD PRIMARY KEY (`weeklyAgendaID`),
  ADD UNIQUE KEY `weeklyAgendaID_UNIQUE` (`weeklyAgendaID`);

--
-- Indexen voor tabel `yellowcard`
--
ALTER TABLE `yellowcard`
  ADD PRIMARY KEY (`yellowCardID`),
  ADD UNIQUE KEY `yellowCardID_UNIQUE` (`yellowCardID`),
  ADD KEY `employeeAdminToYellowCard_idx` (`employeeAdminID`),
  ADD KEY `inhabitantToYellowCard_idx` (`inhabitantID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT voor een tabel `chore`
--
ALTER TABLE `chore`
  MODIFY `choreID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `choreassignment`
--
ALTER TABLE `choreassignment`
  MODIFY `choreAssignmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `dailyquote`
--
ALTER TABLE `dailyquote`
  MODIFY `dailyQuoteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `employeeadmin`
--
ALTER TABLE `employeeadmin`
  MODIFY `employeeAdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `inhabitant`
--
ALTER TABLE `inhabitant`
  MODIFY `inhabitantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `journalentry`
--
ALTER TABLE `journalentry`
  MODIFY `journalEntryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `note`
--
ALTER TABLE `note`
  MODIFY `noteID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `progress`
--
ALTER TABLE `progress`
  MODIFY `progressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT voor een tabel `task`
--
ALTER TABLE `task`
  MODIFY `taskID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `weeklyagenda`
--
ALTER TABLE `weeklyagenda`
  MODIFY `weeklyAgendaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `yellowcard`
--
ALTER TABLE `yellowcard`
  MODIFY `yellowCardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `doctorToAppointment` FOREIGN KEY (`doctorID`) REFERENCES `doctor` (`doctorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inhabitantToAppointment` FOREIGN KEY (`inhabitantID`) REFERENCES `inhabitant` (`inhabitantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `choreassignment`
--
ALTER TABLE `choreassignment`
  ADD CONSTRAINT `choreToChoreAssignment` FOREIGN KEY (`choreID`) REFERENCES `chore` (`choreID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `imhabitantToChoreAssignment` FOREIGN KEY (`inhabitantID`) REFERENCES `inhabitant` (`inhabitantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `employeeadmin`
--
ALTER TABLE `employeeadmin`
  ADD CONSTRAINT `userToEmployeeAdmin` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `inhabitant`
--
ALTER TABLE `inhabitant`
  ADD CONSTRAINT `godParentToInhabitant` FOREIGN KEY (`inhabitantID`) REFERENCES `inhabitant` (`inhabitantID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userToInhabitant` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `journalentry`
--
ALTER TABLE `journalentry`
  ADD CONSTRAINT `inhabitantToJournalEntry` FOREIGN KEY (`inhabitantID`) REFERENCES `inhabitant` (`inhabitantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `employeeAdminToNote` FOREIGN KEY (`employeeAdminID`) REFERENCES `employeeadmin` (`employeeAdminID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inhabitantToNote` FOREIGN KEY (`inhabitantID`) REFERENCES `inhabitant` (`inhabitantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `inhabitantToProgress` FOREIGN KEY (`inhabitantID`) REFERENCES `inhabitant` (`inhabitantID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `taskToProgress` FOREIGN KEY (`taskID`) REFERENCES `task` (`taskID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `yellowcard`
--
ALTER TABLE `yellowcard`
  ADD CONSTRAINT `employeeAdminToYellowCard` FOREIGN KEY (`employeeAdminID`) REFERENCES `employeeadmin` (`employeeAdminID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inhabitantToYellowCard` FOREIGN KEY (`inhabitantID`) REFERENCES `inhabitant` (`inhabitantID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
