-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2020 at 03:58 AM
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
(41, 19, NULL, 'http://localhost/barakomindo/assets/uploads/kapal/1596107051418.jpeg', 1596107051),
(42, 19, NULL, 'http://localhost/barakomindo/assets/uploads/kapal/1596115538382.jpg', 1596115538);

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
(19, 'Dobonsolo', 'PELNI', 'Indonesia', '160', 'DB 5997', 1595953830),
(20, 'barokah', 'asep', 'indonesia', '456', 'YB 2356', 1596116213),
(21, 'ghj', 'kol', 'indonesia', '475', 'YB 3455', 1596116238),
(22, 'jjjjj', 'wortel', 'indonesia', '4758', 'YB 4333', 1596116266);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_dump`
--

CREATE TABLE `laporan_dump` (
  `id_lap` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kapal` int(11) NOT NULL,
  `nama_sertifikat` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `upload_at` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_dump`
--

INSERT INTO `laporan_dump` (`id_lap`, `id_user`, `id_kapal`, `nama_sertifikat`, `startDate`, `endDate`, `upload_at`, `is_deleted`) VALUES
(1, 1, 19, 'gkgjk', '2020-07-15', '2020-08-11', 1596114455, 0),
(2, 1, 19, 'ui', '2020-07-05', '2020-07-16', 1596114473, 0),
(3, 1, 19, 'gh', '2020-07-16', '2020-07-22', 1596114494, 1),
(4, 1, 19, 'ghg', '2020-07-02', '2020-08-22', 1596114513, 1),
(6, 2, 20, 'Holistik K-14', '2020-07-15', '2020-08-06', 1596116697, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `gender` varchar(30) NOT NULL,
  `status` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `npwp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `submit_at` int(11) NOT NULL,
  `update_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_pendidikan`, `id_agama`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `gender`, `status`, `nik`, `npwp`, `email`, `no_hp`, `submit_at`, `update_at`) VALUES
(60, 3, 2, 'Nova', 'Sorong', '2020-07-02', 'Jl. Sledri', 'Laki-laki', 'Sudah Menikah', '2324324543123432', '987654334567876', 'jfuhefuowhf@ifdiee.com', '5377521787217', 0, 1595899354),
(62, 3, 2, 'Jeniffer', 'Sorong', '2020-07-02', 'Jl. Gambas', 'Laki-laki', 'Sudah Menikah', '4672376134153315', '412344234543524', 'jfuhefuowhf@ifdiee.com', '5377521787217', 0, 1595899242);

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
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `upload_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sertifikat_kapal`
--

INSERT INTO `sertifikat_kapal` (`id_sertifikat`, `id_kapal`, `id_user`, `nama_sertifikat`, `file`, `startDate`, `endDate`, `upload_at`) VALUES
(1, 19, 1, 'gkgjk', '1596114455504.pdf', '2020-07-15', '2020-08-11', 1596114455),
(2, 19, 1, 'ui', '1596114473445.pdf', '2020-07-05', '2020-07-16', 1596114473),
(8, 20, 2, 'Holistik K-14', '1596116697676.pdf', '2020-07-15', '2020-08-06', 1596116697);

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
(1, 'Hesty Ningsih', 'hesty', 'hestyningsihh@gmail.com', 'Sorong', '2020-08-05', 'Km. 24, Perum. Daerah, Kabupaten Sorong', '08134456781960', '$2y$10$tYC35oIwV2GtQEHHwsNmde7pqFJxnNgVGX87I/cAZptoNJr3lQ.gy', 99, 'http://localhost/barakomindo/assets/uploads/profile/1594045083412.jpg', 1598450995),
(2, 'Fitri Febrianty', 'fitri', 'fitri@gmail.com', 'Sorong', '2020-07-08', 'Km. 24, Perum. Daerah, Kabupaten Sorong', '08134471245637', '$2y$10$acZ18mdv3OZowBaYQI/l2emkc9QonoOijWVsoNvPFAO6iN4nyTzra', 88, NULL, 1597983319),
(3, 'Febian Susanto', 'febian', 'fitri@gmail.com', 'Sorong', '2020-07-08', 'Km. 24, Perum. Daerah, Kabupaten Sorong', '08134471245637', '$2y$10$uCk7XMP5woseUCviPv5ZQuskzGnLviuAvc7YJbq9qU6FUYqtII2BO', 77, NULL, 1598451139);

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
-- Indexes for table `laporan_dump`
--
ALTER TABLE `laporan_dump`
  ADD PRIMARY KEY (`id_lap`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kapal` (`id_kapal`);

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
  MODIFY `id_fkapal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `kapal`
--
ALTER TABLE `kapal`
  MODIFY `id_kapal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `laporan_dump`
--
ALTER TABLE `laporan_dump`
  MODIFY `id_lap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `pendidikan_terakhir`
--
ALTER TABLE `pendidikan_terakhir`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sertifikat_kapal`
--
ALTER TABLE `sertifikat_kapal`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
