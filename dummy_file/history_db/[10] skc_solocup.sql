-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2016 at 12:10 PM
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
-- DROP Any Existed Table
DROP TABLE IF EXISTS `admin`;
DROP TABLE IF EXISTS `peserta`;
DROP TABLE IF EXISTS `kelas_all`;
DROP TABLE IF EXISTS `kontingen_all`;
DROP TABLE IF EXISTS `drowing`;
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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_all`
--

INSERT INTO `kelas_all` (`id_kelas`, `isi_kelas`) VALUES
(1, 'Kata Beregu Gabungan Junior - Senior Putra'),
(2, 'Kata Beregu Gabungan Junior - Senior Putri'),
(3, 'Kata Beregu Gabungan Pemula - Kadet Putra'),
(4, 'Kata Beregu Gabungan Pemula - Kadet Putri'),
(5, 'Kata Beregu Gabungan Usia Dini - Pra Pemula Putra'),
(6, 'Kata Beregu Gabungan Usia Dini - Pra Pemula Putri'),
(7, 'Kata Perorangan Junior Putra'),
(8, 'Kata Perorangan Junior Putri'),
(9, 'Kata Perorangan Kadet Putra'),
(10, 'Kata Perorangan Kadet Putri'),
(11, 'Kata Perorangan Pemula Putra'),
(12, 'Kata Perorangan Pemula Putri'),
(13, 'Kata Perorangan Pra Pemula Putra'),
(14, 'Kata Perorangan Pra Pemula Putri'),
(15, 'Kata Perorangan Pra Usia Dini Putra'),
(16, 'Kata Perorangan Pra Usia Dini Putri'),
(17, 'Kata Perorangan Senior Putra'),
(18, 'Kata Perorangan Senior Putri'),
(19, 'Kata Perorangan Usia Dini Putra'),
(20, 'Kata Perorangan Usia Dini Putri'),
(21, 'Kata Perorangan Veteran 35 - 40 Th'),
(22, 'Kata Perorangan Veteran 40 - 45 Th'),
(23, 'Kata Perorangan Veteran 45 Th Keatas'),
(24, 'Kumite Perorangan +25 Kg Usia Dini Putri'),
(25, 'Kumite Perorangan +30 Kg Pra Pemula Putri'),
(26, 'Kumite Perorangan +30 Kg Usia Dini Putra'),
(27, 'Kumite Perorangan +35 Kg Pemula Putri'),
(28, 'Kumite Perorangan +35 Kg Pra Pemula Putra'),
(29, 'Kumite Perorangan +40 Kg Pemula Putra'),
(30, 'Kumite Perorangan +54 Kadet Putri'),
(31, 'Kumite Perorangan +59 Junior Putri'),
(32, 'Kumite Perorangan +68 Kg Senior Putri'),
(33, 'Kumite Perorangan +70 Kg Kadet Putra'),
(34, 'Kumite Perorangan +76 Kg Junior Putra'),
(35, 'Kumite Perorangan +84 Kg Senior Putra'),
(36, 'Kumite Perorangan -25 Kg Pra Pemula Putri'),
(37, 'Kumite Perorangan -25 Kg Usia Dini Putri'),
(38, 'Kumite Perorangan -30 Kg Pemula Putri'),
(39, 'Kumite Perorangan -30 Kg Pra Pemula Putra'),
(40, 'Kumite Perorangan -30 Kg Pra Pemula Putri'),
(41, 'Kumite Perorangan -30 Kg Usia Dini Putra'),
(42, 'Kumite Perorangan -35 Kg Pemula Putra'),
(43, 'Kumite Perorangan -35 Kg Pemula Putri'),
(44, 'Kumite Perorangan -35 Kg Pra Pemula Putra'),
(45, 'Kumite Perorangan -40 Kg Pemula Putra'),
(46, 'Kumite Perorangan -47 Kg Kadet Putri'),
(47, 'Kumite Perorangan -48 Kg Junior Putri'),
(48, 'Kumite Perorangan -50 Kg Senior Putri'),
(49, 'Kumite Perorangan -52 Kg Kadet Putra'),
(50, 'Kumite Perorangan -53 Kg Junior Putri'),
(51, 'Kumite Perorangan -54 Kg Kadet Putri'),
(52, 'Kumite Perorangan -55 Kg Junior Putra'),
(53, 'Kumite Perorangan -55 Kg Senior Putra'),
(54, 'Kumite Perorangan -55 Kg Senior Putri'),
(55, 'Kumite Perorangan -57 Kg Kadet Putra'),
(56, 'Kumite Perorangan -59 Kg Junior Putri'),
(57, 'Kumite Perorangan -60 Kg Senior Putra'),
(58, 'Kumite Perorangan -61 Kg Junior Putra'),
(59, 'Kumite Perorangan -61 Kg Senior Putri'),
(60, 'Kumite Perorangan -63 Kg Kadet Putra'),
(61, 'Kumite Perorangan -67 Kg Senior Putra'),
(62, 'Kumite Perorangan -68 Kg Junior Putra'),
(63, 'Kumite Perorangan -68 Kg Senior Putri'),
(64, 'Kumite Perorangan -70 Kg Kadet Putra'),
(65, 'Kumite Perorangan -75 Kg Senior Putra'),
(66, 'Kumite Perorangan -76 Kg Junior Putra'),
(67, 'Kumite Perorangan -84 Kg Senior Putra'),
(68, 'Kumite Perorangan Veteran 35 - 40th'),
(69, 'Kumite Perorangan Veteran 40 - 45 Th'),
(70, 'Kumite Perorangan Veteran 45 Th Keatas');

-- --------------------------------------------------------

--
-- Table structure for table `kontingen_all`
--

CREATE TABLE IF NOT EXISTS `kontingen_all` (
  `id_kontingen` int(11) NOT NULL,
  `isi_kontingen` varchar(100) NOT NULL,
  `nama_official` varchar(50) NOT NULL,
  `kontak_official` varchar(13) NOT NULL
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
  `info_beregu` text NOT NULL,
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
  MODIFY `id_kelas` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
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
