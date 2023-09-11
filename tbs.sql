-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 04:05 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `shop` int(2) NOT NULL,
  `date` date NOT NULL,
  `slot` varchar(20) NOT NULL,
  `problem` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `feedback` varchar(255) DEFAULT NULL,
  `rating` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `phone`, `shop`, `date`, `slot`, `problem`, `status`, `feedback`, `rating`) VALUES
('16547588625997', '', 5, '2022-06-10', '11.00-11.30 AM', '0', 0, NULL, 5),
('16547589035560', '', 5, '2022-06-09', '07.30-08.00 PM', '0', 0, NULL, 4),
('16547591577118', '9861586668', 5, '2022-06-09', '08.30-09.00 PM', '0', 0, NULL, NULL),
('16547605627453', '9861586668', 5, '2022-06-08', '08.30-09.00 PM', '', 0, NULL, 3),
('16547605945913', '9861586668', 5, '2022-06-08', '08.30-09.00 PM', 'jdfkj jkf dskjf kjf hsdkjf skjf shkfj sdkjf sakjf sdkjf sdkjf jkhf shj fkj fkj fkjs fjks ', 0, NULL, NULL),
('16547606220345', '9861586668', 5, '2022-06-08', '08.30-09.00 PM', 'n4b4m5b54b5n665n6v56v546nbv6mnbv6n3v6n3bv6n3bv6n563bn6nb 6n v6n vn6 5nm mnmn3 vmn3 v', 0, NULL, NULL),
('16575566951117', '9861586668', 5, '2022-07-12', '08.30-09.00 PM', 'testing', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `query` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `query`, `message`, `datetime`) VALUES
(1, '', '', '', '', '', '2022-07-10 18:04:31'),
(2, 'Deepak Das', 'das.dpk@imail.com', '985308@a.c', 'About services', 'bnkjbhjh', '2022-07-10 18:08:24'),
(3, 'Alok Kumar Das', 'a@b.com', '1111111111', 'About TBS App', 'testing', '2022-07-11 21:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(2) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_desc` text,
  `service_image` varchar(100) DEFAULT NULL,
  `service_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_desc`, `service_image`, `service_status`) VALUES
(6, 'Bike Service', 'Book your service and save your time and money.', 'img/service/1652801635.jpg', 1),
(7, 'Car Service', 'Book your service and save your time and money.', 'img/service/1652801747.jpg', 1),
(8, 'Saloon Service', 'Book your service and save your time and money.', 'img/service/1652801772.jpg', 1),
(9, 'Electic Service', 'Book your service and save your time and money.', 'img/service/1652801800.jpg', 1),
(10, 'Plumber', 'Book your service and save your time and money.', 'img/service/1657560051.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `shop_id` int(2) NOT NULL,
  `shop_type` int(2) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `shop_phone` varchar(10) NOT NULL,
  `shop_email` varchar(100) DEFAULT NULL,
  `shop_address` text,
  `shop_photo` varchar(100) DEFAULT NULL,
  `shop_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`shop_id`, `shop_type`, `shop_name`, `shop_phone`, `shop_email`, `shop_address`, `shop_photo`, `shop_status`) VALUES
(4, 7, 'Car Shop-1', '1111111111', 'car1@gmail.com', 'CDA, Cuttack', 'img/shop/1652974851.jpg', 1),
(5, 8, 'Saloon Shop - 1', '2222222222', 'saloon1@gmail.com', 'Link Road, Cuttack', 'img/shop/1652974895.jpg', 1),
(6, 7, 'Car Shop-2', '2222222222', 'saloon1@gmail.com', 'Link Road, Cuttack', 'img/shop/1652974965.jpg', 1),
(7, 9, 'Electic Shop-1', '9999999999', 'a@b.com', 'address', 'img/shop/1652978253.jpg', 1),
(8, 7, 'car-1', 'car shop-1', 'a1@b.com', 'cda', 'img/shop/1657555805.jpg', 1),
(9, 7, 'car-10', '9999999999', 's@a.com', 'testing', 'img/shop/1657556833.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `phone` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` int(1) NOT NULL DEFAULT '1',
  `name` varchar(100) NOT NULL,
  `address` text,
  `email` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`phone`, `password`, `user_type`, `name`, `address`, `email`, `photo`) VALUES
('9853086668', 'c483f6ce851c9ecd9fb835ff7551737c', 1, 'user1', 'ctc', 'das.dpk1@imail.com', NULL),
('9861586668', 'c483f6ce851c9ecd9fb835ff7551737c', 1, 'Deepak Das', 'Cuttack', 'das.dpk@imail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `shop_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
