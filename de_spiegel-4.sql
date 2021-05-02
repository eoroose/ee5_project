-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 02 mei 2021 om 12:20
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
  `date` datetime NOT NULL,
  `reason` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `appointment`
--

INSERT INTO `appointment` (`appointmentID`, `inhabitantID`, `doctorID`, `date`, `reason`, `isActive`) VALUES
(1, 3, 1, '2021-03-23 00:00:00', 'standaard check', 1),
(2, 3, 1, '2021-04-06 03:00:00', 'standaard check', 1),
(3, 14, 2, '2021-03-24 00:00:00', 'standaard check', 1),
(4, 14, 2, '2021-04-07 00:00:00', 'standaard check', 1),
(5, 15, 1, '2021-03-24 00:00:00', 'standaard check', 1),
(6, 15, 1, '2021-04-07 00:00:00', 'standaard check', 1),
(7, 16, 1, '2021-03-24 00:00:00', 'standaard check', 1),
(8, 16, 1, '2021-04-07 00:00:00', 'standaard check', 1),
(9, 17, 1, '2021-03-24 00:00:00', 'standaard check', 1),
(10, 17, 1, '2021-04-07 00:00:00', 'standaard check', 1),
(11, 18, 1, '2021-03-24 00:00:00', 'standaard check', 1),
(12, 18, 1, '2021-04-07 00:00:00', 'standaard check', 1),
(13, 19, 1, '2021-03-24 00:00:00', 'standaard check', 1),
(14, 19, 1, '2021-04-07 00:00:00', 'standaard check', 1),
(15, 20, 1, '2021-03-24 00:00:00', 'standaard check', 1),
(16, 20, 1, '2021-04-07 00:00:00', 'standaard check', 1),
(17, 21, 1, '2021-03-24 00:00:00', 'standaard check', 1),
(18, 21, 1, '2021-04-07 00:00:00', 'standaard check', 1),
(19, 22, 2, '2021-03-24 00:00:00', 'standaard check', 1),
(20, 22, 2, '2021-04-07 00:00:00', 'standaard check', 1),
(21, 23, 1, '2021-04-09 00:00:00', 'standaard check', 1),
(22, 23, 1, '2021-04-23 00:00:00', 'standaard check', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `avatars`
--

CREATE TABLE `avatars` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `avatars`
--

INSERT INTO `avatars` (`id`, `title`, `location`) VALUES
(1, 'Vrouw 1', '/assets/avatars/avatar-1.svg'),
(2, 'Vrouw 2', '/assets/avatars/avatar-2.svg'),
(3, 'Vrouw 3', '/assets/avatars/avatar-3.svg'),
(4, 'Vrouw 4', '/assets/avatars/avatar-4.svg'),
(5, 'Vrouw 5', '/assets/avatars/avatar-5.svg'),
(6, 'Vrouw 6', '/assets/avatars/avatar-6.svg'),
(7, 'Vrouw 7', '/assets/avatars/avatar-7.svg'),
(8, 'Vrouw 8', '/assets/avatars/avatar-8.svg'),
(9, 'Vrouw 9', '/assets/avatars/avatar.svg'),
(10, 'Jongen 1', '/assets/avatars/boy.svg'),
(11, 'Meisje 1', '/assets/avatars/girl (1).svg'),
(12, 'Meisje 2', '/assets/avatars/girl (2).svg'),
(13, 'Meisje 3', '/assets/avatars/girl.svg'),
(14, 'Hippie 1', '/assets/avatars/hippie.svg'),
(15, 'Man 2', '/assets/avatars/man (2).svg'),
(16, 'Man 3', '/assets/avatars/man (3).svg'),
(17, 'Man 4', '/assets/avatars/man (4).svg'),
(18, 'Man 5', '/assets/avatars/man (5).svg'),
(19, 'Man 6', '/assets/avatars/man (6).svg'),
(20, 'Man 7', '/assets/avatars/man (7).svg'),
(21, 'Man 8', '/assets/avatars/man (8).svg'),
(22, 'Man 9', '/assets/avatars/man (9).svg'),
(23, 'Man 10', '/assets/avatars/man (10).svg'),
(24, 'Man 11', '/assets/avatars/man (11).svg'),
(25, 'Man 12', '/assets/avatars/man (12).svg'),
(26, 'Man 13', '/assets/avatars/man.svg'),
(27, 'Man 14', '/assets/avatars/man-1.svg'),
(28, 'Man 15', '/assets/avatars/man-2.svg'),
(29, 'Man 16', '/assets/avatars/man-3.svg'),
(30, 'Man 17', '/assets/avatars/man-4.svg'),
(31, 'Man 18', '/assets/avatars/man-5.svg'),
(32, 'Man 19', '/assets/avatars/man-6.svg'),
(33, 'Man 20', '/assets/avatars/man-7.svg'),
(34, 'Man 21', '/assets/avatars/man-8.svg'),
(35, 'Punk Man', '/assets/avatars/punk.svg'),
(36, 'Vrouw 10', '/assets/avatars/woman (1).svg'),
(37, 'Vrouw 11', '/assets/avatars/woman (2).svg'),
(38, 'Vrouw 12', '/assets/avatars/woman (3).svg'),
(39, 'Vrouw 13', '/assets/avatars/woman (4).svg'),
(40, 'Vrouw 14', '/assets/avatars/woman (5).svg'),
(41, 'Vrouw 15', '/assets/avatars/woman (6).svg'),
(42, 'Vrouw 16', '/assets/avatars/woman-1.svg'),
(43, 'Vrouw 17', '/assets/avatars/woman-2.svg'),
(44, 'Vrouw 18', '/assets/avatars/woman-3.svg'),
(45, 'Vrouw 19', '/assets/avatars/woman-4.svg'),
(46, 'Vrouw 20', '/assets/avatars/woman-5.svg'),
(47, 'Vrouw 21', '/assets/avatars/woman-6.svg'),
(48, 'Vrouw 22', '/assets/avatars/woman-7.svg'),
(49, 'Vrouw 23', '/assets/avatars/woman.svg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `chore`
--

CREATE TABLE `chore` (
  `choreID` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `chore`
--

INSERT INTO `chore` (`choreID`, `description`) VALUES
(1, 'Not Assigned'),
(2, 'Household'),
(3, 'Kitchen'),
(4, 'Weekday Responsible'),
(5, 'Weekdend Responsible');

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
(10, 'test2', '2021-04-22'),
(11, 'Programming isn\'t about what you know; it\'s about what you can figure out.', '2021-04-27'),
(12, '', '0000-00-00'),
(13, 'a quote today?', '2021-04-29');

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
(2, 6, 1),
(17, 50, 0);

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
-- Tabelstructuur voor tabel `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `start1` date NOT NULL,
  `startTime` time NOT NULL,
  `start` datetime DEFAULT NULL,
  `duration` time NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `endTime` time NOT NULL,
  `allDay` varchar(5) NOT NULL,
  `end` datetime DEFAULT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `events`
--

INSERT INTO `events` (`id`, `start1`, `startTime`, `start`, `duration`, `title`, `endTime`, `allDay`, `end`, `color`) VALUES
(1, '2021-04-13', '15:00:00', '2021-04-14 14:00:00', '01:00:00', 'eerste', '16:00:00', 'true', '0000-00-00 00:00:00', ''),
(2, '2021-01-07', '16:00:00', '2021-01-05 16:09:02', '01:00:00', 'tweede', '17:00:00', 'false', NULL, ''),
(6, '2021-04-07', '17:00:00', '2021-04-13 21:32:27', '01:00:00', 'derde', '18:00:00', 'true', '0000-00-00 00:00:00', ''),
(7, '2021-04-07', '18:00:00', '2021-04-18 20:17:03', '01:00:00', 'eten', '19:00:00', 'false', NULL, ''),
(8, '2021-04-07', '19:00:00', '0000-00-00 00:00:00', '01:00:00', 'afwassen', '20:00:00', 'false', NULL, ''),
(43, '2021-04-14', '00:00:00', '0000-00-00 00:00:00', '00:00:00', 'test', '00:00:00', 'false', NULL, ''),
(45, '0000-00-00', '00:00:00', '0000-00-00 00:00:00', '00:00:00', 'test', '00:00:00', '', NULL, ''),
(46, '0000-00-00', '00:00:00', '2021-04-19 00:00:00', '00:00:00', 'azert', '00:00:00', '', NULL, ''),
(47, '0000-00-00', '00:00:00', '0000-00-00 00:00:00', '00:00:00', '8', '00:00:00', '', NULL, ''),
(48, '0000-00-00', '00:00:00', '0000-00-00 00:00:00', '00:00:00', '8', '00:00:00', '', NULL, ''),
(49, '0000-00-00', '00:00:00', '0000-00-00 00:00:00', '00:00:00', '8', '00:00:00', '', NULL, ''),
(50, '0000-00-00', '00:00:00', NULL, '00:00:00', NULL, '00:00:00', '', NULL, ''),
(51, '0000-00-00', '00:00:00', NULL, '00:00:00', NULL, '00:00:00', '', NULL, ''),
(52, '0000-00-00', '00:00:00', '2021-04-08 00:00:00', '00:00:00', 'New event', '00:00:00', '', '2021-04-11 00:00:00', ''),
(53, '0000-00-00', '00:00:00', '2021-04-12 10:30:00', '00:00:00', 'New event', '00:00:00', '', '2021-04-12 16:30:00', ''),
(54, '0000-00-00', '00:00:00', '2021-03-29 00:00:00', '00:00:00', 'New event 2', '00:00:00', '', '2021-04-03 00:00:00', ''),
(55, '0000-00-00', '00:00:00', '2021-04-16 00:00:00', '00:00:00', 'New event', '00:00:00', '', '2021-04-17 00:00:00', ''),
(56, '0000-00-00', '00:00:00', '2021-03-31 00:00:00', '00:00:00', 'New event', '00:00:00', '', '2021-04-01 00:00:00', ''),
(57, '0000-00-00', '00:00:00', '2021-04-05 00:00:00', '00:00:00', 'New event', '00:00:00', '', '2021-04-06 00:00:00', ''),
(58, '0000-00-00', '00:00:00', '2021-04-06 00:00:00', '00:00:00', 'qsdf', '00:00:00', '', '2021-04-22 00:00:00', ''),
(59, '0000-00-00', '00:00:00', '2021-04-23 00:00:00', '00:00:00', 'dvf', '00:00:00', '', '2021-04-24 00:00:00', ''),
(60, '0000-00-00', '00:00:00', '2021-04-27 00:00:00', '00:00:00', 'sdf', '00:00:00', '', '2021-04-25 00:00:00', ''),
(61, '0000-00-00', '00:00:00', '2021-04-25 00:00:00', '00:00:00', 'sdsd', '00:00:00', '', '2021-04-26 00:00:00', ''),
(62, '0000-00-00', '00:00:00', '2021-03-30 04:06:00', '00:00:00', 'test', '00:00:00', '', '2021-04-08 21:32:00', ''),
(65, '0000-00-00', '00:00:00', '2021-04-13 00:00:00', '00:00:00', 'azert', '00:00:00', '', '2021-04-10 00:00:00', ''),
(66, '0000-00-00', '00:00:00', '2021-04-29 12:00:00', '00:00:00', 'azert', '00:00:00', '', '1970-01-01 01:00:00', ''),
(67, '0000-00-00', '00:00:00', '2021-05-01 00:00:00', '00:00:00', 'azert', '00:00:00', '', '0000-00-00 00:00:00', ''),
(68, '0000-00-00', '00:00:00', '0000-00-00 00:00:00', '00:00:00', '', '00:00:00', '', '0000-00-00 00:00:00', ''),
(69, '0000-00-00', '00:00:00', '2021-04-15 00:00:00', '00:00:00', 'green', '00:00:00', '', '2021-04-15 00:00:00', ''),
(71, '0000-00-00', '00:00:00', '2021-04-01 00:00:00', '00:00:00', 'New event', '00:00:00', '', '2021-04-04 00:00:00', ''),
(72, '0000-00-00', '00:00:00', '0000-00-00 00:00:00', '00:00:00', 'test', '00:00:00', '', '0000-00-00 00:00:00', '#e66465'),
(73, '0000-00-00', '00:00:00', '0000-00-00 00:00:00', '00:00:00', 'sdf', '00:00:00', '', '0000-00-00 00:00:00', '#e66465'),
(74, '0000-00-00', '00:00:00', '2021-04-14 00:00:00', '00:00:00', 'azert', '00:00:00', '', '2021-04-14 00:00:00', '#e66465'),
(75, '0000-00-00', '00:00:00', '2021-04-14 05:44:00', '00:00:00', 'test', '00:00:00', '', '2021-04-14 22:52:00', '#e66465'),
(76, '0000-00-00', '00:00:00', '0000-00-00 00:00:00', '00:00:00', '', '00:00:00', '', '0000-00-00 00:00:00', '#e66465'),
(77, '0000-00-00', '00:00:00', '2021-04-13 00:00:00', '00:00:00', '', '00:00:00', '', '2021-04-16 00:00:00', '#e66465'),
(78, '0000-00-00', '00:00:00', '2021-04-01 00:00:00', '00:00:00', 'test2', '00:00:00', '', '2021-04-02 00:00:00', '#e66465'),
(79, '0000-00-00', '00:00:00', '2021-03-30 00:00:00', '00:00:00', 'test2', '00:00:00', '', '2021-04-04 00:00:00', '#e66465'),
(80, '0000-00-00', '00:00:00', '2021-04-20 05:06:00', '00:00:00', 'test2', '00:00:00', '', '2021-04-20 03:00:00', '#e66465'),
(81, '0000-00-00', '00:00:00', '2021-04-08 17:26:00', '00:00:00', 'jnkdzfv', '00:00:00', '', '2021-04-22 17:27:00', '#b602f7'),
(82, '0000-00-00', '00:00:00', '2021-04-17 23:18:00', '00:00:00', 'tester', '00:00:00', '', '1970-01-01 01:00:00', '#e66465'),
(83, '0000-00-00', '00:00:00', '2021-04-27 17:00:00', '00:00:00', 'test', '00:00:00', '', '2021-04-27 18:00:00', '#e66465'),
(84, '0000-00-00', '00:00:00', '2021-04-29 20:00:00', '00:00:00', 'test', '00:00:00', '', '2021-04-30 00:00:00', '#e66465');

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
  `departureDate` datetime DEFAULT NULL,
  `chore` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `inhabitant`
--

INSERT INTO `inhabitant` (`inhabitantID`, `userID`, `godParentID`, `arrivalDate`, `halfwayDate`, `departureDate`, `chore`) VALUES
(1, 3, 2, '2021-03-16 16:28:59', '2021-03-19 16:28:59', NULL, 1),
(2, 5, 3, '2021-03-16 16:28:59', '2021-03-27 16:28:59', NULL, 2),
(3, 7, 1, '2021-04-13 00:00:00', '2021-05-04 00:00:00', NULL, 1),
(4, 8, 3, '2021-04-13 00:00:00', '2021-05-04 00:00:00', NULL, 2),
(5, 9, 3, '2021-04-13 00:00:00', '2021-05-04 00:00:00', NULL, 2),
(6, 10, 3, '2021-04-13 00:00:00', '2021-05-04 00:00:00', NULL, 5),
(7, 11, 1, '2021-04-13 00:00:00', '2021-05-04 00:00:00', NULL, 5),
(8, 12, 1, '2021-04-13 00:00:00', '2021-05-04 00:00:00', NULL, 5),
(9, 14, 1, '2021-04-13 00:00:00', '2021-05-04 00:00:00', NULL, 5);

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

--
-- Gegevens worden geëxporteerd voor tabel `journalentry`
--

INSERT INTO `journalentry` (`journalEntryID`, `inhabitantID`, `title`, `entry`, `date`, `isActive`) VALUES
(1, 9, 'tst', 'tstsdfqfdq', '2021-04-24 16:55:09', 1),
(16, 9, 'test', 'test it fit worklqjfklja', '2021-04-27 14:37:55', 1),
(17, 9, 'fdqf', 'fdqfqfq', '2021-04-27 14:38:10', 1),
(18, 9, 'fqjfqmj', 'jfqljmlq', '2021-04-27 14:40:39', 1);

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
(175, 1, 61, NULL, 1),
(176, 2, 61, NULL, 0),
(177, 3, 61, NULL, 0),
(178, 4, 61, NULL, 0),
(179, 5, 61, NULL, 0),
(180, 6, 61, NULL, 0),
(181, 7, 61, NULL, 0),
(182, 8, 61, NULL, 0),
(183, 9, 61, NULL, 0),
(184, 1, 62, NULL, 1),
(185, 2, 62, NULL, 0),
(186, 3, 62, NULL, 0),
(187, 4, 62, NULL, 0),
(188, 5, 62, NULL, 0),
(189, 6, 62, NULL, 0),
(190, 7, 62, NULL, 0),
(191, 8, 62, NULL, 0),
(192, 9, 62, NULL, 0),
(193, 1, 63, NULL, 1),
(194, 2, 63, NULL, 0),
(195, 3, 63, NULL, 0),
(196, 4, 63, NULL, 0),
(197, 5, 63, NULL, 0),
(198, 6, 63, NULL, 0),
(199, 7, 63, NULL, 0),
(200, 8, 63, NULL, 0),
(201, 9, 63, NULL, 0),
(202, 1, 64, NULL, 1),
(203, 2, 64, NULL, 0),
(204, 3, 64, NULL, 0),
(205, 4, 64, NULL, 0),
(206, 5, 64, NULL, 0),
(207, 6, 64, NULL, 0),
(208, 7, 64, NULL, 0),
(209, 8, 64, NULL, 0),
(210, 9, 64, NULL, 0),
(211, 1, 65, NULL, 1),
(212, 2, 65, NULL, 0),
(213, 3, 65, NULL, 0),
(214, 4, 65, NULL, 0),
(215, 5, 65, NULL, 0),
(216, 6, 65, NULL, 0),
(217, 7, 65, NULL, 0),
(218, 8, 65, NULL, 0),
(219, 9, 65, NULL, 0),
(220, 1, 66, NULL, 1),
(221, 2, 66, NULL, 0),
(222, 3, 66, NULL, 0),
(223, 4, 66, NULL, 0),
(224, 5, 66, NULL, 0),
(225, 6, 66, NULL, 0),
(226, 7, 66, NULL, 0),
(227, 8, 66, NULL, 0),
(228, 9, 66, NULL, 0),
(229, 1, 67, NULL, 1),
(230, 2, 67, NULL, 0),
(231, 3, 67, NULL, 0),
(232, 4, 67, NULL, 0),
(233, 5, 67, NULL, 0),
(234, 6, 67, NULL, 0),
(235, 7, 67, NULL, 0),
(236, 8, 67, NULL, 0),
(237, 9, 67, NULL, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recurringevents`
--

CREATE TABLE `recurringevents` (
  `id` int(11) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `daysOfWeek` varchar(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `color` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `recurringevents`
--

INSERT INTO `recurringevents` (`id`, `startTime`, `endTime`, `daysOfWeek`, `title`, `color`) VALUES
(4, '20:54:36', '22:54:36', '1,2,3,4,5', 'recurring event', ''),
(6, '00:00:00', '00:00:00', '1,5,', '', '#e66465'),
(7, '10:00:00', '11:00:00', '3,4,', 'test recurring event', '#8b0e0e'),
(8, '10:00:00', '12:00:00', '3,4,', 'test recuring event 2', '#8b0e0e');

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
(44, '1', 'test jkmj', 0),
(45, '2', 'kleren aan doen ', 0),
(46, '1', 'kleren wassen 2', 0),
(47, '3', 'slapen', 0),
(48, '4', 'sporten', 0),
(49, '1', '                                                                                                trye', 0),
(50, '1', 'leren coderen', 0),
(51, '2', '           test test                                                                                ', 0),
(52, '3', 'html leren', 0),
(53, '2', 'php leren', 0),
(54, '4', 'css leren ', 0),
(55, '1', 'test of post2', 0),
(56, '1', 'test of post23', 0),
(57, '2', '                                                                        test laatste post           ', 0),
(58, '2', '                        test laatste post2                    ', 0),
(59, '2', '                        TEST TEST                    ', 0),
(60, '2', 'new t', 0),
(61, '1', 'description invoegen hier', 1),
(62, '2', 'test', 1),
(63, '3', 'Make progress page inhabitant', 1),
(64, '1', 'Make backbone of site', 1),
(65, '1', 'get a idea of style', 1),
(66, '2', 'work hard on site', 1),
(67, '3', 'present to spiegel', 1);

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
(2, 'employee', '$2y$10$YW.E5eHZ0nAI2F8q22QFb.6XltSBWRCuJiDON0esLNENXfou5Eiym', 'employee', 'Marie', '1', '2021-04-07', '2021-04-12 15:26:50', 1, 'female'),
(3, 'inhabitant', '$2y$10$3r/j604B0ZDhLoOD8a5SK.oPZWsLCvCTc3Ih029/RwF.2vg0rBj72', 'inhabitant', 'Thibault', '1', '2021-04-02', '2021-04-12 15:28:51', 1, 'male'),
(4, 'inhabitant2', '$2y$10$wFoiYglpdf7TlpphuMEH4eGLyv8is9/Twdy70PU5hQ2nNOV1zroT.', 'inhabitant', '222', '1', '2021-04-01', '2021-04-12 15:30:56', 1, 'female'),
(5, 'inhabitant3', '$2y$10$BoBCtdwxPUm/4wQ5VQcHnuCnLdSy7uY.n3rRVtjwWnN6D0T472Q.q', 'inhabitant', '666', '1', '2021-04-03', '2021-04-12 15:34:54', 1, 'female'),
(6, 'admin', '$2y$10$EXaEVl4ZxvOJFdKqCl3B5eYH68q06kv9JLBnltsyOhP3K5.bHbMk6', 'admin', 'Aaron', '1', '2021-04-02', '2021-04-12 15:37:50', 1, 'female'),
(7, 'inhabitanttask', '$2y$10$OmYRo9AxeNtJnU5rbTdTqOXzaLIiMuKOtrka2jjkfgHMOJ/nQ7LYu', 'inhabitant', 'testtask', '1', '2021-04-07', '2021-04-13 17:05:32', 1, 'female'),
(8, 'inhabitant44324', '$2y$10$rAVDmzeHBW8HT2CdOFSXc.hi0TF/vVmKHiruEJDXc/uy.0keG2GEK', 'inhabitant', 'test with more', '1', '2021-04-14', '2021-04-13 18:41:07', 1, 'female'),
(9, 'inhabitant231231', '$2y$10$ui1zRRh6vucrrUFhUdb3MuFsgClkOPJuQunFXG21A4Dufk.mCUba2', 'inhabitant', 'don\'tremeber', '1', '2021-04-02', '2021-04-13 18:41:32', 1, 'female'),
(10, 'inhabitantfdqfqqfdq', '$2y$10$rKE9x1k.T6hQkMlaj7Jw8eMXiW3Oc9DaU1VRq5xcA3msRRcCFY4k6', 'inhabitant', 'dqfqfqdfqfq', '1', '2021-04-02', '2021-04-13 18:42:27', 1, 'female'),
(11, 'inhabitantjdkfljq', '$2y$10$I6FBuOCqOazFVrrt3ClaT.bRtnlj0ohdfDLUVKYwonGWFQ1.7CQGa', 'inhabitant', 'tjkldjqfmkljqmjfkmqlj', '1', '2021-04-01', '2021-04-13 18:44:11', 1, 'female'),
(12, 'inhabitant34243', '$2y$10$gKog/PWPz8VCRroq.Yzscejdg22ApVw2zXCpMYAbGIoWggtZgmeG6', 'inhabitant', 'jdfmlkqjlfmqkfj', '1', '2021-04-02', '2021-04-13 18:44:36', 1, 'female'),
(14, 'inhabitanttest4', '$2y$10$/hf0RQkO14546VvDo.lqJ.f6Lez6VzCP5XuZBitg9R25YjVqyx8kO', 'inhabitant', 'test3', '1', '2021-04-02', '2021-04-13 18:45:52', 1, 'female'),
(50, 'employeeavatar', '$2y$10$a5pHflcm4NElD2S0xNiJruql0HamLrj3W2A7H0l.fES/2uK5Tm2Te', 'employee', 'avatar', '2', '2021-04-29', '2021-04-29 14:56:59', 1, 'female');

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
-- Indexen voor tabel `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`);

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
-- Indexen voor tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `inhabitant`
--
ALTER TABLE `inhabitant`
  ADD PRIMARY KEY (`inhabitantID`),
  ADD UNIQUE KEY `inhabitantID_UNIQUE` (`inhabitantID`),
  ADD KEY `userID_idx` (`userID`),
  ADD KEY `ChoreForeignKey` (`chore`);

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
-- Indexen voor tabel `recurringevents`
--
ALTER TABLE `recurringevents`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT voor een tabel `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT voor een tabel `chore`
--
ALTER TABLE `chore`
  MODIFY `choreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `choreassignment`
--
ALTER TABLE `choreassignment`
  MODIFY `choreAssignmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `dailyquote`
--
ALTER TABLE `dailyquote`
  MODIFY `dailyQuoteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `employeeadmin`
--
ALTER TABLE `employeeadmin`
  MODIFY `employeeAdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT voor een tabel `inhabitant`
--
ALTER TABLE `inhabitant`
  MODIFY `inhabitantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT voor een tabel `journalentry`
--
ALTER TABLE `journalentry`
  MODIFY `journalEntryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `note`
--
ALTER TABLE `note`
  MODIFY `noteID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `progress`
--
ALTER TABLE `progress`
  MODIFY `progressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT voor een tabel `recurringevents`
--
ALTER TABLE `recurringevents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `task`
--
ALTER TABLE `task`
  MODIFY `taskID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
  ADD CONSTRAINT `ChoreForeignKey` FOREIGN KEY (`chore`) REFERENCES `chore` (`choreID`) ON DELETE CASCADE ON UPDATE CASCADE,
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
