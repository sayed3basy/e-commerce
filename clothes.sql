-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 03:50 PM
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
-- Database: `clothes`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(57, 32, 24, '100% WOOL TUNIC DRESS', 500, 1, '1 (21).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(8, 32, 'Mahmoud', 'mahmoud@yahoo.com', '1254', 'test ay 7aga');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(12, 32, 'Mahmoud pero', '01000723760', 'mahmoud@yahoo.com', 'credit card', 'flat no. Cairo.Obour cewfef cairo obour Egypt - 1111', ', 100% WOOL TUNIC DRESS ( 1 ), PUFFER COAT WITH ZIPS ( 1 )', 580, '28-Mar-2023', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `size` text NOT NULL,
  `tow` varchar(250) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `size`, `tow`, `details`, `price`, `image`) VALUES
(24, '100% WOOL TUNIC DRESS', 'Woman', 'x', 'WX', '           Tunic dress featuring a V-neck and sleeves falling below the elbow with turn-up cuffs. Flared hem\r\n', 500, '1 (21).jpg'),
(25, 'HEAVY-WEIGHT T-SHIRT', 'Man', 'x', 'MX', 'T-shirt made of compact cotton with a velvety finish. Round neck and long sleeves with ribbed trims\r\n', 100, '1 (15).jpg'),
(26, 'PUFFER COAT WITH ZIPS', 'Baby', 'x', 'BX', 'Baby Jacet', 80, '1 (1).jpg'),
(28, '     SLOGAN T-SHIRT', 'Woman', 'xl', 'WXL', 'T-Shirt', 280, '1 (30).jpg'),
(29, 'PRINT FAUX SHEARLING JACKET', 'Man', 'xl', 'MXL', 'JACKET', 450, '1 (35).jpg'),
(30, 'PLAIN PLUSH TROUSERS', 'Baby', 's', 'BS', 'PLAIN PLUSH TROUSERS', 75, '3 (1).jpg'),
(31, 'MOM-FIT AUTHENTIC JEANS', 'Woman', 's', 'WS', 'AUTHENTIC JEANS', 100, '1 (55).jpg'),
(32, 'REVERSIBLE BOMBER JACKET', 'Man', 'xxl', 'MXXL', 'JACKET BOMBER', 600, '1 (40).jpg'),
(33, 'SWEATSHIRT WITH RUFFLES', 'Baby', 'xxl', 'BXXL', 'WITH SWEATSHIRT', 368, '3 (5).jpg'),
(34, 'JEANS WITH STUDS', 'Woman', 'xxl', 'WXXL', 'STUDS', 130, '1 (61).jpg'),
(35, 'QUILTED BOMBER JACKET', 'Man', 'xxl', 'MXXL', 'JACKET', 700, '1 (45).jpg'),
(36, 'TREE PLUSH SET', 'Baby', 'xxl', 'BXXL', 'TREE PLUSH SET', 690, '3 (9).jpg'),
(37, 'GATHERED SURPLICE DRESS', 'Woman', 'm', 'WM', 'DRESS', 300, '1 (76).jpg'),
(38, 'JACKET WITH FAUX SHEARLING', 'Man', 'm', 'MM', ' SHEARLING', 690, '1 (66).jpg'),
(39, 'JACKET', 'Baby', 'm', 'BM', 'JACKET WITH', 300, '3 (13).jpg'),
(40, 'ASYMMETRIC KNIT DRESS', 'Woman', 'm', 'WM', 'RED DRESS', 800, '1 (80).jpg'),
(41, 'SLIM FIT JEANS', 'Man', 'm', 'MM', 'JEANS', 100, '1 (71).jpg'),
(42, 'AUTHENTIC JEANS', 'Woman', 'm', 'WM', 'JEANS', 120, '1 (85).jpg'),
(43, 'test', 'Woman', 'm', 'WM', 'ddd', 10, '2 (27).jpg'),
(45, 'mahmoud', 'Man', 'xl', 'MXL', 'dgerhergherge', 10, '20230321065413.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `image`) VALUES
(31, 'Mahmoud', 'admin@yahoo.com', '202cb962ac59075b964b07152d234b70', 'admin', 'amwd7ert5w8cogo0w.jpg'),
(32, 'User', 'user@yahoo.com', '202cb962ac59075b964b07152d234b70', 'user', 'amwd7ert5w8cogo0w.jpg'),
(33, 'habiba', 'habiba@yahoo.com', '202cb962ac59075b964b07152d234b70', 'user', '20171124010228.png');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(59, 32, 29, 'PRINT FAUX SHEARLING JACKET', 450, '1 (35).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
