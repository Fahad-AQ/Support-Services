-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2017 at 10:21 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `cm`
--

CREATE TABLE `cm` (
  `cm_id` int(50) NOT NULL,
  `cm_name` varchar(250) NOT NULL,
  `cm_email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cm`
--

INSERT INTO `cm` (`cm_id`, `cm_name`, `cm_email`) VALUES
(1, 'Muhammad Shoaib', 'mohammad_shoaib@mobilelinkusa.com'),
(2, 'NO CM', 'no_cm@mobilelinkusa.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(50) NOT NULL,
  `sd_id` int(50) NOT NULL,
  `tm_id` int(50) NOT NULL,
  `cm_id` int(50) NOT NULL,
  `emp_name` varchar(250) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_photo` varchar(500) DEFAULT NULL,
  `emp_adpId` int(50) NOT NULL,
  `role_id` int(50) NOT NULL,
  `store_id` int(50) NOT NULL,
  `emp_status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `sd_id`, `tm_id`, `cm_id`, `emp_name`, `emp_email`, `emp_photo`, `emp_adpId`, `role_id`, `store_id`, `emp_status`) VALUES
(1, 2, 2, 2, 'Fahad Ahmed Qureshi', 'fahad_ahmed@mobilelinkusa.com', 'https://lh5.googleusercontent.com/-DoF1qGQm2zs/AAAAAAAAAAI/AAAAAAAAAA4/inbonNTSlCA/s96-c/photo.jpg', 120513, 1, 378, '1'),
(2, 1, 1, 1, 'Muhammad Shabbir', 'muhammad_shabbir@mobilelinkusa.com', 'https://lh6.googleusercontent.com/-3IMdWSbjLh8/AAAAAAAAAAI/AAAAAAAAA00/LfabxYvprfs/s96-c/photo.jpg', 123232, 5, 128, '1'),
(3, 1, 1, 2, 'Muhammad Shoaib', 'mohammad_shoaib@mobilelinkusa.com', 'https://lh5.googleusercontent.com/-udvzTPEX7SA/AAAAAAAAAAI/AAAAAAAAADU/8ULF74z6VgE/s96-c/photo.jpg', 5625215, 4, 378, '1'),
(4, 1, 2, 1, 'Raja Ahsan', 'raja_ahsan@mobilelinkusa.com', NULL, 6535, 3, 378, '1');

-- --------------------------------------------------------

--
-- Table structure for table `financestatus`
--

CREATE TABLE `financestatus` (
  `financestatus_id` int(50) NOT NULL,
  `financestatus_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financestatus`
--

INSERT INTO `financestatus` (`financestatus_id`, `financestatus_name`) VALUES
(1, 'APPROVED'),
(2, 'NOT APPROVE'),
(3, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `market_id` int(50) NOT NULL,
  `market_name` varchar(250) NOT NULL,
  `market_status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`market_id`, `market_name`, `market_status`) VALUES
(1, 'Alabama', '1'),
(2, 'Albany', '1'),
(3, 'Arkansas', '1'),
(4, 'Austin', '1'),
(5, 'Chattanooga', '1'),
(6, 'Chicago', '1'),
(7, 'Connecticut', '1'),
(8, 'Corpus Christi', '1'),
(9, 'Florida', '1'),
(10, 'Georgia', '1'),
(11, 'Houston', '1'),
(12, 'Indiana', '1'),
(13, 'Iowa', '1'),
(14, 'Killeen', '1'),
(15, 'Knoxville', '1'),
(16, 'Laredo', '1'),
(17, 'Las Vegas', '1'),
(18, 'Louisiana', '1'),
(19, 'Maryland', '1'),
(20, 'Memphis', '1'),
(21, 'Michigan', '1'),
(22, 'Minnesota', '1'),
(23, 'Mississippi', '1'),
(24, 'Nashville', '1'),
(25, 'New York', '1'),
(26, 'North Carolina', '1'),
(27, 'Oklahoma', '1'),
(28, 'Philadelphia', '1'),
(29, 'Pittsburgh', '1'),
(30, 'Rhode Island', '1'),
(31, 'San Antonio', '1'),
(32, 'Shreveport', '1'),
(33, 'South Illinois', '1'),
(34, 'Tulsa', '1'),
(35, 'Upper Peninsula', '1'),
(36, 'Victoria', '1'),
(37, 'Virginia', '1'),
(38, 'West Texas', '1'),
(39, 'West Virginia', '1'),
(40, 'Wisconsin', '1'),
(41, 'NO Market', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderdetails_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `orderdetails_availableStock` varchar(250) NOT NULL,
  `orderdetails_requiredItems` varchar(250) NOT NULL,
  `financestatus_id` int(50) NOT NULL,
  `orderdetails_comment` varchar(250) NOT NULL,
  `order_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderdetails_id`, `product_id`, `orderdetails_availableStock`, `orderdetails_requiredItems`, `financestatus_id`, `orderdetails_comment`, `order_id`) VALUES
(1, 2, '1', '9', 3, 'qw', 1),
(2, 3, '2', '2', 3, 'qw', 1),
(3, 4, '2', '2', 3, 'qw', 1),
(4, 5, '1', '4', 3, 'qw', 1),
(5, 6, '2', '2', 3, 'qw', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(50) NOT NULL,
  `order_date` date NOT NULL,
  `emp_id` int(50) NOT NULL,
  `store_id` int(50) NOT NULL,
  `status_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `emp_id`, `store_id`, `status_id`) VALUES
(1, '2017-08-02', 2, 128, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(50) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_unit` varchar(250) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `product_isActive` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_unit`, `product_code`, `product_isActive`) VALUES
(1, 'Dell Toner C2660dn', '5-Pcs', '10258', '2'),
(2, 'Cannon Toner-126', '2-Pcs', '10275', '1'),
(3, 'Paper towels-2PLY', '30-Rolls\n', '10245', '1'),
(4, 'Bathroom Tissues-2PLY', '24-Rolls', '12055', '1'),
(5, 'Hand Santizer', '1-Small bottle', '103235', '1'),
(6, 'Hand soap', '1-Gallon', '102546', '1');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(50) NOT NULL,
  `role_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'ADMIN'),
(2, 'SD'),
(3, 'TM\n'),
(4, 'CM'),
(5, 'RSM\n'),
(6, 'ASM'),
(7, 'SS');

-- --------------------------------------------------------

--
-- Table structure for table `sd`
--

CREATE TABLE `sd` (
  `sd_id` int(50) NOT NULL,
  `sd_name` varchar(250) NOT NULL,
  `sd_email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sd`
--

INSERT INTO `sd` (`sd_id`, `sd_name`, `sd_email`) VALUES
(1, 'Shahbaz Ahmed', 'shahbaz_ahmed@mobilelinkusa.com'),
(2, 'No SD', 'no_sd@mobilelinkusa.com');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(50) NOT NULL,
  `status_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'PENDING'),
(2, 'INPROGRESS'),
(3, 'COMPLETED'),
(4, 'DECLINED');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `store_id` int(50) NOT NULL,
  `store_name` varchar(250) NOT NULL,
  `store_uId` int(50) NOT NULL,
  `market_id` int(50) NOT NULL,
  `store_status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`store_id`, `store_name`, `store_uId`, `market_id`, `store_status`) VALUES
(1, '10th Street', 70144727, 29, '1'),
(2, '12th Street', 70144731, 29, '1'),
(3, '2013 Broadway N', 70144457, 15, '1'),
(4, '31st St', 70144535, 34, '1'),
(5, '3rd Street', 70164610, 5, '1'),
(6, '61st ST', 70144283, 11, '1'),
(7, '8711 N Lamar', 70145356, 4, '1'),
(8, 'Abilene', 70144436, 38, '1'),
(9, 'Air Depot', 70143279, 27, '1'),
(10, 'Airline', 70144326, 11, '1'),
(11, 'Alcoa', 70164685, 15, '1'),
(12, 'Alexandria', 70144411, 18, '1'),
(13, 'Alief-clodine', 70144254, 11, '1'),
(14, 'ALTOONA', 70144632, 13, '1'),
(15, 'Amarillo', 70144456, 38, '1'),
(16, 'Ambassador Rd', 70144496, 18, '1'),
(17, 'Apache Mall', 70144563, 22, '1'),
(18, 'Appleton', 70144489, 40, '1'),
(19, 'Archer', 70155322, 6, '1'),
(20, 'Armitage', 70155303, 6, '1'),
(21, 'Asheboro', 70144428, 26, '1'),
(22, 'Ashland', 70144534, 6, '1'),
(23, 'Avent Ferry', 70158636, 26, '1'),
(24, 'Avenue Q', 70144437, 38, '1'),
(25, 'Ayers', 70150319, 8, '1'),
(26, 'Bandera', 70152327, 31, '1'),
(27, 'Bartlesville', 70144470, 34, '1'),
(28, 'Bastrop', 70145394, 4, '1'),
(29, 'Battlefield', 70164609, 5, '1'),
(30, 'Beckley', 70144493, 39, '1'),
(31, 'Bellaire', 70144331, 11, '1'),
(32, 'Belmont', 70155328, 6, '1'),
(33, 'Benton', 70153237, 3, '1'),
(34, 'Bloomington', 70144585, 22, '1'),
(35, 'Blue Diamond', 70159617, 17, '1'),
(36, 'Blytheville', 70164591, 20, '1'),
(37, 'Boutte', 70144576, 18, '1'),
(38, 'Brady', 70144612, 38, '1'),
(39, 'Brainerd', 70164598, 5, '1'),
(40, 'Braker Ln', 70145243, 4, '1'),
(41, 'Branch Blvd', 70144502, 37, '1'),
(42, 'Breaux Bridge', 70144668, 18, '1'),
(43, 'Breckenridge', 70144666, 38, '1'),
(44, 'Broadway', 70153307, 3, '1'),
(45, 'Broussard', 70144615, 18, '1'),
(46, 'Brownsville', 70144733, 29, '1'),
(47, 'Brownwood', 70144480, 38, '1'),
(48, 'Bryant', 70144641, 38, '1'),
(49, 'BUDA', 70145649, 4, '1'),
(50, 'Burgess', 70162270, 28, '1'),
(51, 'Burton', 70145273, 4, '1'),
(52, 'Cadillac', 70144634, 21, '1'),
(53, 'Camby', 70144530, 12, '1'),
(54, 'Cameron', 70145391, 4, '1'),
(55, 'Camp Creek', 70144540, 10, '1'),
(56, 'Carriage Center', 70155608, 33, '1'),
(57, 'Casselberry', 70144521, 9, '1'),
(58, 'Castroville', 70152281, 31, '1'),
(59, 'Catclaw', 70144515, 38, '1'),
(60, 'Central Ave', 70144445, 2, '1'),
(61, 'Champaign', 70155417, 33, '1'),
(62, 'Charleston', 70159340, 17, '1'),
(63, 'Cheektowaga', 70160626, 25, '1'),
(64, 'Chef Menteur', 70144574, 18, '1'),
(65, 'Childress', 70144629, 38, '1'),
(66, 'Church Street', 70158268, 26, '1'),
(67, 'Cicero', 70155348, 6, '1'),
(68, 'Clark', 70151311, 16, '1'),
(69, 'Clarksdale', 70164627, 20, '1'),
(70, 'Classen', 70143412, 27, '1'),
(71, 'Cleveland', 70164304, 20, '1'),
(72, 'Clinton Hwy', 70164618, 15, '1'),
(73, 'CLIVE', 70144642, 13, '1'),
(74, 'Columbus', 70144543, 12, '1'),
(75, 'Congress', 70145393, 4, '1'),
(76, 'Connersville', 70144682, 12, '1'),
(77, 'Conroe', 70144247, 11, '1'),
(78, 'Converse', 70152354, 31, '1'),
(79, 'Coon Rapids', 70144554, 22, '1'),
(80, 'Copperas Cove', 70145381, 14, '1'),
(81, 'Crawfordsville', 70144536, 12, '1'),
(82, 'Crossroad', 70158271, 26, '1'),
(83, 'Danville', 70155410, 33, '1'),
(84, 'Davis Ave', 70164592, 20, '1'),
(85, 'Decatur', 70144542, 33, '1'),
(86, 'Decatur Hwy 215', 70159704, 17, '1'),
(87, 'Del City', 70143602, 27, '1'),
(88, 'DeZavala', 70152335, 31, '1'),
(89, 'D\'Iberville', 70144578, 23, '1'),
(90, 'Dirksen', 70155483, 33, '1'),
(91, 'DollarWay', 70153376, 3, '1'),
(92, 'Donelson', 70144544, 24, '1'),
(93, 'Douglas', 70143359, 27, '1'),
(94, 'Durham', 70158267, 26, '1'),
(95, 'E Colonial', 70144522, 9, '1'),
(96, 'E Mason St', 70144623, 40, '1'),
(97, 'E Rancier', 70145382, 14, '1'),
(98, 'East Greenbush', 70144463, 2, '1'),
(99, 'East Vine St', 70144524, 9, '1'),
(100, 'Eastern Ave', 70144743, 29, '1'),
(101, 'Eastern Village', 70161253, 34, '1'),
(102, 'Eau Claire', 70144564, 40, '1'),
(103, 'Edgewood', 70144726, 29, '1'),
(104, 'Edmond', 70143594, 27, '1'),
(105, 'Elm Street', 70144566, 40, '1'),
(106, 'Empire Plaza', 70163383, 25, '1'),
(107, 'Enid', 70143699, 27, '1'),
(108, 'Escanaba', 70144651, 35, '1'),
(109, 'Evangeline', 70144485, 18, '1'),
(110, 'Evans', 70152275, 31, '1'),
(111, 'Evergreen Park', 70144539, 6, '1'),
(112, 'Flowery Branch', 70144479, 10, '1'),
(113, 'Fond Du Lac', 70144449, 40, '1'),
(114, 'Fort Smith', 70153478, 34, '1'),
(115, 'Forum', 70152287, 31, '1'),
(116, 'Franklin', 70144676, 37, '1'),
(117, 'Galewood Plaza', 70155500, 6, '1'),
(118, 'Galveston', 70144282, 11, '1'),
(119, 'Garnett', 70161241, 34, '1'),
(120, 'Gatesville', 70145646, 14, '1'),
(121, 'Gaylord', 70144621, 21, '1'),
(122, 'Gentilly', 70144573, 18, '1'),
(123, 'Gessner', 70144334, 11, '1'),
(124, 'Geyer Springs', 70153358, 3, '1'),
(125, 'Glenville', 70144689, 2, '1'),
(126, 'Graham', 70144635, 38, '1'),
(127, 'Greece', 70160669, 25, '1'),
(128, 'Greensburg', 70144620, 12, '1'),
(129, 'Greenwood', 70150265, 8, '1'),
(130, 'Gretna', 70144575, 18, '1'),
(131, 'Guilderland', 70144440, 2, '1'),
(132, 'Gulfport', 70144464, 23, '1'),
(133, 'Gunbarrel', 70164614, 5, '1'),
(134, 'Hamden', 70144508, 7, '1'),
(135, 'Hammond', 70144488, 18, '1'),
(136, 'Hanes Mill', 70158491, 26, '1'),
(137, 'Hardee Crossing', 70144672, 26, '1'),
(138, 'Harwood', 70155314, 6, '1'),
(139, 'Hastings', 70144558, 22, '1'),
(140, 'Henrietta', 70160474, 25, '1'),
(141, 'Hermitage Hills', 70164605, 24, '1'),
(142, 'Hidalgo', 70145420, 4, '1'),
(143, 'Highland', 70144406, 18, '1'),
(144, 'Highway 49', 70144687, 23, '1'),
(145, 'Hiram Clarke', 70144312, 11, '1'),
(146, 'Hitchcock', 70144737, 11, '1'),
(147, 'Houghton', 70144674, 35, '1'),
(148, 'Howard', 70155291, 6, '1'),
(149, 'Hudson', 70144481, 2, '1'),
(150, 'Huebner', 70152357, 31, '1'),
(151, 'Huffman Mill', 70144465, 26, '1'),
(152, 'Huntington', 70144548, 39, '1'),
(153, 'Hurricane', 70144495, 39, '1'),
(154, 'Hwy 215', 70164628, 15, '1'),
(155, 'Hwy 82', 70164590, 20, '1'),
(156, 'Independence Blvd', 70144622, 37, '1'),
(157, 'Indianola', 70164653, 20, '1'),
(158, 'Irwin', 70144730, 29, '1'),
(159, 'Jacaman', 70151677, 16, '1'),
(160, 'Jackson', 70144738, 11, '1'),
(161, 'JacksonAve', 70164294, 20, '1'),
(162, 'Johnston', 70144665, 30, '1'),
(163, 'Jonesboro', 70164415, 20, '1'),
(164, 'Kanawha City', 70144533, 39, '1'),
(165, 'Katy', 70144719, 11, '1'),
(166, 'KEMP', 70144472, 38, '1'),
(167, 'Kenner', 70144577, 18, '1'),
(168, 'King St', 70144460, 33, '1'),
(169, 'Kingsport', 70164498, 15, '1'),
(170, 'Kingston Plaza', 70144538, 2, '1'),
(171, 'Kissimmee', 70144523, 9, '1'),
(172, 'Kitty Hawk', 70152597, 31, '1'),
(173, 'Kyle', 70145593, 4, '1'),
(174, 'La Marque', 70144723, 11, '1'),
(175, 'La Place', 70144451, 18, '1'),
(176, 'Lakemead', 70159285, 17, '1'),
(177, 'Lamar Ave', 70164425, 20, '1'),
(178, 'LANCASTER', 70162306, 28, '1'),
(179, 'Lawndale', 70144343, 11, '1'),
(180, 'Lebanon', 70144519, 12, '1'),
(181, 'Lenoir City', 70164492, 15, '1'),
(182, 'Lincoln', 70144720, 29, '1'),
(183, 'Little Creek', 70144503, 37, '1'),
(184, 'Lockhart', 70145392, 4, '1'),
(185, 'Lombard', 70155309, 6, '1'),
(186, 'Lone Tree', 70150277, 36, '1'),
(187, 'Lyndale', 70144555, 22, '1'),
(188, 'MacArthur', 70143272, 27, '1'),
(189, 'Main Street', 70158274, 26, '1'),
(190, 'Manitowoc', 70144516, 40, '1'),
(191, 'Mansfield', 70144466, 32, '1'),
(192, 'Marinette', 70144644, 40, '1'),
(193, 'Marquette', 70144708, 35, '1'),
(194, 'MARRERO', 70144458, 18, '1'),
(195, 'Marshfield', 70144561, 40, '1'),
(196, 'Mason', 70144435, 40, '1'),
(197, 'Mattydale', 70163234, 25, '1'),
(198, 'McKees', 70144740, 29, '1'),
(199, 'McKnight', 70144724, 29, '1'),
(200, 'McPherson', 70151350, 16, '1'),
(201, 'Melrose', 70144448, 38, '1'),
(202, 'Meriden', 70144507, 7, '1'),
(203, 'Mesquite St', 70150289, 36, '1'),
(204, 'Middletown', 70144625, 7, '1'),
(205, 'Midland Trail', 70144673, 39, '1'),
(206, 'Miller Hill Mall', 70144567, 22, '1'),
(207, 'Mocksville', 70144441, 26, '1'),
(208, 'Monticello', 70144557, 22, '1'),
(209, 'Moore', 70143323, 27, '1'),
(210, 'Mount Hope', 70160266, 25, '1'),
(211, 'Mount Morris', 70144630, 21, '1'),
(212, 'Mount Pleasant', 70144587, 21, '1'),
(213, 'Mt. Juliet', 70164494, 24, '1'),
(214, 'Murfreesboro', 70164650, 24, '1'),
(215, 'Murphy', 70144717, 11, '1'),
(216, 'MUSTANG', 70144468, 27, '1'),
(217, 'Nashville', 70164497, 24, '1'),
(218, 'Navarro', 70150401, 36, '1'),
(219, 'NE23', 70143264, 27, '1'),
(220, 'Neenah', 70144434, 40, '1'),
(221, 'Neptune', 70144526, 9, '1'),
(222, 'New Bern', 70158400, 26, '1'),
(223, 'New Castle', 70144600, 12, '1'),
(224, 'New Haven', 70144511, 7, '1'),
(225, 'New London', 70144662, 40, '1'),
(226, 'New Semoran', 70144528, 9, '1'),
(227, 'New Tropicana', 70159473, 17, '1'),
(228, 'Newington', 70144510, 7, '1'),
(229, 'NewYork St', 70151352, 16, '1'),
(230, 'Niles', 70155396, 6, '1'),
(231, 'Norman', 70143375, 27, '1'),
(232, 'North Blvd', 70144655, 18, '1'),
(233, 'North Freeway', 70144537, 11, '1'),
(234, 'North Mall', 70144386, 37, '1'),
(235, 'North Mankato', 70144584, 22, '1'),
(236, 'North Market', 70144402, 18, '1'),
(237, 'North Versailles', 70144732, 29, '1'),
(238, 'Norwich', 70144506, 7, '1'),
(239, 'Oak Court', 70164588, 20, '1'),
(240, 'Oak Ridge', 70164484, 15, '1'),
(241, 'Oakwood Mall', 70144559, 40, '1'),
(242, 'Ocean Springs', 70144471, 23, '1'),
(243, 'Ogontz Ave', 70162638, 28, '1'),
(244, 'Okemos', 70144603, 21, '1'),
(245, 'OKMULGEE ST', 70161299, 34, '1'),
(246, 'Olive', 70153286, 3, '1'),
(247, 'Oneida', 70144455, 40, '1'),
(248, 'ORLEANS ST', 70161347, 34, '1'),
(249, 'Oshkosh', 70144429, 40, '1'),
(250, 'Outerpark', 70144461, 33, '1'),
(251, 'Pampa', 70144487, 38, '1'),
(252, 'Paragould', 70164409, 20, '1'),
(253, 'Park Lane', 70144518, 34, '1'),
(254, 'Park Manor', 70144722, 29, '1'),
(255, 'Park Ridge', 70144571, 40, '1'),
(256, 'Pascagoula', 70144427, 1, '1'),
(257, 'Pass Rd', 70144654, 23, '1'),
(258, 'Pat Booker', 70152339, 31, '1'),
(259, 'Peach St', 70144734, 29, '1'),
(260, 'Pearland', 70144296, 11, '1'),
(261, 'Pendleton Pike', 70144546, 12, '1'),
(262, 'Penn 39', 70143301, 27, '1'),
(263, 'Perkins Rd', 70164421, 20, '1'),
(264, 'Perrin Beitel', 70152355, 31, '1'),
(265, 'Perry', 70144721, 11, '1'),
(266, 'Perth Plaza', 70144433, 2, '1'),
(267, 'Pierson Rd', 70144648, 21, '1'),
(268, 'Pineville', 70144692, 18, '1'),
(269, 'Plaza Road', 70160670, 2, '1'),
(270, 'Pleasant Valley', 70145313, 4, '1'),
(271, 'Pleasanton Rd', 70152261, 31, '1'),
(272, 'Poinciana', 70144525, 9, '1'),
(273, 'Poole Rd', 70158395, 26, '1'),
(274, 'Poplar Ave', 70144432, 20, '1'),
(275, 'Port Lavaca', 70150258, 36, '1'),
(276, 'Poteet', 70152607, 31, '1'),
(277, 'Potranco', 70152363, 31, '1'),
(278, 'Powder Springs', 70144505, 10, '1'),
(279, 'Raleigh Blvd', 70158397, 26, '1'),
(280, 'Randleman', 70158659, 26, '1'),
(281, 'Renwick', 70144336, 11, '1'),
(282, 'Research Blvd', 70145257, 14, '1'),
(283, 'Rib Mountain', 70144586, 40, '1'),
(284, 'Ridge Rd', 70160346, 25, '1'),
(285, 'Rising Sun', 70162330, 28, '1'),
(286, 'River Hills Mall', 70144562, 22, '1'),
(287, 'Riverside Troy', 70144430, 2, '1'),
(288, 'Riverview', 70162240, 28, '1'),
(289, 'Roanoke Rapids', 70158681, 26, '1'),
(290, 'Robertsdale', 70144639, 1, '1'),
(291, 'Robinson Rd', 70153297, 3, '1'),
(292, 'Rocky Mount', 70144469, 26, '1'),
(293, 'Rosemount Market', 70144560, 22, '1'),
(294, 'Roxboro', 70158405, 26, '1'),
(295, 'Rundberg', 70145398, 4, '1'),
(296, 'Rutland', 70145388, 4, '1'),
(297, 'S. western', 70144438, 38, '1'),
(298, 'Salisbury', 70144675, 19, '1'),
(299, 'San Angelo East', 70144447, 38, '1'),
(300, 'San Dario', 70151325, 16, '1'),
(301, 'Saratoga', 70150332, 8, '1'),
(302, 'Sawdust (I-45)', 70144725, 11, '1'),
(303, 'Schofield', 70144553, 40, '1'),
(304, 'Searcy', 70153399, 3, '1'),
(305, 'Senatobia', 70164613, 20, '1'),
(306, 'Seymour', 70144545, 12, '1'),
(307, 'Sheboygan', 70144477, 40, '1'),
(308, 'Sheridan', 70161259, 34, '1'),
(309, 'Sherman', 70143499, 38, '1'),
(310, 'Siegen Ln', 70144454, 18, '1'),
(311, 'South Ave', 70163249, 25, '1'),
(312, 'South Park', 70152278, 31, '1'),
(313, 'Southdale Mall', 70144565, 22, '1'),
(314, 'Spring Hill', 70164589, 24, '1'),
(315, 'Spring Lake Park', 70144580, 22, '1'),
(316, 'SPRINGDALE', 70145345, 4, '1'),
(317, 'Star Street', 70144582, 22, '1'),
(318, 'Stassney', 70145403, 4, '1'),
(319, 'State St', 70144444, 2, '1'),
(320, 'Stenton Ave', 70162637, 28, '1'),
(321, 'Summer Ave', 70164390, 20, '1'),
(322, 'Sunset Plaza', 70152377, 31, '1'),
(323, 'SW 29', 70143236, 27, '1'),
(324, 'SW 59', 70143251, 27, '1'),
(325, 'Tarboro', 70158678, 26, '1'),
(326, 'Taylorsville', 70158686, 26, '1'),
(327, 'Terrytown', 70144599, 18, '1'),
(328, 'Texarkana', 70153404, 18, '1'),
(329, 'Texas Blvd', 70144517, 18, '1'),
(330, 'Tidewater', 70144378, 37, '1'),
(331, 'Tillmans Corner', 70144645, 1, '1'),
(332, 'Town Center', 70144532, 10, '1'),
(333, 'Troy', 70144443, 2, '1'),
(334, 'Union', 70161317, 34, '1'),
(335, 'University Ave', 70153373, 3, '1'),
(336, 'Upper Darby', 70162482, 28, '1'),
(337, 'Uvalde', 70144329, 11, '1'),
(338, 'Van Roy', 70144552, 40, '1'),
(339, 'Vernon', 70144611, 38, '1'),
(340, 'Victory Blvd', 70144387, 37, '1'),
(341, 'Virginia Blvd', 70144384, 37, '1'),
(342, 'W Rancier', 70145379, 14, '1'),
(343, 'W28thAve', 70153280, 3, '1'),
(344, 'Waco', 70145633, 14, '1'),
(345, 'Wade Green', 70144504, 10, '1'),
(346, 'Walker Town', 70158260, 26, '1'),
(347, 'Waterford', 70144512, 7, '1'),
(348, 'Watkins', 70164423, 20, '1'),
(349, 'Waukee', 70144640, 13, '1'),
(350, 'Weber', 70150333, 8, '1'),
(351, 'Webster', 70144728, 11, '1'),
(352, 'Wentworth Ave', 70155419, 6, '1'),
(353, 'West Ave', 70152244, 31, '1'),
(354, 'West Division', 70144568, 22, '1'),
(355, 'West Fullerton', 70144501, 6, '1'),
(356, 'West Hartford', 70144667, 7, '1'),
(357, 'West Lafayette', 70144702, 12, '1'),
(358, 'West Memphis', 70164424, 20, '1'),
(359, 'West Oakland', 70144569, 22, '1'),
(360, 'West Sunset', 70153476, 34, '1'),
(361, 'Westernview', 70143413, 27, '1'),
(362, 'Westgate Plaza', 70144446, 2, '1'),
(363, 'Westheimer', 70144255, 11, '1'),
(364, 'White Oak', 70144736, 29, '1'),
(365, 'White Road', 70152263, 31, '1'),
(366, 'Wichita Falls', 70144431, 38, '1'),
(367, 'Wicker Park', 70164252, 6, '1'),
(368, 'Wilkinsburg', 70144735, 29, '1'),
(369, 'Williamston', 70158683, 26, '1'),
(370, 'Willow Springs', 70145380, 14, '1'),
(371, 'Wilmington', 70144718, 28, '1'),
(372, 'Wilson', 70144467, 26, '1'),
(373, 'Winchester Rd', 70164422, 20, '1'),
(374, 'Windmill', 70144527, 9, '1'),
(375, 'Wisconsin Rapids', 70144572, 40, '1'),
(376, 'Youree', 70144616, 32, '1'),
(377, 'Zapata', 70151338, 16, '1'),
(378, 'No Store', 0, 41, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tm`
--

CREATE TABLE `tm` (
  `tm_id` int(50) NOT NULL,
  `tm_name` varchar(250) NOT NULL,
  `tm_email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm`
--

INSERT INTO `tm` (`tm_id`, `tm_name`, `tm_email`) VALUES
(1, 'noman ansari', 'noman_ansari@mobilelinkusa.com'),
(2, 'NO TM', 'no_tm@mobilelinkusa.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cm`
--
ALTER TABLE `cm`
  ADD PRIMARY KEY (`cm_id`),
  ADD UNIQUE KEY `cm_email` (`cm_email`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_email` (`emp_email`),
  ADD KEY `emp_roleId` (`role_id`),
  ADD KEY `emp_storeId` (`store_id`),
  ADD KEY `sd_id` (`sd_id`),
  ADD KEY `tm_id` (`tm_id`),
  ADD KEY `cm_id` (`cm_id`);

--
-- Indexes for table `financestatus`
--
ALTER TABLE `financestatus`
  ADD PRIMARY KEY (`financestatus_id`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`market_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderdetails_id`),
  ADD KEY `orders_prdId` (`product_id`),
  ADD KEY `orders_financeStatusId` (`financestatus_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `od_userId` (`emp_id`),
  ADD KEY `od_status` (`status_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `prd_name` (`product_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sd`
--
ALTER TABLE `sd`
  ADD PRIMARY KEY (`sd_id`),
  ADD UNIQUE KEY `sd_email` (`sd_email`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_id`),
  ADD UNIQUE KEY `store_uId` (`store_uId`),
  ADD KEY `Market_Id` (`market_id`);

--
-- Indexes for table `tm`
--
ALTER TABLE `tm`
  ADD PRIMARY KEY (`tm_id`),
  ADD UNIQUE KEY `tm_email` (`tm_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cm`
--
ALTER TABLE `cm`
  MODIFY `cm_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `financestatus`
--
ALTER TABLE `financestatus`
  MODIFY `financestatus_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `market_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderdetails_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sd`
--
ALTER TABLE `sd`
  MODIFY `sd_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;
--
-- AUTO_INCREMENT for table `tm`
--
ALTER TABLE `tm`
  MODIFY `tm_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
