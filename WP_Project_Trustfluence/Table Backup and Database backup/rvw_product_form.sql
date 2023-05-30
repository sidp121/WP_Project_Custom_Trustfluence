-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2023 at 06:36 PM
-- Server version: 8.0.33
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sandrojungi_trustfluence`
--

-- --------------------------------------------------------

--
-- Table structure for table `rvw_product_form`
--

CREATE TABLE `rvw_product_form` (
  `id` int NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `site_domain` varchar(150) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `feedback_id` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rvw_product_form`
--

INSERT INTO `rvw_product_form` (`id`, `product_id`, `site_domain`, `full_name`, `email`, `message`, `feedback_id`, `created_date`) VALUES
(1, '1375', '', 'Shadab Rana', 'shadab.webnotics@gmail.com', 'testing', '2', '2023-05-08 22:26:44'),
(2, '1373', 'Make Review', 'Shadab Rana', 'shadab.webnotics@gmail.com', 'testing', '', '2023-05-23 00:00:00'),
(3, '1374', 'Make Review', 'Sid Test', 'tes', '', '', '2023-05-23 00:00:00'),
(4, '1374', 'Make Review', 'Sid Test', 'test@gmail.com', 'test', '', '2023-05-23 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rvw_product_form`
--
ALTER TABLE `rvw_product_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rvw_product_form`
--
ALTER TABLE `rvw_product_form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
