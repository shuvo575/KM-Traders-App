-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 15, 2019 at 12:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makor4sha_kmtraders`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_phone` varchar(16) NOT NULL,
  `customer_address` varchar(500) NOT NULL,
  `customer_datetime` varchar(100) NOT NULL,
  `total_due` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customer_id`, `customer_name`, `customer_phone`, `customer_address`, `customer_datetime`, `total_due`) VALUES
(1, 'Sohag Hasan', '01722214864', 'keranigonj', 'Friday, 24th Aug 2018, 3:14 am', 0),
(2, 'Jahid Hasan', '01798697432', 'Dhaka', 'Friday, 24th Aug 2018, 4:02 am', 0),
(3, 'Naim Mia', '01716808655', 'Katiadi', 'Friday, 24th Aug 2018, 4:03 am', 0),
(4, 'Nayan Vai', '01725941927', 'Miohammadpur', 'Friday, 24th Aug 2018, 4:04 am', 0),
(5, 'Labonyo', '01725486947', 'Arshinogor', 'Friday, 24th Aug 2018, 11:34 am', 0),
(7, 'Shan', '01627958450', 'Ghatarchor', 'Tuesday, 28th Aug 2018, 12:15 am', 0),
(10, 'Roton Mia', '01521432490', 'bagrasit', 'Sunday, 26th Aug 2018, 10:44 pm', 0),
(11, 'Babul mia', '7951234562', '58 weymouthdrive, Weymouth Drive, Chafford Hundred', 'Sunday, 26th Aug 2018, 10:50 pm', 0),
(12, 'sfsdg', '0176598352', 'sdgsdg', 'Sunday, 26th Aug 2018, 11:16 pm', 0),
(13, 'Jahid', '02113251432', 'weymouth drive', 'Thursday, 30 Aug 2018, 12:26 am', 0),
(14, 'test', '0182594183', 'test test test', 'Thursday, 30 Aug 2018, 3:25 am', 0),
(15, 'Faruk traders', '+8801750804141', 'Katiadi bazzar,college road', 'Monday, 03 Sep 2018, 12:05 am', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_datetime` varchar(200) NOT NULL,
  `invoice_total` int(11) NOT NULL,
  `invoice_discount` int(11) NOT NULL,
  `invoice_paid` int(11) NOT NULL,
  `order_placed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `customer_id`, `invoice_datetime`, `invoice_total`, `invoice_discount`, `invoice_paid`, `order_placed`) VALUES
(1, 1, '', 0, 0, 0, 0),
(2, 1, '', 0, 0, 0, 0),
(3, 3, 'Wednesday, 29th Aug 2018, 2:35 am', 0, 0, 0, 0),
(4, 5, 'Wednesday, 29th Aug 2018, 2:38 am', 6000, 65, 6000, 0),
(5, 10, 'Wednesday, 29th Aug 2018, 2:40 am', 14844, 0, 0, 0),
(6, 11, 'Wednesday, 29th Aug 2018, 2:46 am', 37000, 400, 2200, 0),
(7, 7, 'Wednesday, 29th Aug 2018, 2:50 am', 13200, 300, 13000, 0),
(8, 4, 'Wednesday, 29th Aug 2018, 3:03 am', 13450, 500, 12000, 0),
(9, 12, 'Wednesday, 29th Aug 2018, 5:23 am', 20780, 0, 0, 0),
(10, 10, 'Wednesday, 29th Aug 2018, 3:55 pm', 11000, 400, 6000, 0),
(11, 1, 'Thursday, 9th Aug 2018, 9:50 pm', 7400, 0, 7400, 0),
(12, 10, 'Wednesday, 29th Aug 2018, 10:59 pm', 7000, 400, 3000, 0),
(13, 1, 'Wednesday, 01 Aug 2018, 11:41 pm', 300, 300, 0, 0),
(14, 1, 'Wednesday, 01 Aug 2018, 11:43 pm', 1000, 0, 0, 0),
(15, 13, 'Thursday, 30 Aug 2018, 12:56 am', 2775, 0, 0, 0),
(16, 14, 'Thursday, 30 Aug 2018, 3:25 am', 10000, 5, 10000, 0),
(17, 14, 'Thursday, 30 Aug 2018, 3:26 am', 2700, 75, 2700, 0),
(18, 14, 'Thursday, 30 Aug 2018, 3:27 am', 12850, 15, 2000, 0),
(19, 1, 'Sunday, 23 Dec 2018, 1:59 pm', 1500, 0, 1500, 0),
(20, 1, 'Sunday, 23 Dec 2018, 2:03 pm', 1370, 0, 500, 0),
(21, 1, '', 5000, 60, 5000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `invoice_details_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_rate` int(11) NOT NULL,
  `product_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `product_quantity`, `product_rate`, `product_total`) VALUES
