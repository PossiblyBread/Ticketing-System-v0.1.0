-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 03:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `hd_departments`
--

CREATE TABLE `hd_departments` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hd_departments`
--

INSERT INTO `hd_departments` (`id`, `name`, `status`) VALUES
(8, 'P1', 1),
(10, 'P2', 1),
(12, 'P3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hd_sla`
--

CREATE TABLE `hd_sla` (
  `id` int(255) NOT NULL,
  `severity` varchar(255) NOT NULL,
  `respond_within` varchar(255) NOT NULL,
  `resolve_within` varchar(255) NOT NULL,
  `operational_hours` varchar(255) NOT NULL,
  `escalation_severity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hd_tickets`
--

CREATE TABLE `hd_tickets` (
  `id` int(11) NOT NULL,
  `uniqid` varchar(20) NOT NULL,
  `user` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `init_msg` text NOT NULL,
  `department` int(11) NOT NULL,
  `date` varchar(250) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `last_reply` int(11) NOT NULL,
  `user_read` int(11) NOT NULL,
  `admin_read` int(11) NOT NULL,
  `resolved` int(11) NOT NULL,
  `assigned_group` varchar(255) NOT NULL,
  `username2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hd_tickets`
--

INSERT INTO `hd_tickets` (`id`, `uniqid`, `user`, `title`, `init_msg`, `department`, `date`, `date_created`, `last_reply`, `user_read`, `admin_read`, `resolved`, `assigned_group`, `username2`) VALUES
(12, '659ae21fc88a4', 2, 'PHENDONG', 'PHENDONG', 8, '1704649247', '', 1, 1, 1, 0, '', ''),
(13, '659ea92f0ef4f', 2, 'saddsaadsadsasd', 'saddsaadsadsasd', 8, '1704896815', '', 1, 1, 1, 0, '', ''),
(14, '65a110edadbe7', 1, 'New Report', 'New Report', 12, '1705054445', '1705054445', 1, 0, 1, 0, '', ''),
(15, '65a1112742586', 1, 'hello world', 'hello world', 8, '1705054503', '1705054503', 1, 0, 1, 0, '', ''),
(16, '65a1119af37de', 1, 'New Report12', 'New Report12', 8, '1705054618', '1705054618', 1, 0, 1, 0, '', ''),
(17, '65a1d07901c34', 1, 'New Error ', 'New Error ', 8, '1705103481', '1705103481', 1, 0, 0, 0, '', ''),
(18, '65a1d2aad62c6', 1, 'New Error ', 'New Error ', 8, '1705104042', '1705104042', 1, 0, 0, 0, '', ''),
(19, '65a1d2bde633c', 1, 'New Error 1001', 'New Error 1001', 10, '1705104061', '1705104061', 1, 0, 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hd_ticket_replies`
--

CREATE TABLE `hd_ticket_replies` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `text` text NOT NULL,
  `ticket_id` text NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hd_ticket_replies`
--

INSERT INTO `hd_ticket_replies` (`id`, `user`, `text`, `ticket_id`, `date`) VALUES
(14, 1, 'hello', '14', '1705087216');

-- --------------------------------------------------------

--
-- Table structure for table `hd_users`
--

CREATE TABLE `hd_users` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(250) NOT NULL,
  `user_type` enum('admin','L-1','L-2','L-3') NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hd_users`
--

INSERT INTO `hd_users` (`id`, `email`, `password`, `create_date`, `name`, `user_type`, `status`) VALUES
(1, 'admin@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', '2021-10-25 23:24:33', 'Admin', 'admin', 1),
(43, 'fakersenpai014@gmail.com', '$2y$10$O/uBBsbl7tZou/Aq1xL/SOkLGsKUNqIGvTU83SsCwqF83ymmTDlOe', '2023-12-16 14:26:56', 'mike', 'L-3', 1),
(44, 'mike@gmail.com', '$2y$10$8Ceq6jsyPCMOd2r9X9tLv.tKU9m/CR40MEfip0kCMHKW7lGqdWJ2i', '2023-12-16 14:27:40', 'Mike', 'L-2', 1),
(46, 'itguy1@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-01-12 22:23:20', 'IT guy1', 'L-2', 1),
(48, 'itguy2@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-01-12 22:29:52', 'IT guy2', 'L-1', 1),
(49, 'itguy3@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-01-13 04:23:15', 'IT guy3', 'L-1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hd_departments`
--
ALTER TABLE `hd_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hd_sla`
--
ALTER TABLE `hd_sla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hd_tickets`
--
ALTER TABLE `hd_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hd_ticket_replies`
--
ALTER TABLE `hd_ticket_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hd_users`
--
ALTER TABLE `hd_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hd_departments`
--
ALTER TABLE `hd_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hd_sla`
--
ALTER TABLE `hd_sla`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hd_tickets`
--
ALTER TABLE `hd_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hd_ticket_replies`
--
ALTER TABLE `hd_ticket_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hd_users`
--
ALTER TABLE `hd_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
