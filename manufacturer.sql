-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 25, 2019 at 08:35 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `mfg_name` char(255) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`mfg_name`, `reg_time`) VALUES
('asfsaf', '2019-06-24 14:00:17'),
('dfhdfb', '2019-06-24 14:00:14'),
('dfhgdfb', '2019-06-24 14:00:11'),
('Maruti', '2019-06-23 16:15:28'),
('Maruti-3', '2019-06-24 19:28:08'),
('Maruti123', '2019-06-24 13:59:03'),
('Maruti12334', '2019-06-24 13:59:14'),
('safdfdsf', '2019-06-24 14:00:21'),
('scmnkjsd', '2019-06-24 14:00:00'),
('sdfgdgsg', '2019-06-24 14:00:24'),
('sdgsdgbc . c', '2019-06-24 14:00:29'),
('sfdf', '2019-06-24 14:00:04'),
('Tata', '2019-06-23 16:15:28'),
('Tata1234', '2019-06-24 13:59:49'),
('Tsrde', '2019-06-24 13:59:55'),
('ythyhjt', '2019-06-24 14:00:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`mfg_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
