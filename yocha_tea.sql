-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 10:10 PM
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
(1, 'employee', '1', 'whoyouknow', 'ชานชราที่ 5 3/4 ต.วอชิงตัน อ.จีน จ.โลก 11121', '0800000000', 'whoyouknow', '0', 'employee'),
(2, 'owner', '1', 'ttdfsf444444', 'fdsfesf', '343434', '0', '4234', 'owner'),
(4, 'ttt', 'dsad', 'dasd2', 'dasdasd', '23423', 'fsadasd', 'sdfsf', 'employee'),
(6, 'dev', '1', '12', '12', '12', '12', '12', '12');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `telephone` int(15) NOT NULL,
  `status` varchar(30) NOT NULL,
  `point` varchar(15) NOT NULL,
  `line` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `name`, `address`, `telephone`, `status`, `point`, `line`) VALUES
(1, 'test333333', 'dsadasd', 342323232, 'employee', '4', ''),
(2, 'ttdfsf', 'fdsfesf', 343434, 'active', '1', 'fsdfwef');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` varchar(30) NOT NULL,
  `mem_id` int(11) DEFAULT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `datetime`, `status`, `mem_id`, `employee_id`) VALUES
(17, '2024-02-23 03:24:57', 'incomplete', 0, 1),
(19, '2024-02-23 03:27:41', 'incomplete', 0, 1),
(20, '2024-02-23 03:28:09', 'incomplete', 0, 1),
(21, '2024-02-23 03:28:15', 'incomplete', 0, 1),
(22, '2024-02-23 03:29:42', 'incomplete', 0, 1),
(23, '2024-02-23 03:29:47', 'incomplete', 0, 1),
(24, '2024-02-23 03:30:05', 'incomplete', 0, 1),
(25, '2024-02-23 03:30:49', 'incomplete', 0, 1),
(26, '2024-02-23 03:31:59', 'incomplete', 0, 1),
(27, '2024-02-23 18:54:26', 'incomplete', 0, 1),
(28, '2024-02-23 18:55:13', 'incomplete', 1, 1),
(29, '2024-02-23 18:56:23', 'incomplete', 1, 1),
(30, '2024-02-23 18:56:38', 'incomplete', 1, 1),
(31, '2024-02-23 18:57:02', 'incomplete', 1, 1),
(32, '2024-02-23 18:57:53', 'incomplete', 1, 1),
(33, '2024-02-23 19:06:49', 'incomplete', 0, 1),
(34, '2024-02-23 19:06:51', 'incomplete', 0, 1),
(35, '2024-02-23 19:11:10', 'incomplete', 0, 1),
(36, '2024-02-23 19:14:09', 'incomplete', 34, 1),
(37, '2024-02-23 19:30:12', 'incomplete', 2, 1),
(38, '2024-02-27 22:21:39', 'incomplete', 0, 1),
(39, '2024-02-27 22:21:41', 'incomplete', 0, 1),
(40, '2024-02-27 22:21:43', 'incomplete', 0, 1),
(41, '2024-02-28 00:12:11', 'incomplete', 0, 1),
(42, '2024-02-28 00:12:35', 'incomplete', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderdetail_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `topping_id` varchar(50) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderdetail_id`, `pro_id`, `size`, `topping_id`, `order_id`) VALUES
(9, 10, 'M', '12', 17),
(10, 9, 'S', '12', 17),
(11, 10, 'M', '12', 19),
(12, 9, 'S', '12', 19),
(13, 10, 'M', '12', 20),
(14, 9, 'S', '12', 20),
(15, 10, 'M', '12', 21),
(16, 9, 'S', '12', 21),
(17, 10, 'M', '12', 22),
(18, 9, 'S', '12', 22),
(19, 10, 'L', '11', 22),
(20, 10, 'M', '12', 23),
(21, 9, 'S', '12', 23),
(22, 10, 'L', '11', 23),
(23, 10, 'M', '11', 23),
(24, 10, 'M', '12', 24),
(25, 9, 'S', '12', 24),
(26, 10, 'L', '11', 24),
(27, 10, 'M', '11', 24),
(28, 10, 'M', '12', 25),
(29, 9, 'S', '12', 25),
(30, 10, 'L', '11', 25),
(31, 10, 'M', '11', 25),
(32, 10, 'M', '12', 26),
(33, 9, 'S', '12', 26),
(34, 10, 'L', '11', 26),
(35, 10, 'M', '11', 26),
(36, 10, 'M', '11', 27),
(37, 9, 'M', '12', 27),
(38, 10, 'M', '11', 28),
(39, 9, 'M', '12', 28),
(40, 10, 'M', '11', 29),
(41, 9, 'M', '12', 29),
(42, 10, 'M', '11', 30),
(43, 9, 'M', '12', 30),
(44, 10, 'L', '11', 31),
(45, 9, 'M', '11', 31),
(46, 10, 'L', '11', 32),
(47, 9, 'M', '11', 32),
(48, 10, 'M', '11', 37),
(49, 10, 'M', '11', 38),
(50, 10, 'L', '11', 38);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `name`, `type`, `image`) VALUES
(9, 'kritsada', 'drink', 'ชานมไต้หวัน.jpg'),
(10, 'nomsod', 'drink', 'ชาเขียวมะลิ.jpg'),
(11, 'test', 'topping', 'บุก.jpg'),
(12, '32', 'topping', 'ฟรุตตี้สลัด.jpg'),
(13, 'tgtgt', 'drink', 'ชาไทย.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_id` int(11) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `point` varchar(20) NOT NULL,
  `promotion_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_id`, `discount`, `status`, `point`, `promotion_code`) VALUES
(1, '30', 'inactive', '30', ''),
(2, '30', 'inactive', '30', ''),
(3, '23', 'inactive', '12', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderdetail_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
