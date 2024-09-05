-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2024 at 05:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_assessment`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_shop`
--

CREATE TABLE `car_shop` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Quantity` varchar(50) NOT NULL,
  `Create` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `Update` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_shop`
--

INSERT INTO `car_shop` (`Id`, `Name`, `Description`, `Price`, `Quantity`, `Create`, `Update`) VALUES
(2, 'dsda', 'sdsa', 'sdas', 'asdsa', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 'rjay', 'mustang', '122', '1', '2024-08-29 10:06:01.560018', '2024-08-29 10:06:01.560018'),
(4, 'rjay', 'mustang', '122', '1', '2024-08-29 10:06:07.223671', '2024-08-29 10:06:07.223671'),
(5, 'rjay', 'mustang', '122', '1', '2024-08-29 10:08:30.128494', '2024-08-29 10:08:30.128494'),
(6, 'rjay', 'mustang', '122', '1', '2024-08-29 10:08:39.664249', '2024-08-29 10:08:39.664249'),
(7, 'rjay', 'mustang', '122', '1', '2024-08-29 10:14:14.426755', '2024-08-29 10:14:14.426755'),
(8, 'rjay', 'mustang', '122', '1', '2024-08-29 10:14:20.159436', '2024-08-29 10:14:20.159436');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_shop`
--
ALTER TABLE `car_shop`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_shop`
--
ALTER TABLE `car_shop`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
