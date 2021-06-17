-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 06:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `current_balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`name`, `email`, `current_balance`) VALUES
('Samaresh Adak', 'samareshadak1@gmail.com', 50000),
('Argha Paul', 'arghapaul100@gmail.com', 27988),
('Amit Sen', 'amitsen2050@gmail.com', 27075),
('Debraj Sarkar', 'sarkardebraj82@gmail.com', 40000),
('Repon Paul', 'reponpaul123@gmail.com', 8333),
('Rahul Roy', 'royrahul65@gmail.com', 36532),
('Sanjib Das', 'sanjibdas8697@gmail.com', 36990),
('Suman Dey', 'sumandey6375@gmail.com', 40000),
('Tushar Bhowmick', 'tusharbhowmick658@gmail.com', 46000),
('Sayan Paul', 'paulsayan8965@gmail.com', 63250),
('Sayan Paul', 'paulsayan8965@gmail.com', 63250);

-- --------------------------------------------------------

--
-- Table structure for table `transfered_history`
--

CREATE TABLE `transfered_history` (
  `transfered_from` varchar(30) NOT NULL,
  `transfered_to` varchar(30) NOT NULL,
  `transfered_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfered_history`
--

INSERT INTO `transfered_history` (`transfered_from`, `transfered_to`, `transfered_amount`) VALUES
('sanjibdas8697@gmail.com', 'arghapaul100@gmail.com', 6990),
('arghapaul100@gmail.com', 'sanjibdas8697@gmail.com', 6990),
('amitsen2050@gmail.com', 'arghapaul100@gmail.com', 200),
('samareshadak1@gmail.com', 'reponpaul123@gmail.com', 700);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
