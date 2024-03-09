-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 07:51 AM
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
(1, 'employee', '1', 'whoyouknow', 'ชานชราที่ 5 3/4 ต.วอชิงตัน อ.จีน จ.โลก 11121', '0111111111', 'whoyouknow', '0', 'employee'),
(7, 'owner', '1', 'owner1', 'address test 111/111', '0222222222', 'IDLINE', 'gcode', 'owner');

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

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `name`, `address`, `telephone`, `status`, `point`, `line`) VALUES
(1, 'member2', 'dsadasd', '0666666666', 'employee', '5', ''),
(2, 'member3', 'fdsfesf', '0777777788', 'employee', '-5', ''),
(3, 'member1', 'test address 111/111 ', '0888888888', 'employee', '2', '');

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
(28, '2024-02-23 18:55:13', 'complete', 1, 1),
(30, '2024-02-23 18:56:38', 'complete', 1, 1),
(31, '2024-02-23 18:57:02', 'complete', 1, 1),
(32, '2024-02-23 18:57:53', 'complete', 1, 1),
(51, '2024-03-07 21:15:25', 'complete', 2, 1),
(59, '2024-03-09 11:00:07', 'incomplete', NULL, 7),
(60, '2024-03-09 13:20:09', 'incomplete', 3, 1);

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
(50, 10, 'L', '11', 38),
(51, 13, 'M', '11', 43),
(52, 10, 'M', '11', 44),
(53, 13, 'L', '12', 44),
(54, 9, 'S', '11', 45),
(55, 9, 'S', '11', 46),
(56, 13, 'S', '11', 47),
(57, 10, 'S', '11', 48),
(58, 10, 'S', '11', 49),
(59, 10, 'S', '11', 50),
(60, 13, 'S', '11', 51),
(61, 10, 'S', '11', 52),
(62, 13, 'S', '11', 53),
(63, 10, 'S', '11', 57),
(64, 15, 'S', '14', 59),
(65, 15, 'M', '14', 60),
(66, 16, 'S', '22', 60);

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
(13, 'ชาไทย', 'drink', 'ชาไทย.jpg'),
(14, 'ไข่มุก', 'topping', 'ไข่มุก.jpg'),
(15, 'นมชมพู', 'drink', 'นมชมพู.jpg'),
(16, 'โอวัลติน', 'drink', 'โอวัลติน.jpg'),
(17, 'โกโก้', 'drink', 'โกโก้.jpg'),
(18, 'ชาเขียวมะลิ', 'drink', 'ชาเขียวมะลิ.jpg'),
(19, 'ชาเขียวนม', 'drink', 'ชาเขียวนม.jpg'),
(20, 'กาแฟเย็น', 'drink', 'กาแฟเย็น.jpg'),
(21, 'นมสด', 'drink', 'นมสด.jpg'),
(22, 'บุก', 'topping', 'บุก.jpg'),
(23, 'ฟรุตตี้สลัด', 'topping', 'ฟรุตตี้สลัด.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` varchar(30) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `topping_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_id`, `mem_id`, `pro_id`, `datetime`, `status`, `employee_id`, `topping_id`) VALUES
(6, 1, 13, '2024-02-29 07:40:47', 'incomplete', 1, 11),
(7, 2, 16, '2024-03-09 13:25:11', 'incomplete', 1, 14);

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
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
