-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 17, 2024 at 09:56 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentsproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `AcademicInformation`
--

CREATE TABLE `AcademicInformation` (
  `ID` int(11) NOT NULL,
  `Roll_Number` varchar(20) DEFAULT NULL,
  `Branch` varchar(10) DEFAULT NULL,
  `College` varchar(255) DEFAULT NULL,
  `Current_Semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AcademicInformation`
--

INSERT INTO `AcademicInformation` (`ID`, `Roll_Number`, `Branch`, `College`, `Current_Semester`) VALUES
(1, '123', 'CSE', 'Govt Politechnic College, Waidhan', 2),
(3, '1536', 'CSE', 'Govt College', 1),
(4, '1537', 'CSE', 'Govt College, Waidhan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Results`
--

CREATE TABLE `Results` (
  `ID` int(11) NOT NULL,
  `Roll_Number` varchar(20) DEFAULT NULL,
  `Semester` int(11) DEFAULT NULL,
  `Overall_Percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Results`
--

INSERT INTO `Results` (`ID`, `Roll_Number`, `Semester`, `Overall_Percentage`) VALUES
(1, '123', 1, '65.00'),
(2, '123', 2, '56.00'),
(3, '123', 3, '75.00'),
(4, '1536', 1, '50.00'),
(5, '1536', 2, '67.00'),
(6, '1536', 3, '87.00'),
(7, '1536', 4, '76.00'),
(8, '1536', 5, '78.00'),
(9, '1537', 1, '65.00'),
(10, '1537', 2, '66.00'),
(11, '1537', 3, '78.00'),
(12, '1537', 4, '65.00'),
(13, '1537', 5, '65.00'),
(14, '1537', 6, '89.00'),
(15, '123', 4, '64.00'),
(16, '123', 5, '60.00'),
(17, '123', 6, '79.00'),
(18, '1536', 6, '90.00');

-- --------------------------------------------------------

--
-- Table structure for table `StudentPersonalInformation`
--

CREATE TABLE `StudentPersonalInformation` (
  `ID` int(11) NOT NULL,
  `Roll_Number` varchar(20) DEFAULT NULL,
  `Student_Name` varchar(100) DEFAULT NULL,
  `Student_Phone` varchar(10) DEFAULT NULL,
  `Student_Email` varchar(50) DEFAULT NULL,
  `Fathers_Name` varchar(100) DEFAULT NULL,
  `Fathers_Phone` varchar(10) DEFAULT NULL,
  `Mothers_Name` varchar(100) DEFAULT NULL,
  `Mothers_Phone` varchar(10) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `StudentPersonalInformation`
--

INSERT INTO `StudentPersonalInformation` (`ID`, `Roll_Number`, `Student_Name`, `Student_Phone`, `Student_Email`, `Fathers_Name`, `Fathers_Phone`, `Mothers_Name`, `Mothers_Phone`, `Address`) VALUES
(1, '123', 'Prince Sharma', '1234567890', 'abc@xyz.comok', 'Naveen Sharmaok', '9876543202', 'Aradhana Sharma', '9878065432', 'D-47, Pandav Nagar, New Delhi Delhi, 110092'),
(2, '1536', 'Harshita Pandey', '9876543210', 'Harshita@gmail.com', 'Fathers Name', '98787866', 'Mother Name', '1234567890', 'Singrauli, Waidhan, Madhya Pradesh, MP'),
(3, '123', 'Prince Sharma', '1234567890', 'abc@xyz.comok', 'Naveen Sharmaok', '9876543202', 'Aradhana Sharma', '9878065432', 'D-47, Pandav Nagar, New Delhi Delhi, 110092'),
(4, '1537', 'Niharika Singh', '9876544321', 'Niharika@gmail.com', 'Fathers Name', '098765433', 'Niharika Mother NAme', '0987665432', 'Waidhan, Singrauli, Sidhi, MP 486675');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AcademicInformation`
--
ALTER TABLE `AcademicInformation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Results`
--
ALTER TABLE `Results`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `StudentPersonalInformation`
--
ALTER TABLE `StudentPersonalInformation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AcademicInformation`
--
ALTER TABLE `AcademicInformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Results`
--
ALTER TABLE `Results`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `StudentPersonalInformation`
--
ALTER TABLE `StudentPersonalInformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
