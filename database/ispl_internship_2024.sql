-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2024 at 10:19 AM
-- Server version: 11.3.1-MariaDB
-- PHP Version: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ispl_internship_2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `contact_number` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_datetime` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_datetime` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `contact_number`, `dob`, `doj`, `email_id`, `password`, `created_datetime`, `created_by`, `updated_datetime`, `updated_by`, `status`) VALUES
(3, 'Dinesh', 'Sharma', '999999999', NULL, NULL, 'dinesh@gmail.com', '9c9f1c65b1dc1f79498c9f09eb610e1a', '2024-06-26 15:16:59', 1, '2024-06-26 15:16:59', 1, 'Active'),
(4, 'Rachel', 'Huber', '482', '1979-09-08', '2017-11-07', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', '2024-06-27 00:00:00', 3, '2024-06-27 00:00:00', 3, 'Active'),
(5, 'Rachel', 'Huber', '482', '1979-09-08', '2017-11-07', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', '2024-06-27 00:00:00', 3, '2024-06-27 00:00:00', 3, 'Active'),
(6, 'kumar', 'shah', '672', '1986-04-13', '1979-08-13', 'wybemefihe@mailinator.com', 'd9f4a4a41f8b47681ea01b361c662bed', '2024-06-27 00:00:00', 3, '2024-06-27 00:00:00', 3, 'Active'),
(7, 'Ava', 'Daniel', '666', '1993-12-01', '1990-03-01', 'calazox@mailinator.com', '1f24e8be0f72d3604ab92efb548f6a67', '2024-06-27 00:00:00', 3, '2024-06-27 00:00:00', 3, 'Active'),
(8, 'Kellie', 'Hardin', '133', '1976-01-13', '1989-04-09', 'beqihuj@mailinator.com', '4353cf46d9bef762315491e4e54d4850', '2024-06-28 00:00:00', 3, '2024-06-28 00:00:00', 3, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
