-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2016 at 02:36 AM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skc_bak2`
--

-- --------------------------------------------------------
-- DROP Any Existed Table
DROP TABLE IF EXISTS `admin`;
DROP TABLE IF EXISTS `peserta`;
DROP TABLE IF EXISTS `kelas_all`;
DROP TABLE IF EXISTS `kontingen_all`;
DROP TABLE IF EXISTS `perguruan_all`;
DROP TABLE IF EXISTS `drowing`;
DROP TABLE IF EXISTS `syst_info`;

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
  `isi_kontingen` varchar(100) NOT NULL,
  `nama_official` varchar(50) NOT NULL,
  `kontak_official` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perguruan_all`
--

CREATE TABLE IF NOT EXISTS `perguruan_all` (
  `id_perguruan` int(5) NOT NULL,
  `isi_perguruan` varchar(50) NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `syst_info`
--

CREATE TABLE IF NOT EXISTS `syst_info` (
  `syst_id` int(11) NOT NULL,
  `syst_name` text NOT NULL,
  `syst_help` text,
  `event_name` text NOT NULL,
  `event_date` text NOT NULL,
  `event_notes` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syst_info`
--

INSERT INTO `syst_info` (`syst_id`, `syst_name`, `syst_help`, `event_name`, `event_date`, `event_notes`) VALUES
(1, 'Sistem Informasi Pertandingan Karate', '<div id="penting">\n<p class="lead page-header text-center">\n # Penggunaan Sistem <br>\n <strong>! PENTING</strong> : Pastikan Data awal terisi <br>\n <ul type="square">\n   <li>Perguruan</li>\n   <li>Kontingen</li>\n   <li>Kelas</li>\n </ul>\n <strong>! ERROR</strong> : Jika data awal belum terisi mungkin akan terjadi error sistem \n</p>\n</div>\n<hr>\n\n<div id="export-excel">\n<p class="lead page-header text-center">\n # Cara Export Semua Data ke Excel\n</p>\n<br>\n<ol type="1">\n  <li>Buka <code>http://localhost/phpmyadmin</code> dari Server</li>\n  <li>Pilih database event (misal: skc_solocup)</li>\n <li>Klik tab SQL</li>\n <li>Paste Code dibawah ini: <br>\n  <pre>\n <code>  \n  SELECT peserta.nama AS "Nama Peserta", \n kontingen_all.isi_kontingen AS "Kontingen", \n  peserta.tgl_lahir AS "Tgl Lahir", \n  peserta.berat_badan AS "Berat (Kg)", \n perguruan_all.isi_perguruan AS "Perguruan", \n  kelas_all.isi_kelas AS "Kelas", \n  peserta.jk AS "Jenis Kelamin"     \n  FROM peserta \n INNER JOIN kelas_all\n  ON kelas_all.id_kelas=peserta.id_kelas\n  INNER JOIN kontingen_all\n  ON kontingen_all.id_kontingen=peserta.id_kontingen\n  INNER JOIN perguruan_all\n  ON perguruan_all.id_perguruan=peserta.perguruan\n </code>\n </pre>    \n  Lalu klik <kbd>Go</kbd>\n <br>\n  </li>\n <li>Setelah keluar hasilnya, pada bagian Query Result Operation (Operasi hasil kueri) -> Klik Export</li>\n <li>Pilihan Export :\n  <pre>\n <code>  \n  Export Method   : Custom - display all possible options\n Rows      : Dump all rows\n Output      : Save output to a file\n Format      : OpenDocument Spreadsheet\n  Format Specifix Options : Replace Null with = Null\n            Put Columns Name in the first Row (Beri Ceklist)\n  </code>\n </pre>                        \n  Lalu Klik <kbd>Go</kbd>\n <br>\n  </li>\n <li>Akan Ter-download sebuah dokumen .ods, buka dengan MS Excel 2013</li>\n</ol>\n</div>', 'SOLOCUP 2016', '11 - 14 April 2016', NULL);

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
-- Indexes for table `perguruan_all`
--
ALTER TABLE `perguruan_all`
  ADD PRIMARY KEY (`id_perguruan`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `syst_info`
--
ALTER TABLE `syst_info`
  ADD PRIMARY KEY (`syst_id`);

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
-- AUTO_INCREMENT for table `perguruan_all`
--
ALTER TABLE `perguruan_all`
  MODIFY `id_perguruan` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `syst_info`
--
ALTER TABLE `syst_info`
  MODIFY `syst_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
