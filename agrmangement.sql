-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 02:29 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrmangement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `phone`, `email`, `password`) VALUES
(1, 'a', 'b', '08', 'admin@android', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cust_id` varchar(20) NOT NULL,
  `pro_id` varchar(20) NOT NULL,
  `pro_image` varchar(400) NOT NULL,
  `pro_name` varchar(40) NOT NULL,
  `pro_price` varchar(40) NOT NULL,
  `pro_qt` varchar(40) NOT NULL,
  `available_qty` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cust_id`, `pro_id`, `pro_image`, `pro_name`, `pro_price`, `pro_qt`, `available_qty`) VALUES
(5, '1', '5', 'http://192.168.43.208/android/images/time.JPG', 'Ibishyimbo', '850', '3', '500'),
(6, '1', '6', 'http://192.168.43.208/android/images/choice.jpg', 'Amacunga', '800', '3', '10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cust_id` varchar(20) NOT NULL,
  `p_id` varchar(200) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_Uprice` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cust_id`, `p_id`, `p_qty`, `p_Uprice`, `total_price`) VALUES
(1, '1', '1', 4, 700, 2800),
(2, '1', '1', 3, 700, 2100),
(3, '1', '1', 5, 700, 3500),
(4, '1', '4', 50, 1000, 50000),
(5, '1', '7', 8, 400000, 3200000),
(6, '1', '6', 6, 800, 4800);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `p_name` varchar(40) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_Uprice` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(400) NOT NULL,
  `shareholder_id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `p_name`, `p_qty`, `p_Uprice`, `description`, `image`, `shareholder_id`, `category`, `status`) VALUES
(1, 'Umuceri', 200, 700, 'Umuceri mwiza cne uhigwa mu gishanga cya huye', 'http://192.168.43.208/android/images/i.jpg', 0, 'IBIRIBWA', 'available'),
(4, 'akandi', 200, 1000, 'urwaga rwiza cyane', 'http://192.168.43.208/android/images/Background.png', 0, 'IMBOGA', 'available'),
(5, 'Ibishyimbo', 500, 850, 'Ibishimbo byiza bya mutiki', 'http://192.168.43.208/android/images/time.JPG', 0, 'IBIRIBWA', 'available'),
(6, 'Amacunga', 10, 800, 'aya macunga nimeza cyane ', 'http://192.168.43.208/android/images/choice.jpg', 0, 'IMBUTO', 'unavailable'),
(7, 'Inka', 15, 400000, '..', 'http://192.168.43.208/android/images/2b8740038965ff3cc114e3afa2cfc7b7.jpg', 0, 'AMATUNGO', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `shareholders`
--

CREATE TABLE `shareholders` (
  `id` int(123) NOT NULL,
  `full_name` varchar(123) NOT NULL,
  `phone_number` varchar(123) NOT NULL,
  `Gender` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shareholders`
--

INSERT INTO `shareholders` (`id`, `full_name`, `phone_number`, `Gender`) VALUES
(1234568, 'tee renzo', '0780640237', 'male'),
(2147483647, 'tee renzo', '0780640237', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `password`) VALUES
(1, 'Alain Tresor', 'tresoralain35@gmail.com', 'tresor', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
