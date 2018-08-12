-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 12, 2018 at 12:02 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.1.18-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` longtext NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `cat_name`, `cat_description`, `created`) VALUES
(2, 'test 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s ', '2018-08-12 05:24:31'),
(3, 'test cat 2', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2018-08-12 05:24:31'),
(4, 'test cat 3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '2018-08-12 05:24:31'),
(5, 'test123', 'as', '2018-08-12 06:13:02'),
(6, 'vvvvvvv', 'cccccccc', '2018-08-12 06:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_description` longtext NOT NULL,
  `prod_price` float NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `prod_name`, `prod_description`, `prod_price`, `prod_image`, `category_id`, `created`) VALUES
(9, 'Test 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 50, '5b66ede907211-image--copy-5.png', 2, '2018-08-12 05:24:54'),
(10, 'Test 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 50, '5b66ee0924949-image-copy-4.png', 2, '2018-08-12 05:24:54'),
(11, 'Test 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 50, '5b66ee1575140-image--copy-3.png', 2, '2018-08-12 05:24:54'),
(12, 'aaa', 'ssss', 12, '5b6ef85f6cb4a-image--copy-6.png', 2, '2018-08-12 05:24:54'),
(13, 'aaaaa', 'sssssss', 12, '5b6ef917037aa-image--copy-5.png', 2, '2018-08-12 05:24:54'),
(14, 'sssssssss', 'wwwwwwwwww', 15, '5b6fc4b8f0a35-image--copy-5.png', 2, '2018-08-12 05:25:12'),
(15, 'yyyyyy', 'yyyyyyyyyyyy', 34, '5b6fc742ab5bb-image.png', 2, '2018-08-12 05:36:02'),
(16, 'iiiiiiiiiiiiiiiii', 'iiiiiiiiiiiiiiiiii', 78, '5b6fc76fbe226-image--copy-3.png', 2, '2018-08-12 05:36:47'),
(17, 'hhhh', 'ffffff', 67, '5b6fd458d0f79-image--copy-4.png', 6, '2018-08-12 06:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `created`) VALUES
(1, 'Tharindu Wickramasinghe', 'jhtw99@gmail.com', '1adbb3178591fd5bb0c248518f39bf6d', '2018-08-12 05:50:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
