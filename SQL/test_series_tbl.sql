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
-- Table structure for table `test_series_tbl`
--

CREATE TABLE `test_series_tbl` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(155) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `test_category` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_series_tbl`
--

INSERT INTO `test_series_tbl` (`test_id`, `test_name`, `subject`, `test_category`, `date_time`, `is_active`) VALUES
(1, 'Dest Typing For SSC CGL &amp; CHSL Typing Test-1', 'Typing Test For SSC CGL Exam 2023', 1, '2023-10-15 10:15:42', 1),
(2, 'SSC CGL Typing Test-2 Demo Test', 'Typing Test For SSC CGL Exam 2023', 1, '2023-10-15 10:15:42', 0),
(3, 'IB ACIO Exe Tier I Exam 2023', 'IB ACIO Exe Tier I Exam 2023', 3, '2024-01-17 18:10:16', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_series_tbl`
--
ALTER TABLE `test_series_tbl`
  ADD PRIMARY KEY (`test_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test_series_tbl`
--
ALTER TABLE `test_series_tbl`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
