-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2017 at 11:27 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengajuan_cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` int(10) NOT NULL,
  `id_pbarang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_cuti`
--

CREATE TABLE `data_cuti` (
  `id_cuti` int(10) NOT NULL,
  `id_pcuti` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_cuti`
--

INSERT INTO `data_cuti` (`id_cuti`, `id_pcuti`) VALUES
(1, 13),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(10) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(3, 'web development'),
(4, 'desain grafis');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_cuti`
--

CREATE TABLE `jenis_cuti` (
  `id_jcuti` int(10) NOT NULL,
  `nama_cuti` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_cuti`
--

INSERT INTO `jenis_cuti` (`id_jcuti`, `nama_cuti`) VALUES
(2, 'cuti tahunan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` int(10) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `kategori`) VALUES
(3, 'elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `alamat_pegawai` varchar(50) NOT NULL,
  `telpon_pegawai` varchar(12) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `id_jabatan`, `jenis_kelamin`, `email`, `alamat_pegawai`, `telpon_pegawai`, `foto`, `username`, `password`) VALUES
('p001', 'gb', '3', 'peremapuan', 'dfafd@gmsil.com', 'dasf', '212324', 'gnfi.png', 'admin', 'admin'),
('p01', 'yuan', '3', 'laki-laki', 'yuaneko95@gmail.com', 'tambak mayor', '08976301919', 'Koala.jpg', 'yuan', 'yuan'),
('p03', 'rohman', '3', 'laki-laki', 'rohman@gmail.com', 'tambak mayor', '098976667', 'Desert.jpg', 'rohman', 'rohman'),
('p07', 'sdf', '4', 'peremapuan', 'adfal@daff.com', 'fafa', '09089786', 'Lighthouse.jpg', 'admin', 'admin'),
('p12', 'asdads', '3', 'laki-laki', 'asdfaff@gmail.com', 'asdadsd', '1223244', 'Lighthouse.jpg', 'admin', 'admin'),
('p13', 'dfsfs', '3', 'perempuan', 'asd@gmail.com', 'afdfdsf', '09876', 'Penguins.jpg', 'admin', 'admin'),
('p14', 'ascdsd', '3', 'laki-laki', 'vdffd@gmail.com', 'asfsdffd', '654324565', 'data cuti pegawai.png', 'admin', 'admin'),
('p15', 'asaddfs', '3', 'perempuan', 'sadfadf@gamil.com', 'dfsdfs', '09897', 'kategori.png', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan_barang`
--

CREATE TABLE `pengadaan_barang` (
  `id_pbarang` int(10) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `berkas` varchar(50) NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan_barang`
--

INSERT INTO `pengadaan_barang` (`id_pbarang`, `id_pegawai`, `id_kategori`, `nama_barang`, `tgl_pengajuan`, `berkas`, `alasan`) VALUES
(1, 'p03', 3, 'asdfa', '2017-01-25', '1658_Aditya CV.docx', 'sdafsdf'),
(2, 'p03', 3, 'asdsad', '2017-01-25', 'CV-Templates-Curriculum-Vitae.doc', 'dasdad');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_cuti`
--

CREATE TABLE `permohonan_cuti` (
  `id_pcuti` int(10) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `id_jcuti` int(10) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `lama_cuti` int(4) NOT NULL,
  `tgl_mulai_cuti` date NOT NULL,
  `tgl_akhir_cuti` date NOT NULL,
  `alasan` text NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permohonan_cuti`
--

INSERT INTO `permohonan_cuti` (`id_pcuti`, `id_pegawai`, `id_jcuti`, `tgl_pengajuan`, `lama_cuti`, `tgl_mulai_cuti`, `tgl_akhir_cuti`, `alasan`, `status`) VALUES
(13, 'p01', 2, '2017-01-21', 3, '2017-01-21', '2017-01-21', 'loro', 'disetujui'),
(21, 'p03', 2, '2017-01-22', 2, '2017-01-25', '2017-01-26', 'Dadi manten', 'ditolak'),
(24, 'p03', 2, '2017-01-22', 2, '2017-02-09', '2017-02-10', 'sakit', 'disetujui'),
(25, 'p01', 2, '2017-01-27', 3, '2017-01-14', '2017-01-17', 'mnbv', 'ditolak'),
(26, 'p01', 2, '2017-01-27', 2, '2017-01-19', '2017-01-21', 'dfghjk', 'disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username_admin` varchar(30) NOT NULL,
  `password_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `alamat`, `telpon`, `email`, `jenis_kelamin`, `foto`, `username_admin`, `password_admin`) VALUES
(1, 'yuan', 'tambak mayor ', '08976301919', 'yuaneko95@gmail.com', 'laki-laki', '', 'yuan', 'yuan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `data_cuti`
--
ALTER TABLE `data_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  ADD PRIMARY KEY (`id_jcuti`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengadaan_barang`
--
ALTER TABLE `pengadaan_barang`
  ADD PRIMARY KEY (`id_pbarang`);

--
-- Indexes for table `permohonan_cuti`
--
ALTER TABLE `permohonan_cuti`
  ADD PRIMARY KEY (`id_pcuti`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_cuti`
--
ALTER TABLE `data_cuti`
  MODIFY `id_cuti` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  MODIFY `id_jcuti` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengadaan_barang`
--
ALTER TABLE `pengadaan_barang`
  MODIFY `id_pbarang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `permohonan_cuti`
--
ALTER TABLE `permohonan_cuti`
  MODIFY `id_pcuti` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
