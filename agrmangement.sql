-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 11:18 PM
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
  `username` varchar(123) NOT NULL,
  `password` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '12345');

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
  `pro_qt` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cust_id`, `pro_id`, `pro_image`, `pro_name`, `pro_price`, `pro_qt`) VALUES
(7, '3', '3', 'http://192.168.43.120/android/images/a1.jpg', 'isombe', '500', '50'),
(8, '3', '3', 'http://192.168.43.120/android/images/a1.jpg', 'isombe', '500', '55'),
(9, '3', '4', 'http://192.168.43.120/android/images/a1.jpg', 'ibijumba', '230', '325');

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
  `category` varchar(123) NOT NULL,
  `status` int(123) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `p_name`, `p_qty`, `p_Uprice`, `description`, `image`, `shareholder_id`, `category`, `status`) VALUES
(1, 'Umuceri', 200, 700, 'Umuceri mwiza cne uhigwa mu gishanga cya huye', 'http://images/i.jpg', 0, '', 0),
(3, 'isombe', 300, 500, 'isombe yacu ni nziza cyane', 'http://192.168.43.120/android/images/a1.jpg', 1234568, '', 0),
(4, 'ibijumba', 300, 230, 'isombe yacu ni nziza cyane', 'http://192.168.43.120/android/images/a1.jpg', 1234568, '', 0);

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(123) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `username`, `password`) VALUES
(1, 'Alain Tresor', 'tresoralain35@gmail.com', 'Tresor', '$2y$10$7bRZ9whi17qwxDVnRJpjXe9Z5Cu/zbj0e'),
(2, 'mmm', 'tresdg@gsf', 'hhh', '$2y$10$5AhkTzKj4cwOp6fJ8.fiXOs.akMBtCnin'),
(3, 'ttyyhhhhg', 'tee@gmail.com', 'tee', '123456'),
(4, 'hh yyy', 'tee@gmaik', 'trr', 'azerty'),
(5, 'tee', 'gdd@gmail.com', 'ggg', 'gggg'),
(6, 'ggg hhh', 'tee@gmail.com', 'tee1', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shareholders`
--
ALTER TABLE `shareholders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
