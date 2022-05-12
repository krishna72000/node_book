-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2018 at 04:55 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `note_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `create_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fk_user_id`, `name`, `email`, `address`, `create_date`) VALUES
(2, 4, 'Arun Maskey', 'sksharma72000@gmail.com', 'abc', 1516728679),
(4, 4, 'kalu', 'kalu@gmail.com', 'chitwan', 1516848291),
(6, 4, 'kali', 'kali@gmail.com', 'kakska', 1516937521);

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `fk_contact_id` int(11) NOT NULL,
  `number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`id`, `fk_contact_id`, `number`) VALUES
(19, 4, '823983332'),
(20, 4, '8239834334'),
(21, 4, '823934334'),
(34, 2, '8993843iui'),
(35, 2, '438473874'),
(36, 6, '8293923');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `create_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `address`, `phone`, `create_date`) VALUES
(1, 'kamal', 'kamal@gmail.com', '1234567', 'gaindakot', '9845123456', 1546576456),
(4, 'Shree Krishna Acharya', 'sksharma72000@gmail.com', 'kamal12345', 'gaindakot-5', '9845365219', 1502659120),
(5, 'kamla', 'kamal@gmaill.com', 'd68d3f9144b70d50218e8f1194fab902', 'kjcnkj', '0909', 1503066477),
(6, 'Shree Krishna Acharya', 'sksharma720000@gmail.com', 'd68d3f9144b70d50218e8f1194fab902', 'gaindakot-5', '9845365219', 1503106890),
(7, 'kamal', 'kamal1@gmail.com', 'kamal12345', 'gaindakot-5', '9845365219', 1509593642),
(8, 'Shree Krishna Acharya', 'sksharma72000@gmail.com12', 'kamal12345', 'gaindakot-5', '9845365219', 1516453797),
(9, 'kamal', 'sksharma72000@gmail.com12345', '3d4e63c8447d9e515bf552b8bcaef7a8', 'gaindakot-5', '9845365219', 1516501279),
(10, 'Shree Krishna Acharya', 'sksharma72000@gmail.com123', 'd68d3f9144b70d50218e8f1194fab902', 'gaindakot-5', '9845365219', 1516501928),
(11, 'Shree Krishna Acharya', 'sksharma72000@gmail.com12322', 'kamal12345', 'gaindakot-5', '9845365219', 1516502226),
(12, 'kamal', 'sksharma72000@gmail.com2334', 'kamal12345', 'gaindakot-5', '9845365219', 1516506042),
(13, 'kamal', 'sksharma72000@gmail.com234656', 'kamal12345', 'gaindakot-5', '9845365219', 1516506067),
(14, 'krishna', 'krishna@gmail.com', 'kamal12345', 'gaindakot-5', '9845365219', 1517026492);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contact_id` (`fk_contact_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`fk_contact_id`) REFERENCES `contact` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
