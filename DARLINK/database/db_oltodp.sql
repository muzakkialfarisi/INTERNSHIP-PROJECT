-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 07:20 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_oltodp`
--

-- --------------------------------------------------------

--
-- Table structure for table `odp`
--

CREATE TABLE `odp` (
  `numbodp` varchar(20) NOT NULL,
  `namaodp` varchar(30) NOT NULL,
  `kapodp` varchar(3) NOT NULL,
  `koorodp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `odp`
--

INSERT INTO `odp` (`numbodp`, `namaodp`, `kapodp`, `koorodp`) VALUES
('P421000001', 'ODP-DUMMY-FA/001', '8', '-6.986033,110.42392'),
('P421000002', 'ODP-DUMMY-FA/02', '8', '-6.986233,110.42422'),
('P421000003', 'ODP-DUMMY-FA/003', '16', '-6.982333,110.42292'),
('P421000004', 'ODP-DUMMY-FA/004', '8', '-6.986033,110.42392'),
('P421000005', 'ODP-DUMMY-FA/005', '8', '-6.986033,110.42392'),
('P421000006', 'ODP-DUMMY-FA/006', '8', '-6.986033,110.42392'),
('P421000007', 'ODP-DUMMY-FB/001', '8', '-6.986023,110.42342');

-- --------------------------------------------------------

--
-- Table structure for table `olt`
--

CREATE TABLE `olt` (
  `numbgpon` varchar(10) NOT NULL,
  `hostnamegpon` varchar(30) NOT NULL,
  `slot` varchar(5) NOT NULL,
  `port` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `olt`
--

INSERT INTO `olt` (`numbgpon`, `hostnamegpon`, `slot`, `port`) VALUES
('G410001', 'GPON04-D4-SMT-2', '2', '1'),
('G410002', 'GPON04-D4-SMT-2', '2', '2'),
('G410003', 'GPON00-D4-ABR-3', '2', '3'),
('G410004', 'GPON00-D4-ABR-3', '2', '4'),
('G410005', 'GPON00-D4-ABR-3', '2', '5'),
('G410006', 'GPON00-D4-ABR-3', '2', '6'),
('G410007', 'GPON00-D4-ABR-3', '2', '7'),
('G410008', 'GPON00-D4-ABR-3', '2', '8'),
('G410009', 'GPON00-D4-ABR-3', '2', '9'),
('G410010', 'GPON00-D4-ABR-3', '2', '10');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `numbservice` varchar(20) NOT NULL,
  `numbservice2` varchar(20) NOT NULL,
  `sn` varchar(30) NOT NULL,
  `koorservice` varchar(40) NOT NULL,
  `onuservice` int(3) NOT NULL,
  `numbsplitter` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`numbservice`, `numbservice2`, `sn`, `koorservice`, `onuservice`, `numbsplitter`) VALUES
('14140123456000', '024876000', 'ZTEGC0123000', '-6.986233,110.42492', 3, 'S43000001'),
('14140123456001', '024876001', 'ZTEGC0123001', '-6.986233,110.42492', 15, 'S43000005'),
('14140123456789', '024876543', 'ZTEGC0123456', '-6.986033,110.42392', 9, 'S43000001');

-- --------------------------------------------------------

--
-- Table structure for table `splitter`
--

CREATE TABLE `splitter` (
  `numbsplitter` varchar(20) NOT NULL,
  `namasplitter` varchar(30) NOT NULL,
  `numbodp` varchar(30) NOT NULL,
  `numbgpon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `splitter`
--

INSERT INTO `splitter` (`numbsplitter`, `namasplitter`, `numbodp`, `numbgpon`) VALUES
('S43000001', 'SPT-GPON-01_01', 'P421000001', 'G410001'),
('S43000002', 'SPT-GPON-01_02', 'P421000002', 'G410001'),
('S43000003', 'SPT-GPON-01_03', 'P421000003', 'G410001'),
('S43000004', 'SPT-GPON-01_04', 'P421000004', 'G410001'),
('S43000005', 'SPT-GPON-02_01', 'P421000005', 'G410003'),
('S43000006', 'SPT-GPON-02_02', 'P421000006', 'G410003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `odp`
--
ALTER TABLE `odp`
  ADD PRIMARY KEY (`numbodp`);

--
-- Indexes for table `olt`
--
ALTER TABLE `olt`
  ADD PRIMARY KEY (`numbgpon`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`numbservice`);

--
-- Indexes for table `splitter`
--
ALTER TABLE `splitter`
  ADD PRIMARY KEY (`numbsplitter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
