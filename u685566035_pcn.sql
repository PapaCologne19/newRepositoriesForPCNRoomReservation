-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 09, 2023 at 06:36 AM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u685566035_pcn`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `evt_id` bigint(20) NOT NULL,
  `evt_start` date NOT NULL,
  `evt_end` datetime NOT NULL,
  `evt_text` text NOT NULL,
  `evt_color` varchar(7) NOT NULL,
  `evt_bg` varchar(7) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `projector` varchar(255) NOT NULL,
  `whiteboard` varchar(255) NOT NULL,
  `ext_cord` varchar(255) NOT NULL,
  `sound` varchar(255) NOT NULL,
  `sound_simple` varchar(255) NOT NULL,
  `sound_advance` varchar(255) NOT NULL,
  `basic_lights` varchar(255) NOT NULL,
  `cleanup` varchar(255) NOT NULL,
  `cleanup_before` varchar(255) NOT NULL,
  `cleanup_after` varchar(255) NOT NULL,
  `others` varchar(255) NOT NULL,
  `others1` varchar(255) NOT NULL,
  `allday` varchar(3) NOT NULL,
  `x67` varchar(255) NOT NULL,
  `x78` varchar(255) NOT NULL,
  `x89` varchar(255) NOT NULL,
  `x910` varchar(255) NOT NULL,
  `x1011` varchar(255) NOT NULL,
  `x1112` varchar(255) NOT NULL,
  `x121` varchar(255) NOT NULL,
  `x12` varchar(255) NOT NULL,
  `x23` varchar(255) NOT NULL,
  `x34` varchar(255) NOT NULL,
  `x45` varchar(255) NOT NULL,
  `x56` varchar(255) NOT NULL,
  `room_orientation` varchar(255) NOT NULL,
  `room_orientation_other` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `user_category` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `endpoint` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`evt_id`, `evt_start`, `evt_end`, `evt_text`, `evt_color`, `evt_bg`, `qty`, `projector`, `whiteboard`, `ext_cord`, `sound`, `sound_simple`, `sound_advance`, `basic_lights`, `cleanup`, `cleanup_before`, `cleanup_after`, `others`, `others1`, `allday`, `x67`, `x78`, `x89`, `x910`, `x1011`, `x1112`, `x121`, `x12`, `x23`, `x34`, `x45`, `x56`, `room_orientation`, `room_orientation_other`, `user_id`, `username`, `fullName`, `user_category`, `email`, `endpoint`) VALUES
(63, '2023-10-14', '2023-10-14 00:00:00', 'BOARD', '#000000', '#ff0000', '3', '1', '1', '1', 'sound', '0', '1', '0', 'cleanup', '0', '0', 'UTP Cable', 'UTP Cable', '', '1', '1', '1', '1', '', '', '', '', '', '', '', '', 'on', 'Bored Room', 12, 'jerryboy123', 'Jerry Boy Gomera', 'USER', 'jphigomera0619@gmail.com', 'pxrLHRn5QREKyo88bahdkFQ=='),
(64, '2023-10-10', '2023-10-10 00:00:00', 'BOARD', '#000000', '#3c763d', '3', '1', '1', '1', 'sound', '0', '1', '0', 'cleanup', '0', '0', 'Microphone', 'Microphone', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'on', 'Bored Room', 13, 'Levi123', 'Levi Gomera', 'USER', 'levigomera@gmail.com', 'pdddlZ13p2dNkidvgh2nAeA=='),
(65, '2023-10-08', '2023-10-08 00:00:00', 'BOARD', '#000000', '#3c763d', '2', '0', '1', '1', 'sound', '0', '0', '0', 'cleanup', '0', '1', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'Training', '', 12, 'jerryboy123', 'Jerry Boy Gomera', 'USER', 'jphigomera0619@gmail.com', 'pxrLHRn5QREKyo88bahdkFQ=='),
(66, '2023-10-10', '2023-10-10 00:00:00', 'ANNEX 1', '#000000', '#f1f100', '5', '1', '1', '1', 'sound', '0', '1', '0', 'cleanup', '0', '0', 'utp cables', 'utp cables', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'Workshop', '', 1, 'jpgomera19', 'JAMES PHILIP GOMERA', 'ADMIN', '', 'pxrLHRn5QREKyo88bahdkFQ=='),
(67, '2023-10-11', '2023-10-11 00:00:00', 'BOARD', '#000000', '#3c763d', '3', '1', '1', '1', 'sound', '0', '0', '1', 'cleanup', '0', '1', '', '', '', '', '', '', '', '', '1', '1', '1', '1', '1', '', '', 'on', 'Meeting Room', 13, 'Levi123', 'Levi Gomera', 'USER', 'levigomera@gmail.com', 'pdddlZ13p2dNkidvgh2nAeA=='),
(72, '2023-10-17', '2023-10-17 00:00:00', 'BOARD', '#000000', '#f1f100', '2', '0', '0', '0', 'sound', '1', '0', '0', 'cleanup', '0', '1', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', 'on', 'Bored Room', 3, 'johndoe123', 'John Doe', 'USER', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `endpoint_URL` varchar(300) NOT NULL,
  `date_allowed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `endpoint_URL`, `date_allowed`) VALUES
