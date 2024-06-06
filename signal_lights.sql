-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 01:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `signal_lights`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_06_054829_create_signals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `signals`
--

CREATE TABLE `signals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sequence_a` int(11) NOT NULL,
  `sequence_b` int(11) NOT NULL,
  `sequence_c` int(11) NOT NULL,
  `sequence_d` int(11) NOT NULL,
  `green_interval` int(11) NOT NULL,
  `yellow_interval` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signals`
--

INSERT INTO `signals` (`id`, `sequence_a`, `sequence_b`, `sequence_c`, `sequence_d`, `green_interval`, `yellow_interval`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 4, 3, 32, 12, '2024-06-06 04:14:25', '2024-06-06 04:14:25'),
(2, 1, 2, 3, 4, 12, 12, '2024-06-06 04:38:34', '2024-06-06 04:38:34'),
(3, 1, 2, 3, 4, 23, 12, '2024-06-06 04:41:25', '2024-06-06 04:41:25'),
(4, 1, 2, 3, 4, 23, 23, '2024-06-06 04:43:29', '2024-06-06 04:43:29'),
(5, 1, 3, 4, 2, 12, 21, '2024-06-06 04:44:24', '2024-06-06 04:44:24'),
(6, 2, 1, 3, 4, 23, 23, '2024-06-06 04:45:54', '2024-06-06 04:45:54'),
(7, 1, 1, 1, 1, 11, 11, '2024-06-06 04:49:10', '2024-06-06 04:49:10'),
(8, 1, 2, 3, 4, 12, 23, '2024-06-06 05:17:42', '2024-06-06 05:17:42'),
(9, 2, 1, 4, 3, 8, 9, '2024-06-06 05:19:47', '2024-06-06 05:19:47'),
(10, 4, 3, 2, 1, 3, 3, '2024-06-06 05:22:10', '2024-06-06 05:22:10'),
(11, 1, 2, 3, 4, 2, 2, '2024-06-06 05:28:11', '2024-06-06 05:28:11'),
(12, 2, 3, 1, 4, 1, 1, '2024-06-06 05:38:51', '2024-06-06 05:38:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signals`
--
ALTER TABLE `signals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `signals`
--
ALTER TABLE `signals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
