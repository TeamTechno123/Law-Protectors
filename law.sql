-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 08:36 AM
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
  `payment_status` varchar(100) DEFAULT 'Uncleared',
  `pay_rec_by` varchar(250) DEFAULT NULL COMMENT 'payment received by',
  `comment` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_application`
--

INSERT INTO `law_application` (`application_id`, `company_id`, `application_no`, `application_date`, `branch_id`, `manager_id`, `tc_id`, `rc_id`, `service_id`, `organization_id`, `application_status`, `alert_days`, `prn_no`, `prn_date`, `legal_user`, `payment_status`, `pay_rec_by`, `comment`, `date`, `is_delete`) VALUES
(5, 1, 1, '02-12-2019', 7, '42, 41', '', '45', 1, 5, 'In Process', 0, '', '', NULL, 'Clear', 'rrr', NULL, '2020-01-08 06:40:08', 0),
(6, 1, 2, '02-12-2019', 2, '46', '', '48', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Clear', '', NULL, '2020-01-08 06:40:17', 0),
(7, 1, 3, '02-12-2019', 5, '41, 42', '43', '44', 14, 6, 'In Process', 15, '', '', NULL, 'Uncleared', NULL, NULL, '2019-12-24 06:00:11', 0),
(8, 2, 4, '02-12-2019', 9, '38', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-02 12:20:26', 0),
(9, 2, 4, '02-12-2019', 9, '37, 38', '', '39', 6, 5, 'In Process', NULL, NULL, NULL, NULL, NULL, NULL, 'xsfgsdfgsdfg', '2020-01-08 07:14:52', 0),
(10, 2, 5, '02-12-2019', 9, '37, 38', '', '', 11, 5, 'In Process', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-08 07:12:14', 0),
(11, 1, 6, '03-12-2019', 1, '46', '47', '', 1, 7, 'In Process', 0, '', '', NULL, 'Uncleared', NULL, NULL, '2019-12-24 08:33:02', 0),
(12, 2, 7, '03-12-2019', 9, '37, 38', '', '39', 4, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-24 07:28:41', 0),
(13, 1, 8, '03-12-2019', 5, '41, 42', '', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-28 06:10:45', 0),
(19, 1, 14, '04-12-2019', 7, '42', '44', '43', 1, 3, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-26 09:59:32', 0),
(26, 2, 21, '25-10-2019', 9, '37, 38', '', '39', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-28 06:15:54', 0),
(27, 2, 22, '03-12-2019', 9, '37, 38', '', '39', 4, 6, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-28 06:30:41', 0),
(28, 2, 23, '03-12-2019', 12, '37, 38', '', '', 2, 1, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 07:23:22', 0),
(29, 2, 24, '03-12-2019', 12, '37, 38', '', '40', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 05:06:54', 0),
(30, 1, 25, '03-12-2019', 5, '41, 42', '43', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-28 07:09:23', 0),
(31, 1, 26, '03-12-2019', 13, '46', '', '48', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-28 07:30:50', 0),
(33, 1, 27, '04-12-2019', 7, '41, 42', '', '', 1, 3, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-28 09:13:09', 0),
(34, 1, 28, '04-12-2019', 2, '46', '', '48', 1, 1, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-28 09:15:22', 0),
(35, 1, 29, '04-12-2019', 6, '41, 42', '', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-28 09:32:36', 0),
(36, 1, 30, '04-12-2019', 6, '41, 42', '', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-28 09:37:20', 0),
(37, 1, 31, '04-12-2019', 5, '41, 42', '', '', 4, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-28 10:41:39', 0),
(38, 1, 32, '04-12-2019', 5, '41, 42', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-28 12:08:26', 0),
(39, 1, 33, '04-12-2019', 5, '41, 42', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-28 12:13:33', 0),
(40, 1, 34, '04-12-2019', 2, '46', '', '48', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-28 12:46:21', 0),
(41, 2, 35, '04-12-2019', 12, '37, 38', '', '40', 2, 6, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-28 12:52:17', 0),
(42, 2, 36, '04-12-2019', 12, '37, 38', '', '40', 1, 6, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 04:58:40', 0),
(43, 2, 37, '04-12-2019', 9, '37, 38', '', '', 4, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 05:01:52', 0),
(44, 1, 38, '05-12-2019', 5, '41, 42', '', '44', 1, 1, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 05:06:27', 0),
(45, 1, 39, '08-12-2019', 13, '46', '47', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 05:14:08', 0),
(46, 2, 40, '09-12-2019', 12, '37, 38', '', '40', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 05:17:30', 0),
(47, 2, 41, '09-12-2019', 12, '37, 38', '', '40', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 05:27:01', 0),
(48, 2, 42, '09-12-2019', 12, '37, 38', '', '40', 1, 6, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 05:35:58', 0),
(49, 2, 43, '09-12-2019', 12, '37, 38', '', '40', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 05:43:09', 0),
(50, 1, 44, '09-12-2019', 2, '46', '', '48', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 05:46:55', 0),
(51, 1, 45, '03-12-2019', 2, '46', '', '48', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 05:52:44', 0),
(52, 2, 46, '10-12-2019', 12, '37, 38', '', '', 6, 5, 'In Process', 2, '', '', '55', 'Uncleared', NULL, NULL, '2020-01-02 06:49:28', 0),
(53, 2, 47, '10-12-2019', 9, '37, 38', '', '39', 2, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 05:57:59', 0),
(54, 2, 48, '10-12-2019', 9, '37, 38', '', '39', 4, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 07:16:39', 0),
(55, 2, 49, '10-12-2019', 12, '37, 38', '', '40', 2, 1, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 07:19:08', 0),
(56, 2, 50, '10-12-2019', 12, '37, 38', '', '40', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 08:40:36', 0),
(57, 2, 51, '11-12-2019', 9, '37, 38', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 08:46:14', 0),
(58, 1, 52, '11-12-2019', 5, '41, 42', '', '43', 1, 4, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 08:56:03', 0),
(59, 1, 53, '11-12-2019', 4, '41, 42', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 09:46:09', 0),
(60, 1, 54, '11-12-2019', 5, '41, 42', '43', '', 1, 1, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-30 11:02:56', 0),
(61, 1, 55, '11-12-2019', 5, '41, 42', '43', '', 1, 1, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-31 05:56:14', 0),
(62, 1, 56, '11-12-2019', 5, '41, 42', '43', '', 1, 6, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-31 06:09:13', 0),
(63, 2, 57, '11-12-2019', 9, '37, 38', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-31 06:13:48', 0),
(64, 2, 58, '02-12-2019', 9, '37, 38', '', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-31 06:23:52', 0),
(65, 1, 59, '11-12-2019', 1, '46', '47', '', 14, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-31 06:28:08', 0),
(67, 1, 61, '11-12-2019', 3, '46', '', '48', 2, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-31 07:53:09', 0),
(68, 1, 62, '02-12-2019', 5, '41, 42', '43', '', 4, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-31 07:56:16', 0),
(69, 2, 63, '21-12-2019', 9, '37, 38', '39', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-31 09:44:42', 0),
(70, 1, 64, '23-12-2019', 2, '46', '', '48', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-31 10:51:09', 0),
(71, 2, 65, '23-12-2019', 2, '46', '48', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-31 11:12:33', 0),
(72, 1, 66, '24-12-2019', 2, '46', '48', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-31 12:02:42', 0),
(73, 1, 67, '27-12-2019', 2, '46', '', '48', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2019-12-31 12:18:57', 0),
(75, 2, 69, '20-12-2019', 9, '37, 38', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-01 11:15:46', 0),
(76, 2, 70, '21-12-2019', 9, '37, 38', '', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-01 12:03:29', 0),
(77, 1, 71, '24-12-2019', 13, '46', '48', '', 1, 6, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-01 12:11:25', 0),
(78, 2, 72, '01-01-2020', 9, '37, 38', '', '', 7, 6, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-02 07:45:24', 0),
(79, 2, 73, '24-12-2019', 11, '37, 38', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-02 10:13:13', 0),
(80, 1, 74, '01-01-2020', 7, '41, 42', '50', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-02 11:16:33', 0),
(81, 2, 75, '11-12-2019', 9, '37, 38', '39', '', 1, 6, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 06:37:45', 0),
(82, 1, 76, '11-12-2019', 4, '41, 42', '', '', 1, 1, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 07:22:30', 0),
(83, 1, 77, '11-12-2019', 8, '41, 42', '', '', 14, 6, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 07:32:51', 0),
(84, 2, 78, '12-12-2019', 9, '37, 38', '', '', 2, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 07:36:20', 0),
(85, 1, 79, '12-12-2019', 5, '41, 42', '', '43', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 08:30:57', 0),
(86, 1, 80, '05-12-2019', 4, '41, 42', '', '', 1, 1, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 09:01:34', 0),
(87, 2, 81, '26-11-2019', 9, '37, 38', '', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 09:06:26', 0),
(88, 1, 82, '12-12-2019', 4, '41, 42', '', '', 16, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 09:37:32', 0),
(89, 1, 83, '12-12-2019', 1, '46', '', '47', 7, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 09:44:01', 0),
(90, 1, 84, '12-12-2019', 1, '46', '', '', 14, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 10:07:56', 0),
(91, 2, 85, '12-12-2019', 9, '37, 38', '', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 10:14:05', 0),
(92, 2, 86, '01-01-2020', 9, '37, 38', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 10:21:32', 0),
(93, 2, 87, '31-12-2019', 9, '37, 38', '39', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 11:28:08', 0),
(94, 2, 88, '31-12-2019', 9, '37, 38', '', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 11:34:32', 0),
(95, 2, 89, '31-12-2019', 9, '37, 38', '39', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 11:43:19', 0),
(96, 2, 90, '31-12-2019', 9, '37, 38', '39', '', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 12:01:30', 0),
(97, 1, 91, '02-01-2020', 2, '46', '48', '', 1, 6, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 12:20:15', 0),
(98, 1, 92, '19-12-2019', 5, '41, 42', '50', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 12:47:12', 0),
(99, 1, 93, '19-12-2019', 5, '41, 42', '', '43', 1, 1, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-03 12:55:31', 0),
(100, 2, 94, '28-12-2019', 11, '37, 38', '', '', 1, 6, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 05:36:55', 0),
(101, 2, 95, '24-12-2019', 11, '37, 38', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 05:49:29', 0),
(102, 2, 96, '28-12-2019', 11, '37, 38', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 05:53:10', 0),
(103, 2, 97, '24-12-2019', 11, '37, 38', '', '', 6, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 05:57:33', 0),
(104, 2, 98, '21-12-2019', 11, '37, 38', '', '', 18, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 06:15:43', 0),
(105, 2, 99, '31-12-2019', 11, '37, 38', '', '', 17, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 06:23:59', 0),
(106, 2, 100, '12-12-2019', 9, '37, 38', '', '', 1, 1, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 06:32:12', 0),
(107, 1, 101, '10-12-2019', 8, '41, 42', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 06:36:16', 0),
(108, 1, 102, '10-12-2019', 1, '46', '', '', 1, 6, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 06:39:19', 0),
(109, 2, 103, '13-12-2019', 9, '37, 38', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 06:48:47', 0),
(110, 2, 104, '13-12-2019', 9, '37, 38', '', '', 4, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 07:15:57', 0),
(111, 1, 105, '16-12-2019', 1, '46', '', '', 7, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 07:21:56', 0),
(112, 1, 106, '10-12-2019', 7, '41, 42', '', '', 4, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 07:24:39', 0),
(113, 1, 107, '16-12-2019', 1, '46', '', '', 6, 6, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 07:28:41', 0),
(114, 1, 108, '16-12-2019', 7, '41, 42', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 07:35:31', 0),
(115, 2, 109, '16-12-2019', 9, '37, 38', '39', '', 2, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 07:39:39', 0),
(116, 2, 110, '13-12-2019', 10, '37, 38', '', '', 4, 6, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 07:42:34', 0),
(117, 1, 111, '17-12-2019', 1, '46', '', '47', 1, 9, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 07:48:42', 0),
(118, 1, 112, '17-12-2019', 13, '46', '', '47', 6, 8, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 08:00:11', 0),
(119, 1, 113, '17-12-2019', 2, '46', '48', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 08:05:21', 0),
(120, 1, 114, '17-12-2019', 5, '41, 42', '44', '', 19, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 08:57:16', 0),
(121, 2, 115, '17-12-2019', 9, '37, 38', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 09:17:16', 0),
(122, 1, 116, '17-12-2019', 4, '41, 42', '', '', 1, 1, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 09:42:33', 0),
(123, 1, 117, '17-12-2019', 8, '41, 42', '44', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 09:52:55', 0),
(124, 2, 118, '17-12-2019', 9, '37, 38', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 10:26:52', 0),
(125, 2, 119, '18-12-2019', 9, '37, 38', '', '', 1, 6, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 10:42:48', 0),
(126, 1, 120, '18-12-2019', 1, '46', '', '47', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 10:58:27', 0),
(127, 1, 121, '18-12-2019', 1, '46', '', '47', 1, 7, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 11:16:35', 0),
(128, 1, 122, '18-12-2019', 5, '41, 42', '', '', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 11:21:57', 0),
(129, 1, 123, '18-12-2019', 1, '46', '', '47', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 11:29:05', 0),
(130, 1, 124, '18-12-2019', 1, '46', '', '47', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 12:13:57', 0),
(131, 2, 125, '27-12-2019', 12, '37, 38', '40', '', 20, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 12:21:56', 0),
(132, 1, 126, '19-12-2019', 5, '41, 42', '', '43', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 12:36:41', 0),
(133, 1, 127, '19-12-2019', 5, '41, 42', '', '43', 1, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-06 12:43:34', 0),
(134, 1, 128, '31-12-2019', 5, '41, 42', '', '43', 14, 5, 'In Process', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-07 07:11:59', 0),
(135, 1, 129, '07-01-2020', 1, '46', '', '', 11, 1, 'Open', NULL, NULL, NULL, NULL, 'Uncleared', NULL, NULL, '2020-01-07 08:07:02', 0);

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
(248, 19, 42, 2),
(249, 19, 43, 3),
(250, 19, 44, 4),
(253, 11, 46, 2),
(254, 11, 47, 4),
(257, 7, 41, 2),
(258, 7, 42, 2),
(259, 7, 44, 3),
(260, 7, 43, 4),
(266, 26, 37, 2),
(267, 26, 38, 2),
(268, 26, 39, 3),
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
(363, 41, 40, 3),
(370, 12, 37, 2),
(371, 12, 38, 2),
(372, 12, 39, 3),
(373, 42, 37, 2),
(374, 42, 38, 2),
(375, 42, 40, 3),
(378, 43, 37, 2),
(379, 43, 38, 2),
(383, 44, 41, 2),
(384, 44, 42, 2),
(385, 44, 44, 3),
(386, 29, 37, 2),
(387, 29, 38, 2),
(388, 29, 40, 3),
(391, 45, 46, 2),
(392, 45, 47, 4),
(396, 46, 37, 2),
(397, 46, 38, 2),
(398, 46, 40, 3),
(402, 47, 37, 2),
(403, 47, 38, 2),
(404, 47, 40, 3),
(408, 48, 37, 2),
(409, 48, 38, 2),
(410, 48, 40, 3),
(419, 50, 46, 2),
(420, 50, 48, 3),
(423, 51, 46, 2),
(424, 51, 48, 3),
(434, 53, 37, 2),
(435, 53, 38, 2),
(436, 53, 39, 3),
(452, 54, 37, 2),
(453, 54, 38, 2),
(454, 54, 39, 3),
(458, 55, 37, 2),
(459, 55, 38, 2),
(460, 55, 40, 3),
(464, 56, 37, 2),
(465, 56, 38, 2),
(466, 56, 40, 3),
(467, 49, 37, 2),
(468, 49, 38, 2),
(469, 49, 40, 3),
(472, 57, 37, 2),
(473, 57, 38, 2),
(480, 58, 41, 2),
(481, 58, 42, 2),
(482, 58, 43, 3),
(485, 59, 41, 2),
(486, 59, 42, 2),
(511, 60, 41, 2),
(512, 60, 42, 2),
(513, 60, 43, 4),
(514, 61, 41, 2),
(515, 61, 42, 2),
(516, 61, 43, 4),
(520, 62, 41, 2),
(521, 62, 42, 2),
(522, 62, 43, 4),
(525, 63, 37, 2),
(526, 63, 38, 2),
(529, 64, 37, 2),
(530, 64, 38, 2),
(533, 65, 46, 2),
(534, 65, 47, 4),
(547, 67, 46, 2),
(548, 67, 48, 3),
(552, 68, 41, 2),
(553, 68, 42, 2),
(554, 68, 43, 4),
(572, 69, 37, 2),
(573, 69, 38, 2),
(574, 69, 39, 4),
(577, 70, 46, 2),
(578, 70, 48, 3),
(590, 71, 46, 2),
(591, 71, 48, 4),
(598, 72, 46, 2),
(599, 72, 48, 4),
(602, 73, 46, 2),
(603, 73, 48, 3),
(607, 9, 37, 2),
(608, 9, 38, 2),
(609, 9, 39, 3),
(623, 75, 37, 2),
(624, 75, 38, 2),
(629, 76, 37, 2),
(630, 76, 38, 2),
(636, 77, 46, 2),
(637, 77, 48, 4),
(638, 52, 37, 2),
(639, 52, 38, 2),
(646, 78, 37, 2),
(647, 78, 38, 2),
(666, 80, 41, 2),
(667, 80, 42, 2),
(668, 80, 50, 4),
(671, 13, 41, 2),
(672, 13, 42, 2),
(673, 10, 37, 2),
(674, 10, 38, 2),
(675, 8, 38, 2),
(679, 81, 37, 2),
(680, 81, 38, 2),
(681, 81, 39, 4),
(686, 82, 41, 2),
(687, 82, 42, 2),
(690, 83, 41, 2),
(691, 83, 42, 2),
(694, 84, 37, 2),
(695, 84, 38, 2),
(701, 85, 41, 2),
(702, 85, 42, 2),
(703, 85, 43, 3),
(706, 86, 41, 2),
(707, 86, 42, 2),
(710, 87, 37, 2),
(711, 87, 38, 2),
(714, 88, 41, 2),
(715, 88, 42, 2),
(724, 89, 46, 2),
(725, 89, 47, 3),
(728, 90, 46, 2),
(731, 91, 37, 2),
(732, 91, 38, 2),
(735, 92, 37, 2),
(736, 92, 38, 2),
(749, 93, 37, 2),
(750, 93, 38, 2),
(751, 93, 39, 4),
(755, 94, 37, 2),
(756, 94, 38, 2),
(760, 95, 37, 2),
(761, 95, 38, 2),
(762, 95, 39, 4),
(769, 96, 37, 2),
(770, 96, 38, 2),
(771, 96, 39, 4),
(776, 97, 46, 2),
(777, 97, 48, 4),
(781, 98, 41, 2),
(782, 98, 42, 2),
(783, 98, 50, 4),
(787, 99, 41, 2),
(788, 99, 42, 2),
(789, 99, 43, 3),
(792, 100, 37, 2),
(793, 100, 38, 2),
(798, 79, 37, 2),
(799, 79, 38, 2),
(800, 101, 37, 2),
(801, 101, 38, 2),
(804, 102, 37, 2),
(805, 102, 38, 2),
(808, 103, 37, 2),
(809, 103, 38, 2),
(812, 104, 37, 2),
(813, 104, 38, 2),
(816, 105, 37, 2),
(817, 105, 38, 2),
(820, 106, 37, 2),
(821, 106, 38, 2),
(824, 107, 41, 2),
(825, 107, 42, 2),
(827, 108, 46, 2),
(830, 109, 37, 2),
(831, 109, 38, 2),
(834, 110, 37, 2),
(835, 110, 38, 2),
(838, 111, 46, 2),
(842, 28, 37, 2),
(843, 28, 38, 2),
(844, 112, 41, 2),
(845, 112, 42, 2),
(847, 113, 46, 2),
(850, 114, 41, 2),
(851, 114, 42, 2),
(854, 115, 37, 2),
(855, 115, 38, 2),
(856, 115, 39, 4),
(859, 116, 37, 2),
(860, 116, 38, 2),
(863, 117, 46, 2),
(864, 117, 47, 3),
(873, 119, 46, 2),
(874, 119, 48, 4),
(878, 120, 41, 2),
(879, 120, 42, 2),
(880, 120, 44, 4),
(883, 121, 37, 2),
(884, 121, 38, 2),
(887, 122, 41, 2),
(888, 122, 42, 2),
(895, 123, 41, 2),
(896, 123, 42, 2),
(897, 123, 44, 4),
(900, 124, 37, 2),
(901, 124, 38, 2),
(904, 125, 37, 2),
(905, 125, 38, 2),
(908, 126, 46, 2),
(909, 126, 47, 3),
(912, 127, 46, 2),
(913, 127, 47, 3),
(916, 128, 41, 2),
(917, 128, 42, 2),
(920, 129, 46, 2),
(921, 129, 47, 3),
(924, 130, 46, 2),
(925, 130, 47, 3),
(929, 131, 37, 2),
(930, 131, 38, 2),
(931, 131, 40, 4),
(935, 132, 41, 2),
(936, 132, 42, 2),
(937, 132, 43, 3),
(947, 133, 41, 2),
(948, 133, 42, 2),
(949, 133, 43, 3),
(956, 134, 41, 2),
(957, 134, 42, 2),
(958, 134, 43, 3),
(959, 118, 46, 2),
(960, 118, 47, 3),
(961, 135, 46, 2),
(968, 5, 42, 2),
(969, 5, 41, 2),
(970, 5, 45, 3);

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
(2, 28, 'shubh developers ', '-shubh developers ', 'near blind school, kargaon road chalisgaon dist jalgaon-424101', 'near blind school, kargaon road chalisgaon dist jalgaon-424101', 'bharat suklal chaudhari ', 'India', 'Artistic', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'no', '', '', 0),
(3, 41, 'indosia ', 'Indosia Pharmaceuticals  pvt ltd ', '1678-2, joshi peth jalgaon - 425001', '1678-2, joshi peth jalgaon - 425001', 'Shaikh Asif Shaikh Jalal , Shaikh Farid Shaikh Hamid', 'Shaikh Asif Shaikh Jalal', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'yes', '', '', 0),
(4, 53, 'Gk', 'G.K.Pharmacitical', 'A.O 33,Jay Nager, Aurangabad 431005', 'A.O 33,Jay Nager, Aurangabad 431005', 'Mr. Govind Sharma', 'India', 'Artistic', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'yes', '', '', 0),
(5, 55, 'Tulsi ', 'Tulsi jelly sweets ', 'D-29,midc area ,jalgaon -425003', 'D-29,midc area ,jalgaon -425003', 'ashutosh chudaman patil ', 'India', 'Artistic', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'yes', '', '', 0),
(6, 67, ' Robin Ribbon', ' Robin Ribbon', 'D- 3/2249A, Salbatpura  Surat 395003', 'D- 3/2249A, Salbatpura  Surat 395003', 'Mr. Pravinchandra Gaiwala', 'India', 'Artistic', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'no', '', '', 0),
(7, 84, ' 1. Samanya Vidnyan 2.Bharatiya Sanvidhan Va Rajakiya Vyavastha 3. Bharatiya Arthavyavastha', 'Spandan Publication', 'N-7 , A - 4 / 03 ( Sample House ) , Greaves Colony , Cidco , Aurangabad - 431001', 'N-7 , A - 4 / 03 ( Sample House ) , Greaves Colony , Cidco , Aurangabad - 431001', ' Dr. Anil Patil', 'India', '', 'Literacy', '', '', '', '', '', '', '', '', 35, '', '', '', '', 'yes', '', '', 0),
(8, 115, 'Ambrita Masale', 'Ambrita Masale', 'New Nandanwan Colony,near Chandmari Masjid Aurangabad 431001', 'New Nandanwan Colony,near Chandmari Masjid Aurangabad 431001', ' Sayed Chand SayyedC', 'India', 'Artistic', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 'yes', '', '', 0);

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
(42, 52, 'SDF', '', 0, '2019-12-30 06:01:33'),
(43, 52, 'LEGAL FORM', '', 0, '2019-12-30 06:01:33'),
(44, 52, 'COUNTER STATEMENT COPY', '', 0, '2019-12-30 06:01:33'),
(45, 52, 'EVIDENCES (IF NOT RECEIVED IN 2 MONTHS THEN FILE WITHDRAW LETTER  ', '', 0, '2019-12-30 06:01:33'),
(46, 52, 'REG-AD COPY OF OPPONENT ', '', 0, '2019-12-30 06:01:33'),
(47, 52, 'EVIDENCES OF APPLICANT IN FORMAT OF AFFIDAVIT', '', 0, '2019-12-30 06:01:33'),
(48, 52, 'CA AUTHORIZED STATEMENT COPY', '', 0, '2019-12-30 06:01:33'),
(49, 52, 'REMAINDER FOR 15 DAYS', '', 0, '2019-12-30 06:01:33'),
(50, 52, 'FINAL STATUS COPY', '', 0, '2019-12-30 06:01:33'),
(78, 113, 'SDF', '', 0, '2020-01-07 08:01:23'),
(79, 113, 'LEGAL FORM', '', 0, '2020-01-07 08:01:23'),
(80, 113, 'COUNTER STATEMENT COPY', 'doc_113_3_1578384083.docx', 1, '2020-01-07 08:01:23'),
(81, 113, 'EVIDENCES (IF NOT RECEIVED IN 2 MONTHS THEN FILE WITHDRAW LETTER  ', '', 0, '2020-01-07 08:01:23'),
(82, 113, 'REG-AD COPY OF OPPONENT ', '', 0, '2020-01-07 08:01:23'),
(83, 113, 'EVIDENCES OF APPLICANT IN FORMAT OF AFFIDAVIT', '', 0, '2020-01-07 08:01:23'),
(84, 113, 'CA AUTHORIZED STATEMENT COPY', '', 0, '2020-01-07 08:01:23'),
(85, 113, 'REMAINDER FOR 15 DAYS', '', 0, '2020-01-07 08:01:23'),
(86, 113, 'FINAL STATUS COPY', '', 0, '2020-01-07 08:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `law_invoice`
--

CREATE TABLE `law_invoice` (
  `invoice_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `branch_id` bigint(20) NOT NULL,
  `application_id` bigint(20) DEFAULT NULL,
  `invoice_no` varchar(100) DEFAULT NULL,
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
(5, 2, 9, 78, 'PUN/20/JAN/01', '01-01-2020', 'Aldrin Pharma Pvt. Ltd.', 'Banglow No. 3, Pipeline Road, Ashtvinayak Park, Sawedi, Savedi Road,Nagar, Ahmednagar, Maharashtra- 414003.', '27', '', '01-01-2020', 15500, 0, 2790, 0, 18290, 0, 18290, 'active', 53, '2020-01-02 07:58:50'),
(7, 2, 5, 13, 'OT/DEC19/58', '01-01-2020', 'BELANKE UDYOG SAMUHA', 'survey no.252,vakhar bhag,miraj,Dist Sangli 416410', '27', '', '01-01-2020', 5000, 0, 900, 0, 0, 0, 11800, 'active', 53, '2020-01-02 11:44:04'),
(8, 2, 5, 13, 'OT/DEC19/58', '01-01-2020', 'BELANKE UDYOG SAMUHA', 'survey no.252,vakhar bhag,miraj,Dist Sangli 416410', '27', '', '01-01-2020', 5000, 0, 1800, 0, 0, 6800, 6800, 'active', 53, '2020-01-02 12:19:26'),
(9, 2, 9, 8, 'PUN/19/DEC/50', '02-01-2020', 'SAIRAJ MILK AND MILK PRODUCTS ', 'Gut No. 54/1, AP – Cholkewadi, Astgaon, Tal. Rahata', '27', '', '01-01-2020', 18000, 18000, 3240, 1800, 0, 0, 37740, 'active', 53, '2020-01-02 12:32:25'),
(10, 2, 12, 131, 'PUN/20/JAN/04', '01-01-2020', 'Samo Pharmaceuticals ', 'A 216 , Paresh Complex ,Kalher ,Bhiwandi, Thane-421302.', '27', '', '01-01-2020', 5000, 0, 900, 0, 0, 0, 5900, 'active', 53, '2020-01-06 12:25:05');

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
(6, 5, 'TMO COUNTER REPLY\r\nAPP.NO.3538177\r\nBRAND NAME:LUCANDERM', 18, 2790, '998213', 1, 1, 15500, 15500, '2020-01-02 08:00:32'),
(8, 7, 'TMA', 18, 900, '998213', 2, 4500, 5000, 5000, '2020-01-02 12:09:05'),
(9, 7, 'ISO', 18, 900, '998213', 1, 1, 5000, 5000, '2020-01-02 12:09:05'),
(10, 8, 'TMA', 18, 900, '998213', 1, 1, 5000, 5000, '2020-01-02 12:19:26'),
(11, 9, 'TMR', 18, 1440, '998213', 2, 18000, 4000, 8000, '2020-01-02 12:51:14'),
(13, 9, 'Copyright', 18, 1800, '998213', 1, 0, 10000, 10000, '2020-01-02 12:53:37'),
(14, 10, 'TM-REVIEW', 18, 900, '998213', 1, 0, 5000, 5000, '2020-01-06 12:25:05');

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
(0, 52, '', 'leg_52_1_1577686784.pdf', '57', '2019-12-30 06:19:44'),
(0, 66, '', 'leg_66_1_1577782276.docx', '57', '2019-12-31 08:51:16');

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
(6, 37, 'M/S PRASHANT AGRO SERVICES', 'KAMALKUNJ APARTMENT ,FLAT NO.8, 6 TH LANE ,RAJARAMPURI,', 'KAMALKUNJ APARTMENT ,FLAT NO.8, 6 TH LANE ,RAJARAMPURI,', 99850625430, ' peasantagroservices@gmail.com', 'ISO 9001 - 2015 ', '', '30-11-19', '', 0, '2019-12-28 10:41:39'),
(7, 43, 'SHIVSHAKTI CARGO INDIA LOGISTICS', 'Plot no. D-43 ,  Kamgar Chowk ,MIDC Area , Waluj , Aurangabad - 431136', 'Plot no. D-43 ,  Kamgar Chowk ,MIDC Area , Waluj , Aurangabad - 431136', 9890021932, 'shivshakticargoindialogistics@gmail.com', ' ISO 9001: 2015 Qms.', '', '30-12-2019', '', 0, '2019-12-30 05:01:52'),
(8, 52, ' hewan Pharmaceuticals ', '  plot no .76-gut no 53,kusumanjali -shiv colony-jalgaon-425001', '  plot no .76-gut no 53,kusumanjali -shiv colony-jalgaon-425001', 9370863866, 'Hewanpharmaceuticals@gmail.com ', 'counter reply', '', '', '', 0, '2019-12-30 05:55:40'),
(9, 54, 'Vidyaprabodhini Saprdha Pariksha Kendra', '01 Shivshakti Nivas Canol Road Patanjali Chitsalayavarti Nager Naka Beed 431122', '01 Shivshakti Nivas Canol Road Patanjali Chitsalayavarti Nager Naka Beed 431122', 9822621603, 'magersir@gmail.com', 'ISO 9001: 2015 Qms.', '', '', '', 0, '2019-12-30 07:16:39'),
(10, 65, 'Saheli Creation', 'PUNE', 'PUNE', 9823057209, 'a@gmail.com', ' TM R of application number 1402804', '', '11-12-2019', '', 0, '2019-12-31 06:28:08'),
(12, 68, 'Antarbharati shikshan mandal kolhapur', '528/B shahupuri vyapar peth,kolhapur 416001', '528/B shahupuri vyapar peth,kolhapur 416001', 9422741695, 'bharatjain1008@gmail.com', 'ISO 9001:2015', '', '', '', 0, '2019-12-31 07:56:16'),
(14, 78, 'Aldrin Pharma Pvt. Ltd.', 'Banglow No. 3, Pipeline Road, Ashtvinayak Park, Sawedi, Savedi Road,Nagar, Ahmednagar, Maharashtra- 414003.', 'Banglow No. 3, Pipeline Road, Ashtvinayak Park, Sawedi, Savedi Road,Nagar, Ahmednagar, Maharashtra- 414003.', 9922403825, 'vasant.gawate1978@gmail.com', 'counter Reply', '', '01-01-2020', '', 0, '2020-01-02 07:55:16'),
(15, 83, 'Vwinn Corporate Solutions Pvt.Ltd', 'Bangalore, Karnataka', 'Bangalore, Karnataka', 8041732777, ' jacobperez@vwinn.com', 'Trademark Renewal', '', '', 'Karnataka', 0, '2020-01-03 07:32:51'),
(16, 88, 'Shrusti Envirocare', 'Goa.', 'Goa.', 9158133555, 'shrushtienvirocare_ipl@yahoo.com', 'TM M for change in Trademark class from 35 to 42.', 'Application No.4233996/ 4233997', '03-01-2020', '', 0, '2020-01-03 09:37:32'),
(17, 89, 'Saheli Creation', ' Laxmi Road Pune', ' Laxmi Road Pune', 9823057209, ' a@gmail.com', 'TM-O', '', '', '', 0, '2020-01-03 09:47:15'),
(18, 90, 'T4 Academy', 'PUNE', 'PUNE', 919881998883, 't4academy@gmail.com', 'TM- R ', 'TM R documents of 2009154', '', '', 0, '2020-01-03 10:07:56'),
(19, 103, 'Royal Industries', ' Gat. No. 1391,Akluj,velapur rd,velapur,Tal. Malshiras,Dist. - Solapur-413113', ' Gat. No. 1391,Akluj,velapur rd,velapur,Tal. Malshiras,Dist. - Solapur-413113', 9822144004, 'royalind03@gmail.com', 'counter reply', '  3946311   tmo', '', '', 0, '2020-01-06 05:57:33'),
(20, 104, 'Tulsi Garments', 'Solapur.', 'Solapur.', 9423589626, '', '', '', '', '', 0, '2020-01-06 06:15:43'),
(21, 105, 'Miracle', 'Solapur', 'Solapur', 1, '', '', '', '', '', 0, '2020-01-06 06:23:59'),
(22, 110, 'Saikrupa Hospital', 'Beside Disha Nagari , Behind Master Cook Hotel , Opp. Hotel Nishant Park , Beed Bypass , Aurangabad 431005', 'Beside Disha Nagari , Behind Master Cook Hotel , Opp. Hotel Nishant Park , Beed Bypass , Aurangabad 431005', 9325206991, 'atul.shende70@gmail.com', 'ISO ', '', '', '', 0, '2020-01-06 07:15:57'),
(23, 111, 'Shree Ganesh Dal And Besan Mill    ', 'Survey No.166,A/P.Shirwal,Tal-Kahandala,Dist.-Satara412301.    ', 'Survey No.166,A/P.Shirwal,Tal-Kahandala,Dist.-Satara412301.    ', 9822911026, 'anupshah84@gmail.com    ', ' Opposition', '', '', '', 0, '2020-01-06 07:21:56'),
(24, 112, ' RISE INSTITUTE', 'Swarada Apartments, Near Willingdon college, Jaihind Colony, Vishrambag, Sangli 416416', 'Swarada Apartments, Near Willingdon college, Jaihind Colony, Vishrambag, Sangli 416416', 8055966696, 'manoraj.chavan@gmail.com', 'ISO 9001:2015', '', '', '', 0, '2020-01-06 07:24:39'),
(25, 113, ' Sanghvi Beauty & Technologies Pvt. Ltd.  ', ' Sanghvi House, 105/2, Shivaji Nagar, Pune-411005.  ', ' Sanghvi House, 105/2, Shivaji Nagar, Pune-411005.  ', 8779682286, 'chhaya.jogadia@myglamm.com', 'Counter Statement', 'A. MyGlamm Total Makeover\r\nB. My Glamm', '', '', 0, '2020-01-06 07:28:41'),
(26, 116, 'TS Agri World Organic Pvt. Ltd', '2095, Tamboli Tower, First Impression, Nalband Khunt, Karsetji Road , *Ahmednagar* - 414001 (M.S.)', '2095, Tamboli Tower, First Impression, Nalband Khunt, Karsetji Road , *Ahmednagar* - 414001 (M.S.)', 9422220372, 'tsagriworld@gmail.com', 'ISO 9001 : 2015 Qms', '', '', '', 0, '2020-01-06 07:42:34'),
(27, 118, 'Arvind Education Society', 'Sangvi Pune', 'Sangvi Pune', 9860001515, 'pranavrao@virtuecorp.in', 'Counter Statement', 'Arvind Education Society- 2 Counter Reply', '', '', 0, '2020-01-06 08:00:11'),
(28, 120, 'All INDIA SPECIAL BHEL', '355\'B\',Mangalwar peth,Mali bavg Talim,near gurumaharaj wada Kolhapur-416510.', '355\'B\',Mangalwar peth,Mali bavg Talim,near gurumaharaj wada Kolhapur-416510.', 9823205305, '', 'TMO EVIDENCE', '', '', '', 0, '2020-01-06 08:57:16'),
(29, 131, 'samo Pharmaceuticals ', 'A 216 , Paresh Complex ,Kalher ,Bhiwandi, Thane-421302.', 'A 216 , Paresh Complex ,Kalher ,Bhiwandi, Thane-421302.', 9421244336, 'samopharmaceuticals@ gmail.com', 'TM Review', '', '', '', 0, '2020-01-06 12:21:56'),
(30, 134, 'MAHENDRA JEWELLERS.', '1809,\"E\"ward,3rd lane ,main Road , Rajarampuri Kolhapur-416008.', '1809,\"E\"ward,3rd lane ,main Road , Rajarampuri Kolhapur-416008', 9423042551, 'mjr_kop@yahoo.co.in', 'Trademark Renewal', 'TM RENEWAL-1913592', '', '', 0, '2020-01-07 07:11:59'),
(31, 135, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-01-07 08:07:02');

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
(5, 5, 8000, 0, 8000, 8000, 0, 'NA', 3500, 4500, 0, 0, 'By Cash', '', '', '', '', 0, 'NA', '07-01-2020', 1, 0),
(6, 6, 9000, 1530, 10030, 10030, 4500, '27AFYPB3975Q1ZD', 4500, 4500, 0, 0, '', 'By Cheque', '042607', '02-12-2019', 'IDBI BANK', 10030, 'NA', '28-12-2019', 1, 0),
(7, 7, 23400, 1440, 24840, 24840, 0, '27AAACG6595R1ZP', 8000, 18000, 2600, 0, '', 'By Cheque', '320486', '16-11-2019', 'UNION BANK', 24840, 'NA', '28-12-2019', 1, 0),
(8, 8, 23000, 4140, 27140, 27140, 0, '27AFNPC2337Q1Z7', 14000, 9000, 0, 0, '', 'By Cheque', 'NEFT', '04-12-2019', 'NA', 27140, 'NA', '02-01-2020', 1, 0),
(9, 9, 13500, 2430, 15930, 15930, 15930, '27AYPM1299D1ZP', 10800, 2700, 0, 0, '', 'By Cheque', '0', '26-11-2019', 'Bombay Marchant', 15930, 'NA', '31-12-2019', 1, 0),
(10, 10, 5000, 0, 5000, 5000, 0, 'NA', 0, 0, 0, 0, 'By Cash', '', '0', '', '0', 5000, '', '02-01-2020', 1, 0),
(11, 11, 8500, 0, 8500, 0, 8500, 'NA', 4000, 4500, 0, 0, 'By Cash', '', '0', '03-12-2019', '0', 0, 'NIL', '27-12-2019', 1, 0),
(12, 12, 18644, 3356, 22000, 22000, 0, '27BAPK7480B1ZS', 15000, 3644, 0, 0, 'By Cash', 'By Cheque', 'NEFT', '', '0', 15000, 'NA', '28-12-2019', 1, 0),
(13, 13, 10000, 1800, 11800, 0, 11800, 'NA', 0, 0, 0, 0, 'By Cash', '', '', '', '', 0, '', '02-01-2020', 1, 0),
(19, 19, 10500, 0, 10500, 0, 10500, 'NA', 6000, 4500, 0, 0, 'By Cash', '', '0', '', '0', 0, 'NA', '27-12-2019', 1, 0),
(26, 26, 11500, 2070, 13570, 13570, 0, 'NA', 0, 0, 0, 0, '', 'By Cheque', '000157', '25-10-19', 'Hdfc ', 13570, '', '28-12-2019', 1, 0),
(27, 27, 19000, 3420, 22420, 15000, 7420, '27AABCE0576D1ZW', 0, 0, 0, 0, '', 'By Cheque', 'NEFT', '', '*', 15000, '', '28-12-2019', 1, 0),
(28, 28, 22000, 3960, 25960, 25960, 0, 'NA', 0, 0, 0, 0, '', 'By Cheque', 'NEFT', '', '', 25960, '', '06-01-2020', 1, 0),
(29, 29, 10000, 1800, 11800, 6490, 5310, '27AAFCI0840L1ZI', 0, 0, 0, 0, '', 'By Cheque', 'NEFT', '', '*', 6490, '', '30-12-2019', 1, 0),
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
(41, 41, 22000, 3960, 25960, 0, 25960, 'PENDING', 0, 0, 0, 0, '', '', '', '', '', 0, '', '28-12-2019', 1, 0),
(42, 42, 10000, 1800, 11800, 6490, 5310, '27AAFCI0840L1ZI', 0, 0, 0, 0, '', 'By Cheque', 'NEFT', '', '', 5310, 'NA', '30-12-2019', 1, 0),
(43, 43, 10000, 1800, 11800, 8850, 2950, '27AAPPW797B1ZU', 0, 0, 0, 0, '', 'By Cheque', '4169', '', 'ICICI', 8850, '', '30-12-2019', 1, 0),
(44, 44, 4500, 180, 5680, 5680, 0, '27AAEFD6433E1Z0', 0, 0, 0, 0, '', 'By Cheque', '140618', '', 'Bank of india', 5680, '', '30-12-2019', 1, 0),
(45, 45, 8500, 0, 8500, 0, 8500, 'NA', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 0, '', '30-12-2019', 1, 0),
(46, 46, 33000, 0, 33000, 0, 33000, 'NA', 0, 0, 0, 0, 'By Cash', '', '', '', '', 0, 'NA', '30-12-2019', 1, 0),
(47, 47, 22000, 3960, 25960, 0, 25960, '27AAVPF8811D1ZK', 0, 0, 0, 0, '', '', '', '', '', 0, '', '30-12-2019', 1, 0),
(48, 48, 23000, 4140, 27140, 27140, 0, '27AADCF2741H1ZS', 0, 0, 0, 0, '', 'By Cheque', '0', '', '0', 27140, '', '30-12-2019', 1, 0),
(49, 49, 20000, 0, 20000, 0, 0, 'NA', 0, 0, 0, 0, '', '', '', '', '', 0, '', '30-12-2019', 1, 0),
(50, 50, 11500, 0, 11500, 11500, 0, 'NA', 0, 0, 0, 0, 'By Cash', '', '', '', '', 11500, 'NA', '30-12-2019', 1, 0),
(51, 51, 8500, 1530, 10030, 0, 10030, '27BGUPP3879B1ZS', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 10030, '', '30-12-2019', 1, 0),
(52, 52, 18000, 0, 18000, 18000, 0, '0', 0, 0, 0, 0, '', 'By Cheque', 'NEFT', '', '', 0, '', '02-01-2020', 1, 0),
(53, 53, 17000, 3060, 20060, 20060, 0, '0', 0, 0, 0, 0, '', 'By Cheque', 'NEFT', '', '', 0, '', '30-12-2019', 1, 0),
(54, 54, 10000, 0, 10000, 7000, 3000, '0', 0, 0, 0, 0, 'By Cash', '', '', '', '', 0, '', '30-12-2019', 1, 0),
(55, 55, 22000, 3960, 25960, 25960, 0, '27AGMPP5927H1ZW', 0, 0, 0, 0, '', '', '', '', '', 0, '', '30-12-2019', 1, 0),
(56, 56, 11500, 2070, 13570, 0, 13570, '27AGMPP5927H1ZW', 0, 0, 0, 0, '', '', '', '', '', 0, '', '30-12-2019', 1, 0),
(57, 57, 23000, 4140, 27140, 16520, 10620, 'NA', 0, 0, 0, 0, '', 'By Cheque', '5', '', 'kotak Mahindra', 16520, '', '30-12-2019', 1, 0),
(58, 58, 10000, 1800, 11800, 11800, 0, '27AAWFP1830B1Z9', 0, 0, 0, 0, '', 'By Cheque', 'NEFT', '', '', 11800, 'NA', '30-12-2019', 1, 0),
(59, 59, 7000, 0, 7000, 0, 7000, 'NA', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 0, 'NA', '30-12-2019', 1, 0),
(60, 60, 18000, 3240, 21240, 0, 21240, '27ADXPS7932D1ZV', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 0, '', '31-12-2019', 1, 0),
(61, 61, 18000, 3240, 21240, 0, 21240, '27ADXPS7932D1ZV', 0, 0, 0, 0, '', '', '', '', '', 0, '', '31-12-2019', 1, 0),
(62, 62, 18000, 3240, 21240, 0, 21240, '27DXPS7932D1ZV', 0, 0, 0, 0, '', '', '', '', '', 0, '', '31-12-2019', 1, 0),
(63, 63, 23000, 4140, 27140, 27140, 0, 'NA', 0, 0, 0, 0, '', 'By Cheque', '202975', '', 'Sarswat bank', 27140, 'NA', '31-12-2019', 1, 0),
(64, 64, 16000, 2880, 18880, 0, 18880, '', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 0, '', '31-12-2019', 1, 0),
(65, 65, 25000, 0, 25000, 18000, 7000, '0', 0, 0, 0, 0, 'By Cash', '', '', '', '', 18000, 'NA', '31-12-2019', 1, 0),
(67, 67, 16000, 2880, 18880, 0, 18880, 'PENDING', 0, 0, 0, 0, '', '', '', '', '', 0, '', '31-12-2019', 1, 0),
(68, 68, 9500, 1710, 11210, 5900, 5310, 'PENDING', 0, 0, 0, 0, '', '', '', '', '', 5310, '', '31-12-2019', 1, 0),
(69, 69, 10000, 0, 10000, 5000, 5000, 'NA', 0, 0, 0, 0, 'By Cash', '', '', '', '', 5000, '', '31-12-2019', 1, 0),
(70, 70, 8000, 1880, 9440, 0, 9440, '27AEAPA3456Q1ZU', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 0, '', '31-12-2019', 1, 0),
(71, 71, 9000, 1620, 10620, 10620, 0, '27ABCFM8155H1Z2', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 10620, '', '31-12-2019', 1, 0),
(72, 72, 7000, 1260, 8260, 8260, 0, '27AAVPM4111F1ZO', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 8260, 'NA', '31-12-2019', 1, 0),
(73, 73, 9000, 0, 9000, 500, 8500, 'NA', 0, 0, 0, 0, 'By Cash', '', '', '', '', 500, '', '31-12-2019', 1, 0),
(75, 75, 11500, 2070, 13570, 8260, 5310, 'NA', 0, 0, 0, 0, 'By Cash', '', '', '', '', 8260, '', '01-01-2020', 1, 0),
(76, 5, NULL, 900, NULL, 5000, 0, NULL, 0, 0, 0, 0, '', 'By Cheque', '', '', '', 5900, NULL, '01-01-2020', 0, 0),
(77, 76, 10000, 1800, 11800, 11800, 0, '27AVWPN0126F1ZG', 0, 0, 0, 0, '', 'By Cheque', '47', '', 'Bandhan Bank', 11800, '', '01-01-2020', 1, 0),
(78, 77, 11500, 2070, 13570, 0, 13570, '27AABCD9756G1ZD', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 0, '', '01-01-2020', 1, 0),
(79, 78, 15500, 2790, 18290, 18290, 0, '27AAPCA4289B1Z1', 12800, 2700, 0, 0, '', 'By Cheque', 'NEFT', '', '', 18290, 'NA', '02-01-2020', 1, 0),
(80, 79, 10000, 0, 10000, 10000, 0, 'NA', 5500, 4500, 0, 0, 'By Cash', '', '', '', '', 10000, '', '06-01-2020', 1, 0),
(81, 80, 8000, 0, 8000, 4000, 4000, 'NA', 0, 0, 0, 0, 'By Cash', '', '', '', '', 4000, 'NA', '02-01-2020', 1, 0),
(82, 81, 11500, 2070, 13570, 0, 13570, '27AA2CS3557N128', 0, 0, 0, 0, '', 'By Cheque', 'NEFT', '', '', 0, 'NA', '03-01-2020', 1, 0),
(83, 82, 56000, 4410, 60410, 0, 60410, '30AAJFK3086F1ZK', 0, 0, 0, 0, '', '', '', '', '', 0, '', '03-01-2020', 1, 0),
(84, 83, 22000, 720, 22720, 0, 22720, '29AACCV4500D1Z0', 0, 0, 0, 0, '', '', '', '', '', 0, '', '03-01-2020', 1, 0),
(85, 84, 30000, 0, 30000, 15000, 15000, 'NA', 0, 0, 0, 0, '', '', '', '', '', 0, '', '03-01-2020', 1, 0),
(86, 85, 9500, 1710, 11210, 11210, 0, '27AAAF10140F1Z1', 0, 0, 0, 0, '', 'By Cheque', 'NEFT', '', '', 11210, '', '03-01-2020', 1, 0),
(87, 86, 10000, 0, 10000, 10000, 0, 'NA', 0, 0, 0, 0, '', '', '', '', '', 0, 'NA', '03-01-2020', 1, 0),
(88, 87, 11440, 2060, 13500, 13500, 0, '27AACFK7237R1ZO', 0, 0, 0, 0, '', 'By Cheque', '26591', '', 'Federal Bank', 13500, '', '03-01-2020', 1, 0),
(89, 88, 5000, 900, 5900, 0, 5900, 'NA', 0, 0, 0, 0, '', '', '', '', '', 0, '', '03-01-2020', 1, 0),
(90, 89, 15000, 0, 15000, 15000, 0, 'NA', 0, 0, 0, 0, '', '', '', '', '', 15000, '', '03-01-2020', 1, 0),
(91, 90, 14000, 2520, 16520, 0, 16520, 'PENDING', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 0, '', '03-01-2020', 1, 0),
(92, 91, 11500, 2070, 13570, 7000, 6570, 'PENDING', 0, 0, 0, 0, '', 'By Cheque', '83105', '', 'Alahabad Bank', 7000, 'NA', '03-01-2020', 1, 0),
(93, 92, 10000, 0, 10000, 5000, 5000, 'NA', 0, 0, 0, 0, 'By Cash', '', '', '', '', 5000, 'NA', '03-01-2020', 1, 0),
(94, 93, 40000, 7200, 47200, 25000, 22200, 'PENDING', 0, 0, 0, 0, '', '', '', '', '', 25000, 'NA', '03-01-2020', 1, 0),
(95, 94, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0, '', '', '', '', '', 0, '', '03-01-2020', 1, 0),
(96, 95, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0, '', '', '', '', '', 0, '', '03-01-2020', 1, 0),
(97, 96, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0, '', '', '', '', '', 0, '', '03-01-2020', 1, 0),
(98, 97, 11500, 2070, 13570, 0, 13570, 'NA', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 0, 'NA', '03-01-2020', 1, 0),
(99, 98, 10000, 0, 10000, 2000, 8000, 'NA', 0, 0, 0, 0, 'By Cash', '', '', '', '', 2000, '', '03-01-2020', 1, 0),
(100, 99, 8000, 1440, 9440, 0, 9440, 'NA', 0, 0, 0, 0, '', '', '', '', '', 0, '', '03-01-2020', 1, 0),
(101, 100, 22500, 4050, 26550, 24570, 0, '27AABCI1700R1ZH', 15300, 2700, 1980, 0, '', 'By Cheque', '', '', '', 24570, '', '06-01-2020', 1, 0),
(102, 101, 17000, 3060, 20060, 20060, 0, '27ANGPP7988K1ZZ', 8000, 9000, 0, 0, '', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(103, 102, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 0, '', '06-01-2020', 1, 0),
(104, 103, 14000, 2520, 16520, 16520, 0, '0', 11300, 2700, 0, 0, '', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(105, 104, 1500, 270, 1770, 1770, 0, '', 1500, 0, 0, 0, '', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(106, 105, 2000, 360, 2360, 2360, 0, '0', 2000, 0, 0, 0, '', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(107, 106, 11500, 0, 11500, 6000, 5500, 'NA', 0, 0, 0, 0, '', 'By Cheque', '54003', '', 'Allahabad Bank', 6000, '', '06-01-2020', 1, 0),
(108, 107, 8051, 1449, 9500, 9500, 0, '29BFEPK0554B1ZT', 0, 0, 0, 0, '', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(109, 108, 14000, 900, 14900, 0, 14900, '27AAWCS1087Q1Z8', 0, 0, 0, 0, '', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(110, 109, 8000, 0, 8000, 8000, 0, 'NA', 0, 0, 0, 0, 'By Cash', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(111, 110, 10000, 1800, 11800, 11800, 0, 'NA', 0, 0, 0, 0, '', '', '202975', '', '', 11800, '', '06-01-2020', 1, 0),
(112, 111, 9500, 1710, 11210, 11210, 0, 'NA', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 0, '', '06-01-2020', 1, 0),
(113, 112, 7000, 0, 7000, 3500, 3500, 'NA', 0, 0, 0, 0, '', '', '6', '', '', 3500, '', '06-01-2020', 1, 0),
(114, 113, 37000, 5688, 42688, 0, 42688, '27AAWCS1087Q1Z8  ', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 0, '', '06-01-2020', 1, 0),
(115, 114, 9000, 810, 9810, 9810, 0, '27ACHPW1744N1ZY', 0, 0, 0, 0, '', 'By Cheque', '16257   ', '', '', 9810, 'NA', '06-01-2020', 1, 0),
(116, 115, 21500, 0, 21500, 10000, 10500, 'NA', 0, 0, 0, 0, '', '', '', '', '', 10000, '', '06-01-2020', 1, 0),
(117, 116, 12500, 2250, 14750, 14750, 0, '27AADCT8445N1ZO', 0, 0, 0, 0, '', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(118, 117, 20000, 3600, 23600, 0, 23600, 'NA', 0, 0, 0, 0, '', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(119, 118, 30000, 5400, 35400, 0, 35400, 'NA', 0, 0, 0, 0, '', '', '', '', '', 0, '', '07-01-2020', 1, 0),
(120, 119, 11500, 0, 11500, 11500, 0, 'NA', 0, 0, 0, 0, 'By Cash', '', '', '', '', 11500, '', '06-01-2020', 1, 0),
(121, 120, 5000, 0, 5000, 5000, 0, 'NA', 0, 0, 0, 0, '', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(122, 121, 7000, 0, 7000, 7000, 0, '0', 0, 0, 0, 0, 'By Cash', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(123, 122, 9500, 1710, 11210, 0, 11210, '', 0, 0, 0, 0, '', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(124, 123, 9000, 0, 9000, 9000, 0, '29AIAPK5623R1ZQ', 0, 0, 0, 0, '', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(125, 124, 10000, 1800, 11800, 11800, 0, 'NA', 0, 0, 0, 0, '', 'By Cheque', '103365', '', 'Ahmednagar Sahkari', 11800, '', '06-01-2020', 1, 0),
(126, 125, 7500, 1350, 8850, 8850, 0, '27AABCE1817D1Z4', 0, 0, 0, 0, '', 'By Cheque', 'neft', '', '', 0, '', '06-01-2020', 1, 0),
(127, 126, 23000, 4140, 27140, 0, 27140, '', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 0, '', '06-01-2020', 1, 0),
(128, 127, 23000, 4140, 27140, 0, 27140, 'PENDING', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 0, '', '06-01-2020', 1, 0),
(129, 128, 9500, 0, 9500, 9500, 0, '0', 0, 0, 0, 0, 'By Cash', '', '', '', '', 9500, '', '06-01-2020', 1, 0),
(130, 129, 8500, 0, 8500, 0, 8500, '0', 0, 0, 0, 0, '', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(131, 130, 8500, 0, 8500, 0, 8500, 'NA', 0, 0, 0, 0, '', 'By Cheque', '', '', '', 0, 'NA', '06-01-2020', 1, 0),
(132, 131, 5000, 900, 5900, 5900, 0, '27ENBPK6153A1ZB', 0, 0, 0, 0, '', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(133, 132, 17000, 3060, 20060, 0, 20060, 'Pending', 0, 0, 0, 0, '', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(134, 133, 0, 0, 0, 0, 0, '0', 0, 0, 0, 0, '', '', '', '', '', 0, '', '06-01-2020', 1, 0),
(135, 134, 12000, 540, 12540, 12540, 0, '27AACFM2404N1ZB', 3000, 9000, 0, 0, '', 'By Cheque', '514415', '30-12-2019 ', 'RBL BANK', 12540, 'NA', '07-01-2020', 1, 0),
(136, 135, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 0);

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
(1, 1, 'Trade Mark', '8', 'MSME,EVIDENCES,SALES BILL,PURCHASE BILL,ADVERTISE BILL,POA,AFFIDAVIT,TMA,', 'active', '', '2020-01-08 07:17:59'),
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
(15, 1, 'Follow-up', '10', ',', 'active', '', '2019-12-28 12:00:31'),
(16, 1, 'TM-M', '10', ',', 'active', '', '2020-01-03 09:09:25'),
(17, 1, 'Trademark Certificate', '0', ',', 'active', '', '2020-01-06 06:00:41'),
(18, 1, 'Hearing CHarges', '0', ',', 'active', '', '2020-01-06 06:01:05'),
(19, 1, 'TM-O Evidence Hearing ', '10', ',', 'active', '', '2020-01-06 08:07:05'),
(20, 1, 'TM Review ', '10', ',', 'active', '', '2020-01-06 12:17:57');

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
  `EMAIL` varchar(250) DEFAULT NULL,
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

INSERT INTO `law_trademark` (`applicant_id`, `application_id`, `NAME`, `ADDRESS`, `STATE`, `EMAIL`, `BRAND`, `SIGNIFICANCE`, `AGE`, `FIRMADDRESS`, `ORGANIZATION`, `NATIONALITY`, `FATHER`, `ASSOCIATION`, `MOBILE`, `SIGN_AUTH`, `AFF_DATE`, `COV_DATE`, `MARK_0`, `MARK_1`, `MARK_2`, `MARK_3`, `MARK_4`, `TM`, `SERVICES`, `PROPOSED_TO_BE`, `PROPOSED`, `INFORMATION`, `PLACE`, `DATE`, `TRADE`, `TRADE_0`, `TRADE_1`, `TRADE_2`, `TRADE_3`, `FILE_REF_NO`, `IS_MSME_REQ`, `ASSOCIATE_MARK`, `ADV_NAME`, `BAR_COUN_NO`, `LOGO`, `is_delete`) VALUES
(4, 5, 'Mr. Sudhir Suresh Mali ', NULL, 'MAHARASHTRA', '', 'MARMORIS CAFFE ', 'Thought ', '29', 'Marmoris, basement of bangalore ayyangar backery, near hemraj travels sangli 416416', 'Marmoris', 'INDIAN', '', NULL, '9168252727', '', NULL, '24-12-2019', '', 'Device', '', '', '', '29', 'CAFFE and restaurant, coffee house, sandwich, rolls and pizza, shakes and juices etc. ', 'Proposed To Be Used', '', '', 'PUNE', '24-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(5, 6, 'Sham Atmaram Bachhav', NULL, 'MAHARASHTRA', NULL, 'NEBULEZ', 'NA', '', ' 11 Shrimangal Garden Near Indira Jogging Track Mumbai Highway Nashik-42205', 'CSM CORPORSANO MEDIAID', 'India', '', NULL, '9970068456', '', NULL, '24-12-2019', 'Word Mark', '', '', '', '', '5', ' Medicinal & Pharmaceutical Preparation', '', '20-12-2000', 'Avinash Raghunath Pawar', 'PUNE', '24-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'LALASAHEB ANNA ATOLE', 'MAH/2728/2016', NULL, 0),
(6, 8, 'DNANDEV BAJIRAV CHOLKE', NULL, 'Maharashtra', '', 'Amrut Top T', 'THOUGHT', '36', 'Gut No. 54/1, AP – Cholkewadi, Astgaon, Tal. Rahata', 'SAIRAJ MILK AND MILK PRODUCTS ', 'INDIAN', 'Bajirav Cholke', NULL, '9657115132', '', NULL, '02-12-2019', 'Word Mark', '', '', '', '', '29', 'Milk and milk products', '', '15-08-2019', ' Cholke sir', 'AURANGABAD', '02-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '2843057,2862887,3789054,3888989', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(7, 11, 'Mr Prasad Shetty,Mr Raghunath Shetty', NULL, 'Maharashtra', NULL, 'Hotel Sourabh Restaurant and Bar', 'THOUGHT ', '43', 'Sr No 63/2B/1 Rajyog Society Pune Satara Road Padmavati Pune 411009', 'Hotel Sourabh', 'INDIAN', '0', NULL, '9766321103', 'Mr Prasad Shetty', NULL, '03-12-2019', '', 'Device', '', '', '', '43', 'Providing food and Drinks', '', '01-12-1984', 'Mr Prasad Shetty', 'PUNE', '03-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', 'trade_11_1577176712.jpg', 0),
(8, 13, 'Mr.Hemantkumar shankar Belanke', NULL, 'MAHARASHTRA', '', 'SHREEMANTCHAHA ', 'thought', '34', 'survey no.252,vakhar bhag,miraj,Dist Sangli 416410', 'BELANKE UDYOG SAMUHA', 'India', '', NULL, '7721915551', 'Mr.Hemantkumar shankar Belanke', NULL, '28-12-2019', 'Word Mark', '', '', '', '', '43', 'providing food & drink ,temporary accomodation', 'Proposed To Be Used', '', '', 'PUNE', '28-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(14, 19, 'Mr. Sachin Balasaheb Lad', NULL, 'Maharashtra', NULL, 'OFFERING THE BEAUTIFUL MEMORIES ', 'THOUGHT', '42', '2749/1, B.D. Lad Industrial Park, At post - kundal,vita road,tal palus,sangli,416309', 'Rajtilak Industries', 'INDIAN', NULL, 'Mr. Sachin Balasaheb Lad', '9890618460', 'Mr. Sachin Balasaheb Lad', NULL, '04-12-2019', 'Word Mark', '', '', '', '', '3', 'all types of Holi colours,Gulal,Ashtagandha,Bhandara,variety of kumkum ,Rangoli ,powder color,Sandalwood,holi kids play toys marking ink colors festivals kids color play craft & toys.', '', '21-10-2019', 'mr.Sachin Lad', 'PUNE', '04-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(21, 26, 'Shaikh Abdul quayyum ', NULL, 'MAHARASHTRA', NULL, 'Almas jewellers', '', '51', 'sarafa bazar sarafa masjid lota karanja road. auragabad', 'Almas jewellers', 'India', '', NULL, '9028141544', 'Shaikh Abdul quayyum ', NULL, '25-10-2019', 'Word Mark', '', '', '', '', '14', 'class. 14;pest', '', '01-01-2002', ' ', 'PUNE', '28-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(22, 29, ' mr.Shaikh farid 2) mr.shaikh hamid', NULL, 'MAHARASHTRA', NULL, ' indosia ', 'as a thoughts ', '', '1678-2,joshi peth jalgaon-425001', 'indosia Pharmaceuticals pvt ltd ', 'India', '', NULL, '9766724270, 91300555', 'mr.shaikh farid ', NULL, '28-12-2019', '', 'Device', '', '', '', '5', 'medicinal & pharmaceutical preparation ', '', '30-11-19', 'mr.shaikh farid  ', 'jalgaon', '28-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(23, 30, '1) MR SANDEEP SHANKAR PATIL 2) SACHIN SHANKAR PATIL', NULL, 'MAHARASHTRA', NULL, '1)  ITRACALL 2) LULICALL 3) S PHARMA', 'THOUGHTS', '36', 'BEHIND SHREE HANUMAN HIGH SCHOOL ,A/P-KERLE,TAL-KARVEER DIST-KOLHAPUR 416229', 'S PHARMA', 'India', '', NULL, '9637193530', 'MR SANDEEP SHANKAR PATIL', NULL, '28-12-2019', 'Word Mark', '', '', '', '', '5', 'MEDICINAL AND PHARMACEUTICAL PREPARATIONS PHARMACEUTICAL AND VETERINARY PREPARATIONS, SANITARY PREPARATIONS FOR MEDICAL PURPOSES, DIETETIC SUBSTANCES ADAPTED FOR MEDICAL USE, FOOD FOR BABIES, PLASTERS, MATERIALS FOR DRESSINGS, MATERIAL FOR STOPPING T', 'Proposed To Be Used', '', '', 'Kolhapur', '28-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(24, 31, 'Mr. Rajeshkumar shankarnath Sapra', NULL, 'MAHARASHTRA', NULL, 'Architecture Interior and Creative Technology Design Academy', 'NA', '51', 'Office no. 01, Bahirwade plaza, opp. BSNL Office, Chinchwad, Pune 411019', 'AICT Design Academy', 'India', '', NULL, '9011054381', 'Mr. Rajeshkumar shankarnath Sapra', NULL, '03-12-2019', '', 'Device', '', '', '', '41', 'Designing courses, Entrance exams preparation, Architectural courses', '', '01-09-2016 ', 'Mr. Rajesh sapra', 'Pune', '03-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(26, 33, 'Mr. Sachin Balasaheb Lad', NULL, 'MAHARASHTRA', NULL, 'OFFERING THE BEAUTIFUL MEMORIES ', 'As Thought', '42', '2749/1, B.D. Lad Industrial Park, At post - kundal,vita road,tal palus,sangli,416309', 'Rajtilak Industries', 'India', NULL, '', '9890618460', 'Mr. Sachin Balasaheb Lad', NULL, '28-12-2019', '', 'Device', '', '', '', '3', 'all types of Holi colours,Gulal,Ashtagandha,Bhandara,variety of kumkum ,Rangoli ,powder color,Sandalwood,holi kids play toys marking ink colors festivals kids color play craft & toys', '', '21-10-2016 ', ' mr.Sachin Lad', 'Palus,Sangli', '28-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(27, 34, 'Sachin bhushan Gupta ', NULL, 'MAHARASHTRA', NULL, '4147843 + Withdraw', '', '', ' c/o. Madan trading company,  shop no. 4, silver valley, nashik ', NULL, 'India', '', NULL, '9225102282', 'Sachin bhushan Gupta ', NULL, '28-12-2019', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(28, 35, 'Lokesh Gajanan Uttekar, Adish Ramesh Patil, Dipak Bankar, Sunil Menon', NULL, 'MAHARASHTRA', NULL, 'PRO - T5', '', '', 'H- 34, old midc, Satara 415004', 'Satva sport\'s nutritions ', 'India', '', NULL, '9421884003', ' Lokesh Gajanan Uttekar', NULL, '28-12-2019', 'Word Mark', '', '', '', '', '35', 'All types of nutritions in powder fom, gel form, Dietary & nutritional supplements in powered, drink, gel form', 'Proposed To Be Used', '', ' Lokesh Gajanan Uttekar', 'Satara', '28-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(29, 36, 'Lokesh Gajanan Uttekar, Adish Ramesh Patil, Dipak Bankar, Sunil Menon', NULL, 'MAHARASHTRA', NULL, 'PRO - T5', 'Working of products ', '35', ' H- 34, old midc, Satara 415004', 'Satva sport\'s nutritions ', 'India', '', NULL, '9421884003', ' Lokesh Gajanan Uttekar', NULL, '28-12-2019', 'Word Mark', '', '', '', '', '5', 'All types of nutritions in powder fom, gel form, Dietary & nutritional supplements in powered, drink, gel form', 'Proposed To Be Used', '', '', 'Satara', '04-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(30, 38, 'Mr. Ravindra Bhupal Patil ', NULL, 'MAHARASHTRA', NULL, 'JAYKUSUM', 'Thought ', '38', 'A/p Kumbhoj, tal- Hatkanangale, Dist.- Kolhapur 416111', 'Jay Agencies ', 'India', '', NULL, '9970313130', 'Mr. Ravindra Bhupal Patil ', NULL, '04-12-2019', 'Word Mark', '', '', '', '', '3', ' Detergent powder, Detergent cake, Dishwash powder & bar, Toilet cleaners, handwash, soaps', 'Proposed To Be Used', '', 'Mr. Ravindra Bhupal Patil ', 'Sangli ', '04-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(31, 39, 'Mr. Ravindra Bhupal Patil ', NULL, 'MAHARASHTRA', NULL, 'JAYKUSUM', 'Thought ', '38', 'A/p Kumbhoj, tal- Hatkanangale, Dist.- Kolhapur 416111', 'Jay Agencies ', 'India', '', NULL, '9970313130', 'Mr. Ravindra Bhupal Patil ', NULL, '04-12-2019', 'Word Mark', '', '', '', '', '30', 'Tea, coffee, cocoa, artificial coffee, rice, pastry and confectionery, sugar, spices, ice,', 'Proposed To Be Used', '', '', 'Sangli ', '28-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(32, 40, 'Sachin Bhushan Gupta', NULL, 'MAHARASHTRA', NULL, 'MTC', '', '45', 'Shop No 4 Silver Valley Near Nehru Nagar Bus Stop Nashik', 'MADAN TRADING CO', 'India', '', NULL, '8275567456', 'Sachin Bhushan Gupta', NULL, '', '', 'Device', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', 'trade_40_1577537181.jpg', 0),
(33, 42, 'Shaikh Asif Shaikh Jalal ,Shaikh Farid Shaikh Hamid', NULL, 'MAHARASHTRA', NULL, 'indosia ', ' as a thoughts ', '', '1678-2,joshi peth jalgaon-425001', 'indosia Pharmaceuticals pvt Ltd ', 'India', NULL, NULL, '9766724270, 91300555', 'Shaikh Asif Shaikh Jalal', NULL, '30-12-2019', '', 'Device', '', '', '', '5', 'Pharmaceuticals and medicinal preparation ', '', '30-11-2019 ', ' mr.shaikh farid ', 'jalgaon', '30-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(34, 44, 'PRAMOD D. PATIL', NULL, 'MAHARASHTRA', NULL, 'KIK', 'Thought ', '43', 'A-23, KAGAL 5 STAR M.I.D.C. KOLHAPUR-416216', NULL, 'India', '', NULL, '9422046471', 'PRAMOD D. PATIL', NULL, '05-12-2019', 'Word Mark', '', '', '', '', '3', 'Bleaching preparations and other Substances for laundry use;cleaning; polishing;Scouring and Abrasive preparation ;Soap; perfumery;perfumery essential;Oils, cosmetics,Hair Lotions and Dentifrices.', '', '05-12-2019', 'PRAMOD', 'Kolhapur', '05-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '2735235 ', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(35, 45, 'Mr Mukesh Shah, Mrs Vidhi Shah', NULL, 'MAHARASHTRA', NULL, 'Ambica', 'NA', '', 'BIRCH 103 NYATI MEADOWS, NEAR BRAHMA SUNCITY ,WADGOAN SHERI PUNE – 411014.', 'Shah Hospitality', 'India', '', NULL, '9833605499', 'Mr Mukesh Shah ', NULL, '08-12-2019', '', 'Device', '', '', '', '30', 'Coffee, Tea, Cocoa, Sugar, Rice, Tapioca, Sago, Artificial Coffee; Flour And Preparations Made From Cereals, Bread, Pastry And Confectionery, Ices; Honey, Treacle; Yeast, Baking Powder; Salt, Mustard; Vinegar, Sauces, (Condiments); Spices; Ice, Fruit', 'Proposed To Be Used', '', 'Mr Mukesh Shah', 'Pune', '08-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(36, 46, 'organica asia ', NULL, 'MAHARASHTRA', NULL, '1)Openta plus 2)Rm25', 'as a thoughts ', '38', 'flat no 104 ,wing - C, Mhada society virar - bolinj , virar (w) dist - palghar - 401303', 'organica asia ', 'India', '', NULL, '9823578002', 'Madhukar Shivaji Ahire ', NULL, '09-12-2019', 'Word Mark', '', '', '', '', '1', 'plant growth Regulators ', 'Proposed To Be Used', '', 'madhukar ahire ', 'palghar', '09-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(37, 47, 'sachin kamlakar fegade', NULL, 'MAHARASHTRA', NULL, '', 'kfkhandeshfood', '', '72/A,chameli nagar,wanjola road,bhusawal, tal-bhusawal,dist -jalgaon-425201', 'khandesh food & tradeing  ', 'India', '', NULL, '', 'sachin kamlakar fegade', NULL, '09-12-2019', 'Word Mark', 'Device', '', '', '', '30', 'wafers ,potato papad ,wheat, puff chips,snacks.', '', '01-03-2012 ', 'sachin fegade', '', '09-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(38, 48, 'vivek ramesh patil', NULL, 'MAHARASHTRA', NULL, 'gajraj', 'as a thoughts', '', ' shop no.21,babaji patil market,pachora road ,jamner,tal -jamner,dist -jalgaon -424206', 'finix crop care pvt ltd ', 'India', NULL, NULL, ' 9403095556', 'vivek ramesh patil', NULL, '09-12-2019', 'Word Mark', 'Device', '', '', '', '1', 'plant growth  Regulators -1 ,BIOPESTICIDE-5', '', '13-05-19', 'VIVEK PATIL   ', '', '09-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(39, 49, 'suryakant bapurao sonawane ', NULL, 'MAHARASHTRA', NULL, 'gauravdrip', 'sons name gaurav ,related to business ', '39', 'city point ,opp girna colony bhadgaon rd kasoda tal erandol dist jalgaon-425110', 'gaurav drip irrigation ', 'India', '', NULL, '7026140014', ' suryakant bapurao sonawane ', NULL, '02-12-2019', 'Word Mark', 'Device', '', '', '', '11', ' drip irrigation equipments ,drip irrigation system cable,motor pump,motor starter,alluminium cable ,copper cable', '', '10-02-2007', ' suryakant sonawane', 'jalgaon', '09-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(40, 50, ' Ritika Kailas Patel', NULL, 'MAHARASHTRA', NULL, 'KALYANI INDUSTRIES', 'NA', '33', 'Mahadev Saw Mill Old Agra Road Pimpalgaon Baswant 422209', ' KALYANI INDUSTRIES', 'India', '', NULL, '9881190529', ' Ritika Kailas Patel', NULL, '09-12-2019', 'Word Mark', '', '', '', '', '19', 'Plywwod Plyboards & Flush Door', '', '15-11-2019', 'Kailas Kantilal Patel', 'Pimpalgaon Baswant Nashik', '09-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(41, 51, 'Mr. Dinesh jivan patel', NULL, 'MAHARASHTRA', NULL, 'Giouss', 'NA', '27', '216, 2nd floor, High-tech.Ind, centre caves road, Jogeshwari(East), Mumbai 400060', 'Khodal creation', 'India', '', NULL, '9820401617', 'Mr. Dinesh jivan patel', NULL, '10-12-2019', '', 'Device', '', '', '', '25', 'Readymade garments ', '', '10-01-2010 ', 'Mr. Dinesh patel', 'Pune', '09-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(42, 56, 'ashutosh chudaman patil ', NULL, 'MAHARASHTRA', NULL, 'Tulsi ', '', '', 'D-29,midc, jalgaon-425003', 'Tulsi jelly sweets', 'India', '', NULL, '9422283890', 'ashutosh chudaman patil ', NULL, '10-12-2019', '', 'Device', '', '', '', '29', 'Jams, Nuts, Fruit Jelly & Fruit Pulps', '', '01-01-2003  ', ' sunil patil ', ' jalgaon ', '10-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(43, 57, 'Dr. Prashant Keshavrao Palwade', NULL, 'MAHARASHTRA', NULL, 'Satej Skin Hair And Laser Center', '', '41', 'Madhushri First Floor , Above wadagaonkar Netralay , Varad Ganesh Mandir Road , Samarth Nagar , Aurangabad 431001', 'Satej Skin Hair and Laser Center', 'India', '', NULL, 'prashantpalwade@gmai', 'Dr. Prashant Keshavrao Palwade', NULL, '11-12-2019', 'Word Mark', 'Device', '', '', '', '', 'Health care services', '', '01-02-2019', ' Dr. Prashant Palwade', 'Aurangabad', '10-12-2019', '', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(44, 58, 'MRS VIJAYALAXMI SANJEEV PATGAONKAR , MS SIMRAN SANJEEV PATGAONKAR', NULL, 'MAHARASHTRA', NULL, 'VIKRANT', '', '55', ' H -23 M I D C ,GOKULSHRIGAON, KOLHAPUR 416234', 'PADDY SAFECO LLP', 'India', NULL, '', '9821515043', 'MRS VIJAYALAXMI SANJEEV PATGAONKAR', NULL, '11-12-2019', '', 'Device', '', '', '', '6', 'Safe', 'Proposed To Be Used', '', '', 'Mr SANJEEV PATGAONKAR', '11-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(45, 59, 'Dr.B. Mohan Krishna', NULL, 'MAHARASHTRA', NULL, 'Coco Jumbo', 'Thought', '', 'D-9 Madkaim Industrial Estate, Ponda, Tal-Goa-403404', ' Cheers Group', 'India', '', NULL, '9158133555', 'Dr.B. Mohan Krishna', NULL, '11-12-2019', 'Word Mark', '', '', '', '', '33', 'Wine, spirits, liquors &Alcoholic Beverages', '', '14-11-2017', 'dr.mohan', 'Goa', '11-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(46, 60, 'MR. ROHIT SHIRISHKUMAR SONAVANE', NULL, 'MAHARASHTRA', NULL, 'BULL FIGHTER XXX RUM', 'Thought', '25', ':1231/20, E – Ward, Near Panchmukhi Hanuman Mandir, Bagal Chowk, Kolhapur – 416 001', NULL, 'India', '', NULL, '9922050055', 'MR. ROHIT SHIRISHKUMAR SONAVANE', NULL, '11-12-2019', 'Word Mark', 'Device', '', '', '', '25', 'WINE, RUM, WHISKY, LIQUORS & ALCOHOLIC BEVERAGES', '', '09-05-2004', 'mr Rohit sonavane', 'kolhapur', '11-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(47, 61, 'MR. KUNAL SHIRISHKUMAR SONAVANE', NULL, 'MAHARASHTRA', NULL, 'BULL FIGHTER XXX RUM', 'Thought', '', '1231/20, E – Ward, Near Panchmukhi Hanuman Mandir, Bagal Chowk, Kolhapur – 416 001', NULL, 'India', '', NULL, '9922050055', 'MR. KUNAL SHIRISHKUMAR SONAVANE', NULL, '11-12-2019', '', 'Device', '', '', '', '33', 'WINE, RUM, WHISKY, LIQUORS & ALCOHOLIC BEVERAGES', '', '09-05-2004', 'mr Rohit sonavane', 'mr Rohit sonavane', '31-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(48, 62, 'MR SHIRISHKUMAR R. SONAVANE', NULL, 'MAHARASHTRA', NULL, 'BULL FIGHTER', 'Thoughts', '', 'B-1,MIDC,Akkalkoat Road,Solapur-413006', 'VISHNU LAXMI CO-OP.GRAPE DISTILLERY LTD.', 'India', NULL, NULL, '9922050055          ', 'MR SHIRISHKUMAR R. SONAVANE', NULL, '11-12-2019', 'Word Mark', 'Device', '', '', '', '33', 'WINE, RUM, WHISKY, LIQUORS & ALCOHOLIC BEVERAGES', '', '09-05-2004', 'MR SHIRISHKUMAR SONAVANE', 'Kolhapur', '11-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(49, 63, 'Dr. Atulkumar Laxminarayan Shende', NULL, 'MAHARASHTRA', NULL, 'Saikrupa Hospital', 'NA', '49', 'Beside Disha Nagari , Behind Master Cook Hotel , Opp. Hotel Nishant Park , Beed Bypass , Aurangabad 431005', 'Saikrupa Hospital', 'India', '', NULL, '9325206991', 'Dr. Atulkumar Laxminarayan Shende', NULL, '11-12-2019', 'Word Mark', 'Device', '', '', '', '44', 'Health Care service', '', '22-12-2006', 'Dr. Atul Shende', 'Aurangabad', '11-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(50, 64, 'Mr. Vishvambhar Devidas Bardapurkar . Mrs. Sushma Vishvambhar Bardapurkar ', NULL, 'MAHARASHTRA', NULL, '1. Komal Paper Products 2. Bhagwati Paper Products', '', '49', 'Plot no. D-7 , 5 Star MIDC , Shendra , Aurangabad - 431154', 'Bhagwati Packaging Industries', 'India', '', NULL, '9422206778', 'Mr. Vishvambhar Devidas Bardapurkar', NULL, '11-12-2019', 'Word Mark', '', '', '', '', '', 'Paper cup , paper Glass , Paper Disposal Goods ', '', '13-06-2015 ', 'Mr. Vishwambhar Devidas  Bardapurkar', 'Aurangabad', '11-12-2019', '', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(51, 69, 'Syed Naimuddin', NULL, 'MAHARASHTRA', NULL, 'JEEVAN RAJA PATTI', '', '50', 'Off.Vip Road, Quaziwada , Bhadkal Gate , Aurangabad-431001', 'Nagina Herbal ', 'India', '', NULL, '9890425816', 'Syed Naimuddin', NULL, '22-12-2019', '', 'Device', '', '', '', '30', 'Food Products', 'Proposed To Be Used', '', 'syad sir', 'Aurangabad', '21-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', 'trade_69_1577787611.jpg', 0),
(52, 70, 'Mr. Kishan Holaram Adwani.', NULL, 'MAHARASHTRA', NULL, 'ADWANI BUILDERS', '', '60', '3rd Floor, Silver Plaza, Opp. BSNL Office, Canada Corner, Nashik -422001.', 'Adwani Builders.', 'India', '', NULL, '9975555558', 'Mr. Kishan Holaram Adwani.', NULL, '31-12-2019', '', 'Device', '', '', '', '37', 'Construction & Developers', '', '27-01-2000   ', '', '', '31-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(53, 71, 'Mr. Satish Madanrao Pawar, Mr. Madanrao Dagu Pawar.', NULL, 'MAHARASHTRA', 'jagtapdeep@gmail.com', 'MADAN GLOBAL AGROS', 'NA', '40', 'A-3, Sahwas Society Kulkarni Colony, Sharanpur Road, Nashik- 422002', 'Madan Global Agros', 'India', '', NULL, '7972552251', 'Mr. Satish Madanrao Pawar.', NULL, '31-12-2019', '', 'Device', '', '', '', '35', 'Import & Export Of Agricultural Products', '', '20-04-2016', 'Deepak Jagtap', 'Nashik', '31-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(54, 72, 'Mr. Bhavesh Maniharlal Manek.', NULL, 'MAHARASHTRA', 'sadgurudolphin@yahoo.com', 'MANEKCHAND SABUDANA', 'NA', '', 'Office No. 6, Yashwant Mandai, Raviwar Peth, Nashik -422001.', 'Sadguru Trading Company', 'India', '', NULL, '9423081001', 'Mr. Bhavesh Maniharlal Manek.', NULL, '31-12-2019', 'Word Mark', '', '', '', '', '30', 'Sago', 'Proposed To Be Used', '', 'Mr. Bhavesh manek', 'Pune', '', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(55, 73, 'Mr. Dattartay Dada Ugale.', NULL, 'MAHARASHTRA', 'dattaugle123@gmail.com', 'HAPPY ROLL', 'NA', '29', 'Flat No 6, Vastav Vaibhav Aprtment ,Near Swami Samarth Mandir, Prashant Nagar, Pathardi Phata, Nashik- 422010.', ' Happy Roll', 'India', '', NULL, '7769003590', 'Mr. Dattartay Dada Ugale.', NULL, '31-12-2019', '', 'Device', '', '', '', '43', 'Providing Food & Soft Drink', '', '01-03-2019', 'Datattray Ugale', '', '31-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(56, 75, 'Mr. Shaikh Abdul Gafoor.', NULL, 'MAHARASHTRA', 'lawprotectors.swapnil@gmail.com', 'NEW ANAMIKA JUICE CENTER', '', '', 'Maharana Pratap Chowk , Opp. Hotel Mrugnayani , Bajajnagar , Waluj , Aurangabad - 431136.', 'New Anamika Juice Center.', 'India', '', NULL, '9423456415', 'Mr. Shaikh Abdul Gafoor.', NULL, '01-01-2020', '', 'Device', '', '', '', '43', 'Providing Food & Drinks', '', '01-12-2017', 'Mr. Mohammed shakeel bagwan', 'Aurangabad', '01-01-2020', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(57, 76, 'Mr. Yashwant Bhanudas Chavan ,Mr. Abhijit Arun Peshkar , Mr. Bhaskar Shinde .', NULL, 'MAHARASHTRA', 'yashbchavan@gmail.com', 'ALFA EDUCATIONS', '', '34', 'Office No. 6 & 7 ,  3rd Floor , Vantagio Complex , Plot No. 31 , Behind Gopal Cultural Hall , New Osmanpura , Aurangabad - 431005.', 'Alfa Educations.', 'India', '', NULL, '7722001151', 'Mr. Yashwant Bhanudas Chavan.', NULL, '01-01-2020', '', 'Device', '', '', '', '16', 'Educational and Teaching Materials', '', '18-08-2019', 'Mr. Yashwant Chavan', 'Aurangabad', '01-01-2020', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(58, 77, 'Mr. Sivdasan T. Panikar.', NULL, 'MAHARASHTRA', 'dbpl@rediffmail.com', 'DBEPL', '', '54', 'Sr. No.485, Bolhai Mata Street No.03, Das Colony , Jadhavwadi, Chikhali, Pune- 411062.', 'Das & Brothers Electricals Pvt. Ltd.', 'India', NULL, NULL, '8600834848 ', 'Mr. Sivdasan T. Panikar.', NULL, '01-01-2020', '', 'Device', '', '', '', '37', 'Electrical contractors ', '', '28-05-2004', 'Mrs. Bidvai.', 'Pune', '01-01-2020', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', 'trade_77_1577880760.jpg', 0),
(59, 79, 'Mr.Harish Ashok Arkal.', NULL, 'MAHARASHTRA', 'Ashokarkal777@Gmail.Com', 'NEWLOTUSAQUA+', 'Thought', '24', 'New Plot No. 82/35/2, Tirupati Nagar, Majrewadi, Uttar Solapur- 413006.', 'Arkal Industries.', 'India', '', NULL, '9175828210', 'Mr.Harish Ashok Arkal.', NULL, '02-01-2020', '', 'Device', '', '', '', '32', 'Packaged Drinking Water & Soft Drinks.', 'Proposed To Be Used', '', 'Mr. ASHOK ARKAL', 'SOLAPUR', '02-01-2020', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', 'trade_79_1577959993.png', 0),
(60, 80, 'Mr. Shaileshkumar Lakshmanbhai Patel, Mr. Sanjaykumar Ambalal Patel.', NULL, 'GUJRAT', 'sanjaypatel99793@gmail.com', 'SARASWATI001', 'NA', '45', '34, Market Yard, Ganjbajar, Tal. Visnagar,Dist. Mehsana-384315.', 'Saraswati Traders.', 'India', '', NULL, '', 'Mr. Shaileshkumar Lakshmanbhai Patel.', NULL, '02-01-2020', '', 'Device', '', '', '', '30', 'Jaggery Products', 'Proposed To Be Used', '', '', '', '02-01-2020', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', 'trade_80_1577963793.jpg', 0),
(61, 81, 'Mr. Balasaheb Sitaramji Akat.', NULL, 'MAHARASHTRA', 'yashfarmerpcltd@gmail.com', 'YASH MILK', 'name of son', '40', 'Gut No 027 Devla Road ,Satona (kh)Tq Partur Dist.Jalna -431502.', 'Ssatona Farmers Producer Company Ltd.', 'India', NULL, NULL, '9960647854', 'Mr. Balasaheb Sitaramji Akat.', NULL, '11-12-2019', 'Word Mark', '', '', '', '', '29', 'milk and milk products', '', '10-03-2018', '', 'Jalna', '11-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(62, 82, 'Mr. Sameer Kuncolienkar.', NULL, 'MAHARASHTRA', 'sameer@ambica.ltd', '1)Redland China. 2)The Hotdog Street. 3)Zapp Rolls.  4)Tasty Bol. 5)Roohani Biryani.  6)Desi Chopstick.  7)Roll & Run', 'Thought', '', ' Ambica, BF1,Phase 2,Malbhat, Margao, Goa-403601.', NULL, 'India', '', NULL, '9158133555', 'Mr. Sameer Kuncolienkar.', NULL, '12-12-2019', '', 'Device', '', '', '', '43', 'Providing food, drinks & beverages', 'Proposed To Be Used', '', '', 'Goa', '12-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(63, 85, 'MR KIRAN S GADRE ,ATUL.S.GADRE ,MR .PARTH S GADRE.', NULL, 'MAHARASHTRA', 'atulgadre@rediffmail.com', 'GADRE', 'Thought', '40', 'ICL Bldg,oppTata nagar,V.N purav Marg chunabhati (E), Mumbai-400022.', ' INNOVATIVE ENGINEERS', 'India', '', NULL, '9028466433', 'MR .PARTH S GADRE.', NULL, '12-12-2019', '', 'Device', '', '', '', '32', 'mineral water, Parking drinking water ,MINERAL AND AERATED WATERS AND NON ALCOHOLIC DRINKS, FRUIT DRINKS & FRUIT JUICE, SYRUPS & PREPRATION FOR MAKING BEVERAGES', 'Proposed To Be Used', '', 'MR Parth gadre', 'mumbai', '12-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(64, 86, 'Mr. Mahendra Verma.', NULL, 'MAHARASHTRA', 'mahendra@qunarch.com', 'ROCA PROPERTY MANAGEMENT', '', '52', 'C-21/325,VILLA SOARES FALCON CRAST LA CITADEL COLONY, LANE 3, DOUNA PAULA, PANJIM, TISWADI GOA-403004.', NULL, 'India', '', NULL, '9158133555', 'Mr. Mahendra Verma.', NULL, '12-12-2019', '', 'Device', '', '', '', '36', 'Real estate & brokerage services', '', '11-12-2019', 'Mahendra verma', 'Goa', '11-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', 'trade_86_1578042094.jpg', 0),
(65, 87, ' Mr. Rahul K Muralidharan , Mr . K . K. Murlidharan.', NULL, 'MAHARASHTRA', 'kkconstrotech@gmail.com', 'TRUSAND', '', '34', '81 Tilak Nagar, Aurangabad, maharashtra  431005', 'K K CONSTRUCTIONS', 'India', '', NULL, '9822029245', ' Mr. Rahul K Muralidharan .', NULL, '26-11-2019', 'Word Mark', '', '', '', '', '19', 'SAND', 'Proposed To Be Used', '', '', 'AURANGABAD', '26-11-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(66, 91, ' Mr. Srinivas Bullabbai Nandamuri ,Mrs. Latha Srinivas Nandamuri.', NULL, 'MAHARASHTRA', 'srinivas_orchid@yahoo.com', 'NANDAMURI TECHNOS ', '', '54', 'Plot no. 45, Gut no. 71 , Wadagaon Kolati , Midc Waluj , Aurangabad - 431136 .', 'NANDAMURI TECHNOS', 'India', '', NULL, '9822017570', ' Mr. Srinivas Bullabbai Nandamuri', NULL, '12-12-2019', '', 'Device', '', '', '', '21', 'Metal House Hold Products', 'Proposed To Be Used', '', 'Mr. Srinivas ', 'Aurangabad', '12-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(67, 92, 'Mr. Mohit Rajesh Talbani.', NULL, 'MAHARASHTRA', 'talbanimohit28@gmail.com', 'VASTRAHUB', 'NA', '23', 'Shop No. 10, Disha Gaurav, Aurangpura, Aurangabad - 431001.', 'Guru Enterprises.', 'India', '', NULL, '8668399866', 'Mr. Mohit Rajesh Talbani.', NULL, '03-01-2020', '', 'Device', '', '', '', '35', 'Trading and Supply of Garments .', 'Proposed To Be Used', '', 'Mr. Mohit Talbani.', 'Aurangabad', '03-01-2020', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(68, 93, 'Mr. Jayendra D.Sharma,Mr. Brijbhushan V.Khandal.', NULL, 'Maharashtra', 'vbc.tech@gmail.com', 'SILAMOL', 'NA', '38', '13- C-3, Estee Apartment,Sai Baba Nagar, Borivali -CWD- 400092.', 'Vaishnavi Biotech Corporation', 'India', '', NULL, '9881088858', 'Mr. Jayendra D.Sharma.', NULL, '03-01-2020', 'Word Mark', '', '', '', '', '1', 'Chemicals for use in pesticides', '', '14-12-2014', '', 'Aurangabad', '03-01-2020', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(69, 94, 'Mr. Jayendra D.Sharma ,Mr. Brijbhushan V.Khandal.', NULL, 'MAHARASHTRA', 'vbc.tech@gmail.com', 'SILAMOL', '', '38', '13- C-3, Estee Apartment,Sai Baba Nagar, Borivali -CWD- 400092.', 'Vaishnavi Biotech Corporation.', 'India', '', NULL, '9881088858', 'Mr. Jayendra D.Sharma.', NULL, '03-01-2020', 'Word Mark', '', '', '', '', '5', 'Pesticides', '', '14-12-2014 ', '', 'Aurangabad.', '03-01-2020', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(70, 95, 'Mr. Jayendra D.Sharma, Mr. Brijbhushan V.Khandal.', NULL, 'MAHARASHTRA', '', 'RAJNANDINI', '', '38', '13- C-3, Estee Apartment,Sai Baba Nagar, Borivali -CWD- 400092.', 'Vaishnavi Biotech Corporation.', 'India', '', NULL, '9881088858', 'Mr. Jayendra D.Sharma.', NULL, '03-01-2020', 'Word Mark', '', '', '', '', '1', 'Chemicals for use in pesticides', '', '21-07-2012', '', '', '03-01-2020', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(71, 96, 'Mr. Jayendra D.Sharma, Mr. Brijbhushan V.Khandal.', NULL, 'MAHARASHTRA', 'vbc.tech@gmail.com', 'RAJNANDINI', '', '38', '13- C-3, Estee Apartment,Sai Baba Nagar, Borivali -CWD- 400092.', 'Vaishnavi Biotech Corporation.', 'India', '', NULL, '9881088858', 'Mr. Jayendra D.Sharma.', NULL, '03-01-2020', 'Word Mark', '', '', '', '', '5', 'Pesticides.', '', '21-07-2012', '', 'Aurangbad.', '03-01-2020', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(72, 97, 'Mrs. Ameerunnisa Fazal khan.', NULL, 'MAHARASHTRA', 'fkfelixbattery@gmail.com', 'FELIX', '', '29', '1st Floor, Sunil Tower ,Near Hotel Dwarka, New Agra Road, Nashik -422011.', 'Felix Dairy & Milk Products Pvt. Ltd.', 'India', NULL, NULL, '8888847485', 'Mrs. Ameerunnisa Fazal khan.', NULL, '03-01-2020', '', 'Device', '', '', '', '29', 'Milk & Milk Products.', 'Proposed To Be Used', '', '', 'PUNE', '03-01-2020', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(73, 98, 'Mrs. Bharati Bajrang Kadolikar.', NULL, 'MAHARASHTRA', 'bajrangkadolikar@gmail.com', 'SARVESH AYURVEDA ', '', '43', 'Daamyanti Niwas,Dhepanpur,Kurundwad,Kurundawad(M Cla),Tal. Shirol ,Dist. Kolhapur -416106.', 'Sarvesh Ayurveda A Science Of Organic Herbs.', 'India', '', NULL, '7083196813', 'Mrs. Bharati Bajrang Kadolikar.', NULL, '03-01-2020', '', 'Device', '', '', '', '35', 'Distributer ,Display, Supplier ,Retailer ,all types of Medical preparation , Ayurvedic Medicine ,medicine product.', '', '20-09-2018', 'Mrs.Bharati Kadolikar', 'Kurundwad', '03-01-2020', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(74, 99, 'Mr. Umesh R. Survase.', NULL, 'MAHARASHTRA', 'ank01430@gmail.com', 'INFINITECURE', '', '35', 'At Post.Chipri Vasahat, Jaysingpur, Dist.Kolhapur- 416101.', NULL, 'India', '', NULL, '7020142117', 'Mr. Umesh R. Survase.', NULL, '03-01-2020', 'Word Mark', '', '', '', '', '03', 'Preparations for the Care of the Scalp & Hair. Lotions, Creams and Preparations for Care of the Face, Body, Scalp & Hair. Preparations for the Cleaning, Care & Growing of the Hair.', 'Proposed To Be Used', '', '', '', '03-01-2020', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(75, 100, 'Mr. Atul Dashrath Mane.', NULL, 'MAHARASHTRA', 'hr@sonaidairy.com', '', '', '', 'Gat No 94/1 94/2 and 104 AT Gokhali Post Indapur Tal Indapur Dist Pune 413106.', 'INDAPUR DAIRY AND MILK PRODUCTS LIMITED.', 'India', NULL, NULL, ' 9422520468', 'Mr. Atul Dashrath Mane.', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(76, 101, 'Mrs. Rohini Umesh Patil.', NULL, 'MAHARASHTRA', 'manishaagro@yahoo.in', 'ACHIEVE', '', '', 'No.152, North kasba, Mahatma Gandhi road, Solapur- 413002.', 'Manisha Agro Sciences', 'India', '', NULL, '9423589770', 'Mrs. Rohini Umesh Patil.', NULL, '', 'Word Mark', '', '', '', '', '01', 'Fertilizers', '', '', '', '', '', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(77, 102, 'Mrs. Rohini Umesh Patil.', NULL, 'MAHARASHTRA', 'manishaagro@yahoo.in', 'ATAIYA', '', '', 'No.152, North kasba, Mahatma Gandhi Road, Solapur- 413002.', 'Manisha Agro Sciences.', 'India', '', NULL, '9423589770', 'Mrs. Rohini Umesh Patil.', NULL, '', 'Word Mark', '', '', '', '', '01', 'Fertilizers', '', '', '', '', '', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(78, 106, 'Mr. Srinivas Bullabbai Nandamuri.', NULL, 'MAHARASHTRA', 'srinivas_orchid@yahoo.com', 'ORCHID GROUP OF INSTITUTIONS', '', '54', 'RL 180 , MIDC , Waluj , Aurangabad - 431136.', NULL, 'India', '', NULL, '9822017570', 'Mr. Srinivas Bullabbai Nandamuri.', NULL, '12-12-2019', '', 'Device', '', '', '', '41', 'Educational Services', 'Proposed To Be Used', '', '', 'Aurangabad', '12-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(79, 107, 'Mr .Haseen Atiulla Khan.', NULL, 'KARNATAKA', 'rainbowoffsetbgm@gmail.com', 'Simrancollection', '', '', '1582,Opposite Naurang Steel, Maruti Galli, Belgaum-590001', 'Simran Collection', 'India', '', NULL, '9158133555', 'Mr .Haseen Atiulla Khan.', NULL, '12-12-2019', 'Word Mark', '', '', '', '', '35', 'Display, distribution & supply of readymade garments', '', '18-04-2009', '', '', '12-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(80, 108, 'Mr. Darpan Narendra Sanghvi.', NULL, 'MAHARASHTRA', 'chhaya.jogadia@myglamm.com', '1] MyGlamm Superfood ,2] MyGlamm Probiotics', '', '', 'Sanghvi House, 105/2, Shivaji Nagar, Pune-411005.', ' Sanghvi Beauty & Technologies Pvt. Ltd.', 'India', NULL, NULL, '8779682286', 'Mr. Darpan Narendra Sanghvi.', NULL, '10-12-2019', '', '', '', '', '', '41', 'All Services', 'Proposed To Be Used', '', '', 'PUNE', '10-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(81, 109, 'Mr. Ganesh Tukaram Madaye.', NULL, 'MAHARASHTRA', 'kamalakantmadaye@yahoo.in', 'Sagar Sparsh-The Sea Touch', '', '', '676, Wairy Bhutanath, Malvan, Dist Sindhudurg Pin - 416606.', 'Sagar Sparsh-The Sea Touch', 'India', '', NULL, '9423833478', 'Mr. Ganesh Tukaram Madaye.', NULL, '13-12-2019', 'Word Mark', '', '', '', '', '43', 'CLASS PASTE', '', '27-12-2013', 'Mr. Ganesh Madaye', 'Sindhudurg', '13-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(82, 114, 'Malhari Tamanna Waghamare.', NULL, 'MAHARASHTRA', 'hindustanafs@rediffmail.com', 'MALTIFERT', '', '', 'At -Kolgiri Post - Sanmadi , Tal - Jath Dist - Sangli', 'HINDUSTAN AGRO FARM SOLUTION ', 'India', '', NULL, '9665189726 / 9422129', 'Malhari Tamanna Waghamare.', NULL, '16-12-2019', '', 'Device', '', '', '', '', 'All Type Fertilizer ,Plant Groth Regulator , and organic pesticicds', '', '11-12-2019 ', '', 'Sangli', '16-12-2019', '', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(83, 117, 'Mr. Deepak Girme.', NULL, 'MAHARASHTRA', '', '1)Andhashraddha Nirmoolan Samiti Maharashtra 2) Andhashraddha Nirmoolan Samiti ', '', '72', 'Tarangan Kunda Smruti Kendra 12 United Western Bank Colony Satara 415001.', 'Andhashraddha Nirmoolan Samiti Maharashtra ', 'India', NULL, '', '9561501115', 'Mr. Deepak Girme.', NULL, '17-12-2019', 'Word Mark', '', '', '', '', '45', 'Social Services ', '', '', '', '', '17-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(84, 119, 'Milind Vasant gonge', NULL, 'MAHARASHTRA', 'milindgonge@gmail.com', 'Gonge', '', '', 'Nehru chowk, sangamner, Ahmednager 414001', 'gonge cold drinks & lassi center', 'India', '', NULL, '9822855595', 'Milind Vasant gonge', NULL, '', '', 'Device', '', '', '', '35', 'cold drink & lassi center', '', '30-07-2018', '', '', '06-01-2020', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(85, 121, 'Mr. Sachin Rameshchandra Agrawal.', NULL, 'MAHARASHTRA', '', ' Farshiwala', '', '38', 'Neharu Nagar , Near Bus stop, Lakkadkot , Jalna - 431203.', 'Agrawal Ceremic City', 'India', '', NULL, '9422927912', 'Mr. Sachin Rameshchandra Agrawal.', NULL, '17-12-2019', 'Word Mark', '', '', '', '', '35', 'Trading and Supply Of Tiles , And Building Materials.', 'Proposed To Be Used', '', '', 'Jalna', '18-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(86, 122, ' Mr. Ludovico do Rosario Ferrao.', NULL, 'GOA', 'sunny.cow.villa@gmail.com', 'Sunny Cow', 'Thought', '59', 'Ferrao, H. No. 40, Raj Waddo, Mapusa,North Goa, Bardez, Goa 403507.', NULL, 'India', '', NULL, '9822589353', ' Mr. Ludovico do Rosario Ferrao.', NULL, '17-12-2019', '', 'Device', '', '', '', '43', 'Hotels & Restaurants', '', '24-01-2014 ', '', 'GOA', '17-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(87, 123, 'Mr KURAHIDALAM KILLEDAR', NULL, 'KARNATAKA', 'hgpolymers@yahoo.co.in', ' HG PROLEX', ' Thoughts', '', '#62/A,K,I,A,DB Honga , Industrial Area Honga Belgaum Karnataka-591156.', 'H. G. Polymer', 'India', '', NULL, '9379461410', 'Mr KURAHIDALAM KILLEDAR', NULL, '17-12-2019', '', 'Device', '', '', '', '17', 'PVC, HDPE, DRiP pipes', '', '22-07-2014', 'MR .killedar', 'BELGAUM', '17-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '3349986', 'Lalasaheb Anna Atole', 'MAH/2728/2016', 'trade_123_1578304375.jpg', 0),
(88, 124, 'Dr. Rajiv Mundada.', NULL, 'MAHARASHTRA', 'dr_mraj@yahoo.com', '', '', '', 'NEAR SHITALADEVI MANDIR', 'MUNDADA ENT & EYE CARE CENTER', 'India', '', NULL, '9325271730', 'Dr. Rajiv Mundada.', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(89, 125, 'Mr. Vinay Vasant Joshi.', NULL, 'MAHARASHTRA', 'eldarado_biotech@rediffmail.com', 'Ruhesta', '', '49', 'A -405, space Olympia,  Sutgirini Chowk , Aurangabad - 431003.', ' El-darado Biotech Pvt. Ltd.', 'India', NULL, NULL, '9822504135', 'Mr. Vinay Vasant Joshi.', NULL, '18-12-2019', 'Word Mark', '', '', '', '', '5', 'Pharmaceutical preparation ', 'Proposed To Be Used', '', 'Mr. Vinay Joshi', 'Aurangabad ', '18-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(90, 126, 'Mr. Deepak Pawani.', NULL, 'MAHARASHTRA', 'deepakparwani@gmail.com', 'SAHELI CREATIONS', '', '', 'NEAR SHITALADEVI MANDIRCITY JEWEL BASEMENT OPP. COMMON WEALTH BLDG., LAXMI ROAD, PUNE-411 030', 'SAHELI CREATIONS', 'India', '', NULL, '9823057209', 'Mr. Deepak Pawani.', NULL, '18-12-2019', '', 'Device', '', '', '', '25', 'Readymade Garments Dress Material Sarees Trading and M manufacturing', '', '01-07-2003', '', 'PUNE', '18-12-2019', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(91, 127, 'Mr. Amar Shelar, Mr. Ijaz Pathan', NULL, 'MAHARASHTRA', 'dirtcircuitpune@gmail.com', '1-Dirt Circuit 2- Flirt with Dirt', '', '', 'Sr No 610, 611, 618, 619 &644 Wadki Villege Tal Haveli Dist Pune 412308', 'Dirt Circuit', 'India', '', NULL, '', 'Mr. Amar Shelar', NULL, '18-12-2019', '', 'Device', '', '', '', '41', 'PROVIDING EDUCATION & TRAINING ; ENTERTAINMENT; SPORTING AND CULTURAL ACTIVITIES, EVENTS', '', '21-08-2019 ', 'Mr Ijaz Pathan', 'Pune', '18-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(92, 128, 'Mr. Amit Rajan Yadav.', NULL, 'MAHARASHTRA', 'ary5678@gmail.com', ' Sound And Beyond', '', '', '1708,A ,Shivaji Peth ,sakoli Corner, Kolhapur- 416012.', 'REFLEX AUDIO', 'India', '', NULL, '9890029568', 'Mr. Amit Rajan Yadav.', NULL, '', '', 'Device', '', '', '', '9', 'Audio system & speakers', '', '', ' AMIT RAJAN YADAV', '', '', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(93, 129, 'Mrs RANJANA RAJARAM POWAR', NULL, 'MAHARASHTRA', 'drpowarranjana@gmail.com', 'Umed Care Centre', '', '', 'SR. NO. 12, SUKHSAGAR NAGAR, KATRAJ, PUNE-411046.', 'Umed Care Centre', 'India', '', NULL, '8080053311', 'Mrs RANJANA RAJARAM POWAR', NULL, '18-12-2019', '', 'Device', '', '', '', '44', 'Health Care activities', '', '01-01-2006', 'Mrs. Ranjana Powar', 'pune', '18-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(94, 130, 'Mrs. RANJANA RAJARAM POWAR.', NULL, 'MAHARASHTRA', 'drpowarranjana@gmail.com', 'GLOBAL INSTITUTE OF VOCATIONAL AND PARAMEDICAL SCIENCE', '', '', 'R. NO. 11, BUILDING NO. A-1, FLAT NO. 404, LAKE TOWN CO-OERATIVE HOUSING SOCIETY, KATRAJ, PUNE-411046', 'SKILL EDUCATION TRAINING AND EMPOWERMENT', 'India', '', NULL, '8080053311', 'Mrs. RANJANA RAJARAM POWAR.', NULL, '18-12-2019', '', 'Device', '', '', '', '41', 'Education and Training', 'Proposed To Be Used', '', '', '', '18-12-2019', 'Service Providers', NULL, NULL, NULL, NULL, NULL, '', '', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(95, 132, 'Mr. Dinesh Gurunath Sangar.', NULL, 'MAHARASHTRA', 'srftcenter@gmail.com', 'S.R FLEECE & TERRY CENTRE', '', '25', '988/25, Yashwant Residency, Torana Nagar, Behind Hero Showroom, Sangli Road, Dist. Kolhapur, Ichalkaranji - 416115.', 'S.R Fleece & Terry Centre.', 'India', '', NULL, '9850945122', 'Mr. Dinesh Gurunath Sangar.', NULL, '06-01-2020', '', 'Device', '', '', '', '24', 'Ghongadi, Woolen Blankets, Fleece Blankets, Terry Towels & Turkish Towels', '', '17-01-2019', 'MR DINESH ', 'Kolhapur', '06-01-2020', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0),
(96, 133, 'Mr. Dinesh Gurunath Sangar.', NULL, 'MAHARASHTRA', 'srftcenter@gmail.com', 'MAHARASHTRA GHONGADI.', '', '', '988/25, Yashwant Residency, Torana Nagar, Behind Hero Showroom, Sangli Road, Dist. Kolhapur, Ichalkaranji - 416115.', 'S.R Fleece & Terry Centre.', 'India', '', NULL, '9850945122', 'Mr. Dinesh Gurunath Sangar.', NULL, '06-01-2020', '', 'Device', '', '', '', '24', 'Ghongadi, Woolen Blankets, Fleece Blankets, Terry Towels & Turkish Towels', '', '17-01-2019', '', '', '06-01-2020', 'Manufacturers and Traders', NULL, NULL, NULL, NULL, NULL, '', 'NA', 'Lalasaheb Anna Atole', 'MAH/2728/2016', NULL, 0);

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
(1, 2, '0', 1, 'Sandip', 'Powar', 'Kolhapur', 'lawprotectors.rm@gmail.com', '9372204078', '123', '819951', 'active', 'Admin', '2020-01-08 07:16:19', 1),
(2, 1, '0', 1, 'Rushikesh', 'Sir', 'Kop', 'md.lawprotectors@gmail.com', '9372204076', 'Law@2019', '873425', 'active', '', '2020-01-07 08:00:58', 1),
(37, 2, '9, 10, 11, 12', 2, 'ROHINI', 'DHERE', '', 'rohini.lawprotectors@gmail.com ', '9372204077', '123456', '324257', 'active', '53', '2020-01-08 06:42:00', 0),
(38, 2, '9, 10, 11, 12', 2, 'SWAPNIL', 'MAHALLE', '', 'lawprotectors.swapnil@gmail.com ', '9158288666', '123456', '591569', 'active', '53', '2019-12-31 05:16:00', 0),
(39, 2, '9', 4, 'BASHIRA', 'MUJAWAR', '', 'lawprotectors.bashira@gmail.com ', '9689297875', '123456', NULL, 'active', '52', '2019-12-24 06:54:29', 0),
(40, 2, '12', 4, 'ARCHANA', 'SHETE', '', 'lawprotectors.archana@gmail.com ', '9527768376', '123456', NULL, 'active', '52', '2019-12-24 06:54:39', 0),
(41, 1, '4, 5, 6, 7, 8', 2, 'DIPIKA', 'KADAM', '', 'dipika.lawprotectors@gmail.com', '9158133555', '123456', NULL, 'active', '1', '2020-01-07 07:45:30', 0),
(42, 1, '4, 5, 6, 7, 8', 2, 'SANDIP', 'POWAR', '', 'lawprotectors.rm@gmail.com', '9372274078', '123456', '425521', 'active', '2', '2020-01-08 06:29:39', 0),
(43, 1, '5, 6, 7, 8', 3, 'SANDEEP', 'POWAR', '', 'lawprotectors.sp@gmail.com', '9158877666', '123456', '183813', 'active', '2', '2020-01-01 08:47:56', 0),
(44, 1, '5, 6, 7, 8', 4, 'SWATI', 'BHOPLE', '', 'swati.bhopale78@gmail.com', '9373469613', '123456', '783036', 'active', '2', '2020-01-01 04:59:57', 0),
(45, 1, '6, 7', 3, 'PRAVIN', 'LOTE', '', 'pravinlote121@gmail.com ', '7083005714', '123456', NULL, 'active', '53', '2019-12-28 12:01:31', 0),
(46, 1, '1, 2, 3, 13', 2, 'SHRIKANT', 'SHEDGE', '', 'shrikant.lawprotectors@gmail.com', '9372274076', '123456', '845227', 'active', '2', '2020-01-07 06:59:48', 0),
(47, 1, '1, 13', 3, 'AKSHAY', 'MALSHIKHARE', '', 'lawprotectors.akshay@gmail.com ', '8408800076', '123456', NULL, 'active', '2', '2019-12-20 09:03:58', 0),
(48, 1, '2, 3, 13', 4, 'VARSHA', 'BORKAR', '', 'varsha.lawprotectors@gmail.com', '8007806291', '123456', NULL, 'active', '2', '2019-12-20 09:05:39', 0),
(49, 1, '4', 3, 'PREM', 'HALDANKAR', '', 'haldankar.prem@gmail.com ', '8007533423', '123456', NULL, 'active', '2', '2019-12-20 09:07:28', 0),
(50, 1, '5, 6, 7', 4, 'PRATIBHA', 'JADHAV', '', 'lawprotectors.kolhapur@gmail.com ', '9158622555', '123456', NULL, 'active', '2', '2019-12-20 09:09:37', 0),
(51, 1, '2', 3, 'RAKESH', 'DALVI', '', 'rakeshdalvi15@gmail.com', '8552900076', '123456', NULL, 'active', '52', '2019-12-24 06:55:23', 0),
(52, 1, '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13', 5, 'SURAJ', 'MISTRI', '', 'lawprotectors.suraj@gmail.com', '8983069938', 'adminlaw', '136623', 'active', '52', '2020-01-03 06:04:47', 0),
(53, 1, '1, 2, 3, 4, 5, 6, 7, 8, 13', 5, 'MILIND', 'PAWAR', '', 'lawprotectors.milind@gmail.com', '8983069938', 'adminlaw2', '351090', 'active', '53', '2020-01-07 04:45:09', 0),
(55, 1, '0', 6, 'Ms.AMITA', 'DHAGE', '', 'amitadhade.lawprotectors@gmail.com ', '9970572649', '123456', '161497', 'active', '1', '2020-01-07 07:57:08', 0),
(56, 1, '0', 6, 'MS. SHERON', 'JIMMY', '', 'lawprotectors.sharon@gmail.com', '7057018059', 'ADVSHERON', NULL, 'active', '1', '2019-12-30 05:54:25', 0),
(57, 1, '0', 6, 'ADV. LALA', 'ATHOLE', '', 'lawprotectors.lala@gmail.com', '9403699634', 'ADVLALA1', '342389', 'active', '1', '2020-01-07 07:46:46', 0),
(58, 1, '1', 5, 'Amol', 'Markad', '', 'lawprotectors.amol@gmail.com', '9371804076', 'Amol7767', '647519', 'active', '1', '2019-12-31 07:03:03', 0);

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
(173, 45, 7, 3, 53, '2019-12-28 12:01:31'),
(175, 58, 1, 5, 1, '2019-12-31 07:02:29'),
(176, 41, 4, 2, 1, '2020-01-07 07:45:30'),
(177, 41, 5, 2, 1, '2020-01-07 07:45:30'),
(178, 41, 6, 2, 1, '2020-01-07 07:45:30'),
(179, 41, 7, 2, 1, '2020-01-07 07:45:30'),
(180, 41, 8, 2, 1, '2020-01-07 07:45:30');

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
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `application_id` (`application_id`);

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
  MODIFY `application_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `law_appl_user_rel`
--
ALTER TABLE `law_appl_user_rel`
  MODIFY `user_rel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=971;

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
  MODIFY `copyright_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `law_doc_upload`
--
ALTER TABLE `law_doc_upload`
  MODIFY `upload_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `law_invoice`
--
ALTER TABLE `law_invoice`
  MODIFY `invoice_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `law_invoice_details`
--
ALTER TABLE `law_invoice_details`
  MODIFY `invoice_details_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `law_organization`
--
ALTER TABLE `law_organization`
  MODIFY `organization_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `law_otherservice`
--
ALTER TABLE `law_otherservice`
  MODIFY `otherservice_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `law_payment`
--
ALTER TABLE `law_payment`
  MODIFY `payment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `law_roll`
--
ALTER TABLE `law_roll`
  MODIFY `roll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `law_service`
--
ALTER TABLE `law_service`
  MODIFY `service_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `applicant_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `law_user`
--
ALTER TABLE `law_user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `law_user_branch_rel`
--
ALTER TABLE `law_user_branch_rel`
  MODIFY `rel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

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
-- Constraints for table `law_invoice`
--
ALTER TABLE `law_invoice`
  ADD CONSTRAINT `law_invoice_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `law_application` (`application_id`) ON UPDATE CASCADE;

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
