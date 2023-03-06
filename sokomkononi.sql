-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2023 at 09:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sokomkononi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `dateCreated`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '2022-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `Buyer`
--

CREATE TABLE `Buyer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profileImage` blob NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Buyer`
--

INSERT INTO `Buyer` (`id`, `fullname`, `email`, `username`, `password`, `profileImage`, `status`, `dateCreated`) VALUES
(1, 'KelvinMsindai', '97kelvin1@gmail.com', 'kevoo', '827ccb0eea8a706c4c34a16891f84e7b', 0x6173736574732f696d672f757365722e706e67, 0, '2022-05-02'),
(2, 'KelvinAron', 'kelvin@gmail.com', 'kelvin', '827ccb0eea8a706c4c34a16891f84e7b', 0x6173736574732f696d672f757365722e706e67, 0, '2022-05-02'),
(3, 'GoodluckEmmanueli', 'octo@example.com', 'octopizo', '827ccb0eea8a706c4c34a16891f84e7b', 0x6173736574732f696d672f757365722e706e67, 0, '2022-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryDescription` longtext NOT NULL,
  `creationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`) VALUES
(1, 'Matunda', 'Ni bora zaidi', '2022-05-21'),
(5, 'Nyama', 'Zinaongeza protini ', '2022-05-06'),
(6, 'Samaki ', 'Zinaongeza Protini', '2022-05-06'),
(7, 'Viungo vya mboga', 'Vinatumika kuungia hgggggugjjjjjgdy', '2022-05-06'),
(8, 'mboga', 'Status', '2022-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fullname`, `email`, `subject`, `message`, `dateCreated`) VALUES
(1, 'Kelvin', 'kk@example.com', 'status', 'staus', '2010-02-02'),
(2, 'Kelvin', 'kk@example.com', 'status', 'staus', '2010-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `orderdate` datetime NOT NULL,
  `paymentMethod` varchar(100) NOT NULL,
  `orderStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderdate`, `paymentMethod`, `orderStatus`) VALUES
(1, 3, '11', 1, '2022-06-18 09:22:12', 'TIGO-PESA', '1'),
(2, 3, '12', 2, '2022-06-18 09:22:12', 'TIGO-PESA', '1'),
(5, 3, '11', 1, '2022-06-21 08:11:30', 'TIGO-PESA', 'Delivered'),
(6, 3, '11', 1, '2022-06-27 14:11:49', 'TIGO-PESA', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackinghistory`
--

CREATE TABLE `ordertrackinghistory` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remark` text NOT NULL,
  `postingDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productPrice` decimal(10,0) NOT NULL,
  `priceBeforeDiscount` decimal(10,0) NOT NULL,
  `productDescription` text NOT NULL,
  `productImage` varchar(500) NOT NULL,
  `productImage2` varchar(500) NOT NULL,
  `productImage3` varchar(500) NOT NULL,
  `deliveryCharge` decimal(10,0) NOT NULL,
  `postingDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subcategory`, `productName`, `productPrice`, `priceBeforeDiscount`, `productDescription`, `productImage`, `productImage2`, `productImage3`, `deliveryCharge`, `postingDate`) VALUES
(11, 1, 2, 'Embe Bolibo', '800', '1000', 'Ni Matunda mazuri kwa afya', '4-2-mango-free-download-png.png', '22187-7-mango.png', '6-2-mango-png-hd.png', '500', '2022-05-21'),
(12, 1, 4, 'Tikiti maji', '4000', '5000', 'Very sweet', 'watermelon2.png', 'watermelon.png', 'beans.png', '1000', '2022-05-22'),
(13, 1, 4, 'Avocado', '1500', '2000', 'Nzuri kwa<b> afya</b><br>', 'avocado.png', 'avocado2.png', '', '1000', '2022-05-26'),
(14, 1, 4, 'Ndizi Mbivu', '2500', '2000', 'This is for your <font size=\"6\" face=\"times new roman\"><u><b>health</b></u></font><br>', 'banana2.png', 'banana1.png', '', '1000', '2022-05-26'),
(15, 1, 4, 'Bilinganya', '1000', '2000', 'Its help your health to be well<br>', 'bilinganya.png', 'bilinganya2.png', '', '1000', '2022-05-26'),
(16, 7, 9, 'Pili Pili ', '2000', '2000', 'Ni nzuri kwa ladha<br>', 'redchilli2.png', 'redchilli2.png', '', '1000', '2022-05-26'),
(17, 8, 11, 'Kabichi', '2000', '3000', 'Make your body&nbsp; better<br>', 'cabbage.png', 'cabbage.png', '', '1000', '2022-05-26'),
(18, 8, 10, 'Maharage', '3500', '3600', 'This is help to increase power in your body<br>', 'beans.png', 'beans.png', '', '1000', '2022-05-26'),
(19, 1, 4, 'Machungwa', '800', '1000', 'Status', 'orange.png', 'orange.png', 'orange.png', '100', '2022-06-27'),
(20, 1, 4, 'Mango', '1500', '2000', 'Status', 'pexels-photomix-company-235294.jpg', 'pexels-photomix-company-235294.jpg', 'pexels-photomix-company-235294.jpg', '1000', '2023-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `subCategory`
--

CREATE TABLE `subCategory` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subcategoryName` varchar(100) NOT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subCategory`
--

INSERT INTO `subCategory` (`id`, `categoryId`, `subcategoryName`, `dateCreated`) VALUES
(2, 1, 'Embe', '2022-05-06'),
(4, 1, 'Other', '2022-05-22'),
(6, 6, 'No', '2022-05-24'),
(9, 7, 'other', '2022-05-26'),
(10, 8, 'nafaka', '2022-05-26'),
(11, 8, 'Mboga za majani', '2022-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `dateCreated`) VALUES
(8, 2, 12, '2022-06-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Buyer`
--
ALTER TABLE `Buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackinghistory`
--
ALTER TABLE `ordertrackinghistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subCategory`
--
ALTER TABLE `subCategory`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Buyer`
--
ALTER TABLE `Buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ordertrackinghistory`
--
ALTER TABLE `ordertrackinghistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subCategory`
--
ALTER TABLE `subCategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
