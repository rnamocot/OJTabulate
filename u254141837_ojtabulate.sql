-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2023 at 01:04 AM
-- Server version: 10.6.11-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u254141837_ojtabulate`
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

--
-- Dumping data for table `ojt_admin`
--

INSERT INTO `ojt_admin` (`ojt_admin_id`, `ojt_admin_username`, `ojt_admin_password`, `ojt_admin_created_date`) VALUES
(1, 'wexler_admin', 'Ice4sale!', '2023-03-09 01:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `ojt_employee`
--

CREATE TABLE `ojt_employee` (
  `ojt_employee_id` int(255) NOT NULL,
  `ojt_employee_status` varchar(255) NOT NULL DEFAULT 'No Status',
  `ojt_employee_name` varchar(255) NOT NULL,
  `ojt_employee_supervisor` varchar(255) NOT NULL,
  `ojt_employee_phone` varchar(255) NOT NULL,
  `ojt_employee_email` varchar(255) NOT NULL,
  `ojt_employee_address` varchar(255) NOT NULL,
  `ojt_employee_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ojt_teachers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ojt_employee`
--

INSERT INTO `ojt_employee` (`ojt_employee_id`, `ojt_employee_status`, `ojt_employee_name`, `ojt_employee_supervisor`, `ojt_employee_phone`, `ojt_employee_email`, `ojt_employee_address`, `ojt_employee_created_date`, `ojt_teachers_id`) VALUES
(13, 'Appointment met', 'Shark PTY 1', 'NExplay PTY', '61432039900', 'admin@gmail.com', 'Sydney', '2023-03-09 07:20:36', 15),
(14, 'Nurtured', 'TNC New', 'dwadad', '221323132131', 'jsibag@gmail.com', 'PH', '2023-03-12 04:31:41', 13);

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
  `ojt_full_name` varchar(255) NOT NULL,
  `ojt_teachers_username` varchar(255) NOT NULL,
  `ojt_teachers_password` varchar(255) NOT NULL,
  `ojt_teachers_email` varchar(255) NOT NULL,
  `ojt_teachers_phone` varchar(255) NOT NULL,
  `ojt_teachers_created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ojt_teachers`
--

INSERT INTO `ojt_teachers` (`ojt_teachers_id`, `ojt_full_name`, `ojt_teachers_username`, `ojt_teachers_password`, `ojt_teachers_email`, `ojt_teachers_phone`, `ojt_teachers_created_date`) VALUES
(11, 'Ren PTY', 'rnamocot', '$2y$10$ZZnBOqy2FEpxfUPtuAVjN./ViOmBhJi76upZLSzvGuEsMbRw3UVEG', 'reniewordpress@gmail.com', '221323132131', '2023-03-07 11:51:20'),
(12, 'Ren', 'admin', '$2y$10$ocuJm.Xak5L8DYmQdeeV3uSwlDs8CVCApYnIrZPMOaltfoWmkmWka', 'admin@gmaillcom', 'admin', '2023-03-07 14:03:51'),
(13, 'montessori', 'rnamocot33', '$2y$10$fpl7dxnq.lRmMeCUsi7mIe8Qjku9NbJMoxEJ6W5mx4pGnZ1jdiKAK', 'reniemedia@gmail.com', '221323132131', '2023-03-08 09:52:37'),
(14, 'PTY comp', 'renadn', '$2y$10$r0JDNiH2X4taNOQF9PUPXOTiVCd6BEdqizVeGYgEAZq.mW1f5Sfqy', 'admin@gmail.com', '61432039900', '2023-03-09 07:05:24'),
(15, 'adminme', 'admin33', '$2y$10$DGo0Dmc6WKoliIuW2BDP1eA/Wp6g9Z3TMgDSoReuxXhChIWKUHiUa', 'sales@cmactive.com', 'admin', '2023-03-09 07:19:47'),
(16, 'Christopher', 'tooshort01', '$2y$10$KRhTLERqz8YOr/n27dzR0.ai7u1xe4CZ9ZdUUfLMRQhAxAwNUY1yi', 'christophervistal25@gmail.com', '+639270323277', '2023-03-22 04:21:25');

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
  ADD KEY `ojt_employee_fk_id` (`ojt_teachers_id`);

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
  MODIFY `ojt_admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ojt_employee`
--
ALTER TABLE `ojt_employee`
  MODIFY `ojt_employee_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ojt_students`
--
ALTER TABLE `ojt_students`
  MODIFY `ojt_students_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ojt_teachers`
--
ALTER TABLE `ojt_teachers`
  MODIFY `ojt_teachers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ojt_employee`
--
ALTER TABLE `ojt_employee`
  ADD CONSTRAINT `ojt_employee_ibfk_1` FOREIGN KEY (`ojt_teachers_id`) REFERENCES `ojt_teachers` (`ojt_teachers_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
