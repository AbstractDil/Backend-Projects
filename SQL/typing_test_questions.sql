-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2024 at 08:42 AM
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
-- Table structure for table `typing_test_questions`
--

CREATE TABLE `typing_test_questions` (
  `tt_qid` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `tt_question` varchar(4000) NOT NULL,
  `ref_test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `typing_test_questions`
--

INSERT INTO `typing_test_questions` (`tt_qid`, `datetime`, `tt_question`, `ref_test_id`) VALUES
(1, '2023-10-15 10:18:52', 'Azadi Ka Amrit Mahotsav is an initiative of the Government of India to celebrate and commemorate 75 years of independence and the glorious history of its people, culture and achievements. This Mahotsav is dedicated to the people of India who have been instrumental in bringing India thus far in its evolutionary journey and hold within them the power and potential to enable the vision of activating India 2.0, fuelled by the spirit of Aatmanirbhar Bharat.It has recently concluded its first year. In view of this, the Ministry of Culture, Government of India, has organised a two-day conference in New Delhi to reflect on the progress of AKAM so far, gather best practices and ideate the strategies to be adopted for the remaining period of the celebration, especially for upcoming crucial initiatives.The success of AKAM depends critically on the \'Whole of Government\' approach that ensures the involvement of every Ministry, State and Union Territory in this campaign, along with its counterparts abroad. In view of this substantial scale and involvement of stakeholders, the conference shall be attended by Senior Government Officers from every State and UT. The topics of discussion shall include landmark initiatives that involve mass public participation such as \'Har Ghar Jhanda\', \'International Yoga Day\', \'Digital District Repository\', \'Swatantra Swar\' and \'Mera Gaon Meri Dharohar\'. It shall also have a session by the Ministry of Tourism focusing on its significant contributions to the AKAM campaign. It shall also have an ideation session by States/UTs on the noteworthy progress made by them under AKAM, along with deliberations on best practices and lessons learned so far and how they can be incorporated going forward. This conference shall be inaugurated by the Hon\'ble Minister of Home and Co-operation. The opening address shall be delivered by the Hon\'ble Minister of Culture, Tourism, and Development of the North Eastern Region of India. Inaugural addresses of sessions shall be delivered by the Hon\'ble Minister of State for Parliamentary Affairs and Culture.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `typing_test_questions`
--
ALTER TABLE `typing_test_questions`
  ADD PRIMARY KEY (`tt_qid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `typing_test_questions`
--
ALTER TABLE `typing_test_questions`
  MODIFY `tt_qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
