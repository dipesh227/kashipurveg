-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: bybwrw6uurgujryuwdyz-mysql.services.clever-cloud.com:3306
-- Generation Time: Sep 21, 2022 at 12:32 PM
-- Server version: 8.0.22-13
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bybwrw6uurgujryuwdyz`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int NOT NULL,
  `ip_add` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `qty` int NOT NULL,
  `size` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `size`) VALUES
(1, '132.154.82.77', 1, '1'),
(2, '132.154.236.49', 1, '1'),
(1, '139.167.218.221', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int NOT NULL,
  `cat_title` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cat_desc` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'veg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(2, 'fru', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(3, 'org', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(4, 'in org', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(5, 'searfruits', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_sate` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_city` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_contect` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_address` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_img` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_sate`, `customer_city`, `customer_contect`, `customer_address`, `customer_img`, `customer_ip`) VALUES
(2, 'dipeshjoshi', 'dipeshjoshi228@gmail.com', '1', 'uttrakhand', 'khatima', '8630484930', 'kanjabag', 'Screenshot (54).png', '::1'),
(3, 'dipeshjoshi', 'dipeshjoshi228@gmail.com', '1', 'uttrakhand', 'khatima', '3', 'kanjabag', 'Screenshot (48).png', '::1'),
(5, 'dipak', 'dipeshjoshi228@gmail.com', '1', '2', '2', '2', '2', 'Dipeshjoshi.jfif', '::1'),
(6, 'a', 'dipeshjoshi228@gmail.com', 'a', 'a', 'a', '8', 'a', 'Screenshot (49).png', '::1'),
(7, 'q', 'dipeshjoshi228@gmail.com', 'q', 'q', 'q', '9', 'l', 'Screenshot (51).png', '::1'),
(8, 'po', 'dipeshjoshi228@gmail.com', '6', 'uttrakhand', 'khatima', '9888888745', 'kanjabag', 'Screenshot (53).png', '::1'),
(9, 'dip', 'dipeshjoshi228@gmail.com', '1', 'uttrakhand', 'k', '1', 'h', 'Annotation 2020-05-13 152059.png', '132.154.249.188'),
(10, 'Dipesh Joshi', 'dipeshjoshi227@gmail.com', 'FPN3Jg5MSN6jHmN', 'Uttarakhand', 'Khatima', '6', 'Kanjabag', 'IMG-20200908-WA0003.jpg', '132.154.249.188');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `due_amount` int NOT NULL,
  `invoice_no` int NOT NULL,
  `qty` int NOT NULL,
  `size` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `order_date` timestamp NOT NULL,
  `order_status` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(7, 4, 21, 589494837, 3, '2', '2020-09-07 07:04:13', 'complete'),
(6, 4, 10, 368405164, 1, '1', '2020-09-07 07:03:07', 'complete'),
(8, 4, 7, 2140718272, 1, '1', '2020-09-07 07:05:40', 'complete'),
(9, 4, 10, 2140718272, 1, '1', '2020-09-07 07:05:40', 'complete'),
(10, 4, 40, 1028707282, 4, '4', '2020-09-07 09:05:47', 'complete'),
(11, 4, 7, 1437003972, 1, '1', '2020-09-07 10:57:04', 'complete'),
(12, 5, 10, 1150642410, 1, '1', '2020-09-08 14:11:11', 'complete'),
(13, 5, 10, 728444927, 1, '1', '2020-09-10 11:11:56', 'complete'),
(14, 5, 7, 728444927, 1, '1', '2020-09-10 11:11:57', 'panding'),
(15, 9, 7, 2067985200, 1, '2', '2020-09-10 11:55:21', 'panding'),
(16, 9, 10, 2067985200, 1, '1', '2020-09-10 11:55:23', 'panding');

-- --------------------------------------------------------

--
-- Table structure for table `panding_order`
--

CREATE TABLE `panding_order` (
  `order_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `invoice_no` int NOT NULL,
  `prodect_id` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `qty` int NOT NULL,
  `size` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `order_states` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `panding_order`
--

INSERT INTO `panding_order` (`order_id`, `customer_id`, `invoice_no`, `prodect_id`, `qty`, `size`, `order_states`) VALUES
(7, 4, 589494837, '1', 3, '2', 'complete'),
(6, 4, 368405164, '2', 1, '1', 'complete'),
(8, 4, 2140718272, '1', 1, '1', 'complete'),
(9, 4, 2140718272, '2', 1, '1', 'complete'),
(10, 4, 1028707282, '2', 4, '4', 'complete'),
(11, 4, 1437003972, '1', 1, '1', 'complete'),
(12, 5, 1150642410, '2', 1, '1', 'complete'),
(13, 5, 728444927, '2', 1, '1', 'complete'),
(14, 5, 728444927, '1', 1, '1', 'panding'),
(15, 9, 2067985200, '1', 1, '2', 'panding'),
(16, 9, 2067985200, '2', 1, '1', 'panding');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int NOT NULL,
  `invoice_id` int NOT NULL,
  `amounts` int NOT NULL,
  `payment_mode` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ref_no` int NOT NULL,
  `payment_date` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `invoice_id`, `amounts`, `payment_mode`, `ref_no`, `payment_date`) VALUES
(1, 589494837, 21, '', 1, '2020-09-07'),
(2, 368405164, 10, '', 2, '2020-09-07'),
(3, 368405164, 10, '', 2, '2020-09-07'),
(4, 2140718272, 7, '', 1, '2020-09-07'),
(5, 2140718272, 10, '', 6, '2020-09-07'),
(6, 1028707282, 40, 'Bank Transfer', 87, '2020-09-07'),
(7, 589494837, 21, 'Select Option', 8, '2020-09-07'),
(8, 2140718272, 10, 'Select Option', 1, '2020-09-07'),
(9, 589494837, 21, 'Select Option', 8, '2020-09-07'),
(10, 1437003972, 7, 'Paypal', 2, '2020-09-07'),
(11, 589494837, 21, 'Bank Transfer', 1, '2020-09-07'),
(12, 1150642410, 10, 'Paypal', 1, '2020-09-08'),
(13, 728444927, 10, 'Paypal', 1, '2020-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `p_cat_id` int NOT NULL,
  `cat_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `products_title` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `products_img1` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `products_img2` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `products_img3` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_price` int NOT NULL,
  `product_desc` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_keyword` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `products_title`, `products_img1`, `products_img2`, `products_img3`, `product_price`, `product_desc`, `product_keyword`) VALUES
(1, 1, 1, 'dipesh', 'vegetables-752153.jpg', 'food-2203697.jpg', 'vegetables-1085063.jpg', 7, '<p>bvgjhjj</p>', 'veg'),
(2, 3, 2, 'hm', 'Screenshot (48).png', 'Screenshot (49).png', 'Screenshot (50).png', 10, '<p>qwertyuiop</p>', 'lk');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int NOT NULL,
  `p_cat_title` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `p_cat_desc` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'vegitabal', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(2, 'fruits', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(3, 'orgenic', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(4, 'inorgenic', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(5, 'sealnal furits', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int NOT NULL,
  `slidername` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `slider_image` mediumtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slidername`, `slider_image`) VALUES
(1, 'slider no 1', 'slider-0.jpg'),
(2, 'slider no 2', 'slider-1.jpg'),
(3, 'slider no 3', 'slider-2.jpg'),
(4, 'slider no 4', 'slider-3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_contect` (`customer_contect`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `panding_order`
--
ALTER TABLE `panding_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `panding_order`
--
ALTER TABLE `panding_order`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
