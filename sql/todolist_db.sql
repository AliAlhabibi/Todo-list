-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 05:48 PM
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
-- Database: `todolist_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `name`, `user_id`, `created_at`) VALUES
(21, 'دانشگاه', '1', '2022-09-28 00:27:26'),
(22, 'پروژه', '1', '2022-09-28 00:27:36'),
(23, 'متفرقه', '1', '2022-09-28 00:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` varchar(512) NOT NULL,
  `user_id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `deadline` varchar(64) NOT NULL,
  `isimportant` int(11) NOT NULL,
  `isdone` int(11) NOT NULL DEFAULT 0,
  `craeted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `user_id`, `folder_id`, `deadline`, `isimportant`, `isdone`, `craeted_at`) VALUES
(1, 'خوابیدن زود', 'تاناتنتنت', 1, 1, '2022-09-14', 1, 1, '2022-09-24 20:14:01'),
(2, 'خوابیدن زود', '645', 1, 17, '', 1, 1, '2022-09-26 14:54:48'),
(3, 'اتمام پروژه', '645465', 1, 1, '', 1, 0, '2022-09-26 14:55:24'),
(4, 'sdfdsf', '2132', 1, 16, '', 0, 1, '2022-09-26 23:09:36'),
(5, 'ورژن جدید', 'ساختن است این ها را باید ', 1, 17, '', 0, 1, '2022-09-26 23:10:20'),
(6, 'خوابیدن زود', '1231', 1, 0, '', 0, 1, '2022-09-27 23:54:44'),
(7, '111', '1111', 1, 0, '', 1, 1, '2022-09-27 23:55:01'),
(8, 'تاریخ شمسی', 'date picker', 1, 21, '1401/07/06', 0, 0, '2022-09-28 00:28:38'),
(9, 'سلام', 'سلامممماممامماملمالباتلبتاتتلتل', 1, 23, '1401/07/26', 1, 1, '2022-09-28 00:30:47'),
(10, 'ریاضی', 'خوندنن', 1, 21, '1401/07/18', 1, 0, '2022-09-28 00:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(128) NOT NULL,
  `name` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `created_at`) VALUES
(1, 'alialhabibi80@gmail.com', 'علی', '$2y$10$vcxhrpzJgc.Md/NNUFytCOaXElVPl64Eq2.kgxYisSSPIvMAXgmEy', '2022-09-24 20:13:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
