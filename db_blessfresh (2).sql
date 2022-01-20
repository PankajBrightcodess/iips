-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2020 at 06:42 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_greendots`
--

-- --------------------------------------------------------

--
-- Table structure for table `gd_addonmenu`
--

CREATE TABLE `gd_addonmenu` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(225) NOT NULL,
  `price` float(14,2) NOT NULL,
  `size_price` text NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_addon_product`
--

CREATE TABLE `gd_addon_product` (
  `id` int(11) NOT NULL,
  `pcode` varchar(100) NOT NULL,
  `prodtype` varchar(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `gst_rate` float(14,2) NOT NULL,
  `path` varchar(255) NOT NULL,
  `price` float(14,2) NOT NULL,
  `stock_hold` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `publish_status` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_admin_stock`
--

CREATE TABLE `gd_admin_stock` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pcode` varchar(255) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `quant` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `record_id` varchar(100) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `stock_type` varchar(11) NOT NULL,
  `made_on` varchar(200) NOT NULL,
  `remark` varchar(30) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_area`
--

CREATE TABLE `gd_area` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `type` varchar(200) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd_area`
--

INSERT INTO `gd_area` (`id`, `name`, `type`, `parent_id`, `status`) VALUES
(1, 'Andaman & Nicobar Islands', 'State', 0, 1),
(2, 'Andhra Pradesh', 'State', 0, 1),
(3, 'Arunachal Pradesh', 'State', 0, 1),
(4, 'Assam', 'State', 0, 1),
(5, 'Bihar', 'State', 0, 1),
(6, 'Chandigarh', 'State', 0, 1),
(7, 'Chhattisgarh', 'State', 0, 1),
(8, 'Dadra and Nagar Haveli', 'State', 0, 1),
(9, 'Daman and Diu', 'State', 0, 1),
(10, 'Delhi', 'State', 0, 1),
(11, 'Goa', 'State', 0, 1),
(12, 'Gujarat', 'State', 0, 1),
(13, 'Haryana', 'State', 0, 1),
(14, 'Himachal Pradesh', 'State', 0, 1),
(15, 'Jammu and Kashmir', 'State', 0, 1),
(16, 'Jharkhand', 'State', 0, 1),
(17, 'Karnataka', 'State', 0, 1),
(18, 'Kerala', 'State', 0, 1),
(19, 'Lakshadweep', 'State', 0, 1),
(20, 'Madhya Pradesh', 'State', 0, 1),
(21, 'Maharashtra', 'State', 0, 1),
(22, 'Manipur', 'State', 0, 1),
(23, 'Meghalaya', 'State', 0, 1),
(24, 'Mizoram', 'State', 0, 1),
(25, 'Nagaland', 'State', 0, 1),
(26, 'Odisha', 'State', 0, 1),
(27, 'Puducherry', 'State', 0, 1),
(28, 'Punjab', 'State', 0, 1),
(29, 'Rajasthan', 'State', 0, 1),
(30, 'Sikkim', 'State', 0, 1),
(31, 'Tamil Nadu', 'State', 0, 1),
(32, 'Telengana', 'State', 0, 1),
(33, 'Tripura', 'State', 0, 1),
(34, 'Uttrakhand', 'State', 0, 1),
(35, 'Uttar Pradesh', 'State', 0, 1),
(36, 'West Bengal', 'State', 0, 1),
(37, 'Nicobar', 'District', 1, 1),
(38, 'North and Middle Andaman', 'District', 1, 1),
(39, 'South Andaman', 'District', 1, 1),
(40, 'Anantapur', 'District', 2, 1),
(41, 'Chittoor', 'District', 2, 1),
(42, 'East Godavari', 'District', 2, 1),
(43, 'Guntur', 'District', 2, 1),
(44, 'Krishna', 'District', 2, 1),
(45, 'Kurnool', 'District', 2, 1),
(46, 'Prakasam', 'District', 2, 1),
(47, 'Srikakulam', 'District', 2, 1),
(48, 'Sri Potti Sriramulu Nellore', 'District', 2, 1),
(49, 'Visakhapatnam', 'District', 2, 1),
(50, 'Vizianagaram', 'District', 2, 1),
(51, 'West Godavari', 'District', 2, 1),
(52, 'YSR District, Kadapa (Cuddapah)', 'District', 2, 1),
(53, 'Anjaw', 'District', 3, 1),
(54, 'Changlang', 'District', 3, 1),
(55, 'Dibang Valley', 'District', 3, 1),
(56, 'East Kameng', 'District', 3, 1),
(57, 'East Siang', 'District', 3, 1),
(58, 'Kamle', 'District', 3, 1),
(59, 'Kra Daadi', 'District', 3, 1),
(60, 'Kurung Kumey', 'District', 3, 1),
(61, 'Lepa Rada', 'District', 3, 1),
(62, 'Lohit', 'District', 3, 1),
(63, 'Longding', 'District', 3, 1),
(64, 'Lower Dibang Valley', 'District', 3, 1),
(65, 'Lower Siang', 'District', 3, 1),
(66, 'Lower Subansiri', 'District', 3, 1),
(67, 'Namsai', 'District', 3, 1),
(68, 'Pakke Kessang', 'District', 3, 1),
(69, 'Papum Pare', 'District', 3, 1),
(70, 'Shi Yomi', 'District', 3, 1),
(71, 'Siang', 'District', 3, 1),
(72, 'Tawang', 'District', 3, 1),
(73, 'Tirap', 'District', 3, 1),
(74, 'Upper Siang', 'District', 3, 1),
(75, 'Upper Subansiri', 'District', 3, 1),
(76, 'West Kameng', 'District', 3, 1),
(77, 'West Siang', 'District', 3, 1),
(78, 'Baksa', 'District', 4, 1),
(79, 'Barpeta', 'District', 4, 1),
(80, 'Biswanath', 'District', 4, 1),
(81, 'Bongaigaon', 'District', 4, 1),
(82, 'Cachar', 'District', 4, 1),
(83, 'Charaideo', 'District', 4, 1),
(84, 'Chirang', 'District', 4, 1),
(85, 'Darrang', 'District', 4, 1),
(86, 'Dhemaji', 'District', 4, 1),
(87, 'Dhubri', 'District', 4, 1),
(88, 'Dibrugarh', 'District', 4, 1),
(89, 'Dima Hasao (North Cachar Hills)', 'District', 4, 1),
(90, 'Goalpara', 'District', 4, 1),
(91, 'Golaghat', 'District', 4, 1),
(92, 'Hailakandi', 'District', 4, 1),
(93, 'Hojai', 'District', 4, 1),
(94, 'Jorhat', 'District', 4, 1),
(95, 'Kamrup', 'District', 4, 1),
(96, 'Kamrup Metropolitan', 'District', 4, 1),
(97, 'Karbi Anglong', 'District', 4, 1),
(98, 'Karimganj', 'District', 4, 1),
(99, 'Kokrajhar', 'District', 4, 1),
(100, 'Lakhimpur', 'District', 4, 1),
(101, 'Majuli', 'District', 4, 1),
(102, 'Morigaon', 'District', 4, 1),
(103, 'Nagaon', 'District', 4, 1),
(104, 'Nalbari', 'District', 4, 1),
(105, 'Sivasagar', 'District', 4, 1),
(106, 'Sonitpur', 'District', 4, 1),
(107, 'South Salamara-Mankachar', 'District', 4, 1),
(108, 'Tinsukia', 'District', 4, 1),
(109, 'Udalguri', 'District', 4, 1),
(110, 'West Karbi Anglong', 'District', 4, 1),
(111, 'Araria', 'District', 5, 1),
(112, 'Arwal', 'District', 5, 1),
(113, 'Aurangabad', 'District', 5, 1),
(114, 'Banka', 'District', 5, 1),
(115, 'Begusarai', 'District', 5, 1),
(116, 'Bhagalpur', 'District', 5, 1),
(117, 'Bhojpur', 'District', 5, 1),
(118, 'Buxar', 'District', 5, 1),
(119, 'Darbhanga', 'District', 5, 1),
(120, 'East Champaran (Motihari)', 'District', 5, 1),
(121, 'Gaya', 'District', 5, 1),
(122, 'Gopalganj', 'District', 5, 1),
(123, 'Jamui', 'District', 5, 1),
(124, 'Jehanabad', 'District', 5, 1),
(125, 'Kaimur (Bhabua)', 'District', 5, 1),
(126, 'Katihar', 'District', 5, 1),
(127, 'Khagaria', 'District', 5, 1),
(128, 'Kishanganj', 'District', 5, 1),
(129, 'Lakhisarai', 'District', 5, 1),
(130, 'Madhepura', 'District', 5, 1),
(131, 'Madhubani', 'District', 5, 1),
(132, 'Munger (Monghyr)', 'District', 5, 1),
(133, 'Muzaffarpur', 'District', 5, 1),
(134, 'Nalanda', 'District', 5, 1),
(135, 'Nawada', 'District', 5, 1),
(136, 'Patna', 'District', 5, 1),
(137, 'Purnia (Purnea)', 'District', 5, 1),
(138, 'Rohtas', 'District', 5, 1),
(139, 'Saharsa', 'District', 5, 1),
(140, 'Samastipur', 'District', 5, 1),
(141, 'Saran', 'District', 5, 1),
(142, 'Sheikhpura', 'District', 5, 1),
(143, 'Sheohar', 'District', 5, 1),
(144, 'Sitamarhi', 'District', 5, 1),
(145, 'Siwan', 'District', 5, 1),
(146, 'Supaul', 'District', 5, 1),
(147, 'Vaishali', 'District', 5, 1),
(148, 'West Champaran', 'District', 5, 1),
(149, 'Chandigarh', 'District', 6, 1),
(150, 'Balod', 'District', 7, 1),
(151, 'Baloda Bazar', 'District', 7, 1),
(152, 'Balrampur', 'District', 7, 1),
(153, 'Bastar', 'District', 7, 1),
(154, 'Bemetara', 'District', 7, 1),
(155, 'Bijapur', 'District', 7, 1),
(156, 'Bilaspur', 'District', 7, 1),
(157, 'Dantewada (South Bastar)', 'District', 7, 1),
(158, 'Dhamtari', 'District', 7, 1),
(159, 'Durg', 'District', 7, 1),
(160, 'Gariyaband', 'District', 7, 1),
(161, 'Janjgir-Champa', 'District', 7, 1),
(162, 'Jashpur', 'District', 7, 1),
(163, 'Kabirdham (Kawardha)', 'District', 7, 1),
(164, 'Kanker (North Bastar)', 'District', 7, 1),
(165, 'Kondagaon', 'District', 7, 1),
(166, 'Korba', 'District', 7, 1),
(167, 'Korea (Koriya)', 'District', 7, 1),
(168, 'Mahasamund', 'District', 7, 1),
(169, 'Mungeli', 'District', 7, 1),
(170, 'Narayanpur', 'District', 7, 1),
(171, 'Raigarh', 'District', 7, 1),
(172, 'Raipur', 'District', 7, 1),
(173, 'Rajnandgaon', 'District', 7, 1),
(174, 'Sukma', 'District', 7, 1),
(175, 'Surajpur', 'District', 7, 1),
(176, 'Surguja', 'District', 7, 1),
(177, 'Dadra &amp; Nagar Haveli', 'District', 8, 1),
(178, 'Daman', 'District', 9, 1),
(179, 'Diu', 'District', 9, 1),
(180, 'Central Delhi', 'District', 10, 1),
(181, 'East Delhi', 'District', 10, 1),
(182, 'New Delhi', 'District', 10, 1),
(183, 'North Delhi', 'District', 10, 1),
(184, 'North East  Delhi', 'District', 10, 1),
(185, 'North West  Delhi', 'District', 10, 1),
(186, 'Shahdara', 'District', 10, 1),
(187, 'South Delhi', 'District', 10, 1),
(188, 'South East Delhi', 'District', 10, 1),
(189, 'South West  Delhi', 'District', 10, 1),
(190, 'West Delhi', 'District', 10, 1),
(191, 'North Goa', 'District', 11, 1),
(192, 'South Goa', 'District', 11, 1),
(193, 'Ahmedabad', 'District', 12, 1),
(194, 'Amreli', 'District', 12, 1),
(195, 'Anand', 'District', 12, 1),
(196, 'Aravalli', 'District', 12, 1),
(197, 'Banaskantha (Palanpur)', 'District', 12, 1),
(198, 'Bharuch', 'District', 12, 1),
(199, 'Bhavnagar', 'District', 12, 1),
(200, 'Botad', 'District', 12, 1),
(201, 'Chhota Udepur', 'District', 12, 1),
(202, 'Dahod', 'District', 12, 1),
(203, 'Dangs (Ahwa)', 'District', 12, 1),
(204, 'Devbhoomi Dwarka', 'District', 12, 1),
(205, 'Gandhinagar', 'District', 12, 1),
(206, 'Gir Somnath', 'District', 12, 1),
(207, 'Jamnagar', 'District', 12, 1),
(208, 'Junagadh', 'District', 12, 1),
(209, 'Kachchh', 'District', 12, 1),
(210, 'Kheda (Nadiad)', 'District', 12, 1),
(211, 'Mahisagar', 'District', 12, 1),
(212, 'Mehsana', 'District', 12, 1),
(213, 'Morbi', 'District', 12, 1),
(214, 'Narmada (Rajpipla)', 'District', 12, 1),
(215, 'Navsari', 'District', 12, 1),
(216, 'Panchmahal (Godhra)', 'District', 12, 1),
(217, 'Patan', 'District', 12, 1),
(218, 'Porbandar', 'District', 12, 1),
(219, 'Rajkot', 'District', 12, 1),
(220, 'Sabarkantha (Himmatnagar)', 'District', 12, 1),
(221, 'Surat', 'District', 12, 1),
(222, 'Surendranagar', 'District', 12, 1),
(223, 'Tapi (Vyara)', 'District', 12, 1),
(224, 'Vadodara', 'District', 12, 1),
(225, 'Valsad', 'District', 12, 1),
(226, 'Ambala', 'District', 13, 1),
(227, 'Bhiwani', 'District', 13, 1),
(228, 'Charkhi Dadri', 'District', 13, 1),
(229, 'Faridabad', 'District', 13, 1),
(230, 'Fatehabad', 'District', 13, 1),
(231, 'Gurgaon', 'District', 13, 1),
(232, 'Hisar', 'District', 13, 1),
(233, 'Jhajjar', 'District', 13, 1),
(234, 'Jind', 'District', 13, 1),
(235, 'Kaithal', 'District', 13, 1),
(236, 'Karnal', 'District', 13, 1),
(237, 'Kurukshetra', 'District', 13, 1),
(238, 'Mahendragarh', 'District', 13, 1),
(239, 'Mewat', 'District', 13, 1),
(240, 'Palwal', 'District', 13, 1),
(241, 'Panchkula', 'District', 13, 1),
(242, 'Panipat', 'District', 13, 1),
(243, 'Rewari', 'District', 13, 1),
(244, 'Rohtak', 'District', 13, 1),
(245, 'Sirsa', 'District', 13, 1),
(246, 'Sonipat', 'District', 13, 1),
(247, 'Yamunanagar', 'District', 13, 1),
(248, 'Bilaspur', 'District', 14, 1),
(249, 'Chamba', 'District', 14, 1),
(250, 'Hamirpur', 'District', 14, 1),
(251, 'Kangra', 'District', 14, 1),
(252, 'Kinnaur', 'District', 14, 1),
(253, 'Kullu', 'District', 14, 1),
(254, 'Lahaul &amp; Spiti', 'District', 14, 1),
(255, 'Mandi', 'District', 14, 1),
(256, 'Shimla', 'District', 14, 1),
(257, 'Sirmaur (Sirmour)', 'District', 14, 1),
(258, 'Solan', 'District', 14, 1),
(259, 'Una', 'District', 14, 1),
(260, 'Anantnag', 'District', 15, 1),
(261, 'Bandipore', 'District', 15, 1),
(262, 'Baramulla', 'District', 15, 1),
(263, 'Budgam', 'District', 15, 1),
(264, 'Doda', 'District', 15, 1),
(265, 'Ganderbal', 'District', 15, 1),
(266, 'Jammu', 'District', 15, 1),
(267, 'Kargil', 'District', 15, 1),
(268, 'Kathua', 'District', 15, 1),
(269, 'Kishtwar', 'District', 15, 1),
(270, 'Kulgam', 'District', 15, 1),
(271, 'Kupwara', 'District', 15, 1),
(272, 'Leh', 'District', 15, 1),
(273, 'Poonch', 'District', 15, 1),
(274, 'Pulwama', 'District', 15, 1),
(275, 'Rajouri', 'District', 15, 1),
(276, 'Ramban', 'District', 15, 1),
(277, 'Reasi', 'District', 15, 1),
(278, 'Samba', 'District', 15, 1),
(279, 'Shopian', 'District', 15, 1),
(280, 'Srinagar', 'District', 15, 1),
(281, 'Udhampur', 'District', 15, 1),
(282, 'Bokaro', 'District', 16, 1),
(283, 'Chatra', 'District', 16, 1),
(284, 'Deoghar', 'District', 16, 1),
(285, 'Dhanbad', 'District', 16, 1),
(286, 'Dumka', 'District', 16, 1),
(287, 'East Singhbhum', 'District', 16, 1),
(288, 'Garhwa', 'District', 16, 1),
(289, 'Giridih', 'District', 16, 1),
(290, 'Godda', 'District', 16, 1),
(291, 'Gumla', 'District', 16, 1),
(292, 'Hazaribag', 'District', 16, 1),
(293, 'Jamtara', 'District', 16, 1),
(294, 'Khunti', 'District', 16, 1),
(295, 'Koderma', 'District', 16, 1),
(296, 'Latehar', 'District', 16, 1),
(297, 'Lohardaga', 'District', 16, 1),
(298, 'Pakur', 'District', 16, 1),
(299, 'Palamu', 'District', 16, 1),
(300, 'Ramgarh', 'District', 16, 1),
(301, 'Ranchi', 'District', 16, 1),
(302, 'Sahibganj', 'District', 16, 1),
(303, 'Seraikela-Kharsawan', 'District', 16, 1),
(304, 'Simdega', 'District', 16, 1),
(305, 'West Singhbhum', 'District', 16, 1),
(306, 'Bagalkot', 'District', 17, 1),
(307, 'Ballari (Bellary)', 'District', 17, 1),
(308, 'Belagavi (Belgaum)', 'District', 17, 1),
(309, 'Bengaluru (Bangalore) Rural', 'District', 17, 1),
(310, 'Bengaluru (Bangalore) Urban', 'District', 17, 1),
(311, 'Bidar', 'District', 17, 1),
(312, 'Chamarajanagar', 'District', 17, 1),
(313, 'Chikballapur', 'District', 17, 1),
(314, 'Chikkamagaluru (Chikmagalur)', 'District', 17, 1),
(315, 'Chitradurga', 'District', 17, 1),
(316, 'Dakshina Kannada', 'District', 17, 1),
(317, 'Davangere', 'District', 17, 1),
(318, 'Dharwad', 'District', 17, 1),
(319, 'Gadag', 'District', 17, 1),
(320, 'Hassan', 'District', 17, 1),
(321, 'Haveri', 'District', 17, 1),
(322, 'Kalaburagi (Gulbarga)', 'District', 17, 1),
(323, 'Kodagu', 'District', 17, 1),
(324, 'Kolar', 'District', 17, 1),
(325, 'Koppal', 'District', 17, 1),
(326, 'Mandya', 'District', 17, 1),
(327, 'Mysuru (Mysore)', 'District', 17, 1),
(328, 'Raichur', 'District', 17, 1),
(329, 'Ramanagara', 'District', 17, 1),
(330, 'Shivamogga (Shimoga)', 'District', 17, 1),
(331, 'Tumakuru (Tumkur)', 'District', 17, 1),
(332, 'Udupi', 'District', 17, 1),
(333, 'Uttara Kannada (Karwar)', 'District', 17, 1),
(334, 'Vijayapura (Bijapur)', 'District', 17, 1),
(335, 'Yadgir', 'District', 17, 1),
(336, 'Alappuzha', 'District', 18, 1),
(337, 'Ernakulam', 'District', 18, 1),
(338, 'Idukki', 'District', 18, 1),
(339, 'Kannur', 'District', 18, 1),
(340, 'Kasaragod', 'District', 18, 1),
(341, 'Kollam', 'District', 18, 1),
(342, 'Kottayam', 'District', 18, 1),
(343, 'Kozhikode', 'District', 18, 1),
(344, 'Malappuram', 'District', 18, 1),
(345, 'Palakkad', 'District', 18, 1),
(346, 'Pathanamthitta', 'District', 18, 1),
(347, 'Thiruvananthapuram', 'District', 18, 1),
(348, 'Thrissur', 'District', 18, 1),
(349, 'Wayanad', 'District', 18, 1),
(350, 'Lakshadweep', 'District', 19, 1),
(351, 'Agar Malwa', 'District', 20, 1),
(352, 'Alirajpur', 'District', 20, 1),
(353, 'Anuppur', 'District', 20, 1),
(354, 'Ashoknagar', 'District', 20, 1),
(355, 'Balaghat', 'District', 20, 1),
(356, 'Barwani', 'District', 20, 1),
(357, 'Betul', 'District', 20, 1),
(358, 'Bhind', 'District', 20, 1),
(359, 'Bhopal', 'District', 20, 1),
(360, 'Burhanpur', 'District', 20, 1),
(361, 'Chhatarpur', 'District', 20, 1),
(362, 'Chhindwara', 'District', 20, 1),
(363, 'Damoh', 'District', 20, 1),
(364, 'Datia', 'District', 20, 1),
(365, 'Dewas', 'District', 20, 1),
(366, 'Dhar', 'District', 20, 1),
(367, 'Dindori', 'District', 20, 1),
(368, 'Guna', 'District', 20, 1),
(369, 'Gwalior', 'District', 20, 1),
(370, 'Harda', 'District', 20, 1),
(371, 'Hoshangabad', 'District', 20, 1),
(372, 'Indore', 'District', 20, 1),
(373, 'Jabalpur', 'District', 20, 1),
(374, 'Jhabua', 'District', 20, 1),
(375, 'Katni', 'District', 20, 1),
(376, 'Khandwa', 'District', 20, 1),
(377, 'Khargone', 'District', 20, 1),
(378, 'Mandla', 'District', 20, 1),
(379, 'Mandsaur', 'District', 20, 1),
(380, 'Morena', 'District', 20, 1),
(381, 'Narsinghpur', 'District', 20, 1),
(382, 'Neemuch', 'District', 20, 1),
(383, 'Panna', 'District', 20, 1),
(384, 'Raisen', 'District', 20, 1),
(385, 'Rajgarh', 'District', 20, 1),
(386, 'Ratlam', 'District', 20, 1),
(387, 'Rewa', 'District', 20, 1),
(388, 'Sagar', 'District', 20, 1),
(389, 'Satna', 'District', 20, 1),
(390, 'Sehore', 'District', 20, 1),
(391, 'Seoni', 'District', 20, 1),
(392, 'Shahdol', 'District', 20, 1),
(393, 'Shajapur', 'District', 20, 1),
(394, 'Sheopur', 'District', 20, 1),
(395, 'Shivpuri', 'District', 20, 1),
(396, 'Sidhi', 'District', 20, 1),
(397, 'Singrauli', 'District', 20, 1),
(398, 'Tikamgarh', 'District', 20, 1),
(399, 'Ujjain', 'District', 20, 1),
(400, 'Umaria', 'District', 20, 1),
(401, 'Vidisha', 'District', 20, 1),
(402, 'Ahmednagar', 'District', 21, 1),
(403, 'Akola', 'District', 21, 1),
(404, 'Amravati', 'District', 21, 1),
(405, 'Aurangabad', 'District', 21, 1),
(406, 'Beed', 'District', 21, 1),
(407, 'Bhandara', 'District', 21, 1),
(408, 'Buldhana', 'District', 21, 1),
(409, 'Chandrapur', 'District', 21, 1),
(410, 'Dhule', 'District', 21, 1),
(411, 'Gadchiroli', 'District', 21, 1),
(412, 'Gondia', 'District', 21, 1),
(413, 'Hingoli', 'District', 21, 1),
(414, 'Jalgaon', 'District', 21, 1),
(415, 'Jalna', 'District', 21, 1),
(416, 'Kolhapur', 'District', 21, 1),
(417, 'Latur', 'District', 21, 1),
(418, 'Mumbai City', 'District', 21, 1),
(419, 'Mumbai Suburban', 'District', 21, 1),
(420, 'Nagpur', 'District', 21, 1),
(421, 'Nanded', 'District', 21, 1),
(422, 'Nandurbar', 'District', 21, 1),
(423, 'Nashik', 'District', 21, 1),
(424, 'Osmanabad', 'District', 21, 1),
(425, 'Palghar', 'District', 21, 1),
(426, 'Parbhani', 'District', 21, 1),
(427, 'Pune', 'District', 21, 1),
(428, 'Raigad', 'District', 21, 1),
(429, 'Ratnagiri', 'District', 21, 1),
(430, 'Sangli', 'District', 21, 1),
(431, 'Satara', 'District', 21, 1),
(432, 'Sindhudurg', 'District', 21, 1),
(433, 'Solapur', 'District', 21, 1),
(434, 'Thane', 'District', 21, 1),
(435, 'Wardha', 'District', 21, 1),
(436, 'Washim', 'District', 21, 1),
(437, 'Yavatmal', 'District', 21, 1),
(438, 'Bishnupur', 'District', 22, 1),
(439, 'Chandel', 'District', 22, 1),
(440, 'Churachandpur', 'District', 22, 1),
(441, 'Imphal East', 'District', 22, 1),
(442, 'Imphal West', 'District', 22, 1),
(443, 'Jiribam', 'District', 22, 1),
(444, 'Kakching', 'District', 22, 1),
(445, 'Kamjong', 'District', 22, 1),
(446, 'Kangpokpi', 'District', 22, 1),
(447, 'Noney', 'District', 22, 1),
(448, 'Pherzawl', 'District', 22, 1),
(449, 'Senapati', 'District', 22, 1),
(450, 'Tamenglong', 'District', 22, 1),
(451, 'Tengnoupal', 'District', 22, 1),
(452, 'Thoubal', 'District', 22, 1),
(453, 'Ukhrul', 'District', 22, 1),
(454, 'East Garo Hills', 'District', 23, 1),
(455, 'East Jaintia Hills', 'District', 23, 1),
(456, 'East Khasi Hills', 'District', 23, 1),
(457, 'North Garo Hills', 'District', 23, 1),
(458, 'Ri Bhoi', 'District', 23, 1),
(459, 'South Garo Hills', 'District', 23, 1),
(460, 'South West Garo Hills', 'District', 23, 1),
(461, 'South West Khasi Hills', 'District', 23, 1),
(462, 'West Garo Hills', 'District', 23, 1),
(463, 'West Jaintia Hills', 'District', 23, 1),
(464, 'West Khasi Hills', 'District', 23, 1),
(465, 'Aizawl', 'District', 24, 1),
(466, 'Champhai', 'District', 24, 1),
(467, 'Kolasib', 'District', 24, 1),
(468, 'Lawngtlai', 'District', 24, 1),
(469, 'Lunglei', 'District', 24, 1),
(470, 'Mamit', 'District', 24, 1),
(471, 'Saiha', 'District', 24, 1),
(472, 'Serchhip', 'District', 24, 1),
(473, 'Dimapur', 'District', 25, 1),
(474, 'Kiphire', 'District', 25, 1),
(475, 'Kohima', 'District', 25, 1),
(476, 'Longleng', 'District', 25, 1),
(477, 'Mokokchung', 'District', 25, 1),
(478, 'Mon', 'District', 25, 1),
(479, 'Peren', 'District', 25, 1),
(480, 'Phek', 'District', 25, 1),
(481, 'Tuensang', 'District', 25, 1),
(482, 'Wokha', 'District', 25, 1),
(483, 'Zunheboto', 'District', 25, 1),
(484, 'Angul', 'District', 26, 1),
(485, 'Balangir', 'District', 26, 1),
(486, 'Balasore', 'District', 26, 1),
(487, 'Bargarh', 'District', 26, 1),
(488, 'Bhadrak', 'District', 26, 1),
(489, 'Boudh', 'District', 26, 1),
(490, 'Cuttack', 'District', 26, 1),
(491, 'Deogarh', 'District', 26, 1),
(492, 'Dhenkanal', 'District', 26, 1),
(493, 'Gajapati', 'District', 26, 1),
(494, 'Ganjam', 'District', 26, 1),
(495, 'Jagatsinghapur', 'District', 26, 1),
(496, 'Jajpur', 'District', 26, 1),
(497, 'Jharsuguda', 'District', 26, 1),
(498, 'Kalahandi', 'District', 26, 1),
(499, 'Kandhamal', 'District', 26, 1),
(500, 'Kendrapara', 'District', 26, 1),
(501, 'Kendujhar (Keonjhar)', 'District', 26, 1),
(502, 'Khordha', 'District', 26, 1),
(503, 'Koraput', 'District', 26, 1),
(504, 'Malkangiri', 'District', 26, 1),
(505, 'Mayurbhanj', 'District', 26, 1),
(506, 'Nabarangpur', 'District', 26, 1),
(507, 'Nayagarh', 'District', 26, 1),
(508, 'Nuapada', 'District', 26, 1),
(509, 'Puri', 'District', 26, 1),
(510, 'Rayagada', 'District', 26, 1),
(511, 'Sambalpur', 'District', 26, 1),
(512, 'Sonepur', 'District', 26, 1),
(513, 'Sundargarh', 'District', 26, 1),
(514, 'Karaikal', 'District', 27, 1),
(515, 'Mahe', 'District', 27, 1),
(516, 'Pondicherry', 'District', 27, 1),
(517, 'Yanam', 'District', 27, 1),
(518, 'Amritsar', 'District', 28, 1),
(519, 'Barnala', 'District', 28, 1),
(520, 'Bathinda', 'District', 28, 1),
(521, 'Faridkot', 'District', 28, 1),
(522, 'Fatehgarh Sahib', 'District', 28, 1),
(523, 'Fazilka', 'District', 28, 1),
(524, 'Ferozepur', 'District', 28, 1),
(525, 'Gurdaspur', 'District', 28, 1),
(526, 'Hoshiarpur', 'District', 28, 1),
(527, 'Jalandhar', 'District', 28, 1),
(528, 'Kapurthala', 'District', 28, 1),
(529, 'Ludhiana', 'District', 28, 1),
(530, 'Mansa', 'District', 28, 1),
(531, 'Moga', 'District', 28, 1),
(532, 'Muktsar', 'District', 28, 1),
(533, 'Nawanshahr (Shahid Bhagat Singh Nagar)', 'District', 28, 1),
(534, 'Pathankot', 'District', 28, 1),
(535, 'Patiala', 'District', 28, 1),
(536, 'Rupnagar', 'District', 28, 1),
(537, 'Sahibzada Ajit Singh Nagar (Mohali)', 'District', 28, 1),
(538, 'Sangrur', 'District', 28, 1),
(539, 'Tarn Taran', 'District', 28, 1),
(540, 'Ajmer', 'District', 29, 1),
(541, 'Alwar', 'District', 29, 1),
(542, 'Banswara', 'District', 29, 1),
(543, 'Baran', 'District', 29, 1),
(544, 'Barmer', 'District', 29, 1),
(545, 'Bharatpur', 'District', 29, 1),
(546, 'Bhilwara', 'District', 29, 1),
(547, 'Bikaner', 'District', 29, 1),
(548, 'Bundi', 'District', 29, 1),
(549, 'Chittorgarh', 'District', 29, 1),
(550, 'Churu', 'District', 29, 1),
(551, 'Dausa', 'District', 29, 1),
(552, 'Dholpur', 'District', 29, 1),
(553, 'Dungarpur', 'District', 29, 1),
(554, 'Hanumangarh', 'District', 29, 1),
(555, 'Jaipur', 'District', 29, 1),
(556, 'Jaisalmer', 'District', 29, 1),
(557, 'Jalore', 'District', 29, 1),
(558, 'Jhalawar', 'District', 29, 1),
(559, 'Jhunjhunu', 'District', 29, 1),
(560, 'Jodhpur', 'District', 29, 1),
(561, 'Karauli', 'District', 29, 1),
(562, 'Kota', 'District', 29, 1),
(563, 'Nagaur', 'District', 29, 1),
(564, 'Pali', 'District', 29, 1),
(565, 'Pratapgarh', 'District', 29, 1),
(566, 'Rajsamand', 'District', 29, 1),
(567, 'Sawai Madhopur', 'District', 29, 1),
(568, 'Sikar', 'District', 29, 1),
(569, 'Sirohi', 'District', 29, 1),
(570, 'Sri Ganganagar', 'District', 29, 1),
(571, 'Tonk', 'District', 29, 1),
(572, 'Udaipur', 'District', 29, 1),
(573, 'East Sikkim', 'District', 30, 1),
(574, 'North Sikkim', 'District', 30, 1),
(575, 'South Sikkim', 'District', 30, 1),
(576, 'West Sikkim', 'District', 30, 1),
(577, 'Ariyalur', 'District', 31, 1),
(578, 'Chennai', 'District', 31, 1),
(579, 'Coimbatore', 'District', 31, 1),
(580, 'Cuddalore', 'District', 31, 1),
(581, 'Dharmapuri', 'District', 31, 1),
(582, 'Dindigul', 'District', 31, 1),
(583, 'Erode', 'District', 31, 1),
(584, 'Kanchipuram', 'District', 31, 1),
(585, 'Kanyakumari', 'District', 31, 1),
(586, 'Karur', 'District', 31, 1),
(587, 'Krishnagiri', 'District', 31, 1),
(588, 'Madurai', 'District', 31, 1),
(589, 'Nagapattinam', 'District', 31, 1),
(590, 'Namakkal', 'District', 31, 1),
(591, 'Nilgiris', 'District', 31, 1),
(592, 'Perambalur', 'District', 31, 1),
(593, 'Pudukkottai', 'District', 31, 1),
(594, 'Ramanathapuram', 'District', 31, 1),
(595, 'Salem', 'District', 31, 1),
(596, 'Sivaganga', 'District', 31, 1),
(597, 'Thanjavur', 'District', 31, 1),
(598, 'Theni', 'District', 31, 1),
(599, 'Thoothukudi (Tuticorin)', 'District', 31, 1),
(600, 'Tiruchirappalli', 'District', 31, 1),
(601, 'Tirunelveli', 'District', 31, 1),
(602, 'Tiruppur', 'District', 31, 1),
(603, 'Tiruvallur', 'District', 31, 1),
(604, 'Tiruvannamalai', 'District', 31, 1),
(605, 'Tiruvarur', 'District', 31, 1),
(606, 'Vellore', 'District', 31, 1),
(607, 'Viluppuram', 'District', 31, 1),
(608, 'Virudhunagar', 'District', 31, 1),
(609, 'Adilabad', 'District', 32, 1),
(610, 'Bhadradri Kothagudem', 'District', 32, 1),
(611, 'Hyderabad', 'District', 32, 1),
(612, 'Jagtial', 'District', 32, 1),
(613, 'Jangaon', 'District', 32, 1),
(614, 'Jayashankar Bhoopalpally', 'District', 32, 1),
(615, 'Jogulamba Gadwal', 'District', 32, 1),
(616, 'Kamareddy', 'District', 32, 1),
(617, 'Karimnagar', 'District', 32, 1),
(618, 'Khammam', 'District', 32, 1),
(619, 'Komaram Bheem Asifabad', 'District', 32, 1),
(620, 'Mahabubabad', 'District', 32, 1),
(621, 'Mahabubnagar', 'District', 32, 1),
(622, 'Mancherial', 'District', 32, 1),
(623, 'Medak', 'District', 32, 1),
(624, 'Medchal', 'District', 32, 1),
(625, 'Nagarkurnool', 'District', 32, 1),
(626, 'Nalgonda', 'District', 32, 1),
(627, 'Nirmal', 'District', 32, 1),
(628, 'Nizamabad', 'District', 32, 1),
(629, 'Peddapalli', 'District', 32, 1),
(630, 'Rajanna Sircilla', 'District', 32, 1),
(631, 'Rangareddy', 'District', 32, 1),
(632, 'Sangareddy', 'District', 32, 1),
(633, 'Siddipet', 'District', 32, 1),
(634, 'Suryapet', 'District', 32, 1),
(635, 'Vikarabad', 'District', 32, 1),
(636, 'Wanaparthy', 'District', 32, 1),
(637, 'Warangal (Rural)', 'District', 32, 1),
(638, 'Warangal (Urban)', 'District', 32, 1),
(639, 'Yadadri Bhuvanagiri', 'District', 32, 1),
(640, 'Dhalai', 'District', 33, 1),
(641, 'Gomati', 'District', 33, 1),
(642, 'Khowai', 'District', 33, 1),
(643, 'North Tripura', 'District', 33, 1),
(644, 'Sepahijala', 'District', 33, 1),
(645, 'South Tripura', 'District', 33, 1),
(646, 'Unakoti', 'District', 33, 1),
(647, 'West Tripura', 'District', 33, 1),
(648, 'Almora', 'District', 34, 1),
(649, 'Bageshwar', 'District', 34, 1),
(650, 'Chamoli', 'District', 34, 1),
(651, 'Champawat', 'District', 34, 1),
(652, 'Dehradun', 'District', 34, 1),
(653, 'Haridwar', 'District', 34, 1),
(654, 'Nainital', 'District', 34, 1),
(655, 'Pauri Garhwal', 'District', 34, 1),
(656, 'Pithoragarh', 'District', 34, 1),
(657, 'Rudraprayag', 'District', 34, 1),
(658, 'Tehri Garhwal', 'District', 34, 1),
(659, 'Udham Singh Nagar', 'District', 34, 1),
(660, 'Uttarkashi', 'District', 34, 1),
(661, 'Agra', 'District', 35, 1),
(662, 'Aligarh', 'District', 35, 1),
(663, 'Allahabad', 'District', 35, 1),
(664, 'Ambedkar Nagar', 'District', 35, 1),
(665, 'Amethi (Chatrapati Sahuji Mahraj Nagar)', 'District', 35, 1),
(666, 'Amroha (J.P. Nagar)', 'District', 35, 1),
(667, 'Auraiya', 'District', 35, 1),
(668, 'Azamgarh', 'District', 35, 1),
(669, 'Baghpat', 'District', 35, 1),
(670, 'Bahraich', 'District', 35, 1),
(671, 'Ballia', 'District', 35, 1),
(672, 'Balrampur', 'District', 35, 1),
(673, 'Banda', 'District', 35, 1),
(674, 'Barabanki', 'District', 35, 1),
(675, 'Bareilly', 'District', 35, 1),
(676, 'Basti', 'District', 35, 1),
(677, 'Bhadohi', 'District', 35, 1),
(678, 'Bijnor', 'District', 35, 1),
(679, 'Budaun', 'District', 35, 1),
(680, 'Bulandshahr', 'District', 35, 1),
(681, 'Chandauli', 'District', 35, 1),
(682, 'Chitrakoot', 'District', 35, 1),
(683, 'Deoria', 'District', 35, 1),
(684, 'Etah', 'District', 35, 1),
(685, 'Etawah', 'District', 35, 1),
(686, 'Faizabad', 'District', 35, 1),
(687, 'Farrukhabad', 'District', 35, 1),
(688, 'Fatehpur', 'District', 35, 1),
(689, 'Firozabad', 'District', 35, 1),
(690, 'Gautam Buddha Nagar', 'District', 35, 1),
(691, 'Ghaziabad', 'District', 35, 1),
(692, 'Ghazipur', 'District', 35, 1),
(693, 'Gonda', 'District', 35, 1),
(694, 'Gorakhpur', 'District', 35, 1),
(695, 'Hamirpur', 'District', 35, 1),
(696, 'Hapur (Panchsheel Nagar)', 'District', 35, 1),
(697, 'Hardoi', 'District', 35, 1),
(698, 'Hathras', 'District', 35, 1),
(699, 'Jalaun', 'District', 35, 1),
(700, 'Jaunpur', 'District', 35, 1),
(701, 'Jhansi', 'District', 35, 1),
(702, 'Kannauj', 'District', 35, 1),
(703, 'Kanpur Dehat', 'District', 35, 1),
(704, 'Kanpur Nagar', 'District', 35, 1),
(705, 'Kanshiram Nagar (Kasganj)', 'District', 35, 1),
(706, 'Kaushambi', 'District', 35, 1),
(707, 'Kushinagar (Padrauna)', 'District', 35, 1),
(708, 'Lakhimpur - Kheri', 'District', 35, 1),
(709, 'Lalitpur', 'District', 35, 1),
(710, 'Lucknow', 'District', 35, 1),
(711, 'Maharajganj', 'District', 35, 1),
(712, 'Mahoba', 'District', 35, 1),
(713, 'Mainpuri', 'District', 35, 1),
(714, 'Mathura', 'District', 35, 1),
(715, 'Mau', 'District', 35, 1),
(716, 'Meerut', 'District', 35, 1),
(717, 'Mirzapur', 'District', 35, 1),
(718, 'Moradabad', 'District', 35, 1),
(719, 'Muzaffarnagar', 'District', 35, 1),
(720, 'Pilibhit', 'District', 35, 1),
(721, 'Pratapgarh', 'District', 35, 1),
(722, 'RaeBareli', 'District', 35, 1),
(723, 'Rampur', 'District', 35, 1),
(724, 'Saharanpur', 'District', 35, 1),
(725, 'Sambhal (Bhim Nagar)', 'District', 35, 1),
(726, 'Sant Kabir Nagar', 'District', 35, 1),
(727, 'Shahjahanpur', 'District', 35, 1),
(728, 'Shamali (Prabuddh Nagar)', 'District', 35, 1),
(729, 'Shravasti', 'District', 35, 1),
(730, 'Siddharth Nagar', 'District', 35, 1),
(731, 'Sitapur', 'District', 35, 1),
(732, 'Sonbhadra', 'District', 35, 1),
(733, 'Sultanpur', 'District', 35, 1),
(734, 'Unnao', 'District', 35, 1),
(735, 'Varanasi', 'District', 35, 1),
(736, 'Alipurduar', 'District', 36, 1),
(737, 'Bankura', 'District', 36, 1),
(738, 'Birbhum', 'District', 36, 1),
(739, 'Cooch Behar', 'District', 36, 1),
(740, 'Dakshin Dinajpur (South Dinajpur)', 'District', 36, 1),
(741, 'Darjeeling', 'District', 36, 1),
(742, 'Hooghly', 'District', 36, 1),
(743, 'Howrah', 'District', 36, 1),
(744, 'Jalpaiguri', 'District', 36, 1),
(745, 'Jhargram', 'District', 36, 1),
(746, 'Kalimpong', 'District', 36, 1),
(747, 'Kolkata', 'District', 36, 1),
(748, 'Malda', 'District', 36, 1),
(749, 'Murshidabad', 'District', 36, 1),
(750, 'Nadia', 'District', 36, 1),
(751, 'North 24 Parganas', 'District', 36, 1),
(752, 'Paschim Medinipur (West Medinipur)', 'District', 36, 1),
(753, 'Paschim (West) Burdwan (Bardhaman)', 'District', 36, 1),
(754, 'Purba Burdwan (Bardhaman)', 'District', 36, 1),
(755, 'Purba Medinipur (East Medinipur)', 'District', 36, 1),
(756, 'Purulia', 'District', 36, 1),
(757, 'South 24 Parganas', 'District', 36, 1),
(758, 'Uttar Dinajpur (North Dinajpur)', 'District', 36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gd_cart`
--

CREATE TABLE `gd_cart` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `ptable` varchar(100) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_cart_addon`
--

CREATE TABLE `gd_cart_addon` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `ptable` varchar(100) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_category`
--

CREATE TABLE `gd_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd_category`
--

INSERT INTO `gd_category` (`id`, `name`, `image_path`, `slug`, `added_on`, `status`) VALUES
(1, 'FRUITS & VEGETABLES', '/assets/images/admin/category/1594874897.jpg', 'fruits-vegetables', '2020-07-16 10:18:17', 1),
(2, 'MASALA/ SEASONING', '/assets/images/admin/category/1596097933.jpg', 'masala-seasoning', '2020-07-30 14:02:13', 1),
(3, 'DAIRY', '/assets/images/admin/category/1594875096.jpg', 'dairy', '2020-07-16 10:21:36', 1),
(4, 'BEVERAGES', '/assets/images/admin/category/1594875187.jpg', 'beverages', '2020-07-16 10:23:07', 1),
(5, 'SNACKS & BRANDED FOODS', '/assets/images/admin/category/1594876516.jpg', 'snacks-branded-foods', '2020-07-16 10:45:16', 1),
(6, 'BEAUTY & HYGIENE', '/assets/images/admin/category/1594876584.jpg', 'beauty-hygiene', '2020-07-16 10:46:24', 1),
(7, 'CLEANING & HOUSEHOLD', '/assets/images/admin/category/1594876639.jpg', 'cleaning-household', '2020-07-16 10:47:19', 1),
(8, 'ATTA & FLOURS', '/assets/images/admin/category/1596098342.jpg', 'atta-flours', '2020-07-30 14:09:02', 1),
(9, 'BABY CARE', '/assets/images/admin/category/1594876942.jpg', 'baby-care', '2020-07-16 10:52:22', 0),
(10, 'View all', '', 'view-all', '2020-07-16 12:04:25', 0),
(11, 'SALT, SUGAR,  JAGGERY', '/assets/images/admin/category/1596096775.jpg', 'salt-sugar-jaggery', '2020-07-30 13:42:55', 1),
(12, 'PETS', 'assets/images/admin/category/1596096935.png', 'pets', '2020-07-30 13:45:35', 0),
(13, 'PETS', '/assets/images/admin/category/1596097035.jpg', 'pets-2', '2020-07-30 13:47:15', 1),
(14, 'BABY PRODUCTS', '/assets/images/admin/category/1596097178.jpg', 'baby-products', '2020-07-30 13:49:38', 1),
(15, 'PATANJALI PRODUCTS', '/assets/images/admin/category/1596097338.jpg', 'patanjali-products', '2020-07-30 13:52:18', 1),
(16, 'DRY FRUITS', '/assets/images/admin/category/1596097380.jpg', 'dry-fruits', '2020-07-30 13:53:00', 1),
(17, 'RICE & PULSES(DAL)', '/assets/images/admin/category/1596098620.jpg', 'rice-pulses-dal', '2020-07-30 14:13:40', 1),
(18, 'CANS & JARS', '/assets/images/admin/category/1596098966.jpg', 'cans-jars', '2020-07-30 14:19:26', 1),
(19, 'OIL & GHEE', '/assets/images/admin/category/1596099234.jpg', 'oil-ghee', '2020-07-30 14:23:54', 1),
(20, 'MISC. ITEM', '/assets/images/admin/category/1596099527.png', 'misc-item', '2020-07-30 14:28:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gd_cream`
--

CREATE TABLE `gd_cream` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(225) NOT NULL,
  `price` float(14,2) NOT NULL,
  `size_price` text NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_customer_address`
--

CREATE TABLE `gd_customer_address` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `district` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_customer_detail`
--

CREATE TABLE `gd_customer_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `referal_code` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  `block_status` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_customer_login`
--

CREATE TABLE `gd_customer_login` (
  `id` int(11) NOT NULL,
  `detail_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `vp` varchar(255) NOT NULL,
  `otp_value` varchar(255) NOT NULL,
  `otp_created` datetime NOT NULL,
  `logged_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_delivery_slot`
--

CREATE TABLE `gd_delivery_slot` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slot_type` varchar(50) NOT NULL,
  `slot_price` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `publish_status` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_delivery_time`
--

CREATE TABLE `gd_delivery_time` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `added_on` datetime NOT NULL,
  `publish_status` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_delivery_valet`
--

CREATE TABLE `gd_delivery_valet` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gd_delivery_zone`
--

CREATE TABLE `gd_delivery_zone` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `publish_status` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_designation`
--

CREATE TABLE `gd_designation` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gd_gstrate`
--

CREATE TABLE `gd_gstrate` (
  `id` int(11) NOT NULL,
  `gst_name` varchar(255) NOT NULL,
  `rate` float(14,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd_gstrate`
--

INSERT INTO `gd_gstrate` (`id`, `gst_name`, `rate`, `status`) VALUES
(1, 'GST-0%', 0.00, 1),
(2, 'GST-5%', 0.05, 1),
(3, 'GST-12%', 0.12, 1),
(4, 'GST-18%', 0.18, 1),
(5, 'GST-28%', 0.28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gd_inventory_gst`
--

CREATE TABLE `gd_inventory_gst` (
  `id` int(11) NOT NULL,
  `gst_name` varchar(255) NOT NULL,
  `rate` float(14,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd_inventory_gst`
--

INSERT INTO `gd_inventory_gst` (`id`, `gst_name`, `rate`, `status`) VALUES
(1, 'GST-0%', 0.00, 1),
(2, 'GST-5%', 0.05, 1),
(3, 'GST-12%', 0.12, 1),
(4, 'GST-18%', 0.18, 1),
(5, 'GST-28%', 0.28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gd_inventory_payment`
--

CREATE TABLE `gd_inventory_payment` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `waybill` varchar(60) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `s_mobile` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `pay` varchar(100) NOT NULL,
  `due` varchar(100) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gd_inventory_purchase`
--

CREATE TABLE `gd_inventory_purchase` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `waybill` varchar(150) NOT NULL,
  `time` time NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `gross_amt` float(14,2) NOT NULL,
  `round` float(14,2) NOT NULL,
  `total` float(14,2) NOT NULL,
  `role` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gd_inventory_purchaseproducts`
--

CREATE TABLE `gd_inventory_purchaseproducts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pcode` varchar(100) NOT NULL,
  `variant_id` varchar(11) NOT NULL,
  `rate` float(14,2) NOT NULL,
  `gst` float(14,2) NOT NULL,
  `quantity` float(14,2) NOT NULL,
  `taxable` float(14,2) NOT NULL,
  `gstvalue` float(14,2) NOT NULL,
  `amount` float(14,2) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gd_inventory_purchasetemp`
--

CREATE TABLE `gd_inventory_purchasetemp` (
  `id` int(11) NOT NULL,
  `pcode` varchar(150) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` varchar(20) NOT NULL,
  `rate` float(14,2) NOT NULL,
  `quantity` float(14,2) NOT NULL,
  `taxable` float(14,2) NOT NULL,
  `gst` float(14,2) NOT NULL,
  `gstvalue` float(14,2) NOT NULL,
  `amount` float(14,2) NOT NULL,
  `role` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gd_inventory_supplier`
--

CREATE TABLE `gd_inventory_supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gst` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gd_location`
--

CREATE TABLE `gd_location` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_lowcategory`
--

CREATE TABLE `gd_lowcategory` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd_lowcategory`
--

INSERT INTO `gd_lowcategory` (`id`, `cat_id`, `subcat_id`, `name`, `image_path`, `slug`, `added_on`, `status`) VALUES
(1, 1, 2, 'POTATO', '/assets/images/admin/lowcategory/1596100774.jpg', 'potato', '2020-07-30 14:49:34', 1),
(2, 1, 2, 'Lemon', '/assets/images/admin/lowcategory/1596184793.jpg', 'lemon', '2020-07-31 14:09:53', 1),
(3, 1, 2, 'Drum stick', '/assets/images/admin/lowcategory/1596184970.jpg', 'drum-stick', '2020-07-31 14:12:50', 1),
(4, 1, 2, 'Arvi (Quora)', '/assets/images/admin/lowcategory/1596185244.jpg', 'arvi-quora', '2020-07-31 14:17:24', 1),
(5, 1, 2, 'Raw Banana', '/assets/images/admin/lowcategory/1596185502.jpg', 'raw-banana', '2020-07-31 14:21:42', 1),
(6, 1, 2, 'Jackfruit', '/assets/images/admin/lowcategory/1596185916.jpg', 'jackfruit', '2020-07-31 14:28:36', 1),
(7, 1, 2, 'Tamarind (Imli)', '/assets/images/admin/lowcategory/1596186078.jpg', 'tamarind-imli', '2020-07-31 14:31:18', 1),
(8, 1, 2, 'Spring Onion', '/assets/images/admin/lowcategory/1596186509.jpg', 'spring-onion', '2020-07-31 14:38:29', 1),
(9, 1, 2, 'TOMATO', '/assets/images/admin/lowcategory/1596100843.jpg', 'tomato', '2020-07-30 14:50:43', 1),
(10, 1, 2, 'ONION', '/assets/images/admin/lowcategory/1596100903.jpg', 'onion', '2020-07-30 14:51:43', 1),
(11, 1, 2, 'BRINJAL', '/assets/images/admin/lowcategory/1596100948.jpg', 'brinjal', '2020-07-30 14:52:28', 1),
(12, 1, 2, 'GARLIC', '/assets/images/admin/lowcategory/1596100979.jpg', 'garlic', '2020-07-30 14:52:59', 1),
(13, 1, 2, 'Ridge gourd', '/assets/images/admin/lowcategory/1596181549.jpg', 'ridge-gourd', '2020-07-31 13:15:49', 1),
(14, 1, 2, 'Pumpkin', '/assets/images/admin/lowcategory/1596181769.jpg', 'pumpkin', '2020-07-31 13:19:29', 1),
(15, 1, 2, 'Radish', '/assets/images/admin/lowcategory/1596181827.jpg', 'radish', '2020-07-31 13:20:27', 1),
(16, 1, 2, 'Carrot', '/assets/images/admin/lowcategory/1596181938.jpg', 'carrot', '2020-07-31 13:22:18', 1),
(17, 1, 2, 'Chilli', '/assets/images/admin/lowcategory/1596182001.jpg', 'chilli', '2020-07-31 13:23:21', 1),
(18, 1, 2, 'Corn', '/assets/images/admin/lowcategory/1596182063.jpg', 'corn', '2020-07-31 13:24:23', 1),
(19, 1, 2, 'Lady finger', '/assets/images/admin/lowcategory/1596182107.jpg', 'lady-finger', '2020-07-31 13:25:07', 1),
(20, 1, 2, 'Spinach', '/assets/images/admin/lowcategory/1596182146.jpg', 'spinach', '2020-07-31 13:25:46', 1),
(21, 1, 2, 'Coriander', '/assets/images/admin/lowcategory/1596182184.jpg', 'coriander', '2020-07-31 13:26:24', 1),
(22, 1, 2, 'French beans', '/assets/images/admin/lowcategory/1596182242.jpg', 'french-beans', '2020-07-31 13:27:22', 1),
(23, 1, 2, 'Fenugreek', '/assets/images/admin/lowcategory/1596182292.jpg', 'fenugreek', '2020-07-31 13:28:12', 1),
(24, 1, 2, 'Lobia', '/assets/images/admin/lowcategory/1596182393.jpg', 'lobia', '2020-07-31 13:29:53', 1),
(25, 1, 2, 'Beet root', '/assets/images/admin/lowcategory/1596182490.jpg', 'beet-root', '2020-07-31 13:31:30', 1),
(26, 1, 2, 'Sponge gourd', '/assets/images/admin/lowcategory/1596182579.jpg', 'sponge-gourd', '2020-07-31 13:32:59', 1),
(27, 1, 2, 'Better gourd', '/assets/images/admin/lowcategory/1596182818.jpg', 'better-gourd', '2020-07-31 13:36:58', 1),
(28, 1, 2, 'Cucumber', '/assets/images/admin/lowcategory/1596182918.jpg', 'cucumber', '2020-07-31 13:38:38', 1),
(29, 1, 2, 'Bottle gourd', '/assets/images/admin/lowcategory/1596183109.jpg', 'bottle-gourd', '2020-07-31 13:41:49', 1),
(30, 1, 2, 'pointed gourd (parawal)', '/assets/images/admin/lowcategory/1596183599.jpg', 'pointed-gourd-parawal', '2020-07-31 13:49:59', 1),
(31, 1, 2, 'Coccinia (kunaru)', '/assets/images/admin/lowcategory/1596183701.jpg', 'coccinia-kunaru', '2020-07-31 13:51:41', 1),
(32, 1, 2, 'Broccali', '/assets/images/admin/lowcategory/1596183840.jpg', 'broccali', '2020-07-31 13:54:00', 1),
(33, 1, 2, 'Ginger', '/assets/images/admin/lowcategory/1596183936.jpg', 'ginger', '2020-07-31 13:55:36', 1),
(34, 1, 2, 'Capsicum', '/assets/images/admin/lowcategory/1596184036.jpg', 'capsicum', '2020-07-31 13:57:16', 1),
(35, 1, 2, 'Cabbage', '/assets/images/admin/lowcategory/1596184108.jpg', 'cabbage', '2020-07-31 13:58:28', 1),
(36, 1, 2, 'Couliflower', '/assets/images/admin/lowcategory/1596184205.jpg', 'couliflower', '2020-07-31 14:00:05', 1),
(37, 1, 2, 'Mushroom', '/assets/images/admin/lowcategory/1596184311.jpg', 'mushroom', '2020-07-31 14:01:51', 1),
(38, 1, 2, 'Pea', '/assets/images/admin/lowcategory/1596184389.jpg', 'pea', '2020-07-31 14:03:09', 1),
(39, 1, 2, 'Sweet potato', '/assets/images/admin/lowcategory/1596184481.jpg', 'sweet-potato', '2020-07-31 14:04:41', 1),
(40, 1, 2, 'Yam (Suran)', '/assets/images/admin/lowcategory/1596185673.jpg', 'yam-suran', '2020-07-31 14:24:33', 1),
(41, 1, 3, 'Mango', '/assets/images/admin/lowcategory/1596186790.jpg', 'mango', '2020-07-31 14:43:10', 1),
(42, 1, 3, 'Banana', '/assets/images/admin/lowcategory/1596186828.jpg', 'banana', '2020-07-31 14:43:48', 1),
(43, 1, 3, 'Apple', '/assets/images/admin/lowcategory/1596186854.jpg', 'apple', '2020-07-31 14:44:14', 1),
(44, 1, 3, 'Coconut', '/assets/images/admin/lowcategory/1596186880.jpg', 'coconut', '2020-07-31 14:44:40', 1),
(45, 1, 3, 'Grapes', '/assets/images/admin/lowcategory/1596186928.jpg', 'grapes', '2020-07-31 14:45:28', 1),
(46, 1, 3, 'Grapes (Black)', '/assets/images/admin/lowcategory/1596186968.jpg', 'grapes-black', '2020-07-31 14:46:08', 1),
(47, 1, 3, 'Curstard Apple', '/assets/images/admin/lowcategory/1596187020.jpg', 'curstard-apple', '2020-07-31 14:47:00', 1),
(48, 1, 3, 'Papaya', '/assets/images/admin/lowcategory/1596187057.jpg', 'papaya', '2020-07-31 14:47:37', 1),
(49, 1, 3, 'Pear', '/assets/images/admin/lowcategory/1596187085.jpg', 'pear', '2020-07-31 14:48:05', 1),
(50, 1, 3, 'Pineapple', '/assets/images/admin/lowcategory/1596187141.jpg', 'pineapple', '2020-07-31 14:49:01', 1),
(51, 1, 3, 'Litchi', '/assets/images/admin/lowcategory/1596187177.jpg', 'litchi', '2020-07-31 14:49:37', 1),
(52, 1, 3, 'Orange', '/assets/images/admin/lowcategory/1596187210.jpg', 'orange', '2020-07-31 14:50:10', 1),
(53, 1, 3, 'Guava', '/assets/images/admin/lowcategory/1596187242.jpg', 'guava', '2020-07-31 14:50:42', 1),
(54, 1, 3, 'Musk melon', '/assets/images/admin/lowcategory/1596187287.jpg', 'musk-melon', '2020-07-31 14:51:27', 1),
(55, 1, 3, 'Gooseberry (Amla)', '/assets/images/admin/lowcategory/1596187345.jpg', 'gooseberry-amla', '2020-07-31 14:52:25', 1),
(56, 1, 3, 'Water Melon', '/assets/images/admin/lowcategory/1596187400.jpg', 'water-melon', '2020-07-31 14:53:20', 1),
(57, 1, 3, 'Pomegranate', '/assets/images/admin/lowcategory/1596187487.jpg', 'pomegranate', '2020-07-31 14:54:47', 1),
(58, 1, 3, 'Wood Apple (Bel)', '/assets/images/admin/lowcategory/1596187531.jpg', 'wood-apple-bel', '2020-07-31 14:55:31', 1),
(59, 1, 3, 'Sweetlime (Mousami)', '/assets/images/admin/lowcategory/1596187592.jpg', 'sweetlime-mousami', '2020-07-31 14:56:32', 1),
(60, 1, 3, 'Water-chestnut (singhara)', '/assets/images/admin/lowcategory/1596187685.jpg', 'water-chestnut-singhara', '2020-07-31 14:58:05', 1),
(61, 1, 3, 'Blackberry', '/assets/images/admin/lowcategory/1596188059.jpg', 'blackberry', '2020-07-31 15:04:19', 1),
(62, 1, 3, 'Stoberry', '/assets/images/admin/lowcategory/1596188186.jpg', 'stoberry', '2020-07-31 15:06:26', 1),
(63, 1, 3, 'Java Plum (Jamun)', '/assets/images/admin/lowcategory/1596188289.jpg', 'java-plum-jamun', '2020-07-31 15:08:09', 1),
(64, 1, 3, 'Dates (Khajur)', '/assets/images/admin/lowcategory/1596188369.jpg', 'dates-khajur', '2020-07-31 15:09:29', 1),
(65, 1, 3, 'Cheery', '/assets/images/admin/lowcategory/1596188460.jpg', 'cheery', '2020-07-31 15:11:00', 1),
(66, 8, 8, 'Aashirvaad ( Wheat & Multigrain)', '/assets/images/admin/lowcategory/1596267017.png', 'aashirvaad-wheat-multigrain', '2020-08-01 13:00:17', 1),
(67, 8, 8, 'Ahhar', '/assets/images/admin/lowcategory/1596267076.png', 'ahhar', '2020-08-01 13:01:16', 1),
(68, 8, 8, 'Nature Fresh', '/assets/images/admin/lowcategory/1596267133.jpg', 'nature-fresh', '2020-08-01 13:02:13', 1),
(69, 8, 8, 'Shakti Bhog', '/assets/images/admin/lowcategory/1596267201.jpg', 'shakti-bhog', '2020-08-01 13:03:21', 1),
(70, 8, 8, 'Patanjali', '/assets/images/admin/lowcategory/1596267250.jpg', 'patanjali', '2020-08-01 13:04:10', 1),
(71, 8, 8, 'Annpurna', '/assets/images/admin/lowcategory/1596267435.jpg', 'annpurna', '2020-08-01 13:07:15', 1),
(72, 8, 9, 'Patanjali', '/assets/images/admin/lowcategory/1596268176.jpg', 'patanjali-2', '2020-08-01 13:19:36', 1),
(73, 8, 9, 'Ahhar', '/assets/images/admin/lowcategory/1596268209.jpg', 'ahhar-2', '2020-08-01 13:20:09', 1),
(74, 8, 9, 'Fortune', '/assets/images/admin/lowcategory/1596268266.jpg', 'fortune', '2020-08-01 13:21:06', 1),
(75, 8, 9, 'Rajdhani', '/assets/images/admin/lowcategory/1596268306.jpg', 'rajdhani', '2020-08-01 13:21:46', 1),
(76, 8, 9, 'Tata sampann', '/assets/images/admin/lowcategory/1596268369.jpg', 'tata-sampann', '2020-08-01 13:22:49', 1),
(77, 8, 9, 'Shakti Bhog', '/assets/images/admin/lowcategory/1596268444.jpg', 'shakti-bhog-2', '2020-08-01 13:24:04', 1),
(78, 8, 9, 'Jallan', '/assets/images/admin/lowcategory/1596268480.jpg', 'jallan', '2020-08-01 13:24:40', 1),
(79, 8, 19, 'Patanjali', '/assets/images/admin/lowcategory/1596270259.jpg', 'patanjali-3', '2020-08-01 13:54:19', 1),
(80, 8, 19, 'Aahar', '/assets/images/admin/lowcategory/1596270300.jpg', 'aahar', '2020-08-01 13:55:00', 1),
(81, 8, 19, 'Fortune', '/assets/images/admin/lowcategory/1596270348.jpg', 'fortune-2', '2020-08-01 13:55:48', 1),
(82, 8, 19, 'Aashirwad', '/assets/images/admin/lowcategory/1596270382.jpg', 'aashirwad', '2020-08-01 13:56:22', 1),
(83, 8, 19, 'Rajdhani', '/assets/images/admin/lowcategory/1596270439.jpg', 'rajdhani-2', '2020-08-01 13:57:19', 1),
(84, 8, 19, 'Shakti Bhog', '/assets/images/admin/lowcategory/1596270522.jpg', 'shakti-bhog-3', '2020-08-01 13:58:42', 1),
(85, 8, 20, 'Patanjali', '/assets/images/admin/lowcategory/1596271197.jpg', 'patanjali-4', '2020-08-01 14:09:57', 1),
(86, 8, 20, 'Rajdhani', '/assets/images/admin/lowcategory/1596271244.jpg', 'rajdhani-3', '2020-08-01 14:10:44', 1),
(87, 8, 20, 'Shakti Bhog', '/assets/images/admin/lowcategory/1596271302.jpg', 'shakti-bhog-4', '2020-08-01 14:11:42', 1),
(88, 8, 20, 'Fortune', '/assets/images/admin/lowcategory/1596271347.jpg', 'fortune-3', '2020-08-01 14:12:27', 1),
(89, 8, 20, 'Ahhar', '/assets/images/admin/lowcategory/1596271395.jpg', 'ahhar-3', '2020-08-01 14:13:15', 1),
(90, 8, 21, 'Patanjali', '/assets/images/admin/lowcategory/1596271914.jpg', 'patanjali-5', '2020-08-01 14:21:54', 1),
(91, 8, 21, 'Rajdhani', '/assets/images/admin/lowcategory/1596271962.jpg', 'rajdhani-4', '2020-08-01 14:22:42', 1),
(92, 8, 21, 'Anoop', '/assets/images/admin/lowcategory/1596272009.jpg', 'anoop', '2020-08-01 14:23:29', 1),
(93, 8, 21, 'Rakesh', '/assets/images/admin/lowcategory/1596272055.jpg', 'rakesh', '2020-08-01 14:24:15', 1),
(94, 8, 21, 'Jalan', '/assets/images/admin/lowcategory/1596272096.jpg', 'jalan', '2020-08-01 14:24:56', 1),
(95, 8, 21, 'Tata sampann', '/assets/images/admin/lowcategory/1596272143.jpg', 'tata-sampann-2', '2020-08-01 14:25:43', 1),
(96, 11, 22, 'Patanjali (Black Salt)', '/assets/images/admin/lowcategory/1596272806.jpg', 'patanjali-black-salt', '2020-08-01 14:36:46', 1),
(97, 11, 22, 'Patanjali (Rock Salt)', '/assets/images/admin/lowcategory/1596272870.jpg', 'patanjali-rock-salt', '2020-08-01 14:37:50', 1),
(98, 11, 22, 'Tata Salt', '/assets/images/admin/lowcategory/1596272942.jpg', 'tata-salt', '2020-08-01 14:39:02', 1),
(99, 11, 22, 'Tata Lite', '/assets/images/admin/lowcategory/1596272983.jpg', 'tata-lite', '2020-08-01 14:39:43', 1),
(100, 11, 22, 'Aashirwad Salt', '/assets/images/admin/lowcategory/1596273037.jpg', 'aashirwad-salt', '2020-08-01 14:40:37', 1),
(101, 11, 23, 'Sugar', '/assets/images/admin/lowcategory/1596273390.jpg', 'sugar', '2020-08-01 14:46:30', 1),
(102, 11, 23, 'Sugar free', '/assets/images/admin/lowcategory/1596273443.jpg', 'sugar-free', '2020-08-01 14:47:23', 1),
(103, 11, 23, 'Sugar Cubes', '/assets/images/admin/lowcategory/1596273527.jpg', 'sugar-cubes', '2020-08-01 14:48:47', 1),
(104, 11, 24, 'NAD Jaggery', '/assets/images/admin/lowcategory/1596273789.jpg', 'nad-jaggery', '2020-08-01 14:53:09', 1),
(105, 11, 24, 'NAD Jaggery (powder)', '/assets/images/admin/lowcategory/1596273828.jpg', 'nad-jaggery-powder', '2020-08-01 14:53:48', 1),
(106, 3, 25, 'Amul', '/assets/images/admin/lowcategory/1596355127.jpg', 'amul', '2020-08-02 13:28:47', 1),
(107, 3, 25, 'Mother Dairy', '/assets/images/admin/lowcategory/1596355272.png', 'mother-dairy', '2020-08-02 13:31:12', 1),
(108, 3, 25, 'Sudha', '/assets/images/admin/lowcategory/1596355386.jpg', 'sudha', '2020-08-02 13:33:06', 1),
(109, 3, 25, 'Gyan', '/assets/images/admin/lowcategory/1596355460.png', 'gyan', '2020-08-02 13:34:20', 1),
(110, 3, 25, 'Parag', '/assets/images/admin/lowcategory/1596355551.jpg', 'parag', '2020-08-02 13:35:51', 1),
(111, 3, 26, 'Amul', '/assets/images/admin/lowcategory/1596355595.jpg', 'amul-2', '2020-08-02 13:36:35', 1),
(112, 3, 26, 'Mother Dairy', '/assets/images/admin/lowcategory/1596355635.png', 'mother-dairy-2', '2020-08-02 13:37:15', 1),
(113, 3, 26, 'Sudha', '/assets/images/admin/lowcategory/1596355697.jpg', 'sudha-2', '2020-08-02 13:38:17', 1),
(114, 3, 26, 'Gyan', '/assets/images/admin/lowcategory/1596355731.png', 'gyan-2', '2020-08-02 13:38:51', 1),
(115, 3, 27, 'Amul', '/assets/images/admin/lowcategory/1596355758.jpg', 'amul-3', '2020-08-02 13:39:18', 1),
(116, 3, 27, 'Mother Dairy', '/assets/images/admin/lowcategory/1596355787.png', 'mother-dairy-3', '2020-08-02 13:39:47', 1),
(117, 3, 27, 'Sudha', '/assets/images/admin/lowcategory/1596355823.jpg', 'sudha-3', '2020-08-02 13:40:23', 1),
(118, 3, 27, 'Parag', '/assets/images/admin/lowcategory/1596355869.jpg', 'parag-2', '2020-08-02 13:41:09', 1),
(119, 3, 27, 'Gyan', '/assets/images/admin/lowcategory/1596355901.png', 'gyan-3', '2020-08-02 13:41:41', 1),
(120, 3, 28, 'Amul', '/assets/images/admin/lowcategory/1596355930.jpg', 'amul-4', '2020-08-02 13:42:10', 1),
(121, 3, 29, 'Amul', '/assets/images/admin/lowcategory/1596355974.jpg', 'amul-5', '2020-08-02 13:42:54', 1),
(122, 3, 29, 'Parag', '/assets/images/admin/lowcategory/1596356005.jpg', 'parag-3', '2020-08-02 13:43:25', 1),
(123, 3, 30, 'Amul', '/assets/images/admin/lowcategory/1596356034.jpg', 'amul-6', '2020-08-02 13:43:54', 1),
(124, 3, 30, 'Mother Dairy', '/assets/images/admin/lowcategory/1596356077.png', 'mother-dairy-4', '2020-08-02 13:44:37', 1),
(125, 4, 31, 'Coco -cola', '/assets/images/admin/lowcategory/1596357139.jpg', 'coco--cola', '2020-08-02 14:02:19', 1),
(126, 4, 31, 'Pepsi', '/assets/images/admin/lowcategory/1596357246.jpg', 'pepsi', '2020-08-02 14:04:06', 1),
(127, 4, 31, 'Mirinda', '/assets/images/admin/lowcategory/1596357281.jpg', 'mirinda', '2020-08-02 14:04:41', 1),
(128, 4, 31, 'Mazza', '/assets/images/admin/lowcategory/1596357311.jpg', 'mazza', '2020-08-02 14:05:11', 1),
(129, 4, 31, 'Appy Fizz', '/assets/images/admin/lowcategory/1596357357.jpg', 'appy-fizz', '2020-08-02 14:05:57', 1),
(130, 4, 31, ' Dew', '/assets/images/admin/lowcategory/1596357414.jpg', 'dew', '2020-08-02 14:06:54', 1),
(131, 4, 31, '7up', '/assets/images/admin/lowcategory/1596357443.jpg', '7up', '2020-08-02 14:07:23', 1),
(132, 4, 31, 'Fenta', '/assets/images/admin/lowcategory/1596357476.jpg', 'fenta', '2020-08-02 14:07:56', 1),
(133, 4, 32, 'Real ', '/assets/images/admin/lowcategory/1596357735.jpg', 'real', '2020-08-02 14:12:15', 1),
(134, 4, 32, 'Tropicana', '/assets/images/admin/lowcategory/1596357768.jpg', 'tropicana', '2020-08-02 14:12:48', 1),
(135, 4, 32, 'B Natural', '/assets/images/admin/lowcategory/1596357809.jpg', 'b-natural', '2020-08-02 14:13:29', 1),
(136, 4, 33, 'Kinley', '/assets/images/admin/lowcategory/1596358031.jpg', 'kinley', '2020-08-02 14:17:11', 1),
(137, 4, 33, 'Bailley', '/assets/images/admin/lowcategory/1596358075.jpg', 'bailley', '2020-08-02 14:17:55', 1),
(138, 4, 33, 'Aqua Fine', '/assets/images/admin/lowcategory/1596358120.jpg', 'aqua-fine', '2020-08-02 14:18:40', 1),
(139, 4, 33, 'Bisleri', '/assets/images/admin/lowcategory/1596358158.jpg', 'bisleri', '2020-08-02 14:19:18', 1),
(140, 4, 33, 'Tata Water', '/assets/images/admin/lowcategory/1596358193.jpg', 'tata-water', '2020-08-02 14:19:53', 1),
(141, 13, 46, 'Pedigree', '/assets/images/admin/lowcategory/1596359722.jpg', 'pedigree', '2020-08-02 14:45:22', 1),
(142, 13, 46, 'Himalaya (Pets food)', '/assets/images/admin/lowcategory/1596359766.jpg', 'himalaya-pets-food', '2020-08-02 14:46:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gd_order`
--

CREATE TABLE `gd_order` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `delivery_rate` float(14,2) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time` time NOT NULL,
  `delivery_address` text NOT NULL,
  `delivery_pincode` int(7) NOT NULL,
  `delivery_state` varchar(100) NOT NULL,
  `delivery_zone` varchar(255) NOT NULL,
  `delivery_landmark` varchar(255) NOT NULL,
  `delivery_mobileno` varchar(20) NOT NULL,
  `order_total` float(14,2) NOT NULL,
  `delivery_status` int(11) NOT NULL DEFAULT '0',
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL,
  `cur_time` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_order_assign`
--

CREATE TABLE `gd_order_assign` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `valet_id` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gd_order_payment`
--

CREATE TABLE `gd_order_payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payment_details` mediumtext NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_order_product`
--

CREATE TABLE `gd_order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_no` varchar(20) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `ptable` varchar(20) NOT NULL,
  `pcode` varchar(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(14,2) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_product`
--

CREATE TABLE `gd_product` (
  `id` int(11) NOT NULL,
  `pcode` varchar(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_id` varchar(255) NOT NULL,
  `lowcat_id` varchar(255) NOT NULL,
  `prodtype` varchar(20) NOT NULL,
  `property_id` varchar(255) NOT NULL,
  `addonmenu_id` text NOT NULL,
  `gst_rate` varchar(100) NOT NULL,
  `path` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `cut_time` time NOT NULL,
  `added_on` datetime NOT NULL,
  `publish_status` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd_product`
--

INSERT INTO `gd_product` (`id`, `pcode`, `product_name`, `cat_id`, `subcat_id`, `lowcat_id`, `prodtype`, `property_id`, `addonmenu_id`, `gst_rate`, `path`, `parent`, `cut_time`, `added_on`, `publish_status`, `status`) VALUES
(1, 'PROD-61534908', 'Sweet Corn', 1, '[\"2\",\"4\"]', 'null', 'product', '[\"4\"]', '', '0.05', '/assets/images/admin/product/1596532698.png', 0, '00:00:00', '2020-08-04 14:48:18', 1, 1),
(2, 'PROD-30517264', 'Appricot', 1, '[\"3\",\"6\",\"4\"]', '[\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\"]', 'product', '[\"4\"]', '', '0.05', '/assets/images/admin/product/1596540297.jpg', 0, '00:00:00', '2020-08-04 16:54:57', 1, 1),
(3, 'PROD-69425730', 'Product', 1, '[\"3\",\"4\"]', '[\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\"]', 'product', '[\"4\"]', '', '0.05', '/assets/images/admin/product/1596540617.jpg', 0, '00:00:00', '2020-08-04 17:00:17', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gd_product_detail`
--

CREATE TABLE `gd_product_detail` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `desp` longtext NOT NULL,
  `location_id` text NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd_product_detail`
--

INSERT INTO `gd_product_detail` (`id`, `prod_id`, `desp`, `location_id`, `added_on`, `status`) VALUES
(2, 1, '', '[\"1\",\"4\",\"5\"]', '2020-08-04 15:42:16', 1),
(3, 2, '', '[\"1\",\"4\",\"5\",\"7\"]', '2020-08-04 16:57:49', 1),
(4, 3, '', '[\"1\",\"4\",\"5\",\"7\"]', '2020-08-04 17:00:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gd_product_variant`
--

CREATE TABLE `gd_product_variant` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `variant_price` float(14,2) NOT NULL,
  `variant_offerprice` float(14,2) NOT NULL,
  `variant_stock_qty` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd_product_variant`
--

INSERT INTO `gd_product_variant` (`id`, `pid`, `variant_id`, `discount`, `variant_price`, `variant_offerprice`, `variant_stock_qty`, `status`) VALUES
(1, 1, 1, 5, 50.00, 48.00, 1, 1),
(2, 1, 2, 7, 100.00, 93.00, 1, 1),
(3, 2, 3, 10, 50.00, 45.00, 10, 1),
(4, 2, 4, 10, 120.00, 108.00, 20, 1),
(5, 3, 1, 10, 100.00, 90.00, 1, 1),
(6, 3, 2, 10, 210.00, 189.00, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gd_shape`
--

CREATE TABLE `gd_shape` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(225) NOT NULL,
  `price` float(14,2) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gd_sidebar`
--

CREATE TABLE `gd_sidebar` (
  `id` int(11) NOT NULL,
  `activate_menu` varchar(255) NOT NULL,
  `activate_not` varchar(255) NOT NULL,
  `base_url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd_sidebar`
--

INSERT INTO `gd_sidebar` (`id`, `activate_menu`, `activate_not`, `base_url`, `icon`, `name`, `parent`, `position`, `role_id`, `status`) VALUES
(1, 'admin', '{\"0\":\"\"}', '/admin', '<i class=\"nav-icon fas fa-tachometer-alt\"></i>', 'Dashboard', 0, 0, 1, 1),
(2, 'masterkey', '{\"0\":\"\"}', 'admin/#', '<i class=\"nav-icon fa fa-key\"></i>', 'Master Key', 0, 1, 1, 1),
(3, 'masterkey/category', '{\"0\":\"\"}', 'admin/masterkey/category', '<i class=\'nav-icon fa fa-file\'></i>', 'Category', 2, 1, 1, 1),
(4, 'masterkey/subcategory', '{\"0\":\"\"}', 'admin/masterkey/subcategory', '<i class=\'nav-icon fa fa-file\'></i>', 'Sub-Category', 2, 2, 1, 1),
(5, 'masterkey/brand', '{\"0\":\"\"}', 'admin/masterkey/brand', '<i class=\'nav-icon fa fa-file\'></i>', 'Brands', 2, 4, 1, 1),
(6, 'product', '{\"0\":\"\"}', 'admin/#', '<i class=\"nav-icon fab fa-product-hunt\" aria-hidden=\"true\"></i>', 'Product', 0, 2, 1, 1),
(7, 'product/addnew', '{\"0\":\"\"}', 'admin/product/addnew', '<i class=\'nav-icon fa fa-plus\'></i>', 'New Product', 6, 1, 1, 1),
(8, 'masterkey/quantity', '{\"0\":\"\"}', 'admin/masterkey/quantity', '<i class=\'nav-icon fa fa-file\'></i>', 'Variant Quantity', 2, 5, 1, 1),
(9, 'product/productlist', '{\"0\":\"\"}', 'admin/product/productlist', '<i class=\'nav-icon fa fa-plus\'></i>', 'Product List', 6, 2, 1, 1),
(10, 'masterkey/eggornoegg', '{\"0\":\"\"}', 'admin/masterkey/eggornoegg', '<i class=\'nav-icon fa fa-file\'></i>', 'Veg/Non-Veg', 2, 7, 1, 1),
(11, 'addons', '{\"0\":\"\"}', 'admin/#', '<i class=\"nav-icon fa fa-random\" aria-hidden=\"true\"></i>', 'Product Addons', 0, 3, 1, 0),
(12, 'addons/addnew', '{\"0\":\"\"}', 'admin/addons/addnew', '<i class=\'nav-icon fa fa-plus\'></i>', 'New Addons', 11, 0, 1, 1),
(13, 'addons/productlist', '{\"0\":\"\"}', 'admin/addons/productlist', '<i class=\'nav-icon fa fa-plus\'></i>', 'Addons Product List', 11, 0, 1, 1),
(14, 'deliverytime', '{\"0\":\"zones\",\"1\":\"addzones\"}', 'admin/#', '<i class=\"nav-icon fa fa-clock\" aria-hidden=\"true\"></i>', 'Delivery Date & Time', 0, 4, 1, 0),
(15, 'deliverytime/addslot', '{\"0\":\"\"}', 'admin/deliverytime/addslot', '<i class=\'nav-icon fa fa-plus\'></i>', 'Delivery Slot', 14, 0, 1, 1),
(16, 'deliverytime/addtime', '{\"0\":\"\"}', 'admin/deliverytime/addtime', '<i class=\'nav-icon fa fa-plus\'></i>', 'Delivery Time', 14, 0, 1, 1),
(17, 'deliverytime', '{\"0\":\"addslot\",\"1\":\"addtime\"}', 'admin/#', '<i class=\"nav-icon fa fa-area-chart\" aria-hidden=\"true\"></i>', 'Delivery Zones', 0, 5, 1, 0),
(18, 'deliverytime/addzones', '{\"0\":\"\"}', 'admin/deliverytime/addzones', '<i class=\'nav-icon fa fa-plus\'></i>', 'Delivery Zone', 17, 0, 1, 1),
(19, 'masterkey/shape', '{\"0\":\"\"}', 'admin/masterkey/shape', '<i class=\'nav-icon fa fa-file\'></i>', 'Shape', 2, 7, 1, 0),
(20, 'masterkey/cream', '{\"0\":\"\"}', 'admin/masterkey/cream', '<i class=\'nav-icon fa fa-file\'></i>', 'Cream', 2, 8, 1, 0),
(21, 'inventory', '{\"0\":\"\"}', 'admin/#', '<i class=\"nav-icon fas fa-list\" aria-hidden=\"true\"></i>', 'Inventory', 0, 6, 1, 1),
(22, 'inventory/add_purchase', '{\"0\":\"\"}', 'admin/inventory/add_purchase', '<i class=\'nav-icon fa fa-file\'></i>', 'Add Purchase', 21, 0, 1, 1),
(23, 'masterkey/supplier', '{\"0\":\"\"}', 'admin/masterkey/supplier', '<i class=\'nav-icon fa fa-file\'></i>', 'Add Supplier', 2, 9, 1, 1),
(24, 'stock', '{\"0\":\"\"}', 'admin/#', '<i class=\"nav-icon fas fa-list\" aria-hidden=\"true\"></i>', 'Stock', 0, 7, 1, 1),
(25, 'stock/stock_in', '{\"0\":\"\"}', 'admin/stock/stock_in', '<i class=\'nav-icon fa fa-file\'></i>', 'Stock In', 24, 0, 1, 1),
(26, 'stock/stock_out', '{\"0\":\"\"}', 'admin/stock/stock_out', '<i class=\'nav-icon fa fa-file\'></i>', 'Stock Out', 24, 0, 1, 1),
(27, 'inventory/purchaselist', '{\"0\":\"\"}', 'admin/inventory/purchaselist', '<i class=\'nav-icon fa fa-file\'></i>', 'Purchase List', 21, 0, 1, 1),
(28, 'payment', '{\"0\":\"\"}', 'admin/#', '<i class=\"nav-icon fa fa-rupee\" aria-hidden=\"true\"></i>', 'Payment', 0, 8, 1, 1),
(29, 'payment/pay_form', '{\"0\":\"\"}', 'admin/payment/pay_form', '<i class=\"nav-icon fab fa-cart\" aria-hidden=\"true\"></i>', 'Pay', 28, 0, 1, 0),
(30, 'staff', '{\"0\":\"\"}', 'admin/#', '<i class=\"nav-icon fa fa-users\" aria-hidden=\"true\"></i>', 'ADD STAFF', 0, 9, 1, 1),
(31, 'staff/add_staff', '{\"0\":\"\"}', 'admin/staff/add_staff', '', 'Add Valet', 30, 0, 1, 1),
(32, 'masterkey/designation', '{\"0\":\"\"}', 'admin/masterkey/designation', '<i class=\'nav-icon fa fa-file\'></i>', 'Add Designation', 2, 10, 1, 1),
(34, 'Delivery Valet', '{\"0\":\"\"}', 'admin/#', '<i class=\"nav-icon fa fa-motorcycle\" aria-hidden=\"true\"></i>', 'Delivery Valet', 0, 10, 1, 0),
(35, 'valet', '{\"0\":\"assign_order\",\"1\":\"assign_order_list\"}', 'admin/#', '<i class=\"nav-icon fa fa-motorcycle\" aria-hidden=\"true\"></i>', 'Add Delivery valet', 0, 11, 1, 1),
(36, 'valet/add_new', '{\"0\":\"\"}', 'admin/valet/add_new', '', 'Add valet', 35, 0, 1, 1),
(37, 'valet/valet_list', '{\"0\":\"\"}', 'admin/valet/valet_list', '', 'Valet List', 35, 0, 1, 1),
(38, 'report', '{\"0\":\"\"}', 'admin/report/dashboard', '<i class=\"nav-icon fas fa-file\"></i>', 'Report', 0, 13, 1, 1),
(39, 'website', '{\"0\":\"\"}', 'admin/#', '<i class=\"nav-icon fas fa-globe\"></i>', 'Website Management', 0, 14, 1, 1),
(40, 'categorydesign', '{\"0\":\"\"}', 'admin/website/categorydesign', '<i class=\"nav-icon fas fa-plus\"></i>', 'Front Page Design', 39, 0, 1, 1),
(41, 'masterkey/addonmenu', '{\"0\":\"\"}', 'admin/masterkey/addonmenu', '<i class=\'nav-icon fa fa-file\'></i>', 'Add On Menu', 2, 11, 1, 0),
(42, 'masterkey/lowcategory', '{\"0\":\"\"}', 'admin/masterkey/lowcategory', '<i class=\'nav-icon fa fa-file\'></i>', 'Low-Category', 2, 3, 1, 1),
(43, 'masterkey/location', '{\"0\":\"\"}', 'admin/masterkey/location', '<i class=\'nav-icon fa fa-file\'></i>', 'Locations', 2, 6, 1, 1),
(44, 'product/availability', '{\"0\":\"\"}', 'admin/product/availability', '<i class=\'nav-icon fa fa-plus\'></i>', 'Product Availability', 6, 3, 1, 1),
(45, 'masterkey/add_gst', '{\"0\":\"\"}', 'admin/masterkey/add_gst', '<i class=\'nav-icon fa fa-file\'></i>', 'Add Gst Rate', 2, 13, 1, 1),
(46, 'masterkey/add_uom', '{\"0\":\"\"}', 'admin/masterkey/add_uom', '<i class=\'nav-icon fa fa-file\'></i>', 'Add Units', 2, 14, 1, 1),
(47, 'payment/pay_form', '{\"0\":\"\"}', 'admin/payment/pay_form', '<i class=\"nav-icon fa fa-rupee\" aria-hidden=\"true\"></i>', 'Make payment', 28, 1, 1, 1),
(48, 'payment/paylist', '{\"0\":\"\"}', 'admin/payment/paylist', '<i class=\"nav-icon fa fa-rupee\" aria-hidden=\"true\"></i>', 'Paylist', 28, 2, 1, 1),
(49, 'sales', '{\"0\":\"\"}', 'admin/#', '<i class=\"nav-icon fa fa-rupee\" aria-hidden=\"true\"></i>', 'Sales', 0, 7, 1, 1),
(50, 'sales/get_order_details', '{\"0\":\"\"}', 'admin/sales/get_order_details', '<i class=\"nav-icon fas fa-file\"></i>', 'Orders', 49, 1, 1, 1),
(51, 'valet', '{\"0\":\"add_new\",\"1\":\"valet_list\"}', 'admin/#', '<i class=\"nav-icon fas fa-gift\" aria-hidden=\"true\"></i>', 'Assign order', 0, 12, 1, 1),
(52, 'valet/assign_order', '{\"0\":\"\"}', 'admin/valet/assign_order', '', 'Assign', 51, 1, 1, 1),
(53, 'valet/assign_order_list', '{\"0\":\"\"}', 'admin/valet/assign_order_list', '', 'Order List', 51, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gd_staff`
--

CREATE TABLE `gd_staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `father` varchar(100) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `picture` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(150) NOT NULL,
  `town` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `aadhar` varchar(100) NOT NULL,
  `bank_ac` varchar(100) NOT NULL,
  `doj` varchar(50) NOT NULL,
  `desg_id` int(11) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gd_subcategory`
--

CREATE TABLE `gd_subcategory` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd_subcategory`
--

INSERT INTO `gd_subcategory` (`id`, `cat_id`, `type`, `name`, `image_path`, `slug`, `added_on`, `status`) VALUES
(1, 3, 'brand', 'Amul', '/assets/images/admin/subcategory/1594882279-flavor.png', 'amul', '2020-07-16 12:21:19', 1),
(2, 1, 'simple', 'FRESH VEGETABLES', '/assets/images/admin/subcategory/1596100621.jpg', 'fresh-vegetables', '2020-07-30 14:47:01', 1),
(3, 1, 'simple', 'FRESH FRUITS', '/assets/images/admin/subcategory/1596100024.jpg', 'fresh-fruits-2', '2020-07-30 14:37:04', 1),
(4, 1, 'egger', 'Veg', '/assets/images/admin/subcategory/1594896171-egger.png', 'veg', '2020-07-16 16:12:51', 1),
(5, 8, 'egger', 'Non-Veg', '/assets/images/admin/subcategory/1594896195-egger.png', 'non-veg', '2020-07-16 16:13:15', 0),
(6, 1, 'simple', 'EXOTIC FRUITS & VEGGIES', '/assets/images/admin/subcategory/1596100148.jpg', 'exotic-fruits-veggies-2', '2020-07-30 14:39:08', 1),
(7, 1, 'simple', 'FRESH VEGETABLES', '', 'fresh-vegetables-2', '2020-07-30 14:33:55', 0),
(8, 8, 'simple', 'Atta (Whole Wheat / Multigrain)', '/assets/images/admin/subcategory/1596266810.jpg', 'atta-whole-wheat-multigrain', '2020-08-01 12:56:50', 1),
(9, 8, 'simple', 'Besan', '/assets/images/admin/subcategory/1596268144.jpg', 'besan', '2020-08-01 13:19:04', 1),
(10, 8, 'brand', 'Patanjali', '/assets/images/admin/subcategory/1596268679-flavor.jpg', 'patanjali', '2020-08-01 13:27:59', 1),
(11, 8, 'brand', 'Annpurna', '/assets/images/admin/subcategory/1596268774-flavor.png', 'annpurna', '2020-08-01 13:29:34', 1),
(12, 8, 'brand', 'Nature Fresh', '/assets/images/admin/subcategory/1596268834-flavor.png', 'nature-fresh', '2020-08-01 13:30:34', 1),
(13, 8, 'brand', 'Tata sampann', '/assets/images/admin/subcategory/1596268959-flavor.png', 'tata-sampann', '2020-08-01 13:32:39', 1),
(14, 8, 'brand', 'Shakti Bhog', '/assets/images/admin/subcategory/1596269032-flavor.png', 'shakti-bhog', '2020-08-01 13:33:52', 1),
(15, 8, 'brand', 'Aahar', '/assets/images/admin/subcategory/1596269215-flavor.jpg', 'aahar', '2020-08-01 13:36:55', 1),
(16, 8, 'brand', 'Fortune', '/assets/images/admin/subcategory/1596269319-flavor.png', 'fortune', '2020-08-01 13:38:39', 1),
(17, 8, 'brand', 'Aashirvaad ( Wheat & Multigrain)', '/assets/images/admin/subcategory/1596269469-flavor.jpg', 'aashirvaad-wheat-multigrain', '2020-08-01 13:41:09', 1),
(18, 8, 'brand', 'Rajdhani', '/assets/images/admin/subcategory/1596269573-flavor.png', 'rajdhani', '2020-08-01 13:42:53', 1),
(19, 8, 'simple', 'Suji', '/assets/images/admin/subcategory/1596269748.jpg', 'suji', '2020-08-01 13:45:48', 1),
(20, 8, 'simple', 'Maida', '/assets/images/admin/subcategory/1596270636.jpg', 'maida', '2020-08-01 14:00:36', 1),
(21, 8, 'simple', 'Sattu', '/assets/images/admin/subcategory/1596271505.jpg', 'sattu', '2020-08-01 14:15:05', 1),
(22, 11, 'simple', 'Salt', '/assets/images/admin/subcategory/1596272438.jpg', 'salt', '2020-08-01 14:30:38', 1),
(23, 11, 'simple', 'Sugar ', '/assets/images/admin/subcategory/1596273349.jpg', 'sugar', '2020-08-01 14:45:49', 1),
(24, 11, 'simple', 'Jaggery  (Gud)', '/assets/images/admin/subcategory/1596273923.jpg', 'jaggery-gud', '2020-08-01 14:55:23', 1),
(25, 3, 'simple', 'Milk', '/assets/images/admin/subcategory/1596274130.jpg', 'milk', '2020-08-01 14:58:50', 1),
(26, 3, 'simple', 'Curd / Dahi', '/assets/images/admin/subcategory/1596274204.jpg', 'curd-dahi', '2020-08-01 15:00:04', 1),
(27, 3, 'simple', 'Paneer', '/assets/images/admin/subcategory/1596274307.jpg', 'paneer', '2020-08-01 15:01:47', 1),
(28, 3, 'simple', 'Cheese', '/assets/images/admin/subcategory/1596274480.jpg', 'cheese', '2020-08-01 15:04:40', 1),
(29, 3, 'simple', 'Lassi', '/assets/images/admin/subcategory/1596274786.jpg', 'lassi', '2020-08-01 15:09:46', 1),
(30, 3, 'simple', 'Toned Milk', '/assets/images/admin/subcategory/1596274886.jpg', 'toned-milk', '2020-08-01 15:11:26', 1),
(31, 4, 'simple', 'Cold drinks', '/assets/images/admin/subcategory/1596356394.jpg', 'cold-drinks', '2020-08-02 13:49:54', 1),
(32, 4, 'simple', 'Juice', '/assets/images/admin/subcategory/1596356511.jpg', 'juice', '2020-08-02 13:51:51', 1),
(33, 4, 'simple', 'Mineral Water', '/assets/images/admin/subcategory/1596356665.jpg', 'mineral-water', '2020-08-02 13:54:25', 1),
(34, 16, 'simple', 'Almonds', '/assets/images/admin/subcategory/1596358743.jpg', 'almonds', '2020-08-02 14:29:03', 1),
(35, 16, 'simple', 'Dates', '/assets/images/admin/subcategory/1596358783.jpg', 'dates', '2020-08-02 14:29:43', 1),
(36, 16, 'simple', 'Cashew nut', '/assets/images/admin/subcategory/1596358827.jpg', 'cashew-nut', '2020-08-02 14:30:27', 1),
(37, 16, 'simple', 'Pista', '/assets/images/admin/subcategory/1596358861.jpg', 'pista', '2020-08-02 14:31:01', 1),
(38, 16, 'simple', 'Walnuts', '/assets/images/admin/subcategory/1596358892.jpg', 'walnuts', '2020-08-02 14:31:32', 1),
(39, 16, 'simple', 'Raisins (Kismis)', '/assets/images/admin/subcategory/1596358954.jpg', 'raisins-kismis', '2020-08-02 14:32:34', 1),
(40, 16, 'simple', 'Date Plam', '/assets/images/admin/subcategory/1596358993.jpg', 'date-plam', '2020-08-02 14:33:13', 1),
(41, 16, 'simple', 'Macadamia', '/assets/images/admin/subcategory/1596359030.jpg', 'macadamia', '2020-08-02 14:33:50', 1),
(42, 16, 'simple', 'Fig (Anjir)', '/assets/images/admin/subcategory/1596359088.jpg', 'fig-anjir', '2020-08-02 14:34:48', 1),
(43, 16, 'simple', 'Peanuts', '/assets/images/admin/subcategory/1596359165.jpg', 'peanuts', '2020-08-02 14:36:05', 1),
(44, 16, 'simple', 'Coconut', '/assets/images/admin/subcategory/1596359240.jpg', 'coconut', '2020-08-02 14:37:20', 1),
(45, 16, 'simple', 'Chiraunji', '/assets/images/admin/subcategory/1596359324.jpg', 'chiraunji', '2020-08-02 14:38:44', 1),
(46, 13, 'simple', 'Pets Food', '/assets/images/admin/subcategory/1596359678.jpg', 'pets-food', '2020-08-02 14:44:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gd_uoms`
--

CREATE TABLE `gd_uoms` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(10) NOT NULL,
  `shop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gd_uoms`
--

INSERT INTO `gd_uoms` (`id`, `unit_name`, `shop`) VALUES
(1, 'Pcs', 1),
(2, 'Kg', 1),
(3, 'Case', 1),
(4, 'Pack', 1),
(5, 'Bag', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gd_users`
--

CREATE TABLE `gd_users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `vp` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `salt` varchar(20) NOT NULL,
  `otp` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd_users`
--

INSERT INTO `gd_users` (`id`, `username`, `mobile`, `name`, `email`, `password`, `vp`, `role`, `salt`, `otp`, `token`, `status`, `created_on`, `updated_on`) VALUES
(1, 'admin', '9113712484', 'Admin', 'admin@gmail.com', '671324186bfd4669631c97b030ae56d5', '12345', '1', 'BbvhwFumyrxaqDTN', '', '', 1, '2020-06-01 12:43:23', '2020-06-01 12:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `gd_variant`
--

CREATE TABLE `gd_variant` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `quant_text` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd_variant`
--

INSERT INTO `gd_variant` (`id`, `cat_id`, `quant_text`, `name`, `slug`, `added_on`, `status`) VALUES
(1, 1, '500g', '500g', '500g', '2020-07-16 15:57:01', 1),
(2, 1, '1 kg', '1 kg', '1-kg', '2020-07-16 15:57:16', 1),
(3, 1, '6pcs', '6pcs', '6pcs', '2020-07-16 15:57:30', 1),
(4, 1, '12 pcs', '1 dozen', '1-dozen', '2020-07-16 15:57:55', 1),
(5, 1, '2 kg', '2 Kg', '2-kg', '2020-07-16 16:07:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gd_webcatdesign`
--

CREATE TABLE `gd_webcatdesign` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_id` varchar(255) NOT NULL,
  `design_type` varchar(200) NOT NULL,
  `publish_status` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd_webcatdesign`
--

INSERT INTO `gd_webcatdesign` (`id`, `cat_id`, `subcat_id`, `design_type`, `publish_status`, `status`) VALUES
(2, 1, '[\"2\",\"3\",\"6\"]', 'showproducts', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gd_webcatgrid`
--

CREATE TABLE `gd_webcatgrid` (
  `id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `publish_status` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd_webcatgrid`
--

INSERT INTO `gd_webcatgrid` (`id`, `subcat_id`, `publish_status`, `status`) VALUES
(1, 2, 1, 1),
(2, 3, 1, 1),
(3, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gd_websubcatproduct`
--

CREATE TABLE `gd_websubcatproduct` (
  `id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `publish_status` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gd_websubcatproduct`
--

INSERT INTO `gd_websubcatproduct` (`id`, `subcat_id`, `publish_status`, `status`) VALUES
(1, 2, 1, 1),
(2, 3, 1, 1),
(3, 6, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gd_addonmenu`
--
ALTER TABLE `gd_addonmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_addon_product`
--
ALTER TABLE `gd_addon_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_admin_stock`
--
ALTER TABLE `gd_admin_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_area`
--
ALTER TABLE `gd_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_cart`
--
ALTER TABLE `gd_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_cart_addon`
--
ALTER TABLE `gd_cart_addon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_category`
--
ALTER TABLE `gd_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_cream`
--
ALTER TABLE `gd_cream`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_customer_address`
--
ALTER TABLE `gd_customer_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_customer_detail`
--
ALTER TABLE `gd_customer_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_customer_login`
--
ALTER TABLE `gd_customer_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_delivery_slot`
--
ALTER TABLE `gd_delivery_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_delivery_time`
--
ALTER TABLE `gd_delivery_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_delivery_valet`
--
ALTER TABLE `gd_delivery_valet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_delivery_zone`
--
ALTER TABLE `gd_delivery_zone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_designation`
--
ALTER TABLE `gd_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_gstrate`
--
ALTER TABLE `gd_gstrate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_inventory_gst`
--
ALTER TABLE `gd_inventory_gst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_inventory_payment`
--
ALTER TABLE `gd_inventory_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_inventory_purchase`
--
ALTER TABLE `gd_inventory_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_inventory_purchaseproducts`
--
ALTER TABLE `gd_inventory_purchaseproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_inventory_purchasetemp`
--
ALTER TABLE `gd_inventory_purchasetemp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_inventory_supplier`
--
ALTER TABLE `gd_inventory_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_location`
--
ALTER TABLE `gd_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_lowcategory`
--
ALTER TABLE `gd_lowcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_order`
--
ALTER TABLE `gd_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_order_assign`
--
ALTER TABLE `gd_order_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_order_payment`
--
ALTER TABLE `gd_order_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_order_product`
--
ALTER TABLE `gd_order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_product`
--
ALTER TABLE `gd_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_product_detail`
--
ALTER TABLE `gd_product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_product_variant`
--
ALTER TABLE `gd_product_variant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_shape`
--
ALTER TABLE `gd_shape`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_sidebar`
--
ALTER TABLE `gd_sidebar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_staff`
--
ALTER TABLE `gd_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_subcategory`
--
ALTER TABLE `gd_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_uoms`
--
ALTER TABLE `gd_uoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_users`
--
ALTER TABLE `gd_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `gd_variant`
--
ALTER TABLE `gd_variant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_webcatdesign`
--
ALTER TABLE `gd_webcatdesign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_webcatgrid`
--
ALTER TABLE `gd_webcatgrid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gd_websubcatproduct`
--
ALTER TABLE `gd_websubcatproduct`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gd_addonmenu`
--
ALTER TABLE `gd_addonmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_addon_product`
--
ALTER TABLE `gd_addon_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_admin_stock`
--
ALTER TABLE `gd_admin_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_area`
--
ALTER TABLE `gd_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=759;

--
-- AUTO_INCREMENT for table `gd_cart`
--
ALTER TABLE `gd_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_cart_addon`
--
ALTER TABLE `gd_cart_addon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_category`
--
ALTER TABLE `gd_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `gd_cream`
--
ALTER TABLE `gd_cream`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_customer_address`
--
ALTER TABLE `gd_customer_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_customer_detail`
--
ALTER TABLE `gd_customer_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_customer_login`
--
ALTER TABLE `gd_customer_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_delivery_slot`
--
ALTER TABLE `gd_delivery_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_delivery_time`
--
ALTER TABLE `gd_delivery_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_delivery_valet`
--
ALTER TABLE `gd_delivery_valet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_delivery_zone`
--
ALTER TABLE `gd_delivery_zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_designation`
--
ALTER TABLE `gd_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_gstrate`
--
ALTER TABLE `gd_gstrate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gd_inventory_gst`
--
ALTER TABLE `gd_inventory_gst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gd_inventory_payment`
--
ALTER TABLE `gd_inventory_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_inventory_purchase`
--
ALTER TABLE `gd_inventory_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_inventory_purchaseproducts`
--
ALTER TABLE `gd_inventory_purchaseproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_inventory_purchasetemp`
--
ALTER TABLE `gd_inventory_purchasetemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_inventory_supplier`
--
ALTER TABLE `gd_inventory_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_location`
--
ALTER TABLE `gd_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_lowcategory`
--
ALTER TABLE `gd_lowcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `gd_order`
--
ALTER TABLE `gd_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_order_assign`
--
ALTER TABLE `gd_order_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_order_payment`
--
ALTER TABLE `gd_order_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_order_product`
--
ALTER TABLE `gd_order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_product`
--
ALTER TABLE `gd_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gd_product_detail`
--
ALTER TABLE `gd_product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gd_product_variant`
--
ALTER TABLE `gd_product_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gd_shape`
--
ALTER TABLE `gd_shape`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_sidebar`
--
ALTER TABLE `gd_sidebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `gd_staff`
--
ALTER TABLE `gd_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gd_subcategory`
--
ALTER TABLE `gd_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `gd_uoms`
--
ALTER TABLE `gd_uoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gd_users`
--
ALTER TABLE `gd_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gd_variant`
--
ALTER TABLE `gd_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gd_webcatdesign`
--
ALTER TABLE `gd_webcatdesign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gd_webcatgrid`
--
ALTER TABLE `gd_webcatgrid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gd_websubcatproduct`
--
ALTER TABLE `gd_websubcatproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
