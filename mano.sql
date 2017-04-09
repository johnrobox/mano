-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 04:38 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `admin_firstname` varchar(200) NOT NULL,
  `admin_lastname` varchar(200) NOT NULL,
  `admin_username` varchar(150) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(250) NOT NULL,
  `admin_gender` tinyint(3) NOT NULL,
  `admin_image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `admin_firstname`, `admin_lastname`, `admin_username`, `admin_email`, `admin_password`, `admin_gender`, `admin_image`) VALUES
(4, 'John Robert', 'Jerodiaz', 'admin', 'johnrobertjerodiaz@gmail.com', '9df7a7314e3884b26222e2ccd834aa24', 1, '15027868_194772600981103_2277019694430465798_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_logs`
--

CREATE TABLE IF NOT EXISTS `admin_user_logs` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `admin_token` varchar(250) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `admin_created` date NOT NULL,
  `admin_modified` date NOT NULL,
  `admin_last_login` date NOT NULL,
  `admin_last_logout` date NOT NULL,
  `admin_status` tinyint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_user_logs`
--

INSERT INTO `admin_user_logs` (`id`, `admin_token`, `admin_id`, `admin_created`, `admin_modified`, `admin_last_login`, `admin_last_logout`, `admin_status`) VALUES
(2, 'OW5FgfeJoglSG7FW5nUh58iJEZwEf3QSPTWJTC45nOVhMzJ92vc2EGzMAJxKhHlLJdGaomMPfJn4KpFJS1na6CJd', 4, '2017-03-27', '2017-03-29', '2017-04-08', '2017-04-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cashiers`
--

CREATE TABLE IF NOT EXISTS `cashiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cashier_firstname` varchar(100) NOT NULL,
  `cashier_lastname` varchar(100) NOT NULL,
  `cashier_username` varchar(100) NOT NULL,
  `cashier_password` varchar(100) NOT NULL,
  `cashier_address` varchar(250) NOT NULL,
  `cashier_gender` tinyint(3) NOT NULL,
  `cashier_created` datetime NOT NULL,
  `cashier_modified` datetime NOT NULL,
  `cashier_status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '0-enable, 1-disable',
  `cashier_last_login` datetime NOT NULL,
  `cashier_last_logout` datetime NOT NULL,
  `cashier_token` varchar(100) NOT NULL,
  `cashier_login_status` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cashiers`
--

INSERT INTO `cashiers` (`id`, `cashier_firstname`, `cashier_lastname`, `cashier_username`, `cashier_password`, `cashier_address`, `cashier_gender`, `cashier_created`, `cashier_modified`, `cashier_status`, `cashier_last_login`, `cashier_last_logout`, `cashier_token`, `cashier_login_status`) VALUES
(1, 'Grazelle', 'Villaso', 'grazelle', 'wPJRvP', 'Makati City', 2, '2017-04-07 10:14:50', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(3, 'john robert', 'jerodiaz', 'johnrobert', 'OPeVun', 'Tapon Cansayahon Ronda Cebu', 1, '2017-04-08 06:38:18', '0000-00-00 00:00:00', 0, '2017-04-09 06:19:08', '2017-04-09 01:06:29', 'mLIpNuSh6Wbpa4dxjm3RnMj6IM4talVI5VZ1jwP8azygw4K7IswVAJrotlDLegFJbYDwcp9SC5iYgWFzvrmRazXz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `employee_firstname` varchar(100) NOT NULL,
  `employee_lastname` varchar(100) NOT NULL,
  `employee_address` varchar(200) NOT NULL,
  `employee_gender` tinyint(3) NOT NULL,
  `employee_date_created` date NOT NULL,
  `employee_date_modified` date NOT NULL,
  `employee_status` tinyint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_firstname`, `employee_lastname`, `employee_address`, `employee_gender`, `employee_date_created`, `employee_date_modified`, `employee_status`) VALUES
(1, 'Grazelle', 'Villaso', 'Tapon Canayahon Ronda Cebu', 2, '2017-03-29', '0000-00-00', 1),
(2, 'John Robert', 'Jerodiaz', 'Tapon Cansayahon Ronda Cebu', 1, '2017-04-01', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `product_price` double(65,2) NOT NULL,
  `product_sold_in` tinyint(5) NOT NULL,
  `product_quantity` int(100) NOT NULL,
  `product_size_number` int(100) NOT NULL,
  `product_size_measure` tinyint(5) NOT NULL,
  `product_created` datetime NOT NULL,
  `product_modified` datetime NOT NULL,
  `product_status` tinyint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_sold_in`, `product_quantity`, `product_size_number`, `product_size_measure`, `product_created`, `product_modified`, `product_status`) VALUES
(13, 'lansang', 3.00, 1, 5, 0, 0, '2017-04-08 09:05:10', '0000-00-00 00:00:00', 1),
(14, 'Tsinilas', 1.00, 3, 6, 5, 1, '2017-04-08 09:05:31', '0000-00-00 00:00:00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
