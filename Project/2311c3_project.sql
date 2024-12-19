-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 09:05 AM
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
-- Database: `2311c3_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `prod_id`, `quantity`, `user_id`) VALUES
(9, 8, 12, 4),
(10, 10, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(3, 'Sneaker'),
(4, 'Loafer\'s');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `country_id`) VALUES
(1, 'Karachi', 1),
(2, 'Delhi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'Pakistan'),
(2, 'India'),
(3, 'Nepal'),
(4, 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `action` varchar(200) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `prod_id`, `quantity`, `date_time`, `action`) VALUES
(11, 3, 7, 4, '2024-12-10 13:43:07', 'pending'),
(12, 3, 5, 5, '2024-12-10 13:43:07', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_price` float NOT NULL,
  `prod_rating` float NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_image` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_price`, `prod_rating`, `prod_desc`, `prod_image`, `category_id`) VALUES
(5, 'Faded SkyBlu Denim Jeans', 149.99, 4.5, 'Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.', '6745868831c77.jpg', 3),
(6, 'Athletic Slip-Ons for Boys', 1500, 5, 'These Athletic Slip-Ons for Boys by Calza will keep your kids feet comfortable when they\'re on the move.\r\n\r\nLightweight shoes improve endurance, and helps in faster recovery.\r\n\r\nThe Mesh & PU material of the shoes ensure durability, breathability, and flexibility.\r\n\r\nThese shoes feature a slip-on design, a round toe shape, and a cushioned insole.', '674813c85bc8c.jpg', 3),
(7, 'Athletic Sneakers for Men', 3749, 3.5, 'Your search for the perfect shoe for outdoor activities ends here! \r\n\r\nThese shoes have been made with good quality Flyknit and Man Made Leather material that gives them durability.\r\n\r\nThey feature a lace-up design and a round toe shape.\r\n\r\nThe PU outsole provides  grip and a good resistance to slip.', '674814659c2b5.jpg', 4),
(8, 'Boys Comfy Runners', 1250, 4.8, 'These Boys Comfy Runners by Calza will give your kids the thrust they need to run fast!\r\n\r\nThe Mesh & PU material of the shoes ensure durability, breathability, and flexibility.\r\n\r\nThey feature a lace-up style, a classic round toe shape, and cushioned insoles.', '67481455a029f.jpg', 4),
(9, 'Athletic mens wear', 5599, 4.7, 'Look and feel your best with these athletic mens wear by ndure\r\n\r\nA good rubberize material mixed with lycra mesh ensures brethability and lightness of these athletic wear\r\n\r\nCompleted with multi textured upper to give an exclusive feel', '674814c214a49.jpg', 4),
(10, 'Adorable Infant Boots', 1499, 4.2, 'Keep your child\'s feet warm with style with these Adorable Infant Boots by Ndure.\r\n\r\nShoe is made of high-quality man-made material to provide durability and support to your child\'s foot.\r\n\r\nVelcro closure design provides convenience, no need to tie shoes, making it easy for your child kid to put on or take off their shoes.\r\n\r\nShoe contains comfortable padded insole and PVC outsole to ensure the safety of your kid as it prevents skidding and keeps the shoe light.', '674815057d8d6.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `country` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `country`, `city`, `phone_number`, `address`, `role_id`) VALUES
(1, 'usama', 'riaz', 'usama@gmail.com', '$2y$10$dU/SvBlo9ICh8xDZPAmq7.2fh1nXJmXKCiw9DZg/DvBojLmeUHDii', '1', '1', 987988743587, '1234 marine garden', 2),
(2, 'admin', '', 'admin@admin.com', '$2y$10$gdGIFuQWpYJuVsRR9J2xtOSRKRCCf7L0MktxGD41G4ywlhM6J5tKC', '1', '1', 0, '', 1),
(3, 'ammar', 'Ahmed', 'ytno791@gmail.com', '$2y$10$fDC85yNffC01murIwliGRefgz3LHzRiKs.wZB2hEnnKvzbtaj6Mvm', '1', '1', 978732487, '1234 marine garden', 2),
(4, 'Huzaifa', 'Khan', 'cortexgame77@gmail.com', '$2y$10$YgkvVAMX62o5188bu4BodOAcFRZNeEWbMnvcOga9dT2DbiwRyK8RG', '2', '2', 988878734, '1234 marine garden', 2),
(5, 'Zubair', 'Khan', 'zuubairkhan1015@gmail.com', '$2y$10$FaSnksobIEo/Gh4hFHwd2ugz8tcQc.pLH8dMT6K/006GylFL.zfKu', '2', '2', 987873487, '1234 marine garden', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_ibfk_1` (`prod_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
