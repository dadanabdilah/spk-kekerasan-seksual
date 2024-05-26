-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2024 at 01:29 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `basis_aturan_jenis_kekerasan_seksual`
--

CREATE TABLE `basis_aturan_jenis_kekerasan_seksual` (
  `id_aturanjenis` int NOT NULL,
  `id_jenis` int NOT NULL
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `basis_aturan_sanksi`
--

CREATE TABLE `basis_aturan_sanksi` (
  `id_aturansanksi` int NOT NULL,
  `id_sanksi` int NOT NULL
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_basis_aturan_jenis_kekerasan_seksual`
--

CREATE TABLE `detail_basis_aturan_jenis_kekerasan_seksual` (
  `id` int NOT NULL,
  `id_aturanjenis` int NOT NULL,
  `id_diagnosa` int NOT NULL
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_basis_aturan_sanksi`
--

CREATE TABLE `detail_basis_aturan_sanksi` (
  `id` int NOT NULL,
  `id_aturansanksi` int NOT NULL,
  `id_pelanggaran` int NOT NULL
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_konsultasi_jenis_ks`
--

CREATE TABLE `detail_konsultasi_jenis_ks` (
  `id` int NOT NULL,
  `id_konsul_jenis` int NOT NULL,
  `id_diagnosa` int NOT NULL
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_konsultasi_sanksi_administratif`
--

CREATE TABLE `detail_konsultasi_sanksi_administratif` (
  `id` int NOT NULL,
  `id_konsul_sanksi` int NOT NULL,
  `id_pelanggaran` int NOT NULL
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_diagnosa` int NOT NULL,
  `nama_diagnosa` varchar(200)
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kekerasan_seksual`
--

CREATE TABLE `jenis_kekerasan_seksual` (
  `id_jenis` int NOT NULL,
  `nmjenis` varchar(100),
  `keterangan` varchar(255),
  `solusi` varchar(225)
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi_jenis_ks`
--

CREATE TABLE `konsultasi_jenis_ks` (
  `id_konsul_jenis` int NOT NULL,
  `tgl` date NOT NULL,
  `nmpelapor` varchar(50),
  `nama_pelaku` varchar(100),
  `tlp` char(16),
  `alamat` mediumtext,
  `kondisi` varchar(100),
  `status` varchar(10),
  `id_user` int NOT NULL
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi_sanksi_administratif`
--

CREATE TABLE `konsultasi_sanksi_administratif` (
  `id_konsul_sanksi` int NOT NULL,
  `tgl` date NOT NULL,
  `nmpelapor` varchar(50),
  `tlp` char(16),
  `alamat` mediumtext,
  `kondisi` int NOT NULL,
  `status` enum('mahasiswa','pendidik','tenaga_pendidik','warga_kampus','masyarakat_umum'),
  `id_user` int NOT NULL
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `lapor_konsultasi_jenis_ks`
--

CREATE TABLE `lapor_konsultasi_jenis_ks` (
  `id_lapor_konsul` int NOT NULL,
  `nama_pelapor` varchar(50),
  `nama_pelaku` varchar(100),
  `tlp` char(16),
  `email` varchar(100),
  `alamat` mediumtext,
  `jenis_ks` mediumtext,
  `cerita_peristiswa` mediumtext,
  `disabilitas` enum('ya','tidak'),
  `status` varchar(100),
  `alasan_pengaduan` mediumtext,
  `no_hp_lain` varchar(20),
  `email_lain` varchar(100),
  `tgl` date NOT NULL,
  `bukti` varchar(128),
  `id_user` int NOT NULL
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int NOT NULL,
  `nama_pelanggaran` varchar(200)
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `sanksi_administratif`
--

CREATE TABLE `sanksi_administratif` (
  `id_sanksi` int NOT NULL,
  `nmsanksi` varchar(100),
  `keterangan` varchar(100)
) ENGINE=InnoDB  ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('satgas_ppks','pelapor','pimpinan_pt'),
  `tanggal_dibuat` date NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `email`, `password`, `role`, `tanggal_dibuat`) VALUES
(2, 'Satgas', 'satgas@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'satgas_ppks', '2024-04-16'),
(3, 'Pelapor', 'pelapor@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'pelapor', '2024-04-16'),
(4, 'Pimpinan', 'pimpinan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'pimpinan_pt', '2024-04-17'),
(5, 'Testing', 'testing@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'pelapor', '2024-04-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basis_aturan_jenis_kekerasan_seksual`
--
ALTER TABLE `basis_aturan_jenis_kekerasan_seksual`
  ADD PRIMARY KEY (`id_aturanjenis`) USING BTREE;

--
-- Indexes for table `basis_aturan_sanksi`
--
ALTER TABLE `basis_aturan_sanksi`
  ADD PRIMARY KEY (`id_aturansanksi`) USING BTREE;

--
-- Indexes for table `detail_basis_aturan_jenis_kekerasan_seksual`
--
ALTER TABLE `detail_basis_aturan_jenis_kekerasan_seksual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_basis_aturan_sanksi`
--
ALTER TABLE `detail_basis_aturan_sanksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_konsultasi_jenis_ks`
--
ALTER TABLE `detail_konsultasi_jenis_ks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_konsultasi_sanksi_administratif`
--
ALTER TABLE `detail_konsultasi_sanksi_administratif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`) USING BTREE;

--
-- Indexes for table `jenis_kekerasan_seksual`
--
ALTER TABLE `jenis_kekerasan_seksual`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `konsultasi_jenis_ks`
--
ALTER TABLE `konsultasi_jenis_ks`
  ADD PRIMARY KEY (`id_konsul_jenis`) USING BTREE;

--
-- Indexes for table `konsultasi_sanksi_administratif`
--
ALTER TABLE `konsultasi_sanksi_administratif`
  ADD PRIMARY KEY (`id_konsul_sanksi`) USING BTREE;

--
-- Indexes for table `lapor_konsultasi_jenis_ks`
--
ALTER TABLE `lapor_konsultasi_jenis_ks`
  ADD PRIMARY KEY (`id_lapor_konsul`) USING BTREE;

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`) USING BTREE;

--
-- Indexes for table `sanksi_administratif`
--
ALTER TABLE `sanksi_administratif`
  ADD PRIMARY KEY (`id_sanksi`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis_aturan_jenis_kekerasan_seksual`
--
ALTER TABLE `basis_aturan_jenis_kekerasan_seksual`
  MODIFY `id_aturanjenis` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `basis_aturan_sanksi`
--
ALTER TABLE `basis_aturan_sanksi`
  MODIFY `id_aturansanksi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_basis_aturan_jenis_kekerasan_seksual`
--
ALTER TABLE `detail_basis_aturan_jenis_kekerasan_seksual`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_basis_aturan_sanksi`
--
ALTER TABLE `detail_basis_aturan_sanksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_konsultasi_jenis_ks`
--
ALTER TABLE `detail_konsultasi_jenis_ks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_konsultasi_sanksi_administratif`
--
ALTER TABLE `detail_konsultasi_sanksi_administratif`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_diagnosa` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_kekerasan_seksual`
--
ALTER TABLE `jenis_kekerasan_seksual`
  MODIFY `id_jenis` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konsultasi_jenis_ks`
--
ALTER TABLE `konsultasi_jenis_ks`
  MODIFY `id_konsul_jenis` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konsultasi_sanksi_administratif`
--
ALTER TABLE `konsultasi_sanksi_administratif`
  MODIFY `id_konsul_sanksi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lapor_konsultasi_jenis_ks`
--
ALTER TABLE `lapor_konsultasi_jenis_ks`
  MODIFY `id_lapor_konsul` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanksi_administratif`
--
ALTER TABLE `sanksi_administratif`
  MODIFY `id_sanksi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
