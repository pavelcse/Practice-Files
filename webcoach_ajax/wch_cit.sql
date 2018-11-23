-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2015 at 12:44 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wch_cit`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `about`, `reg_date`) VALUES
(1, 'test', 'test@gmail.com', 'Hello test row create', '2015-06-01 12:32:16'),
(2, 'test', 'test@gmail.com', 'Hello test row create', '2015-06-02 11:27:33'),
(3, 'adnan', 'adnan@gmail.com', 'test', '2015-05-01 07:19:43'),
(4, 'chakrabarty', 'chakrabarty@gmail.com', 'test', '2015-05-14 13:28:00'),
(5, 'adnan', 'adnan@gmail.com', 'test', '2015-05-15 13:28:00'),
(6, 'rownak', 'rownak@gmail.com', 'test', '2015-05-16 13:28:00'),
(7, 'adnan', 'adnan@gmail.com', 'test', '2015-05-17 13:28:00'),
(8, 'riad', 'riad@gmail.com', 'test', '2015-05-18 13:28:00'),
(9, 'adnan', 'adnan@gmail.com', 'test', '2015-04-19 13:28:00'),
(10, 'ahmed', 'ahmed@gmail.com', 'I am adnan from bangladesh', '2015-04-24 13:28:00'),
(11, 'adnan', 'adnan@gmail.com', 'I am adnan from bangladesh', '2015-04-21 13:28:00'),
(12, 'refat', 'refat@gmail.com', 'Hello test row create', '2015-04-15 13:28:00'),
(13, 'alam', 'alam@gmail.com', 'Hello test row create', '2015-06-03 13:28:00'),
(14, 'shams', 'shams@gmail.com', 'Hello test row create', '2015-05-14 13:28:00'),
(15, 'rejoan', 'rejoan.er@gmail.com', 'sdd', '2015-05-14 13:28:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
