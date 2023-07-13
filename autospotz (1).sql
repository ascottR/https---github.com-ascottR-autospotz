-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 01:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autospotz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` varchar(12) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Username` varchar(12) NOT NULL,
  `Admin_Email` varchar(20) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Phone_Number` varchar(12) NOT NULL,
  `Password` varchar(12) NOT NULL,
  `is_deleted` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Name`, `Username`, `Admin_Email`, `Role`, `Phone_Number`, `Password`, `is_deleted`) VALUES
('AI0001', 'Thakshila Gunawardena', 'ADAMthakshil', 'adamthaksshila@autos', 'Admin Manager', '0775490587', 'ADamthakshil', '0'),
('AI0002', 'tehan', 'ascott', 'ascot@auto.com', 'security', '087 8383434', 'pass123', '0');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `Booking_ID` int(4) NOT NULL,
  `User_ID` int(4) NOT NULL,
  `Slot_ID` int(4) NOT NULL,
  `Pay_ID` varchar(4) NOT NULL,
  `Plate_Number` varchar(12) NOT NULL,
  `Phone_No` int(12) NOT NULL,
  `Check_IN` datetime(6) NOT NULL,
  `Check_OUT` datetime(6) NOT NULL,
  `Status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`Booking_ID`, `User_ID`, `Slot_ID`, `Pay_ID`, `Plate_Number`, `Phone_No`, `Check_IN`, `Check_OUT`, `Status`) VALUES
(1, 1, 1, '0001', 'SP123456', 712345678, '2023-05-30 20:00:00.000000', '2023-05-31 14:00:00.000000', 'closed'),
(107, 1, 1, '59', '555555', 714343, '2023-06-11 17:56:00.000000', '2023-06-11 17:56:00.000000', 'closed'),
(108, 3, 1, '60', '555555', 34028, '2023-06-11 21:54:00.000000', '2023-06-11 23:52:00.000000', 'closed'),
(109, 6, 1, '61', '555555', 34028, '2023-06-12 02:16:00.000000', '2023-06-12 06:16:00.000000', 'on going'),
(110, 6, 2, '62', '555555', 34028, '2023-06-12 02:21:00.000000', '2023-06-12 05:21:00.000000', 'on going');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Msg_ID` int(6) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Msg_ID`, `Name`, `Email`, `Message`) VALUES
(1, 'Tehan', 'email@email.com', 'this is frist msg'),
(2, 'kukka', 'kukka@g.com', 'hello world second msg');

-- --------------------------------------------------------

--
-- Table structure for table `parkingslots`
--

CREATE TABLE `parkingslots` (
  `slotID` int(3) NOT NULL,
  `Type` varchar(8) NOT NULL,
  `Price` float NOT NULL,
  `Status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parkingslots`
--

INSERT INTO `parkingslots` (`slotID`, `Type`, `Price`, `Status`) VALUES
(1, 'Car', 7.5, 'active'),
(2, 'Car', 7.5, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_ID` int(4) NOT NULL,
  `User_ID` int(4) NOT NULL,
  `Payment_Type` varchar(12) NOT NULL,
  `Amount` float NOT NULL,
  `Payment_Date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_ID`, `User_ID`, `Payment_Type`, `Amount`, `Payment_Date`) VALUES
(55, 1, 'cash', 150, '2023-06-11 13:30:55.000000'),
(56, 1, 'cash', 250, '2023-06-11 13:50:35.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(4) NOT NULL,
  `First_Name` varchar(12) NOT NULL,
  `Last_Name` varchar(12) NOT NULL,
  `Username` varchar(12) NOT NULL,
  `Email` varchar(16) NOT NULL,
  `License_No` int(12) NOT NULL,
  `Phone_No` varchar(12) NOT NULL,
  `Password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `First_Name`, `Last_Name`, `Username`, `Email`, `License_No`, `Phone_No`, `Password`) VALUES
(6, 'tehan', 'nima', 'User1', 'tehan@mail.con', 55656566, '03483545', '123456'),
(8, 'kukka', 'bandara', 'kukula', 'kukka@farm.com', 34324555, '098 343244', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`Booking_ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Msg_ID`);

--
-- Indexes for table `parkingslots`
--
ALTER TABLE `parkingslots`
  ADD PRIMARY KEY (`slotID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `Booking_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Msg_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parkingslots`
--
ALTER TABLE `parkingslots`
  MODIFY `slotID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
