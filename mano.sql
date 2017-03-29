-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2017 at 12:24 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mano`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(100) NOT NULL,
  `admin_firstname` varchar(200) NOT NULL,
  `admin_lastname` varchar(200) NOT NULL,
  `admin_username` varchar(150) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(250) NOT NULL,
  `admin_gender` tinyint(3) NOT NULL,
  `admin_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `admin_firstname`, `admin_lastname`, `admin_username`, `admin_email`, `admin_password`, `admin_gender`, `admin_image`) VALUES
(4, 'John Robert', 'Jerodiaz', 'admin', 'johnrobertjerodiaz@gmail.com', '9df7a7314e3884b26222e2ccd834aa24', 1, '15027868_194772600981103_2277019694430465798_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_logs`
--

CREATE TABLE `admin_user_logs` (
  `id` int(100) NOT NULL,
  `admin_token` varchar(250) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `admin_created` date NOT NULL,
  `admin_modified` date NOT NULL,
  `admin_last_login` date NOT NULL,
  `admin_last_logout` date NOT NULL,
  `admin_status` tinyint(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_user_logs`
--

INSERT INTO `admin_user_logs` (`id`, `admin_token`, `admin_id`, `admin_created`, `admin_modified`, `admin_last_login`, `admin_last_logout`, `admin_status`) VALUES
(2, '4ZN2EKvds77ok4Ry6Hp1aycbiJK54OQ8NDbsoGFQOMf8R6HXO6YYFbaYVU3ZIU7wxjYWZDNNq2Wh8EfXLeVrp5pk', 4, '2017-03-27', '2017-03-29', '2017-03-29', '2017-03-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(100) NOT NULL,
  `employee_firstname` varchar(100) NOT NULL,
  `employee_lastname` varchar(100) NOT NULL,
  `employee_address` varchar(200) NOT NULL,
  `employee_gender` tinyint(3) NOT NULL,
  `employee_date_created` date NOT NULL,
  `employee_date_modified` date NOT NULL,
  `employee_status` tinyint(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_firstname`, `employee_lastname`, `employee_address`, `employee_gender`, `employee_date_created`, `employee_date_modified`, `employee_status`) VALUES
(1, 'Grazelle', 'Villaso', 'Tapon Canayahon Ronda Cebu', 2, '2017-03-29', '0000-00-00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user_logs`
--
ALTER TABLE `admin_user_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `admin_user_logs`
--
ALTER TABLE `admin_user_logs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;