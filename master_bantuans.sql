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
-- Table structure for table `master_bantuans`
--

CREATE TABLE `master_bantuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bantuan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_bantuans`
--

INSERT INTO `master_bantuans` (`id`, `bantuan`, `created_at`, `updated_at`) VALUES
(1, 'BLT', '2024-12-14 22:51:19', '2024-12-14 22:51:19'),
(2, 'Bantuan Sembako', '2024-12-14 22:51:28', '2024-12-14 22:51:28'),
(3, 'PKH', '2024-12-14 22:51:39', '2024-12-14 22:51:39'),
(4, 'Tidak Layak Menerima', '2024-12-14 22:51:51', '2024-12-14 22:51:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_bantuans`
--
ALTER TABLE `master_bantuans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_bantuans`
--
ALTER TABLE `master_bantuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
