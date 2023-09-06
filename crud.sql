-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 06, 2023 at 12:19 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(2) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(20) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(1, 'Sahiwal'),
(2, 'Pakpattan'),
(5, 'Okara'),
(6, 'Khanewal');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(4) NOT NULL AUTO_INCREMENT,
  `course_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`) VALUES
(1, 'BSCS'),
(2, 'BSIT'),
(5, 'BBA'),
(6, 'MSC');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

DROP TABLE IF EXISTS `qualification`;
CREATE TABLE IF NOT EXISTS `qualification` (
  `qua_id` int(2) NOT NULL AUTO_INCREMENT,
  `qua_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`qua_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`qua_id`, `qua_name`) VALUES
(1, 'FSC(Pre-Medical)'),
(2, 'FSC(Pre-Engineering)'),
(3, 'Intermediate in Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

DROP TABLE IF EXISTS `student_data`;
CREATE TABLE IF NOT EXISTS `student_data` (
  `sid` int(4) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `lname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `dob` date DEFAULT NULL,
  `gender` tinyint(2) DEFAULT NULL,
  `cnic` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mobile_no` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `city_id` smallint(4) NOT NULL DEFAULT '0',
  `qua_id` int(4) NOT NULL DEFAULT '0',
  `total_marks` int(5) NOT NULL,
  `obtained` int(5) NOT NULL,
  `course_id` smallint(4) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`sid`, `fname`, `lname`, `dob`, `gender`, `cnic`, `email`, `mobile_no`, `address`, `city_id`, `qua_id`, `total_marks`, `obtained`, `course_id`) VALUES
(4, 'Hammad', 'Ali', '1995-06-26', 1, '09090-0000000-0', 'hammad@gmail.com', '+923015667677', 'Sahiwal', 1, 1, 9000, 7788, 2),
(6, 'Hammad', 'Ali', '2002-06-26', 1, '09000-0000000-0', 'hammad@gmail.com', '+923015667677', 'Sahiwal', 2, 1, 9000, 7788, 1),
(7, 'Zubair', 'Bhae', '1998-04-26', 1, '09090-0000000-0', 'zubair@gmail.com', '03015100135', 'ITVH Sahiwal', 2, 1, 9000, 7788, 2),
(8, 'Zubair', 'Bhae', '1998-04-26', 1, '09090-0000000-0', 'zubair@gmail.com', '03015100135', 'ITVH Sahiwal', 2, 1, 9000, 7788, 2),
(9, 'Haroon', 'Ali', '2005-06-26', 1, '09000-0000000-0', 'haroon@gmail.com', '0302888888888', 'Sahiwal', 2, 1, 90900, 7888, 1),
(10, 'Maryam', 'Nawaz', '2013-06-27', 2, '99999-9999999-9', 'maryam@gmail.com', '0092301510013', 'Sahiwal', 5, 1, 900, 677, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE IF NOT EXISTS `user_detail` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `uname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `fname`, `lname`, `uname`, `password`) VALUES
(1, 'Muhammad', 'Rizwan', 'rizwan@gmail.com', '123456'),
(2, 'Waqar', 'Bhatti', 'waqar@gmail.com', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
