-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 12:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trootech`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `pid`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Category I', 0, 1, '', '2021-05-07 15:00:36', '2021-05-07 15:00:36'),
(2, 'Category II', 0, 1, '', '2021-05-07 15:00:41', '2021-05-07 15:00:41'),
(3, 'Category III', 0, 1, '', '2021-05-07 15:00:45', '2021-05-07 15:00:45'),
(4, 'Category IV', 1, 1, '', '2021-05-07 15:00:57', '2021-05-07 15:02:35'),
(5, 'Category V', 2, 1, '', '2021-05-07 15:01:01', '2021-05-07 15:02:40'),
(6, 'Category New I', 1, 1, '', '2021-05-07 15:01:09', '2021-05-07 15:02:12'),
(7, 'Category New II', 1, 1, '', '2021-05-07 15:01:14', '2021-05-07 15:02:19'),
(8, 'Category New III', 2, 1, '', '2021-05-07 15:01:18', '2021-05-07 15:02:25'),
(9, 'Category New IV', 2, 1, '', '2021-05-07 15:01:23', '2021-05-07 15:02:29'),
(10, 'CatP I', 3, 1, '', '2021-05-07 15:01:52', '2021-05-07 15:02:48'),
(11, 'CatP II', 3, 1, '', '2021-05-07 15:01:56', '2021-05-07 15:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `cid` int(10) NOT NULL,
  `product` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `cost` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cid`, `product`, `cost`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Product I', 100, 1, '', '2021-05-07 15:26:23', '2021-05-07 15:26:23'),
(2, 3, 'Product IV', 200, 1, '', '2021-05-07 15:34:22', '2021-05-07 15:39:03'),
(4, 1, 'Product III', 100, 1, '', '2021-05-07 15:34:43', '2021-05-07 15:34:43'),
(5, 1, 'Product IV', 100, 1, '', '2021-05-07 15:34:57', '2021-05-07 15:34:57'),
(6, 2, 'Product IV', 100, 1, '', '2021-05-07 15:35:22', '2021-05-07 15:35:22'),
(7, 3, 'Product IV', 200, 1, '', '2021-05-07 15:35:37', '2021-05-07 15:35:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
