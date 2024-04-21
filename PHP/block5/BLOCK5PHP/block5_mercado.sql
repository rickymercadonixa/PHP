-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 10:42 AM
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
-- Database: `block5_mercado`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `student_ID` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `attendance` enum('Present','Absent') DEFAULT 'Absent'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`student_ID`, `first_name`, `middle_name`, `last_name`, `address`, `contact_number`, `photo_path`, `attendance`) VALUES
(1, 'LeianeRei', 'Paasa', 'Pacquiao', 'Cagayan De Oro City', '09092034481', 'uploads/377232257_723929529650366_2433237542618464139_n.jpg', 'Absent'),
(2, 'Shantrael', 'Borja', 'Mercado', 'South Cotabato', '09092034481', 'uploads/375013994_1272395760085679_1646297833270059855_n.jpg', 'Absent'),
(6, 'Ricky', 'Borja', 'Mercado', 'Prk. Mahusay', '09092034481', 'uploads/download.png', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Mname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `Username`, `Password`, `Fname`, `Mname`, `Lname`, `Position`, `Status`) VALUES
(2, 'LeianeRei', 'LeianeRei143', 'LeianeRei', 'Paasa', 'Pacquaio', 'Employee', 0),
(3, 'Jalmer123', '123', 'asd', 'asd', 'asd', 'Employee', 0),
(4, 'as', 'dasd', 'asd', 'asd', 'asd', 'Employee', 0),
(5, '123', '123', '123', '123', '123', 'Employee', 0),
(6, '321', '321', '321', '321', '321', 'Employee', 0),
(7, '12', '12', '12', '12', '12', 'Employee', 0),
(8, '33', '33', '33', '33', '33', 'Employee', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`student_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `student_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
