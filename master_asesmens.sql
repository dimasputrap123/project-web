-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2025 at 11:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_asesment`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_asesmens`
--

CREATE TABLE `master_asesmens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `pertanyaan_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_asesmens`
--

INSERT INTO `master_asesmens` (`id`, `pertanyaan`, `status`, `created_at`, `updated_at`, `pertanyaan_slug`) VALUES
(1, 'Jumlah anggota keluarga', 1, '2024-12-14 16:02:33', '2024-12-14 16:02:33', 'anggota_kk'),
(2, 'Jumlah pendapatan pengurus keluarga', 1, '2024-12-14 16:04:24', '2024-12-14 16:04:24', 'pendapatan'),
(3, 'Kondisi rumah', 1, '2024-12-14 16:04:47', '2024-12-14 16:04:47', 'kondisi_rumah'),
(4, 'Sumber air minum', 1, '2024-12-14 16:05:06', '2024-12-14 16:05:06', 'sumber_air_minum'),
(5, 'Sumber penerangan rumah', 1, '2024-12-14 16:06:12', '2024-12-14 16:06:12', 'akses_listrik'),
(6, 'Kepemilikan aset', 1, '2024-12-14 16:11:20', '2024-12-14 16:11:20', 'kepemilikan_aset'),
(7, 'Pekerjaan pengurus keluarga', 1, '2024-12-14 16:11:38', '2024-12-14 16:11:38', 'pekerjaan'),
(8, 'Status kepemilikan rumah', 1, '2024-12-14 16:11:52', '2024-12-14 16:11:52', 'status_kepemilikan_rumah'),
(9, 'Penghasilan dibawah ump', 1, '2024-12-14 16:13:56', '2024-12-14 16:13:56', 'penghasilan_dibawah_ump'),
(10, 'Memiliki aset produktif', 1, '2024-12-14 16:14:24', '2024-12-14 16:14:24', 'aset_produktif'),
(11, 'Akses pendidikan', 1, '2024-12-14 16:14:44', '2024-12-14 16:14:44', 'akses_pendidikan'),
(12, 'Akses kesehatan', 1, '2024-12-14 16:15:02', '2024-12-14 16:15:02', 'akses_kesehatan'),
(13, 'Akses sanitasi', 1, '2024-12-14 16:15:21', '2024-12-14 16:15:21', 'akses_sanitasi'),
(14, 'Akses listrik', 1, '2024-12-14 21:03:36', '2024-12-14 21:03:36', 'akses_listrik_ump'),
(15, 'Rumah tidak layak huni', 1, '2024-12-14 21:04:05', '2024-12-14 21:04:05', 'rumah_tidak_layak_huni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_asesmens`
--
ALTER TABLE `master_asesmens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_asesmens`
--
ALTER TABLE `master_asesmens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
