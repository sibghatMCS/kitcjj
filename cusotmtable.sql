-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2014 at 11:24 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mateen_foods`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE IF NOT EXISTS `customer_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `delivery_address` mediumtext NOT NULL,
  `delivery_time` time NOT NULL,
  `delivery_date` date NOT NULL,
  `event` varchar(500) NOT NULL,
  `discount` float NOT NULL,
  `advance` float NOT NULL,
  `total` float NOT NULL,
  `fare_charges` float NOT NULL,
  `bbq_charges` float NOT NULL,
  `service_charges` float NOT NULL,
  `packing_charges` float NOT NULL,
  `comments` varchar(500) NOT NULL,
  `lunch_dinner` varchar(500) NOT NULL,
  `kg` int(11) NOT NULL,
  `guest` int(11) NOT NULL,
  `rate` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `customer_id`, `delivery_address`, `delivery_time`, `delivery_date`, `event`, `discount`, `advance`, `total`, `fare_charges`, `bbq_charges`, `service_charges`, `packing_charges`, `comments`, `lunch_dinner`, `kg`, `guest`, `rate`) VALUES
(5, 3, ' asdjhg ', '02:45:00', '2014-03-12', 'ukj', 10, 100, 2410, 100, 100, 100, 100, ' asdad dad sadasadadasdas a', 'Lunch', 0, 0, 0),
(6, 3, ' asdjhg ', '03:45:00', '2014-03-13', 'fsdfad sf dfdsffs', 0, 500, 5500, 500, 500, 500, 500, 'qwe qweq qwe qweq', 'dinner', 0, 0, 0),
(7, 1, ' dsfsdf ', '02:45:00', '2014-03-15', 'trterte', 500, 500, 7000, 500, 500, 500, 500, ' sfa sdfafsdfsfdsfsdf adfd', 'Lunch', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_detail`
--

CREATE TABLE IF NOT EXISTS `customer_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(500) NOT NULL,
  `desp` mediumtext NOT NULL,
  `qty` float NOT NULL,
  `daigh` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `main_order` int(11) NOT NULL,
  `party` int(11) NOT NULL,
  `customer_order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customer_order_detail`
--

INSERT INTO `customer_order_detail` (`id`, `item`, `desp`, `qty`, `daigh`, `amount`, `total`, `main_order`, `party`, `customer_order_id`) VALUES
(1, 'beef_briyani_service', 'beef_briyani_service', 10, 0, 0, 0, 0, 0, 6),
(2, 'beef', 'beef', 10, 0, 0, 0, 0, 0, 6),
(3, 'oli', 'oil', 5, 0, 0, 0, 0, 0, 6),
(4, 'rice', 'rice', 10, 0, 0, 0, 0, 0, 6),
(5, 'beef_briyani_service', 'beef_briyani_service', 15, 3, 400, 6000, 1, 0, 7),
(6, 'beef', 'beef', 15, 0, 0, 0, 0, 0, 7),
(7, 'oli', 'oil', 7.5, 0, 0, 0, 0, 0, 7),
(8, 'rice', 'rice', 15, 0, 0, 0, 0, 0, 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
