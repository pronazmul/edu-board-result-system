-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 07:33 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edu_result`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pass` varchar(150) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `name`, `email`, `pass`, `status`) VALUES
(2, 'Nazmul', 'n@gmail.com', '$2y$10$n4uVDJzRguHQaMqkm0C1eO9naKrBQYQEsd5d1IM0V.tjc6/3sCsNu', 'active'),
(3, 'Nazmul', 'b@gmail.com', '$2y$10$Fhkfw8uQg2h3GmTCRWPrieS96Tl11LGnJK1vBkZFQuedUu/ULQqkq', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `st_info`
--

CREATE TABLE `st_info` (
  `st_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `roll` varchar(15) DEFAULT NULL,
  `reg` varchar(15) DEFAULT NULL,
  `institute` varchar(25) DEFAULT NULL,
  `board` varchar(15) DEFAULT NULL,
  `photo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_info`
--

INSERT INTO `st_info` (`st_id`, `name`, `roll`, `reg`, `institute`, `board`, `photo`) VALUES
(1, 'Nazmul Huda', '01', '02', 'Fulbaria Pailot', 'Dhaka', '74fd9cffb7bd34a857e580706d557f23.jpg'),
(2, 'Billal Hossain', '02', '03', 'Keshobpur Heigh', 'Jessore', '2d4e9e54006be7c82b5595d6a3001028.jpg'),
(3, 'Arafat Hossain', '03', '04', 'Kustia Heigh Sc', 'Kustia', '24d0d134cc0137b1e29523a84de90f12.jpg'),
(4, 'Khalid Hasan', '04', '05', 'Sylet Heigh  sc', 'Sylet', 'a4f389f21491eb283fb49afb10cf4f1c.png'),
(5, 'Hasan', '05', '06', 'Jamalpur Heigh ', 'Mymensingh', '5adf2103b0f9af9a077f05116a6925d7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `st_result`
--

CREATE TABLE `st_result` (
  `roll` varchar(15) NOT NULL,
  `reg` varchar(15) DEFAULT NULL,
  `bangla` int(3) DEFAULT NULL,
  `bangla_grade` varchar(2) DEFAULT NULL,
  `bangla_gpa` float(2,1) DEFAULT NULL,
  `english` int(3) DEFAULT NULL,
  `english_grade` varchar(2) DEFAULT NULL,
  `english_gpa` float(2,1) DEFAULT NULL,
  `math` int(3) DEFAULT NULL,
  `math_grade` varchar(2) DEFAULT NULL,
  `math_gpa` float(2,1) DEFAULT NULL,
  `science` int(3) DEFAULT NULL,
  `science_grade` varchar(2) DEFAULT NULL,
  `science_gpa` float(2,1) DEFAULT NULL,
  `social` int(3) DEFAULT NULL,
  `social_grade` varchar(2) DEFAULT NULL,
  `social_gpa` float(2,1) DEFAULT NULL,
  `religion` int(3) DEFAULT NULL,
  `religion_grade` varchar(2) DEFAULT NULL,
  `religion_gpa` float(2,1) DEFAULT NULL,
  `cgpa` float(3,2) DEFAULT NULL,
  `result` varchar(10) DEFAULT NULL,
  `total_grade` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_result`
--

INSERT INTO `st_result` (`roll`, `reg`, `bangla`, `bangla_grade`, `bangla_gpa`, `english`, `english_grade`, `english_gpa`, `math`, `math_grade`, `math_gpa`, `science`, `science_grade`, `science_gpa`, `social`, `social_grade`, `social_gpa`, `religion`, `religion_grade`, `religion_gpa`, `cgpa`, `result`, `total_grade`) VALUES
('01', '02', 50, 'B', 3.0, 60, 'A-', 3.5, 70, 'A', 4.0, 80, 'A+', 5.0, 85, 'A+', 5.0, 78, 'A', 4.0, 4.08, 'Passed', 'A'),
('02', '03', 90, 'A+', 5.0, 88, 'A+', 5.0, 90, 'A+', 5.0, 98, 'A+', 5.0, 85, 'A+', 5.0, 98, 'A+', 5.0, 5.00, 'Passed', 'A+'),
('03', '04', 60, 'A-', 3.5, 77, 'A', 4.0, 88, 'A+', 5.0, 99, 'A+', 5.0, 42, 'C', 2.0, 67, 'A-', 3.5, 3.83, 'Passed', 'A-'),
('05', '06', 77, 'A', 4.0, 88, 'A+', 5.0, 99, 'A+', 5.0, 66, 'A-', 3.5, 75, 'A', 4.0, 66, 'A-', 3.5, 4.17, 'Passed', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `st_info`
--
ALTER TABLE `st_info`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `st_result`
--
ALTER TABLE `st_result`
  ADD PRIMARY KEY (`roll`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `st_info`
--
ALTER TABLE `st_info`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
