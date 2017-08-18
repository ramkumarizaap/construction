-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2017 at 09:16 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `construction`
--

-- --------------------------------------------------------

--
-- Table structure for table `contractor`
--

CREATE TABLE `contractor` (
  `id` int(11) NOT NULL,
  `first_name` varchar(155) NOT NULL,
  `last_name` varchar(155) NOT NULL,
  `username` varchar(155) NOT NULL,
  `password` varchar(200) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `active` enum('Y','N') NOT NULL,
  `office_phone` varchar(15) NOT NULL,
  `cell_phone` varchar(15) NOT NULL,
  `email1` varchar(155) NOT NULL,
  `email2` varchar(155) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(10) NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractor`
--

INSERT INTO `contractor` (`id`, `first_name`, `last_name`, `username`, `password`, `company_name`, `active`, `office_phone`, `cell_phone`, `email1`, `email2`, `address1`, `address2`, `city`, `state`, `zip`, `created_id`, `updated_id`, `created_date`, `updated_date`) VALUES
(5, 'Test', 'Izaap', 'test32126', '5f4dcc3b5aa765d61d8327deb882cf99', 'Izaap Technologies', 'Y', '1234567890', '9876543210', 'test.izaap@gmail.com', 'test.izaap@gmail.com', 'Valasravakkam', '', 'Chennai', 'Tamilnadu', 600087, 1, 0, '2017-08-16 15:32:24', '2017-08-16 13:32:24'),
(6, 'Tester', 'Tech', 'tester23743', '5f4dcc3b5aa765d61d8327deb882cf99', 'Izaap Tech', 'Y', '6543210789', '3214569870', 'tester.izaap@gmail.com', '', 'Valasravakkam', '', 'Chennai', 'Tamilnadu', 600087, 1, 0, '2017-08-16 15:33:27', '2017-08-16 13:33:27'),
(7, 'Developer', 'Dev', 'developer1407', '5f4dcc3b5aa765d61d8327deb882cf99', 'Izaap', 'Y', '1234657980', '9876543210', 'developer000@gmail.com', 'test@gmail.comn', '2nd Main Road', '', 'Scottsdale', 'AZ', 800051, 1, 0, '2017-08-18 09:13:27', '2017-08-18 07:13:27'),
(8, 'Devops', 'D', 'devops19884', '5f4dcc3b5aa765d61d8327deb882cf99', 'Izaap Tech Pvt Ltd', 'Y', '4454156465', '4454156465', 'developer888@gmail.com', 'test@gmail.comn', '2nd Main Road', '', 'Scottsdale', 'AZ', 800051, 1, 0, '2017-08-18 09:14:13', '2017-08-18 07:14:13'),
(9, 'Tester', 'Testing', 'tester1877', '5f4dcc3b5aa765d61d8327deb882cf99', 'Izaap Pvt Ltd.', 'Y', '4454156465', '4454156465', 'tester000@gmail.com', 'test@gmail.comn', '2nd Main Road', '', 'Scottsdale', 'AZ', 800051, 1, 0, '2017-08-18 09:14:55', '2017-08-18 07:14:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contractor`
--
ALTER TABLE `contractor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contractor`
--
ALTER TABLE `contractor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
