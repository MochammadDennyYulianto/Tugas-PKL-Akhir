-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 10:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denzaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset_category`
--

CREATE TABLE `asset_category` (
  `id` int(11) NOT NULL,
  `category` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_category`
--

INSERT INTO `asset_category` (`id`, `category`) VALUES
(1, 'Flat'),
(2, 'Illustration'),
(3, '3D'),
(4, 'Templates');

-- --------------------------------------------------------

--
-- Table structure for table `asset_info`
--

CREATE TABLE `asset_info` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `downloaded` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `role_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `follower` int(11) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Creator'),
(3, 'Subscriber'),
(4, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset_category`
--
ALTER TABLE `asset_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_info`
--
ALTER TABLE `asset_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`),
  ADD UNIQUE KEY `creator` (`creator_id`) USING BTREE;

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset_category`
--
ALTER TABLE `asset_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `asset_info`
--
ALTER TABLE `asset_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asset_info`
--
ALTER TABLE `asset_info`
  ADD CONSTRAINT `asset_info_ibfk_1` FOREIGN KEY (`category`) REFERENCES `asset_category` (`id`);

--
-- Constraints for table `user_access`
--
ALTER TABLE `user_access`
  ADD CONSTRAINT `user_access_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_access` (`role_id`),
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`id`) REFERENCES `asset_info` (`creator_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
