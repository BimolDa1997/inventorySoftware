-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2023 at 10:02 AM
-- Server version: 10.3.38-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rbdrvzbx_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner_info`
--

CREATE TABLE `banner_info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `entry_by` int(11) DEFAULT NULL,
  `group_for` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banner_info`
--

INSERT INTO `banner_info` (`id`, `title`, `description`, `pic`, `entry_by`, `group_for`, `priority`) VALUES
(3, 'Slide1', 'Slide1', 'admin/files/banner/pic/3.jpg', 0, 0, 1),
(4, 'Slide1', 'Slide1', 'admin/files/banner/pic/3.jpg', 0, 0, 2),
(5, 'Slide1', 'Slide1', 'admin/files/banner/pic/3.jpg', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `manual_link` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `entry_by` int(11) DEFAULT NULL,
  `group_for` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `manual_link`, `description`, `pic`, `entry_by`, `group_for`, `priority`) VALUES
(1, 'how to order from our website', 'how-to-order-from-our-website-test', '<h2>How to make a website with online ordering</h2>\r\n\r\n<h3><strong>1. Pick a website builder</strong></h3>\r\n\r\n<p>If you don&rsquo;t have experience with website development, it&rsquo;s best to choose a simple website builder. Options like Weebly and Wix allow you to drag and drop text, images, and videos onto each page, and produce a professional result.&nbsp;</p>\r\n\r\n<p>It&rsquo;s also worth looking at the level of technical support each platform offers in case you need extra help. If you&rsquo;re comfortable editing code or you plan to work with an expert, a more robust platform like WordPress will give you access to the source code for full customization.</p>\r\n\r\n<p>&ldquo;If you&rsquo;re planning to sell products online, or think you might be in the future, pick a platform that allows you to add that e-commerce feature set later on,&rdquo; advises Nat Miletic, founder of&nbsp;</p>\r\n\r\n<p>Some website builders require you to use their built-in features or to connect with a limited selection of online store apps, so it pays to look out for this before you spend time setting up your website.</p>\r\n\r\n<h3><strong>2. Set up hosting and a domain name</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;Before anyone can visit your webs</p>\r\n\r\n', '../files/category/pic/1.png', 10000, NULL, 1),
(3, 'Facebook Live', 'facebook-live', '<p><a href=\"https://facebook.com/RBD.Reliance/live_videos\" target=\"ok\">https://www.facebook.com/RBD.Reliance/live_videos</a></p>\r\n', '../files/category/pic/3.png', 40003, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `rate` int(11) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `cupon_code` varchar(55) NOT NULL,
  `cupon_type` varchar(55) NOT NULL,
  `cupon_amount` float(10,2) NOT NULL,
  `cupon_percentage` float(10,2) NOT NULL,
  `delivery_fee` float(10,2) NOT NULL,
  `ip_address` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('PENDING','DELIVERED','HOLD','CONFIRMED') NOT NULL,
  `edit_by` int(11) NOT NULL,
  `edit_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `order_id`, `quantity`, `rate`, `amount`, `size`, `color`, `cupon_code`, `cupon_type`, `cupon_amount`, `cupon_percentage`, `delivery_fee`, `ip_address`, `created_at`, `updated_at`, `status`, `edit_by`, `edit_at`) VALUES
(1, 0, 0, NULL, 0, 0, '0', '', '', '', '', 0.00, 0.00, 0.00, '27.147.166.241', NULL, NULL, 'PENDING', 0, '0000-00-00 00:00:00'),
(2, 1, 0, NULL, 1, 1600, '1600', '', '63b95ae6d39a6.jpg', '', '', 0.00, 0.00, 0.00, '27.147.166.241', NULL, NULL, 'PENDING', 0, '0000-00-00 00:00:00'),
(3, 11, 40003, NULL, 1, 2600, '2600', 'on', '63be349ae43a3.jpg', '', '', 0.00, 0.00, 0.00, '103.160.8.54', NULL, NULL, 'PENDING', 0, '0000-00-00 00:00:00'),
(4, 11, 0, NULL, 2, 2600, '5200', '', '63be349ae3453.jpg', '', '', 0.00, 0.00, 0.00, '103.160.8.54', NULL, NULL, 'PENDING', 0, '0000-00-00 00:00:00'),
(5, 9, 40003, 167087, 1, 3100, '3100', '', '63bb999da624a.jpg', '', '', 0.00, 0.00, 80.00, '37.111.192.81', NULL, NULL, 'DELIVERED', 0, '0000-00-00 00:00:00'),
(6, 11, 0, NULL, 1, 2600, '2600', '', '63be349ae3ab8.jpg', '', '', 0.00, 0.00, 0.00, '103.104.94.1', NULL, NULL, 'PENDING', 0, '0000-00-00 00:00:00'),
(7, 11, 0, NULL, 1, 2600, '2600', '', '63be349ae3ab8.jpg', '', '', 0.00, 0.00, 0.00, '103.104.94.1', NULL, NULL, 'PENDING', 0, '0000-00-00 00:00:00'),
(8, 14, 40003, 30948, 1, 1900, '1900', 'on', '63c23c37a90d8.jpg', '', '', 0.00, 0.00, 80.00, '103.160.8.14', NULL, NULL, 'HOLD', 40003, '2023-01-17 15:57:26'),
(9, 12, 40003, NULL, 1, 1750, '1750', '', '63be3679001ae.jpg', '', '', 0.00, 0.00, 0.00, '103.160.8.54', NULL, NULL, 'PENDING', 0, '0000-00-00 00:00:00'),
(10, 3, 0, NULL, 1, 1600, '1600', '', '63d9eeceb8b38.jpg', '', '', 0.00, 0.00, 0.00, '103.251.57.210', NULL, NULL, 'PENDING', 0, '0000-00-00 00:00:00'),
(11, 3, 0, NULL, 1, 1600, '1600', '', '63d9eeceb8b38.jpg', '', '', 0.00, 0.00, 0.00, '103.251.57.210', NULL, NULL, 'PENDING', 0, '0000-00-00 00:00:00'),
(12, 6, 10000, NULL, 1, 1500, '1500', '', '63d9f59658b7b.jpg', '', '', 0.00, 0.00, 0.00, '202.191.122.131', NULL, NULL, 'PENDING', 0, '0000-00-00 00:00:00'),
(13, 3, 40010, NULL, 1, 1600, '1600', '', '63d9eeceb8b38.jpg', '', '', 0.00, 0.00, 0.00, '182.161.67.146', NULL, NULL, 'PENDING', 0, '0000-00-00 00:00:00'),
(14, 4, 0, NULL, 1, 2850, '2850', '', '63d9f1771dca3.jpg', '', '', 0.00, 0.00, 0.00, '174.176.136.200', NULL, NULL, 'PENDING', 0, '0000-00-00 00:00:00'),
(15, 2, 0, NULL, 1, 2050, '2050', '', '63d9ece60da35.jpg', '', '', 0.00, 0.00, 0.00, '174.176.136.200', NULL, NULL, 'PENDING', 0, '0000-00-00 00:00:00'),
(16, 3, 0, NULL, 1, 1600, '1600', '', '63d9eeceb8b38.jpg', '', '', 0.00, 0.00, 0.00, '174.176.136.200', NULL, NULL, 'PENDING', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category_info`
--

CREATE TABLE `category_info` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `entry_by` int(11) DEFAULT NULL,
  `group_for` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category_info`
--

INSERT INTO `category_info` (`id`, `category`, `description`, `pic`, `entry_by`, `group_for`, `priority`) VALUES
(1, 'Three pieces suits', '', '../../admin/files/category/pic/1.jpg', 10000, 0, 1),
(3, 'Women\'s Fashion', '', '../../admin/files/category/pic/3.jpg', 10000, 0, 1),
(9, 'Eid Collection', 'test', '../../admin/files/category/pic/9.jpg', 40010, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `msg` text NOT NULL,
  `dt` datetime NOT NULL,
  `username` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user`, `msg`, `dt`, `username`) VALUES
(1, 40005, 'hi', '2023-01-17 02:30:00', 'storeuser1'),
(2, 40003, 'hi', '2023-01-17 02:30:00', 'firoz'),
(3, 40005, '1	', '2023-01-17 02:30:00', 'storeuser1'),
(4, 40003, '			0', '2023-01-17 02:31:00', 'firoz');

-- --------------------------------------------------------

--
-- Table structure for table `color_list`
--

CREATE TABLE `color_list` (
  `id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `color_list`
--

INSERT INTO `color_list` (`id`, `color`) VALUES
(2, 'Black & Peach'),
(3, 'Meroon & OffWhite'),
(4, 'Grey & Black'),
(16, 'Mustard'),
(15, 'Red'),
(7, 'Lemon'),
(8, 'Dusty Pink'),
(9, 'Magenta'),
(10, 'Milk Coffee'),
(11, 'Pink & Yellow'),
(12, 'Blue & Lemon'),
(13, 'Metal Grey'),
(14, 'Lavender'),
(17, 'Drik Onion'),
(18, 'Misty'),
(19, 'Black'),
(20, 'Golden'),
(21, 'Bluish Black'),
(22, 'White & Yellow'),
(23, 'White & Red'),
(24, 'Maroon'),
(25, 'Sky'),
(26, 'Blue'),
(27, 'Silver grey / yellow '),
(28, 'Olive / orange'),
(29, 'Meant paste'),
(30, 'Cream'),
(31, 'Mat green'),
(32, 'Peach'),
(33, 'Mint '),
(34, 'Light peach'),
(35, 'Powder pink'),
(36, 'OffWhite'),
(37, 'Light orange '),
(38, 'Peachy pink'),
(39, 'Paste '),
(40, 'Basonty'),
(41, 'Lime golden '),
(42, 'Dirk mehendi'),
(43, 'Mastered/ white'),
(44, 'Peach / white'),
(45, 'Lime yellow '),
(46, 'Rani'),
(47, 'Teal'),
(48, 'Onion'),
(49, 'Red / mastered'),
(50, 'white'),
(51, 'OffWhite/ Black'),
(52, 'Offwhite & Meroon'),
(53, 'Neon LemonÂ '),
(54, 'Neon Orange'),
(55, 'Dirk MofÂ '),
(56, 'OffWhite/ Equa Green'),
(57, 'OffWhite/ Misty'),
(58, 'Tomato'),
(59, 'Yellow'),
(60, 'Purple '),
(61, 'Dirk Pink '),
(62, 'Parrot Green'),
(63, 'Pink'),
(64, 'Black & Golden '),
(65, 'Lavender & OffWhite'),
(66, 'Paste & Lavender'),
(67, 'Magenta & Purple'),
(68, 'Yellow & Dirk Green'),
(69, 'Grey & MistyÂ '),
(70, 'Grey & Mastered'),
(71, 'Brick'),
(72, 'Mint Paste'),
(73, 'Dirk Maroon'),
(74, 'Chocolate'),
(75, 'Moff'),
(76, 'Dirk Indigo'),
(77, 'Cream  & Red'),
(78, 'Cream & Red'),
(79, 'Lavender & Magenta'),
(80, 'Orrange'),
(81, 'Olive'),
(82, 'Yellow & Pink'),
(83, 'Silver'),
(84, 'Mint / dirk green'),
(85, ' Pink / purple'),
(86, 'Pink / purple'),
(87, 'Light lemon'),
(88, 'Light mint'),
(89, 'Purple/ pink'),
(90, 'SeaGreen/ paste'),
(91, 'Meroon');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('Active','Inactive','','') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `company_name`, `address`, `contact_person`, `title`, `mobile`, `note`, `entry_by`, `entry_at`, `updated_by`, `updated_at`, `status`) VALUES
(1, 'RBD.Reliance-à¦°à¦¿à¦²à¦¾à¦¯à¦¼à§‡à¦¨à§à¦¸', ' 62/2, Satish Sarker Road, Gandaria, Dhaka', '', 'Propritor', '01797-976749', '', 3, '2022-06-29 08:03:33', 10000, '2022-06-29 18:03:33', 'Active'),
(6, 'Com2', 'Dhaka', '', 'Com', '123', '', 0, '2023-01-18 12:59:06', 0, '0000-00-00 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cupon_cart`
--

CREATE TABLE `cupon_cart` (
  `id` int(11) NOT NULL,
  `cupon_code` varchar(55) NOT NULL,
  `user_id` int(11) NOT NULL,
  `entry_at` datetime NOT NULL,
  `entry_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `id` int(11) NOT NULL,
  `customer_name` text NOT NULL,
  `business_name` text NOT NULL,
  `propritor_name` text NOT NULL,
  `mobile_no` varchar(55) NOT NULL,
  `mobile_no_2` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `customer_address` text NOT NULL,
  `credit_limit` int(11) NOT NULL,
  `ledger_id` bigint(20) NOT NULL,
  `group_for` int(11) NOT NULL DEFAULT 1,
  `customer_type` enum('Registered','Corporate','','') NOT NULL,
  `previous_due` decimal(20,2) NOT NULL,
  `previous_advance` decimal(20,2) NOT NULL,
  `entry_at` datetime NOT NULL,
  `entry_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Deleted','') NOT NULL,
  `pic` varchar(55) NOT NULL,
  `nid` varchar(55) NOT NULL,
  `form` varchar(55) NOT NULL,
  `check_file` varchar(255) NOT NULL,
  `opening_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `customer_name`, `business_name`, `propritor_name`, `mobile_no`, `mobile_no_2`, `email`, `customer_address`, `credit_limit`, `ledger_id`, `group_for`, `customer_type`, `previous_due`, `previous_advance`, `entry_at`, `entry_by`, `status`, `pic`, `nid`, `form`, `check_file`, `opening_date`) VALUES
(73, 'Walk-in Customer', '', '', '01XXXXXXXXXXX', '', '', '', 0, 0, 0, 'Registered', '0.00', '0.00', '0000-00-00 00:00:00', 0, 'Active', '', '', '', '', '0000-00-00'),
(68, 'sdffadd', '', '', '42543274537453', '', '', '', 0, 0, 0, 'Registered', '0.00', '0.00', '0000-00-00 00:00:00', 0, 'Active', '', '', '', '', '0000-00-00'),
(3, 'Negar Sultana Koly', '', '', '01962574686', '1962574686', '', 'dhaka', 0, 0, 0, 'Registered', '0.00', '0.00', '2022-11-13 21:44:23', 10000, 'Active', '', '', '', '', '0000-00-00'),
(5, 'Bimol Das', '', '', '01638619180', '', 'bimolerp@gmail.com', 'Dhaka, Bangladesh', 0, 0, 0, 'Registered', '0.00', '0.00', '2022-11-13 22:06:18', 10000, 'Active', '', '', '', '', '0000-00-00'),
(6, 'Bikash', '', '', '01638619181', '', 'bcd364854@gmail.com', 'dhaka', 0, 0, 0, 'Registered', '0.00', '0.00', '2022-11-13 22:13:14', 10000, 'Active', '', '', '', '', '0000-00-00'),
(7, 'Kamrul', '', '', '01843715063', '', 'kamrul1@gmail.com', 'Mirpur 13\r\nA6', 0, 0, 0, 'Registered', '0.00', '0.00', '2022-11-14 19:48:17', 10000, 'Active', '', '', '', '', '0000-00-00'),
(8, 'kamrul', '', '', '01926008058', '', 'kamrul144hasanrobin@gmail.com', 'Mirpur 13\r\nA6', 0, 0, 0, 'Registered', '0.00', '0.00', '2022-11-14 19:57:16', 10000, 'Active', '', '', '', '', '0000-00-00'),
(57, 'Test 123', 'Test 123', '', '01244544578787', '', '', 'Dhaka BD', 0, 1000266, 1, 'Registered', '0.00', '0.00', '0000-00-00 00:00:00', 40010, 'Active', '', '', '', '', '0000-00-00'),
(12, 'Firoz Ahmed', '', '', '01759771111', '', 'firozahmedpro@gmail.com', 'Gandaria, Dhaka', 0, 0, 0, 'Registered', '0.00', '0.00', '2022-11-29 15:47:45', 0, 'Active', '', '', '', '', '0000-00-00'),
(80, 'à¦°à¦¿à¦²à¦¾à¦¯à¦¼à§‡à¦¨à§à¦¸ fffff', 'à¦°à¦¿à¦²à¦¾à¦¯à¦¼à§‡à¦¨à§à¦¸ fffff', '', '12345678932', '', '', 'à¦°à¦¿à¦²à¦¾à¦¯à¦¼à§‡à¦¨à§à¦¸ vbbvbfghdfgfdgfgfdgfd', 0, 1000272, 1, 'Registered', '0.00', '0.00', '0000-00-00 00:00:00', 40010, 'Active', '', '', '', '', '0000-00-00'),
(15, 'RBD.Reliance', '', '', '01797976749', '', 'rbd.reliance@gmail.com', 'Gandaria, Dhaka', 0, 0, 0, 'Registered', '0.00', '0.00', '2022-12-14 12:55:45', 0, 'Active', '', '', '', '', '0000-00-00'),
(22, 'Dilara Jahan', '', '', '01748307772', '', '', 'Chandpur sadar,Bank colony', 0, 0, 0, 'Registered', '0.00', '0.00', '2023-01-16 19:31:38', 40003, 'Active', '', '', '', '', '0000-00-00'),
(23, 'Sumaiya Anny', '', '', '01304966175', '', '', 'Narayangonj, shibumarket hazi saijuddin madrasa', 0, 0, 0, 'Registered', '0.00', '0.00', '2023-01-16 19:31:38', 40003, 'Active', '', '', '', '', '0000-00-00'),
(24, 'Husne Ara', '', '', '01778236373', '', '', 'H#67, Flat#B3, R#6, Block-A, Section#12, Mirpur-1216, Dhaka', 0, 0, 0, 'Registered', '0.00', '0.00', '2023-01-16 19:31:38', 40003, 'Active', '', '', '', '', '0000-00-00'),
(25, 'Luthfun Nessa', '', '', '01813541700', '', '', '843, Mogotolly, Professor Lane, Agrabad, Ctg', 0, 0, 0, 'Registered', '0.00', '0.00', '2023-01-16 19:31:38', 40003, 'Active', '', '', '', '', '0000-00-00'),
(26, 'Mousomi Ahammed', '', '', '01942758462', '', '', 'NARAYANJANG, syed para, borobary', 0, 0, 0, 'Registered', '0.00', '0.00', '2023-01-16 19:31:38', 40003, 'Active', '', '', '', '', '0000-00-00'),
(27, 'Nadia Farhin', '', '', '01723659669', '', '', 'uttor badda,thana road', 0, 0, 0, 'Registered', '0.00', '0.00', '2023-01-16 19:31:38', 40003, 'Active', '', '', '', '', '0000-00-00'),
(28, 'NuPur Nj', '', '', '01778660644', '', '', '??????? ??? ?????? ???????', 0, 0, 0, 'Registered', '0.00', '0.00', '2023-01-16 19:31:38', 40003, 'Active', '', '', '', '', '0000-00-00'),
(29, 'Sarika Islam Sara', '', '', '01743469054', '', '', 'Savar kobirpur', 0, 0, 0, 'Registered', '0.00', '0.00', '2023-01-16 19:31:38', 40003, 'Active', '', '', '', '', '0000-00-00'),
(30, 'Silvia Ray', '', '', '01644400061', '', '', 'Dr.sanjida monzur 75 Noor e castle Jonaki road, mirpur-1', 0, 0, 0, 'Registered', '0.00', '0.00', '2023-01-16 19:31:38', 40003, 'Active', '', '', '', '', '0000-00-00'),
(31, 'Tamanna Saeed', '', '', '01916746733', '', '', '1891..Shahabuddir Mor..post office road..Middle badda', 0, 0, 0, 'Registered', '0.00', '0.00', '2023-01-16 19:31:38', 40003, 'Active', '', '', '', '', '0000-00-00'),
(74, 'Walk-in Customer', '', '', '01743469054', '', '', '', 0, 0, 0, 'Registered', '0.00', '0.00', '0000-00-00 00:00:00', 0, 'Active', '', '', '', '', '0000-00-00'),
(75, 'New B', '', '', '01737174415', '', '', '', 0, 0, 0, 'Registered', '0.00', '0.00', '0000-00-00 00:00:00', 0, 'Active', '', '', '', '', '0000-00-00'),
(76, 'Ok Ok Ok', '', '', '01723124569', '', '', '', 0, 0, 0, 'Registered', '0.00', '0.00', '0000-00-00 00:00:00', 0, 'Active', '', '', '', '', '0000-00-00'),
(77, '', '73', '73', '', '', '', '', 0, 1000270, 1, 'Registered', '0.00', '0.00', '0000-00-00 00:00:00', 0, 'Active', '', '', '', '', '0000-00-00'),
(78, '', 'Walk-in Customer', 'Walk-in Customer', '', '', '', '', 0, 1000271, 1, 'Registered', '0.00', '0.00', '0000-00-00 00:00:00', 0, 'Active', '', '', '', '', '0000-00-00'),
(79, 'Himja', '', '', '917990665983', '', 'himjaa@gmail.com', 'Sagar bunglow O N G C road East area behind market yard kalol North Gujarat dist Gandhinagar Gujarat India pin 382721', 0, 0, 1, 'Registered', '0.00', '0.00', '2023-02-26 14:10:56', 0, 'Active', '', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `cu_pons`
--

CREATE TABLE `cu_pons` (
  `id` int(11) NOT NULL,
  `cupon_code` varchar(55) NOT NULL,
  `type` enum('Discount Amount','Discount Percentage','Free Delivery','') NOT NULL,
  `cupon_limit` int(11) NOT NULL,
  `expire` date NOT NULL,
  `amount` int(11) NOT NULL,
  `discount_percent` float(10,2) NOT NULL,
  `status` enum('Active','Inactive','Cancel','') NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_at` datetime NOT NULL,
  `edit_by` int(11) NOT NULL,
  `edit_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `damage_item`
--

CREATE TABLE `damage_item` (
  `id` int(11) NOT NULL,
  `journal_date` date NOT NULL,
  `warehouse` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `item_in` decimal(20,2) NOT NULL,
  `item_ex` decimal(20,2) NOT NULL,
  `tr_no` int(11) NOT NULL,
  `tr_from` varchar(255) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `entry_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_info`
--

CREATE TABLE `delivery_info` (
  `id` int(11) NOT NULL,
  `delivery_no` int(11) NOT NULL,
  `s_no` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `agency` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `sales_qty` int(11) NOT NULL,
  `return_qty` int(11) NOT NULL,
  `damage_qty` int(11) NOT NULL,
  `confirm_qty` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `delivery_fee` int(11) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `status` enum('PENDING','CONFIRMED','RETURNED','PARTIAL RETURNED') NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` enum('INTERNAL','EXTERNAL','','') NOT NULL,
  `color` int(11) NOT NULL,
  `warehouse` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_location`
--

CREATE TABLE `delivery_location` (
  `id` int(11) NOT NULL,
  `location` text NOT NULL,
  `delivery_fee` double(20,2) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `delivery_location`
--

INSERT INTO `delivery_location` (`id`, `location`, `delivery_fee`, `entry_by`, `entry_at`, `updated_by`, `updated_at`) VALUES
(1, 'Inside Dhaka', 80.00, 10000, '0000-00-00 00:00:00', 10000, '2022-12-03 14:24:31'),
(2, 'Outside Dhaka', 150.00, 10000, '2022-10-18 19:52:27', 10000, '2022-12-03 14:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2020-02-21 10:40:22', '2020-02-22 09:29:12'),
(3, 'Rajsahi', 3, '2020-02-21 10:41:36', '2020-02-21 10:41:36'),
(4, 'Chittagong', 3, '2020-02-22 11:00:37', '2020-02-22 11:00:37'),
(5, 'Barishal', 3, '2020-02-22 11:00:37', '2020-02-22 11:00:37'),
(6, 'Khulna', 3, '2020-02-22 11:00:37', '2020-02-22 11:00:37'),
(7, 'Rangpur', 3, '2020-02-22 11:00:37', '2020-02-22 11:00:37'),
(8, 'Mymensingh', 3, '2020-02-22 11:00:37', '2020-02-22 11:00:37'),
(9, 'Sylhet', 3, '2020-02-22 11:00:37', '2020-02-22 11:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `donar_info`
--

CREATE TABLE `donar_info` (
  `donar_id` int(11) NOT NULL,
  `donar_name` text NOT NULL,
  `mobile_no` varchar(55) NOT NULL,
  `donar_address` text NOT NULL,
  `credit_limit` int(11) NOT NULL,
  `ledger_id` bigint(20) NOT NULL,
  `group_for` int(11) NOT NULL,
  `customer_type` enum('Registered','Corporate','','') NOT NULL,
  `previous_due` decimal(20,2) NOT NULL,
  `previous_advance` decimal(20,2) NOT NULL,
  `entry_at` int(11) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `status` enum('Active','Inactive','Deleted','') NOT NULL,
  `pic` varchar(55) NOT NULL,
  `nid` varchar(55) NOT NULL,
  `form` varchar(55) NOT NULL,
  `check_file` varchar(255) NOT NULL,
  `donar_type` enum('Give Loan','Take Loan','','') NOT NULL DEFAULT 'Take Loan'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `joining_date` date NOT NULL,
  `nid_no` varchar(100) NOT NULL,
  `mobile_no` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `present_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `gross_salary` int(11) NOT NULL,
  `basic_salary` int(11) NOT NULL,
  `house_rent` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `conveyance` int(11) NOT NULL,
  `mobile_bill` int(11) NOT NULL,
  `password` varchar(55) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `edit_by` int(11) NOT NULL,
  `edit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `id` int(11) NOT NULL,
  `feature_name` varchar(100) NOT NULL,
  `div_id` varchar(55) NOT NULL,
  `icons` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`id`, `feature_name`, `div_id`, `icons`) VALUES
(1, 'Mis Setup', 'mis', 'flaticon-shapes-1'),
(2, 'Setup', 'base', 'flaticon-settings\r\n'),
(3, 'Purchase', 'sidebarLayouts', 'flaticon-delivery-truck'),
(4, 'Sales', 'forms', 'flaticon-cart-1'),
(10, 'Loan', 'loan', 'flaticon-coins'),
(6, 'Expense', 'formss', 'flaticon-credit-card'),
(7, 'HRM', 'hrm', 'flaticon-users'),
(8, 'Report', 'report', 'flaticon-analytics'),
(5, 'Stock', 'stock', 'flaticon-box-1'),
(11, 'Blogs', 'blog', 'flaticon-technology-1'),
(12, 'Customer Manage', 'customers', 'flaticon-chart-pie'),
(13, 'Offer/Promote', 'social', 'flaticon-facebook'),
(14, 'Accounts', 'Accounts', 'flaticon-chart-pie');

-- --------------------------------------------------------

--
-- Table structure for table `greeting_info`
--

CREATE TABLE `greeting_info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `entry_by` int(11) DEFAULT NULL,
  `group_for` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `greeting_info`
--

INSERT INTO `greeting_info` (`id`, `title`, `description`, `pic`, `entry_by`, `group_for`, `priority`, `status`, `entry_at`) VALUES
(1, 'https://ecom.mollikplazabsl.com/web/category.php?type=sub_category&id=2', '11 Sale', 'admin/files/greeting/pic/1.jpg', 10000, NULL, 0, 'Inactive', '2022-11-16 15:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `sub_category` int(11) NOT NULL,
  `sub_sub_category` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `item_id`, `category`, `sub_category`, `sub_sub_category`, `item_name`) VALUES
(3, 1, 7, 0, 0, ''),
(4, 1, 1, 2, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `item_info`
--

CREATE TABLE `item_info` (
  `item_id` int(11) NOT NULL,
  `item_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `slug` varchar(255) NOT NULL,
  `uom` varchar(55) NOT NULL,
  `pack_size` int(11) DEFAULT NULL,
  `item_group` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `status` enum('Active','Inactive','Deleted','') NOT NULL,
  `group_for` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) NOT NULL,
  `sub_sub_category_id` int(11) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `item_color` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci DEFAULT NULL,
  `tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `video` text DEFAULT NULL,
  `description_t` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `featured` enum('YES','NO','','') NOT NULL DEFAULT 'NO',
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `entry_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item_info`
--

INSERT INTO `item_info` (`item_id`, `item_name`, `slug`, `uom`, `pack_size`, `item_group`, `brand`, `status`, `group_for`, `category_id`, `sub_category_id`, `sub_sub_category_id`, `item_code`, `size`, `item_color`, `description`, `tags`, `video`, `description_t`, `price`, `featured`, `entry_at`, `entry_by`, `updated_by`, `updated_at`) VALUES
(1, 'DESIGNER SHAREE', 'designer-sharee', 'Sharee', NULL, 1, '', 'Active', 1, 0, 0, 0, '4231A', 0, '', '<p>4231/A<br />\r\nDESIGNER SHARE&nbsp;<br />\r\nPRICE: 6000 tk</p>\r\n\r\n<p>SHAREE : pure muslin orgenja designer sharee with mc SarVaski stone and tercel jhull work.<br />\r\nSIZE: long: 235&rdquo; (12 hat) width: 45&rdquo;( 2.5 hat )</p>\r\n\r\n<p>BLOUSE: pure muslin orgenja unstitch blouse piece with mc SarVaski stone work.<br />\r\nSIZE: long: 50&rdquo; (2.5 hat )</p>\r\n\r\n<p>COLOUR:&nbsp;<br />\r\n1. Golden<br />\r\n2. Black</p>\r\n', '', NULL, '', 6000, 'YES', '2023-03-09 15:33:58', 40010, 0, '0000-00-00 00:00:00'),
(2, 'Party wear shareeÂ ', 'party-wear-sharee', 'Sharee', NULL, 1, '', 'Active', 1, 0, 0, 0, '3785', 0, '', '<p>3785<br />\r\nParty wear sharee&nbsp;<br />\r\nPrice : 3150 tk</p>\r\n\r\n<p>Sharee fabric: sequins worked chinon and sequins workde viscous printed border .<br />\r\nà§¨.à§« à¦¹à¦¾à¦¤ à¦¬à¦¹à¦° , à§§à§¨.à§« à¦¹à¦¾à¦¤ à¦²à¦®à§à¦¬à¦¾ à¥¤</p>\r\n\r\n<p>Blouse fabric: sequins worked printed viscous .<br />\r\nBlouse please: 1 mtr (58&rdquo; width)</p>\r\n\r\n<p>Colour :<br />\r\n1. Blue&nbsp;<br />\r\n2. Sky</p>\r\n', '', NULL, '', 3150, 'YES', '2023-03-09 16:20:59', 40010, 40010, '2023-03-10 03:23:54'),
(3, '3712', '3712', 'Sharee', NULL, 1, '', 'Active', 1, 0, 0, 0, '3712', 0, '', '<p>77:3712<br />\r\nDesigner sharee&nbsp;<br />\r\nPrice 2950 tk&nbsp;</p>\r\n\r\n<p>Sharee fabric: chinon&nbsp;<br />\r\nSharee width &nbsp;: 44&rdquo;<br />\r\nSharee long : 12.5 hat&nbsp;<br />\r\nChinon with pearl setting lacing and gather work.</p>\r\n\r\n<p>Blouse fabric: Printed MALVARI &nbsp;silk unstitch fabric.<br />\r\nBlous piece measurement: 1.25 mtr ( 44&rdquo; width) .<br />\r\nBlouse lace : pearl and pipe setting designer lace for neck and sleeves designing.</p>\r\n\r\n<p>Belt : Pearl and pipe sequins designer belt . Free size for all .</p>\r\n\r\n<p>Colour :&nbsp;<br />\r\n1. Silver grey / yellow&nbsp;<br />\r\n2. Olive / orange.</p>\r\n', '', NULL, '', 2950, 'YES', '2023-03-09 16:30:14', 40010, 0, '0000-00-00 00:00:00'),
(4, '3620', '3620', 'Sharee', NULL, 1, '', 'Active', 1, 0, 0, 0, '3620', 0, '', '<p>77:3620<br />\r\nSharee set&nbsp;<br />\r\nReady sharee/ Blouse piece/Belt )<br />\r\nPrice : 3200 tk</p>\r\n\r\n<p>Sharee design: Ready Sharee fabric : Mashlin&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Orgenja&nbsp;<br />\r\nSharee long: 225&rdquo;( à§§à§¨.à§« à¦¹à¦¾à¦¤)<br />\r\nSharee length : 45&rdquo;&nbsp;<br />\r\n3 side sequins border and&nbsp;<br />\r\n2 side gather work .</p>\r\n\r\n<p>Blouse fabric: Sequins nate&nbsp;<br />\r\nBlouse piece long : 32&rdquo;&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;( 55&rdquo; width)<br />\r\nBelt material: Rexene/<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sequins/ hock&nbsp;<br />\r\nBelt long : 40&rdquo; ( free size for all ) .</p>\r\n\r\n<p>Colours :<br />\r\n1. Black&nbsp;<br />\r\n2. Meant paste<br />\r\n3. Cream</p>\r\n', '', NULL, '', 3200, 'YES', '2023-03-09 16:33:49', 40010, 0, '0000-00-00 00:00:00'),
(5, '4360', '4360', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4360', 0, '', '<p>4360<br />\r\nBOUTIQUE DRESS&nbsp;<br />\r\nPRICE: 3pcs:1600 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs: 1450 tk<br />\r\nKAMIJ: jari stripe shimmery cotton unstitch dress material with sequins embroidery and gotapatti lacing work.<br />\r\nSIZE: body:80&rdquo; long:46&rdquo; sleeves:21&rdquo;</p>\r\n\r\n<p>ORNA: mushlin orgenja 2.5 mtr full size complete orna with embroidery, gotapatti lacing and tercel jhull work.</p>\r\n\r\n<p>PANT : viscous cotton 2.25 mtr unstitch pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Mat green&nbsp;<br />\r\n2. Peach</p>\r\n', '', NULL, '', 1600, 'YES', '2023-03-09 16:37:06', 40010, 40010, '2023-03-12 20:38:12'),
(6, '4284', '4284', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4284', 0, '', '<p>77:4284<br />\r\nBOUTIQUE PARTY DRESS<br />\r\nPRICE: 3pcs:2350 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs: 2200 tk<br />\r\nKAMIJ: premium quality cotton base soft silk unstitch dress material with micro mini size sequins embroidery worked.<br />\r\nSIZE: body:60&rdquo; long:46&rdquo; sleeves: side sleeves.</p>\r\n\r\n<p>ORNA: Mashlin orgenja 2.5 mtr full size complete dupatta with micro mini size sequins embroidery and tercel jhull worked .</p>\r\n\r\n<p>PANT : 2.25 mtr viscous cotton unstitch pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Mint&nbsp;<br />\r\n2. Light peach</p>\r\n', '', NULL, '', 2350, 'YES', '2023-03-09 16:41:01', 40010, 40010, '2023-03-10 21:23:32'),
(7, '4355', '4355', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4355', 0, '', '<p>7:4355<br />\r\nBOUTIQUE DRESS<br />\r\nPRICE: 3pcs:2200 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs:2050 tk<br />\r\nKAMIJ : sairo slav cotton silk semi stitch kamij style dress with sequins and cording embroidery work .<br />\r\nSIZE: body:54&rdquo; long:46&rdquo; sleeves:19&rdquo;</p>\r\n\r\n<p>ORNA: muslin orgenja 2.5 mtr full size complete orna with sequins embroidery cutwork and designer tercel jhull work .</p>\r\n\r\n<p>PANT : 2.25 mtr viscous cotton unstitch pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Powder pink&nbsp;<br />\r\n2. OffWhite</p>\r\n', '', NULL, '', 2200, 'YES', '2023-03-09 16:44:37', 40010, 40010, '2023-03-12 16:19:02'),
(8, '4232', '4232', '3 pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4232', 0, '', '<p>77:4232<br />\r\nBOUTIQUE DRESS&nbsp;<br />\r\nPRICE: 3pcs: 1800 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs: 1650 tk<br />\r\nKAMIJ: molmol cotton unstitch kamij material with ari embroidery, foyle mirror,<br />\r\nstoning gotapatti lacing and cutwork.<br />\r\nSIZE: body:82&rdquo; long:47&rdquo; sleeves: 21&rdquo;</p>\r\n\r\n<p>ORNA: digital printed molmol cotton 2.5 mtr full size complete dupatta with gotapatti lacing and tercel jhull work.</p>\r\n\r\n<p>PANT: 2.25 mtr viscous cotton unstitch pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Light orange&nbsp;<br />\r\n2. Misty</p>\r\n', '', NULL, '', 1800, 'YES', '2023-03-09 16:47:12', 40010, 40010, '2023-03-10 22:23:33'),
(9, '4325', '4325', '2 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4325', 0, '', '<p>77:4325<br />\r\nNAYRA DRESS&nbsp;<br />\r\nPRICE: NAYRA ORNA:1750tk<br />\r\nSKIRT PALAZZO:750tk &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; PACKAGE:3PCS:2450 tk<br />\r\nNAYRA: digital printed cotton base shiny silk with cotton inner NAYRA style stitch kurty with sequins embroidery neckline and designer adjustable cord work.<br />\r\nSIZE: body:46&rdquo; long:49&rdquo; sleeves:18&rdquo;</p>\r\n\r\n<p>ORNA: digital printed pure 2.5 mtr full size complete orna with gotapatti lacing and tercel jhull work .</p>\r\n\r\n<p>SKIRT PALAZZO: viscous cotton stitch free size designer skirt palazzo.<br />\r\nSIZE: waist:50&rdquo; long:41&rdquo; gher:72&rdquo;(each leg)</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Cream<br />\r\n2. Peachy pink</p>\r\n', '', NULL, '', 1750, 'YES', '2023-03-09 16:50:37', 40010, 0, '0000-00-00 00:00:00'),
(10, 'ok', 'ok', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, 'ok', 0, '', '<p>ok</p>\r\n', '', NULL, '', 1350, 'YES', '2023-03-09 16:56:22', 40010, 40010, '2023-03-10 21:07:19'),
(47, 'PARTY WEAR NAYRAÂ ', 'party-wear-nayra', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '3391', 0, '', '<p>77:4391<br />\r\nPARTY WEAR NAYRA&nbsp;<br />\r\nPRICE: single Nayra:1550 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Nayra/Orna :1900 tk<br />\r\n&nbsp; &nbsp; &nbsp; Nayra/Orna/Pant:2400 tk<br />\r\nNAYRA: digital printed shiny silk Nayra style stitch dress with foyle mirror stoning lacing and adjustable cord work.<br />\r\nSIZE: boo:46&rdquo; long:49&rdquo; sleeves:19&rdquo;</p>\r\n\r\n<p>ORNA: butterfly nate 2.5 mtr full size complete orna with allover sequins embroidery, lacing and designer tercel jhull work.</p>\r\n\r\n<p>PANT: digital printed stitch pant.<br />\r\nSize: waist:50&rdquo; long:39&rdquo; gher:34&rdquo; (each leg)</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Red&nbsp;<br />\r\n2. Peach</p>\r\n', '', NULL, '', 2400, 'YES', '2023-03-10 10:46:27', 40010, 0, '0000-00-00 00:00:00'),
(11, '4309', '4309', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4309', 0, '', '<p>77:4309<br />\r\nCO-ORDS COTTON 3PCS<br />\r\nPRICE:1200 tk</p>\r\n\r\n<p>KAMIJ / PANT : printed ðŸ’¯% &nbsp;cotton with added chemical embroidery 100&rdquo;inch lace .</p>\r\n\r\n<p>SIZE: 5 mtr (42&rdquo;width) total fabric to make any size &nbsp;<br />\r\nco-ords &nbsp;top and bottom.</p>\r\n\r\n<p>ORNA: 2.5 mtr block printed and tidye pure full size dupatta.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Black<br />\r\n2. Basonty</p>\r\n', '', NULL, '', 1200, 'YES', '2023-03-09 16:58:28', 40010, 0, '0000-00-00 00:00:00'),
(12, '4308', '4308', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4308', 0, '', '<p>77:4308<br />\r\n77:4308<br />\r\nBOUTIQUE DRESS&nbsp;<br />\r\nPRICE: 3pcs:2500 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs:2350 tk</p>\r\n\r\n<p>KAMIJ: cotta cotton with cotton inner unstitch lakhnowe stitch , foyle mirror embroidery , stoning and cutwork.<br />\r\nSIZE: body:62&rdquo; long:45&rdquo; sleeves: side sleeves.</p>\r\n\r\n<p>ORNA: 2.5 mtr cotta cotton full size complete dupatta with lakhnowe stitch , foyle mirror embroidery , cutwork and tercel jhull work.</p>\r\n\r\n<p>PANT: 2.25 mtr viscous cotton unstitch pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Lime golden&nbsp;<br />\r\n2. Peach</p>\r\n', '', NULL, '', 2500, 'YES', '2023-03-09 17:00:48', 40010, 40010, '2023-03-12 17:58:59'),
(13, '4330', '4330', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4330', 0, '', '<p>77:4330<br />\r\nPARTY WEAR BOUTIQUE DRESS&nbsp;<br />\r\nPRICE: 3pcs:2850 &nbsp;2pcs:2700 tk<br />\r\nKAMIJ: premium quality cotton base soft silk unstitch dress material with beads motifs embroidery and dmc SarVaski stone and cutwork .<br />\r\nSIZE: body:60&rdquo; long:45&rdquo; sleeves: side sleeves.</p>\r\n\r\n<p>ORNA: 2.5 mtr pure orgenja full size complete orna with beads motifs embroidery, dmc SarVaski stone , cutwork and tercel jhull work .</p>\r\n\r\n<p>PANT: 2.25 mtr viscous cotton unstitch pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. OffWhite&nbsp;<br />\r\n2. Dirk mehendi</p>\r\n', '', NULL, '', 2850, 'YES', '2023-03-09 17:03:30', 40010, 40010, '2023-03-12 20:14:37'),
(14, '4338', '4338', 'Single', NULL, 1, '', 'Active', 1, 0, 0, 0, '4338', 0, '', '<p>77:4338<br />\r\nWESTERN KAFTAN&nbsp;<br />\r\nPRICE: 1050 tk</p>\r\n\r\n<p>KAFTAN : foyle printed knit cotton stitch kaftan style western dress with mc sarvaski stone and designer adjustable cord work.<br />\r\nSIZE: body:62&rdquo; long:38&rdquo; ( free size for all )</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Peach / white<br />\r\n2. Mastered/ white</p>\r\n', '', NULL, '', 1050, 'YES', '2023-03-09 17:07:25', 40010, 40010, '2023-03-12 17:04:33'),
(15, '4315', '4315', '2 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4315', 0, '', '<p>77:4315<br />\r\nNAYRA DRESS&nbsp;<br />\r\nPRICE: 1500 tk</p>\r\n\r\n<p>NAYRA: printed cotton NAYRA style kurty with foyle mirror embroidery, gotapatti lacing and designer adjustable cord work.<br />\r\nSIZE: body:46&rdquo; long:49&rdquo; sleeves:19&rdquo;</p>\r\n\r\n<p>ORNA: 2.5 mtr printed cotton full size complete orna with gotapatti lacing and tercel jhull work.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Black<br />\r\n2. Basunty</p>\r\n', '', NULL, '', 1500, 'YES', '2023-03-09 17:11:29', 40010, 40010, '2023-03-10 20:53:38'),
(16, '4305', '4305', '2 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4305', 0, '', '<p>77:4305<br />\r\nNAYRA DRESS&nbsp;<br />\r\nPRICE: 1500 tk</p>\r\n\r\n<p>NAYRA: crepe gorget with cotton inner stitch NAYRA style kurty with lupe button and designer adjustable cord work.<br />\r\nSIZE: body:46&rdquo; long:49&rdquo; sleeves:19&rdquo;</p>\r\n\r\n<p>ORNA: 2.5 mtr tiedye pure full size complete orna with gotapatti lacing and tercel jhull work.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Bluish black<br />\r\n2. Golden</p>\r\n', '', NULL, '', 1500, 'YES', '2023-03-09 17:13:18', 40010, 40010, '2023-03-10 20:45:44'),
(17, '4316', '4316', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4316', 0, '', '<p>77:4316<br />\r\nKURTY 2PCS&nbsp;<br />\r\nPRICE: 1300 tk</p>\r\n\r\n<p>KURTY: premium cotton semi stitch kamij style kurty with SarWaski stone and princess line gather work.<br />\r\nBody: 48&quot; long: 45&quot; Sleeves: 18&quot;<br />\r\nORNA: tidye batiq 2.5 mtr pure with tercel jhull work.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Red<br />\r\n2. Teal</p>\r\n', '', NULL, '', 1300, 'YES', '2023-03-09 17:15:31', 40010, 40010, '2023-03-12 18:01:59'),
(18, '4295', '4295', '2 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4295', 0, '', '<p>77:4295<br />\r\nNAYRA KURTY DRESS<br />\r\n2PCS:1500 tk<br />\r\nSINGLE NYRA:1200 tk</p>\r\n\r\n<p>NAYRA: premium quality ðŸ’¯% cotton NAYRA style stitch Kurty with chikenkari, lacing, crystal lupe button and designer adjustable cord work.<br />\r\nSIZE: body: 46&rdquo; long: 49&rdquo;sleeves: 20&rdquo; gher: 36&rdquo;</p>\r\n\r\n<p>DUPATTA: Digital printed muslin silk complete dupatta with tercel jhull work.<br />\r\nSIZE: long:2.5 mtr width:29&rdquo;</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Mat green<br />\r\n2. Onion</p>\r\n', '', NULL, '', 1500, 'YES', '2023-03-09 17:18:25', 40010, 40010, '2023-03-12 16:47:52'),
(19, '4301', '4301', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4301', 0, '', '<p>77:4301<br />\r\nDESIGNER KURTY 2pcs<br />\r\nPRICE: 1600 tk&nbsp;</p>\r\n\r\n<p>KURTY: premium quantity ðŸ’¯% cotton stitch free size designer frock style kuty with foyle mirror and nim jari embroidery work .<br />\r\nSIZE: body:46&rdquo; long:48&rdquo; sleeves:19&rdquo;</p>\r\n\r\n<p>ORNA: didye and chunri printed pure with gotapatti tercel jhull work.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Black<br />\r\n2. Red<br />\r\n&nbsp;</p>\r\n', '', NULL, '', 1600, 'YES', '2023-03-09 17:20:19', 40010, 40010, '2023-03-12 16:38:12'),
(20, '4353', '4353', '2 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4353', 0, '', '<p>77:4353<br />\r\nGHAGRA KAMIJ 3pcs<br />\r\nPRICE: kamij:1250 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Orna:600 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ghagra:1450 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Kamij orna:1750 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ghagra orna:2000 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Package 3pcs:3150 tk<br />\r\nKAMIJ: cotton rayon santone semi stitch kamij style dress with foyle mirror ari embroidery and appliqu&eacute; work.<br />\r\nSIZE: body:48&rdquo; long:45&rdquo; sleeves:19&rdquo;</p>\r\n\r\n<p>ORNA: premium soft cotton 2.5 mtr full size complete orna with appliqu&eacute; gotapatti stoning and tercel jhull work.</p>\r\n\r\n<p>GHAGRA: premium soft cotton ready to wear free size complete five layer GHAGRA with appliqu&eacute; and gather work.<br />\r\nSIZE: waist:50&rdquo; long:43&rdquo; gher:280&rdquo;</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Mastered/ white<br />\r\n2. Red / mastered</p>\r\n', '', NULL, '', 1750, 'YES', '2023-03-09 17:30:28', 40010, 40010, '2023-03-12 17:20:23'),
(21, '4385', '4385', 'single', NULL, 1, '', 'Active', 1, 0, 0, 0, '4385', 0, '', '<p>77:4301<br />\r\nDESIGNER KURTY 2pcs<br />\r\nPRICE: 1600 tk&nbsp;</p>\r\n\r\n<p>KURTY: premium quantity ðŸ’¯% cotton stitch free size designer frock style kuty with foyle mirror and nim jari embroidery work .<br />\r\nSIZE: body:46&rdquo; long:48&rdquo; sleeves:19&rdquo;</p>\r\n\r\n<p>ORNA: didye and chunri printed pure with gotapatti tercel jhull work.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Black<br />\r\n2. Red<br />\r\n&nbsp;</p>\r\n', '', NULL, '', 1200, 'YES', '2023-03-09 17:37:11', 40010, 40010, '2023-03-12 16:51:19'),
(22, 'gharara', 'gharara', 'single', NULL, 1, '', 'Active', 1, 0, 0, 0, 'gharara', 0, '', '', '', NULL, '', 1600, 'YES', '2023-03-09 17:50:11', 40010, 0, '0000-00-00 00:00:00'),
(23, 'orna', 'orna', 'single', NULL, 1, '', 'Active', 1, 0, 0, 0, 'orna', 0, '', '', '', NULL, '', 700, 'YES', '2023-03-09 17:54:18', 40010, 0, '0000-00-00 00:00:00'),
(24, 'DELHI BOUTIQUE DRESSÂ ', 'delhi-boutique-dress', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4081', 0, '', '<p>77:4081<br />\r\nDELHI BOUTIQUE DRESS&nbsp;<br />\r\nPRICE: three pieces: 1800 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; two pieces : 1650 tk</p>\r\n\r\n<p>KAMIJ: printed slav cotton silk semi stitch kamij style dress with cording jari embroidery ðŸª¡ðŸ§µand real mirror ðŸªž work on neckline and cuff .</p>\r\n\r\n<p>SIZE: body: 50&rdquo; long: 46&rdquo; sleeves: 18&rdquo;</p>\r\n\r\n<p>DUPATTA: printed pure full size dupatta with designer tercel work.&nbsp;</p>\r\n\r\n<p>BOTTOM: viscous cotton unstitch pant piece material 2.25 mtr .</p>\r\n\r\n<p>COLOUR:&nbsp;<br />\r\n1. OffWhite/ black ðŸ¤ðŸ–¤<br />\r\n2. Offwhite / meroon ðŸ¤â¤ï¸</p>\r\n', '', NULL, '', 1800, 'YES', '2023-03-10 05:41:50', 40010, 0, '0000-00-00 00:00:00'),
(25, 'COTTON EMBROIDERY BOUTIQUE DRESSÂ ', 'cotton-embroidery-boutique-dress', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4345', 0, '', '<p>77:4345<br />\r\nCOTTON EMBROIDERY BOUTIQUE DRESS&nbsp;<br />\r\nPRICE: 3pcs:1900 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs:1750 tk<br />\r\nKAMIJ: premium cotton unstitch dress material with heavy embroidery , stoning and lacing work.<br />\r\nSIZE: body:60&rdquo; long:45&rdquo; sleeves: side sleeves.</p>\r\n\r\n<p>ORNA: premium soft cotton 2.5 mtr full size complete orna &nbsp;with heavy embroidery stoning lacing and tercel jhull work.</p>\r\n\r\n<p>PANT: 2.25 mtr viscous cotton unstitch pant piece material.</p>\r\n\r\n<p>COLOUR :<br />\r\n1. Lime yellow&nbsp;<br />\r\n2. Rani</p>\r\n', '', NULL, '', 1900, 'YES', '2023-03-10 06:29:05', 40010, 0, '0000-00-00 00:00:00'),
(26, 'COTTON/ PURE ORNA 2PCS', 'cotton-pure-orna-2pcs', '2 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4270', 0, '', '<p>77:4270<br />\r\nCOTTON/ PURE ORNA 2PCS<br />\r\nPRICE: 900 tk</p>\r\n\r\n<p>KAMIJ: printed premium cotton unstitch kamij material.<br />\r\nSIZE: body:82&rdquo; long:47&rdquo; sleeves: side sleeves.</p>\r\n\r\n<p>ORNA: printed pure 2.5 mtr full size dupatta.</p>\r\n\r\n<p>COLOUR:&nbsp;<br />\r\n1. Black&nbsp;<br />\r\n2. Mastered</p>\r\n', '', NULL, '', 900, 'YES', '2023-03-10 06:33:35', 40010, 0, '0000-00-00 00:00:00'),
(27, 'COTTON LAWN DRESS', 'cotton-lawn-dress', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4205', 0, '', '<p>77:4205<br />\r\nCOTTON LAWN DRESS<br />\r\n3pcs: 1300 tk<br />\r\n2pcs: 1150 tk</p>\r\n\r\n<p>KAMIJ: Slav design ðŸ’¯% cotton digital printed lawn .<br />\r\nSIZE : body: 80&rdquo; long: 46&rdquo; sleeves: 20&rdquo;</p>\r\n\r\n<p>DUPATTA : 80 count ðŸ’¯% soft cotton full size digital printed lawn .<br />\r\nPANT: 2.25 mtr unstitch pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Neon Lemon&nbsp;<br />\r\n2. Neon Orange</p>\r\n', '', NULL, '', 1300, 'YES', '2023-03-10 06:36:35', 40010, 0, '0000-00-00 00:00:00'),
(28, 'BOUTIQUE DRESS', 'boutique-dress', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4392', 0, '', '<p>77:4392<br />\r\nBOUTIQUE DRESS<br />\r\nPRICE: 3pcs:2200 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs:2050 tk<br />\r\nKAMIJ: cotton base rayon santone semi stitch kamij with gotapatti, real mirror, cut dana, pearl beads, spring , stone karchopi hand work.<br />\r\nSIZE: body:50&rdquo; long:44&rdquo; sleeves:19&rdquo;&nbsp;</p>\r\n\r\n<p>ORNA: pure with gotapatti lacing stoning and tercel jhull worked 2.5 mtr full size complete Orna .</p>\r\n\r\n<p>PANT: viscous cotton unstitch 2.25 mtr pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Meroon&nbsp;<br />\r\n2. Teal</p>\r\n', '', NULL, '', 2200, 'YES', '2023-03-10 06:38:33', 40010, 0, '0000-00-00 00:00:00'),
(29, 'SHORT GOWN KURTY 2PCSÂ ', 'short-gown-kurty-2pcs', '2 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4371', 0, '', '<p>77:4371<br />\r\nSHORT GOWN KURTY 2PCS&nbsp;<br />\r\nPRICE: 1750 tk</p>\r\n\r\n<p>KURTY: digital printed pure muslin cotton base silk with added cotton inner stitch short gown style designer Kurty with sarvaski stone work and designer cuff and adjustable cord on sleeves.<br />\r\nSIZE: body:46&rdquo; long:45&rdquo; sleeves:19&rdquo;</p>\r\n\r\n<p>ORNA: dyed pure 2.5 mtr full size complete orna with gotapatti lacing sarvaski stoning and tercel jhull work.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Peachy pink&nbsp;<br />\r\n2. Light orange</p>\r\n', '', NULL, '', 1750, 'YES', '2023-03-10 06:44:05', 40010, 0, '0000-00-00 00:00:00'),
(30, 'PARTY WEAR BOUTIQUE DRESSÂ ', 'party-wear-boutique-dress', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4380', 0, '', '<p>77:4380<br />\r\nPARTY WEAR BOUTIQUE DRESS&nbsp;<br />\r\nPRICE: 3pcs:2500 tk<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2pcs:2350 tk<br />\r\nKAMIJ: muslin orgenja with cotton inner semi stitch kamij style dress with zero size sequins embroidery work .<br />\r\nSIZE: body:52 long:46&rdquo; sleeves:20&rdquo;</p>\r\n\r\n<p>ORNA: muslin orgenja 2.5 mtr full size complete orna with allover heavy zero size sequins embroidery , cutwork and tercel jhull work.</p>\r\n\r\n<p>PANT: viscous cotton 2.25 mtr unstitch pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Dirk Mof&nbsp;<br />\r\n2. Mastered</p>\r\n', '', NULL, '', 2500, 'YES', '2023-03-10 06:47:21', 40010, 0, '0000-00-00 00:00:00'),
(31, 'Delhi boutique pure mashlin orgenja party wear dress', 'delhi-boutique-pure-mashlin-orgenja-party-wear-dress', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '3974', 0, '', '<p>77:3974<br />\r\nPARTY WEAR DRESS&nbsp;<br />\r\n*3pcs*- 2900 tk<br />\r\n*2pcs*- 2750 tk<br />\r\n*Kamij*- pure &nbsp;orgeja kamij style semi stitch dress with reshom thread ðŸ§µ sequins embroidery and cutwork.<br />\r\n*Size*- body: 56&rdquo; long: 46&rdquo; side sleeves.<br />\r\nDupatta- pure mashlin orgenja full size dupatta with allover reshom thread ðŸ§µ sequins embroidery, cutwork and tercel jhull work.<br />\r\n*Bottom*- unstitch viscous cotton pant piece 2.25 mtr</p>\r\n\r\n<p>Colour-<br />\r\n1. Mint&nbsp;<br />\r\n2. Lavender</p>\r\n', '', NULL, '', 2900, 'YES', '2023-03-10 07:12:14', 40010, 40010, '2023-03-12 16:11:13'),
(32, 'COTTON BOUTIQUE DRESSÂ ', 'cotton-boutique-dress', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4255', 0, '', '<p>77:4255<br />\r\nCOTTON BOUTIQUE DRESS&nbsp;<br />\r\nPRICE: 3pcs: 1350 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs: 1200 tk<br />\r\nKAMIJ: tidye printed premium cotton unstitch kamij material with borin chikenkari and lacing work.<br />\r\nDIZE: body:80&rdquo; long:47&rdquo; sleeves: side sleeves.</p>\r\n\r\n<p>ORNA : tidye printed premium soft cotton 2.5 mtr full size complete dupatta with tercel jhull work.</p>\r\n\r\n<p>PANT : 2.25 mtr viscous cotton unstitch pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Paste&nbsp;<br />\r\n2. Red</p>\r\n', '', NULL, '', 1350, 'YES', '2023-03-10 07:14:17', 40010, 0, '0000-00-00 00:00:00'),
(33, 'CHIKENKARI ANARKOLI 2pcs with SKIRT GHARARAÂ ', 'chikenkari-anarkoli-2pcs-with-skirt-gharara', '2 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4381', 0, '', '<p>77:4381<br />\r\nCHIKENKARI ANARKOLI 2pcs with SKIRT GHARARA&nbsp;</p>\r\n\r\n<p>PRICE: Kurty 2pcs: 1500 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Skirt Gharara: 1100 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Package 3pcs:2450 tk<br />\r\nKURTY : cotton chikenkari stitch anarkoli style designer kurty .<br />\r\nSIZE: body:46&rdquo; long:47&rdquo; sleeves:19&rdquo;<br />\r\nBelt: 72&rdquo;</p>\r\n\r\n<p>ORNA: tidye printed pure 2.5 mtr full size complete orna with gotapatti lacing and tercel jhull work .</p>\r\n\r\n<p>SKIRT GHARARA: cotton stitch three layer skirt gharara with gotapatti lacing work.<br />\r\nSIZE : waist:52&rdquo; long: 41&rdquo; gher:140&rdquo; (each leg)</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Tomato<br />\r\n2. White</p>\r\n', '', NULL, '', 1500, 'YES', '2023-03-10 07:18:51', 40010, 0, '0000-00-00 00:00:00'),
(34, 'BOUTIQUE PARTY DRESS', 'boutique-party-dress', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4362', 0, '', '<p>77:4362<br />\r\nBOUTIQUE PARTY DRESS<br />\r\nPRICE: 3pcs:2150 &nbsp;tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs:2000 tk<br />\r\nKAMIJ: premium quality cotton base soft silk semi stitch kamij material with sequins embroidery work :<br />\r\nSIZE: body:52&rdquo; long:45&rdquo; sleeves:21&rdquo;</p>\r\n\r\n<p>ORNA: muslin orgenja 2.5 mtr full size designer orna with sequins embroidery gotapatti lacing and stoning work.</p>\r\n\r\n<p>PANT: viscous cotton 2.25 mtr unstitch pant piece material.</p>\r\n\r\n<p>Colour:<br />\r\n1. Meroon&nbsp;<br />\r\n2. Black</p>\r\n', '', NULL, '', 2150, 'YES', '2023-03-10 07:20:42', 40010, 0, '0000-00-00 00:00:00'),
(35, 'UNSTITCH COTTON CO-ORDS ', 'unstitch-cotton-co-ords-', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4339', 0, '', '<p>77:4339<br />\r\nUNSTITCH COTTON CO-ORDS &nbsp;<br />\r\n3pcs.<br />\r\nPrice: 1250 tk</p>\r\n\r\n<p>CO-ORDS : digital printed premium quality cotton unstitch dress material for top and bottom.<br />\r\nSIZE: for kamij and pant total fabric 5 mtr .</p>\r\n\r\n<p>ORNA : 2.5 mtr digital printed premium quality cotton full size dupatta.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Purple&nbsp;<br />\r\n2. Blue</p>\r\n', '', NULL, '', 1250, 'YES', '2023-03-10 07:30:30', 40010, 0, '0000-00-00 00:00:00'),
(36, 'NAYRA DRESSÂ ', 'nayra-dress', '2 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4334', 0, '', '<p>77:4334<br />\r\nNAYRA DRESS&nbsp;<br />\r\nFULL SET PRICE:2000 tk</p>\r\n\r\n<p>Kamiz 46&quot; long 49&quot; sleeve 18&quot;</p>\r\n\r\n<p>NAYRA: cotton base premium quality printed shiny silk NAYRA style stitch kurty with gotapatti karchopi, lacing and designer adjustable cord work.<br />\r\nORNA: 2.5 mtr pure full size complete orna with gotapatti lacing and gotapatti tercel work.</p>\r\n\r\n<p>PALAZZO: printed shiny silk stitch free size palazzo with gotapatti lacing work .<br />\r\nSIZE : waist:52&rdquo; long:40&rdquo; gher: 32&rdquo; (each leg)</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Purple&nbsp;<br />\r\n2. Misty</p>\r\n', '', NULL, '', 2000, 'YES', '2023-03-10 08:03:36', 40010, 0, '0000-00-00 00:00:00'),
(37, 'CO-ORDS SETS OUTFITÂ ', 'co-ords-sets-outfit', '2 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4269', 0, '', '<p>77:4269<br />\r\nCO-ORDS SETS OUTFIT&nbsp;<br />\r\nPRICE: 1200 tk</p>\r\n\r\n<p>KAMIJ: printed premium cotton stitch kamij style dress with pin track and foyle mirror embroidery work.<br />\r\nSIZE: body:46&rdquo; long:45&rdquo; sleeves:20&rdquo;</p>\r\n\r\n<p>PANT: printed premium cotton stitch straight pant with elastic waist , pin track and foyle mirror embroidery work&nbsp;<br />\r\nSIZE: waist:52&rdquo; long:40&rdquo; gher:16&rdquo;</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Paste<br />\r\n2. Pink</p>\r\n', '', NULL, '', 1200, 'YES', '2023-03-10 08:07:02', 40010, 0, '0000-00-00 00:00:00'),
(38, 'PAKISTANI INSPIREDÂ  CO-ORDS SWITCH LAWNÂ ', 'pakistani-inspired-co-ords-switch-lawn', '2 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4299', 0, '', '<p>77:4299<br />\r\nPAKISTANI INSPIRED&nbsp;<br />\r\nCO-ORDS SWITCH LAWN&nbsp;<br />\r\nPRICE:1200 tk</p>\r\n\r\n<p>KAMIJ / PANT : digital printed ðŸ’¯% &nbsp;cotton switch lawn with added chemical embroidery lace .<br />\r\nSIZE: 4.5 mtr (46&rdquo;width) total fabric to make any size &nbsp;<br />\r\nco-ords &nbsp;top and bottom.</p>\r\n\r\n<p>ORNA: 2.5 mtr digital printed ðŸ’¯% switch cotton lawn full size dupatta.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Black/ Golden&nbsp;<br />\r\n2. Black / Peach</p>\r\n', '', NULL, '', 1200, 'YES', '2023-03-10 08:09:56', 40010, 0, '0000-00-00 00:00:00'),
(39, 'COTTON JAMDANI EMBROIDERY DRESSÂ ', '4263', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4263', 0, '', '<p>77:4263<br />\r\nCOTTON JAMDANI EMBROIDERY DRESS&nbsp;<br />\r\nPRICE: 3pcs:1750 tk<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2pcs:1600 tk<br />\r\nKAMIJ: premium quality cotton unstitch kamij material with jamdani motifs embroidery work .<br />\r\nDIZE: body:62&rdquo; long:46&rdquo; sleeves: side sleeves.</p>\r\n\r\n<p>ORNA: premium soft cotton 2.5 mtr full size complete dupatta with jamdani motifs embroidery and tercel jhull work.</p>\r\n\r\n<p>PANT: viscous cotton unstitch 2.25 mtr pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Lavender/ OffWhite&nbsp;<br />\r\n2. Paste / lavender</p>\r\n', '', NULL, '', 1750, 'YES', '2023-03-10 08:14:04', 40010, 0, '0000-00-00 00:00:00'),
(40, 'COTTON EMBROIDERY DRESS', 'cotton-embroidery-dress', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4163', 0, '', '<p>77:4163<br />\r\nCOTTON EMBROIDERY DRESS&nbsp;<br />\r\nPRICE: 3pcs:1800 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs: 1650 tk</p>\r\n\r\n<p>KAMIJ: premium quality cotton unstitch kamij material with Jamdani motifs embroidery tercel and craft work .<br />\r\nSIZE: body:60&rdquo; long:45&rdquo; sleeves:20&rdquo;</p>\r\n\r\n<p>ORNA: &nbsp;premium quality soft cotton 2.5 mtr full size dupatta with Jamdani motifs embroidery and tercel jhull work.</p>\r\n\r\n<p>PANT : 2.25 mtr viscous cotton unstitch pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Magenta / purple<br />\r\n3. Yellow / Dirk green</p>\r\n', '', NULL, '', 1800, 'YES', '2023-03-10 08:17:06', 40010, 0, '0000-00-00 00:00:00'),
(41, 'SEQUINS WORK COTTON LAWNÂ ', 'sequins-work-cotton-lawn', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4290', 0, '', '<p>77:4290<br />\r\nSEQUINS WORK COTTON LAWN&nbsp;<br />\r\n3pcs : 1600 tk<br />\r\n2pcs : 1450 tk</p>\r\n\r\n<p>KAMIJ: Sequins embroidery work &nbsp;80 count ðŸ’¯% cotton<br />\r\ndigital printed lawn .<br />\r\nSIZE : body: 80&rdquo; long: 46&rdquo; sleeves: 20&rdquo;</p>\r\n\r\n<p>DUPATTA : 80 count ðŸ’¯% soft cotton full size digital printed lawn .</p>\r\n\r\n<p>BOTTOM: unstitch viscous cotton pant piece 2.25 mtr&nbsp;</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Grey / Misty&nbsp;<br />\r\n2. Grey/ mastered</p>\r\n', '', NULL, '', 1600, 'YES', '2023-03-10 08:19:48', 40010, 0, '0000-00-00 00:00:00'),
(42, 'Summer demanding COTTON LAWN ', 'summer-demanding-cotton-lawn-', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4057', 0, '', '<p>77:4057<br />\r\nðŸŒ¸Summer demanding COTTON LAWN ðŸ‹<br />\r\n3pcs : 1650 tk<br />\r\n2pcs : 1500 tk</p>\r\n\r\n<p>KAMIJ: Sequins embroidery work &nbsp;80 count ðŸ’¯% cotton<br />\r\ndigital printed lawn .<br />\r\nSIZE : body: 80&rdquo; long: 46&rdquo; sleeves: 20&rdquo;</p>\r\n\r\n<p>DUPATTA : 80 count ðŸ’¯% soft cotton full size digital printed lawn .</p>\r\n\r\n<p>BOTTOM: unstitch viscous cotton pant piece 2.25 mtr&nbsp;</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Peachy pink ðŸŒ¸<br />\r\n2. Lemon ðŸ‹</p>\r\n', '', NULL, '', 1650, 'YES', '2023-03-10 08:22:00', 40010, 0, '0000-00-00 00:00:00'),
(43, 'DILHI BOUTIQUE DRESS', 'dilhi-boutique-dress', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4027', 0, '', '<p>77:4027<br />\r\nâ¤ï¸DILHI BOUTIQUE DRESSðŸ’ž<br />\r\nPRICE- 3pcs: 2850 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2pcs: 2700 tk<br />\r\nKAMIJ- premium quality cotton base silk kamij style semi stitch dress with embroidery and jardoji work with zero cut dana , stone and chumki .<br />\r\nSIZE : body: 54&rdquo; &nbsp;long: 45&rdquo; sleeves: 21&rdquo;</p>\r\n\r\n<p>DUPATTA: pure muslin digital printed orgenja full size dupatta with sequins embroidery and crystal jhull work.<br />\r\nBOTTOM: viscous cotton pant piece material 2.25 mtr .<br />\r\nCOLOUR:<br />\r\n1. Red â¤ï¸<br />\r\n2. Magenta ðŸ’ž</p>\r\n', '', NULL, '', 2850, 'YES', '2023-03-10 08:40:40', 40010, 0, '0000-00-00 00:00:00'),
(44, 'BOUTIQUE DREESÂ ', 'boutique-drees', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '3408', 0, '', '<p>77:3408<br />\r\nBOUTIQUE DREES&nbsp;<br />\r\nPRICE: 3pcs: 1850 tk<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2pcs: 1700 tk<br />\r\nKAMIJ: premium quality cotton base soft silk unstitch kamij material with katha stitch embroidery work.<br />\r\nSIZE: body:60&rdquo; long:46&rdquo; sleeves:side sleeves.</p>\r\n\r\n<p>ORNA : 2.5 mtr muslin pure cotton full size complete orna with katha stitch embroidery and tercel jhull work.</p>\r\n\r\n<p>PANT : 2.25 mtr viscous cotton unstitch pant piece material .</p>\r\n\r\n<p>COLOUR:&nbsp;<br />\r\n1. Teal<br />\r\n2. Chocolate</p>\r\n', '', NULL, '', 1900, 'YES', '2023-03-10 08:43:56', 40010, 0, '0000-00-00 00:00:00'),
(45, 'PRINTED COTTON 2PCS', 'printed-cotton-2pcs', '2 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4233', 0, '', '<p>77:4233<br />\r\nPRINTED COTTON 2PCS<br />\r\nPRICE: 800 tk</p>\r\n\r\n<p>KAMIJ: printed premium cotton unstitch kamij material.<br />\r\nSIZE: body:82&rdquo; long:47&rdquo; sleeves: side sleeves.</p>\r\n\r\n<p>ORNA: printed premium cotton 2.5 mtr full size dupatta.</p>\r\n\r\n<p>PANT: 2.25 mtr viscous cotton unstitch pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Cream / Red<br />\r\n2. Lavender/ magenta</p>\r\n', '', NULL, '', 800, 'YES', '2023-03-10 09:34:05', 40010, 0, '0000-00-00 00:00:00'),
(46, 'BOUTIQUE PRESSÂ ', 'boutique-press', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4323', 0, '', '<p>77:4323<br />\r\nBOUTIQUE PRESS&nbsp;<br />\r\nPRICE: 3pcs:1900 tk&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 3pcs:1750 tk<br />\r\nKAMIJ: digital printed mol mol cotton unstitch dress material with necklace and cuff foyle mirror embroidery and gotapatti lacing work.<br />\r\nSIZE: body:80&rdquo; long:47&rdquo; sleeves: 21&rdquo;</p>\r\n\r\n<p>ORNA: digital printed mol mol cotton 2.5 mtr full size complete orna with gotapatti lacing and tercel jhull work .</p>\r\n\r\n<p>PANT : 2.25 mtr viscous cotton unstitch pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Chocolate&nbsp;<br />\r\n2. Mastered</p>\r\n', '', NULL, '', 1900, 'YES', '2023-03-10 09:35:18', 40010, 0, '0000-00-00 00:00:00'),
(48, 'DELHI BOUTIQUE DRESS ', 'delhi-boutique-dress-', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '3995', 0, '', '<p>77:3995<br />\r\nðŸŒ·DELHI BOUTIQUE DRESS ðŸŒ¸</p>\r\n\r\n<p>PRICE :<br />\r\n3pcs: 2100 tk<br />\r\n2pcs: 1950 tk</p>\r\n\r\n<p>KAMIJ: equat printed cotton base premium silk kamij style dress material with gotapatti jardoji work ðŸª¡ðŸ§µneckline .<br />\r\nSIZE: body: 88&rdquo; long: 46&rdquo; side sleeves.<br />\r\nDUPATTA: Orgenja with ari embroidery , cut work and tercel jhull work full size dupatta.<br />\r\nBOTTOM: viscous cotton pant piece 2.25 mtr&nbsp;</p>\r\n\r\n<p>COLOUR:<br />\r\n1. OffWhite/ equa green&nbsp;<br />\r\n2. OffWhite/ misty</p>\r\n', '', NULL, '', 2100, 'YES', '2023-03-10 11:17:11', 40010, 0, '0000-00-00 00:00:00'),
(49, '3798', '3798', '3 Pcs', NULL, 1, '', 'Inactive', 1, 0, 0, 0, '3798', 0, '', '<p>3798</p>\r\n', '', NULL, '', 3400, 'YES', '2023-03-11 15:55:42', 40010, 40010, '2023-03-12 02:59:32'),
(50, '4266', '4266', '3 Pcs', NULL, 1, '', 'Inactive', 1, 0, 0, 0, '4266', 0, '', '<p>4266</p>\r\n', '', NULL, '', 2900, 'YES', '2023-03-11 16:05:12', 40010, 0, '0000-00-00 00:00:00'),
(51, '4293', '4293', '3 Pcs', NULL, 1, '', 'Inactive', 1, 0, 0, 0, '4293', 0, '', '<p>4293</p>\r\n', '', NULL, '', 1850, 'YES', '2023-03-11 16:11:25', 40010, 0, '0000-00-00 00:00:00'),
(52, '4258', '4258', '3 Pcs', NULL, 1, '', 'Inactive', 1, 0, 0, 0, '4258', 0, '', '<p>4258</p>\r\n', '', NULL, '', 1300, 'YES', '2023-03-11 16:25:00', 40010, 0, '0000-00-00 00:00:00'),
(54, '4082', '4082', '3p', NULL, 1, '', 'Inactive', 1, 0, 0, 0, '4082', 0, '', '<p>4082</p>\r\n', '', NULL, '', 800, 'YES', '2023-03-11 16:48:17', 40010, 0, '0000-00-00 00:00:00'),
(55, '4329', '4329', '3 Pcs', NULL, 1, '', 'Inactive', 1, 0, 0, 0, '4329', 0, '', '<p>4329</p>\r\n', '', NULL, '', 1650, 'YES', '2023-03-11 16:56:37', 40010, 0, '0000-00-00 00:00:00'),
(56, '4340', '4340', '3p', NULL, 1, '', 'Inactive', 1, 0, 0, 0, '4340', 0, '', '<p>4340</p>\r\n', '', NULL, '', 1650, 'YES', '2023-03-11 17:06:05', 40010, 0, '0000-00-00 00:00:00'),
(57, '4391', '4391', '3 Pcs', NULL, 1, '', 'Inactive', 1, 0, 0, 0, '4391', 0, '', '<p>77:4391<br />\r\nPARTY WEAR NAYRA&nbsp;<br />\r\nPRICE: single Nayra:1550 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Nayra/Orna :1900 tk<br />\r\n&nbsp; &nbsp; &nbsp; Nayra/Orna/Pant:2400 tk<br />\r\nNAYRA: digital printed shiny silk Nayra style stitch dress with foyle mirror stoning lacing and adjustable cord work.<br />\r\nSIZE: boo:46&rdquo; long:49&rdquo; sleeves:19&rdquo;</p>\r\n\r\n<p>ORNA: butterfly nate 2.5 mtr full size complete orna with allover sequins embroidery, lacing and designer tercel jhull work.</p>\r\n\r\n<p>PANT: digital printed stitch pant.<br />\r\nSize: waist:50&rdquo; long:39&rdquo; gher:34&rdquo; (each leg)</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Red&nbsp;<br />\r\n2. Peach</p>\r\n', '', NULL, '', 2400, 'YES', '2023-03-11 17:09:30', 40010, 0, '0000-00-00 00:00:00'),
(58, '3804', '3804', 'Sharee', NULL, 1, '', 'Inactive', 1, 0, 0, 0, '3804', 0, '', '<p>3804</p>\r\n', '', NULL, '', 2000, 'YES', '2023-03-11 17:25:41', 40010, 0, '0000-00-00 00:00:00'),
(59, '3372', '3372', '3 Pcs', NULL, 1, '', 'Inactive', 1, 0, 0, 0, '3372', 0, '', '<p>77:3372<br />\r\nDELHI BOUTIQUE DRESS&nbsp;<br />\r\nPRICE: 3pieces: 1800 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pieces: 1650 tk<br />\r\nBody : 60&rdquo; &nbsp;Long : 45&rdquo; &nbsp;Side sleeve.<br />\r\nCotton base soft silk with reshom and jari embroidery and cut work.<br />\r\nOrna : 2.5 mtr Maslin pure cotton with reshom and jari embroidery, cut work and tercel jhull.<br />\r\nPant : 2.26 mtr viscous cotton.<br />\r\nColour:<br />\r\n1. Mastured&nbsp;<br />\r\n2. Brick</p>\r\n', '', NULL, '', 1800, 'YES', '2023-03-12 03:58:31', 40010, 0, '0000-00-00 00:00:00'),
(60, '4268', '4268', '3 Pcs', NULL, 1, '', 'Inactive', 1, 0, 0, 0, '4268', 0, '', '<p>77:4268<br />\r\nDELHI BOUTIQUE DRESS&nbsp;<br />\r\nPRICE: 3pcs:1900 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs:1750 tk<br />\r\nKAMIJ: premium quality cotton base soft silk unstitch kamij material with micro mini size sequins embroidery work.&nbsp;<br />\r\nDIZE: body:60&rdquo; long:46&rdquo; sleeves: side sleeves.</p>\r\n\r\n<p>ORNA: digital printed 2.5 mtr full size complete dupatta with &nbsp; &nbsp; tercel jhull work.</p>\r\n\r\n<p>PANT: 2.25 mtr viscous cotton pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Teal<br />\r\n2. Meroon</p>\r\n', '', NULL, '', 1900, 'YES', '2023-03-12 04:06:44', 40010, 0, '0000-00-00 00:00:00'),
(61, '4356', '4356', '3 Pcs', NULL, 1, '', 'Inactive', 1, 0, 0, 0, '4356', 0, '', '<p>77:4356<br />\r\nCOTTON BOUTIQUE DRESS&nbsp;<br />\r\nPRICE: 3pcs: 1100 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs: 950 tk<br />\r\nKAMIJ: tidye printed 80 count ðŸ’¯% cotton unstitch dress material with chikenkari worked.<br />\r\nSIZE: total fabric 65&rdquo; (58&rdquo; width) can make body :50&rdquo; long:45&rdquo; sleeves: side sleeves.<br />\r\nORNA: tidye printed 80 count ðŸ’¯% cotton 2.5 mtr full size Orna .</p>\r\n\r\n<p>PANT: viscous cotton unstitch 2.25 mtr pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Dirk Pink&nbsp;<br />\r\n2. Parrot Green</p>\r\n', '', NULL, '', 1100, 'YES', '2023-03-12 04:11:18', 40010, 0, '0000-00-00 00:00:00'),
(62, '4372', '4372', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4372', 0, '', '<p>77:4372<br />\r\nBOUTIQUE DRESS<br />\r\nPRICE: 3pcs:1750 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs:1600 tk<br />\r\nKAMIJ: Digital printed jacquard design cotton with bottom chikenkari and cutwork .<br />\r\nSIZE: body:62&rdquo; long:45&rdquo; sleeves: side sleeves.</p>\r\n\r\n<p>ORNA: silken pure 2.5 mtr full size complete dupatta with chikenkari , cutwork , two side frill and tercel jhull work .</p>\r\n\r\n<p>PANT: viscous cotton unstitch 2.25 mtr pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Mint paste<br />\r\n2. Pink</p>\r\n', '', NULL, '', 1750, 'YES', '2023-03-12 04:30:03', 40010, 0, '0000-00-00 00:00:00'),
(63, '4288', '4288', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4288', 0, '', '<p>77:4288<br />\r\nBOUTIQUE DRESS&nbsp;<br />\r\nPRICE : 3pcs:2100 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2pcs:1950 tk<br />\r\nKAMIJ: cotton base rayon santon unstitch dress material with ari embroidery , print patches and gotapatti lacing work.<br />\r\nSIZE: body:58&rdquo; long:46&rdquo; sleeves:19&rdquo;</p>\r\n\r\n<p>ORNA: digital printed 2.5 mtr kashmiri silk full size complete dupatta with gotapatti lacing and ari embroidery designer tercel jhull work.</p>\r\n\r\n<p>PANT: 2.25 mtr unstitch viscous cotton pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Teal<br />\r\n2. Dirk meroon</p>\r\n', '', NULL, '', 2100, 'YES', '2023-03-12 04:32:43', 40010, 0, '0000-00-00 00:00:00'),
(64, '4376', '4376', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4376', 0, '', '<p>77:4376<br />\r\nCOTTON BOUTIQUE DRESS.<br />\r\nPRICE: 3pcs:1550 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs:1400 tk<br />\r\nKAMIJ: sequins embroidery 80 count ðŸ’¯% cotton digital printed unstitch dress material.<br />\r\nSIZE: 42 width total 3 mtr fabric. ( can make any size dress )</p>\r\n\r\n<p>ORNA: sequins embroidery 80 cotton ðŸ’¯% cotton digital printed 2.5 mtr full size Orna .</p>\r\n\r\n<p>PANT: viscous cotton 2.25 mtr pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. White&nbsp;<br />\r\n2. Yellow</p>\r\n', '', NULL, '', 1550, 'YES', '2023-03-12 04:36:02', 40010, 0, '0000-00-00 00:00:00'),
(65, '4353sk', '4353sk', 'single', NULL, 1, '', 'Inactive', 1, 0, 0, 0, '4353sk', 0, '', '<p>77:4353<br />\r\nGHAGRA KAMIJ 3pcs<br />\r\nPRICE: kamij:1250 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Orna:600 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ghagra:1450 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Kamij orna:1750 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ghagra orna:2000 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Package 3pcs:3150 tk<br />\r\nKAMIJ: cotton rayon santone semi stitch kamij style dress with foyle mirror ari embroidery and appliqu&eacute; work.<br />\r\nSIZE: body:48&rdquo; long:45&rdquo; sleeves:19&rdquo;</p>\r\n\r\n<p>ORNA: premium soft cotton 2.5 mtr full size complete orna with appliqu&eacute; gotapatti stoning and tercel jhull work.</p>\r\n\r\n<p>GHAGRA: premium soft cotton ready to wear free size complete five layer GHAGRA with appliqu&eacute; and gather work.<br />\r\nSIZE: waist:50&rdquo; long:43&rdquo; gher:280&rdquo;</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Mastered/ white<br />\r\n2. Red / mastered</p>\r\n', '', NULL, '', 1250, 'YES', '2023-03-12 05:18:38', 40010, 0, '0000-00-00 00:00:00'),
(66, '4246', '4246', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4246', 0, '', '', '', NULL, '', 1800, 'YES', '2023-03-12 07:39:07', 40010, 0, '0000-00-00 00:00:00'),
(67, '4322', '4322', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4322', 0, '', '<p>4322</p>\r\n', '', NULL, '', 1900, 'YES', '2023-03-12 08:06:32', 40010, 0, '0000-00-00 00:00:00'),
(68, '4382', '4382', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4382', 0, '', '<p>&nbsp;</p>\r\n\r\n<p>77:4382<br />\r\nSEQUINS WORK COTTON LAWN&nbsp;<br />\r\n3pcs : 1650 tk<br />\r\n2pcs : 1500 tk</p>\r\n\r\n<p>KAMIJ: Sequins embroidery work &nbsp;80 count ðŸ’¯% cotton<br />\r\ndigital printed lawn .<br />\r\nSIZE : body: 80&rdquo; long: 46&rdquo; sleeves: 20&rdquo;</p>\r\n\r\n<p>DUPATTA : 80 count ðŸ’¯% soft cotton full size digital printed lawn .</p>\r\n\r\n<p>BOTTOM: unstitch viscous cotton pant piece 2.25 mtr&nbsp;</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Mint / dirk green<br />\r\n2. Pink / purple</p>\r\n', '', NULL, '', 1650, 'YES', '2023-03-12 08:20:49', 40010, 40010, '2023-03-12 18:42:01'),
(69, '4122', '4122', '2 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4122', 0, '', '<p>4122</p>\r\n', '', NULL, '', 1850, 'YES', '2023-03-12 11:15:20', 40010, 0, '0000-00-00 00:00:00'),
(70, '4398', '4398', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4398', 0, '', '<p>77:4398<br />\r\nSEQUINS WORK COTTON LAWN&nbsp;<br />\r\n3pcs : 1650 tk<br />\r\n2pcs : 1500 tk</p>\r\n\r\n<p>KAMIJ: Sequins embroidery work &nbsp;80 count ðŸ’¯% cotton<br />\r\ndigital printed lawn .<br />\r\nSIZE : body: 80&rdquo; long: 46&rdquo; sleeves: 20&rdquo;</p>\r\n\r\n<p>DUPATTA : 80 count ðŸ’¯% soft cotton full size digital printed lawn .</p>\r\n\r\n<p>BOTTOM: unstitch viscous cotton pant piece 2.25 mtr&nbsp;</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Light lemon<br />\r\n2. Light mint</p>\r\n', '', NULL, '', 1650, 'YES', '2023-03-13 07:26:38', 40010, 0, '0000-00-00 00:00:00'),
(71, '4397', '4397', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4397', 0, '', '<p>77:4397<br />\r\nJAMDANI EMBROIDERY WORKED DRESS&nbsp;<br />\r\nPRICE: 3pcs: 1750 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pce: 1600 tk<br />\r\nKAMIJ: premium quality cotton unstitch kamij material with Jamdani embroidery work.<br />\r\nSIZE: body:60&rdquo; long:45&rdquo; sleeves: side sleeves.</p>\r\n\r\n<p>ORNA: cotta cotton 2.5 mtr full size complete dupatta with &nbsp;Jamdani embroidery and tercel jhull work.</p>\r\n\r\n<p>PANT: viscous cotton 2.25 mtr &nbsp;unstitch pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Purple/ pink<br />\r\n2. SeaGreen/ paste</p>\r\n', '', NULL, '', 1750, 'YES', '2023-03-13 07:43:49', 40010, 40010, '2023-03-13 17:46:40'),
(72, '4396', '4396', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '4396', 0, '', '<p>77:4396<br />\r\nPARTY WEAR KOTY GOWN&nbsp;<br />\r\nPRICE:4000 tk</p>\r\n\r\n<p>GOWN: viscous gorget with cotton inner four layer designer gown with cut dana chumki &nbsp;stone karchopi hand work.<br />\r\nSIZE: body:52&rdquo; long:53&rdquo; sleeves:19&rdquo; gher:180&rdquo;</p>\r\n\r\n<p>KOTY: viscous gorget designer Koty with cut dana chumki stone karchopi hand work.<br />\r\nSIZE: width:74&rdquo; long:45&rdquo;&nbsp;</p>\r\n\r\n<p>BELT: same fabric adjustable belt with cut dana karchopi and sequins embroidery work .</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Yellow&nbsp;<br />\r\n2. Meroon</p>\r\n', '', NULL, '', 4000, 'YES', '2023-03-13 07:50:21', 40010, 0, '0000-00-00 00:00:00'),
(73, '3730', '3730', '3 Pcs', NULL, 1, '', 'Active', 1, 0, 0, 0, '3730', 0, '', '<p>3730</p>\r\n', '', NULL, '', 3050, 'YES', '2023-03-13 07:52:57', 40010, 0, '0000-00-00 00:00:00'),
(74, '4375', '4375', '3 Pcs', NULL, 1, '', 'Inactive', 1, 0, 0, 0, '4375', 0, '', '<p>77:4375<br />\r\nDELHI INSPIRE BOUTIQUE DRESS&nbsp;<br />\r\nPRICE: 3pcs:2500 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs: 2350 tk<br />\r\nKAMIJ: premium quality cotton base soft silk unstitch kamij material with jari mix yarn embroidery and nate base cutwork and stoning work.<br />\r\nSIZE: body:60&rdquo; long:46&rdquo; sleeves: side sleeves.</p>\r\n\r\n<p>ORNA: pure orgenja 2.5 mtr full size complete orna with sequins embroidery and four side &nbsp;nate base cut out work and tercel jhull work.</p>\r\n\r\n<p>PANT: viscous cotton 2.25 mtr viscous cotton unstitch pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Paste<br />\r\n2. Peach</p>\r\n', '', NULL, '', 2500, 'YES', '2023-03-14 07:33:10', 40010, 0, '0000-00-00 00:00:00'),
(75, '4388', '4388', '4388', NULL, 1, '', 'Active', 1, 0, 0, 0, '4388', 0, '', '<p>77:4388<br />\r\nPARTY WEAR BOUTIQUE DRESS.<br />\r\nPRICE: 3pcs:2850 tk<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2pcs:2700 tk<br />\r\nKAMIJ: cotton base premium quality soft silk semi stitch kamij style dress with heavy embroidery, chumki, cut dana, stone karchopi hand work.<br />\r\nSIZE: body:52&rdquo; long:44&rdquo; sleeves:20&rdquo;&nbsp;</p>\r\n\r\n<p>ORNA: muslin orgenja 2.5 mtr full size complete orna with embroidery cutwork and tercel &nbsp;work .</p>\r\n\r\n<p>PANT: viscous cotton unstitch 2.25 mtr pant piece material.</p>\r\n\r\n<p>COLOUR:<br />\r\n1. Dirk mehendi&nbsp;<br />\r\n2. Dirk meroon</p>\r\n', '', NULL, '', 2850, 'YES', '2023-03-15 12:07:00', 40010, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `item_photo`
--

CREATE TABLE `item_photo` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_photo` varchar(255) DEFAULT NULL,
  `color` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item_photo`
--

INSERT INTO `item_photo` (`id`, `item_id`, `item_photo`, `color`) VALUES
(1, 1, '6409fc66c6b8a.jpg', '19'),
(2, 1, '6409fc66c7162.jpg', '20'),
(3, 2, '640a081a167f8.jpg', '26'),
(4, 2, '640a081a16b18.jpg', '25'),
(5, 3, '640a099666d86.jpg', '28'),
(6, 3, '640a09966714c.jpg', '27'),
(7, 4, '640a0a6d9dd78.jpg', '29'),
(8, 5, '640a0b323df8f.jpg', '31'),
(9, 6, '640a0c1d6bc76.jpg', '33'),
(10, 7, '640a0cf5621ae.jpg', '36'),
(11, 8, '640a0d90ee211.jpg', '18'),
(12, 9, '640a0e5d72e98.jpg', '38'),
(77, 6, '640b0524dc80f.jpg', '34'),
(14, 11, '640a1034ec926.jpg', '40'),
(15, 12, '640a10c0e35ad.jpg', '32'),
(16, 14, '640a124d00a3b.jpg', '44'),
(73, 15, '640afe220ac65.jpg', '40'),
(18, 21, '640a1947975f0.jpg', '19'),
(19, 22, '640a1c53d1f35.jpg', '15'),
(20, 22, '640a1c53d259a.jpg', '19'),
(21, 22, '640a1c53d299a.jpg', '50'),
(22, 23, '640a1d4ab92b7.jpg', '19'),
(23, 23, '640a1d4ab9a92.jpg', '50'),
(24, 23, '640a1d4ab9f36.jpg', '15'),
(25, 24, '640ac31e7de81.jpg', '51'),
(26, 24, '640ac31e7e1fe.jpg', '52'),
(27, 25, '640ace31b504a.jpg', '45'),
(28, 25, '640ace31b5541.jpg', '46'),
(29, 26, '640acf3fc382d.jpg', '19'),
(30, 26, '640acf3fc3bf0.jpg', '16'),
(31, 27, '640acff35ee2f.jpg', '53'),
(32, 27, '640acff35f38e.jpg', '54'),
(33, 28, '640ad069683f9.jpg', '24'),
(34, 28, '640ad0696881a.jpg', '47'),
(35, 29, '640ad1b5895de.jpg', '38'),
(36, 29, '640ad1b589c30.jpg', '37'),
(37, 30, '640ad2794a74c.jpg', '55'),
(38, 30, '640ad2794ab5a.jpg', '16'),
(39, 31, '640ad84e7b3a9.jpg', '33'),
(40, 31, '640ad84e7b7b1.jpg', '14'),
(41, 32, '640ad8c9b78db.jpg', '39'),
(42, 32, '640ad8c9b7df4.jpg', '15'),
(43, 33, '640ad9db90cbe.jpg', '58'),
(44, 33, '640ad9db91036.jpg', '50'),
(45, 34, '640ada4a5858f.jpg', '24'),
(46, 34, '640ada4a58a55.jpg', '19'),
(47, 35, '640adc9694bdb.jpg', '60'),
(48, 35, '640adc9695362.jpg', '26'),
(49, 36, '640ae4585880a.jpg', '18'),
(50, 36, '640ae45858cdd.jpg', '60'),
(51, 37, '640ae52626ae9.jpg', '63'),
(52, 37, '640ae52627031.jpg', '39'),
(53, 38, '640ae5d4616e6.jpg', '2'),
(54, 38, '640ae5d461b00.jpg', '64'),
(55, 39, '640ae6cc59ac6.jpg', '65'),
(56, 39, '640ae6cc59df6.jpg', '66'),
(57, 40, '640ae78270390.jpg', '67'),
(58, 40, '640ae78270682.jpg', '68'),
(59, 41, '640ae824602dc.jpg', '69'),
(60, 41, '640ae82460708.jpg', '70'),
(61, 42, '640ae8a88e26b.jpg', '38'),
(62, 42, '640ae8a88e67f.jpg', '7'),
(63, 43, '640aed089e473.jpg', '15'),
(64, 43, '640aed089e998.jpg', '9'),
(65, 44, '640aedcc40ad8.jpg', '47'),
(66, 44, '640aedcc4132c.jpg', '74'),
(67, 45, '640af98d1e5b2.jpg', '77'),
(68, 45, '640af98d1e980.jpg', '79'),
(69, 46, '640af9d6afe49.jpg', '74'),
(70, 46, '640af9d6b0489.jpg', '16'),
(71, 16, '640afc48ef034.jpg', '21'),
(72, 16, '640afc48ef43d.jpg', '20'),
(74, 15, '640afe220b18e.jpg', '19'),
(78, 47, '640b0a83f0593.jpg', '15'),
(79, 47, '640b0a83f089e.jpg', '32'),
(80, 48, '640b11b7e10b4.jpg', '56'),
(81, 48, '640b11b7e14b7.jpg', '57'),
(82, 8, '640b133535e5e.jpg', '37'),
(85, 49, '640ca564c05d2.jpg', '19'),
(86, 49, '640ca564c0aa0.jpg', '80'),
(87, 50, '640ca6b8a7c69.jpg', '75'),
(88, 50, '640ca6b8a8031.jpg', '81'),
(89, 51, '640ca82d18eaf.jpg', '36'),
(90, 51, '640ca82d1936e.jpg', '59'),
(91, 52, '640cab5c3823c.jpg', '82'),
(92, 52, '640cab5c385fd.jpg', '59'),
(93, 54, '640cb0d141aea.jpg', '19'),
(94, 54, '640cb0d14221b.jpg', '24'),
(95, 55, '640cb2c5eb1ca.jpg', '7'),
(96, 55, '640cb2c5eb810.jpg', '63'),
(97, 56, '640cb4fd3dda1.jpg', '36'),
(98, 56, '640cb4fd3e27d.jpg', '59'),
(99, 57, '640cb5cae5c82.jpg', '15'),
(100, 57, '640cb5cae6198.jpg', '32'),
(101, 58, '640cb995d4996.jpg', '24'),
(102, 58, '640cb995d4df9.jpg', '19'),
(103, 59, '640d4de7af3d6.jpg', '71'),
(104, 59, '640d4de7af859.jpg', '16'),
(105, 60, '640d4fd483176.jpg', '47'),
(106, 60, '640d4fd4835b5.jpg', '24'),
(107, 61, '640d50e6c2be5.jpg', '62'),
(108, 61, '640d50e6c30b1.jpg', '61'),
(109, 62, '640d554b01f72.jpg', '72'),
(110, 62, '640d554b0223f.jpg', '63'),
(111, 63, '640d55eb71a9a.jpg', '47'),
(112, 63, '640d55eb71e5d.jpg', '73'),
(113, 64, '640d56b270489.jpg', '59'),
(114, 64, '640d56b27079b.jpg', '50'),
(115, 65, '640d60ae95a2b.jpg', '49'),
(116, 65, '640d60ae95d28.jpg', '43'),
(117, 31, '640d6d01589ce.jpg', '83'),
(118, 7, '640d6ed672dad.jpg', '35'),
(119, 17, '640d711357214.jpg', '15'),
(120, 19, '640d735409dba.jpg', '15'),
(121, 19, '640d73540a0df.jpg', '19'),
(122, 18, '640d759843375.jpg', '47'),
(123, 18, '640d75984378e.jpg', '32'),
(124, 21, '640d7667822e1.jpg', '15'),
(125, 21, '640d7667826b4.jpg', '50'),
(126, 14, '640d7981bba7e.jpg', '43'),
(127, 20, '640d7d37ce05f.jpg', '20'),
(128, 20, '640d7d37ce4b6.jpg', '49'),
(129, 66, '640d819bb175b.jpg', '36'),
(130, 66, '640d819bb1dd8.jpg', '32'),
(131, 12, '640d8643dd198.jpg', '20'),
(132, 17, '640d86f7680c8.jpg', '47'),
(133, 67, '640d880843ecb.jpg', '15'),
(134, 67, '640d880844271.jpg', '26'),
(135, 68, '640d8b61cde85.jpg', '84'),
(136, 68, '640d8b61ce233.jpg', '86'),
(137, 13, '640da60d2273e.jpg', '81'),
(138, 13, '640da60d22c23.jpg', '36'),
(139, 5, '640dab94eff85.jpg', '32'),
(140, 69, '640db4480e2d4.jpg', '15'),
(141, 69, '640db4480e782.jpg', '16'),
(142, 70, '640ed02e7015c.jpg', '87'),
(143, 70, '640ed02e7064b.jpg', '88'),
(144, 71, '640ed4e0ab0e0.jpg', '86'),
(145, 71, '640ed4e0ac7ce.jpg', '90'),
(146, 72, '640ed5bd7fa37.jpg', '59'),
(147, 72, '640ed5bd7fe3c.jpg', '24'),
(148, 73, '640ed659a63d4.jpg', '75'),
(149, 73, '640ed659a67b0.jpg', '38'),
(150, 74, '6410233636655.jpg', '39'),
(151, 74, '6410233636ae7.jpg', '32'),
(152, 75, '6411b4e43cd2c.jpg', '42'),
(153, 75, '6411b4e43d0af.jpg', '73');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` bigint(20) NOT NULL,
  `jv_no` bigint(20) NOT NULL,
  `jv_date` date NOT NULL,
  `ledger_id` bigint(10) NOT NULL,
  `dr_amt` decimal(20,2) NOT NULL,
  `cr_amt` decimal(20,2) NOT NULL,
  `narration` text NOT NULL,
  `tr_from` varchar(100) NOT NULL,
  `tr_no` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `tr_type` varchar(100) NOT NULL,
  `tr_id` varchar(100) NOT NULL,
  `payment_type` varchar(55) NOT NULL,
  `group_for` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `entry_by` int(11) NOT NULL,
  `edit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `edit_by` int(11) NOT NULL,
  `customer_type` enum('Registered','Corporate','','') NOT NULL,
  `money_receipt` varchar(100) NOT NULL,
  `warehouse` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`id`, `jv_no`, `jv_date`, `ledger_id`, `dr_amt`, `cr_amt`, `narration`, `tr_from`, `tr_no`, `customer_id`, `tr_type`, `tr_id`, `payment_type`, `group_for`, `status`, `entry_at`, `entry_by`, `edit_at`, `edit_by`, `customer_type`, `money_receipt`, `warehouse`) VALUES
(1, 20230312, '2023-03-12', 1000259, '3200.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:46:26', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(2, 20230312, '2023-03-12', 1000254, '0.00', '3200.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:46:26', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(3, 20230313, '2023-03-12', 1000259, '4800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:46:49', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(4, 20230313, '2023-03-12', 1000254, '0.00', '4800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:46:49', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(5, 20230314, '2023-03-12', 1000259, '8000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:49:36', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(6, 20230314, '2023-03-12', 1000254, '0.00', '8000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:49:36', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(7, 20230315, '2023-03-12', 1000259, '16000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:51:50', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(8, 20230315, '2023-03-12', 1000254, '0.00', '16000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:51:50', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(9, 20230316, '2023-03-12', 1000259, '22200.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:52:36', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(10, 20230316, '2023-03-12', 1000254, '0.00', '22200.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:52:36', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(11, 20230317, '2023-03-12', 1000259, '7400.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:53:13', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(12, 20230317, '2023-03-12', 1000254, '0.00', '7400.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:53:14', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(13, 20230318, '2023-03-12', 1000259, '9250.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:54:21', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(14, 20230318, '2023-03-12', 1000254, '0.00', '9250.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:54:21', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(15, 20230319, '2023-03-12', 1000259, '9250.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:54:55', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(16, 20230319, '2023-03-12', 1000254, '0.00', '9250.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:54:55', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(17, 20230320, '2023-03-12', 1000259, '9000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:55:26', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(18, 20230320, '2023-03-12', 1000254, '0.00', '9000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:55:26', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(19, 20230321, '2023-03-12', 1000259, '9000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:56:06', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(20, 20230321, '2023-03-12', 1000254, '0.00', '9000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:56:06', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(21, 20230322, '2023-03-12', 1000259, '13000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:56:41', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(22, 20230322, '2023-03-12', 1000254, '0.00', '13000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:56:41', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(23, 20230323, '2023-03-12', 1000259, '12500.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:58:42', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(24, 20230323, '2023-03-12', 1000254, '0.00', '12500.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 05:58:42', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(25, 20230324, '2023-03-12', 1000259, '10800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:01:37', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(26, 20230324, '2023-03-12', 1000254, '0.00', '10800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:01:37', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(27, 20230325, '2023-03-12', 1000259, '12600.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:02:12', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(28, 20230325, '2023-03-12', 1000254, '0.00', '12600.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:02:12', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(29, 20230326, '2023-03-12', 1000259, '8800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:03:22', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(30, 20230326, '2023-03-12', 1000254, '0.00', '8800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:03:22', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(31, 20230327, '2023-03-12', 1000259, '8800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:04:06', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(32, 20230327, '2023-03-12', 1000254, '0.00', '8800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:04:06', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(33, 20230328, '2023-03-12', 1000259, '20800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:05:10', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(34, 20230328, '2023-03-12', 1000254, '0.00', '20800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:05:10', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(35, 20230329, '2023-03-12', 1000259, '7800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:08:15', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(36, 20230329, '2023-03-12', 1000254, '0.00', '7800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:08:15', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(37, 20230330, '2023-03-12', 1000259, '23400.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:12:00', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(38, 20230330, '2023-03-12', 1000254, '0.00', '23400.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:12:00', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(39, 20230331, '2023-03-12', 1000259, '9500.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:20:53', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(40, 20230331, '2023-03-12', 1000254, '0.00', '9500.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:20:53', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(41, 20230332, '2023-03-12', 1000259, '9500.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:21:12', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(42, 20230332, '2023-03-12', 1000254, '0.00', '9500.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:21:12', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(43, 20230333, '2023-03-12', 1000259, '6000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:22:27', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(44, 20230333, '2023-03-12', 1000254, '0.00', '6000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:22:27', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(45, 20230334, '2023-03-12', 1000259, '4500.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:22:54', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(46, 20230334, '2023-03-12', 1000254, '0.00', '4500.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:22:54', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(47, 20230335, '2023-03-12', 1000259, '4350.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:24:16', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(48, 20230335, '2023-03-12', 1000254, '0.00', '4350.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:24:16', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(49, 20230336, '2023-03-12', 1000259, '4350.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:24:36', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(50, 20230336, '2023-03-12', 1000254, '0.00', '4350.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:24:36', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(51, 20230337, '2023-03-12', 1000259, '3600.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:25:30', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(52, 20230337, '2023-03-12', 1000254, '0.00', '3600.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:25:30', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(53, 20230338, '2023-03-12', 1000259, '4800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:25:57', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(54, 20230338, '2023-03-12', 1000254, '0.00', '4800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:25:57', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(55, 20230339, '2023-03-12', 1000259, '11000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:26:48', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(56, 20230339, '2023-03-12', 1000254, '0.00', '11000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:26:48', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(57, 20230340, '2023-03-12', 1000259, '6300.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:29:54', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(58, 20230340, '2023-03-12', 1000254, '0.00', '6300.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:29:54', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(59, 20230341, '2023-03-12', 1000259, '7250.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:31:11', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(60, 20230341, '2023-03-12', 1000254, '0.00', '7250.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:31:11', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(61, 20230342, '2023-03-12', 1000259, '7250.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:31:54', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(62, 20230342, '2023-03-12', 1000254, '0.00', '7250.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:31:54', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(63, 20230343, '2023-03-12', 1000259, '5200.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:39:12', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(64, 20230343, '2023-03-12', 1000254, '0.00', '5200.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:39:12', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(65, 20230344, '2023-03-12', 1000259, '6500.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:39:33', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(66, 20230344, '2023-03-12', 1000254, '0.00', '6500.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:39:33', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(67, 20230345, '2023-03-12', 1000259, '6750.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:41:43', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(68, 20230345, '2023-03-12', 1000254, '0.00', '6750.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:41:43', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(69, 20230346, '2023-03-12', 1000259, '5400.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:43:00', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(70, 20230346, '2023-03-12', 1000254, '0.00', '5400.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:43:00', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(71, 20230347, '2023-03-12', 1000259, '2700.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:43:28', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(72, 20230347, '2023-03-12', 1000254, '0.00', '2700.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:43:28', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(73, 20230348, '2023-03-12', 1000259, '4750.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:45:19', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(74, 20230348, '2023-03-12', 1000254, '0.00', '4750.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:45:19', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(75, 20230349, '2023-03-12', 1000259, '4750.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:45:48', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(76, 20230349, '2023-03-12', 1000254, '0.00', '4750.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:45:48', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(77, 20230350, '2023-03-12', 1000259, '3600.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:49:48', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(78, 20230350, '2023-03-12', 1000254, '0.00', '3600.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:49:48', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(79, 20230351, '2023-03-12', 1000259, '3600.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:50:07', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(80, 20230351, '2023-03-12', 1000254, '0.00', '3600.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:50:07', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(81, 20230352, '2023-03-12', 1000259, '2850.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:59:45', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(82, 20230352, '2023-03-12', 1000254, '0.00', '2850.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 06:59:45', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(83, 20230353, '2023-03-12', 1000259, '3800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:00:05', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(84, 20230353, '2023-03-12', 1000254, '0.00', '3800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:00:05', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(85, 20230354, '2023-03-12', 1000259, '4750.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:00:25', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(86, 20230354, '2023-03-12', 1000254, '0.00', '4750.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:00:25', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(87, 20230355, '2023-03-12', 1000259, '5100.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:02:16', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(88, 20230355, '2023-03-12', 1000254, '0.00', '5100.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:02:16', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(89, 20230356, '2023-03-12', 1000259, '6800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:02:30', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(90, 20230356, '2023-03-12', 1000254, '0.00', '6800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:02:30', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(91, 20230357, '2023-03-12', 1000259, '3200.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:09:12', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(92, 20230357, '2023-03-12', 1000254, '0.00', '3200.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:09:12', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(93, 20230358, '2023-03-12', 1000259, '4000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:10:06', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(94, 20230358, '2023-03-12', 1000254, '0.00', '4000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:10:06', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(95, 20230359, '2023-03-12', 1000259, '3600.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:13:48', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(96, 20230359, '2023-03-12', 1000254, '0.00', '3600.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:13:48', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(97, 20230360, '2023-03-12', 1000259, '6000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:18:01', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(98, 20230360, '2023-03-12', 1000254, '0.00', '6000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:18:01', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(99, 20230361, '2023-03-12', 1000268, '1890.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303121', 73, '', '', '', 1, '', '2023-03-12 17:23:56', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(100, 20230361, '2023-03-12', 1000259, '0.00', '1890.00', 'Pos Sales Collection', 'POS Collection', '202303121', 73, '', '', '', 1, '', '2023-03-12 17:23:56', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(101, 20230362, '2023-03-12', 1000259, '7500.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:28:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(102, 20230362, '2023-03-12', 1000254, '0.00', '7500.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:28:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(103, 20230363, '2023-03-12', 1000259, '18900.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:44:10', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(104, 20230363, '2023-03-12', 1000254, '0.00', '18900.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:44:10', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(105, 20230364, '2023-03-12', 1000259, '18900.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:45:11', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(106, 20230364, '2023-03-12', 1000254, '0.00', '18900.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:45:11', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(107, 20230365, '2023-03-12', 1000259, '2025.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:50:37', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(108, 20230365, '2023-03-12', 1000254, '0.00', '2025.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:50:37', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(109, 20230366, '2023-03-12', 1000259, '2025.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:50:57', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(110, 20230366, '2023-03-12', 1000254, '0.00', '2025.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:50:57', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(111, 20230367, '2023-03-12', 1000259, '4400.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:54:18', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(112, 20230367, '2023-03-12', 1000254, '0.00', '4400.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:54:18', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(113, 20230368, '2023-03-12', 1000259, '5500.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:55:37', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(114, 20230368, '2023-03-12', 1000254, '0.00', '5500.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:55:37', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(115, 20230369, '2023-03-12', 1000259, '8800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:59:51', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(116, 20230369, '2023-03-12', 1000254, '0.00', '8800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 07:59:51', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(117, 20230370, '2023-03-12', 1000259, '5250.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:03:15', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(118, 20230370, '2023-03-12', 1000254, '0.00', '5250.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:03:15', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(119, 20230371, '2023-03-12', 1000259, '2550.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:32:32', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(120, 20230371, '2023-03-12', 1000254, '0.00', '2550.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:32:32', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(121, 20230372, '2023-03-12', 1000259, '2550.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:33:18', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(122, 20230372, '2023-03-12', 1000254, '0.00', '2550.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:33:18', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(123, 20230373, '2023-03-12', 1000259, '6000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:35:23', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(124, 20230373, '2023-03-12', 1000254, '0.00', '6000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:35:23', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(125, 20230374, '2023-03-12', 1000259, '4500.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:35:40', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(126, 20230374, '2023-03-12', 1000254, '0.00', '4500.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:35:40', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(127, 20230375, '2023-03-12', 1000259, '3000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:36:31', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(128, 20230375, '2023-03-12', 1000254, '0.00', '3000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:36:31', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(129, 20230376, '2023-03-12', 1000259, '7000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:36:56', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(130, 20230376, '2023-03-12', 1000254, '0.00', '7000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:36:56', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(131, 20230377, '2023-03-12', 1000259, '7000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:39:25', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(132, 20230377, '2023-03-12', 1000254, '0.00', '7000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:39:25', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(133, 20230378, '2023-03-12', 1000259, '7000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:40:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(134, 20230378, '2023-03-12', 1000254, '0.00', '7000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:40:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(135, 20230379, '2023-03-12', 1000259, '4200.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:41:47', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(136, 20230379, '2023-03-12', 1000254, '0.00', '4200.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:41:47', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(137, 20230380, '2023-03-12', 1000259, '4200.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:42:22', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(138, 20230380, '2023-03-12', 1000254, '0.00', '4200.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:42:22', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(139, 20230381, '2023-03-12', 1000259, '4200.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:52:22', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(140, 20230381, '2023-03-12', 1000254, '0.00', '4200.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:52:22', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(141, 20230382, '2023-03-12', 1000259, '5600.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:53:07', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(142, 20230382, '2023-03-12', 1000254, '0.00', '5600.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:53:07', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(143, 20230383, '2023-03-12', 1000259, '5600.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:55:41', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(144, 20230383, '2023-03-12', 1000254, '0.00', '5600.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:55:41', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(145, 20230384, '2023-03-12', 1000259, '4200.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:56:24', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(146, 20230384, '2023-03-12', 1000254, '0.00', '4200.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:56:24', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(147, 20230385, '2023-03-12', 1000259, '2800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:58:00', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(148, 20230385, '2023-03-12', 1000254, '0.00', '2800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:58:00', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(149, 20230386, '2023-03-12', 1000259, '2800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:59:22', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(150, 20230386, '2023-03-12', 1000254, '0.00', '2800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 08:59:22', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(151, 20230387, '2023-03-12', 1000259, '2800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:02:53', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(152, 20230387, '2023-03-12', 1000254, '0.00', '2800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:02:53', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(153, 20230388, '2023-03-12', 1000259, '2800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:03:29', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(154, 20230388, '2023-03-12', 1000254, '0.00', '2800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:03:29', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(155, 20230389, '2023-03-12', 1000259, '6500.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:04:57', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(156, 20230389, '2023-03-12', 1000254, '0.00', '6500.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:04:57', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(157, 20230390, '2023-03-12', 1000259, '9100.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:05:36', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(158, 20230390, '2023-03-12', 1000254, '0.00', '9100.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:05:36', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(159, 20230391, '2023-03-12', 1000259, '3300.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:07:10', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(160, 20230391, '2023-03-12', 1000254, '0.00', '3300.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:07:10', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(161, 20230392, '2023-03-12', 1000259, '3300.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:08:24', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(162, 20230392, '2023-03-12', 1000254, '0.00', '3300.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:08:24', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(163, 20230393, '2023-03-12', 1000259, '15000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:11:41', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(164, 20230393, '2023-03-12', 1000254, '0.00', '15000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:11:41', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(165, 20230394, '2023-03-12', 1000259, '15000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:12:31', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(166, 20230394, '2023-03-12', 1000254, '0.00', '15000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:12:31', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(167, 20230395, '2023-03-12', 1000007, '1980.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303122', 0, '', '', '', 1, '', '2023-03-12 19:49:52', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(168, 20230395, '2023-03-12', 1000259, '0.00', '1980.00', 'Pos Sales Collection', 'POS Collection', '202303122', 0, '', '', '', 1, '', '2023-03-12 19:49:52', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(169, 20230396, '2023-03-12', 1000259, '74200.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:59:22', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(170, 20230396, '2023-03-12', 1000254, '0.00', '74200.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 09:59:22', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(171, 20230397, '2023-03-12', 1000259, '5300.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:00:14', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(172, 20230397, '2023-03-12', 1000254, '0.00', '5300.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:00:14', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(173, 20230398, '2023-03-12', 1000268, '2250.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303123', 0, '', '', '', 1, '', '2023-03-12 20:02:25', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(174, 20230398, '2023-03-12', 1000259, '0.00', '2250.00', 'Pos Sales Collection', 'POS Collection', '202303123', 0, '', '', '', 1, '', '2023-03-12 20:02:25', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(175, 20230399, '2023-03-12', 1000259, '2550.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:10:00', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(176, 20230399, '2023-03-12', 1000254, '0.00', '2550.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:10:00', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(177, 20230400, '2023-03-12', 1000259, '1600.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:11:21', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(178, 20230400, '2023-03-12', 1000254, '0.00', '1600.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:11:21', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(179, 20230401, '2023-03-12', 1000259, '1600.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:11:33', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(180, 20230401, '2023-03-12', 1000254, '0.00', '1600.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:11:33', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(181, 20230402, '2023-03-12', 1000259, '7650.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:15:20', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(182, 20230402, '2023-03-12', 1000254, '0.00', '7650.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:15:20', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(183, 20230403, '2023-03-12', 1000259, '7650.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:15:35', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(184, 20230403, '2023-03-12', 1000254, '0.00', '7650.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:15:35', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(185, 20230404, '2023-03-12', 1000259, '2400.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:17:39', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(186, 20230404, '2023-03-12', 1000254, '0.00', '2400.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:17:39', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(187, 20230405, '2023-03-12', 1000259, '2400.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:18:24', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(188, 20230405, '2023-03-12', 1000254, '0.00', '2400.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:18:24', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(189, 20230406, '2023-03-12', 1000259, '5200.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:24:38', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(190, 20230406, '2023-03-12', 1000254, '0.00', '5200.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:24:38', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(191, 20230407, '2023-03-12', 1000259, '3100.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:27:42', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(192, 20230407, '2023-03-12', 1000254, '0.00', '3100.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:27:42', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(193, 20230408, '2023-03-12', 1000259, '3100.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:28:25', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(194, 20230408, '2023-03-12', 1000254, '0.00', '3100.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:28:25', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(195, 20230409, '2023-03-12', 1000259, '5800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:30:44', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(196, 20230409, '2023-03-12', 1000254, '0.00', '5800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:30:44', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(197, 20230410, '2023-03-12', 1000259, '16000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:33:26', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(198, 20230410, '2023-03-12', 1000254, '0.00', '16000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:33:26', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(199, 20230411, '2023-03-12', 1000259, '3800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:35:30', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(200, 20230411, '2023-03-12', 1000254, '0.00', '3800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:35:30', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(201, 20230412, '2023-03-12', 1000259, '6500.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:39:21', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(202, 20230412, '2023-03-12', 1000254, '0.00', '6500.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:39:21', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(203, 20230413, '2023-03-12', 1000259, '1500.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:41:04', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(204, 20230413, '2023-03-12', 1000254, '0.00', '1500.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:41:04', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(205, 20230414, '2023-03-12', 1000259, '1500.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:41:51', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(206, 20230414, '2023-03-12', 1000254, '0.00', '1500.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:41:51', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(207, 20230415, '2023-03-12', 1000259, '1800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:45:31', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(208, 20230415, '2023-03-12', 1000254, '0.00', '1800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:45:31', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(209, 20230416, '2023-03-12', 1000259, '1800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:46:00', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(210, 20230416, '2023-03-12', 1000254, '0.00', '1800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:46:00', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(211, 20230417, '2023-03-12', 1000259, '1500.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:47:44', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(212, 20230417, '2023-03-12', 1000254, '0.00', '1500.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:47:44', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(213, 20230418, '2023-03-12', 1000259, '3200.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:50:22', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(214, 20230418, '2023-03-12', 1000254, '0.00', '3200.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:50:22', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(215, 20230419, '2023-03-12', 1000259, '3800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:53:04', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(216, 20230419, '2023-03-12', 1000254, '0.00', '3800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:53:04', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(217, 20230420, '2023-03-12', 1000259, '3200.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:54:03', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(218, 20230420, '2023-03-12', 1000254, '0.00', '3200.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 10:54:03', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(219, 20230421, '2023-03-12', 1000007, '2160.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303124', 0, '', '', '', 1, '', '2023-03-12 20:58:05', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(220, 20230421, '2023-03-12', 1000259, '0.00', '2160.00', 'Pos Sales Collection', 'POS Collection', '202303124', 0, '', '', '', 1, '', '2023-03-12 20:58:05', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(221, 20230422, '2023-03-12', 1000259, '1450.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 11:00:55', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(222, 20230422, '2023-03-12', 1000254, '0.00', '1450.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-12 11:00:55', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(223, 20230423, '2023-03-12', 1000255, '0.00', '30900.00', '', 'Purchase', '1', 0, '', '', '', 1, 'Unpaid', '2023-03-12 11:17:05', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(224, 20230423, '2023-03-12', 1000005, '30900.00', '0.00', '', 'Purchase', '1', 0, '', '', '', 1, 'Unpaid', '2023-03-12 11:17:05', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(225, 20230424, '2023-03-12', 1000268, '2160.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303125', 0, '', '', '', 1, '', '2023-03-12 22:02:49', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(226, 20230424, '2023-03-12', 1000259, '0.00', '2160.00', 'Pos Sales Collection', 'POS Collection', '202303125', 0, '', '', '', 1, '', '2023-03-12 22:02:49', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(227, 20230425, '2023-03-12', 1000007, '1710.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303126', 0, '', '', '', 1, '', '2023-03-12 22:07:41', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(228, 20230425, '2023-03-12', 1000259, '0.00', '1710.00', 'Pos Sales Collection', 'POS Collection', '202303126', 0, '', '', '', 1, '', '2023-03-12 22:07:41', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(229, 20230426, '2023-03-12', 1000007, '1710.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303127', 0, '', '', '', 1, '', '2023-03-12 22:10:05', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(230, 20230426, '2023-03-12', 1000259, '0.00', '1710.00', 'Pos Sales Collection', 'POS Collection', '202303127', 0, '', '', '', 1, '', '2023-03-12 22:10:05', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(231, 20230427, '2023-03-12', 1000007, '2115.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303128', 0, '', '', '', 1, '', '2023-03-12 22:34:45', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(232, 20230427, '2023-03-12', 1000259, '0.00', '2115.00', 'Pos Sales Collection', 'POS Collection', '202303128', 0, '', '', '', 1, '', '2023-03-12 22:34:45', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(233, 20230428, '2023-03-12', 1000007, '1710.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303129', 0, '', '', '', 1, '', '2023-03-12 22:47:35', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(234, 20230428, '2023-03-12', 1000259, '0.00', '1710.00', 'Pos Sales Collection', 'POS Collection', '202303129', 0, '', '', '', 1, '', '2023-03-12 22:47:35', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(235, 20230429, '2023-03-12', 1000007, '2565.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031210', 0, '', '', '', 1, '', '2023-03-12 22:49:18', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(236, 20230429, '2023-03-12', 1000259, '0.00', '2565.00', 'Pos Sales Collection', 'POS Collection', '2023031210', 0, '', '', '', 1, '', '2023-03-12 22:49:18', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(237, 20230430, '2023-03-12', 1000007, '2565.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031211', 0, '', '', '', 1, '', '2023-03-12 22:51:17', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(238, 20230430, '2023-03-12', 1000259, '0.00', '2565.00', 'Pos Sales Collection', 'POS Collection', '2023031211', 0, '', '', '', 1, '', '2023-03-12 22:51:17', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(239, 20230431, '2023-03-12', 1000007, '2565.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031212', 0, '', '', '', 1, '', '2023-03-12 22:51:53', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(240, 20230431, '2023-03-12', 1000259, '0.00', '2565.00', 'Pos Sales Collection', 'POS Collection', '2023031212', 0, '', '', '', 1, '', '2023-03-12 22:51:53', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(241, 20230432, '2023-03-12', 1000007, '1215.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031213', 0, '', '', '', 1, '', '2023-03-12 22:53:47', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(242, 20230432, '2023-03-12', 1000259, '0.00', '1215.00', 'Pos Sales Collection', 'POS Collection', '2023031213', 0, '', '', '', 1, '', '2023-03-12 22:53:47', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(243, 20230433, '2023-03-12', 1000007, '1215.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031214', 0, '', '', '', 1, '', '2023-03-12 22:55:12', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(244, 20230433, '2023-03-12', 1000259, '0.00', '1215.00', 'Pos Sales Collection', 'POS Collection', '2023031214', 0, '', '', '', 1, '', '2023-03-12 22:55:12', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(245, 20230434, '2023-03-12', 1000007, '1170.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031215', 0, '', '', '', 1, '', '2023-03-12 22:56:35', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(246, 20230434, '2023-03-12', 1000259, '0.00', '1170.00', 'Pos Sales Collection', 'POS Collection', '2023031215', 0, '', '', '', 1, '', '2023-03-12 22:56:35', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(247, 20230435, '2023-03-12', 1000007, '1935.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031216', 0, '', '', '', 1, '', '2023-03-12 22:57:43', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(248, 20230435, '2023-03-12', 1000259, '0.00', '1935.00', 'Pos Sales Collection', 'POS Collection', '2023031216', 0, '', '', '', 1, '', '2023-03-12 22:57:43', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(249, 20230436, '2023-03-12', 1000007, '1935.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031217', 0, '', '', '', 1, '', '2023-03-12 22:58:20', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(250, 20230436, '2023-03-12', 1000259, '0.00', '1935.00', 'Pos Sales Collection', 'POS Collection', '2023031217', 0, '', '', '', 1, '', '2023-03-12 22:58:20', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(251, 20230437, '2023-03-12', 1000007, '2115.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031218', 0, '', '', '', 1, '', '2023-03-12 22:59:54', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(252, 20230437, '2023-03-12', 1000259, '0.00', '2115.00', 'Pos Sales Collection', 'POS Collection', '2023031218', 0, '', '', '', 1, '', '2023-03-12 22:59:54', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(253, 20230438, '2023-03-12', 1000007, '1890.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031219', 0, '', '', '', 1, '', '2023-03-12 23:05:43', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(254, 20230438, '2023-03-12', 1000259, '0.00', '1890.00', 'Pos Sales Collection', 'POS Collection', '2023031219', 0, '', '', '', 1, '', '2023-03-12 23:05:43', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(255, 20230439, '2023-03-12', 1000007, '1980.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031220', 0, '', '', '', 1, '', '2023-03-12 23:07:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(256, 20230439, '2023-03-12', 1000259, '0.00', '1980.00', 'Pos Sales Collection', 'POS Collection', '2023031220', 0, '', '', '', 1, '', '2023-03-12 23:07:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(257, 20230440, '2023-03-12', 1000007, '1485.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031221', 0, '', '', '', 1, '', '2023-03-12 23:09:20', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(258, 20230440, '2023-03-12', 1000259, '0.00', '1485.00', 'Pos Sales Collection', 'POS Collection', '2023031221', 0, '', '', '', 1, '', '2023-03-12 23:09:20', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(259, 20230441, '2023-03-12', 1000007, '2565.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031222', 0, '', '', '', 1, '', '2023-03-12 23:15:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(260, 20230441, '2023-03-12', 1000259, '0.00', '2565.00', 'Pos Sales Collection', 'POS Collection', '2023031222', 0, '', '', '', 1, '', '2023-03-12 23:15:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(261, 20230442, '2023-03-12', 1000007, '2610.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031223', 0, '', '', '', 1, '', '2023-03-12 23:18:25', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(262, 20230442, '2023-03-12', 1000259, '0.00', '2610.00', 'Pos Sales Collection', 'POS Collection', '2023031223', 0, '', '', '', 1, '', '2023-03-12 23:18:25', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(263, 20230443, '2023-03-12', 1000007, '1440.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031224', 0, '', '', '', 1, '', '2023-03-12 23:25:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(264, 20230443, '2023-03-12', 1000259, '0.00', '1440.00', 'Pos Sales Collection', 'POS Collection', '2023031224', 0, '', '', '', 1, '', '2023-03-12 23:25:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(265, 20230444, '2023-03-12', 1000007, '1125.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031225', 0, '', '', '', 1, '', '2023-03-12 23:26:53', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(266, 20230444, '2023-03-12', 1000259, '0.00', '1125.00', 'Pos Sales Collection', 'POS Collection', '2023031225', 0, '', '', '', 1, '', '2023-03-12 23:26:53', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(267, 20230445, '2023-03-12', 1000007, '1440.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031226', 0, '', '', '', 1, '', '2023-03-12 23:28:05', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0);
INSERT INTO `journal` (`id`, `jv_no`, `jv_date`, `ledger_id`, `dr_amt`, `cr_amt`, `narration`, `tr_from`, `tr_no`, `customer_id`, `tr_type`, `tr_id`, `payment_type`, `group_for`, `status`, `entry_at`, `entry_by`, `edit_at`, `edit_by`, `customer_type`, `money_receipt`, `warehouse`) VALUES
(268, 20230445, '2023-03-12', 1000259, '0.00', '1440.00', 'Pos Sales Collection', 'POS Collection', '2023031226', 0, '', '', '', 1, '', '2023-03-12 23:28:05', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(269, 20230446, '2023-03-12', 1000007, '1485.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031227', 0, '', '', '', 1, '', '2023-03-12 23:30:24', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(270, 20230446, '2023-03-12', 1000259, '0.00', '1485.00', 'Pos Sales Collection', 'POS Collection', '2023031227', 0, '', '', '', 1, '', '2023-03-12 23:30:24', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(271, 20230447, '2023-03-12', 1000007, '2610.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031228', 0, '', '', '', 1, '', '2023-03-12 23:31:59', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(272, 20230447, '2023-03-12', 1000259, '0.00', '2610.00', 'Pos Sales Collection', 'POS Collection', '2023031228', 0, '', '', '', 1, '', '2023-03-12 23:31:59', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(273, 20230448, '2023-03-12', 1000007, '1980.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031229', 0, '', '', '', 1, '', '2023-03-12 23:34:11', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(274, 20230448, '2023-03-12', 1000259, '0.00', '1980.00', 'Pos Sales Collection', 'POS Collection', '2023031229', 0, '', '', '', 1, '', '2023-03-12 23:34:11', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(275, 20230449, '2023-03-12', 1000007, '2250.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031230', 0, '', '', '', 1, '', '2023-03-12 23:35:52', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(276, 20230449, '2023-03-12', 1000259, '0.00', '2250.00', 'Pos Sales Collection', 'POS Collection', '2023031230', 0, '', '', '', 1, '', '2023-03-12 23:35:52', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(277, 20230450, '2023-03-12', 1000007, '2610.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031231', 0, '', '', '', 1, '', '2023-03-12 23:40:26', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(278, 20230450, '2023-03-12', 1000259, '0.00', '2610.00', 'Pos Sales Collection', 'POS Collection', '2023031231', 0, '', '', '', 1, '', '2023-03-12 23:40:26', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(279, 20230451, '2023-03-12', 1000007, '1980.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031232', 0, '', '', '', 1, '', '2023-03-12 23:41:29', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(280, 20230451, '2023-03-12', 1000259, '0.00', '1980.00', 'Pos Sales Collection', 'POS Collection', '2023031232', 0, '', '', '', 1, '', '2023-03-12 23:41:29', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(281, 20230452, '2023-03-12', 1000007, '1080.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031233', 0, '', '', '', 1, '', '2023-03-12 23:46:09', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(282, 20230452, '2023-03-12', 1000259, '0.00', '1080.00', 'Pos Sales Collection', 'POS Collection', '2023031233', 0, '', '', '', 1, '', '2023-03-12 23:46:09', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(283, 20230453, '2023-03-12', 1000007, '2250.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031234', 0, '', '', '', 1, '', '2023-03-12 23:47:15', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(284, 20230453, '2023-03-12', 1000259, '0.00', '2250.00', 'Pos Sales Collection', 'POS Collection', '2023031234', 0, '', '', '', 1, '', '2023-03-12 23:47:15', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(285, 20230454, '2023-03-12', 1000007, '1080.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031235', 0, '', '', '', 1, '', '2023-03-12 23:48:25', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(286, 20230454, '2023-03-12', 1000259, '0.00', '1080.00', 'Pos Sales Collection', 'POS Collection', '2023031235', 0, '', '', '', 1, '', '2023-03-12 23:48:25', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(287, 20230455, '2023-03-12', 1000007, '1440.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031236', 0, '', '', '', 1, '', '2023-03-12 23:49:47', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(288, 20230455, '2023-03-12', 1000259, '0.00', '1440.00', 'Pos Sales Collection', 'POS Collection', '2023031236', 0, '', '', '', 1, '', '2023-03-12 23:49:47', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(289, 20230456, '2023-03-12', 1000007, '1440.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031237', 0, '', '', '', 1, '', '2023-03-12 23:50:24', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(290, 20230456, '2023-03-12', 1000259, '0.00', '1440.00', 'Pos Sales Collection', 'POS Collection', '2023031237', 0, '', '', '', 1, '', '2023-03-12 23:50:24', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(291, 20230457, '2023-03-12', 1000007, '1980.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031238', 0, '', '', '', 1, '', '2023-03-13 00:03:17', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(292, 20230457, '2023-03-12', 1000259, '0.00', '1980.00', 'Pos Sales Collection', 'POS Collection', '2023031238', 0, '', '', '', 1, '', '2023-03-13 00:03:17', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(293, 20230458, '2023-03-12', 1000007, '1440.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031239', 0, '', '', '', 1, '', '2023-03-13 00:04:30', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(294, 20230458, '2023-03-12', 1000259, '0.00', '1440.00', 'Pos Sales Collection', 'POS Collection', '2023031239', 0, '', '', '', 1, '', '2023-03-13 00:04:30', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(295, 20230459, '2023-03-12', 1000007, '1440.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031240', 0, '', '', '', 1, '', '2023-03-13 00:06:15', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(296, 20230459, '2023-03-12', 1000259, '0.00', '1440.00', 'Pos Sales Collection', 'POS Collection', '2023031240', 0, '', '', '', 1, '', '2023-03-13 00:06:15', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(297, 20230460, '2023-03-12', 1000007, '1440.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031241', 0, '', '', '', 1, '', '2023-03-13 00:06:55', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(298, 20230460, '2023-03-12', 1000259, '0.00', '1440.00', 'Pos Sales Collection', 'POS Collection', '2023031241', 0, '', '', '', 1, '', '2023-03-13 00:06:55', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(299, 20230461, '2023-03-12', 1000007, '1575.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031242', 0, '', '', '', 1, '', '2023-03-13 00:08:19', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(300, 20230461, '2023-03-12', 1000259, '0.00', '1575.00', 'Pos Sales Collection', 'POS Collection', '2023031242', 0, '', '', '', 1, '', '2023-03-13 00:08:19', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(301, 20230462, '2023-03-12', 1000007, '1080.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031243', 0, '', '', '', 1, '', '2023-03-13 00:15:10', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(302, 20230462, '2023-03-12', 1000259, '0.00', '1080.00', 'Pos Sales Collection', 'POS Collection', '2023031243', 0, '', '', '', 1, '', '2023-03-13 00:15:10', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(303, 20230463, '2023-03-12', 1000007, '990.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031244', 0, '', '', '', 1, '', '2023-03-13 00:26:37', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(304, 20230463, '2023-03-12', 1000259, '0.00', '990.00', 'Pos Sales Collection', 'POS Collection', '2023031244', 0, '', '', '', 1, '', '2023-03-13 00:26:37', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(305, 20230464, '2023-03-12', 1000007, '1980.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031245', 0, '', '', '', 1, '', '2023-03-13 00:39:25', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(306, 20230464, '2023-03-12', 1000259, '0.00', '1980.00', 'Pos Sales Collection', 'POS Collection', '2023031245', 0, '', '', '', 1, '', '2023-03-13 00:39:25', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(307, 20230465, '2023-03-12', 1000007, '1620.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031246', 0, '', '', '', 1, '', '2023-03-13 00:40:33', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(308, 20230465, '2023-03-12', 1000259, '0.00', '1620.00', 'Pos Sales Collection', 'POS Collection', '2023031246', 0, '', '', '', 1, '', '2023-03-13 00:40:33', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(309, 20230466, '2023-03-12', 1000007, '1080.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031247', 0, '', '', '', 1, '', '2023-03-13 00:43:52', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(310, 20230466, '2023-03-12', 1000259, '0.00', '1080.00', 'Pos Sales Collection', 'POS Collection', '2023031247', 0, '', '', '', 1, '', '2023-03-13 00:43:52', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(311, 20230467, '2023-03-12', 1000007, '1125.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031248', 0, '', '', '', 1, '', '2023-03-13 00:44:58', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(312, 20230467, '2023-03-12', 1000259, '0.00', '1125.00', 'Pos Sales Collection', 'POS Collection', '2023031248', 0, '', '', '', 1, '', '2023-03-13 00:44:58', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(313, 20230468, '2023-03-12', 1000007, '1995.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031249', 0, '', '', '', 1, '', '2023-03-13 00:54:15', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(314, 20230468, '2023-03-12', 1000259, '0.00', '1995.00', 'Pos Sales Collection', 'POS Collection', '2023031249', 0, '', '', '', 1, '', '2023-03-13 00:54:15', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(315, 20230469, '2023-03-12', 1000007, '1440.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031250', 0, '', '', '', 1, '', '2023-03-13 00:55:44', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(316, 20230469, '2023-03-12', 1000259, '0.00', '1440.00', 'Pos Sales Collection', 'POS Collection', '2023031250', 0, '', '', '', 1, '', '2023-03-13 00:55:44', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(317, 20230470, '2023-03-12', 1000007, '1980.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031251', 0, '', '', '', 1, '', '2023-03-13 00:59:12', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(318, 20230470, '2023-03-12', 1000259, '0.00', '1980.00', 'Pos Sales Collection', 'POS Collection', '2023031251', 0, '', '', '', 1, '', '2023-03-13 00:59:12', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(319, 20230471, '2023-03-12', 1000007, '3060.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031252', 0, '', '', '', 1, '', '2023-03-13 01:03:13', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(320, 20230471, '2023-03-12', 1000259, '0.00', '3060.00', 'Pos Sales Collection', 'POS Collection', '2023031252', 0, '', '', '', 1, '', '2023-03-13 01:03:13', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(321, 20230472, '2023-03-12', 1000007, '1890.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031253', 0, '', '', '', 1, '', '2023-03-13 01:05:13', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(322, 20230472, '2023-03-12', 1000259, '0.00', '1890.00', 'Pos Sales Collection', 'POS Collection', '2023031253', 0, '', '', '', 1, '', '2023-03-13 01:05:13', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(323, 20230473, '2023-03-12', 1000007, '1575.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031254', 0, '', '', '', 1, '', '2023-03-13 01:06:37', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(324, 20230473, '2023-03-12', 1000259, '0.00', '1575.00', 'Pos Sales Collection', 'POS Collection', '2023031254', 0, '', '', '', 1, '', '2023-03-13 01:06:37', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(325, 20230474, '2023-03-12', 1000007, '1080.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031255', 0, '', '', '', 1, '', '2023-03-13 01:07:39', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(326, 20230474, '2023-03-12', 1000259, '0.00', '1080.00', 'Pos Sales Collection', 'POS Collection', '2023031255', 0, '', '', '', 1, '', '2023-03-13 01:07:39', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(327, 20230475, '2023-03-12', 1000007, '3060.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031256', 0, '', '', '', 1, '', '2023-03-13 01:30:45', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(328, 20230475, '2023-03-12', 1000259, '0.00', '3060.00', 'Pos Sales Collection', 'POS Collection', '2023031256', 0, '', '', '', 1, '', '2023-03-13 01:30:45', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(329, 20230476, '2023-03-12', 1000007, '1080.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031257', 0, '', '', '', 1, '', '2023-03-13 01:34:16', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(330, 20230476, '2023-03-12', 1000259, '0.00', '1080.00', 'Pos Sales Collection', 'POS Collection', '2023031257', 0, '', '', '', 1, '', '2023-03-13 01:34:16', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(334, 20230478, '2023-03-13', 1000259, '0.00', '7365.00', 'Pos Sales Collection', 'POS Collection', '2023031258', 73, '', '', '', 1, '', '2023-03-13 16:43:20', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(333, 20230478, '2023-03-13', 1000007, '7365.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031258', 73, '', '', '', 1, '', '2023-03-13 16:43:20', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(335, 20230479, '2023-03-13', 1000255, '0.00', '92000.00', '', 'Purchase', '2', 0, '', '', '', 1, 'Unpaid', '2023-03-13 08:03:20', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(336, 20230479, '2023-03-13', 1000005, '92000.00', '0.00', '', 'Purchase', '2', 0, '', '', '', 1, 'Unpaid', '2023-03-13 08:03:20', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(337, 20230480, '2023-03-13', 1000259, '1800.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-13 08:06:13', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(338, 20230480, '2023-03-13', 1000254, '0.00', '1800.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-13 08:06:13', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(339, 20230481, '2023-03-13', 1000259, '5700.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-13 08:10:13', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(340, 20230481, '2023-03-13', 1000254, '0.00', '5700.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-13 08:10:13', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(341, 20230482, '2023-03-13', 1000259, '5300.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-13 08:10:53', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(342, 20230482, '2023-03-13', 1000254, '0.00', '5300.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-13 08:10:53', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(343, 20230483, '2023-03-13', 1000259, '5300.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-13 08:11:57', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(344, 20230483, '2023-03-13', 1000254, '0.00', '5300.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-13 08:11:57', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(345, 20230484, '2023-03-13', 1000259, '8400.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-13 08:12:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(346, 20230484, '2023-03-13', 1000254, '0.00', '8400.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-13 08:12:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(347, 20230485, '2023-03-13', 1000259, '5100.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-13 08:13:51', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(348, 20230485, '2023-03-13', 1000254, '0.00', '5100.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-13 08:13:51', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(349, 20230486, '2023-03-13', 1000007, '4300.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303133', 0, '', '', '', 1, '', '2023-03-13 21:26:18', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(350, 20230486, '2023-03-13', 1000259, '0.00', '4300.00', 'Pos Sales Collection', 'POS Collection', '202303133', 0, '', '', '', 1, '', '2023-03-13 21:26:18', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(444, 20230533, '2023-03-15', 1000259, '0.00', '6500.00', 'Pos Sales Collection', 'POS Collection', '', 0, '', '', '', 1, '', '2023-03-15 22:27:02', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(357, 20230490, '2023-03-13', 1000007, '3600.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303134', 73, '', '', '', 1, '', '2023-03-13 22:07:08', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(358, 20230490, '2023-03-13', 1000259, '0.00', '3600.00', 'Pos Sales Collection', 'POS Collection', '202303134', 73, '', '', '', 1, '', '2023-03-13 22:07:08', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(359, 20230491, '2023-03-13', 1000007, '1710.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303135', 0, '', '', '', 1, '', '2023-03-13 22:28:52', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(360, 20230491, '2023-03-13', 1000259, '0.00', '1710.00', 'Pos Sales Collection', 'POS Collection', '202303135', 0, '', '', '', 1, '', '2023-03-13 22:28:52', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(361, 20230492, '2023-03-13', 1000007, '2755.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303136', 0, '', '', '', 1, '', '2023-03-13 22:31:36', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(362, 20230492, '2023-03-13', 1000259, '0.00', '2755.00', 'Pos Sales Collection', 'POS Collection', '202303136', 0, '', '', '', 1, '', '2023-03-13 22:31:36', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(363, 20230493, '2023-03-13', 1000007, '2850.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303138', 0, '', '', '', 1, '', '2023-03-13 23:43:03', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(364, 20230493, '2023-03-13', 1000259, '0.00', '2850.00', 'Pos Sales Collection', 'POS Collection', '202303138', 0, '', '', '', 1, '', '2023-03-13 23:43:03', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(365, 20230494, '2023-03-13', 1000007, '1750.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303139', 0, '', '', '', 1, '', '2023-03-13 23:54:59', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(366, 20230494, '2023-03-13', 1000259, '0.00', '1750.00', 'Pos Sales Collection', 'POS Collection', '202303139', 0, '', '', '', 1, '', '2023-03-13 23:54:59', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(367, 20230495, '2023-03-13', 1000255, '0.00', '7400.00', '', 'Purchase', '3', 0, '', '', '', 1, 'Unpaid', '2023-03-13 14:00:37', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(368, 20230495, '2023-03-13', 1000005, '7400.00', '0.00', '', 'Purchase', '3', 0, '', '', '', 1, 'Unpaid', '2023-03-13 14:00:37', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(369, 20230496, '2023-03-13', 1000007, '2200.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031310', 0, '', '', '', 1, '', '2023-03-14 00:12:31', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(370, 20230496, '2023-03-13', 1000259, '0.00', '2200.00', 'Pos Sales Collection', 'POS Collection', '2023031310', 0, '', '', '', 1, '', '2023-03-14 00:12:31', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(371, 20230497, '2023-03-13', 1000007, '4450.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031311', 0, '', '', '', 1, '', '2023-03-14 00:51:26', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(372, 20230497, '2023-03-13', 1000259, '0.00', '4450.00', 'Pos Sales Collection', 'POS Collection', '2023031311', 0, '', '', '', 1, '', '2023-03-14 00:51:26', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(373, 20230498, '2023-03-13', 1000007, '2517.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031312', 0, '', '', '', 1, '', '2023-03-14 01:47:34', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(374, 20230498, '2023-03-13', 1000259, '0.00', '2517.00', 'Pos Sales Collection', 'POS Collection', '2023031312', 0, '', '', '', 1, '', '2023-03-14 01:47:34', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(375, 20230499, '2023-03-14', 1000007, '1750.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303141', 0, '', '', '', 1, '', '2023-03-14 16:19:10', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(376, 20230499, '2023-03-14', 1000259, '0.00', '1750.00', 'Pos Sales Collection', 'POS Collection', '202303141', 0, '', '', '', 1, '', '2023-03-14 16:19:10', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(377, 20230500, '2023-03-14', 1000259, '22000.00', '0.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-14 07:36:08', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(378, 20230500, '2023-03-14', 1000254, '0.00', '22000.00', '', 'ItemOpening', '1', 0, '', '', '', 1, '', '2023-03-14 07:36:08', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(443, 20230533, '2023-03-15', 1000007, '6500.00', '0.00', 'Pos Sales Collection', 'POS Collection', '', 0, '', '', '', 1, '', '2023-03-15 22:27:02', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(383, 20230503, '2023-03-14', 1000007, '2100.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303142', 0, '', '', '', 1, '', '2023-03-14 18:00:29', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(384, 20230503, '2023-03-14', 1000259, '0.00', '2100.00', 'Pos Sales Collection', 'POS Collection', '202303142', 0, '', '', '', 1, '', '2023-03-14 18:00:29', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(385, 20230504, '2023-03-14', 1000007, '3600.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303143', 73, '', '', '', 1, '', '2023-03-14 20:29:36', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(386, 20230504, '2023-03-14', 1000259, '0.00', '3600.00', 'Pos Sales Collection', 'POS Collection', '202303143', 73, '', '', '', 1, '', '2023-03-14 20:29:36', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(389, 20230506, '2023-03-14', 1000007, '3100.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303144', 0, '', '', '', 1, '', '2023-03-14 21:29:07', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(390, 20230506, '2023-03-14', 1000259, '0.00', '3100.00', 'Pos Sales Collection', 'POS Collection', '202303144', 0, '', '', '', 1, '', '2023-03-14 21:29:07', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(391, 20230507, '2023-03-14', 1000007, '9350.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303145', 0, '', '', '', 1, '', '2023-03-14 21:36:08', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(392, 20230507, '2023-03-14', 1000259, '0.00', '9350.00', 'Pos Sales Collection', 'POS Collection', '202303145', 0, '', '', '', 1, '', '2023-03-14 21:36:08', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(395, 20230509, '2023-03-14', 1000007, '1600.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303146', 0, '', '', '', 1, '', '2023-03-14 21:51:49', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(396, 20230509, '2023-03-14', 1000259, '0.00', '1600.00', 'Pos Sales Collection', 'POS Collection', '202303146', 0, '', '', '', 1, '', '2023-03-14 21:51:49', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(397, 20230510, '2023-03-14', 1000007, '2100.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303147', 0, '', '', '', 1, '', '2023-03-14 22:21:43', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(398, 20230510, '2023-03-14', 1000259, '0.00', '2100.00', 'Pos Sales Collection', 'POS Collection', '202303147', 0, '', '', '', 1, '', '2023-03-14 22:21:43', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(399, 20230511, '2023-03-14', 1000007, '2500.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303148', 0, '', '', '', 1, '', '2023-03-14 22:38:39', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(400, 20230511, '2023-03-14', 1000259, '0.00', '2500.00', 'Pos Sales Collection', 'POS Collection', '202303148', 0, '', '', '', 1, '', '2023-03-14 22:38:39', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(403, 20230513, '2023-03-14', 1000007, '5250.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303149', 0, '', '', '', 1, '', '2023-03-14 23:03:30', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(404, 20230513, '2023-03-14', 1000259, '0.00', '5250.00', 'Pos Sales Collection', 'POS Collection', '202303149', 0, '', '', '', 1, '', '2023-03-14 23:03:30', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(405, 20230514, '2023-03-14', 1000007, '1750.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031410', 0, '', '', '', 1, '', '2023-03-14 23:04:58', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(406, 20230514, '2023-03-14', 1000259, '0.00', '1750.00', 'Pos Sales Collection', 'POS Collection', '2023031410', 0, '', '', '', 1, '', '2023-03-14 23:04:58', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(407, 20230515, '2023-03-14', 1000007, '2900.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031411', 0, '', '', '', 1, '', '2023-03-14 23:08:24', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(408, 20230515, '2023-03-14', 1000259, '0.00', '2900.00', 'Pos Sales Collection', 'POS Collection', '2023031411', 0, '', '', '', 1, '', '2023-03-14 23:08:24', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(409, 20230516, '2023-03-14', 1000007, '2400.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031412', 0, '', '', '', 1, '', '2023-03-14 23:30:47', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(410, 20230516, '2023-03-14', 1000259, '0.00', '2400.00', 'Pos Sales Collection', 'POS Collection', '2023031412', 0, '', '', '', 1, '', '2023-03-14 23:30:47', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(411, 20230517, '2023-03-14', 1000007, '1600.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031413', 73, '', '', '', 1, '', '2023-03-15 00:31:47', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(412, 20230517, '2023-03-14', 1000259, '0.00', '1600.00', 'Pos Sales Collection', 'POS Collection', '2023031413', 73, '', '', '', 1, '', '2023-03-15 00:31:47', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(419, 20230521, '2023-03-14', 1000007, '3400.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031414', 0, '', '', '', 1, '', '2023-03-15 00:53:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(420, 20230521, '2023-03-14', 1000259, '0.00', '3400.00', 'Pos Sales Collection', 'POS Collection', '2023031414', 0, '', '', '', 1, '', '2023-03-15 00:53:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(421, 20230522, '2023-03-15', 1000255, '0.00', '26000.00', '', 'Purchase', '4', 0, '', '', '', 1, 'Unpaid', '2023-03-15 06:11:02', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(422, 20230522, '2023-03-15', 1000005, '26000.00', '0.00', '', 'Purchase', '4', 0, '', '', '', 1, 'Unpaid', '2023-03-15 06:11:02', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(426, 20230524, '2023-03-15', 1000259, '0.00', '1550.00', 'Pos Sales Collection', 'POS Collection', '202303151', 73, '', '', '', 1, '', '2023-03-15 17:56:26', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(425, 20230524, '2023-03-15', 1000007, '1550.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303151', 73, '', '', '', 1, '', '2023-03-15 17:56:26', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(427, 20230525, '2023-03-15', 1000007, '1600.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303152', 73, '', '', '', 1, '', '2023-03-15 17:57:56', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(428, 20230525, '2023-03-15', 1000259, '0.00', '1600.00', 'Pos Sales Collection', 'POS Collection', '202303152', 73, '', '', '', 1, '', '2023-03-15 17:57:56', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(429, 20230526, '2023-03-15', 1000268, '1600.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303153', 73, '', '', '', 1, '', '2023-03-15 20:39:43', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(430, 20230526, '2023-03-15', 1000259, '0.00', '1600.00', 'Pos Sales Collection', 'POS Collection', '202303153', 73, '', '', '', 1, '', '2023-03-15 20:39:43', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(431, 20230527, '2023-03-15', 1000007, '1850.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303154', 73, '', '', '', 1, '', '2023-03-15 20:51:10', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(432, 20230527, '2023-03-15', 1000259, '0.00', '1850.00', 'Pos Sales Collection', 'POS Collection', '202303154', 73, '', '', '', 1, '', '2023-03-15 20:51:10', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(433, 20230528, '2023-03-15', 1000007, '1600.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303155', 73, '', '', '', 1, '', '2023-03-15 21:10:11', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(434, 20230528, '2023-03-15', 1000259, '0.00', '1600.00', 'Pos Sales Collection', 'POS Collection', '202303155', 73, '', '', '', 1, '', '2023-03-15 21:10:11', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(435, 20230529, '2023-03-15', 1000255, '0.00', '6750.00', '', 'Purchase', '5', 0, '', '', '', 1, 'Unpaid', '2023-03-15 11:35:09', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(436, 20230529, '2023-03-15', 1000005, '6750.00', '0.00', '', 'Purchase', '5', 0, '', '', '', 1, 'Unpaid', '2023-03-15 11:35:09', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(437, 20230530, '2023-03-15', 1000255, '0.00', '0.00', '', 'Purchase', '6', 0, '', '', '', 1, 'Unpaid', '2023-03-15 11:37:32', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(438, 20230530, '2023-03-15', 1000005, '0.00', '0.00', '', 'Purchase', '6', 0, '', '', '', 1, 'Unpaid', '2023-03-15 11:37:32', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(439, 20230531, '2023-03-15', 1000255, '0.00', '13200.00', '', 'Purchase', '7', 0, '', '', '', 1, 'Unpaid', '2023-03-15 11:49:26', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(440, 20230531, '2023-03-15', 1000005, '13200.00', '0.00', '', 'Purchase', '7', 0, '', '', '', 1, 'Unpaid', '2023-03-15 11:49:26', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(441, 20230532, '2023-03-15', 1000007, '6500.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303156', 73, '', '', '', 1, '', '2023-03-15 22:24:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(442, 20230532, '2023-03-15', 1000259, '0.00', '6500.00', 'Pos Sales Collection', 'POS Collection', '202303156', 73, '', '', '', 1, '', '2023-03-15 22:24:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(445, 20230534, '2023-03-15', 1000007, '4250.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303157', 73, '', '', '', 1, '', '2023-03-15 22:29:52', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(446, 20230534, '2023-03-15', 1000259, '0.00', '4250.00', 'Pos Sales Collection', 'POS Collection', '202303157', 73, '', '', '', 1, '', '2023-03-15 22:29:52', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(447, 20230535, '2023-03-15', 1000007, '2500.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303158', 73, '', '', '', 1, '', '2023-03-15 22:30:54', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(448, 20230535, '2023-03-15', 1000259, '0.00', '2500.00', 'Pos Sales Collection', 'POS Collection', '202303158', 73, '', '', '', 1, '', '2023-03-15 22:30:54', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(449, 20230536, '2023-03-15', 1000255, '0.00', '25000.00', '', 'Purchase', '8', 0, '', '', '', 1, 'Unpaid', '2023-03-15 12:34:31', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(450, 20230536, '2023-03-15', 1000005, '25000.00', '0.00', '', 'Purchase', '8', 0, '', '', '', 1, 'Unpaid', '2023-03-15 12:34:31', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(451, 20230537, '2023-03-15', 1000007, '4950.00', '0.00', 'Pos Sales Collection', 'POS Collection', '202303159', 73, '', '', '', 1, '', '2023-03-15 22:37:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(452, 20230537, '2023-03-15', 1000259, '0.00', '4950.00', 'Pos Sales Collection', 'POS Collection', '202303159', 73, '', '', '', 1, '', '2023-03-15 22:37:46', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(453, 20230538, '2023-03-15', 1000007, '5200.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031510', 73, '', '', '', 1, '', '2023-03-15 22:48:30', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(454, 20230538, '2023-03-15', 1000259, '0.00', '5200.00', 'Pos Sales Collection', 'POS Collection', '2023031510', 73, '', '', '', 1, '', '2023-03-15 22:48:30', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(455, 20230539, '2023-03-15', 1000007, '2850.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031511', 73, '', '', '', 1, '', '2023-03-15 22:49:51', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(456, 20230539, '2023-03-15', 1000259, '0.00', '2850.00', 'Pos Sales Collection', 'POS Collection', '2023031511', 73, '', '', '', 1, '', '2023-03-15 22:49:51', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(457, 20230540, '2023-03-15', 1000007, '2500.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031512', 73, '', '', '', 1, '', '2023-03-15 22:52:30', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(458, 20230540, '2023-03-15', 1000259, '0.00', '2500.00', 'Pos Sales Collection', 'POS Collection', '2023031512', 73, '', '', '', 1, '', '2023-03-15 22:52:30', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(459, 20230541, '2023-03-15', 1000007, '2000.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031513', 73, '', '', '', 1, '', '2023-03-15 23:01:02', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(460, 20230541, '2023-03-15', 1000259, '0.00', '2000.00', 'Pos Sales Collection', 'POS Collection', '2023031513', 73, '', '', '', 1, '', '2023-03-15 23:01:02', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(461, 20230542, '2023-03-15', 1000007, '2850.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031514', 73, '', '', '', 1, '', '2023-03-15 23:03:44', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(462, 20230542, '2023-03-15', 1000259, '0.00', '2850.00', 'Pos Sales Collection', 'POS Collection', '2023031514', 73, '', '', '', 1, '', '2023-03-15 23:03:44', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(463, 20230543, '2023-03-15', 1000007, '4150.00', '0.00', 'Pos Sales Collection', 'POS Collection', '2023031515', 73, '', '', '', 1, '', '2023-03-15 23:10:22', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0),
(464, 20230543, '2023-03-15', 1000259, '0.00', '4150.00', 'Pos Sales Collection', 'POS Collection', '2023031515', 73, '', '', '', 1, '', '2023-03-15 23:10:22', 40010, '0000-00-00 00:00:00', 0, 'Registered', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `journal_item`
--

CREATE TABLE `journal_item` (
  `id` int(11) NOT NULL,
  `journal_date` date NOT NULL,
  `warehouse` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `color` varchar(55) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `item_in` decimal(20,2) NOT NULL,
  `item_ex` decimal(20,2) NOT NULL,
  `tr_no` int(11) NOT NULL,
  `tr_from` varchar(255) NOT NULL,
  `group_for` int(11) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `entry_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `journal_item`
--

INSERT INTO `journal_item` (`id`, `journal_date`, `warehouse`, `item_id`, `color`, `rate`, `item_in`, `item_ex`, `tr_no`, `tr_from`, `group_for`, `entry_at`, `entry_by`) VALUES
(1, '2023-03-12', 1, 46, '74', '1600.00', '2.00', '0.00', 1, 'Opening', 0, '2023-03-12 05:46:26', 40010),
(2, '2023-03-12', 1, 46, '16', '1600.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 05:46:49', 40010),
(3, '2023-03-12', 1, 6, '33', '2000.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 05:49:36', 40010),
(4, '2023-03-12', 1, 6, '34', '2000.00', '8.00', '0.00', 1, 'Opening', 0, '2023-03-12 05:51:50', 40010),
(5, '2023-03-12', 1, 28, '24', '1850.00', '12.00', '0.00', 1, 'Opening', 0, '2023-03-12 05:52:36', 40010),
(6, '2023-03-12', 1, 28, '47', '1850.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 05:53:13', 40010),
(7, '2023-03-12', 1, 34, '19', '1850.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 05:54:21', 40010),
(8, '2023-03-12', 1, 34, '24', '1850.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 05:54:55', 40010),
(9, '2023-03-12', 1, 24, '51', '1500.00', '6.00', '0.00', 1, 'Opening', 0, '2023-03-12 05:55:26', 40010),
(10, '2023-03-12', 1, 24, '52', '1500.00', '6.00', '0.00', 1, 'Opening', 0, '2023-03-12 05:56:06', 40010),
(11, '2023-03-12', 1, 50, '75', '2600.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 05:56:41', 40010),
(12, '2023-03-12', 1, 50, '81', '2500.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 05:58:42', 40010),
(13, '2023-03-12', 1, 48, '57', '1800.00', '6.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:01:37', 40010),
(14, '2023-03-12', 1, 48, '56', '1800.00', '7.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:02:12', 40010),
(15, '2023-03-12', 1, 30, '16', '2200.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:03:22', 40010),
(16, '2023-03-12', 1, 30, '55', '2200.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:04:06', 40010),
(17, '2023-03-12', 1, 31, '14', '2600.00', '8.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:05:10', 40010),
(18, '2023-03-12', 1, 31, '33', '2600.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:08:15', 40010),
(19, '2023-03-12', 1, 31, '83', '2600.00', '9.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:12:00', 40010),
(20, '2023-03-12', 1, 7, '35', '1900.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:20:53', 40010),
(21, '2023-03-12', 1, 7, '36', '1900.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:21:12', 40010),
(22, '2023-03-12', 1, 40, '67', '1500.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:22:27', 40010),
(23, '2023-03-12', 1, 40, '68', '1500.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:22:54', 40010),
(24, '2023-03-12', 1, 39, '66', '1450.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:24:16', 40010),
(25, '2023-03-12', 1, 39, '65', '1450.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:24:36', 40010),
(26, '2023-03-12', 1, 33, '58', '1200.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:25:30', 40010),
(27, '2023-03-12', 1, 33, '50', '1200.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:25:57', 40010),
(28, '2023-03-12', 1, 12, '32', '2200.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:26:48', 40010),
(29, '2023-03-12', 1, 17, '15', '1050.00', '6.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:29:54', 40010),
(30, '2023-03-12', 1, 29, '38', '1450.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:31:11', 40010),
(31, '2023-03-12', 1, 29, '37', '1450.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:31:54', 40010),
(32, '2023-03-12', 1, 19, '15', '1300.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:39:12', 40010),
(33, '2023-03-12', 1, 19, '19', '1300.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:39:33', 40010),
(34, '2023-03-12', 1, 22, '19', '1350.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:41:43', 40010),
(35, '2023-03-12', 1, 22, '15', '1350.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:43:00', 40010),
(36, '2023-03-12', 1, 22, '50', '1350.00', '2.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:43:28', 40010),
(37, '2023-03-12', 1, 37, '63', '950.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:45:19', 40010),
(38, '2023-03-12', 1, 37, '39', '950.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:45:48', 40010),
(39, '2023-03-12', 1, 18, '47', '1200.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:49:48', 40010),
(40, '2023-03-12', 1, 18, '32', '1200.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:50:07', 40010),
(41, '2023-03-12', 1, 21, '19', '950.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 06:59:45', 40010),
(42, '2023-03-12', 1, 21, '15', '950.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:00:05', 40010),
(43, '2023-03-12', 1, 21, '50', '950.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:00:25', 40010),
(44, '2023-03-12', 1, 36, '18', '1700.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:02:16', 40010),
(45, '2023-03-12', 1, 36, '60', '1700.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:02:30', 40010),
(46, '2023-03-12', 1, 14, '44', '800.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:09:12', 40010),
(47, '2023-03-12', 1, 14, '43', '800.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:10:06', 40010),
(48, '2023-03-12', 1, 16, '20', '1200.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:13:48', 40010),
(49, '2023-03-12', 1, 65, '43', '1000.00', '6.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:18:01', 40010),
(50, '2023-03-12', 1, 48, '57', '2100.00', '0.00', '1.00', 202303121, 'Sales', 1, '2023-03-12 17:23:56', 40010),
(51, '2023-03-12', 1, 20, '20', '1500.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:28:46', 40010),
(52, '2023-03-12', 1, 57, '32', '2100.00', '9.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:44:10', 40010),
(53, '2023-03-12', 1, 57, '15', '2100.00', '9.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:45:11', 40010),
(54, '2023-03-12', 1, 26, '19', '675.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:50:37', 40010),
(55, '2023-03-12', 1, 26, '16', '675.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:50:57', 40010),
(56, '2023-03-12', 1, 32, '39', '1100.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:54:18', 40010),
(57, '2023-03-12', 1, 32, '15', '1100.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:55:37', 40010),
(58, '2023-03-12', 1, 12, '20', '2200.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 07:59:51', 40010),
(59, '2023-03-12', 1, 17, '47', '1050.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:03:15', 40010),
(60, '2023-03-12', 1, 61, '62', '850.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:32:32', 40010),
(61, '2023-03-12', 1, 61, '61', '850.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:33:18', 40010),
(62, '2023-03-12', 1, 8, '37', '1500.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:35:23', 40010),
(63, '2023-03-12', 1, 8, '18', '1500.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:35:40', 40010),
(64, '2023-03-12', 1, 35, '26', '1000.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:36:31', 40010),
(65, '2023-03-12', 1, 35, '60', '1000.00', '7.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:36:56', 40010),
(66, '2023-03-12', 1, 68, '84', '1400.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:39:25', 40010),
(67, '2023-03-12', 1, 68, '86', '1400.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:40:46', 40010),
(68, '2023-03-12', 1, 27, '53', '1050.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:41:47', 40010),
(69, '2023-03-12', 1, 27, '54', '1050.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:42:22', 40010),
(70, '2023-03-12', 1, 42, '7', '1400.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:52:22', 40010),
(71, '2023-03-12', 1, 42, '38', '1400.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:53:07', 40010),
(72, '2023-03-12', 1, 41, '70', '1400.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:55:41', 40010),
(73, '2023-03-12', 1, 41, '69', '1400.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:56:24', 40010),
(74, '2023-03-12', 1, 55, '7', '1400.00', '2.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:58:00', 40010),
(75, '2023-03-12', 1, 55, '63', '1400.00', '2.00', '0.00', 1, 'Opening', 0, '2023-03-12 08:59:22', 40010),
(76, '2023-03-12', 1, 56, '59', '1400.00', '2.00', '0.00', 1, 'Opening', 0, '2023-03-12 09:02:53', 40010),
(77, '2023-03-12', 1, 56, '36', '1400.00', '2.00', '0.00', 1, 'Opening', 0, '2023-03-12 09:03:29', 40010),
(78, '2023-03-12', 1, 64, '59', '1300.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 09:04:57', 40010),
(79, '2023-03-12', 1, 64, '50', '1300.00', '7.00', '0.00', 1, 'Opening', 0, '2023-03-12 09:05:36', 40010),
(80, '2023-03-12', 1, 52, '59', '1100.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 09:07:10', 40010),
(81, '2023-03-12', 1, 52, '82', '1100.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 09:08:24', 40010),
(82, '2023-03-12', 1, 49, '19', '3000.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 09:11:41', 40010),
(83, '2023-03-12', 1, 49, '80', '3000.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 09:12:31', 40010),
(84, '2023-03-12', 1, 28, '47', '2200.00', '0.00', '1.00', 202303122, 'Sales', 1, '2023-03-12 19:49:52', 40010),
(85, '2023-03-12', 1, 1, '20', '5300.00', '14.00', '0.00', 1, 'Opening', 0, '2023-03-12 09:59:22', 40010),
(86, '2023-03-12', 1, 1, '19', '5300.00', '1.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:00:14', 40010),
(87, '2023-03-12', 1, 12, '20', '2500.00', '0.00', '1.00', 202303123, 'Sales', 1, '2023-03-12 20:02:25', 40010),
(88, '2023-03-12', 1, 43, '9', '2550.00', '1.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:10:00', 40010),
(89, '2023-03-12', 1, 67, '26', '1600.00', '1.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:11:21', 40010),
(90, '2023-03-12', 1, 67, '15', '1600.00', '1.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:11:33', 40010),
(91, '2023-03-12', 1, 13, '36', '2550.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:15:20', 40010),
(92, '2023-03-12', 1, 13, '81', '2550.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:15:35', 40010),
(93, '2023-03-12', 1, 54, '19', '600.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:17:39', 40010),
(94, '2023-03-12', 1, 54, '24', '600.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:18:24', 40010),
(95, '2023-03-12', 1, 15, '40', '1300.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:24:38', 40010),
(96, '2023-03-12', 1, 51, '36', '1550.00', '2.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:27:42', 40010),
(97, '2023-03-12', 1, 51, '59', '1550.00', '2.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:28:25', 40010),
(98, '2023-03-12', 1, 9, '38', '1450.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:30:44', 40010),
(99, '2023-03-12', 1, 25, '46', '1600.00', '10.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:33:26', 40010),
(100, '2023-03-12', 1, 38, '2', '950.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:35:30', 40010),
(101, '2023-03-12', 1, 5, '32', '1300.00', '5.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:39:21', 40010),
(102, '2023-03-12', 1, 66, '36', '1500.00', '1.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:41:04', 40010),
(103, '2023-03-12', 1, 66, '32', '1500.00', '1.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:41:51', 40010),
(104, '2023-03-12', 1, 63, '47', '1800.00', '1.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:45:31', 40010),
(105, '2023-03-12', 1, 63, '73', '1800.00', '1.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:46:00', 40010),
(106, '2023-03-12', 1, 59, '71', '1500.00', '1.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:47:44', 40010),
(107, '2023-03-12', 1, 44, '47', '1600.00', '2.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:50:22', 40010),
(108, '2023-03-12', 1, 11, '40', '950.00', '4.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:53:04', 40010),
(109, '2023-03-12', 1, 60, '47', '1600.00', '2.00', '0.00', 1, 'Opening', 0, '2023-03-12 10:54:03', 40010),
(110, '2023-03-12', 1, 57, '15', '2400.00', '0.00', '1.00', 202303124, 'Sales', 1, '2023-03-12 20:58:05', 40010),
(111, '2023-03-12', 1, 62, '72', '1450.00', '1.00', '0.00', 1, 'Opening', 0, '2023-03-12 11:00:55', 40010),
(112, '2023-03-12', 1, 22, '50', '1350.00', '10.00', '0.00', 1, 'Purchase', 0, '2023-03-12 11:17:05', 40010),
(113, '2023-03-12', 1, 69, '16', '1450.00', '6.00', '0.00', 1, 'Purchase', 0, '2023-03-12 11:17:05', 40010),
(114, '2023-03-12', 1, 69, '15', '1450.00', '6.00', '0.00', 1, 'Purchase', 0, '2023-03-12 11:17:05', 40010),
(115, '2023-03-12', 1, 57, '32', '2400.00', '0.00', '1.00', 202303125, 'Sales', 1, '2023-03-12 22:02:49', 40010),
(116, '2023-03-12', 1, 60, '47', '1900.00', '0.00', '1.00', 202303126, 'Sales', 1, '2023-03-12 22:07:41', 40010),
(117, '2023-03-12', 1, 60, '47', '1900.00', '0.00', '1.00', 202303127, 'Sales', 1, '2023-03-12 22:10:05', 40010),
(118, '2023-03-12', 1, 6, '34', '2350.00', '0.00', '1.00', 202303128, 'Sales', 1, '2023-03-12 22:34:45', 40010),
(119, '2023-03-12', 1, 67, '26', '1900.00', '0.00', '1.00', 202303129, 'Sales', 1, '2023-03-12 22:47:35', 40010),
(120, '2023-03-12', 1, 13, '81', '2850.00', '0.00', '1.00', 2023031210, 'Sales', 1, '2023-03-12 22:49:18', 40010),
(121, '2023-03-12', 1, 13, '81', '2850.00', '0.00', '1.00', 2023031211, 'Sales', 1, '2023-03-12 22:51:17', 40010),
(122, '2023-03-12', 1, 13, '81', '2850.00', '0.00', '1.00', 2023031212, 'Sales', 1, '2023-03-12 22:51:53', 40010),
(123, '2023-03-12', 1, 32, '15', '1350.00', '0.00', '1.00', 2023031213, 'Sales', 1, '2023-03-12 22:53:47', 40010),
(124, '2023-03-12', 1, 32, '39', '1350.00', '0.00', '1.00', 2023031214, 'Sales', 1, '2023-03-12 22:55:12', 40010),
(125, '2023-03-12', 1, 27, '53', '1300.00', '0.00', '1.00', 2023031215, 'Sales', 1, '2023-03-12 22:56:35', 40010),
(126, '2023-03-12', 1, 34, '24', '2150.00', '0.00', '1.00', 2023031216, 'Sales', 1, '2023-03-12 22:57:43', 40010),
(127, '2023-03-12', 1, 34, '24', '2150.00', '0.00', '1.00', 2023031217, 'Sales', 1, '2023-03-12 22:58:20', 40010),
(128, '2023-03-12', 1, 6, '33', '2350.00', '0.00', '1.00', 2023031218, 'Sales', 1, '2023-03-12 22:59:54', 40010),
(129, '2023-03-12', 1, 48, '56', '2100.00', '0.00', '1.00', 2023031219, 'Sales', 1, '2023-03-12 23:05:43', 40010),
(130, '2023-03-12', 1, 28, '24', '2200.00', '0.00', '1.00', 2023031220, 'Sales', 1, '2023-03-12 23:07:46', 40010),
(131, '2023-03-12', 1, 42, '38', '1650.00', '0.00', '1.00', 2023031221, 'Sales', 1, '2023-03-12 23:09:20', 40010),
(132, '2023-03-12', 1, 43, '9', '2850.00', '0.00', '1.00', 2023031222, 'Sales', 1, '2023-03-12 23:15:46', 40010),
(133, '2023-03-12', 1, 31, '33', '2900.00', '0.00', '1.00', 2023031223, 'Sales', 1, '2023-03-12 23:18:25', 40010),
(134, '2023-03-12', 1, 5, '32', '1600.00', '0.00', '1.00', 2023031224, 'Sales', 1, '2023-03-12 23:25:46', 40010),
(135, '2023-03-12', 1, 35, '26', '1250.00', '0.00', '1.00', 2023031225, 'Sales', 1, '2023-03-12 23:26:53', 40010),
(136, '2023-03-12', 1, 41, '69', '1600.00', '0.00', '1.00', 2023031226, 'Sales', 1, '2023-03-12 23:28:05', 40010),
(137, '2023-03-12', 1, 42, '7', '1650.00', '0.00', '1.00', 2023031227, 'Sales', 1, '2023-03-12 23:30:24', 40010),
(138, '2023-03-12', 1, 31, '83', '2900.00', '0.00', '1.00', 2023031228, 'Sales', 1, '2023-03-12 23:31:59', 40010),
(139, '2023-03-12', 1, 28, '47', '2200.00', '0.00', '1.00', 2023031229, 'Sales', 1, '2023-03-12 23:34:11', 40010),
(140, '2023-03-12', 1, 30, '16', '2500.00', '0.00', '1.00', 2023031230, 'Sales', 1, '2023-03-12 23:35:52', 40010),
(141, '2023-03-12', 1, 31, '14', '2900.00', '0.00', '1.00', 2023031231, 'Sales', 1, '2023-03-12 23:40:26', 40010),
(142, '2023-03-12', 1, 28, '47', '2200.00', '0.00', '1.00', 2023031232, 'Sales', 1, '2023-03-12 23:41:29', 40010),
(143, '2023-03-12', 1, 21, '50', '1200.00', '0.00', '1.00', 2023031233, 'Sales', 1, '2023-03-12 23:46:09', 40010),
(144, '2023-03-12', 1, 30, '55', '2500.00', '0.00', '1.00', 2023031234, 'Sales', 1, '2023-03-12 23:47:15', 40010),
(145, '2023-03-12', 1, 21, '19', '1200.00', '0.00', '1.00', 2023031235, 'Sales', 1, '2023-03-12 23:48:25', 40010),
(146, '2023-03-12', 1, 22, '50', '1600.00', '0.00', '1.00', 2023031236, 'Sales', 1, '2023-03-12 23:49:47', 40010),
(147, '2023-03-12', 1, 22, '19', '1600.00', '0.00', '1.00', 2023031237, 'Sales', 1, '2023-03-12 23:50:24', 40010),
(148, '2023-03-12', 1, 28, '47', '2200.00', '0.00', '1.00', 2023031238, 'Sales', 1, '2023-03-13 00:03:17', 40010),
(149, '2023-03-12', 1, 22, '50', '1600.00', '0.00', '1.00', 2023031239, 'Sales', 1, '2023-03-13 00:04:30', 40010),
(150, '2023-03-12', 1, 5, '32', '1600.00', '0.00', '1.00', 2023031240, 'Sales', 1, '2023-03-13 00:06:15', 40010),
(151, '2023-03-12', 1, 5, '32', '1600.00', '0.00', '1.00', 2023031241, 'Sales', 1, '2023-03-13 00:06:55', 40010),
(152, '2023-03-12', 1, 62, '72', '1750.00', '0.00', '1.00', 2023031242, 'Sales', 1, '2023-03-13 00:08:19', 40010),
(153, '2023-03-12', 1, 21, '19', '1200.00', '0.00', '1.00', 2023031243, 'Sales', 1, '2023-03-13 00:15:10', 40010),
(154, '2023-03-12', 1, 61, '61', '1100.00', '0.00', '1.00', 2023031244, 'Sales', 1, '2023-03-13 00:26:37', 40010),
(155, '2023-03-12', 1, 28, '24', '2200.00', '0.00', '1.00', 2023031245, 'Sales', 1, '2023-03-13 00:39:25', 40010),
(156, '2023-03-12', 1, 24, '52', '1800.00', '0.00', '1.00', 2023031246, 'Sales', 1, '2023-03-13 00:40:33', 40010),
(157, '2023-03-12', 1, 21, '50', '1200.00', '0.00', '1.00', 2023031247, 'Sales', 1, '2023-03-13 00:43:52', 40010),
(158, '2023-03-12', 1, 65, '43', '1250.00', '0.00', '1.00', 2023031248, 'Sales', 1, '2023-03-13 00:44:58', 40010),
(159, '2023-03-12', 1, 7, '36', '2200.00', '0.00', '1.00', 2023031249, 'Sales', 1, '2023-03-13 00:54:15', 40010),
(160, '2023-03-12', 1, 22, '50', '1600.00', '0.00', '1.00', 2023031250, 'Sales', 1, '2023-03-13 00:55:44', 40010),
(161, '2023-03-12', 1, 7, '36', '2200.00', '0.00', '1.00', 2023031251, 'Sales', 1, '2023-03-13 00:59:12', 40010),
(162, '2023-03-12', 1, 49, '19', '3400.00', '0.00', '1.00', 2023031252, 'Sales', 1, '2023-03-13 01:03:13', 40010),
(163, '2023-03-12', 1, 48, '57', '2100.00', '0.00', '1.00', 2023031253, 'Sales', 1, '2023-03-13 01:05:13', 40010),
(164, '2023-03-12', 1, 20, '20', '1750.00', '0.00', '1.00', 2023031254, 'Sales', 1, '2023-03-13 01:06:37', 40010),
(165, '2023-03-12', 1, 21, '50', '1200.00', '0.00', '1.00', 2023031255, 'Sales', 1, '2023-03-13 01:07:39', 40010),
(166, '2023-03-12', 1, 49, '19', '3400.00', '0.00', '1.00', 2023031256, 'Sales', 1, '2023-03-13 01:30:45', 40010),
(167, '2023-03-12', 1, 21, '50', '1200.00', '0.00', '1.00', 2023031257, 'Sales', 1, '2023-03-13 01:34:16', 40010),
(168, '2023-03-12', 1, 20, '20', '1750.00', '0.00', '1.00', 2023031258, 'Sales', 1, '2023-03-13 01:35:36', 40010),
(169, '2023-03-13', 1, 6, '34', '2350.00', '0.00', '1.00', 2023031258, 'Sales', 1, '2023-03-13 16:43:20', 40010),
(170, '2023-03-13', 1, 7, '36', '2200.00', '0.00', '1.00', 2023031258, 'Sales', 1, '2023-03-13 16:43:20', 40010),
(171, '2023-03-13', 1, 59, '71', '1800.00', '0.00', '1.00', 2023031258, 'Sales', 1, '2023-03-13 16:43:20', 40010),
(172, '2023-03-13', 1, 66, '32', '1800.00', '0.00', '1.00', 2023031258, 'Sales', 1, '2023-03-13 16:43:20', 40010),
(173, '2023-03-13', 1, 70, '87', '1400.00', '5.00', '0.00', 2, 'Purchase', 0, '2023-03-13 08:03:20', 40010),
(174, '2023-03-13', 1, 70, '88', '1400.00', '5.00', '0.00', 2, 'Purchase', 0, '2023-03-13 08:03:20', 40010),
(175, '2023-03-13', 1, 71, '86', '1450.00', '5.00', '0.00', 2, 'Purchase', 0, '2023-03-13 08:03:20', 40010),
(176, '2023-03-13', 1, 71, '90', '1450.00', '5.00', '0.00', 2, 'Purchase', 0, '2023-03-13 08:03:20', 40010),
(177, '2023-03-13', 1, 72, '24', '3450.00', '5.00', '0.00', 2, 'Purchase', 0, '2023-03-13 08:03:20', 40010),
(178, '2023-03-13', 1, 72, '59', '3450.00', '5.00', '0.00', 2, 'Purchase', 0, '2023-03-13 08:03:20', 40010),
(179, '2023-03-13', 1, 73, '75', '2650.00', '5.00', '0.00', 2, 'Purchase', 0, '2023-03-13 08:03:20', 40010),
(180, '2023-03-13', 1, 73, '38', '2650.00', '5.00', '0.00', 2, 'Purchase', 0, '2023-03-13 08:03:20', 40010),
(181, '2023-03-13', 1, 13, '81', '2500.00', '1.00', '0.00', 2, 'Purchase', 0, '2023-03-13 08:03:20', 40010),
(182, '2023-03-13', 1, 23, '15', '600.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-13 08:06:13', 40010),
(183, '2023-03-13', 1, 4, '29', '2850.00', '2.00', '0.00', 1, 'Opening', 0, '2023-03-13 08:10:13', 40010),
(184, '2023-03-13', 1, 3, '28', '2650.00', '2.00', '0.00', 1, 'Opening', 0, '2023-03-13 08:10:53', 40010),
(185, '2023-03-13', 1, 3, '27', '2650.00', '2.00', '0.00', 1, 'Opening', 0, '2023-03-13 08:11:57', 40010),
(186, '2023-03-13', 1, 2, '25', '2800.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-13 08:12:46', 40010),
(187, '2023-03-13', 1, 58, '19', '1700.00', '3.00', '0.00', 1, 'Opening', 0, '2023-03-13 08:13:51', 40010),
(188, '2023-03-13', 1, 28, '24', '2200.00', '0.00', '1.00', 202303133, 'Sales', 1, '2023-03-13 21:26:18', 40010),
(189, '2023-03-13', 1, 48, '56', '2100.00', '0.00', '1.00', 202303133, 'Sales', 1, '2023-03-13 21:26:18', 40010),
(190, '2023-03-13', 1, 24, '51', '1800.00', '0.00', '1.00', 202303134, 'Sales', 1, '2023-03-13 22:07:08', 40010),
(191, '2023-03-13', 1, 24, '52', '1800.00', '0.00', '1.00', 202303134, 'Sales', 1, '2023-03-13 22:07:08', 40010),
(192, '2023-03-13', 1, 8, '37', '1800.00', '0.00', '1.00', 202303135, 'Sales', 1, '2023-03-13 22:28:52', 40010),
(193, '2023-03-13', 1, 31, '14', '2900.00', '0.00', '1.00', 202303136, 'Sales', 1, '2023-03-13 22:31:36', 40010),
(194, '2023-03-13', 1, 52, '59', '1300.00', '0.00', '1.00', 202303138, 'Sales', 1, '2023-03-13 23:43:03', 40010),
(195, '2023-03-13', 1, 64, '50', '1550.00', '0.00', '1.00', 202303138, 'Sales', 1, '2023-03-13 23:43:03', 40010),
(196, '2023-03-13', 1, 71, '90', '1750.00', '0.00', '1.00', 202303139, 'Sales', 1, '2023-03-13 23:54:59', 40010),
(197, '2023-03-13', 1, 28, '24', '1850.00', '4.00', '0.00', 3, 'Purchase', 0, '2023-03-13 14:00:37', 40010),
(198, '2023-03-13', 1, 28, '24', '2200.00', '0.00', '1.00', 2023031310, 'Sales', 1, '2023-03-14 00:12:31', 40010),
(199, '2023-03-13', 1, 31, '33', '2900.00', '0.00', '1.00', 2023031311, 'Sales', 1, '2023-03-14 00:51:26', 40010),
(200, '2023-03-13', 1, 64, '50', '1550.00', '0.00', '1.00', 2023031311, 'Sales', 1, '2023-03-14 00:51:26', 40010),
(201, '2023-03-13', 1, 26, '19', '900.00', '0.00', '1.00', 2023031312, 'Sales', 1, '2023-03-14 01:47:34', 40010),
(202, '2023-03-13', 1, 39, '65', '1750.00', '0.00', '1.00', 2023031312, 'Sales', 1, '2023-03-14 01:47:34', 40010),
(203, '2023-03-14', 1, 71, '86', '1750.00', '0.00', '1.00', 202303141, 'Sales', 1, '2023-03-14 16:19:10', 40010),
(204, '2023-03-14', 1, 74, '39', '2200.00', '10.00', '0.00', 1, 'Opening', 0, '2023-03-14 07:36:08', 40010),
(205, '2023-03-14', 1, 48, '57', '2100.00', '0.00', '1.00', 202303142, 'Sales', 1, '2023-03-14 18:00:29', 40010),
(206, '2023-03-14', 1, 33, '58', '1500.00', '0.00', '1.00', 202303143, 'Sales', 1, '2023-03-14 20:29:36', 40010),
(207, '2023-03-14', 1, 48, '57', '2100.00', '0.00', '1.00', 202303143, 'Sales', 1, '2023-03-14 20:29:36', 40010),
(208, '2023-03-14', 1, 22, '50', '1600.00', '0.00', '1.00', 202303144, 'Sales', 1, '2023-03-14 21:29:07', 40010),
(209, '2023-03-14', 1, 33, '58', '1500.00', '0.00', '1.00', 202303144, 'Sales', 1, '2023-03-14 21:29:07', 40010),
(210, '2023-03-14', 1, 26, '19', '900.00', '0.00', '1.00', 202303145, 'Sales', 1, '2023-03-14 21:36:08', 40010),
(211, '2023-03-14', 1, 27, '54', '1300.00', '0.00', '1.00', 202303145, 'Sales', 1, '2023-03-14 21:36:08', 40010),
(212, '2023-03-14', 1, 57, '32', '2400.00', '0.00', '1.00', 202303145, 'Sales', 1, '2023-03-14 21:36:08', 40010),
(213, '2023-03-14', 1, 64, '50', '1550.00', '0.00', '1.00', 202303145, 'Sales', 1, '2023-03-14 21:36:08', 40010),
(214, '2023-03-14', 1, 64, '59', '1550.00', '0.00', '1.00', 202303145, 'Sales', 1, '2023-03-14 21:36:08', 40010),
(215, '2023-03-14', 1, 70, '87', '1650.00', '0.00', '1.00', 202303145, 'Sales', 1, '2023-03-14 21:36:08', 40010),
(216, '2023-03-14', 1, 22, '50', '1600.00', '0.00', '1.00', 202303146, 'Sales', 1, '2023-03-14 21:51:49', 40010),
(217, '2023-03-14', 1, 48, '56', '2100.00', '0.00', '1.00', 202303147, 'Sales', 1, '2023-03-14 22:21:43', 40010),
(218, '2023-03-14', 1, 30, '16', '2500.00', '0.00', '1.00', 202303148, 'Sales', 1, '2023-03-14 22:38:39', 40010),
(219, '2023-03-14', 1, 6, '34', '2350.00', '0.00', '1.00', 202303149, 'Sales', 1, '2023-03-14 23:03:30', 40010),
(220, '2023-03-14', 1, 50, '81', '2900.00', '0.00', '1.00', 202303149, 'Sales', 1, '2023-03-14 23:03:30', 40010),
(221, '2023-03-14', 1, 71, '86', '1750.00', '0.00', '1.00', 2023031410, 'Sales', 1, '2023-03-14 23:04:58', 40010),
(222, '2023-03-14', 1, 50, '81', '2900.00', '0.00', '1.00', 2023031411, 'Sales', 1, '2023-03-14 23:08:24', 40010),
(223, '2023-03-14', 1, 57, '32', '2400.00', '0.00', '1.00', 2023031412, 'Sales', 1, '2023-03-14 23:30:47', 40010),
(224, '2023-03-14', 1, 5, '32', '1600.00', '0.00', '1.00', 2023031413, 'Sales', 1, '2023-03-15 00:31:47', 40010),
(225, '2023-03-14', 1, 49, '80', '3400.00', '0.00', '1.00', 2023031414, 'Sales', 1, '2023-03-15 00:53:46', 40010),
(226, '2023-03-15', 1, 31, '83', '2600.00', '10.00', '0.00', 4, 'Purchase', 0, '2023-03-15 06:11:02', 40010),
(227, '2023-03-15', 1, 64, '59', '1550.00', '0.00', '1.00', 202303151, 'Sales', 1, '2023-03-15 16:12:34', 40010),
(228, '2023-03-15', 1, 64, '59', '1550.00', '0.00', '1.00', 202303151, 'Sales', 1, '2023-03-15 17:56:26', 40010),
(229, '2023-03-15', 1, 5, '32', '1600.00', '0.00', '1.00', 202303152, 'Sales', 1, '2023-03-15 17:57:56', 40010),
(230, '2023-03-15', 1, 22, '19', '1600.00', '0.00', '1.00', 202303153, 'Sales', 1, '2023-03-15 20:39:43', 40010),
(231, '2023-03-15', 1, 51, '59', '1850.00', '0.00', '1.00', 202303154, 'Sales', 1, '2023-03-15 20:51:10', 40010),
(232, '2023-03-15', 1, 22, '50', '1600.00', '0.00', '1.00', 202303155, 'Sales', 1, '2023-03-15 21:10:11', 40010),
(233, '2023-03-15', 1, 22, '50', '1350.00', '5.00', '0.00', 5, 'Purchase', 0, '2023-03-15 11:35:09', 40010),
(234, '2023-03-15', 1, 23, '19', '0.00', '0.00', '0.00', 6, 'Purchase', 0, '2023-03-15 11:37:32', 40010),
(235, '2023-03-15', 1, 23, '19', '550.00', '10.00', '0.00', 7, 'Purchase', 0, '2023-03-15 11:49:26', 40010),
(236, '2023-03-15', 1, 23, '15', '550.00', '5.00', '0.00', 7, 'Purchase', 0, '2023-03-15 11:49:26', 40010),
(237, '2023-03-15', 1, 23, '50', '550.00', '9.00', '0.00', 7, 'Purchase', 0, '2023-03-15 11:49:26', 40010),
(238, '2023-03-15', 1, 30, '16', '2500.00', '0.00', '1.00', 202303156, 'Sales', 1, '2023-03-15 22:24:46', 40010),
(239, '2023-03-15', 1, 63, '47', '2100.00', '0.00', '1.00', 202303156, 'Sales', 1, '2023-03-15 22:24:46', 40010),
(240, '2023-03-15', 1, 67, '15', '1900.00', '0.00', '1.00', 202303156, 'Sales', 1, '2023-03-15 22:24:46', 40010),
(241, '2023-03-15', 1, 30, '16', '2500.00', '0.00', '1.00', 202303157, 'Sales', 1, '2023-03-15 22:29:52', 40010),
(242, '2023-03-15', 1, 71, '86', '1750.00', '0.00', '1.00', 202303157, 'Sales', 1, '2023-03-15 22:29:52', 40010),
(243, '2023-03-15', 1, 30, '55', '2500.00', '0.00', '1.00', 202303158, 'Sales', 1, '2023-03-15 22:30:54', 40010),
(244, '2023-03-15', 1, 75, '73', '2500.00', '10.00', '0.00', 8, 'Purchase', 0, '2023-03-15 12:34:31', 40010),
(245, '2023-03-15', 1, 75, '42', '0.00', '10.00', '0.00', 8, 'Purchase', 0, '2023-03-15 12:34:31', 40010),
(246, '2023-03-15', 1, 48, '57', '2100.00', '0.00', '1.00', 202303159, 'Sales', 1, '2023-03-15 22:37:46', 40010),
(247, '2023-03-15', 1, 75, '73', '2850.00', '0.00', '1.00', 202303159, 'Sales', 1, '2023-03-15 22:37:46', 40010),
(248, '2023-03-15', 1, 6, '34', '2350.00', '0.00', '1.00', 2023031510, 'Sales', 1, '2023-03-15 22:48:30', 40010),
(249, '2023-03-15', 1, 75, '42', '2850.00', '0.00', '1.00', 2023031510, 'Sales', 1, '2023-03-15 22:48:30', 40010),
(250, '2023-03-15', 1, 13, '36', '2850.00', '0.00', '1.00', 2023031511, 'Sales', 1, '2023-03-15 22:49:51', 40010),
(251, '2023-03-15', 1, 30, '55', '2500.00', '0.00', '1.00', 2023031512, 'Sales', 1, '2023-03-15 22:52:30', 40010),
(252, '2023-03-15', 1, 36, '18', '2000.00', '0.00', '1.00', 2023031513, 'Sales', 1, '2023-03-15 23:01:02', 40010),
(253, '2023-03-15', 1, 75, '42', '2850.00', '0.00', '1.00', 2023031514, 'Sales', 1, '2023-03-15 23:03:44', 40010),
(254, '2023-03-15', 1, 6, '34', '2350.00', '0.00', '1.00', 2023031515, 'Sales', 1, '2023-03-15 23:10:22', 40010),
(255, '2023-03-15', 1, 8, '18', '1800.00', '0.00', '1.00', 2023031515, 'Sales', 1, '2023-03-15 23:10:22', 40010);

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `ledger_id` bigint(20) NOT NULL,
  `ledger_name` text NOT NULL,
  `ledger_type` varchar(55) NOT NULL,
  `head_type` varchar(55) NOT NULL,
  `group_for` int(11) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `entry_by` int(11) NOT NULL,
  `edit_by` int(11) DEFAULT NULL,
  `edit_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`ledger_id`, `ledger_name`, `ledger_type`, `head_type`, `group_for`, `entry_at`, `entry_by`, `edit_by`, `edit_at`) VALUES
(1000002, 'Sales', '1001', '', 1, '2021-01-30 17:12:49', 0, NULL, NULL),
(1000004, 'Customer Discount', '1002', '', 1, '2021-01-31 09:53:07', 0, NULL, NULL),
(1000005, 'Payable Party', '1003', '', 1, '2021-01-31 14:32:11', 0, NULL, NULL),
(1000007, 'Cash', '1004', 'cashBank', 1, '2021-01-31 15:06:24', 40010, NULL, NULL),
(1000008, 'Bank', '1004', 'cashBank', 1, '2021-01-31 15:06:24', 40010, NULL, NULL),
(1000009, 'Comission', '1004', '', 1, '2021-01-31 15:14:45', 0, NULL, NULL),
(1000010, 'Wire Transfer', '1004', '', 1, '2021-01-31 15:14:45', 0, NULL, NULL),
(1000011, 'Electricity Bill', '1002', 'Expense', 1, '2021-01-31 16:06:28', 0, NULL, NULL),
(1000012, 'Conveyance Bill', '1002', 'Expense', 1, '2021-01-31 16:27:19', 0, NULL, NULL),
(1000259, 'Inventory', '1001', '', 1, '2022-05-29 16:48:54', 0, NULL, NULL),
(1000258, 'Mr X', '1001', '', 1, '2022-07-26 06:51:43', 0, NULL, NULL),
(1000014, 'Damage', '1002', 'Expense', 1, '2021-01-31 16:27:19', 0, NULL, NULL),
(1000013, 'Sales Return', '1002', 'Expense', 1, '2021-01-31 16:27:19', 0, NULL, NULL),
(1000255, 'M.s Trading', '1003', '', 1, '2022-06-13 16:46:45', 0, NULL, NULL),
(1000254, 'Opening', '1001', '', 1, '2022-05-29 16:48:54', 0, NULL, NULL),
(1000260, 'Mr Bimol', '1001', '', 1, '2022-12-10 16:39:25', 0, NULL, NULL),
(1000261, 'Abc', '1001', '', 1, '2022-12-12 11:27:43', 0, NULL, NULL),
(1000262, 'N/A', '1001', '', 1, '2023-01-26 11:30:22', 0, NULL, NULL),
(1000263, 'Kamrul', '1001', '', 1, '2023-01-27 15:32:54', 0, NULL, NULL),
(1000264, 'Kamrul23', '1001', '', 1, '2023-01-27 15:33:44', 0, NULL, NULL),
(1000265, 'Walk in Customer', '1001', '', 1, '2023-01-27 15:37:11', 0, NULL, NULL),
(1000266, 'Test 123', '1001', '', 1, '2023-01-29 17:34:51', 0, NULL, NULL),
(1000267, 'Nagad', '1004', 'cashBank', 1, '2021-01-31 15:06:24', 40010, NULL, NULL),
(1000268, 'Bkash', '1004', 'cashBank', 1, '2021-01-31 15:06:24', 40010, NULL, NULL),
(1000269, 'Transport', '1002', 'Expense', 1, '2023-02-04 09:01:45', 0, NULL, NULL),
(1000270, '', '1001', '', 1, '2023-02-06 15:52:52', 0, NULL, NULL),
(1000271, '', '1001', '', 1, '2023-02-06 16:18:44', 0, NULL, NULL),
(1000272, 'à¦°à¦¿à¦²à¦¾à¦¯à¦¼à§‡à¦¨à§à¦¸ f', '1001', '', 1, '2023-03-03 15:12:53', 0, NULL, NULL),
(1000273, '54545454', '1002', 'Expense', 1, '2023-03-07 09:57:35', 0, NULL, NULL),
(1000275, 'Upay', '1004', 'cashBank', 1, '2023-03-09 16:15:59', 40010, 40010, '2023-03-10 03:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `ledger_group`
--

CREATE TABLE `ledger_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `entry_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ledger_group`
--

INSERT INTO `ledger_group` (`group_id`, `group_name`, `entry_at`, `entry_by`) VALUES
(1001, 'Income', '2021-01-30 16:49:26', 0),
(1002, 'Expense', '2021-01-30 16:49:26', 0),
(1003, 'liabilities ', '2021-01-31 14:28:41', 0),
(1004, 'Asset', '2021-01-31 15:05:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loan_history`
--

CREATE TABLE `loan_history` (
  `id` bigint(20) NOT NULL,
  `jv_no` bigint(20) NOT NULL,
  `jv_date` date NOT NULL,
  `donar_id` bigint(10) NOT NULL,
  `loan_amt` decimal(20,2) NOT NULL,
  `paid_amt` decimal(20,2) NOT NULL,
  `final_amt` decimal(20,2) NOT NULL,
  `narration` text NOT NULL,
  `tr_from` varchar(100) NOT NULL,
  `tr_no` varchar(100) NOT NULL,
  `tr_type` varchar(100) NOT NULL,
  `tr_id` varchar(100) NOT NULL,
  `payment_type` varchar(55) NOT NULL,
  `group_for` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `entry_by` int(11) NOT NULL,
  `edit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `edit_by` int(11) NOT NULL,
  `customer_type` enum('Registered','Corporate','','') NOT NULL,
  `money_receipt` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manual_sms`
--

CREATE TABLE `manual_sms` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(30) NOT NULL,
  `receiver_id` varchar(30) NOT NULL,
  `receiver_number` varchar(30) NOT NULL,
  `sms` varchar(500) NOT NULL,
  `entry_by` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `feature` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `feature`, `link`) VALUES
(1, 'Company Setup', 1, 'mis/company_setup.php'),
(2, 'Inventory Setup', 1, 'mis/inventory_setup.php'),
(3, 'User Setup', 2, 'pages/users.php'),
(4, 'Customer Setup', 12, 'pages/customer_setup.php'),
(5, 'Supplier Setup', 2, 'pages/suppliers.php'),
(6, 'Banner Image', 2, 'pages/banner_image.php'),
(7, 'Category', 2, 'pages/categories.php'),
(8, 'Product Info', 2, 'pages/item_info.php'),
(9, 'Product Opening', 2, 'pages/item_opening_new.php'),
(10, 'Create Purchase', 3, 'purchase/purchase_entry.php'),
(11, 'Purchase List', 3, 'purchase/purchase_list.php'),
(12, 'Payment Entry', 3, 'purchase/cash_payment_entry.php'),
(13, 'Damage', 3, 'purchase/damage_list.php'),
(14, 'Purchase Return', 3, 'purchase/purchase_return.php'),
(15, 'Sales Entry', 4, 'pages/sale_entry.php?clear=1'),
(16, 'Delivery Process', 4, 'pages/delivery_process.php'),
(17, 'Delivery Confirmation', 4, 'pages/delivery_confirm.php'),
(18, 'Cash Collection', 4, 'pages/cash_collection.php'),
(19, 'Loan Take', 10, 'pages/loan_take.php'),
(20, 'Loan Give', 10, 'pages/loan_give.php'),
(21, 'Add Expenses', 6, 'pages/add_expense.php?clear=1'),
(22, 'Expense Report', 6, 'pages/expense_report.php'),
(23, 'Employee Information', 7, 'pages/basic_info.php?clear=1'),
(24, 'Payroll Generate', 7, 'pages/payroll.php'),
(25, 'HRM Reports', 7, 'pages/hrm_report.php'),
(26, 'Report', 8, 'pages/report.php'),
(27, 'Dashboard', 8, 'pages/index.php'),
(28, 'User Permission', 2, 'pages/menu_permission.php'),
(29, 'Color Setup', 2, 'pages/color_setup.php'),
(30, 'Stock Report', 5, 'pages/stocks.php'),
(31, 'Website Order Manage', 4, 'pages/web_order_process.php'),
(32, 'Sub Category', 2, 'pages/sub_categories.php'),
(33, 'Sub Sub Category', 2, 'pages/sub_sub_categories.php'),
(34, 'Group Chat', 2, 'pages/chats.php'),
(35, 'Tutorial Videos', 2, 'pages/tutorial_videos.php'),
(36, 'Manage Blogs', 11, 'pages/blogs.php'),
(37, 'Web Customers', 12, 'pages/web_customers.php'),
(38, 'Theme Settings', 2, 'pages/theme_settings.php'),
(39, 'Delivery Location', 2, 'pages/delivery_location.php'),
(40, 'Multiple Categories', 2, 'pages/item_categories.php'),
(41, 'Advanced Customers Report', 12, 'pages/advance_customers.php'),
(42, 'Bulk Mail Send', 13, 'pages/bulk_mail.php'),
(43, 'Bulk Sms Send', 13, 'pages/bulk_sms.php'),
(44, 'Cupon Generate', 13, 'pages/cupon_generate.php'),
(45, 'Greeting Card', 13, 'pages/greeting_image.php'),
(46, 'Pos Sales Entry', 4, 'pages/new_pos.php?clear=1'),
(47, 'Pos Sales', 4, 'pages/sale_pos.php'),
(48, 'Sales List', 4, 'pages/sales_list.php'),
(49, 'Accounts', 4, 'pages/cash_bank.php'),
(50, 'Create Account', 14, 'pages/acc_ledgers.php'),
(51, 'Transection History', 14, 'pages/acc_report.php');

-- --------------------------------------------------------

--
-- Table structure for table `menu_permission`
--

CREATE TABLE `menu_permission` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `status` enum('DEACTIVE','ACTIVE','','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menu_permission`
--

INSERT INTO `menu_permission` (`id`, `user_id`, `menu_id`, `status`) VALUES
(556, 10000, 46, 'ACTIVE'),
(555, 10000, 45, 'ACTIVE'),
(554, 10000, 44, 'ACTIVE'),
(553, 10000, 43, 'ACTIVE'),
(552, 10000, 42, 'ACTIVE'),
(551, 10000, 41, 'ACTIVE'),
(550, 10000, 40, 'ACTIVE'),
(549, 10000, 39, 'ACTIVE'),
(548, 10000, 38, 'ACTIVE'),
(547, 10000, 37, 'ACTIVE'),
(546, 10000, 36, 'ACTIVE'),
(545, 10000, 35, 'ACTIVE'),
(544, 10000, 34, 'ACTIVE'),
(543, 10000, 33, 'ACTIVE'),
(542, 10000, 32, 'ACTIVE'),
(541, 10000, 31, 'ACTIVE'),
(540, 10000, 30, 'ACTIVE'),
(539, 10000, 29, 'ACTIVE'),
(538, 10000, 28, 'ACTIVE'),
(537, 10000, 26, 'ACTIVE'),
(536, 10000, 25, 'ACTIVE'),
(535, 10000, 24, 'ACTIVE'),
(534, 10000, 23, 'ACTIVE'),
(533, 10000, 22, 'ACTIVE'),
(532, 10000, 21, 'ACTIVE'),
(531, 10000, 20, 'ACTIVE'),
(530, 10000, 19, 'ACTIVE'),
(28, 30000, 8, 'ACTIVE'),
(529, 10000, 17, 'ACTIVE'),
(528, 10000, 16, 'ACTIVE'),
(527, 10000, 15, 'ACTIVE'),
(526, 10000, 14, 'ACTIVE'),
(525, 10000, 13, 'ACTIVE'),
(329, 40002, 1, 'ACTIVE'),
(524, 10000, 12, 'ACTIVE'),
(523, 10000, 11, 'ACTIVE'),
(522, 10000, 10, 'ACTIVE'),
(521, 10000, 9, 'ACTIVE'),
(520, 10000, 8, 'ACTIVE'),
(519, 10000, 7, 'ACTIVE'),
(518, 10000, 6, 'ACTIVE'),
(517, 10000, 5, 'ACTIVE'),
(516, 10000, 4, 'ACTIVE'),
(515, 10000, 3, 'ACTIVE'),
(514, 10000, 2, 'ACTIVE'),
(513, 10000, 1, 'ACTIVE'),
(66, 40003, 6, 'ACTIVE'),
(65, 40003, 5, 'ACTIVE'),
(64, 40003, 4, 'ACTIVE'),
(63, 40003, 3, 'ACTIVE'),
(62, 40003, 2, 'ACTIVE'),
(61, 40003, 1, 'ACTIVE'),
(59, 40004, 4, 'ACTIVE'),
(58, 40004, 3, 'ACTIVE'),
(57, 40004, 1, 'ACTIVE'),
(60, 40004, 5, 'ACTIVE'),
(67, 40003, 7, 'ACTIVE'),
(68, 40003, 8, 'ACTIVE'),
(69, 40003, 9, 'ACTIVE'),
(70, 40003, 10, 'ACTIVE'),
(71, 40003, 11, 'ACTIVE'),
(72, 40003, 12, 'ACTIVE'),
(73, 40003, 13, 'ACTIVE'),
(74, 40003, 14, 'ACTIVE'),
(75, 40003, 15, 'ACTIVE'),
(76, 40003, 16, 'ACTIVE'),
(77, 40003, 17, 'ACTIVE'),
(78, 40003, 18, 'ACTIVE'),
(79, 40003, 19, 'ACTIVE'),
(80, 40003, 20, 'ACTIVE'),
(81, 40003, 21, 'ACTIVE'),
(82, 40003, 22, 'ACTIVE'),
(83, 40003, 23, 'ACTIVE'),
(84, 40003, 24, 'ACTIVE'),
(85, 40003, 25, 'ACTIVE'),
(86, 40003, 26, 'ACTIVE'),
(87, 40003, 27, 'ACTIVE'),
(88, 40003, 28, 'ACTIVE'),
(89, 40003, 29, 'ACTIVE'),
(90, 40003, 30, 'ACTIVE'),
(91, 40003, 31, 'ACTIVE'),
(92, 40003, 32, 'ACTIVE'),
(93, 40003, 33, 'ACTIVE'),
(94, 40003, 34, 'ACTIVE'),
(95, 40003, 35, 'ACTIVE'),
(96, 40003, 36, 'ACTIVE'),
(97, 40003, 37, 'ACTIVE'),
(98, 40003, 38, 'ACTIVE'),
(99, 40003, 39, 'ACTIVE'),
(100, 40003, 40, 'ACTIVE'),
(101, 40003, 41, 'ACTIVE'),
(102, 40003, 42, 'ACTIVE'),
(103, 40003, 43, 'ACTIVE'),
(104, 40003, 44, 'ACTIVE'),
(105, 40003, 45, 'ACTIVE'),
(106, 40003, 46, 'ACTIVE'),
(326, 40007, 44, 'ACTIVE'),
(325, 40007, 43, 'ACTIVE'),
(324, 40007, 42, 'ACTIVE'),
(323, 40007, 41, 'ACTIVE'),
(322, 40007, 40, 'ACTIVE'),
(321, 40007, 39, 'ACTIVE'),
(320, 40007, 38, 'ACTIVE'),
(319, 40007, 37, 'ACTIVE'),
(318, 40007, 36, 'ACTIVE'),
(317, 40007, 35, 'ACTIVE'),
(316, 40007, 34, 'ACTIVE'),
(315, 40007, 33, 'ACTIVE'),
(314, 40007, 32, 'ACTIVE'),
(313, 40007, 31, 'ACTIVE'),
(312, 40007, 30, 'ACTIVE'),
(311, 40007, 29, 'ACTIVE'),
(310, 40007, 28, 'ACTIVE'),
(309, 40007, 27, 'ACTIVE'),
(308, 40007, 26, 'ACTIVE'),
(307, 40007, 25, 'ACTIVE'),
(306, 40007, 24, 'ACTIVE'),
(305, 40007, 23, 'ACTIVE'),
(304, 40007, 22, 'ACTIVE'),
(303, 40007, 21, 'ACTIVE'),
(238, 40005, 46, 'ACTIVE'),
(237, 40005, 41, 'ACTIVE'),
(236, 40005, 34, 'ACTIVE'),
(235, 40005, 30, 'ACTIVE'),
(234, 40005, 26, 'ACTIVE'),
(233, 40005, 25, 'ACTIVE'),
(232, 40005, 24, 'ACTIVE'),
(231, 40005, 23, 'ACTIVE'),
(230, 40005, 22, 'ACTIVE'),
(229, 40005, 21, 'ACTIVE'),
(228, 40005, 18, 'ACTIVE'),
(227, 40005, 17, 'ACTIVE'),
(226, 40005, 16, 'ACTIVE'),
(225, 40005, 15, 'ACTIVE'),
(224, 40005, 14, 'ACTIVE'),
(223, 40005, 13, 'ACTIVE'),
(222, 40005, 12, 'ACTIVE'),
(221, 40005, 11, 'ACTIVE'),
(220, 40005, 10, 'ACTIVE'),
(219, 40005, 9, 'ACTIVE'),
(302, 40007, 20, 'ACTIVE'),
(301, 40007, 19, 'ACTIVE'),
(300, 40007, 18, 'ACTIVE'),
(299, 40007, 17, 'ACTIVE'),
(298, 40007, 16, 'ACTIVE'),
(297, 40007, 15, 'ACTIVE'),
(296, 40007, 14, 'ACTIVE'),
(295, 40007, 13, 'ACTIVE'),
(294, 40007, 12, 'ACTIVE'),
(293, 40007, 11, 'ACTIVE'),
(292, 40007, 10, 'ACTIVE'),
(291, 40007, 9, 'ACTIVE'),
(290, 40007, 8, 'ACTIVE'),
(289, 40007, 7, 'ACTIVE'),
(288, 40007, 6, 'ACTIVE'),
(287, 40007, 5, 'ACTIVE'),
(286, 40007, 4, 'ACTIVE'),
(285, 40007, 3, 'ACTIVE'),
(284, 40007, 2, 'ACTIVE'),
(283, 40007, 1, 'ACTIVE'),
(327, 40007, 45, 'ACTIVE'),
(328, 40007, 46, 'ACTIVE'),
(330, 40002, 2, 'ACTIVE'),
(331, 40002, 3, 'ACTIVE'),
(332, 40002, 4, 'ACTIVE'),
(333, 40002, 5, 'ACTIVE'),
(334, 40002, 6, 'ACTIVE'),
(335, 40002, 7, 'ACTIVE'),
(336, 40002, 8, 'ACTIVE'),
(337, 40002, 9, 'ACTIVE'),
(338, 40002, 10, 'ACTIVE'),
(339, 40002, 11, 'ACTIVE'),
(340, 40002, 12, 'ACTIVE'),
(341, 40002, 13, 'ACTIVE'),
(342, 40002, 14, 'ACTIVE'),
(343, 40002, 15, 'ACTIVE'),
(344, 40002, 16, 'ACTIVE'),
(345, 40002, 17, 'ACTIVE'),
(346, 40002, 18, 'ACTIVE'),
(347, 40002, 19, 'ACTIVE'),
(348, 40002, 20, 'ACTIVE'),
(349, 40002, 21, 'ACTIVE'),
(350, 40002, 22, 'ACTIVE'),
(351, 40002, 23, 'ACTIVE'),
(352, 40002, 24, 'ACTIVE'),
(353, 40002, 25, 'ACTIVE'),
(354, 40002, 26, 'ACTIVE'),
(355, 40002, 27, 'ACTIVE'),
(356, 40002, 28, 'ACTIVE'),
(357, 40002, 29, 'ACTIVE'),
(358, 40002, 30, 'ACTIVE'),
(359, 40002, 31, 'ACTIVE'),
(360, 40002, 32, 'ACTIVE'),
(361, 40002, 33, 'ACTIVE'),
(362, 40002, 34, 'ACTIVE'),
(363, 40002, 35, 'ACTIVE'),
(364, 40002, 36, 'ACTIVE'),
(365, 40002, 37, 'ACTIVE'),
(366, 40002, 38, 'ACTIVE'),
(367, 40002, 39, 'ACTIVE'),
(368, 40002, 40, 'ACTIVE'),
(369, 40002, 41, 'ACTIVE'),
(370, 40002, 42, 'ACTIVE'),
(371, 40002, 43, 'ACTIVE'),
(372, 40002, 44, 'ACTIVE'),
(373, 40002, 45, 'ACTIVE'),
(374, 40002, 46, 'ACTIVE'),
(466, 40008, 46, 'ACTIVE'),
(465, 40008, 45, 'ACTIVE'),
(464, 40008, 44, 'ACTIVE'),
(463, 40008, 43, 'ACTIVE'),
(462, 40008, 42, 'ACTIVE'),
(461, 40008, 41, 'ACTIVE'),
(460, 40008, 40, 'ACTIVE'),
(459, 40008, 39, 'ACTIVE'),
(458, 40008, 38, 'ACTIVE'),
(457, 40008, 37, 'ACTIVE'),
(456, 40008, 36, 'ACTIVE'),
(455, 40008, 35, 'ACTIVE'),
(454, 40008, 34, 'ACTIVE'),
(453, 40008, 33, 'ACTIVE'),
(452, 40008, 32, 'ACTIVE'),
(451, 40008, 31, 'ACTIVE'),
(450, 40008, 30, 'ACTIVE'),
(449, 40008, 29, 'ACTIVE'),
(448, 40008, 28, 'ACTIVE'),
(447, 40008, 27, 'ACTIVE'),
(446, 40008, 26, 'ACTIVE'),
(445, 40008, 25, 'ACTIVE'),
(444, 40008, 24, 'ACTIVE'),
(443, 40008, 23, 'ACTIVE'),
(442, 40008, 22, 'ACTIVE'),
(441, 40008, 21, 'ACTIVE'),
(440, 40008, 20, 'ACTIVE'),
(439, 40008, 19, 'ACTIVE'),
(438, 40008, 18, 'ACTIVE'),
(437, 40008, 17, 'ACTIVE'),
(436, 40008, 16, 'ACTIVE'),
(435, 40008, 15, 'ACTIVE'),
(434, 40008, 14, 'ACTIVE'),
(433, 40008, 13, 'ACTIVE'),
(432, 40008, 12, 'ACTIVE'),
(431, 40008, 11, 'ACTIVE'),
(430, 40008, 10, 'ACTIVE'),
(429, 40008, 9, 'ACTIVE'),
(428, 40008, 8, 'ACTIVE'),
(427, 40008, 7, 'ACTIVE'),
(426, 40008, 6, 'ACTIVE'),
(425, 40008, 5, 'ACTIVE'),
(424, 40008, 4, 'ACTIVE'),
(423, 40008, 3, 'ACTIVE'),
(422, 40008, 2, 'ACTIVE'),
(421, 40008, 1, 'ACTIVE'),
(467, 40009, 1, 'ACTIVE'),
(468, 40009, 2, 'ACTIVE'),
(469, 40009, 3, 'ACTIVE'),
(470, 40009, 4, 'ACTIVE'),
(471, 40009, 5, 'ACTIVE'),
(472, 40009, 6, 'ACTIVE'),
(473, 40009, 7, 'ACTIVE'),
(474, 40009, 8, 'ACTIVE'),
(475, 40009, 9, 'ACTIVE'),
(476, 40009, 10, 'ACTIVE'),
(477, 40009, 11, 'ACTIVE'),
(478, 40009, 12, 'ACTIVE'),
(479, 40009, 13, 'ACTIVE'),
(480, 40009, 14, 'ACTIVE'),
(481, 40009, 15, 'ACTIVE'),
(482, 40009, 16, 'ACTIVE'),
(483, 40009, 17, 'ACTIVE'),
(484, 40009, 18, 'ACTIVE'),
(485, 40009, 19, 'ACTIVE'),
(486, 40009, 20, 'ACTIVE'),
(487, 40009, 21, 'ACTIVE'),
(488, 40009, 22, 'ACTIVE'),
(489, 40009, 23, 'ACTIVE'),
(490, 40009, 24, 'ACTIVE'),
(491, 40009, 25, 'ACTIVE'),
(492, 40009, 26, 'ACTIVE'),
(493, 40009, 27, 'ACTIVE'),
(494, 40009, 28, 'ACTIVE'),
(495, 40009, 29, 'ACTIVE'),
(496, 40009, 30, 'ACTIVE'),
(497, 40009, 31, 'ACTIVE'),
(498, 40009, 32, 'ACTIVE'),
(499, 40009, 33, 'ACTIVE'),
(500, 40009, 34, 'ACTIVE'),
(501, 40009, 35, 'ACTIVE'),
(502, 40009, 36, 'ACTIVE'),
(503, 40009, 37, 'ACTIVE'),
(504, 40009, 38, 'ACTIVE'),
(505, 40009, 39, 'ACTIVE'),
(506, 40009, 40, 'ACTIVE'),
(507, 40009, 41, 'ACTIVE'),
(508, 40009, 42, 'ACTIVE'),
(509, 40009, 43, 'ACTIVE'),
(510, 40009, 44, 'ACTIVE'),
(511, 40009, 45, 'ACTIVE'),
(512, 40009, 46, 'ACTIVE'),
(557, 10000, 47, 'ACTIVE'),
(673, 40010, 49, 'ACTIVE'),
(672, 40010, 48, 'ACTIVE'),
(671, 40010, 47, 'ACTIVE'),
(670, 40010, 33, 'ACTIVE'),
(669, 40010, 32, 'ACTIVE'),
(668, 40010, 30, 'ACTIVE'),
(667, 40010, 29, 'ACTIVE'),
(666, 40010, 27, 'ACTIVE'),
(665, 40010, 26, 'ACTIVE'),
(664, 40010, 22, 'ACTIVE'),
(663, 40010, 21, 'ACTIVE'),
(662, 40010, 18, 'ACTIVE'),
(661, 40010, 14, 'ACTIVE'),
(660, 40010, 12, 'ACTIVE'),
(659, 40010, 11, 'ACTIVE'),
(658, 40010, 10, 'ACTIVE'),
(657, 40010, 9, 'ACTIVE'),
(656, 40010, 8, 'ACTIVE'),
(655, 40010, 7, 'ACTIVE'),
(654, 40010, 5, 'ACTIVE'),
(653, 40010, 4, 'ACTIVE'),
(674, 40010, 50, 'ACTIVE'),
(675, 40010, 51, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `most_visited_pages`
--

CREATE TABLE `most_visited_pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_link` varchar(255) NOT NULL,
  `visit_count` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `most_visited_pages`
--

INSERT INTO `most_visited_pages` (`id`, `page_name`, `page_link`, `visit_count`, `user_id`, `entry_at`) VALUES
(1, 'Dashboard', 'pages/index.php', 146, 40010, '2023-03-15 23:32:34'),
(2, 'Product Info', 'pages/item_info.php', 734, 40010, '2023-03-15 23:35:36'),
(3, 'Color Setup', 'pages/color_setup.php', 106, 40010, '2023-03-15 23:33:25'),
(4, 'Stock Report', 'pages/stocks.php', 53, 40010, '2023-03-15 21:32:31'),
(5, 'Expense Report', 'pages/expense_report.php', 1, 40010, '2023-03-10 03:41:05'),
(6, 'Add Expenses', 'pages/add_expense.php?clear=1', 6, 40010, '2023-03-10 04:27:13'),
(7, 'User Permission', 'pages/menu_permission.php', 3, 10000, '2023-03-10 04:51:57'),
(8, 'User Setup', 'pages/users.php', 1, 10000, '2023-03-10 04:51:43'),
(9, 'Accounts', 'pages/cash_bank.php', 6, 40010, '2023-03-14 13:57:57'),
(10, 'Create Account', 'pages/acc_ledgers.php', 4, 40010, '2023-03-12 22:57:05'),
(11, 'Transection History', 'pages/acc_report.php', 13, 40010, '2023-03-13 20:42:42'),
(12, 'Category', 'pages/categories.php', 2, 40010, '2023-03-15 21:28:48'),
(13, 'Report', 'pages/report.php', 8, 40010, '2023-03-12 23:51:58'),
(14, 'Cash Collection', 'pages/cash_collection.php', 3, 40010, '2023-03-15 21:28:58'),
(15, 'Create Purchase', 'purchase/purchase_entry.php', 21, 40010, '2023-03-15 22:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(30) NOT NULL,
  `order_date` date NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `phone_no` varchar(191) NOT NULL,
  `alt_phone_no` varchar(55) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `transaction_id` varchar(191) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `delivery_location` int(11) NOT NULL,
  `delivery_fee` int(11) NOT NULL,
  `massage` text DEFAULT NULL,
  `total_amount` decimal(20,2) NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_completed` varchar(255) NOT NULL,
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `status` enum('PENDING','DELIVERED','HOLD','COMPLETED') NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_update_logs`
--

CREATE TABLE `order_update_logs` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` double(20,2) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `mobile_no` varchar(55) NOT NULL,
  `shipping_address` text NOT NULL,
  `edit_by` int(11) NOT NULL,
  `edit_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `s_no` int(11) NOT NULL,
  `s_date` date NOT NULL,
  `party` varchar(255) NOT NULL,
  `sales_amount` decimal(20,2) NOT NULL,
  `payment_amount` decimal(20,2) NOT NULL,
  `discount_amount` decimal(20,2) NOT NULL,
  `due_amt` decimal(20,2) NOT NULL,
  `payment_types` varchar(55) NOT NULL,
  `status` enum('PENDING','PROCESSING','COMPLETED','') NOT NULL,
  `group_for` int(11) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `entry_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `td` int(11) NOT NULL,
  `hd` int(11) NOT NULL,
  `ab` int(11) NOT NULL,
  `lv` int(11) NOT NULL,
  `lt` int(11) NOT NULL,
  `gross_salary` int(11) NOT NULL,
  `basic_salary` int(11) NOT NULL,
  `house_rent` int(11) NOT NULL,
  `medical` int(11) NOT NULL,
  `conveyance` int(11) NOT NULL,
  `mobile_bill` int(11) NOT NULL,
  `absent_deduction` int(11) NOT NULL,
  `other_deduction` int(11) NOT NULL,
  `total_deduction` int(11) NOT NULL,
  `total_payable` int(11) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `entry_by` int(11) NOT NULL,
  `edit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `edit_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_discount_vat`
--

CREATE TABLE `pos_discount_vat` (
  `id` int(11) NOT NULL,
  `sale_no` bigint(20) NOT NULL,
  `discount` float(10,2) NOT NULL,
  `vat_percent` float(10,2) NOT NULL,
  `vat_amt` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_payment_info`
--

CREATE TABLE `pos_payment_info` (
  `id` int(11) NOT NULL,
  `sale_no` bigint(20) NOT NULL,
  `customer` int(11) NOT NULL,
  `sub_total` float(10,2) NOT NULL,
  `vat_amt` float(10,2) NOT NULL,
  `discount_amt` float(10,2) NOT NULL,
  `grand_total` double(20,2) NOT NULL,
  `payment_mode` varchar(55) NOT NULL,
  `due_amount` double(20,2) DEFAULT NULL,
  `paid_amount` double(20,2) DEFAULT NULL,
  `payment_note` text NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_at` datetime NOT NULL,
  `edit_by` int(11) NOT NULL,
  `edit_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pos_payment_info`
--

INSERT INTO `pos_payment_info` (`id`, `sale_no`, `customer`, `sub_total`, `vat_amt`, `discount_amt`, `grand_total`, `payment_mode`, `due_amount`, `paid_amount`, `payment_note`, `entry_by`, `entry_at`, `edit_by`, `edit_at`) VALUES
(1, 202303121, 0, 2100.00, 0.00, 210.00, 1890.00, 'Bkash', 0.00, 1890.00, '', 40010, '2023-03-12 13:23:56', 0, '0000-00-00 00:00:00'),
(2, 202303122, 0, 2200.00, 0.00, 220.00, 1980.00, 'Cash', 0.00, 1980.00, '', 40010, '2023-03-12 15:49:52', 0, '0000-00-00 00:00:00'),
(3, 202303123, 0, 2500.00, 0.00, 250.00, 2250.00, 'Bkash', 0.00, 2250.00, '', 40010, '2023-03-12 16:02:25', 0, '0000-00-00 00:00:00'),
(4, 202303124, 0, 2400.00, 0.00, 240.00, 2160.00, 'Cash', 0.00, 2160.00, '', 40010, '2023-03-12 16:58:05', 0, '0000-00-00 00:00:00'),
(5, 202303125, 0, 2400.00, 0.00, 240.00, 2160.00, 'Bkash', 0.00, 2160.00, '', 40010, '2023-03-12 18:02:49', 0, '0000-00-00 00:00:00'),
(6, 202303126, 0, 1900.00, 0.00, 190.00, 1710.00, 'Cash', 0.00, 1710.00, '', 40010, '2023-03-12 18:07:41', 0, '0000-00-00 00:00:00'),
(7, 202303127, 0, 1900.00, 0.00, 190.00, 1710.00, 'Cash', 0.00, 1710.00, '', 40010, '2023-03-12 18:10:05', 0, '0000-00-00 00:00:00'),
(8, 202303128, 0, 2350.00, 0.00, 235.00, 2115.00, 'Cash', 0.00, 2115.00, '', 40010, '2023-03-12 18:34:45', 0, '0000-00-00 00:00:00'),
(9, 202303129, 0, 1900.00, 0.00, 190.00, 1710.00, 'Cash', 0.00, 1710.00, '', 40010, '2023-03-12 18:47:35', 0, '0000-00-00 00:00:00'),
(10, 2023031210, 0, 2850.00, 0.00, 285.00, 2565.00, 'Cash', 0.00, 2565.00, '', 40010, '2023-03-12 18:49:18', 0, '0000-00-00 00:00:00'),
(11, 2023031211, 0, 2850.00, 0.00, 285.00, 2565.00, 'Cash', 0.00, 2565.00, '', 40010, '2023-03-12 18:51:17', 0, '0000-00-00 00:00:00'),
(12, 2023031212, 0, 2850.00, 0.00, 285.00, 2565.00, 'Cash', 0.00, 2565.00, '', 40010, '2023-03-12 18:51:53', 0, '0000-00-00 00:00:00'),
(13, 2023031213, 0, 1350.00, 0.00, 135.00, 1215.00, 'Cash', 0.00, 1215.00, '', 40010, '2023-03-12 18:53:47', 0, '0000-00-00 00:00:00'),
(14, 2023031214, 0, 1350.00, 0.00, 135.00, 1215.00, 'Cash', 0.00, 1215.00, '', 40010, '2023-03-12 18:55:12', 0, '0000-00-00 00:00:00'),
(15, 2023031215, 0, 1300.00, 0.00, 130.00, 1170.00, 'Cash', 0.00, 1170.00, '', 40010, '2023-03-12 18:56:35', 0, '0000-00-00 00:00:00'),
(16, 2023031216, 0, 2150.00, 0.00, 215.00, 1935.00, 'Cash', 0.00, 1935.00, '', 40010, '2023-03-12 18:57:43', 0, '0000-00-00 00:00:00'),
(17, 2023031217, 0, 2150.00, 0.00, 215.00, 1935.00, 'Cash', 0.00, 1935.00, '', 40010, '2023-03-12 18:58:20', 0, '0000-00-00 00:00:00'),
(18, 2023031218, 0, 2350.00, 0.00, 235.00, 2115.00, 'Cash', 0.00, 2115.00, '', 40010, '2023-03-12 18:59:54', 0, '0000-00-00 00:00:00'),
(19, 2023031219, 0, 2100.00, 0.00, 210.00, 1890.00, 'Cash', 0.00, 1890.00, '', 40010, '2023-03-12 19:05:43', 0, '0000-00-00 00:00:00'),
(20, 2023031220, 0, 2200.00, 0.00, 220.00, 1980.00, 'Cash', 0.00, 1980.00, '', 40010, '2023-03-12 19:07:46', 0, '0000-00-00 00:00:00'),
(21, 2023031221, 0, 1650.00, 0.00, 165.00, 1485.00, 'Cash', 0.00, 1485.00, '', 40010, '2023-03-12 19:09:20', 0, '0000-00-00 00:00:00'),
(22, 2023031222, 0, 2850.00, 0.00, 285.00, 2565.00, 'Cash', 0.00, 2565.00, '', 40010, '2023-03-12 19:15:46', 0, '0000-00-00 00:00:00'),
(23, 2023031223, 0, 2900.00, 0.00, 290.00, 2610.00, 'Cash', 0.00, 2610.00, '', 40010, '2023-03-12 19:18:25', 0, '0000-00-00 00:00:00'),
(24, 2023031224, 0, 1600.00, 0.00, 160.00, 1440.00, 'Cash', 0.00, 1440.00, '', 40010, '2023-03-12 19:25:46', 0, '0000-00-00 00:00:00'),
(25, 2023031225, 0, 1250.00, 0.00, 125.00, 1125.00, 'Cash', 0.00, 1125.00, '', 40010, '2023-03-12 19:26:53', 0, '0000-00-00 00:00:00'),
(26, 2023031226, 0, 1600.00, 0.00, 160.00, 1440.00, 'Cash', 0.00, 1440.00, '', 40010, '2023-03-12 19:28:05', 0, '0000-00-00 00:00:00'),
(27, 2023031227, 0, 1650.00, 0.00, 165.00, 1485.00, 'Cash', 0.00, 1485.00, '', 40010, '2023-03-12 19:30:24', 0, '0000-00-00 00:00:00'),
(28, 2023031228, 0, 2900.00, 0.00, 290.00, 2610.00, 'Cash', 0.00, 2610.00, '', 40010, '2023-03-12 19:31:59', 0, '0000-00-00 00:00:00'),
(29, 2023031229, 0, 2200.00, 0.00, 220.00, 1980.00, 'Cash', 0.00, 1980.00, '', 40010, '2023-03-12 19:34:11', 0, '0000-00-00 00:00:00'),
(30, 2023031230, 0, 2500.00, 0.00, 250.00, 2250.00, 'Cash', 0.00, 2250.00, '', 40010, '2023-03-12 19:35:52', 0, '0000-00-00 00:00:00'),
(31, 2023031231, 0, 2900.00, 0.00, 290.00, 2610.00, 'Cash', 0.00, 2610.00, '', 40010, '2023-03-12 19:40:26', 0, '0000-00-00 00:00:00'),
(32, 2023031232, 0, 2200.00, 0.00, 220.00, 1980.00, 'Cash', 0.00, 1980.00, '', 40010, '2023-03-12 19:41:29', 0, '0000-00-00 00:00:00'),
(33, 2023031233, 0, 1200.00, 0.00, 120.00, 1080.00, 'Cash', 0.00, 1080.00, '', 40010, '2023-03-12 19:46:09', 0, '0000-00-00 00:00:00'),
(34, 2023031234, 0, 2500.00, 0.00, 250.00, 2250.00, 'Cash', 0.00, 2250.00, '', 40010, '2023-03-12 19:47:15', 0, '0000-00-00 00:00:00'),
(35, 2023031235, 0, 1200.00, 0.00, 120.00, 1080.00, 'Cash', 0.00, 1080.00, '', 40010, '2023-03-12 19:48:25', 0, '0000-00-00 00:00:00'),
(36, 2023031236, 0, 1600.00, 0.00, 160.00, 1440.00, 'Cash', 0.00, 1440.00, '', 40010, '2023-03-12 19:49:47', 0, '0000-00-00 00:00:00'),
(37, 2023031237, 0, 1600.00, 0.00, 160.00, 1440.00, 'Cash', 0.00, 1440.00, '', 40010, '2023-03-12 19:50:24', 0, '0000-00-00 00:00:00'),
(38, 2023031238, 0, 2200.00, 0.00, 220.00, 1980.00, 'Cash', 0.00, 1980.00, '', 40010, '2023-03-12 20:03:17', 0, '0000-00-00 00:00:00'),
(39, 2023031239, 0, 1600.00, 0.00, 160.00, 1440.00, 'Cash', 0.00, 1440.00, '', 40010, '2023-03-12 20:04:30', 0, '0000-00-00 00:00:00'),
(40, 2023031240, 0, 1600.00, 0.00, 160.00, 1440.00, 'Cash', 0.00, 1440.00, '', 40010, '2023-03-12 20:06:15', 0, '0000-00-00 00:00:00'),
(41, 2023031241, 0, 1600.00, 0.00, 160.00, 1440.00, 'Cash', 0.00, 1440.00, '', 40010, '2023-03-12 20:06:55', 0, '0000-00-00 00:00:00'),
(42, 2023031242, 0, 1750.00, 0.00, 175.00, 1575.00, 'Cash', 0.00, 1575.00, '', 40010, '2023-03-12 20:08:19', 0, '0000-00-00 00:00:00'),
(43, 2023031243, 0, 1200.00, 0.00, 120.00, 1080.00, 'Cash', 0.00, 1080.00, '', 40010, '2023-03-12 20:15:10', 0, '0000-00-00 00:00:00'),
(44, 2023031244, 0, 1100.00, 0.00, 110.00, 990.00, 'Cash', 0.00, 990.00, '', 40010, '2023-03-12 20:26:37', 0, '0000-00-00 00:00:00'),
(45, 2023031245, 0, 2200.00, 0.00, 220.00, 1980.00, 'Cash', 0.00, 1980.00, '', 40010, '2023-03-12 20:39:25', 0, '0000-00-00 00:00:00'),
(46, 2023031246, 0, 1800.00, 0.00, 180.00, 1620.00, 'Cash', 0.00, 1620.00, '', 40010, '2023-03-12 20:40:33', 0, '0000-00-00 00:00:00'),
(47, 2023031247, 0, 1200.00, 0.00, 120.00, 1080.00, 'Cash', 0.00, 1080.00, '', 40010, '2023-03-12 20:43:52', 0, '0000-00-00 00:00:00'),
(48, 2023031248, 0, 1250.00, 0.00, 125.00, 1125.00, 'Cash', 0.00, 1125.00, '', 40010, '2023-03-12 20:44:58', 0, '0000-00-00 00:00:00'),
(49, 2023031249, 0, 2200.00, 0.00, 205.00, 1995.00, 'Cash', 0.00, 1995.00, '', 40010, '2023-03-12 20:54:15', 0, '0000-00-00 00:00:00'),
(50, 2023031250, 0, 1600.00, 0.00, 160.00, 1440.00, 'Cash', 0.00, 1440.00, '', 40010, '2023-03-12 20:55:44', 0, '0000-00-00 00:00:00'),
(51, 2023031251, 0, 2200.00, 0.00, 220.00, 1980.00, 'Cash', 0.00, 1980.00, '', 40010, '2023-03-12 20:59:12', 0, '0000-00-00 00:00:00'),
(52, 2023031252, 0, 3400.00, 0.00, 340.00, 3060.00, 'Cash', 0.00, 3060.00, '', 40010, '2023-03-12 21:03:13', 0, '0000-00-00 00:00:00'),
(53, 2023031253, 0, 2100.00, 0.00, 210.00, 1890.00, 'Cash', 0.00, 1890.00, '', 40010, '2023-03-12 21:05:13', 0, '0000-00-00 00:00:00'),
(54, 2023031254, 0, 1750.00, 0.00, 175.00, 1575.00, 'Cash', 0.00, 1575.00, '', 40010, '2023-03-12 21:06:37', 0, '0000-00-00 00:00:00'),
(55, 2023031255, 0, 1200.00, 0.00, 120.00, 1080.00, 'Cash', 0.00, 1080.00, '', 40010, '2023-03-12 21:07:39', 0, '0000-00-00 00:00:00'),
(56, 2023031256, 0, 3400.00, 0.00, 340.00, 3060.00, 'Cash', 0.00, 3060.00, '', 40010, '2023-03-12 21:30:45', 0, '0000-00-00 00:00:00'),
(57, 2023031257, 0, 1200.00, 0.00, 120.00, 1080.00, 'Cash', 0.00, 1080.00, '', 40010, '2023-03-12 21:34:16', 0, '0000-00-00 00:00:00'),
(59, 2023031258, 0, 8150.00, 0.00, 785.00, 7365.00, 'Cash', 0.00, 7365.00, '', 40010, '2023-03-13 12:43:20', 0, '0000-00-00 00:00:00'),
(60, 202303133, 0, 4300.00, 0.00, 0.00, 4300.00, 'Cash', 0.00, 4300.00, '', 40010, '2023-03-13 17:26:18', 0, '0000-00-00 00:00:00'),
(64, 202303134, 0, 3600.00, 0.00, 0.00, 3600.00, 'Cash', 0.00, 3600.00, '', 40010, '2023-03-13 18:07:08', 0, '0000-00-00 00:00:00'),
(65, 202303135, 0, 1800.00, 0.00, 90.00, 1710.00, 'Cash', 0.00, 1710.00, '', 40010, '2023-03-13 18:28:52', 0, '0000-00-00 00:00:00'),
(66, 202303136, 0, 2900.00, 0.00, 145.00, 2755.00, 'Cash', 0.00, 2755.00, '', 40010, '2023-03-13 18:31:36', 0, '0000-00-00 00:00:00'),
(67, 202303138, 0, 2850.00, 0.00, 0.00, 2850.00, 'Cash', 0.00, 2850.00, '', 40010, '2023-03-13 19:43:03', 0, '0000-00-00 00:00:00'),
(68, 202303139, 0, 1750.00, 0.00, 0.00, 1750.00, 'Cash', 0.00, 1750.00, '', 40010, '2023-03-13 19:54:59', 0, '0000-00-00 00:00:00'),
(69, 2023031310, 0, 2200.00, 0.00, 0.00, 2200.00, 'Cash', 0.00, 2200.00, '', 40010, '2023-03-13 20:12:31', 0, '0000-00-00 00:00:00'),
(70, 2023031311, 0, 4450.00, 0.00, 0.00, 4450.00, 'Cash', 0.00, 4450.00, '', 40010, '2023-03-13 20:51:26', 0, '0000-00-00 00:00:00'),
(71, 2023031312, 0, 2650.00, 0.00, 133.00, 2517.00, 'Cash', 0.00, 2517.00, '', 40010, '2023-03-13 21:47:34', 0, '0000-00-00 00:00:00'),
(72, 202303141, 0, 1750.00, 0.00, 0.00, 1750.00, 'Cash', 0.00, 1750.00, '', 40010, '2023-03-14 12:19:10', 0, '0000-00-00 00:00:00'),
(75, 202303142, 0, 2100.00, 0.00, 0.00, 2100.00, 'Cash', 0.00, 2100.00, '', 40010, '2023-03-14 14:00:29', 0, '0000-00-00 00:00:00'),
(76, 202303143, 0, 3600.00, 0.00, 0.00, 3600.00, 'Cash', 0.00, 3600.00, '', 40010, '2023-03-14 16:29:36', 0, '0000-00-00 00:00:00'),
(78, 202303144, 0, 3100.00, 0.00, 0.00, 3100.00, 'Cash', 0.00, 3100.00, '', 40010, '2023-03-14 17:29:07', 0, '0000-00-00 00:00:00'),
(79, 202303145, 0, 9350.00, 0.00, 0.00, 9350.00, 'Cash', 0.00, 9350.00, '', 40010, '2023-03-14 17:36:08', 0, '0000-00-00 00:00:00'),
(81, 202303146, 0, 1600.00, 0.00, 0.00, 1600.00, 'Cash', 0.00, 1600.00, '', 40010, '2023-03-14 17:51:49', 0, '0000-00-00 00:00:00'),
(82, 202303147, 0, 2100.00, 0.00, 0.00, 2100.00, 'Cash', 0.00, 2100.00, '', 40010, '2023-03-14 18:21:43', 0, '0000-00-00 00:00:00'),
(83, 202303148, 0, 2500.00, 0.00, 0.00, 2500.00, 'Cash', 0.00, 2500.00, '', 40010, '2023-03-14 18:38:39', 0, '0000-00-00 00:00:00'),
(85, 202303149, 0, 5250.00, 0.00, 0.00, 5250.00, 'Cash', 0.00, 5250.00, '', 40010, '2023-03-14 19:03:30', 0, '0000-00-00 00:00:00'),
(86, 2023031410, 0, 1750.00, 0.00, 0.00, 1750.00, 'Cash', 0.00, 1750.00, '', 40010, '2023-03-14 19:04:58', 0, '0000-00-00 00:00:00'),
(87, 2023031411, 0, 2900.00, 0.00, 0.00, 2900.00, 'Cash', 0.00, 2900.00, '', 40010, '2023-03-14 19:08:24', 0, '0000-00-00 00:00:00'),
(88, 2023031412, 0, 2400.00, 0.00, 0.00, 2400.00, 'Cash', 0.00, 2400.00, '', 40010, '2023-03-14 19:30:47', 0, '0000-00-00 00:00:00'),
(89, 2023031413, 0, 1600.00, 0.00, 0.00, 1600.00, 'Cash', 0.00, 1600.00, '', 40010, '2023-03-14 20:31:47', 0, '0000-00-00 00:00:00'),
(93, 2023031414, 0, 3400.00, 0.00, 0.00, 3400.00, 'Cash', 0.00, 3400.00, '', 40010, '2023-03-14 20:53:46', 0, '0000-00-00 00:00:00'),
(95, 202303151, 0, 1550.00, 0.00, 0.00, 1550.00, 'Cash', 0.00, 1550.00, '', 40010, '2023-03-15 13:56:26', 0, '0000-00-00 00:00:00'),
(96, 202303152, 0, 1600.00, 0.00, 0.00, 1600.00, 'Cash', 0.00, 1600.00, '', 40010, '2023-03-15 13:57:56', 0, '0000-00-00 00:00:00'),
(97, 202303153, 0, 1600.00, 0.00, 0.00, 1600.00, 'Bkash', 0.00, 1600.00, '', 40010, '2023-03-15 16:39:43', 0, '0000-00-00 00:00:00'),
(98, 202303154, 0, 1850.00, 0.00, 0.00, 1850.00, 'Cash', 0.00, 1850.00, '', 40010, '2023-03-15 16:51:10', 0, '0000-00-00 00:00:00'),
(99, 202303155, 0, 1600.00, 0.00, 0.00, 1600.00, 'Cash', 0.00, 1600.00, '', 40010, '2023-03-15 17:10:11', 0, '0000-00-00 00:00:00'),
(100, 202303156, 0, 6500.00, 0.00, 0.00, 6500.00, 'Cash', 0.00, 6500.00, '', 40010, '2023-03-15 18:24:46', 0, '0000-00-00 00:00:00'),
(101, 0, 0, 0.00, 0.00, 0.00, 0.00, 'Cash', 0.00, 6500.00, '', 40010, '2023-03-15 18:27:02', 0, '0000-00-00 00:00:00'),
(102, 202303157, 0, 4250.00, 0.00, 0.00, 4250.00, 'Cash', 0.00, 4250.00, '', 40010, '2023-03-15 18:29:52', 0, '0000-00-00 00:00:00'),
(103, 202303158, 0, 2500.00, 0.00, 0.00, 2500.00, 'Cash', 0.00, 2500.00, '', 40010, '2023-03-15 18:30:54', 0, '0000-00-00 00:00:00'),
(104, 202303159, 0, 4950.00, 0.00, 0.00, 4950.00, 'Cash', 0.00, 4950.00, '', 40010, '2023-03-15 18:37:46', 0, '0000-00-00 00:00:00'),
(105, 2023031510, 0, 5200.00, 0.00, 0.00, 5200.00, 'Cash', 0.00, 5200.00, '', 40010, '2023-03-15 18:48:30', 0, '0000-00-00 00:00:00'),
(106, 2023031511, 0, 2850.00, 0.00, 0.00, 2850.00, 'Cash', 0.00, 2850.00, '', 40010, '2023-03-15 18:49:51', 0, '0000-00-00 00:00:00'),
(107, 2023031512, 0, 2500.00, 0.00, 0.00, 2500.00, 'Cash', 0.00, 2500.00, '', 40010, '2023-03-15 18:52:30', 0, '0000-00-00 00:00:00'),
(108, 2023031513, 0, 2000.00, 0.00, 0.00, 2000.00, 'Cash', 0.00, 2000.00, '', 40010, '2023-03-15 19:01:02', 0, '0000-00-00 00:00:00'),
(109, 2023031514, 0, 2850.00, 0.00, 0.00, 2850.00, 'Cash', 0.00, 2850.00, '', 40010, '2023-03-15 19:03:44', 0, '0000-00-00 00:00:00'),
(110, 2023031515, 0, 4150.00, 0.00, 0.00, 4150.00, 'Cash', 0.00, 4150.00, '', 40010, '2023-03-15 19:10:22', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pos_sale_detail`
--

CREATE TABLE `pos_sale_detail` (
  `id` int(11) NOT NULL,
  `sequence` int(11) NOT NULL,
  `sale_no` int(11) NOT NULL,
  `sale_date` date NOT NULL,
  `customer` varchar(250) NOT NULL,
  `item_id` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `rate` double(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `pure_amt` float(10,2) NOT NULL,
  `tax_amount` float(10,2) NOT NULL,
  `discount` float(10,2) NOT NULL,
  `grand_total` float(10,2) NOT NULL,
  `status` enum('MANUAL','PENDING','HOLD','CHECKED','PAID','CANCELED') NOT NULL,
  `warehouse` int(11) NOT NULL,
  `group_for` int(11) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pos_sale_detail`
--

INSERT INTO `pos_sale_detail` (`id`, `sequence`, `sale_no`, `sale_date`, `customer`, `item_id`, `color`, `rate`, `qty`, `pure_amt`, `tax_amount`, `discount`, `grand_total`, `status`, `warehouse`, `group_for`, `entry_by`, `entry_at`) VALUES
(1, 1, 202303121, '2023-03-12', '73', 48, '57', 2100.00, 1, 2100.00, 0.00, 210.00, 1890.00, 'CHECKED', 1, 0, 40010, '2023-03-12 13:23:19'),
(2, 2, 202303122, '2023-03-12', '73', 28, '47', 2200.00, 1, 2200.00, 0.00, 220.00, 1980.00, 'CHECKED', 1, 0, 40010, '2023-03-12 15:49:11'),
(6, 3, 202303123, '2023-03-12', '73', 12, '20', 2500.00, 1, 2500.00, 0.00, 250.00, 2250.00, 'CHECKED', 1, 0, 40010, '2023-03-12 16:01:54'),
(8, 4, 202303124, '2023-03-12', '73', 57, '15', 2400.00, 1, 2400.00, 0.00, 240.00, 2160.00, 'CHECKED', 1, 0, 40010, '2023-03-12 16:57:31'),
(12, 5, 202303125, '2023-03-12', '73', 57, '32', 2400.00, 1, 2400.00, 0.00, 240.00, 2160.00, 'CHECKED', 1, 0, 40010, '2023-03-12 18:00:27'),
(14, 6, 202303126, '2023-03-12', '73', 60, '47', 1900.00, 1, 1900.00, 0.00, 190.00, 1710.00, 'CHECKED', 1, 0, 40010, '2023-03-12 18:05:50'),
(16, 7, 202303127, '2023-03-12', '73', 60, '47', 1900.00, 1, 1900.00, 0.00, 190.00, 1710.00, 'CHECKED', 1, 0, 40010, '2023-03-12 18:09:40'),
(20, 8, 202303128, '2023-03-12', '73', 6, '34', 2350.00, 1, 2350.00, 0.00, 235.00, 2115.00, 'CHECKED', 1, 0, 40010, '2023-03-12 18:32:17'),
(22, 9, 202303129, '2023-03-12', '73', 67, '26', 1900.00, 1, 1900.00, 0.00, 190.00, 1710.00, 'CHECKED', 1, 0, 40010, '2023-03-12 18:44:40'),
(24, 10, 2023031210, '2023-03-12', '73', 13, '81', 2850.00, 1, 2850.00, 0.00, 285.00, 2565.00, 'CHECKED', 1, 0, 40010, '2023-03-12 18:48:01'),
(26, 11, 2023031211, '2023-03-12', '73', 13, '81', 2850.00, 1, 2850.00, 0.00, 285.00, 2565.00, 'CHECKED', 1, 0, 40010, '2023-03-12 18:50:31'),
(28, 12, 2023031212, '2023-03-12', '73', 13, '81', 2850.00, 1, 2850.00, 0.00, 285.00, 2565.00, 'CHECKED', 1, 0, 40010, '2023-03-12 18:51:38'),
(30, 13, 2023031213, '2023-03-12', '73', 32, '15', 1350.00, 1, 1350.00, 0.00, 135.00, 1215.00, 'CHECKED', 1, 0, 40010, '2023-03-12 18:53:05'),
(32, 14, 2023031214, '2023-03-12', '73', 32, '39', 1350.00, 1, 1350.00, 0.00, 135.00, 1215.00, 'CHECKED', 1, 0, 40010, '2023-03-12 18:54:52'),
(34, 15, 2023031215, '2023-03-12', '73', 27, '53', 1300.00, 1, 1300.00, 0.00, 130.00, 1170.00, 'CHECKED', 1, 0, 40010, '2023-03-12 18:55:37'),
(36, 16, 2023031216, '2023-03-12', '73', 34, '24', 2150.00, 1, 2150.00, 0.00, 215.00, 1935.00, 'CHECKED', 1, 0, 40010, '2023-03-12 18:57:00'),
(38, 17, 2023031217, '2023-03-12', '73', 34, '24', 2150.00, 1, 2150.00, 0.00, 215.00, 1935.00, 'CHECKED', 1, 0, 40010, '2023-03-12 18:58:06'),
(40, 18, 2023031218, '2023-03-12', '73', 6, '33', 2350.00, 1, 2350.00, 0.00, 235.00, 2115.00, 'CHECKED', 1, 0, 40010, '2023-03-12 18:58:51'),
(42, 19, 2023031219, '2023-03-12', '73', 48, '56', 2100.00, 1, 2100.00, 0.00, 210.00, 1890.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:04:58'),
(44, 20, 2023031220, '2023-03-12', '73', 28, '24', 2200.00, 1, 2200.00, 0.00, 220.00, 1980.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:07:33'),
(46, 21, 2023031221, '2023-03-12', '73', 42, '38', 1650.00, 1, 1650.00, 0.00, 165.00, 1485.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:08:40'),
(54, 22, 2023031222, '2023-03-12', '73', 43, '9', 2850.00, 1, 2850.00, 0.00, 285.00, 2565.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:15:24'),
(56, 23, 2023031223, '2023-03-12', '73', 31, '33', 2900.00, 1, 2900.00, 0.00, 290.00, 2610.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:17:08'),
(58, 24, 2023031224, '2023-03-12', '73', 5, '32', 1600.00, 1, 1600.00, 0.00, 160.00, 1440.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:24:56'),
(60, 25, 2023031225, '2023-03-12', '73', 35, '26', 1250.00, 1, 1250.00, 0.00, 125.00, 1125.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:26:07'),
(62, 26, 2023031226, '2023-03-12', '73', 41, '69', 1600.00, 1, 1600.00, 0.00, 160.00, 1440.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:27:16'),
(64, 27, 2023031227, '2023-03-12', '73', 42, '7', 1650.00, 1, 1650.00, 0.00, 165.00, 1485.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:28:51'),
(66, 28, 2023031228, '2023-03-12', '73', 31, '83', 2900.00, 1, 2900.00, 0.00, 290.00, 2610.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:30:54'),
(68, 29, 2023031229, '2023-03-12', '73', 28, '47', 2200.00, 1, 2200.00, 0.00, 220.00, 1980.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:33:36'),
(70, 30, 2023031230, '2023-03-12', '73', 30, '16', 2500.00, 1, 2500.00, 0.00, 250.00, 2250.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:34:25'),
(72, 31, 2023031231, '2023-03-12', '73', 31, '14', 2900.00, 1, 2900.00, 0.00, 290.00, 2610.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:37:20'),
(74, 32, 2023031232, '2023-03-12', '73', 28, '47', 2200.00, 1, 2200.00, 0.00, 220.00, 1980.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:40:48'),
(76, 33, 2023031233, '2023-03-12', '73', 21, '50', 1200.00, 1, 1200.00, 0.00, 120.00, 1080.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:42:28'),
(78, 34, 2023031234, '2023-03-12', '73', 30, '55', 2500.00, 1, 2500.00, 0.00, 250.00, 2250.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:46:33'),
(80, 35, 2023031235, '2023-03-12', '', 21, '19', 1200.00, 1, 1200.00, 0.00, 120.00, 1080.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:48:11'),
(82, 36, 2023031236, '2023-03-12', '', 22, '50', 1600.00, 1, 1600.00, 0.00, 160.00, 1440.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:48:47'),
(84, 37, 2023031237, '2023-03-12', '', 22, '19', 1600.00, 1, 1600.00, 0.00, 160.00, 1440.00, 'CHECKED', 1, 0, 40010, '2023-03-12 19:50:12'),
(86, 38, 2023031238, '2023-03-12', '', 28, '47', 2200.00, 1, 2200.00, 0.00, 220.00, 1980.00, 'CHECKED', 1, 0, 40010, '2023-03-12 20:02:44'),
(88, 39, 2023031239, '2023-03-12', '', 22, '50', 1600.00, 1, 1600.00, 0.00, 160.00, 1440.00, 'CHECKED', 1, 0, 40010, '2023-03-12 20:03:47'),
(90, 40, 2023031240, '2023-03-12', '', 5, '32', 1600.00, 1, 1600.00, 0.00, 160.00, 1440.00, 'CHECKED', 1, 0, 40010, '2023-03-12 20:05:26'),
(92, 41, 2023031241, '2023-03-12', '', 5, '32', 1600.00, 1, 1600.00, 0.00, 160.00, 1440.00, 'CHECKED', 1, 0, 40010, '2023-03-12 20:06:39'),
(94, 42, 2023031242, '2023-03-12', '', 62, '72', 1750.00, 1, 1750.00, 0.00, 175.00, 1575.00, 'CHECKED', 1, 0, 40010, '2023-03-12 20:07:25'),
(96, 43, 2023031243, '2023-03-12', '', 21, '19', 1200.00, 1, 1200.00, 0.00, 120.00, 1080.00, 'CHECKED', 1, 0, 40010, '2023-03-12 20:12:21'),
(98, 44, 2023031244, '2023-03-12', '', 61, '61', 1100.00, 1, 1100.00, 0.00, 110.00, 990.00, 'CHECKED', 1, 0, 40010, '2023-03-12 20:24:42'),
(100, 45, 2023031245, '2023-03-12', '', 28, '24', 2200.00, 1, 2200.00, 0.00, 220.00, 1980.00, 'CHECKED', 1, 0, 40010, '2023-03-12 20:37:50'),
(102, 46, 2023031246, '2023-03-12', '', 24, '52', 1800.00, 1, 1800.00, 0.00, 180.00, 1620.00, 'CHECKED', 1, 0, 40010, '2023-03-12 20:39:55'),
(104, 47, 2023031247, '2023-03-12', '', 21, '50', 1200.00, 1, 1200.00, 0.00, 120.00, 1080.00, 'CHECKED', 1, 0, 40010, '2023-03-12 20:43:13'),
(107, 48, 2023031248, '2023-03-12', '', 65, '43', 1250.00, 1, 1250.00, 0.00, 125.00, 1125.00, 'CHECKED', 1, 0, 40010, '2023-03-12 20:44:16'),
(109, 49, 2023031249, '2023-03-12', '', 7, '36', 2200.00, 1, 2200.00, 0.00, 205.00, 1995.00, 'CHECKED', 1, 0, 40010, '2023-03-12 20:49:31'),
(111, 50, 2023031250, '2023-03-12', '', 22, '50', 1600.00, 1, 1600.00, 0.00, 160.00, 1440.00, 'CHECKED', 1, 0, 40010, '2023-03-12 20:55:19'),
(113, 51, 2023031251, '2023-03-12', '', 7, '36', 2200.00, 1, 2200.00, 0.00, 220.00, 1980.00, 'CHECKED', 1, 0, 40010, '2023-03-12 20:58:19'),
(115, 52, 2023031252, '2023-03-12', '', 49, '19', 3400.00, 1, 3400.00, 0.00, 340.00, 3060.00, 'CHECKED', 1, 0, 40010, '2023-03-12 21:02:15'),
(117, 53, 2023031253, '2023-03-12', '', 48, '57', 2100.00, 1, 2100.00, 0.00, 210.00, 1890.00, 'CHECKED', 1, 0, 40010, '2023-03-12 21:04:29'),
(119, 54, 2023031254, '2023-03-12', '', 20, '20', 1750.00, 1, 1750.00, 0.00, 175.00, 1575.00, 'CHECKED', 1, 0, 40010, '2023-03-12 21:05:46'),
(121, 55, 2023031255, '2023-03-12', '', 21, '50', 1200.00, 1, 1200.00, 0.00, 120.00, 1080.00, 'CHECKED', 1, 0, 40010, '2023-03-12 21:07:05'),
(123, 56, 2023031256, '2023-03-12', '', 49, '19', 3400.00, 1, 3400.00, 0.00, 340.00, 3060.00, 'CHECKED', 1, 0, 40010, '2023-03-12 21:29:52'),
(125, 57, 2023031257, '2023-03-12', '', 21, '50', 1200.00, 1, 1200.00, 0.00, 120.00, 1080.00, 'CHECKED', 1, 0, 40010, '2023-03-12 21:33:24'),
(129, 1, 202303131, '2023-03-13', '73', 6, '', 2350.00, 1, 0.00, 0.00, 0.00, 0.00, 'MANUAL', 1, 0, 40010, '2023-03-13 12:36:44'),
(131, 1, 202303131, '2023-03-13', '73', 7, '', 2200.00, 1, 0.00, 0.00, 0.00, 0.00, 'MANUAL', 1, 0, 40010, '2023-03-13 12:38:19'),
(132, 1, 202303131, '2023-03-13', '73', 59, '', 1800.00, 1, 0.00, 0.00, 0.00, 0.00, 'MANUAL', 1, 0, 40010, '2023-03-13 12:38:31'),
(133, 1, 2023031258, '2023-03-13', '73', 6, '34', 2350.00, 1, 2350.00, 0.00, 235.00, 2115.00, 'CHECKED', 1, 0, 40010, '2023-03-13 12:39:51'),
(135, 1, 2023031258, '2023-03-13', '73', 59, '71', 1800.00, 1, 1800.00, 0.00, 150.00, 1650.00, 'CHECKED', 1, 0, 40010, '2023-03-13 12:40:03'),
(136, 1, 2023031258, '2023-03-13', '73', 66, '32', 1800.00, 1, 1800.00, 0.00, 180.00, 1620.00, 'CHECKED', 1, 0, 40010, '2023-03-13 12:40:11'),
(138, 1, 2023031258, '2023-03-13', '73', 7, '36', 2200.00, 1, 2200.00, 0.00, 220.00, 1980.00, 'CHECKED', 1, 0, 40010, '2023-03-13 12:40:36'),
(151, 2, 202303132, '2023-03-13', '', 48, '56', 2100.00, 1, 2100.00, 0.00, 0.00, 2100.00, 'MANUAL', 1, 0, 40010, '2023-03-13 17:23:39'),
(153, 2, 202303132, '2023-03-13', '', 28, '', 2200.00, 1, 0.00, 0.00, 0.00, 0.00, 'MANUAL', 1, 0, 40010, '2023-03-13 17:23:56'),
(155, 3, 202303133, '2023-03-13', '', 28, '24', 2200.00, 1, 2200.00, 0.00, 0.00, 2200.00, 'CHECKED', 1, 0, 40010, '2023-03-13 17:24:28'),
(157, 3, 202303133, '2023-03-13', '', 48, '56', 2100.00, 1, 2100.00, 0.00, 0.00, 2100.00, 'CHECKED', 1, 0, 40010, '2023-03-13 17:24:57'),
(159, 4, 202303134, '2023-03-13', '73', 24, '51', 1800.00, 1, 1800.00, 0.00, 0.00, 1800.00, 'CHECKED', 1, 0, 40010, '2023-03-13 18:03:57'),
(167, 4, 202303134, '2023-03-13', '73', 24, '52', 1800.00, 1, 1800.00, 0.00, 0.00, 1800.00, 'CHECKED', 1, 0, 40010, '2023-03-13 18:05:13'),
(174, 5, 202303135, '2023-03-13', '', 8, '37', 1800.00, 1, 1800.00, 0.00, 90.00, 1710.00, 'CHECKED', 1, 0, 40010, '2023-03-13 18:26:13'),
(176, 6, 202303136, '2023-03-13', '', 31, '14', 2900.00, 1, 2900.00, 0.00, 145.00, 2755.00, 'CHECKED', 1, 0, 40010, '2023-03-13 18:30:34'),
(184, 7, 202303137, '2023-03-13', '73', 27, '53', 1300.00, 1, 1300.00, 0.00, 0.00, 1300.00, 'MANUAL', 1, 0, 40010, '2023-03-13 19:29:31'),
(187, 8, 202303138, '2023-03-13', '', 64, '50', 1550.00, 1, 1550.00, 0.00, 0.00, 1550.00, 'CHECKED', 1, 0, 40010, '2023-03-13 19:36:59'),
(189, 8, 202303138, '2023-03-13', '', 52, '59', 1300.00, 1, 1300.00, 0.00, 0.00, 1300.00, 'CHECKED', 1, 0, 40010, '2023-03-13 19:37:38'),
(195, 9, 202303139, '2023-03-13', '', 71, '90', 1750.00, 1, 1750.00, 0.00, 0.00, 1750.00, 'CHECKED', 1, 0, 40010, '2023-03-13 19:54:06'),
(197, 10, 2023031310, '2023-03-13', '', 28, '24', 2200.00, 1, 2200.00, 0.00, 0.00, 2200.00, 'CHECKED', 1, 0, 40010, '2023-03-13 20:12:04'),
(199, 11, 2023031311, '2023-03-13', '', 64, '50', 1550.00, 1, 1550.00, 0.00, 0.00, 1550.00, 'CHECKED', 1, 0, 40010, '2023-03-13 20:49:06'),
(201, 11, 2023031311, '2023-03-13', '', 31, '33', 2900.00, 1, 2900.00, 0.00, 0.00, 2900.00, 'CHECKED', 1, 0, 40010, '2023-03-13 20:49:43'),
(207, 12, 2023031312, '2023-03-13', '', 39, '65', 1750.00, 1, 1750.00, 0.00, 88.00, 1662.00, 'CHECKED', 1, 0, 40010, '2023-03-13 21:45:54'),
(209, 12, 2023031312, '2023-03-13', '', 26, '19', 900.00, 1, 900.00, 0.00, 45.00, 855.00, 'CHECKED', 1, 0, 40010, '2023-03-13 21:47:00'),
(211, 1, 202303141, '2023-03-14', '', 71, '86', 1750.00, 1, 1750.00, 0.00, 0.00, 1750.00, 'CHECKED', 1, 0, 40010, '2023-03-14 12:18:20'),
(213, 2, 202303142, '2023-03-14', '', 48, '57', 2100.00, 1, 2100.00, 0.00, 0.00, 2100.00, 'CHECKED', 1, 0, 40010, '2023-03-14 14:00:06'),
(215, 3, 202303143, '2023-03-14', '73', 33, '58', 1500.00, 1, 1500.00, 0.00, 0.00, 1500.00, 'CHECKED', 1, 0, 40010, '2023-03-14 16:27:18'),
(218, 3, 202303143, '2023-03-14', '', 48, '57', 2100.00, 1, 2100.00, 0.00, 0.00, 2100.00, 'CHECKED', 1, 0, 40010, '2023-03-14 16:28:27'),
(220, 4, 202303144, '2023-03-14', '', 33, '58', 1500.00, 1, 1500.00, 0.00, 0.00, 1500.00, 'CHECKED', 1, 0, 40010, '2023-03-14 17:25:46'),
(222, 4, 202303144, '2023-03-14', '', 22, '50', 1600.00, 1, 1600.00, 0.00, 0.00, 1600.00, 'CHECKED', 1, 0, 40010, '2023-03-14 17:26:08'),
(224, 5, 202303145, '2023-03-14', '', 64, '59', 1550.00, 1, 1550.00, 0.00, 0.00, 1550.00, 'CHECKED', 1, 0, 40010, '2023-03-14 17:32:59'),
(226, 5, 202303145, '2023-03-14', '', 64, '50', 1550.00, 1, 1550.00, 0.00, 0.00, 1550.00, 'CHECKED', 1, 0, 40010, '2023-03-14 17:33:11'),
(228, 5, 202303145, '2023-03-14', '', 27, '54', 1300.00, 1, 1300.00, 0.00, 0.00, 1300.00, 'CHECKED', 1, 0, 40010, '2023-03-14 17:33:30'),
(230, 5, 202303145, '2023-03-14', '', 70, '87', 1650.00, 1, 1650.00, 0.00, 0.00, 1650.00, 'CHECKED', 1, 0, 40010, '2023-03-14 17:33:46'),
(232, 5, 202303145, '2023-03-14', '', 26, '19', 900.00, 1, 900.00, 0.00, 0.00, 900.00, 'CHECKED', 1, 0, 40010, '2023-03-14 17:34:07'),
(234, 5, 202303145, '2023-03-14', '', 57, '32', 2400.00, 1, 2400.00, 0.00, 0.00, 2400.00, 'CHECKED', 1, 0, 40010, '2023-03-14 17:34:28'),
(236, 6, 202303146, '2023-03-14', '', 22, '50', 1600.00, 1, 1600.00, 0.00, 0.00, 1600.00, 'CHECKED', 1, 0, 40010, '2023-03-14 17:50:39'),
(238, 7, 202303147, '2023-03-14', '', 48, '56', 2100.00, 1, 2100.00, 0.00, 0.00, 2100.00, 'CHECKED', 1, 0, 40010, '2023-03-14 18:21:13'),
(241, 8, 202303148, '2023-03-14', '', 30, '16', 2500.00, 1, 2500.00, 0.00, 0.00, 2500.00, 'CHECKED', 1, 0, 40010, '2023-03-14 18:35:24'),
(243, 9, 202303149, '2023-03-14', '73', 50, '81', 2900.00, 1, 2900.00, 0.00, 0.00, 2900.00, 'CHECKED', 1, 0, 40010, '2023-03-14 19:01:56'),
(244, 9, 202303149, '2023-03-14', '', 6, '34', 2350.00, 1, 2350.00, 0.00, 0.00, 2350.00, 'CHECKED', 1, 0, 40010, '2023-03-14 19:02:13'),
(246, 10, 2023031410, '2023-03-14', '', 71, '86', 1750.00, 1, 1750.00, 0.00, 0.00, 1750.00, 'CHECKED', 1, 0, 40010, '2023-03-14 19:04:05'),
(248, 11, 2023031411, '2023-03-14', '', 50, '81', 2900.00, 1, 2900.00, 0.00, 0.00, 2900.00, 'CHECKED', 1, 0, 40010, '2023-03-14 19:07:51'),
(250, 12, 2023031412, '2023-03-14', '', 57, '32', 2400.00, 1, 2400.00, 0.00, 0.00, 2400.00, 'CHECKED', 1, 0, 40010, '2023-03-14 19:30:25'),
(252, 13, 2023031413, '2023-03-14', '73', 5, '32', 1600.00, 1, 1600.00, 0.00, 0.00, 1600.00, 'CHECKED', 1, 0, 40010, '2023-03-14 20:30:16'),
(259, 14, 2023031414, '2023-03-14', '', 49, '80', 3400.00, 1, 3400.00, 0.00, 0.00, 3400.00, 'CHECKED', 1, 0, 40010, '2023-03-14 20:53:22'),
(261, 1, 202303151, '2023-03-15', '73', 64, '59', 1550.00, 1, 1550.00, 0.00, 0.00, 1550.00, 'CHECKED', 1, 0, 40010, '2023-03-15 12:12:17'),
(262, 2, 202303152, '2023-03-15', '73', 5, '32', 1600.00, 1, 1600.00, 0.00, 0.00, 1600.00, 'CHECKED', 1, 0, 40010, '2023-03-15 13:57:31'),
(263, 3, 202303153, '2023-03-15', '73', 22, '19', 1600.00, 1, 1600.00, 0.00, 0.00, 1600.00, 'CHECKED', 1, 0, 40010, '2023-03-15 16:34:30'),
(264, 4, 202303154, '2023-03-15', '73', 51, '59', 1850.00, 1, 1850.00, 0.00, 0.00, 1850.00, 'CHECKED', 1, 0, 40010, '2023-03-15 16:50:38'),
(265, 5, 202303155, '2023-03-15', '73', 22, '50', 1600.00, 1, 1600.00, 0.00, 0.00, 1600.00, 'CHECKED', 1, 0, 40010, '2023-03-15 17:09:43'),
(266, 6, 202303156, '2023-03-15', '73', 30, '16', 2500.00, 1, 2500.00, 0.00, 0.00, 2500.00, 'CHECKED', 1, 0, 40010, '2023-03-15 18:19:04'),
(267, 6, 202303156, '2023-03-15', '73', 67, '15', 1900.00, 1, 1900.00, 0.00, 0.00, 1900.00, 'CHECKED', 1, 0, 40010, '2023-03-15 18:20:57'),
(268, 6, 202303156, '2023-03-15', '73', 63, '47', 2100.00, 1, 2100.00, 0.00, 0.00, 2100.00, 'CHECKED', 1, 0, 40010, '2023-03-15 18:21:13'),
(269, 7, 202303157, '2023-03-15', '73', 71, '86', 1750.00, 1, 1750.00, 0.00, 0.00, 1750.00, 'CHECKED', 1, 0, 40010, '2023-03-15 18:27:50'),
(270, 7, 202303157, '2023-03-15', '73', 30, '16', 2500.00, 1, 2500.00, 0.00, 0.00, 2500.00, 'CHECKED', 1, 0, 40010, '2023-03-15 18:28:54'),
(271, 8, 202303158, '2023-03-15', '73', 30, '55', 2500.00, 1, 2500.00, 0.00, 0.00, 2500.00, 'CHECKED', 1, 0, 40010, '2023-03-15 18:30:34'),
(273, 9, 202303159, '2023-03-15', '73', 75, '73', 2850.00, 1, 2850.00, 0.00, 0.00, 2850.00, 'CHECKED', 1, 0, 40010, '2023-03-15 18:36:46'),
(274, 9, 202303159, '2023-03-15', '73', 48, '57', 2100.00, 1, 2100.00, 0.00, 0.00, 2100.00, 'CHECKED', 1, 0, 40010, '2023-03-15 18:37:06'),
(275, 10, 2023031510, '2023-03-15', '73', 75, '42', 2850.00, 1, 2850.00, 0.00, 0.00, 2850.00, 'CHECKED', 1, 0, 40010, '2023-03-15 18:46:11'),
(276, 10, 2023031510, '2023-03-15', '73', 6, '34', 2350.00, 1, 2350.00, 0.00, 0.00, 2350.00, 'CHECKED', 1, 0, 40010, '2023-03-15 18:46:42'),
(277, 11, 2023031511, '2023-03-15', '73', 13, '36', 2850.00, 1, 2850.00, 0.00, 0.00, 2850.00, 'CHECKED', 1, 0, 40010, '2023-03-15 18:49:29'),
(278, 12, 2023031512, '2023-03-15', '73', 30, '55', 2500.00, 1, 2500.00, 0.00, 0.00, 2500.00, 'CHECKED', 1, 0, 40010, '2023-03-15 18:51:54'),
(281, 13, 2023031513, '2023-03-15', '73', 36, '18', 2000.00, 1, 2000.00, 0.00, 0.00, 2000.00, 'CHECKED', 1, 0, 40010, '2023-03-15 19:00:16'),
(282, 14, 2023031514, '2023-03-15', '73', 75, '42', 2850.00, 1, 2850.00, 0.00, 0.00, 2850.00, 'CHECKED', 1, 0, 40010, '2023-03-15 19:01:49'),
(283, 15, 2023031515, '2023-03-15', '73', 8, '18', 1800.00, 1, 1800.00, 0.00, 0.00, 1800.00, 'CHECKED', 1, 0, 40010, '2023-03-15 19:06:52'),
(284, 15, 2023031515, '2023-03-15', '73', 6, '34', 2350.00, 1, 2350.00, 0.00, 0.00, 2350.00, 'CHECKED', 1, 0, 40010, '2023-03-15 19:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_master`
--

CREATE TABLE `purchase_master` (
  `purchase_no` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `entry_by` int(11) NOT NULL,
  `status` enum('MANUAL','UNCHECKED','CHECKED','COMPLETED') NOT NULL,
  `group_for` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchase_master`
--

INSERT INTO `purchase_master` (`purchase_no`, `purchase_date`, `supplier_id`, `supplier_name`, `entry_at`, `entry_by`, `status`, `group_for`) VALUES
(1, '2023-03-12', 1, 'JS', '2023-03-12 11:08:06', 40010, 'MANUAL', 1),
(2, '2023-03-13', 1, 'JS', '2023-03-13 07:55:04', 40010, 'MANUAL', 1),
(3, '2023-03-13', 1, 'JS', '2023-03-13 13:50:34', 40010, 'MANUAL', 1),
(4, '2023-03-15', 1, 'JS', '2023-03-15 06:10:53', 40010, 'MANUAL', 1),
(5, '2023-03-15', 1, 'JS', '2023-03-15 11:29:49', 40010, 'MANUAL', 1),
(6, '2023-03-15', 1, 'JS', '2023-03-15 11:37:09', 40010, 'MANUAL', 1),
(7, '2023-03-15', 1, 'JS', '2023-03-15 11:47:59', 40010, 'MANUAL', 1),
(8, '2023-03-15', 1, 'JS', '2023-03-15 12:32:38', 40010, 'MANUAL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `purchase_no` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `unit` varchar(55) NOT NULL,
  `qty` decimal(20,0) NOT NULL,
  `rate` decimal(20,0) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `group_for` int(11) NOT NULL,
  `status` enum('MANUAL','PROCESSING','COMPLETED','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `purchase_no`, `purchase_date`, `item_id`, `color`, `unit`, `qty`, `rate`, `amount`, `group_for`, `status`) VALUES
(1, 1, '2023-03-12', 22, 50, 'single', '10', '1350', '13500.00', 1, 'MANUAL'),
(2, 1, '2023-03-12', 69, 16, '2 Pcs', '6', '1450', '8700.00', 1, 'MANUAL'),
(3, 1, '2023-03-12', 69, 15, '2 Pcs', '6', '1450', '8700.00', 1, 'MANUAL'),
(4, 2, '2023-03-13', 70, 87, '3 Pcs', '5', '1400', '7000.00', 1, 'MANUAL'),
(5, 2, '2023-03-13', 70, 88, '3 Pcs', '5', '1400', '7000.00', 1, 'MANUAL'),
(6, 2, '2023-03-13', 71, 86, '3 Pcs', '5', '1450', '7250.00', 1, 'MANUAL'),
(7, 2, '2023-03-13', 71, 90, '3 Pcs', '5', '1450', '7250.00', 1, 'MANUAL'),
(8, 2, '2023-03-13', 72, 24, '3 Pcs', '5', '3450', '17250.00', 1, 'MANUAL'),
(9, 2, '2023-03-13', 72, 59, '3 Pcs', '5', '3450', '17250.00', 1, 'MANUAL'),
(10, 2, '2023-03-13', 73, 75, '3 Pcs', '5', '2650', '13250.00', 1, 'MANUAL'),
(11, 2, '2023-03-13', 73, 38, '3 Pcs', '5', '2650', '13250.00', 1, 'MANUAL'),
(12, 2, '2023-03-13', 13, 81, '3 Pcs', '1', '2500', '2500.00', 1, 'MANUAL'),
(13, 3, '2023-03-13', 28, 24, '3 Pcs', '4', '1850', '7400.00', 1, 'MANUAL'),
(14, 4, '2023-03-15', 31, 83, '3 Pcs', '10', '2600', '26000.00', 1, 'MANUAL'),
(15, 5, '2023-03-15', 22, 50, 'single', '5', '1350', '6750.00', 1, 'MANUAL'),
(16, 6, '2023-03-15', 23, 19, '', '0', '0', '0.00', 1, 'MANUAL'),
(17, 7, '2023-03-15', 23, 19, 'single', '10', '550', '5500.00', 1, 'MANUAL'),
(18, 7, '2023-03-15', 23, 15, 'single', '5', '550', '2750.00', 1, 'MANUAL'),
(19, 7, '2023-03-15', 23, 50, 'single', '9', '550', '4950.00', 1, 'MANUAL'),
(20, 8, '2023-03-15', 75, 73, '4388', '10', '2500', '25000.00', 1, 'MANUAL'),
(21, 8, '2023-03-15', 75, 42, '4388', '10', '0', '0.00', 1, 'MANUAL');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payment`
--

CREATE TABLE `purchase_payment` (
  `id` int(11) NOT NULL,
  `purchase_no` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `group_for` int(11) NOT NULL,
  `purchase_amount` decimal(20,2) NOT NULL,
  `payment_amount` decimal(20,2) NOT NULL,
  `discount_amount` decimal(20,2) NOT NULL,
  `due_amt` decimal(20,2) NOT NULL,
  `payment_types` varchar(55) NOT NULL,
  `status` enum('PENDING','PROCESSING','COMPLETED','') NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `entry_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_details`
--

CREATE TABLE `purchase_return_details` (
  `id` int(11) NOT NULL,
  `purchase_no` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `unit` varchar(55) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `color` int(11) NOT NULL,
  `damage_qty` decimal(20,2) NOT NULL,
  `rate` decimal(20,2) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `group_for` int(11) NOT NULL,
  `status` enum('MANUAL','PROCESSING','COMPLETED','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_master`
--

CREATE TABLE `purchase_return_master` (
  `purchase_no` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `entry_by` int(11) NOT NULL,
  `status` enum('MANUAL','UNCHECKED','CHECKED','COMPLETED') NOT NULL,
  `group_for` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `review` text NOT NULL,
  `rating` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_master`
--

CREATE TABLE `sales_master` (
  `s_no` int(11) NOT NULL,
  `manual_s_no` bigint(20) NOT NULL,
  `sales_date` date NOT NULL,
  `dealer_type` varchar(100) NOT NULL,
  `dealer_code` int(11) NOT NULL,
  `dealer_name` text NOT NULL,
  `dealer_address` text NOT NULL,
  `delivery_mode` enum('','H2H','Courier','Pathao') NOT NULL,
  `contact` varchar(100) NOT NULL,
  `group_for` int(11) NOT NULL,
  `warehouse` int(11) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `entry_by` int(11) NOT NULL,
  `status` enum('MANUAL','UNCHECKED','CHECKED','DELIVERED','COMPLETED') NOT NULL,
  `order_note` text NOT NULL,
  `customer_note` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `s_no` int(11) NOT NULL,
  `s_date` date NOT NULL,
  `customer` text NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `mobile_1` varchar(55) NOT NULL,
  `mobile_2` varchar(55) NOT NULL,
  `note` text NOT NULL,
  `item_id` int(11) NOT NULL,
  `unit` varchar(55) NOT NULL,
  `qty` decimal(20,2) NOT NULL,
  `rate` decimal(20,2) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `delivery_fee` int(11) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `color` varchar(255) NOT NULL,
  `status` enum('MANUAL','PROCESSING','COMPLETED','DELIVERED') NOT NULL,
  `group_for` int(11) NOT NULL,
  `agency` varchar(255) NOT NULL,
  `warehouse` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_info`
--

CREATE TABLE `sub_category_info` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `entry_by` int(11) DEFAULT NULL,
  `group_for` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_category_info`
--

INSERT INTO `sub_category_info` (`id`, `category`, `category_id`, `pic`, `entry_by`, `group_for`, `priority`) VALUES
(2, 'Unstitch 3pcs ', 1, NULL, 10000, 0, 1),
(3, 'Semi stitch 3pcs', 1, NULL, 10000, 0, 2),
(4, 'Stitch 3pcs', 1, NULL, 10000, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_category_info`
--

CREATE TABLE `sub_sub_category_info` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `entry_by` int(11) DEFAULT NULL,
  `group_for` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_sub_category_info`
--

INSERT INTO `sub_sub_category_info` (`id`, `category`, `category_id`, `sub_category_id`, `pic`, `entry_by`, `group_for`, `priority`) VALUES
(2, 'cotton printed 3pcs', 1, 2, NULL, 10000, 0, 1),
(3, ' lawn 3pcs', 1, 2, NULL, 10000, 0, 2),
(4, ' digital printed 3pcs', 1, 2, NULL, 10000, 0, 3),
(5, 'jaipuri printed 3pcs', 1, 2, NULL, 10000, 0, 4),
(6, 'jamdani worked 3pcs', 1, 3, NULL, 10000, 0, 5),
(7, 'embroidery worked  3pcs', 1, 3, NULL, 10000, 0, 6),
(8, 'ari worked 3pcs', 1, 3, NULL, 10000, 0, 7),
(9, 'cording worked 3pcs', 1, 3, NULL, 10000, 0, 8),
(10, 'Delhi boutique type   2pcs', 1, 3, NULL, 10000, 0, 9),
(11, 'boutique 3pcs ', 1, 3, NULL, 10000, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `suggested_item`
--

CREATE TABLE `suggested_item` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `suggested_item_id` int(11) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_info`
--

CREATE TABLE `supplier_info` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `group_for` int(11) NOT NULL,
  `phone_no` varchar(100) DEFAULT NULL,
  `ledger_id` int(11) NOT NULL,
  `previous_due` decimal(11,2) NOT NULL,
  `advance` decimal(11,2) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `entry_by` int(11) DEFAULT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier_info`
--

INSERT INTO `supplier_info` (`id`, `supplier_name`, `address`, `group_for`, `phone_no`, `ledger_id`, `previous_due`, `advance`, `status`, `entry_by`, `entry_at`, `updated_by`, `updated_at`) VALUES
(1, 'JS', 'Dhaka', 1, '', 1000255, '0.00', '0.00', 'Active', 10000, '2022-06-13 16:46:45', 40003, '2022-07-02 21:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `theme_settings`
--

CREATE TABLE `theme_settings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `theme_color` varchar(255) NOT NULL,
  `icon_color` varchar(255) NOT NULL,
  `text_color` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `entry_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `theme_settings`
--

INSERT INTO `theme_settings` (`id`, `title`, `theme_color`, `icon_color`, `text_color`, `status`, `entry_by`) VALUES
(1, 'Royal blue and Sky blue', '#4169E1', '#87CEEB', '#fff', '', 10000),
(2, 'Dark Glossy Pink and White', '#FF69B4', '#FF69B4', '#fff', 'Active', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tutorial_videos`
--

CREATE TABLE `tutorial_videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `video_link` text DEFAULT NULL,
  `description_t` text NOT NULL,
  `entry_by` int(11) DEFAULT NULL,
  `group_for` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tutorial_videos`
--

INSERT INTO `tutorial_videos` (`id`, `title`, `description`, `video_link`, `description_t`, `entry_by`, `group_for`, `priority`) VALUES
(1, 'how to order', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Ry5eY30cuog\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, '1', 10000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `unit_name`) VALUES
(1, 'Pcs'),
(2, 'Ton'),
(3, 'Bag'),
(4, 'Ctn'),
(5, 'Kg'),
(6, 'Mtr');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `group_for` int(11) DEFAULT NULL,
  `warehouse` int(11) NOT NULL,
  `entry_by` int(11) DEFAULT NULL,
  `entry_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `del` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `name`, `mobile`, `note`, `group_for`, `warehouse`, `entry_by`, `entry_at`, `updated_by`, `updated_at`, `del`) VALUES
(10000, 'kamrulhasan', 'kamrulerp@gmail.com', '12345@', 'kamrul hasan', '01843715062', 'test', 1, 1, 0, '2021-01-23 16:48:36', 10000, '2023-01-26 01:44:54', 0),
(20000, 'rony', 'payerrony@gmail.com', '123', 'Md.Payer Alam Rony', '01620114361', '', 1, 1, 0, '2021-01-27 06:45:50', 0, '2021-02-12 03:52:19', 1),
(30000, 'mollik', 'mollikplaza@gmail.com', '123', 'Imran Hossain', '01865042024', '', 1, 1, 0, '2021-01-27 06:45:50', 3, '2021-09-12 23:33:18', 1),
(40000, 'kam', 'agmkhair@gmail.com', '123', '10GB_SSBD', '01823585800', 'test', 1, 1, 1, '2021-02-13 12:25:24', NULL, NULL, 1),
(40001, 'sabbir', 'sabbir@rbdreliance.com', '123', 'Sabbir', '123', '', 1, 1, 10000, '2022-06-29 08:23:09', NULL, NULL, 1),
(40002, 'masum', 'masum@rbdreliance.com', '121', 'Md Masum', '123', '', 1, 1, 40001, '2022-06-29 08:24:49', NULL, NULL, 1),
(40003, 'firoz', 'firozahmedpro@gmail.com', 'f12345', 'Firoz Ahmed', '01759771111', '', 1, 1, 10000, '2022-06-29 08:27:27', 10000, '2023-01-03 00:43:57', 1),
(40004, 'syam', 'syam@gmail.com', '123', 'Md Syam', '123', '', 1, 1, 40003, '2022-07-02 11:01:58', NULL, NULL, 1),
(40005, 'storeuser1', 'store@rbdreliance.com', '123', 'Store User 1', '123', '', 1, 7, 40003, '2023-01-02 13:55:41', NULL, NULL, 1),
(40006, 'storeuser2', 'su2@gmail.com', '12345', 'Store User 2', '000', '', 1, 7, 40003, '2023-01-17 08:27:31', NULL, NULL, 1),
(40007, 'shazzad', 'shazzad.rbdreliance@gmail.com', 'Ss19@2023', 'Sheikh Shazzad', '01878177352', '', 1, 1, 40003, '2023-01-17 08:43:48', NULL, NULL, 1),
(40008, 'sabbir1', 'sabbir.rbdreliance@gmail.com', 'Sh19@2023', 'Sabbir Hossain', '01928446903', '', 1, 1, 40003, '2023-01-17 08:51:02', NULL, NULL, 1),
(40009, 'comus2', 'com2@gmail.com', '123', 'Com2 User', '123', '', 6, 8, 40003, '2023-01-18 13:03:13', NULL, NULL, 1),
(40010, 'posuser', 'pos1@gmail.com', '123', 'POS User', '018437', 'test', 1, 1, 10000, '2023-01-25 14:46:20', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_info`
--

CREATE TABLE `warehouse_info` (
  `id` int(11) NOT NULL,
  `warehouse_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `group_for` int(100) NOT NULL,
  `warehouse_type` varchar(255) NOT NULL,
  `short_code` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','','') NOT NULL DEFAULT 'Active',
  `entry_by` int(11) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `warehouse_info`
--

INSERT INTO `warehouse_info` (`id`, `warehouse_name`, `address`, `group_for`, `warehouse_type`, `short_code`, `status`, `entry_by`, `entry_at`, `updated_by`, `updated_at`) VALUES
(1, 'RBD.Reliance-à¦°à¦¿à¦²à¦¾à¦¯à¦¼à§‡à¦¨à§à¦¸', ' 62/1, Satish Sarker Road, Gandaria, Dhaka', 1, 'Inventory', 'MW', 'Active', 3, '2023-01-02 13:45:41', 10000, '2023-01-03 00:45:41'),
(6, 'RBD.Reliance-à¦°à¦¿à¦²à¦¾à¦¯à¦¼à§‡à¦¨à§à¦¸ v2', 'Barishal', 1, '1', 'sh', 'Inactive', 10000, '2022-11-29 10:10:40', 0, '0000-00-00 00:00:00'),
(7, 'Reliance Store', 'Wari, Dhaka', 1, 'Store', 'rs', 'Active', 10000, '2023-01-18 09:02:08', 40003, '2023-01-18 20:02:08'),
(8, 'Com 2', '', 6, 'Com2', 'com2', 'Active', 40003, '2023-01-18 13:01:39', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `web_users`
--

CREATE TABLE `web_users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `status` enum('pending','approved','hold','Block') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `image` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `customer_group` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `web_users`
--

INSERT INTO `web_users` (`user_id`, `name`, `username`, `email`, `password`, `mobile`, `address`, `ip_address`, `status`, `created_at`, `updated_at`, `image`, `token`, `coupon_code`, `customer_group`) VALUES
(3, 'Kamrul Hasan', 'kamrulhasan', 'kamrulhasan@gmail.com', '123', '01843715062', 'Mirpur 13\r\nA6', '27.147.166.241', 'approved', '2023-01-07 14:33:03', '2022-08-19 20:12:17', 'IMG_5311.JPG', '2', 'RBD012', NULL),
(9, 'Kamrul Hasan', 'kamrulerp', 'kamrulerp@gmail.com', '123', '01843715061', 'Mirpur 13\r\nA6', '27.147.166.241', 'approved', '2023-01-07 14:33:09', '2022-09-09 03:25:25', 'default.png', 'efad7ac75066d0e2d534e07e57b95a', NULL, NULL),
(10, 'Bimol Das', 'bimol', 'bimol@gmail.com', '456', '01638619180', 'Dhaka, Bangladesh', '27.147.166.241', 'pending', '2023-01-07 14:33:16', '2022-11-14 03:06:18', 'default.png', '8822dae4200146989c91c3052a9f7c', NULL, NULL),
(11, 'Bikash', 'bcd', 'bcd@gmail.com', '456', '01638619181', 'dhaka', '27.147.166.241', 'pending', '2023-01-07 14:33:22', '2022-11-14 03:13:14', 'default.png', 'e5732042c938fc163984166bbfb014', NULL, NULL),
(13, 'kamrul', 'kamrul144hasanrobin', 'kamrul144hasanrobin@gmail.com', '123', '01926008058', 'Mirpur 13\r\nA6', '27.147.166.241', 'approved', '2023-01-10 15:13:24', '2022-11-15 00:57:16', 'default.png', 'd37cc54d18e2b8294789e9622d8b20', 'RBD012', ''),
(14, 'Test', 'abc', 'abc@xyz.com', '12345', '012345678912', '123 Dhaka', '103.160.8.48', 'pending', '2023-01-07 14:33:35', '2022-11-29 20:46:26', 'default.png', '4f98e7ce18a8748f59bb4cd4e1c4b6', NULL, NULL),
(15, 'Firoz Ahmed', 'firozahmedpro', 'firozahmedpro@gmail.com', '112233', '01759771111', 'Gandaria, Dhaka', '103.160.8.48', 'approved', '2023-01-12 07:35:53', '2022-11-29 20:47:45', 'default.png', '04461c4946c8a658c6f6ef027d035a', NULL, NULL),
(16, 'RBD.Reliance', 'rbd.reliance', 'rbd.reliance@gmail.com', 'Admin@22', '01797976749', 'Gandaria, Dhaka', '103.160.8.54', 'pending', '2023-01-09 16:23:13', '2022-12-14 17:55:45', 'default.png', '3480bd328b4cbe37e923c07367b45b', NULL, NULL),
(17, 'kamil', 'whoiswho420', 'whoiswho420@gmail.com', 'gendaria', '12345678910', 'gendaria', '146.196.50.79', 'pending', '2023-01-07 14:34:08', '2022-12-17 06:38:31', 'default.png', 'b0d88cc356ef5d8e4c2c3ead3cd82b', NULL, NULL),
(18, 'Test Acc', 'firoz.rbdreliance', 'firoz.rbdreliance@gmail.com', '12345', '01234567890', 'Dhaka', '103.160.8.54', 'pending', '2023-01-17 10:25:13', '2022-12-20 19:38:25', 'default.png', '4f23e08fca7d0536fd25df5cef0388', NULL, NULL),
(19, 'ABC DE', 'abcd', 'abcd@gmail.com', '12345', '55555656565', 'Dhaka', '103.160.8.54', 'pending', '2023-01-17 21:24:06', '2023-01-17 21:24:06', 'default.png', '53fee1f0dce12035b118a63615787d', NULL, NULL),
(20, 'Himja', 'Parmar ', 'himjaa@gmail.com', 'vanhim*1', '917990665983', 'Sagar bunglow O N G C road East area behind market yard kalol North Gujarat dist Gandhinagar Gujarat India pin 382721', '103.251.57.210', 'pending', '2023-02-26 19:10:56', '2023-02-26 19:10:56', 'default.png', '16659dfc1662ba019a59d9792ac85b', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_visitors`
--

CREATE TABLE `web_visitors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `count` bigint(20) NOT NULL,
  `item_id` int(11) NOT NULL,
  `visited_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `entry_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `web_visitors`
--

INSERT INTO `web_visitors` (`id`, `ip_address`, `count`, `item_id`, `visited_date`, `user_id`, `entry_at`) VALUES
(1, '114.119.166.212', 1, 3, '2022-12-24', 0, '2022-12-25 01:49:52'),
(2, '114.119.148.56', 3, 0, '2023-01-31', 0, '2023-01-31 22:14:09'),
(3, '27.147.166.241', 80, 0, '2023-03-06', 10000, '2023-03-07 04:14:16'),
(4, '27.147.166.241', 5, 1, '2023-01-11', 10000, '2023-01-11 05:31:03'),
(5, '103.202.52.23', 79, 0, '2023-01-15', 0, '2023-01-16 01:01:26'),
(6, '66.29.159.254', 2, 0, '2022-12-24', 0, '2022-12-25 02:46:04'),
(7, '27.147.166.241', 1, 3, '2022-12-24', 10000, '2022-12-25 02:58:55'),
(8, '27.147.166.241', 2, 2, '2022-12-24', 10000, '2022-12-25 02:59:08'),
(9, '157.55.39.80', 9, 0, '2023-01-06', 0, '2023-01-07 01:03:27'),
(10, '157.55.39.233', 53, 0, '2023-01-07', 0, '2023-01-08 01:48:21'),
(11, '207.46.13.28', 12, 0, '2023-01-07', 0, '2023-01-07 23:18:31'),
(12, '207.46.13.53', 15, 0, '2023-01-08', 0, '2023-01-08 12:14:21'),
(13, '207.46.13.108', 2, 0, '2022-12-26', 0, '2022-12-26 13:33:31'),
(14, '18.236.129.32', 1, 0, '2022-12-25', 0, '2022-12-25 05:11:26'),
(15, '114.119.147.2', 1, 0, '2022-12-25', 0, '2022-12-25 08:17:55'),
(16, '114.119.132.153', 1, 0, '2022-12-25', 0, '2022-12-25 09:38:28'),
(17, '165.232.169.138', 2, 0, '2023-01-01', 0, '2023-01-02 02:13:25'),
(18, '159.223.192.179', 2, 0, '2023-01-04', 0, '2023-01-05 04:34:21'),
(19, '146.190.248.202', 3, 0, '2023-01-02', 0, '2023-01-02 12:18:03'),
(20, '137.184.123.164', 3, 0, '2022-12-26', 0, '2022-12-26 22:05:08'),
(21, '146.190.248.193', 2, 0, '2022-12-25', 0, '2022-12-26 00:14:42'),
(22, '146.190.124.39', 2, 0, '2022-12-31', 0, '2022-12-31 07:14:56'),
(23, '46.101.9.215', 2, 0, '2023-01-07', 0, '2023-01-08 04:50:16'),
(24, '161.35.184.18', 3, 0, '2023-01-03', 0, '2023-01-03 23:23:11'),
(25, '188.166.15.209', 1, 3, '2022-12-25', 0, '2022-12-25 11:10:51'),
(26, '164.92.189.249', 3, 0, '2023-01-03', 0, '2023-01-03 17:04:55'),
(27, '206.189.113.79', 2, 0, '2022-12-25', 0, '2022-12-25 18:37:02'),
(28, '138.201.60.47', 1, 0, '2022-12-25', 0, '2022-12-25 11:56:48'),
(29, '114.119.130.183', 1, 0, '2022-12-25', 0, '2022-12-25 12:44:09'),
(30, '167.99.182.206', 2, 0, '2022-12-26', 0, '2022-12-26 08:46:09'),
(31, '192.241.139.66', 1, 0, '2022-12-25', 0, '2022-12-25 13:24:20'),
(32, '164.92.181.168', 5, 0, '2023-01-04', 0, '2023-01-04 22:10:37'),
(33, '157.230.214.11', 1, 0, '2022-12-25', 0, '2022-12-25 13:56:25'),
(34, '204.48.19.153', 3, 0, '2023-01-07', 0, '2023-01-07 22:01:43'),
(35, '167.99.188.216', 1, 0, '2022-12-25', 0, '2022-12-25 14:04:58'),
(36, '164.92.117.240', 2, 0, '2023-01-05', 0, '2023-01-05 13:04:20'),
(37, '204.48.19.180', 4, 0, '2023-01-06', 0, '2023-01-07 04:02:17'),
(38, '206.189.113.79', 1, 4, '2022-12-25', 0, '2022-12-25 16:54:48'),
(39, '146.190.48.204', 3, 0, '2023-01-07', 0, '2023-01-07 05:55:09'),
(40, '161.35.184.107', 1, 0, '2022-12-25', 0, '2022-12-25 17:40:10'),
(41, '139.59.212.82', 1, 0, '2022-12-25', 0, '2022-12-25 19:05:19'),
(42, '134.122.32.62', 2, 0, '2022-12-30', 0, '2022-12-30 12:58:32'),
(43, '142.93.178.99', 1, 0, '2022-12-25', 0, '2022-12-25 19:53:50'),
(44, '165.22.77.34', 1, 5, '2022-12-25', 0, '2022-12-25 20:20:16'),
(45, '114.119.134.156', 1, 20, '2022-12-25', 0, '2022-12-25 20:43:06'),
(46, '161.35.184.18', 1, 1, '2022-12-25', 0, '2022-12-25 23:53:29'),
(47, '134.122.32.225', 1, 0, '2022-12-25', 0, '2022-12-26 00:21:54'),
(48, '167.71.77.102', 1, 0, '2022-12-25', 0, '2022-12-26 01:06:32'),
(49, '68.183.132.1', 4, 0, '2023-01-05', 0, '2023-01-05 19:14:28'),
(50, '165.232.104.202', 2, 0, '2023-01-07', 0, '2023-01-07 12:47:01'),
(51, '207.46.13.28', 1, 1, '2022-12-25', 0, '2022-12-26 02:28:47'),
(52, '159.223.60.8', 1, 0, '2022-12-25', 0, '2022-12-26 02:44:08'),
(53, '165.22.62.204', 1, 0, '2022-12-25', 0, '2022-12-26 02:59:59'),
(54, '54.236.1.13', 14, 0, '2023-03-11', 0, '2023-03-12 03:23:43'),
(55, '114.119.139.246', 1, 18, '2022-12-25', 0, '2022-12-26 03:46:39'),
(56, '114.119.133.190', 1, 16, '2022-12-25', 0, '2022-12-26 04:13:08'),
(57, '142.93.178.253', 1, 2, '2022-12-25', 0, '2022-12-26 04:30:57'),
(58, '34.208.160.147', 1, 0, '2022-12-26', 0, '2022-12-26 05:01:53'),
(59, '13.66.30.228', 1, 0, '2022-12-26', 0, '2022-12-26 05:10:51'),
(60, '178.63.66.151', 1, 0, '2022-12-26', 0, '2022-12-26 09:38:18'),
(61, '204.48.19.78', 1, 0, '2022-12-26', 0, '2022-12-26 11:28:39'),
(62, '165.22.83.63', 1, 5, '2022-12-26', 0, '2022-12-26 13:12:11'),
(63, '167.99.178.69', 1, 1, '2022-12-26', 0, '2022-12-26 13:54:35'),
(64, '114.119.146.111', 1, 0, '2022-12-26', 0, '2022-12-26 14:24:06'),
(65, '137.184.41.233', 5, 0, '2023-01-01', 0, '2023-01-01 19:10:36'),
(66, '114.119.153.49', 1, 0, '2022-12-26', 0, '2022-12-26 17:47:10'),
(67, '114.119.132.45', 1, 29, '2022-12-26', 0, '2022-12-27 00:28:50'),
(68, '114.119.128.34', 1, 0, '2022-12-26', 0, '2022-12-27 01:02:07'),
(69, '114.119.144.41', 1, 0, '2022-12-26', 0, '2022-12-27 01:03:28'),
(70, '146.190.248.215', 1, 0, '2022-12-26', 0, '2022-12-27 03:52:02'),
(71, '223.247.178.167', 1, 0, '2022-12-26', 0, '2022-12-27 04:47:18'),
(72, '193.47.61.99', 1, 0, '2022-12-27', 0, '2022-12-27 06:58:18'),
(73, '206.81.14.203', 2, 0, '2023-01-05', 0, '2023-01-05 23:40:15'),
(74, '66.249.65.152', 7, 0, '2022-12-31', 0, '2022-12-31 05:40:48'),
(75, '207.46.13.53', 1, 1, '2022-12-27', 0, '2022-12-27 10:48:51'),
(76, '114.119.135.84', 1, 15, '2022-12-27', 0, '2022-12-27 17:12:45'),
(77, '114.119.128.85', 1, 10, '2022-12-27', 0, '2022-12-27 17:14:41'),
(78, '103.160.8.54', 316, 0, '2023-02-06', 0, '2023-02-06 17:56:16'),
(79, '114.119.148.88', 1, 3, '2022-12-27', 0, '2022-12-27 18:34:33'),
(80, '114.119.155.64', 1, 1, '2022-12-27', 0, '2022-12-27 18:46:45'),
(81, '157.230.176.175', 1, 0, '2022-12-27', 0, '2022-12-27 19:17:20'),
(82, '157.55.39.204', 4, 3, '2022-12-31', 0, '2022-12-31 07:32:52'),
(83, '157.55.39.204', 4, 4, '2022-12-31', 0, '2022-12-31 15:59:50'),
(84, '207.46.13.53', 4, 5, '2022-12-31', 0, '2022-12-31 14:21:07'),
(85, '157.55.39.80', 64, 1, '2023-01-07', 0, '2023-01-07 07:55:57'),
(86, '157.55.39.80', 82, 2, '2023-01-07', 0, '2023-01-07 08:21:19'),
(87, '5.161.144.137', 1, 0, '2022-12-27', 0, '2022-12-27 23:00:10'),
(88, '66.249.65.139', 22, 0, '2023-02-15', 0, '2023-02-15 21:04:29'),
(89, '66.249.65.156', 3, 0, '2022-12-31', 0, '2022-12-31 05:41:00'),
(90, '157.55.39.204', 2, 0, '2022-12-29', 0, '2022-12-29 05:40:25'),
(91, '114.119.154.203', 1, 5, '2022-12-27', 0, '2022-12-28 00:54:40'),
(92, '87.250.224.58', 1, 0, '2022-12-27', 0, '2022-12-28 04:39:53'),
(93, '5.161.157.76', 1, 0, '2022-12-27', 0, '2022-12-28 04:41:59'),
(94, '62.171.177.111', 1, 0, '2022-12-28', 0, '2022-12-28 06:09:25'),
(95, '83.166.244.113', 4, 0, '2022-12-31', 0, '2022-12-31 23:00:58'),
(96, '140.246.164.95', 1, 0, '2022-12-28', 0, '2022-12-28 09:02:29'),
(97, '146.70.132.120', 1, 0, '2022-12-28', 0, '2022-12-28 09:26:12'),
(98, '199.244.88.232', 1, 0, '2022-12-28', 0, '2022-12-28 09:57:00'),
(99, '68.69.184.202', 5, 0, '2023-02-27', 0, '2023-02-28 03:28:46'),
(100, '157.55.39.233', 3, 4, '2022-12-31', 0, '2023-01-01 00:53:44'),
(101, '114.119.129.191', 1, 4, '2022-12-28', 0, '2022-12-28 13:34:13'),
(102, '114.119.147.248', 1, 0, '2022-12-28', 0, '2022-12-28 13:35:27'),
(103, '114.119.150.186', 2, 0, '2023-02-07', 0, '2023-02-07 07:16:05'),
(104, '114.119.138.37', 1, 30, '2022-12-28', 0, '2022-12-28 14:00:31'),
(105, '114.119.149.90', 1, 19, '2022-12-28', 0, '2022-12-28 14:18:56'),
(106, '114.119.140.172', 1, 1, '2022-12-28', 0, '2022-12-28 14:20:06'),
(107, '114.119.148.242', 1, 31, '2022-12-28', 0, '2022-12-28 14:40:11'),
(108, '152.89.196.13', 20, 0, '2023-03-10', 0, '2023-03-11 04:12:51'),
(109, '66.249.65.132', 2, 0, '2022-12-28', 0, '2022-12-29 03:40:38'),
(110, '5.75.247.87', 3, 0, '2022-12-28', 0, '2022-12-28 16:28:48'),
(111, '51.254.199.11', 10, 0, '2023-03-09', 0, '2023-03-10 03:29:23'),
(112, '17.241.227.25', 1, 0, '2022-12-28', 0, '2022-12-28 21:54:31'),
(113, '167.94.138.118', 2, 0, '2022-12-28', 0, '2022-12-29 01:39:20'),
(114, '114.119.139.217', 1, 2, '2022-12-28', 0, '2022-12-29 03:03:31'),
(115, '80.76.51.29', 2, 0, '2023-02-19', 0, '2023-02-19 13:33:49'),
(116, '187.103.250.210', 1, 0, '2022-12-28', 0, '2022-12-29 03:58:43'),
(117, '204.48.19.78', 1, 3, '2022-12-29', 0, '2022-12-29 07:39:02'),
(118, '114.119.135.199', 1, 0, '2022-12-29', 0, '2022-12-29 08:30:53'),
(119, '114.119.162.33', 2, 0, '2023-01-21', 0, '2023-01-21 07:42:34'),
(120, '114.119.135.212', 1, 23, '2022-12-29', 0, '2022-12-29 09:23:30'),
(121, '114.119.137.139', 1, 0, '2022-12-29', 0, '2022-12-29 09:24:59'),
(122, '69.171.251.118', 1, 0, '2022-12-29', 0, '2022-12-29 11:29:24'),
(123, '17.241.75.244', 1, 0, '2022-12-29', 0, '2022-12-29 13:08:19'),
(124, '66.249.65.144', 15, 0, '2023-02-20', 0, '2023-02-20 17:02:04'),
(125, '146.190.49.125', 1, 2, '2022-12-29', 0, '2022-12-29 15:56:10'),
(126, '137.226.113.44', 9, 0, '2023-03-09', 0, '2023-03-10 03:58:36'),
(127, '114.119.152.71', 1, 2, '2022-12-29', 0, '2022-12-29 16:55:52'),
(128, '114.119.138.127', 1, 0, '2022-12-29', 0, '2022-12-29 17:30:26'),
(129, '66.249.66.25', 1, 0, '2022-12-29', 0, '2022-12-29 17:30:29'),
(130, '66.249.66.23', 1, 0, '2022-12-29', 0, '2022-12-29 17:35:36'),
(131, '114.119.148.191', 1, 0, '2022-12-29', 0, '2022-12-30 00:31:09'),
(132, '114.119.157.190', 1, 14, '2022-12-29', 0, '2022-12-30 02:04:25'),
(133, '54.236.1.11', 10, 0, '2023-03-08', 0, '2023-03-09 01:36:03'),
(134, '192.241.159.223', 1, 0, '2022-12-30', 0, '2022-12-30 07:06:47'),
(135, '114.119.130.13', 1, 25, '2022-12-30', 0, '2022-12-30 07:19:22'),
(136, '17.241.227.111', 1, 0, '2022-12-30', 0, '2022-12-30 08:07:55'),
(137, '51.222.253.20', 6, 0, '2023-02-21', 0, '2023-02-22 03:11:43'),
(138, '51.222.253.12', 7, 0, '2023-03-11', 0, '2023-03-11 06:15:16'),
(139, '198.235.24.178', 1, 0, '2022-12-30', 0, '2022-12-30 10:51:25'),
(140, '114.119.136.143', 1, 0, '2022-12-30', 0, '2022-12-30 12:32:39'),
(141, '144.126.200.74', 1, 0, '2022-12-30', 0, '2022-12-30 12:53:24'),
(142, '167.99.178.69', 2, 0, '2023-01-01', 0, '2023-01-01 22:04:08'),
(143, '23.80.150.43', 1, 0, '2022-12-30', 0, '2022-12-30 14:21:14'),
(144, '142.93.180.66', 1, 0, '2022-12-30', 0, '2022-12-30 15:32:50'),
(145, '165.232.172.146', 1, 0, '2022-12-30', 0, '2022-12-30 17:22:28'),
(146, '114.119.141.152', 1, 13, '2022-12-30', 0, '2022-12-30 20:14:39'),
(147, '114.119.149.92', 2, 0, '2023-02-04', 0, '2023-02-04 20:24:24'),
(148, '114.119.136.143', 1, 22, '2022-12-30', 0, '2022-12-30 21:36:08'),
(149, '114.119.154.87', 1, 0, '2022-12-30', 0, '2022-12-30 21:59:10'),
(150, '114.119.147.203', 2, 0, '2023-01-09', 0, '2023-01-09 05:25:29'),
(151, '114.119.156.56', 2, 0, '2023-02-12', 0, '2023-02-12 18:46:46'),
(152, '87.236.176.72', 1, 0, '2022-12-30', 0, '2022-12-31 00:11:57'),
(153, '188.166.15.115', 1, 4, '2022-12-30', 0, '2022-12-31 01:19:49'),
(154, '207.46.13.28', 1, 16, '2022-12-30', 0, '2022-12-31 03:27:39'),
(155, '198.235.24.151', 1, 0, '2022-12-30', 0, '2022-12-31 04:06:13'),
(156, '66.249.65.151', 14, 0, '2023-02-17', 0, '2023-02-17 09:31:55'),
(157, '54.177.245.241', 1, 0, '2022-12-31', 0, '2022-12-31 05:33:13'),
(158, '114.119.137.160', 1, 0, '2022-12-31', 0, '2022-12-31 05:48:07'),
(159, '114.119.133.190', 1, 26, '2022-12-31', 0, '2022-12-31 05:54:14'),
(160, '114.119.137.43', 1, 24, '2022-12-31', 0, '2022-12-31 06:55:19'),
(161, '114.119.136.137', 2, 0, '2023-02-19', 0, '2023-02-19 19:02:13'),
(162, '205.210.31.27', 1, 0, '2022-12-31', 0, '2022-12-31 07:36:40'),
(163, '205.210.31.49', 2, 0, '2023-01-07', 0, '2023-01-08 00:57:05'),
(164, '142.93.63.78', 1, 0, '2022-12-31', 0, '2022-12-31 10:28:48'),
(165, '66.249.65.254', 1, 0, '2022-12-31', 0, '2022-12-31 11:06:03'),
(166, '87.236.176.120', 1, 0, '2022-12-31', 0, '2022-12-31 11:38:13'),
(167, '205.169.39.63', 5, 0, '2023-01-15', 0, '2023-01-15 06:26:42'),
(168, '65.154.226.170', 1, 0, '2022-12-31', 0, '2022-12-31 15:02:09'),
(169, '114.108.148.220', 1, 0, '2022-12-31', 0, '2022-12-31 15:56:02'),
(170, '114.119.158.0', 1, 16, '2022-12-31', 0, '2022-12-31 16:03:13'),
(171, '114.119.133.245', 1, 0, '2022-12-31', 0, '2022-12-31 17:27:46'),
(172, '114.119.147.229', 1, 0, '2022-12-31', 0, '2022-12-31 17:29:05'),
(173, '198.235.24.128', 1, 0, '2022-12-31', 0, '2022-12-31 18:06:42'),
(174, '103.242.21.233', 5, 0, '2022-12-31', 0, '2022-12-31 18:36:21'),
(175, '161.35.184.107', 1, 1, '2022-12-31', 0, '2022-12-31 19:47:36'),
(176, '143.198.51.227', 1, 3, '2022-12-31', 0, '2022-12-31 21:38:41'),
(177, '114.119.138.199', 1, 17, '2022-12-31', 0, '2023-01-01 00:49:07'),
(178, '3.249.81.20', 1, 0, '2022-12-31', 0, '2023-01-01 01:41:13'),
(179, '114.119.135.217', 1, 27, '2022-12-31', 0, '2023-01-01 02:23:33'),
(180, '114.119.128.46', 1, 20, '2022-12-31', 0, '2023-01-01 03:12:12'),
(181, '205.210.31.138', 1, 0, '2022-12-31', 0, '2023-01-01 03:17:17'),
(182, '34.245.10.177', 1, 0, '2023-01-01', 0, '2023-01-01 06:08:30'),
(183, '74.84.150.150', 7, 0, '2023-02-24', 0, '2023-02-24 22:38:48'),
(184, '5.39.104.183', 1, 0, '2023-01-01', 0, '2023-01-01 07:16:20'),
(185, '164.92.101.174', 1, 0, '2023-01-01', 0, '2023-01-01 09:11:57'),
(186, '17.241.219.36', 1, 0, '2023-01-01', 0, '2023-01-01 10:17:14'),
(187, '114.119.145.154', 1, 0, '2023-01-01', 0, '2023-01-01 10:59:37'),
(188, '114.119.137.67', 1, 0, '2023-01-01', 0, '2023-01-01 11:01:06'),
(189, '114.119.145.154', 1, 21, '2023-01-01', 0, '2023-01-01 12:16:29'),
(190, '104.248.121.110', 1, 2, '2023-01-01', 0, '2023-01-01 15:26:42'),
(191, '205.210.31.35', 2, 0, '2023-01-28', 0, '2023-01-28 18:58:52'),
(192, '65.21.206.44', 1, 0, '2023-01-01', 0, '2023-01-01 18:28:16'),
(193, '114.119.133.56', 1, 18, '2023-01-01', 0, '2023-01-01 20:11:40'),
(194, '114.119.129.200', 1, 15, '2023-01-01', 0, '2023-01-01 20:13:20'),
(195, '207.46.13.53', 2, 6, '2023-01-04', 0, '2023-01-05 00:08:46'),
(196, '114.119.134.195', 1, 30, '2023-01-01', 0, '2023-01-01 23:59:29'),
(197, '114.119.166.88', 1, 14, '2023-01-01', 0, '2023-01-02 00:00:49'),
(198, '114.119.138.37', 1, 0, '2023-01-01', 0, '2023-01-02 00:04:53'),
(199, '5.161.148.165', 1, 0, '2023-01-01', 0, '2023-01-02 00:52:47'),
(200, '43.250.82.229', 1, 0, '2023-01-01', 0, '2023-01-02 01:00:37'),
(201, '27.147.166.241', 2, 6, '2023-01-01', 0, '2023-01-02 01:36:50'),
(202, '143.198.110.12', 2, 0, '2023-01-03', 0, '2023-01-03 14:03:37'),
(203, '114.119.129.148', 1, 1, '2023-01-01', 0, '2023-01-02 03:52:25'),
(204, '114.119.128.62', 1, 30, '2023-01-02', 0, '2023-01-02 05:00:51'),
(205, '114.119.150.56', 1, 15, '2023-01-02', 0, '2023-01-02 05:02:20'),
(206, '114.119.147.58', 1, 14, '2023-01-02', 0, '2023-01-02 05:04:08'),
(207, '114.119.166.63', 1, 29, '2023-01-02', 0, '2023-01-02 05:09:16'),
(208, '114.119.141.93', 1, 0, '2023-01-02', 0, '2023-01-02 07:09:14'),
(209, '205.210.31.53', 4, 0, '2023-02-11', 0, '2023-02-11 16:58:59'),
(210, '198.235.24.2', 1, 0, '2023-01-02', 0, '2023-01-02 11:51:29'),
(211, '161.35.184.248', 2, 0, '2023-01-06', 0, '2023-01-06 15:14:19'),
(212, '114.119.147.204', 1, 19, '2023-01-02', 0, '2023-01-03 00:24:49'),
(213, '114.119.160.84', 1, 0, '2023-01-02', 0, '2023-01-03 00:26:19'),
(214, '103.160.8.54', 8, 6, '2023-02-01', 10000, '2023-02-01 16:37:47'),
(215, '114.119.153.152', 1, 28, '2023-01-02', 0, '2023-01-03 01:05:56'),
(216, '114.119.150.155', 1, 26, '2023-01-02', 0, '2023-01-03 01:51:31'),
(217, '17.241.219.80', 1, 0, '2023-01-02', 0, '2023-01-03 02:20:13'),
(218, '17.241.219.159', 1, 0, '2023-01-02', 0, '2023-01-03 03:29:31'),
(219, '164.92.189.190', 2, 0, '2023-01-04', 0, '2023-01-04 19:14:26'),
(220, '68.183.11.93', 1, 0, '2023-01-02', 0, '2023-01-03 03:43:55'),
(221, '13.67.161.195', 1, 0, '2023-01-02', 0, '2023-01-03 04:19:12'),
(222, '114.119.145.154', 1, 3, '2023-01-03', 0, '2023-01-03 07:33:05'),
(223, '114.119.155.96', 1, 10, '2023-01-03', 0, '2023-01-03 09:51:25'),
(224, '114.119.158.253', 1, 0, '2023-01-03', 0, '2023-01-03 09:52:22'),
(225, '93.158.90.142', 1, 0, '2023-01-03', 0, '2023-01-03 10:31:51'),
(226, '17.241.219.241', 1, 0, '2023-01-03', 0, '2023-01-03 11:16:21'),
(227, '142.44.193.80', 1, 0, '2023-01-03', 0, '2023-01-03 13:38:10'),
(228, '137.184.182.16', 1, 0, '2023-01-03', 0, '2023-01-03 14:02:43'),
(229, '114.119.159.15', 2, 0, '2023-02-24', 0, '2023-02-24 22:36:41'),
(230, '114.119.137.195', 2, 0, '2023-03-14', 0, '2023-03-14 07:43:27'),
(231, '142.93.4.33', 1, 0, '2023-01-03', 0, '2023-01-03 18:00:30'),
(232, '114.119.130.218', 1, 0, '2023-01-03', 0, '2023-01-03 19:31:49'),
(233, '114.119.156.132', 1, 6, '2023-01-03', 0, '2023-01-03 19:33:53'),
(234, '114.119.157.221', 1, 18, '2023-01-03', 0, '2023-01-03 20:49:38'),
(235, '114.119.148.198', 1, 15, '2023-01-03', 0, '2023-01-03 20:50:39'),
(236, '204.48.19.165', 1, 5, '2023-01-03', 0, '2023-01-03 21:41:33'),
(237, '157.230.50.240', 2, 0, '2023-01-07', 0, '2023-01-07 14:26:08'),
(238, '114.119.146.241', 1, 30, '2023-01-03', 0, '2023-01-04 01:40:09'),
(239, '114.119.146.195', 1, 14, '2023-01-03', 0, '2023-01-04 01:41:32'),
(240, '205.210.31.21', 2, 0, '2023-02-08', 0, '2023-02-08 20:07:47'),
(241, '114.119.142.131', 1, 3, '2023-01-03', 0, '2023-01-04 04:49:11'),
(242, '114.119.150.155', 1, 4, '2023-01-04', 0, '2023-01-04 05:04:46'),
(243, '34.217.118.231', 1, 0, '2023-01-04', 0, '2023-01-04 05:06:33'),
(244, '114.119.139.246', 2, 0, '2023-02-09', 0, '2023-02-10 01:48:58'),
(245, '114.119.149.203', 2, 0, '2023-01-28', 0, '2023-01-29 04:33:12'),
(246, '40.77.167.24', 1, 0, '2023-01-04', 0, '2023-01-04 08:53:24'),
(247, '89.117.20.171', 2, 0, '2023-01-16', 0, '2023-01-16 15:02:58'),
(248, '142.93.180.66', 1, 4, '2023-01-04', 0, '2023-01-04 11:08:28'),
(249, '165.22.77.34', 1, 2, '2023-01-04', 0, '2023-01-04 11:09:51'),
(250, '114.119.141.112', 1, 31, '2023-01-04', 0, '2023-01-04 11:41:00'),
(251, '205.210.31.131', 2, 0, '2023-02-21', 0, '2023-02-21 19:48:37'),
(252, '114.119.130.18', 1, 0, '2023-01-04', 0, '2023-01-04 13:36:48'),
(253, '104.248.121.110', 1, 0, '2023-01-04', 0, '2023-01-04 15:52:36'),
(254, '198.235.24.13', 3, 0, '2023-02-11', 0, '2023-02-12 03:19:18'),
(255, '198.235.24.10', 2, 0, '2023-01-14', 0, '2023-01-14 16:06:31'),
(256, '81.95.5.41', 1, 0, '2023-01-04', 0, '2023-01-04 19:17:33'),
(257, '89.45.90.199', 1, 0, '2023-01-04', 0, '2023-01-04 19:17:59'),
(258, '90.187.238.157', 1, 0, '2023-01-04', 0, '2023-01-04 19:18:05'),
(259, '79.104.209.115', 1, 0, '2023-01-04', 0, '2023-01-04 19:18:14'),
(260, '94.102.63.27', 1, 0, '2023-01-04', 0, '2023-01-04 19:18:28'),
(261, '188.42.195.140', 1, 0, '2023-01-04', 0, '2023-01-04 19:18:28'),
(262, '93.174.93.114', 1, 0, '2023-01-04', 0, '2023-01-04 19:18:29'),
(263, '94.102.49.123', 1, 0, '2023-01-04', 0, '2023-01-04 19:18:31'),
(264, '23.88.9.126', 2, 0, '2023-01-04', 0, '2023-01-04 19:18:59'),
(265, '148.72.152.67', 1, 0, '2023-01-04', 0, '2023-01-04 19:19:07'),
(266, '5.161.112.31', 1, 0, '2023-01-04', 0, '2023-01-04 19:19:24'),
(267, '208.115.225.126', 1, 0, '2023-01-04', 0, '2023-01-04 19:22:27'),
(268, '52.250.30.131', 1, 0, '2023-01-04', 0, '2023-01-04 19:23:36'),
(269, '49.98.136.43', 4, 0, '2023-01-04', 0, '2023-01-04 19:40:33'),
(270, '206.189.247.132', 5, 0, '2023-01-04', 0, '2023-01-04 19:38:43'),
(271, '87.115.231.247', 3, 0, '2023-01-04', 0, '2023-01-04 19:57:20'),
(272, '216.151.183.3', 2, 0, '2023-01-04', 0, '2023-01-04 19:35:28'),
(273, '185.101.34.74', 1, 0, '2023-01-04', 0, '2023-01-04 19:35:40'),
(274, '52.65.88.94', 1, 0, '2023-01-04', 0, '2023-01-04 19:35:41'),
(275, '160.251.46.21', 2, 0, '2023-01-04', 0, '2023-01-04 19:51:40'),
(276, '54.79.237.109', 1, 0, '2023-01-04', 0, '2023-01-04 19:52:04'),
(277, '160.251.49.142', 2, 0, '2023-01-04', 0, '2023-01-04 19:55:37'),
(278, '64.145.76.8', 1, 0, '2023-01-04', 0, '2023-01-04 19:57:20'),
(279, '68.183.245.101', 2, 0, '2023-01-04', 0, '2023-01-04 20:00:03'),
(280, '102.165.41.54', 1, 0, '2023-01-04', 0, '2023-01-04 19:57:20'),
(281, '92.16.219.56', 1, 0, '2023-01-04', 0, '2023-01-04 20:00:02'),
(282, '181.214.206.67', 4, 0, '2023-01-04', 0, '2023-01-04 20:03:32'),
(283, '45.133.172.13', 1, 0, '2023-01-04', 0, '2023-01-04 20:00:02'),
(284, '176.67.82.4', 1, 0, '2023-01-04', 0, '2023-01-04 20:00:02'),
(285, '49.98.128.222', 2, 0, '2023-01-04', 0, '2023-01-04 20:09:54'),
(286, '89.248.171.23', 1, 0, '2023-01-04', 0, '2023-01-04 20:13:27'),
(287, '1.66.97.88', 2, 0, '2023-01-04', 0, '2023-01-04 20:13:37'),
(288, '199.244.88.228', 1, 0, '2023-01-04', 0, '2023-01-04 20:20:17'),
(289, '61.115.12.244', 2, 0, '2023-01-04', 0, '2023-01-04 21:34:34'),
(290, '114.119.144.41', 1, 1, '2023-01-04', 0, '2023-01-04 22:21:41'),
(291, '165.22.71.235', 1, 0, '2023-01-04', 0, '2023-01-04 22:35:08'),
(292, '37.139.53.82', 1, 0, '2023-01-04', 0, '2023-01-04 22:39:37'),
(293, '212.143.94.234', 1, 0, '2023-01-04', 0, '2023-01-04 22:43:47'),
(294, '84.17.41.184', 1, 0, '2023-01-04', 0, '2023-01-04 22:57:22'),
(295, '64.44.118.168', 1, 0, '2023-01-04', 0, '2023-01-04 22:58:41'),
(296, '146.190.248.230', 1, 0, '2023-01-04', 0, '2023-01-04 23:04:55'),
(297, '185.216.74.18', 1, 0, '2023-01-04', 0, '2023-01-04 23:36:57'),
(298, '181.214.196.17', 2, 0, '2023-01-04', 0, '2023-01-04 23:37:01'),
(299, '156.146.54.73', 2, 0, '2023-01-06', 0, '2023-01-06 22:58:28'),
(300, '207.46.13.53', 1, 13, '2023-01-04', 0, '2023-01-04 23:42:04'),
(301, '114.119.143.177', 1, 2, '2023-01-04', 0, '2023-01-04 23:44:16'),
(302, '198.58.101.135', 4, 0, '2023-02-16', 0, '2023-02-16 22:26:16'),
(303, '42.83.147.34', 9, 0, '2023-02-22', 0, '2023-02-22 16:23:42'),
(304, '149.57.29.161', 1, 0, '2023-01-04', 0, '2023-01-05 01:29:19'),
(305, '114.119.147.239', 1, 0, '2023-01-04', 0, '2023-01-05 02:23:39'),
(306, '14.116.152.84', 2, 0, '2023-02-15', 0, '2023-02-16 04:52:20'),
(307, '66.220.149.5', 1, 0, '2023-01-05', 0, '2023-01-05 06:04:10'),
(308, '163.172.74.29', 1, 0, '2023-01-05', 0, '2023-01-05 07:24:36'),
(309, '92.119.18.250', 3, 0, '2023-01-05', 0, '2023-01-05 09:24:29'),
(310, '114.119.138.2', 1, 26, '2023-01-05', 0, '2023-01-05 09:13:47'),
(311, '94.140.11.60', 1, 0, '2023-01-05', 0, '2023-01-05 09:44:08'),
(312, '114.119.136.176', 2, 0, '2023-01-25', 0, '2023-01-26 04:15:37'),
(313, '45.4.41.249', 1, 0, '2023-01-05', 0, '2023-01-05 09:57:16'),
(314, '192.145.116.129', 2, 0, '2023-01-05', 0, '2023-01-05 10:23:23'),
(315, '157.230.50.157', 1, 0, '2023-01-05', 0, '2023-01-05 10:42:46'),
(316, '165.22.67.250', 1, 0, '2023-01-05', 0, '2023-01-05 11:42:07'),
(317, '137.184.236.12', 1, 0, '2023-01-05', 0, '2023-01-05 13:35:47'),
(318, '34.242.231.93', 1, 0, '2023-01-05', 0, '2023-01-05 15:01:12'),
(319, '207.46.13.53', 1, 26, '2023-01-05', 0, '2023-01-05 17:07:16'),
(320, '114.119.151.4', 1, 4, '2023-01-05', 0, '2023-01-05 18:04:15'),
(321, '146.190.248.232', 1, 0, '2023-01-05', 0, '2023-01-05 18:14:08'),
(322, '185.199.103.102', 1, 0, '2023-01-05', 0, '2023-01-05 20:20:56'),
(323, '159.223.192.179', 1, 4, '2023-01-05', 0, '2023-01-05 20:41:20'),
(324, '2.56.252.225', 3, 0, '2023-01-08', 0, '2023-01-08 11:42:31'),
(325, '79.21.248.161', 1, 0, '2023-01-05', 0, '2023-01-05 20:57:48'),
(326, '84.17.45.206', 1, 0, '2023-01-05', 0, '2023-01-05 22:17:32'),
(327, '165.22.241.235', 1, 0, '2023-01-05', 0, '2023-01-05 22:44:49'),
(328, '185.169.0.155', 1, 0, '2023-01-05', 0, '2023-01-05 22:52:55'),
(329, '104.149.237.243', 1, 0, '2023-01-05', 0, '2023-01-05 22:52:57'),
(330, '161.35.180.190', 1, 0, '2023-01-05', 0, '2023-01-05 23:36:21'),
(331, '194.124.76.113', 1, 0, '2023-01-05', 0, '2023-01-05 23:43:15'),
(332, '194.233.98.108', 2, 0, '2023-01-05', 0, '2023-01-05 23:43:17'),
(333, '51.15.247.214', 1, 0, '2023-01-05', 0, '2023-01-06 01:38:00'),
(334, '114.119.155.64', 1, 24, '2023-01-05', 0, '2023-01-06 02:10:17'),
(335, '114.119.129.148', 1, 2, '2023-01-05', 0, '2023-01-06 02:11:48'),
(336, '114.119.148.13', 1, 15, '2023-01-05', 0, '2023-01-06 02:26:19'),
(337, '66.249.66.85', 1, 0, '2023-01-05', 0, '2023-01-06 02:30:35'),
(338, '114.119.145.183', 1, 25, '2023-01-05', 0, '2023-01-06 03:04:47'),
(339, '114.119.137.64', 1, 0, '2023-01-05', 0, '2023-01-06 03:35:19'),
(340, '114.119.145.100', 1, 0, '2023-01-05', 0, '2023-01-06 03:55:09'),
(341, '66.249.66.146', 1, 0, '2023-01-05', 0, '2023-01-06 04:00:35'),
(342, '113.125.140.19', 2, 0, '2023-02-19', 0, '2023-02-20 04:55:19'),
(343, '114.119.156.235', 1, 30, '2023-01-06', 0, '2023-01-06 05:11:40'),
(344, '114.119.148.103', 1, 15, '2023-01-06', 0, '2023-01-06 05:12:38'),
(345, '114.119.150.85', 1, 14, '2023-01-06', 0, '2023-01-06 05:13:54'),
(346, '54.203.106.226', 1, 0, '2023-01-06', 0, '2023-01-06 05:39:56'),
(347, '35.91.125.115', 1, 0, '2023-01-06', 0, '2023-01-06 05:39:59'),
(348, '54.189.116.244', 1, 0, '2023-01-06', 0, '2023-01-06 05:40:12'),
(349, '34.222.6.193', 1, 0, '2023-01-06', 0, '2023-01-06 05:40:14'),
(350, '114.119.133.228', 1, 26, '2023-01-06', 0, '2023-01-06 05:58:04'),
(351, '66.249.66.199', 1, 0, '2023-01-06', 0, '2023-01-06 06:18:50'),
(352, '94.140.9.226', 1, 0, '2023-01-06', 0, '2023-01-06 09:32:28'),
(353, '192.145.117.65', 1, 0, '2023-01-06', 0, '2023-01-06 09:32:46'),
(354, '138.199.9.130', 1, 0, '2023-01-06', 0, '2023-01-06 10:31:31'),
(355, '192.158.239.197', 2, 0, '2023-01-06', 0, '2023-01-06 22:58:29'),
(356, '205.210.31.15', 1, 0, '2023-01-06', 0, '2023-01-06 11:30:08'),
(357, '114.119.134.75', 3, 0, '2023-03-01', 0, '2023-03-01 13:20:21'),
(358, '185.207.249.157', 1, 0, '2023-01-06', 0, '2023-01-06 12:57:51'),
(359, '114.119.129.179', 1, 0, '2023-01-06', 0, '2023-01-06 13:18:27'),
(360, '45.85.144.136', 2, 0, '2023-01-06', 0, '2023-01-06 13:31:47'),
(361, '51.15.251.143', 1, 0, '2023-01-06', 0, '2023-01-06 14:00:42'),
(362, '157.230.15.179', 1, 0, '2023-01-06', 0, '2023-01-06 14:24:36'),
(363, '35.188.50.120', 1, 0, '2023-01-06', 0, '2023-01-06 14:53:58'),
(364, '114.119.156.59', 1, 18, '2023-01-06', 0, '2023-01-06 15:52:41'),
(365, '198.235.24.147', 1, 0, '2023-01-06', 0, '2023-01-06 16:48:23'),
(366, '161.35.180.8', 1, 0, '2023-01-06', 0, '2023-01-06 17:19:39'),
(367, '205.210.31.54', 1, 0, '2023-01-06', 0, '2023-01-06 20:00:36'),
(368, '185.202.221.180', 1, 0, '2023-01-06', 0, '2023-01-06 20:58:06'),
(369, '114.119.156.77', 1, 0, '2023-01-06', 0, '2023-01-06 21:15:44'),
(370, '114.119.134.6', 1, 0, '2023-01-06', 0, '2023-01-06 21:28:46'),
(371, '114.119.158.196', 2, 0, '2023-02-10', 0, '2023-02-10 11:39:07'),
(372, '114.119.129.9', 3, 0, '2023-03-03', 0, '2023-03-03 21:46:13'),
(373, '17.241.219.240', 1, 0, '2023-01-06', 0, '2023-01-06 23:37:20'),
(374, '198.251.73.110', 1, 0, '2023-01-06', 0, '2023-01-07 00:01:39'),
(375, '198.251.73.118', 1, 0, '2023-01-06', 0, '2023-01-07 00:04:16'),
(376, '198.251.73.76', 3, 0, '2023-01-06', 0, '2023-01-07 00:04:31'),
(377, '198.251.73.106', 1, 0, '2023-01-06', 0, '2023-01-07 00:04:22'),
(378, '198.251.73.96', 2, 0, '2023-01-06', 0, '2023-01-07 00:04:31'),
(379, '198.251.73.86', 1, 0, '2023-01-06', 0, '2023-01-07 00:04:24'),
(380, '198.251.73.114', 1, 0, '2023-01-06', 0, '2023-01-07 00:04:25'),
(381, '205.210.31.12', 1, 0, '2023-01-06', 0, '2023-01-07 01:40:38'),
(382, '51.195.142.201', 2, 0, '2023-01-12', 0, '2023-01-12 11:06:36'),
(383, '114.119.135.84', 1, 0, '2023-01-06', 0, '2023-01-07 04:17:50'),
(384, '35.92.43.0', 1, 0, '2023-01-07', 0, '2023-01-07 05:35:28'),
(385, '114.119.131.200', 1, 30, '2023-01-07', 0, '2023-01-07 05:41:22'),
(386, '114.119.149.232', 1, 18, '2023-01-07', 0, '2023-01-07 05:42:35'),
(387, '114.119.153.11', 1, 14, '2023-01-07', 0, '2023-01-07 05:43:43'),
(388, '114.119.130.99', 1, 22, '2023-01-07', 0, '2023-01-07 05:49:22'),
(389, '31.177.95.48', 21, 0, '2023-01-07', 0, '2023-01-07 05:57:50'),
(390, '143.198.166.85', 11, 0, '2023-01-07', 0, '2023-01-07 05:56:59'),
(391, '42.112.17.19', 44, 0, '2023-01-07', 0, '2023-01-07 05:57:59'),
(392, '213.169.35.235', 11, 0, '2023-01-07', 0, '2023-01-07 05:57:40'),
(393, '35.232.249.141', 11, 0, '2023-01-07', 0, '2023-01-07 05:57:39'),
(394, '162.14.102.253', 11, 0, '2023-01-07', 0, '2023-01-07 05:57:47'),
(395, '184.168.99.77', 11, 0, '2023-01-07', 0, '2023-01-07 05:57:53'),
(396, '51.89.228.130', 11, 0, '2023-01-07', 0, '2023-01-07 05:58:06'),
(397, '114.119.145.86', 1, 0, '2023-01-07', 0, '2023-01-07 06:08:53'),
(398, '104.248.160.119', 1, 0, '2023-01-07', 0, '2023-01-07 06:09:31'),
(399, '18.144.133.101', 1, 0, '2023-01-07', 0, '2023-01-07 07:23:37'),
(400, '66.94.99.113', 1, 0, '2023-01-07', 0, '2023-01-07 08:24:19'),
(401, '167.71.77.2', 1, 0, '2023-01-07', 0, '2023-01-07 08:47:38'),
(402, '205.210.31.22', 1, 0, '2023-01-07', 0, '2023-01-07 13:34:53'),
(403, '185.202.220.252', 1, 0, '2023-01-07', 0, '2023-01-07 13:37:24'),
(404, '5.182.32.161', 1, 0, '2023-01-07', 0, '2023-01-07 13:37:27'),
(405, '167.71.77.2', 1, 6, '2023-01-07', 0, '2023-01-07 16:04:53'),
(406, '139.59.212.82', 1, 5, '2023-01-07', 0, '2023-01-07 16:47:41'),
(407, '162.214.71.92', 1, 0, '2023-01-07', 0, '2023-01-07 17:01:47'),
(408, '205.210.31.51', 1, 0, '2023-01-07', 0, '2023-01-07 17:21:49'),
(409, '51.222.253.9', 9, 0, '2023-03-10', 0, '2023-03-10 21:27:49'),
(410, '142.93.178.253', 1, 3, '2023-01-07', 0, '2023-01-07 17:30:56'),
(411, '51.222.253.2', 10, 0, '2023-03-09', 0, '2023-03-09 09:45:10'),
(412, '185.135.136.31', 1, 0, '2023-01-07', 0, '2023-01-07 18:27:19'),
(413, '51.222.253.6', 12, 0, '2023-03-14', 0, '2023-03-14 19:46:32'),
(414, '51.222.253.3', 6, 0, '2023-03-11', 0, '2023-03-11 10:52:49'),
(415, '212.102.46.47', 2, 0, '2023-01-08', 0, '2023-01-08 12:19:58'),
(416, '206.217.210.65', 1, 0, '2023-01-07', 0, '2023-01-07 19:04:31'),
(417, '103.248.94.167', 2, 0, '2023-01-07', 0, '2023-01-07 20:43:43'),
(418, '51.222.253.8', 4, 0, '2023-02-22', 0, '2023-02-22 09:33:41'),
(419, '198.235.24.181', 1, 0, '2023-01-07', 0, '2023-01-07 19:40:02'),
(420, '23.237.196.50', 1, 0, '2023-01-07', 0, '2023-01-07 19:50:28'),
(421, '51.222.253.16', 5, 0, '2023-02-22', 0, '2023-02-23 03:24:59'),
(422, '51.222.253.5', 10, 0, '2023-03-10', 0, '2023-03-10 23:52:03'),
(423, '165.22.77.34', 1, 0, '2023-01-07', 0, '2023-01-07 20:55:02'),
(424, '51.77.246.102', 10, 0, '2023-01-07', 0, '2023-01-07 21:01:38'),
(425, '216.145.5.42', 1, 0, '2023-01-07', 0, '2023-01-07 21:08:22'),
(426, '51.222.253.1', 2, 0, '2023-01-24', 0, '2023-01-24 08:01:38'),
(427, '103.160.8.54', 19, 7, '2023-01-12', 40003, '2023-01-12 22:26:36'),
(428, '51.222.253.17', 8, 0, '2023-03-09', 0, '2023-03-09 09:23:48'),
(429, '103.160.8.54', 3, 3, '2023-02-02', 40003, '2023-02-02 22:29:25'),
(430, '104.248.242.243', 1, 1, '2023-01-07', 0, '2023-01-07 21:59:38'),
(431, '51.222.253.14', 10, 0, '2023-03-09', 0, '2023-03-09 18:57:06'),
(432, '51.222.253.10', 7, 0, '2023-02-22', 0, '2023-02-22 17:51:17'),
(433, '103.160.8.54', 6, 1, '2023-02-02', 40003, '2023-02-02 22:28:54'),
(434, '103.160.8.54', 9, 5, '2023-02-04', 40003, '2023-02-04 15:43:02'),
(435, '51.222.253.13', 6, 0, '2023-03-09', 0, '2023-03-09 07:38:50'),
(436, '114.119.137.180', 1, 23, '2023-01-07', 0, '2023-01-08 01:34:37'),
(437, '114.119.140.115', 1, 1, '2023-01-07', 0, '2023-01-08 01:35:33'),
(438, '103.20.141.5', 1, 0, '2023-01-07', 0, '2023-01-08 02:00:00'),
(439, '27.147.166.241', 17, 5, '2023-01-07', 13, '2023-01-08 03:09:37'),
(440, '108.174.8.21', 3, 0, '2023-01-10', 0, '2023-01-11 03:27:29'),
(441, '27.147.166.241', 1, 7, '2023-01-07', 13, '2023-01-08 03:11:31'),
(442, '103.138.168.196', 2, 0, '2023-01-07', 0, '2023-01-08 03:30:15'),
(443, '164.92.74.230', 1, 0, '2023-01-07', 0, '2023-01-08 03:40:36'),
(444, '51.222.253.11', 4, 0, '2023-03-09', 0, '2023-03-09 06:34:34'),
(445, '14.29.216.170', 1, 0, '2023-01-07', 0, '2023-01-08 04:44:35'),
(446, '103.202.52.23', 7, 5, '2023-01-14', 0, '2023-01-14 06:50:43'),
(447, '103.202.52.23', 5, 1, '2023-01-11', 0, '2023-01-11 05:05:41'),
(448, '34.216.196.164', 1, 0, '2023-01-08', 0, '2023-01-08 05:24:12'),
(449, '35.90.136.101', 1, 0, '2023-01-08', 0, '2023-01-08 05:24:35'),
(450, '35.161.55.229', 1, 0, '2023-01-08', 0, '2023-01-08 05:24:49'),
(451, '54.202.47.183', 1, 0, '2023-01-08', 0, '2023-01-08 05:30:21'),
(452, '54.218.77.65', 1, 0, '2023-01-08', 0, '2023-01-08 05:30:55'),
(453, '51.222.253.2', 1, 1, '2023-01-08', 0, '2023-01-08 05:38:37'),
(454, '51.222.253.9', 2, 3, '2023-03-11', 0, '2023-03-11 18:31:51'),
(455, '51.222.253.14', 1, 5, '2023-01-08', 0, '2023-01-08 07:19:22'),
(456, '40.77.167.64', 1, 7, '2023-01-08', 0, '2023-01-08 07:42:38'),
(457, '51.222.253.13', 1, 4, '2023-01-08', 0, '2023-01-08 08:06:39'),
(458, '51.222.253.19', 2, 2, '2023-03-11', 0, '2023-03-12 00:42:45'),
(459, '114.119.147.239', 1, 21, '2023-01-08', 0, '2023-01-08 09:58:26'),
(460, '114.119.146.12', 1, 16, '2023-01-08', 0, '2023-01-08 10:00:09'),
(461, '51.222.253.16', 1, 6, '2023-01-08', 0, '2023-01-08 10:16:16'),
(462, '185.189.25.223', 1, 0, '2023-01-08', 0, '2023-01-08 12:20:01'),
(463, '122.172.83.92', 3, 0, '2023-01-08', 0, '2023-01-08 12:25:06'),
(464, '3.35.174.31', 2, 0, '2023-01-08', 0, '2023-01-08 13:22:22'),
(465, '3.142.133.96', 3, 0, '2023-01-08', 0, '2023-01-08 13:22:40'),
(466, '18.117.172.151', 12, 0, '2023-01-08', 0, '2023-01-08 13:27:05'),
(467, '114.119.143.130', 1, 29, '2023-01-08', 0, '2023-01-08 15:36:14'),
(468, '205.210.31.161', 1, 0, '2023-01-08', 0, '2023-01-08 15:50:29'),
(469, '157.55.39.233', 1, 1, '2023-01-08', 0, '2023-01-08 16:40:36'),
(470, '103.138.168.194', 4, 0, '2023-01-08', 0, '2023-01-08 17:17:41'),
(471, '51.222.253.16', 1, 5, '2023-01-08', 0, '2023-01-08 17:23:54'),
(472, '114.119.158.106', 1, 30, '2023-01-08', 0, '2023-01-08 17:57:51'),
(473, '114.119.153.154', 1, 18, '2023-01-08', 0, '2023-01-08 17:59:01'),
(474, '114.119.140.60', 1, 14, '2023-01-08', 0, '2023-01-08 18:00:33'),
(475, '114.119.148.146', 1, 0, '2023-01-08', 0, '2023-01-08 18:06:06'),
(476, '114.119.144.31', 2, 0, '2023-01-25', 0, '2023-01-26 01:50:04'),
(477, '185.203.218.254', 2, 0, '2023-01-08', 0, '2023-01-08 19:08:00'),
(478, '114.119.146.16', 1, 0, '2023-01-08', 0, '2023-01-08 20:47:35'),
(479, '51.222.253.20', 1, 7, '2023-01-08', 0, '2023-01-08 20:48:18'),
(480, '114.119.146.55', 1, 0, '2023-01-08', 0, '2023-01-08 20:49:01'),
(481, '114.119.157.57', 1, 0, '2023-01-08', 0, '2023-01-08 20:52:11'),
(482, '51.222.253.9', 2, 1, '2023-02-21', 0, '2023-02-21 14:21:14'),
(483, '114.119.134.217', 1, 19, '2023-01-08', 0, '2023-01-09 03:12:01'),
(484, '114.119.129.200', 1, 10, '2023-01-09', 0, '2023-01-09 05:24:17'),
(485, '52.34.108.26', 1, 0, '2023-01-09', 0, '2023-01-09 05:33:59'),
(486, '18.246.69.138', 1, 0, '2023-01-09', 0, '2023-01-09 05:34:05'),
(487, '54.184.240.190', 1, 0, '2023-01-09', 0, '2023-01-09 05:34:18'),
(488, '34.215.48.73', 1, 0, '2023-01-09', 0, '2023-01-09 05:36:19'),
(489, '54.201.250.70', 1, 0, '2023-01-09', 0, '2023-01-09 05:45:09'),
(490, '113.142.131.55', 1, 0, '2023-01-09', 0, '2023-01-09 08:23:19'),
(491, '205.210.31.13', 1, 0, '2023-01-09', 0, '2023-01-09 08:35:47'),
(492, '143.198.24.227', 1, 0, '2023-01-09', 0, '2023-01-09 10:27:36'),
(493, '138.197.127.64', 1, 0, '2023-01-09', 0, '2023-01-09 10:31:25'),
(494, '89.117.20.210', 1, 0, '2023-01-09', 0, '2023-01-09 10:43:40'),
(495, '185.191.171.12', 2, 0, '2023-02-09', 0, '2023-02-10 01:26:27'),
(496, '104.131.176.196', 1, 0, '2023-01-09', 0, '2023-01-09 12:14:46'),
(497, '45.141.121.181', 1, 0, '2023-01-09', 0, '2023-01-09 12:21:17'),
(498, '5.182.16.60', 1, 0, '2023-01-09', 0, '2023-01-09 12:21:18'),
(499, '114.119.138.214', 1, 3, '2023-01-09', 0, '2023-01-09 13:46:51'),
(500, '207.46.13.180', 3, 0, '2023-01-15', 0, '2023-01-15 08:16:12'),
(501, '114.119.137.139', 1, 3, '2023-01-09', 0, '2023-01-09 14:46:35'),
(502, '103.160.8.54', 16, 8, '2023-02-02', 40003, '2023-02-02 22:29:36'),
(503, '192.133.77.18', 2, 0, '2023-01-26', 0, '2023-01-26 23:58:23'),
(504, '192.99.1.145', 1, 0, '2023-01-09', 0, '2023-01-09 15:23:44'),
(505, '54.198.55.229', 2, 0, '2023-01-18', 0, '2023-01-19 00:48:53'),
(506, '17.241.219.28', 1, 0, '2023-01-09', 0, '2023-01-09 15:23:51'),
(507, '116.202.35.116', 1, 0, '2023-01-09', 0, '2023-01-09 15:24:09'),
(508, '104.196.244.180', 2, 0, '2023-01-09', 0, '2023-01-09 15:24:11'),
(509, '103.160.8.54', 5, 9, '2023-01-12', 40003, '2023-01-12 19:44:05'),
(510, '103.160.8.54', 13, 10, '2023-01-11', 40003, '2023-01-11 19:48:40'),
(511, '185.191.171.13', 2, 0, '2023-01-13', 0, '2023-01-13 14:29:59'),
(512, '89.58.55.141', 1, 0, '2023-01-09', 0, '2023-01-09 17:45:58'),
(513, '207.46.13.180', 40, 7, '2023-01-18', 0, '2023-01-19 03:39:41'),
(514, '185.191.171.20', 2, 0, '2023-01-23', 0, '2023-01-24 02:59:00'),
(515, '185.191.171.39', 5, 0, '2023-02-06', 0, '2023-02-07 03:37:40'),
(516, '103.160.8.54', 4, 4, '2023-02-02', 0, '2023-02-02 22:29:41'),
(517, '185.191.171.44', 8, 0, '2023-03-09', 0, '2023-03-10 02:22:42'),
(518, '205.169.39.241', 2, 0, '2023-01-09', 0, '2023-01-09 21:51:00'),
(519, '185.191.171.34', 8, 0, '2023-03-09', 0, '2023-03-09 14:03:23'),
(520, '185.191.171.23', 7, 0, '2023-03-09', 0, '2023-03-09 08:55:01'),
(521, '114.119.141.40', 1, 27, '2023-01-09', 0, '2023-01-10 00:40:08'),
(522, '185.191.171.37', 5, 0, '2023-03-09', 0, '2023-03-09 11:56:29'),
(523, '103.202.52.23', 2, 9, '2023-01-10', 40003, '2023-01-11 03:28:20'),
(524, '103.202.52.23', 12, 10, '2023-01-12', 40003, '2023-01-13 04:52:01'),
(525, '103.202.52.23', 3, 7, '2023-01-13', 40003, '2023-01-13 15:49:04'),
(526, '61.3.152.43', 6, 0, '2023-01-09', 0, '2023-01-10 03:01:07'),
(527, '61.3.152.43', 1, 7, '2023-01-09', 0, '2023-01-10 03:00:18'),
(528, '103.202.52.23', 1, 11, '2023-01-09', 40003, '2023-01-10 03:20:51'),
(529, '103.202.52.23', 9, 8, '2023-01-11', 40003, '2023-01-11 05:02:24'),
(530, '51.182.105.200', 8, 0, '2023-01-09', 0, '2023-01-10 04:06:46'),
(531, '51.182.105.200', 1, 5, '2023-01-09', 0, '2023-01-10 04:05:55'),
(532, '51.182.105.200', 1, 7, '2023-01-09', 0, '2023-01-10 04:06:27'),
(533, '51.182.105.200', 1, 10, '2023-01-09', 0, '2023-01-10 04:06:40'),
(534, '157.55.39.34', 2, 0, '2023-01-10', 0, '2023-01-10 08:40:52'),
(535, '54.213.225.41', 1, 0, '2023-01-10', 0, '2023-01-10 05:29:36'),
(536, '185.191.171.9', 3, 0, '2023-01-23', 0, '2023-01-24 02:39:38'),
(537, '185.191.171.7', 4, 0, '2023-02-06', 0, '2023-02-06 19:23:43'),
(538, '185.191.171.35', 5, 0, '2023-03-09', 0, '2023-03-10 03:36:34'),
(539, '114.119.130.183', 1, 5, '2023-01-10', 0, '2023-01-10 09:11:48'),
(540, '114.119.130.125', 2, 0, '2023-02-26', 0, '2023-02-26 18:50:36'),
(541, '114.119.151.12', 1, 0, '2023-01-10', 0, '2023-01-10 09:34:05'),
(542, '114.119.137.252', 1, 26, '2023-01-10', 0, '2023-01-10 10:08:52'),
(543, '185.191.171.16', 5, 0, '2023-03-10', 0, '2023-03-10 12:08:49'),
(544, '209.126.77.66', 3, 0, '2023-02-24', 0, '2023-02-24 16:56:43'),
(545, '207.46.13.14', 224, 1, '2023-01-21', 0, '2023-01-21 18:48:17'),
(546, '198.235.24.183', 2, 0, '2023-02-22', 0, '2023-02-22 06:30:54'),
(547, '185.191.171.42', 4, 0, '2023-03-09', 0, '2023-03-09 10:16:17'),
(548, '207.46.13.182', 1, 0, '2023-01-10', 0, '2023-01-10 15:08:42'),
(549, '114.119.142.100', 1, 7, '2023-01-10', 0, '2023-01-10 17:02:27'),
(550, '114.119.153.208', 1, 10, '2023-01-10', 0, '2023-01-10 18:19:37'),
(551, '185.156.177.98', 5, 0, '2023-01-10', 0, '2023-01-10 18:46:36'),
(552, '103.127.7.229', 23, 0, '2023-01-10', 0, '2023-01-11 03:55:56'),
(553, '103.127.7.229', 1, 1, '2023-01-10', 0, '2023-01-10 20:47:09'),
(554, '185.191.171.36', 1, 5, '2023-01-10', 0, '2023-01-10 21:02:08'),
(555, '52.52.180.54', 3, 0, '2023-01-10', 0, '2023-01-10 21:14:04'),
(556, '159.65.51.215', 3, 0, '2023-01-10', 0, '2023-01-10 21:09:49'),
(557, '164.92.143.142', 6, 0, '2023-01-10', 0, '2023-01-10 21:09:53'),
(558, '139.59.135.127', 3, 0, '2023-01-10', 0, '2023-01-10 21:09:53'),
(559, '147.182.184.235', 1, 0, '2023-01-10', 0, '2023-01-10 21:10:14'),
(560, '206.189.226.1', 1, 0, '2023-01-10', 0, '2023-01-10 21:10:17'),
(561, '103.160.8.54', 11, 11, '2023-01-31', 0, '2023-01-31 19:35:30'),
(562, '103.160.8.54', 1, 112, '2023-01-10', 0, '2023-01-10 21:11:13'),
(563, '65.154.226.167', 2, 0, '2023-03-09', 0, '2023-03-09 16:31:45'),
(564, '50.18.204.14', 1, 0, '2023-01-10', 0, '2023-01-10 21:12:54'),
(565, '27.147.201.241', 1, 0, '2023-01-10', 0, '2023-01-10 21:14:18'),
(566, '157.55.39.36', 1, 0, '2023-01-10', 0, '2023-01-10 21:20:49'),
(567, '3.15.228.139', 6, 0, '2023-01-10', 0, '2023-01-10 22:05:39'),
(568, '185.191.171.17', 1, 7, '2023-01-10', 0, '2023-01-10 22:04:56'),
(569, '205.210.31.136', 2, 0, '2023-01-21', 0, '2023-01-21 06:32:14'),
(570, '34.254.53.125', 6, 0, '2023-01-10', 0, '2023-01-11 00:10:06'),
(571, '185.191.171.21', 4, 0, '2023-03-10', 0, '2023-03-10 18:38:05'),
(572, '66.249.88.246', 12, 0, '2023-01-31', 0, '2023-02-01 01:17:45'),
(573, '64.233.172.188', 30, 0, '2023-01-31', 0, '2023-02-01 01:54:22'),
(574, '66.249.88.242', 14, 0, '2023-02-22', 0, '2023-02-23 01:30:36'),
(575, '66.249.83.7', 4, 0, '2023-02-09', 0, '2023-02-09 07:49:52'),
(576, '66.249.88.244', 13, 0, '2023-02-28', 0, '2023-03-01 03:01:36'),
(577, '66.249.83.204', 2, 0, '2023-02-09', 0, '2023-02-09 06:21:39'),
(578, '27.147.166.241', 1, 9, '2023-01-10', 10000, '2023-01-11 03:02:34'),
(579, '66.249.83.5', 5, 0, '2023-02-21', 0, '2023-02-21 13:10:44'),
(580, '66.249.83.88', 1, 0, '2023-01-10', 0, '2023-01-11 03:17:57'),
(581, '66.249.83.87', 1, 0, '2023-01-10', 0, '2023-01-11 03:18:04'),
(582, '108.174.8.20', 1, 0, '2023-01-10', 0, '2023-01-11 03:27:13'),
(583, '103.127.7.229', 1, 8, '2023-01-10', 0, '2023-01-11 03:56:15'),
(584, '185.191.171.18', 3, 0, '2023-01-23', 0, '2023-01-23 18:58:06'),
(585, '114.119.132.114', 1, 20, '2023-01-10', 0, '2023-01-11 04:23:57'),
(586, '103.127.4.227', 1, 0, '2023-01-10', 0, '2023-01-11 04:27:07'),
(587, '207.46.13.129', 5, 0, '2023-01-19', 0, '2023-01-19 23:35:48'),
(588, '66.220.149.8', 1, 0, '2023-01-10', 0, '2023-01-11 04:37:40'),
(589, '114.119.155.228', 1, 28, '2023-01-10', 0, '2023-01-11 04:40:43'),
(590, '114.119.151.208', 1, 0, '2023-01-10', 0, '2023-01-11 04:42:43'),
(591, '114.119.145.126', 1, 6, '2023-01-10', 0, '2023-01-11 04:53:03'),
(592, '114.119.135.107', 1, 31, '2023-01-10', 0, '2023-01-11 04:55:45'),
(593, '114.119.131.110', 1, 0, '2023-01-10', 0, '2023-01-11 04:57:56'),
(594, '18.236.223.120', 1, 0, '2023-01-11', 0, '2023-01-11 05:03:18'),
(595, '121.4.105.222', 1, 0, '2023-01-11', 0, '2023-01-11 05:07:00'),
(596, '185.191.171.19', 5, 0, '2023-03-09', 0, '2023-03-09 16:12:30'),
(597, '185.191.171.10', 4, 0, '2023-03-05', 0, '2023-03-05 09:56:51'),
(598, '51.222.253.19', 6, 0, '2023-03-09', 0, '2023-03-09 18:27:35'),
(599, '185.191.171.8', 1, 1, '2023-01-11', 0, '2023-01-11 09:14:46'),
(600, '185.181.60.12', 4, 0, '2023-02-28', 0, '2023-02-28 06:41:30'),
(601, '185.191.171.15', 4, 0, '2023-03-08', 0, '2023-03-09 03:41:33'),
(602, '66.249.90.74', 6, 0, '2023-01-31', 0, '2023-01-31 16:31:44'),
(603, '51.222.253.15', 4, 0, '2023-02-22', 0, '2023-02-23 01:55:17'),
(604, '114.119.131.207', 1, 0, '2023-01-11', 0, '2023-01-11 12:03:12'),
(605, '114.119.134.107', 1, 9, '2023-01-11', 0, '2023-01-11 13:19:28'),
(606, '51.222.253.3', 1, 8, '2023-01-11', 0, '2023-01-11 13:55:57'),
(607, '66.249.65.228', 2, 0, '2023-01-11', 0, '2023-01-11 14:01:45'),
(608, '47.251.11.3', 1, 0, '2023-01-11', 0, '2023-01-11 14:47:40'),
(609, '47.88.6.178', 1, 0, '2023-01-11', 0, '2023-01-11 14:50:16'),
(610, '66.249.90.79', 10, 0, '2023-02-01', 0, '2023-02-01 16:47:50'),
(611, '66.249.88.168', 43, 0, '2023-03-13', 0, '2023-03-13 19:26:01'),
(612, '114.119.149.89', 1, 0, '2023-01-11', 0, '2023-01-11 16:02:28'),
(613, '51.222.253.19', 1, 9, '2023-01-11', 0, '2023-01-11 16:17:35'),
(614, '103.150.64.107', 1, 0, '2023-01-11', 0, '2023-01-11 17:00:28'),
(615, '114.119.151.14', 1, 2, '2023-01-11', 0, '2023-01-11 17:37:31'),
(616, '205.210.31.182', 1, 0, '2023-01-11', 0, '2023-01-11 18:16:49'),
(617, '198.235.24.43', 1, 0, '2023-01-11', 0, '2023-01-11 18:21:40'),
(618, '51.222.253.8', 1, 10, '2023-01-11', 0, '2023-01-11 19:02:14'),
(619, '103.160.8.54', 10, 13, '2023-01-26', 40003, '2023-01-26 19:36:58'),
(620, '64.233.172.184', 16, 0, '2023-02-01', 0, '2023-02-01 21:21:09'),
(621, '103.160.8.54', 6, 12, '2023-01-17', 40003, '2023-01-17 21:31:11'),
(622, '103.203.92.39', 2, 0, '2023-01-11', 0, '2023-01-11 21:05:00'),
(623, '103.203.92.39', 1, 13, '2023-01-11', 0, '2023-01-11 20:50:19'),
(624, '103.203.92.39', 1, 11, '2023-01-11', 0, '2023-01-11 21:05:08'),
(625, '103.203.92.39', 4, 7, '2023-01-11', 0, '2023-01-11 21:11:19'),
(626, '108.174.8.20', 2, 7, '2023-01-11', 0, '2023-01-11 21:12:00'),
(627, '66.249.90.86', 7, 0, '2023-01-31', 0, '2023-01-31 22:53:54'),
(628, '114.119.155.153', 1, 4, '2023-01-11', 0, '2023-01-11 21:47:17'),
(629, '114.119.132.146', 2, 0, '2023-03-13', 0, '2023-03-13 22:16:36'),
(630, '64.233.172.186', 16, 0, '2023-01-31', 0, '2023-01-31 22:55:58'),
(631, '66.249.83.81', 13, 0, '2023-03-10', 0, '2023-03-11 02:07:58'),
(632, '66.249.83.83', 18, 0, '2023-02-15', 0, '2023-02-15 15:16:06'),
(633, '83.166.242.10', 19, 0, '2023-01-28', 0, '2023-01-28 13:58:07'),
(634, '51.222.253.7', 1, 1, '2023-01-11', 0, '2023-01-11 22:49:46'),
(635, '107.22.79.194', 2, 0, '2023-01-11', 0, '2023-01-11 23:23:13'),
(636, '114.119.132.85', 1, 5, '2023-01-11', 0, '2023-01-11 23:35:56'),
(637, '114.119.133.158', 2, 0, '2023-02-21', 0, '2023-02-21 08:03:50'),
(638, '114.119.155.96', 1, 0, '2023-01-11', 0, '2023-01-11 23:38:14'),
(639, '51.222.253.8', 2, 11, '2023-01-30', 0, '2023-01-30 05:29:47'),
(640, '196.196.203.68', 1, 0, '2023-01-11', 0, '2023-01-12 02:50:57'),
(641, '87.236.176.161', 1, 0, '2023-01-11', 0, '2023-01-12 03:29:10'),
(642, '51.222.253.6', 1, 12, '2023-01-11', 0, '2023-01-12 04:14:41'),
(643, '35.93.13.176', 1, 0, '2023-01-12', 0, '2023-01-12 05:23:12'),
(644, '34.213.29.139', 1, 0, '2023-01-12', 0, '2023-01-12 05:26:45'),
(645, '35.86.140.211', 1, 0, '2023-01-12', 0, '2023-01-12 05:27:11'),
(646, '35.90.222.135', 1, 0, '2023-01-12', 0, '2023-01-12 05:30:17'),
(647, '35.92.163.132', 1, 0, '2023-01-12', 0, '2023-01-12 05:45:34'),
(648, '51.255.62.6', 1, 0, '2023-01-12', 0, '2023-01-12 05:54:12'),
(649, '51.255.62.3', 1, 0, '2023-01-12', 0, '2023-01-12 05:54:12'),
(650, '188.165.87.104', 1, 0, '2023-01-12', 0, '2023-01-12 06:41:24'),
(651, '188.165.87.100', 1, 0, '2023-01-12', 0, '2023-01-12 06:41:24'),
(652, '51.254.49.97', 1, 0, '2023-01-12', 0, '2023-01-12 07:10:46'),
(653, '51.254.49.109', 1, 0, '2023-01-12', 0, '2023-01-12 07:10:46'),
(654, '66.249.65.231', 2, 0, '2023-01-14', 0, '2023-01-15 04:09:06'),
(655, '51.222.253.10', 1, 13, '2023-01-12', 0, '2023-01-12 09:19:48'),
(656, '66.249.65.225', 4, 0, '2023-01-17', 0, '2023-01-18 03:09:49'),
(657, '114.119.156.21', 1, 1, '2023-01-12', 0, '2023-01-12 09:27:01'),
(658, '114.119.156.124', 1, 0, '2023-01-12', 0, '2023-01-12 09:28:14'),
(659, '114.119.154.203', 1, 11, '2023-01-12', 0, '2023-01-12 09:36:47'),
(660, '114.119.129.191', 1, 0, '2023-01-12', 0, '2023-01-12 09:38:33'),
(661, '114.119.138.194', 1, 5, '2023-01-12', 0, '2023-01-12 09:51:40'),
(662, '114.119.156.59', 1, 17, '2023-01-12', 0, '2023-01-12 09:53:20'),
(663, '114.119.135.83', 1, 0, '2023-01-12', 0, '2023-01-12 09:54:17'),
(664, '114.119.137.180', 2, 0, '2023-01-19', 0, '2023-01-19 19:39:11'),
(665, '114.119.156.152', 1, 0, '2023-01-12', 0, '2023-01-12 10:14:29'),
(666, '5.188.62.174', 3, 0, '2023-03-10', 0, '2023-03-11 02:38:12'),
(667, '207.46.13.14', 4, 0, '2023-01-18', 0, '2023-01-18 18:49:30'),
(668, '15.235.12.96', 1, 0, '2023-01-12', 0, '2023-01-12 13:04:17'),
(669, '15.235.12.96', 1, 0, '2023-01-12', 0, '2023-01-12 13:04:17'),
(670, '87.236.176.102', 1, 0, '2023-01-12', 0, '2023-01-12 15:25:49'),
(671, '37.111.192.81', 9, 0, '2023-01-12', 0, '2023-01-12 16:58:17'),
(672, '37.111.192.81', 2, 1, '2023-01-12', 0, '2023-01-12 15:41:10'),
(673, '37.111.192.81', 1, 8, '2023-01-12', 40003, '2023-01-12 15:41:44'),
(674, '37.111.192.81', 1, 9, '2023-01-12', 40003, '2023-01-12 15:42:01'),
(675, '103.15.244.134', 1, 0, '2023-01-12', 0, '2023-01-12 16:56:55'),
(676, '66.249.83.82', 13, 0, '2023-02-15', 0, '2023-02-15 14:32:35'),
(677, '74.125.215.92', 40, 0, '2023-02-21', 0, '2023-02-21 17:36:47'),
(678, '74.125.215.90', 48, 0, '2023-02-21', 0, '2023-02-21 14:39:22'),
(679, '199.244.88.220', 2, 0, '2023-03-02', 0, '2023-03-02 16:42:24'),
(680, '103.30.190.185', 1, 8, '2023-01-12', 0, '2023-01-12 19:14:19'),
(681, '114.119.136.199', 1, 13, '2023-01-12', 0, '2023-01-12 19:39:09'),
(682, '74.125.212.52', 1, 0, '2023-01-12', 0, '2023-01-13 00:13:28'),
(683, '103.104.94.1', 9, 0, '2023-01-12', 0, '2023-01-13 02:39:56'),
(684, '103.104.94.1', 3, 11, '2023-01-12', 0, '2023-01-13 02:37:38'),
(685, '129.146.158.17', 1, 11, '2023-01-12', 0, '2023-01-13 01:34:58'),
(686, '5.161.133.63', 1, 6, '2023-01-12', 0, '2023-01-13 04:13:33'),
(687, '114.119.150.2', 1, 1, '2023-01-12', 0, '2023-01-13 04:21:34'),
(688, '114.119.156.132', 1, 0, '2023-01-12', 0, '2023-01-13 04:22:51'),
(689, '34.222.227.205', 1, 0, '2023-01-13', 0, '2023-01-13 05:16:19'),
(690, '207.148.1.22', 4, 0, '2023-01-13', 0, '2023-01-13 06:02:33'),
(691, '185.191.171.6', 1, 10, '2023-01-13', 0, '2023-01-13 10:24:05'),
(692, '185.191.171.37', 1, 8, '2023-01-13', 0, '2023-01-13 12:35:29'),
(693, '114.119.131.123', 1, 16, '2023-01-13', 0, '2023-01-13 12:50:12'),
(694, '104.198.39.203', 2, 0, '2023-01-13', 0, '2023-01-13 13:31:21'),
(695, '34.69.249.228', 2, 0, '2023-01-13', 0, '2023-01-13 13:31:22'),
(696, '34.133.166.159', 3, 0, '2023-01-20', 0, '2023-01-20 05:29:18'),
(697, '34.172.216.250', 1, 0, '2023-01-13', 0, '2023-01-13 13:31:22'),
(698, '185.191.171.16', 1, 7, '2023-01-13', 0, '2023-01-13 13:35:59'),
(699, '114.119.132.153', 1, 24, '2023-01-13', 0, '2023-01-13 13:52:39'),
(700, '114.119.134.155', 1, 1, '2023-01-13', 0, '2023-01-13 13:54:06'),
(701, '20.228.242.214', 4, 0, '2023-01-13', 0, '2023-01-13 15:12:21'),
(702, '103.202.52.23', 1, 12, '2023-01-13', 0, '2023-01-13 15:50:32'),
(703, '207.46.13.14', 1, 4, '2023-01-13', 0, '2023-01-13 16:25:48'),
(704, '185.191.171.35', 1, 9, '2023-01-13', 0, '2023-01-13 17:29:42'),
(705, '90.219.164.230', 3, 0, '2023-01-14', 0, '2023-01-15 04:04:16'),
(706, '90.219.164.230', 1, 5, '2023-01-13', 0, '2023-01-13 19:41:16'),
(707, '114.119.140.196', 1, 23, '2023-01-13', 0, '2023-01-13 20:25:28'),
(708, '35.205.159.124', 1, 0, '2023-01-13', 0, '2023-01-13 20:34:32'),
(709, '114.119.148.120', 1, 8, '2023-01-13', 0, '2023-01-13 20:35:39'),
(710, '114.119.158.204', 1, 0, '2023-01-13', 0, '2023-01-13 20:37:48'),
(711, '74.125.151.58', 7, 0, '2023-01-30', 0, '2023-01-30 21:53:31'),
(712, '126.188.67.0', 1, 0, '2023-01-13', 0, '2023-01-13 22:28:59'),
(713, '74.125.215.88', 30, 0, '2023-02-21', 0, '2023-02-21 15:07:25'),
(714, '66.249.82.26', 1, 0, '2023-01-13', 0, '2023-01-13 22:29:00'),
(715, '185.191.171.45', 2, 10, '2023-02-10', 0, '2023-02-10 13:44:43'),
(716, '157.55.39.87', 6, 7, '2023-01-15', 0, '2023-01-15 15:52:29'),
(717, '185.191.171.11', 1, 5, '2023-01-13', 0, '2023-01-14 02:16:19'),
(718, '185.191.171.23', 1, 9, '2023-01-13', 0, '2023-01-14 02:33:11'),
(719, '34.221.201.251', 1, 0, '2023-01-14', 0, '2023-01-14 05:18:30'),
(720, '35.155.196.139', 1, 0, '2023-01-14', 0, '2023-01-14 05:21:02'),
(721, '54.202.237.227', 1, 0, '2023-01-14', 0, '2023-01-14 05:30:49'),
(722, '3.101.54.82', 1, 0, '2023-01-14', 0, '2023-01-14 05:33:45'),
(723, '79.137.65.46', 1, 0, '2023-01-14', 0, '2023-01-14 05:41:29'),
(724, '17.22.253.49', 1, 0, '2023-01-14', 0, '2023-01-14 06:02:55'),
(725, '205.210.31.174', 2, 0, '2023-02-19', 0, '2023-02-20 01:41:29'),
(726, '130.255.166.51', 1, 0, '2023-01-14', 0, '2023-01-14 06:18:06');
INSERT INTO `web_visitors` (`id`, `ip_address`, `count`, `item_id`, `visited_date`, `user_id`, `entry_at`) VALUES
(727, '114.119.146.159', 2, 19, '2023-03-06', 0, '2023-03-06 23:40:31'),
(728, '74.125.151.56', 3, 0, '2023-01-30', 0, '2023-01-30 07:49:35'),
(729, '36.90.8.226', 1, 0, '2023-01-14', 0, '2023-01-14 09:25:01'),
(730, '114.119.139.43', 1, 21, '2023-01-14', 0, '2023-01-14 10:14:23'),
(731, '185.191.171.45', 4, 0, '2023-02-21', 0, '2023-02-21 21:36:52'),
(732, '185.191.171.40', 4, 0, '2023-02-17', 0, '2023-02-17 21:13:21'),
(733, '66.249.83.9', 2, 0, '2023-01-28', 0, '2023-01-28 10:20:44'),
(734, '66.249.83.206', 3, 0, '2023-02-08', 0, '2023-02-09 01:41:49'),
(735, '103.160.8.54', 10, 14, '2023-01-16', 40003, '2023-01-16 18:53:01'),
(736, '198.235.24.182', 1, 0, '2023-01-14', 0, '2023-01-14 16:32:54'),
(737, '114.119.133.134', 2, 0, '2023-01-30', 0, '2023-01-30 17:58:26'),
(738, '103.160.8.54', 2, 15, '2023-01-14', 40003, '2023-01-14 19:59:56'),
(739, '103.160.8.54', 3, 16, '2023-01-14', 40003, '2023-01-14 20:00:46'),
(740, '185.191.171.14', 1, 8, '2023-01-14', 0, '2023-01-14 17:11:29'),
(741, '185.191.171.35', 1, 1, '2023-01-14', 0, '2023-01-14 19:10:36'),
(742, '202.134.13.133', 1, 8, '2023-01-14', 0, '2023-01-14 23:13:43'),
(743, '207.46.13.180', 4, 13, '2023-01-18', 0, '2023-01-18 05:06:03'),
(744, '207.46.13.180', 3, 12, '2023-01-18', 0, '2023-01-18 13:28:33'),
(745, '207.46.13.180', 3, 16, '2023-01-18', 0, '2023-01-18 08:10:52'),
(746, '40.77.167.69', 4, 8, '2023-01-18', 0, '2023-01-19 00:26:43'),
(747, '40.77.167.69', 4, 14, '2023-01-18', 0, '2023-01-18 08:26:31'),
(748, '157.55.39.229', 1, 15, '2023-01-14', 0, '2023-01-15 01:21:39'),
(749, '157.55.39.129', 2, 11, '2023-01-18', 0, '2023-01-18 23:58:05'),
(750, '157.55.39.229', 1, 10, '2023-01-14', 0, '2023-01-15 01:21:50'),
(751, '40.77.167.69', 2, 0, '2023-01-18', 0, '2023-01-18 17:15:33'),
(752, '66.249.77.91', 8, 0, '2023-02-18', 0, '2023-02-18 15:42:01'),
(753, '114.119.150.155', 2, 0, '2023-02-03', 0, '2023-02-03 17:06:16'),
(754, '66.249.77.93', 7, 0, '2023-02-17', 0, '2023-02-17 22:34:03'),
(755, '114.119.132.135', 1, 0, '2023-01-14', 0, '2023-01-15 02:54:05'),
(756, '114.119.135.48', 1, 27, '2023-01-14', 0, '2023-01-15 03:51:31'),
(757, '51.222.253.7', 1, 14, '2023-01-14', 0, '2023-01-15 04:23:17'),
(758, '54.184.51.67', 1, 0, '2023-01-14', 0, '2023-01-15 04:24:05'),
(759, '52.12.202.154', 1, 0, '2023-01-15', 0, '2023-01-15 05:32:34'),
(760, '54.218.108.111', 1, 0, '2023-01-15', 0, '2023-01-15 05:32:35'),
(761, '18.236.241.213', 1, 0, '2023-01-15', 0, '2023-01-15 05:33:10'),
(762, '35.87.106.12', 1, 0, '2023-01-15', 0, '2023-01-15 05:33:12'),
(763, '52.32.19.73', 1, 0, '2023-01-15', 0, '2023-01-15 05:47:34'),
(764, '202.134.14.153', 9, 0, '2023-01-15', 0, '2023-01-15 06:29:29'),
(765, '202.134.14.153', 1, 1, '2023-01-15', 0, '2023-01-15 06:27:57'),
(766, '51.222.253.9', 1, 15, '2023-01-15', 0, '2023-01-15 07:03:18'),
(767, '35.213.223.219', 1, 0, '2023-01-15', 0, '2023-01-15 09:00:35'),
(768, '185.241.208.106', 1, 0, '2023-01-15', 0, '2023-01-15 09:08:08'),
(769, '146.196.50.84', 1, 0, '2023-01-15', 0, '2023-01-15 09:50:57'),
(770, '167.172.81.232', 2, 0, '2023-01-15', 0, '2023-01-15 09:58:05'),
(771, '180.163.220.4', 1, 0, '2023-01-15', 0, '2023-01-15 10:18:36'),
(772, '180.163.220.67', 1, 0, '2023-01-15', 0, '2023-01-15 10:18:42'),
(773, '207.46.13.129', 1, 2, '2023-01-15', 0, '2023-01-15 10:25:32'),
(774, '51.222.253.4', 2, 16, '2023-02-21', 0, '2023-02-22 02:37:12'),
(775, '114.119.162.80', 1, 0, '2023-01-15', 0, '2023-01-15 14:13:38'),
(776, '205.210.31.55', 1, 0, '2023-01-15', 0, '2023-01-15 14:44:32'),
(777, '74.125.218.90', 4, 0, '2023-01-16', 0, '2023-01-16 17:20:55'),
(778, '173.82.60.250', 4, 0, '2023-01-23', 0, '2023-01-23 14:38:35'),
(779, '137.184.89.107', 1, 0, '2023-01-15', 0, '2023-01-15 18:18:31'),
(780, '114.119.155.210', 1, 2, '2023-01-15', 0, '2023-01-15 20:23:44'),
(781, '114.119.142.7', 1, 15, '2023-01-15', 0, '2023-01-15 21:00:13'),
(782, '114.119.159.101', 1, 0, '2023-01-15', 0, '2023-01-15 21:01:52'),
(783, '23.239.11.118', 3, 0, '2023-01-15', 0, '2023-01-15 21:08:44'),
(784, '198.235.24.53', 2, 0, '2023-01-21', 0, '2023-01-22 03:06:04'),
(785, '103.152.102.113', 8, 0, '2023-01-15', 0, '2023-01-15 23:25:34'),
(786, '103.152.102.113', 1, 1, '2023-01-15', 0, '2023-01-15 23:23:25'),
(787, '103.152.102.113', 3, 8, '2023-01-15', 0, '2023-01-15 23:25:27'),
(788, '103.152.102.113', 1, 15, '2023-01-15', 0, '2023-01-15 23:24:28'),
(789, '66.249.83.120', 1, 0, '2023-01-15', 0, '2023-01-16 01:01:21'),
(790, '74.125.218.92', 1, 0, '2023-01-15', 0, '2023-01-16 02:17:27'),
(791, '207.46.13.131', 3, 15, '2023-01-20', 0, '2023-01-20 21:10:25'),
(792, '66.249.83.122', 1, 0, '2023-01-15', 0, '2023-01-16 04:49:26'),
(793, '52.12.80.205', 1, 0, '2023-01-16', 0, '2023-01-16 05:39:33'),
(794, '114.119.150.155', 1, 10, '2023-01-16', 0, '2023-01-16 05:41:39'),
(795, '114.119.140.74', 1, 26, '2023-01-16', 0, '2023-01-16 05:55:38'),
(796, '114.119.153.152', 1, 22, '2023-01-16', 0, '2023-01-16 07:04:03'),
(797, '157.55.39.87', 1, 12, '2023-01-16', 0, '2023-01-16 09:09:37'),
(798, '114.119.145.137', 1, 6, '2023-01-16', 0, '2023-01-16 11:43:05'),
(799, '185.191.171.3', 2, 12, '2023-02-25', 0, '2023-02-25 17:47:08'),
(800, '114.119.151.59', 1, 0, '2023-01-16', 0, '2023-01-16 13:57:33'),
(801, '207.46.13.131', 2, 10, '2023-01-18', 0, '2023-01-18 13:59:17'),
(802, '114.119.130.201', 1, 0, '2023-01-16', 0, '2023-01-16 14:38:04'),
(803, '51.195.157.191', 1, 0, '2023-01-16', 0, '2023-01-16 15:07:34'),
(804, '74.125.218.88', 1, 0, '2023-01-16', 0, '2023-01-16 15:45:06'),
(805, '103.160.8.54', 22, 17, '2023-01-26', 40003, '2023-01-26 22:11:57'),
(806, '114.119.137.51', 1, 31, '2023-01-16', 0, '2023-01-16 16:41:45'),
(807, '114.119.135.195', 1, 13, '2023-01-16', 0, '2023-01-16 16:43:04'),
(808, '207.46.13.129', 1, 17, '2023-01-16', 0, '2023-01-16 16:53:44'),
(809, '114.119.167.129', 1, 0, '2023-01-16', 0, '2023-01-16 18:29:00'),
(810, '103.160.8.54', 4, 19, '2023-01-18', 0, '2023-01-18 19:39:41'),
(811, '114.119.152.33', 1, 0, '2023-01-16', 0, '2023-01-16 19:05:56'),
(812, '103.160.8.54', 26, 18, '2023-01-17', 0, '2023-01-18 00:03:21'),
(813, '66.220.149.15', 1, 0, '2023-01-16', 0, '2023-01-16 20:28:23'),
(814, '157.55.39.129', 2, 0, '2023-01-18', 0, '2023-01-18 18:59:55'),
(815, '114.119.140.172', 1, 4, '2023-01-16', 0, '2023-01-17 00:55:01'),
(816, '109.248.175.89', 1, 0, '2023-01-16', 0, '2023-01-17 04:47:47'),
(817, '34.220.175.107', 1, 0, '2023-01-17', 0, '2023-01-17 05:22:08'),
(818, '54.69.145.50', 1, 0, '2023-01-17', 0, '2023-01-17 05:22:50'),
(819, '185.191.171.23', 1, 11, '2023-01-17', 0, '2023-01-17 05:27:42'),
(820, '176.213.33.118', 1, 0, '2023-01-17', 0, '2023-01-17 05:31:42'),
(821, '35.160.200.210', 1, 0, '2023-01-17', 0, '2023-01-17 05:43:52'),
(822, '114.119.136.109', 1, 1, '2023-01-17', 0, '2023-01-17 08:21:46'),
(823, '114.119.133.228', 1, 0, '2023-01-17', 0, '2023-01-17 08:23:51'),
(824, '114.119.143.215', 1, 0, '2023-01-17', 0, '2023-01-17 08:24:51'),
(825, '185.191.171.17', 1, 13, '2023-01-17', 0, '2023-01-17 09:40:16'),
(826, '114.119.131.52', 1, 20, '2023-01-17', 0, '2023-01-17 10:31:51'),
(827, '114.119.166.212', 1, 2, '2023-01-17', 0, '2023-01-17 10:33:05'),
(828, '114.119.141.178', 1, 0, '2023-01-17', 0, '2023-01-17 10:34:20'),
(829, '185.191.171.43', 2, 16, '2023-02-22', 0, '2023-02-23 03:23:06'),
(830, '198.235.24.159', 1, 0, '2023-01-17', 0, '2023-01-17 12:20:53'),
(831, '67.23.235.141', 1, 0, '2023-01-17', 0, '2023-01-17 12:31:36'),
(832, '198.235.24.56', 1, 0, '2023-01-17', 0, '2023-01-17 13:06:07'),
(833, '66.249.77.89', 6, 0, '2023-02-04', 0, '2023-02-04 17:51:36'),
(834, '185.191.171.36', 1, 14, '2023-01-17', 0, '2023-01-17 13:59:25'),
(835, '114.119.132.7', 1, 28, '2023-01-17', 0, '2023-01-17 18:16:06'),
(836, '114.119.129.148', 1, 3, '2023-01-17', 0, '2023-01-17 18:17:28'),
(837, '114.119.145.216', 1, 0, '2023-01-17', 0, '2023-01-17 19:36:18'),
(838, '114.119.151.146', 1, 0, '2023-01-17', 0, '2023-01-17 19:37:18'),
(839, '66.220.149.16', 2, 0, '2023-03-05', 0, '2023-03-05 08:21:14'),
(840, '198.244.140.11', 1, 0, '2023-01-17', 0, '2023-01-17 20:11:43'),
(841, '103.160.8.14', 6, 0, '2023-01-17', 40003, '2023-01-17 21:15:41'),
(842, '103.160.8.14', 1, 14, '2023-01-17', 40003, '2023-01-17 20:50:55'),
(843, '114.119.156.250', 1, 18, '2023-01-17', 0, '2023-01-17 20:58:49'),
(844, '114.119.157.210', 1, 4, '2023-01-17', 0, '2023-01-17 21:01:14'),
(845, '210.4.76.2', 12, 0, '2023-01-25', 0, '2023-01-25 21:24:52'),
(846, '210.4.76.2', 5, 8, '2023-01-25', 0, '2023-01-25 21:25:23'),
(847, '210.4.76.2', 1, 1, '2023-01-17', 0, '2023-01-17 21:12:40'),
(848, '114.119.154.14', 1, 0, '2023-01-17', 0, '2023-01-17 21:33:16'),
(849, '114.119.137.38', 2, 0, '2023-01-31', 0, '2023-01-31 22:15:25'),
(850, '103.160.8.54', 10, 20, '2023-01-26', 0, '2023-01-26 19:37:04'),
(851, '185.191.171.38', 1, 15, '2023-01-17', 0, '2023-01-18 00:15:11'),
(852, '5.181.234.133', 2, 0, '2023-03-02', 0, '2023-03-03 00:16:02'),
(853, '199.16.157.183', 1, 0, '2023-01-17', 0, '2023-01-18 03:50:13'),
(854, '17.241.75.243', 1, 0, '2023-01-17', 0, '2023-01-18 04:45:45'),
(855, '114.119.136.199', 1, 1, '2023-01-17', 0, '2023-01-18 04:57:01'),
(856, '114.119.129.179', 1, 7, '2023-01-17', 0, '2023-01-18 04:58:44'),
(857, '114.119.134.6', 1, 1, '2023-01-18', 0, '2023-01-18 05:08:31'),
(858, '18.246.67.148', 1, 0, '2023-01-18', 0, '2023-01-18 05:22:57'),
(859, '205.210.31.168', 1, 0, '2023-01-18', 0, '2023-01-18 07:02:46'),
(860, '151.106.97.179', 1, 0, '2023-01-18', 0, '2023-01-18 07:32:33'),
(861, '205.210.31.36', 1, 0, '2023-01-18', 0, '2023-01-18 08:09:53'),
(862, '114.119.140.221', 1, 3, '2023-01-18', 0, '2023-01-18 10:31:23'),
(863, '114.119.143.123', 1, 0, '2023-01-18', 0, '2023-01-18 10:32:37'),
(864, '114.119.130.183', 1, 16, '2023-01-18', 0, '2023-01-18 14:19:20'),
(865, '114.119.132.72', 1, 0, '2023-01-18', 0, '2023-01-18 14:20:37'),
(866, '103.74.229.8', 20, 0, '2023-02-25', 0, '2023-02-25 08:41:09'),
(867, '103.74.229.8', 2, 5, '2023-02-16', 0, '2023-02-17 02:35:23'),
(868, '103.160.8.54', 5, 21, '2023-01-26', 40003, '2023-01-26 19:43:46'),
(869, '51.222.253.1', 1, 17, '2023-01-18', 0, '2023-01-18 19:25:44'),
(870, '103.160.8.54', 5, 22, '2023-01-26', 40003, '2023-01-26 22:12:01'),
(871, '51.222.253.15', 1, 18, '2023-01-18', 0, '2023-01-18 21:02:06'),
(872, '51.222.253.16', 1, 21, '2023-01-18', 0, '2023-01-18 22:34:09'),
(873, '114.119.151.237', 1, 17, '2023-01-18', 0, '2023-01-18 23:08:09'),
(874, '114.119.138.172', 1, 17, '2023-01-18', 0, '2023-01-18 23:10:01'),
(875, '114.119.135.209', 1, 0, '2023-01-18', 0, '2023-01-18 23:20:01'),
(876, '96.9.246.196', 1, 0, '2023-01-18', 0, '2023-01-19 00:39:27'),
(877, '51.222.253.12', 1, 19, '2023-01-18', 0, '2023-01-19 01:12:35'),
(878, '114.119.145.150', 1, 20, '2023-01-18', 0, '2023-01-19 02:42:55'),
(879, '114.119.150.186', 1, 19, '2023-01-18', 0, '2023-01-19 04:58:13'),
(880, '114.119.142.181', 1, 24, '2023-01-18', 0, '2023-01-19 04:59:31'),
(881, '27.147.166.241', 1, 8, '2023-01-19', 0, '2023-01-19 05:15:14'),
(882, '54.218.85.116', 1, 0, '2023-01-19', 0, '2023-01-19 05:16:15'),
(883, '34.219.171.7', 1, 0, '2023-01-19', 0, '2023-01-19 05:16:52'),
(884, '54.189.129.6', 1, 0, '2023-01-19', 0, '2023-01-19 05:17:24'),
(885, '51.222.253.16', 1, 20, '2023-01-19', 0, '2023-01-19 05:18:54'),
(886, '34.217.209.100', 1, 0, '2023-01-19', 0, '2023-01-19 05:22:44'),
(887, '207.46.13.12', 5, 7, '2023-01-19', 0, '2023-01-19 13:37:53'),
(888, '54.213.84.156', 1, 0, '2023-01-19', 0, '2023-01-19 05:42:05'),
(889, '185.156.72.13', 83, 0, '2023-01-19', 0, '2023-01-19 09:04:15'),
(890, '114.119.150.4', 1, 5, '2023-01-19', 0, '2023-01-19 09:09:33'),
(891, '114.119.132.43', 1, 19, '2023-01-19', 0, '2023-01-19 09:26:47'),
(892, '114.119.135.152', 1, 17, '2023-01-19', 0, '2023-01-19 09:27:37'),
(893, '114.119.158.125', 1, 17, '2023-01-19', 0, '2023-01-19 10:38:14'),
(894, '114.119.135.120', 1, 16, '2023-01-19', 0, '2023-01-19 10:39:24'),
(895, '152.58.16.60', 1, 0, '2023-01-19', 0, '2023-01-19 14:23:00'),
(896, '23.22.35.162', 19, 0, '2023-01-19', 0, '2023-01-19 15:05:33'),
(897, '3.224.220.101', 17, 0, '2023-01-19', 0, '2023-01-19 15:06:21'),
(898, '52.70.240.171', 2, 8, '2023-01-19', 0, '2023-01-19 15:06:04'),
(899, '52.70.240.171', 16, 0, '2023-01-19', 0, '2023-01-19 15:06:10'),
(900, '23.22.35.162', 2, 21, '2023-01-19', 0, '2023-01-19 15:04:34'),
(901, '52.70.240.171', 2, 9, '2023-01-19', 0, '2023-01-19 15:05:45'),
(902, '23.22.35.162', 1, 19, '2023-01-19', 0, '2023-01-19 15:01:47'),
(903, '23.22.35.162', 1, 20, '2023-01-19', 0, '2023-01-19 15:01:51'),
(904, '23.22.35.162', 1, 18, '2023-01-19', 0, '2023-01-19 15:02:02'),
(905, '3.224.220.101', 1, 17, '2023-01-19', 0, '2023-01-19 15:02:06'),
(906, '52.70.240.171', 2, 16, '2023-01-19', 0, '2023-01-19 15:05:10'),
(907, '52.70.240.171', 3, 1, '2023-01-19', 0, '2023-01-19 15:06:06'),
(908, '3.224.220.101', 1, 14, '2023-01-19', 0, '2023-01-19 15:02:45'),
(909, '23.22.35.162', 1, 12, '2023-01-19', 0, '2023-01-19 15:02:52'),
(910, '3.224.220.101', 2, 15, '2023-01-19', 0, '2023-01-19 15:05:22'),
(911, '23.22.35.162', 1, 11, '2023-01-19', 0, '2023-01-19 15:03:02'),
(912, '52.70.240.171', 1, 10, '2023-01-19', 0, '2023-01-19 15:03:05'),
(913, '23.22.35.162', 1, 7, '2023-01-19', 0, '2023-01-19 15:03:13'),
(914, '52.70.240.171', 1, 5, '2023-01-19', 0, '2023-01-19 15:03:17'),
(915, '23.22.35.162', 1, 13, '2023-01-19', 0, '2023-01-19 15:03:37'),
(916, '23.22.35.162', 1, 14, '2023-01-19', 0, '2023-01-19 15:04:19'),
(917, '3.224.220.101', 1, 13, '2023-01-19', 0, '2023-01-19 15:04:23'),
(918, '23.22.35.162', 1, 17, '2023-01-19', 0, '2023-01-19 15:04:38'),
(919, '3.224.220.101', 1, 18, '2023-01-19', 0, '2023-01-19 15:04:44'),
(920, '3.224.220.101', 1, 20, '2023-01-19', 0, '2023-01-19 15:05:36'),
(921, '3.224.220.101', 1, 10, '2023-01-19', 0, '2023-01-19 15:05:37'),
(922, '3.224.220.101', 1, 5, '2023-01-19', 0, '2023-01-19 15:05:41'),
(923, '3.224.220.101', 1, 19, '2023-01-19', 0, '2023-01-19 15:05:47'),
(924, '52.70.240.171', 1, 12, '2023-01-19', 0, '2023-01-19 15:05:57'),
(925, '52.70.240.171', 1, 11, '2023-01-19', 0, '2023-01-19 15:05:59'),
(926, '3.224.220.101', 1, 7, '2023-01-19', 0, '2023-01-19 15:06:01'),
(927, '23.22.35.162', 1, 1, '2023-01-19', 0, '2023-01-19 15:06:20'),
(928, '136.243.228.195', 2, 0, '2023-02-18', 0, '2023-02-18 21:12:32'),
(929, '176.9.47.58', 5, 0, '2023-02-28', 0, '2023-02-28 21:52:41'),
(930, '172.245.220.204', 25, 0, '2023-01-19', 0, '2023-01-19 18:04:55'),
(931, '172.245.220.204', 1, 17, '2023-01-19', 0, '2023-01-19 18:04:42'),
(932, '172.245.220.204', 1, 12, '2023-01-19', 0, '2023-01-19 18:04:43'),
(933, '172.245.220.204', 1, 14, '2023-01-19', 0, '2023-01-19 18:04:44'),
(934, '172.245.220.204', 1, 11, '2023-01-19', 0, '2023-01-19 18:04:44'),
(935, '172.245.220.204', 1, 7, '2023-01-19', 0, '2023-01-19 18:04:45'),
(936, '172.245.220.204', 1, 8, '2023-01-19', 0, '2023-01-19 18:04:45'),
(937, '172.245.220.204', 1, 5, '2023-01-19', 0, '2023-01-19 18:04:46'),
(938, '172.245.220.204', 1, 1, '2023-01-19', 0, '2023-01-19 18:04:47'),
(939, '172.245.220.204', 1, 10, '2023-01-19', 0, '2023-01-19 18:04:47'),
(940, '172.245.220.204', 1, 13, '2023-01-19', 0, '2023-01-19 18:04:48'),
(941, '172.245.220.204', 1, 15, '2023-01-19', 0, '2023-01-19 18:04:48'),
(942, '172.245.220.204', 1, 16, '2023-01-19', 0, '2023-01-19 18:04:49'),
(943, '172.245.220.204', 1, 18, '2023-01-19', 0, '2023-01-19 18:04:50'),
(944, '172.245.220.204', 1, 19, '2023-01-19', 0, '2023-01-19 18:04:51'),
(945, '172.245.220.204', 1, 20, '2023-01-19', 0, '2023-01-19 18:04:52'),
(946, '172.245.220.204', 1, 21, '2023-01-19', 0, '2023-01-19 18:04:53'),
(947, '172.245.220.204', 1, 9, '2023-01-19', 0, '2023-01-19 18:04:53'),
(948, '114.119.151.117', 1, 11, '2023-01-19', 0, '2023-01-19 18:38:44'),
(949, '114.119.132.105', 1, 1, '2023-01-19', 0, '2023-01-19 18:56:53'),
(950, '40.77.167.69', 1, 20, '2023-01-19', 0, '2023-01-19 18:57:18'),
(951, '207.46.13.12', 1, 0, '2023-01-19', 0, '2023-01-19 19:03:44'),
(952, '185.191.171.11', 1, 20, '2023-01-19', 0, '2023-01-19 21:50:39'),
(953, '157.55.39.129', 1, 20, '2023-01-19', 0, '2023-01-19 23:52:21'),
(954, '40.77.167.69', 3, 18, '2023-01-23', 0, '2023-01-23 11:07:51'),
(955, '207.46.13.14', 1, 17, '2023-01-19', 0, '2023-01-19 23:52:25'),
(956, '207.46.13.14', 2, 19, '2023-01-21', 0, '2023-01-21 14:54:46'),
(957, '146.190.169.85', 1, 0, '2023-01-19', 0, '2023-01-20 02:35:15'),
(958, '114.119.156.134', 1, 0, '2023-01-19', 0, '2023-01-20 03:32:42'),
(959, '114.119.159.228', 1, 9, '2023-01-19', 0, '2023-01-20 03:34:08'),
(960, '34.209.85.239', 1, 0, '2023-01-20', 0, '2023-01-20 05:14:15'),
(961, '35.224.43.9', 2, 0, '2023-01-20', 0, '2023-01-20 05:29:18'),
(962, '34.71.3.204', 1, 0, '2023-01-20', 0, '2023-01-20 05:29:18'),
(963, '107.178.218.141', 1, 0, '2023-01-20', 0, '2023-01-20 05:29:18'),
(964, '114.119.142.183', 1, 0, '2023-01-20', 0, '2023-01-20 07:30:00'),
(965, '207.46.13.131', 2, 0, '2023-01-21', 0, '2023-01-21 15:55:00'),
(966, '66.249.72.49', 2, 0, '2023-01-20', 0, '2023-01-20 11:13:14'),
(967, '114.119.141.78', 1, 0, '2023-01-20', 0, '2023-01-20 13:37:36'),
(968, '205.210.31.180', 1, 0, '2023-01-20', 0, '2023-01-20 14:39:38'),
(969, '205.210.31.145', 2, 0, '2023-02-04', 0, '2023-02-04 06:03:29'),
(970, '185.191.171.25', 1, 18, '2023-01-20', 0, '2023-01-20 16:30:43'),
(971, '207.46.13.25', 3, 0, '2023-01-22', 0, '2023-01-22 19:39:40'),
(972, '185.191.171.1', 1, 17, '2023-01-20', 0, '2023-01-20 22:32:54'),
(973, '205.185.116.89', 6, 0, '2023-02-16', 0, '2023-02-16 14:09:44'),
(974, '209.141.35.128', 2, 0, '2023-01-25', 0, '2023-01-25 05:02:45'),
(975, '114.119.135.174', 1, 12, '2023-01-20', 0, '2023-01-20 23:17:11'),
(976, '198.235.24.168', 1, 0, '2023-01-20', 0, '2023-01-21 00:23:30'),
(977, '173.252.95.24', 1, 0, '2023-01-20', 0, '2023-01-21 00:56:39'),
(978, '185.191.171.44', 1, 19, '2023-01-20', 0, '2023-01-21 03:39:16'),
(979, '54.183.22.112', 1, 0, '2023-01-20', 0, '2023-01-21 04:07:14'),
(980, '35.90.127.211', 2, 0, '2023-01-21', 0, '2023-01-21 05:49:27'),
(981, '114.119.130.105', 1, 5, '2023-01-21', 0, '2023-01-21 06:46:49'),
(982, '114.119.146.195', 2, 0, '2023-02-17', 0, '2023-02-17 11:38:24'),
(983, '5.161.70.134', 1, 0, '2023-01-21', 0, '2023-01-21 09:32:13'),
(984, '5.161.70.134', 1, 7, '2023-01-21', 0, '2023-01-21 09:32:13'),
(985, '114.119.134.203', 1, 10, '2023-01-21', 0, '2023-01-21 09:36:26'),
(986, '114.119.157.191', 1, 21, '2023-01-21', 0, '2023-01-21 10:51:08'),
(987, '114.119.141.42', 2, 0, '2023-02-16', 0, '2023-02-16 08:23:28'),
(988, '198.235.24.52', 2, 0, '2023-02-05', 0, '2023-02-05 21:41:28'),
(989, '101.34.223.139', 1, 0, '2023-01-21', 0, '2023-01-21 15:00:52'),
(990, '198.235.24.150', 1, 0, '2023-01-21', 0, '2023-01-21 16:59:11'),
(991, '114.119.143.158', 2, 2, '2023-02-10', 0, '2023-02-10 22:24:43'),
(992, '66.249.75.221', 1, 0, '2023-01-21', 0, '2023-01-21 18:58:29'),
(993, '207.46.13.25', 2, 20, '2023-01-22', 0, '2023-01-22 19:33:30'),
(994, '207.46.13.11', 29, 1, '2023-01-22', 0, '2023-01-22 14:31:04'),
(995, '198.235.24.39', 2, 0, '2023-03-01', 0, '2023-03-02 00:54:10'),
(996, '205.210.31.176', 1, 0, '2023-01-21', 0, '2023-01-21 21:53:09'),
(997, '66.249.79.187', 1, 0, '2023-01-21', 0, '2023-01-21 21:55:55'),
(998, '66.249.75.219', 2, 0, '2023-01-22', 0, '2023-01-22 08:32:08'),
(999, '205.210.31.132', 1, 0, '2023-01-21', 0, '2023-01-22 02:19:05'),
(1000, '114.119.135.30', 2, 26, '2023-02-08', 0, '2023-02-08 12:23:23'),
(1001, '114.119.148.88', 1, 31, '2023-01-21', 0, '2023-01-22 03:16:31'),
(1002, '114.119.144.37', 1, 0, '2023-01-22', 0, '2023-01-22 10:18:03'),
(1003, '114.119.153.11', 1, 10, '2023-01-22', 0, '2023-01-22 11:19:21'),
(1004, '114.119.157.210', 1, 0, '2023-01-22', 0, '2023-01-22 12:11:49'),
(1005, '114.119.139.8', 1, 27, '2023-01-22', 0, '2023-01-22 12:28:51'),
(1006, '207.46.13.11', 2, 19, '2023-01-23', 0, '2023-01-24 02:59:58'),
(1007, '162.19.93.94', 2, 0, '2023-01-22', 0, '2023-01-22 14:59:04'),
(1008, '173.252.79.5', 1, 0, '2023-01-22', 0, '2023-01-22 20:53:47'),
(1009, '114.119.139.26', 1, 20, '2023-01-22', 0, '2023-01-22 21:06:59'),
(1010, '114.119.132.76', 1, 0, '2023-01-22', 0, '2023-01-22 21:08:17'),
(1011, '114.119.146.208', 2, 0, '2023-02-09', 0, '2023-02-09 16:04:59'),
(1012, '185.191.171.36', 2, 0, '2023-03-09', 0, '2023-03-09 15:14:34'),
(1013, '66.249.73.85', 1, 0, '2023-01-22', 0, '2023-01-23 02:29:06'),
(1014, '185.191.171.16', 1, 21, '2023-01-22', 0, '2023-01-23 02:42:49'),
(1015, '185.191.171.11', 4, 0, '2023-03-08', 0, '2023-03-09 00:41:47'),
(1016, '196.244.191.108', 1, 0, '2023-01-22', 0, '2023-01-23 04:16:55'),
(1017, '103.161.55.141', 14, 0, '2023-01-23', 0, '2023-01-23 05:19:00'),
(1018, '34.219.224.192', 1, 0, '2023-01-23', 0, '2023-01-23 05:27:27'),
(1019, '18.237.48.67', 1, 0, '2023-01-23', 0, '2023-01-23 05:27:29'),
(1020, '54.203.0.250', 1, 0, '2023-01-23', 0, '2023-01-23 05:27:40'),
(1021, '54.190.211.30', 1, 0, '2023-01-23', 0, '2023-01-23 05:29:19'),
(1022, '34.214.18.217', 1, 0, '2023-01-23', 0, '2023-01-23 05:29:50'),
(1023, '52.39.238.38', 1, 0, '2023-01-23', 0, '2023-01-23 05:34:39'),
(1024, '114.119.156.131', 1, 0, '2023-01-23', 0, '2023-01-23 05:38:45'),
(1025, '185.220.101.178', 1, 0, '2023-01-23', 0, '2023-01-23 06:20:39'),
(1026, '185.191.171.6', 3, 0, '2023-02-06', 0, '2023-02-06 05:19:46'),
(1027, '114.119.157.96', 1, 2, '2023-01-23', 0, '2023-01-23 06:56:27'),
(1028, '114.119.166.88', 1, 15, '2023-01-23', 0, '2023-01-23 08:20:04'),
(1029, '114.119.157.191', 1, 0, '2023-01-23', 0, '2023-01-23 08:21:18'),
(1030, '185.191.171.24', 2, 1, '2023-02-17', 0, '2023-02-17 23:16:44'),
(1031, '185.191.171.41', 5, 0, '2023-03-10', 0, '2023-03-10 07:48:48'),
(1032, '185.191.171.24', 3, 0, '2023-03-10', 0, '2023-03-10 19:38:41'),
(1033, '17.241.75.136', 1, 0, '2023-01-23', 0, '2023-01-23 11:26:49'),
(1034, '185.191.171.2', 7, 0, '2023-03-10', 0, '2023-03-10 06:12:32'),
(1035, '114.119.151.174', 2, 0, '2023-02-06', 0, '2023-02-06 22:48:33'),
(1036, '209.141.33.65', 2, 0, '2023-01-24', 0, '2023-01-25 03:27:15'),
(1037, '13.59.248.151', 1, 0, '2023-01-23', 0, '2023-01-23 15:37:48'),
(1038, '114.119.152.171', 1, 21, '2023-01-23', 0, '2023-01-23 15:38:35'),
(1039, '114.119.150.1', 1, 0, '2023-01-23', 0, '2023-01-23 15:39:40'),
(1040, '66.249.69.91', 1, 0, '2023-01-23', 0, '2023-01-23 16:41:32'),
(1041, '114.119.133.53', 1, 3, '2023-01-23', 0, '2023-01-23 17:00:34'),
(1042, '66.249.69.93', 1, 0, '2023-01-23', 0, '2023-01-23 17:30:26'),
(1043, '114.119.155.81', 1, 4, '2023-01-23', 0, '2023-01-23 18:22:37'),
(1044, '66.102.6.120', 11, 0, '2023-02-23', 0, '2023-02-23 21:57:32'),
(1045, '66.102.6.124', 17, 0, '2023-02-23', 0, '2023-02-23 22:03:05'),
(1046, '51.222.253.7', 3, 0, '2023-03-09', 0, '2023-03-09 16:59:52'),
(1047, '66.102.6.122', 11, 0, '2023-02-23', 0, '2023-02-23 22:05:33'),
(1048, '205.185.122.184', 4, 0, '2023-02-18', 0, '2023-02-19 02:37:18'),
(1049, '51.222.253.18', 5, 0, '2023-03-10', 0, '2023-03-10 22:38:14'),
(1050, '207.46.13.11', 1, 17, '2023-01-23', 0, '2023-01-24 00:56:14'),
(1051, '185.191.171.3', 5, 0, '2023-02-22', 0, '2023-02-22 15:25:22'),
(1052, '114.119.141.2', 1, 4, '2023-01-23', 0, '2023-01-24 04:25:52'),
(1053, '114.119.159.92', 1, 0, '2023-01-23', 0, '2023-01-24 04:27:20'),
(1054, '114.119.138.59', 1, 0, '2023-01-23', 0, '2023-01-24 04:28:45'),
(1055, '114.119.159.76', 1, 8, '2023-01-23', 0, '2023-01-24 04:29:56'),
(1056, '114.119.138.194', 1, 6, '2023-01-23', 0, '2023-01-24 04:52:19'),
(1057, '114.119.159.197', 1, 16, '2023-01-23', 0, '2023-01-24 04:53:44'),
(1058, '114.119.156.114', 2, 0, '2023-02-01', 0, '2023-02-02 02:40:59'),
(1059, '51.222.253.4', 5, 0, '2023-03-10', 0, '2023-03-11 02:10:36'),
(1060, '66.249.65.80', 4, 0, '2023-02-10', 0, '2023-02-10 09:43:38'),
(1061, '54.212.87.114', 1, 0, '2023-01-24', 0, '2023-01-24 05:40:57'),
(1062, '185.191.171.33', 4, 0, '2023-03-08', 0, '2023-03-08 20:20:19'),
(1063, '198.235.24.27', 1, 0, '2023-01-24', 0, '2023-01-24 09:31:59'),
(1064, '17.241.75.87', 1, 0, '2023-01-24', 0, '2023-01-24 10:13:33'),
(1065, '185.191.171.4', 1, 7, '2023-01-24', 0, '2023-01-24 13:00:57'),
(1066, '114.119.134.107', 1, 13, '2023-01-24', 0, '2023-01-24 13:13:48'),
(1067, '114.119.147.239', 1, 7, '2023-01-24', 0, '2023-01-24 13:14:54'),
(1068, '185.191.171.4', 1, 5, '2023-01-24', 0, '2023-01-24 13:29:55'),
(1069, '114.119.159.37', 1, 14, '2023-01-24', 0, '2023-01-24 14:35:33'),
(1070, '114.119.156.31', 1, 0, '2023-01-24', 0, '2023-01-24 14:49:38'),
(1071, '114.119.145.249', 1, 23, '2023-01-24', 0, '2023-01-24 15:33:00'),
(1072, '114.119.152.71', 1, 0, '2023-01-24', 0, '2023-01-24 15:34:32'),
(1073, '185.27.99.116', 1, 0, '2023-01-24', 0, '2023-01-24 15:41:08'),
(1074, '208.76.48.5', 25, 0, '2023-03-15', 0, '2023-03-15 07:49:38'),
(1075, '46.101.9.216', 1, 0, '2023-01-24', 0, '2023-01-24 18:04:55'),
(1076, '46.101.9.216', 1, 14, '2023-01-24', 0, '2023-01-24 18:04:57'),
(1077, '46.101.9.216', 1, 1, '2023-01-24', 0, '2023-01-24 18:04:59'),
(1078, '46.101.9.216', 1, 5, '2023-01-24', 0, '2023-01-24 18:05:01'),
(1079, '46.101.9.216', 1, 20, '2023-01-24', 0, '2023-01-24 18:05:03'),
(1080, '46.101.9.216', 1, 19, '2023-01-24', 0, '2023-01-24 18:05:04'),
(1081, '46.101.9.216', 1, 18, '2023-01-24', 0, '2023-01-24 18:05:06'),
(1082, '89.187.185.185', 25, 0, '2023-01-24', 0, '2023-01-24 19:44:36'),
(1083, '89.187.185.185', 1, 17, '2023-01-24', 0, '2023-01-24 19:44:10'),
(1084, '89.187.185.185', 1, 12, '2023-01-24', 0, '2023-01-24 19:44:12'),
(1085, '89.187.185.185', 1, 14, '2023-01-24', 0, '2023-01-24 19:44:13'),
(1086, '89.187.185.185', 1, 11, '2023-01-24', 0, '2023-01-24 19:44:15'),
(1087, '89.187.185.185', 1, 7, '2023-01-24', 0, '2023-01-24 19:44:16'),
(1088, '89.187.185.185', 1, 8, '2023-01-24', 0, '2023-01-24 19:44:18'),
(1089, '89.187.185.185', 1, 5, '2023-01-24', 0, '2023-01-24 19:44:19'),
(1090, '89.187.185.185', 1, 1, '2023-01-24', 0, '2023-01-24 19:44:20'),
(1091, '89.187.185.185', 1, 10, '2023-01-24', 0, '2023-01-24 19:44:22'),
(1092, '89.187.185.185', 1, 13, '2023-01-24', 0, '2023-01-24 19:44:24'),
(1093, '89.187.185.185', 1, 15, '2023-01-24', 0, '2023-01-24 19:44:25'),
(1094, '89.187.185.185', 1, 16, '2023-01-24', 0, '2023-01-24 19:44:26'),
(1095, '89.187.185.185', 1, 18, '2023-01-24', 0, '2023-01-24 19:44:28'),
(1096, '89.187.185.185', 1, 19, '2023-01-24', 0, '2023-01-24 19:44:29'),
(1097, '89.187.185.185', 1, 20, '2023-01-24', 0, '2023-01-24 19:44:31'),
(1098, '89.187.185.185', 1, 21, '2023-01-24', 0, '2023-01-24 19:44:32'),
(1099, '89.187.185.185', 1, 9, '2023-01-24', 0, '2023-01-24 19:44:34'),
(1100, '66.249.65.77', 3, 0, '2023-01-31', 0, '2023-01-31 16:00:45'),
(1101, '104.237.128.214', 1, 0, '2023-01-24', 0, '2023-01-24 21:22:03'),
(1102, '66.249.65.74', 5, 0, '2023-02-09', 0, '2023-02-09 13:15:00'),
(1103, '114.119.156.250', 1, 0, '2023-01-24', 0, '2023-01-24 21:36:43'),
(1104, '114.119.151.74', 1, 0, '2023-01-24', 0, '2023-01-24 22:13:41'),
(1105, '114.119.130.125', 1, 19, '2023-01-24', 0, '2023-01-24 22:57:46'),
(1106, '114.119.151.233', 1, 5, '2023-01-24', 0, '2023-01-24 23:16:33'),
(1107, '209.141.41.193', 2, 0, '2023-02-03', 0, '2023-02-03 06:27:41'),
(1108, '34.219.148.36', 1, 0, '2023-01-25', 0, '2023-01-25 05:21:21'),
(1109, '35.91.76.7', 1, 0, '2023-01-25', 0, '2023-01-25 05:21:27'),
(1110, '35.91.198.92', 1, 0, '2023-01-25', 0, '2023-01-25 05:21:53'),
(1111, '54.244.201.55', 1, 0, '2023-01-25', 0, '2023-01-25 05:22:09'),
(1112, '34.210.93.252', 1, 0, '2023-01-25', 0, '2023-01-25 05:42:59'),
(1113, '114.119.146.7', 1, 1, '2023-01-25', 0, '2023-01-25 08:12:24'),
(1114, '103.127.7.74', 10, 0, '2023-01-25', 0, '2023-01-25 08:55:11'),
(1115, '114.119.152.8', 1, 20, '2023-01-25', 0, '2023-01-25 09:02:49'),
(1116, '114.119.148.242', 1, 0, '2023-01-25', 0, '2023-01-25 09:04:42'),
(1117, '198.235.24.42', 1, 0, '2023-01-25', 0, '2023-01-25 11:32:22'),
(1118, '128.199.254.91', 3, 0, '2023-01-25', 0, '2023-01-25 12:09:21'),
(1119, '198.235.24.38', 1, 0, '2023-01-25', 0, '2023-01-25 12:41:01'),
(1120, '205.210.31.186', 1, 0, '2023-01-25', 0, '2023-01-25 15:42:40'),
(1121, '210.4.76.2', 1, 18, '2023-01-25', 0, '2023-01-25 21:14:53'),
(1122, '23.128.248.205', 1, 0, '2023-01-25', 0, '2023-01-25 22:22:25'),
(1123, '207.46.13.82', 1, 0, '2023-01-25', 0, '2023-01-25 23:20:01'),
(1124, '114.119.157.84', 1, 28, '2023-01-25', 0, '2023-01-26 01:51:56'),
(1125, '114.119.152.143', 1, 5, '2023-01-25', 0, '2023-01-26 03:13:22'),
(1126, '114.119.149.89', 1, 3, '2023-01-25', 0, '2023-01-26 03:34:21'),
(1127, '34.217.77.244', 1, 0, '2023-01-26', 0, '2023-01-26 05:11:31'),
(1128, '5.161.91.182', 1, 0, '2023-01-26', 0, '2023-01-26 07:56:23'),
(1129, '185.191.171.45', 1, 16, '2023-01-26', 0, '2023-01-26 09:41:43'),
(1130, '185.191.171.24', 1, 15, '2023-01-26', 0, '2023-01-26 12:50:17'),
(1131, '114.119.138.65', 2, 0, '2023-02-13', 0, '2023-02-13 14:41:36'),
(1132, '87.236.176.156', 1, 0, '2023-01-26', 0, '2023-01-26 15:05:56'),
(1133, '51.222.253.2', 1, 5, '2023-01-26', 0, '2023-01-26 15:50:20'),
(1134, '185.191.171.5', 2, 0, '2023-02-06', 0, '2023-02-06 22:19:52'),
(1135, '66.249.66.83', 1, 0, '2023-01-26', 0, '2023-01-26 16:22:03'),
(1136, '185.191.171.35', 1, 17, '2023-01-26', 0, '2023-01-26 17:17:10'),
(1137, '185.191.171.26', 1, 8, '2023-01-26', 0, '2023-01-26 17:28:22'),
(1138, '185.191.171.8', 1, 11, '2023-01-26', 0, '2023-01-26 17:45:28'),
(1139, '114.119.158.172', 1, 0, '2023-01-26', 0, '2023-01-26 17:46:10'),
(1140, '114.119.133.158', 1, 17, '2023-01-26', 0, '2023-01-26 17:47:33'),
(1141, '51.222.253.2', 1, 7, '2023-01-26', 0, '2023-01-26 19:00:09'),
(1142, '66.249.70.179', 1, 0, '2023-01-26', 0, '2023-01-26 20:02:06'),
(1143, '66.249.70.181', 1, 0, '2023-01-26', 0, '2023-01-26 20:05:37'),
(1144, '185.191.171.40', 1, 1, '2023-01-26', 0, '2023-01-26 20:25:28'),
(1145, '51.222.253.11', 1, 1, '2023-01-26', 0, '2023-01-26 21:32:51'),
(1146, '114.119.147.15', 1, 10, '2023-01-26', 0, '2023-01-26 21:56:36'),
(1147, '103.141.174.116', 1, 0, '2023-01-26', 0, '2023-01-26 22:34:02'),
(1148, '114.119.134.107', 1, 2, '2023-01-26', 0, '2023-01-26 23:18:20'),
(1149, '114.119.132.36', 1, 19, '2023-01-26', 0, '2023-01-26 23:19:40'),
(1150, '114.119.135.202', 1, 16, '2023-01-26', 0, '2023-01-26 23:42:04'),
(1151, '40.77.167.43', 1, 13, '2023-01-26', 0, '2023-01-27 00:07:37'),
(1152, '72.14.199.247', 10, 0, '2023-03-13', 0, '2023-03-13 09:13:41'),
(1153, '23.226.31.102', 6, 0, '2023-01-26', 0, '2023-01-27 00:38:37'),
(1154, '72.14.199.249', 16, 0, '2023-03-14', 0, '2023-03-14 11:59:19'),
(1155, '185.191.171.19', 1, 21, '2023-01-26', 0, '2023-01-27 01:26:03'),
(1156, '103.202.53.55', 3, 0, '2023-01-26', 0, '2023-01-27 02:05:51'),
(1157, '185.191.171.26', 1, 10, '2023-01-26', 0, '2023-01-27 03:45:10'),
(1158, '223.247.179.42', 1, 0, '2023-01-26', 0, '2023-01-27 04:46:53'),
(1159, '35.89.151.36', 1, 0, '2023-01-27', 0, '2023-01-27 05:19:08'),
(1160, '114.119.152.246', 1, 0, '2023-01-27', 0, '2023-01-27 05:21:24'),
(1161, '35.160.203.38', 1, 0, '2023-01-27', 0, '2023-01-27 05:25:16'),
(1162, '34.215.197.94', 1, 0, '2023-01-27', 0, '2023-01-27 05:36:09'),
(1163, '185.191.171.44', 2, 8, '2023-03-15', 0, '2023-03-15 05:49:10'),
(1164, '87.236.176.143', 1, 0, '2023-01-27', 0, '2023-01-27 06:07:39'),
(1165, '185.191.171.13', 2, 7, '2023-02-25', 0, '2023-02-26 02:34:37'),
(1166, '66.249.79.252', 7, 0, '2023-03-14', 0, '2023-03-14 13:11:30'),
(1167, '66.249.79.248', 12, 0, '2023-03-12', 0, '2023-03-12 12:12:16'),
(1168, '185.191.171.38', 2, 0, '2023-02-17', 0, '2023-02-18 01:50:53'),
(1169, '178.23.190.16', 1, 0, '2023-01-27', 0, '2023-01-27 10:37:12'),
(1170, '205.210.31.57', 1, 0, '2023-01-27', 0, '2023-01-27 11:41:56'),
(1171, '185.191.171.37', 1, 9, '2023-01-27', 0, '2023-01-27 12:17:32'),
(1172, '185.191.171.43', 1, 12, '2023-01-27', 0, '2023-01-27 13:37:04'),
(1173, '185.191.171.38', 1, 14, '2023-01-27', 0, '2023-01-27 15:22:01'),
(1174, '185.191.171.45', 1, 19, '2023-01-27', 0, '2023-01-27 15:43:54'),
(1175, '114.119.133.108', 1, 1, '2023-01-27', 0, '2023-01-27 16:56:01'),
(1176, '114.119.144.37', 1, 17, '2023-01-27', 0, '2023-01-27 16:57:10'),
(1177, '185.191.171.35', 1, 10, '2023-01-27', 0, '2023-01-27 17:08:17'),
(1178, '185.191.171.3', 1, 5, '2023-01-27', 0, '2023-01-27 18:35:58'),
(1179, '148.153.98.52', 1, 0, '2023-01-27', 0, '2023-01-27 18:58:47'),
(1180, '110.40.227.238', 1, 0, '2023-01-27', 0, '2023-01-27 20:09:21'),
(1181, '66.94.107.177', 1, 0, '2023-01-27', 0, '2023-01-27 20:54:03'),
(1182, '185.191.171.36', 1, 9, '2023-01-27', 0, '2023-01-27 22:21:47'),
(1183, '185.191.171.4', 1, 20, '2023-01-27', 0, '2023-01-27 22:33:39'),
(1184, '121.122.63.203', 6, 0, '2023-01-27', 0, '2023-01-28 02:15:55'),
(1185, '121.122.63.203', 1, 9, '2023-01-27', 0, '2023-01-27 22:39:15'),
(1186, '121.122.63.203', 1, 21, '2023-01-27', 0, '2023-01-27 23:10:13'),
(1187, '152.32.133.192', 2, 0, '2023-01-27', 0, '2023-01-27 23:18:47'),
(1188, '34.75.217.191', 1, 0, '2023-01-27', 0, '2023-01-27 23:19:42'),
(1189, '198.235.24.57', 2, 0, '2023-02-04', 0, '2023-02-05 00:05:46'),
(1190, '66.249.90.94', 1, 0, '2023-01-27', 0, '2023-01-27 23:54:49'),
(1191, '114.119.137.193', 1, 22, '2023-01-27', 0, '2023-01-28 00:58:35'),
(1192, '83.166.240.76', 2, 0, '2023-01-27', 0, '2023-01-28 00:59:10'),
(1193, '114.119.128.233', 1, 0, '2023-01-27', 0, '2023-01-28 00:59:56'),
(1194, '114.119.129.24', 1, 26, '2023-01-27', 0, '2023-01-28 01:41:04'),
(1195, '114.119.144.165', 1, 0, '2023-01-27', 0, '2023-01-28 01:42:26'),
(1196, '185.191.171.40', 1, 13, '2023-01-27', 0, '2023-01-28 02:27:51'),
(1197, '198.23.147.194', 1, 0, '2023-01-27', 0, '2023-01-28 02:35:43'),
(1198, '205.210.31.148', 1, 0, '2023-01-27', 0, '2023-01-28 03:21:33'),
(1199, '35.89.187.66', 1, 0, '2023-01-28', 0, '2023-01-28 05:11:44'),
(1200, '198.235.24.170', 1, 0, '2023-01-28', 0, '2023-01-28 05:23:58'),
(1201, '103.120.200.240', 2, 0, '2023-01-28', 0, '2023-01-28 05:31:45'),
(1202, '103.120.200.240', 1, 21, '2023-01-28', 0, '2023-01-28 05:30:49'),
(1203, '103.120.200.240', 1, 20, '2023-01-28', 0, '2023-01-28 05:31:00'),
(1204, '205.210.31.40', 2, 0, '2023-02-20', 0, '2023-02-20 05:20:45'),
(1205, '114.119.145.121', 1, 0, '2023-01-28', 0, '2023-01-28 09:40:07'),
(1206, '114.119.145.174', 1, 0, '2023-01-28', 0, '2023-01-28 10:08:47'),
(1207, '199.244.88.230', 1, 0, '2023-01-28', 0, '2023-01-28 13:06:01'),
(1208, '185.191.171.19', 1, 18, '2023-01-28', 0, '2023-01-28 13:25:57'),
(1209, '54.183.253.161', 1, 0, '2023-01-28', 0, '2023-01-28 13:34:37'),
(1210, '66.249.88.164', 35, 0, '2023-03-12', 0, '2023-03-13 00:05:45'),
(1211, '66.249.88.172', 40, 0, '2023-03-15', 0, '2023-03-15 04:42:09'),
(1212, '66.249.83.43', 4, 0, '2023-02-25', 0, '2023-02-26 04:15:26'),
(1213, '66.249.83.75', 50, 0, '2023-03-13', 0, '2023-03-13 19:35:17'),
(1214, '66.249.83.76', 65, 0, '2023-03-15', 0, '2023-03-15 04:51:57'),
(1215, '66.249.83.107', 9, 0, '2023-03-15', 0, '2023-03-15 04:41:52'),
(1216, '66.249.83.77', 59, 0, '2023-03-12', 0, '2023-03-13 02:13:48'),
(1217, '205.210.31.178', 1, 0, '2023-01-28', 0, '2023-01-28 16:22:27'),
(1218, '198.235.24.6', 1, 0, '2023-01-28', 0, '2023-01-28 17:43:36'),
(1219, '40.77.167.62', 1, 0, '2023-01-28', 0, '2023-01-28 19:28:00'),
(1220, '114.119.149.203', 1, 27, '2023-01-28', 0, '2023-01-28 20:44:56'),
(1221, '114.119.151.184', 1, 0, '2023-01-28', 0, '2023-01-28 20:46:14'),
(1222, '114.119.150.4', 1, 0, '2023-01-28', 0, '2023-01-28 21:07:44'),
(1223, '114.119.134.156', 1, 4, '2023-01-28', 0, '2023-01-28 21:26:59'),
(1224, '114.119.149.140', 1, 0, '2023-01-28', 0, '2023-01-28 21:40:49'),
(1225, '205.210.31.183', 1, 0, '2023-01-28', 0, '2023-01-28 22:34:22'),
(1226, '220.151.9.22', 1, 0, '2023-01-28', 0, '2023-01-29 01:20:45'),
(1227, '114.119.152.204', 1, 0, '2023-01-28', 0, '2023-01-29 04:53:40'),
(1228, '114.119.155.54', 2, 0, '2023-02-24', 0, '2023-02-24 11:15:34'),
(1229, '114.119.135.172', 1, 11, '2023-01-29', 0, '2023-01-29 05:31:59'),
(1230, '52.42.51.127', 2, 0, '2023-01-29', 0, '2023-01-29 05:46:12'),
(1231, '114.119.145.236', 2, 0, '2023-02-01', 0, '2023-02-02 02:37:39'),
(1232, '114.119.137.124', 1, 1, '2023-01-29', 0, '2023-01-29 06:47:44'),
(1233, '114.119.134.156', 1, 22, '2023-01-29', 0, '2023-01-29 08:41:41'),
(1234, '207.46.13.11', 2, 0, '2023-01-29', 0, '2023-01-29 17:39:54'),
(1235, '45.143.201.87', 1, 0, '2023-01-29', 0, '2023-01-29 12:11:18'),
(1236, '51.222.253.8', 1, 1, '2023-01-29', 0, '2023-01-29 13:10:53'),
(1237, '198.235.24.158', 1, 0, '2023-01-29', 0, '2023-01-29 13:24:00'),
(1238, '108.174.5.113', 1, 0, '2023-01-29', 0, '2023-01-29 13:41:55'),
(1239, '114.119.132.122', 1, 18, '2023-01-29', 0, '2023-01-29 14:52:25'),
(1240, '114.119.141.118', 1, 12, '2023-01-29', 0, '2023-01-29 14:53:41'),
(1241, '51.222.253.11', 1, 5, '2023-01-29', 0, '2023-01-29 15:19:17'),
(1242, '114.119.140.166', 1, 21, '2023-01-29', 0, '2023-01-29 15:23:44'),
(1243, '114.119.159.155', 2, 0, '2023-02-14', 0, '2023-02-15 04:01:09'),
(1244, '51.222.253.1', 1, 4, '2023-01-29', 0, '2023-01-29 16:16:22'),
(1245, '51.222.253.10', 1, 2, '2023-01-29', 0, '2023-01-29 17:00:20'),
(1246, '51.222.253.9', 1, 6, '2023-01-29', 0, '2023-01-29 17:53:17'),
(1247, '51.222.253.20', 1, 3, '2023-01-29', 0, '2023-01-29 19:18:55'),
(1248, '59.153.103.30', 10, 0, '2023-02-01', 0, '2023-02-01 22:36:07'),
(1249, '59.153.103.30', 1, 19, '2023-01-29', 0, '2023-01-29 20:06:10'),
(1250, '51.222.253.18', 1, 8, '2023-01-29', 0, '2023-01-29 20:37:57'),
(1251, '51.222.253.20', 1, 9, '2023-01-29', 0, '2023-01-29 21:34:46'),
(1252, '51.222.253.9', 1, 10, '2023-01-29', 0, '2023-01-29 22:36:54'),
(1253, '51.222.253.9', 1, 22, '2023-01-29', 0, '2023-01-29 23:41:02'),
(1254, '49.15.228.45', 1, 0, '2023-01-29', 0, '2023-01-29 23:45:54'),
(1255, '114.119.136.224', 1, 31, '2023-01-29', 0, '2023-01-30 00:22:45'),
(1256, '114.119.158.125', 1, 0, '2023-01-29', 0, '2023-01-30 00:23:51'),
(1257, '114.119.132.43', 1, 5, '2023-01-29', 0, '2023-01-30 00:25:53'),
(1258, '114.119.144.30', 1, 24, '2023-01-29', 0, '2023-01-30 00:43:32'),
(1259, '185.191.171.17', 1, 15, '2023-01-29', 0, '2023-01-30 01:35:44'),
(1260, '185.191.171.26', 1, 22, '2023-01-29', 0, '2023-01-30 01:39:20'),
(1261, '66.249.70.61', 1, 0, '2023-01-29', 0, '2023-01-30 01:59:44'),
(1262, '202.86.220.50', 1, 0, '2023-01-29', 0, '2023-01-30 03:13:20'),
(1263, '103.71.102.13', 5, 0, '2023-02-03', 0, '2023-02-04 01:36:26'),
(1264, '103.71.102.13', 1, 14, '2023-01-29', 0, '2023-01-30 04:12:04'),
(1265, '185.181.60.189', 2, 0, '2023-02-08', 0, '2023-02-08 19:36:03'),
(1266, '51.158.183.213', 1, 0, '2023-01-30', 0, '2023-01-30 07:11:58'),
(1267, '51.222.253.17', 1, 12, '2023-01-30', 0, '2023-01-30 08:00:22'),
(1268, '185.191.171.40', 1, 12, '2023-01-30', 0, '2023-01-30 08:14:25'),
(1269, '66.249.69.252', 2, 0, '2023-03-07', 0, '2023-03-07 10:25:40'),
(1270, '114.119.130.30', 1, 7, '2023-01-30', 0, '2023-01-30 09:13:53'),
(1271, '114.119.155.228', 1, 1, '2023-01-30', 0, '2023-01-30 09:14:54'),
(1272, '114.119.159.8', 1, 21, '2023-01-30', 0, '2023-01-30 10:17:54'),
(1273, '51.222.253.3', 1, 13, '2023-01-30', 0, '2023-01-30 10:19:13'),
(1274, '74.125.151.60', 1, 0, '2023-01-30', 0, '2023-01-30 12:29:11'),
(1275, '159.203.188.118', 1, 0, '2023-01-30', 0, '2023-01-30 12:51:24'),
(1276, '114.119.138.32', 1, 0, '2023-01-30', 0, '2023-01-30 16:35:05'),
(1277, '114.119.159.8', 1, 0, '2023-01-30', 0, '2023-01-30 17:57:13'),
(1278, '114.119.159.8', 1, 13, '2023-01-30', 0, '2023-01-30 18:40:35'),
(1279, '114.119.158.253', 1, 10, '2023-01-30', 0, '2023-01-30 18:42:00'),
(1280, '114.119.136.208', 1, 0, '2023-01-30', 0, '2023-01-30 18:44:38'),
(1281, '114.119.159.40', 1, 23, '2023-01-30', 0, '2023-01-30 19:38:17'),
(1282, '212.47.251.118', 1, 0, '2023-01-30', 0, '2023-01-30 20:06:03'),
(1283, '123.253.198.137', 8, 0, '2023-01-30', 0, '2023-01-30 20:15:26'),
(1284, '123.253.198.137', 1, 19, '2023-01-30', 0, '2023-01-30 20:15:18'),
(1285, '144.48.81.55', 1, 0, '2023-01-30', 0, '2023-01-30 20:38:54'),
(1286, '66.249.83.202', 3, 0, '2023-02-08', 0, '2023-02-09 01:39:36'),
(1287, '66.249.83.41', 8, 0, '2023-03-01', 0, '2023-03-01 23:23:59'),
(1288, '114.119.147.91', 1, 14, '2023-01-30', 0, '2023-01-31 00:13:26'),
(1289, '66.249.83.42', 5, 0, '2023-03-03', 0, '2023-03-04 03:59:34'),
(1290, '185.191.171.34', 2, 11, '2023-03-14', 0, '2023-03-14 08:14:20'),
(1291, '202.86.223.160', 4, 0, '2023-01-30', 0, '2023-01-31 02:20:04'),
(1292, '202.86.223.160', 1, 20, '2023-01-30', 0, '2023-01-31 02:19:32'),
(1293, '40.77.167.22', 1, 5, '2023-01-30', 0, '2023-01-31 03:28:16'),
(1294, '185.191.171.8', 1, 13, '2023-01-30', 0, '2023-01-31 03:57:17'),
(1295, '114.119.159.62', 1, 20, '2023-01-30', 0, '2023-01-31 04:29:15'),
(1296, '138.199.7.139', 2, 0, '2023-02-01', 0, '2023-02-01 14:47:24'),
(1297, '193.43.135.243', 1, 0, '2023-01-30', 0, '2023-01-31 04:42:43'),
(1298, '185.191.171.17', 1, 16, '2023-01-31', 0, '2023-01-31 06:49:15'),
(1299, '185.191.171.26', 1, 14, '2023-01-31', 0, '2023-01-31 08:09:55'),
(1300, '66.249.90.109', 1, 0, '2023-01-31', 0, '2023-01-31 10:14:34'),
(1301, '114.119.160.75', 1, 3, '2023-01-31', 0, '2023-01-31 11:14:12'),
(1302, '114.119.157.139', 1, 8, '2023-01-31', 0, '2023-01-31 11:15:37'),
(1303, '114.119.153.67', 1, 2, '2023-01-31', 0, '2023-01-31 12:42:10'),
(1304, '114.119.136.139', 1, 6, '2023-01-31', 0, '2023-01-31 14:56:33'),
(1305, '114.119.155.36', 1, 4, '2023-01-31', 0, '2023-01-31 14:57:49'),
(1306, '154.92.114.182', 4, 0, '2023-01-31', 0, '2023-01-31 15:00:59'),
(1307, '138.128.153.210', 1, 0, '2023-01-31', 0, '2023-01-31 15:01:07'),
(1308, '64.43.91.136', 1, 0, '2023-01-31', 0, '2023-01-31 15:01:11'),
(1309, '144.48.81.111', 4, 0, '2023-02-16', 0, '2023-02-16 15:16:35'),
(1310, '65.154.226.171', 1, 0, '2023-01-31', 0, '2023-01-31 21:02:35'),
(1311, '114.119.150.196', 1, 0, '2023-01-31', 0, '2023-01-31 21:09:36'),
(1312, '65.154.226.168', 1, 0, '2023-01-31', 0, '2023-01-31 21:09:58'),
(1313, '114.119.145.93', 1, 28, '2023-01-31', 0, '2023-01-31 22:03:17'),
(1314, '114.119.146.4', 1, 0, '2023-01-31', 0, '2023-01-31 23:43:09'),
(1315, '114.119.134.182', 2, 0, '2023-02-06', 0, '2023-02-06 22:49:39'),
(1316, '114.119.135.78', 1, 2, '2023-01-31', 0, '2023-02-01 02:18:05'),
(1317, '114.119.141.34', 1, 17, '2023-01-31', 0, '2023-02-01 02:19:33'),
(1318, '66.249.70.65', 1, 0, '2023-01-31', 0, '2023-02-01 03:49:41'),
(1319, '20.254.70.207', 3, 0, '2023-02-01', 0, '2023-02-01 05:44:53'),
(1320, '54.202.231.133', 1, 0, '2023-02-01', 0, '2023-02-01 05:32:14'),
(1321, '54.191.209.108', 1, 0, '2023-02-01', 0, '2023-02-01 05:32:14'),
(1322, '35.88.22.197', 1, 0, '2023-02-01', 0, '2023-02-01 05:32:41'),
(1323, '34.219.57.46', 1, 0, '2023-02-01', 0, '2023-02-01 05:35:17'),
(1324, '124.223.193.173', 1, 0, '2023-02-01', 0, '2023-02-01 06:27:14'),
(1325, '114.119.147.91', 1, 9, '2023-02-01', 0, '2023-02-01 08:15:41'),
(1326, '114.119.157.132', 1, 1, '2023-02-01', 0, '2023-02-01 09:10:52'),
(1327, '114.119.165.136', 1, 19, '2023-02-01', 0, '2023-02-01 09:12:41'),
(1328, '51.222.253.16', 1, 1, '2023-02-01', 0, '2023-02-01 09:22:09'),
(1329, '114.119.135.209', 1, 16, '2023-02-01', 0, '2023-02-01 09:39:45'),
(1330, '114.119.133.134', 1, 5, '2023-02-01', 0, '2023-02-01 09:40:24'),
(1331, '114.119.136.15', 1, 3, '2023-02-01', 0, '2023-02-01 09:41:24'),
(1332, '17.241.227.33', 1, 0, '2023-02-01', 0, '2023-02-01 16:41:33'),
(1333, '40.77.167.175', 23, 0, '2023-02-13', 0, '2023-02-13 20:22:47'),
(1334, '52.167.144.29', 10, 2, '2023-02-07', 0, '2023-02-07 16:41:10'),
(1335, '40.77.167.185', 3, 3, '2023-02-03', 0, '2023-02-03 16:11:42'),
(1336, '40.77.167.190', 3, 5, '2023-02-03', 0, '2023-02-04 04:25:53'),
(1337, '207.46.13.11', 1, 6, '2023-02-01', 0, '2023-02-01 17:57:48'),
(1338, '114.119.157.26', 1, 0, '2023-02-01', 0, '2023-02-01 18:58:17'),
(1339, '114.119.154.203', 1, 1, '2023-02-01', 0, '2023-02-01 18:59:36'),
(1340, '114.119.135.206', 1, 17, '2023-02-01', 0, '2023-02-01 19:00:54'),
(1341, '114.119.128.35', 1, 16, '2023-02-01', 0, '2023-02-01 19:02:09'),
(1342, '93.158.91.206', 1, 0, '2023-02-01', 0, '2023-02-01 20:06:07'),
(1343, '118.179.22.106', 4, 0, '2023-02-01', 0, '2023-02-01 20:25:27'),
(1344, '103.196.232.134', 1, 0, '2023-02-01', 0, '2023-02-01 20:19:57'),
(1345, '205.210.31.184', 1, 0, '2023-02-01', 0, '2023-02-01 23:35:27'),
(1346, '185.191.171.39', 2, 17, '2023-03-08', 0, '2023-03-08 22:12:54'),
(1347, '66.249.66.77', 1, 0, '2023-02-01', 0, '2023-02-02 02:16:56'),
(1348, '114.119.141.135', 2, 0, '2023-02-22', 0, '2023-02-22 10:35:09'),
(1349, '114.119.148.255', 1, 10, '2023-02-01', 0, '2023-02-02 04:16:49'),
(1350, '34.216.251.80', 1, 0, '2023-02-02', 0, '2023-02-02 05:28:02'),
(1351, '18.237.176.118', 1, 0, '2023-02-02', 0, '2023-02-02 05:33:33'),
(1352, '185.191.171.21', 1, 19, '2023-02-02', 0, '2023-02-02 06:07:51'),
(1353, '66.249.92.140', 1, 0, '2023-02-02', 0, '2023-02-02 06:47:28'),
(1354, '66.249.92.76', 1, 0, '2023-02-02', 0, '2023-02-02 07:07:52'),
(1355, '66.249.66.143', 1, 0, '2023-02-02', 0, '2023-02-02 08:10:45'),
(1356, '66.249.92.198', 1, 0, '2023-02-02', 0, '2023-02-02 08:12:32'),
(1357, '66.249.92.78', 1, 0, '2023-02-02', 0, '2023-02-02 09:27:05'),
(1358, '51.222.253.6', 1, 14, '2023-02-02', 0, '2023-02-02 12:04:25'),
(1359, '114.119.128.37', 1, 19, '2023-02-02', 0, '2023-02-02 12:25:48'),
(1360, '51.222.253.6', 1, 15, '2023-02-02', 0, '2023-02-02 12:37:47'),
(1361, '51.222.253.19', 2, 5, '2023-03-11', 0, '2023-03-11 16:31:33'),
(1362, '114.119.128.34', 1, 2, '2023-02-02', 0, '2023-02-02 13:24:47'),
(1363, '51.222.253.18', 1, 4, '2023-02-02', 0, '2023-02-02 13:40:37'),
(1364, '182.70.108.112', 1, 0, '2023-02-02', 0, '2023-02-02 13:59:30'),
(1365, '51.222.253.18', 1, 3, '2023-02-02', 0, '2023-02-02 14:02:59'),
(1366, '51.222.253.13', 1, 1, '2023-02-02', 0, '2023-02-02 14:27:44'),
(1367, '51.222.253.5', 1, 2, '2023-02-02', 0, '2023-02-02 14:54:18'),
(1368, '51.222.253.3', 3, 6, '2023-03-11', 0, '2023-03-11 23:14:34'),
(1369, '103.126.150.10', 10, 0, '2023-02-02', 0, '2023-02-02 18:24:37'),
(1370, '149.56.150.114', 11, 0, '2023-02-02', 0, '2023-02-02 16:48:20'),
(1371, '149.56.150.119', 1, 0, '2023-02-02', 0, '2023-02-02 16:48:39'),
(1372, '51.222.253.13', 1, 16, '2023-02-02', 0, '2023-02-02 16:53:07'),
(1373, '185.191.171.8', 1, 20, '2023-02-02', 0, '2023-02-02 17:23:57'),
(1374, '51.158.118.231', 1, 0, '2023-02-02', 0, '2023-02-02 18:46:33'),
(1375, '103.160.8.54', 1, 2, '2023-02-02', 0, '2023-02-02 22:29:13'),
(1376, '66.249.66.41', 1, 0, '2023-02-02', 0, '2023-02-03 00:36:41'),
(1377, '114.119.146.126', 1, 6, '2023-02-02', 0, '2023-02-03 00:47:59'),
(1378, '23.227.72.246', 6, 0, '2023-02-02', 0, '2023-02-03 02:25:37'),
(1379, '199.16.157.181', 1, 0, '2023-02-02', 0, '2023-02-03 04:52:55'),
(1380, '3.249.14.61', 1, 0, '2023-02-03', 0, '2023-02-03 05:29:50'),
(1381, '18.246.27.146', 1, 0, '2023-02-03', 0, '2023-02-03 05:40:22'),
(1382, '54.189.131.29', 1, 0, '2023-02-03', 0, '2023-02-03 05:40:50'),
(1383, '35.162.205.52', 2, 0, '2023-02-03', 0, '2023-02-03 06:00:01'),
(1384, '35.92.252.165', 1, 0, '2023-02-03', 0, '2023-02-03 05:45:40'),
(1385, '54.212.232.227', 1, 0, '2023-02-03', 0, '2023-02-03 05:52:19'),
(1386, '54.244.213.239', 1, 0, '2023-02-03', 0, '2023-02-03 05:55:01'),
(1387, '54.190.72.219', 1, 0, '2023-02-03', 0, '2023-02-03 06:00:17'),
(1388, '54.202.101.63', 1, 0, '2023-02-03', 0, '2023-02-03 06:03:27'),
(1389, '54.186.122.51', 1, 0, '2023-02-03', 0, '2023-02-03 06:09:25'),
(1390, '114.119.157.190', 1, 20, '2023-02-03', 0, '2023-02-03 06:17:56'),
(1391, '209.141.34.187', 1, 0, '2023-02-03', 0, '2023-02-03 06:27:42'),
(1392, '66.249.70.69', 1, 0, '2023-02-03', 0, '2023-02-03 07:26:58'),
(1393, '114.119.155.50', 1, 26, '2023-02-03', 0, '2023-02-03 08:38:12'),
(1394, '194.26.192.114', 1, 0, '2023-02-03', 0, '2023-02-03 09:18:03'),
(1395, '185.191.171.11', 1, 23, '2023-02-03', 0, '2023-02-03 10:02:37'),
(1396, '114.119.148.154', 1, 5, '2023-02-03', 0, '2023-02-03 10:04:09'),
(1397, '185.191.171.45', 1, 18, '2023-02-03', 0, '2023-02-03 15:49:01'),
(1398, '114.119.132.7', 2, 0, '2023-02-27', 0, '2023-02-27 10:01:45'),
(1399, '114.119.157.146', 1, 4, '2023-02-03', 0, '2023-02-03 17:05:09'),
(1400, '114.119.134.89', 1, 6, '2023-02-03', 0, '2023-02-03 17:08:09'),
(1401, '114.119.134.203', 1, 4, '2023-02-03', 0, '2023-02-03 19:49:26'),
(1402, '114.119.146.126', 1, 0, '2023-02-03', 0, '2023-02-03 19:53:44'),
(1403, '114.119.159.76', 1, 0, '2023-02-03', 0, '2023-02-03 19:53:57'),
(1404, '17.241.227.13', 1, 0, '2023-02-03', 0, '2023-02-03 20:17:32'),
(1405, '209.126.77.67', 1, 0, '2023-02-03', 0, '2023-02-03 20:18:34'),
(1406, '157.55.39.8', 1, 6, '2023-02-03', 0, '2023-02-03 20:31:26'),
(1407, '17.241.227.116', 1, 0, '2023-02-03', 0, '2023-02-03 20:50:07'),
(1408, '50.21.188.19', 3, 0, '2023-02-03', 0, '2023-02-03 21:37:12'),
(1409, '50.21.188.29', 2, 0, '2023-02-03', 0, '2023-02-03 21:37:12'),
(1410, '50.21.188.39', 2, 0, '2023-02-03', 0, '2023-02-03 21:37:19'),
(1411, '50.21.188.49', 2, 0, '2023-02-03', 0, '2023-02-03 21:37:22'),
(1412, '50.21.188.9', 1, 0, '2023-02-03', 0, '2023-02-03 21:37:22'),
(1413, '114.119.142.112', 1, 0, '2023-02-03', 0, '2023-02-03 23:59:02'),
(1414, '114.119.162.58', 1, 11, '2023-02-03', 0, '2023-02-04 01:13:49'),
(1415, '114.119.141.228', 1, 0, '2023-02-03', 0, '2023-02-04 01:26:17'),
(1416, '103.71.102.13', 1, 6, '2023-02-03', 0, '2023-02-04 01:31:46'),
(1417, '114.119.130.111', 1, 13, '2023-02-03', 0, '2023-02-04 03:04:18'),
(1418, '103.136.201.110', 1, 0, '2023-02-03', 0, '2023-02-04 03:04:33'),
(1419, '173.252.95.120', 1, 0, '2023-02-03', 0, '2023-02-04 03:27:09'),
(1420, '114.119.136.176', 1, 22, '2023-02-03', 0, '2023-02-04 03:44:56'),
(1421, '35.90.97.61', 1, 0, '2023-02-04', 0, '2023-02-04 05:14:20'),
(1422, '114.119.147.113', 1, 0, '2023-02-04', 0, '2023-02-04 07:04:02'),
(1423, '13.57.40.215', 1, 0, '2023-02-04', 0, '2023-02-04 09:00:40'),
(1424, '114.119.138.250', 1, 24, '2023-02-04', 0, '2023-02-04 11:18:44'),
(1425, '205.210.31.42', 1, 0, '2023-02-04', 0, '2023-02-04 11:28:38'),
(1426, '114.119.167.129', 1, 1, '2023-02-04', 0, '2023-02-04 12:16:36'),
(1427, '114.119.143.133', 1, 22, '2023-02-04', 0, '2023-02-04 13:11:58'),
(1428, '193.235.141.162', 1, 0, '2023-02-04', 0, '2023-02-04 13:13:41'),
(1429, '40.77.167.190', 2, 0, '2023-02-10', 0, '2023-02-10 23:27:35'),
(1430, '114.119.145.86', 1, 27, '2023-02-04', 0, '2023-02-04 20:02:52'),
(1431, '114.119.136.224', 1, 21, '2023-02-04', 0, '2023-02-04 20:04:47'),
(1432, '114.119.129.24', 1, 0, '2023-02-04', 0, '2023-02-04 20:23:31'),
(1433, '114.119.143.68', 1, 5, '2023-02-04', 0, '2023-02-04 20:33:44'),
(1434, '114.119.153.49', 1, 13, '2023-02-04', 0, '2023-02-04 20:34:45'),
(1435, '114.119.155.153', 1, 17, '2023-02-04', 0, '2023-02-04 20:36:50'),
(1436, '114.119.135.212', 1, 18, '2023-02-04', 0, '2023-02-04 21:15:18'),
(1437, '114.119.155.232', 1, 0, '2023-02-04', 0, '2023-02-04 21:16:26'),
(1438, '114.119.132.237', 1, 1, '2023-02-04', 0, '2023-02-04 21:25:09'),
(1439, '17.241.227.240', 2, 0, '2023-03-07', 0, '2023-03-08 03:26:27'),
(1440, '54.37.204.35', 3, 0, '2023-02-04', 0, '2023-02-05 01:18:36'),
(1441, '198.235.24.31', 1, 0, '2023-02-04', 0, '2023-02-05 03:17:36'),
(1442, '114.119.162.58', 1, 0, '2023-02-04', 0, '2023-02-05 03:23:52'),
(1443, '17.241.219.87', 2, 0, '2023-02-06', 0, '2023-02-06 06:30:43');
INSERT INTO `web_visitors` (`id`, `ip_address`, `count`, `item_id`, `visited_date`, `user_id`, `entry_at`) VALUES
(1444, '17.241.75.47', 1, 0, '2023-02-04', 0, '2023-02-05 04:54:53'),
(1445, '35.89.205.76', 1, 0, '2023-02-05', 0, '2023-02-05 05:16:05'),
(1446, '114.119.165.226', 1, 0, '2023-02-05', 0, '2023-02-05 06:03:47'),
(1447, '114.119.139.167', 1, 0, '2023-02-05', 0, '2023-02-05 06:04:59'),
(1448, '17.241.219.218', 1, 16, '2023-02-05', 0, '2023-02-05 10:48:33'),
(1449, '114.119.146.38', 1, 1, '2023-02-05', 0, '2023-02-05 12:49:46'),
(1450, '37.111.228.212', 2, 0, '2023-02-05', 0, '2023-02-05 16:29:12'),
(1451, '114.119.151.174', 1, 15, '2023-02-05', 0, '2023-02-05 18:19:47'),
(1452, '114.119.137.238', 1, 0, '2023-02-05', 0, '2023-02-05 18:31:16'),
(1453, '114.119.143.158', 1, 0, '2023-02-05', 0, '2023-02-05 18:33:23'),
(1454, '103.143.139.51', 7, 0, '2023-02-08', 0, '2023-02-08 18:53:55'),
(1455, '185.191.171.13', 1, 5, '2023-02-05', 0, '2023-02-05 20:30:35'),
(1456, '37.111.207.63', 1, 0, '2023-02-05', 0, '2023-02-05 20:52:13'),
(1457, '64.233.173.249', 3, 0, '2023-02-10', 0, '2023-02-11 02:00:12'),
(1458, '64.233.173.251', 2, 0, '2023-03-14', 0, '2023-03-14 17:33:59'),
(1459, '64.233.173.247', 2, 0, '2023-03-14', 0, '2023-03-14 17:34:00'),
(1460, '185.191.171.42', 1, 4, '2023-02-05', 0, '2023-02-06 00:27:05'),
(1461, '114.119.153.67', 1, 31, '2023-02-05', 0, '2023-02-06 01:25:31'),
(1462, '185.191.171.8', 2, 2, '2023-02-17', 0, '2023-02-17 11:45:19'),
(1463, '114.119.132.72', 1, 3, '2023-02-05', 0, '2023-02-06 02:55:35'),
(1464, '103.20.122.52', 2, 0, '2023-02-05', 0, '2023-02-06 03:42:14'),
(1465, '17.241.75.235', 1, 0, '2023-02-05', 0, '2023-02-06 04:17:23'),
(1466, '17.241.219.45', 1, 0, '2023-02-06', 0, '2023-02-06 05:07:16'),
(1467, '185.191.171.44', 1, 21, '2023-02-06', 0, '2023-02-06 05:10:50'),
(1468, '17.241.227.50', 1, 27, '2023-02-06', 0, '2023-02-06 05:20:21'),
(1469, '17.241.219.237', 1, 2, '2023-02-06', 0, '2023-02-06 05:25:10'),
(1470, '34.212.14.38', 2, 0, '2023-02-06', 0, '2023-02-06 05:41:06'),
(1471, '17.241.75.224', 1, 0, '2023-02-06', 0, '2023-02-06 07:22:20'),
(1472, '17.241.219.199', 1, 0, '2023-02-06', 0, '2023-02-06 07:35:18'),
(1473, '17.241.75.95', 1, 1, '2023-02-06', 0, '2023-02-06 07:45:18'),
(1474, '17.241.75.182', 1, 16, '2023-02-06', 0, '2023-02-06 08:05:53'),
(1475, '66.249.72.51', 1, 11, '2023-02-06', 0, '2023-02-06 09:37:57'),
(1476, '114.119.142.132', 1, 4, '2023-02-06', 0, '2023-02-06 09:41:35'),
(1477, '51.79.82.90', 3, 0, '2023-02-07', 0, '2023-02-08 02:53:04'),
(1478, '51.222.253.15', 1, 17, '2023-02-06', 0, '2023-02-06 10:27:09'),
(1479, '114.119.154.128', 1, 21, '2023-02-06', 0, '2023-02-06 10:30:33'),
(1480, '40.77.167.185', 1, 26, '2023-02-06', 0, '2023-02-06 10:54:48'),
(1481, '185.191.171.25', 4, 0, '2023-03-08', 0, '2023-03-09 04:52:49'),
(1482, '185.191.171.3', 1, 1, '2023-02-06', 0, '2023-02-06 11:06:07'),
(1483, '114.119.128.233', 1, 23, '2023-02-06', 0, '2023-02-06 11:13:22'),
(1484, '185.191.171.40', 1, 5, '2023-02-06', 0, '2023-02-06 11:33:13'),
(1485, '17.241.227.170', 1, 0, '2023-02-06', 0, '2023-02-06 11:39:02'),
(1486, '185.191.171.1', 2, 0, '2023-02-06', 0, '2023-02-06 23:18:01'),
(1487, '114.119.146.179', 1, 9, '2023-02-06', 0, '2023-02-06 12:24:53'),
(1488, '51.222.253.10', 1, 18, '2023-02-06', 0, '2023-02-06 12:28:52'),
(1489, '51.222.253.18', 1, 21, '2023-02-06', 0, '2023-02-06 13:50:40'),
(1490, '185.191.171.39', 1, 1, '2023-02-06', 0, '2023-02-06 14:36:55'),
(1491, '114.119.130.109', 1, 3, '2023-02-06', 0, '2023-02-06 16:58:03'),
(1492, '17.241.227.7', 1, 0, '2023-02-06', 0, '2023-02-06 17:04:42'),
(1493, '51.222.253.7', 1, 19, '2023-02-06', 0, '2023-02-06 17:39:32'),
(1494, '114.119.130.125', 2, 28, '2023-02-12', 0, '2023-02-12 18:42:40'),
(1495, '114.119.135.107', 1, 0, '2023-02-06', 0, '2023-02-06 18:17:48'),
(1496, '51.222.253.17', 1, 20, '2023-02-06', 0, '2023-02-06 19:16:49'),
(1497, '91.240.118.252', 2, 0, '2023-02-06', 0, '2023-02-06 20:07:42'),
(1498, '114.119.158.106', 1, 0, '2023-02-06', 0, '2023-02-06 22:12:53'),
(1499, '40.77.167.185', 1, 15, '2023-02-06', 0, '2023-02-06 22:22:32'),
(1500, '114.119.158.106', 1, 5, '2023-02-06', 0, '2023-02-06 22:44:40'),
(1501, '114.119.155.236', 1, 0, '2023-02-06', 0, '2023-02-06 22:45:39'),
(1502, '114.119.158.251', 1, 0, '2023-02-06', 0, '2023-02-06 22:47:26'),
(1503, '185.191.171.36', 1, 6, '2023-02-06', 0, '2023-02-06 23:08:11'),
(1504, '17.241.75.169', 2, 0, '2023-02-09', 0, '2023-02-09 18:07:41'),
(1505, '40.77.167.175', 1, 21, '2023-02-06', 0, '2023-02-07 03:47:43'),
(1506, '17.241.227.104', 1, 0, '2023-02-06', 0, '2023-02-07 04:19:27'),
(1507, '114.119.151.155', 1, 0, '2023-02-07', 0, '2023-02-07 05:25:58'),
(1508, '35.87.209.95', 2, 0, '2023-02-07', 0, '2023-02-07 05:30:14'),
(1509, '193.235.141.11', 1, 0, '2023-02-07', 0, '2023-02-07 05:38:39'),
(1510, '35.92.144.133', 1, 0, '2023-02-07', 0, '2023-02-07 05:43:31'),
(1511, '35.88.232.234', 1, 0, '2023-02-07', 0, '2023-02-07 05:43:39'),
(1512, '18.237.118.110', 1, 0, '2023-02-07', 0, '2023-02-07 05:44:01'),
(1513, '52.26.255.46', 1, 0, '2023-02-07', 0, '2023-02-07 05:44:05'),
(1514, '185.191.171.9', 1, 3, '2023-02-07', 0, '2023-02-07 06:09:14'),
(1515, '114.119.131.207', 1, 3, '2023-02-07', 0, '2023-02-07 07:34:02'),
(1516, '114.119.129.36', 1, 17, '2023-02-07', 0, '2023-02-07 07:34:59'),
(1517, '114.119.130.231', 1, 14, '2023-02-07', 0, '2023-02-07 07:35:58'),
(1518, '114.119.150.4', 1, 6, '2023-02-07', 0, '2023-02-07 08:16:50'),
(1519, '114.119.156.33', 1, 0, '2023-02-07', 0, '2023-02-07 15:37:48'),
(1520, '114.119.138.250', 2, 0, '2023-02-28', 0, '2023-02-28 19:10:16'),
(1521, '114.119.135.204', 1, 0, '2023-02-07', 0, '2023-02-07 17:32:05'),
(1522, '188.166.243.133', 1, 0, '2023-02-07', 0, '2023-02-07 18:27:59'),
(1523, '69.166.204.233', 1, 0, '2023-02-07', 0, '2023-02-07 18:44:12'),
(1524, '194.116.163.54', 3, 0, '2023-02-07', 0, '2023-02-07 18:50:52'),
(1525, '83.220.170.16', 2, 0, '2023-02-07', 0, '2023-02-07 18:50:55'),
(1526, '194.116.162.132', 2, 0, '2023-02-07', 0, '2023-02-07 18:50:56'),
(1527, '212.60.22.209', 2, 0, '2023-02-07', 0, '2023-02-07 18:50:59'),
(1528, '69.160.160.61', 22, 0, '2023-02-07', 0, '2023-02-07 22:19:37'),
(1529, '69.160.160.61', 1, 2, '2023-02-07', 0, '2023-02-07 22:19:35'),
(1530, '69.160.160.61', 2, 1, '2023-02-07', 0, '2023-02-07 22:19:37'),
(1531, '69.160.160.61', 1, 6, '2023-02-07', 0, '2023-02-07 22:19:36'),
(1532, '87.236.176.32', 1, 0, '2023-02-07', 0, '2023-02-08 01:25:52'),
(1533, '114.119.151.117', 1, 1, '2023-02-07', 0, '2023-02-08 02:15:23'),
(1534, '34.247.177.177', 1, 0, '2023-02-07', 0, '2023-02-08 03:36:39'),
(1535, '63.35.181.88', 1, 0, '2023-02-07', 0, '2023-02-08 03:57:02'),
(1536, '63.35.212.82', 1, 0, '2023-02-07', 0, '2023-02-08 04:59:28'),
(1537, '159.203.86.60', 1, 0, '2023-02-08', 0, '2023-02-08 05:22:11'),
(1538, '34.220.105.137', 1, 0, '2023-02-08', 0, '2023-02-08 06:05:08'),
(1539, '114.119.148.189', 1, 0, '2023-02-08', 0, '2023-02-08 10:23:15'),
(1540, '114.119.159.101', 1, 16, '2023-02-08', 0, '2023-02-08 11:30:47'),
(1541, '149.109.224.140', 1, 0, '2023-02-08', 0, '2023-02-08 20:14:26'),
(1542, '114.119.141.69', 1, 2, '2023-02-08', 0, '2023-02-08 20:16:59'),
(1543, '114.119.156.110', 1, 0, '2023-02-08', 0, '2023-02-08 20:29:19'),
(1544, '114.119.133.26', 1, 1, '2023-02-08', 0, '2023-02-08 21:47:35'),
(1545, '114.119.147.113', 1, 19, '2023-02-08', 0, '2023-02-08 21:48:58'),
(1546, '114.119.148.202', 1, 0, '2023-02-08', 0, '2023-02-08 21:50:15'),
(1547, '66.249.83.109', 4, 0, '2023-03-12', 0, '2023-03-13 00:18:57'),
(1548, '17.241.75.125', 1, 0, '2023-02-09', 0, '2023-02-09 05:11:29'),
(1549, '35.88.88.137', 1, 0, '2023-02-09', 0, '2023-02-09 05:45:57'),
(1550, '34.216.175.118', 1, 0, '2023-02-09', 0, '2023-02-09 05:45:58'),
(1551, '54.212.123.202', 1, 0, '2023-02-09', 0, '2023-02-09 05:46:11'),
(1552, '35.93.73.163', 1, 0, '2023-02-09', 0, '2023-02-09 05:46:20'),
(1553, '147.182.144.110', 2, 0, '2023-02-09', 0, '2023-02-09 06:23:04'),
(1554, '114.119.140.153', 1, 4, '2023-02-09', 0, '2023-02-09 07:05:23'),
(1555, '114.119.143.177', 3, 0, '2023-02-23', 0, '2023-02-23 08:43:14'),
(1556, '17.241.75.20', 1, 31, '2023-02-09', 0, '2023-02-09 12:19:35'),
(1557, '185.191.171.14', 1, 9, '2023-02-09', 0, '2023-02-09 12:21:09'),
(1558, '185.191.171.1', 1, 20, '2023-02-09', 0, '2023-02-09 12:46:02'),
(1559, '17.241.75.64', 1, 0, '2023-02-09', 0, '2023-02-09 13:15:56'),
(1560, '17.241.219.84', 1, 0, '2023-02-09', 0, '2023-02-09 13:39:03'),
(1561, '17.241.75.219', 1, 0, '2023-02-09', 0, '2023-02-09 15:09:34'),
(1562, '54.74.14.11', 1, 0, '2023-02-09', 0, '2023-02-09 15:42:24'),
(1563, '114.119.141.116', 1, 0, '2023-02-09', 0, '2023-02-09 16:02:00'),
(1564, '124.220.24.137', 1, 0, '2023-02-09', 0, '2023-02-09 16:34:33'),
(1565, '185.191.171.11', 1, 16, '2023-02-09', 0, '2023-02-09 16:35:10'),
(1566, '17.241.219.145', 1, 5, '2023-02-09', 0, '2023-02-09 16:41:05'),
(1567, '152.32.189.244', 2, 0, '2023-02-09', 0, '2023-02-09 16:44:53'),
(1568, '185.191.171.34', 1, 13, '2023-02-09', 0, '2023-02-09 18:34:48'),
(1569, '17.241.75.210', 1, 31, '2023-02-09', 0, '2023-02-09 19:03:58'),
(1570, '17.241.219.44', 1, 28, '2023-02-09', 0, '2023-02-09 20:49:06'),
(1571, '17.241.219.236', 1, 0, '2023-02-09', 0, '2023-02-09 20:53:32'),
(1572, '17.241.219.101', 1, 4, '2023-02-09', 0, '2023-02-09 20:54:02'),
(1573, '17.241.75.114', 1, 0, '2023-02-09', 0, '2023-02-09 21:01:42'),
(1574, '17.241.75.160', 1, 0, '2023-02-09', 0, '2023-02-09 21:08:52'),
(1575, '17.241.219.155', 1, 0, '2023-02-09', 0, '2023-02-09 21:36:56'),
(1576, '58.145.188.248', 1, 0, '2023-02-09', 0, '2023-02-09 21:39:16'),
(1577, '193.235.141.153', 1, 0, '2023-02-09', 0, '2023-02-09 21:47:27'),
(1578, '185.191.171.39', 1, 15, '2023-02-09', 0, '2023-02-09 23:22:30'),
(1579, '185.191.171.19', 1, 17, '2023-02-09', 0, '2023-02-09 23:51:49'),
(1580, '114.119.151.117', 1, 16, '2023-02-09', 0, '2023-02-09 23:51:52'),
(1581, '114.119.151.63', 1, 0, '2023-02-09', 0, '2023-02-09 23:53:41'),
(1582, '17.241.227.207', 1, 0, '2023-02-09', 0, '2023-02-10 00:30:22'),
(1583, '103.62.140.118', 1, 0, '2023-02-09', 0, '2023-02-10 00:38:31'),
(1584, '114.119.134.230', 1, 1, '2023-02-09', 0, '2023-02-10 00:41:12'),
(1585, '42.0.4.226', 10, 0, '2023-02-09', 0, '2023-02-10 03:30:23'),
(1586, '42.0.4.226', 1, 1, '2023-02-09', 0, '2023-02-10 00:44:10'),
(1587, '17.241.227.182', 1, 0, '2023-02-09', 0, '2023-02-10 01:01:47'),
(1588, '114.119.156.67', 1, 2, '2023-02-09', 0, '2023-02-10 01:47:48'),
(1589, '185.191.171.18', 1, 8, '2023-02-09', 0, '2023-02-10 02:59:23'),
(1590, '185.191.171.42', 1, 11, '2023-02-09', 0, '2023-02-10 03:27:00'),
(1591, '185.191.171.20', 1, 2, '2023-02-09', 0, '2023-02-10 03:45:52'),
(1592, '34.77.127.183', 1, 0, '2023-02-09', 0, '2023-02-10 03:49:32'),
(1593, '17.241.75.132', 1, 0, '2023-02-09', 0, '2023-02-10 04:50:42'),
(1594, '18.237.167.88', 1, 0, '2023-02-10', 0, '2023-02-10 05:27:24'),
(1595, '45.71.19.47', 6, 0, '2023-02-10', 0, '2023-02-10 05:34:01'),
(1596, '185.191.171.14', 1, 1, '2023-02-10', 0, '2023-02-10 05:36:18'),
(1597, '17.246.23.22', 1, 0, '2023-02-10', 0, '2023-02-10 07:09:21'),
(1598, '34.207.95.53', 3, 0, '2023-02-10', 0, '2023-02-10 08:24:28'),
(1599, '17.241.227.16', 1, 0, '2023-02-10', 0, '2023-02-10 08:24:29'),
(1600, '17.241.219.56', 1, 0, '2023-02-10', 0, '2023-02-10 09:23:27'),
(1601, '114.119.134.18', 1, 20, '2023-02-10', 0, '2023-02-10 09:24:30'),
(1602, '192.71.2.171', 1, 0, '2023-02-10', 0, '2023-02-10 09:37:06'),
(1603, '114.119.155.205', 1, 20, '2023-02-10', 0, '2023-02-10 11:50:59'),
(1604, '185.191.171.17', 1, 21, '2023-02-10', 0, '2023-02-10 12:23:17'),
(1605, '87.236.176.19', 1, 0, '2023-02-10', 0, '2023-02-10 12:54:51'),
(1606, '185.191.171.5', 1, 8, '2023-02-10', 0, '2023-02-10 14:18:36'),
(1607, '185.191.171.38', 1, 6, '2023-02-10', 0, '2023-02-10 16:17:37'),
(1608, '185.191.171.3', 1, 3, '2023-02-10', 0, '2023-02-10 17:07:30'),
(1609, '185.191.171.11', 1, 7, '2023-02-10', 0, '2023-02-10 17:12:40'),
(1610, '114.119.152.71', 1, 12, '2023-02-10', 0, '2023-02-10 20:05:37'),
(1611, '185.191.171.14', 2, 0, '2023-02-17', 0, '2023-02-18 01:43:41'),
(1612, '103.214.201.102', 18, 0, '2023-02-15', 0, '2023-02-15 17:06:58'),
(1613, '103.214.201.102', 5, 2, '2023-02-11', 0, '2023-02-11 19:34:04'),
(1614, '114.119.141.206', 1, 19, '2023-02-10', 0, '2023-02-10 21:12:23'),
(1615, '185.191.171.18', 1, 18, '2023-02-10', 0, '2023-02-10 21:28:20'),
(1616, '42.0.7.242', 4, 0, '2023-02-10', 0, '2023-02-10 22:06:53'),
(1617, '42.0.7.242', 1, 5, '2023-02-10', 0, '2023-02-10 22:06:41'),
(1618, '114.119.142.7', 1, 0, '2023-02-10', 0, '2023-02-10 22:26:10'),
(1619, '185.191.171.39', 1, 12, '2023-02-10', 0, '2023-02-10 23:10:26'),
(1620, '185.191.171.4', 2, 9, '2023-03-09', 0, '2023-03-10 03:22:47'),
(1621, '114.119.135.212', 1, 5, '2023-02-10', 0, '2023-02-10 23:44:53'),
(1622, '114.119.145.163', 1, 22, '2023-02-10', 0, '2023-02-11 00:00:08'),
(1623, '185.191.171.4', 1, 4, '2023-02-10', 0, '2023-02-11 01:41:39'),
(1624, '185.191.171.24', 1, 14, '2023-02-10', 0, '2023-02-11 01:56:39'),
(1625, '185.191.171.6', 1, 19, '2023-02-10', 0, '2023-02-11 01:59:36'),
(1626, '66.102.7.173', 1, 0, '2023-02-10', 0, '2023-02-11 02:00:11'),
(1627, '42.111.13.244', 1, 0, '2023-02-10', 0, '2023-02-11 02:00:16'),
(1628, '209.141.51.222', 3, 0, '2023-02-21', 0, '2023-02-21 10:17:54'),
(1629, '209.141.49.169', 1, 0, '2023-02-10', 0, '2023-02-11 02:11:32'),
(1630, '209.141.55.120', 2, 0, '2023-02-10', 0, '2023-02-11 03:50:18'),
(1631, '209.141.36.231', 2, 0, '2023-02-11', 0, '2023-02-12 04:54:51'),
(1632, '205.185.121.69', 2, 0, '2023-02-14', 0, '2023-02-14 07:37:26'),
(1633, '185.191.171.21', 1, 5, '2023-02-10', 0, '2023-02-11 03:03:50'),
(1634, '185.191.171.9', 1, 10, '2023-02-10', 0, '2023-02-11 03:31:35'),
(1635, '205.185.116.25', 2, 0, '2023-02-10', 0, '2023-02-11 03:48:23'),
(1636, '68.227.241.193', 1, 0, '2023-02-10', 0, '2023-02-11 04:52:31'),
(1637, '64.225.32.211', 1, 0, '2023-02-10', 0, '2023-02-11 04:52:44'),
(1638, '34.219.22.191', 1, 0, '2023-02-11', 0, '2023-02-11 05:07:36'),
(1639, '35.92.48.190', 1, 0, '2023-02-11', 0, '2023-02-11 05:08:21'),
(1640, '54.190.156.32', 1, 0, '2023-02-11', 0, '2023-02-11 05:09:02'),
(1641, '35.164.93.242', 1, 0, '2023-02-11', 0, '2023-02-11 05:09:29'),
(1642, '35.89.197.196', 1, 0, '2023-02-11', 0, '2023-02-11 05:23:27'),
(1643, '34.247.37.150', 1, 0, '2023-02-11', 0, '2023-02-11 05:48:35'),
(1644, '114.119.160.138', 1, 21, '2023-02-11', 0, '2023-02-11 07:31:33'),
(1645, '114.119.130.125', 1, 24, '2023-02-11', 0, '2023-02-11 09:15:31'),
(1646, '66.249.83.108', 4, 0, '2023-02-25', 0, '2023-02-25 05:27:22'),
(1647, '52.53.171.48', 1, 0, '2023-02-11', 0, '2023-02-11 12:46:42'),
(1648, '114.119.138.111', 1, 6, '2023-02-11', 0, '2023-02-11 14:47:25'),
(1649, '114.119.146.4', 1, 10, '2023-02-11', 0, '2023-02-11 14:48:43'),
(1650, '114.119.141.69', 1, 24, '2023-02-11', 0, '2023-02-11 14:49:55'),
(1651, '103.214.201.102', 2, 1, '2023-02-11', 0, '2023-02-11 19:30:42'),
(1652, '103.214.201.102', 1, 5, '2023-02-11', 0, '2023-02-11 17:10:16'),
(1653, '103.214.201.102', 1, 3, '2023-02-11', 0, '2023-02-11 19:31:39'),
(1654, '114.119.156.31', 1, 18, '2023-02-11', 0, '2023-02-11 22:57:31'),
(1655, '114.119.132.45', 1, 3, '2023-02-11', 0, '2023-02-11 23:11:20'),
(1656, '114.119.147.229', 1, 23, '2023-02-11', 0, '2023-02-11 23:42:25'),
(1657, '114.119.141.34', 1, 0, '2023-02-11', 0, '2023-02-12 00:08:49'),
(1658, '114.119.149.71', 1, 0, '2023-02-11', 0, '2023-02-12 00:25:57'),
(1659, '114.119.145.183', 1, 31, '2023-02-11', 0, '2023-02-12 00:52:29'),
(1660, '198.235.24.30', 1, 0, '2023-02-11', 0, '2023-02-12 02:54:00'),
(1661, '54.202.192.12', 1, 0, '2023-02-12', 0, '2023-02-12 05:13:37'),
(1662, '34.221.35.60', 1, 0, '2023-02-12', 0, '2023-02-12 05:18:30'),
(1663, '34.219.247.51', 1, 0, '2023-02-12', 0, '2023-02-12 05:23:04'),
(1664, '52.25.215.164', 1, 0, '2023-02-12', 0, '2023-02-12 05:34:01'),
(1665, '114.119.128.237', 1, 5, '2023-02-12', 0, '2023-02-12 09:02:24'),
(1666, '114.119.146.29', 1, 0, '2023-02-12', 0, '2023-02-12 09:03:58'),
(1667, '114.119.142.7', 1, 3, '2023-02-12', 0, '2023-02-12 10:19:40'),
(1668, '157.55.39.8', 1, 24, '2023-02-12', 0, '2023-02-12 10:57:58'),
(1669, '114.119.130.199', 1, 0, '2023-02-12', 0, '2023-02-12 10:58:37'),
(1670, '114.119.158.34', 1, 0, '2023-02-12', 0, '2023-02-12 12:06:49'),
(1671, '114.119.148.13', 1, 17, '2023-02-12', 0, '2023-02-12 12:53:16'),
(1672, '193.235.141.120', 2, 0, '2023-03-15', 0, '2023-03-15 05:43:44'),
(1673, '114.119.135.92', 1, 0, '2023-02-12', 0, '2023-02-12 18:41:50'),
(1674, '114.119.146.179', 1, 8, '2023-02-12', 0, '2023-02-12 18:44:42'),
(1675, '114.119.137.184', 1, 1, '2023-02-12', 0, '2023-02-12 18:45:35'),
(1676, '114.119.136.15', 1, 17, '2023-02-12', 0, '2023-02-12 18:52:32'),
(1677, '66.249.65.151', 1, 1, '2023-02-12', 0, '2023-02-12 19:08:32'),
(1678, '114.119.128.126', 1, 15, '2023-02-12', 0, '2023-02-12 19:44:01'),
(1679, '114.119.142.181', 1, 4, '2023-02-12', 0, '2023-02-12 19:45:09'),
(1680, '134.19.179.235', 1, 0, '2023-02-12', 0, '2023-02-13 01:34:18'),
(1681, '114.119.148.56', 1, 7, '2023-02-12', 0, '2023-02-13 03:50:45'),
(1682, '114.119.154.200', 1, 0, '2023-02-12', 0, '2023-02-13 03:52:10'),
(1683, '114.119.157.183', 1, 11, '2023-02-12', 0, '2023-02-13 04:05:57'),
(1684, '114.119.145.115', 2, 0, '2023-03-11', 0, '2023-03-11 15:12:21'),
(1685, '113.142.141.105', 2, 0, '2023-03-11', 0, '2023-03-12 02:22:36'),
(1686, '114.119.132.202', 1, 4, '2023-02-13', 0, '2023-02-13 05:08:54'),
(1687, '54.189.65.206', 1, 0, '2023-02-13', 0, '2023-02-13 05:16:13'),
(1688, '52.32.241.46', 1, 0, '2023-02-13', 0, '2023-02-13 05:16:24'),
(1689, '35.162.98.109', 1, 0, '2023-02-13', 0, '2023-02-13 05:16:49'),
(1690, '34.214.235.58', 1, 0, '2023-02-13', 0, '2023-02-13 05:18:25'),
(1691, '52.12.105.155', 1, 0, '2023-02-13', 0, '2023-02-13 05:23:45'),
(1692, '103.133.65.146', 3, 0, '2023-02-13', 0, '2023-02-13 06:22:49'),
(1693, '176.9.114.107', 1, 0, '2023-02-13', 0, '2023-02-13 07:36:19'),
(1694, '185.191.171.38', 1, 19, '2023-02-13', 0, '2023-02-13 08:50:06'),
(1695, '114.119.145.216', 1, 17, '2023-02-13', 0, '2023-02-13 12:18:59'),
(1696, '114.119.139.42', 1, 5, '2023-02-13', 0, '2023-02-13 13:03:29'),
(1697, '114.119.157.146', 1, 0, '2023-02-13', 0, '2023-02-13 13:04:46'),
(1698, '114.119.159.226', 1, 0, '2023-02-13', 0, '2023-02-13 14:52:52'),
(1699, '185.191.171.16', 1, 17, '2023-02-13', 0, '2023-02-13 15:17:02'),
(1700, '185.191.171.43', 1, 15, '2023-02-13', 0, '2023-02-13 16:48:30'),
(1701, '185.191.171.4', 1, 22, '2023-02-13', 0, '2023-02-13 18:16:39'),
(1702, '192.133.77.16', 2, 0, '2023-02-28', 0, '2023-02-28 18:51:47'),
(1703, '173.252.87.8', 2, 0, '2023-02-19', 0, '2023-02-19 06:57:53'),
(1704, '31.13.127.11', 1, 0, '2023-02-13', 0, '2023-02-13 20:11:32'),
(1705, '69.171.249.1', 1, 0, '2023-02-13', 0, '2023-02-13 20:12:16'),
(1706, '103.160.8.36', 12, 0, '2023-03-14', 0, '2023-03-14 20:57:05'),
(1707, '114.119.162.251', 1, 22, '2023-02-13', 0, '2023-02-13 22:56:55'),
(1708, '114.119.155.22', 1, 0, '2023-02-13', 0, '2023-02-13 23:27:34'),
(1709, '185.191.171.5', 1, 12, '2023-02-13', 0, '2023-02-14 01:20:17'),
(1710, '51.222.253.4', 1, 5, '2023-02-13', 0, '2023-02-14 01:41:41'),
(1711, '66.249.73.208', 1, 11, '2023-02-13', 0, '2023-02-14 02:04:00'),
(1712, '51.222.253.14', 1, 7, '2023-02-13', 0, '2023-02-14 04:08:26'),
(1713, '18.237.156.179', 1, 0, '2023-02-14', 0, '2023-02-14 05:54:40'),
(1714, '185.225.73.198', 1, 0, '2023-02-14', 0, '2023-02-14 05:59:38'),
(1715, '40.77.167.185', 1, 23, '2023-02-14', 0, '2023-02-14 08:01:08'),
(1716, '114.119.145.201', 1, 3, '2023-02-14', 0, '2023-02-14 08:16:55'),
(1717, '51.222.253.10', 2, 1, '2023-03-14', 0, '2023-03-14 05:24:01'),
(1718, '114.119.158.34', 1, 19, '2023-02-14', 0, '2023-02-14 09:58:15'),
(1719, '114.119.143.55', 2, 0, '2023-02-16', 0, '2023-02-16 17:44:56'),
(1720, '144.126.151.207', 1, 0, '2023-02-14', 0, '2023-02-14 12:53:24'),
(1721, '138.201.195.7', 1, 0, '2023-02-14', 0, '2023-02-14 13:57:00'),
(1722, '114.119.131.200', 1, 2, '2023-02-14', 0, '2023-02-14 18:54:48'),
(1723, '198.235.24.171', 1, 0, '2023-02-14', 0, '2023-02-14 19:02:16'),
(1724, '114.119.138.82', 2, 0, '2023-03-10', 0, '2023-03-10 20:46:49'),
(1725, '205.210.31.153', 1, 0, '2023-02-14', 0, '2023-02-14 20:02:23'),
(1726, '114.119.147.101', 1, 0, '2023-02-14', 0, '2023-02-14 20:19:08'),
(1727, '185.191.171.6', 1, 11, '2023-02-14', 0, '2023-02-14 21:28:51'),
(1728, '114.119.158.137', 1, 14, '2023-02-14', 0, '2023-02-14 21:49:01'),
(1729, '185.191.171.37', 1, 13, '2023-02-14', 0, '2023-02-14 21:55:14'),
(1730, '185.191.171.21', 1, 14, '2023-02-14', 0, '2023-02-15 01:06:19'),
(1731, '185.191.171.14', 1, 16, '2023-02-14', 0, '2023-02-15 01:27:29'),
(1732, '114.119.157.84', 1, 16, '2023-02-14', 0, '2023-02-15 02:43:40'),
(1733, '114.119.143.130', 1, 0, '2023-02-14', 0, '2023-02-15 02:44:45'),
(1734, '114.119.156.126', 1, 0, '2023-02-14', 0, '2023-02-15 02:46:22'),
(1735, '114.119.146.212', 1, 9, '2023-02-14', 0, '2023-02-15 03:00:22'),
(1736, '66.249.66.141', 1, 0, '2023-02-14', 0, '2023-02-15 03:51:19'),
(1737, '66.249.66.66', 1, 0, '2023-02-14', 0, '2023-02-15 03:52:19'),
(1738, '193.186.4.159', 8, 0, '2023-03-14', 0, '2023-03-14 23:37:35'),
(1739, '72.14.201.159', 12, 0, '2023-03-14', 0, '2023-03-15 03:29:35'),
(1740, '54.71.144.35', 1, 0, '2023-02-15', 0, '2023-02-15 05:29:51'),
(1741, '193.235.141.150', 1, 0, '2023-02-15', 0, '2023-02-15 05:44:19'),
(1742, '185.39.144.147', 1, 0, '2023-02-15', 0, '2023-02-15 07:00:09'),
(1743, '66.249.65.144', 1, 5, '2023-02-15', 0, '2023-02-15 07:40:37'),
(1744, '114.119.149.137', 1, 0, '2023-02-15', 0, '2023-02-15 10:20:03'),
(1745, '46.253.143.56', 2, 0, '2023-02-15', 0, '2023-02-15 10:33:52'),
(1746, '114.119.137.38', 1, 6, '2023-02-15', 0, '2023-02-15 12:06:41'),
(1747, '114.119.132.43', 1, 2, '2023-02-15', 0, '2023-02-15 12:07:55'),
(1748, '114.119.146.206', 1, 0, '2023-02-15', 0, '2023-02-15 12:10:05'),
(1749, '66.249.83.200', 1, 0, '2023-02-15', 0, '2023-02-15 13:49:13'),
(1750, '66.249.83.4', 6, 0, '2023-03-05', 0, '2023-03-06 00:23:11'),
(1751, '114.119.136.146', 1, 1, '2023-02-15', 0, '2023-02-15 14:39:17'),
(1752, '114.119.150.196', 1, 4, '2023-02-15', 0, '2023-02-15 14:40:17'),
(1753, '66.249.83.199', 4, 0, '2023-02-24', 0, '2023-02-24 13:15:54'),
(1754, '66.249.83.197', 3, 0, '2023-02-25', 0, '2023-02-25 05:25:12'),
(1755, '103.160.8.32', 12, 0, '2023-02-27', 40010, '2023-02-27 17:57:23'),
(1756, '114.119.135.217', 1, 0, '2023-02-15', 0, '2023-02-15 22:14:08'),
(1757, '114.119.135.104', 1, 13, '2023-02-15', 0, '2023-02-15 22:15:00'),
(1758, '114.119.146.7', 1, 12, '2023-02-15', 0, '2023-02-15 22:58:07'),
(1759, '107.150.63.229', 1, 1, '2023-02-15', 0, '2023-02-16 03:51:50'),
(1760, '54.185.135.148', 2, 0, '2023-02-16', 0, '2023-02-16 05:04:15'),
(1761, '114.119.149.137', 1, 27, '2023-02-16', 0, '2023-02-16 06:30:31'),
(1762, '114.119.129.181', 1, 13, '2023-02-16', 0, '2023-02-16 06:34:04'),
(1763, '114.119.144.7', 1, 20, '2023-02-16', 0, '2023-02-16 06:34:35'),
(1764, '114.119.136.32', 1, 10, '2023-02-16', 0, '2023-02-16 06:36:29'),
(1765, '114.119.133.245', 1, 13, '2023-02-16', 0, '2023-02-16 06:52:18'),
(1766, '114.119.152.246', 1, 2, '2023-02-16', 0, '2023-02-16 07:12:20'),
(1767, '52.167.144.42', 1, 0, '2023-02-16', 0, '2023-02-16 09:00:35'),
(1768, '199.244.88.222', 1, 0, '2023-02-16', 0, '2023-02-16 12:20:39'),
(1769, '17.241.227.58', 1, 0, '2023-02-16', 0, '2023-02-16 13:42:20'),
(1770, '114.119.134.80', 1, 0, '2023-02-16', 0, '2023-02-16 14:44:18'),
(1771, '198.58.117.149', 1, 0, '2023-02-16', 0, '2023-02-16 15:59:08'),
(1772, '114.119.150.196', 1, 24, '2023-02-16', 0, '2023-02-16 16:41:53'),
(1773, '114.119.148.70', 1, 0, '2023-02-16', 0, '2023-02-16 17:49:04'),
(1774, '103.77.60.191', 1, 0, '2023-02-16', 0, '2023-02-16 23:03:26'),
(1775, '103.74.229.8', 10, 4, '2023-02-25', 0, '2023-02-25 08:38:52'),
(1776, '193.235.141.143', 1, 0, '2023-02-16', 0, '2023-02-17 02:37:23'),
(1777, '114.119.147.70', 1, 3, '2023-02-16', 0, '2023-02-17 02:40:12'),
(1778, '185.191.171.43', 2, 0, '2023-02-17', 0, '2023-02-17 22:57:44'),
(1779, '185.191.171.34', 1, 5, '2023-02-16', 0, '2023-02-17 04:58:39'),
(1780, '172.98.185.110', 6, 0, '2023-02-17', 0, '2023-02-17 06:33:23'),
(1781, '17.241.227.233', 1, 0, '2023-02-17', 0, '2023-02-17 06:37:23'),
(1782, '185.191.171.8', 1, 18, '2023-02-17', 0, '2023-02-17 07:46:59'),
(1783, '185.191.171.15', 1, 4, '2023-02-17', 0, '2023-02-17 09:27:03'),
(1784, '114.119.128.126', 1, 16, '2023-02-17', 0, '2023-02-17 11:32:13'),
(1785, '114.119.152.8', 1, 0, '2023-02-17', 0, '2023-02-17 11:34:26'),
(1786, '114.119.146.133', 1, 0, '2023-02-17', 0, '2023-02-17 11:36:29'),
(1787, '185.191.171.4', 3, 0, '2023-03-10', 0, '2023-03-10 19:57:12'),
(1788, '114.119.136.174', 1, 1, '2023-02-17', 0, '2023-02-17 12:01:21'),
(1789, '66.249.83.3', 2, 0, '2023-02-19', 0, '2023-02-20 00:20:29'),
(1790, '185.191.171.41', 1, 21, '2023-02-17', 0, '2023-02-17 14:43:26'),
(1791, '185.191.171.24', 1, 20, '2023-02-17', 0, '2023-02-17 15:09:34'),
(1792, '17.241.219.31', 1, 0, '2023-02-17', 0, '2023-02-17 20:36:41'),
(1793, '185.191.171.7', 1, 1, '2023-02-17', 0, '2023-02-17 20:52:06'),
(1794, '185.191.171.23', 1, 5, '2023-02-17', 0, '2023-02-17 20:56:10'),
(1795, '114.119.162.170', 1, 6, '2023-02-17', 0, '2023-02-17 21:15:30'),
(1796, '114.119.153.171', 1, 21, '2023-02-17', 0, '2023-02-17 21:16:32'),
(1797, '157.55.39.239', 1, 0, '2023-02-17', 0, '2023-02-17 22:59:41'),
(1798, '114.119.156.154', 1, 0, '2023-02-17', 0, '2023-02-17 23:23:31'),
(1799, '114.119.140.172', 1, 0, '2023-02-17', 0, '2023-02-18 00:34:03'),
(1800, '5.181.234.132', 1, 0, '2023-02-17', 0, '2023-02-18 01:03:16'),
(1801, '17.241.75.53', 1, 0, '2023-02-17', 0, '2023-02-18 02:24:42'),
(1802, '114.119.146.159', 1, 0, '2023-02-17', 0, '2023-02-18 03:45:47'),
(1803, '114.119.149.171', 1, 0, '2023-02-17', 0, '2023-02-18 04:53:22'),
(1804, '114.119.154.11', 1, 26, '2023-02-18', 0, '2023-02-18 06:12:01'),
(1805, '111.90.141.34', 1, 0, '2023-02-18', 0, '2023-02-18 06:58:31'),
(1806, '114.119.158.143', 1, 0, '2023-02-18', 0, '2023-02-18 07:49:05'),
(1807, '54.151.80.129', 1, 0, '2023-02-18', 0, '2023-02-18 09:44:21'),
(1808, '185.191.171.44', 1, 23, '2023-02-18', 0, '2023-02-18 13:26:50'),
(1809, '114.119.145.116', 1, 1, '2023-02-18', 0, '2023-02-18 13:29:11'),
(1810, '114.119.139.66', 1, 1, '2023-02-18', 0, '2023-02-18 14:44:48'),
(1811, '114.119.158.167', 1, 20, '2023-02-18', 0, '2023-02-18 14:45:56'),
(1812, '198.235.24.21', 2, 0, '2023-02-25', 0, '2023-02-26 04:08:35'),
(1813, '114.119.159.228', 1, 5, '2023-02-18', 0, '2023-02-18 15:39:43'),
(1814, '114.119.130.177', 1, 18, '2023-02-18', 0, '2023-02-18 15:42:20'),
(1815, '114.119.138.214', 1, 17, '2023-02-18', 0, '2023-02-18 15:46:23'),
(1816, '198.235.24.5', 1, 0, '2023-02-18', 0, '2023-02-18 20:42:35'),
(1817, '207.46.13.219', 1, 0, '2023-02-18', 0, '2023-02-18 21:01:31'),
(1818, '51.158.109.3', 1, 0, '2023-02-18', 0, '2023-02-18 22:51:33'),
(1819, '114.119.131.218', 1, 11, '2023-02-18', 0, '2023-02-18 22:53:02'),
(1820, '103.161.151.98', 22, 0, '2023-02-18', 0, '2023-02-18 23:28:03'),
(1821, '103.161.151.98', 3, 1, '2023-02-18', 0, '2023-02-18 23:09:39'),
(1822, '103.161.151.98', 4, 2, '2023-02-18', 0, '2023-02-18 23:18:47'),
(1823, '103.161.151.98', 4, 6, '2023-02-18', 0, '2023-02-18 23:13:54'),
(1824, '185.191.171.8', 1, 0, '2023-02-18', 0, '2023-02-18 23:47:28'),
(1825, '157.55.39.209', 2, 0, '2023-02-23', 0, '2023-02-24 00:08:34'),
(1826, '114.119.142.112', 1, 10, '2023-02-18', 0, '2023-02-19 00:40:26'),
(1827, '114.119.134.75', 1, 5, '2023-02-18', 0, '2023-02-19 01:03:00'),
(1828, '114.119.152.195', 1, 7, '2023-02-18', 0, '2023-02-19 01:14:34'),
(1829, '103.6.251.197', 2, 0, '2023-02-18', 0, '2023-02-19 02:16:37'),
(1830, '185.27.99.137', 1, 0, '2023-02-18', 0, '2023-02-19 04:37:33'),
(1831, '13.79.160.159', 1, 0, '2023-02-18', 0, '2023-02-19 04:38:25'),
(1832, '40.127.111.29', 1, 0, '2023-02-18', 0, '2023-02-19 04:38:32'),
(1833, '104.41.228.253', 2, 0, '2023-02-18', 0, '2023-02-19 04:38:38'),
(1834, '104.41.228.253', 1, 6, '2023-02-18', 0, '2023-02-19 04:38:43'),
(1835, '104.41.228.253', 1, 4, '2023-02-18', 0, '2023-02-19 04:38:45'),
(1836, '173.252.79.23', 1, 0, '2023-02-19', 0, '2023-02-19 05:17:35'),
(1837, '54.244.209.48', 2, 0, '2023-02-19', 0, '2023-02-19 05:43:06'),
(1838, '173.252.87.10', 1, 0, '2023-02-19', 0, '2023-02-19 06:57:54'),
(1839, '173.252.87.14', 1, 0, '2023-02-19', 0, '2023-02-19 06:57:54'),
(1840, '69.63.184.116', 1, 0, '2023-02-19', 0, '2023-02-19 06:58:28'),
(1841, '173.252.95.116', 2, 0, '2023-03-05', 0, '2023-03-06 04:17:51'),
(1842, '114.119.150.15', 1, 19, '2023-02-19', 0, '2023-02-19 08:33:05'),
(1843, '185.5.250.153', 1, 0, '2023-02-19', 0, '2023-02-19 08:36:44'),
(1844, '114.119.151.146', 1, 15, '2023-02-19', 0, '2023-02-19 09:10:10'),
(1845, '114.119.133.208', 1, 0, '2023-02-19', 0, '2023-02-19 09:11:05'),
(1846, '198.235.24.18', 1, 0, '2023-02-19', 0, '2023-02-19 09:54:47'),
(1847, '207.46.13.219', 1, 29, '2023-02-19', 0, '2023-02-19 10:50:45'),
(1848, '17.241.75.199', 1, 0, '2023-02-19', 0, '2023-02-19 14:57:45'),
(1849, '17.241.75.35', 1, 6, '2023-02-19', 0, '2023-02-19 15:51:48'),
(1850, '104.144.160.204', 1, 11, '2023-02-19', 0, '2023-02-19 16:21:02'),
(1851, '182.161.67.146', 15, 0, '2023-03-09', 0, '2023-03-09 05:29:09'),
(1852, '193.235.141.127', 1, 0, '2023-02-19', 0, '2023-02-19 18:02:05'),
(1853, '17.241.219.6', 1, 28, '2023-02-19', 0, '2023-02-19 19:18:11'),
(1854, '40.77.167.246', 1, 0, '2023-02-19', 0, '2023-02-19 23:53:15'),
(1855, '17.241.75.109', 1, 0, '2023-02-19', 0, '2023-02-20 01:41:03'),
(1856, '114.119.137.195', 1, 8, '2023-02-19', 0, '2023-02-20 02:17:26'),
(1857, '114.119.131.43', 1, 16, '2023-02-19', 0, '2023-02-20 04:05:51'),
(1858, '114.119.159.62', 1, 0, '2023-02-19', 0, '2023-02-20 04:18:06'),
(1859, '34.221.187.30', 2, 0, '2023-02-20', 0, '2023-02-20 05:17:49'),
(1860, '108.62.64.108', 1, 1, '2023-02-20', 0, '2023-02-20 06:51:09'),
(1861, '114.119.160.248', 1, 0, '2023-02-20', 0, '2023-02-20 12:26:29'),
(1862, '149.202.189.182', 1, 0, '2023-02-20', 0, '2023-02-20 14:31:58'),
(1863, '167.248.133.191', 1, 0, '2023-02-20', 0, '2023-02-20 21:19:08'),
(1864, '192.133.77.14', 1, 0, '2023-02-20', 0, '2023-02-20 22:56:39'),
(1865, '66.249.83.198', 3, 0, '2023-02-23', 0, '2023-02-24 00:29:55'),
(1866, '114.119.135.172', 1, 31, '2023-02-20', 0, '2023-02-21 00:47:33'),
(1867, '114.119.153.154', 1, 0, '2023-02-20', 0, '2023-02-21 00:49:01'),
(1868, '51.222.253.6', 1, 9, '2023-02-20', 0, '2023-02-21 01:29:59'),
(1869, '18.236.221.145', 2, 0, '2023-02-21', 0, '2023-02-21 05:32:57'),
(1870, '51.222.253.5', 1, 10, '2023-02-21', 0, '2023-02-21 05:58:03'),
(1871, '51.222.253.15', 1, 22, '2023-02-21', 0, '2023-02-21 07:54:06'),
(1872, '114.119.151.113', 1, 0, '2023-02-21', 0, '2023-02-21 09:28:42'),
(1873, '157.55.39.209', 1, 22, '2023-02-21', 0, '2023-02-21 09:56:53'),
(1874, '114.119.132.133', 1, 13, '2023-02-21', 0, '2023-02-21 10:07:12'),
(1875, '51.222.253.8', 2, 5, '2023-03-11', 0, '2023-03-11 19:56:28'),
(1876, '114.119.134.155', 1, 14, '2023-02-21', 0, '2023-02-21 10:29:58'),
(1877, '18.130.107.194', 3, 0, '2023-02-21', 0, '2023-02-21 11:17:32'),
(1878, '51.222.253.19', 2, 4, '2023-03-11', 0, '2023-03-11 18:36:23'),
(1879, '185.191.171.7', 1, 17, '2023-02-21', 0, '2023-02-21 12:13:45'),
(1880, '34.76.96.55', 1, 0, '2023-02-21', 0, '2023-02-21 12:31:31'),
(1881, '51.222.253.14', 1, 3, '2023-02-21', 0, '2023-02-21 13:13:07'),
(1882, '114.119.137.2', 1, 0, '2023-02-21', 0, '2023-02-21 14:10:23'),
(1883, '185.191.171.22', 1, 15, '2023-02-21', 0, '2023-02-21 14:44:00'),
(1884, '147.78.47.230', 1, 0, '2023-02-21', 0, '2023-02-21 14:55:42'),
(1885, '51.222.253.9', 1, 2, '2023-02-21', 0, '2023-02-21 15:43:55'),
(1886, '185.191.171.1', 1, 8, '2023-02-21', 0, '2023-02-21 16:24:47'),
(1887, '114.119.130.183', 1, 3, '2023-02-21', 0, '2023-02-21 17:21:34'),
(1888, '185.191.171.9', 1, 2, '2023-02-21', 0, '2023-02-21 17:42:11'),
(1889, '185.191.171.11', 1, 11, '2023-02-21', 0, '2023-02-21 17:51:39'),
(1890, '114.119.132.101', 1, 1, '2023-02-21', 0, '2023-02-21 18:18:50'),
(1891, '114.119.136.14', 1, 28, '2023-02-21', 0, '2023-02-21 18:33:16'),
(1892, '114.119.145.249', 1, 4, '2023-02-21', 0, '2023-02-21 18:35:36'),
(1893, '114.119.150.2', 1, 5, '2023-02-21', 0, '2023-02-21 18:36:19'),
(1894, '51.222.253.15', 1, 1, '2023-02-21', 0, '2023-02-21 18:48:18'),
(1895, '185.191.171.5', 1, 1, '2023-02-21', 0, '2023-02-21 18:52:48'),
(1896, '66.249.79.250', 9, 0, '2023-03-14', 0, '2023-03-14 12:56:35'),
(1897, '114.119.141.34', 1, 4, '2023-02-21', 0, '2023-02-21 19:11:17'),
(1898, '212.178.14.202', 1, 0, '2023-02-21', 0, '2023-02-21 19:21:10'),
(1899, '114.119.152.245', 1, 0, '2023-02-21', 0, '2023-02-21 19:38:01'),
(1900, '51.222.253.14', 1, 14, '2023-02-21', 0, '2023-02-21 20:03:33'),
(1901, '223.228.167.136', 2, 0, '2023-02-21', 0, '2023-02-21 20:52:49'),
(1902, '223.228.167.136', 1, 1, '2023-02-21', 0, '2023-02-21 20:52:16'),
(1903, '51.222.253.18', 2, 15, '2023-03-11', 0, '2023-03-11 19:23:40'),
(1904, '185.191.171.22', 2, 0, '2023-02-22', 0, '2023-02-22 16:22:30'),
(1905, '64.233.172.179', 49, 0, '2023-03-13', 0, '2023-03-13 21:58:37'),
(1906, '20.166.248.192', 1, 0, '2023-02-21', 0, '2023-02-21 23:57:04'),
(1907, '156.202.149.177', 1, 0, '2023-02-21', 0, '2023-02-22 00:48:23'),
(1908, '64.233.172.176', 43, 0, '2023-03-15', 0, '2023-03-15 18:53:06'),
(1909, '40.77.167.246', 1, 27, '2023-02-21', 0, '2023-02-22 01:54:39'),
(1910, '114.119.132.43', 1, 27, '2023-02-21', 0, '2023-02-22 02:13:59'),
(1911, '185.191.171.17', 1, 8, '2023-02-21', 0, '2023-02-22 02:46:53'),
(1912, '185.191.171.39', 1, 21, '2023-02-21', 0, '2023-02-22 02:59:34'),
(1913, '185.191.171.21', 1, 10, '2023-02-21', 0, '2023-02-22 03:04:43'),
(1914, '13.200.3.16', 2, 0, '2023-02-21', 0, '2023-02-22 03:50:34'),
(1915, '114.119.132.173', 1, 24, '2023-02-21', 0, '2023-02-22 04:07:26'),
(1916, '103.130.115.59', 1, 0, '2023-02-21', 0, '2023-02-22 04:15:16'),
(1917, '72.14.201.143', 1, 0, '2023-02-21', 0, '2023-02-22 04:16:15'),
(1918, '193.186.4.142', 1, 0, '2023-02-21', 0, '2023-02-22 04:16:59'),
(1919, '17.241.219.204', 1, 3, '2023-02-22', 0, '2023-02-22 05:53:38'),
(1920, '74.125.150.7', 4, 0, '2023-03-15', 0, '2023-03-15 04:11:21'),
(1921, '74.125.150.11', 2, 0, '2023-02-22', 0, '2023-02-23 04:39:11'),
(1922, '51.222.253.1', 1, 13, '2023-02-22', 0, '2023-02-22 06:32:51'),
(1923, '51.222.253.14', 1, 8, '2023-02-22', 0, '2023-02-22 07:21:01'),
(1924, '185.191.171.22', 1, 6, '2023-02-22', 0, '2023-02-22 08:21:13'),
(1925, '72.14.199.251', 7, 0, '2023-03-14', 0, '2023-03-14 14:15:05'),
(1926, '17.241.75.175', 1, 0, '2023-02-22', 0, '2023-02-22 09:05:09'),
(1927, '193.235.141.133', 1, 0, '2023-02-22', 0, '2023-02-22 09:12:12'),
(1928, '114.119.152.219', 1, 2, '2023-02-22', 0, '2023-02-22 10:31:49'),
(1929, '114.119.144.37', 1, 1, '2023-02-22', 0, '2023-02-22 10:33:37'),
(1930, '114.119.133.190', 1, 0, '2023-02-22', 0, '2023-02-22 10:36:04'),
(1931, '114.119.131.211', 2, 0, '2023-02-22', 0, '2023-02-22 12:18:15'),
(1932, '114.119.139.84', 1, 23, '2023-02-22', 0, '2023-02-22 11:33:57'),
(1933, '51.222.253.10', 1, 12, '2023-02-22', 0, '2023-02-22 12:15:11'),
(1934, '114.119.156.134', 1, 4, '2023-02-22', 0, '2023-02-22 12:15:44'),
(1935, '114.119.157.210', 1, 16, '2023-02-22', 0, '2023-02-22 12:17:04'),
(1936, '114.119.132.85', 1, 9, '2023-02-22', 0, '2023-02-22 13:08:34'),
(1937, '17.241.75.99', 1, 0, '2023-02-22', 0, '2023-02-22 13:11:43'),
(1938, '114.119.150.37', 1, 23, '2023-02-22', 0, '2023-02-22 13:40:55'),
(1939, '64.233.172.182', 32, 0, '2023-03-14', 0, '2023-03-14 17:34:00'),
(1940, '51.222.253.17', 1, 11, '2023-02-22', 0, '2023-02-22 16:02:29'),
(1941, '185.191.171.5', 1, 3, '2023-02-22', 0, '2023-02-22 16:08:51'),
(1942, '182.189.124.131', 6, 0, '2023-02-22', 0, '2023-02-22 18:24:14'),
(1943, '182.189.124.131', 1, 2, '2023-02-22', 0, '2023-02-22 18:24:20'),
(1944, '114.119.136.86', 1, 3, '2023-02-22', 0, '2023-02-22 20:44:29'),
(1945, '114.119.159.33', 1, 0, '2023-02-22', 0, '2023-02-22 20:47:28'),
(1946, '114.119.136.199', 1, 19, '2023-02-22', 0, '2023-02-22 21:24:26'),
(1947, '193.32.249.160', 3, 1, '2023-02-24', 0, '2023-02-24 23:02:19'),
(1948, '114.119.143.214', 1, 22, '2023-02-22', 0, '2023-02-22 21:42:06'),
(1949, '114.119.159.228', 1, 13, '2023-02-22', 0, '2023-02-23 00:15:35'),
(1950, '114.119.157.250', 1, 0, '2023-02-22', 0, '2023-02-23 00:17:19'),
(1951, '66.102.6.44', 8, 0, '2023-02-23', 0, '2023-02-24 02:17:13'),
(1952, '34.222.151.18', 1, 0, '2023-02-23', 0, '2023-02-23 05:46:10'),
(1953, '34.211.52.85', 1, 0, '2023-02-23', 0, '2023-02-23 05:46:12'),
(1954, '35.85.47.19', 1, 0, '2023-02-23', 0, '2023-02-23 05:46:39'),
(1955, '35.91.137.222', 1, 0, '2023-02-23', 0, '2023-02-23 05:46:40'),
(1956, '114.119.137.51', 1, 0, '2023-02-23', 0, '2023-02-23 06:52:08'),
(1957, '114.119.136.217', 1, 0, '2023-02-23', 0, '2023-02-23 06:53:36'),
(1958, '168.119.251.177', 1, 0, '2023-02-23', 0, '2023-02-23 07:03:36'),
(1959, '74.125.150.15', 6, 0, '2023-03-15', 0, '2023-03-15 21:40:46'),
(1960, '65.109.234.70', 1, 0, '2023-02-23', 0, '2023-02-23 14:13:46'),
(1961, '66.249.68.8', 1, 0, '2023-02-23', 0, '2023-02-23 14:50:51'),
(1962, '114.119.130.109', 1, 20, '2023-02-23', 0, '2023-02-23 15:14:29'),
(1963, '114.119.132.149', 1, 2, '2023-02-23', 0, '2023-02-23 15:30:23'),
(1964, '185.220.14.197', 1, 0, '2023-02-23', 0, '2023-02-23 15:58:51'),
(1965, '147.78.47.249', 2, 0, '2023-02-23', 0, '2023-02-23 17:06:47'),
(1966, '114.119.154.81', 1, 17, '2023-02-23', 0, '2023-02-23 17:23:30'),
(1967, '114.119.155.228', 1, 0, '2023-02-23', 0, '2023-02-23 17:24:49'),
(1968, '103.37.124.128', 2, 0, '2023-02-23', 0, '2023-02-23 18:22:16'),
(1969, '66.102.6.46', 4, 0, '2023-02-23', 0, '2023-02-24 03:09:29'),
(1970, '52.167.144.38', 1, 0, '2023-02-23', 0, '2023-02-23 21:26:10'),
(1971, '66.102.6.48', 5, 0, '2023-02-23', 0, '2023-02-24 02:59:28'),
(1972, '72.14.199.120', 1, 0, '2023-02-23', 0, '2023-02-23 22:28:28'),
(1973, '135.181.53.44', 1, 5, '2023-02-23', 0, '2023-02-24 00:10:22'),
(1974, '114.119.144.37', 1, 21, '2023-02-23', 0, '2023-02-24 00:18:48'),
(1975, '3.109.158.10', 2, 0, '2023-02-23', 0, '2023-02-24 01:03:59'),
(1976, '66.249.68.12', 1, 0, '2023-02-23', 0, '2023-02-24 01:46:32'),
(1977, '114.119.151.17', 1, 6, '2023-02-23', 0, '2023-02-24 02:14:52'),
(1978, '114.119.150.196', 1, 1, '2023-02-23', 0, '2023-02-24 02:16:20'),
(1979, '40.77.167.229', 1, 9, '2023-02-23', 0, '2023-02-24 04:18:55'),
(1980, '114.119.134.106', 1, 5, '2023-02-24', 0, '2023-02-24 05:28:52'),
(1981, '114.119.134.79', 1, 6, '2023-02-24', 0, '2023-02-24 05:30:13'),
(1982, '114.119.137.103', 1, 0, '2023-02-24', 0, '2023-02-24 05:40:21'),
(1983, '87.236.176.171', 1, 0, '2023-02-24', 0, '2023-02-24 05:54:21'),
(1984, '34.222.55.252', 1, 0, '2023-02-24', 0, '2023-02-24 06:04:54'),
(1985, '34.213.39.135', 1, 0, '2023-02-24', 0, '2023-02-24 06:05:33'),
(1986, '34.217.129.241', 1, 0, '2023-02-24', 0, '2023-02-24 06:07:19'),
(1987, '141.193.96.92', 6, 0, '2023-02-24', 0, '2023-02-24 06:16:24'),
(1988, '34.220.101.72', 1, 0, '2023-02-24', 0, '2023-02-24 06:17:09'),
(1989, '121.4.166.245', 2, 0, '2023-02-24', 0, '2023-02-24 07:34:04'),
(1990, '114.119.152.171', 1, 0, '2023-02-24', 0, '2023-02-24 10:48:15'),
(1991, '114.119.135.217', 1, 6, '2023-02-24', 0, '2023-02-24 10:59:22'),
(1992, '114.119.150.166', 1, 17, '2023-02-24', 0, '2023-02-24 11:00:41'),
(1993, '114.119.156.152', 1, 5, '2023-02-24', 0, '2023-02-24 11:11:51'),
(1994, '27.115.124.96', 1, 0, '2023-02-24', 0, '2023-02-24 12:54:56'),
(1995, '193.32.249.160', 1, 5, '2023-02-24', 0, '2023-02-24 19:23:29'),
(1996, '114.119.156.56', 1, 10, '2023-02-24', 0, '2023-02-24 21:13:24'),
(1997, '114.119.137.108', 1, 0, '2023-02-24', 0, '2023-02-24 21:15:11'),
(1998, '52.167.144.78', 1, 0, '2023-02-24', 0, '2023-02-24 22:23:55'),
(1999, '114.119.157.142', 1, 0, '2023-02-24', 0, '2023-02-24 22:38:17'),
(2000, '193.235.141.90', 1, 0, '2023-02-24', 0, '2023-02-24 23:58:42'),
(2001, '198.235.24.174', 1, 0, '2023-02-24', 0, '2023-02-25 01:28:33'),
(2002, '114.119.153.152', 1, 7, '2023-02-24', 0, '2023-02-25 03:52:29'),
(2003, '114.119.156.59', 1, 2, '2023-02-24', 0, '2023-02-25 03:53:18'),
(2004, '114.119.151.74', 1, 15, '2023-02-24', 0, '2023-02-25 04:42:54'),
(2005, '182.161.67.146', 1, 20, '2023-02-25', 0, '2023-02-25 05:06:34'),
(2006, '34.221.145.165', 1, 0, '2023-02-25', 0, '2023-02-25 05:27:27'),
(2007, '182.189.125.252', 1, 2, '2023-02-25', 0, '2023-02-25 06:07:01'),
(2008, '114.119.142.236', 1, 0, '2023-02-25', 0, '2023-02-25 06:07:16'),
(2009, '50.18.32.108', 1, 0, '2023-02-25', 0, '2023-02-25 06:53:41'),
(2010, '103.74.229.8', 1, 6, '2023-02-25', 0, '2023-02-25 08:39:30'),
(2011, '103.74.229.8', 1, 1, '2023-02-25', 0, '2023-02-25 08:40:26'),
(2012, '66.249.79.185', 1, 11, '2023-02-25', 0, '2023-02-25 09:30:18'),
(2013, '163.172.180.25', 1, 0, '2023-02-25', 0, '2023-02-25 12:58:12'),
(2014, '114.119.146.179', 1, 22, '2023-02-25', 0, '2023-02-25 14:06:05'),
(2015, '114.119.156.223', 1, 0, '2023-02-25', 0, '2023-02-25 14:36:52'),
(2016, '114.119.135.224', 1, 0, '2023-02-25', 0, '2023-02-25 14:38:11'),
(2017, '66.249.79.187', 2, 11, '2023-02-25', 0, '2023-02-25 15:00:47'),
(2018, '114.119.157.57', 1, 12, '2023-02-25', 0, '2023-02-25 14:54:10'),
(2019, '205.210.31.45', 1, 0, '2023-02-25', 0, '2023-02-25 15:29:47'),
(2020, '96.9.249.45', 1, 0, '2023-02-25', 0, '2023-02-25 16:11:02'),
(2021, '54.156.251.192', 1, 0, '2023-02-25', 0, '2023-02-25 16:11:54'),
(2022, '20.108.251.68', 10, 0, '2023-02-26', 0, '2023-02-27 02:21:10'),
(2023, '72.14.201.139', 1, 0, '2023-02-25', 0, '2023-02-25 19:12:15'),
(2024, '103.29.117.30', 5, 0, '2023-02-25', 0, '2023-02-25 19:14:54'),
(2025, '167.248.133.184', 1, 0, '2023-02-25', 0, '2023-02-25 19:48:54'),
(2026, '198.235.24.175', 1, 0, '2023-02-25', 0, '2023-02-25 21:14:00'),
(2027, '103.30.190.185', 1, 0, '2023-02-25', 0, '2023-02-25 21:35:30'),
(2028, '38.154.133.27', 1, 0, '2023-02-25', 0, '2023-02-25 22:04:01'),
(2029, '51.222.253.5', 1, 17, '2023-02-25', 0, '2023-02-25 23:05:52'),
(2030, '114.119.145.121', 1, 26, '2023-02-25', 0, '2023-02-25 23:10:03'),
(2031, '27.115.124.38', 2, 0, '2023-03-12', 0, '2023-03-12 23:07:24'),
(2032, '167.248.133.189', 1, 0, '2023-02-25', 0, '2023-02-25 23:32:15'),
(2033, '114.119.138.230', 1, 16, '2023-02-25', 0, '2023-02-26 00:59:19'),
(2034, '110.67.242.76', 1, 0, '2023-02-25', 0, '2023-02-26 01:00:34'),
(2035, '114.119.158.125', 1, 11, '2023-02-25', 0, '2023-02-26 01:00:42'),
(2036, '114.119.130.105', 1, 10, '2023-02-25', 0, '2023-02-26 01:02:10'),
(2037, '114.119.136.224', 1, 1, '2023-02-25', 0, '2023-02-26 01:03:37'),
(2038, '51.222.253.2', 1, 21, '2023-02-25', 0, '2023-02-26 01:12:32'),
(2039, '193.32.249.160', 1, 11, '2023-02-25', 0, '2023-02-26 01:58:42'),
(2040, '193.32.249.139', 1, 5, '2023-02-25', 0, '2023-02-26 02:18:08'),
(2041, '185.191.171.2', 1, 3, '2023-02-25', 0, '2023-02-26 03:03:42'),
(2042, '103.138.145.62', 1, 0, '2023-02-25', 0, '2023-02-26 03:18:17'),
(2043, '51.222.253.17', 2, 18, '2023-03-11', 0, '2023-03-11 19:01:32'),
(2044, '109.107.177.82', 1, 1, '2023-02-25', 0, '2023-02-26 04:16:08'),
(2045, '51.89.137.250', 1, 0, '2023-02-26', 0, '2023-02-26 05:42:25'),
(2046, '54.68.250.235', 2, 0, '2023-02-26', 0, '2023-02-26 05:57:48'),
(2047, '51.222.253.9', 1, 20, '2023-02-26', 0, '2023-02-26 07:41:16'),
(2048, '185.191.171.6', 1, 12, '2023-02-26', 0, '2023-02-26 08:51:48'),
(2049, '51.222.253.3', 1, 19, '2023-02-26', 0, '2023-02-26 09:46:57'),
(2050, '185.191.171.38', 1, 9, '2023-02-26', 0, '2023-02-26 10:10:58'),
(2051, '185.191.171.25', 1, 4, '2023-02-26', 0, '2023-02-26 11:32:22'),
(2052, '185.191.171.8', 1, 19, '2023-02-26', 0, '2023-02-26 11:45:58'),
(2053, '107.22.0.252', 1, 0, '2023-02-26', 0, '2023-02-26 12:03:09'),
(2054, '185.191.171.8', 1, 14, '2023-02-26', 0, '2023-02-26 12:28:53'),
(2055, '185.191.171.42', 1, 6, '2023-02-26', 0, '2023-02-26 12:50:51'),
(2056, '185.191.171.9', 1, 5, '2023-02-26', 0, '2023-02-26 12:56:18'),
(2057, '185.220.101.82', 1, 0, '2023-02-26', 0, '2023-02-26 13:02:04'),
(2058, '185.191.171.25', 1, 10, '2023-02-26', 0, '2023-02-26 13:49:02'),
(2059, '34.226.221.44', 4, 0, '2023-02-26', 0, '2023-02-26 14:45:14'),
(2060, '213.180.203.84', 1, 0, '2023-02-26', 0, '2023-02-26 17:14:03'),
(2061, '103.251.57.210', 11, 0, '2023-02-26', 0, '2023-02-26 19:11:43'),
(2062, '103.251.57.210', 2, 3, '2023-02-26', 0, '2023-02-26 19:08:01'),
(2063, '114.119.150.203', 1, 0, '2023-02-26', 0, '2023-02-26 18:30:07'),
(2064, '114.119.146.36', 1, 6, '2023-02-26', 0, '2023-02-26 18:32:01'),
(2065, '114.119.128.237', 1, 21, '2023-02-26', 0, '2023-02-26 18:49:14'),
(2066, '103.251.57.210', 1, 4, '2023-02-26', 0, '2023-02-26 19:11:37'),
(2067, '114.119.154.59', 1, 14, '2023-02-26', 0, '2023-02-27 01:28:51'),
(2068, '114.119.139.8', 1, 0, '2023-02-26', 0, '2023-02-27 03:25:58'),
(2069, '114.119.130.177', 1, 27, '2023-02-26', 0, '2023-02-27 03:50:19'),
(2070, '54.202.227.102', 2, 0, '2023-02-27', 0, '2023-02-27 05:00:59'),
(2071, '35.91.8.159', 1, 0, '2023-02-27', 0, '2023-02-27 05:03:17'),
(2072, '34.208.52.50', 1, 0, '2023-02-27', 0, '2023-02-27 05:03:39'),
(2073, '35.165.56.136', 1, 0, '2023-02-27', 0, '2023-02-27 05:06:50'),
(2074, '35.89.103.8', 1, 0, '2023-02-27', 0, '2023-02-27 05:07:16'),
(2075, '114.119.137.80', 1, 13, '2023-02-27', 0, '2023-02-27 09:31:31'),
(2076, '114.119.151.174', 1, 3, '2023-02-27', 0, '2023-02-27 13:46:21'),
(2077, '114.119.138.199', 1, 0, '2023-02-27', 0, '2023-02-27 13:47:40'),
(2078, '114.119.133.120', 1, 3, '2023-02-27', 0, '2023-02-27 15:31:45'),
(2079, '193.235.141.135', 2, 0, '2023-03-02', 0, '2023-03-02 07:20:10'),
(2080, '114.119.151.17', 1, 16, '2023-02-27', 0, '2023-02-27 17:17:59'),
(2081, '114.119.139.172', 1, 0, '2023-02-27', 0, '2023-02-27 22:21:43'),
(2082, '114.119.134.155', 1, 0, '2023-02-27', 0, '2023-02-27 23:23:13'),
(2083, '62.204.41.199', 2, 0, '2023-03-07', 0, '2023-03-08 03:00:46'),
(2084, '42.83.147.53', 3, 0, '2023-03-10', 0, '2023-03-10 05:08:21'),
(2085, '35.217.74.140', 1, 0, '2023-02-27', 0, '2023-02-28 01:52:09'),
(2086, '103.60.175.19', 8, 0, '2023-02-27', 0, '2023-02-28 03:19:23'),
(2087, '176.74.192.85', 1, 0, '2023-02-27', 0, '2023-02-28 03:41:07'),
(2088, '144.217.87.198', 1, 0, '2023-02-27', 0, '2023-02-28 04:57:59'),
(2089, '35.90.179.69', 1, 0, '2023-02-28', 0, '2023-02-28 05:17:25'),
(2090, '114.119.135.207', 1, 23, '2023-02-28', 0, '2023-02-28 07:18:42'),
(2091, '114.119.145.126', 1, 31, '2023-02-28', 0, '2023-02-28 07:19:57'),
(2092, '114.119.157.191', 1, 19, '2023-02-28', 0, '2023-02-28 07:29:21'),
(2093, '66.249.79.189', 1, 11, '2023-02-28', 0, '2023-02-28 09:59:51'),
(2094, '114.119.152.8', 1, 1, '2023-02-28', 0, '2023-02-28 15:42:41'),
(2095, '114.119.158.83', 1, 3, '2023-02-28', 0, '2023-02-28 15:44:06'),
(2096, '114.119.144.41', 1, 18, '2023-02-28', 0, '2023-02-28 15:45:17'),
(2097, '114.119.148.47', 2, 0, '2023-03-02', 0, '2023-03-02 06:45:16'),
(2098, '114.119.128.46', 1, 28, '2023-02-28', 0, '2023-02-28 17:17:16'),
(2099, '114.119.140.27', 1, 5, '2023-02-28', 0, '2023-02-28 17:18:38'),
(2100, '114.119.156.233', 1, 0, '2023-02-28', 0, '2023-02-28 17:19:57'),
(2101, '159.69.49.188', 2, 0, '2023-02-28', 0, '2023-02-28 17:49:08'),
(2102, '193.32.249.133', 1, 1, '2023-02-28', 0, '2023-02-28 18:10:20'),
(2103, '114.119.128.46', 1, 4, '2023-02-28', 0, '2023-02-28 18:49:21'),
(2104, '114.119.159.76', 1, 4, '2023-02-28', 0, '2023-02-28 18:50:59'),
(2105, '146.70.55.222', 1, 0, '2023-02-28', 0, '2023-02-28 18:55:36'),
(2106, '193.32.126.215', 1, 5, '2023-02-28', 0, '2023-02-28 19:02:23'),
(2107, '171.22.30.138', 1, 0, '2023-02-28', 0, '2023-02-28 19:08:15'),
(2108, '131.153.240.178', 1, 0, '2023-02-28', 0, '2023-02-28 20:10:22'),
(2109, '198.235.24.165', 1, 0, '2023-02-28', 0, '2023-02-28 20:32:14'),
(2110, '193.32.249.133', 1, 11, '2023-02-28', 0, '2023-02-28 21:25:42'),
(2111, '176.9.47.58', 1, 1, '2023-02-28', 0, '2023-02-28 21:52:41'),
(2112, '176.9.47.58', 1, 2, '2023-02-28', 0, '2023-02-28 21:52:41'),
(2113, '176.9.47.58', 1, 4, '2023-02-28', 0, '2023-02-28 21:52:41'),
(2114, '103.103.35.18', 11, 0, '2023-02-28', 0, '2023-02-28 22:59:31'),
(2115, '51.89.109.140', 1, 1, '2023-02-28', 0, '2023-03-01 01:01:11'),
(2116, '51.89.109.140', 1, 11, '2023-02-28', 0, '2023-03-01 02:03:38'),
(2117, '114.119.131.123', 1, 3, '2023-02-28', 0, '2023-03-01 02:31:09'),
(2118, '37.111.197.227', 2, 0, '2023-02-28', 0, '2023-03-01 02:53:06'),
(2119, '114.119.144.37', 1, 2, '2023-02-28', 0, '2023-03-01 04:17:44'),
(2120, '114.119.143.252', 1, 1, '2023-02-28', 0, '2023-03-01 04:19:38'),
(2121, '207.46.13.208', 1, 21, '2023-02-28', 0, '2023-03-01 04:59:34'),
(2122, '35.163.125.171', 2, 0, '2023-03-01', 0, '2023-03-01 05:20:06'),
(2123, '3.138.202.30', 1, 0, '2023-03-01', 0, '2023-03-01 06:22:21'),
(2124, '114.119.158.0', 1, 13, '2023-03-01', 0, '2023-03-01 11:03:23'),
(2125, '114.119.130.105', 1, 19, '2023-03-01', 0, '2023-03-01 11:04:37'),
(2126, '114.119.156.138', 1, 4, '2023-03-01', 0, '2023-03-01 11:28:47'),
(2127, '74.208.2.182', 1, 0, '2023-03-01', 0, '2023-03-01 12:31:43'),
(2128, '74.208.2.202', 3, 0, '2023-03-01', 0, '2023-03-01 12:33:23'),
(2129, '74.208.2.222', 4, 0, '2023-03-01', 0, '2023-03-01 12:33:35'),
(2130, '74.208.2.212', 1, 0, '2023-03-01', 0, '2023-03-01 12:33:23'),
(2131, '74.208.2.192', 1, 0, '2023-03-01', 0, '2023-03-01 12:33:25'),
(2132, '114.119.130.26', 1, 4, '2023-03-01', 0, '2023-03-01 12:39:53'),
(2133, '114.119.132.173', 1, 9, '2023-03-01', 0, '2023-03-01 12:41:09'),
(2134, '114.119.146.111', 1, 20, '2023-03-01', 0, '2023-03-01 12:42:30'),
(2135, '114.119.148.33', 1, 0, '2023-03-01', 0, '2023-03-01 12:43:55'),
(2136, '87.236.176.54', 1, 0, '2023-03-01', 0, '2023-03-01 17:13:17'),
(2137, '207.46.13.211', 2, 0, '2023-03-06', 0, '2023-03-06 17:56:35'),
(2138, '52.167.144.61', 1, 0, '2023-03-01', 0, '2023-03-01 19:04:24'),
(2139, '114.119.154.5', 1, 0, '2023-03-01', 0, '2023-03-01 20:14:27'),
(2140, '114.119.132.135', 1, 16, '2023-03-01', 0, '2023-03-01 20:42:02'),
(2141, '205.210.31.44', 1, 0, '2023-03-01', 0, '2023-03-01 21:14:48'),
(2142, '195.201.123.223', 1, 0, '2023-03-01', 0, '2023-03-01 21:51:19'),
(2143, '114.119.136.143', 1, 17, '2023-03-01', 0, '2023-03-01 22:02:22'),
(2144, '114.119.156.30', 1, 10, '2023-03-01', 0, '2023-03-01 22:03:30'),
(2145, '114.119.132.211', 1, 5, '2023-03-01', 0, '2023-03-01 22:53:23'),
(2146, '18.130.223.26', 10, 0, '2023-03-01', 0, '2023-03-02 00:20:07'),
(2147, '44.211.241.57', 1, 0, '2023-03-01', 0, '2023-03-02 03:39:02'),
(2148, '157.90.225.244', 1, 0, '2023-03-01', 0, '2023-03-02 04:32:27'),
(2149, '66.249.79.71', 1, 0, '2023-03-02', 0, '2023-03-02 07:34:52'),
(2150, '114.119.142.131', 1, 28, '2023-03-02', 0, '2023-03-02 09:47:45'),
(2151, '114.119.159.177', 1, 1, '2023-03-02', 0, '2023-03-02 09:49:16'),
(2152, '114.119.148.255', 1, 22, '2023-03-02', 0, '2023-03-02 09:50:44'),
(2153, '114.119.156.235', 1, 7, '2023-03-02', 0, '2023-03-02 09:53:53'),
(2154, '114.119.154.118', 1, 5, '2023-03-02', 0, '2023-03-02 09:54:39'),
(2155, '75.119.221.69', 2, 0, '2023-03-02', 0, '2023-03-02 13:34:25'),
(2156, '185.191.171.26', 1, 7, '2023-03-02', 0, '2023-03-02 13:44:58');
INSERT INTO `web_visitors` (`id`, `ip_address`, `count`, `item_id`, `visited_date`, `user_id`, `entry_at`) VALUES
(2157, '114.119.150.56', 1, 0, '2023-03-02', 0, '2023-03-02 14:37:42'),
(2158, '114.119.156.152', 1, 21, '2023-03-02', 0, '2023-03-02 15:10:17'),
(2159, '114.119.138.194', 1, 15, '2023-03-02', 0, '2023-03-02 16:13:53'),
(2160, '114.119.129.200', 1, 0, '2023-03-02', 0, '2023-03-02 17:46:19'),
(2161, '41.137.43.2', 1, 0, '2023-03-02', 0, '2023-03-02 23:44:10'),
(2162, '114.119.144.17', 1, 0, '2023-03-02', 0, '2023-03-02 23:47:47'),
(2163, '114.119.144.127', 1, 0, '2023-03-02', 0, '2023-03-03 00:38:51'),
(2164, '114.119.136.168', 1, 10, '2023-03-02', 0, '2023-03-03 01:21:40'),
(2165, '114.119.153.49', 1, 5, '2023-03-02', 0, '2023-03-03 01:58:28'),
(2166, '103.251.57.142', 1, 0, '2023-03-02', 0, '2023-03-03 03:21:08'),
(2167, '154.13.248.42', 6, 0, '2023-03-02', 0, '2023-03-03 04:34:59'),
(2168, '46.232.14.227', 1, 0, '2023-03-03', 0, '2023-03-03 06:08:24'),
(2169, '43.142.179.19', 1, 0, '2023-03-03', 0, '2023-03-03 09:37:52'),
(2170, '114.119.165.136', 1, 0, '2023-03-03', 0, '2023-03-03 10:50:52'),
(2171, '114.119.152.196', 1, 16, '2023-03-03', 0, '2023-03-03 11:15:27'),
(2172, '114.119.157.37', 1, 12, '2023-03-03', 0, '2023-03-03 11:20:30'),
(2173, '114.119.156.209', 1, 2, '2023-03-03', 0, '2023-03-03 11:25:40'),
(2174, '114.119.134.192', 1, 22, '2023-03-03', 0, '2023-03-03 11:30:54'),
(2175, '114.119.157.241', 1, 0, '2023-03-03', 0, '2023-03-03 11:36:16'),
(2176, '114.119.136.30', 1, 0, '2023-03-03', 0, '2023-03-03 11:42:00'),
(2177, '135.181.206.245', 1, 0, '2023-03-03', 0, '2023-03-03 15:15:12'),
(2178, '3.253.7.72', 1, 0, '2023-03-03', 0, '2023-03-03 16:58:16'),
(2179, '103.161.152.146', 11, 0, '2023-03-03', 0, '2023-03-03 18:20:26'),
(2180, '103.161.152.146', 1, 4, '2023-03-03', 0, '2023-03-03 18:20:39'),
(2181, '103.161.152.146', 1, 1, '2023-03-03', 0, '2023-03-03 18:21:49'),
(2182, '114.119.152.119', 1, 8, '2023-03-03', 0, '2023-03-03 19:04:45'),
(2183, '72.14.199.216', 3, 0, '2023-03-05', 0, '2023-03-05 19:05:07'),
(2184, '114.119.159.16', 1, 0, '2023-03-03', 0, '2023-03-03 20:57:44'),
(2185, '202.191.122.131', 2, 0, '2023-03-03', 0, '2023-03-03 21:24:40'),
(2186, '202.191.122.131', 1, 6, '2023-03-03', 10000, '2023-03-03 21:25:26'),
(2187, '212.113.116.134', 1, 0, '2023-03-03', 0, '2023-03-03 22:21:05'),
(2188, '72.14.199.218', 6, 0, '2023-03-08', 0, '2023-03-08 15:46:07'),
(2189, '114.119.140.70', 1, 0, '2023-03-03', 0, '2023-03-03 22:53:20'),
(2190, '17.241.219.120', 1, 5, '2023-03-03', 0, '2023-03-04 00:25:01'),
(2191, '101.199.254.202', 1, 0, '2023-03-03', 0, '2023-03-04 00:33:56'),
(2192, '198.235.24.139', 1, 0, '2023-03-03', 0, '2023-03-04 03:28:34'),
(2193, '114.119.137.211', 1, 6, '2023-03-03', 0, '2023-03-04 04:45:37'),
(2194, '114.119.142.183', 1, 11, '2023-03-04', 0, '2023-03-04 05:08:10'),
(2195, '35.88.92.149', 1, 0, '2023-03-04', 0, '2023-03-04 05:24:07'),
(2196, '52.35.83.168', 1, 0, '2023-03-04', 0, '2023-03-04 05:24:33'),
(2197, '52.43.249.159', 1, 0, '2023-03-04', 0, '2023-03-04 05:25:15'),
(2198, '54.189.174.36', 1, 0, '2023-03-04', 0, '2023-03-04 05:28:24'),
(2199, '114.119.138.13', 1, 21, '2023-03-04', 0, '2023-03-04 05:30:04'),
(2200, '34.214.188.1', 1, 0, '2023-03-04', 0, '2023-03-04 05:32:04'),
(2201, '114.119.155.149', 1, 2, '2023-03-04', 0, '2023-03-04 05:48:27'),
(2202, '18.144.22.240', 1, 0, '2023-03-04', 0, '2023-03-04 06:27:48'),
(2203, '66.249.79.219', 3, 0, '2023-03-05', 0, '2023-03-05 17:21:05'),
(2204, '114.119.132.89', 1, 0, '2023-03-04', 0, '2023-03-04 08:57:58'),
(2205, '114.119.134.107', 1, 1, '2023-03-04', 0, '2023-03-04 09:48:02'),
(2206, '17.241.219.85', 1, 5, '2023-03-04', 0, '2023-03-04 10:16:04'),
(2207, '185.138.241.33', 4, 0, '2023-03-05', 0, '2023-03-05 16:13:03'),
(2208, '66.249.79.217', 1, 0, '2023-03-04', 0, '2023-03-04 11:53:51'),
(2209, '103.124.225.73', 3, 0, '2023-03-04', 0, '2023-03-04 13:15:27'),
(2210, '160.202.147.4', 1, 0, '2023-03-04', 0, '2023-03-04 13:14:40'),
(2211, '114.119.141.228', 1, 24, '2023-03-04', 0, '2023-03-04 15:23:21'),
(2212, '72.13.46.5', 3, 0, '2023-03-04', 0, '2023-03-04 16:14:51'),
(2213, '198.235.24.144', 1, 0, '2023-03-04', 0, '2023-03-04 17:11:03'),
(2214, '205.210.31.39', 1, 0, '2023-03-04', 0, '2023-03-04 17:19:05'),
(2215, '114.119.132.12', 1, 0, '2023-03-04', 0, '2023-03-04 17:29:39'),
(2216, '114.119.138.48', 1, 0, '2023-03-04', 0, '2023-03-04 17:34:38'),
(2217, '103.114.96.45', 2, 0, '2023-03-04', 0, '2023-03-04 19:51:07'),
(2218, '93.159.230.87', 1, 0, '2023-03-04', 0, '2023-03-04 20:15:21'),
(2219, '205.210.31.29', 1, 0, '2023-03-04', 0, '2023-03-04 20:23:43'),
(2220, '193.235.141.156', 1, 0, '2023-03-04', 0, '2023-03-04 21:18:32'),
(2221, '1.192.192.4', 1, 0, '2023-03-04', 0, '2023-03-04 22:12:28'),
(2222, '185.191.171.36', 1, 13, '2023-03-04', 0, '2023-03-04 22:50:58'),
(2223, '72.14.199.220', 2, 0, '2023-03-06', 0, '2023-03-06 08:45:50'),
(2224, '114.119.136.95', 1, 1, '2023-03-04', 0, '2023-03-05 00:48:14'),
(2225, '114.119.151.80', 1, 0, '2023-03-04', 0, '2023-03-05 01:01:50'),
(2226, '114.119.158.18', 1, 6, '2023-03-04', 0, '2023-03-05 01:37:15'),
(2227, '114.119.138.98', 1, 3, '2023-03-04', 0, '2023-03-05 02:48:32'),
(2228, '66.249.79.221', 5, 0, '2023-03-08', 0, '2023-03-08 12:05:37'),
(2229, '54.203.220.247', 1, 0, '2023-03-05', 0, '2023-03-05 05:39:37'),
(2230, '69.171.249.15', 1, 0, '2023-03-05', 0, '2023-03-05 08:21:14'),
(2231, '66.220.149.23', 1, 0, '2023-03-05', 0, '2023-03-05 08:21:47'),
(2232, '20.168.11.253', 1, 0, '2023-03-05', 0, '2023-03-05 10:23:44'),
(2233, '23.94.163.101', 2, 0, '2023-03-05', 0, '2023-03-05 11:59:04'),
(2234, '167.248.133.42', 1, 0, '2023-03-05', 0, '2023-03-05 12:07:51'),
(2235, '114.119.150.9', 1, 20, '2023-03-05', 0, '2023-03-05 12:55:12'),
(2236, '46.163.72.193', 1, 0, '2023-03-05', 0, '2023-03-05 13:07:18'),
(2237, '114.119.130.30', 1, 31, '2023-03-05', 0, '2023-03-05 13:49:50'),
(2238, '103.250.145.188', 1, 0, '2023-03-05', 0, '2023-03-05 14:56:06'),
(2239, '205.210.31.48', 1, 0, '2023-03-05', 0, '2023-03-05 15:05:16'),
(2240, '18.224.151.214', 2, 0, '2023-03-07', 0, '2023-03-07 18:47:51'),
(2241, '114.119.159.228', 1, 3, '2023-03-05', 0, '2023-03-05 20:41:40'),
(2242, '114.119.153.186', 1, 4, '2023-03-05', 0, '2023-03-05 20:48:05'),
(2243, '114.119.134.203', 1, 0, '2023-03-05', 0, '2023-03-05 20:52:07'),
(2244, '144.217.135.184', 11, 0, '2023-03-05', 0, '2023-03-05 23:30:20'),
(2245, '149.56.150.193', 1, 0, '2023-03-05', 0, '2023-03-05 23:30:42'),
(2246, '138.197.187.82', 25, 0, '2023-03-05', 0, '2023-03-06 01:08:22'),
(2247, '138.197.187.82', 1, 4, '2023-03-05', 0, '2023-03-06 01:08:22'),
(2248, '138.197.187.82', 1, 3, '2023-03-05', 0, '2023-03-06 01:08:22'),
(2249, '138.197.187.82', 1, 1, '2023-03-05', 0, '2023-03-06 01:08:22'),
(2250, '138.197.187.82', 1, 6, '2023-03-05', 0, '2023-03-06 01:08:22'),
(2251, '138.197.187.82', 1, 5, '2023-03-05', 0, '2023-03-06 01:08:22'),
(2252, '138.197.187.82', 1, 2, '2023-03-05', 0, '2023-03-06 01:08:22'),
(2253, '182.161.67.146', 2, 3, '2023-03-06', 40010, '2023-03-07 04:04:45'),
(2254, '18.232.90.230', 1, 0, '2023-03-06', 0, '2023-03-06 05:24:59'),
(2255, '35.160.68.70', 2, 0, '2023-03-06', 0, '2023-03-06 05:46:04'),
(2256, '114.119.157.84', 1, 0, '2023-03-06', 0, '2023-03-06 06:11:38'),
(2257, '114.119.159.62', 1, 13, '2023-03-06', 0, '2023-03-06 07:28:01'),
(2258, '114.119.148.198', 1, 1, '2023-03-06', 0, '2023-03-06 08:33:44'),
(2259, '114.119.156.44', 1, 0, '2023-03-06', 0, '2023-03-06 09:38:56'),
(2260, '114.119.152.54', 1, 0, '2023-03-06', 0, '2023-03-06 10:42:32'),
(2261, '114.119.147.60', 1, 0, '2023-03-06', 0, '2023-03-06 11:39:44'),
(2262, '185.191.171.26', 1, 9, '2023-03-06', 0, '2023-03-06 12:45:44'),
(2263, '185.191.171.23', 1, 20, '2023-03-06', 0, '2023-03-06 12:48:15'),
(2264, '114.119.154.166', 1, 23, '2023-03-06', 0, '2023-03-06 13:03:19'),
(2265, '114.119.150.15', 1, 1, '2023-03-06', 0, '2023-03-06 13:56:41'),
(2266, '114.119.155.69', 1, 0, '2023-03-06', 0, '2023-03-06 14:14:40'),
(2267, '114.119.135.65', 2, 0, '2023-03-09', 0, '2023-03-10 00:11:39'),
(2268, '185.191.171.9', 1, 18, '2023-03-06', 0, '2023-03-06 14:24:39'),
(2269, '157.55.39.217', 1, 0, '2023-03-06', 0, '2023-03-06 19:33:25'),
(2270, '17.241.219.248', 1, 5, '2023-03-06', 0, '2023-03-06 21:21:43'),
(2271, '66.249.75.208', 1, 1, '2023-03-06', 0, '2023-03-06 23:06:29'),
(2272, '114.119.159.39', 1, 19, '2023-03-06', 0, '2023-03-07 01:16:17'),
(2273, '114.119.129.208', 1, 10, '2023-03-06', 0, '2023-03-07 01:27:41'),
(2274, '182.161.67.146', 1, 5, '2023-03-06', 40010, '2023-03-07 03:48:45'),
(2275, '182.161.67.146', 1, 1, '2023-03-06', 40010, '2023-03-07 03:52:03'),
(2276, '182.161.67.146', 1, 2, '2023-03-06', 40010, '2023-03-07 04:00:28'),
(2277, '192.3.108.34', 2, 0, '2023-03-06', 0, '2023-03-07 04:24:06'),
(2278, '17.241.75.123', 1, 0, '2023-03-07', 0, '2023-03-07 05:54:20'),
(2279, '66.249.69.253', 1, 0, '2023-03-07', 0, '2023-03-07 10:27:43'),
(2280, '193.235.141.17', 2, 0, '2023-03-09', 0, '2023-03-10 01:34:21'),
(2281, '114.119.128.196', 1, 3, '2023-03-07', 0, '2023-03-07 12:59:36'),
(2282, '114.119.155.217', 1, 0, '2023-03-07', 0, '2023-03-07 13:05:34'),
(2283, '114.119.142.100', 1, 22, '2023-03-07', 0, '2023-03-07 13:12:31'),
(2284, '114.119.156.21', 1, 17, '2023-03-07', 0, '2023-03-07 13:22:17'),
(2285, '114.119.145.192', 1, 27, '2023-03-07', 0, '2023-03-07 17:19:31'),
(2286, '106.193.93.199', 7, 0, '2023-03-07', 0, '2023-03-07 17:45:33'),
(2287, '114.119.151.60', 1, 14, '2023-03-07', 0, '2023-03-07 18:21:49'),
(2288, '114.119.133.204', 1, 23, '2023-03-07', 0, '2023-03-07 20:54:44'),
(2289, '103.127.7.104', 7, 0, '2023-03-07', 0, '2023-03-07 21:01:48'),
(2290, '114.119.130.18', 1, 20, '2023-03-07', 0, '2023-03-07 22:42:04'),
(2291, '114.119.154.39', 1, 19, '2023-03-07', 0, '2023-03-07 23:29:50'),
(2292, '114.119.128.59', 1, 0, '2023-03-07', 0, '2023-03-07 23:51:29'),
(2293, '198.235.24.164', 2, 0, '2023-03-11', 0, '2023-03-11 06:00:34'),
(2294, '114.119.139.207', 1, 0, '2023-03-07', 0, '2023-03-08 00:04:02'),
(2295, '114.119.148.187', 1, 0, '2023-03-07', 0, '2023-03-08 00:16:33'),
(2296, '114.119.158.71', 1, 5, '2023-03-07', 0, '2023-03-08 02:33:08'),
(2297, '114.119.155.118', 1, 0, '2023-03-07', 0, '2023-03-08 02:50:00'),
(2298, '63.35.194.55', 1, 0, '2023-03-07', 0, '2023-03-08 03:09:15'),
(2299, '3.252.37.129', 1, 0, '2023-03-07', 0, '2023-03-08 04:04:03'),
(2300, '66.249.79.217', 1, 5, '2023-03-07', 0, '2023-03-08 04:22:07'),
(2301, '185.85.163.242', 1, 0, '2023-03-08', 0, '2023-03-08 05:39:45'),
(2302, '52.210.21.6', 1, 0, '2023-03-08', 0, '2023-03-08 07:10:18'),
(2303, '72.253.93.42', 1, 0, '2023-03-08', 0, '2023-03-08 09:39:28'),
(2304, '87.236.176.24', 1, 0, '2023-03-08', 0, '2023-03-08 09:44:59'),
(2305, '114.119.154.6', 1, 0, '2023-03-08', 0, '2023-03-08 11:53:59'),
(2306, '3.23.99.205', 1, 0, '2023-03-08', 0, '2023-03-08 12:53:02'),
(2307, '114.119.134.212', 1, 12, '2023-03-08', 0, '2023-03-08 13:15:07'),
(2308, '114.119.136.78', 1, 4, '2023-03-08', 0, '2023-03-08 14:53:45'),
(2309, '114.119.150.209', 1, 7, '2023-03-08', 0, '2023-03-08 16:21:01'),
(2310, '17.241.75.89', 1, 0, '2023-03-08', 0, '2023-03-08 17:10:53'),
(2311, '114.119.146.41', 1, 2, '2023-03-08', 0, '2023-03-08 17:52:40'),
(2312, '162.142.125.215', 1, 0, '2023-03-08', 0, '2023-03-08 18:20:21'),
(2313, '114.119.139.166', 1, 4, '2023-03-08', 0, '2023-03-08 21:08:24'),
(2314, '114.119.157.158', 1, 13, '2023-03-08', 0, '2023-03-08 21:13:44'),
(2315, '114.119.149.157', 1, 9, '2023-03-08', 0, '2023-03-08 21:29:29'),
(2316, '185.191.171.33', 1, 2, '2023-03-08', 0, '2023-03-08 21:44:50'),
(2317, '185.191.171.6', 1, 20, '2023-03-08', 0, '2023-03-08 23:17:37'),
(2318, '185.191.171.18', 2, 21, '2023-03-09', 0, '2023-03-09 15:47:40'),
(2319, '185.191.171.14', 1, 22, '2023-03-08', 0, '2023-03-09 00:22:10'),
(2320, '130.255.166.26', 1, 0, '2023-03-08', 0, '2023-03-09 00:57:05'),
(2321, '192.133.77.17', 1, 0, '2023-03-08', 0, '2023-03-09 01:25:08'),
(2322, '114.119.152.142', 1, 0, '2023-03-08', 0, '2023-03-09 01:38:19'),
(2323, '185.191.171.6', 2, 8, '2023-03-09', 0, '2023-03-09 12:01:48'),
(2324, '185.191.171.7', 1, 15, '2023-03-08', 0, '2023-03-09 04:09:24'),
(2325, '185.191.171.37', 1, 5, '2023-03-08', 0, '2023-03-09 04:22:34'),
(2326, '185.191.171.10', 1, 2, '2023-03-08', 0, '2023-03-09 04:49:42'),
(2327, '185.191.171.24', 1, 18, '2023-03-08', 0, '2023-03-09 04:57:43'),
(2328, '185.191.171.11', 1, 1, '2023-03-09', 0, '2023-03-09 05:03:26'),
(2329, '185.191.171.26', 1, 1, '2023-03-09', 0, '2023-03-09 05:11:20'),
(2330, '75.157.149.250', 8, 0, '2023-03-09', 0, '2023-03-09 05:33:37'),
(2331, '35.89.188.150', 1, 0, '2023-03-09', 0, '2023-03-09 05:38:20'),
(2332, '54.213.253.156', 1, 0, '2023-03-09', 0, '2023-03-09 05:38:21'),
(2333, '34.221.34.222', 1, 0, '2023-03-09', 0, '2023-03-09 05:38:31'),
(2334, '52.11.8.112', 1, 0, '2023-03-09', 0, '2023-03-09 05:38:42'),
(2335, '185.191.171.22', 1, 11, '2023-03-09', 0, '2023-03-09 05:39:56'),
(2336, '35.93.58.141', 1, 0, '2023-03-09', 0, '2023-03-09 05:49:06'),
(2337, '185.191.171.16', 1, 1, '2023-03-09', 0, '2023-03-09 06:01:15'),
(2338, '114.119.130.92', 1, 1, '2023-03-09', 0, '2023-03-09 06:29:06'),
(2339, '114.119.138.67', 1, 6, '2023-03-09', 0, '2023-03-09 06:33:51'),
(2340, '114.119.129.33', 1, 28, '2023-03-09', 0, '2023-03-09 06:38:51'),
(2341, '114.119.146.4', 1, 21, '2023-03-09', 0, '2023-03-09 06:43:55'),
(2342, '3.236.216.187', 1, 0, '2023-03-09', 0, '2023-03-09 06:59:06'),
(2343, '185.191.171.11', 1, 12, '2023-03-09', 0, '2023-03-09 08:45:34'),
(2344, '185.191.171.17', 1, 0, '2023-03-09', 0, '2023-03-09 10:54:32'),
(2345, '185.191.171.17', 1, 10, '2023-03-09', 0, '2023-03-09 12:36:43'),
(2346, '185.191.171.42', 2, 17, '2023-03-14', 0, '2023-03-15 02:43:58'),
(2347, '174.176.136.200', 81, 0, '2023-03-10', 0, '2023-03-10 13:12:11'),
(2348, '174.176.136.200', 3, 1, '2023-03-09', 0, '2023-03-09 14:14:22'),
(2349, '174.176.136.200', 3, 2, '2023-03-09', 0, '2023-03-09 14:12:35'),
(2350, '174.176.136.200', 3, 4, '2023-03-09', 0, '2023-03-09 14:11:46'),
(2351, '174.176.136.200', 3, 3, '2023-03-09', 0, '2023-03-09 14:22:55'),
(2352, '174.176.136.200', 2, 5, '2023-03-09', 0, '2023-03-09 14:28:43'),
(2353, '129.146.158.17', 1, 2, '2023-03-09', 0, '2023-03-09 14:38:21'),
(2354, '129.146.158.17', 1, 4, '2023-03-09', 0, '2023-03-09 14:38:26'),
(2355, '129.146.158.17', 1, 1, '2023-03-09', 0, '2023-03-09 14:41:12'),
(2356, '129.146.158.17', 1, 3, '2023-03-09', 0, '2023-03-09 14:48:47'),
(2357, '129.146.158.17', 1, 5, '2023-03-09', 0, '2023-03-09 14:49:17'),
(2358, '103.198.138.35', 6, 0, '2023-03-09', 0, '2023-03-09 18:15:20'),
(2359, '202.134.14.128', 1, 0, '2023-03-09', 0, '2023-03-09 16:31:38'),
(2360, '185.191.171.9', 1, 7, '2023-03-09', 0, '2023-03-09 16:49:26'),
(2361, '87.236.176.103', 1, 0, '2023-03-09', 0, '2023-03-09 17:01:51'),
(2362, '208.76.48.2', 1, 0, '2023-03-09', 0, '2023-03-09 17:38:14'),
(2363, '185.191.171.42', 1, 3, '2023-03-09', 0, '2023-03-09 18:04:32'),
(2364, '185.191.171.40', 1, 6, '2023-03-09', 0, '2023-03-09 19:57:28'),
(2365, '185.191.171.26', 2, 0, '2023-03-10', 0, '2023-03-10 14:28:52'),
(2366, '114.119.145.183', 1, 0, '2023-03-09', 0, '2023-03-09 22:39:22'),
(2367, '73.1.249.191', 1, 0, '2023-03-09', 0, '2023-03-09 23:05:53'),
(2368, '200.4.142.32', 1, 0, '2023-03-09', 0, '2023-03-09 23:25:54'),
(2369, '66.249.91.243', 2, 0, '2023-03-10', 0, '2023-03-10 06:00:34'),
(2370, '66.249.91.245', 1, 0, '2023-03-09', 0, '2023-03-10 00:05:16'),
(2371, '114.119.130.91', 1, 1, '2023-03-09', 0, '2023-03-10 00:32:12'),
(2372, '114.119.141.42', 1, 5, '2023-03-09', 0, '2023-03-10 00:36:28'),
(2373, '114.119.134.9', 1, 18, '2023-03-09', 0, '2023-03-10 00:42:42'),
(2374, '114.119.130.99', 1, 10, '2023-03-09', 0, '2023-03-10 00:51:50'),
(2375, '34.136.172.129', 4, 0, '2023-03-09', 0, '2023-03-10 01:31:04'),
(2376, '35.188.46.220', 1, 0, '2023-03-09', 0, '2023-03-10 01:31:04'),
(2377, '104.154.135.146', 1, 0, '2023-03-09', 0, '2023-03-10 01:31:04'),
(2378, '114.119.156.3', 1, 1, '2023-03-09', 0, '2023-03-10 01:48:18'),
(2379, '31.13.127.30', 1, 0, '2023-03-09', 0, '2023-03-10 02:07:43'),
(2380, '31.13.115.117', 1, 0, '2023-03-09', 0, '2023-03-10 02:07:46'),
(2381, '69.171.249.120', 1, 0, '2023-03-09', 0, '2023-03-10 02:08:19'),
(2382, '185.191.171.38', 1, 23, '2023-03-09', 0, '2023-03-10 02:17:20'),
(2383, '103.29.124.126', 7, 0, '2023-03-11', 40010, '2023-03-11 16:49:10'),
(2384, '27.115.124.66', 1, 0, '2023-03-09', 0, '2023-03-10 03:07:00'),
(2385, '185.191.171.16', 1, 19, '2023-03-09', 0, '2023-03-10 03:40:55'),
(2386, '185.191.171.10', 1, 4, '2023-03-09', 0, '2023-03-10 04:28:39'),
(2387, '35.91.49.73', 1, 0, '2023-03-10', 0, '2023-03-10 05:14:02'),
(2388, '18.236.115.246', 1, 0, '2023-03-10', 0, '2023-03-10 05:14:34'),
(2389, '18.237.171.68', 1, 0, '2023-03-10', 0, '2023-03-10 05:17:07'),
(2390, '54.201.203.139', 1, 0, '2023-03-10', 0, '2023-03-10 05:17:09'),
(2391, '34.219.191.204', 1, 0, '2023-03-10', 0, '2023-03-10 05:17:28'),
(2392, '54.201.248.246', 1, 0, '2023-03-10', 0, '2023-03-10 05:17:30'),
(2393, '35.90.165.2', 1, 0, '2023-03-10', 0, '2023-03-10 05:20:56'),
(2394, '185.191.171.14', 1, 14, '2023-03-10', 0, '2023-03-10 05:23:29'),
(2395, '114.119.144.163', 1, 0, '2023-03-10', 0, '2023-03-10 05:41:19'),
(2396, '185.191.171.42', 1, 13, '2023-03-10', 0, '2023-03-10 05:45:16'),
(2397, '185.191.171.18', 1, 5, '2023-03-10', 0, '2023-03-10 06:02:48'),
(2398, '185.191.171.4', 1, 3, '2023-03-10', 0, '2023-03-10 06:46:15'),
(2399, '185.191.171.38', 1, 10, '2023-03-10', 0, '2023-03-10 07:03:35'),
(2400, '66.220.149.10', 1, 0, '2023-03-10', 0, '2023-03-10 07:19:25'),
(2401, '173.252.95.23', 1, 0, '2023-03-10', 0, '2023-03-10 07:20:00'),
(2402, '198.235.24.153', 1, 0, '2023-03-10', 0, '2023-03-10 07:42:53'),
(2403, '185.191.171.9', 1, 14, '2023-03-10', 0, '2023-03-10 08:58:34'),
(2404, '205.210.31.16', 1, 0, '2023-03-10', 0, '2023-03-10 10:47:02'),
(2405, '185.191.171.14', 1, 11, '2023-03-10', 0, '2023-03-10 11:03:23'),
(2406, '185.191.171.12', 1, 16, '2023-03-10', 0, '2023-03-10 11:30:35'),
(2407, '174.176.136.200', 1, 22, '2023-03-10', 0, '2023-03-10 13:09:23'),
(2408, '185.191.171.13', 1, 6, '2023-03-10', 0, '2023-03-10 14:08:19'),
(2409, '66.249.91.240', 1, 0, '2023-03-10', 0, '2023-03-10 14:19:19'),
(2410, '185.191.171.33', 1, 19, '2023-03-10', 0, '2023-03-10 15:08:06'),
(2411, '185.191.171.26', 1, 5, '2023-03-10', 0, '2023-03-10 16:19:00'),
(2412, '185.191.171.42', 1, 16, '2023-03-10', 0, '2023-03-10 16:57:42'),
(2413, '114.119.148.161', 1, 21, '2023-03-10', 0, '2023-03-10 18:53:01'),
(2414, '173.239.232.18', 21, 0, '2023-03-10', 0, '2023-03-10 19:28:01'),
(2415, '173.239.232.18', 2, 34, '2023-03-10', 0, '2023-03-10 19:17:07'),
(2416, '173.239.232.18', 2, 23, '2023-03-10', 0, '2023-03-10 19:21:17'),
(2417, '173.239.232.18', 1, 1, '2023-03-10', 0, '2023-03-10 19:18:15'),
(2418, '173.239.232.18', 1, 26, '2023-03-10', 0, '2023-03-10 19:18:31'),
(2419, '173.239.232.18', 1, 30, '2023-03-10', 0, '2023-03-10 19:18:44'),
(2420, '173.239.232.18', 1, 29, '2023-03-10', 0, '2023-03-10 19:20:08'),
(2421, '173.239.232.18', 1, 21, '2023-03-10', 0, '2023-03-10 19:20:36'),
(2422, '173.239.232.18', 1, 38, '2023-03-10', 0, '2023-03-10 19:20:58'),
(2423, '173.239.232.18', 1, 32, '2023-03-10', 0, '2023-03-10 19:21:46'),
(2424, '114.119.136.174', 1, 6, '2023-03-10', 0, '2023-03-10 19:23:10'),
(2425, '173.239.232.18', 1, 37, '2023-03-10', 0, '2023-03-10 19:24:08'),
(2426, '173.239.232.18', 1, 31, '2023-03-10', 0, '2023-03-10 19:26:30'),
(2427, '173.239.232.18', 1, 36, '2023-03-10', 0, '2023-03-10 19:27:15'),
(2428, '173.239.232.18', 1, 35, '2023-03-10', 0, '2023-03-10 19:27:31'),
(2429, '114.119.135.199', 1, 3, '2023-03-10', 0, '2023-03-10 20:31:52'),
(2430, '114.119.135.152', 1, 24, '2023-03-10', 0, '2023-03-10 20:36:47'),
(2431, '114.119.135.53', 1, 0, '2023-03-10', 0, '2023-03-10 20:41:51'),
(2432, '114.119.156.46', 1, 6, '2023-03-10', 0, '2023-03-10 21:34:30'),
(2433, '114.119.156.31', 1, 3, '2023-03-10', 0, '2023-03-10 21:38:12'),
(2434, '185.191.171.18', 1, 4, '2023-03-10', 0, '2023-03-10 21:40:15'),
(2435, '185.191.171.45', 1, 15, '2023-03-10', 0, '2023-03-10 23:35:57'),
(2436, '64.233.172.164', 1, 0, '2023-03-10', 0, '2023-03-11 02:17:57'),
(2437, '34.87.94.148', 1, 0, '2023-03-10', 0, '2023-03-11 02:58:19'),
(2438, '114.119.154.77', 1, 32, '2023-03-10', 0, '2023-03-11 03:40:28'),
(2439, '114.119.145.192', 1, 0, '2023-03-10', 0, '2023-03-11 03:44:59'),
(2440, '114.119.151.89', 1, 0, '2023-03-10', 0, '2023-03-11 04:04:36'),
(2441, '66.220.149.20', 1, 0, '2023-03-10', 0, '2023-03-11 04:05:45'),
(2442, '66.220.149.1', 1, 0, '2023-03-10', 0, '2023-03-11 04:05:57'),
(2443, '66.220.149.26', 1, 0, '2023-03-10', 0, '2023-03-11 04:05:58'),
(2444, '114.119.139.202', 1, 4, '2023-03-11', 0, '2023-03-11 05:17:17'),
(2445, '114.119.146.195', 1, 11, '2023-03-11', 0, '2023-03-11 05:23:49'),
(2446, '114.119.150.101', 1, 0, '2023-03-11', 0, '2023-03-11 05:26:50'),
(2447, '35.89.245.94', 1, 0, '2023-03-11', 0, '2023-03-11 05:29:39'),
(2448, '114.119.156.227', 1, 0, '2023-03-11', 0, '2023-03-11 06:04:56'),
(2449, '114.119.150.57', 1, 15, '2023-03-11', 0, '2023-03-11 08:04:16'),
(2450, '114.119.150.90', 1, 16, '2023-03-11', 0, '2023-03-11 08:11:41'),
(2451, '54.241.110.196', 1, 0, '2023-03-11', 0, '2023-03-11 09:07:13'),
(2452, '196.242.114.244', 1, 0, '2023-03-11', 0, '2023-03-11 12:06:23'),
(2453, '196.242.20.15', 9, 0, '2023-03-11', 0, '2023-03-11 12:08:27'),
(2454, '196.242.20.15', 1, 37, '2023-03-11', 0, '2023-03-11 12:07:17'),
(2455, '196.242.20.15', 1, 38, '2023-03-11', 0, '2023-03-11 12:07:40'),
(2456, '196.242.20.15', 1, 39, '2023-03-11', 0, '2023-03-11 12:07:55'),
(2457, '196.242.20.15', 1, 40, '2023-03-11', 0, '2023-03-11 12:08:16'),
(2458, '54.159.7.134', 1, 0, '2023-03-11', 0, '2023-03-11 13:57:13'),
(2459, '114.119.155.104', 1, 2, '2023-03-11', 0, '2023-03-11 14:04:06'),
(2460, '114.119.158.157', 1, 8, '2023-03-11', 0, '2023-03-11 14:08:27'),
(2461, '114.119.152.56', 1, 34, '2023-03-11', 0, '2023-03-11 14:20:27'),
(2462, '114.119.137.220', 1, 4, '2023-03-11', 0, '2023-03-11 14:52:46'),
(2463, '114.119.156.102', 1, 8, '2023-03-11', 0, '2023-03-11 14:57:39'),
(2464, '114.119.149.1', 1, 3, '2023-03-11', 0, '2023-03-11 15:02:31'),
(2465, '114.119.147.205', 1, 0, '2023-03-11', 0, '2023-03-11 15:08:08'),
(2466, '114.119.131.68', 1, 17, '2023-03-11', 0, '2023-03-11 15:18:10'),
(2467, '114.119.128.85', 1, 0, '2023-03-11', 0, '2023-03-11 15:27:27'),
(2468, '216.131.109.46', 1, 1, '2023-03-11', 0, '2023-03-11 17:04:05'),
(2469, '52.167.144.73', 1, 0, '2023-03-11', 0, '2023-03-11 18:09:25'),
(2470, '212.237.121.207', 1, 0, '2023-03-11', 0, '2023-03-11 18:33:25'),
(2471, '51.222.253.16', 1, 4, '2023-03-11', 0, '2023-03-11 18:40:40'),
(2472, '51.222.253.4', 1, 3, '2023-03-11', 0, '2023-03-11 18:44:32'),
(2473, '51.222.253.4', 1, 8, '2023-03-11', 0, '2023-03-11 18:48:43'),
(2474, '51.222.253.9', 1, 39, '2023-03-11', 0, '2023-03-11 18:52:48'),
(2475, '51.222.253.5', 1, 6, '2023-03-11', 0, '2023-03-11 18:57:23'),
(2476, '51.222.253.10', 1, 19, '2023-03-11', 0, '2023-03-11 19:05:45'),
(2477, '51.222.253.7', 1, 16, '2023-03-11', 0, '2023-03-11 19:09:58'),
(2478, '51.222.253.16', 1, 12, '2023-03-11', 0, '2023-03-11 19:14:09'),
(2479, '51.222.253.5', 1, 11, '2023-03-11', 0, '2023-03-11 19:18:47'),
(2480, '51.222.253.14', 1, 17, '2023-03-11', 0, '2023-03-11 19:28:27'),
(2481, '51.222.253.16', 1, 9, '2023-03-11', 0, '2023-03-11 19:33:15'),
(2482, '51.222.253.12', 1, 13, '2023-03-11', 0, '2023-03-11 19:37:50'),
(2483, '51.222.253.12', 1, 14, '2023-03-11', 0, '2023-03-11 19:42:43'),
(2484, '51.222.253.2', 1, 20, '2023-03-11', 0, '2023-03-11 19:47:15'),
(2485, '51.222.253.11', 1, 7, '2023-03-11', 0, '2023-03-11 19:51:32'),
(2486, '118.179.13.69', 2, 0, '2023-03-11', 0, '2023-03-11 19:58:20'),
(2487, '40.77.167.177', 1, 0, '2023-03-11', 0, '2023-03-11 20:01:00'),
(2488, '51.222.253.9', 1, 21, '2023-03-11', 0, '2023-03-11 20:01:11'),
(2489, '51.222.253.3', 1, 44, '2023-03-11', 0, '2023-03-11 20:05:51'),
(2490, '51.222.253.18', 1, 28, '2023-03-11', 0, '2023-03-11 20:10:47'),
(2491, '51.222.253.10', 1, 34, '2023-03-11', 0, '2023-03-11 20:15:21'),
(2492, '157.55.39.218', 1, 27, '2023-03-11', 0, '2023-03-11 20:17:38'),
(2493, '157.55.39.218', 1, 47, '2023-03-11', 0, '2023-03-11 20:17:39'),
(2494, '157.55.39.218', 1, 7, '2023-03-11', 0, '2023-03-11 20:17:39'),
(2495, '157.55.39.218', 1, 46, '2023-03-11', 0, '2023-03-11 20:17:40'),
(2496, '157.55.39.218', 1, 24, '2023-03-11', 0, '2023-03-11 20:17:40'),
(2497, '157.55.39.218', 1, 18, '2023-03-11', 0, '2023-03-11 20:17:43'),
(2498, '157.55.39.218', 1, 17, '2023-03-11', 0, '2023-03-11 20:17:43'),
(2499, '157.55.39.218', 1, 2, '2023-03-11', 0, '2023-03-11 20:17:43'),
(2500, '157.55.39.218', 1, 3, '2023-03-11', 0, '2023-03-11 20:17:43'),
(2501, '52.167.144.137', 3, 30, '2023-03-15', 0, '2023-03-15 13:49:26'),
(2502, '40.77.167.204', 4, 38, '2023-03-15', 0, '2023-03-15 17:15:13'),
(2503, '40.77.167.204', 4, 31, '2023-03-15', 0, '2023-03-15 16:49:52'),
(2504, '40.77.167.204', 4, 36, '2023-03-15', 0, '2023-03-15 23:26:38'),
(2505, '52.167.144.102', 3, 40, '2023-03-15', 0, '2023-03-15 23:02:34'),
(2506, '52.167.144.102', 2, 32, '2023-03-15', 0, '2023-03-15 10:09:54'),
(2507, '52.167.144.102', 2, 15, '2023-03-14', 0, '2023-03-14 06:15:46'),
(2508, '52.167.144.102', 2, 45, '2023-03-13', 0, '2023-03-13 18:04:42'),
(2509, '52.167.144.102', 2, 20, '2023-03-15', 0, '2023-03-15 17:49:37'),
(2510, '52.167.144.137', 5, 16, '2023-03-15', 0, '2023-03-15 17:15:18'),
(2511, '52.167.144.137', 2, 28, '2023-03-14', 0, '2023-03-14 09:55:02'),
(2512, '52.167.144.137', 4, 23, '2023-03-15', 0, '2023-03-15 15:24:15'),
(2513, '52.167.144.27', 1, 43, '2023-03-11', 0, '2023-03-11 20:18:01'),
(2514, '40.77.167.146', 4, 19, '2023-03-15', 0, '2023-03-15 15:52:43'),
(2515, '40.77.167.146', 3, 8, '2023-03-15', 0, '2023-03-15 21:07:03'),
(2516, '40.77.167.146', 3, 37, '2023-03-15', 0, '2023-03-15 21:26:57'),
(2517, '40.77.167.146', 4, 9, '2023-03-15', 0, '2023-03-15 16:12:05'),
(2518, '52.167.144.102', 2, 35, '2023-03-13', 0, '2023-03-13 19:22:59'),
(2519, '52.167.144.102', 2, 21, '2023-03-15', 0, '2023-03-15 10:34:56'),
(2520, '52.167.144.102', 3, 22, '2023-03-15', 0, '2023-03-15 19:08:34'),
(2521, '52.167.144.102', 2, 41, '2023-03-13', 0, '2023-03-14 01:47:24'),
(2522, '40.77.167.177', 4, 42, '2023-03-15', 0, '2023-03-15 10:26:26'),
(2523, '40.77.167.177', 4, 5, '2023-03-15', 0, '2023-03-15 18:47:44'),
(2524, '40.77.167.177', 4, 4, '2023-03-15', 0, '2023-03-15 17:47:28'),
(2525, '40.77.167.177', 2, 12, '2023-03-14', 0, '2023-03-14 12:14:38'),
(2526, '40.77.167.177', 3, 14, '2023-03-15', 0, '2023-03-15 04:14:49'),
(2527, '40.77.167.177', 3, 10, '2023-03-14', 0, '2023-03-14 12:56:02'),
(2528, '40.77.167.177', 3, 33, '2023-03-14', 0, '2023-03-14 19:35:20'),
(2529, '40.77.167.177', 3, 11, '2023-03-14', 0, '2023-03-15 01:33:54'),
(2530, '40.77.167.177', 4, 44, '2023-03-15', 0, '2023-03-15 21:43:24'),
(2531, '51.222.253.8', 1, 46, '2023-03-11', 0, '2023-03-11 20:19:55'),
(2532, '51.222.253.17', 1, 33, '2023-03-11', 0, '2023-03-11 20:24:24'),
(2533, '51.222.253.20', 1, 37, '2023-03-11', 0, '2023-03-11 20:29:11'),
(2534, '207.46.13.224', 4, 29, '2023-03-15', 0, '2023-03-15 09:32:09'),
(2535, '207.46.13.224', 4, 6, '2023-03-15', 0, '2023-03-15 20:58:12'),
(2536, '207.46.13.224', 4, 13, '2023-03-14', 0, '2023-03-14 12:35:33'),
(2537, '40.77.167.204', 2, 1, '2023-03-14', 0, '2023-03-15 03:33:02'),
(2538, '51.222.253.12', 1, 1, '2023-03-11', 0, '2023-03-11 20:33:28'),
(2539, '51.222.253.17', 1, 32, '2023-03-11', 0, '2023-03-11 20:41:18'),
(2540, '51.222.253.2', 1, 25, '2023-03-11', 0, '2023-03-11 20:49:43'),
(2541, '51.222.253.2', 1, 40, '2023-03-11', 0, '2023-03-11 20:57:35'),
(2542, '51.222.253.14', 1, 27, '2023-03-11', 0, '2023-03-11 21:05:50'),
(2543, '103.92.161.20', 1, 0, '2023-03-11', 0, '2023-03-11 21:10:11'),
(2544, '51.222.253.20', 1, 26, '2023-03-11', 0, '2023-03-11 21:13:44'),
(2545, '51.222.253.12', 1, 24, '2023-03-11', 0, '2023-03-11 21:23:00'),
(2546, '51.222.253.15', 1, 48, '2023-03-11', 0, '2023-03-11 21:31:19'),
(2547, '51.222.253.20', 1, 31, '2023-03-11', 0, '2023-03-11 21:39:35'),
(2548, '51.222.253.4', 1, 1, '2023-03-11', 0, '2023-03-11 21:48:14'),
(2549, '51.222.253.19', 1, 43, '2023-03-11', 0, '2023-03-11 21:56:56'),
(2550, '51.222.253.16', 1, 22, '2023-03-11', 0, '2023-03-11 22:05:31'),
(2551, '51.222.253.8', 1, 36, '2023-03-11', 0, '2023-03-11 22:14:00'),
(2552, '51.222.253.4', 1, 10, '2023-03-11', 0, '2023-03-11 22:32:03'),
(2553, '51.222.253.4', 1, 23, '2023-03-11', 0, '2023-03-11 22:41:23'),
(2554, '51.222.253.2', 1, 2, '2023-03-11', 0, '2023-03-11 22:49:56'),
(2555, '114.119.132.211', 1, 19, '2023-03-11', 0, '2023-03-11 23:08:10'),
(2556, '198.235.24.169', 1, 0, '2023-03-11', 0, '2023-03-11 23:08:30'),
(2557, '51.222.253.6', 1, 38, '2023-03-11', 0, '2023-03-11 23:38:12'),
(2558, '205.210.31.149', 1, 0, '2023-03-11', 0, '2023-03-11 23:58:28'),
(2559, '51.222.253.1', 1, 30, '2023-03-11', 0, '2023-03-12 00:00:40'),
(2560, '51.222.253.1', 1, 47, '2023-03-11', 0, '2023-03-12 00:21:28'),
(2561, '114.119.144.116', 1, 48, '2023-03-11', 0, '2023-03-12 00:36:20'),
(2562, '114.119.146.252', 1, 5, '2023-03-11', 0, '2023-03-12 00:41:10'),
(2563, '114.119.146.171', 1, 0, '2023-03-11', 0, '2023-03-12 00:53:26'),
(2564, '51.222.253.16', 1, 45, '2023-03-11', 0, '2023-03-12 01:04:38'),
(2565, '51.222.253.11', 1, 41, '2023-03-11', 0, '2023-03-12 01:25:04'),
(2566, '114.119.133.1', 1, 23, '2023-03-11', 0, '2023-03-12 02:11:27'),
(2567, '114.119.146.40', 1, 16, '2023-03-11', 0, '2023-03-12 02:16:00'),
(2568, '51.222.253.10', 1, 29, '2023-03-11', 0, '2023-03-12 02:17:32'),
(2569, '114.119.148.161', 1, 0, '2023-03-11', 0, '2023-03-12 02:22:12'),
(2570, '51.222.253.7', 1, 42, '2023-03-11', 0, '2023-03-12 03:15:55'),
(2571, '198.235.24.132', 1, 0, '2023-03-11', 0, '2023-03-12 04:03:39'),
(2572, '51.222.253.1', 1, 35, '2023-03-11', 0, '2023-03-12 04:11:38'),
(2573, '176.9.150.150', 1, 0, '2023-03-11', 0, '2023-03-12 04:27:11'),
(2574, '54.201.144.144', 2, 0, '2023-03-12', 0, '2023-03-12 05:28:58'),
(2575, '5.188.62.26', 1, 0, '2023-03-12', 0, '2023-03-12 05:40:35'),
(2576, '51.222.253.10', 1, 49, '2023-03-12', 0, '2023-03-12 05:54:28'),
(2577, '51.222.253.14', 1, 50, '2023-03-12', 0, '2023-03-12 06:25:09'),
(2578, '51.222.253.20', 1, 51, '2023-03-12', 0, '2023-03-12 06:54:33'),
(2579, '114.119.132.207', 1, 21, '2023-03-12', 0, '2023-03-12 06:58:04'),
(2580, '114.119.146.7', 1, 30, '2023-03-12', 0, '2023-03-12 07:00:00'),
(2581, '51.222.253.12', 1, 54, '2023-03-12', 0, '2023-03-12 07:00:00'),
(2582, '51.222.253.17', 1, 58, '2023-03-12', 0, '2023-03-12 07:00:00'),
(2583, '51.222.253.1', 1, 52, '2023-03-12', 0, '2023-03-12 07:42:55'),
(2584, '51.222.253.13', 1, 55, '2023-03-12', 0, '2023-03-12 08:36:55'),
(2585, '114.119.147.86', 1, 5, '2023-03-12', 0, '2023-03-12 09:14:37'),
(2586, '114.119.141.77', 1, 22, '2023-03-12', 0, '2023-03-12 09:16:31'),
(2587, '114.119.155.58', 1, 0, '2023-03-12', 0, '2023-03-12 09:18:46'),
(2588, '180.163.220.100', 1, 0, '2023-03-12', 0, '2023-03-12 09:21:15'),
(2589, '51.222.253.17', 1, 56, '2023-03-12', 0, '2023-03-12 09:23:22'),
(2590, '185.181.60.39', 1, 0, '2023-03-12', 0, '2023-03-12 10:03:07'),
(2591, '114.119.136.100', 1, 15, '2023-03-12', 0, '2023-03-12 10:57:34'),
(2592, '114.119.149.90', 1, 10, '2023-03-12', 0, '2023-03-12 10:58:45'),
(2593, '51.222.253.9', 1, 57, '2023-03-12', 0, '2023-03-12 11:20:52'),
(2594, '114.119.149.199', 1, 0, '2023-03-12', 0, '2023-03-12 11:25:18'),
(2595, '114.119.152.46', 1, 0, '2023-03-12', 0, '2023-03-12 11:27:20'),
(2596, '31.13.127.20', 1, 0, '2023-03-12', 0, '2023-03-12 14:34:00'),
(2597, '69.171.249.7', 1, 0, '2023-03-12', 0, '2023-03-12 14:34:00'),
(2598, '31.13.115.118', 1, 0, '2023-03-12', 0, '2023-03-12 14:34:35'),
(2599, '193.235.141.145', 1, 0, '2023-03-12', 0, '2023-03-12 15:20:49'),
(2600, '27.147.176.138', 2, 0, '2023-03-13', 0, '2023-03-13 14:51:36'),
(2601, '185.191.171.19', 1, 7, '2023-03-12', 0, '2023-03-12 17:02:50'),
(2602, '138.68.180.18', 7, 0, '2023-03-12', 0, '2023-03-12 17:42:40'),
(2603, '114.119.150.2', 1, 13, '2023-03-12', 0, '2023-03-12 18:12:25'),
(2604, '114.119.136.64', 1, 23, '2023-03-12', 0, '2023-03-12 18:13:55'),
(2605, '114.119.140.122', 1, 26, '2023-03-12', 0, '2023-03-12 18:14:37'),
(2606, '114.119.146.38', 1, 27, '2023-03-12', 0, '2023-03-12 18:15:47'),
(2607, '114.119.131.166', 1, 33, '2023-03-12', 0, '2023-03-12 18:18:51'),
(2608, '114.119.132.52', 1, 20, '2023-03-12', 0, '2023-03-12 18:19:36'),
(2609, '114.119.128.179', 1, 20, '2023-03-12', 0, '2023-03-12 18:21:08'),
(2610, '114.119.134.95', 1, 56, '2023-03-12', 0, '2023-03-12 18:24:26'),
(2611, '114.119.139.246', 1, 51, '2023-03-12', 0, '2023-03-12 18:25:52'),
(2612, '114.119.156.238', 1, 17, '2023-03-12', 0, '2023-03-12 18:26:49'),
(2613, '114.119.136.46', 1, 50, '2023-03-12', 0, '2023-03-12 18:28:24'),
(2614, '114.119.130.2', 1, 0, '2023-03-12', 0, '2023-03-12 18:31:25'),
(2615, '114.119.139.128', 1, 22, '2023-03-12', 0, '2023-03-12 18:32:53'),
(2616, '114.119.142.37', 1, 43, '2023-03-12', 0, '2023-03-12 18:45:52'),
(2617, '103.29.126.36', 1, 0, '2023-03-12', 40010, '2023-03-12 21:10:26'),
(2618, '37.111.207.211', 1, 0, '2023-03-12', 0, '2023-03-12 22:16:18'),
(2619, '103.174.134.10', 7, 0, '2023-03-12', 0, '2023-03-12 23:06:22'),
(2620, '103.174.134.10', 3, 68, '2023-03-12', 0, '2023-03-12 23:06:21'),
(2621, '103.174.134.10', 2, 3, '2023-03-12', 0, '2023-03-12 23:06:04'),
(2622, '103.174.134.10', 1, 2, '2023-03-12', 0, '2023-03-12 23:06:12'),
(2623, '42.236.10.125', 1, 0, '2023-03-12', 0, '2023-03-12 23:06:13'),
(2624, '185.191.171.2', 1, 65, '2023-03-12', 0, '2023-03-13 02:25:45'),
(2625, '185.191.171.19', 1, 20, '2023-03-12', 0, '2023-03-13 02:55:58'),
(2626, '114.119.131.90', 1, 10, '2023-03-12', 0, '2023-03-13 03:21:27'),
(2627, '114.119.136.155', 1, 9, '2023-03-12', 0, '2023-03-13 03:23:47'),
(2628, '114.119.128.35', 1, 0, '2023-03-12', 0, '2023-03-13 03:24:28'),
(2629, '185.191.171.1', 1, 10, '2023-03-12', 0, '2023-03-13 03:27:15'),
(2630, '162.142.125.226', 1, 0, '2023-03-12', 0, '2023-03-13 03:56:25'),
(2631, '185.191.171.3', 1, 15, '2023-03-13', 0, '2023-03-13 04:03:15'),
(2632, '114.119.135.37', 1, 19, '2023-03-13', 0, '2023-03-13 04:03:44'),
(2633, '114.119.129.158', 1, 44, '2023-03-13', 0, '2023-03-13 04:25:35'),
(2634, '114.119.128.142', 1, 16, '2023-03-13', 0, '2023-03-13 04:28:10'),
(2635, '185.191.171.10', 2, 16, '2023-03-13', 0, '2023-03-13 08:48:03'),
(2636, '114.119.144.202', 1, 2, '2023-03-13', 0, '2023-03-13 04:52:25'),
(2637, '114.119.158.144', 1, 1, '2023-03-13', 0, '2023-03-13 04:53:41'),
(2638, '185.191.171.35', 1, 19, '2023-03-13', 0, '2023-03-13 05:38:21'),
(2639, '185.191.171.23', 1, 43, '2023-03-13', 0, '2023-03-13 05:41:30'),
(2640, '185.191.171.44', 1, 1, '2023-03-13', 0, '2023-03-13 07:23:45'),
(2641, '185.191.171.3', 1, 48, '2023-03-13', 0, '2023-03-13 07:38:59'),
(2642, '185.191.171.15', 1, 5, '2023-03-13', 0, '2023-03-13 07:50:03'),
(2643, '185.191.171.19', 1, 61, '2023-03-13', 0, '2023-03-13 08:41:03'),
(2644, '114.119.146.37', 1, 15, '2023-03-13', 0, '2023-03-13 09:24:16'),
(2645, '114.119.130.105', 1, 24, '2023-03-13', 0, '2023-03-13 09:50:08'),
(2646, '114.119.141.103', 1, 16, '2023-03-13', 0, '2023-03-13 10:06:49'),
(2647, '185.191.171.40', 1, 10, '2023-03-13', 0, '2023-03-13 10:09:08'),
(2648, '207.46.13.224', 1, 18, '2023-03-13', 0, '2023-03-13 10:27:39'),
(2649, '52.167.144.27', 2, 20, '2023-03-14', 0, '2023-03-14 09:51:57'),
(2650, '114.119.136.78', 1, 1, '2023-03-13', 0, '2023-03-13 11:22:58'),
(2651, '114.119.159.24', 1, 47, '2023-03-13', 0, '2023-03-13 11:24:15'),
(2652, '114.119.145.216', 1, 67, '2023-03-13', 0, '2023-03-13 11:24:40'),
(2653, '114.119.148.64', 1, 14, '2023-03-13', 0, '2023-03-13 11:26:19'),
(2654, '114.119.158.138', 1, 31, '2023-03-13', 0, '2023-03-13 11:53:59'),
(2655, '185.191.171.8', 1, 45, '2023-03-13', 0, '2023-03-13 12:34:39'),
(2656, '185.191.171.38', 1, 12, '2023-03-13', 0, '2023-03-13 12:43:34'),
(2657, '185.191.171.11', 1, 58, '2023-03-13', 0, '2023-03-13 12:47:07'),
(2658, '114.119.159.228', 1, 23, '2023-03-13', 0, '2023-03-13 13:30:19'),
(2659, '52.167.144.102', 3, 43, '2023-03-15', 0, '2023-03-15 10:19:15'),
(2660, '185.191.171.14', 1, 29, '2023-03-13', 0, '2023-03-13 13:48:54'),
(2661, '114.119.128.46', 1, 2, '2023-03-13', 0, '2023-03-13 14:30:38'),
(2662, '42.83.147.55', 1, 0, '2023-03-13', 0, '2023-03-13 15:11:40'),
(2663, '207.46.13.224', 3, 47, '2023-03-15', 0, '2023-03-15 20:19:12'),
(2664, '207.46.13.224', 3, 27, '2023-03-15', 0, '2023-03-15 09:12:27'),
(2665, '207.46.13.224', 2, 3, '2023-03-14', 0, '2023-03-14 15:25:41'),
(2666, '207.46.13.224', 2, 2, '2023-03-14', 0, '2023-03-14 12:19:22'),
(2667, '114.119.159.24', 1, 18, '2023-03-13', 0, '2023-03-13 18:25:42'),
(2668, '114.119.130.91', 1, 11, '2023-03-13', 0, '2023-03-13 18:27:23'),
(2669, '128.90.21.79', 1, 0, '2023-03-13', 0, '2023-03-13 18:47:01'),
(2670, '185.191.171.2', 1, 28, '2023-03-13', 0, '2023-03-13 18:51:49'),
(2671, '185.191.171.7', 1, 62, '2023-03-13', 0, '2023-03-13 19:01:49'),
(2672, '207.46.13.224', 3, 7, '2023-03-15', 0, '2023-03-15 21:51:20'),
(2673, '207.46.13.224', 3, 24, '2023-03-15', 0, '2023-03-15 21:30:31'),
(2674, '114.119.147.246', 1, 5, '2023-03-13', 0, '2023-03-13 21:38:58'),
(2675, '114.119.159.122', 1, 60, '2023-03-13', 0, '2023-03-13 21:40:35'),
(2676, '42.105.6.14', 1, 0, '2023-03-13', 0, '2023-03-13 22:01:10'),
(2677, '35.225.82.182', 1, 0, '2023-03-13', 0, '2023-03-13 22:01:11'),
(2678, '114.119.159.121', 1, 41, '2023-03-13', 0, '2023-03-13 22:05:51'),
(2679, '114.119.133.46', 1, 61, '2023-03-13', 0, '2023-03-13 22:07:03'),
(2680, '114.119.154.6', 1, 13, '2023-03-13', 0, '2023-03-13 22:09:03'),
(2681, '114.119.129.189', 1, 62, '2023-03-13', 0, '2023-03-13 22:09:43'),
(2682, '114.119.143.166', 1, 19, '2023-03-13', 0, '2023-03-13 22:11:01'),
(2683, '114.119.133.142', 1, 26, '2023-03-13', 0, '2023-03-13 22:12:28'),
(2684, '185.191.171.45', 1, 31, '2023-03-13', 0, '2023-03-13 22:35:44'),
(2685, '207.46.13.224', 2, 17, '2023-03-14', 0, '2023-03-15 03:37:45'),
(2686, '103.177.242.8', 1, 0, '2023-03-13', 0, '2023-03-13 22:53:09'),
(2687, '185.191.171.39', 1, 22, '2023-03-13', 0, '2023-03-13 23:31:58'),
(2688, '185.191.171.21', 1, 13, '2023-03-13', 0, '2023-03-13 23:50:55'),
(2689, '185.191.171.4', 1, 14, '2023-03-13', 0, '2023-03-13 23:53:42'),
(2690, '47.11.86.134', 1, 0, '2023-03-13', 0, '2023-03-14 00:18:49'),
(2691, '185.191.171.24', 1, 59, '2023-03-13', 0, '2023-03-14 00:44:51'),
(2692, '37.111.217.5', 3, 5, '2023-03-13', 0, '2023-03-14 01:09:39'),
(2693, '37.111.217.5', 5, 1, '2023-03-13', 0, '2023-03-14 01:08:37'),
(2694, '37.111.217.5', 1, 2, '2023-03-13', 0, '2023-03-14 01:09:29'),
(2695, '103.115.134.185', 5, 0, '2023-03-13', 0, '2023-03-14 01:20:34'),
(2696, '52.167.144.137', 1, 0, '2023-03-13', 0, '2023-03-14 02:24:49'),
(2697, '185.191.171.19', 1, 3, '2023-03-13', 0, '2023-03-14 03:03:44'),
(2698, '185.191.171.11', 1, 39, '2023-03-13', 0, '2023-03-14 03:16:02'),
(2699, '185.191.171.12', 1, 38, '2023-03-13', 0, '2023-03-14 03:33:20'),
(2700, '185.191.171.18', 1, 42, '2023-03-14', 0, '2023-03-14 04:45:48'),
(2701, '60.50.9.35', 11, 0, '2023-03-14', 0, '2023-03-14 05:15:28'),
(2702, '60.50.9.35', 1, 48, '2023-03-14', 0, '2023-03-14 05:14:16'),
(2703, '60.50.9.35', 1, 62, '2023-03-14', 0, '2023-03-14 05:14:27'),
(2704, '60.50.9.35', 1, 63, '2023-03-14', 0, '2023-03-14 05:14:41'),
(2705, '60.50.9.35', 1, 64, '2023-03-14', 0, '2023-03-14 05:14:58'),
(2706, '60.50.9.35', 1, 66, '2023-03-14', 0, '2023-03-14 05:15:06'),
(2707, '60.50.9.35', 1, 67, '2023-03-14', 0, '2023-03-14 05:15:20'),
(2708, '60.50.9.35', 1, 68, '2023-03-14', 0, '2023-03-14 05:15:34'),
(2709, '109.248.175.166', 1, 0, '2023-03-14', 0, '2023-03-14 05:40:24'),
(2710, '118.190.150.145', 1, 0, '2023-03-14', 0, '2023-03-14 06:20:41'),
(2711, '114.119.139.172', 1, 37, '2023-03-14', 0, '2023-03-14 06:36:10'),
(2712, '114.119.137.143', 1, 12, '2023-03-14', 0, '2023-03-14 06:37:17'),
(2713, '51.222.253.7', 1, 59, '2023-03-14', 0, '2023-03-14 07:02:01'),
(2714, '114.119.159.62', 1, 36, '2023-03-14', 0, '2023-03-14 07:12:51'),
(2715, '114.119.133.134', 1, 22, '2023-03-14', 0, '2023-03-14 07:13:50'),
(2716, '51.222.253.10', 1, 73, '2023-03-14', 0, '2023-03-14 07:16:41'),
(2717, '51.222.253.5', 1, 69, '2023-03-14', 0, '2023-03-14 07:32:50'),
(2718, '185.191.171.15', 1, 44, '2023-03-14', 0, '2023-03-14 07:34:53'),
(2719, '114.119.158.172', 1, 68, '2023-03-14', 0, '2023-03-14 07:39:06'),
(2720, '114.119.143.209', 1, 0, '2023-03-14', 0, '2023-03-14 07:40:56'),
(2721, '114.119.132.238', 1, 0, '2023-03-14', 0, '2023-03-14 07:44:51'),
(2722, '51.222.253.12', 1, 66, '2023-03-14', 0, '2023-03-14 07:49:26'),
(2723, '51.222.253.10', 1, 60, '2023-03-14', 0, '2023-03-14 08:05:23'),
(2724, '51.222.253.1', 1, 63, '2023-03-14', 0, '2023-03-14 08:22:01'),
(2725, '51.222.253.3', 1, 67, '2023-03-14', 0, '2023-03-14 08:38:38'),
(2726, '52.167.144.27', 1, 22, '2023-03-14', 0, '2023-03-14 08:44:21'),
(2727, '51.222.253.3', 1, 65, '2023-03-14', 0, '2023-03-14 08:54:38'),
(2728, '114.119.139.112', 1, 40, '2023-03-14', 0, '2023-03-14 08:58:56'),
(2729, '185.191.171.33', 1, 18, '2023-03-14', 0, '2023-03-14 08:59:23'),
(2730, '114.119.133.237', 1, 17, '2023-03-14', 0, '2023-03-14 09:00:14'),
(2731, '51.222.253.5', 1, 61, '2023-03-14', 0, '2023-03-14 09:11:55'),
(2732, '51.222.253.19', 1, 62, '2023-03-14', 0, '2023-03-14 09:29:15'),
(2733, '114.119.136.174', 1, 72, '2023-03-14', 0, '2023-03-14 09:38:25'),
(2734, '114.119.161.177', 1, 49, '2023-03-14', 0, '2023-03-14 09:40:22'),
(2735, '51.222.253.18', 1, 64, '2023-03-14', 0, '2023-03-14 09:44:35'),
(2736, '207.46.13.224', 1, 46, '2023-03-14', 0, '2023-03-14 10:09:07'),
(2737, '51.222.253.16', 1, 68, '2023-03-14', 0, '2023-03-14 10:27:42'),
(2738, '51.222.253.5', 1, 72, '2023-03-14', 0, '2023-03-14 11:10:29'),
(2739, '185.191.171.38', 1, 46, '2023-03-14', 0, '2023-03-14 11:17:00'),
(2740, '51.222.253.2', 1, 71, '2023-03-14', 0, '2023-03-14 11:48:59'),
(2741, '185.191.171.24', 1, 41, '2023-03-14', 0, '2023-03-14 12:43:10'),
(2742, '51.222.253.7', 1, 70, '2023-03-14', 0, '2023-03-14 13:08:34'),
(2743, '185.191.171.35', 1, 12, '2023-03-14', 0, '2023-03-14 13:35:33'),
(2744, '185.191.171.43', 1, 4, '2023-03-14', 0, '2023-03-14 13:56:27'),
(2745, '185.191.171.16', 1, 63, '2023-03-14', 0, '2023-03-14 14:09:56'),
(2746, '185.191.171.15', 1, 7, '2023-03-14', 0, '2023-03-14 14:56:43'),
(2747, '185.191.171.23', 1, 47, '2023-03-14', 0, '2023-03-14 14:57:05'),
(2748, '203.190.254.110', 1, 0, '2023-03-14', 0, '2023-03-14 15:03:53'),
(2749, '185.191.171.41', 1, 64, '2023-03-14', 0, '2023-03-14 15:13:42'),
(2750, '103.134.192.16', 2, 0, '2023-03-14', 0, '2023-03-14 15:50:07'),
(2751, '114.119.133.192', 1, 66, '2023-03-14', 0, '2023-03-14 15:45:34'),
(2752, '185.191.171.26', 1, 37, '2023-03-14', 0, '2023-03-14 16:26:32'),
(2753, '17.241.227.208', 1, 28, '2023-03-14', 0, '2023-03-14 16:38:26'),
(2754, '114.119.140.44', 1, 69, '2023-03-14', 0, '2023-03-14 16:45:48'),
(2755, '114.119.158.34', 1, 1, '2023-03-14', 0, '2023-03-14 16:58:10'),
(2756, '114.119.137.141', 1, 38, '2023-03-14', 0, '2023-03-14 17:00:35'),
(2757, '185.191.171.7', 1, 24, '2023-03-14', 0, '2023-03-14 17:15:32'),
(2758, '160.238.0.171', 2, 0, '2023-03-14', 0, '2023-03-14 17:26:47'),
(2759, '160.238.0.171', 2, 73, '2023-03-14', 0, '2023-03-14 17:26:26'),
(2760, '64.233.173.251', 2, 73, '2023-03-14', 0, '2023-03-14 17:26:33'),
(2761, '64.233.172.176', 1, 73, '2023-03-14', 0, '2023-03-14 17:26:34'),
(2762, '160.238.0.169', 8, 0, '2023-03-14', 0, '2023-03-14 17:46:12'),
(2763, '160.238.0.169', 1, 65, '2023-03-14', 0, '2023-03-14 17:32:45'),
(2764, '64.233.173.249', 1, 65, '2023-03-14', 0, '2023-03-14 17:32:48'),
(2765, '64.233.172.176', 2, 65, '2023-03-14', 0, '2023-03-14 17:32:49'),
(2766, '160.238.0.169', 1, 9, '2023-03-14', 0, '2023-03-14 17:34:45'),
(2767, '64.233.173.251', 1, 9, '2023-03-14', 0, '2023-03-14 17:34:48'),
(2768, '64.233.172.182', 1, 9, '2023-03-14', 0, '2023-03-14 17:34:49'),
(2769, '64.233.173.249', 1, 9, '2023-03-14', 0, '2023-03-14 17:34:49'),
(2770, '114.119.137.124', 1, 0, '2023-03-14', 0, '2023-03-14 17:59:43'),
(2771, '52.167.144.27', 1, 45, '2023-03-14', 0, '2023-03-14 18:40:46'),
(2772, '114.119.151.67', 1, 7, '2023-03-14', 0, '2023-03-14 19:22:08'),
(2773, '114.119.136.134', 1, 63, '2023-03-14', 0, '2023-03-14 20:49:15'),
(2774, '114.119.154.73', 1, 29, '2023-03-14', 0, '2023-03-14 21:21:49'),
(2775, '171.13.14.20', 1, 0, '2023-03-14', 0, '2023-03-14 21:55:30'),
(2776, '171.13.14.49', 1, 0, '2023-03-14', 0, '2023-03-14 21:56:11'),
(2777, '52.167.144.27', 1, 21, '2023-03-14', 0, '2023-03-14 22:19:08'),
(2778, '185.191.171.6', 1, 60, '2023-03-14', 0, '2023-03-14 22:49:23'),
(2779, '185.191.171.15', 1, 57, '2023-03-14', 0, '2023-03-14 23:23:43'),
(2780, '185.191.171.10', 1, 6, '2023-03-14', 0, '2023-03-14 23:37:21'),
(2781, '52.167.144.27', 1, 41, '2023-03-14', 0, '2023-03-15 00:21:03'),
(2782, '119.30.39.159', 1, 0, '2023-03-14', 0, '2023-03-15 00:36:57'),
(2783, '185.191.171.1', 1, 9, '2023-03-14', 0, '2023-03-15 01:23:56'),
(2784, '185.191.171.3', 1, 21, '2023-03-14', 0, '2023-03-15 01:35:24'),
(2785, '114.119.146.69', 1, 1, '2023-03-14', 0, '2023-03-15 01:43:09'),
(2786, '114.119.150.56', 1, 18, '2023-03-14', 0, '2023-03-15 01:44:51'),
(2787, '114.119.159.177', 1, 12, '2023-03-14', 0, '2023-03-15 01:46:02'),
(2788, '114.119.141.127', 1, 21, '2023-03-14', 0, '2023-03-15 01:48:04'),
(2789, '114.119.138.67', 1, 10, '2023-03-14', 0, '2023-03-15 01:49:06'),
(2790, '114.119.143.158', 1, 27, '2023-03-14', 0, '2023-03-15 01:53:21'),
(2791, '114.119.140.237', 1, 0, '2023-03-14', 0, '2023-03-15 01:55:16'),
(2792, '114.119.142.132', 1, 7, '2023-03-14', 0, '2023-03-15 02:03:00'),
(2793, '114.119.149.252', 1, 0, '2023-03-14', 0, '2023-03-15 02:16:39'),
(2794, '114.119.158.82', 1, 31, '2023-03-14', 0, '2023-03-15 02:17:40'),
(2795, '185.191.171.16', 1, 2, '2023-03-14', 0, '2023-03-15 02:24:13'),
(2796, '114.119.157.231', 1, 64, '2023-03-14', 0, '2023-03-15 02:34:09'),
(2797, '52.167.144.27', 1, 35, '2023-03-14', 0, '2023-03-15 03:26:52'),
(2798, '103.7.249.34', 4, 0, '2023-03-14', 0, '2023-03-15 03:30:16'),
(2799, '52.167.144.27', 1, 32, '2023-03-14', 0, '2023-03-15 03:43:54'),
(2800, '198.235.24.163', 1, 0, '2023-03-14', 0, '2023-03-15 03:55:27'),
(2801, '185.191.171.5', 1, 40, '2023-03-15', 0, '2023-03-15 04:41:36'),
(2802, '198.235.24.137', 1, 0, '2023-03-15', 0, '2023-03-15 05:12:06'),
(2803, '198.235.24.11', 1, 0, '2023-03-15', 0, '2023-03-15 07:42:01'),
(2804, '185.191.171.4', 1, 23, '2023-03-15', 0, '2023-03-15 10:09:58'),
(2805, '114.119.138.170', 1, 68, '2023-03-15', 0, '2023-03-15 10:34:05'),
(2806, '114.119.130.62', 1, 42, '2023-03-15', 0, '2023-03-15 10:47:32'),
(2807, '114.119.142.197', 1, 4, '2023-03-15', 0, '2023-03-15 11:22:04'),
(2808, '82.165.85.138', 20, 0, '2023-03-15', 0, '2023-03-15 12:19:56'),
(2809, '198.71.235.41', 10, 0, '2023-03-15', 0, '2023-03-15 12:17:11'),
(2810, '49.234.102.159', 10, 0, '2023-03-15', 0, '2023-03-15 12:17:27'),
(2811, '185.114.247.54', 10, 0, '2023-03-15', 0, '2023-03-15 12:17:23'),
(2812, '52.139.225.218', 20, 0, '2023-03-15', 0, '2023-03-15 12:19:24'),
(2813, '107.172.218.114', 10, 0, '2023-03-15', 0, '2023-03-15 12:17:45'),
(2814, '42.194.208.112', 10, 0, '2023-03-15', 0, '2023-03-15 12:18:38'),
(2815, '154.119.36.49', 10, 0, '2023-03-15', 0, '2023-03-15 12:19:14'),
(2816, '192.111.150.75', 10, 0, '2023-03-15', 0, '2023-03-15 12:20:00'),
(2817, '146.177.17.16', 10, 0, '2023-03-15', 0, '2023-03-15 12:20:43'),
(2818, '198.71.240.2', 20, 0, '2023-03-15', 0, '2023-03-15 12:21:05'),
(2819, '199.59.90.4', 10, 0, '2023-03-15', 0, '2023-03-15 12:21:01'),
(2820, '162.0.229.115', 10, 0, '2023-03-15', 0, '2023-03-15 12:21:08'),
(2821, '185.86.80.70', 10, 0, '2023-03-15', 0, '2023-03-15 12:22:13'),
(2822, '184.168.114.92', 10, 0, '2023-03-15', 0, '2023-03-15 12:21:33'),
(2823, '66.175.44.35', 10, 0, '2023-03-15', 0, '2023-03-15 12:21:38'),
(2824, '204.11.59.91', 10, 0, '2023-03-15', 0, '2023-03-15 12:21:38'),
(2825, '139.162.104.127', 10, 0, '2023-03-15', 0, '2023-03-15 12:22:09'),
(2826, '178.128.106.73', 10, 0, '2023-03-15', 0, '2023-03-15 12:22:33'),
(2827, '37.111.223.203', 3, 0, '2023-03-15', 0, '2023-03-15 20:36:19'),
(2828, '37.111.223.203', 1, 5, '2023-03-15', 0, '2023-03-15 12:46:19'),
(2829, '116.96.30.184', 1, 0, '2023-03-15', 0, '2023-03-15 14:11:18'),
(2830, '114.119.135.174', 1, 73, '2023-03-15', 0, '2023-03-15 14:14:38'),
(2831, '114.119.135.120', 1, 9, '2023-03-15', 0, '2023-03-15 15:01:05'),
(2832, '118.193.38.6', 2, 0, '2023-03-15', 0, '2023-03-15 17:16:16'),
(2833, '45.56.233.100', 1, 0, '2023-03-15', 0, '2023-03-15 17:19:10'),
(2834, '114.119.132.36', 1, 6, '2023-03-15', 0, '2023-03-15 18:15:50'),
(2835, '114.119.131.207', 1, 35, '2023-03-15', 0, '2023-03-15 19:22:08'),
(2836, '103.92.207.5', 1, 0, '2023-03-15', 0, '2023-03-15 20:58:21'),
(2837, '114.119.146.142', 1, 1, '2023-03-15', 0, '2023-03-15 23:17:01'),
(2838, '114.119.142.73', 1, 45, '2023-03-15', 0, '2023-03-15 23:31:45'),
(2839, '114.119.147.248', 1, 70, '2023-03-15', 0, '2023-03-15 23:33:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner_info`
--
ALTER TABLE `banner_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manual_link` (`manual_link`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_info`
--
ALTER TABLE `category_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_list`
--
ALTER TABLE `color_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `color` (`color`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupon_cart`
--
ALTER TABLE `cupon_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cu_pons`
--
ALTER TABLE `cu_pons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damage_item`
--
ALTER TABLE `damage_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_info`
--
ALTER TABLE `delivery_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_location`
--
ALTER TABLE `delivery_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donar_info`
--
ALTER TABLE `donar_info`
  ADD PRIMARY KEY (`donar_id`);

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `greeting_info`
--
ALTER TABLE `greeting_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_info`
--
ALTER TABLE `item_info`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD UNIQUE KEY `item_code` (`item_code`);

--
-- Indexes for table `item_photo`
--
ALTER TABLE `item_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_item`
--
ALTER TABLE `journal_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`ledger_id`);

--
-- Indexes for table `ledger_group`
--
ALTER TABLE `ledger_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `loan_history`
--
ALTER TABLE `loan_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_sms`
--
ALTER TABLE `manual_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_permission`
--
ALTER TABLE `menu_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `most_visited_pages`
--
ALTER TABLE `most_visited_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `order_update_logs`
--
ALTER TABLE `order_update_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_discount_vat`
--
ALTER TABLE `pos_discount_vat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_payment_info`
--
ALTER TABLE `pos_payment_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_sale_detail`
--
ALTER TABLE `pos_sale_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sale_no` (`sale_no`,`item_id`,`color`);

--
-- Indexes for table `purchase_master`
--
ALTER TABLE `purchase_master`
  ADD PRIMARY KEY (`purchase_no`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_payment`
--
ALTER TABLE `purchase_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_return_details`
--
ALTER TABLE `purchase_return_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_return_master`
--
ALTER TABLE `purchase_return_master`
  ADD PRIMARY KEY (`purchase_no`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_master`
--
ALTER TABLE `sales_master`
  ADD PRIMARY KEY (`s_no`),
  ADD UNIQUE KEY `s_no` (`s_no`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category_info`
--
ALTER TABLE `sub_category_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_category_info`
--
ALTER TABLE `sub_sub_category_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggested_item`
--
ALTER TABLE `suggested_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_info`
--
ALTER TABLE `supplier_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme_settings`
--
ALTER TABLE `theme_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorial_videos`
--
ALTER TABLE `tutorial_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `warehouse_info`
--
ALTER TABLE `warehouse_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_users`
--
ALTER TABLE `web_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `token` (`token`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `web_visitors`
--
ALTER TABLE `web_visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner_info`
--
ALTER TABLE `banner_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category_info`
--
ALTER TABLE `category_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `color_list`
--
ALTER TABLE `color_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cupon_cart`
--
ALTER TABLE `cupon_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `cu_pons`
--
ALTER TABLE `cu_pons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `damage_item`
--
ALTER TABLE `damage_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_info`
--
ALTER TABLE `delivery_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_location`
--
ALTER TABLE `delivery_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `donar_info`
--
ALTER TABLE `donar_info`
  MODIFY `donar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `greeting_info`
--
ALTER TABLE `greeting_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item_info`
--
ALTER TABLE `item_info`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `item_photo`
--
ALTER TABLE `item_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=465;

--
-- AUTO_INCREMENT for table `journal_item`
--
ALTER TABLE `journal_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `ledger_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000276;

--
-- AUTO_INCREMENT for table `ledger_group`
--
ALTER TABLE `ledger_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `loan_history`
--
ALTER TABLE `loan_history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manual_sms`
--
ALTER TABLE `manual_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `menu_permission`
--
ALTER TABLE `menu_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=676;

--
-- AUTO_INCREMENT for table `most_visited_pages`
--
ALTER TABLE `most_visited_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_update_logs`
--
ALTER TABLE `order_update_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_discount_vat`
--
ALTER TABLE `pos_discount_vat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pos_payment_info`
--
ALTER TABLE `pos_payment_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `pos_sale_detail`
--
ALTER TABLE `pos_sale_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;

--
-- AUTO_INCREMENT for table `purchase_master`
--
ALTER TABLE `purchase_master`
  MODIFY `purchase_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `purchase_payment`
--
ALTER TABLE `purchase_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_return_details`
--
ALTER TABLE `purchase_return_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_return_master`
--
ALTER TABLE `purchase_return_master`
  MODIFY `purchase_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category_info`
--
ALTER TABLE `sub_category_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_sub_category_info`
--
ALTER TABLE `sub_sub_category_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `suggested_item`
--
ALTER TABLE `suggested_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_info`
--
ALTER TABLE `supplier_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `theme_settings`
--
ALTER TABLE `theme_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tutorial_videos`
--
ALTER TABLE `tutorial_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40011;

--
-- AUTO_INCREMENT for table `warehouse_info`
--
ALTER TABLE `warehouse_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `web_users`
--
ALTER TABLE `web_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `web_visitors`
--
ALTER TABLE `web_visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2840;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
