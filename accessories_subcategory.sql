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
-- Table structure for table `accessories_subcategory`
--

CREATE TABLE `accessories_subcategory` (
  `accessories_subcategory_id` int(50) NOT NULL,
  `accessories_subcategory_name` varchar(500) NOT NULL,
  `accessories_category_id` int(50) NOT NULL,
  `accessories_subcategory_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accessories_subcategory`
--

INSERT INTO `accessories_subcategory` (`accessories_subcategory_id`, `accessories_subcategory_name`, `accessories_category_id`, `accessories_subcategory_status`) VALUES
(1, 'No Sub-Category', 1, 1),
(2, 'Galaxy Amp 2 Accessories', 4, 1),
(3, 'Sonata 3 Accessories', 4, 1),
(4, 'Holiday_Pouch', 4, 1),
(5, 'iPhone 7/7 Plus Accessories', 4, 1),
(6, 'ZTE Grand&trade; X 4 Accessories', 4, 1),
(7, 'LG Fortune&trade; Accessories', 4, 1),
(8, ' LG Harmony&trade; Accessories', 4, 1),
(9, 'Galaxy Amp Prime 2 Accessories', 4, 1),
(10, 'Samsung Galaxy S8 Accessories', 4, 1),
(11, 'Samsung Galaxy Halo Accessories', 4, 1),
(12, 'ZTE Blade&trade; X Max Accessories', 4, 1),
(13, 'LG Stylo 3 Accessories', 4, 1),
(14, 'HTC 555 Accessories', 4, 1),
(15, 'Alcatel PULSEMIX Accessories', 4, 1),
(16, 'LG X Charge Accessories', 4, 1),
(17, 'Alcatel Streak Accessories', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories_subcategory`
--
ALTER TABLE `accessories_subcategory`
  ADD PRIMARY KEY (`accessories_subcategory_id`),
  ADD KEY `accessories_category_id` (`accessories_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories_subcategory`
--
ALTER TABLE `accessories_subcategory`
  MODIFY `accessories_subcategory_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
