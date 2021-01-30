-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2019 at 11:14 AM
-- Server version: 10.2.26-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kyawzinaung_bsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(100) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(7, 'Chit Oo Nyo'),
(8, 'Juu'),
(9, 'A Kyi Taw'),
(10, 'Phone Wai'),
(11, 'Than Tun'),
(12, 'Win Myint'),
(13, 'Mya Han');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pdf` text COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `photo`, `price`, `pdf`, `author_id`, `type_id`) VALUES
(19, 'Bo Aung Saung', 'photo/history1.jpg', '7000', 'pdf/history1.jpg', 7, 11),
(21, 'Myanmar History', 'photo/history3.jpg', '6500', 'pdf/history3.jpg', 11, 11),
(22, 'Medicine Ocean', 'photo/med.jpg', '8000', 'pdf/med.jpg', 12, 13),
(23, 'Chu Ci', 'photo/akt2.jpg', '6500', 'pdf/akt2.jpg', 9, 12),
(26, 'Tway Chin Hla Pi', 'photo/juu1.jpg', '6000', 'pdf/juu1.jpg', 8, 12),
(27, 'Han Ni Mon', 'photo/akt7.jpg', '6500', 'pdf/akt7.jpg', 9, 12),
(28, 'True or False', 'photo/akt6.jpg', '5500', 'pdf/akt6.jpg', 9, 16),
(29, 'Mahar Ta Man', 'photo/nyo3.jpg', '600', 'pdf/nyo3.jpg', 7, 16),
(30, 'Shwe Hteit Soe', 'photo/nyo1.jpg', '8000', 'pdf/nyo6.jpg', 7, 16),
(31, 'Mg Tos Yout Kyar Tway', 'photo/juu.jpg', '6500', 'pdf/juu.jpg', 8, 14),
(32, '\"0\" Thingings', 'photo/akt8.jpg', '6500', 'pdf/akt8.jpg', 9, 16),
(33, 'Ko Lo Ni Khyut', 'photo/history4.jpg', '6500', 'pdf/history4.jpg', 12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `voucherno` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `book_id`, `qty`, `voucherno`) VALUES
(1, 22, 4, '5cc6ddd45f1a4'),
(2, 21, 8, '5cc6e1338dc39'),
(3, 18, 3, '5cc6e1338dc39'),
(4, 18, 4, '5cc6e1b9aff2c'),
(5, 18, 2, '5cc6e1e05b00c'),
(6, 18, 7, '5cc709d6a15cd'),
(7, 22, 1, '5cc709d6a15cd'),
(8, 22, 5, '5cc70e38ad3ef'),
(9, 21, 2, '5cc70e38ad3ef'),
(10, 21, 5, '5cc70eec1d139'),
(11, 20, 4, '5cc70eec1d139'),
(12, 22, 8, '5cc7b790027b8'),
(13, 18, 5, '5cc7b790027b8'),
(14, 18, 2, '5cc7b891777bc'),
(15, 22, 2, '5cc7b891777bc'),
(16, 21, 4, '5cc7c7a43d66c'),
(17, 20, 2, '5cce7b796374e'),
(18, 21, 5, '5cce9bcb0d03c'),
(19, 22, 3, '5cce9bcb0d03c'),
(20, 19, 3, '5cce9bcb0d03c'),
(21, 23, 19, '5cce9bcb0d03c'),
(22, 23, 34, '5cce9e124073f'),
(23, 23, 5, '5cce9e3dda065'),
(24, 23, 6, '5cce9e97b3efa'),
(25, 23, 10, '5ccf110521b82'),
(26, 22, 3, '5ccf110521b82'),
(27, 31, 22, '5ccf2945275a4'),
(28, 30, 4, '5cd64939397c4'),
(29, 28, 3, '5cd64939397c4'),
(30, 31, 4, '5cdc12c0900b2'),
(31, 33, 3, '5ceb6ab218ba4'),
(32, 31, 7, '5ceb6ab218ba4'),
(33, 32, 1, '5cebad501eb9b'),
(34, 31, 3, '5cebad501eb9b');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `voucherno` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` int(10) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phoneno` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `voucherno`, `orderdate`, `total`, `username`, `phoneno`) VALUES
(9, '5cc7b891777bc', '2019-04-30 02:53:05', 24000, 'kyaw zin aung', '7839490394'),
(10, '5cc7c7a43d66c', '2019-04-30 03:57:24', 26000, 'kyaw zin aung123', '0996892449'),
(11, '5cce7b796374e', '2019-05-05 05:58:17', 13000, 'kyaw', '234567'),
(12, '5cce9bcb0d03c', '2019-05-05 08:16:11', 201000, 'dfgfghg', '123457'),
(13, '5cce9e124073f', '2019-05-05 08:25:54', 221000, 'dhvm, m n', '234567'),
(14, '5cce9e3dda065', '2019-05-05 08:26:37', 32500, 'rgfhcf', '2345678'),
(15, '5cce9e97b3efa', '2019-05-05 08:28:07', 39000, 'kysr', '4853'),
(16, '5ccf110521b82', '2019-05-05 16:36:21', 89000, 'kyaw', '12345678'),
(17, '5ccf2945275a4', '2019-05-05 18:19:49', 143000, 'keru', '75849032'),
(18, '5cd64939397c4', '2019-05-11 04:02:01', 48500, 'kyaw zinaung', '3478903-20398772'),
(19, '5cdc12c0900b2', '2019-05-15 13:23:12', 26000, 'ghfggffzc', '2345678987'),
(20, '5ceb6ab218ba4', '2019-05-27 04:42:26', 65000, 'fgdgjdgf', '12345678'),
(21, '5cebad501eb9b', '2019-05-27 09:26:40', 26000, 'rhjkj', '123456787654');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(100) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(11, 'History Book'),
(12, 'Funny book'),
(13, 'Medicine Book'),
(14, 'Romatic book'),
(16, 'Knowledge book');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
