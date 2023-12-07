-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 11:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c_m_system16`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `Batch_ID` int(11) NOT NULL,
  `Teacher_ID` int(11) DEFAULT NULL,
  `Class_shift` varchar(100) DEFAULT NULL,
  `Days` varchar(100) DEFAULT NULL,
  `Start_Time` varchar(100) DEFAULT NULL,
  `End_Time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`Batch_ID`, `Teacher_ID`, `Class_shift`, `Days`, `Start_Time`, `End_Time`) VALUES
(101, 1300, '07 (BM)', 'Sat/Mon/Wed', '9:00 am', '10:20 am'),
(103, 1200, '09 (BM)', 'Sat/Mon/Wed', '6:00 pm', '7:20 pm'),
(201, 1300, '07 (EM)', 'Sun/Tues/Thurs', '9:00 am', '10:20 am'),
(203, 1200, '09 (EM)', 'Sun/Tues/Thurs', '6:00 pm', '7:20 pm');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `User_ID` int(11) DEFAULT NULL,
  `Student_ID` int(11) NOT NULL,
  `Batch_ID` int(11) DEFAULT NULL,
  `Class_shift` varchar(100) DEFAULT NULL,
  `Fees` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`User_ID`, `Student_ID`, `Batch_ID`, `Class_shift`, `Fees`) VALUES
(3, 1003, 103, '07 (BM)', 1500),
(4, 1004, 101, '07 (BM)', 1500),
(24, 1024, 101, '07 (BM)', 1500),
(21, 2021, 103, '09 (BM)', 2000),
(22, 2022, 201, '07 (EM)', 2000),
(26, 2026, 201, '07 (EM)', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `User_ID` int(11) DEFAULT NULL,
  `Teacher_ID` int(11) NOT NULL,
  `Salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`User_ID`, `Teacher_ID`, `Salary`) VALUES
(11, 1100, 20000),
(12, 1200, 15000),
(13, 1300, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Username`, `Password`, `Email`) VALUES
(1, 'Rahad Uddin Samir', '$2y$10$aqDX7GIBrIzs4Isr1CQDMeD/7m9vM.kckdbld8kXsJ3ZWX2NgFjQS', 'admin@gmail.com'),
(3, 'Samir Uddin', '$2y$10$dFqOmosamFLGCpdGNGEFHe9AwTtT2HItx2XwAQBgdzr75iLixJIQa', 'samir@gmail.com'),
(4, 'Shihab Shahriar', '$2y$10$99ivcX.52HsPuTwYTpKJiOVlpmaVmLpEZKq3kKXRf2an1tn/0GshG', 'shahriar@gmail.com'),
(5, 'Najmus Sakib Arko', '$2y$10$dnw7gE0bYmK1cWrZkMzOkuerTRRGHl1mokWtaK0AXhPpsn9sMoFdG', 'arko@gmail.com'),
(11, 'Shihab', '$2y$10$qlPbCjMhP3Cud/.SMUzlo.gdkpd2LF0dLyg6PqU/F6KbYbQIRjQHi', 'shihab1111@gmail.com'),
(12, 'Nishat', '$2y$10$v.sEaRisIEvRhcJvMYAC8eXlPeL688h.a7U4xP8UYfH6S50cV2l3m', 'nishat2222@gmail.com'),
(13, 'Noboni', '$2y$10$Y3quuGJ2FurE7atvLzvzzuYHD/F8BmwwcKvaDfwusJ9unveaZ9wHG', 'noboni3333@gmail.com'),
(21, 'Navid Alvee', '$2y$10$Jst4vzgsmvakcgtEE.pj5OoWrIY8Nz1F8hgKrABQDuh5KqjyhhSPq', 'alvee@gmail.com'),
(22, 'Sifat Nayna', '$2y$10$0wnMvam8hGWQIuF84syF1.k2utkdAQpY/t6nv3mlC5Z6S.EHhKIiS', 'nayna@gmail.com'),
(23, 'Samiha Dilshad', '$2y$10$MJ/XdbTEqYUky3QCq7w5AeQrXKUQ/Re.3wJJEMEakVQtknG5GDcZW', 'samiha@gmail.com'),
(24, 'Abidur Rahman', '$2y$10$S2Xpwt9bM80keVUf06zkje6Fl.6yLjH8DNP/qw2LIVVMgT9e1kOy2', 'abidur@gmail.com'),
(25, 'Rashed Faruque', '$2y$10$HsmczxsusmY62TXknj1PnuTpfk/7fAKchTlRKh2NRmhPOYgqcNf92', 'rashed@gmail.com'),
(26, 'Fardin Rahman', '$2y$10$DBY3YxCIgH70EjHkfCkQGO0IkKJzILM5.bJ7lzmPPM8iq80ZEe3se', 'fardin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`Batch_ID`),
  ADD KEY `Teacher_ID` (`Teacher_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Batch_ID` (`Batch_ID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`Teacher_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teachers` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`Batch_ID`) REFERENCES `batch` (`Batch_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
