-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 07:40 PM
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
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251'),
(18, 'hello', 'hello'),
(19, 'test', '$2y$10$5uNtUszuNvQr5Rt2PrZqn.qpX2JBathIe8tESSyxNL0cRMYhDqTha'),
(20, 'arigato', '$2y$10$lZrLdkTihOCYYC87b5AQ3OLoQIVSPdMpgz29e8tjXqUuvuaHJQnse'),
(21, 'helloworld', '$2y$10$ymqqwrKx6fPojOWoz.j95.Ae6.o/J0RT.lEfyDk9oWzQpiJFEnbOS'),
(22, '', '$2y$10$.SJRR.aR8T5U370k1i1pIe.ueeRnLxkhgSjl3LQ/EnAjHOuI6Eomi');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `credit` decimal(10,2) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `semester` int(10) DEFAULT NULL,
  `no_of_seats` int(11) DEFAULT NULL,
  `CheckIn` varchar(255) DEFAULT NULL,
  `CheckOut` varchar(255) DEFAULT NULL,
  `dept_ID` int(11) NOT NULL,
  `Instructor_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `title`, `credit`, `department`, `semester`, `no_of_seats`, `CheckIn`, `CheckOut`, `dept_ID`, `Instructor_ID`) VALUES
(1, 'CSE3101', 3.00, 'CSE', NULL, 50, '08:00:00', '09:15:00', 5, 1),
(2, 'EEE1011', 3.00, 'EEE', NULL, 10, '08:00', '08:50', 2, 1),
(3, 'CSE3142', 3.00, 'CSE', NULL, 50, '10:40', '12:00', 5, 1),
(4, 'CSE3150', 0.75, 'CSE', NULL, 10, '15:35', '17:30', 5, 1),
(5, 'CSE9929', 3.00, 'CSE', NULL, 10, '17:00', '18:00', 5, 1),
(6, 'CSE3939', 3.00, 'CSE', NULL, 10, '08:00', '10:30', 5, 1),
(7, 'CSE3771', 3.00, 'CSE', NULL, 10, '17:00', '18:00', 5, 1),
(8, 'CSE777', 3.00, 'CSE', NULL, 10, '17:00', '18:00', 5, 1),
(9, 'CSE7473', 3.00, 'CSE', NULL, 10, '08:00', '10:40', 5, 1),
(10, 'CSE7737', 3.00, 'CSE', NULL, 10, '08:00', '10:40', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_ID`, `name`, `location`) VALUES
(1, 'Civil', '2nd & 3rd floor'),
(2, 'EEE', '4th floor'),
(3, 'Architecture', '5th floor'),
(4, 'Textile', '6th floor'),
(5, 'CSE', '7th floor'),
(6, 'Mechanical', '8th floor'),
(7, 'BBA', 'C Block'),
(11, 'Botany ', 'Sky');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `Instructor_ID` int(11) NOT NULL,
  `Instructor_Code` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`Instructor_ID`, `Instructor_Code`, `FirstName`, `LastName`, `Department`) VALUES
