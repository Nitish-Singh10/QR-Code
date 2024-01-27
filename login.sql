-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 09:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `NO` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `admin` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`NO`, `Name`, `Password`, `admin`) VALUES
(1, 'Admin', '123', 0),
(2, 'Admin 1', '123', 1),
(3, 'Admin 2', '123', 2),
(4, 'Admin 3', '123', 3),
(5, 'Admin 4', '123', 4),
(6, 'Admin 5', '123', 5),
(7, 'Admin 6', '123', 6),
(8, 'Admin 7', '123', 7),
(9, 'Admin 8', '123', 8),
(10, 'Admin 9', '123', 9),
(11, 'Admin 10', '123', 10),
(12, 'Admin 11', '123', 11),
(13, 'Admin 12', '123', 12),
(14, 'Admin 13', '123', 13),
(15, 'Admin 14', '123', 14),
(16, 'Admin 15', '123', 15),
(17, 'Admin 16', '123', 16),
(18, 'Admin 17', '123', 17),
(19, 'Admin 18', '123', 18),
(20, 'Admin 19', '123', 19),
(21, 'Admin 20', '123', 20);

-- --------------------------------------------------------

--
-- Table structure for table `qr_scanned`
--

CREATE TABLE `qr_scanned` (
  `id` int(11) NOT NULL,
  `vender_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `times` int(11) NOT NULL,
  `Time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qr_scanned`
--

INSERT INTO `qr_scanned` (`id`, `vender_id`, `user_id`, `times`, `Time_stamp`) VALUES
(4, 1, '25151834SAN', 0, '0000-00-00 00:00:00'),
(5, 1, '25151834SAN', 0, '0000-00-00 00:00:00'),
(6, 2, '25151834SAN', 0, '0000-00-00 00:00:00'),
(7, 2, '25151834SAN', 0, '0000-00-00 00:00:00'),
(8, 1, '25151834SAN', 0, '0000-00-00 00:00:00'),
(9, 1, '25151834SAN', 0, '0000-00-00 00:00:00'),
(10, 1, '25151834SAN', 0, '0000-00-00 00:00:00'),
(11, 1, '25151834SAN', 0, '0000-00-00 00:00:00'),
(12, 1, '25151834SAN', 0, '0000-00-00 00:00:00'),
(13, 2, '25151834SAN', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vender`
--

CREATE TABLE `vender` (
  `NO` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Name of Shop` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `QR` varchar(255) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vender`
--

INSERT INTO `vender` (`NO`, `Name`, `Designation`, `Name of Shop`, `Description`, `Phone`, `Email`, `QR`, `Password`) VALUES
(1, 'Nitish', 'House Wife', 'ABC', 'we sell flowers', '93449054314', 'bcci@gmail.com', 'image1/65afed5213297.png', '111'),
(2, 'Sanjana', 'Cricketer', 'ABC', 'we sell flowers', '93449054314', 'bcci@gmail.com', 'image1/65b35a4d8d82c.png', '111');

-- --------------------------------------------------------

--
-- Table structure for table `visiter`
--

CREATE TABLE `visiter` (
  `NO` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `NOC` varchar(100) NOT NULL,
  `AOC` varchar(200) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `QR` varchar(225) NOT NULL,
  `admin` int(11) NOT NULL,
  `UniqueID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visiter`
--

INSERT INTO `visiter` (`NO`, `Name`, `Designation`, `NOC`, `AOC`, `Phone`, `Email`, `QR`, `admin`, `UniqueID`) VALUES
(1, 'Nitish', 'Cricketer', 'MNO', 'Virar', '7347595720', 'bcci@gmail.com', 'image/23230221NIT.png', 2, '23230221NIT'),
(2, 'Vikas', 'Student', 'MNO', 'Virar', '93449054314', 'bcci@gmail.com', 'image/23232545VIK.png', 6, '23232545VIK'),
(3, 'Sanjana', 'Graphic Designer', 'MNO', 'Virar', '7734922893', 'sam@gmail.com', 'image/25151834SAN.png', 5, '25151834SAN'),
(4, 'Harshit', 'House Wife', 'MNO', 'Virar', '7347595720', 'sam@gmail.com', 'image/25152031HAR.png', 9, '25152031HAR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `qr_scanned`
--
ALTER TABLE `qr_scanned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vender`
--
ALTER TABLE `vender`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `visiter`
--
ALTER TABLE `visiter`
  ADD PRIMARY KEY (`NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `qr_scanned`
--
ALTER TABLE `qr_scanned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vender`
--
ALTER TABLE `vender`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visiter`
--
ALTER TABLE `visiter`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
