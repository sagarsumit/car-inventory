-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 25, 2019 at 08:34 AM
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
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_name` char(255) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_name`, `reg_time`) VALUES
('akjhdu', '2019-06-24 13:48:03'),
('jsyegfuigew', '2019-06-24 13:48:14'),
('model', '2019-06-24 13:34:15'),
('msbhdf', '2019-06-24 13:47:58'),
('Nano', '2019-06-23 16:15:10'),
('Nano23', '2019-06-24 13:46:01'),
('Nanodfgcv', '2019-06-24 13:47:01'),
('Nanoknhkh', '2019-06-24 13:40:33'),
('oiqw8hwefewf', '2019-06-24 13:48:18'),
('skjhefiuew', '2019-06-24 13:48:07'),
('Test', '2019-06-24 13:44:57'),
('Test-Nano', '2019-06-24 19:27:41'),
('WagonR', '2019-06-23 16:15:10'),
('wliehjof', '2019-06-24 13:48:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
