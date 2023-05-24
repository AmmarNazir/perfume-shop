-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 03:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perfume_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) CHARACTER SET swe7 COLLATE swe7_swedish_ci NOT NULL,
  `product_image3` varchar(255) CHARACTER SET swe7 COLLATE swe7_swedish_ci NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special-offer` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special-offer`, `product_color`) VALUES
(1, 'men\'s fashion', 'men\'s', 'awesome fregrance', 'ÿØÿà\0JFIF\0\0`\0`\0\0ÿþ\0;CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 85\nÿÛ\0C\0	\Z!\Z\"$\"$ÿÛ\0CÿÀ\0\0á\0á\"\0ÿÄ\0\0\0\0\0\0', '????\0JFIF\0\0é\0é\0\0??\0;CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 85\n??\0C\0	\Z!\Z\"$\"$??\0C??\0\0?\0?\"\0??\0\0\0\0\0\0', '????\0JFIF\0\0é\0é\0\0??\0;CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 85\n??\0C\0	\Z!\Z\"$\"$??\0C??\0\0?\0?\"\0??\0\0\0\0\0\0', 'ÿØÿà\0JFIF\0\0`\0`\0\0ÿþ\0;CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 85\nÿÛ\0C\0	\Z!\Z\"$\"$ÿÛ\0CÿÀ\0\0á\0á\"\0ÿÄ\0\0\0\0\0\0', '199.90', 22, 'red'),
(2, 'men\'s fashion', 'men\'s', 'werwwerrrwrwr', 'file:///E:/xampp/htdocs/shop/assets/imgs/featured2.jpg', 'file:///E:/xampp/htdocs/shop/assets/imgs/featured2.jpg', 'file:///E:/xampp/htdocs/shop/assets/imgs/featured2.jpg', 'file:///E:/xampp/htdocs/shop/assets/imgs/featured2.jpg', '145.88', 22, 'white'),
(3, 'men\'s good', 'men\'s', 'rwewrwrwrwr', 'file:///E:/xampp/htdocs/shop/assets/imgs/featured3.jpg', 'file:///E:/xampp/htdocs/shop/assets/imgs/featured3.jpg', 'file:///E:/xampp/htdocs/shop/assets/imgs/featured3.jpg', 'file:///E:/xampp/htdocs/shop/assets/imgs/featured3.jpg', '234.90', 44, 'orange'),
(4, 'men\'s great', 'men', 'sdfsdfsdfsdfsdf', 'file:///E:/xampp/htdocs/shop/assets/imgs/featured4.jpg', 'file:///E:/xampp/htdocs/shop/assets/imgs/featured4.jpg', 'file:///E:/xampp/htdocs/shop/assets/imgs/featured4.jpg', 'file:///E:/xampp/htdocs/shop/assets/imgs/featured4.jpg', '430.98', 55, 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UK_Constarint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