(1, 100001, 'Shuvo', 'Sir', 'CSE'),
(2, 10003, 'Zahid', 'Sir', 'CSE'),
(3, 10004, 'Anik', 'Vai', 'Botany');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `reg_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `grade` decimal(10,2) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `Student_ID` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `status`, `grade`, `date`, `Student_ID`, `course_id`) VALUES
(10, 0, 0.00, '2024-01-12 16:19:33', 1001, 2),
(11, 0, 0.00, '2024-01-19 15:34:20', 1001, 3),
(12, 0, 0.00, '2024-01-19 15:36:22', 1001, 4),
(13, 0, 0.00, '2024-01-19 15:41:01', 1007, 3),
(14, 0, 0.00, '2024-01-19 16:49:52', 1007, 1),
(15, 0, 0.00, '2024-01-19 16:49:55', 1007, 2),
(16, 0, 0.00, '2024-01-19 17:55:30', 1001, 5),
(17, 0, 0.00, '2024-01-19 18:05:18', 1007, 5),
(18, 0, 0.00, '2024-01-19 18:05:28', 1007, 5),
(19, 0, 0.00, '2024-01-19 18:12:36', 1001, 6),
(20, 0, 0.00, '2024-01-19 18:33:46', 1001, 7),
(21, 0, 0.00, '2024-01-19 18:35:41', 1001, 8),
(22, 0, 0.00, '2024-01-20 04:48:06', 1001, 9);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_ID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `cgpa` decimal(10,2) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_ID`, `FirstName`, `LastName`, `Address`, `Email`, `department`, `semester`, `cgpa`, `password`) VALUES
(1, 'Anik Kumar', 'Sannyashi', 'abc', 'abc@gmail.com', 'CSE', '3rd Year 1 Semester', 2.96, 'Hello World'),
(2, 'Mubaswira Ibnat', 'Zidney', 'xyz', 'xyz@gmail.com', 'CSE', '3rd Year 1 Semester', 3.60, 'Hello World'),
(3, 'Anika Anjum', 'Arin', 'pqr', 'pqr@gmail.com', 'CSE', '3rd Year 1 Semester', 2.80, 'Hello World'),
(4, 'Sumaiya Zoha', 'Rodela', 'def', 'def@gmail.com', 'CSE', '3rd Year 1 Semester', 3.00, 'Hello World'),
(1001, 'MUBASWIRA IBNAT', 'ZIDNEY', 'Sipahi Bagh Bazaar', 'zidneyartist@gmail.com', 'CSE', '3rd year 1st Semester', 3.99, '$2y$10$yAPqgP7nfq6gnleLVPWVMOE4E4QyhbGToT9nPtKceph2wrl4wAJHy'),
(1002, 'Nafi', 'Ahmed', 'Mirpur', 'nafiahmed@gmail.com', 'CSE', 'Alumni 1.2 ', 3.33, '$2y$10$ExLj6/xvDECoWRSoDcTYye6yV59e6klccXGQZZ3bxzDbt2orj99eq'),
(1003, 'Nabil', 'Kabil', 'mirpur', 'nabil@gmail.com', 'GG', '-1.1', 3.30, '$2y$10$AqbpOqArEN8mOFSND2UoF.q4yCwF.aGmlji6YT3F9smMHMtlJ98ne'),
(1004, 'Hello', 'World', 'okay', 'okay@gmail.com', 'CSE', '2nd semester', 3.31, '$2y$10$rZDpDjPwKgFd2dRjfL0ZfeBgPd6Nl/ebuocJSsqcDa6RyHwYWaZiy'),
(1005, 'Fahim', 'Vai', 'Mirpur', 'fahimvai@gmail.com', 'CSE', 'Alumni 1.1 ', 3.84, '$2y$10$DOYpPDzh0aCoFEqP9MwOseb3phUOuftuLhq1VGENuUcfTawvH.FcO'),
(1006, 'Zidney', 'Artist', 'Sipahi Bagh Bazaar', 'zidneyartist1234@gmail.com', 'CSE', '3rd year 1st Semester', 3.99, '$2y$10$VL0GBzueMhQWLSsUTZpEZOdmgqHthwx90c2S96yxLTor4dCHyz5i.'),
(1007, 'Hublu', 'Dablu', 'okaydokaynokay', 'hablu@gmail.com', 'BBA', '1.1', 0.00, '$2y$10$s8XGr/iAWMvqLJAblmus/ORvUX75Rb8C2zHPZvWe.JkN7lwu/KQ1y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `dept_ID` (`dept_ID`),
  ADD KEY `Instructor_ID` (`Instructor_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_ID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`Instructor_ID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `Student_ID` (`Student_ID`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `Instructor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_ID`) REFERENCES `department` (`dept_ID`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`Instructor_ID`) REFERENCES `instructor` (`Instructor_ID`);

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`),
  ADD CONSTRAINT `register_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
