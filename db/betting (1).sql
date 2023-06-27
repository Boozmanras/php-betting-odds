-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 12:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `betting`
--

-- --------------------------------------------------------

--
-- Table structure for table `odds`
--

CREATE TABLE `odds` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `above_text` varchar(500) NOT NULL,
  `no_odds` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `game` varchar(500) NOT NULL,
  `prediction` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `odds`
--

INSERT INTO `odds` (`id`, `type`, `above_text`, `no_odds`, `price`, `game`, `prediction`) VALUES
(1, 'mult', 'test', '22.2', '55', 'Chelsea vs liverpool', 'fixed game'),
(2, 'mult', 'test', '22.2', '55', 'Chelsea vs liverpool', 'fixed game'),
(3, 'mult', 'test 1', '22.21', '551', 'Chelsea vs liverpool', 'fixed game');

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `meta_description` varchar(500) NOT NULL,
  `meta_keywords` varchar(500) NOT NULL,
  `favicon` varchar(100) NOT NULL,
  `site_logo` varchar(100) NOT NULL,
  `google_analytics_code` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `site_title`, `meta_description`, `meta_keywords`, `favicon`, `site_logo`, `google_analytics_code`, `email`, `phone`) VALUES
(1, 'test', 'tesu', 'tesy', '', '', '', '', ''),
(2, 'test', 'tesu', 'tesy', '', '', '', '', ''),
(3, 'test', 'tesu', 'tesy', '', '', '', '123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `odds`
--
ALTER TABLE `odds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `odds`
--
ALTER TABLE `odds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
