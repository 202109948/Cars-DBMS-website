-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2024 at 01:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hasan`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `buidling` int(11) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `buidling`, `street`, `city`, `country`) VALUES
(1112, 2223232, 'jkhgjh,b', 'Bethlehem', 'Syria'),
(2222, 22, 'Abdon', 'Amman', 'Jordan'),
(3333, 33, 'TrainST', 'Belfast', 'Ulster'),
(4444, 44, 'Aqua', 'Jerusalem', 'Palestine'),
(5496, 55, 'g-7', 'Jerusalem', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `name` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `made` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`name`, `model`, `year`, `made`) VALUES
('buick', 'SUV', 1999, 'general motors'),
('Cadillac', 'elect', 2015, 'general motors'),
('chevrolet', 'camaro', 2000, 'general motors'),
('Fiat', 'aaaa', 1999, 'EPS'),
('hyundai', 'Accent', 2020, 'Kyungsung'),
('Kia', 'Cerato', 2021, 'Kyungsung'),
('Malibu', 'Express', 2017, 'general motors'),
('metsobeci', 'jjj', 2000, 'Kyungsung'),
('Opel', 'Astra', 2020, 'Vauxhall Motors');

-- --------------------------------------------------------

--
-- Table structure for table `car_part`
--

CREATE TABLE `car_part` (
  `car` varchar(20) NOT NULL,
  `part` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_part`
--

INSERT INTO `car_part` (`car`, `part`) VALUES
('kia', 546),
('Cadillac', 776),
('kia', 321),
('kia', 234),
('Cadillac', 776),
('hyundai', 321),
('Kia', 546),
('Malibu', 234);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `address` int(11) NOT NULL,
  `job` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `f_name`, `l_name`, `address`, `job`) VALUES
(1, 'john', 'Doe', 4444, 'Student'),
(3, 'Conor', 'Mcdonald', 1112, 'Couch'),
(4, 'David', 'PAt', 2222, 'Driver'),
(5, 'Sara', 'Khabib', 3333, 'Accountant');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `no` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `made` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`no`, `name`, `price`, `weight`, `made`) VALUES
(123, 'hasaaaaa', 11, 10, 'JVCKenwood'),
(234, 'nuts', 1, 1, 'EPS'),
(321, 'Bolts', 1, 2, 'EPS'),
(456, 'Wheel', 100, 50, 'Armours'),
(546, 'Battery', 560, 30, 'Philips'),
(776, 'Gearbox', 5678, 454, 'Vauxhall Motors');

-- --------------------------------------------------------

--
-- Table structure for table `LogIn`
--

CREATE TABLE `LogIn` (
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `LogIn`
--

INSERT INTO `LogIn` (`username`, `password`) VALUES
('hasan', '202cb962ac59075b964b07152d234b70'),
('fatema', '827ccb0eea8a706c4c34a16891f84e7b'),
('ahmad', '202cb962ac59075b964b07152d234b70'),
('sara', '202cb962ac59075b964b07152d234b70'),
('abed', '202cb962ac59075b964b07152d234b70'),
('samir', '202cb962ac59075b964b07152d234b70'),
('khalil', '202cb962ac59075b964b07152d234b70'),
('palaha', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `manufacture`
--

CREATE TABLE `manufacture` (
  `name` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacture`
--

INSERT INTO `manufacture` (`name`, `type`, `city`, `country`) VALUES
('ABC', 'private', 'Jerusalem', 'Palestine'),
('Armours', 'private', 'Elk Grove Village', 'USA'),
('dsc', 'car', 'Jerusalem', 'Finland '),
('EPS', 'private', 'Alpharetta', 'USA'),
('general motors', 'limited', 'wed', 'USA'),
('JVCKenwood', 'private', 'Tokyo', 'Japan'),
('Kyungsung', 'corporation', 'Seoul', 'South Korea'),
('Philips', 'corporation', 'Amsterdam', 'Netherlands'),
('Vauxhall Motors', 'private', 'Chalton', 'UK');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `car` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `customer`, `car`) VALUES
(9011, 333, 3, 'hyundai'),
(9012, 452011, 4, 'Opel'),
(9013, 482017, 5, 'Kia'),
(9014, 992021, 5, 'Malibu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`name`),
  ADD KEY `made` (`made`);

--
-- Indexes for table `car_part`
--
ALTER TABLE `car_part`
  ADD KEY `car` (`car`),
  ADD KEY `part` (`part`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address` (`address`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`no`),
  ADD KEY `made` (`made`);

--
-- Indexes for table `manufacture`
--
ALTER TABLE `manufacture`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car` (`car`),
  ADD KEY `customer` (`customer`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`made`) REFERENCES `manufacture` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `car_part`
--
ALTER TABLE `car_part`
  ADD CONSTRAINT `car_part_ibfk_1` FOREIGN KEY (`car`) REFERENCES `car` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `car_part_ibfk_2` FOREIGN KEY (`part`) REFERENCES `device` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`address`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`made`) REFERENCES `manufacture` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`car`) REFERENCES `car` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
