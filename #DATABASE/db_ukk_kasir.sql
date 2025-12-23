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
-- Database: `db_ukk_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint NOT NULL,
  `purchase_price` int NOT NULL,
  `selling_price` int NOT NULL,
  `quantity` int NOT NULL,
  `subtotal` int NOT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Jingga', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(2, 'Biru Pucat', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(3, 'Hitam Arang', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(4, 'Hijau Muda', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(5, 'Tembaga', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(6, 'Lavender', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(7, 'Merah Muda', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(8, 'Merah Tomat', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(9, 'Biru Laut Terang', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(10, 'Lavender', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(11, 'Ungu Terong', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(12, 'Merah Tua', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(13, 'Merah Muda Terang', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(14, 'Khaki Tua', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(15, 'Peach', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(16, 'Kuning Lemon', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(17, 'Zaitun', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(18, 'Kuning Gelap', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(19, 'Kuning Lemon', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(20, 'Kuning Terang', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(21, 'Merah Muda Keunguan', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(22, 'Merah Muda Keunguan', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(23, 'Cokelat Kemerahan', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(24, 'Hijau Lumut', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(25, 'Ungu Muda', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(26, 'Lemon Chiffon', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(27, 'Peach', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(28, 'Jingga Labu', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(29, 'Biru Laut Terang', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(30, 'Salmon Terang', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(31, 'Kuning', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(32, 'Oranye', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(33, 'Tomat', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(34, 'Cokelat Gandum', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(35, 'Merah Kekuning-Kuningan', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(36, 'Cokelat Gandum', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(37, 'Biru Pucat', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(38, 'Hijau Rumput', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(39, 'Biru Pucat', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(40, 'Kuning Pucat', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(41, 'Hitam', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(42, 'Putih', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(43, 'Biru Muda', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(44, 'Kuning Pucat', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(45, 'Hijau Muda Kekuningan', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(46, 'Merah', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(47, 'Ungu Kebiruan', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(48, 'Hijau Kebiruan', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(49, 'Merah', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(50, 'Kuning Kecokelatan Tua', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(51, 'Merah Tua', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(52, 'Merah Muda Keunguan Pudar', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(53, 'Hitam Pekat', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(54, 'Biru Malam', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(55, 'Pelangi', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(56, 'Pelangi', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(57, 'Magenta Gelap', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(58, 'Khaki Tua', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(59, 'Oranye', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(60, 'Ungu Muda', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(61, 'Kuning Muda', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(62, 'Pastel', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(63, 'Almond', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(64, 'Hijau Abu-Abu', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(65, 'Putih Gandum', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(66, 'Ungu Gelap', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(67, 'Moka', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(68, 'Hijau Lemon', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(69, 'Hitam Arang', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(70, 'Hijau Zamrud', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(71, 'Merah Oranye', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(72, 'Ungu Terong', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(73, 'Merah Tua Terang', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(74, 'Merah Keungu-Unguan', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(75, 'Putih Salju', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(76, 'Hijau Laut Terang', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(77, 'Ungu Muda', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(78, 'Biru Keabu-abuan', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(79, 'Lemon', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(80, 'Merah Tomat', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(81, 'Putih Gandum', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(82, 'Putih', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(83, 'Pelangi', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(84, 'Hijau Kebiruan', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(85, 'Salmon Gelap', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(86, 'Krem', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(87, 'Cokelat Gandum', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(88, 'Putih Terang', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(89, 'Cokelat', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(90, 'Pastel', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(91, 'Hijau Kekuningan', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(92, 'Moka', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(93, 'Putih Gading', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(94, 'Hijau Hutan', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(95, 'Merah Kekuning-Kuningan', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(96, 'Hijau Hutan', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(97, 'Jingga', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(98, 'Merah Muda Terang', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(99, 'Perak', '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(100, 'Hijau Muda Kekuningan', '2025-11-09 07:34:11', '2025-11-09 07:34:11');

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
-- Stand-in structure for view `laporan`
-- (See below for the actual view)
--
CREATE TABLE `laporan` (
`date` date
,`kembali` int
,`laba` decimal(43,0)
,`modal` decimal(42,0)
,`name` varchar(255)
,`omset` decimal(42,0)
,`paid` int
,`total` int
,`transaction_id` bigint unsigned
);

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
(5, '2025_11_08_092133_create_categories_table', 1),
(6, '2025_11_08_092149_create_units_table', 1),
(7, '2025_11_08_100308_create_products_table', 1),
(8, '2025_11_08_120948_create_transactions_table', 1),
(9, '2025_11_08_121003_create_transaction_details_table', 1),
(10, '2025_11_08_121009_create_carts_table', 1);

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
  `product_id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pict` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint NOT NULL,
  `unit_id` bigint NOT NULL,
  `purchase_price` int NOT NULL,
  `selling_price` int NOT NULL,
  `stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `pict`, `category_id`, `unit_id`, `purchase_price`, `selling_price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Bambang', NULL, 31, 1, 9431, 9452, 63, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(2, 'Oni', NULL, 65, 35, 4081, 6579, 4, '2025-11-09 07:34:11', '2025-11-09 07:55:09'),
(3, 'Citra', NULL, 2, 65, 6479, 7090, 92, '2025-11-09 07:34:11', '2025-11-12 22:47:37'),
(4, 'Ajimat', NULL, 98, 28, 884, 3070, 1, '2025-11-09 07:34:11', '2025-11-10 01:42:01'),
(5, 'Humaira', NULL, 87, 11, 1630, 8270, 67, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(6, 'Najam', NULL, 42, 48, 8416, 16174, 72, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(7, 'Digdaya', NULL, 6, 59, 3917, 8978, 95, '2025-11-09 07:34:11', '2025-11-12 22:47:37'),
(8, 'Mahmud', NULL, 68, 96, 1881, 8559, 54, '2025-11-09 07:34:11', '2025-11-09 07:55:17'),
(9, 'Anastasia', NULL, 24, 76, 5222, 9803, 1, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(10, 'Ulva', NULL, 18, 46, 352, 7127, 54, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(11, 'Latika', NULL, 54, 69, 7520, 16749, 27, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(12, 'Vivi', NULL, 61, 90, 9945, 19852, 22, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(13, 'Dalima', NULL, 16, 6, 2579, 10186, 57, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(14, 'Harsanto', NULL, 61, 90, 1981, 10881, 44, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(15, 'Ellis', NULL, 89, 25, 2378, 3781, 80, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(16, 'Usyi', NULL, 67, 88, 6811, 14609, 38, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(17, 'Ismail', NULL, 43, 44, 1563, 3638, 9, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(18, 'Prasetyo', NULL, 90, 71, 4202, 6394, 4, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(19, 'Elma', NULL, 4, 74, 3224, 8560, 23, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(20, 'Puput', NULL, 13, 67, 8363, 17051, 89, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(21, 'Galiono', NULL, 67, 32, 6385, 6902, 48, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(22, 'Unggul', NULL, 60, 25, 4561, 5252, 34, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(23, 'Maria', NULL, 43, 87, 5431, 6262, 38, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(24, 'Respati', NULL, 58, 78, 6734, 7590, 35, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(25, 'Nova', NULL, 20, 19, 5404, 11220, 78, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(26, 'Tasnim', NULL, 28, 2, 6415, 10746, 23, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(27, 'Cawuk', NULL, 92, 92, 9037, 17354, 18, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(28, 'Jais', NULL, 59, 95, 6163, 15369, 80, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(29, 'Daru', NULL, 85, 58, 8053, 17644, 77, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(30, 'Puput', NULL, 67, 49, 395, 8432, 89, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(31, 'Cahyanto', NULL, 60, 54, 3116, 5217, 36, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(32, 'Prayitna', NULL, 86, 88, 2631, 7013, 33, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(33, 'Zulfa', NULL, 76, 11, 2309, 3300, 21, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(34, 'Cinthia', NULL, 16, 9, 6098, 10983, 41, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(35, 'Ghaliyati', NULL, 5, 73, 4333, 4797, 89, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(36, 'Wardi', NULL, 8, 27, 9767, 19567, 95, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(37, 'Yuni', NULL, 48, 42, 4405, 7572, 69, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(38, 'Winda', NULL, 31, 25, 3291, 4748, 10, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(39, 'Gamani', NULL, 46, 56, 4117, 12377, 95, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(40, 'Vanya', NULL, 78, 31, 9473, 19383, 99, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(41, 'Faizah', NULL, 25, 90, 7621, 13016, 1, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(42, 'Dadap', NULL, 97, 58, 6574, 13175, 71, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(43, 'Janet', NULL, 66, 29, 6271, 8967, 46, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(44, 'Najib', NULL, 62, 51, 371, 3693, 95, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(45, 'Heryanto', NULL, 68, 45, 6181, 13040, 17, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(46, 'Kani', NULL, 82, 70, 7247, 9750, 72, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(47, 'Teddy', NULL, 62, 75, 9887, 15230, 40, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(48, 'Ilyas', NULL, 63, 77, 8974, 10080, 63, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(49, 'Daliman', NULL, 15, 67, 7533, 15580, 96, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(50, 'Ifa', NULL, 32, 34, 6071, 9300, 82, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(51, 'Malika', NULL, 26, 2, 6875, 16422, 64, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(52, 'Manah', NULL, 80, 73, 6982, 12510, 54, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(53, 'Rika', NULL, 90, 10, 5634, 9762, 45, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(54, 'Rahmi', NULL, 30, 6, 3245, 11191, 22, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(55, 'Yessi', NULL, 40, 77, 2949, 8571, 16, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(56, 'Ian', NULL, 73, 59, 8690, 18627, 6, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(57, 'Kania', NULL, 98, 87, 8259, 12703, 70, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(58, 'Gilda', NULL, 2, 77, 7501, 13635, 10, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(59, 'Dasa', NULL, 13, 68, 7356, 16212, 6, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(60, 'Argono', NULL, 4, 45, 5787, 15169, 28, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(61, 'Silvia', NULL, 36, 85, 2347, 4734, 80, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(62, 'Prasetyo', NULL, 96, 47, 3569, 12530, 71, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(63, 'Warsita', NULL, 63, 27, 5724, 10430, 24, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(64, 'Nova', NULL, 91, 72, 2869, 9612, 62, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(65, 'Yani', NULL, 68, 23, 849, 8024, 26, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(66, 'Halima', NULL, 42, 31, 1956, 5151, 70, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(67, 'Darmana', NULL, 4, 49, 3585, 8002, 57, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(68, 'Cawisadi', NULL, 35, 2, 7778, 10897, 61, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(69, 'Silvia', NULL, 35, 48, 8392, 16597, 34, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(70, 'Taufik', NULL, 65, 99, 1583, 5919, 77, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(71, 'Mustofa', NULL, 36, 48, 7235, 8557, 86, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(72, 'Salwa', NULL, 15, 98, 8381, 18109, 79, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(73, 'Ira', NULL, 80, 19, 8126, 11187, 71, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(74, 'Karimah', NULL, 29, 72, 7686, 11735, 98, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(75, 'Ira', NULL, 33, 98, 4871, 9217, 69, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(76, 'Ifa', NULL, 7, 30, 2256, 2266, 95, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(77, 'Yunita', NULL, 82, 66, 410, 8238, 34, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(78, 'Zulaikha', NULL, 90, 10, 9362, 16894, 52, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(79, 'Gasti', NULL, 55, 82, 4538, 14319, 50, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(80, 'Natalia', NULL, 8, 26, 3636, 7459, 94, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(81, 'Yuliana', NULL, 29, 13, 2478, 6390, 74, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(82, 'Gaman', NULL, 19, 39, 3113, 6980, 82, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(83, 'Fitria', NULL, 68, 28, 9012, 12401, 26, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(84, 'Irma', NULL, 94, 49, 6575, 14542, 51, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(85, 'Garda', NULL, 67, 69, 3201, 12615, 56, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(86, 'Patricia', NULL, 61, 31, 6446, 13791, 78, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(87, 'Zaenab', NULL, 83, 38, 3899, 10790, 90, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(88, 'Rosman', NULL, 14, 4, 3603, 13385, 47, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(89, 'Ghaliyati', NULL, 65, 5, 712, 8224, 1, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(90, 'Elvina', NULL, 47, 71, 8094, 10083, 90, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(91, 'Garang', NULL, 11, 30, 1355, 3097, 94, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(92, 'Putri', NULL, 67, 54, 3709, 4447, 17, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(93, 'Raditya', NULL, 76, 79, 8217, 14688, 50, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(94, 'Ulva', NULL, 42, 22, 4755, 5249, 12, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(95, 'Hilda', NULL, 56, 35, 6908, 16615, 76, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(96, 'Oliva', NULL, 52, 13, 5268, 15049, 57, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(97, 'Jarwi', NULL, 40, 8, 7629, 16324, 65, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(98, 'Salimah', NULL, 71, 12, 2487, 9233, 67, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(99, 'Vanya', NULL, 47, 32, 6076, 10648, 36, '2025-11-09 07:34:11', '2025-11-09 07:34:11'),
(100, 'Maryadi', NULL, 32, 21, 5274, 9370, 27, '2025-11-09 07:34:11', '2025-11-09 07:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `total` int NOT NULL,
  `paid` int NOT NULL,
  `change` int NOT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `date`, `total`, `paid`, `change`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2025-11-09', 9649, 10000, 351, 1, '2025-11-09 07:55:09', '2025-11-09 07:55:09'),
(2, '2025-11-09', 17537, 50000, 32463, 1, '2025-11-09 07:55:17', '2025-11-09 07:55:17'),
(3, '2025-11-10', 10160, 15000, 4840, 1, '2025-11-10 01:42:01', '2025-11-10 01:42:01'),
(4, '2025-11-13', 34024, 50000, 15976, 1, '2025-11-12 22:47:37', '2025-11-12 22:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint UNSIGNED NOT NULL,
  `transaction_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `purchase_price` int NOT NULL,
  `selling_price` int NOT NULL,
  `quantity` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `product_id`, `purchase_price`, `selling_price`, `quantity`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 4081, 6579, 1, 6579, '2025-11-09 07:55:09', '2025-11-09 07:55:09'),
