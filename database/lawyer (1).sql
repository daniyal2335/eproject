-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 08:51 AM
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
-- Database: `lawyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoint`
--

CREATE TABLE `appoint` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `category` int(11) NOT NULL,
  `lawyer` int(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `cdateTime` datetime NOT NULL,
  `contact` varchar(200) NOT NULL,
  `des` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'pending',
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appoint`
--

INSERT INTO `appoint` (`id`, `name`, `email`, `category`, `lawyer`, `location`, `cdateTime`, `contact`, `des`, `status`, `datetime`) VALUES
(4, 'Talib', 'talib@gmail.com', 6, 31, 'islamabad', '2024-03-28 12:32:00', '03032259008', '', 'pending', '2024-03-28 07:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `specialization` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `specialization`, `image`) VALUES
(2, 'Affidavit', 'cateee.jpg'),
(3, 'Divorce', 'cateee.jpg'),
(4, 'Criminal', 'cateee.jpg'),
(6, 'Civil', 'cateee.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lawspeci`
--

CREATE TABLE `lawspeci` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'pending',
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawspeci`
--

INSERT INTO `lawspeci` (`id`, `name`, `email`, `password`, `contact`, `experience`, `location`, `image`, `status`, `c_id`) VALUES
(28, 'aqsa', 'aqsa@gmail.com', '123', '03430806011', '2', 'karachi', 'n1.jpg', 'active', 2),
(29, 'ahmed', 'ahmed@gmail.com', '123', '03430806053', '3', 'lahore', 'law.jpg', 'active', 3),
(30, 'daniyal', 'daniyal@gmail.com', '123', '03430806082', '4', 'islamabad', 'la.jpg', 'active', 4),
(31, 'hammad', 'hammad@gmail.com', '123', '03430806032', '5', 'islamabad', 'l9.jpg', 'active', 6);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'lawyer'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `Location`, `role_id`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '123', '', '', 1, 'active'),
(6, 'ali', 'ali@gmail.com', '123', '03430806058', 'islamabad', 3, 'active'),
(8, 'aqsa', 'aqsa@gmail.com', '123', '03430806011', 'karachi', 2, 'active'),
(9, 'ahmed', 'ahmed@gmail.com', '123', '03430806053', 'lahore', 2, 'active'),
(10, 'daniyal', 'daniyal@gmail.com', '123', '03430806082', 'islamabad', 2, 'active'),
(11, 'hammad', 'hammad@gmail.com', '123', '03430806032', 'islamabad', 2, 'active'),
(12, 'Talib', 'talib@gmail.com', '123', '03032259008', 'karachi', 3, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoint`
--
ALTER TABLE `appoint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `lawyer` (`lawyer`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawspeci`
--
ALTER TABLE `lawspeci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawspeci_ibfk_1` (`c_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoint`
--
ALTER TABLE `appoint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lawspeci`
--
ALTER TABLE `lawspeci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appoint`
--
ALTER TABLE `appoint`
  ADD CONSTRAINT `appoint_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appoint_ibfk_2` FOREIGN KEY (`lawyer`) REFERENCES `lawspeci` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lawspeci`
--
ALTER TABLE `lawspeci`
  ADD CONSTRAINT `lawspeci_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
