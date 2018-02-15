-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2018 at 12:02 AM
-- Server version: 10.0.34-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bskapita_timesheet`
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

--
-- Dumping data for table `tbl_perusahaan`
--

INSERT INTO `tbl_perusahaan` (`id_perusahaan`, `nama_perusahaan`, `fee`, `jumlah_kota`) VALUES
(1, 'OTOMAS MULTI FINANCE, PT_2017_GA', 125000000, '1'),
(2, 'WANNAMAS MULTI FINANCE, PT_2017_GA', 100000000, '1'),
(3, 'HABCO PRIMATAMA, PT_2017_GA', 77000000, '1'),
(4, 'MULTIGUNA MARITIM, PT', 38000000, '1'),
(5, 'MITRA SEJAHTERA RAYA, PT_2017_GA', 21500000, '1'),
(6, 'BATOLA PRIMA, PT _2017_GA', 21500000, '1'),
(7, 'ANUGERAH TANI MAKMUR, PT_2017_GA', 21500000, '1'),
(8, 'TRIGUNA PRIMA SAMUDRA, PT_2017_GA', 21500000, '1'),
(9, 'TRISULA TEXTILE INDUSTRIE, PT _2017_GA', 140000000, '1'),
(10, 'PERMATA BUSANA MAS, PT_2017_GA', 25000000, '1'),
(11, 'CAKRA KENCANA, PT_2017_GA', 25000000, '1'),
(12, 'SINAR ABADI CITRA NUSA, PT_2017_GA', 25000000, '1'),
(13, 'SAVANA LESTARI, PT_2017_GA', 25000000, '1'),
(14, 'MIDO INDONESIA, PT_2017_GA', 25000000, '1'),
(15, 'PRIMA MODA KREASINDO, PT_2017_GA', 25000000, '1'),
(16, 'TRICITRA BUSANA MAS, PT_2017_GA', 25000000, '1'),
(17, 'TRICITRA BUSANA MAS, PT_2017_GA', 25000000, '1'),
(18, 'BINA CITRA SENTOSA, PT_2017_GA', 25000000, '1'),
(19, 'BINTANG CIPTA SEJAHTERA, PT _2017_GA', 25000000, '1'),
(20, 'BINAMITRA SUMBER ARTA, PT _2017_GA', 200000000, '1'),
(21, 'MITRA KERJA SELARAS KARYA, PT_2017_GA', 40000000, '1'),
(22, 'MITRA USAHA TULUS PRATAMA, PT_2017_GA', 40000000, '1'),
(23, 'SERINDING SUKSES MAKMUR, PT_2017_GA', 40000000, '1'),
(24, 'KANGAROO MOTOR MANDIRI, PT_2017_GA', 100000000, '1'),
(25, 'QUANTUM INVENTIONS INDONESIA, PT_2017_GA', 30000000, '1'),
(26, 'SINAR MULIA, PT_2017_GA', 250000000, '1'),
(27, 'SINAR MULIA ( Restrukturisasi), PT_2017', 100000000, '1'),
(28, 'SINAR MULIA (pendapingan IPO), PT_2017', 450000000, '1'),
(29, 'JALINAN KASIH SESAMA, PT_2017_GA', 30000000, '1'),
(30, 'SERASIH HOLDICO, PT_2017_GA', 30000000, '1'),
(31, 'PASIRPUTIH PUTRATAMA, PT_2017_GA', 20000000, '1'),
(32, 'SARANA GRAHA WIRASWASTA UTAMA, PT_2017_GA', 20000000, '1'),
(33, 'NARAYAN TRIKARSA, PT_2017_GA', 20000000, '1'),
(34, 'PALOMA SHOPWAY, PT_2017_GA', 30000000, '1'),
(35, 'OKAMURA CHITOSE INDONESIA, PT_2017_GA', 50000000, '1'),
(36, 'META EPSI AGRO, PT_2017_GA', 90000000, '1'),
(37, 'SABUT MAS ABADI, PT_2017_GAA', 70000000, '1'),
(38, 'SKYBEE TBK, PT_2017_GA', 90000000, '1'),
(39, 'SINERGITAMA KOMINDO, PT_2017_GA', 30000000, '1'),
(40, 'SKYBEE TBK PROFORMA, PT_2017_GA', 20000000, '1'),
(41, 'SUKSES KARYA HUTANI, PT_2017_GA', 25000000, '1'),
(42, 'GHOSEN BANGKA MULIA, PT_2017_GA', 25000000, '1'),
(43, 'SATRIA ANUGERAH ABADI, PT_2017_GA', 20000000, '1'),
(44, 'KASIH ANUGERAH PERSADA, PT_2017_GA', 20000000, '1'),
(45, 'KISCO INDONESIA, PT_2017_KPPK', 20000000, '1'),
(46, 'MC LIVING ESSENTIAL INDONESIA, PT_2017_KPPK', 15000000, '1'),
(47, 'JAPAN TOBACCO INTERNATIONAL INDONESIA, PT_2017_KPPK', 25000000, '1'),
(48, 'ALAM INDO MEGAH, PT_2017_KPPK', 25000000, '1'),
(49, 'SYSTECH INDONESIA, PT_2017_GA', 25000000, '1'),
(50, 'ABE KOGYO, PT_2017_GA', 35000000, '1'),
(51, 'UNGARAN INDAH BUSANA, PT_2017_GA', 55000000, '1'),
(52, 'PRISKILA MANDIRI UTAMA, CV_2017_GAA', 70000000, '1'),
(53, 'BUANA TIRTA ADIJAYA, PT_2017_GA', 50000000, '1'),
(54, 'INSTRUCOM, PT_2017_GAA', 70000000, '1'),
(55, 'PRIMA TOP BOGA, PT_2017_GA', 60000000, '1'),
(56, 'SKK KAKEN GROUP, PT_2017_GA', 150000000, '1'),
(57, 'SANTA MONIKA, PT_2017_GA', 30000000, '1'),
(58, 'KASIH INDONESIA, PT_2017_GA', 40000000, '1'),
(59, 'TRANS OCEAN CONSULTING, PT_2017_GA', 32000000, '1'),
(60, 'LIPWIH LAB SYNERGY, PT_2017_GA', 30000000, '1'),
(61, 'KERJASAMA INTERNATIONAL PERDAGANGAN DAN LOGISTIK, PT_2017_GA', 23000000, '1'),
(62, 'INDIKA ENERGY TRADING, PT_2017_GAA', 27000000, '1'),
(63, 'MAHAGHORA, PT_2017_GA', 100000000, '1'),
(64, 'DAIRY GLORIA, PT_2017_GA', 40000000, '1'),
(65, 'HAMON INDONESIA, PT_2017_GA', 80000000, '1'),
(66, 'KUSUMA ADI JAYA, PT_2017_GA', 30000000, '1'),
(67, 'KARUNIA ESTETIKA LESTARI, PT_2017_GA', 30000000, '1'),
(68, 'Nippon Realty Indonesia_2017_GA', 80000000, '1'),
(69, 'Armada Jaya Makmur_2017_GA', 32000000, '1'),
(70, 'JTI_AIM_REGULAR_ULN&KPPK', 204000000, '1'),
(71, 'BINA ARTHA VENTURA, PT_2017_TPDOC', 50000000, '1'),
(72, 'KONSULTASI MODAL VENTURA, PT_2017', 40000000, '1'),
(73, 'AIM&JTI (Jan - Des \'18)_TAX', 420000000, '1');

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

--
-- Dumping data for table `tbl_perusahaandetail`
--

INSERT INTO `tbl_perusahaandetail` (`id_perusahaandetail`, `id_perusahaan`, `alamat`, `kota`, `ope`) VALUES
(1, 1, 'jakarta', 'Jakarta', 40000),
(2, 2, 'jakarta', 'jakarta', 40000),
(5, 3, 'Jl. H. Imam Munandar No 247 F-G, Pekanbaru, Riau', 'Pekanbaru', 100000),
(6, 4, 'Puri Indah Financial Tower, 8th Floor Suite 809-810, Jl. Puri Lingkar Dalam Blok T8, Jakarta Barat', 'jakarta', 40000),
(7, 5, 'JAKARTA', 'JAKARTA', 40000),
(8, 6, 'JAKARTA', 'JAKARTA', 40000),
(9, 7, 'JAKARTA', 'JAKARTA', 40000),
(11, 9, 'JAKARTA', 'JAKARTA', 40000),
(12, 10, 'JAKARTA', 'JAKARTA', 40000),
(13, 11, 'JAKARTA', 'JAKARTA', 40000),
(14, 12, 'JAKARTA', 'JAKARTA', 40000),
(15, 13, 'JAKARTA', 'JAKARTA', 40000),
(16, 14, 'JAKARTA', 'JAKARTA', 40000),
(17, 15, 'JAKARTA', 'JAKARTA', 40000),
(18, 16, 'JAKARTA', 'JAKARTA', 40000),
(19, 17, 'JAKARTA', 'JAKARTA', 40000),
(20, 18, 'JAKARTA', 'JAKARTA', 40000),
(21, 19, 'JAKARTA', 'JAKARTA', 40000),
(22, 20, 'JAKARTA', 'JAKARTA', 40000),
(23, 21, 'JAKARTA', 'JAKARTA', 40000),
(24, 22, 'JAKARTA', 'JAKARTA', 40000),
(25, 23, 'JAKARTA', 'JAKARTA', 40000),
(26, 24, 'JAKARTA', 'JAKARTA', 40000),
(27, 25, 'JAKARTA', 'JAKARTA', 40000),
(28, 26, 'JAKARTA', 'JAKARTA', 40000),
(29, 27, 'JAKARTA', 'JAKARTA', 40000),
(30, 28, 'JAKARTA', 'JAKARTA', 40000),
(31, 29, 'JAKARTA', 'JAKARTA', 40000),
(32, 30, 'JAKARTA', 'JAKARTA', 40000),
(33, 31, 'JAKARTA', 'JAKARTA', 40000),
(34, 32, 'JAKARTA', 'JAKARTA', 40000),
(35, 33, 'JAKARTA', 'JAKARTA', 40000),
(36, 34, 'JAKARTA', 'JAKARTA', 40000),
(37, 35, 'JAKARTA', 'JAKARTA', 40000),
(38, 36, 'JAKARTA', 'JAKARTA', 40000),
(39, 37, 'JAKARTA', 'JAKARTA', 40000),
(40, 38, 'JAKARTA', 'JAKARTA', 40000),
(41, 39, 'JAKARTA', 'JAKARTA', 40000),
(42, 40, 'JAKARTA', 'JAKARTA', 40000),
(43, 41, 'JAKARTA', 'JAKARTA', 40000),
(44, 42, 'JAKARTA', 'JAKARTA', 40000),
(45, 43, 'JAKARTA', 'JAKARTA', 40000),
(46, 44, 'JAKARTA', 'JAKARTA', 40000),
(47, 45, 'JAKARTA', 'JAKARTA', 40000),
(48, 46, 'JAKARTA', 'JAKARTA', 40000),
(49, 47, 'JAKARTA', 'JAKARTA', 40000),
(50, 48, 'JAKARTA', 'JAKARTA', 40000),
(51, 49, 'JAKARTA', 'JAKARTA', 40000),
(52, 50, 'JAKARTA', 'JAKARTA', 40000),
(53, 51, 'JAKARTA', 'JAKARTA', 40000),
(54, 52, 'JAKARTA', 'JAKARTA', 40000),
(55, 53, 'JAKARTA', 'JAKARTA', 40000),
(56, 54, 'JAKARTA', 'JAKARTA', 40000),
(57, 55, 'JAKARTA', 'JAKARTA', 40000),
(58, 56, 'JAKARTA', 'JAKARTA', 40000),
(59, 57, 'JAKARTA', 'JAKARTA', 40000),
(60, 58, 'JAKARTA', 'JAKARTA', 40000),
(61, 59, 'JAKARTA', 'JAKARTA', 40000),
(62, 60, 'JAKARTA', 'JAKARTA', 40000),
(63, 61, 'JAKARTA', 'JAKARTA', 40000),
(64, 62, 'JAKARTA', 'JAKARTA', 40000),
(65, 63, 'JAKARTA', 'JAKARTA', 40000),
(66, 64, 'JAKARTA', 'JAKARTA', 40000),
(67, 65, 'JAKARTA', 'JAKARTA', 40000),
(68, 66, 'JAKARTA', 'JAKARTA', 40000),
(69, 67, 'JAKARTA', 'JAKARTA', 40000),
(70, 68, 'JAKARTA', 'JAKARTA', 40000),
(71, 69, 'JAKARTA', 'JAKARTA', 40000),
(72, 70, 'JAKARTA', 'JAKARTA', 40000),
(73, 71, 'JAKARTA', 'JAKARTA', 40000),
(74, 72, 'JAKARTA', 'JAKARTA', 40000),
(75, 73, 'JAKARTA', 'JAKARTA', 40000),
(76, 8, 'JAKARTA', 'JAKARTA', 40000);

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
('abdillah@mgi-gar.com', 'abdillah rahmad', 4, 'a187e8394409c890bdb09f36d11fbacd70571999', 'probition', 2000000, 75000, 0, 0, 'user', 'aktif', 17300, 23100),
('admin@mgi-gar.com', 'administrator', 0, '5913bc6448d75f24a87ebb48ef96d5a7a88d56b2', 'administrator', 0, 0, 0, 0, 'administrator', 'aktif', 0, 0),
('al@mgi-gar.com', 'AL Mirajab', 8, 'c3b2ff4fdcd0f97b9d5697d65fbb0d74957917dc', 'probition', 2000000, 75000, 0, 0, 'user', 'aktif', 17300, 23100),
('albert@mgi-gar.com', 'Aditya Albert', 96, '44a015691fe6a4ab9d506f2cc9054f5ddb839541', 'SPV', 8000000, 75000, 500000, 0, 'supervisor', 'aktif', 69400, 92500),
('alif@mgi-gar.com', 'alif hidayatullah', 8, 'd8dbafc74237ec0664d44a34ba173372ce0fbeb1', 'Probition', 2000000, 75000, 0, 0, 'user', 'aktif', 17300, 23100),
('dekiannisa@mgi-gar.com', 'Deki Annisa Arumdani', 4, 'b0c18f9cfd246c64a72c618377904a701573b05b', 'probition', 2000000, 75000, 0, 0, 'user', 'aktif', 17300, 23100),
('farid@mgi-gar.com', 'Muhammad Farid Pardy ', 96, '13634a0aa10786f3e1adf424e9370c7bd413a4d6', 'SPV', 8000000, 75000, 500000, 200000, 'supervisor', 'aktif', 69400, 92500),
('i.rinaldi@mgi-gar.com', 'Irwan Rinaldi', 96, 'edc833cf72fed10b0547c0abf7e3631af05500b9', 'Senior Manager', 10000000, 100000, 2000000, 0, 'supervisor', 'aktif', 86700, 115600),
('immanuel@mgi-gar.com', 'Immanuel Siburian', 16, '5ab42ce28e22e8aea30ad0de1c3fca64a668b25b', 'Probition', 2000000, 75000, 0, 0, 'user', 'aktif', 17300, 23100),
('kurnianto@mgi-gar.com', 'Kurnianto Dwisantoso', 8, '90dd702ee87653efd2458a75032deae8b290d787', 'Probition', 2000000, 75000, 0, 0, 'user', 'aktif', 17300, 23100),
('mardi@mgi-gar.com', 'mardi sasongko', 0, '2e44f82368688dc38e8e8b4eab59cacc7db591c9', 'Manager', 10000000, 200000, 3500000, 434000, 'supervisor', 'aktif', 86700, 115600),
('mirza@mgi-gar.com', 'mirza masita', 8, '7efa18b638f007c4561e9f495179f5e4e129f77b', 'Probition', 2400000, 65000, 0, 0, 'user', 'aktif', 20800, 27700),
('mrickymuliawan@gmail.com', 'ricky muliawan', 8, 'e015a4a8a28cbb7bd4c61f0bb786831762617a0b', 'software tester', 0, 0, 0, 0, 'administrator', 'aktif', 0, 0),
('noriska@mgi-gar.com', 'Noriska Sitty Fadhila', 8, 'b2be90c5ca208aa27bda0b18321de98307863627', 'Probition', 2000000, 75000, 0, 0, 'user', 'aktif', 17300, 23100),
('rahmiyatus@mgi-gar.com', 'Rahmiyatus syukra', 8, 'c7db9ebae842a0102dcedfbe38cc8957c3082073', 'Probition', 2000000, 75000, 0, 0, 'user', 'aktif', 17300, 23100),
('reynald@mgi-gar.com', 'Reynald Kurnia Mantovani', 8, '6747712baa6f84a7fd0488c6b7128854ca279fd8', 'Senior 1', 4200000, 60000, 500000, 200000, 'user', 'aktif', 36400, 48600),
('rizal@mgi-gar.com', 'Muhammad Rizal Halim', 96, '92c32fec95103a5e58e57440f445b085af09eef2', 'Semi Senior', 3100000, 50000, 600000, 200000, 'supervisor', 'aktif', 26900, 35800);

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
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `tbl_perusahaandetail`
--
ALTER TABLE `tbl_perusahaandetail`
  MODIFY `id_perusahaandetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `tbl_timesheet`
--
ALTER TABLE `tbl_timesheet`
  MODIFY `id_timesheet` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
