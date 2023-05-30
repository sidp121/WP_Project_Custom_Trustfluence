-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2023 at 06:38 PM
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
-- Table structure for table `rvw_feedback_form`
--

CREATE TABLE `rvw_feedback_form` (
  `id` int NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `site_domain` varchar(50) NOT NULL,
  `star_value` varchar(50) NOT NULL,
  `what_we_can` longtext NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `hit_status` varchar(50) NOT NULL,
  `email_after_2_days` varchar(50) NOT NULL,
  `email_after_5_days` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rvw_feedback_form`
--

INSERT INTO `rvw_feedback_form` (`id`, `full_name`, `email`, `site_domain`, `star_value`, `what_we_can`, `company_name`, `hit_status`, `email_after_2_days`, `email_after_5_days`, `created_date`, `token`) VALUES
(1, 'John Doe', 'shadab.webnotics@gmail.com', 'Make Review', '8', 'testing description', 'demo company', 'Pending', '', '', '2023-05-19 00:00:00', '1684531127'),
(2, 'Victor doe', 'shadab.webnotics@gmail.com', 'Make Review', '', 'No start testing', 'testing company', 'Pending', 'success', 'success', '2023-05-20 00:00:00', '1684531173');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rvw_feedback_form`
--
ALTER TABLE `rvw_feedback_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rvw_feedback_form`
--
ALTER TABLE `rvw_feedback_form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
