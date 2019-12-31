-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2019 at 09:17 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `law`
--

-- --------------------------------------------------------

--
-- Table structure for table `law_admin`
--

CREATE TABLE `law_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_admin`
--

INSERT INTO `law_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Techno', 'info@technothinksup.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `law_application`
--

CREATE TABLE `law_application` (
  `application_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `application_no` bigint(20) NOT NULL,
  `application_date` varchar(20) NOT NULL,
  `branch_id` bigint(20) NOT NULL,
  `manager_id` varchar(100) NOT NULL,
  `tc_id` varchar(100) NOT NULL,
  `rc_id` varchar(100) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `organization_id` bigint(11) NOT NULL,
  `application_status` varchar(50) NOT NULL DEFAULT 'Open',
  `alert_days` int(11) DEFAULT NULL,
  `prn_no` varchar(50) DEFAULT NULL,
  `prn_date` varchar(20) DEFAULT NULL,
  `legal_user` varchar(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_application`
--

INSERT INTO `law_application` (`application_id`, `company_id`, `application_no`, `application_date`, `branch_id`, `manager_id`, `tc_id`, `rc_id`, `service_id`, `organization_id`, `application_status`, `alert_days`, `prn_no`, `prn_date`, `legal_user`, `date`, `is_delete`) VALUES
(5, 1, 1, '02-12-2019', 7, '41, 42', '', '45', 1, 5, 'In Process', 0, '', '', NULL, '2019-12-24 06:05:21', 0),
(6, 1, 2, '02-12-2019', 2, '46', '', '48', 1, 5, 'In Process', NULL, NULL, NULL, NULL, '2019-12-24 05:24:04', 0),
(7, 1, 3, '02-12-2019', 5, '41, 42', '43', '44', 14, 6, 'In Process', 15, '', '', NULL, '2019-12-24 06:00:11', 0),
(8, 2, 4, '02-12-2019', 9, '38', '', '39', 1, 5, 'In Process', NULL, NULL, NULL, NULL, '2019-12-24 07:14:36', 0),
(9, 2, 4, '02-12-2019', 9, '37, 38', '', '39', 6, 5, 'In Process', NULL, NULL, NULL, NULL, '2019-12-24 07:13:55', 0),
(10, 2, 5, '02-12-2019', 9, '37, 38', '', '39', 11, 5, 'In Process', NULL, NULL, NULL, NULL, '2019-12-24 07:19:16', 0),
(11, 1, 6, '03-12-2019', 1, '46', '47', '', 1, 7, 'In Process', 0, '', '', NULL, '2019-12-24 08:33:02', 0),
(12, 2, 7, '03-12-2019', 9, '37, 38', '', '39', 4, 5, 'In Process', NULL, NULL, NULL, NULL, '2019-12-24 07:28:41', 0),
(13, 1, 8, '03-12-2019', 5, '41, 42', '', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, '2019-12-28 06:10:45', 0),
(19, 1, 14, '04-12-2019', 7, '42', '44', '43', 1, 3, 'In Process', NULL, NULL, NULL, NULL, '2019-12-26 09:59:32', 0),
(26, 2, 21, '25-10-2019', 9, '37, 38', '', '39', 1, 5, 'In Process', NULL, NULL, NULL, NULL, '2019-12-28 06:15:54', 0),
(27, 2, 22, '03-12-2019', 9, '37, 38', '', '39', 4, 6, 'In Process', NULL, NULL, NULL, NULL, '2019-12-28 06:30:41', 0),
(28, 2, 23, '03-12-2019', 12, '37, 38', '', '40', 2, 1, 'In Process', NULL, NULL, NULL, NULL, '2019-12-28 06:34:36', 0),
(29, 2, 24, '03-12-2019', 12, '37, 38', '', '40', 1, 7, 'Filed Application', NULL, NULL, NULL, NULL, '2019-12-28 07:19:43', 0),
(30, 1, 25, '03-12-2019', 5, '41, 42', '43', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, '2019-12-28 07:09:23', 0),
(31, 1, 26, '03-12-2019', 13, '46', '', '48', 1, 5, 'In Process', NULL, NULL, NULL, NULL, '2019-12-28 07:30:50', 0),
(33, 1, 27, '04-12-2019', 7, '41, 42', '', '', 1, 3, 'In Process', NULL, NULL, NULL, NULL, '2019-12-28 09:13:09', 0),
(34, 1, 28, '04-12-2019', 2, '46', '', '48', 1, 1, 'In Process', NULL, NULL, NULL, NULL, '2019-12-28 09:15:22', 0),
(35, 1, 29, '04-12-2019', 6, '41, 42', '', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, '2019-12-28 09:32:36', 0),
(36, 1, 30, '04-12-2019', 6, '41, 42', '', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, '2019-12-28 09:37:20', 0),
(37, 1, 31, '04-12-2019', 5, '41, 42', '', '', 4, 5, 'In Process', NULL, NULL, NULL, NULL, '2019-12-28 10:41:39', 0),
(38, 1, 32, '04-12-2019', 5, '41, 42', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, '2019-12-28 12:08:26', 0),
(39, 1, 33, '04-12-2019', 5, '41, 42', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, '2019-12-28 12:13:33', 0),
(40, 1, 34, '04-12-2019', 2, '46', '', '48', 1, 5, 'Pending for Legal', NULL, NULL, NULL, '55', '2019-12-31 05:25:39', 0),
(41, 2, 35, '04-12-2019', 12, '37, 38', '', '40', 2, 6, 'Filed Application', 0, '', '', '55', '2019-12-31 06:46:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `law_appl_user_rel`
--

CREATE TABLE `law_appl_user_rel` (
  `user_rel_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `roll_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_appl_user_rel`
--

INSERT INTO `law_appl_user_rel` (`user_rel_id`, `application_id`, `user_id`, `roll_id`) VALUES
(1, 4, 30, 2),
(2, 4, 31, 2),
(3, 4, 32, 3),
(4, 4, 33, 3),
(5, 4, 34, 4),
(6, 4, 35, 4),
(55, 8, 38, 2),
(56, 8, 39, 3),
(60, 9, 37, 2),
(61, 9, 38, 2),
(62, 9, 39, 3),
(66, 10, 37, 2),
(67, 10, 38, 2),
(68, 10, 39, 3),
(231, 5, 41, 2),
(232, 5, 42, 2),
(233, 5, 45, 3),
(248, 19, 42, 2),
(249, 19, 43, 3),
(250, 19, 44, 4),
(253, 11, 46, 2),
(254, 11, 47, 4),
(257, 7, 41, 2),
(258, 7, 42, 2),
(259, 7, 44, 3),
(260, 7, 43, 4),
(261, 13, 41, 2),
(262, 13, 42, 2),
(266, 26, 37, 2),
(267, 26, 38, 2),
(268, 26, 39, 3),
(272, 12, 37, 2),
(273, 12, 38, 2),
(274, 12, 39, 3),
(283, 28, 37, 2),
(284, 28, 38, 2),
(285, 28, 40, 3),
(289, 29, 37, 2),
(290, 29, 38, 2),
(291, 29, 40, 3),
(295, 30, 41, 2),
(296, 30, 42, 2),
(297, 30, 43, 4),
(305, 27, 37, 2),
(306, 27, 38, 2),
(307, 27, 39, 3),
(308, 6, 46, 2),
(309, 6, 48, 3),
(310, 31, 46, 2),
(311, 31, 48, 3),
(318, 33, 41, 2),
(319, 33, 42, 2),
(328, 34, 46, 2),
(329, 34, 48, 3),
(332, 35, 41, 2),
(333, 35, 42, 2),
(336, 36, 41, 2),
(337, 36, 42, 2),
(340, 37, 41, 2),
(341, 37, 42, 2),
(344, 38, 41, 2),
(345, 38, 42, 2),
(348, 39, 41, 2),
(349, 39, 42, 2),
(356, 40, 46, 2),
(357, 40, 48, 3),
(361, 41, 37, 2),
(362, 41, 38, 2),
(363, 41, 40, 3);

-- --------------------------------------------------------

--
-- Table structure for table `law_branch`
--

CREATE TABLE `law_branch` (
  `branch_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `branch_name` varchar(250) NOT NULL,
  `branch_status` varchar(50) NOT NULL DEFAULT 'active',
  `branch_bank` varchar(250) DEFAULT NULL,
  `branch_b_branch` varchar(250) DEFAULT NULL,
  `branch_acc_no` varchar(250) DEFAULT NULL,
  `branch_ifsc` varchar(250) DEFAULT NULL,
  `branch_addedby` varchar(50) DEFAULT NULL,
  `branch_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_branch`
--

INSERT INTO `law_branch` (`branch_id`, `company_id`, `branch_name`, `branch_status`, `branch_bank`, `branch_b_branch`, `branch_acc_no`, `branch_ifsc`, `branch_addedby`, `branch_date`) VALUES
(1, 1, 'PUNE', 'active', 'ICICI BANK ', 'Raviwar peth', '645005002303', 'ICIC0006450', '1', '2019-12-19 06:37:08'),
(2, 1, 'NASHIK', 'active', 'ICICI BANK ', 'Raviwar peth', '645005002303', 'ICIC0006450', '2', '2019-12-18 04:47:46'),
(3, 1, 'SURAT', 'active', 'ICICI BANK ', 'Raviwar peth', '645005002303', 'ICIC0006450', '2', '2019-12-14 09:30:11'),
(4, 1, 'GOA', 'active', 'Axis Bank', 'Dhankawadi', '917020070150451', 'UTIB0001168', '2', '2019-12-14 09:30:48'),
(5, 1, 'KOLHAPUR', 'active', 'Axis Bank', 'Dhankawadi', '917020070150451', 'UTIB0001168', '2', '2019-12-14 09:31:04'),
(6, 1, 'SATARA', 'active', 'Axis Bank', 'Dhankawadi', '917020070150451', 'UTIB0001168', '2', '2019-12-14 09:31:25'),
(7, 1, 'SANGLI', 'active', 'Axis Bank', 'Dhankawadi', '917020070150451', 'UTIB0001168', '2', '2019-12-14 09:31:39'),
(8, 1, 'HUBLI', 'active', 'Axis Bank', 'Dhankawadi', '917020070150451', 'UTIB0001168', '2', '2019-12-14 09:32:07'),
(9, 2, 'AURANGABAD', 'active', 'Axis Bank', 'F.C. ROAD', '917020054404006', 'UTIB000037', '2', '2019-12-13 08:03:15'),
(10, 2, 'AHEMADNAGAR', 'active', 'Axis Bank', 'F.C. ROAD', '917020054404006', 'UTIB000037', '2', '2019-12-14 09:32:30'),
(11, 2, 'SOLAPUR', 'active', 'Axis Bank', 'F.C. ROAD', '917020054404006', 'UTIB000037', '1', '2019-12-23 11:41:20'),
(12, 2, 'JALGAON', 'active', 'Axis Bank', 'F.C. ROAD', '917020054404006', 'UTIB000037', '2', '2019-12-14 09:32:53'),
(13, 1, 'Other Pune', 'active', 'ICICI BANK ', 'Raviwar peth', '645005002303', 'ICIC0006450', '2', '2019-12-14 09:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `law_company`
--

CREATE TABLE `law_company` (
  `company_id` bigint(20) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `company_address` varchar(350) NOT NULL,
  `company_city` varchar(150) NOT NULL,
  `company_state` varchar(150) NOT NULL,
  `company_district` varchar(150) NOT NULL,
  `company_statecode` bigint(20) NOT NULL,
  `company_mob1` varchar(12) NOT NULL,
  `company_mob2` varchar(12) NOT NULL,
  `company_email` varchar(150) NOT NULL,
  `company_website` varchar(150) NOT NULL,
  `company_pan_no` varchar(12) NOT NULL,
  `company_gst_no` varchar(100) NOT NULL,
  `company_lic1` varchar(150) NOT NULL,
  `company_lic2` varchar(150) NOT NULL,
  `company_start_date` varchar(15) NOT NULL,
  `company_end_date` varchar(15) NOT NULL,
  `company_logo` varchar(200) NOT NULL,
  `company_seal` varchar(150) NOT NULL,
  `admin_email` varchar(150) DEFAULT NULL,
  `admin_password` varchar(150) DEFAULT NULL,
  `admin_roll_id` int(11) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_company`
--

INSERT INTO `law_company` (`company_id`, `company_name`, `company_address`, `company_city`, `company_state`, `company_district`, `company_statecode`, `company_mob1`, `company_mob2`, `company_email`, `company_website`, `company_pan_no`, `company_gst_no`, `company_lic1`, `company_lic2`, `company_start_date`, `company_end_date`, `company_logo`, `company_seal`, `admin_email`, `admin_password`, `admin_roll_id`, `date`) VALUES
(1, 'LAW PROTECTORS IPR CONSULTANT LLP', '\"Laxmi Nivas\", Behind Kamla Nehru Hospital, Near Barane School, 104, Mangalwar Peth, Pune-411011.', 'PUNE', 'Maharashtra', 'PUNE', 27, '9158622555', '26051325', 'trademark.lawprotectors@gmail.com', 'www.iprlawprotectors.com', 'AAHFL1957C', '27AAHFL1957C1ZE', '14326', '', '10-12-2019', '30-11-2019', '', 'company_seal_1.png', NULL, NULL, 1, '2019-12-17 06:18:04'),
(2, 'LAW PROTECTORS', '\"Laxmi Nivas\", Behind Kamla Nehru Hospital, Near Barane School, 104, Mangalwar Peth, Pune-411011.', 'PUNE', 'Maharashtra', 'PUNE', 27, '9158622555', '', 'trademark.lawprotectors@gmail.com', 'www.iprlawprotectors.com', 'AAHFL1957C', '27AAHFL1957C1ZE', '14326', '', '11-11-2011', '11-12-2019', '', 'company_seal_2.png', NULL, NULL, 1, '2019-12-17 06:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `law_copyright`
--

CREATE TABLE `law_copyright` (
  `copyright_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `copy_title` varchar(250) DEFAULT NULL,
  `org_name` varchar(250) DEFAULT NULL,
  `org_address` text DEFAULT NULL,
  `appl_address` text DEFAULT NULL,
  `appl_name` varchar(250) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `work1` varchar(100) DEFAULT NULL,
  `work2` varchar(100) DEFAULT NULL,
  `work3` varchar(100) DEFAULT NULL,
  `work4` varchar(100) DEFAULT NULL,
  `work5` varchar(100) DEFAULT NULL,
  `work6` varchar(100) DEFAULT NULL,
  `right1` varchar(100) DEFAULT NULL,
  `right2` varchar(100) DEFAULT NULL,
  `pro_containt1` varchar(250) DEFAULT NULL,
  `pro_containt2` varchar(250) DEFAULT NULL,
  `appl_age` int(11) DEFAULT NULL,
  `appl_details` text DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `public_date` varchar(20) DEFAULT NULL,
  `countries` varchar(250) DEFAULT NULL,
  `subject_matter` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_copyright`
--

INSERT INTO `law_copyright` (`copyright_id`, `application_id`, `copy_title`, `org_name`, `org_address`, `appl_address`, `appl_name`, `nationality`, `work1`, `work2`, `work3`, `work4`, `work5`, `work6`, `right1`, `right2`, `pro_containt1`, `pro_containt2`, `appl_age`, `appl_details`, `language`, `public_date`, `countries`, `subject_matter`, `date`, `place`, `is_delete`) VALUES
(2, 28, 'shubh developers ', '-shubh developers ', 'near blind school, kargaon road chalisgaon dist jalgaon-424101', 'near blind school, kargaon road chalisgaon dist jalgaon-424101', 'bharat suklal chaudhari ', 'India', 'Artistic', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'yes', '', '', 0),
(3, 41, 'indosia ', 'Indosia Pharmaceuticals  pvt ltd ', '1678-2, joshi peth jalgaon - 425001', '1678-2, joshi peth jalgaon - 425001', 'Shaikh Asif Shaikh Jalal , Shaikh Farid Shaikh Hamid', 'Shaikh Asif Shaikh Jalal', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'yes', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `law_doc_upload`
--

CREATE TABLE `law_doc_upload` (
  `upload_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `doc_type` varchar(150) NOT NULL,
  `doc_name` varchar(150) NOT NULL,
  `doc_status` bigint(20) NOT NULL DEFAULT 0 COMMENT '0= Not uploaded',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_doc_upload`
--

INSERT INTO `law_doc_upload` (`upload_id`, `application_id`, `doc_type`, `doc_name`, `doc_status`, `date`) VALUES
(6, 5, 'EVIDENCES', '', 0, '2019-12-24 06:05:21'),
(7, 5, 'SALES BILL', '', 0, '2019-12-24 06:05:21'),
(8, 5, 'PURCHASE BILL', '', 0, '2019-12-24 06:05:21'),
(9, 5, 'ADVERTISE BILL', '', 0, '2019-12-24 06:05:21'),
(10, 5, 'POA', '', 0, '2019-12-24 06:05:21'),
(11, 5, 'AFFIDAVIT', '', 0, '2019-12-24 06:05:21'),
(12, 5, 'TMR ', '', 0, '2019-12-24 06:05:21'),
(13, 5, 'TMO', '', 0, '2019-12-24 06:05:21'),
(14, 5, 'TMA', '', 0, '2019-12-24 06:05:21'),
(15, 5, '', '', 0, '2019-12-24 06:05:21'),
(20, 7, 'TM-R SIGN COPY', 'doc_7_1_1577168822.docx', 1, '2019-12-24 06:27:02'),
(21, 7, 'POA', 'doc_7_2_1577168822.pdf', 1, '2019-12-24 06:27:02'),
(22, 11, 'MSME', '', 0, '2019-12-24 07:23:57'),
(23, 11, 'EVIDENCES', '', 0, '2019-12-24 07:23:57'),
(24, 11, 'SALES BILL', '', 0, '2019-12-24 07:23:57'),
(25, 11, 'PURCHASE BILL', '', 0, '2019-12-24 07:23:57'),
(26, 11, 'ADVERTISE BILL', '', 0, '2019-12-24 07:23:57'),
(27, 11, 'POA', '', 0, '2019-12-24 07:23:57'),
(28, 11, 'AFFIDAVIT', '', 0, '2019-12-24 07:23:57'),
(29, 11, 'TMR ', '', 0, '2019-12-24 07:23:57'),
(30, 11, 'TMO', '', 0, '2019-12-24 07:23:57'),
(31, 11, 'TMA', '', 0, '2019-12-24 07:23:57'),
(32, 11, '', '', 0, '2019-12-24 07:23:57'),
(78, 41, 'LOGO 7 COPY', '', 0, '2019-12-29 06:13:52'),
(79, 41, 'TM-C SIGN COPY', '', 0, '2019-12-29 06:13:52'),
(81, 41, 'ESR REPLY COPY + NEW REPLY COPY', '', 0, '2019-12-29 06:13:53'),
(82, 41, 'AFTER REPLY STATUS ', '', 0, '2019-12-29 06:13:53'),
(83, 41, 'NOC CERTIFICATE', '', 0, '2019-12-29 06:13:53'),
(84, 41, 'SIGN FORM 14 + NOC COPY', '', 0, '2019-12-29 06:13:53'),
(85, 41, 'DIARY NO.', '', 0, '2019-12-29 06:13:53'),
(86, 41, 'ESR COPY', '', 0, '2019-12-29 06:13:53'),
(87, 41, 'REPLY OF ESR ', '', 0, '2019-12-29 06:13:53'),
(88, 41, 'REMAINDER OF STATUS ', '', 0, '2019-12-29 06:13:53'),
(89, 41, 'CERTIFICATE', '', 0, '2019-12-29 06:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `law_invoice`
--

CREATE TABLE `law_invoice` (
  `invoice_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `branch_id` bigint(20) NOT NULL,
  `application_id` bigint(20) DEFAULT NULL,
  `invoice_no` bigint(20) DEFAULT NULL,
  `invoice_date` varchar(20) DEFAULT NULL,
  `party` varchar(250) NOT NULL,
  `party_address` text DEFAULT NULL,
  `party_statecode` varchar(20) DEFAULT NULL,
  `po_no` varchar(100) DEFAULT NULL,
  `po_date` varchar(20) DEFAULT NULL,
  `basic_amt` double DEFAULT NULL,
  `gov_fees_amt` double DEFAULT NULL,
  `gst_amt` double DEFAULT NULL,
  `tds_amt` double DEFAULT NULL,
  `adv_amt` double DEFAULT NULL,
  `bal_amt` double DEFAULT NULL,
  `net_amt` double DEFAULT NULL,
  `invoice_status` varchar(25) NOT NULL DEFAULT 'active',
  `invoice_addedby` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_invoice`
--

INSERT INTO `law_invoice` (`invoice_id`, `company_id`, `branch_id`, `application_id`, `invoice_no`, `invoice_date`, `party`, `party_address`, `party_statecode`, `po_no`, `po_date`, `basic_amt`, `gov_fees_amt`, `gst_amt`, `tds_amt`, `adv_amt`, `bal_amt`, `net_amt`, `invoice_status`, `invoice_addedby`, `date`) VALUES
(1, 2, 1, 32, 1, '01-12-2019', 'Hotel Durga', 'Pune', '', '', '28-12-2019', 10000, 4500, 1800, 0, 6800, 5000, 5000, 'active', 1, '2019-12-28 08:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `law_invoice_details`
--

CREATE TABLE `law_invoice_details` (
  `invoice_details_id` bigint(20) NOT NULL,
  `invoice_id` bigint(20) NOT NULL,
  `descr` text DEFAULT NULL,
  `gst_per` double DEFAULT NULL,
  `gst_amount` double DEFAULT NULL,
  `hsn` varchar(50) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `gov_fees` double DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_invoice_details`
--

INSERT INTO `law_invoice_details` (`invoice_details_id`, `invoice_id`, `descr`, `gst_per`, `gst_amount`, `hsn`, `qty`, `gov_fees`, `rate`, `total`, `date`) VALUES
(1, 1, 'TM', 18, 1800, 'kk', 1, 4500, 10000, 11800, '2019-12-28 08:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `law_leg_doc_up`
--

CREATE TABLE `law_leg_doc_up` (
  `leg_doc_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `leg_doc_title` varchar(250) NOT NULL,
  `leg_doc_file` varchar(250) NOT NULL,
  `leg_doc_addedby` varchar(20) NOT NULL,
  `leg_doc_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_leg_doc_up`
--

INSERT INTO `law_leg_doc_up` (`leg_doc_id`, `application_id`, `leg_doc_title`, `leg_doc_file`, `leg_doc_addedby`, `leg_doc_date`) VALUES
(1, 40, 'fghfgh', 'leg_40_1_1577606364.jpg', '55', '2019-12-29 07:59:24'),
(2, 40, 'ddd', 'leg_40_2_1577606364.jpg', '55', '2019-12-29 07:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `law_organization`
--

CREATE TABLE `law_organization` (
  `organization_id` bigint(20) NOT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `organization_name` varchar(250) NOT NULL,
  `organization_status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_organization`
--

INSERT INTO `law_organization` (`organization_id`, `company_id`, `organization_name`, `organization_status`) VALUES
(1, 2, 'Applicant', 'active'),
(2, 2, 'Govt. Department', 'active'),
(3, 2, 'H.U.F.', 'active'),
(4, 2, 'L.L.P.', 'active'),
(5, 2, 'Proprietorship', 'active'),
(6, 2, 'Registered Company', 'active'),
(7, 2, 'Registered Partnership', 'active'),
(8, 2, 'Society', 'active'),
(9, 2, 'Trust', 'active'),
(10, 2, 'Unregistered Partnership', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `law_otherservice`
--

CREATE TABLE `law_otherservice` (
  `otherservice_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `appl_org_name` varchar(250) DEFAULT NULL,
  `org_address` text DEFAULT NULL,
  `appl_address` text DEFAULT NULL,
  `appl_conatct` bigint(20) DEFAULT NULL,
  `appl_email` varchar(150) DEFAULT NULL,
  `title_of_work` text DEFAULT NULL,
  `req_details` text DEFAULT NULL,
  `other_date` varchar(20) DEFAULT NULL,
  `other_place` varchar(100) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_otherservice`
--

INSERT INTO `law_otherservice` (`otherservice_id`, `application_id`, `appl_org_name`, `org_address`, `appl_address`, `appl_conatct`, `appl_email`, `title_of_work`, `req_details`, `other_date`, `other_place`, `is_delete`, `date`) VALUES
(1, 7, 'GHATGE PATIL INDUSTRIES LTD', 'Uchagaon, Kolhapur -416005', 'Uchagaon, Kolhapur -416005', 9373523883, 'suhas.inamdar@gpi.co.in ', 'TRADEMARK RENEWAL (TM-R)', 'TMR SIGN DOC\r\nPOA', '02-12-2019', 'Maharashtra', 0, '2019-12-24 06:38:33'),
(2, 9, 'Mallick Jewellers', ' Zaveri Bazar ,sarafa Road shop no 52 Auragabad 431001', ' Zaveri Bazar ,sarafa Road shop no 52 Auragabad 431001', 9168068096, 'mallikjewallers1131@gmail.com', 'Counter Replay', 'Counter Reply', '24-12-2019', 'PUNE', 0, '2019-12-24 07:13:55'),
(3, 10, ' Rivo ', 'Gut no 41 Plot no 66, Karodi MiDc Waluj Auragabad 431001', 'Gut no 41 Plot no 66, Karodi MiDc Waluj Auragabad 431001', 9168994444, 'bajaja1@gmail.com', 'Legal Notice', 'LEgal Form', '02-12-2019', 'PUNE', 0, '2019-12-24 07:19:16'),
(4, 12, 'The Escort Water Solutions', 'Shop no 1.Annd Building Near, Lokashva Karyalaya Mondha Road Beed 431122', 'Shop no 1.Annd Building Near, Lokashva Karyalaya Mondha Road Beed 431122', 9423030104, '', '9001:2015 14001:2015/ 18001: 2007', '', '03-12-2019', 'PUNE', 0, '2019-12-24 07:28:41'),
(5, 27, 'Extreme RO System Pvt ltd', 'Ashish Sharma Tondgaokar', 'plot no 9B,Gut no 228Behaind Varroc Plant 07,Ghanegaon midc Waluj', 9881393190, 'extriemro@gmail.com', '', '', '03-12-2019', 'PUNE', 0, '2019-12-28 06:30:41'),
(6, 37, 'M/S PRASHANT AGRO SERVICES', 'KAMALKUNJ APARTMENT ,FLAT NO.8, 6 TH LANE ,RAJARAMPURI,', 'KAMALKUNJ APARTMENT ,FLAT NO.8, 6 TH LANE ,RAJARAMPURI,', 99850625430, ' peasantagroservices@gmail.com', 'ISO 9001 - 2015 ', '', '30-11-19', '', 0, '2019-12-28 10:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `law_payment`
--

CREATE TABLE `law_payment` (
  `payment_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `CONTRACTAMOUNT` double DEFAULT NULL,
  `GSTAMOUNT` double DEFAULT NULL,
  `TOTALAMOUNT` double DEFAULT NULL,
  `RECEVIEDAMOUNT` double DEFAULT NULL,
  `BALANCEAMOUNT` double DEFAULT NULL,
  `GSTNUMBER` varchar(100) DEFAULT NULL,
  `LP_AMOUNT` double DEFAULT NULL,
  `GOVT_FEES` double DEFAULT NULL,
  `TDS` double DEFAULT NULL,
  `B2B` double DEFAULT NULL,
  `PAYMENTMODE_0` varchar(50) DEFAULT NULL,
  `PAYMENTMODE_1` varchar(50) DEFAULT NULL,
  `CHEQUENUMBER` varchar(100) DEFAULT NULL,
  `CHQDATE` varchar(20) DEFAULT NULL,
  `BANKNAME` varchar(250) DEFAULT NULL,
  `CHEQUEAMOUNT` double DEFAULT NULL,
  `GROUNDOFCONTRACT` varchar(250) DEFAULT NULL,
  `payment_date` varchar(20) NOT NULL,
  `is_master` int(11) NOT NULL DEFAULT 0,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_payment`
--

INSERT INTO `law_payment` (`payment_id`, `application_id`, `CONTRACTAMOUNT`, `GSTAMOUNT`, `TOTALAMOUNT`, `RECEVIEDAMOUNT`, `BALANCEAMOUNT`, `GSTNUMBER`, `LP_AMOUNT`, `GOVT_FEES`, `TDS`, `B2B`, `PAYMENTMODE_0`, `PAYMENTMODE_1`, `CHEQUENUMBER`, `CHQDATE`, `BANKNAME`, `CHEQUEAMOUNT`, `GROUNDOFCONTRACT`, `payment_date`, `is_master`, `is_delete`) VALUES
(5, 5, 8000, 0, 8000, 8000, 0, 'NA', 3500, 4500, 0, 0, 'By Cash', '', '', '', '', 0, 'NA', '27-12-2019', 1, 0),
(6, 6, 9000, 1530, 10030, 10030, 4500, '27AFYPB3975Q1ZD', 4500, 4500, 0, 0, '', 'By Cheque', '042607', '02-12-2019', 'IDBI BANK', 10030, 'NA', '28-12-2019', 1, 0),
(7, 7, 23400, 1440, 24840, 24840, 0, '27AAACG6595R1ZP', 8000, 18000, 2600, 0, '', 'By Cheque', '320486', '16-11-2019', 'UNION BANK', 24840, 'NA', '28-12-2019', 1, 0),
(8, 8, 23000, 4140, 27140, 27140, 0, '27AFNPC2337Q1Z7', 14000, 9000, 0, 0, '', 'By Cheque', 'NEFT', '04-12-2019', 'NA', 27140, 'NA', '24-12-2019', 1, 0),
(9, 9, 13500, 2430, 15930, 15930, 15930, '27AYPM1299D1ZP', 10800, 2700, 0, 0, '', 'By Cheque', '0', '26-11-2019', 'Bombay Marchant', 15930, 'NA', '24-12-2019', 1, 0),
(10, 10, 5000, 0, 5000, 5000, 0, 'NA', 0, 0, 0, 0, 'By Cash', '', '0', '0', '0', 5000, '', '24-12-2019', 1, 0),
(11, 11, 8500, 0, 8500, 0, 8500, 'NA', 4000, 4500, 0, 0, 'By Cash', '', '0', '03-12-2019', '0', 0, 'NIL', '27-12-2019', 1, 0),
(12, 12, 18644, 3356, 22000, 22000, 0, '27BAPK7480B1ZS', 15000, 3644, 0, 0, 'By Cash', 'By Cheque', 'NEFT', '', '0', 15000, 'NA', '28-12-2019', 1, 0),
(13, 13, 10000, 1800, 11800, 0, 11800, 'NA', 0, 0, 0, 0, 'By Cash', '', '', '', '', 0, '', '28-12-2019', 1, 0),
(19, 19, 10500, 0, 10500, 0, 10500, 'NA', 6000, 4500, 0, 0, 'By Cash', '', '0', '', '0', 0, 'NA', '27-12-2019', 1, 0),
(26, 26, 11500, 2070, 13570, 13570, 0, 'NA', 0, 0, 0, 0, '', 'By Cheque', '000157', '25-10-19', 'Hdfc ', 13570, '', '28-12-2019', 1, 0),
(27, 27, 19000, 3420, 22420, 15000, 7420, '27AABCE0576D1ZW', 0, 0, 0, 0, '', 'By Cheque', 'NEFT', '', '*', 15000, '', '28-12-2019', 1, 0),
(28, 28, 22000, 3960, 25960, 25960, 0, 'NA', 0, 0, 0, 0, '', 'By Cheque', 'NEFT', '', '', 25960, '', '28-12-2019', 1, 0),
(29, 29, 10000, 1800, 11800, 6490, 5310, '27AAFCI0840L1ZI', 0, 0, 0, 0, '', 'By Cheque', 'NEFT', '', '*', 6490, '', '28-12-2019', 1, 0),
(30, 30, 24000, 0, 24000, 6000, 18000, 'NA', 0, 0, 0, 0, 'By Cash', '', '', '', '', 6000, '', '28-12-2019', 1, 0),
(31, 31, 10500, 1890, 12390, 0, 12390, '', 0, 0, 0, 0, '', '', '', '', '', 0, 'NA', '28-12-2019', 1, 0),
(33, 33, 10500, 0, 10500, 0, 0, 'NA', 0, 0, 0, 0, 'By Cash', '', '', '', '', 0, '', '28-12-2019', 1, 0),
(34, 34, 3000, 540, 3540, 0, 3540, 'PENDING', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 0, '', '28-12-2019', 1, 0),
(35, 35, 9500, 1710, 11210, 0, 11210, '27ADUFS1212R1ZD', 0, 0, 0, 0, '', '', '', '', '', 0, '', '28-12-2019', 1, 0),
(36, 36, 9500, 1710, 11210, 1770, 9440, '27ADUFS1212R1ZD', 0, 0, 0, 0, '', 'By Cheque', 'NEFT', '', '', 0, '', '28-12-2019', 1, 0),
(37, 37, 9000, 1620, 10620, 10620, 0, '27ADSPG4775H1Z1', 0, 0, 0, 0, '', 'By Cheque', '166598', '', 'THE ASHTA PEOPLE CO-OP BANK', 10620, 'NA', '28-12-2019', 1, 0),
(38, 38, 8500, 0, 8500, 5000, 3500, '0', 0, 0, 0, 0, 'By Cash', '', '', '', '', 5000, '', '28-12-2019', 1, 0),
(39, 39, 8500, 0, 8500, 5000, 3500, 'NA', 0, 0, 0, 0, 'By Cash', '', '', '', '', 5000, 'NA', '28-12-2019', 1, 0),
(40, 40, 8900, 1600, 10500, 10500, 0, '0', 0, 0, 0, 0, '', 'By Cheque', '038101', '04-12-2019', 'The Nashik Deolali Vyapri Bank LTD', 10500, '', '28-12-2019', 1, 0),
(41, 41, 22000, 3960, 25960, 0, 25960, 'PENDING', 0, 0, 0, 0, '', '', '', '', '', 0, '', '28-12-2019', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `law_roll`
--

CREATE TABLE `law_roll` (
  `roll_id` int(11) NOT NULL,
  `roll_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_roll`
--

INSERT INTO `law_roll` (`roll_id`, `roll_name`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'RC'),
(4, 'TC'),
(5, 'Office Admin'),
(6, 'Legal Assistant');

-- --------------------------------------------------------

--
-- Table structure for table `law_service`
--

CREATE TABLE `law_service` (
  `service_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `service_name` text NOT NULL,
  `service_alert_days` varchar(250) NOT NULL,
  `service_document` text NOT NULL,
  `service_status` varchar(50) NOT NULL DEFAULT 'active',
  `service_addedby` varchar(250) NOT NULL,
  `service_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_service`
--

INSERT INTO `law_service` (`service_id`, `company_id`, `service_name`, `service_alert_days`, `service_document`, `service_status`, `service_addedby`, `service_date`) VALUES
(1, 1, 'Trade Mark', '8', 'MSME,EVIDENCES,SALES BILL,PURCHASE BILL,ADVERTISE BILL,POA,AFFIDAVIT,TMA,', 'active', '', '2019-12-29 07:18:48'),
(2, 1, 'Copyright For Artistic Work', '10', 'LOGO 7 COPY,TM-C SIGN COPY,ESR COPY,ESR REPLY COPY + NEW REPLY COPY,AFTER REPLY STATUS ,NOC CERTIFICATE,SIGN FORM 14 + NOC COPY,DIARY NO.,ESR COPY,REPLY OF ESR ,REMAINDER OF STATUS ,CERTIFICATE,', 'active', '', '2019-12-18 05:36:06'),
(3, 1, 'Design', '10', 'PHOTOS 7 VIEWS ,SIGN APPLICATION PAPER,POA,MSME,PRODUCT SPECIFICATION ,OBJECTION COPY ,REMAINDER FOR 15 DAYS,REPLY OF OBJECTION,STATUS OF OBJECTION,CERTIFICATE OF DESIGN,', 'active', '', '2019-12-18 05:27:31'),
(4, 1, 'ISO', '10', 'ISO FORM,LEGAL PROFF,', 'active', '', '2019-12-18 05:45:51'),
(5, 1, 'PATENT', '10', 'TITLE OF SEARCH ,REQUIRED DOCUMENT FOR SEARCH,SEARCH REPORT COPY ALONG WITH THE OPINION,STATUS FOR FINAL FOLLOW UP,', 'active', '', '2019-12-18 05:54:13'),
(6, 1, 'COUNTER STATEMENT', '15', 'SDF,LEGAL FORM,COUNTER STATEMENT COPY,EVIDENCES (IF NOT RECEIVED IN 2 MONTHS THEN FILE WITHDRAW LETTER  ,REG-AD COPY OF OPPONENT ,EVIDENCES OF APPLICANT IN FORMAT OF AFFIDAVIT,CA AUTHORIZED STATEMENT COPY,REMAINDER FOR 15 DAYS,FINAL STATUS COPY,', 'active', '', '2019-12-18 05:55:08'),
(7, 1, 'OPPOSITION', '8', 'CONTRACT FORM,LEGAL FORM,EVIDENCES,', 'active', '', '2019-12-10 06:27:16'),
(8, 2, ' HEARING  PAYMENT (NON GOVERNMENT PAYMENT)', '0', ',', 'active', '', '2019-12-18 05:56:44'),
(9, 1, 'TM-P ( ASSIGNMENT DEED)', '10', 'POA,ASSIGNMENT DEED WITH NOTRY,NOC OF BOTH OWNER  ( NON LITIGATION),', 'active', '', '2019-12-18 04:55:54'),
(10, 1, 'TM-P (ALTER ADDRESS OF REGISTERED PROP/USER)', '10', 'POA,,NOC OF BOTH OWNER  ( NON LITIGATION),,', 'active', '', '2019-12-18 05:02:10'),
(11, 1, 'LEGAL NOTICE', '15', 'LEAGL FORM,SDF FORM,OPPONENT PARTY  COMPANY NAME AND ADDRESS PROOF ,REG-AD SCAN COPY + LEGAL NOTICE SCAN COPY,RECEIVED REPLY OF OPPONENT COPY ,OPINION OF LEGAL,', 'active', '', '2019-12-18 05:07:55'),
(12, 1, 'LEGAL NOTICE REPLY', '10', 'SDF,LEGAL FORM,LEGAL NOTICE OF OPPONENT ,SCAN COPY OF ACKNOWLEDGEMENT FROM POST,REPLY OF LEGAL NOTICE,SCAN COPY OF LEGAL NOTICE,REG-AD OF SCAN COPY SEND BY POST,REMAINDER FOR 15 DAYS,', 'active', '', '2019-12-18 05:12:23'),
(13, 1, 'COPYRIGHT FORM 14 ( LITERARY WORK,MUSICAL WORK,CINEMATOGRAPHY,WEBSITE,SOFTWARE) ', '10', 'FORM 14 5 SET , 20rs POA,SIGN FORM 14 ,LITERARY WORK,MUSICAL WORK,CINEMATOGRAPHY,WEBSITE,SOFTWARE 5 COPY,NOC WHERE EVER REQUIRED,DAIRY NO.,STATUS COPY,ESR COPY,ESR REPLY COPY,SPEED POST,STATUS,CERTIFICATE,', 'active', '', '2019-12-18 05:44:32'),
(14, 1, 'TRADEMARK RENEWAL (TM-R)', '15', 'TM-R SIGN COPY,POA,', 'active', '', '2019-12-24 05:45:12'),
(15, 1, 'Follow-up', '10', ',', 'active', '', '2019-12-28 12:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `law_target`
--

CREATE TABLE `law_target` (
  `target_id` bigint(20) NOT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `target_title` varchar(250) NOT NULL,
  `branch_id` bigint(20) NOT NULL,
  `target_from` varchar(20) NOT NULL,
  `target_to` varchar(20) NOT NULL,
  `target_addedby` varchar(100) DEFAULT NULL,
  `target_status` varchar(50) NOT NULL DEFAULT 'active',
  `target_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_target`
--

INSERT INTO `law_target` (`target_id`, `company_id`, `target_title`, `branch_id`, `target_from`, `target_to`, `target_addedby`, `target_status`, `target_date`) VALUES
(1, NULL, 'December', 0, '01-12-2019', '31-12-2019', '1', 'active', '2019-12-23 11:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `law_target_details`
--

CREATE TABLE `law_target_details` (
  `target_details_id` bigint(20) NOT NULL,
  `target_no` bigint(20) NOT NULL,
  `target_id` bigint(20) NOT NULL,
  `branch_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `target_amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_target_details`
--

INSERT INTO `law_target_details` (`target_details_id`, `target_no`, `target_id`, `branch_id`, `user_id`, `target_amount`) VALUES
(3, 2, 1, 1, 46, 325000),
(4, 2, 1, 1, 47, 100000),
(5, 3, 1, 13, 46, 102500),
(6, 3, 1, 13, 47, 30000),
(7, 3, 1, 13, 48, 117500),
(8, 4, 1, 2, 46, 175000),
(9, 4, 1, 2, 51, 110000),
(10, 4, 1, 2, 48, 200000),
(14, 5, 1, 3, 46, 50000),
(15, 5, 1, 3, 48, 60000),
(16, 6, 1, 5, 41, 200000),
(17, 6, 1, 5, 42, 200000),
(18, 6, 1, 5, 43, 200000),
(19, 6, 1, 5, 44, 120000),
(20, 6, 1, 5, 50, 85000),
(28, 7, 1, 7, 41, 50000),
(29, 7, 1, 7, 42, 50000),
(30, 7, 1, 7, 43, 50000),
(31, 7, 1, 7, 45, 110000),
(32, 7, 1, 7, 44, 0),
(33, 7, 1, 7, 50, 0),
(35, 8, 1, 6, 41, 80000),
(36, 8, 1, 6, 42, 80000),
(37, 8, 1, 6, 43, 50000),
(38, 8, 1, 6, 45, 0),
(39, 8, 1, 6, 44, 0),
(40, 8, 1, 6, 50, 0),
(42, 9, 1, 4, 41, 180000),
(43, 9, 1, 4, 42, 180000),
(44, 9, 1, 4, 49, 120000),
(45, 9, 1, 4, 0, 0),
(46, 10, 1, 8, 41, 80000),
(47, 10, 1, 8, 42, 80000),
(48, 10, 1, 8, 43, 30000),
(49, 10, 1, 8, 44, 0),
(51, 11, 1, 12, 37, 250000),
(52, 11, 1, 12, 38, 250000),
(53, 11, 1, 12, 40, 210000),
(54, 12, 1, 11, 37, 140000),
(55, 12, 1, 11, 38, 140000),
(56, 13, 1, 9, 37, 250000),
(57, 13, 1, 9, 38, 250000),
(58, 13, 1, 9, 39, 210000),
(59, 14, 1, 10, 37, 130000),
(60, 14, 1, 10, 38, 133000);

-- --------------------------------------------------------

--
-- Table structure for table `law_trademark`
--

CREATE TABLE `law_trademark` (
  `applicant_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `NAME` text DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL,
  `STATE` varchar(150) DEFAULT NULL,
  `BRAND` varchar(250) DEFAULT NULL,
  `SIGNIFICANCE` varchar(250) DEFAULT NULL,
  `AGE` varchar(250) DEFAULT NULL,
  `FIRMADDRESS` text DEFAULT NULL,
  `ORGANIZATION` varchar(250) DEFAULT NULL,
  `NATIONALITY` varchar(100) DEFAULT NULL,
  `FATHER` varchar(250) DEFAULT NULL,
  `ASSOCIATION` varchar(250) DEFAULT NULL,
  `MOBILE` varchar(20) DEFAULT NULL,
  `SIGN_AUTH` varchar(250) DEFAULT NULL,
  `AFF_DATE` varchar(20) DEFAULT NULL,
  `COV_DATE` varchar(20) DEFAULT NULL,
  `MARK_0` varchar(250) DEFAULT NULL,
  `MARK_1` varchar(250) DEFAULT NULL,
  `MARK_2` varchar(250) DEFAULT NULL,
  `MARK_3` varchar(250) DEFAULT NULL,
  `MARK_4` varchar(250) DEFAULT NULL,
  `TM` varchar(250) DEFAULT NULL,
  `SERVICES` varchar(250) DEFAULT NULL,
  `PROPOSED_TO_BE` varchar(100) DEFAULT NULL,
  `PROPOSED` varchar(250) DEFAULT NULL,
  `INFORMATION` varchar(250) DEFAULT NULL,
  `PLACE` varchar(250) DEFAULT NULL,
  `DATE` varchar(250) DEFAULT NULL,
  `TRADE` varchar(250) NOT NULL,
  `TRADE_0` varchar(250) DEFAULT NULL,
  `TRADE_1` varchar(250) DEFAULT NULL,
  `TRADE_2` varchar(250) DEFAULT NULL,
  `TRADE_3` varchar(250) DEFAULT NULL,
  `FILE_REF_NO` varchar(250) DEFAULT NULL,
  `IS_MSME_REQ` varchar(50) NOT NULL DEFAULT 'No',
  `ASSOCIATE_MARK` varchar(250) DEFAULT NULL,
  `ADV_NAME` varchar(250) DEFAULT NULL,
  `BAR_COUN_NO` varchar(250) DEFAULT NULL,
  `LOGO` varchar(250) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_trademark`
--

INSERT INTO `law_trademark` (`applicant_id`, `application_id`, `NAME`, `ADDRESS`, `STATE`, `BRAND`, `SIGNIFICANCE`, `AGE`, `FIRMADDRESS`, `ORGANIZATION`, `NATIONALITY`, `FATHER`, `ASSOCIATION`, `MOBILE`, `SIGN_AUTH`, `AFF_DATE`, `COV_DATE`, `MARK_0`, `MARK_1`, `MARK_2`, `MARK_3`, `MARK_4`, `TM`, `SERVICES`, `PROPOSED_TO_BE`, `PROPOSED`, `INFORMATION`, `PLACE`, `DATE`, `TRADE`, `TRADE_0`, `TRADE_1`, `TRADE_2`, `TRADE_3`, `FILE_REF_NO`, `IS_MSME_REQ`, `ASSOCIATE_MARK`, `ADV_NAME`, `BAR_COUN_NO`, `LOGO`, `is_delete`) VALUES
(4, 5, 'Mr. Sudhir Suresh Mali ', NULL, 'MAHARASHTRA', 'MARMORIS CAFFE ', 'Thought ', '29', 'Marmoris, basement of bangalore ayyangar backery, near hemraj travels sangli 416416', 'Marmoris ', 'INDIAN', '', NULL, '9168252727', '', NULL, '24-12-2019', '', 'Device', '', '', '', '29', 'CAFFE and restaurant, coffee house, sandwich, rolls and pizza, shakes and juices etc. ', 'Proposed To Be Used', '', '', 'PUNE', '24-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(5, 6, 'Sham Atmaram Bachhav', NULL, 'MAHARASHTRA', 'NEBULEZ', 'NA', '', ' 11 Shrimangal Garden Near Indira Jogging Track Mumbai Highway Nashik-42205', 'CSM CORPORSANO MEDIAID', 'India', '', NULL, '9970068456', '', NULL, '24-12-2019', 'Word Mark', '', '', '', '', '5', ' Medicinal & Pharmaceutical Preparation', '', '20-12-2000', 'Avinash Raghunath Pawar', 'PUNE', '24-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'LALASAHEB ANNA ATOLE', 'MAH/2728/2016', NULL, 0),
(6, 8, 'DNANDEV BAJIRAV CHOLKE', NULL, 'Maharashtra', 'Amrut Top T', 'THOUGHT', '36', 'Gut No. 54/1, AP – Cholkewadi, Astgaon, Tal. Rahata', 'SAIRAJ MILK AND MILK PRODUCTS ', 'INDIAN', 'Bajirav Cholke', NULL, '9657115132', NULL, NULL, '02-12-2019', 'Word Mark', '', '', '', '', '29', 'Milk and milk products', '', '15-08-2019', ' Cholke sir', 'AURANGABAD', '02-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '2843057,2862887,3789054,3888989', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(7, 11, 'Mr Prasad Shetty,Mr Raghunath Shetty', NULL, 'Maharashtra', 'Hotel Sourabh Restaurant and Bar', 'THOUGHT ', '43', 'Sr No 63/2B/1 Rajyog Society Pune Satara Road Padmavati Pune 411009', 'Hotel Sourabh', 'INDIAN', '0', NULL, '9766321103', 'Mr Prasad Shetty', NULL, '03-12-2019', '', 'Device', '', '', '', '43', 'Providing food and Drinks', '', '01-12-1984', 'Mr Prasad Shetty', 'PUNE', '03-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', 'trade_11_1577176712.jpg', 0),
(8, 13, 'Mr.Hemantkumar shankar Belanke', NULL, 'MAHARASHTRA', 'SHREEMANTCHAHA ', 'thought', '34', 'survey no.252,vakhar bhag,miraj,Dist Sangli 416410', 'BELANKE UDYOG SAMUHA', 'India', '', NULL, '7721915551', 'Mr.Hemantkumar shankar Belanke', NULL, '28-12-2019', 'Word Mark', '', '', '', '', '43', 'providing food & drink ,temporary accomodation', 'Proposed To Be Used', '', '', 'PUNE', '28-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(14, 19, 'Mr. Sachin Balasaheb Lad', NULL, 'Maharashtra', 'OFFERING THE BEAUTIFUL MEMORIES ', 'THOUGHT', '42', '2749/1, B.D. Lad Industrial Park, At post - kundal,vita road,tal palus,sangli,416309', 'Rajtilak Industries', 'INDIAN', NULL, 'Mr. Sachin Balasaheb Lad', '9890618460', 'Mr. Sachin Balasaheb Lad', NULL, '04-12-2019', 'Word Mark', '', '', '', '', '3', 'all types of Holi colours,Gulal,Ashtagandha,Bhandara,variety of kumkum ,Rangoli ,powder color,Sandalwood,holi kids play toys marking ink colors festivals kids color play craft & toys.', '', '21-10-2019', 'mr.Sachin Lad', 'PUNE', '04-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(21, 26, 'Shaikh Abdul quayyum ', NULL, 'MAHARASHTRA', 'Almas jewellers', '', '51', 'sarafa bazar sarafa masjid lota karanja road. auragabad', 'Almas jewellers', 'India', '', NULL, '9028141544', 'Shaikh Abdul quayyum ', NULL, '25-10-2019', 'Word Mark', '', '', '', '', '14', 'class. 14;pest', '', '01-01-2002', ' ', 'PUNE', '28-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(22, 29, ' mr.Shaikh farid 2) mr.shaikh hamid', NULL, 'MAHARASHTRA', ' indosia ', 'as a thoughts ', '', '1678-2,joshi peth jalgaon-425001', 'indosia Pharmaceuticals pvt ltd ', 'India', '', NULL, '9766724270, 91300555', 'mr.shaikh farid ', NULL, '28-12-2019', '', 'Device', '', '', '', '5', 'medicinal & pharmaceutical preparation ', '', '30-11-19', 'mr.shaikh farid  ', 'jalgaon', '28-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(23, 30, '1) MR SANDEEP SHANKAR PATIL 2) SACHIN SHANKAR PATIL', NULL, 'MAHARASHTRA', '1)  ITRACALL 2) LULICALL 3) S PHARMA', 'THOUGHTS', '36', 'BEHIND SHREE HANUMAN HIGH SCHOOL ,A/P-KERLE,TAL-KARVEER DIST-KOLHAPUR 416229', 'S PHARMA', 'India', '', NULL, '9637193530', 'MR SANDEEP SHANKAR PATIL', NULL, '28-12-2019', 'Word Mark', '', '', '', '', '5', 'MEDICINAL AND PHARMACEUTICAL PREPARATIONS PHARMACEUTICAL AND VETERINARY PREPARATIONS, SANITARY PREPARATIONS FOR MEDICAL PURPOSES, DIETETIC SUBSTANCES ADAPTED FOR MEDICAL USE, FOOD FOR BABIES, PLASTERS, MATERIALS FOR DRESSINGS, MATERIAL FOR STOPPING T', 'Proposed To Be Used', '', '', 'Kolhapur', '28-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(24, 31, 'Mr. Rajeshkumar shankarnath Sapra', NULL, 'MAHARASHTRA', 'Architecture Interior and Creative Technology Design Academy', 'NA', '51', 'Office no. 01, Bahirwade plaza, opp. BSNL Office, Chinchwad, Pune 411019', 'AICT Design Academy', 'India', '', NULL, '9011054381', 'Mr. Rajeshkumar shankarnath Sapra', NULL, '03-12-2019', '', 'Device', '', '', '', '41', 'Designing courses, Entrance exams preparation, Architectural courses', '', '01-09-2016 ', 'Mr. Rajesh sapra', 'Pune', '03-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(26, 33, 'Mr. Sachin Balasaheb Lad', NULL, 'MAHARASHTRA', 'OFFERING THE BEAUTIFUL MEMORIES ', 'As Thought', '42', '2749/1, B.D. Lad Industrial Park, At post - kundal,vita road,tal palus,sangli,416309', 'Rajtilak Industries', 'India', NULL, '', '9890618460', 'Mr. Sachin Balasaheb Lad', NULL, '28-12-2019', '', 'Device', '', '', '', '3', 'all types of Holi colours,Gulal,Ashtagandha,Bhandara,variety of kumkum ,Rangoli ,powder color,Sandalwood,holi kids play toys marking ink colors festivals kids color play craft & toys', '', '21-10-2016 ', ' mr.Sachin Lad', 'Palus,Sangli', '28-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(27, 34, 'Sachin bhushan Gupta ', NULL, 'MAHARASHTRA', '4147843 + Withdraw', '', '', ' c/o. Madan trading company,  shop no. 4, silver valley, nashik ', NULL, 'India', '', NULL, '9225102282', 'Sachin bhushan Gupta ', NULL, '28-12-2019', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(28, 35, 'Lokesh Gajanan Uttekar, Adish Ramesh Patil, Dipak Bankar, Sunil Menon', NULL, 'MAHARASHTRA', 'PRO - T5', '', '', 'H- 34, old midc, Satara 415004', 'Satva sport\'s nutritions ', 'India', '', NULL, '9421884003', ' Lokesh Gajanan Uttekar', NULL, '28-12-2019', 'Word Mark', '', '', '', '', '35', 'All types of nutritions in powder fom, gel form, Dietary & nutritional supplements in powered, drink, gel form', 'Proposed To Be Used', '', ' Lokesh Gajanan Uttekar', 'Satara', '28-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(29, 36, 'Lokesh Gajanan Uttekar, Adish Ramesh Patil, Dipak Bankar, Sunil Menon', NULL, 'MAHARASHTRA', 'PRO - T5', 'Working of products ', '35', ' H- 34, old midc, Satara 415004', 'Satva sport\'s nutritions ', 'India', '', NULL, '9421884003', ' Lokesh Gajanan Uttekar', NULL, '28-12-2019', 'Word Mark', '', '', '', '', '5', 'All types of nutritions in powder fom, gel form, Dietary & nutritional supplements in powered, drink, gel form', 'Proposed To Be Used', '', '', 'Satara', '04-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(30, 38, 'Mr. Ravindra Bhupal Patil ', NULL, 'MAHARASHTRA', 'JAYKUSUM', 'Thought ', '38', 'A/p Kumbhoj, tal- Hatkanangale, Dist.- Kolhapur 416111', 'Jay Agencies ', 'India', '', NULL, '9970313130', 'Mr. Ravindra Bhupal Patil ', NULL, '04-12-2019', 'Word Mark', '', '', '', '', '3', ' Detergent powder, Detergent cake, Dishwash powder & bar, Toilet cleaners, handwash, soaps', 'Proposed To Be Used', '', 'Mr. Ravindra Bhupal Patil ', 'Sangli ', '04-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(31, 39, 'Mr. Ravindra Bhupal Patil ', NULL, 'MAHARASHTRA', 'JAYKUSUM', 'Thought ', '38', 'A/p Kumbhoj, tal- Hatkanangale, Dist.- Kolhapur 416111', 'Jay Agencies ', 'India', '', NULL, '9970313130', 'Mr. Ravindra Bhupal Patil ', NULL, '04-12-2019', 'Word Mark', '', '', '', '', '30', 'Tea, coffee, cocoa, artificial coffee, rice, pastry and confectionery, sugar, spices, ice,', 'Proposed To Be Used', '', '', 'Sangli ', '28-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(32, 40, 'Sachin Bhushan Gupta', NULL, 'MAHARASHTRA', 'MTC', '', '45', 'Shop No 4 Silver Valley Near Nehru Nagar Bus Stop Nashik', 'MADAN TRADING CO', 'India', '', NULL, '8275567456', 'Sachin Bhushan Gupta', NULL, '', '', 'Device', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', 'trade_40_1577537181.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `law_user`
--

CREATE TABLE `law_user` (
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `branch_id` varchar(100) NOT NULL,
  `roll_id` int(11) NOT NULL DEFAULT 2,
  `user_name` varchar(250) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `user_city` varchar(150) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_mobile` varchar(12) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_otp` varchar(10) DEFAULT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT 'active',
  `user_addedby` varchar(100) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_user`
--

INSERT INTO `law_user` (`user_id`, `company_id`, `branch_id`, `roll_id`, `user_name`, `user_lastname`, `user_city`, `user_email`, `user_mobile`, `user_password`, `user_otp`, `user_status`, `user_addedby`, `user_date`, `is_admin`) VALUES
(1, 2, '0', 1, 'Sandip', 'Powar', 'Kolhapur', 'lawprotectors.rm@gmail.com', '9372204078', '123', '714156', 'active', 'Admin', '2019-12-31 05:28:32', 1),
(2, 1, '0', 1, 'Rushikesh', 'Sir', 'Kop', 'md.lawprotectors@gmail.com', '9372204076', 'Law@2019', '475798', 'active', '', '2019-12-26 10:44:50', 1),
(37, 2, '9, 10, 11, 12', 2, 'ROHINI', 'DHERE', '', 'rohini.lawprotectors@gmail.com ', '9372204077', '123456', NULL, 'active', '53', '2019-12-24 05:28:58', 0),
(38, 2, '9, 10, 11, 12', 2, 'SWAPNIL', 'MAHALLE', '', 'lawprotectors.swapnil@gmail.com ', '9158288666', '123456', NULL, 'active', '53', '2019-12-24 05:30:15', 0),
(39, 2, '9', 4, 'BASHIRA', 'MUJAWAR', '', 'lawprotectors.bashira@gmail.com ', '9689297875', '123456', NULL, 'active', '52', '2019-12-24 06:54:29', 0),
(40, 2, '12', 4, 'ARCHANA', 'SHETE', '', 'lawprotectors.archana@gmail.com ', '9527768376', '123456', NULL, 'active', '52', '2019-12-24 06:54:39', 0),
(41, 1, '4, 5, 6, 7, 8', 2, 'DIPIKA', 'KADAM', '', 'dipika.lawprotectors@gmail.com', '9158133555', '123456', NULL, 'active', '2', '2019-12-20 08:54:33', 0),
(42, 1, '4, 5, 6, 7, 8', 2, 'SANDIP', 'POWAR', '', 'lawprotectors.rm@gmail.com', '9372274078', '123456', '406314', 'active', '2', '2019-12-31 05:27:22', 0),
(43, 1, '5, 6, 7, 8', 3, 'SANDEEP', 'POWAR', '', 'lawprotectors.sp@gmail.com', '9158877666', '123456', NULL, 'active', '2', '2019-12-20 08:57:25', 0),
(44, 1, '5, 6, 7, 8', 4, 'SWATI', 'BHOPLE', '', 'swati.bhopale78@gmail.com', '9373469613', '123456', NULL, 'active', '2', '2019-12-20 08:59:16', 0),
(45, 1, '6, 7', 3, 'PRAVIN', 'LOTE', '', 'pravinlote121@gmail.com ', '7083005714', '123456', NULL, 'active', '53', '2019-12-28 12:01:31', 0),
(46, 1, '1, 2, 3, 13', 2, 'SHRIKANT', 'SHEDGE', '', 'shrikant.lawprotectors@gmail.com', '9372274076', '123456', NULL, 'active', '2', '2019-12-20 09:02:50', 0),
(47, 1, '1, 13', 3, 'AKSHAY', 'MALSHIKHARE', '', 'lawprotectors.akshay@gmail.com ', '8408800076', '123456', NULL, 'active', '2', '2019-12-20 09:03:58', 0),
(48, 1, '2, 3, 13', 4, 'VARSHA', 'BORKAR', '', 'varsha.lawprotectors@gmail.com', '8007806291', '123456', NULL, 'active', '2', '2019-12-20 09:05:39', 0),
(49, 1, '4', 3, 'PREM', 'HALDANKAR', '', 'haldankar.prem@gmail.com ', '8007533423', '123456', NULL, 'active', '2', '2019-12-20 09:07:28', 0),
(50, 1, '5, 6, 7', 4, 'PRATIBHA', 'JADHAV', '', 'lawprotectors.kolhapur@gmail.com ', '9158622555', '123456', NULL, 'active', '2', '2019-12-20 09:09:37', 0),
(51, 1, '2', 3, 'RAKESH', 'DALVI', '', 'rakeshdalvi15@gmail.com', '8552900076', '123456', NULL, 'active', '52', '2019-12-24 06:55:23', 0),
(52, 1, '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13', 5, 'SURAJ', 'MISTRI', '', 'lawprotectors.suraj@gmail.com', '8983069938', 'adminlaw', '974479', 'active', '52', '2019-12-27 11:38:01', 0),
(53, 1, '1, 2, 3, 4, 5, 6, 7, 8, 13', 5, 'MILIND', 'PAWAR', '', 'lawprotectors.milind@gmail.com', '8983069938', 'adminlaw2', '514237', 'active', '53', '2019-12-28 04:47:27', 0),
(55, 1, '0', 6, 'hgdfgh dfgh', 'Demo', '', 'aaa@mail.com', '9988662255', '111', '951558', 'active', '1', '2019-12-31 04:46:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `law_user_branch_rel`
--

CREATE TABLE `law_user_branch_rel` (
  `rel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `roll_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `rel_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_user_branch_rel`
--

INSERT INTO `law_user_branch_rel` (`rel_id`, `user_id`, `branch_id`, `roll_id`, `added_by`, `rel_date`) VALUES
(1, 30, 5, 2, 1, '2019-12-19 12:56:37'),
(2, 31, 5, 2, 1, '2019-12-19 12:56:59'),
(3, 32, 5, 3, 1, '2019-12-19 12:57:19'),
(4, 33, 5, 3, 1, '2019-12-19 12:57:37'),
(5, 34, 5, 4, 1, '2019-12-19 12:57:53'),
(6, 35, 5, 4, 1, '2019-12-19 12:58:10'),
(7, 36, 4, 3, 2, '2019-12-19 13:10:14'),
(8, 36, 5, 3, 2, '2019-12-19 13:10:14'),
(9, 36, 6, 3, 2, '2019-12-19 13:10:14'),
(10, 36, 7, 3, 2, '2019-12-19 13:10:14'),
(11, 36, 8, 3, 2, '2019-12-19 13:10:14'),
(35, 41, 4, 2, 2, '2019-12-20 08:54:33'),
(36, 41, 5, 2, 2, '2019-12-20 08:54:33'),
(37, 41, 6, 2, 2, '2019-12-20 08:54:33'),
(38, 41, 7, 2, 2, '2019-12-20 08:54:33'),
(39, 41, 8, 2, 2, '2019-12-20 08:54:33'),
(40, 42, 4, 2, 2, '2019-12-20 08:56:14'),
(41, 42, 5, 2, 2, '2019-12-20 08:56:14'),
(42, 42, 6, 2, 2, '2019-12-20 08:56:14'),
(43, 42, 7, 2, 2, '2019-12-20 08:56:14'),
(44, 42, 8, 2, 2, '2019-12-20 08:56:14'),
(45, 43, 5, 3, 2, '2019-12-20 08:57:25'),
(46, 43, 6, 3, 2, '2019-12-20 08:57:25'),
(47, 43, 7, 3, 2, '2019-12-20 08:57:25'),
(48, 43, 8, 3, 2, '2019-12-20 08:57:25'),
(49, 44, 5, 4, 2, '2019-12-20 08:59:16'),
(50, 44, 6, 4, 2, '2019-12-20 08:59:16'),
(51, 44, 7, 4, 2, '2019-12-20 08:59:16'),
(52, 44, 8, 4, 2, '2019-12-20 08:59:16'),
(55, 46, 1, 2, 2, '2019-12-20 09:02:50'),
(56, 46, 2, 2, 2, '2019-12-20 09:02:50'),
(57, 46, 3, 2, 2, '2019-12-20 09:02:50'),
(58, 46, 13, 2, 2, '2019-12-20 09:02:50'),
(59, 47, 1, 3, 2, '2019-12-20 09:03:58'),
(60, 47, 13, 3, 2, '2019-12-20 09:03:58'),
(61, 48, 2, 4, 2, '2019-12-20 09:05:39'),
(62, 48, 3, 4, 2, '2019-12-20 09:05:39'),
(63, 48, 13, 4, 2, '2019-12-20 09:05:39'),
(64, 49, 4, 3, 2, '2019-12-20 09:07:28'),
(65, 50, 5, 4, 2, '2019-12-20 09:09:37'),
(66, 50, 6, 4, 2, '2019-12-20 09:09:37'),
(67, 50, 7, 4, 2, '2019-12-20 09:09:37'),
(136, 53, 1, 5, 53, '2019-12-24 05:28:23'),
(137, 53, 2, 5, 53, '2019-12-24 05:28:23'),
(138, 53, 3, 5, 53, '2019-12-24 05:28:23'),
(139, 53, 4, 5, 53, '2019-12-24 05:28:23'),
(140, 53, 5, 5, 53, '2019-12-24 05:28:23'),
(141, 53, 6, 5, 53, '2019-12-24 05:28:23'),
(142, 53, 7, 5, 53, '2019-12-24 05:28:23'),
(143, 53, 8, 5, 53, '2019-12-24 05:28:23'),
(144, 53, 13, 5, 53, '2019-12-24 05:28:23'),
(145, 37, 9, 2, 53, '2019-12-24 05:28:58'),
(146, 37, 10, 2, 53, '2019-12-24 05:28:58'),
(147, 37, 11, 2, 53, '2019-12-24 05:28:58'),
(148, 37, 12, 2, 53, '2019-12-24 05:28:58'),
(149, 38, 9, 2, 53, '2019-12-24 05:30:15'),
(150, 38, 10, 2, 53, '2019-12-24 05:30:15'),
(151, 38, 11, 2, 53, '2019-12-24 05:30:15'),
(152, 38, 12, 2, 53, '2019-12-24 05:30:15'),
(153, 39, 9, 4, 52, '2019-12-24 06:54:29'),
(154, 40, 12, 4, 52, '2019-12-24 06:54:39'),
(155, 52, 1, 5, 52, '2019-12-24 06:54:54'),
(156, 52, 2, 5, 52, '2019-12-24 06:54:54'),
(157, 52, 3, 5, 52, '2019-12-24 06:54:54'),
(158, 52, 4, 5, 52, '2019-12-24 06:54:54'),
(159, 52, 5, 5, 52, '2019-12-24 06:54:54'),
(160, 52, 6, 5, 52, '2019-12-24 06:54:54'),
(161, 52, 7, 5, 52, '2019-12-24 06:54:54'),
(162, 52, 8, 5, 52, '2019-12-24 06:54:54'),
(163, 52, 9, 5, 52, '2019-12-24 06:54:54'),
(164, 52, 10, 5, 52, '2019-12-24 06:54:54'),
(165, 52, 11, 5, 52, '2019-12-24 06:54:54'),
(166, 52, 12, 5, 52, '2019-12-24 06:54:54'),
(167, 52, 13, 5, 52, '2019-12-24 06:54:54'),
(168, 51, 2, 3, 52, '2019-12-24 06:55:23'),
(172, 45, 6, 3, 53, '2019-12-28 12:01:31'),
(173, 45, 7, 3, 53, '2019-12-28 12:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `law_workdetails`
--

CREATE TABLE `law_workdetails` (
  `work_id` bigint(20) NOT NULL,
  `vc_no` int(11) NOT NULL,
  `work_date` varchar(20) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `party_name` varchar(250) DEFAULT NULL,
  `party_address` text DEFAULT NULL,
  `party_con1` bigint(20) DEFAULT NULL,
  `party_con2` bigint(20) DEFAULT NULL,
  `req_details` text DEFAULT NULL,
  `work_date2` varchar(20) DEFAULT NULL,
  `work_place` varchar(100) DEFAULT NULL,
  `work_addedby` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `law_workdetails_doc`
--

CREATE TABLE `law_workdetails_doc` (
  `work_doc_id` bigint(20) NOT NULL,
  `work_id` bigint(20) NOT NULL,
  `work_doc_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `law_admin`
--
ALTER TABLE `law_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `law_application`
--
ALTER TABLE `law_application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `law_application_ibfk_1` (`branch_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `organization_id` (`organization_id`);

--
-- Indexes for table `law_appl_user_rel`
--
ALTER TABLE `law_appl_user_rel`
  ADD PRIMARY KEY (`user_rel_id`);

--
-- Indexes for table `law_branch`
--
ALTER TABLE `law_branch`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `law_company`
--
ALTER TABLE `law_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `law_copyright`
--
ALTER TABLE `law_copyright`
  ADD PRIMARY KEY (`copyright_id`);

--
-- Indexes for table `law_doc_upload`
--
ALTER TABLE `law_doc_upload`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `law_invoice`
--
ALTER TABLE `law_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `law_invoice_details`
--
ALTER TABLE `law_invoice_details`
  ADD PRIMARY KEY (`invoice_details_id`);

--
-- Indexes for table `law_leg_doc_up`
--
ALTER TABLE `law_leg_doc_up`
  ADD PRIMARY KEY (`leg_doc_id`);

--
-- Indexes for table `law_organization`
--
ALTER TABLE `law_organization`
  ADD PRIMARY KEY (`organization_id`);

--
-- Indexes for table `law_otherservice`
--
ALTER TABLE `law_otherservice`
  ADD PRIMARY KEY (`otherservice_id`);

--
-- Indexes for table `law_payment`
--
ALTER TABLE `law_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `law_roll`
--
ALTER TABLE `law_roll`
  ADD PRIMARY KEY (`roll_id`);

--
-- Indexes for table `law_service`
--
ALTER TABLE `law_service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `law_target`
--
ALTER TABLE `law_target`
  ADD PRIMARY KEY (`target_id`);

--
-- Indexes for table `law_target_details`
--
ALTER TABLE `law_target_details`
  ADD PRIMARY KEY (`target_details_id`),
  ADD KEY `target_id` (`target_id`);

--
-- Indexes for table `law_trademark`
--
ALTER TABLE `law_trademark`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `law_user`
--
ALTER TABLE `law_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `law_user_branch_rel`
--
ALTER TABLE `law_user_branch_rel`
  ADD PRIMARY KEY (`rel_id`);

--
-- Indexes for table `law_workdetails`
--
ALTER TABLE `law_workdetails`
  ADD PRIMARY KEY (`work_id`);

--
-- Indexes for table `law_workdetails_doc`
--
ALTER TABLE `law_workdetails_doc`
  ADD PRIMARY KEY (`work_doc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `law_admin`
--
ALTER TABLE `law_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `law_application`
--
ALTER TABLE `law_application`
  MODIFY `application_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `law_appl_user_rel`
--
ALTER TABLE `law_appl_user_rel`
  MODIFY `user_rel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT for table `law_branch`
--
ALTER TABLE `law_branch`
  MODIFY `branch_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `law_company`
--
ALTER TABLE `law_company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `law_copyright`
--
ALTER TABLE `law_copyright`
  MODIFY `copyright_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `law_doc_upload`
--
ALTER TABLE `law_doc_upload`
  MODIFY `upload_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `law_invoice`
--
ALTER TABLE `law_invoice`
  MODIFY `invoice_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `law_invoice_details`
--
ALTER TABLE `law_invoice_details`
  MODIFY `invoice_details_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `law_leg_doc_up`
--
ALTER TABLE `law_leg_doc_up`
  MODIFY `leg_doc_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `law_organization`
--
ALTER TABLE `law_organization`
  MODIFY `organization_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `law_otherservice`
--
ALTER TABLE `law_otherservice`
  MODIFY `otherservice_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `law_payment`
--
ALTER TABLE `law_payment`
  MODIFY `payment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `law_roll`
--
ALTER TABLE `law_roll`
  MODIFY `roll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `law_service`
--
ALTER TABLE `law_service`
  MODIFY `service_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `law_target`
--
ALTER TABLE `law_target`
  MODIFY `target_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `law_target_details`
--
ALTER TABLE `law_target_details`
  MODIFY `target_details_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `law_trademark`
--
ALTER TABLE `law_trademark`
  MODIFY `applicant_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `law_user`
--
ALTER TABLE `law_user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `law_user_branch_rel`
--
ALTER TABLE `law_user_branch_rel`
  MODIFY `rel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `law_workdetails`
--
ALTER TABLE `law_workdetails`
  MODIFY `work_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `law_workdetails_doc`
--
ALTER TABLE `law_workdetails_doc`
  MODIFY `work_doc_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `law_application`
--
ALTER TABLE `law_application`
  ADD CONSTRAINT `law_application_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `law_organization` (`organization_id`);

--
-- Constraints for table `law_branch`
--
ALTER TABLE `law_branch`
  ADD CONSTRAINT `law_branch_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `law_company` (`company_id`) ON UPDATE CASCADE;

--
-- Constraints for table `law_service`
--
ALTER TABLE `law_service`
  ADD CONSTRAINT `law_service_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `law_company` (`company_id`) ON UPDATE CASCADE;

--
-- Constraints for table `law_target_details`
--
ALTER TABLE `law_target_details`
  ADD CONSTRAINT `law_target_details_ibfk_1` FOREIGN KEY (`target_id`) REFERENCES `law_target` (`target_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
