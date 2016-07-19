-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2016 at 11:58 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mano`
--

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE IF NOT EXISTS `system_users` (
  `id` int(3) NOT NULL,
  `user_firstname` varchar(100) DEFAULT NULL,
  `user_lastname` varchar(100) DEFAULT NULL,
  `user_username` varchar(100) DEFAULT NULL,
  `user_password` varchar(250) DEFAULT NULL,
  `user_gender` tinyint(3) DEFAULT NULL COMMENT '1-male, 2-female',
  `user_role` tinyint(3) DEFAULT NULL COMMENT '1-administrator, 2-accounting'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`id`, `user_firstname`, `user_lastname`, `user_username`, `user_password`, `user_gender`, `user_role`) VALUES
(1, 'John Robert', 'Jerodiaz', 'johnrobert', '$2y$10$WdnVQGNiMH3LBQIzt4Q/FOouFNFuz.2KVvXXAUnpu6SW3wcWUq56u', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_user_logs`
--

CREATE TABLE IF NOT EXISTS `system_user_logs` (
  `id` int(3) NOT NULL,
  `user_id` int(3) DEFAULT NULL,
  `user_token` varchar(200) DEFAULT NULL,
  `user_created` datetime DEFAULT NULL,
  `user_modified` datetime DEFAULT NULL,
  `user_lastlogin` datetime DEFAULT NULL,
  `user_lastlogout` datetime DEFAULT NULL,
  `user_flag` tinyint(3) DEFAULT '0' COMMENT '0-offline, 1-online',
  `user_status` tinyint(3) DEFAULT '1' COMMENT '0-disable, 1-enable'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_user_logs`
--

INSERT INTO `system_user_logs` (`id`, `user_id`, `user_token`, `user_created`, `user_modified`, `user_lastlogin`, `user_lastlogout`, `user_flag`, `user_status`) VALUES
(1, 1, 'rRptfFED3XkhA5Ut5TnQfIatiphWXjamrgNjtBETgcHHxnoOwYHRVl7TXkAxlhASj14vAVxvmOWun2JxPqUfslVI', '2016-07-19 08:30:16', NULL, '2016-07-19 09:52:30', NULL, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_user_logs`
--
ALTER TABLE `system_user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `system_user_logs`
--
ALTER TABLE `system_user_logs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
