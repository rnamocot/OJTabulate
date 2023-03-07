-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 07:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojt_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `ojt_admin`
--

CREATE TABLE `ojt_admin` (
  `ojt_admin_id` int(255) NOT NULL,
  `ojt_admin_username` varchar(255) NOT NULL,
  `ojt_admin_password` varchar(255) NOT NULL,
  `ojt_admin_created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_employee`
--

CREATE TABLE `ojt_employee` (
  `ojt_employee_id` int(255) NOT NULL,
  `ojt_employee_name` varchar(255) NOT NULL,
  `ojt_employee_supervisor` varchar(255) NOT NULL,
  `ojt_employee_phone` varchar(255) NOT NULL,
  `ojt_employee_email` varchar(255) NOT NULL,
  `ojt_employee_address` varchar(255) NOT NULL,
  `ojt_employee_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ojt_employee_fk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_students`
--

CREATE TABLE `ojt_students` (
  `ojt_students_id` int(255) NOT NULL,
  `ojt_students_username` varchar(255) NOT NULL,
  `ojt_students_password` varchar(255) NOT NULL,
  `ojt_students_name` varchar(255) NOT NULL,
  `ojt_students_email` varchar(255) NOT NULL,
  `ojt_students_phone` varchar(255) NOT NULL,
  `ojt_teacher_id_fk` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_teachers`
--

CREATE TABLE `ojt_teachers` (
  `ojt_teachers_id` int(11) NOT NULL,
  `ojt_teachers_username` varchar(255) NOT NULL,
  `ojt_teachers_password` varchar(255) NOT NULL,
  `ojt_teachers_email` varchar(255) NOT NULL,
  `ojt_teachers_phone` varchar(255) NOT NULL,
  `ojt_teachers_created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ojt_admin`
--
ALTER TABLE `ojt_admin`
  ADD PRIMARY KEY (`ojt_admin_id`);

--
-- Indexes for table `ojt_employee`
--
ALTER TABLE `ojt_employee`
  ADD PRIMARY KEY (`ojt_employee_id`),
  ADD KEY `ojt_employee_fk_id` (`ojt_employee_fk_id`);

--
-- Indexes for table `ojt_students`
--
ALTER TABLE `ojt_students`
  ADD PRIMARY KEY (`ojt_students_id`),
  ADD KEY `ojt_teacher_id_fk` (`ojt_teacher_id_fk`);

--
-- Indexes for table `ojt_teachers`
--
ALTER TABLE `ojt_teachers`
  ADD PRIMARY KEY (`ojt_teachers_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ojt_admin`
--
ALTER TABLE `ojt_admin`
  MODIFY `ojt_admin_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ojt_employee`
--
ALTER TABLE `ojt_employee`
  MODIFY `ojt_employee_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ojt_students`
--
ALTER TABLE `ojt_students`
  MODIFY `ojt_students_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ojt_teachers`
--
ALTER TABLE `ojt_teachers`
  MODIFY `ojt_teachers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ojt_employee`
--
ALTER TABLE `ojt_employee`
  ADD CONSTRAINT `ojt_employee_ibfk_1` FOREIGN KEY (`ojt_employee_fk_id`) REFERENCES `ojt_students` (`ojt_students_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
