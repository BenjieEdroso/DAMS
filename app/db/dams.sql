-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 03:09 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

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
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(256) NOT NULL,
  `file_type` varchar(256) NOT NULL,
  `file_tmpName` varchar(256) NOT NULL,
  `file_error` int(1) NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`file_id`, `file_name`, `file_type`, `file_tmpName`, `file_error`, `file_size`, `file_date`) VALUES
(1, 'Emerging Trends in BPO.pptx', 'application/octet-stream', 'C:\\xampp\\tmp\\php5D6A.tmp', 0, 2081198, '2021-09-27 03:07:09'),
(2, 'CCTS_Card.pdf', 'application/pdf', 'C:\\xampp\\tmp\\php8C5B.tmp', 0, 103957, '2021-09-27 03:07:21'),
(3, 'doc.pdf', 'application/pdf', 'C:\\xampp\\tmp\\phpF51B.tmp', 0, 109025, '2021-09-27 03:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'test1', '$2y$10$iwDWF3wHmq5ZmgsPUn/KPeETWlH3EVbMFFIN4zf.yPP2TkW2nMPoW'),
(2, 'test2', '$2y$10$a2VeuKLIr4nUva29yn4DvuZ6fdSqWemhpE2HopXQ/hBPDL1tBC.Sq'),
(3, 'test3', '$2y$10$vsBrP/wRZF9o8IFR/nbmKOn3zgouFVsLPoOvEiDwLBuJVRYEFfegy'),
(4, 'BenjieEdroso', '$2y$10$1R47mjZ1MUKVwwHvJ7T1O.a.v7dgk6dt27UZiDqFumU0MFHsvb/dy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
