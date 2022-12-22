-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 04:35 PM
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
('F100', 'Alas Factory', '104 Ngọc Hồi, Hoàng Liệt, Hoàng Mai, Hà Nội', '2022-12-22 02:12:42', '2022-12-22 02:12:42'),
('F101', 'CESO Ftr', '704 Trần Tướng Công, Quận 5, Tp.HCM', '2022-12-22 02:13:14', '2022-12-22 02:13:14');

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
('LRVT1', 'Lamborghini Reventon 6.5', 'Lamborghini', '2007', 'V12', '6 speed manual', 'all-wheel drive', 'V12', '2', '2', '5', NULL, NULL),
('LXCT01', 'Lexus CT', 'Lexus', '2016', 'Hybrid', '7 speed automatic', 'front wheel drive', 'inline 4', '5', '5', '4', NULL, NULL),
('LXUX01', 'Lexus UX', 'Lexus', '2020', 'Hybrid', '7 speed automatic', 'front wheel drive', 'inline 4', '5', '5', '4', NULL, NULL),
('MAGT', 'Mercedes Benz AMG GT', 'Mercedes', '2014', 'V8', '7 speed automatic', 'rear-wheel drive', 'V8', '2', '3', '4', NULL, NULL),
('MBS01', 'Mercedes Maybach S', 'Mercedes', '2016', 'V12', '7 speed automatic', 'rear-wheel drive', 'V12', '4', '2', '5', NULL, NULL),
('RRP01', 'Rolls Royce Phantom VIII', 'Rolls Royce', '2018', 'V12', '8 speed automatic', 'rear-wheel drive', 'V12', '5', '4', '4', NULL, NULL);

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
('110001', 'Mercedes Benz AMG GT', 'Mercedes', 'Mercedes Benz AMG GT', 'mới sản xuất', 'F100', NULL, NULL, '2020-01-24 22:51:58', NULL, NULL),
('110002', 'Lexus CT', 'Lexus', 'CT 200h Executive', 'mới sản xuất', 'F100', NULL, NULL, '1973-08-27 11:24:32', NULL, NULL),
('110003', 'Mercedes-Maybach S', 'Mercedes', 'Mercedes-Maybach S', 'mới sản xuất', 'F100', NULL, NULL, '1974-01-06 21:33:15', NULL, NULL),
('110004', 'Lamborghini Reventon 6.5', 'Lamborghini', '2008 Lamborghini Reventon 6.5 V12', 'mới sản xuất', 'F100', NULL, NULL, '2005-09-06 19:42:42', NULL, NULL),
('110005', 'Rolls Royce Phantom VIII', 'Rolls Royce', 'Rolls Royce Phantom VIII', 'mới sản xuất', 'F100', NULL, NULL, '1978-09-04 07:45:23', NULL, NULL);

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
('S100', 'Lexus Hanoi', '45 Cầu Giấy, Hà Nội', '2022-12-22 02:14:55', '2022-12-22 02:14:55'),
('S101', 'Mecesdes Hanoi', '923 Láng, Đống Đa, Hà Nội', '2022-12-22 02:15:23', '2022-12-22 02:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `place_code` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_role` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`place_code`, `username`, `password`, `name`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `user_role`) VALUES
('F100', 'factory100', '$2y$10$.jPTq0coEFjZ.AxzTPP57OZYiVLgPGJ/vruNAJ08pUQnBZweFCrqy', NULL, NULL, NULL, '2022-12-22 02:12:42', '2022-12-22 02:12:42', 'factory'),
('F101', 'factory101', '$2y$10$dphvlQbPtDluhKGsCc/b6ul5P5Qqsn.1NFlJBhtEcNtCzb.f86dH2', NULL, NULL, NULL, '2022-12-22 02:13:14', '2022-12-22 02:13:14', 'factory'),
('S100', 'store100', '$2y$10$YzBZb9h9X1gIpO6M/7J4xO1VluLXFWIt1RGsgDolkA0z2iMaCW2dW', NULL, NULL, NULL, '2022-12-22 02:14:55', '2022-12-22 02:14:55', 'store'),
('S101', 'store101', '$2y$10$EO14yap90Y48WfKps0WjSe8BY03u3Ruw7NwXRwHGwqdL1d4iiGJyi', NULL, NULL, NULL, '2022-12-22 02:15:23', '2022-12-22 02:15:23', 'store'),
('W100', 'warranty100', '$2y$10$h0E5/NxYNheou2yxDcKh7.xcJwWFcZ5mxDh8BafSDfipUMbEWg9Hu', NULL, NULL, NULL, '2022-12-22 02:16:58', '2022-12-22 02:16:58', 'warranty_center');

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
('W100', 'Mecesdes Hanoi', '923 Láng, Đống Đa, Hà Nội', '2022-12-22 02:16:58', '2022-12-22 02:16:58');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_number`),
  ADD KEY `orders_customer_code_foreign` (`customer_code`);

--
-- Indexes for table `productlines`
--
ALTER TABLE `productlines`
  ADD PRIMARY KEY (`productline_code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_code`),
  ADD KEY `products_factory_code_foreign` (`factory_code`),
  ADD KEY `products_store_code_foreign` (`store_code`),
  ADD KEY `products_warranty_center_code_foreign` (`warranty_center_code`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`place_code`),
  ADD UNIQUE KEY `users_password_unique` (`password`);

--
-- Indexes for table `warranty_centers`
--
ALTER TABLE `warranty_centers`
  ADD PRIMARY KEY (`warranty_center_code`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_code_foreign` FOREIGN KEY (`customer_code`) REFERENCES `customers` (`customer_code`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_factory_code_foreign` FOREIGN KEY (`factory_code`) REFERENCES `factories` (`factory_code`),
  ADD CONSTRAINT `products_store_code_foreign` FOREIGN KEY (`store_code`) REFERENCES `stores` (`store_code`),
  ADD CONSTRAINT `products_warranty_center_code_foreign` FOREIGN KEY (`warranty_center_code`) REFERENCES `warranty_centers` (`warranty_center_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
