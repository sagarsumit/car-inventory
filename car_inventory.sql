-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 24, 2019 at 08:43 PM
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
-- Database: `car_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `mfg_name` char(255) NOT NULL,
  `model_name` char(255) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '1',
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `mfg_name`, `model_name`, `counter`, `reg_time`) VALUES
(1, 'Maruti', 'WagonR', 1, '2019-06-23 16:15:52'),
(2, 'Tata', 'Nano', 2, '2019-06-23 16:15:52'),
(7, 'sdgsdgbc . c', 'oiqw8hwefewf', 6, '2019-06-24 17:42:26');

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
('WagonR', '2019-06-23 16:15:10'),
('wliehjof', '2019-06-24 13:48:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mfg_name_ref` (`mfg_name`),
  ADD KEY `model_name_ref` (`model_name`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`mfg_name`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `mfg_name_ref` FOREIGN KEY (`mfg_name`) REFERENCES `manufacturer` (`mfg_name`),
  ADD CONSTRAINT `model_name_ref` FOREIGN KEY (`model_name`) REFERENCES `model` (`model_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
