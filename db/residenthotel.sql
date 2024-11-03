-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 08:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `residenthotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodations`
--

CREATE TABLE `accomodations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `website` varchar(60) NOT NULL,
  `location` varchar(255) NOT NULL,
  `g_photo` varchar(100) NOT NULL,
  `availability` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `accomodations`
--

INSERT INTO `accomodations` (`id`, `name`, `website`, `location`, `g_photo`, `availability`) VALUES
(2, 'HEAVEN ONE', 'www.residenthotel.rw', 'Kigali, Rwanda', '../uploads/B10.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `accomodation_managers`
--

CREATE TABLE `accomodation_managers` (
  `id` int(11) NOT NULL,
  `accomodation_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accomodation_managers`
--

INSERT INTO `accomodation_managers` (`id`, `accomodation_id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(2, 2, 'violette@gmail.com', '123', '2022-12-28 18:59:32', '2022-12-28 20:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `display_title` varchar(255) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `price_per_hour` double NOT NULL,
  `price_per_day` double NOT NULL,
  `availability` tinyint(4) NOT NULL DEFAULT 1,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `hotel_id`, `display_title`, `number`, `price_per_hour`, `price_per_day`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(3, 1, 'Conference Hall', 'HALL-001', 20, 100, 0, '../uploads/H2.jpg', '2022-12-28 18:39:54', '2024-09-22 04:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `website` varchar(60) NOT NULL,
  `location` varchar(255) NOT NULL,
  `g_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `hotel_name`, `website`, `location`, `g_photo`) VALUES
(1, 'Resident Hotel', 'www.residenthotel.com', 'NYARUGENGE, NYABUGOGO', 'uploads/resident.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `accomodation_id` int(11) NOT NULL,
  `display_title` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `number_of_rooms` int(11) NOT NULL DEFAULT 1,
  `number_of_beds` int(11) NOT NULL DEFAULT 1,
  `price_per_hour` double NOT NULL,
  `price_per_day` double NOT NULL,
  `availability` tinyint(4) NOT NULL DEFAULT 1,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `accomodation_id`, `display_title`, `number`, `number_of_rooms`, `number_of_beds`, `price_per_hour`, `price_per_day`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(2, 2, 'FAMILY HOUSE', 'H-001', 5, 3, 20, 20, 0, '../uploads/download.jpg', '2022-12-28 19:04:00', '2024-09-22 04:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `transaction_message` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `invoice_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `reservation_id`, `amount`, `transaction_id`, `transaction_message`, `created_at`, `updated_at`, `invoice_url`) VALUES
(42, 72, 700, '', '', '2024-09-28 00:46:01', '2024-09-28 02:46:01', ''),
(43, 73, 400, '', '', '2024-09-28 01:35:33', '2024-09-28 08:13:43', 'invoices/Call for Applications.pdf'),
(44, 74, 600, '', '', '2024-09-28 05:29:13', '2024-09-28 07:29:36', 'invoices/Learning outcome 1 NOsql.pdf'),
(45, 75, 100, '', '', '2024-09-28 06:34:46', '2024-09-28 08:34:46', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` double NOT NULL DEFAULT 1,
  `remaining_quantity` double NOT NULL DEFAULT 1,
  `cost` double NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL,
  `period` varchar(100) NOT NULL,
  `since` date DEFAULT NULL,
  `until` date DEFAULT NULL,
  `period_count` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('pending','canceled','approved','completed','onreview','rejected','appealed') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `client_id`, `type`, `type_id`, `period`, `since`, `until`, `period_count`, `total_amount`, `created_at`, `updated_at`, `status`) VALUES
(72, 12, 'Room', 0, 'daily', '2024-09-28', '2024-10-05', 7, 700, '2024-09-28 00:46:01', '2024-09-28 03:17:21', 'canceled'),
(73, 12, 'Hall', 3, 'daily', '2024-09-29', '2024-10-03', 4, 400, '2024-09-28 01:35:33', '2024-09-28 08:20:38', 'appealed'),
(74, 12, 'Hall', 3, 'daily', '2024-09-29', '2024-10-05', 6, 600, '2024-09-28 05:29:13', '2024-09-28 07:30:33', 'approved'),
(75, 12, 'Hall', 0, 'daily', '2024-09-28', '2024-09-27', 1, 100, '2024-09-28 06:34:46', '2024-09-28 08:34:46', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `display_title` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `price_per_hour` double NOT NULL,
  `price_per_day` double NOT NULL,
  `availability` tinyint(4) NOT NULL DEFAULT 1,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `hotel_id`, `display_title`, `number`, `price_per_hour`, `price_per_day`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(6, 1, 'Luxury Room', 'F1-001', 20, 20, 1, '../uploads/R0 2.jpg', '2022-12-28 17:05:51', '2024-09-28 01:47:44'),
(7, 1, 'Classic Room', 'F1-002', 20, 20, 1, '../uploads/R0 2.jpg', '2022-12-28 17:34:23', '2024-09-28 01:47:45'),
(8, 1, 'Sweet Room', 'F1-003', 20, 20, 1, '../uploads/R0 4.jpg', '2022-12-28 18:03:12', '2024-09-28 01:47:46'),
(9, 1, 'Double', 'R-001', 20, 10, 1, '../uploads/R0 7.jpg', '2022-12-28 21:41:54', '2024-09-28 01:47:48'),
(10, 10, 'Single', 'R-005', 20, 20, 1, '../uploads/R0 3.jpg', '2022-12-28 21:47:44', '2024-09-28 03:25:13'),
(11, 1, 'Sweet Room', 'R45', 100, 100, 1, '../uploads/H3.jpg', '2022-12-29 10:37:07', '2024-09-28 01:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `system_name` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`system_name`, `username`, `email`, `phone`, `password`, `location`, `about`) VALUES
('resident', 'violette@gmail.com', 'residenthotel@gmail.com', '0784427142', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Kigali, Rwanda Downtown', ' \r\n                                                           \r\n                                                           \r\n                                                          CAHSMS stands for Customer Awareness Hotel Services Management System. It helps people who are seeking for hotels to easily find them very easily, faster and even online without taking long way to find them by themselves. It also provide the direct communication link to the hotel operators, so that a customer feels satisfied.    \r\n                                                          \r\n                                                          \r\n                                                       '),
('Residental Hotel', 'admin', 'admin@test.com', '0783636363', '21232f297a57a5a743894a0e4a801fc3', 'NGOMA', 'Happiness Hotel');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `phone`, `email`, `password`, `created_at`, `updated_at`) VALUES
(10, 'John', 'Doe', '0784589445', 'test@test.com', '123', '2024-09-21 22:53:15', '2024-09-22 00:53:15'),
(11, 'Philemon', 'SHIKAMUSENGE', '0784589448', 'test@test.com', '123', '2024-09-21 22:56:05', '2024-09-22 00:56:05'),
(12, 'John Doe', 'SHIKAMUSENGE', '0784589448', 'john@test.com', '123', '2024-09-21 23:01:52', '2024-09-22 01:01:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodations`
--
ALTER TABLE `accomodations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `accomodation_managers`
--
ALTER TABLE `accomodation_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
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
-- AUTO_INCREMENT for table `accomodations`
--
ALTER TABLE `accomodations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `accomodation_managers`
--
ALTER TABLE `accomodation_managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
