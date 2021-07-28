-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 11:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `CID` int(11) NOT NULL,
  `LOCATION` varchar(128) DEFAULT NULL,
  `CNAME` varchar(128) DEFAULT NULL,
  `HEAD` varchar(128) DEFAULT NULL,
  `USERNAME` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`CID`, `LOCATION`, `CNAME`, `HEAD`, `USERNAME`) VALUES
(1, 'Bangalore', 'Sports', 'Rohith N', 'Rohith'),
(2, 'Bangalore', 'Art', 'Ranga ', 'Ranga'),
(3, 'Bangalore', 'Music', 'Gaana', 'Gaana'),
(4, 'Bangalore', 'Dance', 'Nataraja N', 'Nataraja'),
(5, 'Bangalore', 'Coding', 'Rohit Joshi', 'Rohitjoshi'),
(6, 'Bangalore', 'Literature', 'Vyasa Veda', 'Vyasa');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EID` int(11) NOT NULL,
  `EVENT_NAME` varchar(128) DEFAULT NULL,
  `PARTICIPATION_COST` varchar(128) DEFAULT NULL,
  `EVENT_MODE` varchar(128) DEFAULT NULL,
  `EVENT_DATE` date DEFAULT NULL,
  `EVENT_PRIZES` varchar(128) DEFAULT NULL,
  `CID` int(11) DEFAULT NULL,
  `LID` int(11) DEFAULT NULL,
  `EXID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EID`, `EVENT_NAME`, `PARTICIPATION_COST`, `EVENT_MODE`, `EVENT_DATE`, `EVENT_PRIZES`, `CID`, `LID`, `EXID`) VALUES
(101, 'RNSPL', '500', 'ON', '2021-11-16', '34', 1, 6, 23),
(102, 'Basket Ball Fire', '100', 'OFF', '2021-11-21', '100', 1, 0, 4),
(103, 'Chess Tournament', '500', 'ON', '2021-11-18', '500', 1, 3, 23),
(104, 'Soccer', '60', 'OFF', '2021-11-16', '100', 1, 0, 6),
(201, 'picasso', '250', 'OFF', '2021-11-18', '250', 2, 9, 20),
(202, 'Pencil Shading', '70', 'OFF', '2021-11-18', '500', 2, 17, 8),
(203, 'Speed Drawing', '100', 'OFF', '2000-11-11', '150', 2, 15, 16),
(204, 'Speed Drawing 2', '100', 'OFF', '2021-11-11', '150', 2, 18, 13),
(301, 'Singing Maestro', '50', 'OFF', '2021-11-21', '100', 3, 12, 13),
(302, 'Tabla Showdown', '100', 'OFF', '2021-11-11', '1000', 3, 12, 5),
(303, 'Instrument gala', '100', 'ON', '2021-11-11', '100', 3, 3, 22),
(304, 'Music Night', '100', 'ON', '2021-11-21', '1000', 3, 3, 5),
(401, 'Western dance', '100', 'OFF', '2021-11-21', '250', 4, 12, 10),
(402, 'Bharatanatyam', '100', 'OFF', '2021-11-16', '150', 4, 6, 4),
(403, 'Kathak', '100', 'OFF', '2021-11-16', '250', 4, 10, 4),
(404, 'Fusion', '250', 'OFF', '2000-11-11', '1000', 4, 6, 23),
(501, 'Algo Expert', '0', 'ON', '2021-11-21', '250', 5, 8, 1),
(502, 'Violent Coding', '100', 'ON', '2021-11-11', '250', 5, 7, 7),
(503, 'Logical thinking', '45', 'ON', '2021-11-18', '250', 5, 6, 15),
(504, 'Comp-Funda', '45', 'ON', '2021-11-11', '100', 5, 12, 10),
(601, 'Poetic', '45', 'OFF', '2021-11-16', '100', 6, 12, 6),
(602, 'bookworm', '100', 'ON', '2021-11-11', '250', 6, 8, 6),
(603, 'Bookish', '100', 'OFF', '2000-11-11', '100', 6, 2, 19),
(604, 'Essay Competition', '100', 'OFF', '2021-11-16', '100', 6, 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `EXID` int(11) NOT NULL,
  `BUDGET` int(11) DEFAULT NULL,
  `EXPENSES` int(11) DEFAULT NULL,
  `COLLECTION_COUNT` int(11) DEFAULT NULL,
  `PROFIT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`EXID`, `BUDGET`, `EXPENSES`, `COLLECTION_COUNT`, `PROFIT`) VALUES
