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
-- Table structure for table `accessories_category`
--

CREATE TABLE `accessories_category` (
  `accessories_category_id` int(50) NOT NULL,
  `accessories_category_name` varchar(250) NOT NULL,
  `accessories_category_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accessories_category`
--

INSERT INTO `accessories_category` (`accessories_category_id`, `accessories_category_name`, `accessories_category_status`) VALUES
(1, 'Bluetooth Devices', 1),
(2, 'Bluetooth Speakers', 1),
(3, 'Car Mount', 1),
(4, 'Cases', 1),
(5, 'Chargers', 1),
(6, 'Portable Battery', 1),
(7, 'Screen Protectors', 1),
(8, 'Synchronize  Cables', 1),
(9, 'Wired Headphone', 1),
(10, 'Memory Cards', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories_category`
--
ALTER TABLE `accessories_category`
  ADD PRIMARY KEY (`accessories_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories_category`
--
ALTER TABLE `accessories_category`
  MODIFY `accessories_category_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
