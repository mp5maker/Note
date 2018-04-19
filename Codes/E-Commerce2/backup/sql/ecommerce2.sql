-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2018 at 08:44 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce2`
--



-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_session_id` char(32) NOT NULL,
  `product_type` enum('coffee','goodies') NOT NULL,
  `product_id` mediumint(8) UNSIGNED NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_session_id`, `product_type`, `product_id`, `quantity`, `date_created`, `date_modified`) VALUES
(1, 'c72454e8b6c94a471f849e349267a91a', 'goodies', 1, 10, '2018-04-14 07:43:40', '2018-04-14 07:48:19'),
(2, '416292647546638ad2f297a063503bc5', 'goodies', 1, 1, '2018-04-14 07:49:36', '0000-00-00 00:00:00'),
(3, '416292647546638ad2f297a063503bc5', 'coffee', 5, 6, '2018-04-14 07:49:47', '2018-04-14 07:53:55'),
(4, '416292647546638ad2f297a063503bc5', 'goodies', 2, 2, '2018-04-14 07:58:12', '2018-04-14 07:58:12'),
(5, 'd6f46961ae3b9c46155b910d4652ca05', 'goodies', 1, 1, '2018-04-14 07:59:41', '0000-00-00 00:00:00'),
(6, 'd6f46961ae3b9c46155b910d4652ca05', 'goodies', 2, 1, '2018-04-14 07:59:55', '0000-00-00 00:00:00'),
(7, 'd6f46961ae3b9c46155b910d4652ca05', 'coffee', 9, 3, '2018-04-14 08:00:03', '2018-04-14 08:00:50'),
(8, '634c516a188d213a5fc06fee3bb899ea', 'coffee', 6, 1, '2018-04-14 08:04:07', '0000-00-00 00:00:00'),
(9, '634c516a188d213a5fc06fee3bb899ea', 'goodies', 1, 1, '2018-04-14 08:04:17', '0000-00-00 00:00:00'),
(10, '634c516a188d213a5fc06fee3bb899ea', 'goodies', 2, 1, '2018-04-14 08:04:23', '0000-00-00 00:00:00'),
(11, '634c516a188d213a5fc06fee3bb899ea', 'coffee', 10, 1, '2018-04-14 08:04:31', '0000-00-00 00:00:00'),
(12, '634c516a188d213a5fc06fee3bb899ea', 'coffee', 8, 12, '2018-04-14 08:04:37', '2018-04-14 08:10:15'),
(26, 'e37e7e9e33975ec144194e2b621c8399', 'goodies', 1, 1, '2018-04-14 14:33:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(10) UNSIGNED NOT NULL,
  `charge_id` varchar(60) NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(18) NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `charge` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(80) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `address1` varchar(80) NOT NULL,
  `address2` varchar(80) DEFAULT NULL,
  `city` varchar(60) NOT NULL,
  `state` char(2) NOT NULL,
  `zip` mediumint(5) UNSIGNED ZEROFILL NOT NULL,
  `phone` char(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `general_coffees`
--

CREATE TABLE `general_coffees` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `category` varchar(40) NOT NULL,
  `description` tinytext,
  `image` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_coffees`
--

