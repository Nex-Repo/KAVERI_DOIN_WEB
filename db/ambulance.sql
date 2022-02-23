-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 10:17 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ambulance`
--

-- --------------------------------------------------------

--
-- Table structure for table `apicheck`
--

CREATE TABLE `apicheck` (
  `id` int(11) NOT NULL,
  `from_loc` varchar(255) NOT NULL,
  `to_loc` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `vehicle` varchar(20) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `vehicle`, `address1`, `address2`, `phone`, `mobile`, `gender`) VALUES
(2, 'Prashanth', 'KA-02-H-1122', 'bangalore', 'hubli', '774445566', '9946555200', 'Male'),
(3, 'Guru', 'KA-02-H-1998', 'Gadag', 'Gadag', '9591392656', '', 'Male'),
(4, 'nagaraj', 'KA-02-H-1998', 'gubarga', '', '7259977669', '', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `conf_pass` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_name`, `password`, `conf_pass`, `name`, `contact_no`, `address`, `email`, `type`) VALUES
(1, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '0192023a7bbd73250516f069df18b500', 'admin', '9960522271', '', '', 'admin'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', '0192023a7bbd73250516f069df18b500', 'admin', '7895452220', '', '', 'admin'),
(3, 'manju', 'abb01c06878b54c2201d53447e22d7f9', 'abb01c06878b54c2201d53447e22d7f9', 'manju', '8861480247', 'shigli,di:Gadag,karnataka', 'manjunath@gmail.com', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `link2user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `pickup` text NOT NULL,
  `drop_point` text NOT NULL,
  `date` datetime NOT NULL,
  `notes` text NOT NULL,
  `link2driver` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `sound_flag` int(11) NOT NULL,
  `notify_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `link2user`, `name`, `mobile`, `pickup`, `drop_point`, `date`, `notes`, `link2driver`, `status`, `sound_flag`, `notify_flag`) VALUES
(1, 2, 'demo', '8845875220', 'yalahank,banglore ', 'yalahank,bangalore', '2021-06-03 10:35:00', '', 0, 'Cancelled', 1, 1),
(2, 2, 'demo', '8744126500', 'yalahank,banglore ', 'yalahank,bangalore', '2021-06-03 15:23:19', '', 2, 'Accepted', 1, 1),
(3, 3, 'demo', '6360215447', 'yalahank,banglore  ', 'yalahank,bangalore', '2021-06-03 10:35:00', '', 3, 'Accepted', 1, 1),
(4, 2, 'manunath', '8861480470', 'Hubli ', 'Gadag', '2021-06-13 00:00:00', '', 3, 'Accepted', 1, 1),
(5, 2, 'nagaraj', '8845227777', 'gulbarga ', 'hubli', '2021-07-05 11:00:00', '', 4, 'Accepted', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apicheck`
--
ALTER TABLE `apicheck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apicheck`
--
ALTER TABLE `apicheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
