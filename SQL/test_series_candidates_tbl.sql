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
-- Table structure for table `test_series_candidates_tbl`
--

CREATE TABLE `test_series_candidates_tbl` (
  `id` int(11) NOT NULL,
  `candidate_id` varchar(12) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `is_launched` int(11) NOT NULL DEFAULT 0,
  `launched_on` datetime NOT NULL,
  `exam_date_time` varchar(50) NOT NULL,
  `login_date_time` varchar(50) NOT NULL,
  `logout_date_time` varchar(50) NOT NULL,
  `is_login` tinyint(1) NOT NULL DEFAULT 0,
  `cand_confirm` tinyint(1) NOT NULL DEFAULT 0,
  `deLang` tinyint(1) NOT NULL DEFAULT 0,
  `disclaimer` tinyint(1) NOT NULL DEFAULT 0,
  `exam_token_key` varchar(155) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `system_no` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_series_candidates_tbl`
--

INSERT INTO `test_series_candidates_tbl` (`id`, `candidate_id`, `exam_id`, `is_launched`, `launched_on`, `exam_date_time`, `login_date_time`, `logout_date_time`, `is_login`, `cand_confirm`, `deLang`, `disclaimer`, `exam_token_key`, `ip_address`, `system_no`) VALUES
(53, 'MCU202365346', 1, 1, '2023-12-11 21:43:44', '', '2023-12-11 21:44:59', '', 1, 1, 1, 1, 'fa23776d1726b6ad47ba0037', '::1', 'C::1'),
(54, 'MCU202363303', 1, 1, '2023-12-12 19:10:43', '', '', '', 0, 0, 0, 0, '504bd1db949011ebd98c9ccd', '::1', 'C::1'),
(55, 'MCU202363303', 1, 1, '2024-01-07 09:39:27', '', '2024-01-07 09:40:09', '', 1, 1, 1, 1, '494fb33fcda6600f4432ce48', '::1', 'C::1'),
(56, 'MCU202363303', 3, 1, '2024-01-17 22:46:18', '', '2024-01-17 23:17:18', '', 1, 1, 0, 0, 'bc857673256a0e4eeeb6b34e', '::1', 'C::1'),
(57, 'MCU202363303', 3, 1, '2024-01-19 21:47:43', '', '', '', 0, 0, 0, 0, 'f84139bec6a3145eac25282d', '::1', 'C::1'),
(58, 'MCU202363373', 3, 1, '2024-03-07 10:52:54', '', '2024-03-07 10:53:15', '', 1, 1, 1, 1, '16d3465406d8b983bfd14d6a', '::1', 'C::1'),
(59, 'MCU202363373', 3, 1, '2024-03-17 14:12:00', '', '2024-03-17 14:12:58', '', 1, 1, 0, 0, 'd7e4012158d4650bbe9f8570', '::1', 'C::1'),
(60, 'MCU202363373', 1, 1, '2024-03-17 18:06:37', '', '', '', 0, 0, 0, 0, 'd1f48b6e349ed8a782f65dfd', '::1', 'C::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_series_candidates_tbl`
--
ALTER TABLE `test_series_candidates_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test_series_candidates_tbl`
--
ALTER TABLE `test_series_candidates_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
