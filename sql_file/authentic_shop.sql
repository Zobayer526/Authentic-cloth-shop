-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 05:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authentic_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `name`, `mobile`, `email`, `city`, `zipcode`, `address`) VALUES
(1, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(2, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(3, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(4, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(5, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(6, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(7, 'surojit', '01817579013', 'golam@gmail.com', 'dhaka', 'adasd', 'fdsfsd'),
(8, 'surojit', '01817579013', 'golam@gmail.com', 'dhaka', 'adasd', 'fdsfsd'),
(9, 'rakib', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(10, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(11, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(12, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(13, 'khaledd', '01817579013', 'admin@gmail.com', 'tret', 'adasd', '423423'),
(14, 'khaled', '01817579013', 'mahmud@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(15, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(16, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(17, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(18, 'khaleddddd', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'panthapath'),
(19, 'khaled', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'fdsfsd'),
(20, 'rakib', '01817579013', 'admin@gmail.com', 'tret', 'adasd', 'hfghfg'),
(21, 'khaled', '01817579013', 'khaled@gmail.com', 'dhaka', 'adasd', 'sfsd sf'),
(22, 'khaled', '01817579013', 'rakibul900@gmail.com', 'dhaka', 'adasd', 'fsdfds fdsfdsf'),
(23, 'rakib', '01817579090', 'rakibul9200@gmail.com', 'dhaka', 'adasd', 'hfghf fg hfgh'),
(24, 'Rakib', '01817579000', 'rakibul9200@gmail.com', 'dhaka', 'adasd', 'fdsf sf sdfds'),
(25, 'Test', '01737328916', 'ibrahim.khalil39@diit.info', 'ghjghj', '547547', 'fhfh'),
(26, 'Test', '01737328916', 'mdibrahimk48@gmail.com', 'ghjghkg', '8658', 'ghdfg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `colorName` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `sId`, `product_id`, `productName`, `colorName`, `size`, `price`, `quantity`, `image`) VALUES
(15, '99oggd3pvsl886jisefev5fkl4', 1, 'Camera mine', '', '', 500, 1, 'upload/aef0b028a9.png'),
(2, 'sqot298tvtid139p05u3fv94q3', 3, 'flower', '', '', 90, 5, 'upload/ac235ac821.png'),
(16, '29l72c8k97rcv10p6da9gkna24', 1, 'Camera mine', '', '', 500, 1, 'upload/aef0b028a9.png'),
(40, 'nto3b7c0gjoa0scss2pgofc2l2', 3, 'flower', '', '', 90, 1, 'upload/ac235ac821.png'),
(45, 'oo8klsag1596ir0inguvnidv43', 3, 'flower', '', '', 90, 1, 'upload/ac235ac821.png'),
(46, 'domqcea96b6mpp32hklfg00p15', 4, 'samsun225', '', '', 4000, 1, 'upload/d797f7b6b6.jpg'),
(47, 'domqcea96b6mpp32hklfg00p15', 3, 'flower', '', '', 90, 1, 'upload/ac235ac821.png'),
(48, 'mkplpm75muus08ope60s9r7l27', 4, 'samsun225', '', '', 4000, 1, 'upload/d797f7b6b6.jpg'),
(49, '5bu9sdbmgdlmm6bsqdel6qc053', 4, 'samsun225', '', '', 4000, 1, 'upload/d797f7b6b6.jpg'),
(54, 'd0922m2aneam5h6dajkbps4csi', 43, 'check', NULL, NULL, 33, 2, 'upload/5da8be822d482-97.png'),
(55, 'd0922m2aneam5h6dajkbps4csi', 44, 'qweqw', 'White', 'midium', 23, 1, 'upload/5dab46d537ff5-91.jpg'),
(57, 'rb5odso63hq36kdo6he0722prc', 43, 'check', NULL, NULL, 33, 2, 'upload/5da8be822d482-97.png'),
(95, 'hb5fv1vc04oe0eqd8itatckdsr', 63, 'sdds', NULL, NULL, 100, 3, 'upload/5dd014f0a1a0d-40.jpg'),
(96, 'hb5fv1vc04oe0eqd8itatckdsr', 62, 'check', NULL, NULL, 100, 4, 'upload/5dd007f35f65c-61.jpg'),
(85, 'lf9cj5jgivhl7ckpvg1u4g72g2', 48, 'sdds', NULL, NULL, 23, 1, 'upload/5db32b8c3c0b0-0.png'),
(103, '5uetrfbq73qksg6nejf2fo0gdp', 46, 'coconut', NULL, NULL, 132, 1, 'upload/5db829fadceec-65.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(90, 'Traditional'),
(86, 'Festival'),
(97, 'Occational');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `colorName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `colorName`) VALUES
(1, 'White'),
(2, 'Green'),
(7, 'blackkk');

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE `compare` (
  `comId` int(11) NOT NULL,
  `cusId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobileNo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactid`, `name`, `mobileNo`, `email`, `body`, `status`, `date`) VALUES
(1, 'khaled', 'mahmud', 'ss@c.com', 'bbbbb', 1, '2017-02-13 11:28:07'),
(4, 'salauddin', 'rahman', 'kh@d.co', 'fdfdsagdfgdfg dfdafgsd dfgadfg', 1, '2017-02-13 17:50:39'),
(6, 'md khaled', '8976867', 'kh@d.co', 'yygbyhhb', 1, '2017-03-03 02:37:18'),
(7, 'khaled', '01817579013', 'rakibul9200@gmail.com', 'ffdgdfgdf', 1, '2019-10-23 14:44:34'),
(8, 'khaled', '01817579013', 'rakibul9200@gmail.com', 'your product is good', 0, '2019-11-05 21:25:10'),
(9, '87gg', '01817579013', 'admin@gmail.com', 'pp', 0, '2019-11-08 20:50:02'),
(10, '87gg', '01817579013', 'admin@gmail.com', 'pp', 0, '2019-11-08 20:54:51'),
(12, 'khaled', '01817579013', 'admin@gmail.com', 'drfgd', 1, '2019-11-08 20:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `city`, `district`, `zip`, `phone`, `email`, `password`) VALUES
(2, 'sha', 'sirajgong', 'comilla', 'bangladesh', '22', '016712245656', 'shawon@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `cus_order`
--

CREATE TABLE `cus_order` (
  `orderId` int(11) NOT NULL,
  `cusId` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cus_order`
--

INSERT INTO `cus_order` (`orderId`, `cusId`, `address_id`, `amount`, `payment_type`, `transaction_id`, `date`, `status`) VALUES
(21, 5, 6, 66, 'Cash', '', '2019-11-20 23:54:07', 2),
(22, 5, 6, 69, 'Cash', '', '2019-11-20 23:54:07', 2),
(23, 5, 7, 290.4, 'Bkash', '1098', '2019-10-23 17:33:31', 0),
(24, 5, 8, 290.4, 'Bkash', '1098', '2019-10-23 17:34:21', 0),
(25, 5, 9, 220, 'Bkash', '111', '2019-10-23 18:09:08', 0),
(26, 5, 10, 145.2, 'Cash', '', '2019-10-23 18:22:34', 1),
(27, 5, 11, 36.3, 'Cash', '', '2019-10-23 18:31:28', 2),
(28, 5, 12, 110, 'Bkash', '1098', '2019-10-23 18:48:25', 0),
(29, 5, 13, 36.3, 'Cash', '', '2019-10-23 18:49:56', 2),
(30, 6, 14, 36.3, 'Cash', '', '2019-10-23 18:51:53', 0),
(31, 5, 15, 110, 'Cash', '', '2019-10-23 18:53:58', 1),
(32, 6, 16, 36.3, 'Cash', '', '2019-10-23 19:00:19', 0),
(34, 3, 18, 25.3, 'Cash', '', '2019-11-13 01:24:12', 1),
(35, 3, 19, 110, 'Bkash', '12345', '2019-11-17 14:41:48', 0),
(36, 3, 20, 25.3, 'Bkash', '12345', '2019-11-29 06:30:32', 0),
(37, 19, 21, 145.2, 'Bkash', '1098', '2019-12-05 05:26:05', 0),
(38, 19, 22, 510.4, 'Bkash', '12345', '2019-12-06 22:35:03', 0),
(39, 12, 23, 290.4, 'Cash', '', '2019-12-24 21:40:06', 0),
(40, 12, 24, 50.6, 'Cash', '', '2019-12-24 23:27:58', 0),
(41, 1, 25, 440, 'Cash', '', '2020-10-02 17:06:55', 0),
(42, 0, 26, 352, 'Cash', '', '2020-10-02 19:02:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_order`
--

CREATE TABLE `delivery_order` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_order`
--

INSERT INTO `delivery_order` (`id`, `order_id`, `user_id`, `delivery_date`) VALUES
(6, 26, 20, '2019-12-24 18:00:00'),
(2, 22, 5, '2019-10-18 18:00:00'),
(3, 27, 10, '2019-11-13 18:00:00'),
(4, 21, 10, '2019-11-20 18:00:00'),
(5, 34, 5, '2019-10-04 18:00:00'),
(7, 31, 10, '2019-12-18 18:00:00'),
(8, 29, 5, '2019-12-29 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`) VALUES
(1, 'comilla'),
(2, 'noykhali'),
(5, 'dhaka'),
(6, 'Barishal'),
(7, 'Sirajgonj'),
(8, 'vola'),
(9, 'Rajshahi');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `colorName` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `productName`, `colorName`, `size`, `quantity`, `price`, `image`) VALUES
(1, 19, 43, 'gddg', 'black', 'small', 2, 100, 'upload/5dab46d537ff5-91.jpg'),
(2, 21, 42, 'dgdg', 'green', 'large', 3, 300, 'upload/5da8b90974d5d-32.png'),
(3, 5, 46, 'sweet', '', '', 2, 264, 'upload/5db00a3c8c6da-91.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `colorName` varchar(255) DEFAULT NULL,
  `cityName` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productName`, `cat_id`, `colorName`, `cityName`, `size`, `body`, `price`, `qty`, `image`, `status`) VALUES
(60, 'Sari of Tangail', 90, 'null', 'Tangail', 'null', 'Nice traditional sari ', 2000, 18, 'upload/5f7b66b8be133-71.jpg', 'active'),
(61, 'Tangail Cotton Jamdani Sari', 90, 'null', 'Tangail', 'null', 'Nice traditional sari', 2500, 200, 'upload/5f7b67628d9ab-94.jpg', 'active'),
(62, 'Dhakai Jamdani', 86, 'null', 'Dhaka', 'null', 'Dhakai Jamdani wondorfull sari', 3000, 12, 'upload/5f7b71259cd05-76.jpg', 'active'),
(63, 'Rakhine woolen sheets', 90, 'null', 'Rajshahi', 'null', 'Rakhine woolen sheets just wow', 1500, 1000, 'upload/wool-fabric_4.jpeg', 'active'),
(64, 'Khadi Punjabi of Comilla', 86, 'null', 'Comilla', 'null', 'Khadi Punjabi of Comilla is beautiful', 2500, 1000, 'upload/5f7b73701a7f5-0.jpg', 'active'),
(65, 'Nakshi Katha', 90, 'null', 'Comilla', 'null', 'Nakshi Katha is traditional', 3500, 70, 'upload/5f7cdac7002e1-50.jpg', 'active'),
(66, 'Nakshi Katha', 90, 'null', 'Comilla', 'null', 'Nakshi Katha is traditional', 3500, 70, 'upload/157763343_336575404457284_5418259336100846802_n.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `product_id`, `user_id`, `name`, `email`, `rating`, `review`, `created_at`) VALUES
(7, 69, '', 'Test', 'md@gmail.com', 4, 'Very Good', '2020-10-06 21:17:50'),
(8, 69, '21', 'Test', 'md@gmail.com', 5, 'Very Good Product', '2020-10-06 21:19:47'),
(9, 68, '21', 'Test', 'md@gmail.com', 4, 'Very Good Product', '2020-10-06 21:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `homeimg` varchar(255) DEFAULT NULL,
  `otherimg` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'inactive'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `homeimg`, `otherimg`, `status`) VALUES
(14, 'physics', 'upload/5dd8030f98e8b-49.jpg', NULL, 'active'),
(15, 'egg', 'upload/back.jpg', NULL, 'inactive'),
(13, 'Pain', 'upload/5dd802fc9718d-95.jpg', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `employeeid` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `typeofuser` varchar(255) DEFAULT 'general',
  `img` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `block` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `employeeid`, `address`, `city`, `country`, `zip`, `phone`, `email`, `password`, `typeofuser`, `img`, `role`, `block`) VALUES
(3, 'zobayer', NULL, 'dasdasd', 'dhaka', '', '', '', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', NULL, 0, '0'),
(5, 'staff', '00123', 'sfsdf', 'comilla', NULL, NULL, NULL, 'staff2@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff', NULL, 2, '0'),
(10, 'zobayer', 'a123', 'dgdfg dfg dfgdg dfg dfgd', 'comilla', NULL, NULL, NULL, 'staff@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff', NULL, 2, '0'),
(20, 'rakib', NULL, NULL, NULL, NULL, NULL, NULL, 'staff3@gmail.com', '202cb962ac59075b964b07152d234b70', 'staff', NULL, 2, '0'),
(21, 'manik', NULL, 'Rajshahi', 'Dhaka', 'Bangladesh', '6300', '01737328916', 'md@gmail.com', '202cb962ac59075b964b07152d234b70', 'General', 'upload/user/user.png', 1, '0'),
(22, 'Test', NULL, NULL, NULL, NULL, NULL, NULL, 'staff4@gmail.com', '202cb962ac59075b964b07152d234b70', 'Oly', NULL, 0, '0'),
(23, 'Raktim', NULL, 'Demra', 'Dhaka', 'Bangladesh', '1361', '01758421321', 'raktim@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'General', 'upload/user/user.png', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `wlist`
--

CREATE TABLE `wlist` (
  `wId` int(11) NOT NULL,
  `cusId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compare`
--
ALTER TABLE `compare`
  ADD PRIMARY KEY (`comId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cus_order`
--
ALTER TABLE `cus_order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `delivery_order`
--
ALTER TABLE `delivery_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `wlist`
--
ALTER TABLE `wlist`
  ADD PRIMARY KEY (`wId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `compare`
--
ALTER TABLE `compare`
  MODIFY `comId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cus_order`
--
ALTER TABLE `cus_order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `delivery_order`
--
ALTER TABLE `delivery_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `wlist`
--
ALTER TABLE `wlist`
  MODIFY `wId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compare`
--
ALTER TABLE `compare`
  ADD CONSTRAINT `compare_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
