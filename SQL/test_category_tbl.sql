-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2024 at 08:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mathhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `test_category_tbl`
--

CREATE TABLE `test_category_tbl` (
  `id` int(11) NOT NULL,
  `test_category_name` varchar(255) NOT NULL,
  `datetime` varchar(155) NOT NULL,
  `test_category_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_category_tbl`
--

INSERT INTO `test_category_tbl` (`id`, `test_category_name`, `datetime`, `test_category_slug`) VALUES
(93, 'IB ACIO 2023', '2024-03-22 19:22:41', 'ib-acio-2023'),
(94, 'SSC CGL 2024', '2024-03-22 19:22:50', 'ssc-cgl-2024'),
(96, 'SSC CHSL T-1 EXAM 2024', '2024-03-22 19:23:55', 'ssc-chsl-t-1-exam-2024'),
(98, 'Test Mock ', '2024-03-22 19:24:25', 'test-mock');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_category_tbl`
--
ALTER TABLE `test_category_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test_category_tbl`
--
ALTER TABLE `test_category_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
