-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2018 at 11:34 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mgi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_controlcuti`
--

CREATE TABLE `tbl_controlcuti` (
  `npwp` varchar(100) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `saldo_awal` smallint(6) NOT NULL,
  `saldo_akhir` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job`
--

CREATE TABLE `tbl_job` (
  `id_job` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `job_number` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `status` enum('dikerjakan','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_libur`
--

CREATE TABLE `tbl_libur` (
  `npwp` varchar(100) NOT NULL,
  `nama_hari` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penggajian`
--

CREATE TABLE `tbl_penggajian` (
  `npwp` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `total_jamkerja` smallint(6) NOT NULL,
  `total_jamlembur` smallint(6) NOT NULL,
  `ope1` int(11) NOT NULL,
  `ope2` int(11) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `uang_lembur1` int(11) NOT NULL,
  `uang_lembur2` int(11) NOT NULL,
  `total_uangmakan` int(11) NOT NULL,
  `total_tunjangantransport` int(11) NOT NULL,
  `total_uanglembur` int(11) NOT NULL,
  `total_transportlembur` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `tunjangan_komunikasi` int(11) NOT NULL,
  `tunjangan_parkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perusahaan`
--

CREATE TABLE `tbl_perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `fee` int(11) NOT NULL,
  `jumlah_kota` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perusahaandetail`
--

CREATE TABLE `tbl_perusahaandetail` (
  `id_perusahaandetail` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `ope` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timesheet`
--

CREATE TABLE `tbl_timesheet` (
  `id_timesheet` int(11) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `periode` char(1) NOT NULL,
  `total_jamkerja` smallint(6) NOT NULL,
  `total_lembur` smallint(6) NOT NULL,
  `total_ope` int(11) NOT NULL DEFAULT '0',
  `total_uanglembur` int(11) NOT NULL,
  `total_transport_lembur` int(11) NOT NULL DEFAULT '0',
  `total_uang_makan` int(11) NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `id_job` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timesheetdetail`
--

CREATE TABLE `tbl_timesheetdetail` (
  `id_timesheet` int(11) NOT NULL,
  `jam_kerja` smallint(6) NOT NULL,
  `lembur` smallint(6) NOT NULL,
  `tanggal` varchar(2) NOT NULL,
  `tipe_kerja` enum('office','client') NOT NULL,
  `jenis_hari` varchar(10) NOT NULL,
  `uang_makan` int(11) NOT NULL,
  `transport_lembur` int(11) NOT NULL,
  `id_perusahaandetail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `npwp` varchar(100) NOT NULL,
  `nama_user` varchar(80) NOT NULL,
  `saldo_cuti` smallint(6) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `tunjangan_transport` int(11) NOT NULL,
  `tunjangan_komunikasi` int(11) NOT NULL,
  `tunjangan_parkir` int(11) NOT NULL,
  `role` enum('administrator','user','supervisor') NOT NULL,
  `status` enum('aktif','tidakaktif') NOT NULL,
  `uang_lembur1` int(11) NOT NULL,
  `uang_lembur2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`npwp`, `nama_user`, `saldo_cuti`, `password`, `jabatan`, `gaji_pokok`, `tunjangan_transport`, `tunjangan_komunikasi`, `tunjangan_parkir`, `role`, `status`, `uang_lembur1`, `uang_lembur2`) VALUES
('admin@mgi-gar.com', 'administrator', 0, '5913bc6448d75f24a87ebb48ef96d5a7a88d56b2', 'administrator', 0, 0, 0, 0, 'administrator', 'aktif', 0, 0),
('mrickymuliawan@gmail.com', 'ricky muliawan', 8, 'e015a4a8a28cbb7bd4c61f0bb786831762617a0b', 'software tester', 0, 0, 0, 0, 'administrator', 'aktif', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD PRIMARY KEY (`id_job`);

--
-- Indexes for table `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `tbl_perusahaandetail`
--
ALTER TABLE `tbl_perusahaandetail`
  ADD PRIMARY KEY (`id_perusahaandetail`);

--
-- Indexes for table `tbl_timesheet`
--
ALTER TABLE `tbl_timesheet`
  ADD PRIMARY KEY (`id_timesheet`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`npwp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_job`
--
ALTER TABLE `tbl_job`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_perusahaandetail`
--
ALTER TABLE `tbl_perusahaandetail`
  MODIFY `id_perusahaandetail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_timesheet`
--
ALTER TABLE `tbl_timesheet`
  MODIFY `id_timesheet` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
