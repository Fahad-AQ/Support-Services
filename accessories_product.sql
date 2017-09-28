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
-- Table structure for table `accessories_product`
--

CREATE TABLE `accessories_product` (
  `accessories_product_id` int(50) NOT NULL,
  `accessories_product_name` varchar(500) NOT NULL,
  `accessories_product_code` int(50) DEFAULT NULL,
  `accessories_product_amount` int(50) DEFAULT NULL,
  `accessories_subcategory_id` int(50) NOT NULL,
  `accessories_category_id` int(50) NOT NULL,
  `accessories_product_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accessories_product`
--

INSERT INTO `accessories_product` (`accessories_product_id`, `accessories_product_name`, `accessories_product_code`, `accessories_product_amount`, `accessories_subcategory_id`, `accessories_category_id`, `accessories_product_status`) VALUES
(1, 'LG TONE TRIUMPH Bluetooth Stereo Headset - Black', 1, 0, 1, 1, 1),
(2, 'Boombotix Bass Station and Pro Speaker', 2, 0, 1, 2, 1),
(3, 'Boombotix REX Portable Bluetooth Speaker - Black', 3, 0, 1, 2, 1),
(4, 'PureGear Magnetic Car Mount with Vent Clip - Black', 4, 0, 1, 3, 1),
(5, 'Samsung Galaxy Amp 2 Prime Holster Combo Case - Red', 5, 0, 2, 4, 1),
(6, 'Galaxy Amp 2 Bolt Hybrid Case with Tempered Glass and Holster - Black', 6, 0, 2, 4, 1),
(7, 'BOLT Case for Samsung Galaxy Amp 2 (Gold/Black)', 7, 0, 2, 4, 1),
(8, 'Cricket Samsung Galaxy Amp 2 Black Folio Wallet', 8, 0, 2, 4, 1),
(9, 'Cricket Samsung Galaxy Amp 2 Black/Black PC Shield/Holster Combo with Screen Protector', 9, 0, 2, 4, 1),
(10, 'Cricket Samsung Galaxy Amp 2 Black/Red Double Injected Case with Screen Protector', 10, 0, 2, 4, 1),
(11, 'Cricket Samsung Galaxy Amp 2 Two-Tone Kickstand Shield with Screen Protector - Gray/Lime', 11, 0, 2, 4, 1),
(12, 'Cricket Samsung Galaxy Amp 2 Pink/Soft Pink Two-Tone Kickstand Case with Screen Protector', 12, 0, 2, 4, 1),
(13, 'Cricket Samsung Galaxy Amp 2 Soft Purple/Charcoal Two-Tone Kickstand Case with Screen Protector', 13, 0, 2, 4, 1),
(14, 'Cricket Samsung Galaxy Amp 2 Two-Tone Kickstand Shield with Screen Protector - Black/Gray', 14, 0, 2, 4, 1),
(15, 'BOLT Cover w- Glass SP, KickStand, Holster, Hook & Lanyard for Sonata 3 - BlackBlack', 15, 0, 3, 4, 1),
(16, 'BOLT Cover w- Glass SP, KickStand, Holster, Hook & Lanyard for Sonata 3 - RedBlack', 16, 0, 3, 4, 1),
(17, 'Cricket ZTE Sonata 3 Folio Wallet - Ash', 17, 0, 3, 4, 1),
(18, 'Cricket ZTE Sonata 3 Kickstand Shield/Holster Combo - Black', 18, 0, 3, 4, 1),
(19, 'Cricket ZTE Sonata 3 Kickstand Designer Shield with Screen Protector - Blue', 19, 0, 3, 4, 1),
(20, 'Cricket ZTE Sonata 3 Kickstand Designer Shield with Screen Protector - Pink', 20, 0, 3, 4, 1),
(21, 'Pouch/ Extra Large - Black', 21, 0, 4, 4, 1),
(22, 'PureGear DualTek Case - Black - iPhone 7', 22, 0, 5, 4, 1),
(23, 'PureGear DualTek Case - Matte Black - iPhone 7 Plus', 23, 0, 5, 4, 1),
(24, 'iPhone 7 ZIZO Bolt Case-Red/Black', 24, 0, 5, 4, 1),
(25, 'iPhone 7 ZIZO Bolt Case-Blue/Black', 25, 0, 5, 4, 1),
(26, 'iPhone 7 Plus ZIZO Bolt Case- Blue/Black', 26, 0, 5, 4, 1),
(27, 'iPhone 7 Plus ZIZO Bolt Case - Red/Black', 27, 0, 5, 4, 1),
(28, 'ZTE Grand X4 BOLT Cover w/ Glass SP, KickStand, Holster, Hook & Lanyard -?Red/Black', 28, 0, 6, 4, 1),
(29, 'ZTE Grand X4 BOLT Cover w/ Glass SP, KickStand, Holster, Hook & Lanyard -?Black/Black', 29, 0, 6, 4, 1),
(30, 'Cricket LG Fortune&trade; Pink/Clear Double Injected Case with screen protector', 30, 0, 7, 4, 1),
(31, 'Cricket LG Fortune&trade; Black Folio Wallet', 31, 0, 7, 4, 1),
(32, 'BOLT Cover w/ Edge-to-Edge Glass, KickStand, Holster, Hook & Lanyard for LG Fortune/Aristo - BlackBlack  ', 32, 0, 7, 4, 1),
(33, 'Cricket LG Harmony&trade; Clear/Blue Double Injected Case with Screen Protector', 33, 0, 8, 4, 1),
(34, 'Cricket LG Harmony&trade; Clear/Pink Double Injected Case with Screen Protector', 34, 0, 8, 4, 1),
(35, 'Cricket LG Harmony&trade; Black/Black Two-Piece Kickstand with Holster and Screen Protector', 35, 0, 8, 4, 1),
(36, 'Cricket Samsung Galaxy Amp Prime 2  Metallic Pink/Charcoal Two-Piece Kickstand Shield  with Screen Protector', 36, 0, 9, 4, 1),
(37, 'Cricket Samsung Galaxy Amp Prime 2 Black Wallet Folio', 37, 0, 9, 4, 1),
(38, 'Incipio Design Series Classic for Samsung Galaxy S8 - Pom Pom', 38, 0, 10, 4, 1),
(39, 'OtterBox Achiever Case - LG Fortune - Black', 39, 0, 7, 4, 1),
(40, 'OtterBox Achiever Case - LG Fortune - Water Store', 40, 0, 7, 4, 1),
(41, 'OtterBox Achiever Case - LG Fortune - Cool Plum', 41, 0, 7, 4, 1),
(42, 'Otterbox - Symmetry Series for Samsung Amp Prime 2 - BLACK 624', 42, 0, 11, 4, 1),
(43, 'Otterbox - Symmetry Series for Samsung Amp Prime 2 - SALTWATER TAFFY 624', 43, 0, 11, 4, 1),
(44, 'Otterbox Achiever case for LG Harmony/K20 Plus-Black', 44, 0, 8, 4, 1),
(45, 'Otterbox Achiever case for LG Harmony/K20 Plus-Water Stone', 45, 0, 8, 4, 1),
(46, 'Otterbox Achiever case for LG Harmony/K20 Plus-Cool Plum', 46, 0, 8, 4, 1),
(47, 'Otterbox - Defender Series for Samsung Galaxy S8 - Black 624 \r\n', 47, 0, 10, 4, 1),
(48, 'Cricket ZTE Blade&trade; X Max Black/Charcoal Folio Wallet', 48, 0, 12, 4, 1),
(49, 'Cricket ZTE Blade&trade; X Max Pink Yarrow/Plae Folio Wallet', 49, 0, 12, 4, 1),
(50, 'Cricket ZTE Blade&trade; X Max Metallic Gray/Charcoal Two-Piece Kickstand Shield', 50, 0, 12, 4, 1),
(51, 'Cricket ZTE Blade&trade; X Max Clear/ Purple Two-Tone Designer Shield', 51, 0, 12, 4, 1),
(52, 'Cricket ZTE Blade&trade; X Max Black/Black Two-Piece Kickstand with Holster', 52, 0, 12, 4, 1),
(53, 'Otterbox Achiever Case for LG Stylo 3 - Water Stone', 53, 0, 13, 4, 1),
(54, 'Otterbox Achiever Case for LG Stylo 3 - Cool Plum', 54, 0, 13, 4, 1),
(55, 'Cricket LG Stylo&trade; 3 Riverside PC/Black TPU with Kickstand and Screen Protector', 55, 0, 13, 4, 1),
(56, 'Cricket LG Stylo&trade; 3 Pink PC/Charcoal TPU with Kickstand and Screen Protector', 56, 0, 13, 4, 1),
(57, 'Cricket LG Stylo&trade; 3 Black PC/Black two-Piece Kickstand with Holster and Screen Protector', 57, 0, 13, 4, 1),
(58, 'Cricket LG Stylo&trade; 3 Black Folio Wallet', 58, 0, 13, 4, 1),
(59, 'Designer Shield with Removable & Reusable Glitter Insert - Pink', 59, 0, 13, 4, 1),
(60, 'Otterbox - Symmetry Series for Samsung J3 - Black', 60, 0, 9, 4, 1),
(61, 'Otterbox - Symmetry Series for Samsung J3 - Saltwater Taffy', 61, 0, 9, 4, 1),
(62, 'Cricket Samsung Galaxy Halo Blue PC/Charcoal TPU with Kickstand and Screen Protector', 62, 0, 11, 4, 1),
(63, 'Cricket Samsung Galaxy Halo Clear TPU/Rose Pink Metallic PC Accent with Screen Protector', 63, 0, 11, 4, 1),
(64, 'Cricket Samsung Galaxy Halo Black Folio Wallet', 64, 0, 11, 4, 1),
(65, 'Cricket Samsung Galaxy Halo Black PC/Black two-Piece Kickstand with Holster and Screen Protector', 65, 0, 11, 4, 1),
(66, 'Cricket HTC Desire 555 Clear TPU/Pink PC Accent with Screen Protector', 66, 0, 14, 4, 1),
(67, 'Cricket HTC Desire 555 Blue PC/Charcoal TPU with Kickstand and Screen Protector', 67, 0, 14, 4, 1),
(68, 'Cricket HTC Desire 555 Black/Gray Folio Wallet', 68, 0, 14, 4, 1),
(69, 'Cricket HTC Desire 555 Black PC/Black two-Piece Kickstand with Holster and Screen Protector', 69, 0, 14, 4, 1),
(70, 'LG Fortune Bolt Case w/Clip & Glass SP - Red/Black', 70, 0, 7, 4, 1),
(71, 'LG Fortune Bolt Case w/clip & Glass SP - Royal/Black', 71, 0, 7, 4, 1),
(72, 'Cricket Alcatel PULSEMIX Pink/Dark Pink Folio Wallet', 72, 0, 15, 4, 1),
(73, 'Cricket Alcatel PULSEMIX Black PC/Black two-Piece Kickstand with Holster and Screen Protector', 73, 0, 15, 4, 1),
(74, 'Cricket LG X Charge Clear/Pink Two-Tone Designer Shield with Screen Protector', 74, 0, 16, 4, 1),
(75, 'Cricket LG X Charge Black PC/Black two-Piece Kickstand with Holster and Screen Protector', 75, 0, 16, 4, 1),
(76, 'BOLT Cover w/ Glass SP for ZTE Blade X Max - Black/Black', 76, 0, 12, 4, 1),
(77, 'BOLT Cover w/ Glass SP for ZTE Blade X Max - Black/Red', 77, 0, 12, 4, 1),
(78, 'Alcatel PULSEMIX Smart Cover - SNAPBak LightUp', 78, 0, 15, 4, 1),
(79, 'Alcatel PULSEMIX Smart Cover - SNAPBak Sound', 79, 0, 15, 4, 1),
(80, 'Alcatel PULSEMIX Smart Cover - SNAPBak Power', 80, 0, 15, 4, 1),
(81, 'Cricket 2.4A Single Port Wall Charger w/USB Type-C Cable', 81, 0, 1, 5, 1),
(82, 'Cricket 3.4A Dual Port Wall Charger w/MicroUSB Cable', 82, 0, 1, 5, 1),
(83, 'Cricket 2.4 Single Port Car Charger with USB Type-C Cable', 83, 0, 1, 5, 1),
(84, 'Xentris 3.4A Dual Micro USB Vehicle Charger - Black/Red', 84, 0, 1, 5, 1),
(85, 'Quikcell PowerFUEL Extreme 5200mAh USB Portable Charger - White', 85, 0, 1, 6, 1),
(86, 'QuikCell Goof Proof Extreme Glass with perfect align frame for Samsung Galaxy Amp 2', 86, 0, 1, 7, 1),
(87, 'QuikCell Goof Proof Extreme Glass- Alcatel ONETOUCH IDOL 4', 87, 0, 1, 7, 1),
(88, 'Sonata 3 - Tempered Glass Screen Protector', 88, 0, 1, 7, 1),
(89, 'iPhone 7 - Quikcell GP Tempered Glass Screen Protector', 89, 0, 1, 7, 1),
(90, 'QuikCell Goof Proof Extreme Glass-Apple iPhone 7 Plus', 90, 0, 1, 7, 1),
(91, 'QuikCell Goof Proof Extreme Glass-LG LV5', 91, 0, 1, 7, 1),
(92, 'QuikCell Tempered Glass for Samsung Galaxy Amp Prime 2 and Samsung Galaxy J3 Prime-BLK \r\n', 92, 0, 1, 7, 1),
(93, 'QuikCell Curved Glass for Samsung Galaxy S8-Black ', 93, 0, 1, 7, 1),
(94, 'Edge-to-Edge Tempered Glass Screen Protector for LG Fortune ', 94, 0, 1, 7, 1),
(95, 'QuikCell Tempered Glass for Alcatel PULSEMIX', 95, 0, 1, 7, 1),
(96, 'QuikCell Tempered Glass for LG X Charge-Black', 96, 0, 1, 7, 1),
(97, 'Micro USB 4-Foot Charge/Sync  Xentris Cable - Black', 97, 0, 1, 8, 1),
(98, 'Quikcell Type-C Cable Hi-Speed USB 2.0 A/M to USB-C 10 FT - Gray', 98, 0, 1, 8, 1),
(99, 'Color Burst 3.5mm Coiled Auxiliary Cable - Black Ink', 99, 0, 1, 8, 1),
(100, 'PureGear, 4ft Lightning Round Cable - 360 degree SR ECN - White', 100, 0, 1, 8, 1),
(101, 'Cricket Type-C to USB Charge & Sync Data Cable - Black', 101, 0, 1, 8, 1),
(102, 'Apple Earphones', 102, 0, 1, 9, 1),
(103, 'Cricket alcatel STREAK Black/Black Two-Tone Kickstand Case with Screen Protector', 103, 0, 17, 4, 1),
(104, 'Cricket alcatel STREAK Pink/Black Two-Tone Kickstand Case with Screen Protector', 104, 0, 17, 4, 1),
(105, 'Cricket alcatel STREAK Blue/White Two-Tone Kickstand Case with Screen Protector', 105, 0, 17, 4, 1),
(106, 'A-Data 32GB Memory Cards w/ Adapter', 106, 0, 1, 10, 1),
(107, 'A-Data 16GB Memory Cards w/Adapter', 107, 0, 1, 10, 1),
(108, 'A-Data 8GB Memory Cards w/Adapter', 108, 0, 1, 10, 1),
(109, 'Cricket 3.4A Dual Port Car Charger with MicroUSB Cable', 109, 0, 1, 5, 1),
(110, 'Cricket alcatel STREAK Red/Gray Two-Tone Kickstand Case with Screen Protector', 110, 0, 17, 4, 1),
(111, 'Cricket ZTE Blade&trade; X Max Premium Screen Protector', 111, 0, 1, 7, 1),
(112, 'Cricket 2.4A Single Port Car Charger with Lightning Cable', 112, 0, 1, 5, 1),
(113, 'Cricket 2.4A Single Port Wall Charger with Lightning Cable', 113, 0, 1, 5, 1),
(114, 'Quikcell Goof Proof Extreme Glass - HTC Desire 555', 114, 0, 1, 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories_product`
--
ALTER TABLE `accessories_product`
  ADD PRIMARY KEY (`accessories_product_id`),
  ADD KEY `accessories_subCategory_id` (`accessories_subcategory_id`),
  ADD KEY `accessories_category_id` (`accessories_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories_product`
--
ALTER TABLE `accessories_product`
  MODIFY `accessories_product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
