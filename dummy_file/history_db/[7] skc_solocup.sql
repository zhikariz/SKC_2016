-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2016 at 04:38 PM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skc_solocup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(5) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `user`, `password`, `nama`, `status`) VALUES
(1, 'admin', 'admin', 'Admin Full Control', 'admin'),
(2, 'user', 'user', 'User Frontdesk', 'user'),
(3, 'drower', 'drower', 'Drower Pertandingan', 'drower');

-- --------------------------------------------------------

--
-- Table structure for table `drowing`
--

CREATE TABLE IF NOT EXISTS `drowing` (
  `id_drowing` int(5) NOT NULL,
  `id_kelas` varchar(50) NOT NULL,
  `pool` varchar(5) NOT NULL,
  `list_peserta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_all`
--

CREATE TABLE IF NOT EXISTS `kelas_all` (
  `id_kelas` int(5) NOT NULL,
  `isi_kelas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kontingen_all`
--

CREATE TABLE IF NOT EXISTS `kontingen_all` (
  `id_kontingen` int(11) NOT NULL,
  `isi_kontingen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE IF NOT EXISTS `peserta` (
  `id_peserta` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kontingen` varchar(50) NOT NULL,
  `berat_badan` int(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `waktu_input` datetime NOT NULL,
  `perguruan` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `id_kelas` varchar(100) NOT NULL,
  `input_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD FULLTEXT KEY `nama` (`nama`);

--
-- Indexes for table `drowing`
--
ALTER TABLE `drowing`
  ADD PRIMARY KEY (`id_drowing`);

--
-- Indexes for table `kelas_all`
--
ALTER TABLE `kelas_all`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kontingen_all`
--
ALTER TABLE `kontingen_all`
  ADD PRIMARY KEY (`id_kontingen`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `drowing`
--
ALTER TABLE `drowing`
  MODIFY `id_drowing` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kelas_all`
--
ALTER TABLE `kelas_all`
  MODIFY `id_kelas` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kontingen_all`
--
ALTER TABLE `kontingen_all`
  MODIFY `id_kontingen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
