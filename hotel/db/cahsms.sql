-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 03:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cahsms`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `hotel_name`, `website`, `location`, `g_photo`) VALUES
(1, 'Chuzzi Hotel', 'www.chotel.com', 'Karongi', 'slide-2.jpg'),
(2, 'Kaizen Hotel', 'www.kaizen.rw', 'Musanze', 'slide-1.jpg'),
(4, 'Wixen Hotel', 'www.wixen.hot.rw', 'Gatsibo', 'slide-3.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`system_name`, `username`, `email`, `phone`, `password`, `location`, `about`) VALUES
('AHSMS', 'Chuzzi', 'cahsmsrwanda250@gmail.com', '0784427142', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Kigali, Rwanda Downtown', ' \r\n                                                           \r\n                                                           \r\n                                                          CAHSMS stands for Customer Awareness Hotel Services Management System. It helps people who are seeking for hotels to easily find them very easily, faster and even online without taking long way to find them by themselves. It also provide the direct communication link to the hotel operators, so that a customer feels satisfied.    \r\n                                                          \r\n                                                          \r\n                                                       ');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `website` varchar(60) NOT NULL,
  `hotel` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `phone`, `email`, `website`, `hotel`, `password`) VALUES
(1, 'Fabrice', 'Niyokwizerwa', '0784427142', 'niyokwizerwafabrice250@gmail.com', 'chotel.com', 'Chuzzi Hotel', '202cb962ac59075b964b07152d234b70'),
(2, 'Alice', 'Umutoni', '0785679691', 'alice@gmail.com', 'www.kaizen.rw', 'Kaizen Hotel', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(3, 'Emmy', 'Rwanda', '0788438433', 'emmy@gmail.com', 'www.serena.hot.rw', 'Serena Hotel', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'Innocent', 'Hakizimana', '0783456279', 'innocent250@gmail.com', 'www.wixen.hot.rw', 'Wixen Hotel', 'b1e0a5a7b01ab8d76921b9b26ea8d1f4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD KEY `id` (`id`);

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
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
