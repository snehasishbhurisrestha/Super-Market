-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 11:16 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super-market`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagoris`
--

CREATE TABLE `catagoris` (
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `cname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagoris`
--

INSERT INTO `catagoris` (`cat_id`, `cname`, `pid`, `created_at`, `updated_at`) VALUES
(1, 'Groceries', 0, '2023-08-28 07:44:03', '2023-08-28 07:44:03'),
(2, 'Household', 0, '2023-08-28 07:44:38', '2023-08-28 07:44:38'),
(3, 'Baby Care', 0, '2023-08-28 07:44:57', '2023-08-28 07:44:57'),
(4, 'Packaged Foods', 0, '2023-08-28 07:45:30', '2023-08-28 07:45:30'),
(5, 'Tea & Coffee', 0, '2023-08-28 07:46:05', '2023-08-28 07:46:05'),
(6, 'Dals & Pulses', 1, '2023-08-28 07:47:10', '2023-08-28 07:47:10'),
(7, 'Dry Fruits', 1, '2023-08-28 07:49:34', '2023-08-28 07:49:34'),
(8, 'Rice & Rice Products', 1, '2023-08-28 07:49:55', '2023-08-28 07:49:55'),
(9, 'Salt, Sugar & Jaggery', 1, '2023-08-28 07:50:21', '2023-08-28 07:50:21'),
(10, 'Edible Oils & Ghee', 1, '2023-08-28 07:50:37', '2023-08-28 07:50:37'),
(11, 'Atta, Flours & Sooji', 1, '2023-08-28 07:50:51', '2023-08-28 07:52:05'),
(12, 'Diapers & Wipes', 3, '2023-08-29 15:25:21', '2023-08-29 15:25:21'),
(13, 'Baby Food & Formula', 3, '2023-08-29 15:25:54', '2023-08-29 15:25:54'),
(14, 'Baby Bath & Hygiene', 3, '2023-08-29 15:26:41', '2023-08-29 15:26:41'),
(15, 'Feeding & Nursing', 3, '2023-08-29 15:27:12', '2023-08-29 15:27:12'),
(16, 'Detergent & Dishwash', 2, '2023-08-29 15:34:12', '2023-08-29 15:34:12'),
(17, 'Fresheners', 2, '2023-08-29 15:34:43', '2023-08-29 15:34:43'),
(18, 'Garbage Bags', 2, '2023-08-29 15:35:11', '2023-08-29 15:35:11'),
(19, 'Leaf & Dust Tea', 5, '2023-08-29 15:35:48', '2023-08-29 15:35:48'),
(20, 'Green Tea', 5, '2023-08-29 15:36:11', '2023-08-29 15:36:11'),
(21, 'Tea Bags', 5, '2023-08-29 15:36:28', '2023-08-29 15:36:28'),
(22, 'Cakes & Pastries', 4, '2023-08-29 15:37:53', '2023-08-29 15:37:53'),
(23, 'Cookies', 4, '2023-08-29 15:38:13', '2023-08-29 15:38:13'),
(24, 'Fruit Juices & Drinks', 4, '2023-08-29 15:39:16', '2023-08-29 15:39:16'),
(25, 'Health Drink', 4, '2023-08-29 15:41:42', '2023-08-29 15:41:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagoris`
--
ALTER TABLE `catagoris`
  ADD PRIMARY KEY (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagoris`
--
ALTER TABLE `catagoris`
  MODIFY `cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
