-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2017 at 01:00 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mgi2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_controlcuti`
--

CREATE TABLE `tbl_controlcuti` (
  `npwp` varchar(15) NOT NULL,
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
  `job_number` varchar(20) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `status` enum('dikerjakan','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_job`
--

INSERT INTO `tbl_job` (`id_job`, `id_perusahaan`, `job_number`, `nama_perusahaan`, `tanggal_mulai`, `status`) VALUES
(1, 1, 'A001', 'PT. Trisula Textile ', '2017-12-19', 'dikerjakan'),
(2, 3, 'A002', 'PT. Bintang Cipta Sejahtera', '2017-12-18', 'dikerjakan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_libur`
--

CREATE TABLE `tbl_libur` (
  `npwp` varchar(15) NOT NULL,
  `nama_hari` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penggajian`
--

CREATE TABLE `tbl_penggajian` (
  `npwp` varchar(15) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
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
  `total_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perusahaan`
--

CREATE TABLE `tbl_perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `ope` int(11) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_perusahaan`
--

INSERT INTO `tbl_perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `kota`, `ope`, `fee`) VALUES
(1, 'PT. Trisula Textile ', 'Jl. Mahar Martanegara No.170, Baros, Cimahi Tengah, Kota Cimahi, Jawa Barat ', 'Cimahi', 70000, 100000000),
(2, 'PT.  Sinar Abadi Citranusa', 'Jl. Mangga Dua Raya No.Lt. 3, Blok Bb, No.13, RT.11/RW.5, Ancol, DKI Jakarta', 'Jakarta', 40000, 80000000),
(3, 'PT. Bintang Cipta Sejahtera', 'Jl. Semut Baru, Ruko Pengampon Square Blok G No. 3,  Surabaya ', 'Surabaya', 80000, 90000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timesheet`
--

CREATE TABLE `tbl_timesheet` (
  `id_timesheet` int(11) NOT NULL,
  `npwp` varchar(15) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `periode` char(1) NOT NULL,
  `total_jamkerja` smallint(6) NOT NULL,
  `total_lembur` smallint(6) NOT NULL,
  `total_ope` int(11) NOT NULL DEFAULT '0',
  `total_uanglembur` int(11) NOT NULL,
  `total_transport_lembur` int(11) NOT NULL DEFAULT '0',
  `total_uang_makan` int(11) NOT NULL DEFAULT '0',
  `pic` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
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
  `transport_lembur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `npwp` varchar(15) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `saldo_cuti` smallint(6) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `tunjangan_transport` int(11) NOT NULL,
  `role` enum('administrator','user','supervisor') NOT NULL,
  `status` enum('aktif','tidakaktif') NOT NULL,
  `uang_lembur1` int(11) NOT NULL,
  `uang_lembur2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`npwp`, `nama_user`, `saldo_cuti`, `password`, `jabatan`, `gaji_pokok`, `tunjangan_transport`, `role`, `status`, `uang_lembur1`, `uang_lembur2`) VALUES
('41814010091', 'ricky muliawan', 0, 'b87ec07f31bcaef5af9cebaae3342b00cce180fc', 'manager', 0, 0, 'administrator', 'aktif', 0, 0),
('41814010092', 'willy dwi', 16, '98940e1a1c159ebd65f123b65cfe080b2bbc3510', 'junior auditor', 3000000, 50000, 'user', 'aktif', 26012, 34682),
('41814010093', 'gifari ahmad', 16, 'eefad1107a0dfc9d4af8ea348d95e016d6ca70e0', 'senior auditor', 5000000, 50000, 'supervisor', 'aktif', 43353, 57803);

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
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_timesheet`
--
ALTER TABLE `tbl_timesheet`
  MODIFY `id_timesheet` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
