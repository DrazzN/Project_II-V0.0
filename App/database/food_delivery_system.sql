-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2023 at 01:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_delivery_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`id`, `name`, `description`, `price`, `image_url`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Margherita Pizza', 'Tomato sauce, mozzarella, and basil', '9.99', 'http://localhost/App/images/margherita-pizza.jpg', 'Pizza', '2023-03-30 19:40:37', '2023-03-30 19:35:11'),
(2, 'Pepperoni', 'Tomato sauce, mozzarella, and pepperoni', '9.99', 'http://localhost/App/images/pepperoni-pizza.jpg', 'Pizza', '2023-03-30 19:40:37', '2023-03-30 19:35:33'),
(3, 'Garlic Knots', 'Baked dough brushed with garlic butter', '4.99', 'http://localhost/App/images/garlic-knots.jpg', 'Appetizers', '2023-03-30 19:40:37', '2023-03-30 20:13:22'),
(4, 'Caesar Salad', 'Romaine lettuce, croutons, parmesan cheese, and Caesar dressings', '6.99', 'http://localhost/App/images/caeser-salad.jpg', 'Salad', '2023-03-30 19:40:37', '2023-03-30 19:44:10'),
(5, 'BBQ Chicken Pizza', 'BBQ sauce, chicken, red onions, and mozzarella cheese', '12.99', 'http://localhost/App/images/bbq-chicken-pizza.jpg', 'Entrees', '2023-03-30 19:40:37', '2023-03-30 20:12:12'),
(6, 'Mushroom Risotto', 'Arborio rice cooked with mushrooms, garlic, and white wine', '11.99', 'http://localhost/App/images/mushroom-risotto.jpg', 'Entrees', '2023-03-30 19:40:37', '2023-03-30 20:13:48'),
(7, 'Garlic Shrimp Scampi', 'Shrimp cooked with garlic, butter, and white wine, served over linguine', '14.99', 'http://localhost/App/images/garlic-shrimp-scampi.jpg', 'Entrees', '2023-03-30 19:40:37', '2023-03-30 20:13:33'),
(8, 'Cheeseburger', 'Beef patty, American cheese, lettuce, tomato, and onion on a bun', '9.99', 'http://localhost/App/images/cheese-burger.jpg', 'Entrees', '2023-03-30 19:40:37', '2023-03-30 20:12:55'),
(9, 'Onion Rings', 'Battered and fried onion rings', '3.99', 'http://localhost/App/images/onion-rings.jpg', 'Appetizers', '2023-03-30 19:40:37', '2023-03-30 20:13:59'),
(10, 'Chocolate Cake', 'Layers of chocolate cake with chocolate frosting', '6.99', 'http://localhost/App/images/chocolate-cake.jpg', 'Desserts', '2023-03-30 19:40:37', '2023-03-30 20:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