INSERT INTO `general_coffees` (`id`, `category`, `description`, `image`) VALUES
(1, 'Original Blend', 'Our original blend, featuring a quality mixture of bean and a medium roast for a rich color and smooth flavor.', 'original_coffee.jpg'),
(2, 'Dark Roast', 'Our darkest, non-espresso roast, with a full flavor and a slightly bitter aftertaste.', 'dark_roast.jpg'),
(3, 'Kona', 'A real treat! Kona coffee, fresh from the lush mountains of Hawaii. Smooth in flavor and perfectly roasted!', 'kona.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `non_coffee_categories`
--

CREATE TABLE `non_coffee_categories` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `category` varchar(40) NOT NULL,
  `description` tinytext NOT NULL,
  `image` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `non_coffee_categories`
--

INSERT INTO `non_coffee_categories` (`id`, `category`, `description`, `image`) VALUES
(1, 'Edibles', 'A wonderful assortment of goodies to eat. Includes biscotti, baklava, lemon bars, and more!', 'goodies.jpg'),
(2, 'Gift Baskets', 'Gift baskets for any occasion! Including our many coffees and other goodies.', 'gift_basket.jpg'),
(3, 'Mugs', 'A selection of lovely mugs for enjoying your coffee, tea, hot cocoa or other hot beverages.', '781426_32573620.jpg'),
(4, 'Books', 'Our recommended books about coffee, goodies, plus anything written by Larry Ullman!', 'books.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `non_coffee_products`
--

CREATE TABLE `non_coffee_products` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `non_coffee_category_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` tinytext,
  `image` varchar(45) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `stock` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `non_coffee_products`
--

INSERT INTO `non_coffee_products` (`id`, `non_coffee_category_id`, `name`, `description`, `image`, `price`, `stock`, `date_created`) VALUES
(1, 3, 'Pretty Flower Coffee Mug', 'A pretty coffee mug with a flower design on a white background.', 'd9996aee5639209b3fb618b07e10a34b27baad12.jpg', 650, 100, '2018-04-13 15:36:10'),
(2, 3, 'Red Dragon Mug', 'An elaborate, painted gold dragon on a red background. With partially detached, fancy handle.', '847a1a3bef0fb5c2f2299b06dd63669000f5c6c4.jpg', 795, 4, '2018-04-13 15:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED DEFAULT NULL,
  `shipping` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `credit_card_number` mediumint(4) UNSIGNED ZEROFILL NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_contents`
--

CREATE TABLE `order_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_type` enum('coffee','goodies') DEFAULT NULL,
  `product_id` mediumint(8) UNSIGNED NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL,
  `price_per` int(10) UNSIGNED NOT NULL,
  `ship_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_type` enum('coffee','goodies') NOT NULL,
  `product_id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `review` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_type` enum('coffee','goodies') DEFAULT NULL,
  `product_id` mediumint(8) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_type`, `product_id`, `price`, `start_date`, `end_date`) VALUES
(1, 'goodies', 1, 500, '2013-08-16', '2013-10-31'),
(2, 'coffee', 7, 700, '2013-08-19', '2018-04-19'),
(3, 'coffee', 9, 1300, '2013-08-19', '2013-08-26'),
(4, 'goodies', 2, 700, '2013-08-22', '2018-04-18'),
(5, 'coffee', 8, 1300, '2013-08-22', '2013-10-31'),
(6, 'coffee', 10, 3000, '2013-08-22', '2013-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `size` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`) VALUES
(3, '1 lb.'),
(4, '2 lbs.'),
(1, '2 oz. Sample'),
(5, '5 lbs.'),
(2, 'Half Pound');

-- --------------------------------------------------------

--
-- Table structure for table `specific_coffees`
--

CREATE TABLE `specific_coffees` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `general_coffee_id` tinyint(3) UNSIGNED NOT NULL,
  `size_id` tinyint(3) UNSIGNED NOT NULL,
  `caf_decaf` enum('caf','decaf') DEFAULT NULL,
  `ground_whole` enum('ground','whole') DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `stock` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specific_coffees`
--

INSERT INTO `specific_coffees` (`id`, `general_coffee_id`, `size_id`, `caf_decaf`, `ground_whole`, `price`, `stock`, `date_created`) VALUES
(1, 3, 1, 'caf', 'ground', 200, 20, '2018-04-13 15:36:11'),
(2, 3, 2, 'caf', 'ground', 450, 30, '2018-04-13 15:36:11'),
(3, 3, 2, 'decaf', 'ground', 500, 20, '2018-04-13 15:36:11'),
(4, 3, 3, 'caf', 'ground', 800, 50, '2018-04-13 15:36:11'),
(5, 3, 3, 'decaf', 'ground', 850, 20, '2018-04-13 15:36:11'),
(6, 3, 3, 'caf', 'whole', 750, 50, '2018-04-13 15:36:11'),
(7, 3, 3, 'decaf', 'whole', 800, 20, '2018-04-13 15:36:11'),
(8, 3, 4, 'caf', 'whole', 1500, 30, '2018-04-13 15:36:11'),
(9, 3, 4, 'decaf', 'whole', 1550, 15, '2018-04-13 15:36:11'),
(10, 3, 5, 'caf', 'whole', 3250, 5, '2018-04-13 15:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(18) NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `response_code` tinyint(1) UNSIGNED NOT NULL,
  `response_reason` tinytext,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `response` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_session_id` char(32) NOT NULL,
  `product_type` enum('coffee','goodies') DEFAULT NULL,
  `product_id` mediumint(8) UNSIGNED NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_type` (`product_type`,`product_id`),
  ADD KEY `user_session_id` (`user_session_id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `charge_id` (`charge_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `general_coffees`
--
ALTER TABLE `general_coffees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type` (`category`);

--
-- Indexes for table `non_coffee_categories`
--
ALTER TABLE `non_coffee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `non_coffee_products`
--
ALTER TABLE `non_coffee_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `non_coffee_category_id` (`non_coffee_category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_date` (`order_date`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_contents`
--
ALTER TABLE `order_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ship_date` (`ship_date`),
  ADD KEY `product_type` (`product_type`,`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`product_type`,`product_id`),
  ADD KEY `product_type` (`product_type`,`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `start_date` (`start_date`),
  ADD KEY `product_type` (`product_type`,`product_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `size` (`size`);

--
-- Indexes for table `specific_coffees`
--
ALTER TABLE `specific_coffees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `general_coffee_id` (`general_coffee_id`),
  ADD KEY `size` (`size_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_type` (`product_type`,`product_id`),
  ADD KEY `user_session_id` (`user_session_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_coffees`
--
ALTER TABLE `general_coffees`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `non_coffee_categories`
--
ALTER TABLE `non_coffee_categories`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `non_coffee_products`
--
ALTER TABLE `non_coffee_products`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_contents`
--
ALTER TABLE `order_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `specific_coffees`
--
ALTER TABLE `specific_coffees`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
