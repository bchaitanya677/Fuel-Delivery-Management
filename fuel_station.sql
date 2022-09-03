-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 09:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuel_station`
--

-- --------------------------------------------------------

--
-- Table structure for table `fuel-prices`
--

CREATE TABLE `fuel-prices` (
  `id` int(11) NOT NULL,
  `petrol` float DEFAULT NULL,
  `diesel` float DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuel-prices`
--

INSERT INTO `fuel-prices` (`id`, `petrol`, `diesel`, `created_at`) VALUES
(5, 110.98, 107.67, '2022-09-01 21:45:49'),
(6, 221.1, 210, '2022-09-01 22:45:07'),
(7, 112.35, 106.85, '2022-09-02 23:55:31'),
(9, 111.75, 106.58, '2022-09-03 11:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_order`
--

CREATE TABLE `fuel_order` (
  `id` int(11) NOT NULL,
  `bunk_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT 0,
  `fuel_type` enum('PETROL','DIESEL') DEFAULT NULL,
  `price` float NOT NULL DEFAULT 0,
  `payment_mode` enum('ONLINE','CASH','CHEQUE','DD') DEFAULT NULL,
  `status` enum('PROCESSING','APPROVED','REJECTED','DELIVERED','IN_TRANSIT') NOT NULL DEFAULT 'PROCESSING',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuel_order`
--

INSERT INTO `fuel_order` (`id`, `bunk_id`, `user_id`, `qty`, `fuel_type`, `price`, `payment_mode`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 5, 'PETROL', 0, 'ONLINE', 'REJECTED', '2022-09-01 23:00:54', NULL),
(2, 2, 7, 5, 'PETROL', 0, 'CASH', 'IN_TRANSIT', '2022-09-01 23:00:54', NULL),
(3, 2, 7, 11, 'DIESEL', 0, NULL, 'APPROVED', '2022-09-02 02:15:38', NULL),
(4, 2, 7, 25, 'DIESEL', 0, NULL, 'PROCESSING', '2022-09-02 16:00:30', NULL),
(5, 2, 7, 55, 'PETROL', 0, NULL, 'APPROVED', '2022-09-02 16:17:32', NULL),
(6, 2, 7, 225, 'DIESEL', 0, '', 'PROCESSING', '2022-09-03 01:09:30', NULL),
(7, 2, 7, 55, 'DIESEL', 0, 'CASH', 'PROCESSING', '2022-09-03 01:27:37', NULL),
(8, 2, 7, 11, 'DIESEL', 0, 'CASH', 'PROCESSING', '2022-09-03 01:33:31', NULL),
(9, 11, 7, 333, 'DIESEL', 0, 'ONLINE', 'PROCESSING', '2022-09-03 10:26:59', NULL),
(10, 10, 7, 2343434, 'PETROL', 0, 'DD', 'PROCESSING', '2022-09-03 10:31:53', NULL),
(11, 12, 7, 121, 'PETROL', 0, 'ONLINE', 'APPROVED', '2022-09-03 11:09:01', NULL),
(12, 12, 7, 125, 'PETROL', 0, 'ONLINE', 'PROCESSING', '2022-09-03 11:58:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `type` enum('STATE','CITY') DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `name`, `type`, `created_at`) VALUES
(17, 'andhra pradesh', 'STATE', '2022-08-30 19:53:16'),
(18, 'telanga', 'STATE', '2022-08-30 19:53:30'),
(22, 'kakinada2', 'CITY', '2022-08-31 13:24:31'),
(30, 'ynm', 'CITY', '2022-09-03 11:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `fuelstation_name` varchar(256) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `account_type` enum('ADMIN','USER','FUEL_OWNERS','FUEL_STATION') DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `fuelstation_name`, `phone_number`, `email`, `password`, `account_type`, `created_at`) VALUES
(1, 'chaitu', '', 701381194, 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ADMIN', '2022-08-28 22:30:39'),
(3, 'naga', 'indian oil', 7013886169, 'naga@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'FUEL_OWNERS', '2022-08-28 22:30:39'),
(4, 'chaitu user', 'esser', 7013811953, NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'USER', '2022-08-28 22:30:39'),
(5, 'loki user', 'hp', 8247736449, NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'USER', '2022-08-28 22:30:39'),
(6, 'chaitu', 'bharat', 777777, NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'USER', '2022-08-30 04:02:48'),
(7, 'cccc', '', 1234567899, 'cc@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'USER', '2022-09-01 14:56:07'),
(8, 'chaitu', '', 123456, NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'USER', '2022-09-02 00:24:13'),
(10, NULL, 'ndhfg wqejf,', 7013811, 'admin@admin.com', NULL, 'FUEL_STATION', '2022-09-03 09:57:24'),
(11, NULL, 'sivakumar.arepogu@iqvia.com', 70138119, 'admin@admin.com', NULL, 'FUEL_STATION', '2022-09-03 10:13:37'),
(12, NULL, 'ynm', 0, '', NULL, 'FUEL_STATION', '2022-09-03 11:07:17'),
(13, NULL, 'nnnmj', 0, '', NULL, 'FUEL_STATION', '2022-09-03 11:07:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fuel-prices`
--
ALTER TABLE `fuel-prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_order`
--
ALTER TABLE `fuel_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fuel-prices`
--
ALTER TABLE `fuel-prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fuel_order`
--
ALTER TABLE `fuel_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
