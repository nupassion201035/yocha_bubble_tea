-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 11:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yocha_tea`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `line_id` varchar(50) NOT NULL,
  `code_employee` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `username`, `password`, `name`, `address`, `telephone`, `line_id`, `code_employee`, `status`) VALUES
(1, 'dev_game', '12345678', 'whoyouknow', 'ชานชราที่ 5 3/4 ต.วอชิงตัน อ.จีน จ.โลก 11121', '0800000000', 'whoyouknow', '0', 'dev');

-- --------------------------------------------------------

--
-- Table structure for table `list_order`
--

CREATE TABLE `list_order` (
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `number` varchar(50) NOT NULL,
  `status_point` varchar(50) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_time` time NOT NULL,
  `status_payment` varchar(50) NOT NULL,
  `member_id` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `topping` varchar(50) NOT NULL,
  `queue` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL,
  `point` varchar(15) NOT NULL,
  `line` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(12) NOT NULL,
  `type` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `list_order`
--
ALTER TABLE `list_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `list_order`
--
ALTER TABLE `list_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
