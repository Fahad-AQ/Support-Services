-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2017 at 05:40 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emp_review`
--

-- --------------------------------------------------------

--
-- Table structure for table `checklistcategory`
--

CREATE TABLE `checklistcategory` (
  `c_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checklistcategory`
--

INSERT INTO `checklistcategory` (`c_id`, `name`, `status`) VALUES
(1, 'Store Visit', 'active'),
(2, 'Quick Visit', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `depositdetails`
--

CREATE TABLE `depositdetails` (
  `d_id` int(11) NOT NULL,
  `srv_id` int(11) NOT NULL,
  `qs_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `saledate` date NOT NULL,
  `depositdate` date NOT NULL,
  `time` time NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depositdetails`
--

INSERT INTO `depositdetails` (`d_id`, `srv_id`, `qs_id`, `q_id`, `saledate`, `depositdate`, `time`, `amount`) VALUES
(1, 1, 1, 48, '0000-00-00', '0000-00-00', '00:00:00', 0),
(2, 1, 1, 48, '0000-00-00', '0000-00-00', '00:00:00', 0),
(3, 1, 1, 48, '2017-03-01', '2017-03-02', '00:10:00', 120),
(4, 1, 1, 48, '2017-03-01', '2017-03-02', '12:10:00', 200),
(5, 1, 1, 48, '0000-00-00', '0000-00-00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manager1x1questions`
--

