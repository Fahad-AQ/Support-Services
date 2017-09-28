-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2017 at 12:01 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spl`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories_orderdetails`
--

CREATE TABLE `accessories_orderdetails` (
  `accessories_orderdetails_id` int(50) NOT NULL,
  `accessories_product_id` int(50) NOT NULL,
  `accessories_orderdetails_availableStock` varchar(250) NOT NULL,
  `accessories_orderdetails_requiredItems` varchar(250) NOT NULL,
  `financestatus_id` int(50) NOT NULL,
  `accessories_orderdetails_comment` varchar(250) NOT NULL,
  `accessories_order_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories_orderdetails`
--
ALTER TABLE `accessories_orderdetails`
  ADD PRIMARY KEY (`accessories_orderdetails_id`),
  ADD KEY `accessories_product_id` (`accessories_product_id`),
  ADD KEY `financestatus_id` (`financestatus_id`),
  ADD KEY `accessories_order_id` (`accessories_order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories_orderdetails`
--
ALTER TABLE `accessories_orderdetails`
  MODIFY `accessories_orderdetails_id` int(50) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
