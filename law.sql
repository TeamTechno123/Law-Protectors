-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 05:36 AM
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
  `manager_id` int(11) NOT NULL,
  `tc_id` int(11) NOT NULL,
  `rc_id` int(11) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `organization_id` bigint(11) NOT NULL,
  `application_status` varchar(50) NOT NULL DEFAULT 'Open',
  `alert_days` int(11) DEFAULT NULL,
  `prn_no` varchar(50) DEFAULT NULL,
  `prn_date` varchar(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_application`
--

INSERT INTO `law_application` (`application_id`, `company_id`, `application_no`, `application_date`, `branch_id`, `manager_id`, `tc_id`, `rc_id`, `service_id`, `organization_id`, `application_status`, `alert_days`, `prn_no`, `prn_date`, `date`, `is_delete`) VALUES
(1, 2, 1, '01-12-2019', 5, 9, 11, 10, 1, 1, 'In Process', 15, '3', '01-12-2019', '2019-12-13 07:14:12', 0),
(2, 2, 2, '01-12-2019', 3, 3, 5, 4, 1, 1, 'In Process', 10, '', '', '2019-12-12 10:14:37', 0),
(3, 2, 3, '03-12-2019', 3, 3, 5, 4, 4, 2, 'In Process', NULL, NULL, NULL, '2019-12-12 10:14:41', 0),
(4, 1, 4, '01-12-2019', 5, 9, 11, 10, 1, 1, 'In Process', NULL, NULL, NULL, '2019-12-13 07:09:20', 0);

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
  `branch_ifsc` varchar(20) DEFAULT NULL,
  `branch_addedby` varchar(50) DEFAULT NULL,
  `branch_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_branch`
--

INSERT INTO `law_branch` (`branch_id`, `company_id`, `branch_name`, `branch_status`, `branch_bank`, `branch_b_branch`, `branch_acc_no`, `branch_ifsc`, `branch_addedby`, `branch_date`) VALUES
(1, 2, 'Branch 1', 'active', NULL, NULL, NULL, NULL, '1', '2019-12-12 06:02:18'),
(2, 2, 'Branch 2', 'active', NULL, NULL, NULL, NULL, '1', '2019-12-12 06:02:22'),
(3, 2, 'Branch 3', 'active', NULL, NULL, NULL, NULL, '1', '2019-12-12 06:02:25'),
(5, 1, 'Qwerty', 'active', 'ICICI', 'Kop', '123', '123', '1', '2019-12-13 06:50:43');

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
(1, 'Demo Company 1', 'sertert', 'Kolhapur', 'Maharashtra', 'Kolhapur', 27, '9876543210', '', 'demo@mail.com', 'www.universaldigital.net', '5r67fh', 'dfgh', '111', '111', '15-11-2019', '30-11-2019', '', 'company_seal_1.png', NULL, NULL, 1, '2019-12-10 05:17:03'),
(2, 'Company 2', 'kolhapur', 'Kolhapur', 'Maharashtra', 'Kolhapur', 27, '9988776655', '', 'dsfgdsf@dfg.com', 'www.com2.com', '', '1234454', '23', '', '11-11-2011', '11-12-2019', '', 'company_seal_2.png', NULL, NULL, 1, '2019-12-10 05:16:53');

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
(9, 1, 'Pan card', 'doc_1_1_1575700668.jpg', 1, '2019-12-07 06:37:48'),
(13, 1, 'Aadhar Card', 'doc_1_1_1575782668.jpg', 1, '2019-12-08 05:24:28'),
(14, 1, 'Bank Passbook', 'doc_1_2_1575782668.jpg', 1, '2019-12-08 05:24:28'),
(15, 1, 'Doc File', 'doc_1_3_1575782668.jpg', 1, '2019-12-08 05:24:29'),
(16, 2, 'Pan card', 'doc_2_1_1575972659.jpg', 1, '2019-12-10 10:10:59'),
(20, 2, 'Aadhar Card', '', 0, '2019-12-10 10:11:10'),
(21, 2, 'Bank Passbook', '', 0, '2019-12-10 10:11:10'),
(22, 2, 'Doc File', '', 0, '2019-12-10 10:11:10');

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

INSERT INTO `law_invoice` (`invoice_id`, `company_id`, `branch_id`, `application_id`, `invoice_no`, `invoice_date`, `party`, `party_address`, `party_statecode`, `po_no`, `po_date`, `basic_amt`, `gst_amt`, `tds_amt`, `adv_amt`, `bal_amt`, `net_amt`, `invoice_status`, `invoice_addedby`, `date`) VALUES
(1, 2, 3, 1, 1, '01-12-2019', 'dfgsdfg', 'ghj gfhjghj', '27', '2', '02-12-2019', 626.6, 62.66, 7567, 50, 639, 689, 'active', 1, '2019-12-07 07:55:53'),
(2, 2, 3, 2, 2, '02-12-2019', 'sdfgsdg', 'sdfgsdg', '27', '2345', '02-12-2019', 1000, 100, 200, 500, 200, 1233, 'active', 1, '2019-12-11 05:30:18');

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
(1, 1, 'sdfasdf', 10, 120, '2', 3, 65, 40, 120, '2019-12-11 05:27:43'),
(5, 1, 'dfg', 10, 506.6, '67', 10, 56, 50.66, 506.6, '2019-12-11 05:27:49'),
(6, 2, 'fdgyhdfgh', 12, 200, '1212', 10, 100, 1000, 500, '2019-12-11 05:30:33');

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
(1, 3, 'fghfgh dfghdfgh', 'hdfgh dfghfd', 'rtyghb cvghdfhnb', 996633221, 'cvbncvbn.hmjcvb', 'dfghf dfghdg dfgh', 'dfghdfgh dghdfgh', '09-12-2019', 'dgh', 0, '2019-12-10 10:55:11');

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
  `is_master` int(11) NOT NULL DEFAULT 0 COMMENT '1 if added at aplication creation',
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_payment`
--

INSERT INTO `law_payment` (`payment_id`, `application_id`, `CONTRACTAMOUNT`, `GSTAMOUNT`, `TOTALAMOUNT`, `RECEVIEDAMOUNT`, `BALANCEAMOUNT`, `GSTNUMBER`, `LP_AMOUNT`, `GOVT_FEES`, `TDS`, `B2B`, `PAYMENTMODE_0`, `PAYMENTMODE_1`, `CHEQUENUMBER`, `CHQDATE`, `BANKNAME`, `CHEQUEAMOUNT`, `GROUNDOFCONTRACT`, `payment_date`, `is_master`, `is_delete`) VALUES
(1, 1, 100, 55, 4, 100, 3, '6', 34, 4, 23, 5, '', 'By Cheque', '345', '30-12-2019', '345', 345, 'ghjkghjk ghjkghjk ghjkghjk', '13-12-2019', 1, 0),
(2, 2, 1, 1, 1, 1, 1, '1', 1, 1, 1, 1, '', 'By Cheque', '1', '23-12-2019', 'drgt', 23, 'ret', '', 1, 0),
(3, 3, 1, 1, 2, 2, 2, '2', 2, 2, 2, 2, '', 'By Cheque', '5rt43', '11-12-2019', 'Ff2', 2000, 'dfgdsfg', '12-12-2019', 1, 0),
(4, 4, 500, 10, 500, 400, 100, '123', 500, 200, 0, 10, 'By Cash', '', '', '', '', 0, '', '13-12-2019', 1, 0);

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
(4, 'TC');

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
(1, 1, 'Trade Mark', '10', 'Pan card,Aadhar Card,Bank Passbook,Doc File,', 'active', '', '2019-12-07 05:54:59'),
(2, 1, 'Copyright', '10', '', 'active', '', '2019-11-16 05:16:08'),
(3, 1, 'Design', '10', '', 'active', '', '2019-11-16 05:16:21'),
(4, 1, 'ISO', '10', '', 'active', '', '2019-11-16 05:16:32'),
(5, 1, 'Organization', '10', '', 'active', '', '2019-11-16 05:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `law_target`
--

CREATE TABLE `law_target` (
  `target_id` bigint(20) NOT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `target_title` varchar(250) DEFAULT NULL,
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
(2, NULL, 'Dec 2019', 0, '01-12-2019', '31-12-2019', '1', 'active', '2019-12-13 04:39:05');

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
(4, 1, 2, 5, 9, 100000),
(5, 1, 2, 5, 10, 30000),
(6, 1, 2, 5, 11, 70000);

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
  `TRADE` varchar(250) DEFAULT NULL,
  `TRADE_0` varchar(250) DEFAULT NULL,
  `TRADE_1` varchar(250) DEFAULT NULL,
  `TRADE_2` varchar(250) DEFAULT NULL,
  `TRADE_3` varchar(250) DEFAULT NULL,
  `FILE_REF_NO` varchar(250) DEFAULT NULL,
  `IS_MSME_REQ` varchar(50) NOT NULL DEFAULT 'No',
  `ASSOCIATE_MARK` varchar(250) DEFAULT NULL,
  `LOGO` varchar(250) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_trademark`
--

INSERT INTO `law_trademark` (`applicant_id`, `application_id`, `NAME`, `ADDRESS`, `STATE`, `BRAND`, `SIGNIFICANCE`, `AGE`, `FIRMADDRESS`, `ORGANIZATION`, `NATIONALITY`, `FATHER`, `ASSOCIATION`, `MOBILE`, `AFF_DATE`, `COV_DATE`, `MARK_0`, `MARK_1`, `MARK_2`, `MARK_3`, `MARK_4`, `TM`, `SERVICES`, `PROPOSED_TO_BE`, `PROPOSED`, `INFORMATION`, `PLACE`, `DATE`, `TRADE`, `TRADE_0`, `TRADE_1`, `TRADE_2`, `TRADE_3`, `FILE_REF_NO`, `IS_MSME_REQ`, `ASSOCIATE_MARK`, `LOGO`, `is_delete`) VALUES
(1, 1, 'asdf asdf', 'xcvbx xcvb', NULL, 'dfgsdfg', 'dsfg', '', 'xcvb xcvb', 'truytyu tyutyu tyutyu', 'asdf asdf', 'cfhdfb xcvb', NULL, '9966332211', '03-12-2019', '02-12-2019', 'Word Mark', '', 'Color', '', '', '44', 'sdfgds', '', '01-01-2014', 'dsfg', 'dfg', '02-12-2019', 'Service Providers', '', '', '', '', NULL, 'No', '', 'trade_1_1576230882.jpg', 0),
(2, 2, 'dsfg', 'dfgsd', NULL, 'dsfg', 'dfg', '54', 'sdfgsdg', 'sdfgsdg', 'dsfg', 'dsfgds', NULL, '9888888888', '01-12-2019', '09-12-2019', 'Word Mark', '', '', '', '', '22', 'fghdfgh', 'Proposed To Be Used', '', 'dfgh', 'gfh', '01-12-2019', NULL, '', '', '', '', NULL, 'No', 'ASDF', '', 0),
(3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `law_user`
--

CREATE TABLE `law_user` (
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `branch_id` bigint(100) NOT NULL,
  `roll_id` int(11) NOT NULL DEFAULT 2,
  `user_name` varchar(250) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `user_city` varchar(150) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_mobile` varchar(12) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT 'active',
  `user_addedby` varchar(100) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_user`
--

INSERT INTO `law_user` (`user_id`, `company_id`, `branch_id`, `roll_id`, `user_name`, `user_lastname`, `user_city`, `user_email`, `user_mobile`, `user_password`, `user_status`, `user_addedby`, `user_date`, `is_admin`) VALUES
(1, 2, 0, 1, 'Admin', '', 'Kolhapur', 'demo@mail.com', '9876543210', '123456', 'active', 'Admin', '2019-12-05 05:40:31', 1),
(2, 1, 0, 1, 'Datta', 'Mane', 'Kop', 'demo2@mail.com', '9999999999', '123456', 'active', '', '2019-12-10 05:23:04', 1),
(3, 2, 3, 2, 'Manag', 'Demo', 'Kop', 'asdf@mail.com', '9966332211', '123456', 'active', '', '2019-12-13 12:04:59', 0),
(4, 2, 3, 3, 'Rc', 'Demo', 'Kop', '', '9988774456', '123456', 'active', '', '2019-12-05 04:39:33', 0),
(5, 2, 3, 4, 'Tc', 'Demo', 'Kop', '', '9955441122', '123456', 'active', '', '2019-12-05 04:45:19', 0),
(9, 1, 5, 2, 'Datta', 'Mane', '', 'ddd@mail.com', '9876543210', '111', 'active', '', '2019-12-13 06:53:21', 0),
(10, 1, 5, 3, 'qwqw', 'erer', '', 'qqq@mail.com', '9876543210', 'qqq', 'active', '', '2019-12-13 06:53:45', 0),
(11, 1, 5, 4, 'asas', 'sdsd', '', 'aaa@mail.com', '9876543210', 'aaa', 'active', '', '2019-12-13 06:54:03', 0),
(17, 2, 3, 4, 'Datta', 'Demo', '', 'hhh@mail.com', '9876543210', '111', 'active', '', '2019-12-13 12:11:45', 0);

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

--
-- Dumping data for table `law_workdetails`
--

INSERT INTO `law_workdetails` (`work_id`, `vc_no`, `work_date`, `company_id`, `branch_id`, `manager_id`, `party_name`, `party_address`, `party_con1`, `party_con2`, `req_details`, `work_date2`, `work_place`, `work_addedby`, `date`) VALUES
(1, 1, '01-12-2019', 2, 3, 3, 'Afghfgh Mkiuyg', 'dfgd sdfgdsfg', 9966332211, 9988556633, 'aSdasd', '05-12-2019', 'dsfgdsfg', 2, '2019-12-10 12:38:24');

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
-- Dumping data for table `law_workdetails_doc`
--

INSERT INTO `law_workdetails_doc` (`work_doc_id`, `work_id`, `work_doc_name`) VALUES
(1, 1, 'work_1_1575981504_1.jpg');

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
  MODIFY `application_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `law_branch`
--
ALTER TABLE `law_branch`
  MODIFY `branch_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `law_company`
--
ALTER TABLE `law_company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `law_copyright`
--
ALTER TABLE `law_copyright`
  MODIFY `copyright_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `law_doc_upload`
--
ALTER TABLE `law_doc_upload`
  MODIFY `upload_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `law_invoice`
--
ALTER TABLE `law_invoice`
  MODIFY `invoice_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `law_invoice_details`
--
ALTER TABLE `law_invoice_details`
  MODIFY `invoice_details_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `law_organization`
--
ALTER TABLE `law_organization`
  MODIFY `organization_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `law_otherservice`
--
ALTER TABLE `law_otherservice`
  MODIFY `otherservice_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `law_payment`
--
ALTER TABLE `law_payment`
  MODIFY `payment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `law_roll`
--
ALTER TABLE `law_roll`
  MODIFY `roll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `law_service`
--
ALTER TABLE `law_service`
  MODIFY `service_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `law_target`
--
ALTER TABLE `law_target`
  MODIFY `target_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `law_target_details`
--
ALTER TABLE `law_target_details`
  MODIFY `target_details_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `law_trademark`
--
ALTER TABLE `law_trademark`
  MODIFY `applicant_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `law_user`
--
ALTER TABLE `law_user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `law_workdetails`
--
ALTER TABLE `law_workdetails`
  MODIFY `work_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `law_workdetails_doc`
--
ALTER TABLE `law_workdetails_doc`
  MODIFY `work_doc_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
