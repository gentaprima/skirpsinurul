-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2019 at 02:07 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemetaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bansos`
--

CREATE TABLE `tb_bansos` (
  `id_bansos` varchar(20) NOT NULL,
  `id_kk_detail` varchar(15) NOT NULL,
  `kip` int(11) NOT NULL,
  `pkh` int(11) NOT NULL,
  `bsp` int(11) NOT NULL,
  `pbi_jk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bansos`
--

INSERT INTO `tb_bansos` (`id_bansos`, `id_kk_detail`, `kip`, `pkh`, `bsp`, `pbi_jk`) VALUES
('BSS-5764', 'KK-5252', 1, 0, 0, 0),
('BSS-6469', 'KK-9035', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelurahan`
--

CREATE TABLE `tb_kelurahan` (
  `id_kelurahan` varchar(20) NOT NULL,
  `nama_kelurahan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelurahan`
--

INSERT INTO `tb_kelurahan` (`id_kelurahan`, `nama_kelurahan`) VALUES
('13110', 'Kayu Putih'),
('13120', 'Jati'),
('13125', 'Rawamangun'),
('13130', 'Pisangan Timur'),
('13140', 'Cipinang'),
('13150', 'Jatinegara Kaum'),
('13160', 'Pulogadung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kk`
--

CREATE TABLE `tb_kk` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `status_perkawinan` varchar(15) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `status_pekerjaan` varchar(50) NOT NULL,
  `penghasilan` int(11) NOT NULL,
  `labels` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kk`
--

INSERT INTO `tb_kk` (`nik`, `nama`, `umur`, `status_perkawinan`, `pendidikan`, `status_pekerjaan`, `penghasilan`, `labels`) VALUES
('2017240071', 'Fikri Hidayat', 32, 'Kawin', 'M. Tsanawiyah', 'Pekerja bebas pertanian', 1000000, 'kurang mampu '),
('785787584758', 'nunru', 67, 'Belum Kawin', 'Paket A  M. Ibtidaiy', 'Berusaha dibantu buuruh tetap/dibayar', 1000000, 'kurang mampu ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kk_detail`
--

CREATE TABLE `tb_kk_detail` (
  `id_detail` varchar(15) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `id_kelurahan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kk_detail`
--

INSERT INTO `tb_kk_detail` (`id_detail`, `nik`, `id_kelurahan`) VALUES
('KK-5252', '785787584758', '13160'),
('KK-9035', '2017240071', '13140');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `fname`, `lname`, `email`, `password`) VALUES
('admin', 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bansos`
--
ALTER TABLE `tb_bansos`
  ADD PRIMARY KEY (`id_bansos`),
  ADD KEY `id_kk_detail` (`id_kk_detail`);

--
-- Indexes for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_kk_detail`
--
ALTER TABLE `tb_kk_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_kelurahan` (`id_kelurahan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bansos`
--
ALTER TABLE `tb_bansos`
  ADD CONSTRAINT `tb_bansos_ibfk_1` FOREIGN KEY (`id_kk_detail`) REFERENCES `tb_kk_detail` (`id_detail`);

--
-- Constraints for table `tb_kk_detail`
--
ALTER TABLE `tb_kk_detail`
  ADD CONSTRAINT `tb_kk_detail_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_kk` (`nik`),
  ADD CONSTRAINT `tb_kk_detail_ibfk_2` FOREIGN KEY (`id_kelurahan`) REFERENCES `tb_kelurahan` (`id_kelurahan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
