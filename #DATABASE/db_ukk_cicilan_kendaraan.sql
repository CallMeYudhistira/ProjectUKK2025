-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2025 at 02:47 PM
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
-- Database: `db_ukk_cicilan_kendaraan`
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
(5, '2025_11_10_030827_create_periods_table', 1),
(6, '2025_11_10_035011_create_vehicles_table', 1),
(7, '2025_11_23_115152_create_submissions_table', 1),
(8, '2025_11_23_125130_create_payments_table', 1);

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
  `payment_id` bigint UNSIGNED NOT NULL,
  `submission_id` bigint UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `amount_of_paid` bigint NOT NULL,
  `remaining_debt` bigint NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `submission_id`, `payment_date`, `amount_of_paid`, `remaining_debt`, `status`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-09-15', 113220825, 3962728865, 'belum lunas', 'First', '2025-12-14 23:34:50', '2025-12-14 23:34:50'),
(2, 1, '2025-10-15', 113220825, 3849508040, 'belum lunas', 'Second', '2025-12-14 23:35:19', '2025-12-14 23:35:19'),
(3, 1, '2025-11-15', 113220825, 3736287215, 'belum lunas', 'Third', '2025-12-14 23:37:03', '2025-12-14 23:37:03'),
(4, 2, '2025-01-15', 16321363, 179534988, 'belum lunas', '1', '2025-12-14 23:42:04', '2025-12-14 23:42:04'),
(5, 2, '2025-02-15', 16321363, 163213625, 'belum lunas', '2', '2025-12-14 23:42:20', '2025-12-14 23:42:20'),
(6, 2, '2025-03-15', 16321363, 146892262, 'belum lunas', '3', '2025-12-14 23:42:33', '2025-12-14 23:42:33'),
(7, 2, '2025-04-15', 16321363, 130570899, 'belum lunas', '4', '2025-12-14 23:42:48', '2025-12-14 23:42:48'),
(8, 2, '2025-05-15', 16321363, 114249536, 'belum lunas', '5', '2025-12-14 23:43:06', '2025-12-14 23:43:06'),
(9, 2, '2025-06-15', 16321363, 97928173, 'belum lunas', '6', '2025-12-14 23:43:23', '2025-12-14 23:43:23'),
(10, 2, '2025-07-15', 16321363, 81606810, 'belum lunas', '7', '2025-12-14 23:43:37', '2025-12-14 23:43:37'),
(11, 2, '2025-08-15', 16321363, 65285447, 'belum lunas', '8', '2025-12-14 23:44:18', '2025-12-14 23:44:18'),
(12, 2, '2025-09-15', 16321363, 48964084, 'belum lunas', '9', '2025-12-14 23:44:45', '2025-12-14 23:44:45'),
(13, 2, '2025-10-15', 16321363, 32642721, 'belum lunas', '10', '2025-12-14 23:45:00', '2025-12-14 23:45:00'),
(16, 2, '2025-11-15', 16321363, 16321358, 'belum lunas', '11', '2025-12-14 23:46:34', '2025-12-14 23:46:34'),
(19, 2, '2025-12-15', 16321363, 0, 'lunas', '12', '2025-12-15 00:02:10', '2025-12-15 00:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `period_id` bigint UNSIGNED NOT NULL,
  `time_period` int NOT NULL,
  `interest` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`period_id`, `time_period`, `interest`, `created_at`, `updated_at`) VALUES
