-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2022 at 05:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dams`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(9, 'FOM1');

-- --------------------------------------------------------

--
-- Table structure for table `expiration`
--

CREATE TABLE `expiration` (
  `expiration_id` int(11) NOT NULL,
  `expiration` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expiration`
--

INSERT INTO `expiration` (`expiration_id`, `expiration`) VALUES
(1, 7),
(2, 30),
(3, 60),
(4, 365);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_tmp_name` varchar(255) NOT NULL,
  `file_error` varchar(255) NOT NULL,
  `file_size` varchar(255) NOT NULL,
  `file_date_uploaded` varchar(255) NOT NULL,
  `file_date_modified` varchar(255) NOT NULL,
  `expiration_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `file_name`, `file_type`, `file_tmp_name`, `file_error`, `file_size`, `file_date_uploaded`, `file_date_modified`, `expiration_id`, `category_id`) VALUES
(12, 'Archives in the Digital Age.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpED7E.tmp', '0', '132121', '2022-04-29 1:10:32:AM', '2022-04-29 1:10:18:AM', 1, 9),
(17, 'Archives in the Digital Age.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpE6C.tmp', '0', '132121', '2022-04-29 1:13:57:AM', '2022-04-29 1:13:13:AM', 2, 10),
(18, 'Archives in the Digital Age.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php5336.tmp', '0', '132121', '2022-04-29 1:14:15:AM', '2022-04-29 1:13:57:AM', 3, 11),
(19, 'Archives in the Digital Age.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php7F15.tmp', '0', '132121', '2022-04-29 1:15:32:AM', '2022-04-29 1:14:15:AM', 9, 1),
(22, 'ABAINZA_Feedback.docx', 'application/octet-stream', 'C:\\xampp\\tmp\\php73A4.tmp', '0', '12361', '2022-04-29 1:17:40:AM', '2022-04-29 1:17:40:AM', 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `birthdate`, `type`) VALUES
(1, 'Benjie', 'Edroso', 'benjieedroso@gmail.com', '$2y$10$avLSSvasbCame1zGpEiyoOFO495xWRVmRW/W7K2rJLYqNWf7zbkvO', '2000-06-30', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `expiration`
--
ALTER TABLE `expiration`
  ADD PRIMARY KEY (`expiration_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`),
  ADD UNIQUE KEY `category_id` (`category_id`),
  ADD UNIQUE KEY `expiration_id` (`expiration_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `expiration`
--
ALTER TABLE `expiration`
  MODIFY `expiration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
