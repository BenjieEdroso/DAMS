-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 05:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `file_date_modified` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `file_name`, `file_type`, `file_tmp_name`, `file_error`, `file_size`, `file_date_uploaded`, `file_date_modified`) VALUES
(6, 'The Design of Everyday Things by Don Norman (z-lib.org).pdf', 'application/pdf', 'C:\\xampp\\tmp\\php9DCE.tmp', '0', '2424307', '2022-09-07 4:52:29:PM', '2022-09-07 4:52:29:PM'),
(7, 'Domain-driven design tackling complexity in the heart of software by Evans, Eric (z-lib.org).pdf', 'application/pdf', 'C:\\xampp\\tmp\\php2CD6.tmp', '0', '3781791', '2022-09-09 2:10:09:PM', '2022-09-09 2:10:09:PM'),
(8, 'Frontend Architecture for Design Systems A Modern Blueprint for Scalable and Sustainable Websites (Micah Godbolt) (z-lib.org).pdf', 'application/pdf', 'C:\\xampp\\tmp\\php2D73.tmp', '0', '8248382', '2022-09-09 2:10:09:PM', '2022-09-09 2:10:09:PM'),
(9, 'Think Like a Programmer An Introduction to Creative Problem Solving by V. Anton Spraul (z-lib.org).pdf', 'application/pdf', 'C:\\xampp\\tmp\\php4C66.tmp', '0', '7525122', '2022-09-09 2:10:19:PM', '2022-09-09 2:10:17:PM'),
(10, 'UI is Communication How to Design Intuitive, User Centered Interfaces by Focusing on Effective Communication by Everett N McKay (z-lib.org).pdf', 'application/pdf', 'C:\\xampp\\tmp\\php4D80.tmp', '0', '42592328', '2022-09-09 2:10:19:PM', '2022-09-09 2:10:18:PM'),
(11, 'Vue.Js Up and Running Building Accessible and Performant Web Apps by Callum Macrae (z-lib.org).pdf', 'application/pdf', 'C:\\xampp\\tmp\\php538C.tmp', '0', '3569300', '2022-09-09 2:10:19:PM', '2022-09-09 2:10:19:PM'),
(12, 'WordPress Responsive Theme Design Essentials by Dejan Markovic (z-lib.org).pdf', 'application/pdf', 'C:\\xampp\\tmp\\php5429.tmp', '0', '4478014', '2022-09-09 2:10:19:PM', '2022-09-09 2:10:19:PM'),
(13, 'ByteByteGo_LinkedIn_PDF.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php8099.tmp', '0', '39603891', '2022-09-09 2:10:32:PM', '2022-09-09 2:10:31:PM'),
(14, 'High Performance Browser Networking What every web developer should know about networking and web performance (Ilya Grigorik) (z-lib.org).pdf', 'application/pdf', 'C:\\xampp\\tmp\\php8647.tmp', '0', '17184955', '2022-09-09 2:10:32:PM', '2022-09-09 2:10:32:PM');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_requested` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `status`, `file_id`, `user_id`, `date_requested`) VALUES
(6, 'approved', 6, 19, '2022-09-09 02:14:06'),
(7, 'approved', 10, 19, '2022-09-09 09:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `request_load`
--

CREATE TABLE `request_load` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_load`
--

INSERT INTO `request_load` (`id`, `user_id`, `request_count`) VALUES
(1, 19, 2);

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
(3, 'Christ', 'Gil', 'christ@gmail.com', '$2y$10$DFjoW.m6zv3PUJrBZv7nDOdDUsvd/iWvpvHDFukueUA4OILKIeX3y', '2022-09-04', 'admin'),
(12, 'Ronnel', 'Dalisay', 'ronnel@gmail.com', '$2y$10$WZ2tu7S.8XEuzxojWU3HE.fPgcGXjRJwahnkUTVUs5zlXm1z9N1z2', '2022-09-09', 'user'),
(18, 'christ2', 'christ2', 'christ2@gmail.com', '$2y$10$AlfCn8uHY8z7oDVnNq971Oq.m6C9eqFaHbx9jzi5CxJVBK.2XLeVe', '2022-09-09', 'user'),
(19, 'Benjie', 'Edroso', 'benjie@gmail.com', '$2y$10$qKe78ISkECMSt9pfCb3RKe0dU.cvDXSHo4wbmmDT/ZvVtmt31Dvpq', '2022-09-09', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_id` (`file_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `request_load`
--
ALTER TABLE `request_load`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `request_load`
--
ALTER TABLE `request_load`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`file_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_load`
--
ALTER TABLE `request_load`
  ADD CONSTRAINT `request_load_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
