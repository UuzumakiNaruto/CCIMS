-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2018 at 02:22 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_db`
--
CREATE DATABASE IF NOT EXISTS `ccdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ccdb`;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `departmentName`) VALUES
( 'Computer'),
('Electronics'),
( 'Hostel');

-- --------------------------------------------------------

--
-- Table structure for table `issued`
--

CREATE TABLE `issued` (
  `id` int(100) NOT NULL,
  `timing` date NOT NULL,
  `description` varchar(240) NOT NULL,
  `category` varchar(14) NOT NULL,
  `name` varchar(100) NOT NULL,
  `issued` int(10) NOT NULL,
  `inventory` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issued`
--

INSERT INTO `issued` (`id`, `timing`, `description`, `category`, `name`, `issued`, `inventory`) VALUES
(1, '2018-07-26', '', 'Laptop', 'aman', 20, 'Equipment'),
(5, '2018-09-05', '', 'Transistors', '', 12, 'Consumable');

-- --------------------------------------------------------

--
-- Table structure for table `items_objects`
--

CREATE TABLE `items_objects` (
  `id` int(100) NOT NULL,
  `item` varchar(150) NOT NULL,
  `inventory` varchar(150) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_objects`
--

INSERT INTO `items_objects` (`id`, `item`, `unit`, `inventory`, `balance`) VALUES--done edit
(1, 'LAPTOP',  'Equipment', 537),
(6, 'ROUTERS', 'Equipment', 0),
(8, 'LAN WIRE',  'Equipment', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE `purchased` (
  `s.no` int(100) NOT NULL AUTO_INCREMENT;   ---purchased table final
  `id` int(100) NOT NULL,
  `purchasedate` date NOT NULL,
  `category` varchar(100),
  `quantity` decimal(6,2),
  `cost` decimal float NOT NULL,
  `unit` varchar(10),
  `tax` varchar(10) NOT NULL,
  `taxableValue` float NOT NULL,
  `billno` int(10) NOT NULL,
  `supplier` varchar(240) NOT NULL,
  `dateofsupply` date NOT NULL,
  `inventory` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`id`, `purchasedate`,`desc`, `quantity`, `cost`,`unit`, `tax`, `taxableValue`, `billno`, `supplier`, `dateofsupply`,`inventory`) VALUES
(1247,'2019-01-19','Laptop',2,'pcs'118000,18,13131,'krishna sales','2019-10-12'),
(1227,'2019-09-19','Laptop',2,'box',118000,18,13131,'krishna sales','2019-10-12');
;

-- --------------------------------------------------------

--
-- Table structure for table `scheme`
--

--
-- Dumping data for table `scheme`
--



-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `supplier` varchar(30) NOT NULL,
  `supplier` text NOT NULL,
  `supplierAddress` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplierName`, `supplierDeal`, `supplierAddress`) VALUES
(3, 'gk mech', '', 'daba road, ludhiana'),
(4, '', '', ''),
(5, '', '', ''),
(6, '', '', ''),
(7, '', '', ''),
(8, '', '', ''),
(9, '', '', ''),
(10, '', '', ''),
(11, '', '', ''),
(12, '', '', ''),
(13, '', '', ''),
(14, '', '', ''),
(15, 'ANYTHING', '', 'ANYWHERE\r\n'),
(16, 'ANYTHING', '', 'ANYWHERE\r\n'),
(17, 'ANYTHING', '', 'ANYWHERE\r\n'),
(18, 'ANYTHING', '', 'ANYWHERE\r\n'),
(19, 'ADMIN', 'CELING', 'ANYWHERE          '),
(20, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(21, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(22, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(23, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(24, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(25, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(26, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(27, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(28, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(29, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(30, '', '', ''),
(31, '', '', '\r\n          ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departmentName` (`departmentName`);

--
-- Indexes for table `issued`
--
ALTER TABLE `issued`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_objects`
--
ALTER TABLE `items_objects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item` (`item`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheme`


--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `issued`
--
ALTER TABLE `issued`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items_objects`
--
ALTER TABLE `items_objects`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `scheme`


--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
