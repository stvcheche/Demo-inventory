-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2021 at 10:06 AM
-- Server version: 10.5.8-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kefisinvent`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventoryid` int(11) NOT NULL,
  `inventorydate` date NOT NULL,
  `inventoryproduct` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `inventoryquantity` int(11) NOT NULL,
  `inventoryrecordcode` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `inventorystatus` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryid`, `inventorydate`, `inventoryproduct`, `inventoryquantity`, `inventoryrecordcode`, `inventorystatus`) VALUES
(13, '2021-07-08', 'prdct327429847', 200, 'INVENT1625738243RECODE0', 'Dispatched'),
(14, '2021-07-08', 'prdct23897897', 150, 'INVENT1625738243RECODE1', 'Dispatched'),
(15, '2021-07-08', 'Product1625690802CODE', 200, 'INVENT1625738243RECODE2', 'Dispatched'),
(16, '2021-07-08', 'Product1625690982CODE', 122, 'INVENT1625738243RECODE3', 'Dispatched'),
(17, '2021-07-08', 'Product1625691103CODE', 300, 'INVENT1625738243RECODE4', 'Dispatched'),
(18, '2021-07-08', 'Product1625691360CODE', 500, 'INVENT1625738243RECODE5', 'Dispatched');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(11) NOT NULL,
  `productname` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `productcode` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `productprice` int(11) NOT NULL,
  `prdctreorderlvl` int(11) NOT NULL,
  `prdctreorderqnty` int(11) NOT NULL,
  `productrecordcode` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `productstatus` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `productcode`, `productprice`, `prdctreorderlvl`, `prdctreorderqnty`, `productrecordcode`, `productstatus`) VALUES
(1, 'Soko maize mill 2kg', 'prdct327429847', 133, 30, 200, 'prdctrecode', 'Active'),
(2, 'Sugar 2kg', 'prdct23897897', 120, 10, 150, 'prdctrecods487', 'Active'),
(3, 'Flask 3L', 'Product1625690802CODE', 350, 12, 200, 'Product1625690802RECODE', 'Active'),
(4, 'Soya 5kg', 'Product1625690982CODE', 3000, 10, 122, 'Product1625690982RECODE', 'Active'),
(5, 'Fertelizer 5kg', 'Product1625691103CODE', 5500, 20, 300, 'Product1625691103RECODE', 'Active'),
(6, 'Maize seeds 1kg', 'Product1625691360CODE', 1503, 20, 500, 'Product1625691360RECODE', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesid` int(11) NOT NULL,
  `salesdate` date NOT NULL,
  `salesproduct` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `salesprice` int(11) NOT NULL,
  `salesquantity` int(11) NOT NULL,
  `salesrecordcode` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `salestatus` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesid`, `salesdate`, `salesproduct`, `salesprice`, `salesquantity`, `salesrecordcode`, `salestatus`) VALUES
(1, '2021-07-07', 'prdct23897897', 140, 12, 'salerecode4378', 'Active'),
(2, '2021-07-07', 'prdct327429847', 130, 30, 'Sale1625690423RECODE', 'Active'),
(3, '2021-07-07', 'prdct23897897', 120, 5, 'Sale1625690648RECODE', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryid`),
  ADD UNIQUE KEY `inventoryrecordcode` (`inventoryrecordcode`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`),
  ADD UNIQUE KEY `productcode` (`productcode`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesid`),
  ADD UNIQUE KEY `salesrecordcode` (`salesrecordcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
