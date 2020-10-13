-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 12:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `amount` float(8,2) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `del_id` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `DOB` datetime DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `pin_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `name`, `price`) VALUES
(1, 'Hyderabadi Biryani', 500.00),
(2, 'Rogan Josh', 800.00),
(3, 'Masala Dosa', 300.00),
(4, 'Pulao', 400.00),
(5, 'Pav Bhaji', 140.00),
(6, 'Cake', 560.00);

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `online_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `del_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `on_site`
--

CREATE TABLE `on_site` (
  `table_no` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_name`
--

CREATE TABLE `order_name` (
  `order_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `amount` float(8,2) DEFAULT NULL,
  `receipt_no` int(11) DEFAULT NULL,
  `food_id1` int(11) DEFAULT NULL,
  `food_id2` int(11) DEFAULT NULL,
  `food_id3` int(11) DEFAULT NULL,
  `food_id4` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`del_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`online_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `del_id` (`del_id`);

--
-- Indexes for table `on_site`
--
ALTER TABLE `on_site`
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_name`
--
ALTER TABLE `order_name`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `food_id1` (`food_id1`),
  ADD KEY `food_id2` (`food_id2`),
  ADD KEY `food_id3` (`food_id3`),
  ADD KEY `food_id4` (`food_id4`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `del_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `online_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_name`
--
ALTER TABLE `order_name`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `online`
--
ALTER TABLE `online`
  ADD CONSTRAINT `online_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_name` (`order_id`),
  ADD CONSTRAINT `online_ibfk_2` FOREIGN KEY (`del_id`) REFERENCES `delivery_boy` (`del_id`);

--
-- Constraints for table `on_site`
--
ALTER TABLE `on_site`
  ADD CONSTRAINT `on_site_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_name` (`order_id`);

--
-- Constraints for table `order_name`
--
ALTER TABLE `order_name`
  ADD CONSTRAINT `order_name_ibfk_1` FOREIGN KEY (`food_id1`) REFERENCES `food` (`food_id`),
  ADD CONSTRAINT `order_name_ibfk_2` FOREIGN KEY (`food_id2`) REFERENCES `food` (`food_id`),
  ADD CONSTRAINT `order_name_ibfk_3` FOREIGN KEY (`food_id3`) REFERENCES `food` (`food_id`),
  ADD CONSTRAINT `order_name_ibfk_4` FOREIGN KEY (`food_id4`) REFERENCES `food` (`food_id`),
  ADD CONSTRAINT `order_name_ibfk_5` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`cust_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
