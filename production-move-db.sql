-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 06:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `production-move`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_code` varchar(191) NOT NULL,
  `customer_name` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `phoneNumber` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_code`, `customer_name`, `address`, `phoneNumber`, `created_at`, `updated_at`) VALUES
('20020112', 'Dang Thu Huong', '165 Cau Giay', '0283456934', '2022-12-26 07:19:03', '2022-12-26 07:19:03'),
('20020217', 'Le Thu', 'Hoai Duc, Ha Noi', '0384776738', '2022-12-27 14:09:21', '2022-12-27 14:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `factories`
--

CREATE TABLE `factories` (
  `factory_code` varchar(191) NOT NULL,
  `factory_name` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `factories`
--

INSERT INTO `factories` (`factory_code`, `factory_name`, `address`, `created_at`, `updated_at`) VALUES
('F100', 'Alas Factory', '104 Ngọc Hồi, Hoàng Mai, Hà Nội', '2022-12-25 00:53:49', '2022-12-25 00:53:49'),
('F101', 'Lamborghini VietNam', '77 Ngọc Khánh, Ba Đình, Hà Nội', '2022-12-25 01:17:27', '2022-12-25 01:17:27'),
('F102', 'Lexus Car', '45 Cầu Giấy, Cầu Giấy, Hà Nội', '2022-12-25 01:17:52', '2022-12-25 01:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(53, '2022_12_22_151420_create_add_foreign_table', 3),
(83, '2022_12_19_144438_create_modify_table', 4),
(88, '2014_10_12_000000_create_users_table', 5),
(89, '2014_10_12_100000_create_password_resets_table', 5),
(90, '2016_06_01_000001_create_oauth_auth_codes_table', 5),
(91, '2016_06_01_000002_create_oauth_access_tokens_table', 5),
(92, '2016_06_01_000003_create_oauth_refresh_tokens_table', 5),
(93, '2016_06_01_000004_create_oauth_clients_table', 5),
(94, '2016_06_01_000005_create_oauth_personal_access_clients_table', 5),
(95, '2019_08_19_000000_create_failed_jobs_table', 5),
(96, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(97, '2022_12_16_155237_create_factories_table', 5),
(98, '2022_12_16_173540_create_stores_table', 5),
(99, '2022_12_16_173653_create_warranty_centers_table', 5),
(100, '2022_12_17_180210_create_products_table', 5),
(101, '2022_12_19_152257_create_productlines_table', 5),
(102, '2022_12_22_150726_create_customers_table', 5),
(103, '2022_12_22_151029_create_orders_table', 5),
(104, '2022_12_23_071001_create_order_details_table', 5),
(105, '2022_12_26_073448_create_modify_table', 6),
(106, '2022_12_26_073759_create_order_details_table', 7),
(107, '2022_12_26_094430_create_product_sold_factory_table', 8),
(108, '2022_12_26_095011_create_add_column_table', 9),
(109, '2022_12_26_140651_create_add_feature_table', 10),
(110, '2022_12_26_143600_create_add_store_column_table', 11),
(111, '2022_12_26_145149_create_warranty_product_table', 12),
(112, '2022_12_27_210244_create_add_add_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('147ba41bf714210297a6dc6f8a5095697310d61f7dba8d53a0fce32effd93c0977558c5cf2c805c8', 2, 3, 'Personal Access Token', '[]', 1, '2022-12-26 08:06:16', '2022-12-26 09:08:18', '2023-12-26 15:06:16'),
('2abc75dc330ba4be970c202bc752d31ff376ce33b5750aa52f2d8667ece8d67d008ac1ee025e2ec5', 2, 3, 'Personal Access Token', '[]', 1, '2022-12-25 01:04:19', '2022-12-25 01:06:28', '2023-12-25 08:04:19'),
('2af4c3574439ccd54acf0ab7f5ad819a82e4632e501377e3304b8cb1328f51b49b7bc84197c05df0', 16, 3, 'Personal Access Token', '[]', 0, '2022-12-27 21:55:09', '2022-12-27 21:55:09', '2023-12-28 04:55:09'),
('591a2a0530e3c460df621344931fb6294b9202e626f630d87cdf3168b38243270679908579f5b78a', 17, 3, 'Personal Access Token', '[]', 0, '2022-12-27 22:20:26', '2022-12-27 22:20:26', '2023-12-28 05:20:26'),
('7adb379c3fc92ee376e374b7b71a0474a75fcd02a41576dc033f31c46888ac01f322ce31770745b6', 1, 3, 'Personal Access Token', '[]', 0, '2022-12-27 21:40:49', '2022-12-27 21:40:49', '2023-12-28 04:40:49'),
('9a670f66b29eacd7ce51fd8d9107218d411c37230eea5785929a8e09aefd6c9f65ab68d8c8d8088a', 16, 3, 'Personal Access Token', '[]', 0, '2022-12-27 22:04:09', '2022-12-27 22:04:09', '2023-12-28 05:04:09'),
('aee7b6736b4dc19810e202e6559d10824a48e030b6f6f5c1ecc688a7a862568fcd0a5c87238deec3', 1, 3, 'Personal Access Token', '[]', 1, '2022-12-25 01:01:34', '2022-12-25 01:03:05', '2023-12-25 08:01:34'),
('bb8b14df925312d34e25b68ce71984fcf0567dcbad6f983ac226a3d08da45d962dbf29f0a937c63b', 1, 3, 'Personal Access Token', '[]', 0, '2022-12-25 11:42:45', '2022-12-25 11:42:46', '2023-12-25 18:42:45'),
('d78c8a995dc9423bf2e7b55589264e6bf68c2c4c21b1cfbde06350433dfa82bf25ecc9a919e9739f', 8, 3, 'Personal Access Token', '[]', 0, '2022-12-27 21:45:24', '2022-12-27 21:45:24', '2023-12-28 04:45:24'),
('e5af43ffebeb0f200b3444608f3ab4b2a0c12a69ae96e2d720495e57b1d50291da482d79bd519b73', 1, 3, 'Personal Access Token', '[]', 0, '2022-12-25 11:49:14', '2022-12-25 11:49:14', '2023-12-25 18:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(191) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '5zzrnlTNDSKH5Lxnwu4ys2LbFHNDqzoohYOEIybD', NULL, 'http://localhost', 1, 0, 0, '2022-12-25 01:01:09', '2022-12-25 01:01:09'),
(2, NULL, 'Laravel Password Grant Client', 'mQAjcf1sBg4Hc655aauTv9bKyzQJcqK8YwXzg9os', 'users', 'http://localhost', 0, 1, 0, '2022-12-25 01:01:09', '2022-12-25 01:01:09'),
(3, NULL, 'Laravel Personal Access Client', 'r7RAhM2oznmGSj2NbS0xwGo2cyqKPbHuug2MnNmM', NULL, 'http://localhost', 1, 0, 0, '2022-12-25 01:01:28', '2022-12-25 01:01:28'),
(4, NULL, 'Laravel Password Grant Client', 'V5lVn2s770WV3BQsqBFpPN5yWkwW5qKnGRymHNzO', 'users', 'http://localhost', 0, 1, 0, '2022-12-25 01:01:28', '2022-12-25 01:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-12-25 01:01:09', '2022-12-25 01:01:09'),
(2, 3, '2022-12-25 01:01:28', '2022-12-25 01:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_number` varchar(191) NOT NULL,
  `customer_code` varchar(191) NOT NULL,
  `orderDate` datetime NOT NULL,
  `comment` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_code` varchar(191) NOT NULL,
  `product_code` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_number`, `customer_code`, `orderDate`, `comment`, `created_at`, `updated_at`, `store_code`, `product_code`) VALUES
('1111', '20020217', '2022-12-27 21:09:21', NULL, '2022-12-27 14:09:21', '2022-12-27 14:09:21', 'S101', '110004');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(191) NOT NULL,
  `product_code` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_code` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_number`, `product_code`, `created_at`, `updated_at`, `store_code`) VALUES
(3, '1100', '2471', '2022-12-26 07:19:03', '2022-12-26 07:19:03', 'S100');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productlines`
--

CREATE TABLE `productlines` (
  `productline_code` varchar(191) NOT NULL,
  `productline_name` varchar(191) NOT NULL,
  `make` varchar(191) NOT NULL,
  `year` varchar(191) NOT NULL,
  `engine_type` varchar(191) NOT NULL,
  `transmission` varchar(191) NOT NULL,
  `drive_type` varchar(191) NOT NULL,
  `cylinder` varchar(191) NOT NULL,
  `total_seats` varchar(191) NOT NULL,
  `total_doors` varchar(191) NOT NULL,
  `basic_warranty_years` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productlines`
--

INSERT INTO `productlines` (`productline_code`, `productline_name`, `make`, `year`, `engine_type`, `transmission`, `drive_type`, `cylinder`, `total_seats`, `total_doors`, `basic_warranty_years`, `created_at`, `updated_at`) VALUES
('BMWM01', 'BMW M1', 'BMW', '2021', 'V12', '8 speed automatic', 'rear-wheel drive', 'V12', '5', '4', '5', '2022-12-27 22:33:53', '2022-12-27 22:33:53'),
('BMWX001', 'BMWX01', 'BMW', '2018', 'V12', '8 speed automatic', 'rear-wheel drive', 'V12', '5', '4', '4', NULL, NULL),
('LRVT1', 'Lamborghini Reventon 6.5', 'Lamborghini', '2007', 'V12', '6 speed manual', 'all-wheel drive', 'V12', '2', '2', '5', NULL, NULL),
('LXCT01', 'Lexus CT', 'Lexus', '2016', 'Hybrid', '7 speed automatic', 'front wheel drive', 'inline 4', '5', '5', '4', NULL, NULL),
('LXUX01', 'Lexus UX', 'Lexus', '2020', 'Hybrid', '7 speed automatic', 'front wheel drive', 'inline 4', '5', '5', '4', NULL, NULL),
('MAGT', 'Mercedes Benz AMG GT', 'Mercedes', '2014', 'V8', '7 speed automatic', 'rear-wheel drive', 'V8', '2', '3', '4', NULL, NULL),
('MBS01', 'Mercedes-Maybach S', 'Mercedes', '2016', 'V12', '7 speed automatic', 'rear-wheel drive', 'V12', '4', '2', '5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_code` varchar(191) NOT NULL,
  `product_line` varchar(191) NOT NULL,
  `brand` varchar(191) NOT NULL,
  `product_name` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL,
  `factory_code` varchar(191) DEFAULT NULL,
  `store_code` varchar(191) DEFAULT NULL,
  `warranty_center_code` varchar(191) DEFAULT NULL,
  `manufacturing_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_code`, `product_line`, `brand`, `product_name`, `status`, `factory_code`, `store_code`, `warranty_center_code`, `manufacturing_date`, `created_at`, `updated_at`) VALUES
('110001', 'Mercedes Benz AMG GT', 'Mercedes', 'Mercedes Benz AMG GT', 'đang ở đại lý', NULL, 'S102', NULL, '1975-11-12 12:50:56', NULL, '2022-12-26 01:01:22'),
('110002', 'Lexus CT', 'Lexus', 'CT 200h Executive', 'đưa về đại lý', NULL, 'S100', NULL, '1991-01-16 15:18:45', NULL, '2022-12-26 02:56:31'),
('110003', 'Mercedes-Maybach S', 'Mercedes', 'Mercedes-Maybach S', 'đang ở đại lý', NULL, 'S100', NULL, '1977-03-23 19:52:33', NULL, '2022-12-27 13:54:14'),
('110004', 'Lamborghini Reventon 6.5', 'Lamborghini', '2008 Lamborghini Reventon 6.5 V12', 'lỗi đã đưa về nhà máy', 'F100', NULL, NULL, '2010-12-31 18:30:23', NULL, '2022-12-27 15:14:00'),
('110005', 'BMWX01', 'BMW', 'BMW X1', 'mới sản xuất', 'F100', NULL, NULL, '1996-05-26 13:46:18', NULL, NULL),
('161924', 'Mercedes-Maybach S', 'Lamborghini', 'CT 200h Executive', 'lỗi đã đưa về nhà máy', 'F100', NULL, NULL, '2022-04-14 03:27:12', '2022-12-25 10:51:46', '2022-12-26 01:10:45'),
('173272', 'Mercedes-Maybach S', 'Lexus', 'CT 200h Executive', 'mới sản xuất', 'F102', NULL, NULL, '2022-06-28 10:59:33', '2022-12-25 10:50:44', '2022-12-25 10:50:44'),
('176274', 'Mercedes-Maybach S', 'BMW', 'BMW X1', 'mới sản xuất', 'F101', NULL, NULL, '2022-01-02 07:08:49', '2022-12-25 10:50:44', '2022-12-25 10:50:44'),
('222477', 'Mercedes-Maybach S', 'BMW', 'Mercedes Benz AMG GT', 'mới sản xuất', 'F101', NULL, NULL, '2022-01-15 12:02:21', '2022-12-25 10:51:45', '2022-12-25 10:51:45'),
('23451', 'BMWX01', 'BMW', 'BMW X1', 'mới sản xuất', 'F102', NULL, NULL, '2022-12-27 23:02:00', '2022-12-27 16:02:00', '2022-12-27 16:02:00'),
('2471', 'Mercedes-Maybach S', 'Lamborghini', 'BMW X1', 'đang ở đại lý', NULL, 'S100', NULL, '2022-09-01 03:03:07', '2022-12-25 10:51:46', '2022-12-26 07:18:15'),
('315530', 'Mercedes-Maybach S', 'Lamborghini', 'Mercedes-Maybach S', 'đang ở đại lý', NULL, 'S100', NULL, '2022-10-10 07:11:14', '2022-12-25 10:50:44', '2022-12-25 10:50:44'),
('370552', 'BMWX01', 'Mercedes', 'Mercedes-Maybach S', 'đưa về đại lý', NULL, 'S101', NULL, '2022-04-19 16:30:34', '2022-12-25 10:47:44', '2022-12-25 10:47:44'),
('410065', 'Mercedes Benz AMG GT', 'BMW', 'Mercedes-Maybach S', 'đưa về đại lý', NULL, 'S102', NULL, '2022-12-07 00:16:23', '2022-12-25 10:50:44', '2022-12-25 10:50:44'),
('422908', 'Lexus CT', 'Lexus', 'Mercedes-Maybach S', 'đưa về đại lý', NULL, 'S103', NULL, '2022-07-04 23:11:07', '2022-12-25 10:51:46', '2022-12-25 10:51:46'),
('431786', 'BMWX01', 'Mercedes', 'CT 200h Executive', 'mới sản xuất', 'F101', NULL, NULL, '2022-02-08 22:43:39', '2022-12-25 10:51:46', '2022-12-25 10:51:46'),
('445773', 'Mercedes-Maybach S', 'Lamborghini', 'Lamborghini Reventon 6.5 V12', 'đang ở đại lý', NULL, 'S102', NULL, '2022-02-22 08:38:40', '2022-12-25 10:51:45', '2022-12-25 10:51:45'),
('471822', 'Mercedes Benz AMG GT', 'Lamborghini', 'CT 200h Executive', 'mới sản xuất', 'F100', NULL, NULL, '2022-06-25 05:07:48', '2022-12-25 10:50:44', '2022-12-25 10:50:44'),
('50350', 'Mercedes-Maybach S', 'Lexus', 'Mercedes Benz AMG GT', 'đưa về đại lý', NULL, 'S102', NULL, '2022-03-08 22:43:34', '2022-12-25 10:50:44', '2022-12-25 10:50:44'),
('555', 'huhu', 'hihi', 'test', 'mới sản xuất', 'F100', NULL, NULL, '2022-12-27 18:49:28', '2022-12-27 11:49:28', '2022-12-27 11:49:28'),
('555079', 'Mercedes Benz AMG GT', 'Lexus', 'BMW X1', 'đang ở đại lý', NULL, 'S100', NULL, '2022-01-03 14:28:14', '2022-12-25 10:47:44', '2022-12-25 10:47:44'),
('662748', 'Lamborghini Reventon 6.5', 'Mercedes', 'Lamborghini Reventon 6.5 V12', 'mới sản xuất', 'F102', NULL, NULL, '2022-09-08 10:13:06', '2022-12-25 10:47:44', '2022-12-25 10:47:44'),
('679950', 'BMWX01', 'BMW', 'Lamborghini Reventon 6.5 V12', 'mới sản xuất', 'F100', NULL, NULL, '2022-08-20 22:23:39', '2022-12-25 10:51:45', '2022-12-25 10:51:45'),
('69641', 'Mercedes Benz AMG GT', 'Lamborghini', 'Lamborghini Reventon 6.5 V12', 'đưa về đại lý', NULL, 'S103', NULL, '2022-01-15 05:05:08', '2022-12-25 10:50:44', '2022-12-25 10:50:44'),
('712772', 'BMWX01', 'BMW', 'Mercedes-Maybach S', 'đang ở đại lý', NULL, 'S102', NULL, '2022-07-29 01:12:42', '2022-12-25 10:50:44', '2022-12-25 10:50:44'),
('724891', 'BMWX01', 'Lamborghini', 'Mercedes Benz AMG GT', 'đang ở đại lý', NULL, 'S103', NULL, '2022-11-02 17:10:42', '2022-12-25 10:51:46', '2022-12-25 10:51:46'),
('749835', 'BMWX01', 'Mercedes', 'Mercedes Benz AMG GT', 'mới sản xuất', 'F102', NULL, NULL, '2022-01-22 18:19:08', '2022-12-25 10:50:44', '2022-12-25 10:50:44'),
('792898', 'BMWX01', 'Mercedes', 'CT 200h Executive', 'đưa về đại lý', 'F102', 'S102', NULL, '2022-01-26 04:32:42', '2022-12-25 10:47:44', '2022-12-25 10:47:44'),
('834296', 'Mercedes-Maybach S', 'BMW', 'CT 200h Executive', 'đang ở đại lý', NULL, 'S101', NULL, '2022-05-02 04:10:14', '2022-12-25 10:51:46', '2022-12-25 10:51:46'),
('847048', 'Lexus CT', 'Lamborghini', 'Lamborghini Reventon 6.5 V12', 'đang ở đại lý', NULL, 'S102', NULL, '2022-12-12 06:06:18', '2022-12-25 10:51:45', '2022-12-25 10:51:45'),
('889498', 'Lamborghini Reventon 6.5', 'BMW', 'Mercedes Benz AMG GT', 'đưa về đại lý', 'F102', 'S100', NULL, '2022-08-18 16:17:50', '2022-12-25 10:47:44', '2022-12-25 10:47:44'),
('92823', 'Mercedes Benz AMG GT', 'Lamborghini', 'Mercedes-Maybach S', 'mới sản xuất', 'F101', NULL, NULL, '2022-07-17 05:23:01', '2022-12-25 10:50:44', '2022-12-25 10:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_sold_factory`
--

CREATE TABLE `product_sold_factory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `factory_code` varchar(191) NOT NULL,
  `product_code` varchar(191) NOT NULL,
  `store_code` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sold_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sold_factory`
--

INSERT INTO `product_sold_factory` (`id`, `factory_code`, `product_code`, `store_code`, `created_at`, `updated_at`, `sold_date`) VALUES
(1, 'F100', '110002', 'S100', '2022-12-26 02:56:31', '2022-12-26 02:56:31', '2022-12-26 09:56:31'),
(2, 'F100', '110004', 'S101', '2022-12-27 13:59:03', '2022-12-27 13:59:03', '2022-12-27 20:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `store_code` varchar(191) NOT NULL,
  `store_name` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`store_code`, `store_name`, `address`, `created_at`, `updated_at`) VALUES
('S100', 'BMW Hà Nội', '923 Láng, Hà Nội', '2022-12-25 00:54:57', '2022-12-25 00:54:57'),
('S101', 'Mecesdes Hanoi', '160 Phạm Văn Đồng, Hà Nội', '2022-12-25 01:15:12', '2022-12-25 01:15:12'),
('S102', 'Lamborghini Hanoi', '83 Trần Quang Khải, Hà Nội', '2022-12-25 01:15:56', '2022-12-25 01:15:56'),
('S103', 'Lexus Hai Phong', '47 Trần Duy Hưng, TP Hải Phòng', '2022-12-25 01:16:33', '2022-12-25 01:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `place_code` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `user_role` varchar(191) NOT NULL,
  `role_by_number` tinyint(4) NOT NULL DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `place_code`, `username`, `password`, `user_role`, `role_by_number`, `name`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'F100', 'factory100', '$2y$10$2GD6D.Tr.cbjv77sA6HQqefGnV6ug1M1rC/w3jh7LFJkS5M6a07a.', 'factory', 0, NULL, NULL, NULL, '2022-12-25 00:53:50', '2022-12-25 00:53:50'),
(2, 'S100', 'store100', '$2y$10$/RvsbYLhPgH.lGqYY6N2Ae2JFeLncy44pTcb1b0AQJbkRD41/aH6S', 'store', 0, NULL, NULL, NULL, '2022-12-25 00:54:57', '2022-12-25 00:54:57'),
(3, 'S101', 'store101', '$2y$10$F7qbSh5aoddpGxPGsVcYJOKSsLv6ymN5wdVcnjcz/QjC1G8JRdW7C', 'store', 0, NULL, NULL, NULL, '2022-12-25 01:15:12', '2022-12-25 01:15:12'),
(4, 'S102', 'store102', '$2y$10$E7pj/tvdr/PqZXceFyLbtO1IhRKkq21joWmRzcH1XqPqxV4QptSbu', 'store', 0, NULL, NULL, NULL, '2022-12-25 01:15:56', '2022-12-25 01:15:56'),
(5, 'S103', 'store103', '$2y$10$HIlwO2EQvT4IWlrZNsVWNeyHmxLQyPw9n1jtK1qHtwlVuUokegMcO', 'store', 0, NULL, NULL, NULL, '2022-12-25 01:16:33', '2022-12-25 01:16:33'),
(6, 'F101', 'factory101', '$2y$10$cOgIOo9R7HE9L9kbXkHGuu9/SvkWfFAvjmFmcAf0RRn3sgqLRZECG', 'factory', 0, NULL, NULL, NULL, '2022-12-25 01:17:27', '2022-12-25 01:17:27'),
(7, 'F102', 'factory102', '$2y$10$j5dGqGvI3fcA5Lk4jk.aMOSPdxKyt6JCaow.vJx7fQQoKdzMOf2A2', 'factory', 0, NULL, NULL, NULL, '2022-12-25 01:17:52', '2022-12-25 01:17:52'),
(8, 'W100', 'warranty100', '$2y$10$XA65GfFm/YopEpprW3ALkeWCWBIoTDBdTvir2wvKuQa23WjNMOGgu', 'warranty_center', 0, NULL, NULL, NULL, '2022-12-25 01:18:40', '2022-12-25 01:18:40'),
(9, 'W101', 'warranty101', '$2y$10$b.2IijyaD3.a9XkwogTTOe5AWgx.onYyFa9facx1idw1ERu0xZTVy', 'warranty_center', 0, NULL, NULL, NULL, '2022-12-25 01:19:00', '2022-12-25 01:19:00'),
(10, 'W102', 'warranty102', '$2y$10$rSBcSO8JaYkbWKcs.l8Nku73ae6n68WkV8fqLWDhhCUCuyotguDzC', 'warranty_center', 0, NULL, NULL, NULL, '2022-12-25 01:19:27', '2022-12-25 01:19:27'),
(11, 'W103', 'warranty103', '$2y$10$PcFHmCjcZWR3TEdwzRhxV.IsBtY8M9V4nBQKoNLu3wxzaXbcZZU/i', 'warranty_center', 0, NULL, NULL, NULL, '2022-12-25 01:21:05', '2022-12-25 01:21:05'),
(16, 'ADMIN', 'admin01', '$2y$10$gcuuwS4lyiAaC2zKsFxbSe8ay5wJatWjjRqANNH2y7to1e1iozlSK', 'admin', 0, NULL, NULL, NULL, '2022-12-27 21:54:35', '2022-12-27 21:54:35'),
(17, 'ADMIN', 'admin', '$2y$10$PnxaiSbA.YMGfyzfycR19epD6IIKZ0/4yueuWpDDQTurxG.muVlgO', 'admin', 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warranty_centers`
--

CREATE TABLE `warranty_centers` (
  `warranty_center_code` varchar(191) NOT NULL,
  `warranty_center_name` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warranty_centers`
--

INSERT INTO `warranty_centers` (`warranty_center_code`, `warranty_center_name`, `address`, `created_at`, `updated_at`) VALUES
('W100', 'Lamborghini Hanoi', '83 Trần Quang Khải, Hà Nội', '2022-12-25 01:18:40', '2022-12-25 01:18:40'),
('W101', 'Mecesdes Hanoi', '923 Láng, Đống Đa, Hà Nội', '2022-12-25 01:19:00', '2022-12-25 01:19:00'),
('W102', 'Lexus Hai Phong', '47 Trần Duy Hưng, tp. Hải Phòng', '2022-12-25 01:19:26', '2022-12-25 01:19:26'),
('W103', 'Alas Factory', '104 Ngọc Hồi, Hoàng Mai, Hà Nội', '2022-12-25 01:21:05', '2022-12-25 01:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `warranty_products`
--

CREATE TABLE `warranty_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(191) NOT NULL,
  `warranty_center_code` varchar(191) NOT NULL,
  `date` datetime NOT NULL,
  `product_status` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_code`);

--
-- Indexes for table `factories`
--
ALTER TABLE `factories`
  ADD PRIMARY KEY (`factory_code`);

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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_number`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `productlines`
--
ALTER TABLE `productlines`
  ADD PRIMARY KEY (`productline_code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_code`);

--
-- Indexes for table `product_sold_factory`
--
ALTER TABLE `product_sold_factory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_password_unique` (`password`);

--
-- Indexes for table `warranty_centers`
--
ALTER TABLE `warranty_centers`
  ADD PRIMARY KEY (`warranty_center_code`);

--
-- Indexes for table `warranty_products`
--
ALTER TABLE `warranty_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_sold_factory`
--
ALTER TABLE `product_sold_factory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `warranty_products`
--
ALTER TABLE `warranty_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