CREATE TABLE `manager1x1questions` (
  `sq_id` int(11) NOT NULL,
  `questions` varchar(250) NOT NULL,
  `defaultcomponents` varchar(100) NOT NULL,
  `components` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager1x1questions`
--

INSERT INTO `manager1x1questions` (`sq_id`, `questions`, `defaultcomponents`, `components`, `cat_id`, `status`) VALUES
(1, 'Is the store fully staffed?', 'radio', 'textarea', 1, 'active'),
(2, 'Are employees fully trained?', 'radio', 'textarea', 1, 'active'),
(3, 'Are the employees using 6 steps with each guest?', 'radio', 'textarea', 1, 'active'),
(4, 'Are the employees maximizing sales with each guest?', 'radio', 'textarea', 1, 'active'),
(5, 'What can the manager do to improve the store sales?', 'textarea', 'none', 1, 'active'),
(6, 'What can manager do to improve bill pay conversion?', 'textarea', 'none', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `qst` text,
  `defaultcomponent` varchar(50) NOT NULL,
  `components` varchar(50) NOT NULL,
  `itemson` varchar(50) NOT NULL,
  `validation` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `qs_id` int(11) DEFAULT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `qst`, `defaultcomponent`, `components`, `itemson`, `validation`, `status`, `qs_id`, `cat_id`) VALUES
(1, 'Was the outside of the store free of debris?', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(2, 'Were the windows and door clean?', 'textarea', 'none', 'No', 'required', 'active', 1, 1),
(3, 'Was the door that leads from sales floor to the backroom closed?', 'dropdown', 'none', 'No', '', 'active', 1, 1),
(4, 'Was the retail radio playing / working ?', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(5, 'Are the employees present as per schedule?', 'radio', 'text', 'No', '', 'active', 1, 1),
(6, 'Was the chalkboard updated?', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(7, 'Were the advocates using clipboards? Check clipboards to make sure if they are updated', 'radio', 'number', 'No', 'required', 'active', 1, 1),
(8, 'Is the toilet / faucet in working condition? Notify real estate/facilities team if toilet / faucet is leaking or running water', 'radio', 'textarea', 'No', '', 'active', 1, 1),
(9, 'Is the store displaying (weekly special) item to generate extra GP?', 'radio', 'textarea', 'No', '', 'active', 1, 1),
(10, 'Are all accessory peg hooks equally spaced out looking neat and organized? Make sure all the high-end accessories are up on the floor', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(11, 'Does the store have adequate store supplies? Paper, toner, toiletry. If the store has extra inform store supplies', 'radio', 'textarea', 'No', '', 'active', 1, 1),
(12, 'Is the store is organized? Front / Backroom', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(13, 'Is employee pay plan posted in the back?', 'radio', 'file', 'Yes', 'required', 'active', 1, 1),
(14, 'Does the store have white board and has updated sales info?', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(15, 'Deezer demos are set-up and functioning?', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(16, 'Monthly Goal Tracker forms are being used and complete?', 'radio', 'file', 'No', 'required', 'active', 1, 1),
(17, 'Employee 101 being done by the Manager?', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(18, 'Ask the RSM 2 key questions on previous hoopla notes. Did the RSM answer your question correctly?', 'radio', 'textarea', 'No', '', 'active', 1, 1),
(19, 'Are the eligible advocates using cricket rewards app? And do they know how this program works and can drive retention?', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(20, 'Are the advocates able to recite the 6 selling steps', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(21, 'During the visit did you role play with atleast one advocate or manager', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(22, 'Are all required Federal & State Signs posted in the back room', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(23, 'Store has current sales tax certificate posted?', 'radio', 'textarea', 'No', '', 'active', 1, 1),
(24, 'Are all lights working on the sales floor?', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(25, 'Does the store have two week schedule? Manager / Assistant managers should not be working the same shift', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(26, 'Is the store following FIFO inventory procedures? Check to see if the phones are date stamped', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(27, 'Performed hard count advised by inventory and notified them so any variance can we received from their side, if any?', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(28, 'Any variance found during phone hard count?', 'radio', 'file', 'Yes', 'required', 'active', 1, 1),
(29, 'Store changing A/C filter every 2 month?', 'radio', 'textarea', 'No', '', 'active', 1, 1),
(30, 'Is the bathroom clean? Trash taken out daily, counters clean', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(31, 'Demo Loop playing on demo Handsets', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(32, 'Is the store upto Mobilelink standards and per Cricket Planogram?', 'radio', 'file', 'No', 'required', 'active', 1, 1),
(33, 'Is the Inventory storage / safe locked and secured when not in use?', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(34, 'Does the store have right accessories. Pls give details if you have any concerns', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(35, 'Demos are charged and secured with proper fixture?', 'radio', 'file', 'No', '', 'active', 1, 1),
(36, 'Perform hot counts advised by inventory and email the list to inventory department', 'radio', 'textarea', 'No', '', 'active', 1, 1),
(37, 'Is the store free of any pending PO over 5 days?', 'radio', 'file', 'No', '', 'active', 1, 1),
(38, 'Is the store free of transfer over 2 days?', 'radio', 'textarea', 'No', '', 'active', 1, 1),
(39, 'Is the store free of pending RMA at the store? If no, How many RMA are in store. Notify the inventory team', 'radio', 'textarea', 'No', '', 'active', 1, 1),
(40, 'Is the store free of rejected RMA? If no how many rejected RMA are in store', 'radio', 'textarea', 'No', '', 'active', 1, 1),
(41, 'Is the store free of clover shipment (2 days older or 5 phones)? Check the clover portal', 'radio', 'textarea', 'Yes', '', 'active', 1, 1),
(42, 'Are advocates clocking in and out for lunch breaks? (Check Rq4)', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(43, 'Check with advocates to see if anyone needs to correct their hours?', 'radio', 'textarea', 'Yes', '', 'active', 1, 1),
(44, 'How much of the change fund/petty cash is in the store', 'number', 'none', 'No', 'required', 'active', 1, 1),
(45, 'How many register in the store?', 'dropdown', 'none', 'Yes', 'required', 'active', 1, 1),
(46, 'Does each register have $100 cash?', 'radio', 'textarea', 'No', 'required', 'active', 1, 1),
(47, 'Was the deposits done before 10am? (Check previous 5 days deposit)', 'radio', 'textarea', 'No', '', 'active', 1, 1),
(48, 'Give details for 5 previous days deposit (Date and Time)', 'table', 'none', 'No', '', 'active', 1, 1),
(49, 'Are employees able to log in to RQ4?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(50, 'Do all employees have working Global ID?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(51, 'Did the rep offer multiple accessories?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(52, 'Can the reps talk about Group save, discuss different rate plan mixture', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(53, 'Can the sales rep talk about current promotions? Rebates, Phones that are on sale etc', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(54, 'When is the customer charged a $5 late fee?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(55, 'When is the customer charged a $15 reactivation fee?', 'textarea', 'none', 'No', '', 'active', 2, 1),
(56, 'Warranty/HPP/Cricket Protect - Who processes? How long does it take to get the phone, different ways to process?', 'textarea', 'none', 'No', 'required', 'active', 2, 1),
(57, 'Can employees talk about refund policy?', 'textarea', 'none', 'No', 'required', 'active', 2, 1),
(58, 'Can the sales rep discuss when to charge for sim cards and how much is it?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(59, 'Understands / communicates BYOD qualifications/process?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(60, 'Can employees talk about Deezer ? How many songs, how much is it a month, how long is the free trial what is their attachment rate', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(61, 'Can employees talk about how many countries are on international calling plan?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(62, 'What plans offer calling and texting to Mexico and Canada?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(63, 'What is the difference between Cricket International and Cricket International Extra?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(64, 'What are the conditions for Mexico Roaming?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(65, 'Can employees talk about HotSpot Requirement? Rate plan how much data they can use?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(66, 'If hotspot is added in the middle of the month how much is the prorated among?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(67, 'What is the maximum download speed allowed with hotspot? 8Mbps with 4G lte', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(68, 'Can a customer with BYOD use their phone for hotspot?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(69, 'Do employees know about their MTD numbers, GP trend ?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(70, 'Can employees tell you how much bonus they will be making based on their trend?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(71, 'Can employees talk about their Activation numbers?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(72, 'Can employees talk about their APO?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(73, 'Can the rep speak on how much GP is made on a new activation?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(74, 'Can the rep speak on how much GP is made on upgrade?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(75, 'Can the rep discuss how they calculate their daily goals?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(76, 'Does the manager know about their MTD number, GP trend his/her potential payout? Have them calcuate it to see if they know their pay structure', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(77, 'Can the manager talk about the store goal and the trend?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(78, 'Can the manager discuss the store APO? Current APO and what are they doing to increase it?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(79, 'Can the manager discuss the store KPI?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(80, 'Can the manager discuss their pay plan?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(81, 'Can the manager demonstrate how the daily goals are assigned for the store and employees?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(82, 'Was a Debit card ran as a Debit / Credit customers ID validated to before charging the card? Was the info entered in RQ4', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(83, 'Does the manager have any B2B appointment schedule ? check the calendar', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(84, 'Does the manager have any events lined up for the month?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(85, 'Did the rep greet the customer with excitement', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(86, 'Did the rep explained to the customer how the Value Sheet will be used?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(87, 'Did the rep ask what brought the customer in?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(88, 'Did the rep ask about their current carrier and how much are they paying?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(89, 'Did the rep ask about the likes/dislikes about their current phone, and what they want their new phone to do?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(90, 'Did the rep ask if the phone will be used for business / personal use?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(91, 'Did the rep create a conversation with the customer?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(92, 'Did the rep talk about cricket advantage? No contract, unlimited calling to Mexico and Canada, 4G LTE Nationwide network', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(93, 'Did the sales rep offer 2 phones to the customer that meets their need?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(94, 'Did the rep offer additional lines to the customer?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(95, 'Did the rep mention we could save customer money? Group Save Offered â€¦ 5 for $200 (Unlimited Plan) / 5 for $150 (Smart Plan)', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(96, 'Did the advocate fully describe the $70 unlimited plane', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(97, 'Recommend A Unlimited plan and explain the benefits? If a customer is coming from another carrier, employee MUST offer them trade up option', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(98, 'Clover - Was trade Up Offered', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(99, 'Did the rep effectively position AP?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(100, 'Did the rep effectively position Deezer?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(101, 'Did the rep effectively position Cricket Protect?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(102, 'Did the rep go over the agreed solution? Total walk out price and monthly bill', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(103, 'Did the sale rep ask the customer for the sale?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(104, 'Did the rep download Cricket wi-fi to the customers phones and install deezer music app?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(105, 'Did the rep offer to set up customers email address?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(106, 'Did the rep offered to transfer phone numbers to the new phones?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(107, 'Welcome Guides being used for all the activation/upgrade', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(108, 'Did the rep walk the customer to the door thanking them for their visit?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(109, 'Did the rep ask for referral?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(110, 'Did the rep inform the guest about a survey they will receive about the service?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(111, 'Did the rep position Deezer to the bill pay customer?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(112, 'Did the sales rep offer up-grade to bill payment customers?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(113, 'Did the rep offer ADD-A-LINE to bill payment customer?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(114, 'Did the rep offer accessories / weekly special to bill payment customers?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(115, 'Did the rep offer AP to bill payment customer?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(116, 'Did the rep ask for referral to the bill pay customer?', 'radio', 'textarea', 'No', '', 'active', 2, 1),
(117, 'Are employees using the value sheet / 6 steps with each guest who comes in for Activation / Upgrade?', 'radio', 'textarea', 'No', 'required', 'active', 2, 1),
(118, 'Are the employees wearing company approved uniform?', 'radio', 'textarea', 'No', 'required', 'active', 4, 2),
(119, 'Were the advocates using clipboards? Check clipboards to make sure it is updated', 'radio', 'textarea', 'No', 'required', 'active', 4, 2),
(120, 'Was the chalkboard updated? to generate extra GP?', 'radio', 'textarea', 'No', 'required', 'active', 4, 2),
(121, 'Is the store displaying weekly special/Bundle/Clearance items etc', 'radio', 'file', 'Yes', '', 'active', 4, 2),
(122, 'How many registers in the store, and does each register have $100 cash?', 'radio', 'textarea', 'No', 'required', 'active', 4, 2),
(123, 'Were the deposits done before 10am? (Check last 5 deposit slips)', 'radio', 'table', 'No', '', 'active', 4, 2),
(124, 'Does the store have white board and is it updated with correct information?', 'radio', 'textarea', 'No', 'required', 'active', 4, 2),
(125, 'Is the Inventory storage/safe locked and secured when not in use?', 'radio', 'textarea', 'No', 'required', 'active', 4, 2),
(126, 'Does the store have Petty cash?', 'radio', 'textarea', 'No', '', 'active', 4, 2),
(127, 'Is the store following FIFO inventory procedures? Check to see if the phones are dated', 'radio', 'file', 'Yes', '', 'active', 4, 2),
(128, 'Is the store free of clover shipment (2 days older or 5 phones)? Check the clover portal', 'dropdown', 'none', 'No', '', 'active', 4, 2),
(129, 'Verifying that the Monthly Goal Tracker forms are being used and complete?', 'radio', 'textarea', 'No', '', 'active', 4, 2),
(130, 'Can the advocate about Group save, discuss different rate plan mixture?', 'radio', 'textarea', 'No', 'required', 'active', 5, 2),
(131, 'Can the advocate talk about current promotions? Rebates, Phones that are on sale etc?', 'radio', 'textarea', 'No', 'required', 'active', 5, 2),
(132, 'Can advocate talk about Deezer? How many songs, how much is it a month, how long is the free trial what is their attach install rate', 'text', 'none', 'Yes', 'required', 'active', 5, 2),
(133, 'Can the advocate talk about Cricket Protect ? If so what is the KPI', 'radio', 'textarea', 'No', 'required', 'active', 5, 2),
(134, 'Can advocate talk about benefit of signing up for Auto Pay? (Discount, Uninterrupted Service, Retention etc)', 'radio', 'textarea', 'No', 'required', 'active', 5, 2),
(135, 'Role play with advocate. Can they effectively sell you a device with all the upgrades', 'radio', 'textarea', 'No', '', 'active', 5, 2),
(136, 'Can advocate talk about how GP is calculated on an activation and upgrade?', 'radio', 'textarea', 'No', 'required', 'active', 5, 2),
(137, 'Do advocates know about their MTD numbers? (Activations/Upgrades/APO GP earned vs GP trend etc)', 'radio', 'textarea', 'No', 'required', 'active', 5, 2),
(138, 'Can advocate talk about potential pay out based on their GP and KPI?', 'radio', 'textarea', 'No', 'required', 'active', 5, 2),
(139, 'Does the manager know about their Store MTD numbers (Activations/Upgrades/APO etc)?', 'radio', 'textarea', 'No', '', 'active', 5, 2),
(140, 'Can the manager talk about the store GP goal and the GP trend?', 'radio', 'textarea', 'No', 'required', 'active', 5, 2),
(141, 'Can the manager discuss the store KPI?', 'radio', 'textarea', 'No', '', 'active', 5, 2),
(142, 'Can the manager demonstrate how the daily goals are assigned for the store and employees?', 'radio', 'textarea', 'No', 'required', 'active', 5, 2),
(143, 'Does the manager and Advocates have clear understanding on Debit/Credit card transaction policy', 'radio', 'textarea', 'No', '', 'active', 5, 2),
(144, 'Does the manager have any events lined up for the month?', 'radio', 'textarea', 'No', 'required', 'active', 5, 2),
(145, 'Can Advocates and Manager recite the 6 steps / Going Extra Smile Process?', 'radio', 'textarea', 'No', 'required', 'active', 6, 2),
(146, 'Did TM observe the Advocates performing role play to gauge their understanding level on Value Sheet 6 Steps process and what steps manager needs to work on till next visit?', 'radio', 'textarea', 'No', '', 'active', 6, 2),
(147, 'Do the advocates understand how to maximize every bill pay opportunity (Asking for Add a Line/Upgrade/Accessory/Auto Bill Pay/Deezer / Cricket Protect etc)?', 'radio', 'textarea', 'No', 'required', 'active', 6, 2),
(148, ' ', 'none', 'manager1x1', '', '', 'inactive', 0, 0),
(149, NULL, 'none', 'quickmanager1x1', '', '', 'inactive', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questionssteps`
--

CREATE TABLE `questionssteps` (
  `qs_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionssteps`
--

INSERT INTO `questionssteps` (`qs_id`, `title`, `cat_id`, `status`) VALUES
(1, 'Store Operation', 1, 'active'),
(2, 'Knowledge 1x1', 1, 'active'),
(3, 'Manager 1x1', 1, 'active'),
(4, 'Quick Store Visit', 2, 'active'),
(5, 'Quick Knowledge 1x1', 2, 'active'),
(6, 'Quick Look Listen & Coach', 2, 'active'),
(7, 'Quick Manager 1x1', 2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `reg_id` int(11) NOT NULL,
  `srv_id` int(11) NOT NULL,
  `qs_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `registers` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`reg_id`, `srv_id`, `qs_id`, `q_id`, `registers`, `amount`) VALUES
(13, 1, 0, 45, 3, 300),
(14, 1, 0, 2, 3, 210),
(15, 1, 0, 2, 3, 310),
(16, 1, 0, 2, 3, 410),
(17, 1, 1, 3, 3, 45),
(18, 1, 1, 3, 3, 55),
(19, 1, 1, 3, 3, 65);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `r_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`r_id`, `name`, `code`) VALUES
(1, 'Admin', 'adm'),
(2, 'Senior Director', 'sd'),
(3, 'Territory Manager', 'tm'),
(4, 'Regional Sales Manager', 'rsm');

-- --------------------------------------------------------

--
-- Table structure for table `sddetails`
--

CREATE TABLE `sddetails` (
  `sd_id` int(11) NOT NULL,
  `sdname` varchar(100) NOT NULL,
  `sdemail` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sddetails`
--

INSERT INTO `sddetails` (`sd_id`, `sdname`, `sdemail`, `status`) VALUES
(1, 'Stacey Perez', 'sperez@mobilelinkusa.com', 'inactive'),
(2, 'Billy Nesbitt', 'billy@mobilelinkusa.com', 'active'),
(3, 'Sharlene Bell', 'sharlene.bell@mobilelinkusa.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `m_id` int(11) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`m_id`, `mname`, `status`) VALUES
(1, 'Houston', 'active'),
(2, 'Austin', 'inactive'),
(3, 'San Antonio', 'active'),
(4, 'Laredo', 'active'),
(5, 'Corpus Christi', 'active'),
(6, 'North Carolina', 'active'),
(7, 'Colorado', 'inactive'),
(8, 'Nevada', 'inactive'),
(9, 'Oklahoma City', 'active'),
(10, 'Tulsa', 'active'),
(11, 'Chicago', 'active'),
(12, 'Philadelphia', 'active'),
(13, 'Rochester', 'inactive'),
(15, 'Arkansas', 'active'),
(16, 'Tennessee', 'inactive'),
(17, 'Las Vegas', 'active'),
(20, 'Victoria', 'active'),
(21, 'Killeen', 'active'),
(22, 'Memphis', 'active'),
(23, 'Albany', ''),
(24, 'Virginia', ''),
(25, 'New York', ''),
(26, 'Lousiana ', ''),
(27, 'Knoxville\n', ''),
(28, 'West Texas ', ''),
(29, 'Wisconsins', ''),
(30, 'Florida', ''),
(31, 'Mississippi', ''),
(32, 'Georgia\n', ''),
(33, 'South Illinois', ''),
(34, 'Shreveport', ''),
(35, 'West Virginia', ''),
(36, 'Connecticut', ''),
(37, 'Indiana', ''),
(38, 'Minnesota ', ''),
(39, 'Nashville', 'active'),
(40, 'Minnesota', 'active'),
(41, 'help', 'active'),
(42, 'helps', 'active'),
(43, 'test', 'Inactive'),
(44, 'test 2', 'active'),
(45, 'test  3', 'Inactive'),
(46, 'test  4', 'active'),
(71, 'zara', 'active'),
(72, 'zara 2', 'active'),
(73, 'austin 3', 'Inactive'),
(74, 'zara 3', 'Inactive'),
(75, 'testing ', 'active'),
(76, 'mlpakistan', 'inactive'),
(77, 'MLUSA', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `storeareas`
--

CREATE TABLE `storeareas` (
  `sa_id` int(11) NOT NULL,
  `opt` varchar(255) DEFAULT NULL,
  `srv_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `storeimages`
--

CREATE TABLE `storeimages` (
  `img_id` int(11) NOT NULL,
  `srv_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storeimages`
--

INSERT INTO `storeimages` (`img_id`, `srv_id`, `q_id`, `filename`) VALUES
(1, 1, 13, 'how-we-work.png'),
(2, 1, 13, 'image/png'),
(3, 1, 13, 'C:\\xampp\\tmp\\php9310.tmp'),
(4, 1, 13, '0'),
(5, 1, 13, '428851');

-- --------------------------------------------------------

--
-- Table structure for table `storequestions`
--

CREATE TABLE `storequestions` (
  `sq_id` int(11) NOT NULL,
  `srv_id` int(11) DEFAULT NULL,
  `qs_id` int(11) NOT NULL,
  `q_id` int(11) DEFAULT NULL,
  `qtype` varchar(100) DEFAULT NULL,
  `qvalue` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storequestions`
--

INSERT INTO `storequestions` (`sq_id`, `srv_id`, `qs_id`, `q_id`, `qtype`, `qvalue`) VALUES
(151, 1, 1, 4, 'radio', 'No'),
(152, 1, 1, 4, 'textarea', 'hello mobilelink'),
(153, 1, 1, 1, 'radio', 'No'),
(154, 1, 1, 1, 'textarea', 'first query'),
(155, 1, 1, 6, 'radio', 'No'),
(156, 1, 1, 6, 'textarea', 'on six '),
(157, 1, 1, 9, 'radio', 'No'),
(158, 1, 1, 9, 'textarea', 'nine zero'),
(159, 1, 1, 48, 'table', ''),
(160, 1, 1, 2, 'textarea', 'only'),
(161, 1, 1, 13, 'radio', 'Yes'),
(162, 1, 1, 16, 'radio', 'No'),
(163, 1, 1, 45, 'dropdown', '3'),
(164, 1, 1, 13, 'file', 'banner.jpg'),
(165, 1, 1, 16, 'file', 'bg_home.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `storereport`
--

CREATE TABLE `storereport` (
  `sr_id` int(11) NOT NULL,
  `goal` float(10,2) DEFAULT NULL,
  `mtd` float(10,2) DEFAULT NULL,
  `rate` float(10,2) DEFAULT NULL,
  `dgoal` float(10,2) DEFAULT NULL,
  `rl_id` int(11) DEFAULT NULL,
  `srv_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `storereportlist`
--

CREATE TABLE `storereportlist` (
  `rl_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storereportlist`
--

INSERT INTO `storereportlist` (`rl_id`, `name`, `status`) VALUES
(1, 'New Activation', 'active'),
(2, 'Upgrade', 'active'),
(3, 'Accessory Goal', 'active'),
(4, 'APO', 'active'),
(5, 'GP', 'active'),
(6, 'Deezer', 'active'),
(7, 'Auto Pay', 'active'),
(8, 'Cricket Protect', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `storereview`
--

CREATE TABLE `storereview` (
  `srv_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `stateid` int(11) DEFAULT NULL,
  `storeid` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `rvstatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storereview`
--

INSERT INTO `storereview` (`srv_id`, `u_id`, `stateid`, `storeid`, `category`, `rvstatus`) VALUES
(1, 2, 5, 58, 1, 'started'),
(2, 51, 20, 134, 2, 'completed'),
(3, 2, 20, 131, 2, 'completed'),
(4, 2, 15, 119, 1, 'started'),
(5, 51, 15, 119, 1, 'started');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `s_id` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `m_id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`s_id`, `sname`, `m_id`, `status`) VALUES
(2, '61st ST', 1, 'inactive'),
(3, 'Galveston', 1, ''),
(4, 'Hiram Clarke', 1, ''),
(5, 'Fondren', 1, ''),
(6, 'Murphy', 1, 'inactive'),
(7, 'Fuqua', 1, 'inactive'),
(8, 'Lawndale', 1, ''),
(9, 'SilverLake II', 1, 'inactive'),
(10, 'Reed Road', 1, 'inactive'),
(11, 'Pearland', 1, ''),
(12, 'Bellaire', 1, ''),
(13, 'Conroe', 1, ''),
(14, 'Uvalde', 1, ''),
(15, 'Airline Dr', 1, ''),
(16, 'Little York', 1, 'inactive'),
(17, 'Westheimer', 1, ''),
(18, 'West Park/Hway 6', 1, 'inactive'),
(19, 'Alief Clodine RD', 1, ''),
(20, 'Centre Pkwy', 1, 'inactive'),
(21, 'Beechnut', 1, 'inactive'),
(22, 'Bissonet St', 1, 'inactive'),
(23, 'Wilcrest DR', 1, 'inactive'),
(24, 'Gassner', 1, ''),
(25, 'Renwick', 1, ''),
(26, 'Houston Cell - Enigma', 1, 'inactive'),
(27, '8711 N Lamar', 2, ''),
(28, 'RESEARCH', 2, ''),
(29, 'Braker Lane', 2, ''),
(30, 'Burton Dr', 2, ''),
(31, 'Pleasant Valley', 2, ''),
(32, 'Springdale', 2, ''),
(33, 'Pleasanton', 3, ''),
(34, 'South Park', 3, ''),
(35, 'Poteet', 3, ''),
(36, 'Bandera', 3, ''),
(37, 'Perrin Beitel', 3, ''),
(38, 'Water ford Plaza', 3, 'inactive'),
(39, 'Austin Hwy', 3, 'inactive'),
(40, 'Potranco', 3, ''),
(41, 'Castroville', 3, ''),
(42, 'Pat Booker', 3, ''),
(43, 'White Road', 3, ''),
(44, 'Huebner', 3, ''),
(45, 'DeZavala', 3, ''),
(46, 'Forum', 3, ''),
(47, 'Converse', 3, ''),
(48, 'West Ave', 3, ''),
(49, 'Evans\n', 3, ''),
(50, 'Blanco Road', 3, ''),
(51, 'McPherson', 4, ''),
(52, 'San Dario', 4, ''),
(53, 'Clark', 4, ''),
(54, 'Zapata', 4, ''),
(55, 'New York ST', 4, ''),
(56, 'Weber', 5, ''),
(57, 'Saratoga', 5, ''),
(58, 'Greenwood', 5, ''),
(59, 'Ayers', 5, ''),
(60, 'Crossroad', 6, ''),
(61, 'Western', 6, ''),
(62, 'Park West', 6, ''),
(63, 'Durham', 6, ''),
(64, 'Walker Town', 6, ''),
(65, 'Church Street', 6, ''),
(66, 'Main Street', 6, ''),
(67, 'Lakewood', 7, ''),
(68, 'Iliff', 7, ''),
(72, 'Douglas', 9, ''),
(73, 'Dell City', 9, ''),
(74, 'NE 23', 9, ''),
(75, 'Air Depot', 9, ''),
(76, 'Penn 39', 9, ''),
(77, 'SW 29', 9, ''),
(78, 'SW 59', 9, ''),
(79, 'MacArthur', 9, ''),
(80, 'Moore', 9, ''),
(81, 'Eastern village', 10, ''),
(82, 'Garnett', 10, ''),
(83, 'Sheridan', 10, ''),
(84, 'Union', 10, ''),
(85, '11th ST', 10, 'inactive'),
(86, 'ORLEANS ST', 10, ''),
(87, 'OKMULGEE ST', 10, ''),
(88, 'Memorial DR', 10, 'inactive'),
(89, 'South Yale Ave\n', 10, 'inactive'),
(90, 'S. Halsted', 11, 'inactive'),
(91, 'Stony Island', 11, 'inactive'),
(92, 'Weiss', 11, 'inactive'),
(93, 'North Ave', 11, 'inactive'),
(94, 'Archer', 11, ''),
(95, '103rd ST', 11, 'inactive'),
(96, 'S.Pulaski', 11, 'inactive'),
(97, 'Cicero', 11, ''),
(98, 'Howard', 11, ''),
(99, '4048', 11, 'inactive'),
(100, 'Armitage', 11, ''),
(101, 'Harwood', 11, ''),
(102, 'Lombard', 11, ''),
(103, 'Fullerton', 11, 'inactive'),
(104, 'Belmont', 11, ''),
(105, 'Roosevelt', 11, 'inactive'),
(106, 'Wicker Park', 11, ''),
(107, 'Rising Sun', 12, ''),
(108, 'Cedarbrook', 12, ''),
(109, 'Lancaster', 12, ''),
(110, 'Burgess', 12, ''),
(111, 'Riverview', 12, ''),
(112, 'Chestnut', 12, 'inactive'),
(116, 'Empire Plaza', 14, ''),
(117, 'Mattydale', 14, ''),
(118, 'South Ave', 14, ''),
(119, 'University Ave', 15, ''),
(120, 'Benton', 15, ''),
(121, 'Geyer Spring', 15, ''),
(122, 'Broadway', 15, ''),
(123, 'Robinson Rd', 15, ''),
(124, 'Olive', 15, ''),
(125, 'West 28th Ave', 15, ''),
(128, 'Tropicana', 17, ''),
(129, 'Lake Mead', 17, ''),
(130, 'Charleston', 17, ''),
(131, 'Lone Tree', 20, ''),
(132, 'Navarro', 20, ''),
(133, 'Port Lavaca', 20, ''),
(134, 'Mesquite St', 20, ''),
(135, 'Copperas Cove', 21, ''),
(136, 'E Rancier', 21, ''),
(137, 'W. Rancier', 21, ''),
(138, 'FT. Hood', 21, 'inactive'),
(139, 'Willow Springs', 21, ''),
(140, 'Jackson Avenue', 22, ''),
(141, 'Cleveland', 22, ''),
(142, 'Troy', 23, ''),
(143, 'Victory Blvd', 24, ''),
(144, 'Virginia Blvd', 24, ''),
(145, 'North Mall', 24, ''),
(146, 'Tidewater', 24, ''),
(147, 'Classen', 9, ''),
(148, 'Westernview', 9, ''),
(149, 'Norman', 9, ''),
(150, 'Poole Rd', 6, ''),
(151, 'New Bern', 6, ''),
(152, 'Raleigh Blvd', 6, ''),
(153, 'Roxboro', 6, ''),
(154, 'Sunset Plaza', 3, ''),
(155, ' Mount Hope ', 25, ''),
(156, ' Airport Plaza ', 25, ''),
(157, ' Ridge Road ', 25, ''),
(158, 'South Ave', 25, ''),
(159, 'Mattydale', 25, ''),
(160, 'North Market', 26, ''),
(161, 'Cameron', 2, ''),
(162, 'Rundberg', 2, ''),
(163, 'Rutland', 2, ''),
(164, '7th St', 2, 'inactive'),
(165, 'Stassney', 2, ''),
(166, 'Bastrop', 2, ''),
(167, 'Congress', 2, ''),
(168, 'Lockhart', 2, ''),
(169, '2013 Broadway N', 27, ''),
(176, 'Nile', 11, ''),
(177, 'Highland', 26, ''),
(178, 'Destrehan', 26, ''),
(179, 'La Place', 26, ''),
(181, 'Saint Rose', 26, 'inactive\n'),
(182, 'Danville', 33, ''),
(183, 'DollarWay', 15, ''),
(184, 'Texarkana', 15, 'inactive'),
(185, 'Searcy', 15, ''),
(187, 'Summer Ave', 22, ''),
(188, 'Perkins Rd', 22, ''),
(189, 'Lamar Ave', 22, ''),
(190, 'Watkins', 22, ''),
(191, 'West Memphis', 22, ''),
(192, 'Winchester Rd', 22, ''),
(193, 'Rocky Mount', 6, ''),
(194, 'Wilson', 6, ''),
(196, 'Amarillo', 28, ''),
(197, 'Wichita Falls', 28, ''),
(198, 'San Angelo East', 28, ''),
(199, 'S. western', 28, ''),
(200, 'Avenue Q', 28, ''),
(201, 'Abilene', 28, ''),
(202, 'Aurora', 11, ''),
(203, 'Wentworth', 11, ''),
(204, 'Jonesboro', 22, ''),
(205, 'Paragould', 22, ''),
(206, 'Poplar Ave', 22, ''),
(207, 'Empire Plaza', 25, ''),
(208, 'Neenah', 29, ''),
(209, 'Fond Du Lac', 29, ''),
(210, 'Oshkosh', 29, ''),
(211, 'State St', 23, ''),
(212, 'Central Ave', 23, ''),
(213, 'Riverside Troy', 23, ''),
(214, 'Westgate Plaza', 23, ''),
(215, 'Alexandria', 26, ''),
(216, 'Pascagoula', 31, ''),
(217, 'MARRERO', 26, ''),
(218, 'Siegen Ln', 26, ''),
(219, 'Bullard', 26, ''),
(220, 'Champaign', 33, ''),
(221, '6th St', 33, ''),
(222, 'King St', 33, ''),
(223, 'Outerpark', 33, ''),
(224, 'Gulfport', 31, ''),
(225, 'Oneida St', 29, ''),
(226, 'Green Bay', 29, ''),
(227, 'Huffman Mill Rd', 6, ''),
(228, 'Asheboro', 6, ''),
(229, 'Mocksville', 6, ''),
(230, 'Hammond', 26, ''),
(231, 'Guilderland', 23, ''),
(232, 'Casselberry', 30, ''),
(233, 'E Colonial', 30, ''),
(234, 'Semoran', 30, ''),
(235, 'Kissimmee', 30, ''),
(236, 'Poinciana', 30, ''),
(237, 'Hidalgo', 2, ''),
(238, 'Texarkana', 26, ''),
(239, 'Bartlesville', 10, ''),
(240, 'Perth Plaza', 23, ''),
(241, 'East Greenbush\n', 23, ''),
(242, 'Henrietta', 25, ''),
(243, 'Melrose', 28, ''),
(244, 'Kemp St', 28, ''),
(245, 'Ocean Springs', 31, ''),
(246, 'Flowery Branch', 32, ''),
(247, 'Oak Ridge', 27, ''),
(248, 'Neptune', 30, ''),
(249, 'Windmill Point', 30, ''),
(250, 'Sheboygan', 29, ''),
(251, 'Fort Smith', 10, ''),
(252, 'West Sunset', 10, ''),
(253, 'MUSTANG', 9, ''),
(254, 'Brownwood', 28, ''),
(255, 'Upper Darby', 12, ''),
(256, 'Dirksen', 33, ''),
(257, 'Hudson', 23, ''),
(258, 'Appleton', 29, ''),
(259, 'Pampa', 28, ''),
(260, 'Evangeline', 26, ''),
(261, 'Mansfield', 34, ''),
(262, 'Little Creek', 24, ''),
(263, 'Independence Blvd', 24, ''),
(264, 'Western Branch', 24, ''),
(265, 'Gallatin Ave', 22, 'inactive'),
(266, 'Powder Springs', 32, ''),
(267, 'Wade Green', 32, ''),
(268, 'Camp Creek', 32, ''),
(269, 'Hurricane', 24, ''),
(270, 'East Vine St', 30, ''),
(271, 'Beckley', 35, ''),
(272, 'Hurricane', 35, ''),
(273, 'Lenoir City', 27, ''),
(274, 'Kingsport', 27, ''),
(275, 'Town Center', 32, ''),
(276, 'Ambassador Rd', 26, ''),
(277, 'Catclaw', 28, ''),
(278, 'Sherman', 28, ''),
(279, 'Newington', 36, ''),
(280, 'Norwich', 36, ''),
(281, 'Hamden', 36, ''),
(282, 'New Haven', 36, ''),
(283, 'Milford', 36, ''),
(284, 'Enfield', 36, ''),
(285, 'Meriden', 36, ''),
(286, 'Waterford', 36, ''),
(287, 'Camby', 37, ''),
(288, 'Lebanon', 37, ''),
(289, 'Pendleton Pike', 37, ''),
(290, 'Crawfordsville', 37, ''),
(291, '31st ST', 0, '10'),
(292, 'Park Lane', 10, ''),
(293, '31st St', 10, ''),
(294, 'North Freeway', 1, ''),
(295, 'Schofield', 29, ''),
(296, 'Oakwood Mall', 29, ''),
(297, 'Mall Drive', 29, ''),
(298, 'Harrison St', 29, ''),
(299, 'Elm Street', 29, ''),
(300, 'Stevens Point', 29, ''),
(301, 'Park Ridge', 29, ''),
(302, 'Huntington Ave', 29, ''),
(303, 'Galewood Plaza', 11, ''),
(304, 'West Fullerton', 11, ''),
(305, 'Ashland', 11, ''),
(306, 'Decatur', 33, ''),
(307, 'Riverdale', 38, ''),
(308, 'Miller Hill Mall', 38, ''),
(309, 'Cedar Street', 38, ''),
(310, 'West Division', 38, ''),
(311, 'Time Square', 38, ''),
(312, 'Southdale Mall', 38, ''),
(313, 'Lyndale', 38, ''),
(314, 'Spring Lake Park', 38, ''),
(315, 'West Oakland', 38, ''),
(316, 'Vermillion', 38, ''),
(317, 'River Hills Mall', 38, ''),
(318, 'Apache Mall', 38, ''),
(319, 'Rosemount Market', 38, ''),
(320, 'Kyle', 2, ''),
(321, 'Gallatin', 39, ''),
(322, 'Donelson', 39, ''),
(323, 'Gallatin', 39, 'inactive'),
(324, 'Donelson', 39, 'inactive'),
(325, 'Gentilly', 26, ''),
(326, 'Boutte', 26, ''),
(327, 'Gretna', 26, ''),
(328, 'Kenner', 26, ''),
(329, 'Chef Menteur', 26, ''),
(330, 'Columbus', 37, ''),
(331, 'Seymour', 37, ''),
(332, 'Davis Ave', 22, 'Active'),
(333, '', 0, 'Active'),
(334, '', 0, 'Active'),
(341, 'testing321', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tmacknowledge`
--

CREATE TABLE `tmacknowledge` (
  `certify_id` int(11) NOT NULL,
  `srv_id` int(11) NOT NULL,
  `qs_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `initials` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmacknowledge`
--

INSERT INTO `tmacknowledge` (`certify_id`, `srv_id`, `qs_id`, `status`, `initials`) VALUES
(1, 1, 0, 'Agreed', 'MK');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL,
  `sd_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `fullname`, `email`, `username`, `password`, `image`, `status`, `r_id`, `sd_id`) VALUES
(1, 'Admin', 'noman_ansari@mobilelinkusa.com', 'admin', '12345', NULL, 'active', 1, 2),
(2, 'Raja', 'raja@mobilelinkusa.com', 'raja', '123', NULL, 'active', 2, 3),
(51, 'Shabbir', NULL, 'muhammad_shabbir@mobilelinkusa.com', 'mlp', NULL, 'inactive', 3, 2),
(52, 'Arif Khan', NULL, 'arif_khan@mobilelinkusa.com', '12345', NULL, 'active', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userstates`
--

CREATE TABLE `userstates` (
  `us_id` int(11) NOT NULL,
  `stateid` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userstates`
--

INSERT INTO `userstates` (`us_id`, `stateid`, `u_id`) VALUES
(299, 5, 2),
(300, 20, 2),
(301, 15, 2),
(302, 12, 52),
(303, 22, 52),
(304, 3, 52),
(308, 10, 1),
(309, 3, 1),
(310, 9, 1),
(311, 12, 51),
(312, 15, 51);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checklistcategory`
--
ALTER TABLE `checklistcategory`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `depositdetails`
--
ALTER TABLE `depositdetails`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `manager1x1questions`
--
ALTER TABLE `manager1x1questions`
  ADD PRIMARY KEY (`sq_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `questionssteps`
--
ALTER TABLE `questionssteps`
  ADD PRIMARY KEY (`qs_id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `sddetails`
--
ALTER TABLE `sddetails`
  ADD PRIMARY KEY (`sd_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `storeareas`
--
ALTER TABLE `storeareas`
  ADD PRIMARY KEY (`sa_id`);

--
-- Indexes for table `storeimages`
--
ALTER TABLE `storeimages`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `storequestions`
--
ALTER TABLE `storequestions`
  ADD PRIMARY KEY (`sq_id`);

--
-- Indexes for table `storereport`
--
ALTER TABLE `storereport`
  ADD PRIMARY KEY (`sr_id`);

--
-- Indexes for table `storereportlist`
--
ALTER TABLE `storereportlist`
  ADD PRIMARY KEY (`rl_id`);

--
-- Indexes for table `storereview`
--
ALTER TABLE `storereview`
  ADD PRIMARY KEY (`srv_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tmacknowledge`
--
ALTER TABLE `tmacknowledge`
  ADD PRIMARY KEY (`certify_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `userstates`
--
ALTER TABLE `userstates`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checklistcategory`
--
ALTER TABLE `checklistcategory`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `depositdetails`
--
ALTER TABLE `depositdetails`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `manager1x1questions`
--
ALTER TABLE `manager1x1questions`
  MODIFY `sq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT for table `questionssteps`
--
ALTER TABLE `questionssteps`
  MODIFY `qs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sddetails`
--
ALTER TABLE `sddetails`
  MODIFY `sd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `storeareas`
--
ALTER TABLE `storeareas`
  MODIFY `sa_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `storeimages`
--
ALTER TABLE `storeimages`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `storequestions`
--
ALTER TABLE `storequestions`
  MODIFY `sq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `storereport`
--
ALTER TABLE `storereport`
  MODIFY `sr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `storereportlist`
--
ALTER TABLE `storereportlist`
  MODIFY `rl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `storereview`
--
ALTER TABLE `storereview`
  MODIFY `srv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;
--
-- AUTO_INCREMENT for table `tmacknowledge`
--
ALTER TABLE `tmacknowledge`
  MODIFY `certify_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `userstates`
--
ALTER TABLE `userstates`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
