-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 12:36 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_data`
--

CREATE TABLE `image_data` (
  `image_id` int(4) NOT NULL,
  `filename` varchar(256) NOT NULL,
  `diagnosis` varchar(256) NOT NULL,
  `confidence_score` varchar(256) NOT NULL,
  `timestamp` datetime NOT NULL,
  `user_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_data`
--

INSERT INTO `image_data` (`image_id`, `filename`, `diagnosis`, `confidence_score`, `timestamp`, `user_id`) VALUES
(1, '1_1.png', 'ductal_carcinoma', '1.0', '2018-11-12 17:02:20', 1),
(2, '1_2.png', 'ductal_carcinoma', '1.0', '2018-11-12 17:13:08', 1),
(3, '1_3.png', 'adenosis', '0.52338886', '2018-11-13 10:09:39', 1),
(4, '1_4.png', 'lobular_carcinoma', '0.9999918', '2018-11-15 12:38:38', 1),
(5, '1_5.png', 'adenosis', '0.9981567', '2018-11-15 12:39:27', 1),
(10, '1_6.png', '', '', '2018-12-06 01:25:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_data`
--

CREATE TABLE `patient_data` (
  `p_id` int(4) NOT NULL,
  `radius_mean` varchar(64) NOT NULL,
  `texture_mean` varchar(32) NOT NULL,
  `perimeter_mean` varchar(32) NOT NULL,
  `area_mean` varchar(32) NOT NULL,
  `smoothness_mean` varchar(32) NOT NULL,
  `compactness_mean` varchar(32) NOT NULL,
  `concavity_mean` varchar(32) NOT NULL,
  `concave_points_mean` varchar(32) NOT NULL,
  `symmetry_mean` varchar(32) NOT NULL,
  `fractal_dimension_mean` varchar(32) NOT NULL,
  `radius_se` varchar(32) NOT NULL,
  `texture_se` varchar(32) NOT NULL,
  `parimeter_se` varchar(32) NOT NULL,
  `area_se` varchar(32) NOT NULL,
  `smoothness_se` varchar(32) NOT NULL,
  `compactness_se` varchar(32) NOT NULL,
  `concavity_se` varchar(32) NOT NULL,
  `concave_points_se` varchar(32) NOT NULL,
  `symmetry_se` varchar(32) NOT NULL,
  `fractal_dimension_se` varchar(32) NOT NULL,
  `radius_worst` varchar(32) NOT NULL,
  `texture_worst` varchar(32) NOT NULL,
  `parimeter_worst` varchar(32) NOT NULL,
  `area_worst` varchar(32) NOT NULL,
  `smoothness_worst` varchar(32) NOT NULL,
  `compactness_worst` varchar(32) NOT NULL,
  `concavity_worst` varchar(32) NOT NULL,
  `concave_points_worst` varchar(32) NOT NULL,
  `symmetry_worst` varchar(32) NOT NULL,
  `fractal_dimension_worst` varchar(32) NOT NULL,
  `diagnosis` varchar(256) NOT NULL,
  `other` varchar(256) NOT NULL,
  `time` datetime NOT NULL,
  `user_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `dob` varchar(32) NOT NULL,
  `age` int(2) NOT NULL,
  `fname` varchar(64) NOT NULL,
  `lname` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `username`, `password`, `dob`, `age`, `fname`, `lname`) VALUES
(1, 'ayungavis@gmail.com', 'ayungavis', 'f4f671e5d9f2e918199247c5457e5723', '1997-05-18', 18, 'Ayung', 'Avis'),
(2, 'testing@breast.com', 'test', '098f6bcd4621d373cade4e832627b4f6', '1997-05-18', 21, 'Test', 'Ting'),
(3, 'ayungavis@gmail.com', 'ahay', 'f4f671e5d9f2e918199247c5457e5723', '0000-00-00', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_data`
--
ALTER TABLE `image_data`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `patient_data`
--
ALTER TABLE `patient_data`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_data`
--
ALTER TABLE `image_data`
  MODIFY `image_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient_data`
--
ALTER TABLE `patient_data`
  MODIFY `p_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
