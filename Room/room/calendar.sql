-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 09:46 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendar`
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
  `user_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`evt_id`, `evt_start`, `evt_end`, `evt_text`, `evt_color`, `evt_bg`, `qty`, `projector`, `whiteboard`, `ext_cord`, `sound`, `sound_simple`, `sound_advance`, `basic_lights`, `cleanup`, `cleanup_before`, `cleanup_after`, `others`, `others1`, `allday`, `x67`, `x78`, `x89`, `x910`, `x1011`, `x1112`, `x121`, `x12`, `x23`, `x34`, `x45`, `x56`, `room_orientation`, `room_orientation_other`, `user_id`, `username`, `fullName`, `user_category`) VALUES
(31, '2023-09-23', '2023-09-23 00:00:00', 'BOARD', '#000000', '#ffff00', '2', '1', '1', '1', 'sound', '0', '0', '0', 'cleanup', '0', '0', '', 'dfwesfrewfe', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'on', '', 1, '', 'JAMES PHILIP GOMERA', 'ADMIN'),
(44, '2023-09-27', '2023-09-27 00:00:00', 'BOARD', '#000000', '#ffff00', '6', '1', '1', '1', 'sound', '1', '0', '1', 'cleanup', '1', '0', '', 'Microphone', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'on', 'Bored Room', 1, '', 'JAMES PHILIP GOMERA', 'ADMIN'),
(47, '2023-09-29', '2023-09-29 00:00:00', 'BOARD', '#000000', '#009900', '5', '1', '0', '1', 'sound', '0', '1', '0', 'cleanup', '0', '1', '', 'Microphone', '', '1', '1', '1', '1', '1', '1', '', '', '', '', '', '', 'Training', '', 3, 'johndoe123', 'John Doe', 'USER'),
(48, '2023-09-30', '2023-09-30 00:00:00', 'ANNEX 2', '#000000', '#ff0000', '12', '1', '1', '0', 'sound', '0', '0', '0', 'cleanup', '0', '0', '', '', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'Workshop', '', 3, 'johndoe123', 'John Doe', 'USER'),
(49, '2023-10-01', '2023-10-01 00:00:00', 'ANNEX MINI', '#000000', '#ffff00', '5', '1', '1', '1', 'sound', '0', '1', '1', 'cleanup', '0', '1', '', 'Microphone', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'on', 'Bored Room', 3, 'johndoe123', 'John Doe', 'USER'),
(50, '2023-09-29', '2023-09-29 00:00:00', 'ANNEX 1', '#000000', '#ffff00', '2', '1', '1', '1', 'sound', '1', '0', '1', 'cleanup', '1', '0', '', 'Microphone', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'on', 'Bored Room', 4, 'mary123', 'Mary Smith', 'USER'),
(51, '2023-10-01', '2023-10-01 00:00:00', 'BOARD', '#000000', '#ffff00', '6', '1', '1', '1', 'sound', '0', '1', '0', 'cleanup', '0', '1', '', 'Microphone', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'on', 'Bored Room', 1, 'jpgomera19', 'JAMES PHILIP GOMERA', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `locationpo`
--

CREATE TABLE `locationpo` (
  `evt_id` bigint(20) NOT NULL,
  `evt_start` date NOT NULL,
  `evt_text` text NOT NULL,
  `evt_color` varchar(7) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `allday` varchar(255) NOT NULL,
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
  `x56` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locationpo`
--

INSERT INTO `locationpo` (`evt_id`, `evt_start`, `evt_text`, `evt_color`, `qty`, `allday`, `x67`, `x78`, `x89`, `x910`, `x1011`, `x1112`, `x121`, `x12`, `x23`, `x34`, `x45`, `x56`) VALUES
(1, '2023-09-08', 'boardroom', '#000000', '3', 'x', '', 'Deo Villavicencio', 'Deo Villavicencio', '', '', '', '', '', '', '', '', ''),
(2, '2023-09-09', 'boardroom', '#000000', '2', 'x', 'Deo Villavicencio', 'Deo Villavicencio', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `endpoint_URL` varchar(300) NOT NULL,
  `date_allowed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `endpoint_URL`, `date_allowed`) VALUES
(54, 3, 'https://fcm.googleapis.com/fcm/send/eZkJLci9IoQ:APA91bEgy8QaMu_EMxcUxfpg6BidjAr2R7c5Zj66N-sz-s8OjFlPOlLabJW64CooZyBdJ0eIHQnmlraJJ9D2zcWdWTNgMso5NaFDq-FiJ3fsghCjdZWDC-DDELxSUG_Pr6WuAt3rnd-W', '2023-10-02 06:48:08'),
(55, 3, 'https://fcm.googleapis.com/fcm/send/cu38_DmAmY8:APA91bF0vNujhMLlLVedhgdqBuvKFmL6kJ-sfOqttrNgfHxRoAMMzv3NAff76EDJCcCKcmUy84zqkFbQPO-uWApV132r6ErYRd4FA4tfuZYrIbk4hMreX42wQG8BjWrwAUcPRlcCS9xY', '2023-10-02 06:48:31'),
(56, 4, 'https://fcm.googleapis.com/fcm/send/falK5j14Dbk:APA91bHi4CrVfd9ulj-3Ottsv3ilKenX1ICsOFh67bs-ygsirOAW5fSzmY7plrY8XjtTFmyR3BHywCY-48YExlpKJgbxebqjmF5HB4Qv2Ynm0yMR1WVX6P07l29bd0tg3PbSJ0QIF6cS', '2023-10-02 06:52:20'),
(57, 12, 'https://fcm.googleapis.com/fcm/send/eZkJLci9IoQ:APA91bEgy8QaMu_EMxcUxfpg6BidjAr2R7c5Zj66N-sz-s8OjFlPOlLabJW64CooZyBdJ0eIHQnmlraJJ9D2zcWdWTNgMso5NaFDq-FiJ3fsghCjdZWDC-DDELxSUG_Pr6WuAt3rnd-W', '2023-10-02 06:54:49'),
(58, 12, 'https://fcm.googleapis.com/fcm/send/falK5j14Dbk:APA91bHi4CrVfd9ulj-3Ottsv3ilKenX1ICsOFh67bs-ygsirOAW5fSzmY7plrY8XjtTFmyR3BHywCY-48YExlpKJgbxebqjmF5HB4Qv2Ynm0yMR1WVX6P07l29bd0tg3PbSJ0QIF6cS', '2023-10-02 06:55:20');

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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `PSID` int(50) NOT NULL,
  `message` varchar(3000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_number`, `username`, `password`, `firstname`, `middlename`, `lastname`, `email`, `contactNumber`, `division`, `category`, `status`, `timestamp`) VALUES
(1, 123456789, 'jpgomera19', '$2y$10$lCzqmn/j8avfUXyR1oBg3..al4U7a/SWB/8JFu.JT8XG3Jlcknyky', 'JAMES PHILIP', 'AMANTE', 'GOMERA', '', '09101465183', 'STRAT', 'ADMIN', 1, '2023-09-19 00:41:47'),
(2, 987654321, 'deo123', '$2y$10$NN8BCdSQxem40Lk6ymY0l.j2sc0sNiQqoi5gQl5J3cBvnx..E6sJG', 'Deo', 'Middle', 'Villavicencio', '', '09123456789', 'STRAT', 'SUPER ADMIN', 1, '2023-09-19 00:42:43'),
(3, 11223344, 'johndoe123', '$2y$10$QMwcGyEsYwCPkpAKjdw8oedZnpSb24/FA9NiVsc.hPhSUQ4guOTSu', 'John', 'Middle', 'Doe', '', '09123456789', 'HR', 'USER', 1, '2023-09-19 01:54:20'),
(4, 1232132123, 'mary123', '$2y$10$8AOn7WgBH5W.tN5npnCb8.Tha/2giwZdjXMHXvcdt52pwM8GHtYhy', 'Mary', 'Middle', 'Smith', '', '09123456789', 'FINANCE', 'USER', 1, '2023-09-19 02:05:28'),
(12, 19012464, 'jerryboy123', '$2y$10$0roqljkn5Jpcmdrn26K59u0MoEiHBfwYkrG/qDS7QH46K9VIXOCka', 'Jerry Boy', 'Amante', 'Gomera', 'jphigomera0619@gmail.com', '09101465183', 'STRAT', 'USER', 1, '2023-09-30 06:01:11');

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
-- Indexes for table `locationpo`
--
ALTER TABLE `locationpo`
  ADD PRIMARY KEY (`evt_id`),
  ADD KEY `evt_start` (`evt_start`);

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
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `evt_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `locationpo`
--
ALTER TABLE `locationpo`
  MODIFY `evt_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
