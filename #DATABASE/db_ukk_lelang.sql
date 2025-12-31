-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 31, 2025 at 06:39 AM
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
-- Database: `db_ukk_lelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `starting_price` int NOT NULL,
  `highest_price` int DEFAULT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `winner_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('dibuka','ditutup') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`id`, `product_id`, `starting_price`, `highest_price`, `admin_id`, `winner_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 200000, 280000, 4, 5, 'ditutup', '2025-12-30 21:16:43', '2025-12-30 21:33:16'),
(2, 1, 100000, 105000, 4, 9, 'ditutup', '2025-12-30 22:12:12', '2025-12-30 22:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `auction_details`
--

CREATE TABLE `auction_details` (
  `id` bigint UNSIGNED NOT NULL,
  `auction_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `bid_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auction_details`
--

INSERT INTO `auction_details` (`id`, `auction_id`, `user_id`, `bid_price`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 220000, '2025-12-30 21:17:34', '2025-12-30 21:17:34'),
(2, 1, 9, 250000, '2025-12-30 21:24:11', '2025-12-30 21:24:11'),
(3, 1, 10, 260000, '2025-12-30 21:30:00', '2025-12-30 21:30:00'),
(4, 1, 5, 280000, '2025-12-30 21:31:47', '2025-12-30 21:31:47'),
(5, 2, 9, 105000, '2025-12-30 22:12:43', '2025-12-30 22:12:43');

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
(5, '2025_12_28_045412_create_products_table', 1),
(6, '2025_12_28_104904_create_auctions_table', 1),
(7, '2025_12_28_105647_create_auction_details_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pict` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','non-aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `pict`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sendal Jokowi', NULL, 'Aseli bekas kaki pria solo itu!!', 'non-aktif', '2025-12-30 21:16:31', '2025-12-30 22:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','masyarakat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `phone_number`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Juli Dina Uyainah S.Pd', 'rahayu.prasetyo', '$2y$10$U1PTgrh92sP8kDtBizptEOLce2m0Q1WBLV54StYlGedlAkZbJ8lZG', '085702941611', 'masyarakat', '2025-12-30 21:14:49', '2025-12-30 21:14:49'),
(2, 'Lamar Narji Sihotang', 'zulkarnain.dina', '$2y$10$RctYYZyjktrbx3KWCWGAnOP1HLViu3F/9SZ9BxiTiwOEaPeVrrZpO', '087565331819', 'masyarakat', '2025-12-30 21:14:49', '2025-12-30 21:14:49'),
(3, 'Umar Prasetya', 'gamblang17', '$2y$10$AwCt1ryXJe1j.9azd4bCae0K3/XsOdb6UXdySkC3L8Z0SflqlTJkW', '082036065180', 'masyarakat', '2025-12-30 21:14:49', '2025-12-30 21:14:49'),
(4, 'Jayadi Sihombing', 'wlaksita', '$2y$10$EGUmVVwJbVtkHIWA0Kt4KekDMZm/QdOuaX84LfoU1375VIAK4Z9fy', '088310312223', 'admin', '2025-12-30 21:14:49', '2025-12-30 21:14:49'),
(5, 'Nugraha Megantara', 'mursita00', '$2y$10$7E.mar244AHoY7e7G.j4reU3O1K7IRHi8GLpZclLNOt0yKH6U9JH2', '086972834961', 'masyarakat', '2025-12-30 21:14:49', '2025-12-30 21:14:49'),
(6, 'Kurnia Jasmani Santoso', 'zamira92', '$2y$10$IFdWRWKacIffif.IxvM9reDcIJYQKAWC3M2VSGMD1chmPJthyxirC', '080244797780', 'masyarakat', '2025-12-30 21:14:49', '2025-12-30 21:14:49'),
(7, 'Yance Eva Suryatmi S.Pd', 'rangga.agustina', '$2y$10$LTbderKdYYlKJGrA8NSHeeTBFM58bIq4izIvK9Ekb/6Adw8VLbgXC', '089357514118', 'masyarakat', '2025-12-30 21:14:49', '2025-12-30 21:14:49'),
(8, 'Puti Humaira Handayani', 'kariman72', '$2y$10$pgI3PRkrljnSDRAVGYYq9OjTWTSdK2ufjb9xlXcmF5BBKkXjJThR6', '087675971638', 'masyarakat', '2025-12-30 21:14:49', '2025-12-30 21:14:49'),
(9, 'Yosef Sinaga', 'dwijaya', '$2y$10$8ILEna5GGDKvWzfRtcCFJ.SEDceZ/d9.7dTpPdLVwNP7aamMRsqWG', '086393317566', 'masyarakat', '2025-12-30 21:14:49', '2025-12-30 21:14:49'),
(10, 'Elisa Aurora Fujiati', 'oni.lailasari', '$2y$10$8FfzA7WCHN2x0PRQ.1vlwO2ovys77OfIpaOn/Omm9hIsTR/nh9bdC', '081264094434', 'masyarakat', '2025-12-30 21:14:49', '2025-12-30 21:14:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auctions_product_id_foreign` (`product_id`),
  ADD KEY `auctions_winner_id_foreign` (`winner_id`),
  ADD KEY `auctions_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `auction_details`
--
ALTER TABLE `auction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auction_details_auction_id_foreign` (`auction_id`),
  ADD KEY `auction_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auction_details`
--
ALTER TABLE `auction_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auctions`
--
ALTER TABLE `auctions`
  ADD CONSTRAINT `auctions_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auctions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auctions_winner_id_foreign` FOREIGN KEY (`winner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auction_details`
--
ALTER TABLE `auction_details`
  ADD CONSTRAINT `auction_details_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auction_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