(0, 0, 0, 0, 0),
(1, 3452, 344, 2443, 2099),
(2, 2, 0, 90, 90),
(3, 1000, 700, 2000, 1300),
(4, 500, 200, 500, 300),
(5, 250, 100, 500, 400),
(6, 300, 300, 600, 300),
(7, 500, 500, 1000, 500),
(8, 400, 350, 350, 0),
(9, 500, 450, 455, 5),
(10, 500, 450, 600, 150),
(11, 1000, 800, 890, 90),
(12, 1000, 500, 950, 450),
(13, 1000, 1000, 800, -200),
(14, 2000, 1000, 1500, 500),
(15, 2000, 1500, 2000, 500),
(16, 5000, 4500, 10000, 5500),
(17, 1000, 1000, 2000, 1000),
(18, 100, 500, 1000, 500),
(19, 500, 250, 250, 0),
(20, 500, 250, 200, -50),
(21, 500, 300, 200, -100),
(22, 500, 300, 150, -150),
(23, 500, 300, 500, 200),
(24, 1000, 950, 2000, 1050),
(45, 234, 300, 90, -210),
(231, 500, 10, 90, 80);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LID` int(11) NOT NULL,
  `DEPARTMENT` varchar(128) DEFAULT NULL,
  `FLOOR` int(11) DEFAULT NULL,
  `ROOM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LID`, `DEPARTMENT`, `FLOOR`, `ROOM`) VALUES
(0, '-', 0, 0),
(1, 'CIV', 1, 1),
(2, 'CIV', 1, 2),
(3, 'CIV', 1, 3),
(4, 'CIV', 1, 4),
(5, 'PHY', 1, 12),
(6, 'PHY', 1, 13),
(7, 'PHY', 1, 14),
(8, 'PHY', 1, 15),
(9, 'PHY', 1, 20),
(10, 'PHY', 1, 21),
(11, 'PHY', 1, 22),
(12, 'PHY', 1, 23),
(13, 'CS', 3, 121),
(14, 'CS', 3, 122),
(15, 'CS', 3, 123),
(16, 'CS', 3, 124),
(17, 'ME', 2, 40),
(18, 'ME', 2, 41),
(19, 'ME', 2, 42),
(20, 'ME', 2, 43),
(21, 'EEE', 1, 20),
(22, 'EEE', 1, 21),
(23, 'EEE', 1, 22),
(24, 'EEE', 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MID` int(11) NOT NULL,
  `NAME` varchar(128) DEFAULT NULL,
  `DEPARTMENT` varchar(128) DEFAULT NULL,
  `USN` varchar(128) DEFAULT NULL,
  `PHNO` varchar(128) DEFAULT NULL,
  `CID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MID`, `NAME`, `DEPARTMENT`, `USN`, `PHNO`, `CID`) VALUES
(101, 'rohit', 'cse', '1rn18cs088', '1234567890', 1),
(102, 'sanjay', 'cse', '1rn18cs085', '1234567890', 1),
(103, 'dhawal', 'ECE', '1rn18cs082', '8545886514', 1),
(104, 'ashwini', 'CIV', '1rn18cv038', '9548886514', 1),
(201, 'dhawal', 'ECE', '1rn18ec080', '9548886514', 2),
(202, 'komal', 'CSE', '1rn18cs089', '8545886514', 2),
(203, 'vinod', 'ise', '1rn18is088', '9548866514', 2),
(204, 'vinayvk', 'cse', '1rn18cs122', '9548966514', 2),
(301, 'dhanush', 'ec', '1rn18ec038', '9548866555', 3),
(302, 'shruthi', 'PHY', '1rn18ph128', '9548866567', 3),
(303, 'amogh', 'cse', '1rn18cs056', '8549956512', 3),
(304, 'mohan', 'cse', '1rn18cs078', '8545886514', 3),
(401, 'dhawal', 'cse', '1rn18cs097', '9548886514', 4),
(402, 'chetana', 'ece', '1rn18ec099', '8548866517', 4),
(403, 'karan', 'PHY', '1rn18ph028', '1234567890', 4),
(404, 'sneha', 'CIV', '1rn18cv048', '8544886514', 4),
(501, 'rakesh', 'cse', '1rn17cs801', '1234567890', 5),
(502, 'yamuna', 'ec', '1rn18ec089', '9548866514', 5),
(503, 'aarav', 'civ', '1rn18cv008', '8545886514', 5),
(504, 'abhinav', 'cse', '1rn18cs078', '8545886514', 5),
(601, 'swathi', 'ise', '1rn18is098', '7549906512', 6),
(602, 'dhawan', 'ECE', '1rn18ec068', '9548888914', 6),
(603, 'kiran', 'CIV', '1rn18cv018', '8545880514', 6),
(604, 'akshay', 'CSE', '1rn18cs090', '9548866514', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pass`
--

CREATE TABLE `pass` (
  `NAME` varchar(128) NOT NULL,
  `PASSWORD` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pass`
--

INSERT INTO `pass` (`NAME`, `PASSWORD`) VALUES
('Gaana', 'music'),
('Nataraja', 'dance'),
('Ranga', 'art'),
('Rohith', 'sports'),
('Rohitjoshi', 'coding'),
('Vyasa', 'literature');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`CID`),
  ADD KEY `club_fk` (`USERNAME`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EID`),
  ADD KEY `eve_fk` (`CID`),
  ADD KEY `exp_fk` (`EXID`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`EXID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MID`),
  ADD KEY `my_fk` (`CID`);

--
-- Indexes for table `pass`
--
ALTER TABLE `pass`
  ADD PRIMARY KEY (`NAME`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `club_fk` FOREIGN KEY (`USERNAME`) REFERENCES `pass` (`NAME`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `eve_fk` FOREIGN KEY (`CID`) REFERENCES `club` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evnt_fk` FOREIGN KEY (`EXID`) REFERENCES `expenditure` (`EXID`),
  ADD CONSTRAINT `exp_fk` FOREIGN KEY (`EXID`) REFERENCES `expenditure` (`EXID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `mem_fk` FOREIGN KEY (`CID`) REFERENCES `club` (`CID`),
  ADD CONSTRAINT `my_fk` FOREIGN KEY (`CID`) REFERENCES `club` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