(10, 1, 3, 5, 40, 200),
(11, 1, 2, 0, 700, 0),
(12, 2, 3, 1, 40, 40),
(13, 2, 2, 0, 700, 0),
(14, 3, 2, 2, 700, 1400),
(15, 3, 3, 5, 40, 200),
(16, 4, 6, 1, 65, 65),
(17, 4, 5, 5, 1200, 6000),
(18, 5, 3, 12, 37, 444),
(19, 5, 5, 12, 1200, 14400),
(20, 6, 3, 60, 40, 2400),
(21, 6, 2, 50, 700, 35000),
(22, 7, 6, 30, 50, 1500),
(23, 7, 5, 10, 1200, 12000),
(24, 8, 6, 30, 65, 1950),
(25, 8, 5, 10, 1200, 12000),
(26, 9, 2, 12, 700, 8400),
(27, 9, 3, 72, 40, 2880),
(28, 9, 5, 7, 1200, 8400),
(29, 9, 6, 22, 50, 1100),
(30, 10, 2, 10, 700, 7000),
(31, 10, 3, 50, 40, 2000),
(32, 10, 5, 2, 1200, 2400),
(33, 11, 3, 200, 37, 7400),
(34, 11, 7, 0, 25, 0),
(35, 12, 3, 200, 37, 7400),
(36, 13, 4, 50, 12, 600),
(37, 14, 2, 2, 500, 1000),
(38, 15, 1, 5, 555, 2775),
(39, 16, 1, 10, 555, 5550),
(40, 16, 2, 3, 500, 1500),
(41, 16, 3, 15, 37, 555),
(42, 16, 4, 200, 12, 2400),
(43, 17, 1, 5, 555, 2775),
(44, 18, 1, 3, 555, 1665),
(45, 18, 6, 10, 65, 650),
(47, 18, 4, 800, 12, 9600),
(48, 18, 6, 50, 65, 3250),
(49, 19, 2, 3, 500, 1500),
(50, 20, 2, 2, 500, 1000),
(51, 20, 3, 10, 37, 370),
(52, 21, 6, 4, 65, 260),
(53, 21, 5, 4, 1200, 4800);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_due`
--

CREATE TABLE `invoice_due` (
  `invoice_due_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `payment_date` varchar(200) NOT NULL,
  `due` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_rate` int(11) NOT NULL,
  `product_unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_quantity`, `product_rate`, `product_unit`) VALUES
(1, '', 37, 555, 'KG'),
(2, 'Cements', 2, 500, 'Bag'),
(3, 'ROD', 475, 37, 'KG'),
(4, 'Bricks', 0, 12, 'Piece'),
(5, 'Tejpata', 11, 1200, 'KG'),
(6, 'books', 11, 65, 'Piece'),
(7, 'Doll', 45, 25, 'Pcs'),
(8, 'BSRM 10mm', 0, 0, 'Kg'),
(9, 'BSRM 12mm', 0, 0, 'Kg'),
(10, 'BSRM 8mm', 0, 0, 'Kg'),
(11, 'BSRM 16mm', 0, 0, 'Kg'),
(12, 'BSRM 20mm', 0, 0, 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `shipment_id` int(11) NOT NULL,
  `shipment_datetime` varchar(200) NOT NULL,
  `shipment_note` varchar(500) NOT NULL,
  `shipment_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`shipment_id`, `shipment_datetime`, `shipment_note`, `shipment_total`) VALUES
