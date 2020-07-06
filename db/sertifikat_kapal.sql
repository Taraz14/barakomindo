-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2020 at 12:16 PM
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
-- Table structure for table `sertifikat_kapal`
--

CREATE TABLE `sertifikat_kapal` (
  `id_sertifikat` int(11) NOT NULL,
  `nama_kapal` varchar(255) NOT NULL,
  `nama_sertifikat` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `upload_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sertifikat_kapal`
--

INSERT INTO `sertifikat_kapal` (`id_sertifikat`, `nama_kapal`, `nama_sertifikat`, `file`, `upload_at`) VALUES
(4, 'Gunung Dempo', 'Holistik K-14', 'http://localhost/barakomindo/assets/uploads/sertifikat/1593605913470.pdf', 1593605913);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sertifikat_kapal`
--
ALTER TABLE `sertifikat_kapal`
  ADD PRIMARY KEY (`id_sertifikat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sertifikat_kapal`
--
ALTER TABLE `sertifikat_kapal`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