(2, 1, 4, 884, 3070, 1, 3070, '2025-11-09 07:55:09', '2025-11-09 07:55:09'),
(3, 2, 7, 3917, 8978, 1, 8978, '2025-11-09 07:55:17', '2025-11-09 07:55:17'),
(4, 2, 8, 1881, 8559, 1, 8559, '2025-11-09 07:55:17', '2025-11-09 07:55:17'),
(5, 3, 3, 6479, 7090, 1, 7090, '2025-11-10 01:42:01', '2025-11-10 01:42:01'),
(6, 3, 4, 884, 3070, 1, 3070, '2025-11-10 01:42:01', '2025-11-10 01:42:01'),
(7, 4, 3, 6479, 7090, 1, 7090, '2025-11-12 22:47:37', '2025-11-12 22:47:37'),
(8, 4, 7, 3917, 8978, 3, 26934, '2025-11-12 22:47:37', '2025-11-12 22:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` bigint UNSIGNED NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`, `created_at`, `updated_at`) VALUES
(1, 'voluptatem', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(2, 'atque', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(3, 'temporibus', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(4, 'temporibus', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(5, 'architecto', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(6, 'aut', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(7, 'est', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(8, 'mollitia', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(9, 'sit', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(10, 'ad', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(11, 'omnis', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(12, 'natus', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(13, 'consequatur', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(14, 'praesentium', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(15, 'culpa', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(16, 'deserunt', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(17, 'quis', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(18, 'doloribus', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(19, 'qui', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(20, 'qui', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(21, 'qui', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(22, 'fuga', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(23, 'ullam', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(24, 'consequatur', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(25, 'dolorem', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(26, 'libero', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(27, 'delectus', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(28, 'minima', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(29, 'illum', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(30, 'dolor', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(31, 'soluta', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(32, 'officiis', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(33, 'minima', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(34, 'adipisci', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(35, 'repudiandae', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(36, 'aspernatur', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(37, 'esse', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(38, 'impedit', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(39, 'error', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(40, 'repudiandae', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(41, 'nulla', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(42, 'qui', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(43, 'sunt', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(44, 'id', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(45, 'labore', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(46, 'incidunt', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(47, 'iusto', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(48, 'ab', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(49, 'vitae', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(50, 'ut', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(51, 'officiis', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(52, 'odio', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(53, 'nemo', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(54, 'voluptas', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(55, 'nesciunt', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(56, 'eligendi', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(57, 'asperiores', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(58, 'placeat', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(59, 'eaque', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(60, 'qui', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(61, 'cumque', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(62, 'qui', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(63, 'deserunt', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(64, 'iure', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(65, 'magnam', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(66, 'pariatur', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(67, 'quia', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(68, 'harum', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(69, 'debitis', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(70, 'est', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(71, 'quos', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(72, 'reprehenderit', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(73, 'quae', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(74, 'quo', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(75, 'id', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(76, 'architecto', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(77, 'rerum', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(78, 'blanditiis', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(79, 'blanditiis', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(80, 'consequatur', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(81, 'laborum', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(82, 'magni', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(83, 'cum', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(84, 'ad', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(85, 'repellat', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(86, 'fugit', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(87, 'neque', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(88, 'eum', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(89, 'aut', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(90, 'culpa', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(91, 'et', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(92, 'provident', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(93, 'provident', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(94, 'repellat', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(95, 'consequuntur', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(96, 'repellendus', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(97, 'occaecati', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(98, 'harum', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(99, 'voluptas', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(100, 'occaecati', '2025-11-09 07:34:10', '2025-11-09 07:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `address`, `phone_number`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Purwadi Nainggolan', 'hhabibi@example.com', '$2y$10$FPlS5n2PwghQTCXKJP.7N.Tlg2Y7bkkQoYGrsgrWhcpDW2y/CY01.', 'pria', 'Jr. Bata Putih No. 31, Pariaman 85605, Maluku', '088836672552', 'admin', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(2, 'Cengkal Dabukke', 'aisyah54@example.com', '$2y$10$G8.tykbN2dkS8WthtVNRiORCw8IKFV93OsVni6Fxx52Ys3imFK1yu', 'pria', 'Gg. Barat No. 11, Salatiga 34887, Kaltara', '085667461380', 'kasir', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(3, 'Jamalia Hariyah', 'yrahmawati@example.org', '$2y$10$Az/uD82qLO4BJt.gsGkZX.WSySA4R07k610.uVTuOjkTdMItqp.9G', 'wanita', 'Jln. Yos Sudarso No. 661, Surabaya 82683, Jatim', '083453228657', 'kasir', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(4, 'Irwan Hutasoit', 'qramadan@example.com', '$2y$10$1o8715zkuW99iJUBeFFWUeMzq2UC15iYI5zTz1jxnOgXfrbEq86Ie', 'pria', 'Ds. Baing No. 682, Madiun 45155, Bengkulu', '087669546934', 'kasir', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(5, 'Dasa Wasita S.Pd', 'hendri.nasyiah@example.com', '$2y$10$Gjg0gEWaxE8ydeHLOJuWi.kjG4KHYzpxT7teuEnfukWrfQqANaxdu', 'wanita', 'Jln. Bakau Griya Utama No. 491, Sibolga 48073, Bengkulu', '082164372524', 'admin', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(6, 'Cinthia Suartini M.Pd', 'manullang.ophelia@example.net', '$2y$10$bBsG/0iBOuWqV8CGj75eC.qY4sPgNCfnrcfAIqz/P7KY3xjViaFO2', 'pria', 'Psr. Ketandan No. 813, Surakarta 87620, Kepri', '082723288783', 'kasir', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(7, 'Anita Widiastuti', 'waryani@example.net', '$2y$10$Z9FGNFVkTdtVEmYuyytfIe1HaHfuONYbTULGDkZMwEc4f6JLuzgPq', 'wanita', 'Dk. Padma No. 669, Pekanbaru 50694, Sumut', '082310559080', 'kasir', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(8, 'Halima Rahayu', 'diah31@example.net', '$2y$10$Rpnv5JLneUFxt58sDNOCNOxJdgOjZ6n0y0hcXOZ1cm6R498hVUu0i', 'wanita', 'Ki. Yogyakarta No. 889, Sawahlunto 42980, DIY', '083809090774', 'admin', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(9, 'Gandi Pradipta', 'pradipta.olga@example.com', '$2y$10$eVAfdWeQyw6Z7HDCEB1vfurW7zfvqD1JAvhuAxbDrkxIJeSod6U9C', 'pria', 'Jln. Ters. Buah Batu No. 713, Payakumbuh 67064, Jatim', '084276312653', 'kasir', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(10, 'Mulya Nugroho S.Pd', 'omaryati@example.org', '$2y$10$eas18PN1YyrxKdQQ4l2He.vwppfw0oq08OXCKMeu3uh4ovC.WiXP6', 'wanita', 'Dk. Cikapayang No. 986, Bandung 24509, Kalsel', '080568560469', 'admin', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(11, 'Alika Kusmawati', 'putu.mayasari@example.net', '$2y$10$o1itPxNHISlBpe4TE6S1jubiludnMfGn9za8I15FZuGLAUfp.BcbC', 'pria', 'Dk. Gambang No. 624, Salatiga 51311, Banten', '088445476199', 'kasir', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(12, 'Raisa Elisa Andriani S.I.Kom', 'nuraini.legawa@example.org', '$2y$10$1c5uHiAgoljZN.tXuSmExuS41kPx6qvblO0nPcOl3ZTtfbcmY.mZ.', 'wanita', 'Jln. Kyai Gede No. 5, Medan 57295, Riau', '087947622246', 'admin', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(13, 'Ade Kasim Wibowo S.T.', 'septi.waskita@example.org', '$2y$10$XpsIuu1wWo6eoWqCCMsy9.HbUIxohRt1lQwz3HXK6cqKi2/FwD4c6', 'pria', 'Jr. Zamrud No. 325, Pangkal Pinang 83715, Malut', '084318134559', 'admin', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(14, 'Restu Hariyah S.Sos', 'icha.gunarto@example.org', '$2y$10$S8NVA.CWNYRhMaxr7GbC.epW.yvB13Thujyv2WSJs/ISbVOfKS8hm', 'pria', 'Psr. Cut Nyak Dien No. 133, Manado 30174, Sulbar', '083201043702', 'admin', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(15, 'Salimah Anastasia Mayasari', 'asmadi62@example.org', '$2y$10$nFTBYmUE4cPF47BcPQXxH.hZbaX6t1PH3rRntiDAl.BYjDH1vveea', 'wanita', 'Kpg. Elang No. 52, Banjarbaru 51959, Malut', '084041280857', 'kasir', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(16, 'Karimah Ade Handayani', 'tania39@example.com', '$2y$10$SLrc8r78hQe8ZWpH6G8qmenUSUPnPxyrRMoOB8bJmu/PrUpn2wjZi', 'wanita', 'Gg. Lada No. 85, Langsa 77587, Kaltim', '083760909467', 'kasir', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(17, 'Oskar Ganda Simbolon S.Pt', 'eka29@example.net', '$2y$10$Cu3KWldZZuBc3D0e5WCS/O9LgraywlNe9Raw7LZbKOm0aalI9aBQ.', 'wanita', 'Dk. Padang No. 708, Mojokerto 79667, Sultra', '083152318789', 'admin', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(18, 'Kamaria Tiara Prastuti M.M.', 'carla76@example.org', '$2y$10$LnhEyYhdHoKyfsu.5MmJk.a6C49F5qvRk2fb4ee/jbDK5Y5ruF2ci', 'wanita', 'Psr. Baranang Siang Indah No. 209, Depok 99340, Sultra', '089678953010', 'admin', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(19, 'Tirtayasa Mahendra', 'astuti.gandi@example.com', '$2y$10$Bsldx1VjYMxPPSqPLS2u5ObxGUixFEzP5TlTHYfdtnR0k67gFopyG', 'wanita', 'Psr. Veteran No. 488, Sawahlunto 85700, Kaltim', '088268182162', 'kasir', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(20, 'Harja Marpaung', 'sabrina76@example.com', '$2y$10$SLmYg3oBZv7DpQe3yC4d8u8JbGVMW/BJwH6NwTrtxRzHvcAO51QX6', 'wanita', 'Ki. Nanas No. 66, Tanjung Pinang 70043, Kalteng', '080448760730', 'admin', '2025-11-09 07:34:10', '2025-11-09 07:34:10'),
(21, 'Cahyo', 'cahyo@yandex.com', '$2y$10$qrqyDGhII9Y7slB.es/eYOqWUbwDUtmvHhot2R8Gm4LrjXc2al3TS', 'pria', 'jl.cangkorah', '081288793212', 'kasir', '2025-11-09 07:36:31', '2025-11-09 07:36:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

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
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

-- --------------------------------------------------------

--
-- Structure for view `laporan`
--
DROP TABLE IF EXISTS `laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan`  AS SELECT max(`transactions`.`transaction_id`) AS `transaction_id`, max(`transactions`.`date`) AS `date`, max(`transactions`.`total`) AS `total`, max(`transactions`.`paid`) AS `paid`, max(`transactions`.`change`) AS `kembali`, max(`users`.`name`) AS `name`, sum(((`transaction_details`.`selling_price` - `transaction_details`.`purchase_price`) * `transaction_details`.`quantity`)) AS `laba`, sum((`transaction_details`.`purchase_price` * `transaction_details`.`quantity`)) AS `modal`, sum((`transaction_details`.`selling_price` * `transaction_details`.`quantity`)) AS `omset` FROM ((`transactions` join `transaction_details` on((`transaction_details`.`transaction_id` = `transactions`.`transaction_id`))) join `users` on((`users`.`id` = `transactions`.`user_id`))) GROUP BY `transactions`.`transaction_id` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
