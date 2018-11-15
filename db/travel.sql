-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2018 at 09:28 AM
-- Server version: 5.7.24-0ubuntu0.18.10.1
-- PHP Version: 7.2.10-0ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `client_id` varchar(11) DEFAULT NULL,
  `resort_id` varchar(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `client_id`, `resort_id`, `date_created`) VALUES
(10, '$client_id', '$resort_id', '2018-11-14 22:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `province`) VALUES
(1, 'Bulawayo', 'Bulawayo'),
(2, 'Harare', 'Harare'),
(3, 'Gweru', 'Midlands'),
(4, 'Masvingo', 'Masvingo'),
(5, 'Kwekwe', 'Midlands'),
(6, 'Nyanga', 'Manicaland'),
(7, 'Hwangwe', 'Matebeland'),
(8, 'Bindura', 'MashCentral'),
(9, 'Kariba', 'Mat South'),
(10, 'Victoria Falls', 'Mat North'),
(11, 'Mutare', 'Manicaland'),
(12, 'Matobos', 'Mat South');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(23) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `encrypted_password` varchar(80) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `unique_id`, `name`, `contact`, `encrypted_password`, `salt`, `created_at`, `updated_at`, `email`) VALUES
(1, '5be0543550ce35.23750959', '67', NULL, 'T2dMUqDVzv1zZIZfAvSy9SUKvws1ODI4NDQ0NTcy', '5828444572', '2018-11-05 16:31:17', NULL, 'topu@gmail.com'),
(2, '5be1ab1b178c62.98242212', 'Tafadzwa Mutero', NULL, 'CKtWwOKPOfE/NwyE4DJHGWXeIi5jNzBmMmViOTE2', 'c70f2eb916', '2018-11-06 16:54:19', NULL, 'tafadzwa@gmail.com'),
(3, '5be4370212a1b8.40360569', 'Onwell M', NULL, 'DiNmtCGDy9zzpm+HjCCc2SvHRcthZTZiYTljNDVj', 'ae6ba9c45c', '2018-11-08 15:15:46', NULL, 'oni@gmail.com'),
(4, '5be80a38e7b7d7.33048897', 'Tau', NULL, 'DcMFr7RtfLE7nHTaZGSDzYETWkVkOTk3OTY2MjIz', 'd997966223', '2018-11-11 12:53:44', NULL, 'tau@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `resorts`
--

CREATE TABLE `resorts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city_id` int(20) DEFAULT NULL,
  `serviceType` varchar(60) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `amount` double(11,2) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resorts`
--

INSERT INTO `resorts` (`id`, `name`, `city_id`, `serviceType`, `longitude`, `latitude`, `contact`, `amount`, `image`) VALUES
(11, 'Great Zimbabwe', 4, 'Game Reserves', '30.84225309375006', '-20.124629033814948', 987822, 24.00, 'gz.jpeg'),
(12, 'Rhodes Nyanga Parks', 5, 'Game Reserves', '32.76123046875', '-18.427501971948598', 9292222, 23.00, 'rodhes.jpg'),
(13, 'Mukuvisi Woodlands', 2, 'Game Reserves', '31.088390350341797', '-17.83629622635646', 232323, 23.00, 'mukuvisi.jpg'),
(14, 'Lake Chivero', 2, 'Recreational Services', '30.787124633789062', '-17.91144920201981', 23772323, 300.00, NULL),
(15, 'Victoria Falls Hotel', 10, 'Hotel and Conference', '25.749025555805474', '-17.93394004195814', 2772322, 233.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `user_type` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`, `datecreated`) VALUES
(12, 'admin', 'admin@gmail.com', 'admin', '154072a750541f54250de83a125003a4', '2018-10-22 12:41:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `resorts`
--
ALTER TABLE `resorts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `resorts`
--
ALTER TABLE `resorts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
