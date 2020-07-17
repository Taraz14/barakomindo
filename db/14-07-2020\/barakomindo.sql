-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2020 at 02:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barakomindo`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Katolik'),
(4, 'Hindu'),
(5, 'Budha');

-- --------------------------------------------------------

--
-- Table structure for table `foto_kapal`
--

CREATE TABLE `foto_kapal` (
  `id_fkapal` int(11) NOT NULL,
  `id_kapal` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `post_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto_kapal`
--

INSERT INTO `foto_kapal` (`id_fkapal`, `id_kapal`, `id_user`, `foto`, `post_at`) VALUES
(29, 1, 1, 'http://localhost/barakomindo/assets/uploads/kapal/1593887916453.jpeg', 1593887916),
(35, 1, NULL, 'http://localhost/barakomindo/assets/uploads/kapal/1594725421377.jpg', 1594725421),
(36, 2, NULL, 'http://localhost/barakomindo/assets/uploads/kapal/1594725432041.png', 1594725432);

-- --------------------------------------------------------

--
-- Table structure for table `kapal`
--

CREATE TABLE `kapal` (
  `id_kapal` int(11) NOT NULL,
  `nama_kapal` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `kebangsaan` varchar(100) NOT NULL,
  `gt` varchar(8) NOT NULL,
  `call_sign` varchar(50) NOT NULL,
  `submit_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kapal`
--

INSERT INTO `kapal` (`id_kapal`, `nama_kapal`, `nama_pemilik`, `kebangsaan`, `gt`, `call_sign`, `submit_at`) VALUES
(1, 'Dobonsolo', 'PELNI', 'Indonesia', '2040', 'YB.2255', 1594723071),
(2, 'Labobar', 'PELNI', 'Indonesia', '2250', 'LB.1239', 1594723185);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `gender` varchar(30) NOT NULL,
  `status` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `npwp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(21) NOT NULL,
  `submit_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_pendidikan`, `id_agama`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `gender`, `status`, `nik`, `npwp`, `email`, `no_hp`, `submit_at`) VALUES
(16, 4, 1, 'Hesty ', 'Sorong', '2020-06-09', 'Jl. jalan', 'Perempuan', 'Sudah Menikah', '3276046501920003', '018550814412000', 'hesty@gmail.cok', '081234567891', 1593455963),
(25, 1, 1, 'aDAS', 'GDF', '0000-00-00', 'DSD', 'Laki-laki', 'Sudah Menikah', '2345678765433456', '345673345673456', 'd@gmail.com', '456754345', 1594210099),
(26, 1, 1, 'aDAS', 'GDF', '0000-00-00', 'DSD', 'Laki-laki', 'Sudah Menikah', '2345678765433456', '345673345673456', 'd@gmail.com', '456754345', 1594210107),
(27, 1, 1, 'aDAS', 'GDF', '0000-00-00', 'DSD', 'Laki-laki', 'Sudah Menikah', '2345678765433456', '345673345673456', 'd@gmail.com', '456754345', 1594210160);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_terakhir`
--

CREATE TABLE `pendidikan_terakhir` (
  `id_pendidikan` int(11) NOT NULL,
  `jenjang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan_terakhir`
--

INSERT INTO `pendidikan_terakhir` (`id_pendidikan`, `jenjang`) VALUES
(1, 'SMA/SMK'),
(2, 'D3'),
(3, 'D4'),
(4, 'S1'),
(5, 'S2');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat_kapal`
--

CREATE TABLE `sertifikat_kapal` (
  `id_sertifikat` int(11) NOT NULL,
  `id_kapal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_sertifikat` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `upload_at` int(11) NOT NULL,
  `expired` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sertifikat_kapal`
--

INSERT INTO `sertifikat_kapal` (`id_sertifikat`, `id_kapal`, `id_user`, `nama_sertifikat`, `file`, `upload_at`, `expired`) VALUES
(8, 2, 1, 'asd', 'http://localhost/barakomindo/assets/uploads/sertifikat/1594207587119.pdf', 1594207587, NULL),
(9, 1, 1, 'kjhgfd', 'http://localhost/barakomindo/assets/uploads/sertifikat/1594724936632.pdf', 1594724936, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(21) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(2) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `last_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_hp`, `password`, `role`, `foto`, `last_login`) VALUES
(1, 'Hesty Ningsih', 'hesty', 'hestyningsihh@gmail.com', 'Sorong', '2020-07-08', 'Km. 24, Perum. Daerah, Kabupaten Sorong', '08134456781960', '$2y$10$tYC35oIwV2GtQEHHwsNmde7pqFJxnNgVGX87I/cAZptoNJr3lQ.gy', 99, 'http://localhost/barakomindo/assets/uploads/profile/1594045083412.jpg', 1594204060),
(2, 'Fitri Febrianty', 'fitri', 'fitri@gmail.com', 'Sorong', '2020-07-08', 'Km. 24, Perum. Daerah, Kabupaten Sorong', '08134471245637', '$2y$10$acZ18mdv3OZowBaYQI/l2emkc9QonoOijWVsoNvPFAO6iN4nyTzra', 88, NULL, 1594198261),
(3, 'Febian Susanto', 'febian', 'fitri@gmail.com', 'Sorong', '2020-07-08', 'Km. 24, Perum. Daerah, Kabupaten Sorong', '08134471245637', '$2y$10$uCk7XMP5woseUCviPv5ZQuskzGnLviuAvc7YJbq9qU6FUYqtII2BO', 77, NULL, 1594198283);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `foto_kapal`
--
ALTER TABLE `foto_kapal`
  ADD PRIMARY KEY (`id_fkapal`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kapal` (`id_kapal`);

--
-- Indexes for table `kapal`
--
ALTER TABLE `kapal`
  ADD PRIMARY KEY (`id_kapal`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_pendidikan` (`id_pendidikan`),
  ADD KEY `id_agama` (`id_agama`);

--
-- Indexes for table `pendidikan_terakhir`
--
ALTER TABLE `pendidikan_terakhir`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `sertifikat_kapal`
--
ALTER TABLE `sertifikat_kapal`
  ADD PRIMARY KEY (`id_sertifikat`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kapal` (`id_kapal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foto_kapal`
--
ALTER TABLE `foto_kapal`
  MODIFY `id_fkapal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kapal`
--
ALTER TABLE `kapal`
  MODIFY `id_kapal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pendidikan_terakhir`
--
ALTER TABLE `pendidikan_terakhir`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sertifikat_kapal`
--
ALTER TABLE `sertifikat_kapal`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto_kapal`
--
ALTER TABLE `foto_kapal`
  ADD CONSTRAINT `foto_kapal_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_pendidikan`) REFERENCES `pendidikan_terakhir` (`id_pendidikan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sertifikat_kapal`
--
ALTER TABLE `sertifikat_kapal`
  ADD CONSTRAINT `sertifikat_kapal_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
