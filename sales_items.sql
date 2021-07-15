-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 04:37 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE `sales_items` (
  `id_number` int(11) NOT NULL,
  `item` varchar(256) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `status` text,
  `date_posted` date DEFAULT NULL,
  `date_sold` varchar(10) DEFAULT NULL,
  `payment_method` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sales_items`
--

INSERT INTO `sales_items` (`id_number`, `item`, `description`, `price`, `status`, `date_posted`, `date_sold`, `payment_method`) VALUES
(1, 'Random Item 1', 'Description of Random Item 1', 0.99, 'Unsold', '2020-01-30', 'N/A', 'N/A'),
(2, 'Random Item 2', 'Description of Random Item 2', 1.99, 'Sold', '2020-01-31', '2020-02-02', 'Cash'),
(3, 'Random Item 3', 'Description of Random Item 3', 2.99, 'Unsold', '2020-02-02', 'N/A', 'N/A'),
(4, 'Random Item 4', 'Description of Random Item 4', 3.99, 'Sold', '2020-02-05', '2020-02-08', 'Check'),
(5, 'Random Item 5', 'Description of Random Item 5', 4.99, 'Unsold', '2020-02-06', 'NA', 'N/A'),
(6, 'Random Item 6', 'Description of Random Item 6', 5.99, 'Unsold', '2020-01-01', '2020-01-04', 'Check'),
(7, 'Random Item 7', 'Description of Random Item 7', 6.99, 'Sold', '2020-01-14', '2020-01-28', 'Credit Card'),
(8, 'Random Item 8', 'Description of Random Item 8', 7.99, 'Unsold', '2020-03-15', 'N/A', 'N/A'),
(9, 'Random Item 9', 'Description of Random Item 9', 8.99, 'Sold', '2020-01-05', '2020-04-20', 'Debit Card');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`id_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales_items`
--
ALTER TABLE `sales_items`
  MODIFY `id_number` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