(1, '0', '0', 0),
(2, 'Monday, 27th Aug 2018, 11:04 pm', 'Test', 0),
(3, 'Tuesday, 4th Sep 2018, 11:09 pm', 'Test', 0),
(4, 'Friday, 20th Apr 2018, 11:09 pm', 'Test', 0),
(5, 'Thursday, 16th Aug 2018, 11:19 pm', 'New Shipment', 0),
(6, 'Monday, 27th Aug 2018, 11:19 pm', 'Rod', 0),
(7, 'Sunday, 16th Sep 2018, 11:33 pm', 'Test 5', 47000),
(8, 'Wednesday, 29th Aug 2018, 5:03 pm', 'Dhar koira ansi', 45000),
(9, 'Wednesday, 29th Aug 2018, 5:26 pm', 'Arekta shipment', 77300),
(10, 'Wednesday, 29th Aug 2018, 9:21 pm', 'Last check', 600),
(11, 'Wednesday, 29th Aug 2018, 9:22 pm', 'New Shipment', 15625),
(12, 'Wednesday, 5th Sep 2018, 9:24 pm', 'Ohho', 16500),
(13, 'Wednesday, 29th Aug 2018, 9:50 pm', 'backup', 18500);

-- --------------------------------------------------------

--
-- Table structure for table `shipment_details`
--

CREATE TABLE `shipment_details` (
  `shipment_details_id` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_rate` int(11) NOT NULL,
  `product_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment_details`
--

INSERT INTO `shipment_details` (`shipment_details_id`, `shipment_id`, `product_id`, `product_quantity`, `product_rate`, `product_total`) VALUES
(3, 4, 6, 10, 50, 500),
(4, 5, 3, 70, 35, 2450),
(5, 6, 3, 20, 40, 800),
(6, 7, 2, 50, 700, 35000),
(7, 7, 5, 10, 1200, 12000),
(8, 8, 1, 50, 350, 17500),
(9, 8, 2, 50, 550, 27500),
(10, 9, 1, 10, 555, 5550),
(11, 9, 2, 20, 720, 14400),
(12, 9, 3, 500, 30, 15000),
(13, 9, 4, 1000, 12, 12000),
(14, 9, 6, 50, 65, 3250),
(15, 9, 5, 20, 1200, 24000),
(16, 10, 7, 30, 20, 600),
(17, 11, 7, 25, 25, 625),
(18, 11, 2, 30, 500, 15000),
(19, 12, 3, 500, 33, 16500),
(20, 13, 3, 500, 37, 18500);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `status`) VALUES
(1, 'shuvo', '202cb962ac59075b964b07152d234b70', 1),
(2, 'naim', '202cb962ac59075b964b07152d234b70', 1),
(3, 'K.M.', '202cb962ac59075b964b07152d234b70', 1),
(4, 'Bsrm', 'd4a973e303ec37692cc8923e3148eef7', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`),
  ADD UNIQUE KEY `customer_phone` (`customer_phone`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`invoice_details_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `invoice_due`
--
ALTER TABLE `invoice_due`
  ADD PRIMARY KEY (`invoice_due_id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`shipment_id`);

--
-- Indexes for table `shipment_details`
--
ALTER TABLE `shipment_details`
  ADD PRIMARY KEY (`shipment_details_id`),
  ADD KEY `shipment_id` (`shipment_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `invoice_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `invoice_due`
--
ALTER TABLE `invoice_due`
  MODIFY `invoice_due_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `shipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shipment_details`
--
ALTER TABLE `shipment_details`
  MODIFY `shipment_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_details` (`customer_id`);

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`),
  ADD CONSTRAINT `invoice_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `invoice_due`
--
ALTER TABLE `invoice_due`
  ADD CONSTRAINT `invoice_due_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`);

--
-- Constraints for table `shipment_details`
--
ALTER TABLE `shipment_details`
  ADD CONSTRAINT `shipment_details_ibfk_1` FOREIGN KEY (`shipment_id`) REFERENCES `shipment` (`shipment_id`),
  ADD CONSTRAINT `shipment_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
