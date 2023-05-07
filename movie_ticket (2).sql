-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2023 at 06:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `bill_id` int(4) NOT NULL,
  `book_id` int(4) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `bill_date` date NOT NULL DEFAULT current_timestamp(),
  `owner_id` int(4) NOT NULL,
  `cust_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`bill_id`, `book_id`, `amount`, `bill_date`, `owner_id`, `cust_id`) VALUES
(70, 113, '3680', '2023-01-14', 4, 13),
(71, 114, '3050', '2023-01-14', 4, 13),
(77, 120, '236.25', '2023-01-15', 4, 19),
(90, 133, '535.5', '2023-01-16', 4, 13),
(91, 133, '535.5', '2023-01-16', 4, 13),
(92, 133, '535.5', '2023-01-16', 4, 13),
(98, 139, '18800', '2023-01-19', 14, 19),
(99, 140, '315', '2023-01-22', 4, 19),
(100, 141, '3050', '2023-01-24', 4, 22),
(101, 142, '535.5', '2023-01-26', 4, 19);

--
-- Triggers `billing`
--
DELIMITER $$
CREATE TRIGGER `commission_to_admin` AFTER INSERT ON `billing` FOR EACH ROW INSERT INTO commission(commission_amount,pay_to_owner,bill_id,date_of_commission) VALUES((new.amount*0.25),(new.amount*0.75),new.bill_id,now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` int(4) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `c_id` int(4) NOT NULL,
  `t_id` int(4) NOT NULL,
  `m_id` int(4) NOT NULL,
  `timing` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `customer_name`, `c_id`, `t_id`, `m_id`, `timing`) VALUES
(113, 'vivek soni', 13, 15, 5, '2023-01-14'),
(114, 'vivek soni', 13, 15, 5, '2023-01-14'),
(120, 'tarun', 19, 15, 4, '2023-01-11'),
(133, 'vivek soni', 13, 15, 4, '2023-01-19'),
(139, 'tarun', 19, 29, 16, '2023-01-20'),
(140, 'tarun', 19, 15, 5, '2023-01-25'),
(141, 'ravi', 22, 30, 17, '2023-01-26'),
(142, 'tarun', 19, 22, 5, '2023-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `commision_id` int(4) NOT NULL,
  `commission_amount` varchar(20) NOT NULL,
  `bill_id` int(4) NOT NULL,
  `pay_to_owner` varchar(20) NOT NULL,
  `date_of_commission` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`commision_id`, `commission_amount`, `bill_id`, `pay_to_owner`, `date_of_commission`) VALUES
