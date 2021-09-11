-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 04:40 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edc_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `edc`
--

CREATE TABLE `edc` (
  `sn` varchar(40) NOT NULL,
  `merk` varchar(40) NOT NULL,
  `mid` varchar(40) NOT NULL,
  `tid` varchar(40) NOT NULL,
  `gprs` tinyint(1) NOT NULL,
  `lan` tinyint(1) NOT NULL,
  `dialup` tinyint(1) NOT NULL,
  `contactless` tinyint(1) NOT NULL,
  `peruntukan` varchar(40) NOT NULL,
  `posisi_kanwil` varchar(40) NOT NULL,
  `posisi_uker` varchar(40) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `sn` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `kegiatan` varchar(10) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(40) NOT NULL,
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reporting`
--

CREATE TABLE `reporting` (
  `id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `date2` date NOT NULL,
  `date3` date NOT NULL,
  `merek` varchar(200) NOT NULL,
  `briit` int(10) NOT NULL,
  `visionet` int(10) NOT NULL,
  `indopay` int(10) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `maker` varchar(100) NOT NULL,
  `checker` longtext NOT NULL,
  `signer` varchar(100) NOT NULL,
  `status1` int(1) NOT NULL,
  `status2` int(1) NOT NULL,
  `status3` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uker`
--

CREATE TABLE `uker` (
  `kode_branch` varchar(40) NOT NULL,
  `nama_uker` varchar(40) DEFAULT NULL,
  `kode_kanwil` varchar(40) DEFAULT NULL,
  `nama_kanwil` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uker`
--

INSERT INTO `uker` (`kode_branch`, `nama_uker`, `kode_kanwil`, `nama_kanwil`) VALUES
('1-1', 'dayeuhkolot', '1', 'bandung'),
('1-2', 'dago', '1', 'bandung'),
('1-3', 'majalaya', '1', 'bandung'),
('1-4', 'lembang', '1', 'bandung'),
('1-5', 'kanwil bandung', '1', 'bandung'),
('2-1', 'gunung pati', '2', 'semarang'),
('2-2', 'sekaran', '2', 'semarang'),
('2-3', 'patih sampun', '2', 'semarang'),
('2-4', 'tugu muda', '2', 'semarang'),
('3-1', 'pancoran', '3', 'jakarta'),
('3-2', 'simpang lima', '3', 'jakarta'),
('3-3', 'hotel indonesia', '3', 'jakarta'),
('3-4', 'ciliwung', '3', 'jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tier` varchar(30) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `nama`, `password`, `tier`, `status`) VALUES
('admin', '', 'c', 'admin', 1),
('checker', '', 'c', 'checker', 1),
('checker1', '', 'c', 'checker', 0),
('maker', '', 'c', 'maker', 1),
('maker1', '', 'c', 'maker', 0),
('signer', '', 'c', 'signer', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `edc`
--
ALTER TABLE `edc`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `reporting`
--
ALTER TABLE `reporting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uker`
--
ALTER TABLE `uker`
  ADD PRIMARY KEY (`kode_branch`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reporting`
--
ALTER TABLE `reporting`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
