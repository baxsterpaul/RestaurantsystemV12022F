-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 10:54 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL,
  `photocat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`, `photocat`) VALUES
(1, 'Food nasi panjang lagi lagi lagi', 'food-nasi-panjang-lagi-lagi-lagi', 'Food_1650321138.jpg'),
(3, 'Other', 'Other', 'Other_1650321152.jpg'),
(19, 'Drink', 'Drink', 'Drink_1650325598.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(61, 38, 29, 1),
(62, 38, 30, 1),
(63, 39, 29, 1),
(64, 39, 31, 1),
(65, 40, 29, 1),
(66, 40, 30, 1),
(67, 41, 29, 1),
(68, 42, 31, 1),
(69, 42, 29, 1),
(70, 43, 30, 1),
(71, 43, 29, 1),
(72, 44, 29, 2),
(73, 44, 30, 1),
(74, 44, 27, 1),
(75, 45, 29, 1),
(76, 45, 30, 1),
(77, 46, 28, 1),
(78, 46, 30, 1),
(79, 47, 30, 1),
(80, 47, 31, 1),
(81, 48, 29, 2),
(82, 48, 27, 2),
(83, 49, 29, 1),
(84, 49, 27, 1),
(85, 50, 28, 1),
(86, 50, 31, 1),
(87, 51, 28, 1),
(88, 51, 30, 1),
(89, 52, 28, 2),
(90, 52, 30, 1),
(91, 53, 28, 1),
(92, 55, 27, 2),
(93, 55, 29, 2),
(94, 56, 28, 1),
(95, 56, 27, 1),
(96, 57, 28, 2),
(97, 57, 32, 2),
(98, 58, 28, 2),
(99, 58, 30, 2),
(100, 59, 28, 1),
(101, 59, 27, 1),
(102, 60, 27, 1),
(103, 61, 27, 2),
(104, 617, 30, 1),
(112, 69, 30, 1),
(113, 70, 31, 1),
(115, 72, 28, 1),
(116, 72, 29, 1),
(117, 72, 27, 1),
(118, 72, 30, 1),
(119, 73, 27, 1),
(120, 73, 30, 1),
(121, 73, 28, 1),
(122, 74, 28, 1),
(123, 75, 28, 1),
(124, 76, 27, 1),
(125, 77, 27, 1),
(126, 78, 27, 1),
(127, 79, 27, 1),
(128, 80, 28, 1),
(129, 81, 30, 1),
(130, 82, 27, 1),
(131, 83, 31, 1),
(132, 84, 27, 1),
(133, 85, 27, 1),
(134, 86, 28, 1),
(135, 86, 27, 1),
(136, 87, 28, 1),
(137, 88, 28, 1),
(138, 88, 30, 1),
(139, 90, 30, 1),
(140, 90, 28, 1),
(141, 91, 28, 1),
(142, 92, 28, 1),
(143, 92, 27, 1),
(144, 93, 27, 1),
(145, 94, 28, 1),
(146, 95, 28, 1),
(147, 95, 27, 1),
(148, 96, 29, 1),
(149, 97, 30, 8),
(150, 97, 29, 5),
(151, 98, 27, 1),
(152, 98, 28, 1),
(153, 99, 29, 1),
(154, 99, 30, 1),
(155, 100, 33, 1),
(156, 101, 29, 1),
(157, 102, 33, 1),
(158, 103, 29, 1),
(159, 103, 27, 1),
(160, 104, 29, 1),
(161, 104, 33, 1),
(162, 105, 29, 1),
(163, 106, 33, 1),
(164, 107, 29, 1),
(165, 108, 29, 1),
(166, 109, 29, 1),
(167, 109, 30, 1),
(168, 110, 29, 1),
(169, 110, 30, 1),
(170, 111, 29, 1),
(171, 111, 27, 1),
(172, 112, 29, 1),
(173, 112, 32, 1),
(174, 113, 29, 1),
(175, 113, 32, 1),
(176, 114, 27, 3),
(177, 115, 27, 1),
(178, 116, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` datetime NOT NULL,
  `counter` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`, `isActive`) VALUES
(27, 19, 'Teh Ais', '', 'teh-ais', 2, 'teh-ais_1650157054.jpg', '2022-06-26 00:00:00', 1, 1),
(28, 1, 'Nasi Ayam test longggg gggggg ggggggggggg  ggg', '', 'nasi-ayam-test-longggg-gggggg-ggggggggggg-ggg', 5, 'nasi-ayam-test-longggg-gggggg-ggggggggggg-ggg_1650157029.jpg', '2022-05-15 00:00:00', 1, 0),
(29, 1, 'Nasi Kukus', '', 'nasi-kukus', 5.5, 'nasi-kukus_1650157036.jpg', '2023-05-19 00:00:00', 1, 1),
(30, 19, 'Teh O Ais', '', 'teh-o-ais', 1, 'teh-o-ais_1650157068.jpg', '2022-06-13 00:00:00', 1, 1),
(31, 19, 'Teh Tarik', '', 'teh-tarik', 2.5, 'teh-tarik.jpg', '2022-04-17 00:00:00', 1, 1),
(32, 19, 'Teh O Panas', '', 'teh-o-panas', 1.5, 'teh-o-panas_1650157073.jpg', '2022-06-26 00:00:00', 1, 1),
(33, 3, 'Seketul Ayam', '', 'seketul-ayam', 3.5, 'seketul-ayam_1650157041.jpg', '2022-05-28 00:00:00', 1, 1),
(34, 3, 'Sepinggan Nasi', '', 'sepinggan-nasi', 1, 'sepinggan-nasi_1650157048.jpg', '0000-00-00 00:00:00', 0, 1),
(36, 0, 'lemon panas', '', 'lemon-panas', 2.8, '', '0000-00-00 00:00:00', 0, 1),
(37, 19, 'lemon madu', '', 'lemon-madu', 3, '', '0000-00-00 00:00:00', 0, 1),
(38, 0, 'test', '', 'test', 5, '', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` datetime NOT NULL,
  `nomeja` int(11) NOT NULL,
  `amount` double NOT NULL,
  `pay` int(2) NOT NULL,
  `salesamount` double NOT NULL,
  `ordertype` varchar(10) NOT NULL,
  `paymentype` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`, `nomeja`, `amount`, `pay`, `salesamount`, `ordertype`, `paymentype`) VALUES
(44, 13, '14.00', '2021-05-10 00:00:00', 0, 0, 0, 0, '', 0),
(45, 13, '6.50', '2020-05-11 00:00:00', 0, 0, 0, 0, '', 0),
(46, 13, '6.00', '2021-05-10 00:00:00', 0, 0, 0, 0, '', 0),
(47, 13, '3.50', '2021-05-10 00:00:00', 0, 0, 0, 0, '', 0),
(48, 13, '15.00', '2021-05-10 00:00:00', 0, 0, 0, 0, '', 0),
(49, 13, '7.50', '2021-05-12 00:00:00', 0, 10, 2, 0, '', 0),
(50, 13, '7.50', '2021-06-22 00:00:00', 26, 10, 2, 0, '', 0),
(51, 18, '6.00', '2022-01-06 00:00:00', 6, 50, 2, 0, '', 0),
(52, 18, '11.00', '2022-01-06 00:00:00', 0, 0, 0, 0, '', 0),
(53, 18, '5.00', '2022-01-06 00:00:00', 0, 0, 0, 0, '', 0),
(54, 18, '5.00', '2022-01-06 00:00:00', 0, 0, 0, 0, '', 0),
(55, 18, '15.00', '2022-01-06 00:00:00', 0, 0, 0, 0, '', 0),
(56, 18, '7.00', '2022-01-06 00:00:00', 2, 50, 2, 0, '', 0),
(57, 18, '13.00', '2022-01-06 00:00:00', 0, 0, 0, 0, '', 0),
(58, 18, '12.00', '2022-01-06 00:00:00', 0, 0, 0, 0, '', 0),
(59, 18, '7.00', '2022-02-11 00:00:00', 0, 10, 2, 0, '', 0),
(60, 18, '2.00', '2022-03-06 00:00:00', 0, 0, 0, 0, '', 0),
(61, 18, '4.00', '2022-03-06 00:00:00', 0, 0, 0, 0, '', 0),
(69, 321, '1.00', '2022-03-06 11:31:39', 0, 0, 0, 0, '', 0),
(70, 321, '2.50', '2022-03-06 11:52:46', 1, 0, 0, 0, '', 0),
(72, 18, '13.50', '2022-03-06 16:43:07', 2, 20, 2, 0, '', 0),
(73, 18, '8.00', '2022-03-19 20:20:31', 2, 10, 2, 0, '', 0),
(74, 18, '5.00', '2022-03-19 20:27:23', 0, 0, 0, 0, '', 0),
(75, 18, '5.00', '2022-03-19 20:28:33', 0, 0, 0, 0, '', 0),
(76, 18, '2.00', '2022-03-19 20:29:52', 0, 0, 0, 0, '', 0),
(77, 18, '2.00', '2022-03-19 20:30:42', 0, 0, 0, 0, '', 0),
(78, 18, '2.00', '2022-03-19 20:35:35', 0, 0, 0, 0, '', 0),
(79, 18, '2.00', '2022-03-19 20:37:06', 0, 0, 0, 0, '', 0),
(80, 18, '5.00', '2022-03-19 20:38:18', 0, 0, 0, 0, '', 0),
(81, 18, '1.00', '2022-03-19 20:43:58', 0, 0, 0, 0, '', 0),
(82, 18, '2.00', '2022-03-19 20:46:41', 0, 0, 0, 0, '', 0),
(83, 18, '2.50', '2022-03-19 20:50:56', 0, 0, 0, 0, '', 0),
(84, 18, '2.00', '2022-03-19 20:56:28', 0, 0, 0, 0, '', 0),
(85, 18, '2.00', '2022-03-19 21:02:22', 2, 10, 2, 0, '', 0),
(86, 18, '7.00', '2022-03-29 23:51:28', 2, 10, 2, 0, '', 0),
(87, 18, '5.00', '2022-04-01 18:02:27', 2, 10, 2, 0, '', 0),
(88, 18, '6.00', '2022-04-02 23:33:04', 2, 10, 2, 0, '', 0),
(89, 18, '6.00', '2022-04-02 23:33:05', 0, 0, 0, 0, '', 0),
(90, 18, '6.00', '2022-04-11 20:47:42', 0, 0, 0, 0, '', 0),
(91, 18, '5.00', '2022-04-13 06:12:38', 2, 5, 2, 0, '', 0),
(92, 18, '7.00', '2022-04-13 06:25:25', 2, 7, 2, 0, '', 0),
(93, 18, '2.00', '2022-04-13 06:35:49', 2, 2, 2, 0, '', 0),
(94, 18, '5.00', '2022-04-13 07:11:06', 2, 10, 2, 0, '', 0),
(95, 18, '7.00', '2022-04-14 02:54:46', 2, 10, 2, 0, '', 0),
(96, 321, '5.50', '2022-04-14 22:42:03', 1, 5.5, 2, 0, '', 0),
(97, 18, '35.50', '2022-04-14 23:36:07', 2, 40, 2, 0, '', 0),
(98, 18, '7.00', '2022-04-18 12:08:22', 0, 0, 1, 0, '', 0),
(99, 18, '6.50', '2022-04-19 06:00:52', 0, 0, 0, 0, '', 0),
(100, 18, '3.50', '2022-04-29 01:38:41', 2, 3.5, 2, 0, '', 0),
(101, 18, '5.50', '2022-04-29 01:40:38', 0, 0, 0, 0, '', 0),
(102, 18, '3.50', '2022-05-21 21:49:49', 0, 0, 0, 0, 'takeaway', 0),
(103, 321, '7.50', '2022-05-22 12:53:42', 0, 0, 0, 0, 'dinein', 0),
(104, 18, '9.00', '2022-05-28 20:54:34', 0, 0, 0, 0, 'dinein', 0),
(105, 18, '5.50', '2022-05-28 23:20:51', 0, 0, 0, 0, '', 0),
(106, 18, '3.50', '2022-05-28 23:42:34', 0, 0, 0, 0, 'takeaway', 0),
(107, 18, '5.50', '2022-05-29 00:36:33', 0, 0, 0, 0, 'takeaway', 0),
(108, 18, '5.50', '2022-05-29 21:37:10', 0, 0, 0, 0, 'takeaway', 0),
(109, 321, '6.50', '2022-06-13 17:30:46', 0, 0, 0, 0, 'dinein', 0),
(110, 18, '6.50', '2022-06-14 01:44:08', 2, 6.5, 2, 0, 'dinein', 0),
(111, 18, '7.50', '2022-06-19 20:53:49', 0, 0, 4, 0, 'dinein', 0),
(112, 18, '7.00', '2022-06-19 22:48:20', 2, 10, 2, 0, '', 0),
(113, 18, '7.00', '2022-06-26 21:04:27', 0, 0, 4, 0, 'dinein', 0),
(114, 18, '6.00', '2022-06-26 22:16:27', 2, 10, 2, 0, 'dinein', 2),
(115, 18, '2.00', '2022-06-26 22:50:12', 0, 0, 0, 0, 'dinein', 0),
(116, 18, '5.50', '2023-01-09 00:26:43', 2, 10, 2, 0, 'dinein', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(12) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `slide_slug` varchar(150) CHARACTER SET latin1 NOT NULL,
  `photoslide` varchar(200) CHARACTER SET latin1 NOT NULL,
  `no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `name`, `slide_slug`, `photoslide`, `no`) VALUES
(58, 'test', 'test', 'test_1652620833.jpg', 1),
(64, 'test2', 'test2', 'test2_1652621909.jpg', 2),
(65, 'test3', 'test3', 'test4_1652622770.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL,
  `token` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`, `token`) VALUES
(1, 'admin@admin.com', '$2y$10$dwLWFB1V.xS7pzTnHRIfh.URYta1tF77Mfjw2eyAqxnI9mwQtG1iG', 1, 'Admin', '@', '', '', 'gambar.png', 1, '', '', '2018-05-01', '899248'),
(13, 'badrulaminz.aj@gmail.com', '$2y$10$ooEgizZHOSQ5pt.4GmlVJewkbqrQyinCkEHwGTQ3Q7Xb0Gnb99kU2', 0, 'Meja ', '25', '', '', '', 1, '1Q3bWdPRlguX', '', '2021-04-23', '332933'),
(16, 'meja25@bertam.com', '$2y$10$ooEgizZHOSQ5pt.4GmlVJewkbqrQyinCkEHwGTQ3Q7Xb0Gnb99kU2', 0, 'meja', '26', '', '', '', 1, '', '', '2022-05-02', ''),
(17, 'Meja1@gmail.com', '$2y$10$kdYX3cxLQ0rlae85DkLLfOcNP/yJVa6olvqmFWPSh1WES2sVE0PSy', 0, 'Meja ', '1', '', '', '', 1, 'sem3TISth68b', '', '2022-01-06', '121643'),
(18, 'Meja2@gmail.com', '$2y$10$xzykd6tXdnuqIvDT0ElU9O5.SXhx7F1ANCHB1rNDyWVc6nMlQ3Nhi', 0, 'Meja ', '2', '', '', '', 2, 'Hl2nXZaOfE6Y', '', '2022-01-06', '890018'),
(50, 'admin@kitchen.com', '$2y$10$ooEgizZHOSQ5pt.4GmlVJewkbqrQyinCkEHwGTQ3Q7Xb0Gnb99kU2', 3, 'Kitchen', '1', '', '', '', 1, '', '', '2021-02-01', '102291'),
(321, 'admin@counter.com', '$2y$10$xzykd6tXdnuqIvDT0ElU9O5.SXhx7F1ANCHB1rNDyWVc6nMlQ3Nhi', 2, 'Counter', '1', '', '', '', 1, 'Hl2nXZaOfE6Y', '', '2021-07-01', '937903'),
(322, 'Meja6@gmail.com', '$2y$10$OY3rLxq94bHOJxvPRcRFg.YY7n4p32L6lTlByzd1Vefwagx5/Hd9G', 0, 'Meja ', '6', '', '', '', 1, 'kafNgHpCclYw', '', '2022-04-13', ''),
(323, 'Meja7@gmail.com', '$2y$10$fEZNC6ivqx/4U4FQNYN8zeylAa15tnKTI65tCVu6KMZcQHZJnU5sO', 0, 'Meja ', '7', '', '', '', 0, 'PmoLeuVkSI9r', '', '2022-04-13', '936971'),
(324, 'MyFavRestaurant@gmail.com', 'Default', 4, 'Minz IT Solution', 'Sdn Bhd', 'no 11, Lorong Taman Ramal 3, Taman Ramal Indah, 32400, Kajang, Selangor', '0127832905', 'favicon.png', 1, '', '', '2022-06-13', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
