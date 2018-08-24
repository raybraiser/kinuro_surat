-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2018 at 01:05 AM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kinuro_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(50) NOT NULL,
  `admin_nama_lengkap` varchar(500) NOT NULL,
  `admin_username` varchar(500) NOT NULL,
  `admin_password` varchar(500) NOT NULL,
  `admin_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_nama_lengkap`, `admin_username`, `admin_password`, `admin_status`) VALUES
(1, 'Braiser Pangemanan', 'braiser', 'e67331aa84b19b5f4781392721d08183', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_keluar_baptis`
--

CREATE TABLE `tbl_surat_keluar_baptis` (
  `sk_baptis_id` int(50) NOT NULL,
  `sk_baptis_nomor` varchar(500) NOT NULL,
  `sk_baptis_tanggal_surat` date NOT NULL,
  `sk_baptis_tanggal_baptis` date NOT NULL,
  `sk_baptis_nama` varchar(500) NOT NULL,
  `sk_baptis_tempat_lahir` varchar(200) NOT NULL,
  `sk_baptis_tanggal_lahir` date NOT NULL,
  `sk_baptis_jenis_kelamin` varchar(500) NOT NULL,
  `sk_baptis_nama_ayah` varchar(500) NOT NULL,
  `sk_baptis_nama_ibu` varchar(500) NOT NULL,
  `sk_baptis_saksi_baptisan` varchar(500) NOT NULL,
  `sk_baptis_yang_membaptis` varchar(500) NOT NULL,
  `sk_baptis_tanggal_input` date NOT NULL,
  `sk_baptis_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_keluar_nikah`
--

CREATE TABLE `tbl_surat_keluar_nikah` (
  `sk_menikah_id` int(50) NOT NULL,
  `sk_menikah_nomor` varchar(500) NOT NULL,
  `sk_menikah_tanggal_surat` date NOT NULL,
  `sk_menikah_tanggal_menikah` date NOT NULL,
  `sk_menikah_nama_pria` varchar(500) NOT NULL,
  `sk_menikah_nama_wanita` varchar(500) NOT NULL,
  `sk_menikah_yang_meneguhkan` varchar(500) NOT NULL,
  `sk_menikah_tanggal_input` date NOT NULL,
  `sk_menikah_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_keluar_sidi`
--

CREATE TABLE `tbl_surat_keluar_sidi` (
  `sk_sidi_id` int(50) NOT NULL,
  `sk_sidi_nomor` varchar(500) NOT NULL,
  `sk_sidi_tanggal_surat` date NOT NULL,
  `sk_sidi_tanggal_sidi` date NOT NULL,
  `sk_sidi_nama` varchar(500) NOT NULL,
  `sk_sidi_tempat_lahir` varchar(200) NOT NULL,
  `sk_sidi_tanggal_lahir` date NOT NULL,
  `sk_sidi_jenis_kelamin` varchar(500) NOT NULL,
  `sk_sidi_yang_meneguhkan` varchar(500) NOT NULL,
  `sk_sidi_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_keputusan`
--

CREATE TABLE `tbl_surat_keputusan` (
  `keputusan_id` int(50) NOT NULL,
  `keputusan_nomor_surat` varchar(200) NOT NULL,
  `keputusan_tanggal_surat` date NOT NULL,
  `keputusan_untuk` varchar(200) NOT NULL,
  `keputusan_perihal` varchar(200) NOT NULL,
  `keputusan_deskripsi` varchar(200) NOT NULL,
  `keputusan_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_keterangan`
--

CREATE TABLE `tbl_surat_keterangan` (
  `sk_keterangan_id` int(50) NOT NULL,
  `sk_keterangan_jenis_surat` varchar(500) NOT NULL,
  `sk_keterangan_nomor_surat` varchar(500) NOT NULL,
  `sk_keterangan_tanggal_surat` date NOT NULL,
  `sk_keterangan_perihal` varchar(500) NOT NULL,
  `sk_keterangan_nama_lengkap` varchar(500) NOT NULL,
  `sk_keterangan_tanggal_lahir` date NOT NULL,
  `sk_keterangan_jenis_kelamin` varchar(500) NOT NULL,
  `sk_keterangan_domisili_kolom` varchar(500) NOT NULL,
  `sk_keterangan_deskripsi` varchar(500) NOT NULL,
  `sk_keterangan_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_masuk`
--

CREATE TABLE `tbl_surat_masuk` (
  `sm_id` int(50) NOT NULL,
  `sm_dari` varchar(500) NOT NULL,
  `sm_untuk` varchar(500) NOT NULL,
  `sm_nomor` varchar(500) NOT NULL,
  `sm_tanggal_surat` date NOT NULL,
  `sm_perihal` varchar(500) NOT NULL,
  `sm_tanggal_masuk` date NOT NULL,
  `sm_deskripsi` varchar(500) NOT NULL,
  `sm_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_surat_keluar_baptis`
--
ALTER TABLE `tbl_surat_keluar_baptis`
  ADD PRIMARY KEY (`sk_baptis_id`);

--
-- Indexes for table `tbl_surat_keluar_nikah`
--
ALTER TABLE `tbl_surat_keluar_nikah`
  ADD PRIMARY KEY (`sk_menikah_id`);

--
-- Indexes for table `tbl_surat_keluar_sidi`
--
ALTER TABLE `tbl_surat_keluar_sidi`
  ADD PRIMARY KEY (`sk_sidi_id`);

--
-- Indexes for table `tbl_surat_keputusan`
--
ALTER TABLE `tbl_surat_keputusan`
  ADD PRIMARY KEY (`keputusan_id`);

--
-- Indexes for table `tbl_surat_keterangan`
--
ALTER TABLE `tbl_surat_keterangan`
  ADD PRIMARY KEY (`sk_keterangan_id`);

--
-- Indexes for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  ADD PRIMARY KEY (`sm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_surat_keluar_baptis`
--
ALTER TABLE `tbl_surat_keluar_baptis`
  MODIFY `sk_baptis_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_surat_keluar_nikah`
--
ALTER TABLE `tbl_surat_keluar_nikah`
  MODIFY `sk_menikah_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_surat_keluar_sidi`
--
ALTER TABLE `tbl_surat_keluar_sidi`
  MODIFY `sk_sidi_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_surat_keputusan`
--
ALTER TABLE `tbl_surat_keputusan`
  MODIFY `keputusan_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_surat_keterangan`
--
ALTER TABLE `tbl_surat_keterangan`
  MODIFY `sk_keterangan_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  MODIFY `sm_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
