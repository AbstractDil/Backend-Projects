-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2024 at 08:45 AM
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
-- Table structure for table `study_material_category_tbl`
--

CREATE TABLE `study_material_category_tbl` (
  `id` int(11) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `cat_name` varchar(155) NOT NULL,
  `ref` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `study_material_category_tbl`
--

INSERT INTO `study_material_category_tbl` (`id`, `datetime`, `cat_name`, `ref`) VALUES
(1, '2024-03-24 22:32:31', 'testcat', 0),
(2, '2024-03-24 22:33:10', 'testcat2', 0),
(3, '2024-03-24 22:41:41', 'test', 0),
(4, '2024-03-24 22:43:31', 'test Category', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `study_material_category_tbl`
--
ALTER TABLE `study_material_category_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `study_material_category_tbl`
--
ALTER TABLE `study_material_category_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