(1, 36, 0.05, '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(2, 24, 0.10, '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(3, 18, 0.05, '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(4, 24, 0.10, '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(5, 12, 0.08, '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(6, 12, 0.03, '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(7, 18, 0.10, '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(8, 36, 0.03, '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(9, 24, 0.03, '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(10, 30, 0.05, '2025-12-04 14:57:24', '2025-12-04 14:57:24');

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
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `submission_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `vehicle_id` bigint UNSIGNED NOT NULL,
  `period_id` bigint UNSIGNED NOT NULL,
  `submission_date` date NOT NULL,
  `total_price` bigint NOT NULL,
  `monthly_installments` bigint NOT NULL,
  `identity_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`submission_id`, `user_id`, `vehicle_id`, `period_id`, `submission_date`, `total_price`, `monthly_installments`, `identity_card`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2025-09-04', 4075949690, 113220825, 'user_id-1_04-12-2025_1764885498.jpg', 'diterima', '2025-12-04 14:58:18', '2025-12-04 14:58:44'),
(2, 4, 3, 6, '2025-01-15', 195856351, 16321363, 'user_id-4_15-12-2025_1765780854.jpg', 'diterima', '2025-12-14 23:40:54', '2025-12-14 23:41:35');

-- --------------------------------------------------------

--
-- Stand-in structure for view `submission_list`
-- (See below for the actual view)
--
CREATE TABLE `submission_list` (
`bunga` decimal(5,2)
,`cicilan` bigint
,`created_at` timestamp
,`foto_kendaraan` varchar(255)
,`ktp` varchar(255)
,`merk_kendaraan` varchar(255)
,`nama_kendaraan` varchar(255)
,`nama_nasabah` varchar(255)
,`periode_terbayar` bigint
,`sisa` bigint
,`status_bayar` varchar(5)
,`status_pengajuan` varchar(255)
,`submission_id` bigint unsigned
,`tgl_pengajuan` date
,`tipe_kendaraan` varchar(255)
,`total` bigint
,`total_bayar` decimal(41,0)
,`user_id` bigint unsigned
,`vehicle_id` bigint unsigned
,`waktu` int
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Lalita Calista Oktaviani', 'daliono.astuti@example.org', '$2y$10$rWx0KugNRZzCx.aZ5T5kq.Zr0cf4.WxH7nlz8LCGgI5gu80.LEac2', 'nasabah', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(2, 'Daru Tarihoran', 'laksmiwati.daliman@example.org', '$2y$10$zkHsBCywF3k.PksKgmz5Z.HMqq.6GEeuwtcVTn0.kzPqEapbOZpgm', 'admin', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(3, 'Suci Farida', 'eli.zulaika@example.net', '$2y$10$HwO16aQEWSkmwWfk4Bunde.xl4H2rGm5hs.NigXCyTkkrF9olZ4pi', 'admin', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(4, 'Humaira Andriani', 'kamaria50@example.com', '$2y$10$fX7x6v1ZJQzv9pI0okF2feLTCtHQPOwdA1OapwNrUvNkXCzVjqtY2', 'nasabah', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(5, 'Raditya Lazuardi', 'sitompul.galuh@example.net', '$2y$10$tIHkYKH/hZROhpvY3QyRQuMfVXeRR6L.kopwVixOo0rvp1qfTpe0i', 'admin', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(6, 'Dasa Prabowo', 'eastuti@example.org', '$2y$10$u5pRl7Za5L5vXZtV82InC.GSvLRLB3V7rxtgwW/4puL4SM.TmyHDa', 'admin', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(7, 'Nova Andriani S.Gz', 'okto69@example.org', '$2y$10$fLjrVexTkh0gTQ/Gouc3..vTvlwjiiVFahAnqkuLfYnvxbpdLPCHG', 'nasabah', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(8, 'Rini Astuti', 'cahyono33@example.net', '$2y$10$t7rBrXqJqUQ93cmljdGPke8VIx41T/lgp6in1JHpBhwvwOxKVIwTC', 'admin', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(9, 'Setya Wibisono', 'pandu.mansur@example.com', '$2y$10$Fk82mZliy4qvTWrYj4EfYOlqtARcBeEUPjH7kquxHHyl52xVfgzhG', 'admin', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(10, 'Wahyu Edi Habibi S.H.', 'lpertiwi@example.com', '$2y$10$ddjVRn8agXNHBOjvZntIVuvVCDwWI.bI87kbvUOJS0iF0U0WnGq5u', 'admin', '2025-12-04 14:57:24', '2025-12-04 14:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` bigint UNSIGNED NOT NULL,
  `pict` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint NOT NULL,
  `production_year` year NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `pict`, `vehicle_name`, `brand`, `type`, `price`, `production_year`, `created_at`, `updated_at`) VALUES
(1, 'photo.png', 'Tamba', 'Febi', 'mobil', 3881856848, '2003', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(2, 'photo.png', 'Habibi', 'Ilsa', 'mobil', 5057165635, '1987', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(3, 'photo.png', 'Oktaviani', 'Silvia', 'mobil', 190151797, '2016', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(4, 'photo.png', 'Permata', 'Jono', 'motor', 1017404196, '1979', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(5, 'photo.png', 'Wacana', 'Eka', 'mobil', 4005344610, '2022', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(6, 'photo.png', 'Rajata', 'Asmadi', 'motor', 1420250186, '1979', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(7, 'photo.png', 'Nurdiyanti', 'Puspa', 'motor', 2300213172, '2024', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(8, 'photo.png', 'Hutagalung', 'Asman', 'motor', 3129742149, '1989', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(9, 'photo.png', 'Prakasa', 'Ade', 'mobil', 4581430875, '1995', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(10, 'photo.png', 'Farida', 'Zelaya', 'mobil', 413380570, '1974', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(11, 'photo.png', 'Sudiati', 'Baktiono', 'motor', 4327114136, '1976', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(12, 'photo.png', 'Utami', 'Najam', 'mobil', 2883627004, '1998', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(13, 'photo.png', 'Zulkarnain', 'Erik', 'mobil', 5694871161, '1982', '2025-12-04 14:57:24', '2025-12-04 14:57:24'),
(14, 'photo.png', 'Maulana', 'Utama', 'mobil', 462529510, '2004', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(15, 'photo.png', 'Fujiati', 'Puji', 'mobil', 6098272137, '2010', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(16, 'photo.png', 'Jailani', 'Pandu', 'mobil', 3619191957, '2020', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(17, 'photo.png', 'Manullang', 'Dartono', 'mobil', 9923558023, '1998', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(18, 'photo.png', 'Suartini', 'Septi', 'mobil', 6812205348, '2006', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(19, 'photo.png', 'Nasyiah', 'Sakura', 'mobil', 8423506645, '1972', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(20, 'photo.png', 'Prastuti', 'Indah', 'motor', 8327048277, '1994', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(21, 'photo.png', 'Simbolon', 'Mujur', 'mobil', 8485707287, '1991', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(22, 'photo.png', 'Anggriawan', 'Nurul', 'motor', 3444819638, '2000', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(23, 'photo.png', 'Haryanto', 'Labuh', 'motor', 37042041, '2019', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(24, 'photo.png', 'Mardhiyah', 'Rika', 'motor', 7969292448, '1989', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(25, 'photo.png', 'Anggraini', 'Bala', 'motor', 7948549740, '1984', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(26, 'photo.png', 'Handayani', 'Garang', 'mobil', 4790590028, '1972', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(27, 'photo.png', 'Najmudin', 'Halima', 'motor', 5741660796, '1972', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(28, 'photo.png', 'Melani', 'Jaswadi', 'motor', 8617639803, '2004', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(29, 'photo.png', 'Aryani', 'Eko', 'motor', 8616884829, '1989', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(30, 'photo.png', 'Ramadan', 'Ozy', 'motor', 5648851224, '1971', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(31, 'photo.png', 'Wijaya', 'Fitriani', 'motor', 6786138528, '2014', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(32, 'photo.png', 'Suwarno', 'Bala', 'motor', 5328747575, '1981', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(33, 'photo.png', 'Mayasari', 'Wardaya', 'motor', 4290802898, '1983', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(34, 'photo.png', 'Riyanti', 'Harja', 'mobil', 8824860773, '1977', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(35, 'photo.png', 'Tarihoran', 'Pangeran', 'motor', 693066710, '2008', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(36, 'photo.png', 'Utama', 'Tantri', 'mobil', 9490396410, '2025', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(37, 'photo.png', 'Wahyuni', 'Hairyanto', 'mobil', 3601589126, '1981', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(38, 'photo.png', 'Wahyuni', 'Kani', 'mobil', 6131101270, '2003', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(39, 'photo.png', 'Hasanah', 'Tugiman', 'mobil', 5612450921, '1987', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(40, 'photo.png', 'Usada', 'Kamaria', 'motor', 6113679215, '1981', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(41, 'photo.png', 'Wibisono', 'Catur', 'mobil', 4913218144, '1982', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(42, 'photo.png', 'Wastuti', 'Ivan', 'motor', 2424975973, '1978', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(43, 'photo.png', 'Namaga', 'Diana', 'motor', 3920823562, '2006', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(44, 'photo.png', 'Pradipta', 'Devi', 'mobil', 3215362613, '1973', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(45, 'photo.png', 'Anggraini', 'Chelsea', 'mobil', 3532113450, '2004', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(46, 'photo.png', 'Hasanah', 'Uchita', 'motor', 1353740984, '1976', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(47, 'photo.png', 'Aryani', 'Lasmanto', 'mobil', 9215597695, '1995', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(48, 'photo.png', 'Rahmawati', 'Aris', 'motor', 850692555, '2005', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(49, 'photo.png', 'Laksmiwati', 'Iriana', 'mobil', 7324033557, '1975', '2025-12-04 14:57:25', '2025-12-04 14:57:25'),
(50, 'photo.png', 'Puspasari', 'Salsabila', 'mobil', 275336371, '2007', '2025-12-04 14:57:25', '2025-12-04 14:57:25');

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payments_submission_id_foreign` (`submission_id`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`period_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`submission_id`),
  ADD KEY `submissions_user_id_foreign` (`user_id`),
  ADD KEY `submissions_vehicle_id_foreign` (`vehicle_id`),
  ADD KEY `submissions_period_id_foreign` (`period_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `period_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `submission_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

-- --------------------------------------------------------

--
-- Structure for view `submission_list`
--
DROP TABLE IF EXISTS `submission_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `submission_list`  AS SELECT `s`.`submission_id` AS `submission_id`, `s`.`user_id` AS `user_id`, `u`.`name` AS `nama_nasabah`, `v`.`vehicle_id` AS `vehicle_id`, `s`.`submission_date` AS `tgl_pengajuan`, `s`.`total_price` AS `total`, (case when (`p`.`remaining_debt` is null) then `s`.`total_price` else `p`.`remaining_debt` end) AS `sisa`, `pr`.`time_period` AS `waktu`, `pr`.`interest` AS `bunga`, `s`.`monthly_installments` AS `cicilan`, `s`.`identity_card` AS `ktp`, `s`.`status` AS `status_pengajuan`, `v`.`vehicle_name` AS `nama_kendaraan`, `v`.`pict` AS `foto_kendaraan`, `v`.`type` AS `tipe_kendaraan`, `v`.`brand` AS `merk_kendaraan`, (case when (ifnull(`p`.`remaining_debt`,`s`.`total_price`) <= 0) then 'LUNAS' else 'BELUM' end) AS `status_bayar`, ifnull((select sum(`pay`.`amount_of_paid`) from `payments` `pay` where (`pay`.`submission_id` = `s`.`submission_id`)),0) AS `total_bayar`, (select count(0) from `payments` `pay2` where (`pay2`.`submission_id` = `s`.`submission_id`)) AS `periode_terbayar`, `s`.`created_at` AS `created_at` FROM ((((`submissions` `s` left join (select `p1`.`submission_id` AS `submission_id`,`p1`.`remaining_debt` AS `remaining_debt` from (`payments` `p1` join (select `payments`.`submission_id` AS `submission_id`,max(`payments`.`payment_id`) AS `last_payment_id` from `payments` group by `payments`.`submission_id`) `last_pay` on(((`last_pay`.`submission_id` = `p1`.`submission_id`) and (`last_pay`.`last_payment_id` = `p1`.`payment_id`))))) `p` on((`p`.`submission_id` = `s`.`submission_id`))) join `periods` `pr` on((`pr`.`period_id` = `s`.`period_id`))) join `vehicles` `v` on((`v`.`vehicle_id` = `s`.`vehicle_id`))) join `users` `u` on((`u`.`id` = `s`.`user_id`))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_submission_id_foreign` FOREIGN KEY (`submission_id`) REFERENCES `submissions` (`submission_id`) ON DELETE CASCADE;

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`period_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `submissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `submissions_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
