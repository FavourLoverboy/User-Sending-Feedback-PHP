-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2022 at 12:59 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faefae`
--

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `head` varchar(30) NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `name`, `email`, `head`, `msg`, `date`) VALUES
(1, 'favour nwokamma', 'Favourehio2019@gmail.com', 'Testing', 'this is a test in order to see if the form i did with php is working.', '2021-10-22'),
(2, 'favour', 'favour@gmail.com', 'email', 'Customer Picture', '2021-10-22'),
(3, 'favour', 'favour@gmail.com', 'email', 'Customer Picture', '2021-10-22'),
(4, 'favour', 'favour@gmail.com', 'email', 'Customer Picture', '2021-10-22'),
(5, 'awo john', 'awo@gmail.com', 'Testing Online', 'Am just testing online message for the first time', '2021-10-22'),
(6, 'favour', 'favour@gmail.com', 'come', 'i love her', '2021-11-07'),
(7, 'victor precious jackson', 'precious@gmail.com', 'something', 'Shipment Update', '2021-11-07'),
(9, 'favour nwokamma', 'Favourehio2019@gmail.com', 'gf', 'ffgb', '2021-11-07'),
(10, 'favour nwokamma', 'Favourehio2019@gmail.com', 'gf', 'ffgb', '2021-11-07'),
(11, 'favour nwokamma', 'Favourehio2019@gmail.com', 'gf', 'ffgb', '2021-11-07'),
(12, 'favour nwokamma', 'Favourehio2019@gmail.com', 'gf', 'ffgb', '2021-11-07'),
(13, 'Oluchi Favour', 'john@gmail.com', 'come', 'new msg\r\n', '2021-11-14'),
(14, 'oluchi', 'oluchi@gmail.com', 'Aro Tech', 'money money', '2021-11-24'),
(15, 'Lara Ivanka', 'laraivanka765@gmail.com', 'Aro Tech', 'egedege', '2021-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `date`) VALUES
(1, 'favour nwokamma', 'Favourehio2019@gmail.com', 'favour', 'favour', '2021-10-22'),
(2, 'awo john', 'awo@gmail.com', 'awo', 'awo', '2021-10-22'),
(3, 'victor precious', 'precious@gmail.com', 'victor', 'victor', '2021-11-07'),
(4, 'Oluchi Favour', 'Joy@gmail.com', 'oluchi', 'oluchi', '2021-11-14'),
(5, 'Lara Ivanka', 'laraivanka765@gmail.com', 'lara', 'lara', '2021-11-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
