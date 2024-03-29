-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 04:14 PM
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
(2, 'member3', 'fdsfesf', '0777777788', 'employee', '3', ''),
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
(60, '2024-03-09 13:20:09', 'incomplete', 3, 1),
(61, '2024-03-24 13:59:46', 'complete', 2, 7),
(62, '2024-03-24 14:02:45', 'incomplete', 2, 7),
(63, '2024-03-24 14:04:59', 'incomplete', 2, 7),
(64, '2024-03-24 15:49:49', 'incomplete', NULL, 7),
(65, '2024-03-24 15:49:53', 'incomplete', NULL, 7),
(66, '2024-03-24 15:50:03', 'incomplete', NULL, 7),
(67, '2024-03-24 15:50:07', 'incomplete', NULL, 7),
(68, '2024-03-24 15:53:21', 'incomplete', NULL, 7),
(69, '2024-03-24 15:56:05', 'incomplete', NULL, 7),
(70, '2024-03-24 15:56:10', 'incomplete', NULL, 7),
(71, '2024-03-24 16:06:08', 'incomplete', NULL, 7),
(72, '2024-03-24 16:06:18', 'incomplete', NULL, 7),
(73, '2024-03-24 16:21:04', 'incomplete', NULL, 7),
(74, '2024-03-24 16:27:44', 'incomplete', NULL, 7),
(78, '2024-03-24 16:31:32', 'complete', NULL, 7),
(79, '2024-03-24 16:32:10', 'complete', NULL, 7),
(80, '2024-03-29 12:24:50', 'complete', NULL, 7),
(82, '2024-03-29 12:33:12', 'complete', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderdetail_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `topping_id` varchar(50) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderdetail_id`, `pro_id`, `size`, `topping_id`, `order_id`, `quantity`) VALUES
(9, 10, 'M', '12', 17, 0),
(10, 9, 'S', '12', 17, 0),
(11, 10, 'M', '12', 19, 0),
(12, 9, 'S', '12', 19, 0),
(13, 10, 'M', '12', 20, 0),
(14, 9, 'S', '12', 20, 0),
(15, 10, 'M', '12', 21, 0),
(16, 9, 'S', '12', 21, 0),
(17, 10, 'M', '12', 22, 0),
(18, 9, 'S', '12', 22, 0),
(19, 10, 'L', '11', 22, 0),
(20, 10, 'M', '12', 23, 0),
(21, 9, 'S', '12', 23, 0),
(22, 10, 'L', '11', 23, 0),
(23, 10, 'M', '11', 23, 0),
(24, 10, 'M', '12', 24, 0),
(25, 9, 'S', '12', 24, 0),
(26, 10, 'L', '11', 24, 0),
(27, 10, 'M', '11', 24, 0),
(28, 10, 'M', '12', 25, 0),
(29, 9, 'S', '12', 25, 0),
(30, 10, 'L', '11', 25, 0),
(31, 10, 'M', '11', 25, 0),
(32, 10, 'M', '12', 26, 0),
(33, 9, 'S', '12', 26, 0),
(34, 10, 'L', '11', 26, 0),
(35, 10, 'M', '11', 26, 0),
(36, 10, 'M', '11', 27, 0),
(37, 9, 'M', '12', 27, 0),
(38, 10, 'M', '11', 28, 0),
(39, 9, 'M', '12', 28, 0),
(40, 10, 'M', '11', 29, 0),
(41, 9, 'M', '12', 29, 0),
(42, 10, 'M', '11', 30, 0),
(43, 9, 'M', '12', 30, 0),
(44, 10, 'L', '11', 31, 0),
(45, 9, 'M', '11', 31, 0),
(46, 10, 'L', '11', 32, 0),
(47, 9, 'M', '11', 32, 0),
(48, 10, 'M', '11', 37, 0),
(49, 10, 'M', '11', 38, 0),
(50, 10, 'L', '11', 38, 0),
(51, 13, 'M', '11', 43, 0),
(52, 10, 'M', '11', 44, 0),
(53, 13, 'L', '12', 44, 0),
(54, 9, 'S', '11', 45, 0),
(55, 9, 'S', '11', 46, 0),
(56, 13, 'S', '11', 47, 0),
(57, 10, 'S', '11', 48, 0),
(58, 10, 'S', '11', 49, 0),
(59, 10, 'S', '11', 50, 0),
(60, 13, 'S', '11', 51, 0),
(61, 10, 'S', '11', 52, 0),
(62, 13, 'S', '11', 53, 0),
(63, 10, 'S', '11', 57, 0),
(64, 15, 'S', '14', 59, 0),
(65, 15, 'M', '14', 60, 0),
(66, 16, 'S', '22', 60, 0),
(67, 16, 'L', '14', 61, 0),
(68, 15, 'M', '14', 61, 0),
(69, 18, 'L', '14', 61, 0),
(70, 13, 'L', '14', 61, 0),
(71, 16, 'L', '14', 62, 0),
(72, 15, 'L', '14', 63, 0),
(73, 16, 'L', '14', 63, 0),
(74, 15, 'S', '22', 64, 0),
(75, 16, 'S', '22', 65, 0),
(76, 15, 'M', '14', 66, 0),
(77, 15, 'S', '22', 67, 0),
(78, 15, 'L', '14', 68, 0),
(79, 16, 'L', '14', 69, 0),
(80, 16, 'S', '22', 70, 0),
(81, 15, 'M', '14', 71, 0),
(82, 15, 'L', '14', 73, 0),
(83, 16, 'S', '14', 73, 0),
(84, 16, 'S', '22', 74, 4),
(85, 15, 'L', '14', 78, 2),
(86, 16, 'L', '14', 79, 3),
(87, 15, 'M', '14', 79, 2),
(88, 15, 'M', '22', 80, 3),
(89, 18, 'L', '14', 80, 1),
(90, 15, 'S', '14', 81, 0),
(91, 16, 'S', '22', 81, 0),
(92, 18, 'M', '14', 82, 3);

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

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
