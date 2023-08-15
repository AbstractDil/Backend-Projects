-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2023 at 08:07 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21108236_restaurant`
--
CREATE DATABASE IF NOT EXISTS `id21108236_restaurant` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id21108236_restaurant`;

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_items_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`id`, `user_id`, `menu_items_id`, `datetime`) VALUES
(19, 38, 16, '2023-08-04 10:59:45'),
(20, 38, 15, '2023-08-04 11:01:40'),
(21, 40, 12, '2023-08-05 20:03:52'),
(22, 35, 21, '2023-08-08 23:01:32'),
(23, 38, 12, '2023-08-09 09:30:32'),
(27, 39, 11, '2023-08-12 21:31:21'),
(28, 35, 11, '2023-08-12 21:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form_data_tble`
--

CREATE TABLE `contact_form_data_tble` (
  `id` int(11) NOT NULL,
  `uemail` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form_data_tble`
--

INSERT INTO `contact_form_data_tble` (`id`, `uemail`, `fname`, `subject`, `msg`, `datetime`) VALUES
(2, 'demo@gmail.com', ' Demo Das', 'Unable to Login CPanel', 'Hi There', '2023-08-03 18:42:01'),
(3, 'demo@gmail.com', 'Demo', 'demo', 'demo', '2023-08-04 14:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items_tbl`
--

CREATE TABLE `menu_items_tbl` (
  `id` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items_tbl`
--

INSERT INTO `menu_items_tbl` (`id`, `category`, `title`, `image`, `price`, `rating`, `datetime`) VALUES
(11, 'NonVeg', 'Chicken Lolipop', 'Chicken-Lolipop.jpg', 249, 4, '2023-08-03 16:32:00'),
(12, 'NonVeg', 'Chicken Tikka', 'Chicken-Tikka.jpg', 149, 4, '2023-08-03 16:32:00'),
(13, 'NonVeg', 'Chicken Butter Masala', 'm2.jpg', 299, 4, '2023-08-03 16:32:00'),
(15, 'Veg', 'Paneer Butter Masala', 'm1.jpg', 199, 4, '2023-08-03 16:32:00'),
(16, 'NonVeg', 'Chicken Crazy Fry', 'Chicken-Crazy-Fry.jpg', 149, 4, '2023-08-03 16:32:00'),
(18, 'Veg', 'Paneer Roll', 'Paneer-Roll.jpg', 99, 4, '2023-08-04 14:51:30'),
(19, 'NonVeg', 'New Food', 'food.jpg', 89, 3, '2023-08-04 22:21:25'),
(20, 'Veg', 'Copta', 'copta.jpg', 99, 4, '2023-08-05 13:27:17'),
(21, 'Veg', 'Masala dhosa', 'dhosa.jpg', 119, 4, '2023-08-05 13:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_items_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `table_no` varchar(4) NOT NULL,
  `method` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`id`, `user_id`, `menu_items_id`, `item_name`, `quantity`, `price`, `table_no`, `method`, `datetime`, `status`) VALUES
(12, 34, 1, 'Paneer Butter Masala', 2, 199, 't7', 'Cash', '2023-08-03 09:17:50', 2),
(13, 31, 3, 'Chicken Butter Masala', 3, 249, 't7', 'Cash', '2023-08-03 11:08:14', 0),
(21, 31, 3, 'Chicken Butter Masala', 4, 249, 't3', 'Cash', '2023-08-03 16:16:55', 2),
(23, 37, 16, 'Chicken Crazy Fry', 2, 149, 't4', 'Cash', '2023-08-03 19:48:54', 1),
(24, 36, 13, 'Chicken Butter Masala', 1, 299, 't1', 'Cash', '2023-08-03 19:52:04', 0),
(25, 38, 16, 'Chicken Crazy Fry', 2, 149, 't4', 'Cash', '2023-08-04 11:00:41', 1),
(26, 38, 16, 'Chicken Crazy Fry', 2, 149, 't2', 'Cash', '2023-08-04 11:02:07', 0),
(27, 38, 15, 'Paneer Butter Masala', 2, 199, 't2', 'Cash', '2023-08-04 11:02:07', 1),
(30, 40, 12, 'Chicken Tikka', 2, 149, 't9', 'Cash', '2023-08-09 11:52:52', 0),
(31, 39, 21, 'Masala dhosa', 2, 119, 't9', 'Cash', '2023-08-09 22:11:16', 2),
(32, 39, 21, 'Masala dhosa', 5, 119, 't7', 'Cash', '2023-08-12 17:56:24', 0),
(33, 39, 11, 'Chicken Lolipop', 3, 249, 't7', 'Cash', '2023-08-12 21:32:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sliders_tbl`
--

CREATE TABLE `sliders_tbl` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders_tbl`
--

INSERT INTO `sliders_tbl` (`id`, `datetime`, `title`, `image`) VALUES
(1, '2023-08-04 19:25:24', 'Best Food With Best Quality', 'c4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `fname` varchar(50) NOT NULL,
  `uemail` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `usertype` int(11) NOT NULL DEFAULT 0,
  `updated_on` varchar(50) NOT NULL DEFAULT 'Not updated yet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `datetime`, `fname`, `uemail`, `pwd`, `usertype`, `updated_on`) VALUES
(31, '2023-08-02 11:18:19', 'Sagar', 'sagar@gmail.com', '9c856c2c06f232b57619734224dd8c92', 0, 'Not updated yet'),
(33, '2023-08-02 11:19:49', '  Demo ', 'demo@gmail.com', 'fd6138204c4eb1dd19e63896c1557e27', 0, '2023-08-03 18:30:34'),
(35, '2023-08-03 11:29:18', 'Admin Sayantan', 'admin@gmail.com', '751cb3f4aa17c36186f4856c8982bf27', 1, '2023-08-07 21:14:29'),
(37, '2023-08-03 19:47:57', 'Sayantan Deb ', 'sayantand631@gmail.com', '56b89b2e200344455cf36402054fff33', 0, 'Not updated yet'),
(38, '2023-08-04 10:58:32', 'Debashis sadhukhan', 'dsadhukhan37@gmail.com', '49892ac1139e680bfdc11a5c5276348e', 0, 'Not updated yet'),
(39, '2023-08-05 19:35:56', 'Sayantan Deb', 'jit968833@gmail.com', '751cb3f4aa17c36186f4856c8982bf27', 0, 'Not updated yet'),
(40, '2023-08-05 19:44:24', 'Sayantan', 'sayantandeb48@gmail.com', '751cb3f4aa17c36186f4856c8982bf27', 0, 'Not updated yet'),
(41, '2023-08-09 11:49:14', 'supratim sarkar', 'supratimsarkar12vd@gmail.com', '7bbc5a33202994b8362cec3634a4b86c', 0, 'Not updated yet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form_data_tble`
--
ALTER TABLE `contact_form_data_tble`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items_tbl`
--
ALTER TABLE `menu_items_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders_tbl`
--
ALTER TABLE `sliders_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contact_form_data_tble`
--
ALTER TABLE `contact_form_data_tble`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_items_tbl`
--
ALTER TABLE `menu_items_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sliders_tbl`
--
ALTER TABLE `sliders_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
