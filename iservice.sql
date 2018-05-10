-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2017 at 04:36 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
`auth_id` int(11) NOT NULL,
  `auth_username` varchar(100) NOT NULL,
  `auth_password` varchar(100) NOT NULL,
  `auth_level` enum('user','admin') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`auth_id`, `auth_username`, `auth_password`, `auth_level`) VALUES
(61, 'mpampam', '96e79218965eb72c92a549dd5a330112', 'user'),
(62, 'dfdsrerfew', '96e79218965eb72c92a549dd5a330112', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
`gallery_id` int(11) NOT NULL,
  `gallery_image` varchar(100) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE IF NOT EXISTS `pemilik` (
`pemilik_id` int(11) NOT NULL,
  `pemilik_nama` varchar(100) DEFAULT NULL,
  `pemilik_tentang` text,
  `pemilik_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`pemilik_id`, `pemilik_nama`, `pemilik_tentang`, `pemilik_image`) VALUES
(1, 'irfan', 'anak baik', '');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
`pesan_id` int(11) NOT NULL,
  `pesan_nama` varchar(100) NOT NULL,
  `pesan_kontak` varchar(100) NOT NULL,
  `pesan_keterangan` text NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
`service_id` int(11) NOT NULL,
  `service_nama` varchar(50) NOT NULL,
  `service_kordinat` varchar(50) NOT NULL,
  `service_ket_alamat` text NOT NULL,
  `service_tentang` text NOT NULL,
  `service_email` varchar(100) NOT NULL,
  `service_telepon` varchar(15) NOT NULL,
  `service_icon` varchar(100) NOT NULL,
  `service_image` varchar(100) NOT NULL,
  `service_buka` time DEFAULT NULL,
  `service_tutup` time DEFAULT NULL,
  `service_token` varchar(255) NOT NULL,
  `service_aktif` enum('tidak','ya') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_nama`, `service_kordinat`, `service_ket_alamat`, `service_tentang`, `service_email`, `service_telepon`, `service_icon`, `service_image`, `service_buka`, `service_tutup`, `service_token`, `service_aktif`) VALUES
(58, 'm computer', '-5.1478166,119.4350714', 'nnnnnnnnnnnnnnn', 'TEKNISI KOMPUTER BERPENGALAMAN DAN TERPERCAYA.', 'syifacompp@gmail.com', '085299966595', 'temp/public/img/property-types/single-family.png', 'temp/public/img/properties/property-03.jpg', NULL, NULL, '87376931674fee8e68172f14cf68a5924a27af69', 'ya'),
(59, 'mpampam computer', '-5.1479020,119.4346851', 'dsdadsad', 'dadadasdsad', 'mpampam5@gmail.com', '08555434', 'temp/public/img/property-types/single-family.png', 'temp/public/img/properties/property-03.jpg', NULL, NULL, '2662b89f4cdc7499933ac4eacca4bd69c6d560c8', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `sosial_media`
--

CREATE TABLE IF NOT EXISTS `sosial_media` (
`sosmed_id` int(11) NOT NULL,
  `faecbook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `google` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sosial_media`
--

INSERT INTO `sosial_media` (`sosmed_id`, `faecbook`, `twitter`, `google`, `instagram`) VALUES
(1, 'mpampam', 'm_pampam', 'npampam', 'mpampam');

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE IF NOT EXISTS `trans` (
`trans_id` int(11) NOT NULL,
  `trans_service` int(11) NOT NULL,
  `trans_pemilik` int(11) DEFAULT NULL,
  `trans_auth` int(11) NOT NULL,
  `trans_sosmed` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`trans_id`, `trans_service`, `trans_pemilik`, `trans_auth`, `trans_sosmed`, `rating`) VALUES
(55, 58, NULL, 61, NULL, NULL),
(56, 59, NULL, 62, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
 ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
 ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
 ADD PRIMARY KEY (`pemilik_id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
 ADD PRIMARY KEY (`pesan_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
 ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `sosial_media`
--
ALTER TABLE `sosial_media`
 ADD PRIMARY KEY (`sosmed_id`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
 ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
MODIFY `pemilik_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
MODIFY `pesan_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `sosial_media`
--
ALTER TABLE `sosial_media`
MODIFY `sosmed_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
