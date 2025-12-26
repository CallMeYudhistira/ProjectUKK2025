-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 26, 2025 at 03:28 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ukk_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint UNSIGNED NOT NULL,
  `year` year NOT NULL,
  `amount` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `year`, `amount`, `created_at`, `updated_at`) VALUES
(1, '2025', 200000, '2025-12-26 07:53:05', '2025-12-26 07:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major` enum('RPL','TKJ','TEI','TPTU') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `major`, `created_at`, `updated_at`) VALUES
(1, '12 A', 'RPL', '2025-12-26 07:53:05', '2025-12-26 07:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_12_24_132359_create_grades_table', 1),
(6, '2025_12_24_133311_create_fees_table', 1),
(7, '2025_12_24_134427_create_students_table', 1),
(8, '2025_12_24_135648_create_payments_table', 1),
(9, '2025_12_26_054746_create_months_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` bigint UNSIGNED NOT NULL,
  `number` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `number`, `name`) VALUES
(1, 7, 'Juli'),
(2, 8, 'Agustus'),
(3, 9, 'September'),
(4, 10, 'Oktober'),
(5, 11, 'November'),
(6, 12, 'Desember'),
(7, 1, 'Januari'),
(8, 2, 'Februari'),
(9, 3, 'Maret'),
(10, 4, 'April'),
(11, 5, 'Mei'),
(12, 6, 'Juni');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `month_paid` int NOT NULL,
  `year_paid` year NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `nis`, `user_id`, `payment_date`, `month_paid`, `year_paid`, `total`, `created_at`, `updated_at`) VALUES
(1, '10156435', 7, '2025-10-26', 7, '2025', 200000, '2025-12-26 07:54:03', '2025-12-26 07:54:03'),
(2, '10156435', 7, '2025-11-26', 8, '2025', 200000, '2025-12-26 07:54:03', '2025-12-26 07:54:03'),
(3, '10156435', 7, '2025-11-26', 9, '2025', 200000, '2025-12-26 08:19:54', '2025-12-26 08:19:54'),
(4, '10156435', 7, '2025-12-26', 10, '2025', 200000, '2025-12-26 08:19:54', '2025-12-26 08:19:54'),
(5, '10156435', 7, '2025-12-26', 11, '2025', 200000, '2025-12-26 08:24:05', '2025-12-26 08:24:05'),
(6, '10156435', 7, '2025-12-26', 12, '2025', 200000, '2025-12-26 08:24:06', '2025-12-26 08:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` bigint UNSIGNED NOT NULL,
  `fee_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`nis`, `name`, `address`, `phone_number`, `grade_id`, `fee_id`, `created_at`, `updated_at`) VALUES
('10156435', 'Yudhistira', 'Gunung Leutik', '081316560366', 1, 1, '2025-12-26 07:53:53', '2025-12-26 07:53:53'),
('10652360', 'Daffa Dhaifullah', 'Padalarang', '08812637826', 1, 1, '2025-12-26 08:19:27', '2025-12-26 08:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Ghaliyati Gina Novitasari S.H.', 'bpurnawati', '$2y$10$kb85jWIbLjv2CynZymKtDOCRz9pA8TeBiI3pg.2CyPqABmKNHbIXe', 'petugas', '2025-12-26 07:53:05', '2025-12-26 07:53:05'),
(2, 'Joko Hidayat', 'rahimah.laras', '$2y$10$gPnfIYmcEQdysWT99tVixurHsiRgZs/2TqkHwnj/hwPUkCYse..56', 'petugas', '2025-12-26 07:53:05', '2025-12-26 07:53:05'),
(3, 'Gandi Prasasta', 'genta17', '$2y$10$T/tB4ujMdQjQRX7O45um0eFmDrRKQGCvd8xxyohSFBZ8uj/kNlqbu', 'petugas', '2025-12-26 07:53:05', '2025-12-26 07:53:05'),
(4, 'Bala Bakiman Waluyo', 'fujiati.hairyanto', '$2y$10$9pFivAi9UUl13j5rYRO.l.4EnwXS3VDmuGw8NoTBNP0n7spYStC9W', 'admin', '2025-12-26 07:53:05', '2025-12-26 07:53:05'),
(5, 'Bakiman Wahyu Budiman M.Farm', 'habibi.warsita', '$2y$10$jpdCRC42eLm1K8qdCIWznuDv5cdSXcELmHHvwFnLAdKDT3gYcuzam', 'admin', '2025-12-26 07:53:05', '2025-12-26 07:53:05'),
(6, 'Puti Puspasari M.M.', 'amandala', '$2y$10$vAthj9Ndz6jpzrbrSMzO1O4QVOQqmPj0OOftSEpLb6WgB64chSuWC', 'admin', '2025-12-26 07:53:05', '2025-12-26 07:53:05'),
(7, 'Almira Novitasari', 'mulya10', '$2y$10$iIDo5bBT/zpAfcGNBQXwtuEJ.c5Tkim.0Ed3Iq4yJjxVT8q.tpSZK', 'admin', '2025-12-26 07:53:05', '2025-12-26 07:53:05'),
(8, 'Samiah Mala Nasyiah', 'zaenab.melani', '$2y$10$9TMQ7myCn.8NqK6gZN1MpOfIte/Syz.5aVGpWXHMkOl7/RQkGRseO', 'petugas', '2025-12-26 07:53:05', '2025-12-26 07:53:05'),
(9, 'Gading Pradana', 'paris72', '$2y$10$7wnlRaX0M3NDyYkk52Kjt.MC8u5Eeni632PTuJxmTlCD1sfDu2Bvq', 'petugas', '2025-12-26 07:53:05', '2025-12-26 07:53:05'),
(10, 'Rahmi Paramita Aryani M.M.', 'fnajmudin', '$2y$10$KFKzGo1J8jVSEhsSCQLro.cvjFDL7EubtjA9vvfOpshJc3KvnBXHi', 'petugas', '2025-12-26 07:53:05', '2025-12-26 07:53:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_nis_foreign` (`nis`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `students_grade_id_foreign` (`grade_id`),
  ADD KEY `students_fee_id_foreign` (`fee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_nis_foreign` FOREIGN KEY (`nis`) REFERENCES `students` (`nis`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_fee_id_foreign` FOREIGN KEY (`fee_id`) REFERENCES `fees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