(86, 1, 'pxrLHRn5QREKyo88bahdkFQ==', '2023-10-07 00:10:04'),
(87, 12, 'pxrLHRn5QREKyo88bahdkFQ==', '2023-10-07 00:18:58'),
(88, 13, 'pdddlZ13p2dNkidvgh2nAeA==', '2023-10-07 00:31:09'),
(89, 12, 'pyu3E7MvKhfSq5rMLeeWPDA==', '2023-10-07 00:53:40'),
(90, 1, 'pyu3E7MvKhfSq5rMLeeWPDA==', '2023-10-07 00:55:10'),
(91, 13, 'pyu3E7MvKhfSq5rMLeeWPDA==', '2023-10-07 01:31:40'),
(92, 14, 'pnv9YPokn6iP2bE18F8VHeA==', '2023-10-07 02:06:26'),
(93, 1, 'pdddlZ13p2dNkidvgh2nAeA==', '2023-10-07 02:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `rooms` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `active` tinyint(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `rooms`, `capacity`, `image`, `description`, `active`, `timestamp`, `date_update`) VALUES
(33, 'BOARD', '10', 'boardroom.jpg', 'San Francisco is an Apple designed typeface that provides a consistent, legible, and friendly typographic voice. Across all Apple products, the size-specific outlines and dynamic tracking ensure optimal legibility at every point size and screen resolution. Numbers have proportional widths by default, so they feel harmonious and naturally spaced within the time and data-centric interfaces people use every day.', 0, '2023-09-19 06:23:02', '2023-09-23 04:40:02'),
(34, 'ANNEX 1', '10', 'troom1.jpg', 'Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Annex 1 Anne', 0, '2023-09-19 06:24:22', '2023-09-19 06:24:22'),
(35, 'ANNEX 2', '10', 'troom2.jpg', 'Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Annex 2 Anne', 0, '2023-09-19 06:24:46', '2023-09-19 06:24:46'),
(36, 'ANNEX 1 AND 2', '10', 'download (1).jpg', 'Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 and 2 Annex 1 an', 0, '2023-09-19 06:25:14', '2023-09-19 06:25:14'),
(37, 'ANNEX MINI', '10', 'livingroom.jpg', 'Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex Mini Annex', 0, '2023-09-19 06:25:43', '2023-09-19 06:25:43'),
(38, 'CEBU 1', '10', 'openroom.png', 'Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Cebu 1 Ceb', 0, '2023-09-19 06:26:30', '2023-09-19 06:26:30'),
(39, 'CEBU 2', '10', 'trainingroom.png', 'Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Cebu 2 Ceb', 0, '2023-09-19 06:27:10', '2023-09-19 06:27:10'),
(40, 'CEBU 3', '10', 'workshop.png', 'Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Cebu 3 Ceb', 0, '2023-09-19 06:27:31', '2023-09-19 06:27:31'),
(41, 'MANILA', '10', 'classroom.png', 'Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila Room Manila R', 0, '2023-09-19 06:28:07', '2023-09-19 06:28:07'),
(42, 'LUZON', '10', 'download.jpg', 'Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Luzon Lu', 0, '2023-09-19 06:28:30', '2023-09-19 06:28:30'),
(43, 'VISAYAS', '10', 'pcn.png', 'Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visayas Visa', 0, '2023-09-19 06:28:55', '2023-09-19 06:28:55'),
(44, 'MINDANAO', '10', 'livingroom.jpg', 'Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Mindanao Minda', 0, '2023-09-19 06:29:19', '2023-09-19 06:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `division` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_number`, `username`, `password`, `firstname`, `middlename`, `lastname`, `email`, `contactNumber`, `division`, `category`, `status`, `timestamp`) VALUES
(1, 123456789, 'jpgomera19', '$2y$10$lCzqmn/j8avfUXyR1oBg3..al4U7a/SWB/8JFu.JT8XG3Jlcknyky', 'JAMES PHILIP', 'AMANTE', 'GOMERA', '', '09101465183', 'STRAT', 'ADMIN', 1, '2023-09-19 00:41:47'),
(2, 987654321, 'deo123', '$2y$10$NN8BCdSQxem40Lk6ymY0l.j2sc0sNiQqoi5gQl5J3cBvnx..E6sJG', 'Deo', 'Middle', 'Villavicencio', '', '09123456789', 'STRAT', 'SUPER ADMIN', 1, '2023-09-19 00:42:43'),
(3, 11223344, 'johndoe123', '$2y$10$QMwcGyEsYwCPkpAKjdw8oedZnpSb24/FA9NiVsc.hPhSUQ4guOTSu', 'John', 'Middle', 'Doe', '', '09123456789', 'HR', 'USER', 1, '2023-09-19 01:54:20'),
(4, 1232132123, 'mary123', '$2y$10$8AOn7WgBH5W.tN5npnCb8.Tha/2giwZdjXMHXvcdt52pwM8GHtYhy', 'Mary', 'Middle', 'Smith', '', '09123456789', 'FINANCE', 'USER', 1, '2023-09-19 02:05:28'),
(12, 19012464, 'jerryboy123', '$2y$10$0roqljkn5Jpcmdrn26K59u0MoEiHBfwYkrG/qDS7QH46K9VIXOCka', 'Jerry Boy', 'Amante', 'Gomera', 'jphigomera0619@gmail.com', '09101465183', 'STRAT', 'USER', 1, '2023-09-30 06:01:11'),
(13, 1264653562, 'Levi123', '$2y$10$W4XkkebaUIg.POub6dnKpONnMiixjAToU7O.w187mbzl3fvLVLtZy', 'Levi', 'Amante', 'Gomera', 'levigomera@gmail.com', '09123456789', 'PPI', 'USER', 1, '2023-10-03 13:10:57'),
(14, 143015, 'angelamantegomera', '$2y$10$XxQFw4J7vcAcmkjhQORAQeABKWWxC7u9mr2fFS84Rhsw/lqsK1Zsi', 'Angel', 'Amante', 'Gomera', 'angelamantegomera@gmail.com', '09633011419', 'FINANCE', 'USER', 1, '2023-10-07 02:05:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`evt_id`),
  ADD KEY `evt_start` (`evt_start`),
  ADD KEY `evt_end` (`evt_end`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `evt_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
