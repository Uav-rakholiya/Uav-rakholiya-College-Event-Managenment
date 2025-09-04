-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2024 at 05:48 PM
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
-- Database: `db_fest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clubs`
--

CREATE TABLE `tbl_clubs` (
  `club_id` varchar(15) NOT NULL,
  `club_name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `capacity` int(20) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clubs`
--

INSERT INTO `tbl_clubs` (`club_id`, `club_name`, `category`, `capacity`, `description`, `status`) VALUES
('CLUB115', '  Rajneeti ', '  LAW  ', 30, '  Working of Indian Parliament  ', 1),
('CLUB526', 'Kurukshetra', 'Management', 30, 'All Management related events', 1),
('CLUB818', 'Quizzards', 'Quiz', 50, 'Quiz Rapid Fire', 1),
('CLUB966', 'Sanskruti', 'Artistic', 60, 'Showcase your skills', 1),
('CLUB321', 'Semi Colon', 'IT', 40, 'Show your Coding skills', 1),
('CLUB724', 'Toss', 'Sports', 100, 'Sports', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `event_id` varchar(15) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `club_id` varchar(100) NOT NULL,
  `event_admin` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `capacity` int(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`event_id`, `event_name`, `club_id`, `event_admin`, `date`, `time`, `capacity`, `description`, `status`) VALUES
('EVENT-292', 'Vocaloids (Karaoke Singing)', 'CLUB966', 'Divam', '2024-10-11', '11:00:00.000000', 7, 'Human voice undoubtedly sounds better than any other musical instrument.', 1),
('EVENT-302', 'Nritya-Manthan (Dance competition)', 'CLUB966', 'Sumit', '2024-10-10', '18:00:00.000000', 14, 'When you dance, your purpose is not to get to a certain place on The floor.', 1),
('EVENT-306', 'खोज-ऐ-कायनात : A treasure trove (The Treasure Hunt', 'CLUB818', 'Minansh', '2024-10-20', '11:00:00.000000', 100, 'People, gather around! Get ready for a rollicking treasure hunt with a twist', 1),
('EVENT-372', 'Mock Shark Tank', 'CLUB526', 'Shivam', '2024-10-04', '17:12:00.000000', 100, 'Unleash your innovative spirit as participants pitch their business ideas in a real-life shark tank scenario', 1),
('EVENT-460', 'The Game of Code', 'CLUB321', 'Sumit', '2024-10-11', '10:00:00.000000', 24, 'Step into the world of ', 1),
('EVENT-576', 'HR Harmonics', 'CLUB526', 'Shivam', '2024-10-09', '13:00:00.000000', 10, 'Where Laughter is the best event and our HR experts are conductor of joy!', 1),
('EVENT-900', 'HOWZZAT (Cricket Quiz)', 'CLUB818', 'Shivam', '2024-10-08', '18:00:00.000000', 50, 'Unleash the Akash Chopra trapped in your skin cells, combined with a tinge of passion.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participants`
--

CREATE TABLE `tbl_participants` (
  `id` int(50) NOT NULL,
  `participant_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `event_id` varchar(100) NOT NULL,
  `reg_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_participants`
--

INSERT INTO `tbl_participants` (`id`, `participant_id`, `name`, `user_id`, `event_id`, `reg_date`, `status`) VALUES
(1, 'PART-9807', 'Sumit Goyal', 'USR-234', 'EVENT551', '2024-10-04', 1),
(2, 'PART-6150', 'Sumit Goyal', 'USR-234', 'EVENT551', '2024-10-04', 1),
(3, 'PART-7600', 'Sumit Goyal', 'USR-234', 'EVENT-900', '2024-10-04', 1),
(4, 'PART-8216', 'Sumit Goyal', 'USR-234', 'EVENT-576', '2024-10-04', 1),
(5, 'PART-1780', 'Divam Modi', 'USR-275', 'EVENT-576', '2024-10-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_superadmin`
--

CREATE TABLE `tbl_superadmin` (
  `sup_adm_id` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` int(10) NOT NULL DEFAULT 1,
  `status` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_superadmin`
--

INSERT INTO `tbl_superadmin` (`sup_adm_id`, `name`, `email`, `password`, `role`, `status`) VALUES
('1', 'Utsav', 'utsavrakholiya@gmail.com', '12345', 1, 1),
('2', 'Shivam', 'shivam1sonani@gmail.com', '12345', 1, 1),
('3', 'Sumit', 'sumitg2004@gmail.com', '12345', 1, 1),
('4', 'Minansh', 'minansh07@gmail.com', '12345', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` varchar(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `clgname` varchar(100) NOT NULL,
  `stream` varchar(10) NOT NULL,
  `clg_year` int(5) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(5) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `email`, `mobile`, `dob`, `gender`, `clgname`, `stream`, `clg_year`, `password`, `role`, `status`) VALUES
('USR-136', 'Jane Desai', 'sumitg2004@gmail.com', '8200809321', '2004-12-10', 'male', 'Sdjic', 'BBA', 2, 'fe703d258c7ef5f50b71e06565a65aa07194907f', 1, 1),
('USR-275', 'Divam Modi', 'divammodi777@gmail.com', '9601879332', '2004-02-10', 'male', 'Sdjic', 'BCA', 3, 'adcd7048512e64b48da55b027577886ee5a36350', 1, 1),
('USR-383', 'Shivam Sonani', 'shivam1sonani@gmail.com', '8200809321', '2004-02-21', 'male', 'Sdjic', 'BCA', 3, 'adcd7048512e64b48da55b027577886ee5a36350', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_volunteer`
--

CREATE TABLE `tbl_volunteer` (
  `id` int(50) NOT NULL,
  `vol_id` varchar(100) NOT NULL,
  `vol_name` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `event_id` varchar(100) NOT NULL,
  `reg_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_volunteer`
--

INSERT INTO `tbl_volunteer` (`id`, `vol_id`, `vol_name`, `user_id`, `event_id`, `reg_date`, `status`) VALUES
(1, 'VOL-1179', 'Sumit Goyal', 'USR-234', 'EVENT551', '2024-10-04', 1),
(2, 'VOL-1282', 'Sumit Goyal', 'USR-234', 'EVENT-576', '2024-10-04', 1),
(3, 'VOL-9806', 'Divam Modi', 'USR-275', 'EVENT-900', '2024-10-04', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_clubs`
--
ALTER TABLE `tbl_clubs`
  ADD UNIQUE KEY `club_name` (`club_name`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD UNIQUE KEY `unique_event_id` (`event_id`);

--
-- Indexes for table `tbl_participants`
--
ALTER TABLE `tbl_participants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_event` (`participant_id`);

--
-- Indexes for table `tbl_superadmin`
--
ALTER TABLE `tbl_superadmin`
  ADD UNIQUE KEY `unique_sup_adm_id` (`sup_adm_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD UNIQUE KEY `unique_user_id` (`user_id`);

--
-- Indexes for table `tbl_volunteer`
--
ALTER TABLE `tbl_volunteer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `constraint_name` (`vol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_participants`
--
ALTER TABLE `tbl_participants`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_volunteer`
--
ALTER TABLE `tbl_volunteer`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