(9, '920', 70, '2760', '2023-01-14'),
(10, '762.5', 71, '2287.5', '2023-01-14'),
(16, '59.0625', 77, '177.1875', '2023-01-15'),
(29, '133.875', 90, '401.625', '2023-01-16'),
(30, '133.875', 91, '401.625', '2023-01-16'),
(31, '133.875', 92, '401.625', '2023-01-16'),
(37, '4700', 98, '14100', '2023-01-19'),
(38, '78.75', 99, '236.25', '2023-01-22'),
(39, '762.5', 100, '2287.5', '2023-01-24'),
(40, '133.875', 101, '401.625', '2023-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `customer_discount`
--

CREATE TABLE `customer_discount` (
  `dis` int(4) NOT NULL,
  `discount_name` varchar(20) NOT NULL,
  `customer_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_discount`
--

INSERT INTO `customer_discount` (`dis`, `discount_name`, `customer_id`) VALUES
(27, 'MOVIE15', 13),
(28, 'MOVIE15', 19),
(29, 'MOVIE15', 17),
(30, 'MOVIE15', 19),
(31, 'MOVIE15', 20),
(32, 'MOVIE15', 21),
(33, 'MOVIE15', 19),
(34, 'MOVIE15', 22),
(35, 'MOVIE15', 19);

-- --------------------------------------------------------

--
-- Table structure for table `customer_signup`
--

CREATE TABLE `customer_signup` (
  `c_id` int(4) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `DOJ` date NOT NULL DEFAULT current_timestamp(),
  `age` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_signup`
--

INSERT INTO `customer_signup` (`c_id`, `customer_name`, `address`, `email`, `phone`, `password`, `DOJ`, `age`) VALUES
(13, 'vivek soni', 'Hurhuru, Hazaribagh,', 'sonivivek050@gmail.c', '7481 016483', '123', '2022-12-19', 19),
(14, 'ashutosh', 'bangalore', 'ashutosh@gmail.com', '1234567890', '111', '2022-12-23', 18),
(17, 'nishant', 'Hurhuru, Hazaribagh,', 'nishant@gmail.com', '07481 016483', '123', '2023-01-02', 21),
(18, 'shubham', 'Hurhuru, Hazaribagh,', 'shubham@gmail.com', '07481 016483', '123', '2023-01-05', 22),
(19, 'tarun', 'stay grand', 'tarun@gmail.com', '7687576465', '123', '2023-01-14', 21),
(20, 'shiv', 'stay grand', 'shiv12@gmail.com', '9090909090', '1233', '2023-01-16', 20),
(21, 'vimki', 'stay grand', 'vimki67@gmail.com', '8989898989', '123', '2023-01-16', 15),
(22, 'ravi', 'stay grand', 'ravi56@gmail.com', '1234561234', '123', '2023-01-24', 15);

-- --------------------------------------------------------

--
-- Table structure for table `discount_list`
--

CREATE TABLE `discount_list` (
  `discount_id` int(3) NOT NULL,
  `discount_name` varchar(20) NOT NULL,
  `expiry_date` date NOT NULL DEFAULT current_timestamp(),
  `discount_percent` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discount_list`
--

INSERT INTO `discount_list` (`discount_id`, `discount_name`, `expiry_date`, `discount_percent`) VALUES
(4, 'MOVIE15', '2023-01-16', 15);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `m_id` int(4) NOT NULL,
  `owner_id` int(4) NOT NULL,
  `city` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `movie_name` varchar(20) NOT NULL,
  `DOP` date NOT NULL,
  `price` int(4) NOT NULL,
  `rating` decimal(4,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`m_id`, `owner_id`, `city`, `type`, `movie_name`, `DOP`, `price`, `rating`) VALUES
(2, 4, 'Bangalore', '4kdolbyatmos', 'RRR', '2023-01-13', 300, '9.0'),
(4, 4, 'Bangalore', '2d', 'bahubali-2', '2023-01-13', 300, '8.5'),
(5, 4, 'Bangalore', '2d', 'pk', '2023-01-13', 300, '8.5'),
(6, 4, 'Bangalore', '2d', 'golmaal', '2023-01-15', 250, '7.6'),
(7, 4, 'Bangalore', '3d', 'golmaal again', '2023-01-15', 300, '7.4'),
(8, 4, 'Bangalore', '3d', 'welcome', '2023-01-15', 200, '8.9'),
(9, 9, 'Delhi', '4k', 'ironman', '2023-01-15', 450, '9.8'),
(10, 10, 'Mumbai', '4k', 'kantara', '2023-01-15', 500, '9.9'),
(11, 9, 'Delhi', '2d', 'avatar', '2023-01-15', 250, '7.6'),
(13, 12, 'Chennai', '4k', 'robot', '2023-01-16', 450, '9.8'),
(15, 13, 'Mumbai', '3d', 'jss', '2023-01-16', 500, '9.0'),
(16, 14, 'Chennai', '3d', 'pk', '2023-01-19', 450, '8.9'),
(17, 4, 'Delhi', '4k', 'pk', '2023-01-24', 300, '8.9');

-- --------------------------------------------------------

--
-- Table structure for table `owner_signup`
--

CREATE TABLE `owner_signup` (
  `own_id` int(4) NOT NULL,
  `owner_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_signup`
--

INSERT INTO `owner_signup` (`own_id`, `owner_name`, `email`, `address`, `phone`, `password`, `date`) VALUES
(4, 'nishant', 'nishant@gmail.com', 'bangalore', '9876543210', '123', '2022-12-19'),
(6, 'vivek soni', 'sonivivek050@gmail.c', 'Hurhuru, Hazaribagh,', '07481 016483', '123', '2023-01-02'),
(7, 'vivek kumar', 'sonivivek050@gmail.c', 'Hurhuru, Hazaribagh,', '07481 016483', '12345', '2023-01-05'),
(8, 'tarun', 'tarun@gmail.com', 'rajasthan', '9982031303', 'pt', '2023-01-05'),
(9, 'tarun', '1jssjpdj@gmail.com', 'stay grand', '3368768763', '123', '2023-01-15'),
(10, 'smruti', 'smruti@gmail.com', 'kjjshfjkehnf', '8687585478', '123', '2023-01-15'),
(11, 'raiyan arsh', 'tarunsma1g1mhh8@gmail.com', 'B-113 sidhi vinayak colony', '09982031303', '123', '2023-01-15'),
(12, 'shiv', 'shiv45@gmail.com', 'stay grand', '7878787878', '1233', '2023-01-16'),
(13, 'vimki', 'vimki23@gmail.com', 'stay grand', '1234567890', '123', '2023-01-16'),
(14, 'suresh', 'suresh@gmail.com', 'stay grand', '1234567896', '123', '2023-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `t_id` int(4) NOT NULL,
  `owner_id` int(4) NOT NULL,
  `city` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `theatre_name` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `DOP` date NOT NULL DEFAULT current_timestamp(),
  `no_of_seats` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`t_id`, `owner_id`, `city`, `type`, `theatre_name`, `address`, `DOP`, `no_of_seats`) VALUES
(14, 4, 'Delhi', '4kdolbyatmos', 'inox', 'cp', '2023-01-13', 49),
(15, 4, 'Bangalore', '2d', 'pvr', 'lulu mall', '2023-01-14', 48),
(16, 4, 'Bangalore', '2d', 'inox', 'rr nagar', '2023-01-15', 50),
(17, 4, 'Bangalore', '3d', 'jss', 'stay grand', '2023-01-15', 48),
(18, 4, 'Bangalore', '3d', 'rns', 'stay grand pg', '2023-01-15', 50),
(19, 9, 'Delhi', '4k', 'abc', 'cp', '2023-01-15', 40),
(20, 10, 'Mumbai', '4k', 'iit', 'bombay', '2023-01-15', 5),
(21, 9, 'Delhi', '2d', 'pvr', 'stay grand', '2023-01-15', 12),
(22, 11, 'Bangalore', '2d', 'pvr', 'stay grand', '2023-01-15', 48),
(23, 9, 'Hyderabad', '4k', 'pvr', 'rr nagar', '2023-01-15', 5),
(24, 9, 'Bangalore', '2d', 'abcc', 'we', '2023-01-16', 1),
(25, 12, 'Chennai', '4k', 'shh', 'jy', '2023-01-16', 95),
(28, 13, 'Mumbai', '3d', 'jss', 'jss', '2023-01-16', 1),
(29, 14, 'Chennai', '3d', 'pvr', 'rr nagar', '2023-01-19', 10),
(30, 4, 'Delhi', '4k', 'inox', 'cp', '2023-01-24', 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `v_id` (`t_id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`commision_id`),
  ADD KEY `bill_id` (`bill_id`);

--
-- Indexes for table `customer_discount`
--
ALTER TABLE `customer_discount`
  ADD PRIMARY KEY (`dis`);

--
-- Indexes for table `customer_signup`
--
ALTER TABLE `customer_signup`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `discount_list`
--
ALTER TABLE `discount_list`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `owner_signup`
--
ALTER TABLE `owner_signup`
  ADD PRIMARY KEY (`own_id`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `bill_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `commision_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `customer_discount`
--
ALTER TABLE `customer_discount`
  MODIFY `dis` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `customer_signup`
--
ALTER TABLE `customer_signup`
  MODIFY `c_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `discount_list`
--
ALTER TABLE `discount_list`
  MODIFY `discount_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `m_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `owner_signup`
--
ALTER TABLE `owner_signup`
  MODIFY `own_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `theatre`
--
ALTER TABLE `theatre`
  MODIFY `t_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `theatre` (`t_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `commission`
--
ALTER TABLE `commission`
  ADD CONSTRAINT `commission_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `billing` (`bill_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
