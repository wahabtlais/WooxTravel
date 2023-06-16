-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 16, 2023 at 09:32 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wooxtravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `email`, `mypassword`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$b/k7k4gYbQZA1kgBBKHLnu1Gc9asPWVZWDeCcyB9zBs5GOXPjGI7q', '2023-06-10 09:45:22'),
(2, 'User 2', 'user2@gmail.com', '$2y$10$XcpLHCOB/TgRjlhAPqCQFuAVnUDj7hx66DWSjCtda17PjjY74cS9C', '2023-06-10 12:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `phone_number` int(30) NOT NULL,
  `num_of_guests` int(10) NOT NULL,
  `checkin_date` timestamp(6) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `city_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `payment` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `phone_number`, `num_of_guests`, `checkin_date`, `destination`, `status`, `city_id`, `user_id`, `payment`, `created_at`) VALUES
(1, 'Wahab Tlais', 70428794, 2, '2023-06-07 13:56:42.000000', 'Berlin', 'Pending', 4, 1, '200', '2023-06-03 14:29:52'),
(2, 'John Wick', 20515415, 2, '2023-06-15 13:56:42.000000', 'Frankfort', 'Pending', 2, 1, '250', '2023-06-03 14:29:52'),
(3, 'Ahmad', 2575615, 7, '2023-06-07 14:53:11.000000', 'Berlin', 'Pending', 4, 1, '100', '2023-06-03 14:55:02'),
(4, 'Wahab', 2575615, 5, '2023-06-07 14:53:11.000000', 'Beirut', 'Booked Successfully', 1, 1, '500', '2023-06-04 12:44:10'),
(5, 'Wahab', 123456, 2, '2023-06-04 21:00:00.000000', 'Beirut', 'Pending', 1, 1, '400', '2023-06-05 12:54:40'),
(6, 'Wahab', 123456, 2, '2023-06-04 21:00:00.000000', 'Beirut', 'Pending', 1, 1, '350', '2023-06-05 12:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `trip_days` int(4) NOT NULL,
  `price` varchar(4) NOT NULL,
  `country_id` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `image`, `trip_days`, `price`, `country_id`, `created_at`) VALUES
(1, 'Beirut', 'offers-02.jpg', 4, '200', 1, '2023-06-02 11:18:13'),
(2, 'Frankfort', 'offers-01.jpg', 6, '450', 2, '2023-06-02 11:18:13'),
(3, 'Tripoli', 'offers-03.jpg', 5, '200', 1, '2023-06-02 12:03:10'),
(4, 'Berlin', 'deals-01.jpg', 3, '600', 2, '2023-06-02 12:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `continent` varchar(200) NOT NULL,
  `population` varchar(30) NOT NULL,
  `territory` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `image`, `continent`, `population`, `territory`, `description`, `created_at`) VALUES
(1, 'Lebanon', 'banner-01.jpg', 'Asia', '100', '41.290', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-02 11:03:30'),
(2, 'Germany', 'banner-02.jpg', 'Europe', '90', '275.40', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt arcu non sodales neque sodales ut etiam. Bibendum neque egestas congue quisque egestas diam in. Egestas integer eget aliquet nibh praesent tristique. Fermentum et sollicitudin ac orci phasellus egestas. Sit amet nisl purus in mollis. Venenatis a condimentum vitae sapien pellentesque habitant morbi. Velit egestas dui id ornare arcu odio. Purus in massa tempor nec feugiat.', '2023-06-02 11:03:30'),
(3, 'USA', 'banner-03.jpg', 'North America', '300', '400.485', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis nunc eget lorem dolor sed viverra. Adipiscing vitae proin sagittis nisl. In arcu cursus euismod quis. Pellentesque habitant morbi tristique senectus et netus et malesuada. Blandit cursus risus at ultrices mi. Ut eu sem integer vitae justo eget magna fermentum. Tincidunt arcu non sodales neque sodales ut etiam. Magna sit amet purus gravida.', '2023-06-10 14:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `mypassword` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `mypassword`, `created_at`) VALUES
(1, 'user1@gmail.com', 'wahabtlais', '$2y$10$b/k7k4gYbQZA1kgBBKHLnu1Gc9asPWVZWDeCcyB9zBs5GOXPjGI7q', '2023-06-01 12:18:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
