-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2020 at 05:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Library`
--

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `Book_id` varchar(50) NOT NULL,
  `Book_Name` varchar(255) NOT NULL,
  `Author` text NOT NULL,
  `Publisher` text NOT NULL,
  `No_of_copies` int(11) DEFAULT NULL,
  `Domain` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`Book_id`, `Book_Name`, `Author`, `Publisher`, `No_of_copies`, `Domain`) VALUES
('1', 'Computer Networks', 'Kurose Ross', 'Pearson', 0, 'Computer Science'),
('2', 'Operating Systems', 'Greg Gagne', 'Wiley', 30, 'Information Science'),
('3', 'Cryptography', 'Sunil Kumar', 'Penguin', -2, 'Computer Science'),
('4', 'Cryptography', 'Sampada K S', 'Pearson', 23, 'Computer Science'),
('5', 'Java the complete reference', 'Herbert Schildt', 'TATA McGraw Hill', 19, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `Borrows_Book`
--

CREATE TABLE `Borrows_Book` (
  `Book_id` varchar(50) NOT NULL,
  `Student_USN` varchar(10) NOT NULL,
  `Date_of_return` date DEFAULT NULL,
  `Date_of_issue` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Borrows_Book`
--

INSERT INTO `Borrows_Book` (`Book_id`, `Student_USN`, `Date_of_return`, `Date_of_issue`) VALUES
('1', '1RN17CS021', '2020-01-01', '2020-03-01'),
('1', '1RN17CS035', '2020-03-21', '2020-04-21'),
('1', '1RN17CS064', '2019-07-01', '2019-07-05'),
('2', '1RN17CS021', '2020-03-15', '2020-03-22'),
('2', '1RN17CS035', '2020-03-16', '2020-03-23'),
('2', '1RN17CS064', '2020-03-23', '2020-03-30'),
('3', '1RN17CS021', '2020-03-22', '2020-03-30'),
('3', '1RN17CS029', '2020-03-23', '2020-03-30'),
('3', '1RN17CS035', '2020-03-07', '2020-04-03'),
('3', '1RN17CS064', '2020-03-06', '2020-03-27'),
('4', '1RN17CS021', '2020-02-05', '2020-03-05'),
('4', '1RN17CS029', '2020-03-22', '2020-03-29'),
('5', '1RN17CS035', '2020-03-23', '2020-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `Faculty`
--

CREATE TABLE `Faculty` (
  `Faculty_id` varchar(50) NOT NULL,
  `Faculty_Name` text NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Email_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Faculty`
--

INSERT INTO `Faculty` (`Faculty_id`, `Faculty_Name`, `Password`, `Email_id`) VALUES
('1', 'Kiran P', NULL, 'kiranp@gmail.com'),
('3', 'Sampada', NULL, 'sampada@gmail.com'),
('4', 'Hemanth', NULL, 'hemanth@gmai.com');

-- --------------------------------------------------------

--
-- Table structure for table `Issue`
--

CREATE TABLE `Issue` (
  `Book_id` varchar(50) NOT NULL,
  `Faculty_id` varchar(50) NOT NULL,
  `Date_of_issue` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `id` int(8) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`id`, `user_name`, `display_name`, `password`, `email`) VALUES
(1, 'admin_91', 'Kate Winslet', 'admin@03', 'kate@wince.com'),
(2, 'Himadri_21', 'Himadri', 'hima@04', 'Himadri.k@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `Student_USN` varchar(10) NOT NULL,
  `Student_Name` text NOT NULL,
  `Semester` int(2) DEFAULT NULL,
  `Department` text DEFAULT NULL,
  `Section` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`Student_USN`, `Student_Name`, `Semester`, `Department`, `Section`) VALUES
('1RN17CS021', 'Ashish Raghavendra', 6, 'CSE', 'B'),
('1RN17CS029', 'Chakravarthy C', 6, 'CSE', 'A'),
('1RN17CS035', 'Himadri K', 6, 'CSE', 'A'),
('1RN17CS064', 'Pooja M', 6, 'CSE', 'B'),
('1RN7CS022', 'Ashwini K', 6, 'ISE', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`Book_id`);

--
-- Indexes for table `Borrows_Book`
--
ALTER TABLE `Borrows_Book`
  ADD PRIMARY KEY (`Book_id`,`Student_USN`),
  ADD KEY `Student_USN` (`Student_USN`);

--
-- Indexes for table `Faculty`
--
ALTER TABLE `Faculty`
  ADD PRIMARY KEY (`Faculty_id`);

--
-- Indexes for table `Issue`
--
ALTER TABLE `Issue`
  ADD PRIMARY KEY (`Book_id`,`Faculty_id`),
  ADD KEY `Faculty_id` (`Faculty_id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`Student_USN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Borrows_Book`
--
ALTER TABLE `Borrows_Book`
  ADD CONSTRAINT `borrows_book_ibfk_1` FOREIGN KEY (`Book_id`) REFERENCES `Book` (`Book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrows_book_ibfk_2` FOREIGN KEY (`Student_USN`) REFERENCES `Student` (`Student_USN`);

--
-- Constraints for table `Issue`
--
ALTER TABLE `Issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`Book_id`) REFERENCES `Book` (`Book_id`),
  ADD CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`Faculty_id`) REFERENCES `Faculty` (`Faculty_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
