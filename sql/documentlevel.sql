-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2020 at 12:40 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `documentlevel`
--

CREATE TABLE `documentlevel` (
  `recid` int(10) UNSIGNED NOT NULL,
  `level` varchar(30) NOT NULL,
  `documentdesc` varchar(50) NOT NULL,
  `documenttype` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documentlevel`
--

INSERT INTO `documentlevel` (`recid`, `level`, `documentdesc`, `documenttype`) VALUES
(1, 'Level 1', 'Quality Manual', 'QM'),
(2, 'Level 1', 'Company Policy', 'CP'),
(3, 'Level 2', 'Procedure Manual', 'PM'),
(4, 'Level 0', 'Internal Memorandum', 'IM'),
(5, 'Level 2', 'Manufacturing Control Plan', 'MP'),
(6, 'Level 0', 'Bill of Manufacturing', 'BM'),
(7, 'Level 2', 'Operational Procedure', 'OP'),
(8, 'Level 0', 'Job Description', 'JD'),
(9, 'Level 2', 'Organizational Chart', 'OC'),
(10, 'Level 0', 'Work Standard', 'WS'),
(11, 'Level 3', 'Work Instruction', 'WI'),
(12, 'Level 3', 'Syteline Operating Procedure', 'SP'),
(13, 'Level 4', 'Forms', 'QR'),
(14, 'Level 4', 'External Form', 'EF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documentlevel`
--
ALTER TABLE `documentlevel`
  ADD PRIMARY KEY (`recid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documentlevel`
--
ALTER TABLE `documentlevel`
  MODIFY `recid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
