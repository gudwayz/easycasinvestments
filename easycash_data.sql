-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2020 at 04:44 AM
-- Server version: 5.7.32-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easycash_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(22) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `uname`, `email`, `phone`, `pass`, `image`, `level`) VALUES
(1, 'Uzoma', 'Njoku', 'gudwayz', 'uzomski@gmail.com', '080348166606', 'chibu', '', 'super'),
(2, 'chinenye', 'forreal', 'chibaby', 'ci@gmail.com', '0803546478', 'chinenye', '', 'super'),
(3, 'Charles ', 'Okoroji', 'denna', 'car@gmail.com', '9383229021039', 'charles', '', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `b_id` int(22) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `acc_no` int(22) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`b_id`, `uname`, `f_name`, `b_name`, `acc_no`) VALUES
(6, '', 'Uzoma Chibueze ', 'fcmb', 345432345),
(7, '08034816606', 'Uzoma Chibueze ', 'first ban', 2147483647),
(8, 'Goodluck22', '', '', 0),
(9, 'chinenye3', '', '', 0),
(10, 'Goodluck22', 'Goodluck Opara', 'Asscc ', 8855342);

-- --------------------------------------------------------

--
-- Table structure for table `invest`
--

CREATE TABLE `invest` (
  `invest_id` int(22) NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `amt_status` varchar(255) NOT NULL,
  `mer_status` varchar(255) NOT NULL,
  `upload` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invest`
--

INSERT INTO `invest` (`invest_id`, `ref_no`, `uname`, `amount`, `date`, `amt_status`, `mer_status`, `upload`) VALUES
(121, 'ECI-12961eb53', 'chinenye3', '50000', '2020-11-02 12:30:08', 'unpaid', 'unmerged', ''),
(120, 'ECI-26e6c272c', 'Goodluck22', '40000', '2020-10-19 19:29:08', 'unpaid', 'unmerged', ''),
(119, 'ECI-3605c338f', 'chinenye3', '50000', '2020-10-16 14:48:14', 'unpaid', 'unmerged', ''),
(118, 'ECI-9053ed70f', 'Goodluck22', '40000', '2020-10-16 12:59:44', 'unpaid', 'unmerged', ''),
(117, 'ECI-714e41025', 'Goodluck22', '50000', '2020-10-15 20:00:18', 'unpaid', 'unmerged', ''),
(116, 'ECI-6b391d22d', 'chinenye3', '50000', '2020-10-15 10:44:19', 'paid', 'unmerged', ''),
(115, 'ECI-886a99b66', 'chinenye3', '50000', '2020-10-15 10:39:00', 'unpaid', 'unmerged', ''),
(114, 'ECI-3d465c1b3', 'chinenye3', '50000', '2020-10-15 10:35:52', 'unpaid', 'unmerged', ''),
(113, 'ECI-624ad5e8d', 'chinenye3', '50000', '2020-10-15 09:36:23', 'unpaid', 'unmerged', ''),
(112, 'ECI-0b191a95e', 'chinenye3', '50000', '2020-10-15 09:33:44', 'unpaid', 'unmerged', ''),
(111, 'ECI-62c7f4825', 'chinenye3', '50000', '2020-10-14 19:24:01', 'unpaid', 'unmerged', ''),
(110, 'ECI-10734a8d3', 'Goodluck22', '5000', '2020-10-14 15:42:08', 'unpaid', 'unmerged', ''),
(109, 'ECI-eb140e9e0', 'Goodluck22', '50000', '2020-10-14 07:25:04', 'unpaid', 'unmerged', ''),
(108, 'ECI-3e977a81d', 'Goodluck22', '40000', '2020-10-13 23:03:03', 'unpaid', 'unmerged', ''),
(107, 'ECI-6f5e977dc', 'chinenye3', '50000', '2020-10-13 10:21:30', 'unpaid', 'unmerged', ''),
(106, 'ECI-010249760', 'chinenye3', '50000', '2020-10-12 20:57:13', 'unpaid', 'unmerged', ''),
(105, 'ECI-7042c7b1b', 'chinenye3', '50000', '2020-10-12 20:38:30', 'unpaid', 'unmerged', ''),
(104, 'ECI-738701800', 'Goodluck22', '50000', '2020-10-12 19:38:37', 'unpaid', 'unmerged', ''),
(103, 'ECI-ba23592eb', 'chinenye3', '50000', '2020-10-10 22:54:21', 'unpaid', 'unmerged', ''),
(102, 'ECI-94b80dd8e', '08034816606', '100000', '2020-10-10 15:17:34', 'unpaid', 'unmerged', ''),
(101, 'ECI-1cb7e1aee', 'Goodluck22', '5000', '2020-10-10 14:45:33', 'unpaid', 'unmerged', ''),
(100, 'ECI-ee2e29f69', 'chinenye3', '50000', '2020-10-10 13:47:41', 'unpaid', 'unmerged', ''),
(99, 'ECI-f9c0949a8', '08034816606', '5000', '2020-10-10 09:22:47', 'unpaid', 'unmerged', ''),
(98, 'ECI-c0e2d87b8', 'chinenye3', '50000', '2020-10-10 09:21:43', 'unpaid', 'unmerged', ''),
(97, 'ECI-d22135e23', '08034816606', '10000', '2020-10-10 03:55:16', 'unpaid', 'unmerged', 'EmmanueL Toby.jpeg'),
(96, 'ECI-3633646b6', 'chinenye3', '50000', '2020-10-09 13:13:19', 'unpaid', 'unmerged', ''),
(95, 'ECI-67c27b841', '08034816606', '10000', '2020-10-09 06:00:25', 'unpaid', 'unmerged', ''),
(94, 'ECI-b2439e99d', '08034816606', '5000', '2009-10-20 04:22:01', 'paid', 'unmerged', 'Bright Gorge.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `term` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `fname`, `lname`, `uname`, `email`, `phone`, `pass`, `contact`, `city`, `state`, `term`) VALUES
(1, 'Uzoma', 'Njoku', 'unzo', 'uzomski@gmail.com', '08034816606', 'uzoma', '# 6 Yisa Oladimeji Street', 'Lagos', 'Lagos', 'yes'),
(2, 'Chinenye', 'Emeribe', 'chinenye3', 'maureenmaggie8@gmail.com', '+2348149961016', 'passworderror', '#2 onu avenue off sea side road oyigbo Rivers State', 'Portharcourt', 'Imo', 'yes'),
(3, 'Goodluck', 'Opara', 'Goodluck22', 'goodluckopara1@gmail.com', '07038339416', 'Opara22', 'Oyigbo', 'Oyigbo', 'Rivers', 'yes'),
(4, 'Goodluck', 'Opara', 'Goodluck22', '', '07038339416', 'Opara22', 'Oyigbo', 'Oyigbo', 'Rivers', 'yes'),
(5, 'oge', 'soya', '08034816606', 'uzo42@yahoo.com', '07024221232', 'ogee12334', '3 uzua', 'aba', 'Abia', 'yes'),
(6, 'Rex', 'Sebastian', 'rextony', 'rextonyuk2011@hotmail.com', '+221784858743', 'progress2020', 'akwa ibom state', 'uyo', 'Akwaibom', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `invest`
--
ALTER TABLE `invest`
  ADD PRIMARY KEY (`invest_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `b_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invest`
--
ALTER TABLE `invest`
  MODIFY `invest_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
