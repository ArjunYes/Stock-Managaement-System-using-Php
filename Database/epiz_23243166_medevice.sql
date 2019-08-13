-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql303.byetcluster.com
-- Generation Time: Aug 13, 2019 at 05:26 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epiz_23243166_medevice`
--

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE IF NOT EXISTS `hospital` (
  `Hospital_id` int(30) NOT NULL,
  `Hospital_name` varchar(50) NOT NULL,
  `Contact_no` bigint(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  PRIMARY KEY (`Hospital_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`Hospital_id`, `Hospital_name`, `Contact_no`, `Location`) VALUES
(1, 'RenaiMedicity', 1234567890, 'Palarivattom'),
(2, 'Medicaltrust', 7894561235, 'Eranakulam'),
(3, 'MediccalCenter', 9874587458, 'Pipeline'),
(4, 'Jacobs', 9658745125, 'KEMPEGOWDA ROAD,'),
(6, 'KevinsDentalClinic', 7854785698, 'Vytila'),
(7, 'Lourde', 9497149596, 'New Jersey'),
(10, 'Sunrise', 8457896587, 'Kakkanad'),
(12, 'Newcalfornia', 9876567878, 'Newjersy');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_stock`
--

CREATE TABLE IF NOT EXISTS `hospital_stock` (
  `Hospital_id` int(30) NOT NULL,
  `Item_code` varchar(100) NOT NULL,
  `No_of_units` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_stock`
--

INSERT INTO `hospital_stock` (`Hospital_id`, `Item_code`, `No_of_units`) VALUES
(4, 'GRAPES123', 100),
(4, 'APPLE123', 305),
(1, 'ABCDEFGHIJKLMNO123', 20),
(1, 'GRAPES123', 50),
(1, 'APPLE123', 305),
(7, '1134', 100),
(10, 'QWERTY123', 3),
(7, 'QSERTY456', 7);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `Item_code` varchar(100) NOT NULL,
  `Item_name` varchar(100) NOT NULL,
  `Item_price` float(23,3) NOT NULL,
  `Company_name` varchar(200) NOT NULL,
  `Size1` int(100) NOT NULL,
  `Size2` int(100) NOT NULL,
  `Item_price_with_gst` float(30,3) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`Item_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_code`, `Item_name`, `Item_price`, `Company_name`, `Size1`, `Size2`, `Item_price_with_gst`, `date`) VALUES
('ABCDEFGHIJKLMNO123', 'Orange', 120.000, 'RVD', 25, 25, 138.000, '2019-02-16'),
('APPLE123', 'Apple', 100.000, 'Medevice', 20, 20, 115.000, '2019-01-10'),
('GRAPES123', 'GRAPES', 10.000, 'MILMA', 5, 5, 11.500, '2019-01-16'),
('1134', 'DiaryMilk', 530.000, 'Cadburry', 100, 100, 609.500, '2018-05-20'),
('QWERTY123', 'Guvava', 90.000, 'Techora', 54, 54, 103.500, '2019-08-15'),
('QSERTY456', 'Guvava', 90.000, 'Treseme', 54, 54, 103.500, '2019-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `office_stock`
--

CREATE TABLE IF NOT EXISTS `office_stock` (
  `Item_code` varchar(100) NOT NULL,
  `No_of_units` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office_stock`
--

INSERT INTO `office_stock` (`Item_code`, `No_of_units`) VALUES
('APPLE123', 120),
('GRAPES123', 400),
('ABCDEFGHIJKLMNO123', 100),
('1134', 40),
('QWERTY123', 2),
('QSERTY456', 3);

-- --------------------------------------------------------

--
-- Table structure for table `staff_details`
--

CREATE TABLE IF NOT EXISTS `staff_details` (
  `f_name` varchar(60) NOT NULL,
  `l_name` varchar(60) NOT NULL,
  `Staff_id` int(50) NOT NULL,
  `Staff_password` varchar(60) NOT NULL,
  `Staff_ph` bigint(100) NOT NULL,
  `Staff_address` varchar(100) NOT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`f_name`),
  UNIQUE KEY `Staff_id` (`Staff_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_details`
--

INSERT INTO `staff_details` (`f_name`, `l_name`, `Staff_id`, `Staff_password`, `Staff_ph`, `Staff_address`, `email_id`) VALUES
('Arjun', 'S', 1, 'syncmaster19', 8086697587, 'Vaniyam Parambil House \r\nEroor North \r\nThripunithura', 'ajs@gmail.com'),
('Sidharth', 'Santosh', 2, 'sid12', 9644654441, 'Punaparambil House\r\nEroor North PO\r\nThripunithura', 'sid@gmail.com'),
('Amal', 'MV', 3, 'amal123', 6789767898, 'K.V.N.TOWER, NO.9\r\n1 ST CROSS, NEAR MENAKA TALKIES', 'amalmattilil@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `staff_login`
--

CREATE TABLE IF NOT EXISTS `staff_login` (
  `Staff_id` int(50) NOT NULL,
  `Staff_password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_login`
--

INSERT INTO `staff_login` (`Staff_id`, `Staff_password`) VALUES
(1, 'abc'),
(2, 'abc2');

-- --------------------------------------------------------

--
-- Table structure for table `value_for_calc`
--

CREATE TABLE IF NOT EXISTS `value_for_calc` (
  `GST` float(30,3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `value_for_calc`
--

INSERT INTO `value_for_calc` (`GST`) VALUES
(12.000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
