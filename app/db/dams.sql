-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 11:29 AM
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
  `file_date_modified` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `file_name`, `file_type`, `file_tmp_name`, `file_error`, `file_size`, `file_date_uploaded`, `file_date_modified`) VALUES
(1, 'Think Like a Programmer An Introduction to Creative Problem Solving by V. Anton Spraul (z-lib.org).pdf', 'application/pdf', 'C:\\xampp\\tmp\\php4E04.tmp', '0', '7525122', '2022-08-28 5:04:31:PM', '2022-08-28 5:04:30:PM'),
(2, 'Universal principles of design 125 ways to enhance usability, influence perception, increase appeal, make better design decisions, and teach through design by William Lidwell, Kritina Holden, Jill But (z-lib.org).pdf', 'application/pdf', 'C:\\xampp\\tmp\\php4F2D.tmp', '0', '11941894', '2022-08-28 5:04:31:PM', '2022-08-28 5:04:30:PM'),
(3, 'Vue.Js Up and Running Building Accessible and Performant Web Apps by Callum Macrae (z-lib.org).pdf', 'application/pdf', 'C:\\xampp\\tmp\\php50E4.tmp', '0', '3569300', '2022-08-28 5:04:31:PM', '2022-08-28 5:04:31:PM');

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
(4, 'approved', 3, 1, '2022-08-28 05:06:10'),
(5, 'approved', 3, 4, '2022-08-28 05:07:22'),
(6, 'approved', 1, 4, '2022-08-28 05:07:41'),
(7, 'approved', 2, 4, '2022-08-28 05:07:48'),
(8, 'approved', 1, 1, '2022-08-28 05:08:39'),
(9, 'approved', 2, 1, '2022-08-28 05:08:50');

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
(1, 'Benjie', 'Edroso', 'benjieedroso@gmail.com', '$2y$10$h8/E1c4jqP.kWP42Zhn6POPDk9GvGZsUQkuDyvrM.Eg5X1woYs7Py', '2022-08-04', 'user'),
(2, 'Christ', 'Gil', 'christ@gmail.com', '$2y$10$0wX5UWAz2ifbJ6dn4CqhOeUyDOQLsWPTb2HESDpq4Tl031Y54kRA2', '2022-08-04', 'admin'),
(4, 'ronnel', 'dalisay', 'ronnel@gmail.com', '$2y$10$vuakl9CxCP/v1JYUNzZSJOWlPuvtkCaEI/tRhG0SWLQ00Ld2Vd10a', '2022-08-06', 'user');

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
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_id` (`file_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`file_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
