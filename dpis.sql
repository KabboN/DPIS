-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 05:35 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpis`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_cd` int(6) NOT NULL,
  `user_id` int(4) NOT NULL,
  `doc_name` varchar(50) NOT NULL,
  `doc_bmdc` int(6) NOT NULL,
  `doc_nid` int(17) NOT NULL,
  `doc_degree` varchar(50) NOT NULL,
  `doc_designation` varchar(30) NOT NULL,
  `doc_institute` varchar(30) NOT NULL,
  `doc_dob` date NOT NULL,
  `doc_address` text NOT NULL,
  `regi_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `flag_verify` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_cd`, `user_id`, `doc_name`, `doc_bmdc`, `doc_nid`, `doc_degree`, `doc_designation`, `doc_institute`, `doc_dob`, `doc_address`, `regi_date`, `flag_verify`) VALUES
(1, 1001, 'Ahad Mosharraf', 3333333, 0, 'MBBS, FCPS, MD (Nephrology)', 'Associate Professor', 'Dhaka Medical College Hospital', '2022-07-01', 'Monipur, Mirpur', '2022-07-23 04:53:53', 0),
(2, 1003, 'Dr. Tamal Sarker', 123456, 0, 'MBBS, FCPS, MD Neuorology)', 'Associate Professor', 'Dhaka Medical College Hospital', '1992-07-08', 'Savar, Dhaka', '2022-07-23 05:31:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pat_cd` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `pat_name` varchar(30) NOT NULL,
  `pat_nid` int(17) NOT NULL,
  `pat_dob` date NOT NULL,
  `pat_add` text NOT NULL,
  `regi_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pat_cd`, `user_id`, `pat_name`, `pat_nid`, `pat_dob`, `pat_add`, `regi_date`) VALUES
(1, 1002, 'Jakiya Sultana', 0, '2022-07-02', 'Monipur, Dhaka', '2022-07-19 16:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `pres_id` int(6) NOT NULL,
  `doctor_cd` int(4) NOT NULL,
  `pat_cd` int(4) NOT NULL,
  `findings` text NOT NULL,
  `advices` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rx`
--

CREATE TABLE `rx` (
  `pres_id` int(8) NOT NULL,
  `medicine` varchar(20) NOT NULL,
  `sig` varchar(20) NOT NULL,
  `days` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `mob` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_type` varchar(12) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `mob`, `email`, `user_type`, `password`) VALUES
(1001, '01833333341', 'ahad@outlook.com', 'Doctor', '900150983cd24fb0d6963f7d28e17f72'),
(1002, '01746993443', 'jakiya@outlook.com', 'Patient', '900150983cd24fb0d6963f7d28e17f72'),
(1003, '01777960906', 'tamalsarker@yahoo.com', 'Doctor', '935ff70b1c989c74806605614417caed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_cd`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pat_cd`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`pres_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_cd` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pat_cd` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `pres_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
