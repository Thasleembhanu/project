-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 11:41 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinevoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `ec`
--

CREATE TABLE `ec` (
  `id` int(11) NOT NULL,
  `adminid` varchar(50) NOT NULL,
  `adminpwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec`
--

INSERT INTO `ec` (`id`, `adminid`, `adminpwd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `electionvoting`
--

CREATE TABLE `electionvoting` (
  `id` int(11) NOT NULL,
  `voterid` varchar(50) NOT NULL,
  `voteto` varchar(50) NOT NULL,
  `nomineeid` int(11) NOT NULL,
  `nominationtype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electionvoting`
--

INSERT INTO `electionvoting` (`id`, `voterid`, `voteto`, `nomineeid`, `nominationtype`) VALUES
(1, '1', 'myparty', 1, 'assembly'),
(3, '1', 'ourparty', 3, 'parliament');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` int(11) NOT NULL,
  `nominationtype` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `partyname` varchar(30) NOT NULL,
  `address` varchar(300) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `nominationtype`, `fullname`, `dob`, `gender`, `nationality`, `email`, `phone`, `partyname`, `address`, `status`) VALUES
(1, 'assembly', 'Pavan', '1985-01-01', 'male', 'Indian', 'pavan@gmail.com', '9876543210', 'myparty', 'Proddutur', '1'),
(3, 'parliament', 'Prasad', '1980-05-01', 'male', 'Indian', 'prasad@gmail.com', '8976543210', 'ourparty', 'Proddutur', '1');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `adhaarnumber` varchar(12) NOT NULL,
  `fullname` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `address` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `adhaarnumber`, `fullname`, `password`, `contact`, `gender`, `dob`, `address`, `status`) VALUES
(1, '123456789012', 'Gouthami', '123456789', '9876543210', 'Male', '2000-01-02', 'Proddatur', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec`
--
ALTER TABLE `ec`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminid` (`adminid`);

--
-- Indexes for table `electionvoting`
--
ALTER TABLE `electionvoting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adhaarnumber` (`adhaarnumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec`
--
ALTER TABLE `ec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `electionvoting`
--
ALTER TABLE `electionvoting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
