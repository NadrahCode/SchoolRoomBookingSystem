-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 04:25 PM
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
-- Database: `schoolroombookingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL,
  `admin_phone` varchar(15) NOT NULL,
  `admin_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`, `admin_phone`, `admin_email`) VALUES
(16, 'Nadrah', 'Nadrah123!', '012-3456789', 'nad@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `bookdate` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `booktype` varchar(100) NOT NULL,
  `total_student` int(100) NOT NULL,
  `note` varchar(225) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`sr_no`, `name`, `room`, `bookdate`, `starttime`, `endtime`, `booktype`, `total_student`, `note`, `status`) VALUES
(23, 'Hisham', 'Computer Room', '2023-11-01', '09:00:00', '10:00:00', 'Class', 22, 'test', 'Approved'),
(25, 'NANAMI', 'Computer Room', '2023-11-06', '08:48:00', '09:48:00', 'Class', 0, '', 'Approved'),
(27, 'NANAMI', 'AudioVisual Room', '2023-11-06', '08:07:00', '09:07:00', 'Class', 0, '', 'Approved'),
(28, 'Niko', 'Computer Room', '2023-11-07', '08:03:00', '09:04:00', 'Class', 0, '', 'Approved'),
(29, 'Niko', 'Lab Room', '2023-11-08', '08:14:00', '09:14:00', 'Class', 0, '-', 'Approved'),
(30, 'Niko', 'Media Room', '2023-11-08', '09:24:00', '10:24:00', 'Class', 30, '', 'Approved'),
(33, 'Niko', 'Music room', '2023-11-08', '09:27:00', '10:27:00', 'Class', 60, 'test', ''),
(34, 'Niko', 'Lab Room', '2023-11-08', '09:30:00', '10:31:00', 'Class', 0, '', 'Approved'),
(35, 'Niko', 'SmartRoom', '2023-11-08', '09:31:00', '10:31:00', 'Class', 50, 'test', 'Approved'),
(37, 'Niko', 'Lab Room', '2023-11-08', '11:35:00', '12:35:00', 'Class', 60, 'test', 'Approved'),
(39, 'Niko', 'Computer Room', '2023-09-27', '09:39:00', '10:39:00', 'Class', 60, 'HELLO', 'Not Approved'),
(41, 'User', 'Computer Room', '2023-11-09', '08:00:00', '09:00:00', 'Class', 30, 'test', 'Approved'),
(43, 'UserDemo', 'AudioVisual Room', '2023-11-13', '08:00:00', '09:00:00', 'Other', 20, 'Demo!', 'Approved'),
(45, 'UserDemo', 'Computer Room', '2023-11-14', '09:00:00', '10:00:00', 'Class', 0, '', 'Approved'),
(47, 'Hayati', 'Library', '2023-11-15', '08:00:00', '09:00:00', 'Class', 0, 'test', 'Approved'),
(48, 'Syazana', 'Computer Room', '2023-11-15', '08:00:00', '09:00:00', 'Class', 0, 'test', 'Approved'),
(50, 'Demo', 'Computer Room', '2023-11-18', '08:00:00', '09:00:00', 'Class', 30, 'Demo', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(500) NOT NULL,
  `equiptment` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `description`, `equiptment`, `image`) VALUES
(40, 'Computer Room', 'A computer room can also refer to a computer lab or a data center, a facility that houses computer systems.', 'Computer,large table,monitor,projector,wifi', 'computerroom.jpg'),
(41, 'AudioVisual Room', 'The audio-visual room is a place where the students of all classes experience learning in an effective way. ', 'Computer,large table,monitor,projector', 'audiovisualroom.jpeg'),
(42, 'SmartRoom', 'These classrooms use technology to facilitate creativity and collaboration among students. ', 'Computer,large table,monitor,projector', 'smartroom.jpeg'),
(55, 'School Hall', 'A School hall where act as a physical space or room within a school building that serves various purposes.', 'stage, microphone, lightning, storage, curtains', 'HALL3.jpg'),
(56, 'Lab Room', 'a lab room is where scientific experiments, research, and practical learning take place', 'workstations, scientific instrument, chemicals', 'LAB3.jpg'),
(57, 'Library', 'a school library is place where onecan borrow books, magazines, and other reading materials for free. ', 'reading space, computer, audiovisual materials', 'LIBRARY2.jpg'),
(58, 'Media Room', 'a media room is a space designed for enjoying various forms of entertainment, typically equipped with audio and video equipment.', 'tv, seats, streaming devices, media storage', 'MEDIA2.jpg'),
(59, 'Music room', 'a musical room is a special place in a home or school designed for playing and creating music', 'musical instrument, recording music, seating', 'MUSIC3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `sr_no` int(15) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_pass` varchar(150) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`sr_no`, `user_name`, `user_pass`, `user_phone`, `user_email`) VALUES
(1, 'Niko', 'Niko12345!', '013-5432467', 'test@gmail.com'),
(3, 'Hisham', 'Hisham123!', '017-1247588', 'his@gmail.com'),
(11, 'User', 'User12345!', '012-0679846', 'User@gmail.com'),
(14, 'UserDemo', 'Ud12345!', '011-1111111', 'UD@gmail.com'),
(19, 'Hayati', 'Hayati123!', '011-1111111', 'hayati@gmail.com'),
(22, 'Demo', 'Demo12345!', '011-1111111', 'Demo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(225) NOT NULL,
  `names` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `subjects` varchar(200) NOT NULL,
  `messege` varchar(500) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`sr_no`, `names`, `email`, `phone`, `subjects`, `messege`, `status`) VALUES
(5, 'NANAMI', 'test@gmail.com', '013-5432467', 'hello', 'testtttt', 'Read'),
(6, 'Hisham', 'his@gmail.com', '017-1247588', 'Test', 'HELLOOO', ''),
(7, 'Niko', 'test@gmail.com', '013-5432467', 'TEst', 'HELLOO', ''),
(8, 'Niko', 'test@gmail.com', '013-5432467', 'test', 'teses', 'Read'),
(9, 'Niko', 'test@gmail.com', '013-5432467', 'hello', 'TESTING', 'Read'),
(11, 'User', 'User@gmail.com', '012-0679846', 'hello', 'test', 'Read'),
(13, 'UserDemo', 'UD@gmail.com', '011-1111111', 'Demo', 'Hello!', 'Not Read'),
(17, 'Hayati', 'hayati@gmail.com', '011-1111111', 'Demo', 'Testing', 'Read'),
(18, 'Syazana', 'syazana@gmail.com', '012-0679846', 'Demo', 'Test', 'Read'),
(22, 'Demo', 'Demo@gmail.com', '011-1111111', 'test', 'Demo', 'Read');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `sr_no` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
