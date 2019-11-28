-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 07:48 AM
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
(1, 'Techno', 'tech@demo.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `law_applicant`
--

CREATE TABLE `law_applicant` (
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
  `PROPOSED` varchar(250) DEFAULT NULL,
  `INFORMATION` varchar(250) DEFAULT NULL,
  `PLACE` varchar(250) DEFAULT NULL,
  `DATE` varchar(250) DEFAULT NULL,
  `TRADE_0` varchar(250) DEFAULT NULL,
  `TRADE_1` varchar(250) DEFAULT NULL,
  `TRADE_2` varchar(250) DEFAULT NULL,
  `TRADE_3` varchar(250) DEFAULT NULL,
  `CONTRACTAMOUNT` double DEFAULT NULL,
  `GSTAMOUNT` double DEFAULT NULL,
  `TOTALAMOUNT` double DEFAULT NULL,
  `RECEVIEDAMOUNT` double DEFAULT NULL,
  `BALANCEAMOUNT` double DEFAULT NULL,
  `GSTNUMBER` varchar(250) DEFAULT NULL,
  `CHEQUENUMBER` varchar(250) DEFAULT NULL,
  `CHEQUEAMOUNT` double DEFAULT NULL,
  `BANKNAME` varchar(250) DEFAULT NULL,
  `PAYMENTMODE_0` varchar(250) DEFAULT NULL,
  `PAYMENTMODE_1` varchar(250) DEFAULT NULL,
  `CHQDATE` varchar(50) DEFAULT NULL,
  `2000NOTES` varchar(50) DEFAULT NULL,
  `500NOTES` varchar(50) DEFAULT NULL,
  `200NOTES` varchar(50) DEFAULT NULL,
  `100NOTES` varchar(50) DEFAULT NULL,
  `50NOTES` varchar(50) DEFAULT NULL,
  `20NOTES` varchar(50) DEFAULT NULL,
  `10NOTES` varchar(50) DEFAULT NULL,
  `GROUNDOFCONTRACT` varchar(250) DEFAULT NULL,
  `FILE_REF_NO` varchar(250) DEFAULT NULL,
  `IS_MSME_REQ` varchar(50) NOT NULL DEFAULT 'No',
  `SALE_YR_AMT1` text DEFAULT NULL,
  `SALE_YR_AMT2` double DEFAULT NULL,
  `SALE_YR_AMT3` double DEFAULT NULL,
  `SALE_YR_AMT4` double DEFAULT NULL,
  `SALE_YR_AMT5` double DEFAULT NULL,
  `ADV_YR_AMT1` double DEFAULT NULL,
  `ADV_YR_AMT2` double DEFAULT NULL,
  `ADV_YR_AMT3` double DEFAULT NULL,
  `ADV_YR_AMT4` double DEFAULT NULL,
  `ADV_YR_AMT5` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_applicant`
--

INSERT INTO `law_applicant` (`applicant_id`, `application_id`, `NAME`, `ADDRESS`, `STATE`, `BRAND`, `SIGNIFICANCE`, `AGE`, `FIRMADDRESS`, `ORGANIZATION`, `NATIONALITY`, `FATHER`, `ASSOCIATION`, `MOBILE`, `AFF_DATE`, `COV_DATE`, `MARK_0`, `MARK_1`, `MARK_2`, `MARK_3`, `MARK_4`, `TM`, `SERVICES`, `PROPOSED`, `INFORMATION`, `PLACE`, `DATE`, `TRADE_0`, `TRADE_1`, `TRADE_2`, `TRADE_3`, `CONTRACTAMOUNT`, `GSTAMOUNT`, `TOTALAMOUNT`, `RECEVIEDAMOUNT`, `BALANCEAMOUNT`, `GSTNUMBER`, `CHEQUENUMBER`, `CHEQUEAMOUNT`, `BANKNAME`, `PAYMENTMODE_0`, `PAYMENTMODE_1`, `CHQDATE`, `2000NOTES`, `500NOTES`, `200NOTES`, `100NOTES`, `50NOTES`, `20NOTES`, `10NOTES`, `GROUNDOFCONTRACT`, `FILE_REF_NO`, `IS_MSME_REQ`, `SALE_YR_AMT1`, `SALE_YR_AMT2`, `SALE_YR_AMT3`, `SALE_YR_AMT4`, `SALE_YR_AMT5`, `ADV_YR_AMT1`, `ADV_YR_AMT2`, `ADV_YR_AMT3`, `ADV_YR_AMT4`, `ADV_YR_AMT5`) VALUES
(2, 3, 'F1, qwert', 'Ff1', NULL, 'Dff1', 'Cffg1', '8881', 'Cff1', 'Cff1', 'F1', 'Ff1', NULL, '9876543210', '17-11-2019', '18-11-2019', 'Word Mark', 'Device', 'Color', 'Sound', 'Three Dimentional Mark', 'Ccc1', 'C1', '08-1-2014', 'Ccc1', 'Dfg1', '25-11-2019', 'Manufacturers', 'Dealers', 'Traders', 'Service Providers', 882, 882, 82, 82, 82, 'Ccfff2', 'Dfg2', 5582, 'Ff2', 'By Cash', 'By Cheque', '18-11-2019', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'Bsjsud2', '123', 'Yes', '50000', 60000, 70000, 80000, 90000, 555, 111, 222, 333, 444),
(3, 4, 'Vaibhav Wadkar', 'Ujalaiwadi', NULL, 'Technothinksup', 'Techno', '25', '339 Ujalaiwadi', 'Techno twit solutions', 'Indian', 'Suresh', '', NULL, NULL, NULL, 'Word Mark', 'Device', 'Color', 'Sound', 'Three Dimentional Mark', '7', '42', '21-11-2019', '1/1/2020', 'Vaibhav', '', 'Manufacturers', 'Dealers', 'Traders', 'Service Providers', 0, 0, 0, 0, 0, '', '', 0, '', NULL, NULL, NULL, '', '', '', '', '', '', '', '', NULL, 'No', '0', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(4, 1, 'Vaibhav Wadkar', 'Ujalaiwadi', NULL, 'Technothinksup', 'Techno', '25', '339 Ujalaiwadi', 'Techno twit solutions', 'Indian', 'Suresh', NULL, NULL, NULL, NULL, 'Word Mark', 'Device', 'Color', 'Sound', 'Three Dimensional mark', '7', '42', 'Services', '1/1/2020', 'Vaibhav', 'Kolhapur', '15/11/2019', 'Manufactures', 'Dealers', 'Traders', 0, 0, 0, 0, 0, '', '', 0, '', NULL, NULL, NULL, '', '', '', '', '', '', '', '', NULL, 'No', '0', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(6, 7, 'F', 'Ff', NULL, 'Dff', 'Cffg', '888', 'Cff', 'Cff', 'F', 'Ff', NULL, NULL, NULL, NULL, 'Word Mark', 'Device', 'Color', NULL, NULL, 'Ccc', 'C', 'Xcc', 'Ccc', 'Dfg', '16/11/2019', 'Manufactures', 'Dealers', 'Traders', 'Service Providers', 88, 88, 8, 8, 8, 'Ccfff', 'Dfg', 558, 'Ff', 'By Cash', 'By Cheque', '16/11/2019', '5', '8', '5', '5', '5', '8', '8', 'Bsjsud', NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 9, 'F', 'Ff', NULL, 'Dff', 'Cffg', '888', 'Cff', 'Cff', 'F', 'Ff', NULL, NULL, NULL, NULL, 'Word Mark', 'Device', 'Color', NULL, NULL, 'Ccc', 'C', 'Xcc', 'Ccc', 'Dfg', '16/11/2019', 'Manufactures', 'Dealers', 'Traders', 'Service Providers', 88, 88, 8, 8, 8, 'Ccfff', 'Dfg', 558, 'Ff', 'By Cash', 'By Cheque', '16/11/2019', '5', '8', '5', '5', '5', '8', '8', 'Bsjsud', NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 10, 'F', 'Ff', NULL, 'Dff', 'Cffg', '888', 'Cff', 'Cff', 'F', 'Ff', NULL, NULL, NULL, NULL, 'Word Mark', 'Device', 'Color', NULL, NULL, 'Ccc', 'C', 'Xcc', 'Ccc', 'Dfg', '16/11/2019', 'Manufactures', 'Dealers', 'Traders', 'Service Providers', 88, 88, 8, 8, 8, 'Ccfff', 'Dfg', 558, 'Ff', 'By Cash', 'By Cheque', '16/11/2019', '5', '8', '5', '5', '5', '8', '8', 'Bsjsud', NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `law_application`
--

CREATE TABLE `law_application` (
  `application_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `application_no` varchar(20) NOT NULL,
  `application_date` varchar(20) NOT NULL,
  `branch_id` bigint(20) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `organization_id` bigint(11) NOT NULL,
  `application_status` varchar(50) NOT NULL DEFAULT 'open',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_application`
--

INSERT INTO `law_application` (`application_id`, `company_id`, `application_no`, `application_date`, `branch_id`, `service_id`, `organization_id`, `application_status`, `date`) VALUES
(1, 2, '000001', '17-11-2019', 2, 1, 1, 'open', '2019-11-16 08:15:09'),
(2, 2, '000002', '15-11-2019', 2, 1, 1, 'open', '2019-11-16 10:12:29'),
(3, 2, '000003', '17-11-2019', 2, 1, 1, 'In Process', '2019-11-17 06:07:49'),
(4, 2, '000004', '21-11-2019', 2, 1, 2, 'open', '2019-11-17 06:09:12'),
(5, 2, '000005', '13-11-2019', 2, 1, 1, 'open', '2019-11-17 06:10:08'),
(6, 2, '000006', '17-11-2019', 2, 1, 1, 'open', '2019-11-17 06:20:31'),
(7, 2, '000007', '18-11-2019', 2, 1, 1, 'open', '2019-11-17 06:21:35'),
(8, 2, '000008', '19-11-2019', 2, 1, 1, 'open', '2019-11-17 06:26:14'),
(9, 2, '000009', '19-11-2019', 2, 1, 1, 'open', '2019-11-17 06:27:43'),
(10, 2, '000010', '02-11-2019', 2, 1, 7, 'open', '2019-11-17 08:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `law_branch`
--

CREATE TABLE `law_branch` (
  `branch_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `branch_name` varchar(250) NOT NULL,
  `branch_status` varchar(50) NOT NULL DEFAULT 'active',
  `branch_addedby` varchar(50) DEFAULT NULL,
  `branch_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_branch`
--

INSERT INTO `law_branch` (`branch_id`, `company_id`, `branch_name`, `branch_status`, `branch_addedby`, `branch_date`) VALUES
(2, 2, 'Branch 1', 'active', NULL, '2019-11-15 08:20:05');

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
  `company_pincode` bigint(20) NOT NULL,
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
  `admin_email` varchar(150) DEFAULT NULL,
  `admin_password` varchar(150) DEFAULT NULL,
  `admin_roll_id` int(11) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_company`
--

INSERT INTO `law_company` (`company_id`, `company_name`, `company_address`, `company_city`, `company_state`, `company_district`, `company_pincode`, `company_mob1`, `company_mob2`, `company_email`, `company_website`, `company_pan_no`, `company_gst_no`, `company_lic1`, `company_lic2`, `company_start_date`, `company_end_date`, `company_logo`, `admin_email`, `admin_password`, `admin_roll_id`, `date`) VALUES
(2, 'Demo Company 2', 'sertert', 'Kolhapur', 'Maharashtra', 'Kolhapur', 555222, '9876543210', '', 'demo@mail.com', 'www.universaldigital.net', '5r67fh', 'dfgh', '111', '111', '15-11-2019', '30-11-2019', '', NULL, NULL, 1, '2019-11-15 07:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `law_govt`
--

CREATE TABLE `law_govt` (
  `govt_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `NAME` varchar(250) DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL,
  `BRAND` varchar(250) DEFAULT NULL,
  `SIGNIFICANCE` varchar(250) DEFAULT NULL,
  `AGE` varchar(250) DEFAULT NULL,
  `ORGANIZATION` varchar(250) DEFAULT NULL,
  `FIRMADDRESS` text DEFAULT NULL,
  `NATIONALITY` varchar(100) DEFAULT NULL,
  `ASSOCIATION` varchar(250) DEFAULT NULL,
  `MARK0` varchar(250) DEFAULT NULL,
  `MARK1` varchar(250) DEFAULT NULL,
  `MARK2` varchar(250) DEFAULT NULL,
  `MARK3` varchar(250) DEFAULT NULL,
  `MARK4` varchar(250) DEFAULT NULL,
  `TM` varchar(250) DEFAULT NULL,
  `SERVICES` varchar(250) DEFAULT NULL,
  `PROPOSED` varchar(250) DEFAULT NULL,
  `INFORMATION` varchar(250) DEFAULT NULL,
  `PLACE` varchar(250) DEFAULT NULL,
  `DATE` varchar(250) DEFAULT NULL,
  `TRADE0` varchar(250) DEFAULT NULL,
  `TRADE1` varchar(250) DEFAULT NULL,
  `TRADE2` varchar(250) DEFAULT NULL,
  `TRADE3` varchar(250) DEFAULT NULL,
  `CONTRACTAMOUNT` double DEFAULT NULL,
  `GSTAMOUNT` double DEFAULT NULL,
  `TOTALAMOUNT` double DEFAULT NULL,
  `RECEVIEDAMOUNT` double DEFAULT NULL,
  `BALANCEAMOUNT` double DEFAULT NULL,
  `GSTNUMBER` varchar(250) DEFAULT NULL,
  `CHEQUENUMBER` varchar(250) DEFAULT NULL,
  `CHEQUEAMOUNT` double DEFAULT NULL,
  `BANKNAME` varchar(250) DEFAULT NULL,
  `2000NOTES` varchar(50) DEFAULT NULL,
  `500NOTES` varchar(50) DEFAULT NULL,
  `200NOTES` varchar(50) DEFAULT NULL,
  `100NOTES` varchar(50) DEFAULT NULL,
  `50NOTES` varchar(50) DEFAULT NULL,
  `20NOTES` varchar(50) DEFAULT NULL,
  `10NOTES` varchar(50) DEFAULT NULL,
  `GROUNDOFCONTRACT` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `law_huf`
--

CREATE TABLE `law_huf` (
  `huf_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `NAME` varchar(250) DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL,
  `BRAND` varchar(250) DEFAULT NULL,
  `SIGNIFICANCE` varchar(250) DEFAULT NULL,
  `AGE` varchar(250) DEFAULT NULL,
  `ORGANIZATION` varchar(250) DEFAULT NULL,
  `FIRMADDRESS` text DEFAULT NULL,
  `NATIONALITY` varchar(100) DEFAULT NULL,
  `ASSOCIATION` varchar(250) DEFAULT NULL,
  `MARK0` varchar(250) DEFAULT NULL,
  `MARK1` varchar(250) DEFAULT NULL,
  `MARK2` varchar(250) DEFAULT NULL,
  `MARK3` varchar(250) DEFAULT NULL,
  `MARK4` varchar(250) DEFAULT NULL,
  `TM` varchar(250) DEFAULT NULL,
  `SERVICES` varchar(250) DEFAULT NULL,
  `PROPOSED` varchar(250) DEFAULT NULL,
  `INFORMATION` varchar(250) DEFAULT NULL,
  `PLACE` varchar(250) DEFAULT NULL,
  `DATE` varchar(250) DEFAULT NULL,
  `TRADE0` varchar(250) DEFAULT NULL,
  `TRADE1` varchar(250) DEFAULT NULL,
  `TRADE2` varchar(250) DEFAULT NULL,
  `TRADE3` varchar(250) DEFAULT NULL,
  `CONTRACTAMOUNT` double DEFAULT NULL,
  `GSTAMOUNT` double DEFAULT NULL,
  `TOTALAMOUNT` double DEFAULT NULL,
  `RECEVIEDAMOUNT` double DEFAULT NULL,
  `BALANCEAMOUNT` double DEFAULT NULL,
  `GSTNUMBER` varchar(250) DEFAULT NULL,
  `CHEQUENUMBER` varchar(250) DEFAULT NULL,
  `CHEQUEAMOUNT` double DEFAULT NULL,
  `BANKNAME` varchar(250) DEFAULT NULL,
  `2000NOTES` varchar(50) DEFAULT NULL,
  `500NOTES` varchar(50) DEFAULT NULL,
  `200NOTES` varchar(50) DEFAULT NULL,
  `100NOTES` varchar(50) DEFAULT NULL,
  `50NOTES` varchar(50) DEFAULT NULL,
  `20NOTES` varchar(50) DEFAULT NULL,
  `10NOTES` varchar(50) DEFAULT NULL,
  `GROUNDOFCONTRACT` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `law_llp`
--

CREATE TABLE `law_llp` (
  `llp_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `NAME` varchar(250) DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL,
  `BRAND` varchar(250) DEFAULT NULL,
  `SIGNIFICANCE` varchar(250) DEFAULT NULL,
  `AGE` varchar(250) DEFAULT NULL,
  `ORGANIZATION` varchar(250) DEFAULT NULL,
  `FIRMADDRESS` text DEFAULT NULL,
  `NATIONALITY` varchar(100) DEFAULT NULL,
  `FATHER` varchar(250) DEFAULT NULL,
  `MARK0` varchar(250) DEFAULT NULL,
  `MARK1` varchar(250) DEFAULT NULL,
  `MARK2` varchar(250) DEFAULT NULL,
  `MARK3` varchar(250) DEFAULT NULL,
  `MARK4` varchar(250) DEFAULT NULL,
  `TM` varchar(250) DEFAULT NULL,
  `SERVICES` varchar(250) DEFAULT NULL,
  `PROPOSED` varchar(250) DEFAULT NULL,
  `INFORMATION` varchar(250) DEFAULT NULL,
  `PLACE` varchar(250) DEFAULT NULL,
  `DATE` varchar(250) DEFAULT NULL,
  `TRADE0` varchar(250) DEFAULT NULL,
  `TRADE1` varchar(250) DEFAULT NULL,
  `TRADE2` varchar(250) DEFAULT NULL,
  `TRADE3` varchar(250) DEFAULT NULL,
  `CONTRACTAMOUNT` double DEFAULT NULL,
  `GSTAMOUNT` double DEFAULT NULL,
  `TOTALAMOUNT` double DEFAULT NULL,
  `RECEVIEDAMOUNT` double DEFAULT NULL,
  `BALANCEAMOUNT` double DEFAULT NULL,
  `GSTNUMBER` varchar(250) DEFAULT NULL,
  `CHEQUENUMBER` varchar(250) DEFAULT NULL,
  `CHEQUEAMOUNT` double DEFAULT NULL,
  `BANKNAME` varchar(250) DEFAULT NULL,
  `2000NOTES` varchar(50) DEFAULT NULL,
  `500NOTES` varchar(50) DEFAULT NULL,
  `200NOTES` varchar(50) DEFAULT NULL,
  `100NOTES` varchar(50) DEFAULT NULL,
  `50NOTES` varchar(50) DEFAULT NULL,
  `20NOTES` varchar(50) DEFAULT NULL,
  `10NOTES` varchar(50) DEFAULT NULL,
  `GROUNDOFCONTRACT` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `law_propritory`
--

CREATE TABLE `law_propritory` (
  `propritory_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `NAME` varchar(250) DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL,
  `BRAND` varchar(250) DEFAULT NULL,
  `SIGNIFICANCE` varchar(250) DEFAULT NULL,
  `AGE` varchar(250) DEFAULT NULL,
  `ORGANIZATION` varchar(250) DEFAULT NULL,
  `FIRMADDRESS` text DEFAULT NULL,
  `NATIONALITY` varchar(100) DEFAULT NULL,
  `FATHER` varchar(250) DEFAULT NULL,
  `MARK0` varchar(250) DEFAULT NULL,
  `MARK1` varchar(250) DEFAULT NULL,
  `MARK2` varchar(250) DEFAULT NULL,
  `MARK3` varchar(250) DEFAULT NULL,
  `MARK4` varchar(250) DEFAULT NULL,
  `TM` varchar(250) DEFAULT NULL,
  `SERVICES` varchar(250) DEFAULT NULL,
  `PROPOSED` varchar(250) DEFAULT NULL,
  `INFORMATION` varchar(250) DEFAULT NULL,
  `PLACE` varchar(250) DEFAULT NULL,
  `DATE` varchar(250) DEFAULT NULL,
  `TRADE0` varchar(250) DEFAULT NULL,
  `TRADE1` varchar(250) DEFAULT NULL,
  `TRADE2` varchar(250) DEFAULT NULL,
  `TRADE3` varchar(250) DEFAULT NULL,
  `CONTRACTAMOUNT` double DEFAULT NULL,
  `GSTAMOUNT` double DEFAULT NULL,
  `TOTALAMOUNT` double DEFAULT NULL,
  `RECEVIEDAMOUNT` double DEFAULT NULL,
  `BALANCEAMOUNT` double DEFAULT NULL,
  `GSTNUMBER` varchar(250) DEFAULT NULL,
  `CHEQUENUMBER` varchar(250) DEFAULT NULL,
  `CHEQUEAMOUNT` double DEFAULT NULL,
  `BANKNAME` varchar(250) DEFAULT NULL,
  `2000NOTES` varchar(50) DEFAULT NULL,
  `500NOTES` varchar(50) DEFAULT NULL,
  `200NOTES` varchar(50) DEFAULT NULL,
  `100NOTES` varchar(50) DEFAULT NULL,
  `50NOTES` varchar(50) DEFAULT NULL,
  `20NOTES` varchar(50) DEFAULT NULL,
  `10NOTES` varchar(50) DEFAULT NULL,
  `GROUNDOFCONTRACT` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `law_regcompany`
--

CREATE TABLE `law_regcompany` (
  `regcompany_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `NAME` varchar(250) DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL,
  `BRAND` varchar(250) DEFAULT NULL,
  `SIGNIFICANCE` varchar(250) DEFAULT NULL,
  `AGE` varchar(250) DEFAULT NULL,
  `ORGANIZATION` varchar(250) DEFAULT NULL,
  `FIRMADDRESS` text DEFAULT NULL,
  `NATIONALITY` varchar(100) DEFAULT NULL,
  `MARK0` varchar(250) DEFAULT NULL,
  `MARK1` varchar(250) DEFAULT NULL,
  `MARK2` varchar(250) DEFAULT NULL,
  `MARK3` varchar(250) DEFAULT NULL,
  `MARK4` varchar(250) DEFAULT NULL,
  `TM` varchar(250) DEFAULT NULL,
  `SERVICES` varchar(250) DEFAULT NULL,
  `PROPOSED` varchar(250) DEFAULT NULL,
  `INFORMATION` varchar(250) DEFAULT NULL,
  `PLACE` varchar(250) DEFAULT NULL,
  `DATE` varchar(250) DEFAULT NULL,
  `TRADE0` varchar(250) DEFAULT NULL,
  `TRADE1` varchar(250) DEFAULT NULL,
  `TRADE2` varchar(250) DEFAULT NULL,
  `TRADE3` varchar(250) DEFAULT NULL,
  `CONTRACTAMOUNT` double DEFAULT NULL,
  `GSTAMOUNT` double DEFAULT NULL,
  `TOTALAMOUNT` double DEFAULT NULL,
  `RECEVIEDAMOUNT` double DEFAULT NULL,
  `BALANCEAMOUNT` double DEFAULT NULL,
  `GSTNUMBER` varchar(250) DEFAULT NULL,
  `CHEQUENUMBER` varchar(250) DEFAULT NULL,
  `CHEQUEAMOUNT` double DEFAULT NULL,
  `BANKNAME` varchar(250) DEFAULT NULL,
  `2000NOTES` varchar(50) DEFAULT NULL,
  `500NOTES` varchar(50) DEFAULT NULL,
  `200NOTES` varchar(50) DEFAULT NULL,
  `100NOTES` varchar(50) DEFAULT NULL,
  `50NOTES` varchar(50) DEFAULT NULL,
  `20NOTES` varchar(50) DEFAULT NULL,
  `10NOTES` varchar(50) DEFAULT NULL,
  `GROUNDOFCONTRACT` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `law_regpartnership`
--

CREATE TABLE `law_regpartnership` (
  `regpartnership_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `NAME` varchar(250) DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL,
  `BRAND` varchar(250) DEFAULT NULL,
  `SIGNIFICANCE` varchar(250) DEFAULT NULL,
  `AGE` varchar(250) DEFAULT NULL,
  `ORGANIZATION` varchar(250) DEFAULT NULL,
  `FIRMADDRESS` text DEFAULT NULL,
  `NATIONALITY` varchar(100) DEFAULT NULL,
  `FATHER` varchar(250) DEFAULT NULL,
  `MARK0` varchar(250) DEFAULT NULL,
  `MARK1` varchar(250) DEFAULT NULL,
  `MARK2` varchar(250) DEFAULT NULL,
  `MARK3` varchar(250) DEFAULT NULL,
  `MARK4` varchar(250) DEFAULT NULL,
  `TM` varchar(250) DEFAULT NULL,
  `SERVICES` varchar(250) DEFAULT NULL,
  `PROPOSED` varchar(250) DEFAULT NULL,
  `INFORMATION` varchar(250) DEFAULT NULL,
  `PLACE` varchar(250) DEFAULT NULL,
  `DATE` varchar(250) DEFAULT NULL,
  `TRADE0` varchar(250) DEFAULT NULL,
  `TRADE1` varchar(250) DEFAULT NULL,
  `TRADE2` varchar(250) DEFAULT NULL,
  `TRADE3` varchar(250) DEFAULT NULL,
  `CONTRACTAMOUNT` double DEFAULT NULL,
  `GSTAMOUNT` double DEFAULT NULL,
  `TOTALAMOUNT` double DEFAULT NULL,
  `RECEVIEDAMOUNT` double DEFAULT NULL,
  `BALANCEAMOUNT` double DEFAULT NULL,
  `GSTNUMBER` varchar(250) DEFAULT NULL,
  `CHEQUENUMBER` varchar(250) DEFAULT NULL,
  `CHEQUEAMOUNT` double DEFAULT NULL,
  `BANKNAME` varchar(250) DEFAULT NULL,
  `2000NOTES` varchar(50) DEFAULT NULL,
  `500NOTES` varchar(50) DEFAULT NULL,
  `200NOTES` varchar(50) DEFAULT NULL,
  `100NOTES` varchar(50) DEFAULT NULL,
  `50NOTES` varchar(50) DEFAULT NULL,
  `20NOTES` varchar(50) DEFAULT NULL,
  `10NOTES` varchar(50) DEFAULT NULL,
  `GROUNDOFCONTRACT` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `law_service`
--

CREATE TABLE `law_service` (
  `service_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `service_name` text NOT NULL,
  `service_alert_days` varchar(250) NOT NULL,
  `service_status` varchar(50) NOT NULL DEFAULT 'active',
  `service_addedby` varchar(250) NOT NULL,
  `service_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_service`
--

INSERT INTO `law_service` (`service_id`, `company_id`, `service_name`, `service_alert_days`, `service_status`, `service_addedby`, `service_date`) VALUES
(1, 2, 'Trade Mark', '10', 'active', '', '2019-11-16 05:15:51'),
(2, 2, 'Copyright', '10', 'active', '', '2019-11-16 05:16:08'),
(3, 2, 'Design', '10', 'active', '', '2019-11-16 05:16:21'),
(4, 2, 'ISO', '10', 'active', '', '2019-11-16 05:16:32'),
(5, 2, 'Organization', '10', 'active', '', '2019-11-16 05:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `law_society`
--

CREATE TABLE `law_society` (
  `society_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `NAME` varchar(250) DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL,
  `BRAND` varchar(250) DEFAULT NULL,
  `SIGNIFICANCE` varchar(250) DEFAULT NULL,
  `AGE` varchar(250) DEFAULT NULL,
  `ORGANIZATION` varchar(250) DEFAULT NULL,
  `FIRMADDRESS` text DEFAULT NULL,
  `ASSOCIATION` varchar(250) DEFAULT NULL,
  `NATIONALITY` varchar(100) DEFAULT NULL,
  `MARK0` varchar(250) DEFAULT NULL,
  `MARK1` varchar(250) DEFAULT NULL,
  `MARK2` varchar(250) DEFAULT NULL,
  `MARK3` varchar(250) DEFAULT NULL,
  `MARK4` varchar(250) DEFAULT NULL,
  `TM` varchar(250) DEFAULT NULL,
  `SERVICES` varchar(250) DEFAULT NULL,
  `PROPOSED` varchar(250) DEFAULT NULL,
  `INFORMATION` varchar(250) DEFAULT NULL,
  `PLACE` varchar(250) DEFAULT NULL,
  `DATE` varchar(250) DEFAULT NULL,
  `TRADE0` varchar(250) DEFAULT NULL,
  `TRADE1` varchar(250) DEFAULT NULL,
  `TRADE2` varchar(250) DEFAULT NULL,
  `TRADE3` varchar(250) DEFAULT NULL,
  `CONTRACTAMOUNT` double DEFAULT NULL,
  `GSTAMOUNT` double DEFAULT NULL,
  `TOTALAMOUNT` double DEFAULT NULL,
  `RECEVIEDAMOUNT` double DEFAULT NULL,
  `BALANCEAMOUNT` double DEFAULT NULL,
  `GSTNUMBER` varchar(250) DEFAULT NULL,
  `CHEQUENUMBER` varchar(250) DEFAULT NULL,
  `CHEQUEAMOUNT` double DEFAULT NULL,
  `BANKNAME` varchar(250) DEFAULT NULL,
  `2000NOTES` varchar(50) DEFAULT NULL,
  `500NOTES` varchar(50) DEFAULT NULL,
  `200NOTES` varchar(50) DEFAULT NULL,
  `100NOTES` varchar(50) DEFAULT NULL,
  `50NOTES` varchar(50) DEFAULT NULL,
  `20NOTES` varchar(50) DEFAULT NULL,
  `10NOTES` varchar(50) DEFAULT NULL,
  `GROUNDOFCONTRACT` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `law_trust`
--

CREATE TABLE `law_trust` (
  `trust_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `NAME` varchar(250) DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL,
  `BRAND` varchar(250) DEFAULT NULL,
  `SIGNIFICANCE` varchar(250) DEFAULT NULL,
  `AGE` varchar(250) DEFAULT NULL,
  `ORGANIZATION` varchar(250) DEFAULT NULL,
  `FIRMADDRESS` text DEFAULT NULL,
  `ASSOCIATION` varchar(250) DEFAULT NULL,
  `NATIONALITY` varchar(100) DEFAULT NULL,
  `MARK0` varchar(250) DEFAULT NULL,
  `MARK1` varchar(250) DEFAULT NULL,
  `MARK2` varchar(250) DEFAULT NULL,
  `MARK3` varchar(250) DEFAULT NULL,
  `MARK4` varchar(250) DEFAULT NULL,
  `TM` varchar(250) DEFAULT NULL,
  `SERVICES` varchar(250) DEFAULT NULL,
  `PROPOSED` varchar(250) DEFAULT NULL,
  `INFORMATION` varchar(250) DEFAULT NULL,
  `PLACE` varchar(250) DEFAULT NULL,
  `DATE` varchar(250) DEFAULT NULL,
  `TRADE0` varchar(250) DEFAULT NULL,
  `TRADE1` varchar(250) DEFAULT NULL,
  `TRADE2` varchar(250) DEFAULT NULL,
  `TRADE3` varchar(250) DEFAULT NULL,
  `CONTRACTAMOUNT` double DEFAULT NULL,
  `GSTAMOUNT` double DEFAULT NULL,
  `TOTALAMOUNT` double DEFAULT NULL,
  `RECEVIEDAMOUNT` double DEFAULT NULL,
  `BALANCEAMOUNT` double DEFAULT NULL,
  `GSTNUMBER` varchar(250) DEFAULT NULL,
  `CHEQUENUMBER` varchar(250) DEFAULT NULL,
  `CHEQUEAMOUNT` double DEFAULT NULL,
  `BANKNAME` varchar(250) DEFAULT NULL,
  `2000NOTES` varchar(50) DEFAULT NULL,
  `500NOTES` varchar(50) DEFAULT NULL,
  `200NOTES` varchar(50) DEFAULT NULL,
  `100NOTES` varchar(50) DEFAULT NULL,
  `50NOTES` varchar(50) DEFAULT NULL,
  `20NOTES` varchar(50) DEFAULT NULL,
  `10NOTES` varchar(50) DEFAULT NULL,
  `GROUNDOFCONTRACT` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `law_unregpartnership`
--

CREATE TABLE `law_unregpartnership` (
  `unregpartnership_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `NAME` varchar(250) DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL,
  `BRAND` varchar(250) DEFAULT NULL,
  `SIGNIFICANCE` varchar(250) DEFAULT NULL,
  `AGE` varchar(250) DEFAULT NULL,
  `ORGANIZATION` varchar(250) DEFAULT NULL,
  `FIRMADDRESS` text DEFAULT NULL,
  `NATIONALITY` varchar(100) DEFAULT NULL,
  `FATHER` varchar(250) DEFAULT NULL,
  `MARK0` varchar(250) DEFAULT NULL,
  `MARK1` varchar(250) DEFAULT NULL,
  `MARK2` varchar(250) DEFAULT NULL,
  `MARK3` varchar(250) DEFAULT NULL,
  `MARK4` varchar(250) DEFAULT NULL,
  `TM` varchar(250) DEFAULT NULL,
  `SERVICES` varchar(250) DEFAULT NULL,
  `PROPOSED` varchar(250) DEFAULT NULL,
  `INFORMATION` varchar(250) DEFAULT NULL,
  `PLACE` varchar(250) DEFAULT NULL,
  `DATE` varchar(250) DEFAULT NULL,
  `TRADE0` varchar(250) DEFAULT NULL,
  `TRADE1` varchar(250) DEFAULT NULL,
  `TRADE2` varchar(250) DEFAULT NULL,
  `TRADE3` varchar(250) DEFAULT NULL,
  `CONTRACTAMOUNT` double DEFAULT NULL,
  `GSTAMOUNT` double DEFAULT NULL,
  `TOTALAMOUNT` double DEFAULT NULL,
  `RECEVIEDAMOUNT` double DEFAULT NULL,
  `BALANCEAMOUNT` double DEFAULT NULL,
  `GSTNUMBER` varchar(250) DEFAULT NULL,
  `CHEQUENUMBER` varchar(250) DEFAULT NULL,
  `CHEQUEAMOUNT` double DEFAULT NULL,
  `BANKNAME` varchar(250) DEFAULT NULL,
  `2000NOTES` varchar(50) DEFAULT NULL,
  `500NOTES` varchar(50) DEFAULT NULL,
  `200NOTES` varchar(50) DEFAULT NULL,
  `100NOTES` varchar(50) DEFAULT NULL,
  `50NOTES` varchar(50) DEFAULT NULL,
  `20NOTES` varchar(50) DEFAULT NULL,
  `10NOTES` varchar(50) DEFAULT NULL,
  `GROUNDOFCONTRACT` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `law_user`
--

CREATE TABLE `law_user` (
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `roll_id` int(11) NOT NULL DEFAULT 2,
  `user_name` varchar(250) NOT NULL,
  `user_city` varchar(150) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_mobile` varchar(12) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT 'active',
  `user_addedby` varchar(100) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_user`
--

INSERT INTO `law_user` (`user_id`, `company_id`, `roll_id`, `user_name`, `user_city`, `user_email`, `user_mobile`, `user_password`, `user_status`, `user_addedby`, `user_date`) VALUES
(1, 2, 2, 'Admin', 'Kolhapur', 'demo@mail.com', '9876543210', '123456', 'active', 'Admin', '2019-11-15 06:43:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `law_admin`
--
ALTER TABLE `law_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `law_applicant`
--
ALTER TABLE `law_applicant`
  ADD PRIMARY KEY (`applicant_id`);

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
-- Indexes for table `law_govt`
--
ALTER TABLE `law_govt`
  ADD PRIMARY KEY (`govt_id`);

--
-- Indexes for table `law_huf`
--
ALTER TABLE `law_huf`
  ADD PRIMARY KEY (`huf_id`);

--
-- Indexes for table `law_llp`
--
ALTER TABLE `law_llp`
  ADD PRIMARY KEY (`llp_id`);

--
-- Indexes for table `law_organization`
--
ALTER TABLE `law_organization`
  ADD PRIMARY KEY (`organization_id`);

--
-- Indexes for table `law_propritory`
--
ALTER TABLE `law_propritory`
  ADD PRIMARY KEY (`propritory_id`);

--
-- Indexes for table `law_regcompany`
--
ALTER TABLE `law_regcompany`
  ADD PRIMARY KEY (`regcompany_id`);

--
-- Indexes for table `law_regpartnership`
--
ALTER TABLE `law_regpartnership`
  ADD PRIMARY KEY (`regpartnership_id`);

--
-- Indexes for table `law_service`
--
ALTER TABLE `law_service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `law_society`
--
ALTER TABLE `law_society`
  ADD PRIMARY KEY (`society_id`);

--
-- Indexes for table `law_trust`
--
ALTER TABLE `law_trust`
  ADD PRIMARY KEY (`trust_id`);

--
-- Indexes for table `law_unregpartnership`
--
ALTER TABLE `law_unregpartnership`
  ADD PRIMARY KEY (`unregpartnership_id`);

--
-- Indexes for table `law_user`
--
ALTER TABLE `law_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `company_id` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `law_admin`
--
ALTER TABLE `law_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `law_applicant`
--
ALTER TABLE `law_applicant`
  MODIFY `applicant_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `law_application`
--
ALTER TABLE `law_application`
  MODIFY `application_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `law_branch`
--
ALTER TABLE `law_branch`
  MODIFY `branch_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `law_company`
--
ALTER TABLE `law_company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `law_govt`
--
ALTER TABLE `law_govt`
  MODIFY `govt_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `law_huf`
--
ALTER TABLE `law_huf`
  MODIFY `huf_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `law_llp`
--
ALTER TABLE `law_llp`
  MODIFY `llp_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `law_organization`
--
ALTER TABLE `law_organization`
  MODIFY `organization_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `law_propritory`
--
ALTER TABLE `law_propritory`
  MODIFY `propritory_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `law_regcompany`
--
ALTER TABLE `law_regcompany`
  MODIFY `regcompany_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `law_regpartnership`
--
ALTER TABLE `law_regpartnership`
  MODIFY `regpartnership_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `law_service`
--
ALTER TABLE `law_service`
  MODIFY `service_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `law_society`
--
ALTER TABLE `law_society`
  MODIFY `society_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `law_trust`
--
ALTER TABLE `law_trust`
  MODIFY `trust_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `law_unregpartnership`
--
ALTER TABLE `law_unregpartnership`
  MODIFY `unregpartnership_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `law_user`
--
ALTER TABLE `law_user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `law_user`
--
ALTER TABLE `law_user`
  ADD CONSTRAINT `law_user_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `law_company` (`company_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
